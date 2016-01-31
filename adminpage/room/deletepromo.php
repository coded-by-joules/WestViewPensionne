
<?php 
include('../pdoconnection.php');
include('../Class/Room.php');
include('../Class/Promotion.php');
if (isset($_GET['promoid']))
{
  	$roomid=$_GET['promoid'];

	$sql="SELECT * FROM tblpromotion WHERE Room_ID='promoid'";
	$result = $conn->query($sql);
	$row =$result->fetch(PDO::FETCH_ASSOC);

        
        $promoroom =new Promotion();  
        $promoroom->RoomID=$roomid;
        $promoroom->CategoryName=$row['CategoryName'];
        $promoroom->PromoRate=$row['Promo_Rate'];
        $promoroom->Descript=$row['Description'];
        $promoroom->Status=$row['Status'];
        $promoroom->DateStart=$row['Date_Start'];
        $promoroom->DateEnd=$row['Date_End'];

        	if ($promoroom->Deletepromo())
        	{
			header('location:ManageRoom.php');	
        

}
}
?>