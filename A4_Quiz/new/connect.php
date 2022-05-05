<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "wst";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn == false) {
    exit('<script>alert("Error: Could not connect to Database. ")</script>');
}
// else{
//     echo '<script>alert("Connected to Database Successfully!")</script>';
// }
?>