<?php

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
    <style>
         .wronginfo{
            display: <?php echo $status; ?>;
            margin-bottom: 20px;
            color: red;
        }
    </style>
</head>
 

<body>

<?php
    require('nav.php');
?>
    <div class="login-form">
    <div class="form-container" id="login-form">
        <h2>Login</h2>
        <form method="post">
            <input type="text" name="email" maxlength="30" placeholder="Email">
            <input type="password" name="password" maxlength="30" placeholder="Password">
            <p class="wronginfo" >Incorrect email or password</p>
            <input type="submit" name="submit1" value="Login">
        </form>
        <p class="switch-form" id="btn-register">Don't have an account? <mark class = "marked" >Register</mark></p>
    </div>

    <div class="form-container" id="register-form">
        <h2>Register</h2>
        <form method="post">
            <input type="text" name="fname" maxlength="30" placeholder="First Name" required>
            <input type="text" name="lname" maxlength="30" placeholder="Last Name" required>
            <input type="email" name="email" maxlength="30"placeholder="Email" required>
            <input type="password" id="reg-password" name="password" maxlength="30" placeholder="Password" required>
            <i class="fa-regular fa-eye" id="register-togglePassword"></i>
            <br>
            <br>
            <input type="submit" name="submit" value="Register">
        </form>
        <p class="switch-form" id="btn-login">Already have an account? <mark class = "marked" >Login</mark></p>
    </div>
</div>
</body>
</html>
<script>
    const loginTogglePassword = document.querySelector("#login-togglePassword");
    const registerTogglePassword = document.querySelector("#register-togglePassword");
    const loginPassword = document.querySelector("#login-password");
    const registerPassword = document.querySelector("#reg-password");

    loginTogglePassword.addEventListener("click", function () {
        const type = loginPassword.getAttribute("type") === "password" ? "text" : "password";
        loginPassword.setAttribute("type", type);
        if (this.className.includes("fa-regular fa-eye-slash")) {
            this.className = "fa-regular fa-eye";
        } else {
            this.className = "fa-regular fa-eye-slash";
        }
    });

    registerTogglePassword.addEventListener("click", function () {
        const type = registerPassword.getAttribute("type") === "password" ? "text" : "password";
        registerPassword.setAttribute("type", type);
        if (this.className.includes("fa-regular fa-eye-slash")) {
            this.className = "fa-regular fa-eye";
        } else {
            this.className = "fa-regular fa-eye-slash";
        }
    });
</script>

