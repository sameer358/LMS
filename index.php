<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Management System</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include Bootstrap Icons CSS (for social media icons) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.16.0/font/bootstrap-icons.css">
    <style>
        /* Custom styles for the header and navigation */
        .navbar {
            background-color: #3498db;
        }
        .navbar-brand {
            color: #fff;
            font-size: 24px;
        }
        .navbar-toggler-icon {
            background-color: #fff;
        }
        .navbar-nav .nav-link {
            color: #fff;
            font-size: 18px;
        }
        .navbar-nav .nav-link:hover {
            color: #f39c12;
        }

        /* Custom styles for the main content */
        body {
            background-color: #ecf0f1;
        }
        .container-main {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            min-height: calc(100vh - 105px); /* Make container at least full viewport height minus header and footer */
        }
        h1 {
            color: #333;
        }

        /* Custom styles for forms */
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        /* Custom styles for buttons */
        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
            font-size: 18px;
        }
        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }

        /* Custom styles for modals */
        .modal-content {
            background-color: #ecf0f1;
        }

        /* Custom styles for footer */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        /* Custom styles for social media icons */
        .social-icons {
            font-size: 24px;
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="index.php">Learning Portal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#signupModal">Signup</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-main mt-5">
        <div class="jumbotron">
            <h1>Welcome to the Learning Portal</h1>
            <p>Learn and grow with our courses and resources.</p>
        </div>
    </div>

    <!-- Signup Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signupModalLabel">Signup</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="signup-form" action="signup.php" method="post">
                        <input type="text" name="full_name" placeholder="Full Name" required class="form-control">
                        <input type="email" name="email" placeholder="Email" required class="form-control">
                        <input type="password" name="password" placeholder="Password" required class="form-control">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="signup-form" class="btn btn-primary">Signup</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="login-form" action="login.php" method="post">
                        <input type="email" name="email" placeholder="Email" required class="form-control">
                        <input type="password" name="password" placeholder="Password" required class="form-control">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="login-form" class="btn btn-primary">Login</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

	<footer>
        &copy; 2023 Learning Portal
        <div class="social-icons">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
        </div>
    </footer>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>