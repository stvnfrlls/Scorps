<?php
require_once '../function.php';
require_once '../utils.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $allSales = [];

    $postData = json_decode(file_get_contents("php://input"), true);

    $currentDate = date('Ymd');
    $randomString = bin2hex(random_bytes(10));

    $orderDetails = array(
        'orderId' => $currentDate . $randomString,
        'userId' => $_SESSION['userId'],
        'fname' => $postData['fname'],
        'lname' => $postData['lname'],
        'address' => $postData['address'],
        'city' => $postData['city'],
        'province' => $postData['province'],
        'postal' => $postData['postal'],
        'email' => $postData['email'],
        'phone' => $postData['phone']
    );

    $cartData = $postData['cartData'];

    foreach ($cartData as $item) {
        $result = checkoutProduct($orderDetails, $item);

        if ($result['success'] === true) {
            $allSales[] = true;
        } else {
            $allSales[] = $result;
        }
    }

    if (in_array(false, $allSales, true)) {
        $response['success'] = false;
        $response['message'] = 'Error occurred while processing one or more items';
        $response['errors'] = array_filter($allSales, function ($item) {
            return $item !== true;
        });
    } else {
        $response['success'] = true;
        $orderId = $result['orderId'];
        $response['redirect'] = "confirmation.php?orderId=$orderId";
        $response['message'] = 'All sales saved successfully';
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}