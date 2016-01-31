<?php 
session_start();
include("../connection.php");
$id = mysqli_real_escape_string($conn, $_POST['id']);
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$contact = mysqli_real_escape_string($conn, $_POST['contact']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$city = mysqli_real_escape_string($conn, $_POST['city']);

$sql = "SELECT * FROM tblusers WHERE Customer_ID='".$id."'";
$result = $conn->query($sql);
if ($result->num_rows==1) {
	$sql = "UPDATE tblusers SET FirstName='$fname',LastName='$lname',Username='$username',Contact='$contact',Email='$email',Gender='$gender',City='$city' WHERE Customer_ID='".$id."'";
	$conn->query($sql);
	echo '<script>
	alert("Succefully Updated");
	window.location="../index.php";
	</script>';
}
$conn->close();
?>