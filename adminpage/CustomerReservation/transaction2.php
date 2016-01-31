<?php 
session_start();
include("../../connection.php");
  include("../Class/transaction.php");
    include("../Class/reservation.php");
        include("../Class/notification.php");

    $user_check=$_SESSION['Customerid'];
    $datenow= date("Y-m-d");
    $sql = "SELECT * FROM tblusers WHERE Customer_ID = '$user_check'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $userincharge=$row['Username'];	
    $type=$row['Type'];
	$confirmation = mysqli_real_escape_string($conn, $_GET['confirmation']);

	$selsql = "SELECT * FROM tblreservation WHERE Confirmation='".$confirmation."'";
	$result = $conn->query($selsql);
if ($result->num_rows==1) {
	$row = $result->fetch_assoc();
	$status = $row['Status'];
	$customerid=$row['Customer_ID'];
	$reservationid=$row['Reservation_ID'];
	$datereservation=$row['ReservationDate'];
	$payable=$row['Payable'];
	$checkin='Check In';
	$checkout='Check Out';

	if ($status=='Confirmed') {

		$sql = "UPDATE tblreservation SET Status='Check In' WHERE Confirmation='".$confirmation."'";
	   $transaction=Transaction::CheckInStatus($datenow,$userincharge,'Check In',$reservationid);
    if ($transaction)
    {
		$conn->query($sql);
		if ($type=="Administrator")
		{
		header("Location: ../pages/transaction.php");
		}
		else 
		{			
	    header("Location: ../pages/transaction-staff.php");
	    $conn->close();
		}
    }

	}
	else if ($status=='Reserve' || $status=='Reserve/DownPayment') {

	 	$sql2 = "SELECT tbltransaction.UserInCharge,tblusers.FirstName,tblusers.LastName,tblreservation.CategoryName FROM tbltransaction
	 	inner join tblusers on tbltransaction.Customer_ID=tblusers.Customer_ID
	 	inner join tblreservation on tblreservation.Customer_ID=tblusers.Customer_ID
	 	where  tblreservation.Confirmation='".$confirmation."'";

	 	$result2= $conn->query($sql2);
        $row = $result2->fetch_assoc();
        $user=$row['UserInCharge'];
        $fname=$row['FirstName'];
        $lname=$row['LastName'];
        $roomtype=$row['CategoryName'];
        $reservationname= $fname  ." ". $lname;
        $dateout=date("Y-m-d");
	 
	 	if($user==$userincharge)
	  {
	  	$transaction=new Transaction(Reservation::GetReservationID($reservationid),Transaction::GetReservationCustomerID($confirmation),$datereservation,$datenow,null,$payable, $checkin, $userincharge);
       if ($transaction->CheckIn(Transaction::GetReservationCustomerID($confirmation),$user==1,$confirmation))
     {
      
		$sql = "UPDATE tblreservation SET Status='Check In' WHERE Confirmation='".$confirmation."'";
		$conn->query($sql);
			if ($type=="Administrator")
		{
		header("Location: ../pages/transaction.php");
		}
		else 
		{
	    header("Location: ../pages/transaction-staff.php");
		}
	}
	else
	{
		echo "An error occured during the operation";
	}
	  $conn->close();
}
else
{
	echo  "<script>alert('It seems you are not the one who check in the reservation. The user in charge will given a notification that the reservation has been check in.');</script>";
	
	     	$message=$reservationname ." ". "was Check in to Room" ." ". $roomtype  ." " ."by ".  " ".  $userincharge ." ".  date('Y-m-d');
     
		$notification=new Notifier($userincharge,$user,$message);
	if($notification->NotifyUser())
     	{

   $transaction=new Transaction(Reservation::GetReservationID($reservationid),Transaction::GetReservationCustomerID($confirmation),$datereservation,$datenow,null,$payable,$checkin,$userincharge);
     if ($transaction->CheckIn(Transaction::GetReservationCustomerID($confirmation),$userincharge==1,$confirmation))
     {
     	$sql = "UPDATE tblreservation SET Status='Check In' WHERE Confirmation='".$confirmation."'";


     
		    $conn->query($sql);
		   if ($type=="Administrator")
		{
 			echo'<script>window.location="../pages/transaction.php";</script>';		
 		}
		else 
		{
 			echo'<script>window.location="../pages/transaction-staff.php";</script>';		
 		}


     }
     else
     {
     		echo "An error occured during the operation";
     }
    
}
}
}
	 else 
	 {
	 	$sql2 = "SELECT tbltransaction.UserInCharge,tblusers.FirstName,tblusers.LastName,tblreservation.CategoryName FROM tbltransaction
	 	inner join tblusers on tbltransaction.Customer_ID=tblusers.Customer_ID
	 	inner join tblreservation on tblreservation.Customer_ID=tblusers.Customer_ID
	 	where  tblreservation.Confirmation='".$confirmation."'";

	 	$result2= $conn->query($sql2);
        $row = $result2->fetch_assoc();
        $user=$row['UserInCharge'];
        $fname=$row['FirstName'];
        $lname=$row['LastName'];
        $roomtype=$row['CategoryName'];
        $reservationname= $fname  ." ". $lname;
        $dateout=date("Y-m-d");
	 
	 	if($user==$userincharge)
	  {
	  	$transaction=new Transaction(Reservation::GetReservationID($reservationid),Transaction::GetReservationCustomerID($confirmation),$datereservation,$datenow,$dateout,$payable,$checkout,$userincharge);
       if ($transaction->CheckOut(Transaction::GetReservationCustomerID($confirmation),$user==1,$confirmation))
     {
      
		$sql = "UPDATE tblreservation SET Status='Check Out' WHERE Confirmation='".$confirmation."'";
		$conn->query($sql);
		if ($type=="Administrator")
		{
		header("Location: ../pages/transaction.php");
		}
		else 
		{
	    header("Location: ../pages/transaction-staff.php");
		}
	}
	else
	{
		echo "An error occured during the operation";
	}
	  $conn->close();
}


else
{
	echo  "<script>alert('It seems you are not the one who check out the reservation. The user in charge will given a notification that the reservation has been check out.');</script>";
	
	     	$message=$reservationname ." ". "was Checkout to Room" ." ". $roomtype  ." " ."by ".  " ".  $userincharge ." ".  date('Y-m-d');
     
		$notification=new Notifier($userincharge,$user,$message);
	if($notification->NotifyUser())
     	{

   $transaction=new Transaction(Reservation::GetReservationID($reservationid),Transaction::GetReservationCustomerID($confirmation),$datereservation,$datenow,$dateout,$payable,$checkout,$userincharge);
     if ($transaction->CheckOut(Transaction::GetReservationCustomerID($confirmation),$userincharge==1,$confirmation))
     {
     	$sql = "UPDATE tblreservation SET Status='Check Out' WHERE Confirmation='".$confirmation."'";


     
		    $conn->query($sql);
		   if ($type=="Administrator")
		{
 			echo'<script>window.location="../pages/transaction.php";</script>';		
 		}
		else 
		{
 			echo'<script>window.location="../pages/index-staff.php";</script>';		
 		}
		


     }
     else
     {
     		echo "An error occured during the operation";
     		$conn->close();
     }
    
}
}
}
}




