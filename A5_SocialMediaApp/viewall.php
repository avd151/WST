<?php
session_start();
include('navbar2.php');
$username = $_SESSION['user_name'];
include('connect.php');
$sql = "SELECT * FROM person WHERE person.username != '$username' ORDER BY upvotes DESC ";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);
if ($num_rows == 0) {
    echo "<center><h3 class='mt-3'> No Results </h3></center>";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['viewprof'])){
        $username = $_POST['username'];
        header("location: oprofile.php?name=".$username);
        exit();
    }
    if (isset($_POST['upvote'])) {
        $username = $_POST['username'];
        $sql_up = "SELECT * from person WHERE username='$username'";
        $up_res = mysqli_query($conn, $sql_up);
        $up_row = mysqli_fetch_assoc($up_res);
        $up_row['upvotes']++;
        $votes = $up_row['upvotes'];
        // echo $votes;
        $sql_upd = "UPDATE person SET upvotes='$votes' WHERE username='$username'";
        mysqli_query($conn, $sql_upd);
        
        header("location: viewall.php");
        // echo $up_row['upvotes'];
        // echo '<script>alert("Upvoted user");</script>';
        // echo '<script>document.getElementById("up").innnerHTML = "Upvoted"</script>';
        // echo '<script>document.getElementById("upSpan").textContent =' . $up_row['upvotes'] . '</script>';
        // echo json_encode($row);
    }
    // if (array_key_exists('downvote', $_POST)) {
    //    handleDownvote();
    // }
    if (isset($_POST['downvote'])) {
        include_once('connect.php');
        $username = $_POST['username'];
        $sql_up = "SELECT * from person WHERE username='$username'";
        $down_res = mysqli_query($conn, $sql_up);
        $down_row = mysqli_fetch_assoc($down_res);
        $down_row['downvotes']++;
        $votes = $down_row['downvotes'];
        // echo $votes;
        $sql_upd = "UPDATE person SET downvotes='$votes' WHERE username='$username'";
        mysqli_query($conn, $sql_upd);
        header("location: viewall.php");
        // echo $up_row['upvotes'];
        // echo '<script>alert("Upvoted user");</script>';
        // echo '<script>document.getElementById("up").innnerHTML = "Upvoted"</script>';
        // echo '<script>document.getElementById("upSpan").textContent =' . $up_row['upvotes'] . '</script>';
        // echo json_encode($row);
    }
}
while ($row = mysqli_fetch_assoc($result)) {
    // echo $row['user_name'];
    // echo $_SESSION['user_name'];

?>

    <head>
        <title>View All Users</title>
        <style>
            .card {
                width: 25%;
                height: 10%;
                border: 2px solid black;
                margin: auto;
            }

            .card-img-top {
                height: 50%;
                margin: auto;
                border: 1px solid grey;
            }

            .un {
                color: grey;
            }
        </style>
    </head>
    <div class="card mt-2 p-2">
        <img src=<?php echo $row['profile_img']; ?> class="card-img-top" alt="Profile image">
        <div class="card-body p-2 text-center">
            <h3 class="card-title text-center"><?php echo $row['name']; ?></h3>
            <h5 class="text-center un">@<?php echo $row['username']; ?></h5>
            <form method="POST" class="text-center">
                <input type="hidden" name="username" id="username" value=<?php echo $row['username']; ?>>
                <input type="submit" class="btn btn-info m-2" name="viewprof" value="View Profile"><br>
                <input type="submit" class="btn btn-success m-2" name="upvote" value="Upvote" id="up"><span id="upSpan"><?php echo ' = ' . $row['votes']; ?></span><br>
                <input type="submit" class="btn btn-danger m-2" name="downvote" value="Downvote"><span><?php echo ' = ' . $row['votes']; ?></span><br>
            </form>
        </div>
    </div>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("form").submit(function(event) {
                var formData = {
                    'username': $("input[name='username']").val()
                };

                $.ajax({
                    type: "POST",
                    url: "process.php",
                    data: formData,
                    dataType: "json",
                    encode: true,
                }).done(function(data) {
                    console.log(data);
                });

                event.preventDefault();
            });
        });
    </script> -->
<?php

}

mysqli_close($conn);

?>