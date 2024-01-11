<?php
require_once '../function.php';
require_once '../utils.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $yearlyData = fetchData(getYearlySales());
    $monthlyData = fetchData(getMonthlySales());

    $response['yearlySales'] = $yearlyData;
    $response['monthlySales'] = $monthlyData;

    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}