<?php
    session_start();
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

<div class="container">
    <form class="form-horizontal" role="form" action="login.php" method="post">
        <h2>login</h2>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left">
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input name="email" type="email" id="email" placeholder="Email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input name="password" type="password" id="password" placeholder="Password" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group login-group-checkbox">
                            <label for="space" class="col-sm-3 control-label"> </label>
                            <input name="acctype" value="client" type="radio" class="" name="acc_type" id="client" required>
                            <label for="client">Client</label>

                            <input name="acctype" value="beneficiary" type="radio" class="" name="acc_type" id="beneficiaryAccount" required>
                            <label for="beneficiaryAccount">Beneficiary Account</label>
                        </div>
                    </div>
                    <button name="submit" type="submit" class="btn btn-block">Login</button>
                </div>
                <div class="etc-login-form">
                    <p>new user? <a href="home.php"> create new account</a></p>
                </div>
            </form>
        </div>
    </form>
    <?php
        if(isset($_POST['submit']))
        {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $type = $_POST['acctype'];
            if($type=="client")
            {
                $query = "select * from client where c_email='{$email}' and c_password='{$password}'";
                $query_run=mysqli_query($con,$query);
                if(mysqli_num_rows($query_run)>0)
                {
                    //valid
                    $_SESSION['email']=$email;
                    echo "<script type='text/javascript'> document.location = 'transactionsHistory.php'; </script>";
                }
                else
                {
                    echo '<script type="text/javascript"> alert("Invalid Credentials")</script>';
                }
            }
            else if($type=="beneficiary")
            {
                $query = "select * from beneficiary where b_email='{$email}' and b_passwrod='{$password}'";
                $query_run=mysqli_query($con,$query);
                if(mysqli_num_rows($query_run)>0)
                {
                    //valid
                    $_SESSION['email']=$email;
                    $query = "select profit from beneficiary where b_email='{$email}'";
                    $query_run=mysqli_query($con,$query);
                    $row = $query_run->fetch_assoc();
                    $_SESSION['profit']=$row['profit'];
                    echo "<script type='text/javascript'> document.location = 'profit.php'; </script>";
                }
                else
                {
                    echo '<script type="text/javascript"> alert("Invalid Credentials")</script>';
                }
            }
            else
            {
                echo '<script type="text/javascript"> alert("Error!")</script>';
            }
        }
    ?>
    <!-- end:Main Form -->
</div></html>