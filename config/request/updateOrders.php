<?php
require_once '../function.php';
require_once '../utils.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderId = sanitize($_POST['order_id']);
    $orderStatus = sanitize($_POST['order_status']);

    $result = updateOrderStatus($orderId, $orderStatus);

    if ($result) {
        $response['success'] = true;
        $response['message'] = 'Updated successfully';
    } else {
        $response['success'] = false;
        $response['message'] = 'Encountered a problem while updating';
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>