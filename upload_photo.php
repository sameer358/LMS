<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require_once('db.php'); // Include the database connection file

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle file upload
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo_tmp_name = $_FILES['photo']['tmp_name'];

        // Read the binary data from the uploaded file
        $photo_data = file_get_contents($photo_tmp_name);

        // Perform database insertion to save the photo
        $query = "UPDATE users SET photo = ? WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->bindParam(1, $photo_data, PDO::PARAM_LOB);
        $stmt->bindParam(2, $user_id);
        $stmt->execute();

        // Redirect to the dashboard after the upload
        header('Location: dashboard.php');
        exit();
    }
}
// Output the photo
if ($photo && !empty($photo['photo'])) {
    // Determine the image format (you may need to adjust this based on your database)
    $image_mime_type = 'image/jpeg'; // Assuming JPEG format
    header("Content-Type: $image_mime_type");
    echo $photo['photo'];
} else {
    // Display a default image or a message if the user has no photo
    $default_photo_path = 'default_photo.png'; // Provide a path to your default image
    $default_photo_data = file_get_contents($default_photo_path);
    $default_photo_mime_type = 'image/png'; // Adjust the content type based on your default image format
    header("Content-Type: $default_photo_mime_type");
    echo $default_photo_data;
}
?>
