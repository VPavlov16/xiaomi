<?php

require('reg.php');
require('log.php')

?>
<html>

<head>
    <title>Login and Register Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-image: url("images/mi-bg.webp");
            background-repeat: no-repeat;
            background-size:cover;
            background-position:center;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .form-container {
            background-color: rgb(0, 0, 0,0.5);
            border-radius: 10px;
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            margin-top: 13em;
            text-align: center;
            place-items:center;
        }

        .form-container h2 {
            color: coral;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .form-container input[type="text"],
        .form-container input[type="password"],
        .form-container input[type="email"] {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            background-color: #f6f6f6;
            color: #333;
        }

        .form-container input[type="text"]::placeholder,
        .form-container input[type="password"]::placeholder,
        .form-container input[type="email"]::placeholder {
            color: #999;
        }

        .form-container input[type="submit"] {
            background-color: coral;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .form-container input[type="submit"]:hover {
            background-color: #ff9800;
        }

        .form-container .switch-form {
            color: coral;
            cursor: pointer;
            font-size: 14px;
        }
    </style>
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
    
    <div class="form-container" id="login-form">
        <h2>Login</h2>
        <form method="post">
            <input type="text" name="email" maxlength="10" placeholder="Email">
            <input type="password" name="password" maxlength="10" placeholder="Password">
            <input type="submit" name="submit1" value="Login">
        </form>
        <p class="switch-form" id="btn-register">Don't have an account? Register</p>
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
        <p class="switch-form" id="btn-login">Already have an account? Login</p>
    </div>
        </body>
        </html>
