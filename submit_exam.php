<?php
session_start();
require 'db.php';

// Retrieve questions from the database
$query = "SELECT * FROM questions";
$result = $db->query($query);
$totalQuestions = $result->rowCount();

$score = 0;

for ($question_number = 1; $question_number <= $totalQuestions; $question_number++) {
    if (isset($_POST['q' . $question_number])) {
        $selectedOption = $_POST['q' . $question_number];
        
        // Use a parameterized query to retrieve the correct answer
        $query = "SELECT correct_answer FROM questions WHERE id = :question_id";
        $correctAnswerResult = $db->prepare($query);
        $correctAnswerResult->bindParam(':question_id', $question_number, PDO::PARAM_INT);
        $correctAnswerResult->execute();
        
        $correctAnswerRow = $correctAnswerResult->fetch(PDO::FETCH_ASSOC);
        $correctAnswer = $correctAnswerRow['correct_answer'];

        if ($selectedOption == $correctAnswer) {
            $score++;
        }
    }
}

// Store the user's score and related information in the database
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $user_score = $score;
    $exam_date = date("Y-m-d");
    $exam_time = date("H:i:s");

    $insertQuery = "INSERT INTO exam_results (user_id, user_score, exam_date, exam_time) 
                   VALUES (:user_id, :user_score, :exam_date, :exam_time)";
    
    $stmt = $db->prepare($insertQuery);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':user_score', $user_score, PDO::PARAM_INT);
    $stmt->bindParam(':exam_date', $exam_date, PDO::PARAM_STR);
    $stmt->bindParam(':exam_time', $exam_time, PDO::PARAM_STR);

    if ($stmt->execute()) {
        // The results have been successfully stored in the database.
    } else {
        // Handle the case where the database insertion fails.
    }
}

header('Location: results.php?score=' . $score);
exit;
