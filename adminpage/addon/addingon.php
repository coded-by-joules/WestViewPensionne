

<?php

include('../Class/AddonReserve.php');
include('../Class/walkin.php');
include('../Class/Addon.php');
include("../../connection.php");

$item=$_POST['item'];
$customerid=$_POST['customerid'];
$quantity=$_POST['quantity'];
$amount=$_POST['amount'] ;
$price=$_POST['price'] ;
$sum=0;
$sqli = "SELECT * FROM tblwalkins WHERE Customer_ID='$customerid'";
$resulti = mysqli_query($conn, $sqli);
$row = mysqli_fetch_assoc($resulti);
$addamount = $row['Addonpayable'];
$sum = $addamount + $amount;

$sql = "SELECT * FROM tbladdons WHERE item='$item'";
$result = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_assoc($result);
$qty = $row1['quantity'];
$total=$qty-$quantity;  


if  ($quantity==0)
{
  echo 'quantity is required';
}

else if ($sum==0)
{
  echo 'Payable is required';
}
else
{
$addon=Addon::UpdateQuantity($total,$item);   
$addingon=Walkin::UpdateAddonPayable($sum,$customerid);
$reserveaddon= new AddonReserve($customerid,$item,$quantity,$price);

if($addingon)
{
     if($reserveaddon->AddonReserve())
      {
     if($addon)
       {
       echo "true";

    }
  }
}
      else
      {
      	echo "error";
      }  

  
}
?>