<html>
<head>
<link href="../css/walkin.css" rel="  stylesheet" type="text/css" />
<link href="../css/datepicker.css" rel="stylesheet" type="text/css" /> 
<!--auto fill-->
<script  src="../js/jquery-1.8.0.min.js"></script>
<!--fade in-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="../js/datepicker.js"></script> 
<script src="../js/walkin.js"></script>
<!--AjAX-->
<script type="text/javascript" src="../js/walkinajax.js"></script>

  <style>
  table, th, td {
    margin: 0;
    font-family: "Trebuchet MS", sans-serif;
    width:20px;
    font-size: 10pt;
    appearance: none;
    box-shadow: none;
    padding: 10px 20px 10px 20px;
    border: solid 1px #dcdcdc;
    transition: box-shadow 0.3s, border 0.3s;
    border-radius: 5px;
    margin-bottom: 40px;
        background-color:white;
  }

  </style>


<SCRIPT language=Javascript>

$(document).ready(function()
                  {
    $("#status").change(function()
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
    $("#status").change(function()
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



</head>
<body>
<?php 
  include("../connection.php");
  $sql = "select * from tblreservation";
   $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
   $num=mysqli_num_rows($result);
    if($num>0)
    {
     while($row=mysqli_fetch_array($result)){

     $arrival=$row['Arrival'];
     $departure=$row['Departure'];
 
    }

      mysqli_close($conn);
  }

?>

<?php 
  include("../connection.php");
  $sql = "select * from tblwalkins";
   $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
   $num=mysqli_num_rows($result);
    if($num>0)
    {
     while($row=mysqli_fetch_array($result)){

     $A=$row['Arrival'];
     $D=$row['Departure'];
 
    }

      mysqli_close($conn);
  }

?>


<a href="#" class="walkin">Walkin</a>
</BR>
</BR>

<div class="walkInForm">
<a href="#" class="close">CLOSE</a>
<form action="Walkin.php" method="post">
<div class="boxwalkinform">
<p class="sUp">Walk In</p>
<div class="insidewalkin"> 
<center>
<p><select name="roomid" class="text" id="roomid" style="margin-top:-5px;">
<option value="">Room Number</option>
</select></p>
<div id="detail" style="margin-top:-15px;">
<p><input type="text" name="categoryname" id="categoryname" class="text"   placeholder="RoomType" readonly></p>
<p><input type="text" name="amount" id="amount"  class="text" onkeypress="return isNumberKey(event)" placeholder="PromoRate" required></p>
<p><select name="status" class="text"><option></option>
</select></p>
</div>
<p><input type="text" name="firstname" id="firstname" class="text"   placeholder="FirstName" ></p>
<p><input type="text" name="lastname" id="lastname" class="text"  placeholder="LastName" required></p>
<p><input type="text" name="contact" id="contact"  class="text" onkeypress="return isNumberKey(event)" placeholder="Contact" required></p>
<p><input type="text" name="arrival"  class="w8em format-d-m-y highlight-days-67 range-low-today" id="dd" value="" maxlength="10" readonly placeholder="Start Date"  /></p>  
<p><input type="text" name="departure"  class="w8em format-d-m-y highlight-days-67 range-low-today" id="wd" value="" maxlength="10" placeholder="End Date" readonly /></p> 
<p><select name="status" id="status" class="text">
<option value="Reserve">Reserve</option>
<option value="Reserve/DownPayment">Reserve/Downpayment</option>
<option value="Check In">Check In</option>
</select></p>	
<p><input type='text' name='downpayment' id='downpayment' placeholder="Downpayment"> </p>
<div id="imagepreview"><img src="../src/no-image.jpg"  height="115" width="175" ></div>
<p><input type="button" name="walkin" class="button2" id="action" value="Reserve" onclick="validWalkin()"></p>     
        
</center>
</div>
</div>
</div>  
</form> 


  <?php
  include("../connection.php");

$sql = "select * from tblwalkins";

   $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
 echo "<table><tr><th>FirstName</th><th>LastName</th><th>Contact</th><th>Room_ID</th><th>CategoryName</th><th>Arrival</th><th>Departure</th><th>NumberofDays</th><th>Status</th><th>Addon Payable</th><th>Downpayment</th><th>Amount</th><th>Add on</th><th>Discount</th></th><th>Transfer Room</th><th>Action</th</tr>";
    while($row=mysqli_fetch_array($result))
    {
           

  echo "<tr>

  <td> ".$row["FirstName"]. "</td>
  <td> ".$row["LastName"]. "</td>
  <td> ".$row["Contact"]." </td>
  <td> ".$row["Room_ID"]. "</td>
  <td> ".$row["CategoryName"]. "</td>
  <td> ".$row["Arrival"]. "</td>
  <td> ".$row["Departure"]. "</td>
  <td> ".$row["NumberofDays"]. "</td>
  <td> ".$row["Status"]. "</td>
  <td> ".$row["Addonpayable"]. "</td>
  <td> ".$row["Downpayment"]. "</td>
  <td> ".$row["Amount"]. "</td>
  <td><button value=".$row['Customer_ID']. " class='autoaddon'>Add on</button></td>
  <td><button value=".$row["CategoryName"]."  class='editpromo'>Discount</button></td>
  <td><button value=".$row["Customer_ID"]."  class='transfer'>Transfer Room</button></td>
  <td><button value=".$row["Customer_ID"]."  class='action'>Action</button></td>";

$arrival=$row['Arrival'];
$departure=$row['Departure'];
 
    }
    echo "</table>";

      mysqli_close($conn);
    ?>

    <div class="addOnautoForm">
<a href="#" class="close2">CLOSE</a>
<form name="addem"  method="post" action="addingon.php" id="addem">
<div class="box">
<p class="sUp">Add On</p>
<div class="inside"> 
<center>
<p id="customerid" ><input type="hidden" name="customerid"  class="text"></p>  
<p><select name="item" class="text" id="autoaddon" >  
<option value='Item'>Item</option> 
  <?php
include("../connection.php");
$sql="select item from tbladdons";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
while ($row=mysqli_fetch_array($result)){ ?>
 <option><?php echo $row['item']; ?> </option>
<?php } ?>
</select></p>
<p><select name="quantity" class="text" id="resultitem" onchange="calculateTotal()"  >
<option>Quantity</option></select></p>
<p id="searchprice" ><input type="text" name="price" id="price"  class="text"  onkeypress="return isNumberKey(event)" placeholder="Price"></p>
<p><input type="text" name="amount" id="total" class="text"  onkeypress="return isNumberKey(event)" placeholder="Amount" ></p>
<p><input type="button" name="addon" class="button2"  value="Add" onclick="validAddingOn()"></p>              
</div>
</center>
</div>
</div>
</div>
</form>



<div class="actionForm">
<a href="#" class="close2">CLOSE</a>
<form   method="post" action="action.php" >
<div class="box">
<p class="sUp">Action</p>
<div class="inside"> 
<center>
<div id="selectcustomerid" > 
<p><select name="status" class="text" >  
<p><input type='text' name="customerid" > </p>
<p><select name='status' class="text" >
<option></option>
</select></p>
</div>  
            
</div>
</center>
</div>
</div>
</div>
</form>


      <?php
  include("../connection.php");

$sql = "select tblwalkins.FirstName,tblwalkins.LastName,tbltransactionwalkin.Amount,tblwalkins.Room_ID from
     tbltransactionwalkin INNER JOIN tblwalkins on tbltransactionwalkin.Customer_ID=tblwalkins.Customer_ID ";

     $result = mysqli_query($conn, $sql) or die (mysqli_error($conn));
 echo "<table><tr><th>FirstName</th>
 <th>LastName</th>
 <th>Room #</th>
 <th>Amount</th>
 <th>Delete</th>
 <th>Update</th></tr>";
    while($row=mysqli_fetch_array($result))
    {
           

  echo "<tr>
  <td> ".$row["FirstName"]." </td>
  <td> ".$row["LastName"]. "</td>
  <td> ".$row["Room_ID"]." </td>
  <td> ".$row["Amount"]. "</td>
  <td><button value=".$row["FirstName"]. " class='autoaddon'>Delete</button></td>
  <td><button value=".$row["LastName"]."  class='editpromo'>Update</button></td></tr>";

 
    }
    echo "</table>";

    mysqli_close($conn);
    ?>
<div class="transferForm">
<a href="#" class="close2">CLOSE</a>
<form action="Transfer.php">
<div class="boxtransferform">
<p class="sUp">Transfer Room</p>
<div class="insidepromo"> 
<center>
<p><input type="text" name="cid" id='cid' class="text"  readonly></p>
<p><select name="roomid" class="text" id="selectroomid">
<option value="">Room Number</option>
</select></p>
<div id="detailroom" style="margin-top:-5px;">
<input type="text" name="roomtype"  class="text"   placeholder="RoomType" readonly></p>
<p><input type="text" name="rate"  class="text" onkeypress="return isNumberKey(event)" placeholder="PromoRate" required></p>
<p><select name="stat"  class="text"><option></option>
</select></p>
</div>
<p><input type="text" name="arrival"  class="w8em format-d-m-y highlight-days-67 range-low-today" id="ed" value="" maxlength="10" readonly placeholder="Start Date"  /></p>  
<p><input type="text" name="departure"  class="w8em format-d-m-y highlight-days-67 range-low-today" id="sd" value="" maxlength="10" placeholder="End Date" readonly /></p>
<div id="image_preview"><img src="no-image.jpg"  height="115" width="175" ></div>
<p><input type="button" name="transferroom" class="button2"  value="Ok" onclick="validTransfer()"></p>     
        
</center>
</div>
</div>
</div>  
</form> 


</body>
</html>

