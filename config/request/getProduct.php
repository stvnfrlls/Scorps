<?php
require_once '../function.php';
require_once '../utils.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $productData = fetchData(getProducts());

    $response['products'] = $productData;

    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}