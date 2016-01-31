

<?php
session_start();
include('../Class/CustomerAccount.php');
include("../connection.php");

$Username=mysqli_real_escape_string($conn,$_POST['user']);
$Password=mysqli_real_escape_string($conn,$_POST['pass']);



   $Customerid= CustomerAccount::GetID($Username,$Password);
     if($Customerid==null)
     {
      echo "Invalid your Account";
     }
    else
      {
        echo "success";
         $_SESSION['Customerid'] =$Customerid;  
   
    }
  

?>