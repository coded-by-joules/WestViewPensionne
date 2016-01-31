<html>
<head>
<title>Westview Hotel</title>
<link rel="stylesheet" href="../css/Mystyle.css">
<script src="../js/jquery-1.4.1.min.js"></script>
<script src="../js/register.js"></script>
<script src="../js/jquery.js"></script>
<script  src="../js/jquery-1.8.0.min.js"></script>

<script type="text/javascript" >
function validReserve(){
   var categoryid=$('#categoryid').val();
        var  roomid=$('#roomid').val();
        var arrival=$('#arrival').val();
        var departure=$('#departure').val();
        var numberofdays=$('#numberofdays').val();
        var total=$('#total').val();

        var dataString = 'categoryid='+ categoryid + '&roomid=' + roomid + '&start=' + arrival + '&end='+ departure + '&numberofdays=' + numberofdays + '&total=' +total ;
        $.ajax({
        type: "POST",
        url: "../CustomerReservation/Reserve.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               
                 if(result=='true'){
                       alert("successfully reserve");
                       window.location='../CustomerReservation/Payment.php';
        
                 }else{
                       alert(result)
      
                     
                  
                 }
        }
        });
  }

  function trim(str){
       var str=str.replace(/^\s+|\s+$/,'');
       return str;
  }
  </script>

  <script type="text/javascript" >
function validLogin(){
        var username=$('#username').val();
        var password=$('#password').val();
    

        var dataString = 'user='+ username + '&pass='+ password ;
        $.ajax({
        type: "POST",
        url: "../CustomerReservation/Login.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               
                 if(result=='success'){
                       alert("successfully login");
                           var username=$('#username').val('');
                            var password=$('#password').val('');  
                       $(".ReserveForm").fadeIn(500, function() { 
                      $(".LoginForm").fadeOut(700);
               
                  });
        
                 }else{
                       alert(result)
                        var username=$('#username').val('');
                            var password=$('#password').val('');  
                     
                  
                 }
        }
        });
  }

  function trim(str){
       var str=str.replace(/^\s+|\s+$/,'');
       return str;
  }
  </script>

  <script type="text/javascript" >

  function validSignUp(){

        var fname=$('#fname').val();
        var lname=$('#lname').val();
        var city=$('#city').val();
        var address=$('#address').val();
        var province=$('#province').val();
        var country=$('#country').val();
        var username=$('#user').val();
        var password=$('#pass').val();
        var cpassword=$('#cpassword').val();
        var contact=$('#contact').val();
        var email=$('#email').val();
        var confirmation=$('#confirmation').val();

        var dataString = 'firstname='+ fname + '&lastname='+ lname + '&city=' + city + '&address='+ address + '&province='+ province + '&country='+country +'&username=' + username + '&password='+password + '&cpassword=' +cpassword +  '&confirmation='+ confirmation + '&contact=' +contact + '&email=' + email ;
        $.ajax({
        type: "POST",
        url: "../CustomerReservation/Personalinfo.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               
                 if(result=='success'){
                   alert("Account successfully added");
                 $(".signUpForm").fadeOut(700, function() { 
                 $(".LoginForm").fadeIn(700);
                  });

        
                 }else{
                       alert(result)
              }
        }
        });

  }

  function trim(str){
       var str=str.replace(/^\s+|\s+$/,'');
       return str;
  }
  </script>
  <SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>

<script type="text/javascript">
$(function(){
$(".Login").click(function() 
{ 
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
  $.ajax({
  type: "POST",
  url: "select.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {$("#image_preview").html(html).show();
    $('#image_preview').css("display", "block");
    $('#previewing').attr('width', '100px');
    $('#previewing').attr('height', '100px');

  
  }
  });
}return false;    
});


});

</script>
<script type="text/javascript">
$(function(){
$(".Login").click(function() 
{ 
var searchid = $(this).val();
var dataString = 'detailroom='+ searchid;
if(searchid!='')
{
  $.ajax({
  type: "POST",
  url: "searchdetail.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {$("#detailroom").html(html).show();


  
  }
  });
}return false;    
});


});

