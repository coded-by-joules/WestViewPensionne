<?php
include("../connection.php");
$email = mysqli_real_escape_string($conn, $_GET['emailaddress']);
$key = mysqli_real_escape_string($conn, $_GET['key']);

$sql = "SELECT * FROM tblusers WHERE Email = '$email' AND Verification = 1";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
	echo '<div>Your Account already exists. Please <a href="../index.php">Login Here</a></div>';
} else {
	if (isset($email)&&isset($key)) {
		$update = $conn->query("UPDATE tblusers SET Verification = 1 WHERE Code='$key' AND Email='$email'");
		if($update === TRUE) {
			if (mysqli_affected_rows($conn) == 1) {
				echo '<center><div>Your Account has been activated. Please <a href="../index.php">Click here to redirect the page</a></div></center>';
			} else {
				echo '<center><div>Account could not be activated.</div></center>';
			}
		} else echo '<center><div>Account could not be activated.</div></center>';
	}
}
$conn->close();
?>