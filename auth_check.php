<?php
// auth_check.php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not authenticated
    header('Location: index.php'); // Change this to your login page URL
    exit;
}
