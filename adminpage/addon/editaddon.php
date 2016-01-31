<html>
<body>
                             


<?php
include("../../connection.php");
if ($_POST)
{
$item=$_POST['searchitem']; 



   $sql = "select * from tbladdons
                where item ='".$item."'";

                    if ($item=="Item" )
    {
        echo '<select class="form-control"  name="quantity" class="text" >';
        echo '<option>quantity</option>';  
     echo '<input class="form-control" type="text" name="price" id="price" onkeypress="return isNumberKey(event)" placeholder="Price">';
      echo '<input class="form-control" type="text" name="amount" placeholder="Amount" onkeypress="return isNumberKey(event)">';
    } 
 $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    while($row=mysqli_fetch_array($result)){
    echo '<form name="addem" id="addem" action="addingon.php"  method="post" >';    
    echo '<select class="form-control" name="quantity" id="quantity"  onchange="calculateTotal()" >';
      for($x=0; $x<=$row["quantity"]; $x++)
    {   
    echo "<option>$x</option>";
    }
    echo "</select>";
    echo '<input class="form-control" type="text" name="price" id="price" value='.$row['price'].' onkeypress="return isNumberKey(event)" placeholder="Price">';
    echo '<input class="form-control" type="text" name="amount" id="amount" placeholder="Amount" onkeypress="return isNumberKey(event)">';

 } 
}
?>
</body>
</html>
