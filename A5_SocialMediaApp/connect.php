<?php
$conn = mysqli_connect("localhost", "root", "", "wst");

if ($conn == false) {
    exit('<script>alert("Error: Could not connect to Database. ")</script>');
}

?>