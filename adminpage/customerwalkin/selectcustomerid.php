<html>
<body>

<SCRIPT language=Javascript>

$(document).ready(function()
                  {
    $("#stat").change(function()
        {
            if($(this).val() =="Reserve/DownPayment")
        {
            $("#downpayment").show();
        }
        else
        {
          $("#downpayment").hide();
        }
        });
       $("#downpayment").hide();
});

</script> 

<SCRIPT language=Javascript>

$(document).ready(function()
                  {
    $("#stat").change(function()
        {
            if($(this).val() =="Reserve/DownPayment" || $(this).val() =="Reserve"  )
        {
            $("#action").val("Reserve");
        }
            else if($(this).val() =="Check In" )
        {
            $("#action").val("Check In");
        }

        else
        {
          $("#action").val("Check Out");
        }
        });
     
});

</script> 

<?php
  include("../../connection.php");
if ($_POST)
{
$searchcustomerid=$_POST['searchcustomerid'];


    $sql = "select * from tblwalkins               
            where Customer_ID='".$searchcustomerid."'";


   $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

   while($row=mysqli_fetch_array($result)){
    echo"<div>";
    echo "<p><select class='form-control' name='status' class='text' id='stat'>";  
    echo "<option value=".$row['Status'].">".$row['Status']."</option>";


    if ($row['Status'] =="Reserve/DownPayment")
    {
     // echo "<option value='Check In/DownPayment'>Check In/DownPayment</option>";
      echo "<option value='Check In'>Check In</option>";
      echo "<option value='Check Out'>Check Out</option>";  
    }

       else if ($row['Status'] =="Reserve")
    { 
      echo "<option value='Check In'>Check In</option>";
      echo "<option value='Check Out'>Check Out</option>";  
    }
    else
    {
         echo "<option value='Check Out'>Check Out</option>";   
    }

    echo "</select></p>";

  

       if ($row['Status'] =="Reserve/DownPayment" )
    {

    echo "<p><input type='hidden' name='customerid' id='cID' value=".$row['Customer_ID']."></p>";
          echo "<p><input type='hidden' name='addonpayable' id='addonpayable' value=".$row['Addonpayable']. "> </p>";
          echo "<p><input type='hidden' name='downpayment' id='downpyment' value=".$row['Downpayment']. "> </p>";  
          echo "<p><input type='hidden' name='payable' id='payable' value=".$row['Amount']. "> </p>";
        echo "<p ><input type='button' name='edit' class='button2'  value='Check In' id='action'  onclick='validAction()'>";   
        
    }

   
      else  if ($row['Status'] =="Reserve" )
    { 

          echo "<p><input type='hidden' name='customerid' id='cID' value=".$row['Customer_ID']."></p>";
          echo "<p><input type='hidden' name='addonpayable' id='addonpayable' value=".$row['Addonpayable']. "> </p>";
          echo "<p><input type='hidden' name='downpayment' id='downpyment' value=".$row['Downpayment']. "> </p>";  
          echo "<p><input type='hidden' name='payable' id='payable' value=".$row['Amount']. "> </p>";
      echo "<p ><input type='button' name='edit' class='button2' id='action'  value='Check IN' onclick='validAction()'>";  
    
    }
    else if ($row['Status']=='Check In')
    {      

          echo "<p><input type='hidden' name='customerid' id='cID' value=".$row['Customer_ID']."> </p>";
          echo "<p><input type='hidden' name='addonpayable' id='addonpayable' value=".$row['Addonpayable']. "> </p>";
          echo "<p><input type='hidden' name='downpayment' id='downpayment' value=".$row['Downpayment']. "> </p>";  
          echo "<p><input type='hidden' name='payable' id='payable' value=".$row['Amount']. "> </p>";
         //  echo "<p><input type='hidden' name='amount' id='tott'</p>";
            echo "<input type='button' name='edit' class='button2'  value='Check Out' onclick='validAction()' ></p>";    
    }


        echo"</div>";
      
  } 
}
?>
</body>
</html>