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
    if ($row['Type']!='Administrator') {
        header("Location: ../../index.php");
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

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>
    <script type="text/javascript" src="../js/main.js"></script>

<!--modal modal-->
<script src="..dist/js/jquery.js"></script>
<!--search seacrh-->
<script src="..dist/js/jquery-1.4.1.min.js"></script>
<!--Modal sa room-->
<!--delete sa room-->
<!--auto fill-->
<script  src="..dist/js/jquery-1.8.0.min.js"></script>


<script type="text/javascript" src="..dist/js/jquery.min.js"></script>

<script type="text/javascript" src="..dist/js/jquery.form.js"></script>
<!--room picture-->
<!--picture css-->
<!--ajax-->
<script type="text/javascript" src="../dist/js/addon.js"></script>
    

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
                <a class="navbar-brand" href="../pages/index.php"><span class="fa fa-cogs "></span> Westview Pension House - Staff</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
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
                        <li><a href="#" data-toggle='modal' data-target='#adminprofile'><i class="fa fa-user fa-fw"></i> Staff Profile</a>
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
                            <a href="../pages/index.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
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
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-blue">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Guest</div>
                                    <div>Comment</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="../room/comments.php"><span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
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
                        <a href="index.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-7">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-group fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">User</div>
                                    <div>Account</div>
                                </div>
                            </div>
                        </div>
                        <a href="../room/manageuser.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
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
                                    <i class="fa fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Monthly</div>
                                    <div>Income</div>
                                </div>
                            </div>
                        </div>
                        <a href="../room/monthlyincome.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-13">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Reservation
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper" style="overflow: auto">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Confirmation Code</th>
                                            <th>FirstName</th>
                                            <th>LastName</th>
                                            <th>Contact</th>
                                            <th>Email</th>
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
                                    $sql = "select tblreservation.Reservation_ID, tblreservation.Confirmation,tblusers.FirstName, tblusers.LastName, tblusers.Contact,tblusers.Email,
                                            tblrooms.Room_ID,tblreservation.CategoryName,
                                            tblreservation.Arrival,tblreservation.Departure,tblreservation.Payable,tblreservation.NumberofDay,tblreservation.Status,tblreservation.AddonPayable,tblreservation.Downpayment
                                            FROM tblreservation INNER JOIN tblcustomers
                                            ON tblreservation.Customer_ID=tblusers.Customer_ID
                                            INNER JOIN tblrooms ON tblrooms.Room_ID=tblreservation.Room_ID";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows>0) {
                                        while ($row = $result->fetch_assoc()) {
                                            // id='autoaddons'
                                            echo "<tr>
                                                <td>" .$row["Confirmation"]. "</td>
                                                <td> ".$row["FirstName"]. "</td>
                                                <td> ".$row["LastName"]. "</td>
                                                <td> ".$row["Contact"]." </td>
                                                <td> ".$row["Email"]. "</td>
                                                <td> ".$row["Room_ID"]. "</td>
                                                <td> ".$row["CategoryName"]. "</td>
                                                <td> ".$row["Arrival"]. "</td>
                                                <td> ".$row["Departure"]. "</td>
                                                <td> ".$row["NumberofDay"]. "</td>
                                                <td> ".$row["Status"]. "</td>
                                                <td> ".$row["AddonPayable"]. "</td>
                                                <td> ".$row["Downpayment"]. "</td>
                                                <td> ".$row["Payable"]. "</td>

                                                <td><a href='#' value=".$row["Confirmation"]."  class='btn btn-success' data-toggle='modal' data-target='#addons'>Add on</a></td>
                                                <td><a href='../room/roomtransferdetails.php?rid=".mysqli_real_escape_string($conn, $row['Reservation_ID'])."' value=".$row['Room_ID']."' class='btn btn-danger transfer' >Transfer Room</a></td>
                                                <td><a href='#' value=".$row["Confirmation"]."  class='btn btn-primary action' data-toggle='modal' data-target='#actions'>Action</a></td>";
                                                $arrival=$row['Arrival'];
                                                $departure=$row['Departure'];
                                            ?>
                                            <!-- addons model -->
                                            <div class="modal fade" id="addons" tabindex="-1" role="dialog" aria-labelledby="roomDetails" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="addRoom">Add on</h4>
                                        </div>
                                        <div class="modal-body">
                                       <form name="addem" id="addem" action="addingon.php"  method="post" >
                            <fieldset>
                               
                                <div class="form-group">
                                    <div id="confirm"><input type="text" name="confirmation" id="cnfrm" class="form-control" placeholder="Confirmation Code"></div>
                                    <select class="form-control" name="item" id="autoaddon" required>
                                        <option value='Item'>Item</option>
                                        <?php
                                        include("../../connection.php");
                                        $sql="select item from tbladdons";
                                        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                                        while ($row1=mysqli_fetch_array($result)) { ?>
                                        <option><?php echo $row1['item']; ?> </option>
                                        <?php } ?>
                                    </select>
                                    <div id="resultitem">
                                    <select class="form-control" name="totquantity"  onchange="calculateTotal()" >
                                    </select>
                                    <input class="form-control" type="text" id="p" name="price" onkeypress="return isNumberKey(event)" placeholder="Price">
                                    </div>
                                    <input class="form-control" type="text" name="amount" id="amount" onkeypress="return isNumberKey(event)" placeholder="Amount" >
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="button" name="addon" class="btn  btn-primary btn-block" class="button2"  value="Add" onclick="validAddingOn()">
                                 <input value="Cancel" data-dismiss="modal"  class="btn btn-default btn-block">
                                 
                            </fieldset>
                        </form>
                                        </div>
                                        <div class="modal-footer">
                                       
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
                                            <form role="form">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input class="form-control">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control">
                                            <p class="help-block">Example block-level help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Text Input</label>
                                            <input class="form-control">
                                            <p class="help-block">Example block-level help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Text Input</label>
                                            <input class="form-control">
                                            <p class="help-block">Example block-level help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Text Input</label>
                                            <input class="form-control">
                                            <p class="help-block">Example block-level help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Text Input</label>
                                            <input class="form-control">
                                            <p class="help-block">Example block-level help text here.</p>
                                        </div>
                                        
                                        
                                    </form>
                                       </div>

                                        </div>
                                        <div class="modal-footer">
                                        <div class="col-lg-2 pull-right">
                                         <button type="submit" class="btn btn-primary">Submit </button>
                                        </div>
                                        <div class="col-md-2 pull-right">
                                         <button type="reset" class="btn btn-default">Reset</button>
                                        </div>
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
                                </div>
                                    <div class="modal-footer">
                                </div>
                                </div>
                                    <!-- /.modal-delete -->
                                </div>
                                <!-- /.modal-dialog -->
                                </div>
                            </div>
                                            <?php
                                            echo "</tr>";
                                        }
                                    } mysqli_close($conn);
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
            <div class="row">
                <div class="col-lg-13">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Guest Add ons
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper" style="overflow: auto">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Lastname</th>
                                            <th>Items</th>
                                            <th>Purchase</th>
                                            <th>Price</th>
                                            <th>Delete</th>
                                            <th>Update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $sql = "select tblusers.FirstName,tblusers.LastName,tbladdonreserve.Item,tbladdonreserve.quantity,tbladdonreserve.price from
                                    tbladdonreserve   INNER JOIN tblcustomers on tbladdonreserve.Customer_ID=tblusers.Customer_ID ";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows>0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                              <td> ".$row["FirstName"]." </td>
                                              <td> ".$row["LastName"]. "</td>
                                              <td> ".$row["Item"]." </td>
                                              <td> ".$row["quantity"]. "</td>
                                              <td> ".$row["price"]. "</td>
                                              <td><button value=".$row['Item']. " class='btn btn-danger'>Delete</button></td>
                                              <td><button value=".$row["Item"]."  class='btn btn-primary'>Update</button></td></tr>";
                                        }
                                    }
                                    mysqli_close($conn);
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
        </div>
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

</body>

</html>
