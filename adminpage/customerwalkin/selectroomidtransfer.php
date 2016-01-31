
<?php
include("../connection.php");
if (isset($_POST['searchroomid']))
{ 
$searchroomid=$_POST['searchroomid']; 
if ($searchroomid=="")
{
   echo "<div style='margin-top:-2px'>";   
    echo "<p><input type='text' name='categoryname' id='categoryname' class='text' placeholder='CategoryName'></p>";
    echo "<p><input type='text' name='rate' id='rate' class='text'   placeholder='Rate' readonly></p>";
    echo "<p><select name='status' id='status' class='text'><option></option></select></p>";
    echo "</div>";   
   }
else
{


$sql="select tblcategories.CategoryName, 
  tblrooms.Rate,tblrooms.Discount, tblrooms.Description, tblrooms.Status,tblrooms.No_adult,tblrooms.No_child,tblrooms.Date_Start,tblrooms.Date_End, tblrooms.Image 
  FROM tblrooms Inner JOIN tblcategories on tblrooms.Category_ID=tblcategories.Category_ID
  where tblrooms.Room_ID='".$searchroomid."'";	

 $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

    while($row=mysqli_fetch_array($result)){

    echo "<div style='margin-top:-2px'>";   
    echo "<p><input type='text' name='categoryname' id='categoryname' class='text' value=".$row['CategoryName']."></p>";
    echo "<p><input type='text' name='amount' id='amount' class='text'   value=".$row['Rate']." readonly></p>";
    echo "<p><select name='status'  class='text'><option>$row[Status]</option></select></p>";
}   echo "</div>";

}
}
?>

