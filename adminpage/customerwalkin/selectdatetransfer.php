
<?php
include("../connection.php");
if ($_POST)
{ 
$searchstartdate=$_POST['searchstartdate']; 
$searchenddate=$_POST['searchenddate']; 
if ($searchstartdate=="" || $searchenddate=="")
{
    echo "<p><select>";
    echo "<option value=''>Room Number</option>";
    echo "</select></p>";

   }
else
{


$sql="select * from tblrooms  WHERE
  Room_ID NOT IN
  (select Room_ID from tblreservation WHERE Reservation_ID is null
  OR Departure >= '".$searchstartdate."' AND Arrival <= '".$searchenddate."' 
  Union
  select Room_ID from tblwalkins WHERE Customer_ID is null
  OR Departure >= '".$searchstartdate."' AND Arrival <= '".$searchenddate."') ";

 $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

    echo "<p><select>";
    echo "<option value=''>Room Number</option>";

    while($row=mysqli_fetch_array($result)){

    echo "<option value=".$row['Room_ID'].">$row[Room_ID]</option>";
    echo "</select></p>";
}

}
}
?>

