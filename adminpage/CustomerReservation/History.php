<?php
include("../connection.php");
include("../Class/Reservation.php");
session_start();
if (isset($_SESSION['Customerid'])){ 
  $Customerid =  $_SESSION['Customerid'];


$sql = "select tblreservation.Confirmation,tblcustomers.FirstName, tblcustomers.LastName, tblcustomers.Contact,tblcustomers.Email,
        tblrooms.Room_ID,tblreservation.CategoryName,
        tblreservation.Arrival,tblreservation.Departure,tblreservation.Payable,tblreservation.NumberofDay
        FROM tblreservation INNER JOIN tblcustomers
        ON tblreservation.Customer_ID=tblcustomers.Customer_ID
        INNER JOIN tblrooms ON tblrooms.Room_ID=tblreservation.Room_ID
        WHERE tblcustomers.Customer_ID= '".$Customerid."'"  ;
if (!Reservation::GetCustomerID($Customerid))
{
 echo "No found  Reservation,Please Reserve before View your Reservation Detail ";
}

    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
while($row= mysqli_fetch_array($result))
{
 echo "<h1>History Reservation Detail</h1>"; 
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
   echo "NumberofDays :" .$row['NumberofDay'];
  echo "</br>";
 echo "Room Type :" .$row['CategoryName'];
   echo "</br>";
 echo "Amount :" .$row['Payable'];
}
mysqli_close($conn);
}
?>
  