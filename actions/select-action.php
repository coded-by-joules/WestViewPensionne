<?php
error_reporting(0);
session_start();
if (isset($_POST['submit'])) {
    if (empty($_POST['username'])||empty($_POST['password'])) {
	    echo '<script type="text/javascript">';
        echo 'alert("Please Enter Username or Password");';
        echo 'window.location.href = "index.php";';
        echo '</script>';
    } else {
        include("connection.php");
        $to = $_POST['to'];
        $from = $_POST['from'];
        $numdays = $_POST['numdays'];
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $userlower = strtolower($username);
        $hashedPW = hash('sha256', $password);
        $sql = "SELECT * FROM tblusers WHERE Username = '$userlower' and Password = '$hashedPW'";
        $result = $conn->query($sql);
        $r = $result->fetch_assoc();
        if ($result->num_rows==1) {
            if ($r['Active']=='Activate') {
                $_SESSION['to']=$to;
                $_SESSION['from']=$from;
                $_SESSION['numdays']=$numdays;
                $_SESSION['Customerid']=$r['Customer_ID'];
                echo '<script type="text/javascript">';
                echo 'alert("Welcome '.ucfirst($r['FirstName']).' ");';
                echo 'window.location.href = "selectroom.php";';
                echo '</script>';
            } else {
                $_SESSION['to']=$to;
                $_SESSION['from']=$from;
                $_SESSION['numdays']=$numdays;
                echo '<script type="text/javascript">';
                echo 'alert("Account has been disable please contact the Administrator");';
                echo 'window.location.href = "selectroom.php";';
                echo '</script>';
            }
        } else { 
            $_SESSION['to']=$to;
            $_SESSION['from']=$from;
            $_SESSION['numdays']=$numdays;
            echo '<script type="text/javascript">';
            echo 'alert("Incorrect Username or Password!");';
            echo 'window.location.href = "selectroom.php";';
            echo '</script>';
        }
        $conn->close();
    }
}
?>