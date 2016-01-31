
//autofill for searching room walkin
$(function(){
$("#roomid").change(function() 
{ 
var searchroomid = $(this).val();
var dataString = 'searchroomid='+ searchroomid;
if(searchroomid!='' || searchroomid=='')
{
  $.ajax({
  type: "POST",
  url: "../customerwalkin/selectroomid.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#detail").html(html).show();
  
  } 
  });
}return false;    
});
});

$(function(){
$("#selectroomid").change(function() 
{ 
var searchroomid = $(this).val();
var dataString = 'searchroomid='+ searchroomid;
if(searchroomid!='' || searchroomid=='')
{
  $.ajax({
  type: "POST",
  url: "../customerwalkin/selectroomidtransfer.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#detailroom").html(html).show();
  
  } 
  });
}return false;    
});
});

//search image for room transfer
$(function(){
$("#selectroomid").change(function() 
{ 
var searchroomid = $(this).val();
var dataString = 'searchroomid='+ searchroomid;

if(searchroomid!="" ||searchroomid=="" )
{
  $.ajax({
  type: "POST",
  url: "../customerwalkin/searchroomimagetransfer.php",
  data: dataString,
    cache: false, 
  success: function(html)
  {
    $('#image_preview').html(html).show();
    $('#image_preview').css("display", "block");
    $('#previewing').attr('width', '100px');
    $('#previewing').attr('height', '100px');
  }
  });
}return false;    
});
});

$(function(){
$("#sd,#ed").change(function() 
{ 
var searchstartdate = $("#sd").val();
var searchenddate = $("#ed").val();
var dataString = 'searchstartdate='+ searchstartdate + '&searchenddate=' + searchenddate;
if(searchstartdate!='' || searchstartdate=='' && searchenddate !='' || searchenddate=='')
{
  $.ajax({
  type: "POST",
  url: "../customerwalkin/selectdate.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#roomid").html(html).show();
  
  } 
  });
}return false;    
});
});




//searcho image for walkin
$(function(){
$("#roomid").change(function() 
{ 
var searchroomid = $(this).val();
var dataString = 'searchroomid='+ searchroomid;

if(searchroomid!="" ||searchroomid=="" )
{
  $.ajax({
  type: "POST",
  url: "../customerwalkin/searchroomimage.php",
  data: dataString,
    cache: false, 
  success: function(html)
  {
    $('#imagepreview').html(html).show();
    $('#imagepreview').css("display", "block");
    $('#previewing').attr('width', '100px');
    $('#previewing').attr('height', '100px');
  }
  });
}return false;    
});
});

