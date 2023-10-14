<?php
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $query = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
        $stmt = $db->prepare($query);

        if ($stmt->execute([$full_name, $email, $password])) {
            // Redirect to index.php with a success message
            header('Location: index.php?message=Registration%20successful please login now ');
            exit();
        } else {
            // Handle database error
            $response = ['success' => false, 'message' => 'Registration failed'];
        }
    } catch (PDOException $e) {
        // Handle any database errors here
        $response = ['success' => false, 'message' => 'Database error: ' . $e->getMessage()];
    }
}

// Optionally, you can display the error message on the signup modal
if (isset($response)) {
    echo $response['message'];
}
?>
