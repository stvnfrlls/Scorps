<?php
require_once '../function.php';
require_once '../utils.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = login_user($username, $password);

    if ($user) {
        $_SESSION['userId'] = $user['id'];
        $_SESSION['user_name'] = $user['first_name'] . '' . $user['last_name'];
        $_SESSION['user_email'] = $user['email'];

        $response['success'] = true;
        $response['message'] = 'Login successful';

        if ($user['role'] === 'ADMIN') {
            $response['redirect'] = '../admin/dashboard.php';
        } else if ($user['role'] === 'CUSTOMER') {
            $response['redirect'] = '../user/profile.php';
        } else {
            $response['success'] = false;
            $response['message'] = 'User role is not defined';
        }
    } else {
        $response['success'] = false;
        $response['message'] = 'Invalid username or password';
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}