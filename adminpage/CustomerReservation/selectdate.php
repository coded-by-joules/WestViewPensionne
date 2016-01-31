
<?php
session_start();
include("../../connection.php");
if ($_POST)
{ 
$fromdate=$_POST['searchstartdate']; 
$todate=$_POST['searchenddate']; 

$searchstartdate = \DateTime::createFromFormat('d/m/Y', $fromdate);
$searchenddate= \DateTime::createFromFormat('d/m/Y', $todate);

  $fromdate=$searchstartdate->format('Y-m-d');
  $todate=$searchenddate->format('Y-m-d');


  $from=date_create($fromdate);
  $to=date_create($todate);
  $diff= date_diff($from, $to);

  $Numberofdays = $diff->d;


if ($searchstartdate=="" || $searchenddate=="") {
    echo "<select>";
    echo "<option value=''>Room Number</option>";
    echo "</select>";

} else {


$sql="select * from tblrooms  WHERE
  Room_ID NOT IN
  (select Room_ID from tblreservation WHERE Reservation_ID is null
  OR Departure >= '".$fromdate."' AND Arrival <= '".$todate."' AND Status!='Cancelled' AND Status!='Check Out'
  Union
  select Room_ID from tblwalkins WHERE Customer_ID is null
  OR Departure >= '".$fromdate."' AND Arrival <= '".$todate."') ";

 $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

    echo "<select>";
    echo "<option value=''>Room Number</option>";

    while($row=mysqli_fetch_array($result)){

if ($row['Status']=="Available")
{
    echo "<option value=".$row['Room_ID'].">$row[Room_ID]</option>";
    echo "</select>";
        $_SESSION['Numberofdays']=$Numberofdays;
        $_SESSION['fromdate']=$fromdate;
        $_SESSION['todate']=$todate;
}
else
{
}
}
}
}
?>

