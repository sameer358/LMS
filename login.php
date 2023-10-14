<?php
require_once('db.php');

$errorMessage = ""; // Initialize the error message

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Client-side validation
    if (empty($email) || empty($password)) {
        $errorMessage = "Please fill in all fields.";
    } else {
        $query = "SELECT id, full_name, email, password FROM users WHERE email = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];

            // Redirect to dashboard.php after successful login
            header('Location: dashboard.php');
            exit; // Make sure to exit to prevent further execution of the script
        } else {
            $errorMessage = "Incorrect credentials. Please try again.";
        }
    }
}
?>

<html>
<head>
    <title>Login Page</title>
    <!DOCTYPE html>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="login.php">Learning Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                
                    <a class="nav-link" href="index.php">Home</a>
                </li>
              
                </li>
            
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Feedback</a>
                </li>          
            </ul>
        </div>
    </nav>
    <!-- Add these to your HTML -->
<link rel="stylesheet" href="path/to/bootstrap.min.css">
<script src="path/to/bootstrap.min.js"></script>


</head>
<body>
    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Login Here
                    </div>
                    <div class="card-body">
                        <form id="loginForm" method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                        
                        <?php
                        if (!empty($errorMessage)) {
                            echo '<p class="text-danger">' . $errorMessage . '</p>';
                        }
                        ?>
                        <!-- "Don't have an account" link -->
                        <p>Don't have an account? <a href="index.php">Create one</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Client-side validation using JavaScript
        document.getElementById('loginForm').addEventListener('submit', function (event) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (!email || !password) {
                alert('Please fill in all fields.');
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>

<footer>
    &copy; 2023 Learning Management System (LMS) | Developed by <a href="https://www.computecentral.in" target="_blank">Compute Central India</a>
    <br>
    Contact: <a href="mailto:support@computecentral.in">support@computecentral.in</a> | Phone: <a href="tel:+11234567890">+1 (123) 456-7890</a>
</footer>
</body>
</html>
