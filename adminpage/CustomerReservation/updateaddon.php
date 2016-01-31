

<?php
session_start();
include("../../connection.php");
include('../class/AddonReserve.php');
include('../class/Reservation.php');
include("../class/addon.php");
include("../class/transaction.php");

   
$item=$_POST['item'];
$confirmation=$_POST['confirmation'] ;
$quantity=$_POST['quantity'];
$amount=$_POST['amount'] ;
$price=$_POST['price'] ;
$type=$_POST['user'];
$reservationid=$_SESSION['Reservation_ID'];
$addonid=$_SESSION['addonid'];

$sum=0;
$sqli = "SELECT tbladdonreserve.Item,tbladdonreserve.quantity,tbladdonreserve.price,tbladdons.quantity as addonquantity,tbladdonreserve.amount,tblreservation.AddonPayable,tblreservation.Downpayment,tblreservation.Reservation_ID,tblreservation.Payable,tbltransaction.Amount FROM tblreservation
Inner join tbltransaction on tblreservation.Reservation_ID=tbltransaction.Reservation_ID
Inner join tbladdonreserve on tblreservation.Reservation_ID=tbladdonreserve.Reservation_ID
Inner join tbladdons on tbladdonreserve.Item=tbladdons.item
WHERE tbladdonreserve.addonid='$addonid'";
$resulti = mysqli_query($conn, $sqli);
$row = mysqli_fetch_assoc($resulti);
$qty1=$row['addonquantity'];
$addamount = $row['AddonPayable'];
$payable=$row['Payable'];

$addonitem=$row['Item'];
$addonquantity=$row['quantity'];
$addonamount=$row['amount'];

$transactionpayable=$row['Amount'];
$currentdownpayment=$row['Downpayment'];



$sql = "SELECT * FROM tbladdons WHERE item='$item'";
$result = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_assoc($result);
$qty = $row1['quantity'];
$item2=$row1['item'];



if  ($quantity==0)
{
  echo 'quantity is required';
}


else if($item==$addonitem && $quantity > $addonquantity)  // if ang quntity mas dako xa purchase
{
$getaddonpayable = abs($addonamount - $amount);
$gettotaladdonpayable= $addamount + $getaddonpayable;

$totalamount=$payable + $getaddonpayable;

$transactionamount= $totalamount -abs($currentdownpayment);

$getquantity=$quantity - $addonquantity;
$total=$qty-$getquantity;  

$addon=Addon::UpdateQuantity($total,$item);   
$updateaddon=Reservation::UpdateAddonPayable($gettotaladdonpayable,$currentdownpayment,$payable,$confirmation);
$updateaddonreserve=AddonReserve::UpdateAddonReserve($item,$price,$quantity,$amount,$addonid);
$transaction= transaction::UpdateBalance($transactionamount,$reservationid);



if($addon)
{
     if($updateaddon)
      {
     if($updateaddonreserve)
       {
       if($transaction)
       {

    
       echo "true";

    

  }
}
}
}
}

else if($item==$addonitem && $quantity < $addonquantity)
{
$getaddonpayable = $addonamount - $amount;
$gettotaladdonpayable=$addamount-$getaddonpayable;

$totalamount=$payable - $getaddonpayable;

$transactionamount= $totalamount -abs($currentdownpayment);

$getquantity=$addonquantity - $quantity;
$total=$qty + $getquantity;  

$addon=Addon::UpdateQuantity($total,$item);   
$updateaddon=Reservation::UpdateAddonPayable($gettotaladdonpayable,$currentdownpayment,$payable,$confirmation);
$updateaddonreserve=AddonReserve::UpdateAddonReserve($item,$price,$quantity,$amount,$addonid);
$transaction= transaction::UpdateBalance($transactionamount,$reservationid);


if($addon)
{
     if($updateaddon)
      {
     if($updateaddonreserve)
       {
       if($transaction)
       {    
       echo "true";


  }
}
}
}
}
else if($item==$addonitem && $quantity == $addonquantity)
{

$addon=Addon::UpdateQuantity($qty,$item);   
$updateaddon=Reservation::UpdateAddonPayable($addamount,$currentdownpayment,$payable,$confirmation);
$updateaddonreserve=AddonReserve::UpdateAddonReserve($item,$price,$quantity,$amount,$addonid);
$transaction= transaction::UpdateBalance($transactionpayable,$reservationid);


if($addon)
{
     if($updateaddon)
      {
     if($updateaddonreserve)
       {
       if($transaction)
    {

    
       echo "true";


  }
}
}
}
}
else 
{


$getaddonamount=abs($addamount - $addonamount);  // addonpayable - previousamount;
$gettotaladdonpayable= $getaddonamount + $amount;  // addonpayable + currentamount;

$totalamount=($payable - $addonamount) + $amount ; // reservationpayble-previouseamount + currentamount

$transactionamount= $totalamount -abs($currentdownpayment);

$total=$qty1 + $addonquantity;  
$total2=abs($qty - $quantity);  
$addon=Addon::UpdateQuantity($total,$addonitem);   
$addon2=Addon::UpdateQuantity($total2,$item);  
$updateaddon=Reservation::UpdateAddonPayable($gettotaladdonpayable,$currentdownpayment,$payable,$confirmation);
$updateaddonreserve=AddonReserve::UpdateAddonReserve($item,$price,$quantity,$amount,$addonid);
$transaction= transaction::UpdateBalance($transactionamount,$reservationid);


if($addon)
{
  if($addon2)
{
     if($updateaddon)
      {
     if($updateaddonreserve)
       {
       if($transaction)
       {

    
       echo "true";

    

  }
}
}
}
}
}
?>