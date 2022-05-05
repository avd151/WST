<?php

include_once('connect.php');

$no = 1;
if (isset($_POST['value'])){
	$take = $_POST['value'];
	$username = $_POST['name'];
	if (!empty($take) || !empty($username)){
		echo '<div id="quizDiv">';
		echo '<form action="submit.php" method="POST">';
		echo '<input type="hidden" name="nameofuser" value="'.$username.'">';
		
        
        //Get questions
		$sql_ques = "SELECT * FROM questions";
		$ques_result = mysqli_query($conn, $sql_ques);
		while ($row = mysqli_fetch_assoc($ques_result)){
			$id = $row['id'];
			$question = $row['question'];
			$op1 = $row['op1'];
			$op2 = $row['op2'];
			$op3 = $row['op3'];
            $op4 = $row['op4'];
			$answer = $row['answer'];
			
			echo '<br><div>';
			echo '<h3>Question #'.$no.'</h3><br>';
			echo '<p>'.$question.'</p><br>';
			echo '<input type="radio" name="'.$id.'" value="'.$op1.'" id="'.$op1.'">'.$op1. '<br>';
			echo '<input type="radio" name="'.$id.'" value="'.$op2.'" id="'.$op2.'">'.
            $op2 . '<br>';
			echo '<input type="radio" name="'.$id.'" value="'.$op3.'" id="'.$op3.'">'.
            $op3 . '<br>';
            echo '<input type="radio" name="' . $id . '" value="' . $op4 . '" id="' . $op4 . '">' .
            $op4 . '<br>';
			echo '</div>';
			$no++;
		}
		echo '<br><button name="submit" type="submit" id="btnSubmit">&nbsp;Submit Quiz&nbsp;</button>';
		echo '</form>';
		echo '</div>';
	}
}
