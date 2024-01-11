<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'scorps');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_users = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query("SHOW TABLES LIKE 'users'")->num_rows) {
    $conn->query($sql_users);
}

$sql_userroles = "CREATE TABLE IF NOT EXISTS roles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    role VARCHAR(255) NOT NULL,
    created_at DATETIME(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query("SHOW TABLES LIKE 'roles'")->num_rows) {
    $conn->query($sql_userroles);
}

$sql_userDetails = "CREATE TABLE IF NOT EXISTS userdetails (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    home VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    state VARCHAR(255) NOT NULL,
    postal VARCHAR(255) NOT NULL,
    contact_no VARCHAR(255) NOT NULL,
    created_at DATETIME(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query("SHOW TABLES LIKE 'userdetails'")->num_rows) {
    $conn->query($sql_userDetails);
}

$sql_products = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    product_id VARCHAR(6) NOT NULL,
    product_img VARCHAR(255) NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    in_stock INT(5) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    created_at DATETIME(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query("SHOW TABLES LIKE 'products'")->num_rows) {
    $conn->query($sql_products);
}

$userCount = $conn->query("SELECT COUNT(*) as count FROM users");
$userRow = $userCount->fetch_assoc();
$userRowCount = $userRow['count'];

if ($userRowCount == 0) {
    $AdminName = 'Admin';
    $lastName = 'Account';
    $AdminHashedPassword = md5('Password');
    $AdminEmail = 'admin@admin.com';

    $AdminSql = "INSERT INTO users (first_name, last_name, password, email) VALUES ('$AdminName', '$lastName', '$AdminHashedPassword', '$AdminEmail')";
    $AdminResult = $conn->query($AdminSql);

    if ($AdminResult) {
        $userId = $conn->insert_id;
        $conn->query("INSERT INTO roles (user_id, role) VALUES ($userId, 'ADMIN');");
    }

    $CustomerName = 'Customer';
    $lastName = 'Account';
    $CustomerHashedPassword = md5('Password');
    $CustomerEmail = 'customer@customer.com';

    $CustomerSql = "INSERT INTO users (first_name, last_name, password, email) VALUES ('$CustomerName', '$lastName', '$CustomerHashedPassword', '$CustomerEmail')";
    $CustomerResult = $conn->query($CustomerSql);

    if ($CustomerResult) {
        $userId = $conn->insert_id;
        $conn->query("INSERT INTO roles (user_id, role) VALUES ($userId, 'CUSTOMER');");
    }
}

$productCount = $conn->query("SELECT COUNT(*) as count FROM products");
$productRow = $productCount->fetch_assoc();
$productRowCount = $productRow['count'];

if ($productRowCount == 0) {
    $conn->query("INSERT INTO products (product_id, product_img, product_name, price, in_stock)
                VALUES
                    ('P1-CR', 'assets/img/products/cream_tara_tote_bag.png', 'Cream Tara Tote Bag', 799.00, 100),
                    ('P2-GR', 'assets/img/products/gray_tara_tote_bag.png', 'Gray Tara Tote Bag', 749.00, 80),
                    ('P3-LV', 'assets/img/products/lavander_tara_tote_bag.png', 'Lavander Tara Tote Bag', 779.00, 120),
                    ('P4-BL', 'assets/img/products/blue_tara_tote_bag.png', 'Blue Tara Tote Bag', 779.00, 90),
                    ('P5-MC', 'assets/img/products/mocha_tara_tote_bag.png', 'Mocha Tara Tote Bag', 779.00, 110),
                    ('P6-LT', 'assets/img/products/latte_tara_tote_bag.png', 'Latte Tara Tote Bag', 779.00, 95),
                    ('P7-MS', 'assets/img/products/mustard_tara_tote_bag.png', 'Mustard Tara Tote Bag', 779.00, 105),
                    ('P8-IV', 'assets/img/products/ivory_tara_tote_bag.png', 'Ivory Tara Tote Bag', 749.00, 70),
                    ('P9-CP', 'assets/img/products/cappucino_tara_tote_bag.png', 'Cappuccino Tara Tote Bag', 779.00, 115),
                    ('P10-BK', 'assets/img/products/black_tara_tote_bag.png', 'Black Tara Tote Bag', 749.00, 75),
                    ('P11-TE', 'assets/img/products/teal_tara_tote_bag.png', 'Teal Tara Tote Bag', 779.00, 100),
                    ('P12-CB', 'assets/img/products/caramel_brown_tara_tote_bag.png', 'Caramel Brown Tara Tote Bag', 779.00, 85);
                ");
}

$sql_orders = "CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id VARCHAR(50) NOT NULL,
    user_id INT(6) UNSIGNED NOT  NULL,
    product_id VARCHAR(50) NOT NULL,
    quantity INT(6) NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    order_status VARCHAR(50) NOT NULL,
    created_at DATETIME(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query("SHOW TABLES LIKE 'orders'")->num_rows) {
    $conn->query($sql_orders);
}

$sql_shipping_details = "CREATE TABLE IF NOT EXISTS shipping_details (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id VARCHAR(50) NOT NULL,
    user_id INT(6) UNSIGNED NOT NULL,
    product_id VARCHAR(50) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    state VARCHAR(255) NOT NULL,
    postal VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    contact VARCHAR(255) NOT NULL,
    created_at DATETIME(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query("SHOW TABLES LIKE 'shipping_details'")->num_rows) {
    $conn->query($sql_shipping_details);
}
