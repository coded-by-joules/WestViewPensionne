<?php 
include("../connection.php");
$getid = mysqli_real_escape_string($conn, $_GET['id']);
$selsql = "SELECT * FROM tblusers WHERE Customer_ID='".$getid."'";
$result = $conn->query($selsql);
if ($result->num_rows==1) {
	$row = $result->fetch_assoc();
	$status = $row['Active'];
	if ($status=='Activate') {
		$sql = "UPDATE tblusers SET Active='Deactivate' WHERE Customer_ID='".$getid."'";
		$conn->query($sql);
		header("Location: ../adminpage/room/manageuser.php");
	} else {
		$sql = "UPDATE tblusers SET Active='Activate' WHERE Customer_ID='".$getid."'";
		$conn->query($sql);
		header("Location: ../adminpage/room/manageuser.php");
	}
}
$conn->close();
?>