function validWalkin(){
        var  roomid=$('#roomid').val();
        var categoryname=$('#categoryname').val();
        var firstname=$('#firstname').val();
        var lastname=$('#lastname').val();
        var contact=$('#contact').val();
        var arrival=$('#sd').val();
        var departure=$('#ed').val();
        var status=$('#status').val();
        var amount=$('#amount').val();
        var downpayment=$('#downpayment').val();

        var dataString = 'roomid=' + roomid  + '&categoryname='+ categoryname + '&firstname=' + firstname + '&lastname=' + lastname + '&contact=' + contact  + '&arrival=' + arrival + '&departure='+ departure + '&status=' + status + '&amount=' +amount + '&downpayment=' + downpayment;
        $.ajax({
        type: "POST",
        url: "../customerwalkin/addwalkin.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               
                 if(result=='true'){

                      alert("successfully reserve to walkin");
                      window.location='../pages/index.php';
                      $(".walkinForm").fadeOut(700, function() { });
        
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

//search addon item
$(function(){
$("#autoaddon").change(function() 
{ 
var item = $(this).val();
var dataString = 'searchitem='+ item  ;

if(item!='' || item=='Item')
{
  $.ajax({
  type: "POST",
  url: "../customerwalkin/item.php",
  data: dataString,
  cache: false, 
  success: function(html) 
  {
  $("#resultitem").html(html).show();
  }
  });
}return false;    
});
 });


$(function(){
$(".autoaddon").click(function() 
{ 
var customerid = $(this).val();
var dataString = 'customerid='+ customerid;

if(customerid!='' || customerid=='')
{
  $.ajax({
  type: "POST",
  url: "../addon/customerid.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#customerid").html(html).show();
  }
  });
}return false;    
});
 });

 function validwAddingOn(){
        var item=$('#autoaddon').val();
        var customerid=$('#cid').val();
        var quantity=$('#qqitem').val();
        var price=$('#price').val();
        var amount=$('#amount').val();
     
        var dataString ='customerid='+ customerid + '&item=' + item + '&quantity=' + quantity + '&price=' + price +  '&amount=' + amount;
        $.ajax({
        type: "POST",
        url: "../addon/addingon.php",
        data: dataString,
          
        success: function(result){
                     var result=trim(result);
               
                 if(result=='true'){

                   alert("Addon successfully added");
                   window.location='../pages/index.php';
                 $(".addOnautoForm").fadeOut(700, function() { 
                   var quantity=$('#resultitem').val();
                    var price=$('#searchprice').val();
                   var amount=$('#amount').val();
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


    function calculateallTotal() {
        
        var quantity =document.addem.quantity.value;
        var price =   document.addem.price.value;
        totalR = parseFloat(quantity * price );

        if(quantity==0)
        {
          document.getElementById('amount').value = 0;

        }
        else
        {
        
        document.getElementById('amount').value = totalR.toFixed(2);
    }
  }

//search custumer id to calling in database
$(function(){
$(".transfer").click(function() 
{ 
var searchcustomerid = $(this).val();
var dataString = 'searchcustomerid='+ searchcustomerid;
if(searchcustomerid!='' || searchcustomerid=='')
{
  $.ajax({
  type: "POST",
  url: "../customerwalkin/customerid.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#cID").html(html).show();
  }
  });
}return false;    
});


});

$(function(){
$(".transfer").click(function() 
{ 
var searchenddate = $(this).val();
var dataString = 'searchenddate='+ searchenddate;
if(searchenddate!='' || searchstartdate=='')
{
  $.ajax({
  type: "POST",
  url: "../customerwalkin/selectstenddate.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#sd").val(html).each();
  
  
  }
  });
}return false;    
});


});


$(function(){
$(".transfer").click(function() 
{ 
var searchstartdate = $(this).val();
var dataString = 'searchstartdate='+ searchstartdate;
if(searchstartdate!='' || searchstartdate=='')
{
  $.ajax({
  type: "POST",
  url: "../customerwalkin/selecttrstart.php",
  data: dataString, 
  cache: false, 
  success: function(html)
  {
  $("#ed").val(html).each();
  
  
  }
  });
}return false;    
});
});




//selectdate for room transfer
$(function(){
$("#ed,#sd").change(function() 
{ 
var searchstartdate = $("#ed").val();
var searchenddate = $("#sd").val();
var dataString = 'searchstartdate='+ searchstartdate + '&searchenddate=' + searchenddate;
if(searchstartdate!='' || searchstartdate=='' && searchenddate !='' || searchenddate=='')
{
  $.ajax({
  type: "POST",
  url: "../customerwalkin/selectdatetransfer.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#selectroomid").html(html).show();
  
  } 
  });
}return false;    
});
});

//onclick for transfer
  function validTransfer(){
      var  customerid=$('#cID').val();
        var roomid=$('#roomid').val();
        var categoryname=$('#categoryname').val();
        var rate=$('#rte').val();
        var arrival=$('#sd').val();
        var departure=$('#ed').val();
     
        var dataString ='customerid=' + customerid + '&roomid='+ roomid + '&categoryname=' + categoryname + '&rate=' + rate + '&arrival=' + arrival + '&departure=' + departure ;
        $.ajax({
        type: "POST",
        url: "../customerwalkin/Transfer.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               
                 if(result=='true'){

                   alert("successfully Transfer Room");
                   alert(reservationid);
                 $(".TransferForm").fadeOut(700, function() { 
                
         
                  window.location='../customerwalkin/walkin.php';
                  });

        
                 }else{
                       alert(result)

              }
        }
        });

  }

//searchaction
$(function(){
$(".action").click(function() 
{ 
var searchcustomerid = $(this).val();
var dataString = 'searchcustomerid='+ searchcustomerid;
if(searchcustomerid!='' || searchcustomerid=='')
{
  $.ajax({
  type: "POST",
  url: "../customerwalkin/selectcustomerid.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#selectcustomerid").html(html).show();
  
  }
  });
}return false;    
});


});

//action validate
function validAction(){  
        var customerid=$('#cID').val(); 
        var status=$('#stat').val();
        var downpayment=$('#downpayment').val();
        var addonpayable=$('#addonpayable').val();
        var payable=$('#payable').val();
     
        var dataString = 'customerid=' + customerid + '&status=' + status + '&downpayment=' + downpayment + '&addonpayable=' + addonpayable + '&payable=' + payable ;
        $.ajax({
        type: "POST",
        url: "../customerwalkin/Action.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               
                 if(result=='true'){
                
                  window.location='../pages/index.php';

        
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