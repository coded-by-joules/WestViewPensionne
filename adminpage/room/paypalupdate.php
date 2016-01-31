<?php
session_start();
	include('../../connection.php');
	include('../Class/Reservation.php');

	$user = $_POST['username'];
	$pass = $_POST['password'];
	$conf = $_SESSION['Confirmation'];
	$userlower = strtolower($user);
    $hashedPW = hash('sha256', $pass);
	$sql = "SELECT * FROM tblpaypal WHERE username='$userlower' AND password='$hashedPW'";
	$query = $conn->query($sql);

	$updatepaypal = Reservation::UpdatePaypal($user,$pass,$conf);

	if ($updatepaypal) {
		echo '<script type="text/javascript">';
        echo 'alert("Successfully Paid!");';
        echo 'window.location.href = "payment.php";';
        echo '</script>';
	} else {
		echo 'error';
	}
?>