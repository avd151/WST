<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application form</title>
</head>

<body>

</body>
<?php
include('index.php');
$conn = mysqli_connect("localhost", "root", "", "wst");

if ($conn == false) {
    exit('<script>alert("Error: Could not connect to Database. ")</script>');
} else {
    $first_name = $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    $username = $_REQUEST['user_name'];
    $email = $_REQUEST['email_addr'];
    $state = $_REQUEST['state'];
    $country = $_REQUEST['country'];

    //Check if username already exists
    $existing = mysqli_query($conn, "SELECT * FROM students WHERE username = '" . $username . "'");
    if (mysqli_num_rows($existing)) {
        exit('<script>alert("This username already exists, please enter different username");</script>');
    }

    //Check if email already exists
    $existing_email = mysqli_query($conn, "SELECT * FROM students WHERE email = '" . $email . "'");
    if (mysqli_num_rows($existing_email)) {
        exit('<script>alert("This Email ID already exists, please enter different email address");</script>');
    }

    $sql = "INSERT INTO students (first_name, last_name, username, email, state_name, country_name) VALUES ('$first_name', '$last_name', '$username', '$email', '$state', '$country')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Record added successfully!')</script>";
    } else {
        echo "<script>alert('Error in adding Record')</script>" ;
    }
    mysqli_close($conn);
}


?>

</html>