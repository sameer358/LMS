<?php
// login.php
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT id, full_name, email, password FROM users WHERE email = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $response = ['success' => true, 'message' => 'Login successful'];

        // Redirect to dashboard.php
        header('Location: dashboard.php');
        exit(); // Ensure that the script stops executing after the redirection
    } else {
        $response = ['success' => false, 'message' => 'Login failed'];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
