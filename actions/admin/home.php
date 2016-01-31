<!-- http://demos.jquerymobile.com/1.4.5/popup/#&ui-state=dialog -->
<!DOCTYPE html>
<?php 
session_start();
include('../connection.php');
include("session.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>WestView Pensione House</title>
        <link rel="icon" href="../images/logo.png" type="image/png" sizes="32x32">
        <link rel="stylesheet" type="text/css" href="../css/westview.css">
        <script type="text/javascript" src="../source/jquery-1.9.1.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>
        <script type='text/javascript' src="../source/jquery-slider.js"></script>
        <script type='text/javascript' src="../source/main.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div class="nav-bar-head">
                    <div class="head-logo">
                        <div class="logo">
                            <a href="../index.php">
                                <img id="header-logo" src="../images/logo.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="nav-bar" id="main-menu">
                    <ul>
                        <li><a href="../index.php">home</a></li>
                        <li><a href="#">room</a></li>
                        <li><a href="#">gallery</a></li>
                        <li><a href="#">contact</a></li>
                    </ul>
                </div>
                <div class="nav-accnt">
                    <form method="post" action="logout.php">
                    <p style="font-size: 13.5px;color:#DDD;">[ <input class="logout" name="logout" type="submit" value="Logout" /> ]</p>
                    </form>
                </div>
            </div>
            <div class="main-content-reg">
                <div class="content2 effect2">
                    <div class="reg-content">
                        <h2><?php echo 'Welcome Admin '.ucwords($row['name']).' ';?></h2>
                        <?php
                        $selsql = "SELECT * FROM tblusers";
                        $dresult = $conn->query($selsql);
                        ?>
                        <table align="center">
                            <tr>
                                <th>Name</th>
                                <th>Lastname</th>
                                <th>Username</th>
                                <th>Phonenumber</th>
                                <th>Email Address</th>
                                <th>Gender</th>
                                <th>City</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Verification</th>
                                <th>Manage</th>
                            </tr>
                            <?php 
                            if ($dresult->num_rows>0) {
                                while ($r = $dresult->fetch_assoc()) {
                                    if ($r['type']!='Administrator') {
                                        echo "<tr>";
                                        echo "<td>".$r['name']."</td>";
                                        echo "<td>".$r['lastname']."</td>";
                                        echo "<td>".$r['username']."</td>";
                                        echo "<td>".$r['phonenumber']."</td>";
                                        echo "<td>".$r['emailaddress']."</td>";
                                        echo "<td>".$r['gender']."</td>";
                                        echo "<td>".$r['city']."</td>";
                                        echo "<td>".$r['type']."</td>";
                                        echo "<td>".$r['active']."</td>";
                                        if($r['verification']==1){
                                            echo "<td>Verified</td>";
                                        } else {
                                            echo "<td>Not Verified</td>";
                                        }
                                        if ($r['active']=="Activate") {
                                            echo "<td><a style='color:red' href='edit-action.php?id=".$r['id']."'>Deactivate Account</a></td>";
                                        } else {
                                            echo "<td><a style='color:red' href='edit-action.php?id=".$r['id']."'>Activate Account</a></td>";
                                        }
                                        echo "</tr>";
                                    }
                                }
                            }
                            $conn->close();
                            ?>
                        </table>
                        <h3><a href="adminregistration.php" style="color:#007CFF">Add New Account</a></h3>
                    </div>
                </div>
            </div>
        </div>
        <div style="display: none;" class="overlay"></div>
    </body>
</html>
