<?php
// Start a session (if not already started)
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header('Location: login.php'); // Adjust the login page URL as needed
    exit();
}

// Fetch user details from the database
require_once('db.php'); // Include the database connection file

$user_id = $_SESSION['user_id'];

$query = "SELECT full_name, email FROM users WHERE id = ?";
$stmt = $db->prepare($query);
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the user was found
if (!$user) {
    // Handle the case where the user doesn't exist
    // You can redirect them to an error page or perform another action
}

// Display user details and a sign-out button
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include your custom CSS -->
    <link rel="stylesheet" href="style.css">
    <style>
       /* Add your custom CSS styles here */
/* Improve responsiveness */
@media (max-width: 768px) {
    .left-section, .right-section {
        padding: 10px;
    }
}

/* Customize colors and typography */
body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
}

.navbar {
    background-color: #007bff;
}

.navbar-brand {
    color: #fff;
    font-weight: bold;
}

.nav-link {
    color: #007bff !important;
}

/* Add transitions and hover effects */
.nav-link:hover {
    background-color: #0056b3 !important;
    color: #fff !important;
    transition: background-color 0.3s, color 0.3s;
}

.card {
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s;
}

.card:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* Customize buttons */
.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

/* Add custom footer styles */
.footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    position: absolute;
    bottom: 0;
    width: 100%;
}

/* Additional custom styles for specific elements can be added as needed */

    </style>
</head>
<body>
    <!-- Navigation Menu -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Your Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="nav-link">Welcome, <?php echo $user['full_name']; ?></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Sign Out</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content Container -->
    <div class="container-fluid">
        <div class="row">
    <!-- Left Section -->
<div class="col-md-3 left-section">
    <!-- Unique ID -->
    <div class="card">
        <div class="card-header">
            Unique ID
        </div>
        <div class="card-body">
            <!-- Display the student's unique ID from the database -->
            Student ID: <?php echo $user_id; ?>
        </div>
    </div>

    <!-- Student Email -->
    <div class="card mt-3">
        <div class="card-header">
            Email Address
        </div>
        <div class="card-body">
            <!-- Display the student's email address from the database -->
            Email: <?php echo $user['email']; ?>
        </div>
    </div>
    <div class="card mt-3">
    <div class="card-header">
        Student Photo & Upload Photo
    </div>
    <div class="card-body">
        <!-- Student Photo -->
        <div class="mb-3">
            <h5>Student Photo</h5>
            <?php
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require_once('db.php'); // Include the database connection file

$user_id = $_SESSION['user_id'];

            // Retrieve the user's photo from the database
            $query = "SELECT photo FROM users WHERE id = ?";
            $stmt = $db->prepare($query);
            $stmt->execute([$user_id]);
            $photo = $stmt->fetch(PDO::FETCH_ASSOC);

            // Output the photo
            if ($photo && !empty($photo['photo'])) {
                // Determine the image format (you may need to adjust this based on your database)
                $image_mime_type = 'image/jpeg'; // Assuming JPEG format
                echo '<img src="data:' . $image_mime_type . ';base64,' . base64_encode($photo['photo']) . '" alt="Student Photo" class="img-fluid">';
            } else {
                // Display a default image or a message if the user has no photo
                echo '<img src="default_photo.png" alt="Student Photo" class="img-fluid">';
            }
            ?>
        </div>

        <!-- Upload Photo -->
        <div>
            <h5>Upload Photo</h5>
            <form action="upload_photo.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="photo" accept="image/*">
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
</div>



    <!-- Course Enrollment Details -->
    <div class="card mt-3">
        <div class="card-header">
            Course Enrollment Details
        </div>
        <div class="card-body">
            <!-- Add course enrollment details here -->
            Course: Introduction to Web Development
            Enrollment Date: September 15, 2023
        </div>
    </div>
</div>

            
            <!-- Right Section -->
<div class="col-md-9 right-section">
    <!-- Assignment Details -->
    <div class="card">
        <div class="card-header">
            Assignment Details
        </div>
        <div class="card-body">
            <!-- Add your assignment details here -->
            Assignment name: Assignment 1
            Due date: September 30, 2023
            Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </div>
    </div>

    <!-- Course Progress -->
    <div class="card mt-3">
        <div class="card-header">
            Course Progress
        </div>
        <div class="card-body">
            <!-- Add your course progress here -->
            Course: Introduction to Web Development
            Progress: 70%
        </div>
    </div>

    <!-- Result -->
    <div class="card mt-3">
        <div class="card-header">
            Result
        </div>
        <div class="card-body">
            <!-- Add your result details here -->
            Course: Introduction to Web Development
            Grade: A
        </div>
    </div>

    <!-- Quiz -->
    <div class="card mt-3">
        <div class="card-header">
            Quiz
        </div>
        <div class="card-body">
            <!-- Add your quiz details here -->
            Quiz name: Quiz 1
            Score: 95%
        </div>
    </div>
</div>

    <!-- Footer -->
    <div class="footer">
        &copy; <?php echo date("Y"); ?> Your Company Name. All Rights Reserved.
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include your custom JavaScript -->
    <script src="custom.js"></script>
</body>
</html>
