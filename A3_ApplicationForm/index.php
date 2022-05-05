<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form - Apply</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include('navbar.php');
    $conn = mysqli_connect("localhost", "root", "", "wst");

    if ($conn == false) {
        exit('<script>alert("Error: Could not connect to Database. ")</script>');
    } else if (isset($_POST['submit'])) {
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
            echo "<script>alert('Error in adding Record')</script>";
        }
        mysqli_close($conn);
    }
    ?>
    <h1 class="heading1">Application Form</h1>
    <div>
        <form name="form1" target="_blank" action="" method="post" onsubmit="return validateForm()">
            <label for="fname">First name:</label><br>
            <input type="text" size="35" id="fname" name="first_name" placeholder="Enter First Name" minlength="2" required><br>

            <label for="lname">Last name:</label><br>
            <input type="text" size="35" id="lname" name="last_name" placeholder="Enter Last Name" minlength="2" required></br>

            <label for="uname">Username:</label><br>
            <input type="text" size="35" id="uname" name="user_name" placeholder="Enter UserName" minlength="4" required><br>

            <label for="email">Email ID:</label><br>
            <input type="email" size="35" id="email" name="email_addr" placeholder="Enter Email ID" required><br>

            <label for="state">State:</label><br>
            <input type="text" size="35" id="state" name="state" placeholder="Enter State" minlength="2" required><br>

            <label for="country">Country:</label><br>
            <input type="text" size="35" id="country" name="country" placeholder="Enter Country" minlength="2" required><br>

            <div class="btns">
                <input type="submit" name="submit" value="Submit" class="btn">
                <input type="reset" name="reset" value="Clear" class="btn" style="background-color: #DBD5D3;">
            </div>
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>