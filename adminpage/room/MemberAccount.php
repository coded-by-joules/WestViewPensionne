<?php

include('../Class/MemberAccount.php');


$FirstName=$_POST['firstname'];
$LastName=$_POST['lastname'];
$Address=$_POST['address'];
$Username=$_POST['username'];
$Password=$_POST['password'];
$Contact=$_POST['contact'];
$Email=$_POST['email'];


if ($FirstName==''){
  echo 'First Name is required';
}
else if ($LastName==''){
  echo 'Last Name is required';
}

else if ($Address==''){
    echo 'Address is required';
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

else if ($Contact==''){
    echo 'Contact number is required';
}
   
  else if ($Email ==''){
    echo 'Email Address is required';
}
   
      else
      {
   $acc= new MemberAccount($FirstName,$LastName,$Address,$Username,$Password, $Contact,$Email);
if ($acc->AddMember())
{
    echo 'success';
}

}
    

?>
