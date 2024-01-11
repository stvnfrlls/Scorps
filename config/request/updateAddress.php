<?php
require_once '../function.php';
require_once '../utils.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = sanitize($_POST['userId']);
    $first_name = sanitize($_POST['first_name']);
    $last_name = sanitize($_POST['last_name']);
    $address = sanitize($_POST['address']);
    $city_municipality = sanitize($_POST['city_municipality']);
    $province = sanitize($_POST['province']);
    $postal_zip = sanitize($_POST['postal_zip']);
    $contact = sanitize($_POST['contact']);

    $userDetails = array(
        'userId' => $userId,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'address' => $address,
        'city_municipality' => $city_municipality,
        'province' => $province,
        'postal_zip' => $postal_zip,
        'contact' => $contact
    );

    $result = updateUserDetails($userDetails);

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