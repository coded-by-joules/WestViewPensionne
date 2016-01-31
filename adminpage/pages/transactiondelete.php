<?php 
include('../../connection.php');
include('../class/transaction.php');
if (isset($_GET['resid']))
{
    $resid=$_GET['resid'];
    $sql="select * from  tblreservation where Reservation_ID='$resid'";
    $query=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($query);
    $status=$row['Status'];
    if ($status=="Check Out" )
    {
        if (Transaction::transactionDelete($resid)) {
            echo '<script>window.location.href="../pages/transaction.php"</script>;';
        } 
    }else {
            echo '<script>alert("the customer is not yet to check out please check right in your system");</script>';
            echo '<script>window.location.href="../pages/transaction.php"</script>;';
        

        }
}
//
?>