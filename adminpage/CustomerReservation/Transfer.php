<?php
session_start();
include('../Class/Reservation.php');
include("../../connection.php");
  include('../Class/transaction.php');
    include('../Class/transferroom.php');

	$categoryname=$_POST['categoryname'];
	$roomid=$_POST['roomid'];	
	$rate=$_POST['rate'] ;
	$Arrival=$_POST['arrival'];
	$Departure=$_POST['departure'] ;
	$type=$_POST['type'] ;

        $reservationid=$_SESSION['Reservation_ID'];
	    $fromdate=$_SESSION['searchstartdate'];
        $todate=$_SESSION['searchenddate'];
        $from=$_SESSION['from'];
        $to=$_SESSION['to'];
        $fname=$_SESSION['fname'];
        $lname=$_SESSION['lname'];
        $start=$_SESSION['startdate'];
        $end=$_SESSION['enddate'];
        $numberofdays=$_SESSION['numberofdays'];
        $Numberofdays=$_SESSION['Numberofdays'];
        $Numberofdays2=$_SESSION['Numberofdays2'];
        $Numberofdays3=$_SESSION['Numberofdays3'];
        $payable=$_SESSION['payable'];
        $downpayment=$_SESSION['downpayment'];
        $addonpayable=$_SESSION['addonpayable'];
        $status=$_SESSION['status'];
        $userInCharge=$_SESSION['user'];
     	$Rate=$_SESSION['Rate'];
     	$totalamount=$_SESSION['totalamount'];
     	$percent=$_SESSION['percent'];
     	$status=$_SESSION['status'];
     	$promofrom=$_SESSION['promofrom'];
     	$promoto=$_SESSION['promoto'];
     	$roomnumber=$_SESSION['roomnumber'];
        $roomtype=$_SESSION['roomtype'];



		$tranferamount=$rate * $Numberofdays;
        $datetransfer=$start ." ". "to". " ". $end;



		if (($status=="Pending" || $status=="Reserve")  &&  $percent==0)
		{
        $transactionamount=$totalamount  + $addonpayable -abs($downpayment) ;//if ang guest reserve ug pending pa  
		$transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$totalamount,$reservationid);
		 $transferroom=new transferroom($reservationid,$fname,$lname,$roomnumber,$roomtype,$Rate,$datetransfer,$numberofdays,$payable,$status,$userInCharge);
		  if($transfer) {
		 		if(Transaction::UpdateAmount($transactionamount,$fromdate,$reservationid))
		 		{
		 			if ($transferroom->TransferRoom())
		 			{
		 		echo 'true'; 

		 			}
				}
			}
		}

		else
		{
		 $transactionamount=$totalamount + $addonpayable -abs($downpayment); 
		 $transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$totalamount,$reservationid);
		 $transferroom=new transferroom($reservationid,$fname,$lname,$roomnumber,$roomtype,$Rate,$datetransfer,$numberofdays,$payable,$status,$userInCharge);
		 $transactionamount=$totalamount - abs($downpayment) ;
		 if(($status=="Pending" || $status=="Reserve") && $fromdate >= $promofrom && $todate <= $promoto  &&  $percent>0) { //if ang date is same xa arrival ug departure ug same xa rate
		 	if($transfer) {
		 		if(Transaction::UpdateAmount($transactionamount,$fromdate,$reservationid))
		 		{
		 			 if ($transferroom->TransferRoom())
		 			{
		 			echo 'true'; 
				 	}

				 	}
				 }
			}
		
		else
		{ 
		 $transactionamount=$totalamount + $addonpayable- abs($downpayment) ;
		 $transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$totalamount,$reservationid);
		 $transferroom=new transferroom($reservationid,$fname,$lname,$roomnumber,$roomtype,$Rate,$datetransfer,$numberofdays,$payable,$status,$userInCharge);
		 $transactionamount=$totalamount - abs($downpayment) ;
		 if(($status=="Pending" || $status=="Reserve") && $fromdate < $promoto && $todate >$promofrom && $todate<=$promoto  && $percent>0) { //if ang date is same xa arrival ug departure ug same xa rate
		 	if($transfer) {
		 		if(Transaction::UpdateAmount($transactionamount,$fromdate,$reservationid))
		 		{
		 			 if ($transferroom->TransferRoom())
		 			{
		 			echo 'true'; 
				 	}

				 	}
				 }
			}
		else
		{ 
			$transactionamount=$totalamount + $addonpayable -abs($downpayment); 
			$transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$totalamount,$reservationid);
		    $transferroom=new transferroom($reservationid,$fname,$lname,$roomnumber,$roomtype,$Rate,$datetransfer,$numberofdays,$payable,$status,$userInCharge);
		    $transactionamount=$totalamount - abs($downpayment) ;
		 if(($status=="Pending" || $status=="Reserve") && $fromdate < $promoto && $todate > $promofrom  && $percent>0) { //if ang date is same xa arrival ug departure ug same xa rate
		 	if($transfer) {
		 		if(Transaction::UpdateAmount($transactionamount,$fromdate,$reservationid))
		 		{
		 			 if ($transferroom->TransferRoom())
		 			{
		 			echo 'true'; 
				 	}

				 	}
				 }
			}

		else
		{

		 $transactionamount=$totalamount + $addonpayable -abs($downpayment);
		 $transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$totalamount,$reservationid);
		 $transferroom=new transferroom($reservationid,$fname,$lname,$roomnumber,$roomtype,$Rate,$datetransfer,$numberofdays,$payable,$status,$userInCharge);
		 $transactionamount=$totalamount - abs($downpayment) ;
		 if($start==$fromdate && $todate == $end && $percent==0 ) { //if ang date is same xa arrival ug departure ug same xa rate
		 	if($transfer) {
		 		if(Transaction::UpdateAmount($transactionamount,$fromdate,$reservationid))
		 		{
		 			 if ($transferroom->TransferRoom())
		 			{
		 			echo 'true'; 
				 	}

				 	}
				 }
			}

		else
		{

		 $transactionamount=$totalamount + $addonpayable -abs($downpayment);
		 $transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$totalamount,$reservationid);
		 $transferroom=new transferroom($reservationid,$fname,$lname,$roomnumber,$roomtype,$Rate,$datetransfer,$numberofdays,$payable,$status,$userInCharge);
		 $transactionamount=$totalamount - abs($downpayment) ;
		 if($start==$fromdate && $todate == $end && $fromdate >= $promofrom && $todate <= $promoto  &&  $percent>0) { //if ang date is same xa arrival ug departure ug same xa rate
		 	if($transfer) {
		 		if(Transaction::UpdateAmount($transactionamount,$fromdate,$reservationid))
		 		{
		 			 if ($transferroom->TransferRoom())
		 			{
		 			echo 'true'; 
				 	}

				 	}
				 }
		}
		else
		{
		 $transactionamount=$totalamount + $addonpayable-abs($downpayment);
		 $transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$totalamount,$reservationid);
		 $transferroom=new transferroom($reservationid,$fname,$lname,$roomnumber,$roomtype,$Rate,$datetransfer,$numberofdays,$payable,$status,$userInCharge);
		 $transactionamount=$totalamount - abs($downpayment) ;
		 if($start==$fromdate && $todate == $end && $fromdate < $promoto && $todate >$promofrom && $todate<=$promoto  && $percent>0) { //if ang date is same xa arrival ug departure ug same xa rate
		 	if($transfer) {
		 		if(Transaction::UpdateAmount($transactionamount,$fromdate,$reservationid))
		 		{
		 			 if ($transferroom->TransferRoom())
		 			{
		 			echo 'true'; 
				 	}

				 	}
				 }
			}
		else
		{
		 $transactionamount=$totalamount + $addonpayable -abs($downpayment);
		 $transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$totalamount,$reservationid);
		 $transferroom=new transferroom($reservationid,$fname,$lname,$roomnumber,$roomtype,$Rate,$datetransfer,$numberofdays,$payable,$status,$userInCharge);
		 $transactionamount=$totalamount - abs($downpayment) ;
		 if($start==$fromdate && $todate == $end && $fromdate < $promoto && $todate > $promofrom  && $percent>0) { //if ang date is same xa arrival ug departure ug same xa rate
		 	if($transfer) {
		 		if(Transaction::UpdateAmount($transactionamount,$fromdate,$reservationid))
		 		{
		 			 if ($transferroom->TransferRoom())
		 			{
		 			echo 'true'; 
				 	}

				 	}
				 }
			}
		
		 else
		{
		$transactionamount=$totalamount + $addonpayable -abs($downpayment) ; //before end and currrent date iss qual and now arrival is greater than to current $transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$nowamount,$reservationid);
		$transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$totalamount,$reservationid);
		 $transferroom=new transferroom($reservationid,$fname,$lname,$roomnumber,$roomtype,$Rate,$datetransfer,$numberofdays,$payable,$status,$userInCharge);
			if ($todate==$end && $fromdate > $start &&  $percent==0) { // if ang departure is same xa old departure ug arrival mas daku xa old arrival
		 		if($transfer) {
		 			if(Transaction::UpdateAmount($transactionamount,$fromdate,$reservationid))
		 		{
		 				 if ($transferroom->TransferRoom())
		 			{
				 		echo 'true'; 
				 
				 		
				 	}

				 	}
				 }
			}
		else
		{

		$transactionamount=$totalamount + $addonpayable -abs($downpayment) ; //before end and currrent date iss qual and now arrival is greater than to current $transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$nowamount,$reservationid);
		$transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$totalamount,$reservationid);
		 $transferroom=new transferroom($reservationid,$fname,$lname,$roomnumber,$roomtype,$Rate,$datetransfer,$numberofdays,$payable,$status,$userInCharge);
			if ($todate==$end && $fromdate > $start && $fromdate >= $promofrom && $todate <= $promoto  &&  $percent>0) { // if ang departure is same xa old departure ug arrival mas daku xa old arrival
		 		if($transfer) {
		 			if(Transaction::UpdateAmount($transactionamount,$fromdate,$reservationid))
		 		{
		 				 if ($transferroom->TransferRoom())
		 			{
				 		echo 'true'; 
				 
				 		
				 	}

				 	}
				 }
			}
		else
		{

		$transactionamount=$totalamount + $addonpayable - abs($downpayment) ; //before end and currrent date iss qual and now arrival is greater than to current $transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$nowamount,$reservationid);
		$transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$totalamount,$reservationid);
		 $transferroom=new transferroom($reservationid,$fname,$lname,$roomnumber,$roomtype,$Rate,$datetransfer,$numberofdays,$payable,$status,$userInCharge);
			if ($todate==$end && $fromdate > $start && $fromdate < $promoto && $todate > $promofrom  && $percent>0) { // if ang departure is same xa old departure ug arrival mas daku xa old arrival
		 		if($transfer) {
		 			if(Transaction::UpdateAmount($transactionamount,$fromdate,$reservationid))
		 		{
		 				 if ($transferroom->TransferRoom())
		 			{
				 		echo 'true'; 
				 
				 		
				 	}

				 	}
				 }
			}

			else
		{

		$transactionamount=$totalamount + $addonpayable - abs($downpayment) ; //before end and currrent date iss qual and now arrival is greater than to current $transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$nowamount,$reservationid);
		$transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$totalamount,$reservationid);
		 $transferroom=new transferroom($reservationid,$fname,$lname,$roomnumber,$roomtype,$Rate,$datetransfer,$numberofdays,$payable,$status,$userInCharge);
			if ($todate==$end && $fromdate > $start && $fromdate < $promoto && $todate >$promofrom && $todate<=$promoto  && $percent>0) { // if ang departure is same xa old departure ug arrival mas daku xa old arrival
		 		if($transfer) {
		 			if(Transaction::UpdateAmount($transactionamount,$fromdate,$reservationid))
		 		{
		 				 if ($transferroom->TransferRoom())
		 			{
				 		echo 'true'; 
				 
				 		
				 	}

				 	}
				 }
			}
	//gggggggg
		 else
		{

		$transactionamount=$totalamount + $addonpayable -abs($downpayment) ; //before end and currrent date iss qual and now arrival is greater than to current $transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$nowamount,$reservationid);
		$transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$totalamount,$reservationid);
		 $transferroom=new transferroom($reservationid,$fname,$lname,$roomnumber,$roomtype,$Rate,$datetransfer,$numberofdays,$payable,$status,$userInCharge);
			if ($end< $todate && $fromdate > $start &&  $percent==0) { // if ang departure is same xa old departure ug arrival mas daku xa old arrival
		 		if($transfer) {
		 			if(Transaction::UpdateAmount($transactionamount,$fromdate,$reservationid))
		 				{
		 				 if ($transferroom->TransferRoom())
		 					{
				 		echo 'true'; 	
				 			}
				 		}
				 }
			}
		else
		{

		$transactionamount=$totalamount + $addonpayable -abs($downpayment) ; //before end and currrent date iss qual and now arrival is greater than to current $transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$nowamount,$reservationid);
		$transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$totalamount,$reservationid);
		 $transferroom=new transferroom($reservationid,$fname,$lname,$roomnumber,$roomtype,$Rate,$datetransfer,$numberofdays,$payable,$status,$userInCharge);
			if ($end < $todate && $fromdate > $start && $fromdate >= $promofrom && $todate <= $promoto  &&  $percent>0) { // if ang departure is same xa old departure ug arrival mas daku xa old arrival
		 		if($transfer) {
		 			if(Transaction::UpdateAmount($transactionamount,$fromdate,$reservationid))
		 		{
		 				 if ($transferroom->TransferRoom())
		 			{
				 		echo 'true'; 
				 
				 
				 	}

				 	}
				 }
			}
		else
		{

		$transactionamount=$totalamount + $addonpayable -abs($downpayment) ; //before end and currrent date iss qual and now arrival is greater than to current $transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$nowamount,$reservationid);
		$transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$totalamount,$reservationid);
		 $transferroom=new transferroom($reservationid,$fname,$lname,$roomnumber,$roomtype,$Rate,$datetransfer,$numberofdays,$payable,$status,$userInCharge);
			if ($end < $todate && $fromdate > $start && $fromdate < $promoto && $todate > $promofrom  && $percent>0) { // if ang departure is same xa old departure ug arrival mas daku xa old arrival
		 		if($transfer) {
		 			if($end < $todateTransaction::UpdateAmount($transactionamount,$fromdate,$reservationid))
		 		{
		 				 if ($transferroom->TransferRoom())
		 			{
				 		echo 'true'; 
				 
				 		
				 	}

				 	}
				 }
			}
		else
		{

		$transactionamount=$totalamount + $addonpayable -abs($downpayment); //before end and currrent date iss qual and now arrival is greater than to current $transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$nowamount,$reservationid);
		$transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$totalamount,$reservationid);
		 $transferroom=new transferroom($reservationid,$fname,$lname,$roomnumber,$roomtype,$Rate,$datetransfer,$numberofdays,$payable,$status,$userInCharge);
			if ($end < $todate && $fromdate > $start && $fromdate < $promoto && $todate >$promofrom && $todate<=$promoto  && $percent>0) { // if ang departure is same xa old departure ug arrival mas daku xa old arrival
		 		if($transfer) {
		 			if(Transaction::UpdateAmount($transactionamount,$fromdate,$reservationid))
		 		{
		 				 if ($transferroom->TransferRoom())
		 			{
				 		echo 'true'; 
				 	 		
				 	}

				 	}
				 }
			}
	
		else
		{

		$transactionamount=$totalamount +$addonpayable -abs($downpayment) ;
		 $transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$totalamount,$reservationid);
		 $transferroom=new transferroom($reservationid,$fname,$lname,$roomnumber,$roomtype,$Rate,$datetransfer,$numberofdays,$payable,$status,$userInCharge);
					 	if($transfer) {
					 		if(Transaction::UpdateAmount($transactionamount,$fromdate,$reservationid)) // if ang departure mas labaw pa xa old departure
					 		{
							 			 if ($transferroom->TransferRoom())
							 			{
									 		echo 'true'; 
										}
									 		
									 	}
									 }
							      }
							   }
						    }
					      }
					    }
					  }
					}
				  }
			    }
			 }
		   }
		 }
		}
	  }
	}    
  }
