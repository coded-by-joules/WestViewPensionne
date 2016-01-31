<?php
error_reporting(0);
include('../../connection.php');
if(isset($_GET['unread']))
{
	$unread=$_GET['unread'];
	$sql="update tblreservationnotify set Unread=0 ";
	$query=mysqli_query($conn,$sql);
		header('location:index.php');

}
else if (isset($_GET['unread1']))
{
		$unread1=$_GET['unread1'];
	$sql="update tblreservationnotify set Unread=0 ";
	$query=mysqli_query($conn,$sql);
		header('location:index-staff.php');
}
?>
