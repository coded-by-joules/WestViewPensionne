<?php
//error_reporting(0);
include('../connection.php');
$id = mysqli_real_escape_string($conn, $_POST['oid']);
$oldpassword = mysqli_real_escape_string($conn, $_POST['oldpassword']);
$oldhash = hash('sha256', $oldpassword);
$sql="select * from tlbusers where Password='$oldhash'";
$result = $conn->query($sql);
if (isset($_POST['save'])) {
	$newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);
	$retypepassword = mysqli_real_escape_string($conn, $_POST['retypepassword']);
	if (empty($newpassword)||empty($retypepassword)||empty($oldpassword)) {		
	} else {
		if ($result->num_rows==1) {
			if ($newpassword==$retypepassword) {
			$hashedPW = hash('sha256', $newpassword);
			$code = md5(uniqid(rand(), true));
			$update = $conn->query("UPDATE tblusers SET Password = '$hashedPW' WHERE Customer_ID='$id'");
				if ($update === TRUE) {
					echo '<script>
					alert("Password has been changed.");
					window.location="../index.php";
					</script>';
				} else {
					echo '<script>
					alert("Password could not be reset");
					window.location="../index.php";
					</script>';
				}
			} else {
					echo '<script>
					alert("Password do not Match");
					window.location="../index.php";
					</script>';
			}
		} else {
			echo '<script>
			alert("Old password do not Match");
			window.location="../index.php";
			</script>';
		}
		
	}
	$conn->close();
}
?>