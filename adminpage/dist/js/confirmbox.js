function UpdateCheckin(){

var checkin=confirm("Are you sure you this record want to Check In?");
if (checkin==true){
   alert ("successfully updated Action");
}
return checkin;
}

function UpdateCheckout(){

var checkout=confirm("Are you sure this record want to Check Out?");
if (checkout==true){
   alert ("successfully updated Action");
}
return checkout;
}
function CancelReservation(){

var checkout=confirm("Are you sure want to Cancel your Reservaion?");
if (checkout==true){
   alert ("successfully Cancel your reservation");
}
return checkout;
}