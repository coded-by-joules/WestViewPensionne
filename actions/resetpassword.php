<?php
//error_reporting(0);
include('../connection.php');
$username = mysqli_real_escape_string($conn, $_GET['username']);
$hash = mysqli_real_escape_string($conn, $_GET['key']);
$sql="select * from tblusers where Username='$username' AND Code = '$hash'";
$msg = '';
$result = $conn->query($sql);
if (isset($_POST['submit'])) {
	$newpass = mysqli_real_escape_string($conn, $_POST['password']);
	$repass = mysqli_real_escape_string($conn, $_POST['retypepass']); 
	if (empty($newpass)||empty($repass)) {
		
	} else {
		if ($newpass==$repass) {
			$hashedPW = hash('sha256', $newpass);
			$code = md5(uniqid(rand(), true));
			$update = $conn->query("UPDATE tblusers SET Password = '$hashedPW', Code = '$code' WHERE Username='$username' AND Code = '$hash'");
			if ($update === TRUE) {
				$msg = 'Password has been changed. <a href="../index.php">Click here to Login</a>';
			} else {
				$msg = 'Password could not be reset';
			}
		} else {
			$msg = 'Password do not Match';
		}
	}
	$conn->close();
}
?>
<!DOCTYPE HTML>
<html>
<head>
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=2">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Westview Pensione House - Cebu | Location</title>
    <link href="../hotelpage/css/bootstrap.min.css" rel="stylesheet">
    <!--Icon-->
    <link href="./hotelpage/images/westview.png" type="image/png" rel="icon">
    <!-- Custom CSS -->
    <link href="../hotelpage/css/modern-business.css" rel="stylesheet">
    <link href="../hotelpage/css/westview.css" rel="stylesheet">
    <link href="../hotelpage/css/bootstrap-social/bootstrap-social.css" rel="stylesheet">

 

    <!-- Custom Fonts -->
    <link href="../hotelpage/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../hotelpage/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="../hotelpage/js/main.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>  
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="nav-bar-head">
                <div class="head-logo">
                <div class=" logo">
                            <a href="index.php">
                                <img id="header-logo" src="../hotelpage/images/westview.png">
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
 
                     <li>
                        <h4 style="color:#fff">Westview Pension House - Cebu  <i class="fa fa-phone"> </i> (+64) 1234 567 890 </h4 >
                    </li>
       
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	<div class="container" style="margin-top:65px;">
		<div class="col-lg-8 col-lg-offset-2">
	<?php
		if ($result->fetch_assoc()>0) {
	?>
	<div class="row">
		<div class="col-lg-12">
                    <h1 class="page-header">Reset Password</h1>
                </div>
     <div class="row">
	 <div class="col-lg-12">
	 <div class="panel-body">
	 <div class="row">
	 <div class="col-lg-7 col-lg-offset-2">
	 <div class="form-group">
	<form  method="post" action="">
		<label>New Password </label>
		<blockquote style="border-color:green">
		<input class="form-control" type="password" name="password" placeholder="New Password" required/>
		</blockquote>
	 </div>
	 </div>
	 <div class="col-lg-7 col-lg-offset-2">
	 <div class="form-group">
	 	<blockquote style="border-color:orange">
		<input class="form-control" type="password" name="retypepass" placeholder="Retype Password" required/>
		</blockquote>
		<p><?php echo $msg?></p>
	 </div>
	 </div>
	  <div class="col-lg-7 col-lg-offset-7">
	 <div class="form-group">
	 	
		<input class="btn btn-primary" type="submit" name="submit" value="Save">
		
	</div>
	 </div></div>
	</form>
	
	 </div>
	</div>     	
	</div>
		</div>
	 </div>
	</div>
	<?php 
	} else {
		echo 'Loading...';
		header('Location: ../index.php');
	}
	?>
	
	  <footer>
	<div class="container">
            <div class="row">
                <div class="col-lg-6">
                      <p>Copyright 2015 by Westview Pensione House. All Rights Reserved.</p>
                </div>
                 
            </div>
        </footer>
       </div>

</body>
</html>