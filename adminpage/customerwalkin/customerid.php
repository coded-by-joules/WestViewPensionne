<?php
  include("../connection.php");
if ($_POST)
{
$searchcustomerid=$_POST['searchcustomerid'];


    $sql = "select * from tblwalkins
                where Customer_ID='".$searchcustomerid."'";


   $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

   while($row=mysqli_fetch_array($result)){
   	echo "<p><input type='hidden' name='customerid' id='customerid' value=".$row['Customer_ID']. "> </p>";
      
  }
}
?>
