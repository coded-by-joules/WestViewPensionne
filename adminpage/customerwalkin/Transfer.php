<?php

include('../Class/Reservation.php');
include("../../connection.php");

$reservationid=$_POST['reservationid'];
$categoryname=$_POST['categoryname'];
$roomid=$_POST['roomid'];
$rate=$_POST['rate'] ;
$Arrival=$_POST['arrival'];
$Departure=$_POST['departure'] ;


$fromdate = DateTime::createFromFormat('d/m/Y', $Arrival)->format('Y-m-d');
$todate = DateTime::createFromFormat('d/m/Y', $Departure)->format('Y-m-d');
$from=date_create($fromdate);
$to=date_create($todate);

$diff= date_diff($from, $to);
$Numberofdays = $diff->d;



$sql = "select tblrooms.Rate,tblwalkins.Arrival,tblwalkins.Departure,tblwalkins.NumberofDays, tblwalkins.Amount
 FROM tblwalkins inner join tblrooms on tblwalkins.Room_ID=tblrooms.Room_ID
  WHERE tblwalkins.Customer_ID='$reservationid'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);

$start = $row['Arrival'];
$end= $row['Departure'];
$Rate=$row['Rate'];
$numberofdays=$row['NumberofDays'];
$payable = $row['Amount'];

$totalday= $numberofdays-$Numberofdays;
$total=$Rate * $totalday + $rate * $Numberofdays;

if ($fromdate >= $end  || $todate <= $start || $start > $fromdate)
{
	echo "error";
}
else if ($end > $todate)
	{
		echo "error";
	}
	else
	{


 $transfer=  Reservation::UpdateWalkin($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$payable,$reservationid);
 if($fromdate <= $end && $Rate==$rate ) {
 	if($transfer) {
 		echo 'true'; 
 	}
}
 else {
 	 $tran=  Reservation::UpdateWalkin($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$total,$reservationid);
 	  if($tran) {

     echo 'true'; 
 	}
 }
}
?>