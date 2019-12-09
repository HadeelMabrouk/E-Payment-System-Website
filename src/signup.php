<?php
    require 'dbconfig/config.php'; 
?>
<!doctype html>

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

    <script> 
        $(function(){
            $.validator.setDefaults({
                highlight: function(element){
                    $(element)
                    .closest('.form-group')
                    .addClass('has-error')
                },
                unhighlight: function(element){
                    $(element)
                    .closest('.form-group')
                    .removeClass('has-error')
                }
            });

            $.validate({
                rules:
                {	
                    password: "required",
                    firstName:  {
                        required:true,
                    },
                    
                    lastName:  {
                        required:true,
                    },
                    email: {
                        required: true,
                        email: true
                    }
                },
                    messages:{			
                        email: {
                        required: true,
                        email: true
                    }
                },
                    password: {
                        required: " Please enter password"
                    },
                    email: {
                        required: ' Please enter email',
                        email: ' Please enter valid email'
                    },
                    firstName: {
                        required: " Please enter your first name",
                    },
                    lastName: {
                        required: " Please enter your last name",
                    },
                }

            });
        });
    </script>
<html>
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



<div class="container">
    <form class="form-horizontal" role="form" action="signup.php" method="post">
        <div class="main-login-form">
            <h2>Registration</h2>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">First Name* </label>
                <div class="col-sm-9">
                    <input name="firstName" type="text" id="firstName" placeholder="First Name" class="form-control" autofocus required>
                </div>
            </div>
            <div class="form-group">
                <label for="lastName" class="col-sm-3 control-label">Last Name* </label>
                <div class="col-sm-9">
                    <input name="lastName" type="text" id="lastName" placeholder="Last Name" class="form-control" autofocus required>
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
                <label for="password" class="col-sm-3 control-label">Confirm Password*</label>
                <div class="col-sm-9">
                    <input name="cpassword" type="password" id="password" placeholder="Password" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label for="accountNumber" class="col-sm-3 control-label">Account Number*</label>
                <div class="col-sm-9">
                    <input name="accountNumber1" type="text" id="accountNumber" placeholder="Required" class="form-control" required>
                </div>
                <div class="col-sm-9">
                    <input name="accountNumber2" type="text" id="accountNumber2" placeholder="Optional" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="birthDate" class="col-sm-3 control-label">Date of Birth </label>
                <div class="col-sm-9">
                    <input name="birthDate" type="date" id="birthDate" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="phoneNumber" class="col-sm-3 control-label">Phone number </label>
                <div class="col-sm-9">
                    <input name="phoneNumber" type="phoneNumber" id="phoneNumber" placeholder="Phone number" class="form-control">
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
                <label for="country" class="col-sm-3 control-label">Country </label>
                <div class="col-sm-9">
                    <input name="country" type="text" id="country" class="form-control">
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
            
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            $accountNumber1 = $_POST['accountNumber1'];
            $accountNumber2 = $_POST['accountNumber2'];
            $birthDate = $_POST['birthDate'];
            $phoneNumber = $_POST['phoneNumber'];
            $address = $_POST['address'];
            $country = $_POST['country'];

            if($password==$cpassword)
            {
                $query = "select * from client where c_email='{$email}'";
                $query_run = mysqli_query($con,$query);
                $query2 = "SELECT * FROM credit_c WHERE c_no='{$accountNumber1}'";
                $query2_run = mysqli_query($con,$query2);
                if ($accountNumber2!=null)
                {
                    $query3 = "SELECT * FROM credit_c WHERE c_no='{$accountNumber2}'";
                    $query3_run = mysqli_query($con,$query3);
                    if(mysqli_num_rows($query_run)>0)
                    {
                        echo '<script type="text/javascript"> alert("Email Already Exists. Try another email")</script>';
                    }
                    else if(mysqli_num_rows($query2_run)>0 and mysqli_num_rows($query3_run)>0)
                    {
                        $row1 = mysqli_fetch_array($query2_run,MYSQLI_ASSOC);
                        $cno1=$row1['c_no'];
                        $row2 = mysqli_fetch_array($query3_run,MYSQLI_ASSOC);
                        $cno2=$row2['c_no'];
                        if($row1['client_c_email']==null && $row2['client_c_email']==null)
                        {
                            $query = "insert into client values ('{$email}','{$firstName}','{$lastName}','{$password}','{$phoneNumber}','{$address}','{$birthDate}','{$country}')";
                            $query_run = mysqli_query($con,$query);
                            if($query_run)
                            {
                                $sql = "UPDATE credit_c SET client_c_email = '{$email}' WHERE c_no = '{$cno1}'";
                                $result = $con->query($sql);
                                $sql = "UPDATE credit_c SET client_c_email = '{$email}' WHERE c_no = '{$cno2}'";
                                $result = $con->query($sql);
                                echo '<script type="text/javascript"> alert("Congratulations! Registeration Completed")</script>';
                                echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
                            }
                            else
                            {
                                echo '<script type="text/javascript"> alert("Error!")</script>';
                            }
                        }
                        else
                        {
                            echo '<script type="text/javascript"> alert("This credit card already belongs to another user")</script>';
                        }
                    }
                    else
                    {
                        echo '<script type="text/javascript"> alert("The inserted credit cards no does not exist in the database.")</script>';
                    }
                }
                else
                {
                    if(mysqli_num_rows($query_run)>0)
                    {
                        echo '<script type="text/javascript"> alert("Email Already Exists. Try another email")</script>';
                    }
                    else if(mysqli_num_rows($query2_run)>0)
                    {
                        $query_run = mysqli_query($con,$query);
                        $row = mysqli_fetch_array($query2_run,MYSQLI_ASSOC);
                        $cno=$row['c_no'];
                        if($row['client_c_email']==null)
                        {
                            $query = "insert into client values ('{$email}','{$firstName}','{$lastName}','{$password}','{$phoneNumber}','{$address}','{$birthDate}','{$country}')";
                            $query_run=mysqli_query($con,$query);
                            $sql = "UPDATE credit_c SET client_c_email = '{$email}' WHERE c_no = '{$cno}'";
                            $result = $con->query($sql);
                            if($query_run)
                            {
                                echo '<script type="text/javascript"> alert("Congratulations! Registeration Completed")</script>';
                                echo "<script type='text/javascript'> document.location = 'login.php'; </script>";   
                            }
                            else
                            {
                                echo '<script type="text/javascript"> alert("Error!")</script>';
                            }
                        }
                        else
                        {
                            echo '<script type="text/javascript"> alert("This credit card already belongs to another user")</script>';
                        }
                    }
                    else
                    {
                        echo '<script type="text/javascript"> alert("The inserted credit card no does not exist in the database.")</script>';
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