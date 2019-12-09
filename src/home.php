<?php
    require 'dbconfig/config.php'; 
?>
<!doctype html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>

<style>
    body {
                background-image: url("background.jpg");
                background-size: cover;
            }

            *[role="form"] {
                max-width: 530px;
                padding: 15px;
                margin: 0 auto;
                margin-top: 10%;
                margin-bottom: 10%;
                border-radius: 0.3em;
                background-color: #f2f2f2;
            }

            *[role="form"] h2 { 
                font-family: 'Open Sans' , sans-serif;
                font-size: 40px;
                font-weight: 600;
                color: #000000;
                margin-top: 5%;
                text-align: center;
                text-transform: uppercase;
                letter-spacing: 4px;
            }
</style>

<html>
    <!-- All the files that are required -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<!-- Where all the magic happens -->
<!-- LOGIN FORM -->
<div class="container">
    <form class="form-horizontal" role="form">
        <h2>welcome to our online payment system</h2>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left">
                <div class="main-login-form">

                    <button type="submit" class="btn btn-block" formaction="signup.php">Sign Up As Client</button>

                    <button type="submit" class="btn btn-block" formaction="signupBenef.php">Sign Up As Beneficiary Account</button>

                    <button type="submit" class="btn btn-block" formaction="login.php">Login</button>

                </div>
            </form>
        </div>
    </form>
    <!-- end:Main Form -->
</div></html>