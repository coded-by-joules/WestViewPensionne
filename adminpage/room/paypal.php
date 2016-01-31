
<?php
session_start();
error_reporting(0);
$user = $_POST['username'];
	include('../connection.php');
	$pass = $_POST['password'];
	$userlower = strtolower($user);
    $hashedPW = hash('sha256', $pass);
	$sql = "SELECT * FROM tblpaypal WHERE username='$userlower' AND password='$hashedPW'";
	$query = $conn->query($sql);
	if ($query->num_rows==1) {
		header('Location: paypalupdate.php');
	}
?>
<html>
<body>
<div style="height:auto;width:400px;background-color:rgb(211,211,211);border:2px solid;text-align:center;padding: 15px;box-shadow:2px 2px;">
<form action="paypalupdate.php" method="post">
<pre>
<h1>Login PayPal</h1>
<p>Confirmation Code:  <?php echo $_SESSION['Confirmation']; ?></p>
UserName: 	<input type="text" name="username" required> </input> <br>
Password: 	<input type="password" name="password" required> <br>
<input name="submit" type="submit"  value="Login">
<a href="registerpaypal.php">Register</a>
</pre>
</form>
</div>
</body>
</html>

