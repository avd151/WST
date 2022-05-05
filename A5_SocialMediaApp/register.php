<?php
include("navbar.php");
include_once("connect.php");
// $conn = mysqli_connect("localhost", "root", "", "wst");

// if ($conn == false) {
//     exit('<script>alert("Error: Could not connect to Database. ")</script>');
// }
$uploadDir = "images/";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $about = $_POST['about'];
    $img_file = $_FILES['profileImg']["name"];
    $address = $_POST['address'];
    $education = $_POST['education'];
    $skills = $_POST['skills'];
    $interests = $_POST['interests'];
    $password = $_POST['password'];

    //Check if username already exists
    $existing = mysqli_query($conn, "SELECT * FROM person WHERE username = '" . $username . "'");
    if (mysqli_num_rows($existing)) {
        exit('<script>alert("This username already exists, please enter different username");</script>');
    }

    //Check if email already exists
    $existing_email = mysqli_query($conn, "SELECT * FROM person WHERE email = '" . $email . "'");
    if (mysqli_num_rows($existing_email)) {
        exit('<script>alert("This Email ID already exists, please enter different email address");</script>');
    }

    //Upload profile image in local folder
    $uploadFile = $uploadDir . $img_file;
    if (move_uploaded_file($_FILES['profileImg']['tmp_name'], $uploadFile))
        echo '<script>alert("File uploaded successfully ")</script>';
    else
        echo '<script>alert("Error in file upload ")</script>';

    //Insert into table
    //todo: 2 tables - signin - for login-register - try later 
    //1 table for all details
    $insert_q = "INSERT INTO person (name, email, username, phone_no, profile_img, about, address, education, skills, interests, password) VALUES ('$name', '$email', '$username','$phone','$uploadFile','$about','$address', '$education','$skills','$interests','$password')";
    if (mysqli_query($conn, $insert_q)) {
        echo "<script>alert('Registration successful!')</script>";
    } else {
        echo "<script>alert('Error in Registration')</script>";
    }
}
mysqli_close($conn);
?>

<head>
    <title>Register</title>
</head>
<div class="container mt-4">
    <h1>Register</h1>
    <form method="POST" action="" onsubmit="return validateForm()" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email Address" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="uname" class="form-control" name="uname" id="uname" placeholder="Enter Username" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter Phone Number" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Profile Image</label>
            <input type="file" class="form-control" name="profileImg" id="profileImg" required>
        </div>
        <div class="mb-3">
            <label class="form-label">About</label>
            <input type="text" class="form-control" name="about" id="about" placeholder="Enter About yourself" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Address(City, State, Country)</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address(City, State, Country)" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Highest Education</label>
            <input type="text" class="form-control" name="education" id="education" placeholder="Enter Highest Education" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Skills</label>
            <input type="text" class="form-control" name="skills" id="skills" placeholder="Enter Skills" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Interests</label>
            <input type="text" class="form-control" name="interests" id="interests" placeholder="Enter Interests" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
        </div>
        <div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <button type="reset" name="reset" class="btn btn-danger">Clear</button>
        </div>
        <h5 class="mt-3">Registered Already, visit <a href="login.php">Login Page!</a></h5>
    </form>
</div>