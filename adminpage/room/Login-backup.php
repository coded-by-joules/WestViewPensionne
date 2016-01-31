<?php

include('../Class/MemberAccount.php');
include('../Class/CustomerAccount.php');

$FirstName=$_POST['firstname'];

$Username=$_POST['username'];
$Password=$_POST['password'];
$Email=$_POST['email'];





 if ($Username==''){
    echo 'User is required';
}
else if ($Password==''){
    echo 'Password is required';
}
 else if (strlen($Password) < 8 or strlen($Password) > 16)
  {
    echo'Password must be 8 to 16 characters';
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
