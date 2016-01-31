<?php
  include("../../connection.php");
if ($_POST)
{
$confirmation=$_POST['confirmation'];


    $sql = "select * from tblreservation
                where Confirmation='".$confirmation."'";


   $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

   while($row=mysqli_fetch_array($result)){
   	echo "<div>";
   	echo "<input type='text' name='confirmation' id='cnfrm' class='form-control' value=".$row['Confirmation']." placeholder='Confirmation Code'>";
     echo "</div>"; 
  }
}
?>