</script>

<script type="text/javascript">
$(function(){
$(".Login").click(function() 
{ 
var searchadult = $(this).val();
var dataString = 'searchadult='+ searchadult;
if(searchadult!='')
{
  $.ajax({
  type: "POST",
  url: "searchchild.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {$("#resultadult").html(html).show();


  
  }
  });
}return false;    
});


});

</script>
<script type="text/javascript">
$(function(){
$(".Login").click(function() 
{ 
var searchid = $(this).val();
var dataString = 'searchchild='+ searchid;
if(searchid!='')
{
  $.ajax({
  type: "POST",
  url: "searchchild.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#resultchild").html(html).show();

  }
  });
}return false;    
});


});

</script>


</head>

<body>

<?php

$arrival=$_POST['start'];
$departure=$_POST['end'];
$numberofdays = $_POST['numberofdays'];

?>


<?php
  //Date Start!!

  include("../connection.php");
  include("../Class/Reservation.php");

/* $sql = "select  tblrooms.Room_ID,tblcategories.Category_ID, tblcategories.CategoryName, 
                tblrooms.Rate, tblrooms.Description, tblrooms.Status,tblrooms.No_adult,tblrooms.No_child,tblrooms.Image 
                 FROM tblrooms INNER JOIN 
                tblcategories ON tblrooms.Category_ID=tblcategories.Category_ID";*/

$sql="SELECT r.*, c.*  FROM tblrooms r INNER JOIN  tblcategories c on r.Category_ID=c.Category_ID
  LEFT JOIN tblreservation b ON b.Room_ID = r.Room_ID WHERE b.Reservation_ID is null
  OR (b.Departure >= '$arrival' AND b.Arrival >= '$departure') 
  OR (b.Departure <= '$arrival' AND b.Departure <= '$departure')";


     $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

while($row = mysqli_fetch_array($result))
{
if ($row['Status']=='Available')
{

          echo '<div style="height: 117px;">';
          echo '<div style="float: left; width: 100px; margin-left: 15px; margin-top:20px;">';
          echo "<img width=100 height=100 alt='Unable to View' src='" .$row["Image"] . "'>";
          echo '</div>';
          echo '<div style="float: left; width: 575px; margin-top: 15px; margin-left: 20px;">';
          echo '<input id="checkroom" type="checkbox" name="" />';        
          echo '<button value='.$row['Room_ID'].'  class="Login" id="searchid"  />Reserve</button>';     
          echo '<br>';    
          echo '<span class="style5" >'.'Room ID: '.$row['Room_ID'].'  </span><br>';
          echo '<span class="style5">'.'Status: '.$row['Status'].' '.'Room'.'  </span><br>';
        echo '<span class="style5">'.'Room Type: '.$row['CategoryName'].'</span><br>';
          echo '<span class="style5">'.'Rate: '.$row['Rate'].'</span><br>';
          echo '<span class="style5">'.'Max Child: '.$row['No_child'].'</span><br>';
          echo '<span class="style5">'.'Max Adult: '.$row['No_adult'].'</span><br>';
          echo '<span class="style5">'.'Room Description: '.$row['Description'].'</span><br>';
          echo '</div>';
          echo '</div>';
          echo '<br>';
          echo '<br>';  
          echo '<br>';
          echo '<br>';  

  
          $room_id=$row['Room_ID'];
          $categoryid=$row['Category_ID'];
          $adult=$row['No_adult'];
          $child=$row['No_child'];
          $rate=$row['Rate'];



          $payable=  $rate * $numberofdays; 
          $total=number_format($payable);
    } 
        }
  
    mysqli_close($conn);
//Date End
?> 
  


