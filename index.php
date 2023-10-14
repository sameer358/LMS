<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Management System</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="index.php">Learning Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="" data-toggle="modal" data-target="#signupModal">Signup</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
              
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Feedback</a>
                </li>
                
            </ul>
        </div>
    </nav>

    <div class="container-main mt-5">
        <div class="jumbotron">
            <h1>Welcome to the Learning Management System</h1>
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
<script>
    <?php
    if (isset($_GET['message']) && !empty($_GET['message'])) {
        $successMessage = $_GET['message'];
        echo "alert('$successMessage');";
    }
    ?>
</script>

	<footer>
    &copy; 2023 Learning Management System (LMS) | Developed by <a href="https://www.computecentral.in" target="_blank">Compute Central India</a>
    <br>
    Contact: <a href="mailto:support@computecentral.in">support@computecentral.in</a> | Phone: <a href="tel:+11234567890">+1 (123) 456-7890</a>
</footer>


    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>