<?php
// Database configuration
$host = "localhost"; // Change this to your MySQL server hostname (usually "localhost")
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "LMS"; // Change this to your MySQL database name

// Create a database connection
try {
    $db = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // Set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
