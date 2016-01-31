<?php
session_start();
include('../Class/Reservation.php');
include("../../connection.php");
  include('../Class/transaction.php');
    include('../Class/transferroom.php');

        $user_check=$_SESSION['Customerid'];
    $sql = "SELECT * FROM tblusers WHERE Customer_ID = '$user_check'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $userInCharge=$row['Username'];

	$reservationid=$_POST['reservationid'];
	$categoryname=$_POST['categoryname'];
	$roomid=$_POST['roomid'];	
	$rate=$_POST['rate'] ;
	$Arrival=$_POST['arrival'];
	$Departure=$_POST['departure'] ;
	$type=$_POST['type'] ;



	$s = \DateTime::createFromFormat('d/m/Y', $Arrival);
	$e = \DateTime::createFromFormat('d/m/Y', $Departure);
	if ($s=='') {
	    exit('Please select an Arrival Date. (Click the calendar icon)');
	}
	else if ($e=='') {
	    exit('Please select an Departure Date. (Click the calendar icon)');
	}
	$fromdate=$s->format('Y-m-d');
	$todate=$e->format('Y-m-d');
	$from=date_create($fromdate);
	$to=date_create($todate);
	$diff= date_diff($from, $to); //compute xa arrival ug departure

	$Numberofdays = $diff->d;//output




		$sql = "select tblusers.FirstName,tblusers.LastName,tblrooms.Rate,tblreservation.Arrival,tblreservation.Departure,tblreservation.AddonPayable,tblreservation.NumberofDay,tblreservation.Downpayment,tblreservation.Status,tblreservation.Payable FROM tblreservation 
		   		inner join tblrooms on tblreservation.Room_ID=tblrooms.Room_ID
		     	 inner join tblusers on tblreservation.Customer_ID=tblusers.Customer_ID
		 		 WHERE tblreservation.Reservation_ID='$reservationid'";
		$result = mysqli_query($conn, $sql);

		$row = mysqli_fetch_array($result);
		$fname=$row['FirstName'];
		$lname=$row['LastName'];
		$start = $row['Arrival'];
		$end= $row['Departure'];
		$status=$row['Status'];
		$currentstartdate = \DateTime::createFromFormat('Y-m-d', $start);
		$currentenddate = \DateTime::createFromFormat('Y-m-d', $end);

		$startdate=$currentstartdate->format('Y-m-d');
		$enddate=$currentenddate->format('Y-m-d');

		$from2=date_create($startdate);
		$to2=date_create($enddate);
		$diff2= date_diff($from2, $from);// compute xa old arrival ug CURRENT arrival
		$Numberofdays2 = $diff2->d; // output

		$diff3= date_diff($to2, $to); // compute xa  old departure ug current departure
		$Numberofdays3 = $diff3->d;




		$Rate=$row['Rate'];
		$numberofdays=$row['NumberofDay'];
		$payable = $row['Payable'];
		$downpayment=$row['Downpayment'];
		$addonpayable=$row['AddonPayable'];	
		$amount=$payable + $addonpayable -abs($downpayment) ;
		$tranferamount=$rate * $Numberofdays;

		$datetransfer=date_format($from,"Y/m/d") ." ". "to". " ". date_format($to,"Y/m/d");



	 if ($roomid=='')
		{
			echo 'Room Number is Required';
		}

		else if ($fromdate >= $end  || $todate <= $start || $start > $fromdate)
		{
		echo "Your current arrival date is less than to old arrival . please choose the right date";
		}
		else if ($todate < $end)
		{
			echo "your current departure is less than  to old Departure.please choose the right date";
		}
		else if ($fromdate == $todate)
		{
			echo "Invalid Date .please choose the right date";
		}


		else if ($status=="Pending" || $status=="Reserves")
		{
		$totalamount=$rate * $Numberofdays + $addonpayable; //currentrate * currentdate + total of add on payable
        $transactionamount=$totalamount -abs($downpayment) ;//if ang guest reserve ug pending pa  
		$transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$totalamount,$reservationid);
		 $transferroom=new transferroom($fname,$lname,$roomid,$categoryname,$rate,$datetransfer,$tranferamount,$status,$userInCharge);
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

		 $totalamount=$payable + $addonpayable;
		 $transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$totalamount,$reservationid);
		 $transferroom=new transferroom($fname,$lname,$roomid,$categoryname,$rate,$datetransfer,$tranferamount,$status,$userInCharge);
		 $transactionamount=$totalamount - abs($downpayment) ;
		 if($fromdate == $start && $todate == $end && $Rate==$rate ) { //if ang date is same xa arrival ug departure ug same xa rate
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

		 $totalamount=$rate * $Numberofdays + $addonpayable;
		 $transactionamount=$totalamount -abs($downpayment) ;//less the date and equal to current date to now input date
		 $transfer=Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$totalamount,$reservationid);
		 $transferroom=new transferroom($fname,$lname,$roomid,$categoryname,$rate,$datetransfer,$tranferamount,$status,$userInCharge);//record of table in tramsferroom
		 if ($start==$fromdate && $todate == $end) { // if ang date is same xa arrival ug departure mas gamay xa old departure or departure mas dako xa departure
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


		$totalrate2=$Rate * $Numberofdays2;
		$decreaseamount=$payable-$Rate;
		$nowrate=$rate * $Numberofdays;
		$totalamount=$decreaseamount+$nowrate + $addonpayable;
		$transactionamount=$totalamount  -abs($downpayment) ; //before end and currrent date iss qual and now arrival is greater than to current $transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$nowamount,$reservationid);
		$transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$totalamount,$reservationid);
	    $transferroom=new transferroom($fname,$lname,$roomid,$categoryname,$rate,$datetransfer,$tranferamount,$status,$userInCharge);
			if ($todate==$end && $fromdate > $start) { // if ang departure is same xa old departure ug arrival mas daku xa old arrival
		 		if($transfer) {
		 			if(Transaction::UpdateAmount($transactionamount,$fromdate,$reservationid))
		 		{
		 				 if ($transferroom->TransferRoom())
		 			{
				 		echo 'true'; 
				 		echo $totalamount;
				 		
				 	}

				 	}
				 }
			}
		
		else
		{
		$totalrate2=$Rate * $Numberofdays2;
		$decreaseamount=$payable-$Rate;
		$nowrate=$rate * $Numberofdays;
		$totalamount=$decreaseamount+$nowrate + $addonpayable;
		$transactionamount=$totalamount  -abs($downpayment) ;

		 $transfer=  Reservation::UpdateTranfer($categoryname,$roomid,$fromdate,$todate,$Numberofdays,$totalamount,$reservationid);
		  $transferroom=new transferroom($fname,$lname,$roomid,$categoryname,$rate,$datetransfer,$tranferamount,$status,$userInCharge);
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