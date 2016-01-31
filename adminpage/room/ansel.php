$(button#submit).click(funxtion()){
$.post($("#myForm").attr("action") ,
$("myForm:input").seralizeArray(),
function(msg)
{
	alert("ok");
});
$("#myForm").submit(function()
{return false;
});

});