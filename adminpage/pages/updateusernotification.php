<?php
error_reporting(0);
include('../../connection.php');
$user=$_GET['user'];

	$sql="update tblnotifications set Unread=1 where ToUser='".$user."' ";
	$query=mysqli_query($conn,$sql);
	header('location:index.php');
	mysqli_close($conn);
?>