<div class="LoginForm">
<a href="#" class="close">CLOSE</a>
<form action="../CustomerReservation/Login.php" method="post">
<div class="box">
<p class="sUp">Login</p>
<div class="inside" style="margin-left:-20px; margin-top:-60px;"> 
<div class="left">
<p><input type="text" name="user" id="username" placeholder="Username"></p>
<p><input type="password" name="pass" id="password" placeholder="Password" ></p>
<p><span class="remme">I agree the terms and condition of this hotel</span></p>
<p><input type="button" name="login" class="button" value="Login"  onclick="validLogin()" ></p>             
</div>
</div>
<div class="inside2">
<div class="right">
<div class="button1">
<a href="#" class="signUp">Sign Up</a>
</div>
</div>
</div>
</div>
</div>
</form>     



<div class="ReserveForm">
<a href="#" class="close">CLOSE</a>
<form action="../CustomerReservation/Reserve.php" method="post">
<div class="box">
<p class="sUp">Reservation</p>
<div class="inside" style="margin-left:-20px; margin-top:100px;"> 
<div class="left"> 
<div id="image_preview"><img src="no-image.jpg"  height="115" width="175" ></div>
<div id="detailroom"   style="margin-top:-70px; line-height:10px; color:black; float:left; margin-left:-60px">
<p><span></span></p>  
</div>
<p><select class="selectoption" id="resultadult"> 
<option ></option>
</select></p>
<p><select class="selectoption" id="resultchild"> 
<option ></option>
</select></p>
<p><input type="hidden" name="categoryid" id="categoryid" value="<?php echo $categoryid ; ?>"> </p>
<p><input type="hidden" name="roomid" id="roomid" value="<?php echo $room_id ; ?>"> </p>
<p><input type="hidden" name="start" id="arrival" value="<?php echo $arrival ; ?>"> </p>
<p><input type="hidden" name="end"  id="departure" value="<?php echo $departure ;?>"></p>
<p><input type="hidden" name="numberofdays"  id="numberofdays" value="<?php echo $numberofdays ;?>"></p>
<p><input type="hidden" name="total" id="total" value="<?php echo $total ;?>"></p>
<p><input type="checkbox" value="1" id="checkboxInp"  style="float:left;"></p>
<p><span class="remme">I agree the terms and condition of this hotel</span></p>
<p><input type="button" name="reserve" class="button" value="Reserve"  onclick="validReserve()" ></p>             
</div>
</div>
</div>
</div>
</form>       


<div class= "signUpForm">
<a href="#" class="close2">CLOSE</a>
<form action="../CustomerAccount/Personalinfo.php" method="post">
<div class="box">
<p class="sUp">Sign Up</p>
<div class="inside" style="margin-top:-60px;"> 
<center>
<p><input type="text" name="firstname" id="fname" placeholder="FirstName" ></p>
<p><input type="text" name="lastname"  id="lname"  placeholder="LastName" ></p>
<p><input type="text" name="city" id="city" placeholder="City" ></p>
<p><input type="text" name="address"  id="address"  placeholder="Address" </p>
<p><input type="text" name="province"  id="province"   placeholder="Province" ></p>
<p><select name="country" class="selectoption"  id="country"   >
<option value="Philippines">Philippines</option>
<option value="USA">USA</option>
</select>
<p><input type="text" name="username"  id="user"   placeholder="Username" ></p>
<p><input type="password" name="password"  id="pass"   placeholder="Password" ></p>
<p><input type="password" name="cpassword"  id="cpassword"   placeholder="Confirm Password" ></p>
<p><input type="text" name="contact"  id="contact"  onkeypress="return isNumberKey(event)"  placeholder="Contact" required></p>
<p><input type="text" name="email"  id="email"   placeholder="Email Address" required></p>
<p><input type="checkbox" value="1" id="checkboxInp"  style="float:left;"></p>
<p><span class="remme">I agree the terms and condition of this hotel </span></p>
<p><input type="button" name="signup" class="button" value="Sign Up" onclick="validSignUp()"></p>              

</div>
</center>
</div>
</div>
</div>
</form>


</body>
</html>

