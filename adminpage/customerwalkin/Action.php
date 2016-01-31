

<?php
  include("../../connection.php");
  include("../Class/walkin.php");
  include("../Class/transactionwalkin.php");

$customerid=$_POST['customerid'] ;
$status=$_POST['status'] ;
$downpayment=$_POST['downpayment'];
$addonpayable=$_POST['addonpayable'];
$payable=$_POST['payable'];


$sql="select * from tblwalkins where Customer_ID='$customerid'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$downpyment=$row['Downpayment'];
$stat=$row['Status'];
$total=($addonpayable + $payable) - $downpayment;

if ($status=="Pending")
{
  echo "error";
}

else
  if ($stat=='Reserve'  || $stat=='Check In' || $stat=='Reserve/DownPayment' ) {
    if (Walkin::UpdateStatus($status,$downpyment,$customerid)) {

    $transaction=new TransactionWalkin($customerid,$total);
    if ($transaction->AddTransactionwalkin())
    {
        echo "true";
    }
      }

} else 
  if (Walkin::UpdateStatus($status,$downpayment,$customerid)){
      
        echo "true";
        /*$updte="update tblreservation set  Status='$status', Downpayment='$downpayment' where Confirmation='$confirmation'";
        $result=mysqli_query($conn,$updte) or die(mysqli_error($conn)); */
      }
?>
