function addmsg(type, msg){
 
if (msg==0)
{
$('notification_count').removeAttr('id');
}
else
{
$('#notification_count').html(msg);	
}

 
}
 
function waitForMsg(){
 
$.ajax({
type: "GET",
url: "select.php",
 
async: true,
cache: false,
timeout:50000,
 
success: function(data){
addmsg("new", data);
setTimeout(
waitForMsg,
1000
);
},
error: function(XMLHttpRequest, textStatus, errorThrown){
addmsg("error", textStatus + " (" + errorThrown + ")");
setTimeout(
waitForMsg,
15000);
}
});
};
 
$(document).ready(function(){
 
waitForMsg();
 
});
 

 function loadreservation(type, reserve){
 

$('#Loadreservation_count').html(reserve);	


}
 
function waitForReserve(){
 
$.ajax({
type: "GET",
url: "loadreservation.php",
 
async: true,
cache: false,
timeout:50000,
 
success: function(data){
loadreservation("new", data);
setTimeout(
waitForReserve,
1000
);
},
error: function(XMLHttpRequest, textStatus, errorThrown){
loadreservation("error", textStatus + " (" + errorThrown + ")");
setTimeout(
waitForReserve,
15000);
}
});
};
 
$(document).ready(function(){
 
waitForReserve();
 
});

$(function(){
$(".searchreservationdetail").keyup(function() 
{ 
var searchreservationdetail = $(this).val();
var dataString = 'searchreservationdetail='+ searchreservationdetail;
if(searchreservationdetail!='' || searchreservationdetail=='')
{
    $.ajax({
    type: "POST",
    url: "../pages/searchreservationdetail.php",
    data: dataString,
    cache: false,
    success: function(html)
    {
    $("#resultreservationdetail").html(html).show();
    }
    });
}return false;    
});

$('#clickroomdetail').click(function(){
    jQuery("#resultreservationdetail").fadeIn();
});
});

 function usernotifier(type, user){
	if (user==0)
	{
	$('user_count').removeAttr('id');
	}
	else
	{
	$('#user_count').html(user);	
	}
	
	}
	 
	function waitForUser(){
	 
	$.ajax({
	type: "GET",
	url: "usernotification.php",
	 
	async: true,
	cache: false,
	timeout:50000,
	 
	success: function(data){
	usernotifier("new", data);
	setTimeout(
	waitForUser,
	2500
	);
	},
	error: function(XMLHttpRequest, textStatus, errorThrown){
	usernotifier("error", textStatus + " (" + errorThrown + ")");
	setTimeout(
	waitForUser,
	15000);
	}
	});
	};
	 
	$(document).ready(function(){
	 
	waitForUser();
	 
	});
