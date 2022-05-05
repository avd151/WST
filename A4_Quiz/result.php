<?php
include_once("connect.php");

$no = 1;
if (isset($_POST['value'])) {
    echo '<div id="resultDiv"><p>Enter your name and click Take Quiz button!</p><br>';
    echo '<table><thead><tr><th>#</th><th>Name</th><th>Score</th></tr></thead><tbody>';
    $sql_users = "select * from users";
    $users_result = mysqli_query($conn, $sql_users);
    while ($row = mysqli_fetch_assoc($users_result)) {
        // $id = $row['id'];
        $name = $row['name'];
        $score = $row['score'];
        echo '<tr><td>' . $no . '</td><td>' . $name . '</td><td>' . $score . '</td></tr>';
        $no++;
    }
    echo '</tbody></table>';
    echo '</div>';
}
