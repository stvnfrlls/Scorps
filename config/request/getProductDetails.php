<?php
require_once '../function.php';
require_once '../utils.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productID = $_POST['productId'];
    $productData = fetchData(getProductDetails($productID));

    $response['data'] = $productData;

    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}