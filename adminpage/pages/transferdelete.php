<?php 
include('../../connection.php');
include('../class/transferroom.php');
if (isset($_GET['trid']))
{
    $trid=$_GET['trid'];

        if (transferroom::transferDelete($trid)) {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "../pages/transaction.php";';
            echo '</script>';
} 
}
else {
            echo '<script>alert("An error occured during the operation");</script>';
            echo '<script type="text/javascript">';
            echo 'window.location.href = "../pages/transaction.php";';
            echo '</script>';
}
?>