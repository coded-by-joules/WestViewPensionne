<?php

class Promotion{
 private $roomid,$promorate,$discount;
 private $categoryname, $descript,$datestart,$dateend,$status;

 public function RoomID(){
  return $this->roomid=$roomid;
 }
   public function CategoryName(){
  return $this->categoryname=$categoryname;
 }
  public function PromoRate(){
  return $this->promorate=$promorate;
 }
   public function Discount(){
  return $this->discount=$discount;
 }
   public function Descript(){
  return $this->descript=$descript;
 }
  
  public function DateStart(){
  return $this->datestart=$datestart;
 }
   public function Status(){
  return $this->status=$status;
 }
  public function DateEnd(){
  return $this->dateend=$dateend;
 }

 public function AddPromo()
   {

  $success=true;
 $query="INSERT INTO  tblpromotion (Room_ID,CategoryName,Promo_Rate,Discount,Description,Status,Date_Start,Date_End) values (:Roomid,:Categoryname,:Promorate,:Discount,:Descript,:Status,:Datestart,:Dateend)";

 try
{
   include("../pdoconnection.php"); 
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':Roomid',$this->RoomID);
  $stmt->bindParam(':Categoryname',$this->CategoryName);
  $stmt->bindParam(':Promorate',$this->PromoRate);
  $stmt->bindParam(':Discount',$this->Discount);
  $stmt->bindParam(':Descript',$this->Descript);
  $stmt->bindParam(':Status',$this->Status);
  $stmt->bindParam(':Datestart',$this->DateStart);
  $stmt->bindParam(':Dateend',$this->DateEnd);
  $stmt->execute();
  $success=true;
  }
catch (PDOException $e)
{ 
  $success=false;
  echo "Error: " . $e->getMessage();
}
return $success;
$conn=null;
}

 public function UpdatePromo()
   {

 $query="update tblpromotion set Promo_Name=:Promoname,Promo_Rate=:Promorate,Discount=:Discount,Description=:Descript,Status=:Status where Room_ID=:Roomid ";
 
 try
{
   include("../pdoconnection.php"); 
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':Roomid',$this->RoomID);
  $stmt->bindParam(':Promoname',$this->PromoName);
  $stmt->bindParam(':Promorate',$this->PromoRate);
  $stmt->bindParam(':Discount',$this->Discount);
  $stmt->bindParam(':Descript',$this->Descript);
  $stmt->bindParam(':Status',$this->Status);
;
 
  $stmt->execute();
  $success=true;
  }
catch (PDOException $e)
{ 
  $success=false;
  echo "Error: " . $e->getMessage();
}
return $success;
$conn=null;
}
 public function UpdateStartdate()
   {

 $query="update tblpromotion set Date_Start=:Datestart where Room_ID=:Roomid ";
 
 try
{
   include("../pdoconnection.php"); 
  $stmt = $conn->prepare($query);
  $stmt->bindParam('Datestart',$this->DateStart);
 
 
  $stmt->execute();
  $success=true;
  }
catch (PDOException $e)
{ 
  $success=false;
  echo "Error: " . $e->getMessage();
}
return $success;
$conn=null;
}
 public function UpdateEnddate()
   {

 $query="update tblpromotion set Date_End=:Dateend where Room_ID=:Roomid ";
 
 try
{
   include("../pdoconnection.php"); 
  $stmt = $conn->prepare($query);
  $stmt->bindParam('Dateend',$this->DateEnd);
 
 
  $stmt->execute();
  $success=true;
  }
catch (PDOException $e)
{ 
  $success=false;
  echo "Error: " . $e->getMessage();
}
return $success;
$conn=null;
}
 public function Deletepromo()
   {

    $success=true;
 $query="delete from tblpromotion where Room_ID='$this->RoomID'";

 try
{
   include("../pdoconnection.php"); 
  $conn->exec($query);
 
  }
catch (PDOException $e)
{ 
  $success=false;
  echo "Error: " . $e->getMessage();
}
return $success;
$conn=null;
}
/*public static function Date($arrival,$departure)
{
  $code=1;
  $sql="select * from tblreservation 
  where Arrival between '$arrival' and '$departure' || Arrival <='$arrival' 
  and Departure >='$departure' || Arrival <='$arrival' and Departure >='$departure' ";*/
 /* $sql = "SELECT * FROM tblreservation WHERE (Arrival BETWEEN '$arrival' and '$departure') 
  or (Departure BETWEEN '$arrival' and '$departure')  ";

$sql="SELECT * from tblpromotion where Date_Start='$arrival' and Date_End='$departure'";

    include('../connection.php');
    $query=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($query);
    if($row)
    {
      $code=1;
    }
    else
    {
      $code=0;
    }
    return $code;
  }*/
  public static function UpdateStatus($roomid)
{
  

  $sql="select * from tblpromotion where Room_ID='$roomid'";
  include ('../connection.php');
  $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
  $row=mysqli_fetch_array($query);
  $Status=$row['Status'];
  $Status="Not Available";
  $updte="update tblpromotion set  Status='$Status' where Room_ID='$roomid'";
  $result=mysqli_query($conn,$updte) or die(mysqli_error($conn)); 
  mysqli_close($conn);
  
} 
}



?>

