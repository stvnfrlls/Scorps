<?php
require_once '../function.php';
require_once '../utils.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = sanitize($_POST['product_id']);
    $product_name = sanitize($_POST['product_name']);
    $in_stock = sanitize($_POST['in_stock']);
    $price = sanitize($_POST['price']);

    if (isset($_FILES['product_img']) && $_FILES['product_img']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../assets/img/products/';
        $filename = strtolower(str_replace(' ', '_', $product_name));
        $uploadFile = $uploadDir . $filename . '.' . pathinfo($_FILES['product_img']['name'], PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES['product_img']['tmp_name'], $uploadFile)) {
            $product_img = 'assets/img/products/' . $filename . '.' . pathinfo($_FILES['product_img']['name'], PATHINFO_EXTENSION);

            $result = updateProductWithImage($product_id, $product_img, $product_name, $in_stock, $price);

            if ($result) {
                $response['success'] = true;
                $response['message'] = 'Updated successfully';
            } else {
                $response['success'] = false;
                $response['message'] = 'Encountered a problem while updating';
            }
        } else {
            $response['success'] = false;
            $response['message'] = 'Error moving uploaded file';
        }
    } else {
        $result = updateProductWithoutImage($product_id, $product_name, $in_stock, $price);

        if ($result) {
            $response['success'] = true;
            $response['message'] = 'Updated successfully';
        } else {
            $response['success'] = false;
            $response['message'] = 'Encountered a problem while updating';
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>