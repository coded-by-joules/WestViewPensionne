<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Westview Pension House - Cebu</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../hotelpage/css/bootstrap.min.css" rel="stylesheet">
    <!--Icon-->
     <link href="../../hotelpage/images/westview-icon.png" type="image/png" rel="icon">
    <!-- Custom CSS -->
    <link href="../../hotelpage/css/modern-business.css" rel="stylesheet">
    <link href="../../hotelpage/css/westview.css" rel="stylesheet">
    <link href="../../hotelpage/css/bootstrap-social/bootstrap-social.css" rel="stylesheet">
        <!-- delete record -->
<script type="text/javascript" src="../dist/js/confirmbox.js"></script>
    <!-- Custom Fonts -->
    <link href="../../hotelpage/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="nav-bar-head">
                <div class="head-logo">
                <div class=" logo">
                            <a href="../../index.php">
                                <img id="header-logo" src="../../hotelpage/images/westview.png">
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
 
                     <li>
                        <h4 style="color:#fff">Westview Pension House - Cebu  <i class="fa fa-phone"> </i> (+64) 1234 567 890 </h4 >
                    </li>
       
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<?php

include("../../connection.php");

?>

 <?php
session_start();
error_reporting(0);
include("../Class/Reservation.php");
include("../../connection.php");

$confirmation=$_SESSION['Confirmation'];


if (isset($_SESSION['Customerid'])){ 
  


$sql = "select tblreservation.Confirmation,tblpaypal.balance,tblusers.FirstName, tblusers.LastName, tblusers.Contact,tblusers.Email,
        tblrooms.Room_ID,tblreservation.CategoryName,
        tblreservation.Arrival,tblreservation.Status,tblreservation.Departure,tblreservation.Payable,tblreservation.NumberofDay
        FROM tblreservation INNER JOIN tblusers
        ON tblreservation.Customer_ID=tblusers.Customer_ID
        INNER JOIN tblrooms ON tblrooms.Room_ID=tblreservation.Room_ID
        INNER JOIN tblpaypal ON tblreservation.Customer_ID=tblpaypal.Customer_ID
        WHERE  tblusers.Customer_ID= '".$_SESSION['Customerid']."'";

if (!Reservation::GetCustomerID($_SESSION['Customerid']))
{
 echo "No found  Reservation,Please Reserve before View your Reservation Detail ";
}
else
{
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
while($row= mysqli_fetch_assoc($result))
{
 echo "<form action='' method='POST'>" ;
 echo "<div class='container' style='margin-top:65px;'><div class='row><div class='col-lg-12'>'";
 echo "<h1 class='page-header'>History Reservation Detail</h1></div>"; 
 echo "Confirmation code:" .$row['Confirmation'];
 echo "</br>";
 echo "FirstName :" .$row['FirstName'];
 echo "</br>";
 echo "LastName :" .$row['LastName'];
 echo "</br>";
 echo "Contact :" .$row['Contact'];
 echo "</br>";
 echo "Email :" .$row['Email'];
 echo "</br>";
 echo "Room # :" .$row['Room_ID'];
 echo "</br>";
 echo "Arrival :" .$row['Arrival'];
 echo "</br>";
 echo "Departure :" .$row['Departure'];
 echo "</br>";
 echo "Number of Days :" .$row['NumberofDay'];
 echo "</br>";
 echo "Room Type :" .$row['CategoryName'];
 echo "</br>";
 echo "Amount :" ."Php" ." " .number_format($row['Payable'],2);
 echo "</br>";
 echo "</br>";
 echo "<b>Balance</b> :'<input type='text' name='balance' value=".$row['balance']." disabled>" ;

echo "</br>";
echo "</br>";

if ($row['Status']=="Pending")
{
echo "<a><input type='submit' name='updatestatus' value='Reserve' class='btn btn-promo4'></a>";
}
else
{
 echo "<a '#'><input type='submit' value='Reserve' class='btn btn-promo4'></a>";
}
echo "<a href='#' onclick='return  CancelReservation()';><input type='submit' name='cancelreservation' value='Cancel' class='btn btn-promo4'></div></div>";

     
     $amount=$row['Payable'];
    $paypalbalance=$row['balance'];
    $total=$paypalbalance -abs($amount);
    if (isset($_POST['updatestatus']))
 {

    if ($paypalbalance <= $amount )
    {
            echo "<script>alert('your balance is not enought to pay to amount, Please Contact the Owner of this Hotel For process your reservation right now ')</script>";
         echo "<script>window.location='../CustomerReservation/processpayment.php';</script>";
        
    }
 else
 {

    $sql="update tblpaypal set balance='$total' where Customer_ID='".$_SESSION['Customerid']."'";  //update reservation to confirmation
    $sql2="update tblreservation set Status='Confirm' where Customer_ID='".$_SESSION['Customerid']."'";
    $result=mysqli_query($conn,$sql);
    $result2=mysqli_query($conn,$sql2);
    echo "<script>alert('Successfully Reserve')</script>";
    echo "<script>window.location='../room/completepaypal.php';</script>";
    }
mysqli_close($conn);
}
else 
    if (isset($_POST['cancelreservation']))
{

     $sql="DELETE FROM tblreservation WHERE Confirmation='".$confirmation."'";  //delete reservation;
     $sql2="DELETE FROM tblreservationnotify WHERE Confirmation='".$confirmation."'";
     $result=mysqli_query($conn,$sql);
     $result2=mysqli_query($conn,$sql2);
    echo "loading.....";
    header("Refresh: 3; url=../../index.php");
    
 }
     mysqli_close($conn);

}
echo "</form>";
}

}

?>
<?php
include("../../connection.php");

?>
<div class="container">
 <footer>
            <div class="row">
                <div class="col-lg-6">
                      <p>Copyright 2015 by Westview Pensione House. All Rights Reserved.</p>
                </div>
                 <div class="col-lg-6">
                    <div class="text-center">
                    
                       Social Account: <a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                        <a class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
                        <a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>