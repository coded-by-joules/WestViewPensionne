

<?php
session_start();
include("../../connection.php");
include('../class/AddonReserve.php');
include('../class/Reservation.php');
include("../class/addon.php");
include("../class/transaction.php");


    $user_check=$_SESSION['Customerid'];
    $datenow= date("Y-m-d");
    $sql = "SELECT * FROM tblusers WHERE Customer_ID = '$user_check'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $user=$row['Username'];
   
$reservationid=$_SESSION['Reservation_ID'];
$item=$_POST['item'];
$customerid=$_POST['customerid'];
$confirmation=$_POST['confirmation'] ;
$quantity=$_POST['quantity'];
$amount=$_POST['amount'] ;
$price=$_POST['price'] ;
$downpayment=$_POST['downpayment'];
$type=$_POST['user'];
$status=$_POST['status'];
$reservationid=$_SESSION['Reservation_ID'];

$sum=0;
$sqli = "SELECT tblreservation.AddonPayable,tblreservation.Downpayment,tblreservation.Reservation_ID,tblreservation.Payable,tbltransaction.Amount FROM tblreservation
Inner join tbltransaction on tblreservation.Customer_ID=tbltransaction.Customer_ID
WHERE tblreservation.Confirmation='$confirmation'";
$resulti = mysqli_query($conn, $sqli);
$row = mysqli_fetch_assoc($resulti);
$addamount = $row['AddonPayable'];
$payable=$row['Payable'];
$transactionpayable=$row['Amount'];
$currentdownpayment=$row['Downpayment'];
$sum = $addamount + $amount;
$totaldownpayment=$currentdownpayment + $downpayment;
$totalamount=$payable + $amount;

$transactionamount= $totalamount  -abs($downpayment);

$sql = "SELECT * FROM tbladdons WHERE item='$item'";
$result = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_assoc($result);
$qty = $row1['quantity'];
$total=$qty-$quantity;  

if ($status=="Pending" || $status=="Confirm")
{
  echo 'Cannot add items, Please Reserve or Checkin First.';
}
else if  ($quantity==0)
{
  echo 'quantity is required';
}

else if ($sum==0)
{
  echo 'Payable is required';
}
else if ($downpayment>=$amount)
{
     echo "your downpayment is over or equal to your price.please pay the right way"; 
}
else
{
$addon=Addon::UpdateQuantity($total,$item);   
$addingon=Reservation::UpdateAddonPayable($sum,$totaldownpayment,$payable,$confirmation);
$reserveaddon= new AddonReserve($customerid,$reservationid,$item,$quantity,$price,$amount,$user);
$transaction= transaction::UpdateBalance($transactionamount,$reservationid);


if($addingon)
{
     if($reserveaddon->AddonReserve())
      {
     if($addon)
       {
       if($transaction)
       {

    
       echo "true";
       $reservationid;

  }
}
}
}
      else
      {
        echo "error";
      }  

  
}
?>