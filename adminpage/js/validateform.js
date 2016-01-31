
//<!--Script datepicker-->

function validateForm()
{
var x=document.forms["index"]["start"].value;
if (x===null || x==="")
  {
  alert("Please select an Arrival Date. (Click the calendar icon)");
  return false;
  }
var y=document.forms["index"]["end"].value;
if (y===null || y==="")
  {
  alert("Please select an Departure Date. (Click the calendar icon)");
  return false;
  }
}