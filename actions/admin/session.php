<?php
error_reporting(0);
include('../connection.php');
$user_check=$_SESSION['Customerid'];
$sql = "SELECT * FROM tblusers WHERE id = '$user_check'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$login_session = $row['id'];
if (!isset($login_session)) {
	$conn->close();
	echo '<script type="text/javascript">';
    echo 'alert("Please Login!!");';
    echo 'window.location.href = "index.php";';
    echo '</script>';
}
?>