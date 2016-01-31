<?php 
error_reporting(0);
include("../connection.php");
$Name = mysqli_real_escape_string($conn, $_POST["fname"]);
$Lastname = mysqli_real_escape_string($conn, $_POST["lname"]);
$Username = mysqli_real_escape_string($conn, $_POST['username']);
$Password = mysqli_real_escape_string($conn, $_POST['password']);
$RePass = mysqli_real_escape_string($conn, $_POST['retypepassword']);
$Phone = mysqli_real_escape_string($conn, $_POST['phone']);
$Email = mysqli_real_escape_string($conn, $_POST['email']);
$Gender = mysqli_real_escape_string($conn, $_POST['gender']);
$City = mysqli_real_escape_string($conn, $_POST['city']);
$Country = mysqli_real_escape_string($conn, $_POST['country']);
$Balance=100000;
//encryption on password
//$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
//$saltedPW = $Password.$salt;
$userlower = strtolower($Username);
$hashedPW = hash('sha256', $Password);
//end of encrytion
if ($Password==$RePass) {
	$query_verify_email = "SELECT * FROM tblusers WHERE Email = '$Email'";
	$verified_email = $conn->query($query_verify_email);
	if ($verified_email->num_rows == 0) {
		$hash = md5(uniqid(rand(), true));
		$sql = "INSERT INTO tblusers (FirstName,LastName,Username,Password,Contact,Email,Gender,City,Country,Type,Active,Verification,Code)
		VALUE ('$Name','$Lastname','$userlower','$hashedPW','$Phone','$Email','$Gender','$City','$Country','User','Activate',0,'$hash')";
			if($conn ->query($sql) === TRUE) {
				$sql2 = "INSERT INTO tblpaypal (balance) VALUE ('$Balance')";
				if ($conn->query($sql2)===true) {
	            /*echo '<script type="text/javascript">';
	            echo 'alert("A confirmation email has been sent to '. $Email.' Please click on the Activate Button to Activate your account");';
	            echo 'window.location.href = "verify.php?key='.$hash.'&emailaddress='. urlencode($Email) .'"';
	            echo '</script>';*/
		            if ($conn->affected_rows==1) {
		                $subject = 'Activate Your Email';

		                $headers = "From: westviewpension.com \r\n";
		                $headers .= "MIME-Version: 1.0\r\n";
		                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		                //$url= BASE_PATH . '/verify.php?emailaddress=' . urlencode($Email) . '&key='.$hash.'';
		                $url= 'localhost/westviewpenssione1/actions/verify.php?emailaddress=' . urlencode($Email) . '&key='.$hash.'';

		                $message =  '<h1>Thank you</h1>';
		                $message .= '<p>Your username is: '. $Username .'</p>';
		                $message .=  '<p>To activate your account please click on Activate buttton</p>';
		                $message .=  '<p>If the link doesnt work just copy the link below.</p>';
		                $message .=  '<p>'.$url.'</p>';
		                $message .= '<table cellspacing="0" cellpadding="0"> <tr>';
		                $message .= '<td align="center" width="300" height="40" bgcolor="#000091" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;color: #ffffff; display: block;">';
		                $message .= '<a href="'.$url.'" style="color: #ffffff; font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none;line-height:40px; width:100%; display:inline-block">Click to Activate</a>';
		                $message .= '</td> </tr> </table>';
		                if (mail($Email, $subject, $message, $headers)) {
		                    echo '<script type="text/javascript">';
		                    echo 'alert("A confirmation email has been sent to '. $Email.' Please click on the Activate Button to Activate your account");';
		                    //echo 'window.location.href = "verify.php?emailaddress='. urlencode($Email) .'&key='.$hash.'"';
		                    echo 'window.location.href = "../index.php";';
		                    echo '</script>';
		                } else {
		                    die('Failure: Email was not sent!');
		                    echo 'window.location.href = "../index.php";';
		                }
	                }
	            } else {
	                echo '<script type="text/javascript">';
	                echo 'alert("You could not be registered due to a system error. We apologize for any inconvenience.");';
	                echo 'window.location.href = "../index.php";';
	                echo '</script>';
	            }
	        } else {
	            echo '<script type="text/javascript">';
	            echo 'alert("Username is already use.");';
	            echo 'window.location.href = "../index.php";';
	            echo '</script>';
	        }
	} else {
		echo '<script type="text/javascript">';
    	echo 'alert("Email Address is already use.");';
    	echo 'window.location.href = "../index.php";';
    	echo '</script>';
	}
} else {
	echo '<script type="text/javascript">';
    echo 'alert("Password Do Not Match!");';
    echo 'window.location.href = "../index.php";';
    echo '</script>';
}
$conn->close();
?>