<?php 
include("../connection.php");
$getid = mysqli_real_escape_string($conn, $_GET['id']);
$selsql = "SELECT * FROM tblusers WHERE id='".$getid."'";
$result = $conn->query($selsql);
if ($result->num_rows==1) {
	$row = $result->fetch_assoc();
	$status = $row['active'];
	if ($status=='Activate') {
		$sql = "UPDATE tblusers SET active='Deactivate' WHERE id='".$getid."'";
		$conn->query($sql);
		header("Location: home.php");
	} else {
		$sql = "UPDATE tblusers SET active='Activate' WHERE id='".$getid."'";
		$conn->query($sql);
		header("Location: home.php");
	}
}
$conn->close();
?>