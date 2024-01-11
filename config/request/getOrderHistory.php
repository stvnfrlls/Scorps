<?php
require_once '../function.php';
require_once '../utils.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['userId'];
    $orderData = fetchData(getOrderHistory($userId));

    $response['data'] = $orderData;

    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}