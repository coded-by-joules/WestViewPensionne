<?php
include("../connection.php");
if ($_POST)
{
$item=$_POST['searchprice']; 


   $sql = "select * from tbladdons
                where item ='".$item."'";


    if ($item=="Item")
    {
       echo "<p><input type='text' name='price' id='p' value='0' > </p>";

    } 
 $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
 $found=mysqli_num_rows($result);

    while($row=mysqli_fetch_array($result)){


 echo "<p><input type='text' name='price' id='p' value=".$row['price']." > </p>";


}
}
?>
