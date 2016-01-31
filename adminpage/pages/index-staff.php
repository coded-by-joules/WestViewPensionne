<!DOCTYPE html>
<?php 
session_start();
include('../../connection.php');
include("../../actions/session.php");
if (!isset($login_session)) {
    header("Location: ../../index.php");
} else {
    $user_check=$_SESSION['Customerid'];
    $sql = "SELECT * FROM tblusers WHERE Customer_ID = '$user_check'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
     $user=$row['Username'];
    if ($row['Type']=='User') {
        header("Location: ../../index.php");
    } else if ($row['Type']=='Administrator') {
        header("Location: index.php");
    }
}
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Westview Pension Houese | Staff Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <!--ajax-->
  <link href="../dist/css/datepicker2.css" rel="stylesheet" type="text/css" /> 

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    
<!--modal modal-->
<!--Modal sa room-->
<!--delete sa room-->
<!--auto fill-->
<script src="../dist/js/jquery.js"></script>
<!--search seacrh-->
<script src="../dist/js/jquery-1.4.1.min.js"></script>
<!--Modal sa room-->
<!--delete sa room-->
<!--auto fill-->
<script  src="../dist/js/jquery-1.8.0.min.js"></script>

<!--room picture-->
<!--picture css-->

       <script type="text/javascript" src="../js/datepicker.js"></script> 
<script type="text/javascript" src="../dist/js/addon.js"></script>
<script type="text/javascript" src="../dist/js/load.js"></script>
<script type="text/javascript" src="../dist/js/confirmbox.js"></script>


</head>

