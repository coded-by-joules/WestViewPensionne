<?php
  include("../connection.php");
  if ($_POST)
{
 
 $promoid=$_POST["promoid"];
 
  
$sql="select tblrooms.Image from tblrooms inner join tblpromotion on tblrooms.Room_ID=tblpromotion.Room_ID where tblpromotion.Room_ID = '$promoid' ";
 $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));


    while($row=mysqli_fetch_array($result)){
    echo "<img  src=".$row["Image"]." width='175' height='115'>";
  
}
}
?>
