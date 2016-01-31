
<?php
error_reporting(0);
session_start();
if (isset($_POST['submit'])) {
	include("../connection.php");
	$cardnum = mysqli_real_escape_string($conn, $_POST["cardnum"]);
	$fname = mysqli_real_escape_string($conn, $_POST["fname"]);
	$lname = mysqli_real_escape_string($conn, $_POST["lname"]);
	$user = mysqli_real_escape_string($conn, $_POST["user"]);
	$pass = mysqli_real_escape_string($conn, $_POST["password"]);
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$contact = mysqli_real_escape_string($conn, $_POST["contact"]);
	$address = mysqli_real_escape_string($conn, $_POST["address"]);
	$country = mysqli_real_escape_string($conn, $_POST["country"]);
	$userlower = strtolower($user);
	$hashedPW = hash('sha256', $pass);
	$sql = "INSERT INTO tblpaypal (cardnumber,firstname,lastname,uername,password,email,contact,address,country)
		VALUE ('$cardnum','$fname','$lname','$userlower','$hashedPW','$email','$contact','$address','$country')";
	if($conn ->query($sql) === TRUE) {
		echo '<script type="text/javascript">';
	 	echo 'alert("Successfully Registered");';
	  	echo 'window.location.href = "paypal.php";';
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
<html>
<body>
<div style="height:autoc;width:400px;background-color:rgb(211,211,211);border:2px solid;text-align:center;padding: 15px;box-shadow:2px 2px;">
<form action="?" method="post">
<pre>
<h1>REGISTRATER PayPal</h1>
Paypal: <select name="country" value="" required>
<option value="MasterCard">Master Card</option>
<option value="VisCard">Visa Card</option></select><br>
Card Number: <input type="text" name="cardnum" value="<?php echo $_SESSION['Confirmation']; ?>" required> <br>
Firstname: 	 <input type="text" name="fname" required></input> <br>
Lastname: 	 <input type="text" name="lname" required> <br>
UserName: 	 <input type="text" name="user" required> <br>
Password: 	 <input type="password" name="password" required> <br>
Email: 		 <input type="email" name="email" required> <br>
Contact #: 	 <input type="text" name="contact" required> <br>
Address: 	 <input type="text" name="address" required> <br>
Country: <select name="country" value="0" required><option></option>
		 <option value="Canda">Canada</option>
		 <option value="North America">North America</option>
		 <option value="UK">UK</option>
		 <option value="Philippines">Philippines</option></select>
		 <p>Confirmation Code: <?php echo $_SESSION['Confirmation']; ?></p><br> <br>
		 <input type="submit" name="submit" value="Submit" style="width:100px;height:40px;">
          <a href="view.php">View</a>
		</pre>
</form>
</div>
</body>
</html>

