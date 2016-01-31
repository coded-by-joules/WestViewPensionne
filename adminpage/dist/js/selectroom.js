function validReserve(){
        var categoryname=$('#categoryname').val();
        var  roomid=$('#roomid').val();
        //console.log($("#arrival").val());
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

$(function(){
$("#reserve").click(function() 
{ 
var searchroomid= $(this).val();
var dataString = 'searchroomid='+ searchroomid;
if(searchroomid!='')
{
  $.ajax({
  type: "POST",
  url: "../../room/searchroomid.php",
  data: dataString,
  cache: false, 
  success: function(html)
  {
    $("#searchroomid").html(html).show();


  }
  });
}return false;    
});


});
//Promo Ajax
