<?php
session_start();

if (isset($_SESSION['user_id'])) {
    // L'utilisateur est connecté
    $response = array("loggedIn" => true, "user_name" => $_SESSION['user_name']);
} else {
    // L'utilisateur n'est pas connecté
    $response = array("loggedIn" => false);
}

echo json_encode($response);
?>