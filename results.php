<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="exam.css">
</head>
<body>
    <div class="exam-container">
        <h1>Exam Results</h1>
        <?php
        if (isset($_GET['score'])) {
            $userScore = $_GET['score'];
            echo '<p>Your Score: ' . $userScore . '</p>';
            // You can provide additional information or feedback to the user here.
        } else {
            echo '<p>No score available.</p>';
        }
        ?>
    </div>
</body>
</html>
