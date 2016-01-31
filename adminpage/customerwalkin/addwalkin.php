<?php

include("../../connection.php");
include('../Class/walkin.php');

$Roomid=$_POST['roomid'];
$Categoryname=$_POST['categoryname'];
$FirstName=$_POST['firstname'];
$LastName=$_POST['lastname'];
$Contact=$_POST['contact'];
$Arrival=$_POST['arrival'];
$Departure=$_POST['departure'];

$fromdate = DateTime::createFromFormat('d/m/Y', $Arrival)->format('Y-m-d');
$todate = DateTime::createFromFormat('d/m/Y', $Departure)->format('Y-m-d');
$from=date_create($fromdate);
$to=date_create($todate);
$diff= date_diff($from, $to);

$Numberofdays = $diff->d;
$Status=$_POST['status'];
$Addonpayable=0;
$Downpayment=$_POST['downpayment'];
$Amount=$_POST['amount'];




if (empty($Roomid)){
  echo 'Room Number is required';
}

else if (empty($FirstName)){
  echo 'First Name is required';
}
else if (empty($LastName)){
  echo 'Last Name is required';
}
else if (empty($Contact)){
    echo 'Contact Number is required';
}

	 else if (empty($Arrival)){
	 echo 'Start Date  is required';
	}

	 else if (empty($Departure)){
	    echo 'End Date is required';
	}

   
      else
      {
   $walkin= new Walkin($Roomid,$Categoryname,$FirstName,$LastName,$Contact,$fromdate,$todate,$Numberofdays,$Status,$Addonpayable,$Downpayment,$Amount);
if ($walkin->AddWalkin())
{  
 
    echo 'true';
}

}
    

?>
