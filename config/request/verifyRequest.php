<?php
require_once '../function.php';
require_once '../utils.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = sanitize($_POST['userId']);
    $password = sanitize($_POST['password']);

    $result = verifyChange($userId, $password);

    if ($result) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>