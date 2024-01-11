<?php
require_once '../function.php';
require_once '../utils.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $soldData = fetchData(getItemsSold());

    $response['itemSold'] = $soldData;

    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}