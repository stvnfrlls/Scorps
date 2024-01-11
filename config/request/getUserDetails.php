<?php
require_once '../function.php';
require_once '../utils.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['userId'];
    $userDetails = fetchData(getUserDetails($userId));

    $response['data'] = $userDetails;

    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}