<?php
session_start();
include('navbar2.php');
include_once('connect.php');
$name = $_GET['name'];
// echo '<script>alert("USer exists")</script>';
// echo 'In view all\n';
// echo $username;

$q = "SELECT * from person WHERE username = '$name'";
$res = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($res);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['back'])) {
        header('location: viewall.php');
        exit();
    }
}
?>

<head>
    <title><?php echo $name . "'s Profile"; ?></title>
    <style>
        .card {
            align-items: center;
            border: 2px solid black;
            width: 70%;
            margin: auto;
            margin-top: 5%;
        }

        .card-img-top {
            width: 30%;
            height: 30%;
            border: 2px solid black;
            border-radius: 50%;
        }

        .un {
            color: grey;
        }
    </style>
</head>

<body>
    <div class="card p-3">
        <img src=<?php echo $row['profile_img']; ?> class="card-img-top" alt="Profile image">
        <div class="card-body">
            <h3 class="card-title text-center"><?php echo $row['name']; ?></h3>
            <h5 class="text-center un">Username: <?php echo $row['username']; ?></h5>
            <br>
            <h5>Email ID: <span style="color: purple;"><?php echo $row['email']; ?></span></h5>
            <h5>Phone Number: <span style="color: purple;"><?php echo $row['phone_no']; ?> </span></h5>
            <h5>About yourself:<span style="color: purple;"> <?php echo $row['about']; ?></span> </h5>
            <h5>Address: <span style="color: purple;"><?php echo $row['address']; ?></span> </h5>
            <h5>Highest Education: <span style="color: purple;"><?php echo $row['education']; ?></span> </h5>
            <h5>Skills: <span style="color: purple;"><?php echo $row['skills']; ?></span> </h5>
            <h5>Interests: <span style="color: purple;"><?php echo $row['interests']; ?> </span></h5>
            <h5>Upvotes = <span style="color: purple;"><?php echo $row['upvotes']; ?> </span></h5>
            <h5>Downvotes = <span style="color: purple;"><?php echo $row['downvotes']; ?> </span></h5>
        </div>
        <form method="POST">
            <input type="submit" class="btn btn-info p-3" name="back" id="back" value="Go Back">
        </form>
    </div>

</body>