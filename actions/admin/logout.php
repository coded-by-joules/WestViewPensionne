<?php 
error_reporting(0);
if (isset($_POST['logout'])) {
	session_start();
	session_destroy();
	if (isset($_SESSION['login_user'])) {
	    unset($_SESSION['login_user']);
	}
	header('location: ../index.php');
} else header('location: ../index.php');
?>