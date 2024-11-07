<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Store the received farmerId in a session variable
    $_SESSION['vol'] = $_POST["farmerId"];

    // If redirect is needed
    $response = array();
    $response['redirect'] = 'nextvol.php'; // Set the URL you want to redirect to

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit; // Ensure that no further output is sent
}
?>

