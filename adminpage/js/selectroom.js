
function validReserve(){
        var categoryname=$('#categoryname').val();
        var  roomid=$('#roomid').val();
        var arrival=$('#arrival').val();
        var departure=$('#departure').val();
        var numberofdays=$('#numberofdays').val();
        var total=$('#total').val();
        var adult=$('#nadult').val();
        var child=$('#nchild').val();


        var dataString = 'categoryname='+ categoryname + '&roomid=' + roomid + '&start=' + arrival + '&end='+ departure + '&numberofdays=' + numberofdays + '&total=' + total
                          + '&nadult=' + adult + '&nchild=' + child ;
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

$(function(){
$(".Reserve").click(function() 
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
$(".Reserve").click(function() 
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
$(".Reserve").click(function() 
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
$(".Reserve").click(function() 
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
$(".Reserve").click(function() 
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
//search in room availability
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
  url: "../room/searchroomdetail.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#selectroomdetail").html(html).show();
  
  } 
  });
}return false;    

});
});
//search in room availability
$(function(){
$("#sd,#ed").change(function() 
{ 
var searchstartdate = $("#sd").val();
var searchenddate = $("#ed").val();
var dataString = 'availablesearchstartdate='+ searchstartdate + '&availablesearchenddate=' + searchenddate;
if(searchstartdate!='' || searchstartdate=='' && searchenddate !='' || searchenddate=='')
{
  $.ajax({
  type: "POST",
  url: "../room/searchroomdetailavailable.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#viewroomavailable").html(html).show();
  
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
var dataString = 'fromdate='+ searchstartdate + '&todate=' + searchenddate;
if(searchstartdate!='' || searchstartdate=='' && searchenddate !='' || searchenddate=='')
{
  $.ajax({
  type: "POST",
  url: "../pages/searchreservationdetatail.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
  $("#viewresultreservationdetail").html(html).show();
  
  } 
  });
}return false;    

});
});

$(function(){
$("#status").change(function() 
{ 
var searchstatus= $(this).val();
var dataString = 'searchstatus='+ searchstatus;
if(searchstatus!='' || searchstatus=='')
{
  $.ajax({
  type: "POST",
  url: "../pages/searchstatusdetail.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {$(".viewstatusdetail").html(html).show();


  }
  });
}return false;    
});
});

  $(function(){
  $(".searchroomavailable").keyup(function() 
  { 
  var searchroomavailable = $(this).val();
  
  var dataString = 'searchroomavailable='+ searchroomavailable;
  if(searchroomavailable!='')
  {
      $.ajax({
      type: "POST",
      url: "../room/selectroomavailable.php",
      data: dataString,
      cache: false,
      success: function(html)
      {
      $("#resultroomavailable").html(html).show();
      }
      });
  }return false;    
  });

  $('#searchroomavailable').click(function(){
      jQuery("#resultroomavailable").fadeIn();
  });
  });

//Promo Ajax


//manageroom
$(function(){
$(".edroomcat").click(function() 
{ 
var editroomid= $(this).val();
var dataString = 'searchroomid='+ editroomid;
if(editroomid!='')
{
  $.ajax({
  type: "POST",
  url: "../room/searchroomcategory.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {$("#detailroom").html(html).show();


  }
  });
}return false;    
});
});

//edit addons
$(function(){
$(".editaddons").click(function() 
{ 
var editaddid= $(this).val();
var dataString = 'searchid='+ editaddid;
if(editaddid!='')
{
  $.ajax({
  type: "POST",
  url: "../room/searchroomaddons.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {$("#detailAdds").html(html).show();


  }
  });
}return false;    
});
});