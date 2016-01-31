  

<?php
  include("../../connection.php");
  include("../Class/Reservation.php");
  include("../Class/transaction.php");
  session_start();


    $user_check=$_SESSION['Customerid'];
    $datenow= date("Y-m-d");
    $sql = "SELECT * FROM tblusers WHERE Customer_ID = '$user_check'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $userincharge=$row['Username'];  

$reservationid=$_POST['reservationid'] ;
$customerid=$_POST['customerid'] ;
$confirmation=$_POST['confirmation'] ;
$status=$_POST['status'] ;
$downpayment=$_POST['downpayment'];
$addonpayable=$_POST['addonpayable'];
$payable=$_POST['payable'];
$type=$_POST['type'];



$sql="select * from tblreservation where Confirmation='$confirmation'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$downpyment=$row['Downpayment'];
$stat=$row['Status'];
$datenow=date('Y-m-d');
$amount=$row['Payable'];
$halfamount=round($amount)/2;
$total=($addonpayable + $payable) - abs($downpayment);

if ($status=="Pending")
{
  echo "please Select Another Option";
}
else if ($stat=="Check In/DownPayment" || $stat=="Check In")
{
  echo "please Select Another Option";
}
else if($downpayment >=$amount)
{
   echo "your downpayment is over or equal to your amount.please pay the right way"; 
}
else if($downpayment < $halfamount && $downpayment!=0)
{
   echo "your downpayment is not half to pay to your amount"; 
}
else if($downpayment=="")
{
   echo "Please enter your downpayment"; 
}
else
  if ($status=='Reserve/DownPayment' || $status=='Reserve') {
    if (Reservation::UpdateStatus($status,$downpayment,$confirmation)) {

    if (Transaction::Reserve($userincharge,$total,$reservationid)){

        echo "true";
    }
}
}

    else 
      if ($status='Check In') {
          if (Reservation::UpdateStatus($status,$downpayment,$confirmation)) {
          $datenow=date('Y-m-d');
    if (Transaction:: CheckInStatus($datenow,$userincharge,$reservationid)){

    
        echo "true";
    }
  }
}

?>
