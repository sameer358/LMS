<?php
// logout.php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page after logout
header('Location: index.php'); // Change this to your login page URL
exit;
