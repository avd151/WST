<?php
session_start();
// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//     header("location: login.php");
// }
$usernm = $_SESSION['user_name'];
// echo 'in welcome: ';
// echo $usernm;
?>

<head>
    <title>Welcome </title>
    <link rel="stylesheet" href="style.css">
</head>
<html>

<body>
    <?php
    include('navbar2.php');
    ?>
    <br>
    <div class="text-center">
        <h1 class="text-center mt-3">Welcome <?php echo '@' . $usernm; ?> !</h1>
        <!-- <h2><a href="logout.php">Sign Out</a></h2>  -->
        <!-- todo: are u sure u want to logout?  -->
        <img src="images/bg2.jpg" alt="" class="bg2 m-3">
        <br>
        <a href="profile.php" class="btn btn-primary m-2">View Profile</a><br>
        <a href="viewall.php" class="btn btn-success m-2">View All Users</a><br>
        
    </div>
</body>


</html>