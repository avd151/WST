<?php
// ob_start();
include_once("connect.php");
session_start();
if (isset($_POST['submit'])) {
    $username = $_POST['uname'];
    $password = $_POST['password'];
    $q = "SELECT * from person WHERE username = '$username' AND password = '$password'";
    $res = mysqli_query($conn, $q);
    $row = mysqli_fetch_assoc($res);
    if (mysqli_num_rows($res) == 0) {
        exit('<script>alert("Error: Invalid Login Credentials")</script>');
    } else {
        echo '<script>alert("Login Successful")</script>';
        $_SESSION['user_name'] = $username;
        // echo $_SESSION['user_name'];
        // $_SESSION['id'] = $row['id'];
        // $_SESSION['loggedIn'] = true;
        // header("locaton: welcome.php");
        // ob_end_flush();
        echo '<script>window.location = "welcome.php";</script>';
        exit;
    }
}
