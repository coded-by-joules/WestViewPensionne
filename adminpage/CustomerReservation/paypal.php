
<?php
session_start();
error_reporting(0);


?>
<html>
<body>
<div style="height:auto;width:400px;background-color:rgb(211,211,211);border:2px solid;text-align:center;padding: 15px;box-shadow:2px 2px;">
<form action="Paypal.php" method="post">
<pre>
<h1>Login PayPal</h1>
UserName: 	 <input type="text" name="fname" value="<?php echo $_SESSION['Confirmation']; ?>"> </input> <br>
Password: 	<input type="text" name="lname" required> <br>
<input type="button"  value="Login">
                 <a href="registerpaypal.php">Register</a>
		</pre>
</form>
</div>
</body>
</html>

