<?php
include_once('connect.php');

if(isset($_POST['quizSubmit'])){
    $totalQues = 0;
    $correctAns = 0;
    $username = $_POST['username'];
    foreach($_POST as $key => $value){
        if($key == 'submit' || $key == 'username'){
            continue;
        }
        else{
            $tempAns = $_POST[$key];
            $sql_count = "SELECT COUNT(*) count FROM questions WHERE id = '$key' AND answer = '$tempAns'";
            $count_result = mysqli_query($conn, $sql_count);
            $row = mysqli_fetch_assoc($count_result);
            $numAnswer = $row['count'];
            if ($numAnswer == 1) {
                $correctAns++;
            }
            // echo $correctAns;
            $totalQues++;
        }
    }
    // Insert score into users table 
    $sql_insert = "INSERT INTO users (name, score) VALUES ('$username', '$correctAns')";
    if(mysqli_query($conn, $sql_insert)){
            // $sql = "SELECT * FROM users WHERE username='$username'";
            // $res = mysqli_query($conn, $sql);
            // $row = mysqli_fetch_assoc($res);
            // echo $row;
            // echo "<center><h1> Your score is " . $row['score'] . "</h1></center>";
        echo '<script>alert("Result stored successfully")</script>';
        header('location: result.php');
    }
    else{
        echo '<script>alert("Error in storing result")</script>';
    }
    //Display result using Ajax dyanmically
}
