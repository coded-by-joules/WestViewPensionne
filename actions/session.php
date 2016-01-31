<?php
error_reporting(0);
include('../connection.php');
$user_check=$_SESSION['Customerid'];
$sql = "SELECT * FROM tblusers WHERE Customer_ID = '$user_check'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$login_session = $row['Customer_ID'];
?>