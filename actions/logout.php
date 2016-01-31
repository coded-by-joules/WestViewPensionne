<?php 
error_reporting(0);
if (isset($_POST['logout'])) {
	session_start();
	session_destroy();
	if (isset($_SESSION['Customerid'])) {
	    unset($_SESSION['Customerid']);
	    unset($_SESSION['Confirmation']);
	}
	header('location: ../index.php');
} else header('location: ../index.php');
?>