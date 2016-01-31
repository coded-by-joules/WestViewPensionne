
  function validAccount(){


        var username=$('#user').val();
        var username2=$('#user2').val();
        var email=$('#email').val();
        var password=$('#pass').val();
        var cnfrmpassword=$('#cnfrmpass').val();
      
     
        var dataString =  '&username=' + username + '&username2='+ username2 + '&email=' + email +  '&password='+password + '&cnfrmpass=' +cnfrmpassword;
        $.ajax({
        type: "POST",
        url: "Login.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               
                 if(result=='success'){
                 $(".signUpForm").fadeOut(700, function() { 
                  });

        
                 }
                 else if (result=='true') {

                 $(".signUpForm").fadeOut(700, function() { 
                  });


                 }

                 else{
                       alert(result)
              }
        }
        });

  }

  function trim(str){
       var str=str.replace(/^\s+|\s+$/,'');
       return str;
  }

function refreshCaptcha() {
  $("#img").attr('src','captcha.php');
}


  function validCode(){
         var captcha=$('#captcha').val();   
      
     
        var dataString = 'captcha='+ captcha;
        $.ajax({
        type: "POST",
        url: "validate.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               alert('thanks for enter the code');
                 if(result=='success'){
                $(".reservepromoForm").fadeOut();
                 $(".signInForm").fadeIn(700, function() { 
           
                  });

        
                 }else if (alert(result))
                 {

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
        url: "CustomerReservation/Login.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               
                 if(result=='success'){
                       alert("successfully login");
                           var username=$('#username').val('');
                            var password=$('#password').val('');  
                $(".signInForm").fadeOut(700, function() { 
                 $(".PromoForm").fadeIn(700);
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
        url: "CustomerReservation/Personalinfo.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               
                 if(result=='success'){
                   alert("Account successfully Registered");
                 $(".signUpForm").fadeOut(700, function() { 
                 $(".signInForm").fadeIn(700);
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
   var categoryname=$('#categoryname').val();
        var  roomid=$('#rmid').val();
        var arrival=$('#start').val();
        var departure=$('#end').val();
        var numberofdays=$('#nmbrdays').val();
        var computetotal=$('#total').val();

        var dataString = 'categoryname='+ categoryname + '&roomid=' + roomid + '&start=' + arrival + '&end='+ departure + '&numberofdays=' + numberofdays + '&total=' + computetotal ;
        $.ajax({
        type: "POST",
        url: "CustomerReservation/ReservePromo.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               
                 if(result=='true'){
                       alert("successfully reserve");
                       window.location='CustomerReservation/Payment.php';
        
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
$(".reservepromo").click(function() 
{ 
var searchid = $(this).val();
var dataString = 'detailpromoroom='+ searchid;
if(searchid!='')
{
  $.ajax({
  type: "POST",
  url: "searchdetailpromo.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {$("#detailpromoroom").html(html).show();


  
  }
  });
}return false;    
});


});

$(function(){
$(".reservepromo").click(function() 
{ 
var promoid = $(this).val();
var dataString = 'promoid='+ promoid;
if(promoid!='')
{
  $.ajax({
  type: "POST",
  url: "Promoid.php",
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

