
<?php
include("../../connection.php");
if ($_POST)
{ 
$searchstartdate=$_POST['searchstartdate']; 
$searchenddate=$_POST['searchenddate']; 
$fromdate = \DateTime::createFromFormat('d/m/Y', $searchstartdate)->format('Y-m-d');
$todate = \DateTime::createFromFormat('d/m/Y', $searchenddate)->format('Y-m-d');
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
  OR Departure >= '".$fromdate."' AND Arrival <= '".$todate."' 
  Union
  select Room_ID from tblwalkins WHERE Customer_ID is null
  OR Departure >= '".$fromdate."' AND Arrival <= '".$todate."') ";

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

