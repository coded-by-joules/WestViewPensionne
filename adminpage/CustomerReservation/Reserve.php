

<?php
session_start();
include("../../connection.php");
include('../Class/Reservation.php');
include('../Class/reservationnotify.php');
include("../Class/transaction.php");

  function createRandomPassword() {



    $chars = "abcdefghijkmnopqrstuvwxyz023456789";

    srand((double)microtime()*1000000);

    $i = 0;

    $pass = '' ;



    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }



    return $pass;



}

$Categoryname=$_POST['categoryname'] ;
$Roomid=$_POST['roomid'] ;
$arrival=$_POST['start'];
$departure=$_POST['end'];
$numberofdays=$_POST['numberofdays'];
$status='Pending';
$addonpayable=0;
$downpayment=0;
$total=$_POST['total'];
$adult=$_POST['nadult'];
$child=$_POST['nchild'];
$confirmation = 'wv-'.createRandomPassword();

if($adult=='' || $child=='')
{
  echo "please select the number of Adult or Child";
}

else if (isset($_SESSION['Customerid'])){ 

$Customerid =  $_SESSION['Customerid'];

$sql="select * from tblusers where Customer_ID='$Customerid'";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($query);
$fname=$row['FirstName'];
$lname=$row['LastName'];
$balance=90000;
$datenow=date('Y-m-d');


  
        $Reservation=new Reservation($Customerid,$Categoryname,$Roomid,$arrival,$departure,$numberofdays,$adult,$child,$status,$addonpayable,$downpayment,$total,$confirmation,null);
        if ($Reservation->AddReserve())
        {

         $transaction=new Transaction($Customerid,$datenow,null,null,$total,$status,'None');
           if ($transaction->AddTransaction())
             {
             $reservationname= $fname ." "  ." ". $lname;
           $message= $reservationname ." " ."Was Reserve";
           Notifier::NotifyReservation($confirmation,$reservationname,$message);
           echo "true";
           $_SESSION['Confirmation'] =$confirmation;  
        }
  
    } 
  }
  

?>