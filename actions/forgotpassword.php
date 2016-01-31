<?php 
session_start();
include ("../connection.php"); //connects to the database
if (isset($_POST['submit'])){
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$email = mysqli_real_escape_string($conn, $_POST['emailaddress']);
    $userlower = strtolower($username);
	$sql="select * from tblusers where Username='$userlower' AND Email = '$email'";
	$result  = $conn->query($sql);
	$count= $result->num_rows;
	if($count==1)
	{
		$rows= $result->fetch_array();
		$hash = $rows['Code'];
		$subject = 'Reset your password';

            $headers = "From: westviewpension.com \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            //$url= BASE_PATH . '/verify.php?emailaddress=' . urlencode($Email) . '&key='.$hash.'';
            $url= 'localhost/westviewpenssione1/actions/resetpassword.php?username=' . urlencode($userlower) . '&key='.$hash.'';

            $message =  '<h1>Forgot Password</h1>';
            $message .= '<p>Your Username: '. $username .'</p>';
            $message .= '<p>Your Email address: '. $email .'</p>';
            $message .= '<p>This Username '. $username .' was trying to reset your password</p>';
            $message .= '<p>Click this link to reset your password <a href="'.$url.'">Click Here</a></p>';
            $message .= '<p>If the link doesnt work just copy the link below</p>';
            $message .= '<p>'.$url.'</p><br>';
            if (mail($email, $subject, $message, $headers)) {
                echo '<script type="text/javascript">';
                echo 'alert("A reset password has been sent");';
                //echo 'window.location.href = "verify.php?emailaddress='. urlencode($Email) .'&key='.$hash.'"';
                echo 'window.location.href = "../index.php";';
                echo '</script>';
            } else {
                die('Failure: Email was not sent!');
            }
	} else {
		echo '<script type="text/javascript">';
        echo 'alert("Your Username or Email address  doesnt Exist.");';
        echo 'window.location.href = "../index.php";';
        echo '</script>';
	}
}
?>