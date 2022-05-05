<?php
   include('connect.php');
   session_start();
   
   $user_check = $_SESSION['username'];
   
   $ses_sql = "SELECT * FROM test2 WHERE user_name = '$user_check' ";
   $res = mysqli_query($conn,$ses_sql);
   
   $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
   
   $login_session = $row['user_name'];
   
   if(!isset($_SESSION['username'])){
      header("location:login.php");
      die();
   }

?>