<body>

    <div style="background-color: rgb(44, 115, 231);" id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../pages/index-staff.php"><span class="fa fa-cogs "></span> Westview Pension House - <?php echo $user; ?></a>
            </div>
            <!-- /.navbar-header -->


            <ul class="nav navbar-top-links navbar-right">
               <li class="dropdown"> 
            <a href="usernotificationdetail.php" ><span class="glyphicon glyphicon-user"><span class="badge" id="user_count"></span></span></a>
                <li class="dropdown">
                    <a href="../../index.php" target="_blank">
                        <i class="fa fa-share-square-o  fa-fw"></i> Visit website
                    </a>
                </li>
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#" data-toggle='modal' data-target='#adminprofile'><i class="fa fa-user fa-fw"></i> Super User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <form method="POST" action="../../actions/logout.php">
                        <li class="divider"></li>
                        <li>&nbsp&nbsp&nbsp&nbsp&nbsp<i class="fa fa-sign-out fa-fw"></i><input style="background-color: transparent;border: transparent;" type="submit" name="logout" value="Logout">
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="../pages/index-staff.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                         <a href="../pages/transaction-staff.php" ><i class="fa fa-shopping-cart"></i>Transaction</a>
                        </li>
                        <li>
                         <a href="../room/availableroom.php" ><i class="fa fa-home"></i> Available Room</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->

                         <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-table fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Guest</div>
                                    <div>Reservation</div>
                                </div>
                            </div>
                        </div>   

                        <a href="updateread.php?unread1">
                            <div class="panel-footer">

                                <span class="badge" id="notification_count"></span> 
 
                              <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                     <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-blue">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Guest</div>
                                    <div>Transaction</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="../pages/transaction-staff.php"><span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                         <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-2">
                                   <i class="fa fa-home fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Room</div>
                                    <div>Available</div>
                                </div>
                            </div>
                        </div>
                        <a href="../room/availableroom.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            </div>





                  <div class="form-group" >
                    <label  style="color:#444;"><h3><i class=" " style="color:#444;"></i> FROM:</h3></label>
                        <input style="text-align:center;background-color:#fff;color:#000;font-size:14pt;width:300px;" type="text" class=" w8em format-d-m-y highlight-days-67 range-low-today form-control" name="start" id="sd" value="" maxlength="10" readonly />
                     </div> 
                 <div class="form-group" style="margin-top:-130px; margin-left:350px;">
                  <label  style="color:#444;"><h3><i class="" style="color:#444;"></i> To:</h3></label>
                  <input style="text-align:center;background-color:#fff;color:#000;font-size:14pt;width:300px;" type="text" class=" w8em format-d-m-y highlight-days-67 range-low-today form-control" name="end" id="ed" value="" maxlength="10" readonly />
                   </div> 
              <div class="form-group" style="margin-top:-90px; margin-left:670px;">
                  <label  style="color:#444;"><h3 ><i class="" style="color:#444; "></i>Status: </h3></label>
                           <select style="text-align:center;background-color:#fff;color:#000;font-size:14pt; margin-top:10px; width:250px;" id="status">
                          <option value="">Select Status</option>
                          <option value="Pending">Pending</option>
                          <option value="Confirmed">Confirmed</option>
                          <option value="Check In">Check In</option>
                          <option value="Reserve">Reserve</option>
                          <option value="Reserve/DownPayment">Reserve/DownPayment</option>
                          <option value="Check Out">Check Out</option>
                        </select>
                   </div> 

            <div class="row" >
                <div class="col-lg-13">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Reservation Details
                        </div>


                        <div class="panel-body">
                            <div class="dataTable_wrapper" style="overflow: auto; margin-top:-10px;">

                               <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="width:1585px;">

                                    <thead>
                                        <tr>
                                            <th>FirstName</th>
                                            <th>LastName</th>
                                            <th>Contact</th>
                                            <th>Email</th>
                                            <th>Room_ID</th>
                                            <th>CategoryName</th>
                                            <th>ReservationDate</th>
                                            <th>Arrival</th>
                                            <th>Departure</th>
                                            <th>NumberofDays</th>
                                            <th>Status</th>
                                            <th>Remaining Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody id="viewresultreservationdetail" class="viewstatusdetail">  <!-- reservation detail -->
                                      <?php 
                                    include('../../connection.php');
                                    $sql = "select tblreservation.Reservation_ID, tblreservation.Confirmation,tblusers.FirstName, tblusers.LastName, tblusers.Contact,tblusers.Email,
                                            tblrooms.Room_ID,tblreservation.CategoryName,tblreservation.ReservationDate,
                                            tblreservation.Arrival,tblreservation.Departure,tblreservation.Payable,tblreservation.NumberofDay,tblreservation.Status,tblreservation.AddonPayable,tblreservation.Downpayment
                                            FROM tblreservation INNER JOIN tblusers
                                            ON tblreservation.Customer_ID=tblusers.Customer_ID
                                            INNER JOIN tblrooms ON tblrooms.Room_ID=tblreservation.Room_ID
                                           ";
                                    $result = $conn->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                            // id='autoaddons'
                                    $reservationdate=date_create($row['ReservationDate']);       
                                    $arrival=date_create($row['Arrival']);
                                    $departure=date_create($row['Departure']);    
                                            echo "<tr>
                                                <td> ".$row["FirstName"]. "</td>
                                                <td> ".$row["LastName"]. "</td>
                                                <td> ".$row["Contact"]." </td>
                                                <td> ".$row["Email"]. "</td>
                                                <td> ".$row["Room_ID"]. "</td>
                                                <td> ".$row["CategoryName"]. "</td>
                                                <td> ".date_format($reservationdate,'Y/m/d'). "</td>
                                                <td> ".date_format($arrival,'Y/m/d'). "</td>
                                                <td> ".date_format($departure,'Y/m/d'). "</td>
                                                <td> ".$row["NumberofDay"]. "</td>
                                                <td> ".$row["Status"]. "</td>
                                                <td> ".number_format($row["Payable"],2) . "</td></tr>";
                                        
                                    } mysqli_close($conn);
                                            ?>

                                    </tbody>
                                    </tbody>
                                            <!-- addons model -->
        
                                
                                <div class="modal fade" id="reservedelete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="deleteLabel">Note: This will be deleted permanently.</h4>
                                        </div>
                                        <div class="modal-body">
                                        <center>
                                            Are you sure you want to proceed?
                                        </center>
                                        </div>
                                        <div class="modal-footer">
                                           <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
                                            <button id='delreserve' type='button'  class='btn btn-primary' data-dismiss='modal'>Yes</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-delete -->
                                </div>
                                <!-- /.modal-dialog -->
                                </div>


                                        
                                 <!-- admin profile modal -->
                                            <div class="modal fade" id="adminprofile" tabindex="-1" role="dialog" aria-labelledby="roomDetails" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="addRoom">Super User Profile</h4>
                                        </div>
                                        <div class="modal-body">
                                       <div class="row">
                                        <div class="col-lg-8 col-lg-offset-2">
                                            <?php
                                        include("../../connection.php");
                                        $sql="select * from tblusers where Customer_ID='$user_check'";
                                        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                                        while ($row=mysqli_fetch_array($result)) { ?>
                                            <form role="form" method="POST" action="../../actions/edit-profile.php">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input name="id" type="hidden" value="<?php echo $row['Customer_ID']?>" class="form-control">
                                            <input name="fname" value="<?php echo $row['FirstName']?>" class="form-control">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input name="lname" value="<?php echo $row['LastName']?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input name="username" value="<?php echo $row['Username']?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Contact</label>
                                            <input name="contact" value="<?php echo $row['Contact']?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input name="email" value="<?php echo $row['Email']?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select name="gender" class="form-control">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>City</label>
                                            <input name="city" value="<?php echo $row['City']?>" class="form-control">
                                        </div>
                                        
                                        
                                    
                                       </div>

                                        </div>
                                        <div class="modal-footer">
                                        <div class="col-lg-2 pull-right">
                                         <input name="submit" type="submit" class="btn btn-primary" value="Submit">
                                        </div>
                                        <div class="col-md-2 pull-right">
                                         <button type="reset" class="btn btn-default">Reset</button>
                                        </div>
                                        </form><?php } mysqli_close($conn);?>
                                        </div>
                                    </div>
                                    <!-- /.modal-delete -->
                                </div>
                                <!-- /.modal-dialog -->
                                </div>
                                


                                <!-- actions model -->
                            <div class="modal fade" id="actions" tabindex="-1" role="dialog" aria-labelledby="roomDetails" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="addRoom">Actions</h4>
                                        </div>
                                        <div class="modal-body">
                                       <form name="addem" id="addem" action="addingon.php"  method="post" >
                                    <fieldset>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="amount" id="actamount" placeholder="Confirmation Code" >
                                    <select class="form-control" class="text" name="item" id="autoaddon" required>
                                        <option value='Item'>Check in</option>
                                        <option value='Item'>Check Out</option>
                                    </select><br>
                                    <input type="button" name="addon" class="btn  btn-primary btn-block" class="button2"  value="Add" onclick="validAddingOn()">
                                    <input value="Cancel" data-dismiss="modal"  class="btn btn-default btn-block">
                                </form>
                                </div>
                                    <div class="modal-footer">
                                </div>
                                </div>
                                    <!-- /.modal-delete -->
                                </div>
                                <!-- /.modal-dialog -->
                                </div>
                            </div>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>




            <div class="row">
                <div class="col-lg-13">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Walkin / <a href="../room/walkin.php" style="color:#23527C;">Add Walk in </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper" style="overflow:auto">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>FirstName</th>
                                            <th>LastName</th>
                                            <th>Contact</th>
                                            <th>Room_ID</th>
                                            <th>CategoryName</th>
                                            <th>Arrival</th>
                                            <th>Departure</th>
                                            <th>NumberofDays</th>
                                            <th>Status</th>
                                            <th>Addon Payable</th>
                                            <th>Downpayment</th>
                                            <th>Amount</th>
                                            <th>Add on</th>
                                            <th>Transfer Room</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    include('../../connection.php');
                                    $selsql = "SELECT * FROM tblwalkins";
                                    $dresult = $conn->query($selsql);
                                    if ($dresult->num_rows>0) {
                                        while ($row = $dresult->fetch_assoc()) {
                                                echo "<tr>
                                                <td> ".$row["FirstName"]. "</td>
                                                <td> ".$row["LastName"]. "</td>
                                                <td> ".$row["Contact"]." </td>
                                                <td> ".$row["Room_ID"]. "</td>
                                                <td> ".$row["CategoryName"]. "</td>
                                                <td> ".$row["Arrival"]. "</td>
                                                <td> ".$row["Departure"]. "</td>
                                                <td> ".$row["NumberofDays"]. "</td>
                                                <td> ".$row["Status"]. "</td>
                                                <td> ".number_format($row["Addonpayable"],2). "</td>
                                                <td> ".number_format($row["Downpayment"],2). "</td>
                                                <td> ".number_format($row["Amount"],2). "</td>";
                                                echo "<td><a href='../room/walkinaddon.php?wid=".$row['Customer_ID']."' class=' btn btn-success' >Add on</a></td>
                                                <td><a href='../room/walkinroomtransfer.php?wid=".mysqli_real_escape_string($conn, $row['Customer_ID'])."' value=".$row['Customer_ID']."' class='btn btn-danger transfer' >Transfer Room</a></td>
                                                <td><a href='../customerwalkin/transaction.php?customerid=".$row['Customer_ID']."'   class='btn btn-primary action'>Action</a></td>";
                                                echo "</tr>";
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>



            <!-- /.row -->

        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
    function reserveDelete(id) {
      $("#delreserve").click(function(e){
        window.location='../room/deletereserve.php?resid='+ id;
      });
    }
    </script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

  <script  src="../js/selectroom.js"></script>



</body>

</html>
