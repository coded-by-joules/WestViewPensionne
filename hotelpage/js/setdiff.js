// Error checking kept to a minimum for brevity
 
  function setDifference(frm) {
  var dtElem1 = frm.elements['start'];
  var dtElem2 = frm.elements['end'];
  var resultElem = frm.elements['numberofdays'];
   
// Return if no such element exists
  if(!dtElem1 || !dtElem2 || !resultElem) {
return;
  }
   
  //assuming that the delimiter for dt time picker is a '/'.
  var x = dtElem1.value;
  var y = dtElem2.value;
  var arr1 = x.split('/');
  var arr2 = y.split('/');
   
// If any problem with input exists, return with an error msg
if(!arr1 || !arr2 || arr1.length !== 3 || arr2.length !== 3) {
resultElem.value = "Invalid Input";
return;
  }
   
var dt1 = new Date();
dt1.setFullYear(arr1[2], arr1[1], arr1[0]);
var dt2 = new Date();
dt2.setFullYear(arr2[2], arr2[1], arr2[0]);

resultElem.value = (dt2.getTime() - dt1.getTime()) / (60 * 60 * 24 * 1000);
}