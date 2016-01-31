<?php
class MemberAccount{
 private $firstname,$lastname,$address,$username,$password,$contact,$email;

 public function Firstname()
 {
  return $this->firstname=$firstname;
 }
 public function Lastname()
 {
 	return $this->lastname=$lastname;
 }
  public function Address()
 {
 	return $this->address=$address;
 }

public function Password()
 {
 	return $this->password=$password;
 }
 public function Contact()
 {
  return $this->contact=$contact;
 }

 public function Email()
 {
 	return $this->email=$email;
 }



 public function __construct($firstname,$lastname,$address,$username, $password,$contact,$email){

  $this->Firstname=$firstname;
  $this->Lastname=$lastname;
  $this->Address=$address;
  $this->Username=$username;
  $this->Password=$password;
  $this->Contact=$contact;
  $this->Email=$email;
   }

   public function AddMember()
  {
    $success=false;$sql="insert into tblmembers (FirstName,LastName,Address,Username,Password,Contact,Email) values ('$this->Firstname','$this->Lastname','$this->Address','$this->Username','$this->Password','$this->Contact','$this->Email')";
    
try
{
  include('../connection.php');
  $query=mysqli_query($conn,$sql);
  $success=true;
}
catch (mysqliException $ex)
{
  $success=false;
  $ex-getMesssage();
}
  mysqli_close($conn);
return $success;
}
}
/*public static function GetID($username,$password)
{
  $id="";
  $sql="select Customer_ID from tblcustomers where Username='$username' and Password='$password'";

  include ('../connection.php');
  $query=mysqli_query($conn,$sql);
   if ($row=mysqli_fetch_array($query))
   {
    $id=$row['Customer_ID'];
  }
  else
  {
    $id=null;
    mysqli_close($conn);
  }
  return $id;
} */

 /*public static  function GetID($)
   {
     include("connection.php"); 
    $success=true;
    $query=mysqli_query($conn, "select * from tblusers where Username='$this->Username' and Password='$this->Password'");

    if(mysqli_num_rows($query)==1){
      $success=true;
      }
     else{
  $success=false;
}
 
  mysqli_close($conn);
  return $success;
}*/

