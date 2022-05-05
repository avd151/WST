<title>Application : Register</title>
<?php
include('navbar.php');
?>

<body>
    <h1 class="heading1">Application Form</h1>
    <div>
        <form name="form1" target="_blank" action="" method="post" onsubmit="return validateForm()">
            <label for="fname">First name:</label><br>
            <input type="text" id="fname" name="first_name" placeholder="Enter First Name" minlength="2" required><br>

            <label for="lname">Last name:</label><br>
            <input type="text" id="lname" name="last_name" placeholder="Enter Last Name" minlength="2" required></br>

            <label for="uname">Username:</label><br>
            <input type="text" id="uname" name="user_name" placeholder="Enter UserName" minlength="4" required><br>

            <label for="email">Email ID:</label><br>
            <input type="email" id="email" name="email_addr" placeholder="Enter Email ID" required><br>

            <label for="phone">Phone number:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="Enter Phone Number" required><br>

            <label for="about">About Yourself:</label><br>
            <input type="text" id="about" name="about" placeholder="Enter About Yourself" minlength="2" required><br>

            <label for="city">City:</label><br>
            <input type="text" id="city" name="city" placeholder="Enter City" minlength="2" required><br>

            <label for="state">State:</label><br>
            <input type="text" id="state" name="state" placeholder="Enter State" minlength="2" required><br>

            <label for="country">Country:</label><br>
            <input type="text" id="country" name="country" placeholder="Enter Country" minlength="2" required><br>

            <label for="education">Highest Education:</label><br>
            <input type="text" id="education" name="education" placeholder="Enter Highest Education" minlength="2" required><br>

            <label for="skill">Skills:</label><br>
            <input type="text" id="skill" name="skill" placeholder="Enter Skills (separated by ,) " minlength="2" required><br>

            <label for="interest">Interests:</label><br>
            <input type="text" id="interest" name="interest" placeholder="Enter Interests (separated by ,)" minlength="2" required><br>

            <div class="btns">
                <input type="submit" name="submit" value="Submit" class="btn">
                <input type="reset" name="reset" value="Clear" class="btn" style="background-color: #DBD5D3;">
            </div>
        </form>
    </div>
    <script src="script.js"></script>
</body>

<?php
include('footer.php');
?>