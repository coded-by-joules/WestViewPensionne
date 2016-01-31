
<?php
if ($_POST)
{
    include("../connection.php");
$searchpromoid=$_POST['searchpromoid'];


   $sql = "select tblpromotion.Room_ID, tblpromotion.CategoryName, 
                tblpromotion.Promo_Rate, tblpromotion.Description, tblpromotion.Status, 
                tblpromotion.Date_Start,tblpromotion.Date_End,tblrooms.Image 
                 FROM tblpromotion INNER JOIN 
                tblrooms ON tblpromotion.Room_ID=tblrooms.Room_ID
                where tblpromotion.CategoryName='".$searchpromoid."'";


   $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

   while($row=mysqli_fetch_array($result)){
    echo "<div><p><input text='type' name='roomid' class='text' value=".$row['Room_ID']."></p>";
    echo" <input text='type' name='roomid' class='text' value=".$row['CategoryName'].">";
    echo "<p><input text='type' name='rate' class='text' value=".$row['Promo_Rate']."><p>";
    echo "<p><input text='type' name='descript' class='text' value=".$row['Description']."><p>";
    echo "<p><select name='status' id='Status' class='text'>
          <option>$row[Status]</option>";
        if ($row['Status']=='Available')
        {
          echo "<option>Not Available</option>";
        }
        else
        {
          echo"<option>Available</option>";
        }
        echo "</select>";     
      echo "<div id='image_preview'><img src=".$row['Image']."  height='115' width='175' ></div>"; 
      echo "<div>$row[Image]</div>";          
       echo "</div>";
  }
}
?>