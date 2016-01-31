<?php
class Account{
 private $username,$password;

  public function Username(){
  return $this->username="ansel";
 }
  public function Password(){
  return $this->password="lim";
 }
   public  function LoginAccount()
   {
     include("../connection.php"); 
    $success=true;
    $query=mysqli_query($conn, "select * from tbladmin where Username='$this->Username' and Password='$this->Password'");

    if(mysqli_num_rows($query)==1){
      $success=true;
      }
     else{
  $success=false;
}
 
  mysqli_close($conn);
  return $success;
}
}
 ?>
