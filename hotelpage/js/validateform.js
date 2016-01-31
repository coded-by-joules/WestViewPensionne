
//<!--Script datepicker-->

function validateForm()
{
	 var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    var today = dd+'/'+mm+'/'+yyyy;

var x=document.forms["index"]["start"].value;
if (x===null || x==="")
  {
  alert("Please select an Arrival Date. (Click the calendar icon)");
  return false;
  }
  if (x==today )
  {
   alert("Arrival Should did not Same the Now Date.(Please select right date)");
   return false;
      window.location("index.php");
  }
var y=document.forms["index"]["end"].value;
if (y===null || y==="")
  {
  alert("Please select an Departure Date. (Click the calendar icon)");
  return false;
  }

    if (x==y )
  {
   alert("Invalid your selection Date.(Please select right date)");
   return false;
      window.location("index.php");
  }
}