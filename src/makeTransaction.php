<?php
    session_start();
    require 'dbconfig/config.php'; 
?>
<!doctype html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>

<script type="text/javascript">
$(document).ready(function () {
    $('#checkBtn').click(function() {
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        alert("You must check at least one checkbox.");
        return false;
      }

    });
});

</script>


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
    <form class="form-horizontal" role="form" action="makeTransaction.php" method="post">
        <h2>Make Transaction</h2>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" action="makeTransaction.php" method="post">
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="beneficiaryAccount" class="col-sm-3 control-label">Credit Card Number</label>
                            <div class="col-sm-9">
                                <input name="saccount" type="text" id="account" class="form-control" name="account" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="beneficiaryAccount" class="col-sm-3 control-label">Beneficiary Account</label>
                            <div class="col-sm-9">
                                <input name="taccount" type="text" id="account" class="form-control" name="account" required>
                            </div>
                        </div>
                        <div class="form-group login-group-checkbox">
                            <label for="selectItems" class="col-sm-3 control-label">Select Items (Please Select At Least One Item)</label>
                            <div class="col-sm-9">
                                <label for="space" class="col-sm-3 control-label"> </label>
                                <input name="soda" type="checkbox" class="" name="acc_type" id="client" required>
                                <label for="food">Soda $5 (Default)</label>
                            </div>
                            <div class="col-sm-9">
                                <label for="space" class="col-sm-3 control-label"> </label>
                                <input name="cake" type="checkbox" class="" name="acc_type" id="client">
                                <label for="food">Cake $10</label>
                            </div>
                            <div class="col-sm-9">
                                <label for="space" class="col-sm-3 control-label"> </label>
                                <input name="chocolate" type="checkbox" class="" name="acc_type" id="client">
                                <label for="food">Chocolate $8</label>
                            </div>
                            <div class="col-sm-9">
                                <label for="space" class="col-sm-3 control-label"> </label>
                                <input name="moltenCake" type="checkbox" class="" name="acc_type" id="client">
                                <label for="food">Molten Cake $20</label>
                            </div>
                            <div class="col-sm-9">
                                <label for="space" class="col-sm-3 control-label"> </label>
                                <input name="hotChocolate" type="checkbox" class="" name="acc_type" id="client">
                                <label for="food">Hot Chocolate $15</label>
                            </div>

                        </div>
                    </div>
                    <button name="submit" type="submit" class="btn btn-block">Submit Transaction</button>
               </div>
            </form>
        </div>
    </form>

    
    <?php
        if(isset($_POST['submit']))
        {        
            $saccount = $_POST['saccount'];
            $taccount = $_POST['taccount'];
            $email = $_SESSION['email'];
            $value = 0;
            $tid = strval(time());
            $date = date("Y-m-d");
            if (isset($_POST['soda']))
            {
                $value = $value + 5;
            }
            if (isset($_POST['cake']))
            {
                $value = $value + 10;
            }
            if (isset($_POST['chocolate']))
            {
                $value = $value + 8;
            }
            if (isset($_POST['hotChocolate']))
            {
                $value = $value + 15;
            }
            if (isset($_POST['moltenCake']))
            {
                $value = $value + 20;
            }
            $sql = "SELECT * FROM credit_c WHERE client_c_email='{$email}' AND c_no='{$saccount}'";
            $result = mysqli_query($con,$sql);
            if (!$result)
            {
                echo '<script type="text/javascript"> alert("Invalid Query")</script>';
            }
            else if($result->num_rows > 0)
            {
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $balance=$row['c_balance'];
                if($balance >= $value)
                {
                    $sql = "SELECT * FROM beneficiary WHERE b_accountno = '{$taccount}';";
                    $result = $con->query($sql);
                    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                    $benef=$row['b_email'];
                    if($result->num_rows > 0)
                    {
                        $sql = "insert into trans values ('{$tid}',{$value},'{$benef}','{$saccount}','{$date}')";
                        $query_run = mysqli_query($con,$sql);
                        if($query_run)
                        {
                            $sql = "UPDATE credit_c SET c_balance=c_balance - $value WHERE c_no='{$saccount}'";
                            $result = $con->query($sql);
                            $sql = "UPDATE beneficiary SET profit=profit + $value WHERE b_accountno = '{$taccount}'";
                            $result = $con->query($sql);
                            $_SESSION['tid']=$tid;
                            $_SESSION['tdate']=$date;
                            $_SESSION['value']=$value;
                            $_SESSION['saccount']=$saccount;
                            $_SESSION['taccount']=$taccount;
                            echo "<script type='text/javascript'> document.location = 'successfulTransaction.php'; </script>";
                        }
                        else
                        {
                            echo '<script type="text/javascript"> alert("Transaction Failed")</script>';
                        }
                    }
                    else
                    {
                        echo '<script type="text/javascript"> alert("This beneficiary account is not registered.")</script>';
                    }
                }
                else
                {
                    echo '<script type="text/javascript"> alert("Transaction Failed. No enough balance in the account.")</script>';
                }

            }
            else
            {
                echo '<script type="text/javascript"> alert("Credit card not recorded.")</script>';
            }

        }
    ?>
    <!-- end:Main Form -->
</div></html>