<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Westview Pension Houese | Admin Page - Manage Room</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS 
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">-->

    <!-- DataTables CSS 
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">-->

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
<!--delete sa room-->
<!--auto fill-->
<script  src="../dist/js/jquery-1.8.0.min.js"></script>


<script type="text/javascript" src="../dist/js/jquery.min.js"></script>

<script type="text/javascript" src="../js/walkinajax.js"></script>    

    

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

       <SCRIPT language=Javascript>

$(document).ready(function()
                  {
    $("#stat").change(function()
        {
            if($(this).val() =="Reserve/DownPayment")
        {
            $("#downpayment").show();
        }
        else
        {
          $("#downpayment").hide();
        }
        });
       $("#downpayment").hide();
});

</script> 

<SCRIPT language=Javascript>

$(document).ready(function()
                  {
    $("#stat").change(function()
        {
            if($(this).val() =="Reserve/DownPayment" || $(this).val() =="Reserve" || $(this).val() =="Pending" )
        {
            $("#action").val("Reserve");
        }
            else if($(this).val() =="Check In" )
        {
            $("#action").val("Check In");
        }

        else
        {
          $("#action").val("Check Out");
        }
        });
     
});

</script> 
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
                <a class="navbar-brand" href="../pages/index.php"><span class="fa fa-cogs "></span> Westview Pension House - Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               <li class="dropdown">
                    <a href="../../index.php" target="_blank">
                        <i class="fa fa-share-square-o  fa-fw"></i> Visit website
                    </a>
                </li>
                  <li class="dropdown   ">
        <a aria-expanded="true" class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-alerts">
            <li>
                <a href="#">
                    <div>
                        <i class="fa fa-comment fa-fw"></i> New Comment
                        <span class="pull-right text-muted small">4 minutes ago</span>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <i class="fa fa-star fa-fw"></i> 3 New Reservations
                        <span class="pull-right text-muted small">12 minutes ago</span>
                    </div>
                </a>
            </li>
        </ul></li>       
         <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> Super User <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Super User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>

                <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="../pages/index.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="../room/manageroom.php" ><i class="fa fa-table fa-fw"></i> Manage Rooms</a>
                        </li>
                        <li>
                            <a href="../room/manageuser.php"><i class="fa fa-group fa-fw"></i> Manage Users</a>
                        </li>
                        <li>
                           <a href="../room/monthlyincome.php" ><i class="fa fa-calendar  fa-fw"></i> Monthly Income</a>
                        </li>
                         <li>
                            <a href="../room/comments.php"><i class="fa fa-envelope-o  fa-fw"></i> Comments</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Action</h1>
        </div>
                
        </div>
            
            <!--Room Category Modal-->
            <div class="row">

                <div class="col-lg-12">
                 
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Current Room Details 
                        </div>
                           <div class="row">
                                <div class="col-lg-6 col-lg-offset-3">
                                    <form role="form">
                                        <div class="form-group">
                                    <?php 
                                    include("../../connection.php");
                                    $customerid = mysqli_real_escape_string($conn, $_GET['customerid']);
                                    $sql = "select * from tblwalkins               
                                            where Customer_ID='".$customerid."'";
                                    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                                    while ($row = mysqli_fetch_assoc($result)) {
                                   echo  "<input name='customerid' id='cID' value='".$row['Customer_ID']."' onkeypress='return isNumberKey(event)' type='hidden' required>";
                             
                                    echo '  <div class="form-group">
                                            <label>Customer_ID</label>
                                            <input class="form-control" id="disabledInput" placeholder="Disabled input" value="000-'.$row['Customer_ID'].'" disabled="" type="text" >        
                                            </div>';
                                      echo '<div class="form-group">
                                            <label>Text Input with Placeholder</label>
                                            <select class="form-control" name="status" id="stat">
                                            <option value="'.$row['Status'].'">'.$row['Status'].'</option>';

                                           if ($row['Status'] =="Pending")
                                            {
                                              echo "<option value='Reserve/DownPayment'>Reserve/DownPayment</option>";
                                              echo "<option value='Reserve'>Reserve</option>";
                                              echo "<option value='Check In'>Check In</option>";

                                            }   

                                                else if ($row['Status'] =="Reserve/DownPayment")
                                                {
                                                 // echo "<option value='Check In/DownPayment'>Check In/DownPayment</option>";
                                                  echo "<option value='Check In'>Check In</option>";
                                                  echo "<option value='Check Out'>Check Out</option>";  
                                                }

                                                   else if ($row['Status'] =="Reserve")
                                                {
                                                  echo "<option value='Check In'>Check In</option>";
                                                  echo "<option value='Check Out'>Check Out</option>";  
                                                }
                                                else
                                                {
                                                     echo "<option value='Check Out'>Check Out</option>";   
                                                }

                                                echo "</select>";
                                                echo "</div>";
                                
        
                                 if ($row['Status'] =="Reserve/DownPayment" )
                                {

                                echo "<p><input type='hidden' name='customerid' id='cID' value=".$row['Customer_ID']."></p>";
                                      echo "<p><input type='hidden' name='addonpayable' id='addonpayable' value=".$row['Addonpayable']. "> </p>";
                                      echo "<p><input type='hidden' name='downpayment' id='downpyment' value=".$row['Downpayment']. "> </p>";  
                                      echo "<p><input type='hidden' name='payable' id='payable' value=".$row['Amount']. "> </p>"; 
                                  echo '<input type="button" class="btn btn-primary " id="action" value="Reserve"  onclick="validAction()">';   
                                  
                                }
                            
                              else    if ($row['Status'] =="Reserve" )
                              { 
                                   echo "<p><input type='hidden' name='reservationid' id='reservationid' value=".$row['Reservation_ID']. "> </p>";
                                    echo "<p><input type='hidden' name='customerid' id='cid' value=".$row['Customer_ID']."></p>";
                                    echo "<p><input type='hidden' name='addonpayable' id='addonpayable' value=".$row['AddonPayable']. "> </p>";
                                    echo "<p><input type='hidden' name='downpayment' id='downpyment' value=".$row['Downpayment']. "> </p>";  
                                    echo "<p><input type='hidden' name='payable' id='payable' value=".$row['Payable']. "> </p>";
                                echo "<p ><input type='button' name='edit' class='button2' id='action'  value='Check IN' onclick='validAction()'>";  
                              
                              }
                                                      
                              else if ($row['Status']=='Check In')
                              {      
                              echo "<p><input type='hidden' name='customerid' id='cID' value=".$row['Customer_ID']."></p>";
                              echo "<p><input type='hidden' name='addonpayable' id='addonpayable' value=".$row['Addonpayable']. "> </p>";
                              echo "<p><input type='hidden' name='downpayment' id='downpyment' value=".$row['Downpayment']. "> </p>";  
                              echo "<p><input type='hidden' name='payable' id='payable' value=".$row['Amount']. "> </p>";
                                                       //  echo "<p><input type='hidden' name='amount' id='tott'</p>";
                             echo "<input type='button' name='edit' class='button2' id='action' value='Check Out' onclick='validAction()' ></p>";    
                              }
                               else
                              {      
                                   echo "<p><input type='hidden' name='customerid' id='cID' value=".$row['Customer_ID']."> </p>";
                              echo "<p><input type='hidden' name='addonpayable' id='addonpayable' value=".$row['Addonpayable']. "> </p>";
                              echo "<p><input type='hidden' name='downpayment' id='downpayment' value=".$row['Downpayment']. "> </p>";  

                              echo "<p><input type='hidden' name='payable' id='payable' value=".$row['Amount']. "> </p>";
                                                       //  echo "<p><input type='hidden' name='amount' id='tott'</p>";  
                              }

                         mysqli_close($conn); }?> 
                        
                              
                        <!-- /.panel-heading -->
                   </div>
                   </div>   
            </div>
        
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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


    

</body>

</html>
