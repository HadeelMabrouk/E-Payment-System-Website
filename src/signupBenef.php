<?php
    session_start();
    require 'dbconfig/config.php'; 
?>
<!doctype html>
<head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
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
    
    <div class="container">
    <form class="form-horizontal" role="form" action="signupBenef.php" method="post">
        <div class="main-login-form">
            <h2>Registration</h2>
            <div class="form-group">
                <label for="legalFirstName" class="col-sm-3 control-label">Legal First Name* </label>
                <div class="col-sm-9">
                    <input name="legalFirstName" type="text" id="legalFirstName" placeholder="Legal First Name" class="form-control" autofocus required>
                </div>
            </div>
            <div class="form-group">
                <label for="legalLastName" class="col-sm-3 control-label">Legal Last Name* </label>
                <div class="col-sm-9">
                    <input name="legalLastName" type="text" id="legalLastName" placeholder="Legal Last Name" class="form-control" autofocus required>
                </div>
            </div>
            <div class="form-group">
                <label for="businessName" class="col-sm-3 control-label">Business Name* </label>
                <div class="col-sm-9">
                    <input name="businessName" type="text" id="businessName" placeholder="Business Name" class="form-control" autofocus required>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email* </label>
                <div class="col-sm-9">
                    <input name="email" type="email" id="email" placeholder="Email" class="form-control" name="email" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Password*</label>
                <div class="col-sm-9">
                    <input name="password" type="password" id="password" placeholder="Password" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label for="cpassword" class="col-sm-3 control-label">Confirm Password*</label>
                <div class="col-sm-9">
                    <input name="cpassword" type="password" id="cpassword" placeholder="Confirm Password" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label for="accountNumber" class="col-sm-3 control-label">Account Number*</label>
                <div class="col-sm-9">
                    <input name="accountNumber" type="text" id="accountNumber" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label for="phoneNumber" class="col-sm-3 control-label">Business Phone number </label>
                <div class="col-sm-9">
                    <input name="phoneNumber" type="phoneNumber" id="phoneNumber" placeholder="Business Phone number" class="form-control">
                    <span class="help-block">Your phone number won't be disclosed anywhere </span>
                </div>
            </div>
            <div class="form-group">
                <label for="Address" class="col-sm-3 control-label">Address </label>
                <div class="col-sm-9">
                    <input name="address" type="text" id="address" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <span class="help-block">*Required fields</span>
                </div>
            </div>
            <button name="submit" type="submit" class="btn btn-block">Register</button>
            <div class="etc-login-form">
                <p>Already registered? <a href="login.php"> login</a></p>
            </div>

        </div>
    </form> <!-- /form -->
    <?php
        if(isset($_POST['submit']))
        {
            //echo '<script type="text/javascript"> alert("Signup Button clicked")</script>';
            
            $legalFirstName = $_POST['legalFirstName'];
            $legalLastName = $_POST['legalLastName'];
            $businessName = $_POST['businessName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            $accountNumber = $_POST['accountNumber'];
            $phoneNumber = $_POST['phoneNumber'];
            $address = $_POST['address'];

            if($password==$cpassword)
            {
                $query = "select * from beneficiary where b_email='{$email}'";
                $query_result = mysqli_query($con,$query);

                if(mysqli_num_rows($query_result)>0)
                {
                    echo '<script type="text/javascript"> alert("User Already Exists. Try another email or login")</script>';
                }
                else
                {
                    $query = "insert into beneficiary values ('{$email}','{$legalFirstName}','{$legalLastName}','{$businessName}','{$password}','{$accountNumber}',0,'{$address}','{$phoneNumber}')";
                    $query_run = mysqli_query($con,$query);
                    if($query_run)
                    {
                        $_SESSION['email']=$email;
                        $_SESSION['profit']=0;
                        echo '<script type="text/javascript"> alert("Congratulations! Registeration Completed")</script>'; 
                        echo "<script type='text/javascript'> document.location = 'profit.php'; </script>";
                    }
                    else
                    {
                        echo '<script type="text/javascript"> alert("Error!")</script>';
                    }
                }
                
            }
            else
            {
                echo '<script type="text/javascript"> alert("Passwords do not match")</script>';
            }
          
        }
    ?>
</div> <!-- ./container --></html>
