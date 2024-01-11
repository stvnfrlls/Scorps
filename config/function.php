<?php
session_start();

require_once 'database.php';
require_once 'utils.php';
function login_user($email, $password)
{
    global $conn;

    $email = sanitize($email);
    $password = sanitize($password);

    $hashedPassword = md5($password);

    $sql = "SELECT users.id, users.first_name, users.last_name, users.email, roles.role FROM users 
            JOIN roles 
            ON users.id = roles.user_id 
            WHERE 
                email = '$email' AND 
                password = '$hashedPassword'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $userData = $result->fetch_assoc();

        $_SESSION['user_id'] = $userData['id'];

        $result->free_result();
        return $userData;
    } else {
        return null;
    }
}
function verifyChange($userId, $password)
{
    global $conn;

    $userId = sanitize($userId);
    $password = sanitize($password);

    $sql = "SELECT password FROM users WHERE id = '$userId'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        $userData = $result->fetch_assoc();
        $storedPassword = $userData['password'];

        $hashedPassword = md5($password);

        if ($hashedPassword === $storedPassword) {
            return true;
        }
    }
    return false;
}
function getUserDetails($userId)
{
    global $conn;

    $sql = "SELECT users.id, users.first_name, users.last_name, users.email,
                   userdetails.home, userdetails.city, userdetails.state, userdetails.postal, userdetails.contact_no
            FROM users 
            JOIN userdetails 
            ON users.id = userdetails.user_id 
            WHERE users.id = '$userId'";

    $userData = $conn->query($sql);

    return $userData;
}
function updateEmail($userId, $email)
{
    global $conn;

    $email = sanitize($email);

    $sql = "UPDATE users 
            SET 
            email = '$email'
            WHERE id = '$userId'";

    $result = $conn->query($sql);

    return $result;
}
function updatePassword($userId, $newPassword)
{
    global $conn;

    $newPassword = md5(sanitize($newPassword));

    $sql = "UPDATE users 
            SET 
            password = '$newPassword'
            WHERE id = '$userId'";

    $result = $conn->query($sql);

    return $result;
}
function updateUserDetails($userDetails)
{
    global $conn;

    $userId = $userDetails['userId'];
    $first_name = $userDetails['first_name'];
    $last_name = $userDetails['last_name'];
    $address = $userDetails['address'];
    $city_municipality = $userDetails['city_municipality'];
    $province = $userDetails['province'];
    $postal_zip = $userDetails['postal_zip'];
    $contact = $userDetails['contact'];

    $sqlName = "UPDATE users
                SET 
                first_name = '$first_name',
                last_name = '$last_name'
                WHERE id = '$userId'";

    $updateName = $conn->query($sqlName);

    $sqlAddress = "UPDATE userdetails
                    SET 
                    home = '$address',
                    city = '$city_municipality',
                    state = '$province',
                    postal = '$postal_zip',
                    contact_no = '$contact'
                    WHERE user_id = '$userId'";

    $updateAddress = $conn->query($sqlAddress);

    if ($updateName && $updateAddress) {
        return true;
    } else {
        return false;
    }
}
function getProducts()
{
    global $conn;

    $sql = "SELECT * FROM products";
    $productData = $conn->query($sql);

    return $productData;
}
function getProductDetails($id)
{
    global $conn;

    $sql = "SELECT * FROM products WHERE product_id = '$id'";
    $productData = $conn->query($sql);

    return $productData;
}
function checkoutProduct($orderDetails, $products)
{
    global $conn;

    $orderId = $orderDetails['orderId'];
    $userId = $orderDetails['userId'];
    $productId = $products['productId'];
    $quantity = $products['counter'];
    $subtotal = $products['subtotal'];

    $sql = "INSERT INTO orders (order_id, user_id, product_id, quantity, total, payment_method, order_status) 
            VALUES ('$orderId', '$userId', '$productId', '$quantity', '$subtotal', 'COD', 'PROCESSING')";

    $sqlUpdate = "UPDATE products SET in_stock = in_stock - $quantity WHERE product_id = '$productId'";

    $fname = sanitize($orderDetails['fname']);
    $lname = sanitize($orderDetails['lname']);
    $address = sanitize($orderDetails['address']);
    $city = sanitize($orderDetails['city']);
    $province = sanitize($orderDetails['province']);
    $postal = sanitize($orderDetails['postal']);
    $email = sanitize($orderDetails['email']);
    $phone = sanitize($orderDetails['phone']);

    $sqlShipping = "INSERT INTO shipping_details (order_id, user_id, product_id, first_name, last_name, address, city, state, postal, email, contact)
                    VALUES ('$orderId', ' $userId', '$productId', '$fname', '$lname', '$address', '$city', '$province', '$postal', '$email', '$phone')";

    try {
        $conn->query($sql);
        $conn->query($sqlUpdate);
        $conn->query($sqlShipping);

        $conn->commit();
        return array('success' => true, 'orderId' => $orderId);
    } catch (Exception $e) {
        $conn->rollback();

        $errorMessage = $e->getMessage();
        return $errorMessage;
    }
}
function orderDetails($orderId)
{
    global $conn;

    $sql = "SELECT DISTINCT
                orders.order_id, products.product_name, orders.product_id, orders.quantity, orders.payment_method, orders.order_status, orders.total, orders.created_at,
                shipping_details.first_name, shipping_details.last_name, 
                shipping_details.address, shipping_details.barangay, shipping_details.city, shipping_details.state, shipping_details.postal, 
                shipping_details.email, shipping_details.contact
            FROM orders 
            LEFT JOIN shipping_details ON orders.order_id = shipping_details.order_id
            LEFT JOIN products ON orders.product_id = products.product_id
            WHERE shipping_details.order_id = '$orderId'";
    $orderData = $conn->query($sql);

    return $orderData;
}
function getOrderHistory($userId)
{
    global $conn;

    $sql = "SELECT order_id, SUM(total) AS total, payment_method, order_status, created_at
            FROM orders
            WHERE user_id = '$userId'
            GROUP BY order_id
            ORDER BY created_at DESC";

    $orderHistoryData = $conn->query($sql);

    return $orderHistoryData;
}
function getOrders()
{
    global $conn;
    $sql = "SELECT orders.order_id, orders.order_status, 
                SUM(orders.quantity) AS no_items, 
                SUM(orders.total) AS total_sum, orders.payment_method
            FROM orders
            GROUP BY orders.order_id, orders.order_status";

    $orders = $conn->query($sql);

    return $orders;
}
function getYearlySales()
{
    global $conn;

    $sql = "SELECT YEAR(created_at) AS year, 
               SUM(total) AS total_sales 
        FROM orders 
        GROUP BY year 
        ORDER BY year";

    $sales_data = $conn->query($sql);

    return $sales_data;

}
function getMonthlySales()
{
    global $conn;

    $sql = "SELECT DATE_FORMAT(created_at, '%Y-%m') AS month, 
                   MONTHNAME(created_at) AS month_name, 
                   SUM(total) AS total_sales 
            FROM orders 
            GROUP BY month 
            ORDER BY month";

    $sales_data = $conn->query($sql);

    return $sales_data;
}
function getItemsSold()
{
    global $conn;

    $sql = "SELECT orders.product_id, products.product_name, SUM(quantity) as item_sold 
            FROM orders 
            JOIN products 
            ON orders.product_id = products.product_id 
            GROUP BY product_id 
            ORDER BY product_id";

    $item_sold = $conn->query($sql);

    return $item_sold;
}
function add_product($product_id, $product_name, $product_img, $in_stock, $price)
{
    global $conn;

    $product_id = sanitize($product_id);
    $product_name = sanitize($product_name);
    $product_img = sanitize($product_img);
    $in_stock = sanitize($in_stock);
    $price = sanitize($price);

    $sql = "INSERT INTO products (product_id, product_name, product_img, in_stock, price) 
            VALUES ('$product_id', '$product_name', '$product_img', '$in_stock', '$price')";
    $add = $conn->query($sql);

    return $add;
}
function updateProductWithImage($product_id, $product_img, $product_name, $in_stock, $price)
{
    global $conn;

    $product_img = sanitize($product_img);
    $product_name = sanitize($product_name);
    $in_stock = sanitize($in_stock);
    $price = sanitize($price);

    $sql = "UPDATE products 
            SET 
            product_img = '$product_img',
            product_name = '$product_name', 
            in_stock = '$in_stock', 
            price = '$price'
            WHERE product_id = '$product_id'";

    $update = $conn->query($sql);

    return $update;
}
function updateProductWithoutImage($product_id, $product_name, $in_stock, $price)
{
    global $conn;

    $product_name = sanitize($product_name);
    $in_stock = sanitize($in_stock);
    $price = sanitize($price);

    $sql = "UPDATE products 
            SET 
            product_name = '$product_name', 
            in_stock = '$in_stock', 
            price = '$price'
            WHERE product_id = '$product_id'";

    $update = $conn->query($sql);

    return $update;
}
function delete_product($product_id)
{
    global $conn;

    $product_id = sanitize($product_id);

    $sql = "DELETE FROM products WHERE product_id = '$product_id'";
    $deleted = $conn->query($sql);

    return $deleted;
}
function updateOrderStatus($orderId, $orderStatus)
{
    global $conn;

    $orderId = sanitize($orderId);
    $orderStatus = sanitize($orderStatus);

    $sql = "UPDATE orders 
            SET 
            order_status = '$orderStatus'
            WHERE order_id = '$orderId'";

    $orderStatus = $conn->query($sql);

    return $orderStatus;
}