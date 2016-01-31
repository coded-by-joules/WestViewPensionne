<?php
if (empty($_POST['verify'])) {
	echo '<script type="text/javascript">';
    echo 'alert("Please Enter an Email Address to Verify your account");';
    echo 'window.location.href = "../index.php";';
    echo '</script>';
} else {
	include("../connection.php");
    session_start();
    $user_check=$_SESSION['Customerid'];
	$email = mysqli_real_escape_string($conn, $_POST['verify']);
	$sql = "SELECT * FROM tblusers WHERE Email = '$email' AND Customer_ID='$user_check'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$hash = $row['Code'];
	if ($result->num_rows==0) {
		echo '<script type="text/javascript">';
    	echo 'alert("Please Enter your valid Email to verify");';
    	echo 'window.location.href = "../index.php";';
    	echo '</script>';
	} else {
		if ($row['Email']==$email) {
			$subject = 'Activate Your Email';

            $headers = "From: westviewpension.com \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            //$url= BASE_PATH . '/verify.php?emailaddress=' . urlencode($Email) . '&key='.$hash.'';
            $url= 'localhost/westviewpenssione1/actions/verify.php?emailaddress=' . urlencode($email) . '&key='.$hash.'';

            $message =  '<h1>Thank you</h1>';
            $message .= '<p>Your username is: '. $row['Username'] .'</p>';
            $message .=  '<p>To activate your account please click on Activate buttton</p>';
            $message .=  '<p>If the link doesnt work just copy the link below.</p><br>';
            $message .=  '<p>'.$url.'</p><br>';
            $message .= '<table cellspacing="0" cellpadding="0"> <tr>';
            $message .= '<td align="center" width="300" height="40" bgcolor="#000091" style="-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;color: #ffffff; display: block;">';
            $message .= '<a href="'.$url.'" style="color: #ffffff; font-size:16px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; text-decoration: none;line-height:40px; width:100%; display:inline-block">Click to Activate</a>';
            $message .= '</td> </tr> </table>';
            if (mail($email, $subject, $message, $headers)) {
                echo '<script type="text/javascript">';
                echo 'alert("A confirmation email has been sent to '. $email.' Please click on the Activate Button to Activate your account");';
                //echo 'window.location.href = "verify.php?emailaddress='. urlencode($Email) .'&key='.$hash.'"';
                echo 'window.location.href = "../index.php";';
                echo '</script>';
            } else {
                die('Failure: Email was not sent!');
            }
		} else {
			echo '<script type="text/javascript">';
    		echo 'alert("Please Enter your valid emailaddress to verify");';
    		echo 'window.location.href = "../index.php";';
    		echo '</script>';
		}
	}
}
?>