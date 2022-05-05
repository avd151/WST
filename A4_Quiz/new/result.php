<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Website</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include('navbar.php');

    ?>
    <br>
    <center>
        <h1>Results of all users who have taken the Quiz: </h1>

        <!-- Display Results  -->
        <?php
        $no = 1;
        include_once('connect.php');
        echo '<table class="tbl"><thead><tr><th>#</th><th>Name</th><th>Score</th></tr></thead><tbody>';
        $sql_users = "select * from users ORDER BY score DESC";
        $users_result = mysqli_query($conn, $sql_users);
        while ($row = mysqli_fetch_assoc($users_result)) {
            // $id = $row['id'];
            $name = $row['name'];
            $score = $row['score'];
            echo '<tr class="tr-item"><td>' . $no . ' ' . '</td><td>' . $name . ' ' . '</td><td>' . $score . ' ' . '</td></tr>';
            $no++;
        }
        echo '</tbody></table>';
        echo '</div>';
        ?>
    </center>
</body>

</html>