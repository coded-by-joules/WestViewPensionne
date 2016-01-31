
  function validCategory(){
         var categoryid=$('#ctgryid').val();   
        var categoryname=$('#ctgryname').val();
     
        var dataString = 'categoryid='+ categoryid + '&categoryname=' + categoryname;
        $.ajax({
        type: "POST",
        url: "../room/category.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               
                 if(result=='true'){

                   alert("Category successfully added");
                   window.location='../room/manageroom.php';
                 $(".modal").fadeOut(100, function() { 
                  var categoryname=$('#ctgryname').val('');
                  
                  });

        
                 }else{
                       alert(result)
                          var categoryname=$('#ctgryname').val('');

              }
        }
        });

  }


  /* function valideditCategory(){
      
      var categoryid=$('#cID').val();  
      var categoryname=$('#cName').val();

       var dataString = 'cID='+ categoryid + '&cName=' + categoryname;
        $.ajax({
        type: "POST",
        url: "../room/editcategory.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               
                 if(result=='success'){
      
                   alert("Category successfully Updated");
                   window.location='../room/manageroom.php';
                  $("#edit").fadeOut(0, function() { 
                  //var categoryname=$('#cName').val('');
                  
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
  }*/

  //
function valideditAddon(){
         var additem=$('#additem').val(); 
         var addprice=$('#addprice').val();  
        var addquantity=$('#addquantity').val();
        var addID=$('#addID').val();
     
       var dataString = 'additem='+ additem + '&addprice=' + addprice + '&addquantity=' + addquantity + '&addID=' + addID;
        $.ajax({
        type: "POST",
        url: "../room/editaddons.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               
                 if(result=='success'){

                   alert("Add on successfully Updated");
                   window.location='../room/manageroom.php';
                  $("#edit").fadeOut(0, function() { 
                  
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
  //


$(function(){
$(".search").change(function() 
{ 
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='' || searchid=='Show All Room')
{
  $.ajax({
  type: "POST",
  url: "../room/search.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#result").html(html).show();
  }
  });
}return false;    
});


$('#searchid').click(function(){
  jQuery("#result").fadeIn(500);
});
});


$(function(){
$(".searchpromo").change(function() 
{ 
var searchid = $(this).val();
var dataString = 'searchroomid='+ searchid;
if(searchid!='' || searchid=='Show All Promo Room')
{
  $.ajax({
  type: "POST",
  url: "../room/searchpromo.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#resultroompromo").html(html).show();
  }
  });
}return false;    
});


$('#searchiroomid').click(function(){
  jQuery("#resultroompromo").html().show();
});
});



$(function(){
$("#autoaddon").change(function() 
{ 
var item = $(this).val();
var dataString = 'searchitem='+ item;

if(item!='' || item=='Item'  )
{
  $.ajax({
  type: "POST",
  url: "../room/item.php",
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
$(".searchroomtype").change(function() 
{ 
var searchid = $(this).val();
var dataString = 'searchroomimage='+ searchid;

if(searchid!="" ||searchid=="" )
{
  $.ajax({
  type: "POST",
  url: "../room/searchroomimage.php",
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

 $(document).ready(function() {
                $('#submitbtn').click(function(){
                    $(".uploadform").ajaxForm({

                   success: function(result){
               
                 if(result==='success'){

                   alert("Successfully added Room");
                 $(".addRoomForm").fadeOut(500, function() { 
                  window.location='../room/ManageRoom.php';
               

                  });

        
                 }else{
                       alert(result)
                        

              }
        }
                       
                 })
                });
            });


            $(document).ready(function() {
                $('#submitbtnupdate').click(function(){
                    $(".updateform").ajaxForm({

                   success: function(result){
               
                 if(result==='success'){

                   alert("Successfully Update Room");
                 $(".editRoomForm").fadeOut(500, function() { 
                  window.location='../room/ManageRoom.php';
               

                  });

        
                 }else{
                       alert(result)
                        

              }
        }
                       
                 })
                });
            });


            $(document).ready(function() {
                $('#submitbtnpromo').click(function(){
                    $(".addPromoform").ajaxForm({

                   success: function(result){
               
                 if(result==='success'){

                   alert("Successfully added Promo for Room");
                 $(".AddPromotionForm").fadeOut(500, function() { 
                  window.location='../room/ManageRoom.php';
               

                  });

        
                 }else{
                       alert(result)
                        

              }
        }
                       
                 })
                });
            });

  
            $(document).ready(function() {
                $('#submitbtnpromo').click(function(){
                    $(".addPromoform").ajaxForm({

                   success: function(result){
               
                 if(result==='success'){

                   alert("Successfully added Promo for Room");
                 $(".AddPromotionForm").fadeOut(500, function() { 
                  window.location='../room/ManageRoom.php';
               

                    });

        
                 }else{
                       alert(result)
                        

              }
        }
                       
                 })
                });
            });

  function validDelete(){
      var categoryname=$('#categoryname').val();
     
        var dataString = 'categoryname=' + categoryname;
        $.ajax({
        type: "POST",
        url: "../room/deletecategory.php",
        data: dataString,
        
         success: function(result){

               var result=trim(result);

                 if(result=='success'){

                   alert("Successfully deleted Category");
                    window.location='../room/ManageRoom.php';
                }
                else
                 {
                  alert(result);
                 }
        }
        });

  }

  function trim(str){
       var str=str.replace(/^\s+|\s+$/,'');
       return str;
  }


  function validDeleteRoom(){
      var roomid=$('#roomid').val();
     
        var dataString = 'roomid=' + roomid;
        $.ajax({
        type: "POST",
        url: "../room/deleteroom.php",
        data: dataString,
        
         success: function(result){

               var result=trim(result);

                 if(result=='success'){

                   alert("Successfully deleted Room");
                    window.location='../room/ManageRoom.php';
                }
                else
                 {
                  alert(result);
                 }
        }
        });

  }

  function trim(str){
       var str=str.replace(/^\s+|\s+$/,'');
       return str;
  }

$(function(){
$(".editroom").click(function() 
{ 
var searchid = $(this).val();
var dataString = 'searchroomid='+ searchid;
if(searchid!='' || searchid=='')
{
  $.ajax({
  type: "POST",
  url: "../room/selectid.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#resultroom").html(html).show();
  
  }
  });
}return false;    
});


});


$(function(){
$(".editcategory").click(function() 
{ 
var searchcategoryid = $(this).val();
var dataString = 'searchcategoryid='+ searchcategoryid;
if(searchcategoryid!='' || searchcategoryid=='')
{
  $.ajax({
  type: "POST",
  url: "../room/selectcategoryid.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#resultcategory").html(html).show();
  
  }
  });
}return false;    
});

});




$(function(){
$(".editroom").click(function() 
{ 
var searchstartdate = $(this).val();
var dataString = 'searchstartdate='+ searchstartdate;
if(searchstartdate!='' || searchstartdate=='')
{
  $.ajax({
  type: "POST",
  url: "../room/selectstart.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#sd").val(html).show();
  
  
  }
  });
}return false;    
});


});


$(function(){
$(".editroom").click(function() 
{ 
var searchenddate = $(this).val();
var dataString = 'searchenddate='+ searchenddate;
if(searchenddate!='' || searchenddate=='')
{
  $.ajax({
  type: "POST",
  url: "../room/selectenddate.php",
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

function validEditRoom(){
      var roomid=$('#rmid').val();
      var categoryname=$('#ctyname').val();
      var discount=$('#discount').val();
      var rate=$('#rate').val();
      var descript=$('#descript').val();
      var status=$('#status').val();
      var adult=$('#adult').val();
      var child=$('#child').val();
      var start=$('#sd').val();
      var end=$('#ed').val();

      var dataString = 'roomid=' + roomid + '&categoryname=' + categoryname + '&discount=' + discount + '&rate=' + rate + '&descript=' + descript + '&status=' + status  + '&adult=' + adult + '&child=' + child + '&start=' + start + '&end=' + end   ;
        $.ajax({
        type: "POST",
        url: "../room/editroom.php",
        data: dataString,
        
         success: function(result){

               var result=trim(result);

                 if(result=='success'){

                   alert("Successfully Edited Room");
                    window.location='../room/ManageRoom.php';
                }
                else
                 {
                  alert(result);
                 }
        }
        });

  }

    function trim(str){
       var str=str.replace(/^\s+|\s+$/,'');
       return str;
  }

function validAction(){
        var reservationid=$('#reservationid').val();   
        var customerid=$('#cid').val();
         var confirmation=$('#confirmation').val();   
        var status=$('#stat').val();
        var downpayment=$('#downpayment').val();
        var addonpayable=$('#addonpayable');
        var payable=$('#payable').val();
     
        var dataString = 'reservationid=' + reservationid + '&customerid=' + customerid  + '&confirmation='+ confirmation + '&status=' + status + '&downpayment=' + downpayment + '&addonpayable=' + addonpayable + '&payable=' + payable ;
        $.ajax({
        type: "POST",
        url: "../CustomerReservation/Action.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               
                 if(result=='true'){

                   alert("Action successfully changed");
                 $(".addOnForm").fadeOut(700, function() { 
                      var confirmation=$('#confirmation').val();   
                  window.location='../room/ManageRoom.php';
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



  function validAddon(){
         var item=$('#item').val();   
        var price=$('#price').val();
        var quantity=$('#qty').val();
     
        var dataString = 'item='+ item + '&price=' + price + '&quantity=' + quantity;
        $.ajax({
        type: "POST",
        url: "../room/addon.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               
                 if(result=='true'){

                   alert("Addon successfully added");
                 $(".addOnForm").fadeOut(700, function() { 
                  var item=$('#item').val('');
                  var price=$('#price').val('');
                  var quantity=$('#qty').val('');
                  window.location='../room/ManageRoom.php';
                  });

        
                 }else{
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




    function calculateTotal() {
        
        var quantity =document.addem.totquantity.value;
        var price =document.addem.totprice.value;
        totalR = parseFloat(quantity * price );

        if(quantity==0)
        {
          document.getElementById('totalamount').value = 0;

        }
        
        document.getElementById('totalamount').value = totalR;
    }


$(function(){
$(".action").click(function() 
{ 
var searchconfirmation = $(this).val();
var dataString = 'searchconfirmation='+ searchconfirmation;
if(searchconfirmation!='' || searchconfirmation=='')
{
  $.ajax({
  type: "POST",
  url: "../CustomerReservation/selectconfirmation.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#selectconfirmation").html(html).show();
  
  }
  });
}return false;    
});


});




$(function(){
$("#autoaddon").change(function() 
{ 
var item = $(this).val();
var dataString = 'searchprice='+ item;

if(item!='' || item=='Item'  )
{
  $.ajax({
  type: "POST",
  url: "../room/price.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#searchprice").html(html).show();
  }
  });
}return false;    
});
 });

$(function(){
$(".autoaddon").click(function() 
{ 
var confirmation = $(this).val();
var dataString = 'confirmation='+ confirmation;

if(confirmation!='' || confirmation==''  )
{
  $.ajax({
  type: "POST",
  url: "../room/confirmation.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#confirm").html(html).show();
  }
  });
}return false;    
});
 });

  

  function validAddingOn(){
      var confirmation=$('#cnfrm').val();
        var item=$('#autoaddon').val();
        var customerid=$('#customerid').val();
        var quantity=$('#resultitem').val();
        var price=$('#p').val();
        var amount=$('#amount').val();
     
        var dataString ='confirmation=' + confirmation + '&customerid='+ customerid + '&item=' + item + '&quantity=' + quantity + '&price=' + price +  '&amount=' + amount;
        $.ajax({
        type: "POST",
        url: "../CustomerReservation/addingon.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               
                 if(result=='true'){

                   alert("Addon successfully added");
                 $(".addOnautoForm").fadeOut(700, function() { 
                   var confirmation=$('#cnfrm').val();
                   var quantity=$('#resultitem').val();
                    var price=$('#searchprice').val();
                   var amount=$('#amount').val();
                  window.location='../room/ManageRoom.php';
                  });

        
                 }else{
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


$(function(){
$("#selectroomid").change(function() 
{ 
var searchroomid = $(this).val();
var dataString = 'searchroomid='+ searchroomid;
if(searchroomid!='' || searchroomid=='')
{
  $.ajax({
  type: "POST",
  url: "../room/selectroomid.php",
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

$(function(){
$("#selectroomid").change(function() 
{ 
var searchroomimage = $(this).val();
var dataString = 'searchroomimage='+ searchroomimage;
if(searchroomimage!='' || searchroomimage=='')
{
  $.ajax({
  type: "POST",
  url: "../room/selectroomimage.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#roomlabel").html(html).show();
  
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
  url: "../customerwalkin/transferselectdate.php",
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



$(function(){
$("#selectroomid").change(function() 
{ 
var searchroomid = $(this).val();
var dataString = 'searchroomid='+ searchroomid;

if(searchroomid!="" ||searchroomid=="" )
{
  $.ajax({
  type: "POST",
  url: "../room/searchroomimage.php",
  data: dataString,
    cache: false, 
  success: function(html)
  {
    $('#image_preview').html(html).show();
    $('#image_preview').css("display", "block");
    $('#preview').attr('width', '100px');
    $('#preview').attr('height', '100px');
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
  url: "../room/selecttrstart.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#dd").val(html).each();
  
  
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
if(searchenddate!='' || searchenddate=='')
{
  $.ajax({
  type: "POST",
  url: "../room/selectstenddate.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#wd").val(html).each();
  
  
  }
  });
}return false;    
});
});

$(function(){
$(".transfer").click(function() 
{ 
var searchreservationid = $(this).val();
var dataString = 'searchreservationid='+ searchreservationid;
if(searchreservationid!='' || searchreservationid=='')
{
  $.ajax({
  type: "POST",
  url: "../CustomerReservation/selectroomid.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#reservationid").val(html).show();
  }
  });
}return false;    
});


});

  function validTransfer(){
        var reservationid=$('#walkinid').val();
        var roomid=$('#selectroomid').val();
        var categoryname=$('#roomtype').val();
        var rate=$('#rte').val();
        var arrival=$('#sd').val();
        var departure=$('#ed').val();
     
        var dataString ='reservationid=' + reservationid + '&roomid='+ roomid + '&categoryname=' + categoryname + '&rate=' + rate + '&arrival=' + arrival + '&departure=' + departure ;
        $.ajax({
        type: "POST",
        url: "../customerwalkin/Transfer.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               
                 if(result=='true'){

                   alert("Successfully Transfer Room");
                   window.location='../pages/index.php';
                 $(".TransferForm").fadeOut(700, function() { 
                
                    var roomid=$('#rid').val('');
                    var rate=$('#rte').val('');
                    var arrival=$('#dd').val('');
                    var departure=$('wd').val('');
                  
                  });

        
                 }else{
                  alert(result)
                  var roomid=$('#selectroomid').val();
                  var rate=$('#rte').val();
                  var arrival=$('#dd').val();
                  var departure=$('#wd').val();

              }
        }
        });

  }

      function trim(str){
       var str=str.replace(/^\s+|\s+$/,'');
       return str;
  }



$(function(){
$(".searchpromo").change(function() 
{ 
var searchid = $(this).val();
var dataString = 'searchroomid='+ searchid;
if(searchid!='' || searchid=='Show All Promo Room')
{
  $.ajax({
  type: "POST",
  url: "../room/searchpromo.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#resultroompromo").html(html).show();
  }
  });
}return false;    
});


$('#searchiroomid').click(function(){
  jQuery("#resultroompromo").html().show();
});
});



$(function(){
$(".searchroomtype").change(function() 
{ 
var searchid = $(this).val();
var dataString = 'searchroomtype='+ searchid;

if(searchid!="" ||searchid=="" )
{
  $.ajax({
  type: "POST",
  url: "../room/searchroomtype.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#result2").html(html).show();
  }
  });
}return false;    
});
 
    });



$(function(){
$(".searchroomtype").change(function() 
{ 
var searchid = $(this).val();
var dataString = 'searchroomimage='+ searchid;

if(searchid!="" ||searchid=="" )
{
  $.ajax({
  type: "POST",
  url: "../room/searchroomimage.php",
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

 $(document).ready(function() {
                $('#submitbtn').click(function(){
                    $(".uploadform").ajaxForm({

                   success: function(result){
               
                 if(result==='success'){

                   alert("Successfully added Room");
                 $(".modal fade").fadeOut(500, function() { 
                  window.location='../room/ManageRoom.php';
               

                  });

        
                 }else{
                       alert(result)
                        

              }
        }
                       
                 })
                });
            });


            $(document).ready(function() {
                $('#submitbtnupdate').click(function(){
                    $(".updateform").ajaxForm({

                   success: function(result){
               
                 if(result==='success'){

                   alert("Successfully Update Room");
                 $(".editRoomForm").fadeOut(500, function() { 
                  window.location='../room/ManageRoom.php';
               

                  });

        
                 }else{
                       alert(result)
                        

              }
        }
                       
                 })
                });
            });


            $(document).ready(function() {
                $('#submitbtnpromo').click(function(){
                    $(".addPromoform").ajaxForm({

                   success: function(result){
               
                 if(result==='success'){

                   alert("Successfully added Promo for Room");
                 $(".AddPromotionForm").fadeOut(500, function() { 
                  window.location='../room/ManageRoom.php';
               

                  });

        
                 }else{
                       alert(result)
                        

              }
        }
                       
                 })
                });
            });

  
            $(document).ready(function() {
                $('#submitbtnpromo').click(function(){
                    $(".addPromoform").ajaxForm({

                   success: function(result){
               
                 if(result==='success'){

                   alert("Successfully added Promo for Room");
                 $(".AddPromotionForm").fadeOut(500, function() { 
                  window.location='../room/ManageRoom.php';
               

                    });

        
                 }else{
                       alert(result)
                        

              }
        }
                       
                 })
                });
            });

  /*function validDelete(name){
      $("#categoryname").click(function(e){
            var dataString = 'categoryname=' + name;
        $.ajax({
        type: "POST",
        url: "../room/deletecategory.php",
        data: dataString,
        
         success: function(result){

               var result=trim(result);

                 if(result=='success'){

                   alert("Successfully deleted Category");
                    window.location='../room/manageroom.php';
                }
                else
                 {
                  alert(result);
                 }
        }
        });
        function trim(str){
       var str=str.replace(/^\s+|\s+$/,'');
       return str;
      }
      });


  }*/
function commentDelete(id) {
   $("#deletecomment").click(function(e){
    window.location='deletecomments.php?commentid='+ id;
   });
}

function validDelete(name) {
   $("#categoryname").click(function(e){
    window.location='deletecategory.php?categoryname='+ name;
   });
}

function addonsDelete(id) {
   $("#addonname").click(function(e){
    window.location='deleteaddons.php?id='+ id;
   });
}

function addonsUpdated(id) {

   $("#updateaddon").click(function(e){
    var additem = $("#additem").val();
    var addprice = $("#addprice").val();
    var addquantity = $("#addquantity").val();
    window.location='editaddons.php?addID='+ id +"&additem=" +additem+"&addprice="+addprice+"&addquantity="+addquantity;
   });
}

function deleteRoom(id) {
   $("#delroomid").click(function(e){
    window.location='deleteroom.php?roomid='+ id;
   });
}

function editCategory(id) {
   $("#editcategoryname").click(function(e){
    var categoryname = $("#cName").val();
    window.location='editcategory.php?categoryid='+ id + "&categoryname="+categoryname;
   });
}



$(function(){
$("#dd,#wd").change(function() 
{ 
var searchstartdate = $("#dd").val();
var searchenddate = $("#wd").val();
var dataString = 'searchstartdate='+ searchstartdate + '&searchenddate=' + searchenddate;
if(searchstartdate!='' || searchstartdate=='' && searchenddate !='' || searchenddate=='')
{
  $.ajax({
  type: "POST",
  url: "../CustomerReservation/selectdate.php",
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
  //delete Addons
 /* function addonsDelete(id){     
        var dataString = 'id=' + id;
        $.ajax({
        type: "POST",
        url: "../room/deleteaddons.php",
        data: dataString,
        
         success: function(result){

               var result=trim(result);

                 if(result=='success'){

                   alert("Addon has been successfully deleted");
                    window.location='../room/manageroom.php';
                }
                else
                 {
                  alert(result);
                 }
        }
        });

  }

  function trim(str){
       var str=str.replace(/^\s+|\s+$/,'');
       return str;
  }*/
  //end of Addons

  function validDeleteRoom(){
      var roomid=$('#roomid').val();
     
        var dataString = 'roomid=' + roomid;
        $.ajax({
        type: "POST",
        url: "../room/deleteroom.php",
        data: dataString,
        
         success: function(result){

               var result=trim(result);

                 if(result=='success'){

                   alert("Successfully deleted Room");
                    window.location='../room/ManageRoom.php';
                }
                else
                 {
                  alert(result);
                 }
        }
        });

  }

  function trim(str){
       var str=str.replace(/^\s+|\s+$/,'');
       return str;
  }

$(function(){
$(".editroom").click(function() 
{ 
var searchid = $(this).val();
var dataString = 'searchroomid='+ searchid;
if(searchid!='' || searchid=='')
{
  $.ajax({
  type: "POST",
  url: "../room/selectid.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#resultroom").html(html).show();
  
  }
  });
}return false;    
});


});


/*$(function(){
$("#editcategory").click(function() 
{ 
var searchcategoryid = $(this).val();
var dataString = 'searchcategoryid='+ searchcategoryid;
if(searchcategoryid!='' || searchcategoryid=='')
{
  $.ajax({
  type: "POST",
  url: "../../room/selectcategoryid.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#edit").html(html).show();
  
  }
  });
}return false;    
});

});*/




$(function(){
$(".editroom").click(function() 
{ 
var searchstartdate = $(this).val();
var dataString = 'searchstartdate='+ searchstartdate;
if(searchstartdate!='' || searchstartdate=='')
{
  $.ajax({
  type: "POST",
  url: "../room/selectstart.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#sd").val(html).show();
  
  
  }
  });
}return false;    
});


});


$(function(){
$(".editroom").click(function() 
{ 
var searchenddate = $(this).val();
var dataString = 'searchenddate='+ searchenddate;
if(searchenddate!='' || searchenddate=='')
{
  $.ajax({
  type: "POST",
  url: "../room/selectenddate.php",
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

function validEditRoom(){
      var hiddenid=$('#hiddenid').val();
      var roomid=$('#rmid').val();
      var categoryname=$('#ctyname').val();
      var discount=$('#discount').val();
      var rate=$('#rate').val();
      var descript=$('#descript').val();
      var status=$('#status').val();
      var adult=$('#adult').val();
      var child=$('#child').val();
      var start=$('#sd').val();
      var end=$('#ed').val();

      var dataString = '&hiddenid=' + hiddenid + '&roomid=' + roomid + '&categoryname=' + categoryname + '&discount=' + discount + '&rate=' + rate + '&descript=' + descript + '&status=' + status  + '&adult=' + adult + '&child=' + child + '&start=' + start + '&end=' + end   ;
        $.ajax({
        type: "POST",
        url: "../room/editroom.php",
        data: dataString,
        
         success: function(result){

               var result=trim(result);

                 if(result=='success'){

                   alert("Successfully Edited Room");
                    window.location='../room/ManageRoom.php';
                }
                else
                 {
                  alert(result);
                 }
        }
        });

  }

    function trim(str){
       var str=str.replace(/^\s+|\s+$/,'');
       return str;
  }

  function validAddon(){
         var item=$('#item').val();   
        var price=$('#price').val();
        var quantity=$('#qty').val();
     
        var dataString = 'item='+ item + '&price=' + price + '&quantity=' + quantity;
        $.ajax({
        type: "POST",
        url: "../room/addon.php",
        data: dataString,
        
        success: function(result){
                 var result=trim(result);
               
                 if(result=='true'){

                   alert("Addon successfully added");
                   window.location='../room/ManageRoom.php';
                 $(".addAO").fadeOut(700, function() { 
                  var item=$('#item').val('');
                  var price=$('#price').val('');
                  var quantity=$('#qty').val('');
                  window.location='../room/ManageRoom.php';
                  });

        
                 }else{
                       alert(result)
                  var item=$('#item').val('');
                  var price=$('#price').val('');
                  var quantity=$('#qty').val('');

              }
        }
        });

  }

