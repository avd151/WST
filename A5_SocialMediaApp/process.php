<?php
include_once('connect.php');
$username = $_POST['username'];
if (isset($_POST['viewprof'])) {
    header("location: oprofile.php?name=". $username);
}
if (isset($_POST['upvote'])) {
    $username = $_POST['username'];
    $sql_up = "SELECT * from person WHERE username='$username'";
    $up_res = mysqli_query($conn, $sql_up);
    $up_row = mysqli_fetch_assoc($up_res);
    $up_row['upvotes'] += 1;
    echo $up_row['upvotes'];
    // echo json_encode($row);
}

if (isset($_POST['downvote'])) {
    $username = $_POST['username'];
    $sql_down = "SELECT * from person WHERE username='$username'";
    $down_res = mysqli_query($conn, $sql_down);
    $down_row = mysqli_fetch_assoc($down_res);
    $down_row['downvotes'] += 1;
    echo $down_row['downvotes'];
    // echo json_encode($row);
}
?>