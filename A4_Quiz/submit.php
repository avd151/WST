<?php
include_once('connect.php');

if (isset($_POST['submit'])) {
    $nameofuser = $_POST['nameofuser'];
    $totalQuestions = 0;
    $correctAnswers = 0;
    //Traverse $_POST as associative array
    foreach ($_POST as $key => $value) {
        // echo $key;

        if ($key == 'nameofuser') {
        } else if ($key == 'submit') {
        } else {
            $tempAnswer = $_POST[$key];
            // echo $key . '\n';
            // echo $tempAnswer;
            // count total questions and correct answers
            $sql_count = "SELECT COUNT(*) COUNT FROM questions WHERE id = '$key' AND answer = '$tempAnswer'";
            $count_result = mysqli_query($conn, $sql_count);
            $row = mysqli_fetch_assoc($count_result);
            $numAnswer = $rowAnswer['count'];
            if ($numAnswer < 1) {
                // wrong answer
            } else {
                // correct answer
                $correctAnswers++;
            }
            $totalQuestions++;
        }
    }
    // Store score in db
    $sqlSubmit = "INSERT INTO users (name, score) VALUES ('$nameofuser', '$correctAnswers/$totalQuestions')";
    if (mysqli_query($conn, $sqlSubmit)) {
        header("Location: index.php?status=succes");
    } else {
        header("Location: index.php?status=error");
    }
}
