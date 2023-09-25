// signup.php
<?php
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
    $stmt = $db->prepare($query);

    if ($stmt->execute([$full_name, $email, $password])) {
        $response = ['success' => true, 'message' => 'Registration successful'];
    } else {
        $response = ['success' => false, 'message' => 'Registration failed'];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
