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
            if($(this).val() =="Reserve/DownPayment" || $(this).val() =="Reserve" || $(this).val() =="Pending" )
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
  include("../connection.php");
if ($_POST)
{
$searchconfirmation=$_POST['searchconfirmation'];


    $sql = "select tblreservation.Status,tblreservation.Downpayment,tblcustomers.Customer_ID,tblreservation.Reservation_ID,tblreservation.Confirmation,tblreservation.AddonPayable, tblreservation.Payable from tblreservation
            INNER JOIN tblcustomers on tblreservation.Customer_ID=tblcustomers.Customer_ID                  
            where tblreservation.Confirmation='".$searchconfirmation."'";


   $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));

   while($row=mysqli_fetch_array($result)){
    echo"<div>";
    echo "<p><input type='text' name='confirmation' id='confirmation' value=".$row['Confirmation']. "> </p>";

    echo "<p><select name='status' class='text' id='stat'>";  
    echo "<option value=".$row['Status'].">".$row['Status']."</option>";
        $status=$_POST['status'];


    if ($row['Status'] =="Pending")
    {
      echo "<option value='Reserve/DownPayment'>Reserve/DownPayment</option>";
      echo "<option value='Reserve'>Reserve</option>";
      //echo "<option value='Check In/DownPayment'>Check In/DownPayment</option>";
      echo "<option value='Check In'>Check In</option>";

    }
    else if ($row['Status'] =="Reserve/DownPayment")
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

        if ($row['Status'] =="Pending" )
    {
      echo "<p><input type='text' name='downpayment' id='downpayment' placeholder='Downpayment'> </p>";    
      echo "<input type='button' name='edit' class='button2' id='action'  value='Reserve' onclick='validAction()' ></p>";  
      
    }

          else if ($row['Status'] =="Reserve/DownPayment" )
    {
       echo "<p><input type='hidden' name='reservationid' id='reservationid' value=".$row['Reservation_ID']. "> </p>";
          echo "<p><input type='hidden' name='customerid' id='cid' value=".$row['Customer_ID']."></p>";
          echo "<p><input type='hidden' name='addonpayable' id='addonpayable' value=".$row['AddonPayable']. "> </p>";
          echo "<p><input type='hidden' name='downpayment' id='downpyment' value=".$row['Downpayment']. "> </p>";  
          echo "<p><input type='hidden' name='payable' id='payable' value=".$row['Payable']. "> </p>";
     echo "<p><input type='hidden' name='downpayment' id='downpayment' value=".$row['Downpayment']."> </p>"; 
      echo "<p ><input type='button' name='edit' class='button2'  value='Check In' id='action'  onclick='validAction()'>";   
      
    }

   
        if ($row['Status'] =="Reserve" )
    { 
         echo "<p><input type='hidden' name='reservationid' id='reservationid' value=".$row['Reservation_ID']. "> </p>";
          echo "<p><input type='hidden' name='customerid' id='cid' value=".$row['Customer_ID']."></p>";
          echo "<p><input type='hidden' name='addonpayable' id='addonpayable' value=".$row['AddonPayable']. "> </p>";
          echo "<p><input type='hidden' name='downpayment' id='downpyment' value=".$row['Downpayment']. "> </p>";  
          echo "<p><input type='hidden' name='payable' id='payable' value=".$row['Payable']. "> </p>";
      echo "<p ><input type='button' name='edit' class='button2' id='action'  value='Check IN' onclick='validAction()'>";  
    
    }
    else if ($row['Status']=='Check In')
    {      
          echo "<p><input type='hidden' name='reservationid' id='reservationid' value=".$row['Reservation_ID']. " /></p>";
          echo "<p><input type='hidden' name='customerid' id='cid' value=".$row['Customer_ID']."> </p>";
          echo "<p><input type='hidden' name='addonpayable' id='addonpayable' value=".$row['AddonPayable']. "> </p>";
          echo "<p><input type='hidden' name='downpayment' id='downpayment' value=".$row['Downpayment']. "> </p>";  
          echo "<p><input type='hidden' name='payable' id='payable' value=".$row['Payable']. "> </p>";
         //  echo "<p><input type='hidden' name='amount' id='tott'</p>";
            echo "<input type='button' name='edit' class='button2'  value='Check Out' onclick='validAction()' ></p>";    
    }
     else if ($status=='Check In')
    {      
          echo "<p><input type='hidden' name='reservationid' id='reservationid' value=".$row['Reservation_ID']. " /></p>";
          echo "<p><input type='hidden' name='customerid' id='cid' value=".$row['Customer_ID']."> </p>";
          echo "<p><input type='hidden' name='addonpayable' id='addonpayable' value=".$row['AddonPayable']. "> </p>";
          echo "<p><input type='hidden' name='downpayment' id='downpayment' value=".$row['Downpayment']. "> </p>";  
          echo "<p><input type='hidden' name='payable' id='payable' value=".$row['Payable']. "> </p>";
         //  echo "<p><input type='hidden' name='amount' id='tott'</p>";
            echo "<input type='button' name='edit' class='button2'  value='Check Out' onclick='validAction()' ></p>";    
    }


        echo"</div>";
      
  } 
}
?>
</body>
</html>