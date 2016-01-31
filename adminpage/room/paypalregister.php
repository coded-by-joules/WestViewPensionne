<!DOCTYPE html>

<?php
error_reporting(0);
if (isset($_POST['submit'])) {
    include("../../connection.php");
    $customerid = mysqli_real_escape_string($conn,$_GET["cid"]);
    $cardnum = mysqli_real_escape_string($conn, $_POST["cardnum"]);
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $user = mysqli_real_escape_string($conn, $_POST["user"]);
    $pass = mysqli_real_escape_string($conn, $_POST["password"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $contact = mysqli_real_escape_string($conn, $_POST["contact"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $country = mysqli_real_escape_string($conn, $_POST["country"]);
    $balance=80000;
    $userlower = strtolower($user);
    $hashedPW = hash('sha256', $pass);
    $sql = "INSERT INTO tblpaypal (cardnumber,Customer_ID,firstname,lastname,uername,password,email,contact,address,country,balance)
        VALUE ('$cardnum','$customerid','$fname','$lname','$userlower','$hashedPW','$email','$contact','$address','$country',$balance)";
    if($conn ->query($sql) === TRUE) {
        echo '<script type="text/javascript">';
        echo 'alert("Successfully Registered");';
        echo 'window.location.href = "login.php";';
        echo '</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Your Username or Email Address is already use.");';
        echo 'window.location.href = "?";';
        echo '</script>';
    }
    $conn->close();
}
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pay with a debit or credit card</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background-color:#fff;">

    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">

                <div class="login-panel panel panel-info"><center><h5 style="color:rgb(255, 54, 0);">Choose a way to pay</h5></center>
                    <div class="panel-heading">
                    <center>
                        <h2 class="panel-title" style="color:rgb(19, 81, 152);">Create a PayPal account</h2>
                        <p><small><small>And pay with your debit or credit card</small></small></p>
                    </center>
                    </div>
                   
                    <div class="panel-body">
                    <div class="col-md-12">
                    <div class="col-md-8 col-md-offset-2">
                        <form role="form-group" action="" method="POST">
                        <label>Country</label>
                         <select class="form-control" name="country">
                                        <option>Select...</option>
                                        <option>Philippines</option>
                                        <option>America</option>
                                        <option>China</option>
                         </select>
                           </div>  
                   
                                <div class="col-md-8 col-md-offset-2">
                                   <div class="form-group">
                                        <label>Card Number</label>
                                        <input name="cardnum" class="form-control" placeholder="Input card Number">
                                    </div>     
                                </div>
                                <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                     <label>Payment types</label>
                                    <select class="form-control">
                                        <option>Visa</option>
                                        <option>MasterCard</option>
                                    </select>
                                </div>

                                </div>
                                <div class="col-md-8 col-md-offset-2">
                                 <div class="form-group">
                                        <label>First Name</label>
                                        <input name="fname" class="form-control" placeholder="Input First Name">
                                    </div>     
                                </div>
                                <div class="col-md-8 col-md-offset-2">
                                 <div class="form-group">
                                        <label>Last Name</label>
                                        <input name="lname" class="form-control" placeholder="Input Last Name">
                                    </div>     
                                </div>
                                <div class="col-md-8 col-md-offset-2">
                                 <div class="form-group">
                                        <label>Username</label>
                                        <input name="user" class="form-control" placeholder="Input Username">
                                    </div>     
                                </div>
                                <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                        <label>Password</label>
                                        <input name="password" class="form-control" type="password" placeholder="Input Password">
                                    </div>     
                                </div>
                                <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" class="form-control" placeholder="Input Email">
                                    </div>     
                                </div>
                                <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                        <label>Contact Number</label>
                                        <input name="contact" class="form-control" placeholder="Input Contact Number">
                                    </div>     
                                </div>
                                <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                        <label>Address</label>
                                        <input name="address" class="form-control" placeholder="Input Address">
                                    </div>     
                                </div>

                                <div class="col-md-2 col-md-offset-7" >
                                    <input type="submit" name="submit" class="btn btn-paypal" style="color:black" value="Agree and Create Account">
                                </div>
                                <div class="col-md-3 col-md-offset-7" >
                                    <a href="login.php" class="btn btn-default"> Cancel</a>
                                </div>
         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
