
<?php
include("../../connection.php");
if ($_POST)
{ 
$fromdate=$_POST['searchstartdate']; 
$todate=$_POST['searchenddate']; 

$searchstartdate = \DateTime::createFromFormat('d/m/Y', $fromdate)->format('Y-m-d');
$searchenddate= \DateTime::createFromFormat('d/m/Y', $todate)->format('Y-m-d');
if ($searchstartdate=="" || $searchenddate=="") {
    echo "<select>";
    echo "<option value=''>Room Number</option>";
    echo "</select>";

} else {


$sql="select * from tblrooms  WHERE
  Room_ID NOT IN
  (select Room_ID from tblreservation WHERE Reservation_ID is null
  OR Departure >= '".$searchstartdate."' AND Arrival <= '".$searchenddate."' 
  Union
  select Room_ID from tblwalkins WHERE Customer_ID is null
  OR Departure >= '".$searchstartdate."' AND Arrival <= '".$searchenddate."') ";

 $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

    echo "<select>";
    echo "<option value=''>Room Number</option>";

    while($row=mysqli_fetch_array($result)){

    echo "<option value=".$row['Room_ID'].">$row[Room_ID]</option>";
    echo "</select>";
}

}
}
?>

