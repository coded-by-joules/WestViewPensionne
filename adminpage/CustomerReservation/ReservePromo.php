

<?php
session_start();
include('../Class/Reservation.php');
include("../connection.php");
include("../Class/Promotion.php");

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
if (isset($_SESSION['Customerid'])){ 

$Customerid =  $_SESSION['Customerid'];
$Categoryname=$_POST['categoryname'] ;
$Roomid=$_POST['roomid'] ;
$arrival=$_POST['start'];
$departure=$_POST['end'];
$numberofdays=$_POST['numberofdays'];
$Total=$_POST['total'];
$Confirmation = createRandomPassword();

$sql="select Customer_ID from tblcustomers where Customer_ID=".$Customerid."";
 $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
  $row= mysqli_fetch_array($result); 
  $Customerid=$row['Customer_ID'];


   
        $Reservation=new Reservation($Customerid,$Categoryname,$Roomid,$arrival,$departure,$numberofdays,$Total,$Confirmation);
        if ($Reservation->AddReserve())
            { 
       echo "true";
       $_SESSION['Confirmation2'] =$Confirmation;   
         

     
      }
    } 
  

?>