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
    $type=$row['Type'];

}
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Westview Pension Houese | Admin Page - Comments</title>

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

    <!--modal modal-->
    <script src="../dist/js/jquery.js"></script>
    <!--search seacrh-->
    <script src="../dist/js/jquery-1.4.1.min.js"></script>
    <!--Modal sa room-->
    <script src="../dist/js/members.js"></script>
    <!--delete sa room-->
    <script src="../dist/js/confirmbox.js"></script>
    <!--auto fill-->
    <script  src="../dist/js/jquery-1.8.0.min.js"></script>

    <script  src="../dist/js/jquery.min.js"></script>

    <script  src="../dist/js/jquery.form.js"></script>

    <script src="../dist/js/facebox.js" ></script>
    <!--ajax-->
    <script  src="../dist/js/library.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--loading pic sa room-->
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : '../dist/src/loading.gif',
        closeImage   : '../dist/src/closelabel.png'
      })
    })
  </script>


    <!--numeric only number-->
    <SCRIPT language=Javascript>
          <!--
          function isNumberKey(evt)
          {
             var charCode = (evt.which) ? evt.which : event.keyCode
             if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

             return true;
          }
          //-->
       </SCRIPT>

    <!--uplode -->
    <script>
    $(document).ready(function() {
    $('#myfile').change(function(){
    $('#path').val($(this).val());
      });
      });
    </script> 
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

                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->


            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">

                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>


                <center><div class="col-lg-12">
                    <h1 class="page-header">User Notifications</h1>
                </div>
            </div>
                <!-- /.col-lg-12 -->

            
            <!--Room Category Modal-->
            <div class="row"  style="vertical-align:center;">


            
             <div class="row">
                <div class="col-lg-13">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <center><span>Notification</span></center>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" style="margin-left:40px;">
                            <div class="dataTable_wrapper" style="overflow: auto">
                        <table align="center" class="table table-striped table-bordered table-hover" style="width:1000px;">
                                      <thead>
                                        <tr>
                                            
                                            <th>From User </th>
                                            <th>To User</th>
                                            <th>Message</th>
                                            <th>Date Recieved</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    
                                            <?php 
                                            include('../../connection.php');
                                           $sql="select  * from tblnotifications Where ToUser='".$user."' ORDER BY DateRecieved";
                                            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                            while ($row = mysqli_fetch_array($result)) { ?>
                                            <tbody>
                                        <tr>
                                            <td><?php echo $row['FromUser']?></td>
                                            <td><?php echo $row['ToUser']?></td>
                                            <td><?php echo $row['Message']?></td>
                                            <td><?php echo $row['DateRecieved']?></td>
                                        </tr>
                                    </tbody>
                                </table><?php } mysqli_close($conn);?>
                                    </tbody>
                                </table>
                            </div>

            <!--Delete Comment-->
            <div class="modal fade" id="deleteC" tabindex="-1" role="dialog" aria-labelledby="roomClabel" aria-hidden="true">
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
                                            <button type="button" class="btn btn-default"  data-dismiss="modal">Cancel</button>
                                            <button type="button" name="deletecomment" id="deletecomment" class="btn btn-primary">Yes</button>
                                        </div>
                                         </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                                
            </div><!-- admin profile modal -->
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
