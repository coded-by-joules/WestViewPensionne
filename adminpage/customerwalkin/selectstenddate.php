
<?php
if ($_POST)
{
    include("../connection.php");
$searchenddate=$_POST['searchenddate'];


   $sql = "select * from tblwalkins
                where Customer_ID='".$searchenddate."'";


   $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

   while($row=mysqli_fetch_array($result)){
    echo "$row[Departure]";
 
  }
}
?>