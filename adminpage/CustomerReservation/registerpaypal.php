
<?php
session_start();
error_reporting(0);


?>
<html>
<body>
<div style="height:autoc;width:400px;background-color:rgb(211,211,211);border:2px solid;text-align:center;padding: 15px;box-shadow:2px 2px;">
<form action="registerpaypal.php" method="post">
<pre>
<h1>REGISTRATER PayPal</h1>
Paypal: <select name="country" value="" required>
<option value="MasterCard">Master Card</option>
<option value="VisCard">Visa Card</option></select><br>
Card Number: <input type="text" name="lname" required> <br>
Firstname: 	 <input type="text" name="fname" value="<?php echo $_SESSION['Confirmation']; ?>"> </input> <br>
Lastname: 	 <input type="text" name="lname" required> <br>
UserName: 	 <input type="text" name="user" required> <br>
Password: 	 <input type="text" name="password" required> <br>
Email: 		 <input type="text" name="email" required> <br>
Contact #: 	 <input type="text" name="contact" required> <br>
Address: 	 <input type="text" name="address" required> <br>
Country: <select name="country" value="0" required><option></option>
		 <option value="Canda">Canada</option>
		 <option value="North America">North America</option>
		 <option value="UK">UK</option>
		 <option value="Philippines">Philippines</option></select> <br><br>
		 <input type="submit" name="submit" value="Submit" style="width:100px;height:40px;">
                 <a href="view.php">View</a>
		</pre>
</form>
</div>
</body>
</html>

