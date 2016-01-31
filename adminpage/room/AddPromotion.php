  <?php
 session_start();
 include("../pdoconnection.php");
  include("../connection.php");    
include("../Class/Promotion.php");
include("../Class/Room.php"); 

if (isset($_POST['addpromo']))
{

$promoroom =new Promotion();  
$Roomid=$_POST['roomid'];
$Promoname=$_POST['promoname'];
$Promorate=$_POST['promorate'];
$Discount=$_POST['discount'];
$Descript=$_POST['descript'];
$Status=$_POST['status'];
$Start=$_POST['start'];
$End=$_POST['end'];
//$Numberofdays=$_POST['numberofdays'];


$promoroom->RoomID=$Roomid;
$promoroom->CategoryName=$Promoname;
$promoroom->PromoRate=$Promorate;
$promoroom->Discount=$Discount;
$promoroom->Descript=$Descript;
$promoroom->Status=$Status;
$promoroom->DateStart=$Start;
$promoroom->DateEnd=$End;


  if ($promoroom->AddPromo()){
     //Room::UpdateStatus($Roomid);  
  echo "success";	
     //$_SESSION["numberofdays"] = array("numberofdays" => $Numberofdays
   

  }

}
?>
