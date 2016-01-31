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

<?php

$year=$_POST['year'];
$month=$_POST['month'];
$week=$_POST['week'];



?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Westview Pension House - Admin | Transaction</title>

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

    <script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>
    <script type="text/javascript" src="../dist/js/jquery-1.8.0.min.js"></script>
    <!-- MODAL ni cya -->


    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../dist/js/addon.js"></script>


     <script type="text/javascript">
    function transactionDelete(id) {
      $("#deltransaction").click(function(e){
        window.location='../pages/transactiondelete.php?resid='+ id;
      });
    }
    </script>


     <script type="text/javascript">
    function deleteTransfer(id) {
      $("#deletetransfer").click(function(e){
        window.location='../pages/transferdelete.php?trid='+ id;
      });
    }

</script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
               <a class="navbar-brand" 
                <?php if ($type=="Administrator"){echo 'href="../pages/index.php"';}else{echo 'href="../pages/index-staff.php"';}?>><span class="fa fa-cogs "></span> Westview Pension House - <?php echo ucfirst($user); ?></a>
            </div>
            <!-- /.navbar-header -->

           <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a href="../../index.php" target="_blank">
                        <i class="fa fa-share-square-o  fa-fw"></i> Visit website
                    </a>
                </li>
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
     
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="../pages/index-staff.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                         <a href="../pages/transaction-staff.php" class="active"><i class="fa fa-shopping-cart"></i>Transaction</a>
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
                <div class="col-lg-13">
                    <h1 class="page-header"><i class="fa fa-shopping-cart"> </i> Add ons</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                        <!-- /.panel-body -->
               <div class="row">
                <div class="col-lg-13">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                  History Payment for Reservation
                        </div>
                        <!-- /.panel-heading -->

                        <div class="panel-body">

                            <div class="dataTable_wrapper" style="overflow:auto">
                                <div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter"><label>Search:<input type="text" class="form-control input-sm search" id="searchid" placeholder="Search Detail"></label></div></div>
                               <table class="table table-striped table-bordered table-hover"  style="width:1580px;">
                                    <thead>
                                       <th>FirstName</th>
                                            <th>LastName</th>
                                             <th>Room Number</th>
                                             <th>CategoryName</th>
                                             <th>Date Reserve</th>
                                             <th>Date Check In</th>
                                             <th>Date Check Out</th>
                                             <th>DownPayment</th>
                                             <th>Payable</th>
                                             <th>Status</th>
                                             <th>User In Charge</th>
                                            <th>Add on</th>
                                            <th>Transfer Room</th>
                                            <th>Action</th>
                                            <th>Cancel</th>
                                        </tr>
                                    </thead>
                                    <tbody id="result">
                                    <?php 
                                    include('../../connection.php');
                         
                                    $sql = "select tblusers.Customer_ID,tbltransaction.Reservation_ID,tblreservation.Status,tblreservation.Confirmation,tblreservation.Downpayment,tblusers.FirstName,tblusers.LastName,tbltransaction.DateReserve,tbltransaction.DateIn,tbltransaction.DateOut,tbltransaction.DateOut,tbltransaction.UserInCharge,tbltransaction.Amount,tblreservation.CategoryName,tblreservation.Room_ID,tblreservation.Status 
                                            from tbltransaction INNER JOIN tblreservation on tbltransaction.Reservation_ID=tblreservation.Reservation_ID 
                                            INNER JOIN tblusers on tbltransaction.Customer_ID=tblusers.Customer_ID "; 

                                      $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                                    $dresult = $conn->query($sql);
                                    if ($dresult->num_rows>0) {
                                        while ($row = $dresult->fetch_assoc()) {
                                            $daterreserve=date_create($row['DateReserve']);
                                            $arrival=date_create($row['DateIn']);
                                            $departure=date_create($row['DateOut']);

                                                echo "<tr>
                                                <td> ".$row["FirstName"]." </td>
                                                <td> ".$row["LastName"]. "</td>
                                                <td> ".$row["Room_ID"]." </td>
                                               <td> ".$row["CategoryName"]." </td>
                                                <td> ".date_format($daterreserve,'Y/m/d')." </td>";
                                                if ($row['DateIn']=="0000-00-00")
                                               {
                                                echo "<td>Not Yet Check In</td>";
                                               }
                                               else
                                               {
                                                echo " <td> ".date_format($arrival,'Y/m/d')." </td>";
                                               }
                                               if ($row['DateOut']=="")
                                               {
                                                echo "<td>Not Yet Check Out</td>";
                                               }
                                               else
                                               {
                                                echo " <td> ".date_format($departure,'Y/m/d')." </td>";
                                               }
                                                echo  "<td> ".$row["Downpayment"]. "</td>
                                                <td> ".number_format($row["Amount"],2). "</td>
                                                <td> ".$row["Status"]." </td>
                                                <td> ".$row["UserInCharge"]." </td>";          
                                               echo "<td><a href='../room/autoaddon.php?rid=".$row['Reservation_ID']."' class=' btn btn-success' >Add on</a></td>
                                                <td><a href='../room/roomtransferdetails.php?rid=".mysqli_real_escape_string($conn, $row['Reservation_ID'])."' value=".$row['Room_ID']."' class='btn btn-danger transfer' >Transfer Room</a></td>";
                                                if ($row['Status']=="Pending")
                                                {
                                                echo "<td><a href='../CustomerReservation/transaction.php?confirmation=".$row['Confirmation']."'   class='btn btn-primary action'>Action</a></td>";
                                                }
                                                else if ($row['Status']=="Confirmed" || $row['Status']=="Reserve/DownPayment" || $row['Status']=="Reserve")
                                                {
                                                 echo "<td><a href='../CustomerReservation/transaction2.php?confirmation=".$row['Confirmation']."'  onclick='return UpdateCheckin()'  class='btn btn-primary action'>Check In</a></td>";
                                                } 
                                                else if ($row['Status']=="Check In" )
                                                {
                                               echo "<td><a href='../CustomerReservation/transaction2.php?confirmation=".$row['Confirmation']."' onclick=' return UpdateCheckout()'   class='btn btn-primary action'>Check Out</a></td>";
                                                }   
                                                else
                                                {
                                                echo "<td><a href='#'' class='btn btn-primary action'>Check Out</a></td>";
                                                   
                                                }
                                                if ($row['Status']=="Cancelled" || $row['Status']=="Check Out")
                                                {
                                                 echo "<td><a class='btn btn-danger transfer'><span>Cancel</span></a></td>"; 
                                                }
                                                else
                                                {
                                                echo "<td><a onclick='reserveDelete(".$row['Reservation_ID'].")' href='#' data-toggle='modal' data-target='#reservedelete' class='btn btn-danger transfer'><span>Cancel</span></a></td>";
                                                echo "</tr>";
                                                }
                                                $arrival=$row['Arrival'];
                                                $departure=$row['Departure'];
                                        }
                                    }
                                            ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                         </div>



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
                                            <th>Amount</th>
                                            <th>User In Charge</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                     
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    include("../../connection.php");
                                    $sql = "select tbladdonreserve.addonid,tbladdonreserve.Reservation_ID, tblusers.FirstName,tblusers.LastName,tbladdonreserve.Item,tbladdonreserve.quantity,tbladdonreserve.UserInCharge,tbladdonreserve.price,tbladdonreserve.Amount 
                                            from tbladdonreserve 
                                          inner JOIN tblusers ON tbladdonreserve.Customer_ID=tblusers.Customer_ID
                                          inner JOIN tblreservation ON tbladdonreserve.Reservation_ID=tblreservation.Reservation_ID
                
                                
                                ";
                                    $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                                    $result = $conn->query($sql);
                                    if ($result->num_rows>0) {
                                        while ($row = $result->fetch_array()) {
                                            echo "<tr>
                                              <td> ".$row["FirstName"]." </td>
                                              <td> ".$row["LastName"]. "</td>
                                              <td> ".$row["Item"]." </td>
                                              <td> ".$row["quantity"]. "</td>
                                              <td> ".$row["price"]. "</td>
                                              <td> ".number_format($row["Amount"],2). "</td>
                                              <td> ".$row["UserInCharge"]. "</td>
                                              <td><a href='../room/updateaddon.php?addonid=".$row['addonid']."' class=' btn btn-success' >Edit</a></td>
                                              <td><a  onclick='deleteAdds(".$row['addonid'].")' value=".$row['Item']. "  data-toggle='modal' data-target='#deladds' class='btn btn-danger' >Delete</a></td>
                                            </tr>";
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="modal fade" id="deladds" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
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
                                           <?php  echo "<button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
                                             <button id='addonID' type='button'  class='btn btn-primary' data-dismiss='modal'>Yes</button>";?>
                                        </div>
                                    </div>
                                    <!-- /.modal-delete -->
                                </div>
                                <!-- /.modal-dialog -->
                                </div>
                                            <!--end of delete modal-->
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>





            <!--Room Category Modal-->
 
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
    <!-- jQuery -->


    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>



    <!-- Custom Theme JavaScript -->

    <script src="../dist/js/sb-admin-2.js"></script>
        <script type="text/javascript" src="../dist/js/load.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->



       <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
    <!-- Custom Theme
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
    <script type="text/javascript">
        function deleteme(id){
            $("#deleteme, #activeme").click(function(e){
            window.location='../../actions/edit-action.php?id='+ id;
        });
    }
    </script>

</body>

</html>
