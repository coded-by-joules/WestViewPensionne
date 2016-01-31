
<?php
include("../connection.php");
if ($_POST)
{


$searchroomid=$_POST['searchroomid']; 

if ($searchroomid=="")
{
  echo "<img id='preview' src='../src/no-image.jpg' width='175' height='115' >";
}
else
{


   $sql = "select * from tblrooms where Room_ID ='".$searchroomid."'";

 $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
 $found=mysqli_num_rows($result);
  if ($found>0)
  {
    while($row=mysqli_fetch_array($result)){
    echo "<img  src='../room/$row[Image]' width='175' height='115'>";
    echo "<div style='margin-top:-10px; font-size:20px; line-height:10px;'>";
    echo "<p><span>No of Adult: $row[No_adult]</span></p>";
    echo "<p><span>No of Child: $row[No_child]</span></p>";
    echo "<p><span>Description: $row[Description]</span></p>";
    echo "</div>";
}
}
}
}
?>