<?php
require('nav.html');
require('reg.php');
require('log.php')

?>
<html>

<head>
    <title>Login and Register Form</title>
    <link href="https://fonts.googleapis.com/css?family=Blinker" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="login-register.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Show login form by default
            $("#register-form").hide();

            // Switch to register form
            $("#btn-register").click(function() {
                $("#login-form").hide();
                $("#register-form").show();
            });

            // Switch to login form
            $("#btn-login").click(function() {
                $("#register-form").hide();
                $("#login-form").show();
            });
        });
    </script>
</head>

<body>
    <div class="login-form">
    <div class="form-container" id="login-form">
        <h2>Login</h2>
        <form method="post">
            <input type="text" name="email" maxlength="10" placeholder="Email">
            <input type="password" name="password" maxlength="10" placeholder="Password">
            <input type="submit" name="submit1" value="Login">
        </form>
        <p class="switch-form" id="btn-register">Don't have an account? <mark class = "marked" >Register</mark></p>
    </div>
</div>
    <div class="form-container" id="register-form">
        <h2>Register</h2>
        <form method="post">
            <input type="text" name="fname" maxlength="10" placeholder="First Name">
            <input type="text" name="lname" maxlength="10" placeholder="Last Name">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password"  placeholder="Password">
            <input type="submit" name="submit" value="Register">
        </form>
        <p class="switch-form" id="btn-login">Already have an account? <mark class = "marked" >Login</mark></p>
    </div>
</body>
</html>
