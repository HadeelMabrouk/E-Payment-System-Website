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

<!-- Where all the magic happens -->
<!-- LOGIN FORM -->
<div class="container">
    <form class="form-horizontal" role="form" action="transactionsHistory.php" method="post">
        <h2>Transaction History</h2>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left">
                <div class="main-login-form">
                    <h4>Transaction Id - Date - Value - Sender Acc - Reciever Email</h4>
                    <?php
                        $email = $_SESSION['email'];
                        $sql = "SELECT * FROM trans WHERE credit_card_credit_no in (SELECT c_no FROM credit_c WHERE client_c_email='{$email}')";
                        $result = $con->query($sql);
                        if (!$result)
                        {
                            echo '<script type="text/javascript"> alert("Query Failed.")</script>';
                        }
                        else if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<br>------------------------------------------------------------------------------------------------------<br>";
                                echo "<br> ". $row["t_id"]. " - ". $row["t_date"]. " - ". $row["v"]. " - " . $row["credit_card_credit_no"] . " - " . $row["beneficiary_b_email"] . "<br>";
                                }
                        } 
                        else {
                            echo "";
                        }
                    ?>

                    <button type="submit" class="btn btn-block" formaction="makeTransaction.php">New Transaction</button>
                    <button name="signout" type="submit" class="btn btn-block" formaction="home.php">Sign Out</button>

                </div>
            </form>
        </div>
    </form>
    <?php
        if(isset($_POST['signout']))
        {
            session_destroy();
             echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
                        
        }
    ?>
    <!-- end:Main Form -->
</div></html>