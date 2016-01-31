<?php

include('../Class/CustomerAccount.php');
include('../Class/Reservation.php');


$FirstName=$_POST['firstname'];
$LastName=$_POST['lastname'];
$City=$_POST['city'];
$Address=$_POST['address'];
$Province=$_POST['province']; 
$Country=$_POST['country'];
$Username=$_POST['username'];
$Password=$_POST['password'];
$Cpassword=$_POST['cpassword'];
$Contact=$_POST['contact'];
$Email=$_POST['email'];


if ($FirstName==''){
  echo 'First Name is required';
}
else if ($LastName==''){
  echo 'Last Name is required';
}
else if ($City==''){
    echo 'City is required';
}
else if ($Address==''){
    echo 'Address is required';
}
else if ($Province==''){
    echo 'Province is required';
}
else if ($Country==''){
    echo 'Country is required';
}
else if ($Username==''){
    echo 'User is required';
}
else if ($Password==''){
    echo 'Password is required';
}
 else if (strlen($Password) < 8 or strlen($Password) > 16)
  {
    echo'Password must be 8 to 16 characters';
  }

  else if ($Cpassword==''){
    echo 'ConfirmPassword is required';
}

   else if($Password  != $Cpassword){
      echo 'Password does not match';
      } 
        else if ($Contact==''){
    echo 'Contact number is required';
}
   
  else if ($Email ==''){
    echo 'Email Address is required';
}
   
      else
      {
   $acc= new CustomerAccount($FirstName,$LastName,$City,$Address,$Province,$Country,$Username,$Password, $Contact,$Email);
if ($acc->AddUser())
{
    echo 'success';
}

}
    

?>
