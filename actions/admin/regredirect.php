<?php 
session_start();
error_reporting(0);
if (isset($_POST['register'])) {
	include("../../connection.php");
	$Name = mysqli_real_escape_string($conn, $_POST["fname"]);
	$Lastname = mysqli_real_escape_string($conn, $_POST["lname"]);
	$Username = mysqli_real_escape_string($conn, $_POST['username']);
	$Password = mysqli_real_escape_string($conn, $_POST['password']);
	$RePass = mysqli_real_escape_string($conn, $_POST['retypepassword']);
	$Phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$Email = mysqli_real_escape_string($conn, $_POST['email']);
	$Type = mysqli_real_escape_string($conn, $_POST['type']);
	$Gender = mysqli_real_escape_string($conn, $_POST['gender']);
	$Country = mysqli_real_escape_string($conn, $_POST['country']);
	$City = mysqli_real_escape_string($conn, $_POST['city']);
	$filter = preg_match('/^[A-z0-9_\-]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/', $Email);
	//encryption on password
	//$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
	//$saltedPW = $Password.$salt;
	$userlower = strtolower($Username);
	$hashedPW = hash('sha256', $Password);
	//end of encrytion
	if ($Password==$RePass) {
		$query_verify_email = "SELECT * FROM tblcustomers WHERE Email = '$Email'";
		$verified_email = $conn->query($query_verify_email);
		if ($verified_email->num_rows == 0) {
			$hash = md5(uniqid(rand(), true));
			$sql = "INSERT INTO tblcustomers (FirstName,LastName,Username,Password,Contact,Email,Gender,City,Country,Type,Active,Verification,Code)
			VALUE ('$Name','$Lastname','$userlower','$hashedPW','$Phone','$Email','$Gender','$City','$Country','$Type','Activate',1,'$hash')";
			if($conn ->query($sql) === TRUE) {
				$sql2 = "INSERT INTO tblpaypal (balance) VALUE ('$Balance')";
				if ($conn->query($sql2)===true) {
					echo '<script type="text/javascript">';
			 	   	echo 'alert("Successfully Registered");';
			    	echo 'window.location.href = "../../adminpage/room/manageuser.php";';
			    	echo '</script>';
	    		}
			} else {
			echo '<script type="text/javascript">';
		    echo 'alert("Your Username or Email Address is already use.");';
		   	echo 'window.location.href = "../../adminpage/room/manageuser.php";';
		   	echo '</script>'; }
		} 
		
		else if (!$filter) {
		  	echo '<script type="text/javascript">';
		    echo 'alert("Invalid Email format.");';
		   	echo 'window.location.href = "../../adminpage/room/manageuser.php";';
		   	echo '</script>';
		}
	}

		else {
			echo '<script type="text/javascript">';
		    echo 'alert("Password Do Not Match!");';
		    echo 'window.location.href = "../../adminpage/room/manageuser.php";';
		    echo '</script>';
		}
	}
	$conn->close();
}
?>