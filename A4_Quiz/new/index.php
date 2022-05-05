<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Website</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
include_once('connect.php');
include('navbar.php');
?>

<body>
    <br>
    <center>
        <h1>Quiz Website</h1><br>
    </center>
    <!-- Take username input  -->
    <!-- Display Quiz  -->
    <div id="quizSection">
        <form action="process.php" method="POST">
            <label for="username">Enter your name to take the quiz: </label>
            <input type="text" name="username" required><br><br>
            <!-- Get questions -->
            <?php
            $no = 1;
            $sql_ques = "SELECT * FROM questions";
            $ques_result = mysqli_query($conn, $sql_ques);
            while ($row = mysqli_fetch_assoc($ques_result)) {
                $id = $row['id'];
                $question = $row['question'];
                $op1 = $row['op1'];
                $op2 = $row['op2'];
                $op3 = $row['op3'];
                $op4 = $row['op4'];
                $answer = $row['answer'];
                echo '<br>';
            ?>
                <div class="card">
                    <?php
                    echo '<h3 class="ques">Question ' . $no . '</h3>';
                    echo '<p>' . $question . '</p>';
                    echo '<input type="radio" name="' . $id . '" value="' . $op1 . '" id="' . $op1 . '">' . $op1 . '<br>';
                    echo '<input type="radio" name="' . $id . '" value="' . $op2 . '" id="' . $op2 . '">' .
                        $op2 . '<br>';
                    echo '<input type="radio" name="' . $id . '" value="' . $op3 . '" id="' . $op3 . '">' .
                        $op3 . '<br>';
                    echo '<input type="radio" name="' . $id . '" value="' . $op4 . '" id="' . $op4 . '">' .
                        $op4 . '<br>';
                    $no++;
                    ?>
                </div>

            <?php
            }
            ?>

            <br>
            <center>
                <input type="submit" value="Submit Quiz" name="quizSubmit">
            </center>
        </form>
    </div>
    <script type="text/javascript" src="/shared/js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="/shared/js/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('input[type=radio]').change(function() {
                tempAns = $(this).val();
                
            })
        })
    </script>
</body>

</html>