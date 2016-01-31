  function validAddingOn(){
      var confirmation=$('#confirmation').val();
        var item=$('#autoaddon').val();
        var customerid=$('#customerid').val();
        var quantity=$('#quantity').val();
        var price=$('#price').val();
        var amount=$('#amount').val();
        var downpayment=$('#downpayment').val();
        var status=$('#stat').val();
        var user=$('#user').val();
     
        var dataString ='confirmation=' + confirmation + '&customerid='+ customerid + '&item=' + item + '&quantity=' + quantity + '&price=' + price +  '&amount=' + amount + '&downpayment=' + downpayment
                        + '&user=' + user  + '&status=' + status;
        $.ajax({
        type: "POST",
        url: "../CustomerReservation/addingon.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               
                 if(result=='true'){

                   alert("Addon successfully added");
               if (user=="Staff")
               {

                   window.location='../../adminpage/pages/transaction-staff.php';
               }
               else if (user=="Administrator")
               {
                 window.location='../../adminpage/pages/transaction.php';
               }
        
                 }
          else{
                  alert(result)
                  var item=$('#item').val('');
                  var price=$('#price').val('');
                  var quantity=$('#qty').val('');

              }
        }
        });

  }

      function trim(str){
       var str=str.replace(/^\s+|\s+$/,'');
       return str;
  }

  function updateAddon(){
        var confirmation=$('#confirmation').val();
        var item=$('#editaddon').val();
        var quantity=$('#quantity').val();
        var price=$('#price').val();
        var amount=$('#amount').val();
        var user=$('#user').val();
     
        var dataString ='confirmation=' + confirmation + '&item=' + item + '&quantity=' + quantity + '&price=' + price +  '&amount=' + amount 
                        + '&user=' + user ;
        $.ajax({
        type: "POST",
        url: "../CustomerReservation/updateaddon.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               
                 if(result=='true'){

                   alert("Addon successfully updated");
               if (user=="Staff")
               {

                   window.location='../../adminpage/pages/guestaddon.php';
               }
               else if (user=="Administrator")
               {
                 window.location='../../adminpage/pages/transaction.php';
               }
        
                 }
          else{
                  alert(result)
                  var item=$('#item').val('');
                  var price=$('#price').val('');
                  var quantity=$('#qty').val('');

              }
        }
        });

  }


$(function(){
$("#autoaddon").change(function() 
{ 
var item = $(this).val();
var dataString = 'searchitem='+ item  ;

if(item!='' || item=='Item')
{
  $.ajax({
  type: "POST",
  url: "../addon/item.php",
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
$("#editaddon").change(function() 
{ 
var item = $(this).val();
var dataString = 'searchitem='+ item  ;

if(item!='' || item=='Item')
{
  $.ajax({
  type: "POST",
  url: "../addon/editaddon.php",
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




function calculateTotal() {
        
        var quantity =document.addem.quantity.value;
        var price =   document.addem.price.value;
        totalR = parseFloat(quantity * price );

        if(quantity==0)
        {
          document.getElementById('amount').value = 0;

        }
        
         document.getElementById('amount').value = totalR.toFixed(2);
    }


/*$(function(){
$("#autoaddons").click(function() 
{ 
var confirmation = $(this).val();
var dataString = 'confirmation='+ confirmation;

if(confirmation!='' || confirmation==''  )
{
  $.ajax({
  type: "POST",
  url: "../addon/confirmation.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#confirm").html(html).show();
  }
  });
}return false;    
});
 });*/


function deleteAdds(id) {
   $("#addonID").click(function(e){
    window.location='../room/deleteaddonsreserve.php?addonid='+ id;
});
}




/*$(function(){
$("#autoaddon").change(function() 
{ 
var item = $(this).val();
var dataString = 'searchprice='+ item;

if(item!='' || item=='Item'  )
{
  $.ajax({
  type: "POST",
  url: "../room/item.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#searchprice").html(html).show();
  }
  });
}return false;    
});
 }); */

