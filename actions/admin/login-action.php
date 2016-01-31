<?php
error_reporting(0);
session_start();
if (isset($_POST['submit'])) {
    if (empty($_POST['username']||empty($_POST['password']))) {
        $error = "Please Complete the Form!";
	    echo '<script type="text/javascript">';
        echo 'alert("Please Enter Username or Password");';
        echo 'window.location.href = "?";';
        echo '</script>';
    } else {
        include_once("../connection.php");
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $userlower = strtolower($username);
        $hashedPW = hash('sha256', $password);
        $sql = "SELECT * FROM tblusers WHERE username = '$userlower' and password = '$hashedPW'";
        $result = $conn->query($sql);
        $r = $result->fetch_assoc();
        if ($result->num_rows==1) {
            if ($r['type'] == 'Administrator') {
                $_SESSION['login_user']=$username;
                echo '<script type="text/javascript">';
                echo 'alert("Welcome Administrator");';
                echo 'window.location.href = "home.php";';
                echo '</script>';
            } else {
                $error = "Must Login with Administrator Privilege!!";
            } 
        } else {
            $error = "Incorrect Username or Password!";
        }
        $conn->close();
    }
}
?>