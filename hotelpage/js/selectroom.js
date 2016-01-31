function validReserve(){
        var categoryname=$('#categoryname').val();
        var  roomid=$('#roomid').val();
        var arrival=$('#arrival').val();
        var departure=$('#departure').val();
        var numberofdays=$('#numberofdays').val();
        var total=$('#total').val();

        var dataString = 'categoryname='+ categoryname + '&roomid=' + roomid + '&start=' + arrival + '&end='+ departure + '&numberofdays=' + numberofdays + '&total=' +total ;
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

$(function(){
$(".Login").click(function() 
{ 
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
  $.ajax({
  type: "POST",
  url: "../room/select.php",
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


$(function(){
$(".Login").click(function() 
{ 
var searchid = $(this).val();
var dataString = 'detailroom='+ searchid;
if(searchid!='')
{
  $.ajax({
  type: "POST",
  url: "../room/searchdetail.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {$("#detailroom").html(html).show();


  
  }
  });
}return false;    
});


});


$(function(){
$(".Login").click(function() 
{ 
var searchadult = $(this).val();
var dataString = 'searchadult='+ searchadult;
if(searchadult!='')
{
  $.ajax({
  type: "POST",
  url: "../room/searchchild.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {$("#resultadult").html(html).show();


  
  }
  });
}return false;    
});


});

$(function(){
$(".Login").click(function() 
{ 
var searchid = $(this).val();
var dataString = 'searchchild='+ searchid;
if(searchid!='')
{
  $.ajax({
  type: "POST",
  url: "../room/searchchild.php",
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


$(function(){
$(".Login").click(function() 
{ 
var searchroomid= $(this).val();
var dataString = 'searchroomid='+ searchroomid;
if(searchroomid!='')
{
  $.ajax({
  type: "POST",
  url: "../room/searchroomid.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {$("#searchroomid").html(html).show();


  }
  });
}return false;    
});


});
//Promo Ajax

function validLoginPromo(){
        var username=$('.user').val();
        var password=$('.pass').val();
    

        var dataString = 'user='+ username + '&pass='+ password ;
        $.ajax({
        type: "POST",
        url: "../CustomerReservation/Login.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               
                 if(result=='success'){
                       alert("successfully login");
                        var username=$('.user').val('');
                        var password=$('.pass').val('');  
                       $(".PromoForm").fadeIn(500, function() { 
                      $(".LoginPromoForm").fadeOut(700);
               
                  });
        
                 }else{
                       alert(result)
                        var username=$('.user').val('');
                       var password=$('.password').val('');  
                     
                  
                 }
        }
        });
  }

  function trim(str){
       var str=str.replace(/^\s+|\s+$/,'');
       return str;
  }


  function validSignUpPromo(){

        var fname=$('.fname').val();
        var lname=$('.lname').val();
        var city=$('.city').val();
        var address=$('.address').val();
        var province=$('.province').val();
        var country=$('.country').val();
        var username=$('.user').val();
        var password=$('.pass').val();
        var cpassword=$('.cpassword').val();
        var contact=$('.contact').val();
        var email=$('.email').val();
        var confirmation=$('.confirmation').val();

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
function validReservePromo(){
   var categoryname=$('#ctgyname').val();
        var  roomid=$('#rmid').val();
        var arrival=$('#start').val();
        var departure=$('#end').val();
        var numberofdays=$('#nmbrdays').val();
        var total=$('#computetotal').val();

        var dataString = 'categoryname='+ categoryname + '&roomid=' + roomid + '&start=' + arrival + '&end='+ departure + '&numberofdays=' + numberofdays + '&total=' + total ;
        $.ajax({
        type: "POST",
        url: "../CustomerReservation/ReservePromo.php",
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
    function validCode(){
         var captcha=$('#captcha').val();   
      
     
        var dataString = 'captcha='+ captcha;
        $.ajax({
        type: "POST",
        url: "../room/validate.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               
                 if(result=='procceed'){
                  alert('thanks for enter the code');   
                     $(".reservepromoForm").fadeOut(700);
                 $(".LoginPromoForm").fadeIn(700, function() { 
              
                  });

        
                 }else 
                 {
                 alert(result)

              }
        }
        });

  }

  function trim(str){
       var str=str.replace(/^\s+|\s+$/,'');
       return str;
  }

  $(function(){
$(".reservepromo").click(function() 
{ 
var promoid = $(this).val();
var dataString = 'promoid='+ promoid;
if(promoid!='')
{
  $.ajax({
  type: "POST",
  url: "../room/Promoid.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {$("#image_previewpromo").html(html).show();
    $('#image_previewpromo').css("display", "block");
    $('#previewing').attr('width', '100px');
    $('#previewing').attr('height', '100px');

  
  }
  });
}return false;    
});


});
  $(function(){
$(".reservepromo").click(function() 
{ 
var searchid = $(this).val();
var dataString = 'detailpromoroom='+ searchid;
if(searchid!='')
{
  $.ajax({
  type: "POST",
  url: "../room/searchdetailpromo.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {$("#detailpromoroom").html(html).show();


  
  }
  });
}return false;    
});


});