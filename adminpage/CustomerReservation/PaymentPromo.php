<html>
<body>

<?php
session_start();
include("../connection.php");


 // check if user has logged in...

if (isset($_SESSION['Confirmation'])){   // check if user has logged in...
$Confirmation =  $_SESSION['Confirmation'];

$sql = "select tblreservation.Confirmation,tblcustomers.FirstName, tblcustomers.LastName, tblcustomers.Contact,tblcustomers.Email,
        tblrooms.Room_ID,tblreservation.CategoryName,
        tblreservation.Arrival,tblreservation.Departure,tblreservation.Payable,tblreservation.NumberofDay,tblpromotion.Discount
        FROM tblreservation INNER JOIN tblcustomers
        ON tblreservation.Customer_ID=tblcustomers.Customer_ID
        INNER JOIN tblrooms ON tblrooms.Room_ID=tblreservation.Room_ID
        INNER JOIN tblpromotion ON tblpromotion.Room_ID=tblreservation.Room_ID
        WHERE tblreservation.Confirmation= '".$Confirmation.  "'"  ;


    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
while($row= mysqli_fetch_assoc($result))
{
 echo "<h1>History Reservation Detail</h1>"; 
 echo "Confirmation code: " .$row['Confirmation'];
 echo "</br>";
 echo "FirstName :  " .$row['FirstName'];
  echo "</br>";
 echo "LastName : " .$row['LastName'];
  echo "</br>";
 echo "Contact :  " .$row['Contact'];
  echo "</br>";
 echo "Email :  " .$row['Email'];
  echo "</br>";
 echo "Room # : " .$row['Room_ID'];
  echo "</br>";
 echo "Arrival : " .$row['Arrival'];
  echo "</br>";
 echo "Departure : " .$row['Departure'];
  echo "</br>";
   echo "Number of Days : " .$row['NumberofDay'];
  echo "</br>";
 echo "Room Type :" .$row['CategoryName'];
   echo "</br>";
echo "Discount :" .$row['Discount'].'%' ;
   echo "</br>";
 echo "Amount :" .$row['Payable'];
}
mysqli_close($conn);
}


    
?>
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but23.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" style="margin-left: 157px;" />
<img alt="fdff" border="0" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1" />
</body> 
      </html>