<?php
include("../../connection.php");
if ($_POST)
{
$item=$_POST['searchitem']; 


   $sql = "select * from tbladdons
                where item ='".$item."'";

                    if ($item=="Item")
    {
        echo '<select class="form-control" name="quantity" class="text" >';
        echo '<option>0</option>';  
    echo '<input class="form-control" type="text" name="price" onkeypress="return isNumberKey(event)" value="">';
      
    } 

 $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));


    while($row=mysqli_fetch_array($result)){
    echo '<select class="form-control" name="quantity"  onchange="calculateTotal()" >';
      for($x=0; $x<=$row["quantity"]; $x++)
    {   
    echo "<option>$x</option>";
    }
    echo "</select>";
    echo '<input class="form-control" type="text" name="price"    onkeypress="return isNumberKey(event)" placeholder="Price">';
  }
}
?>

