<?php
session_start();
include('connection.php');
include('actions/login-action.php');
//session check
if (isset($_SESSION['Customerid'])) {
    $user_check=$_SESSION['Customerid'];
    $sql = "SELECT * FROM tblcustomers WHERE Customer_ID = '$user_check'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $login_session = $row['Customer_ID'];
} //end
?>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=2">
    <meta name="description" content="">
    <meta name="author" content="">

   <title>Westview Pensione House - Cebu | Room - Petit </title>

    <link href="hotelpage/css/bootstrap.min.css" rel="stylesheet">
    <!--Icon-->
     <link href="hotelpage/images/westview.png" type="image/png" rel="icon">
    <!-- Custom CSS -->
    <link href="hotelpage/css/modern-business.css" rel="stylesheet">
    <link href="hotelpage/css/westview.css" rel="stylesheet">
    <link href="hotelpage/css/bootstrap-social/bootstrap-social.css" rel="stylesheet">
    <link href="adminpage/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
 

    <!-- Custom Fonts -->
    <link href="hotelpage/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="hotelpage/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="hotelpage/js/main.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>  
    <script type="text/javascript" src="hotelpage/js/main.js"></script> 


</head>

<body>
    <?php
        if (isset($_SESSION['Customerid'])) {
            if ($row['Verification']==0) {
                ?>
                <style type="text/css">
                .navbar-fixed-top {
                    top: 30px;
                }

                .popup-verify {
                    z-index: 6;
                    background: rgb(254, 255, 228);
                    border: solid 1px #EFFF00;
                    position: fixed;
                    width: 100%;
                    padding: 2px 10px;
                    margin: auto;
                    top: 0px;
                    left: 0px;
                    /* display: none; */
                }
                </style>

                <div class="popup-verify navbar-fixed-top">
        <div class="container">
                <table>
                    <tbody><tr>
                    <td><form method="POST" action="actions/resend.php"></td>
                        <th>Please verify your Account</th>
                        <td style="padding:0px 25px"></td><td>Enter Your Email Address: </td>
                        <td><input class="verify" name="verify" type="email"></td>
                        <td style="padding:0px 10px"><input class="verify" name="btnverify" type="submit" value="Resend"></td>
                        <td><input class="cancel-verify" name="cancel" type="button" value="Cancel"></td>
                    <td></form></td>
                    </tr>
                </tbody></table>
            </div>
            </div>
               
              
                <?php
            }
        }
    ?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <div class="nav-bar-head">
                <div class="head-logo">
                <div class=" logo">
                            <a href="index.php">
                                <img id="header-logo" src="hotelpage/images/westview.png">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_SESSION['Customerid'])) {
            ?>
            <div class="nav-accnt" style="position: absolute;float: right;right:0px">
                    <form method="post" action="actions/logout.php">
                    <p style="margin:0px 5px;font-size: 13.5px;color:#FFF;"><i class="fa fa-fw fa-user "></i>Welcome <?php echo ucfirst($row["FirstName"]);?> [ <input style="background-color: transparent;border: transparent;" class="logout" name="logout" type="submit" value="Logout" /> ]</p>
                </form>
            </div>
            <?php
            }
            ?>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li >
                        <a href="index.php">Home</a>
                    </li>
                    <li >
                        <a href="room.php">Rooms</a>
                    </li>
                    <li>
                        <a href="promotions.php">Promotions</a>
                    </li>
                    <li>
                        <a href="location.php">Location</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact Us</a>
                    </li>
                    <?php 
                    if (isset($login_session)) { 
                        if ($row['Type']=='Administrator') { ?>
                            <li class="dropdown">
                                <a href="adminpage/pages/index.php" class="portfolio-link" >Admin</a>
                            </li>
                        <?php
                        }
                    } else {
                    ?>
                  <li class="dropdown">
                        <a href="#signIN" class="portfolio-link" data-toggle="modal">Sign in </a>
                    </li>
                    <?php } 
                    $conn->close();
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
     
    <!-- Page Content -->
    <div class="container" style="margin-top:65px;">

        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                <h3>
                Hello - Raymund
                </h3>
                <p>
                   This section defines your profile details , feel free to update your account ! 
                </p>
                </div>
                <ol class="breadcrumb">
                    <li><a href="index.php">Go back Home</a>/ <a href="userindex.php">Update Profile</a>
                    </li>
                    
                </ol>
            </div>
        </div>
       <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Rendering engine</th>
                                            <th>Browser</th>
                                            <th>Platform(s)</th>
                                            <th>Engine version</th>
                                            <th>CSS grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>Trident</td>
                                            <td>Internet Explorer 4.0</td>
                                            <td>Win 95+</td>
                                            <td class="center">4</td>
                                            <td class="center">X</td>
                                        </tr>
                                        <tr class="even gradeC">
                                            <td>Trident</td>
                                            <td>Internet Explorer 5.0</td>
                                            <td>Win 95+</td>
                                            <td class="center">5</td>
                                            <td class="center">C</td>
                                        </tr>
                                        <tr class="odd gradeA">
                                            <td>Trident</td>
                                            <td>Internet Explorer 5.5</td>
                                            <td>Win 95+</td>
                                            <td class="center">5.5</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="even gradeA">
                                            <td>Trident</td>
                                            <td>Internet Explorer 6</td>
                                            <td>Win 98+</td>
                                            <td class="center">6</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="odd gradeA">
                                            <td>Trident</td>
                                            <td>Internet Explorer 7</td>
                                            <td>Win XP SP2+</td>
                                            <td class="center">7</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="even gradeA">
                                            <td>Trident</td>
                                            <td>AOL browser (AOL desktop)</td>
                                            <td>Win XP</td>
                                            <td class="center">6</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Firefox 1.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td class="center">1.7</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Firefox 1.5</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td class="center">1.8</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Firefox 2.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td class="center">1.8</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Firefox 3.0</td>
                                            <td>Win 2k+ / OSX.3+</td>
                                            <td class="center">1.9</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Camino 1.0</td>
                                            <td>OSX.2+</td>
                                            <td class="center">1.8</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Camino 1.5</td>
                                            <td>OSX.3+</td>
                                            <td class="center">1.8</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Netscape 7.2</td>
                                            <td>Win 95+ / Mac OS 8.6-9.2</td>
                                            <td class="center">1.7</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Netscape Browser 8</td>
                                            <td>Win 98SE+</td>
                                            <td class="center">1.7</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Netscape Navigator 9</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td class="center">1.8</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Mozilla 1.0</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td class="center">1</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Mozilla 1.1</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td class="center">1.1</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Mozilla 1.2</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td class="center">1.2</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Mozilla 1.3</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td class="center">1.3</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Mozilla 1.4</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td class="center">1.4</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Mozilla 1.5</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td class="center">1.5</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Mozilla 1.6</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td class="center">1.6</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Mozilla 1.7</td>
                                            <td>Win 98+ / OSX.1+</td>
                                            <td class="center">1.7</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Mozilla 1.8</td>
                                            <td>Win 98+ / OSX.1+</td>
                                            <td class="center">1.8</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Seamonkey 1.1</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td class="center">1.8</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Gecko</td>
                                            <td>Epiphany 2.20</td>
                                            <td>Gnome</td>
                                            <td class="center">1.8</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Webkit</td>
                                            <td>Safari 1.2</td>
                                            <td>OSX.3</td>
                                            <td class="center">125.5</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Webkit</td>
                                            <td>Safari 1.3</td>
                                            <td>OSX.3</td>
                                            <td class="center">312.8</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Webkit</td>
                                            <td>Safari 2.0</td>
                                            <td>OSX.4+</td>
                                            <td class="center">419.3</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Webkit</td>
                                            <td>Safari 3.0</td>
                                            <td>OSX.4+</td>
                                            <td class="center">522.1</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Webkit</td>
                                            <td>OmniWeb 5.5</td>
                                            <td>OSX.4+</td>
                                            <td class="center">420</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Webkit</td>
                                            <td>iPod Touch / iPhone</td>
                                            <td>iPod</td>
                                            <td class="center">420.1</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Webkit</td>
                                            <td>S60</td>
                                            <td>S60</td>
                                            <td class="center">413</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Presto</td>
                                            <td>Opera 7.0</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td class="center">-</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Presto</td>
                                            <td>Opera 7.5</td>
                                            <td>Win 95+ / OSX.2+</td>
                                            <td class="center">-</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Presto</td>
                                            <td>Opera 8.0</td>
                                            <td>Win 95+ / OSX.2+</td>
                                            <td class="center">-</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Presto</td>
                                            <td>Opera 8.5</td>
                                            <td>Win 95+ / OSX.2+</td>
                                            <td class="center">-</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Presto</td>
                                            <td>Opera 9.0</td>
                                            <td>Win 95+ / OSX.3+</td>
                                            <td class="center">-</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Presto</td>
                                            <td>Opera 9.2</td>
                                            <td>Win 88+ / OSX.3+</td>
                                            <td class="center">-</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Presto</td>
                                            <td>Opera 9.5</td>
                                            <td>Win 88+ / OSX.3+</td>
                                            <td class="center">-</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Presto</td>
                                            <td>Opera for Wii</td>
                                            <td>Wii</td>
                                            <td class="center">-</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Presto</td>
                                            <td>Nokia N800</td>
                                            <td>N800</td>
                                            <td class="center">-</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Presto</td>
                                            <td>Nintendo DS browser</td>
                                            <td>Nintendo DS</td>
                                            <td class="center">8.5</td>
                                            <td class="center">C/A<sup>1</sup>
                                            </td>
                                        </tr>
                                        <tr class="gradeC">
                                            <td>KHTML</td>
                                            <td>Konqureror 3.1</td>
                                            <td>KDE 3.1</td>
                                            <td class="center">3.1</td>
                                            <td class="center">C</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>KHTML</td>
                                            <td>Konqureror 3.3</td>
                                            <td>KDE 3.3</td>
                                            <td class="center">3.3</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>KHTML</td>
                                            <td>Konqureror 3.5</td>
                                            <td>KDE 3.5</td>
                                            <td class="center">3.5</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeX">
                                            <td>Tasman</td>
                                            <td>Internet Explorer 4.5</td>
                                            <td>Mac OS 8-9</td>
                                            <td class="center">-</td>
                                            <td class="center">X</td>
                                        </tr>
                                        <tr class="gradeC">
                                            <td>Tasman</td>
                                            <td>Internet Explorer 5.1</td>
                                            <td>Mac OS 7.6-9</td>
                                            <td class="center">1</td>
                                            <td class="center">C</td>
                                        </tr>
                                        <tr class="gradeC">
                                            <td>Tasman</td>
                                            <td>Internet Explorer 5.2</td>
                                            <td>Mac OS 8-X</td>
                                            <td class="center">1</td>
                                            <td class="center">C</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Misc</td>
                                            <td>NetFront 3.1</td>
                                            <td>Embedded devices</td>
                                            <td class="center">-</td>
                                            <td class="center">C</td>
                                        </tr>
                                        <tr class="gradeA">
                                            <td>Misc</td>
                                            <td>NetFront 3.4</td>
                                            <td>Embedded devices</td>
                                            <td class="center">-</td>
                                            <td class="center">A</td>
                                        </tr>
                                        <tr class="gradeX">
                                            <td>Misc</td>
                                            <td>Dillo 0.8</td>
                                            <td>Embedded devices</td>
                                            <td class="center">-</td>
                                            <td class="center">X</td>
                                        </tr>
                                        <tr class="gradeX">
                                            <td>Misc</td>
                                            <td>Links</td>
                                            <td>Text only</td>
                                            <td class="center">-</td>
                                            <td class="center">X</td>
                                        </tr>
                                        <tr class="gradeX">
                                            <td>Misc</td>
                                            <td>Lynx</td>
                                            <td>Text only</td>
                                            <td class="center">-</td>
                                            <td class="center">X</td>
                                        </tr>
                                        <tr class="gradeC">
                                            <td>Misc</td>
                                            <td>IE Mobile</td>
                                            <td>Windows Mobile 6</td>
                                            <td class="center">-</td>
                                            <td class="center">C</td>
                                        </tr>
                                        <tr class="gradeC">
                                            <td>Misc</td>
                                            <td>PSP browser</td>
                                            <td>PSP</td>
                                            <td class="center">-</td>
                                            <td class="center">C</td>
                                        </tr>
                                        <tr class="gradeU">
                                            <td>Other browsers</td>
                                            <td>All others</td>
                                            <td>-</td>
                                            <td class="center">-</td>
                                            <td class="center">U</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>DataTables Usage Information</h4>
                                <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

        <hr>

        <!-- Footer -->
         <footer>
            <div class="row">
                <div class="col-lg-6">
                     <p>Copyright 2015 by Westview Pensione House. All Rights Reserved.</p>
                </div>
                 <div class="col-lg-6">
                    <div class="text-right">
                     Social Accounts: <a href="//http:www.facebook.com/" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                        <a href="//http:www.twitter.com/" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </footer>

    </div>
   <script src="hotelpage/js/jquery.js"></script>
    

    <!-- Bootstrap Core JavaScript -->
     <script src="adminpage/js/bootstrap.min.js"></script>
     <script src="adminpage/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="adminpage/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="adminpage/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

</body>

</html>