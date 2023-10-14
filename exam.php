<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="exam.css">
</head>
<body>
    <div class="exam-container">
        <h1>Exam</h1>
        <form action="submit_exam.php" method="post">
            <?php
            // Include the database connection file
            require 'db.php';

            // Retrieve questions from the database
            $query = "SELECT * FROM questions";
            $result = $db->query($query);

            $question_number = 1;
            $totalQuestions = $result->rowCount();

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="question" id="question-' . $question_number . '" style="display: none;">';
                echo '<h2>Question ' . $question_number . ': ' . $row['question_text'] . '</h2>';
                echo '<ul>';
                for ($i = 1; $i <= 4; $i++) {
                    $option_name = 'option_' . $i;
                    echo '<li><input type="radio" name="q' . $question_number . '" value="' . $i . '"> ' . $row[$option_name] . '</li>';
                }
                echo '</ul>';
                echo '</div>';
                $question_number++;
            }
            ?>
            <input type="button" id="prev-button" value="Previous" onclick="prevQuestion()" style="display: none;">
            <input type="button" id="next-button" value="Next" onclick="nextQuestion()">
            <input type="submit" name="submit" value="Submit" style="display: none;">
        </form>
    </div>

    <script>
        let currentQuestion = 1;

        function nextQuestion() {
            if (currentQuestion < <?php echo $totalQuestions; ?>) {
                document.getElementById('question-' + currentQuestion).style.display = 'none';
                currentQuestion++;
                document.getElementById('question-' + currentQuestion).style.display = 'block';
            }

            if (currentQuestion === <?php echo $totalQuestions; ?>) {
                document.getElementById('next-button').style.display = 'none';
                document.querySelector('input[type="submit"]').style.display = 'block';
            }

            if (currentQuestion > 1) {
                document.getElementById('prev-button').style.display = 'inline';
            }
        }

        function prevQuestion() {
            if (currentQuestion > 1) {
                document.getElementById('question-' + currentQuestion).style.display = 'none';
                currentQuestion--;
                document.getElementById('question-' + currentQuestion).style.display = 'block';
            }

            if (currentQuestion === 1) {
                document.getElementById('prev-button').style.display = 'none';
            }

            if (currentQuestion < <?php echo $totalQuestions; ?>) {
                document.getElementById('next-button').style.display = 'inline';
            }
        }

        // Display the first question on page load
        document.getElementById('question-1').style.display = 'block';
    </script>
</body>
</html>
