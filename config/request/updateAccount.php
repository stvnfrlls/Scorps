<?php
require_once '../function.php';
require_once '../utils.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = sanitize($_POST['userId']);
    $email = sanitize($_POST['email']);
    $newPassword = sanitize($_POST['newPassword']);

    $resultPassword = null;
    $resultEmail = null;

    if (!empty($newPassword)) {
        $resultPassword = updatePassword($userId, $newPassword);
    }
    if (!empty($email)) {
        $resultEmail = updateEmail($userId, $email);
    }

    if ($resultPassword !== null || $resultEmail !== null) {
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