<?php 
error_reporting(0);
session_start();
	session_destroy();
	if (isset($_SESSION['Customerid'])) {
	    unset($_SESSION['Customerid']);
	}
	header('location: ../index.php');
?>