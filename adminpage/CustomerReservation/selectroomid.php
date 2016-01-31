<?php
include("../connection.php");
if (isset($_POST['searchreservationid']))
{



$searchreservationid=$_POST['searchreservationid'];


   $sql = "select * from tblreservation
                where Reservation_ID='".$searchreservationid."'";


   $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

   while($row=mysqli_fetch_array($result)){
    echo $row['Reservation_ID'];
 
  }
}
?>  