<?php
require_once '../function.php';
require_once '../utils.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderId = $_POST['orderId'];
    $orderData = fetchData(orderDetails($orderId));

    $groupedData = [];

    foreach ($orderData as $item) {
        $key = $item['order_id'];

        if (!array_key_exists($key, $groupedData)) {
            $groupedData[$key] = [
                'order_id' => $item['order_id'],
                'payment_method' => $item['payment_method'],
                'order_status' => $item['order_status'],
                'first_name' => $item['first_name'],
                'last_name' => $item['last_name'],
                'address' => $item['address'],
                'barangay' => $item['barangay'],
                'city' => $item['city'],
                'state' => $item['state'],
                'postal' => $item['postal'],
                'email' => $item['email'],
                'contact' => $item['contact'],
                'created_at' => $item['created_at'],
                'cartData' => [],
            ];
        }
        $groupedData[$key]['cartData'][] = [
            'product_id' => $item['product_id'],
            'product_name' => $item['product_name'],
            'quantity' => $item['quantity'],
            'total' => $item['total']
        ];
    }
    $response['data'] = $groupedData;

    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}