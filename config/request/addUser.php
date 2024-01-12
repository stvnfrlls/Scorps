<?php
require_once '../function.php';
require_once '../utils.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = sanitize($_POST['first_name']);
    $last_name = sanitize($_POST['last_name']);
    $email = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);

    $userDetails = array(
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'password' => $password,
    );

    $result = add_user($userDetails);

    if ($result) {
        $response['success'] = true;
        $response['message'] = 'Registered successfully';
    } else {
        $response['success'] = false;
        $response['message'] = 'Encountered a problem while registering';
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>