<?php
include("navbar.php");
?>
<head>
    <title>Login</title>
</head>
<div class="container mt-4">
    <h1>Login</h1>
    <!-- do confirm password  -->
    <form method="POST" action="auth.php">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" id="uname" placeholder="Enter Username" name="uname" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
        </div>
        <!-- <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm" placeholder="Enter Password">
        </div> -->
        <button type="submit" class="btn btn-success" name="submit">Submit</button>
        <h5 class="mt-3">Haven't Registered, visit <a href="register.php">Sign Up Page!</a></h5>
    </form>
</div>