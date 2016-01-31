                   <?php
                   session_start();
                   include("../../connection.php");
                   include("../../actions/session.php");
                 
                
                      $user_check=$_SESSION['Customerid'];
                      $sql = "SELECT * FROM tblusers WHERE Customer_ID = '$user_check'";
                      $result = $conn->query($sql);
                      $row = $result->fetch_assoc();
                      $user=$row['Username'];

                   $sql="select Count(*) from tblnotifications Where Unread=2 and ToUser='".$user."'";
                   $result=mysqli_query($conn,$sql);
                   $row=mysqli_fetch_assoc($result);
                   $c=$row["Count(*)"];
                   if ($c>0)
                   {
                  echo "<script>alert('You have received ".$c." notification(s). To view them, click Notifications on your account is user icon.');</script>";
                  echo "<script>window.location='updateusernotification.php?user=".$user."'";
                   }
                   else
                   {
            
                   $sql="select Count(*) from tblnotifications Where Unread=1 and ToUser='".$user."'";
                   $result=mysqli_query($conn,$sql);
                   $row=mysqli_fetch_assoc($result);
                   $c=$row["Count(*)"];
                   echo $c;
                 }


                    ?>