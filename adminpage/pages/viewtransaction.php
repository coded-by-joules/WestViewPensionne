<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Westview Pension House - Cebu</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../hotelpage/css/bootstrap.min.css" rel="stylesheet">
    <!--Icon-->
     <link href="../../hotelpage/images/westview-icon.png" type="image/png" rel="icon">
    <!-- Custom CSS -->
    <link href="../../hotelpage/css/modern-business.css" rel="stylesheet">
    <link href="../../hotelpage/css/westview.css" rel="stylesheet">
    <link href="../../hotelpage/css/bootstrap-social/bootstrap-social.css" rel="stylesheet">
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../hotelpage/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../dist/js/confirmbox.js"></script>
        <script src="../bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>







</head>
<body>
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
                            <a href="../../index.php">
                                <img id="header-logo" src="../../hotelpage/images/westview.png">
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
 
                     <li>
                        <h4 style="color:#fff">Westview Pension House - Cebu  <i class="fa fa-phone"> </i> (+64) 1234 567 890 </h4 >
                    </li>
       
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

 <form>
 <div class="container" style="margin-top:65px;"><div class="row"><div class="col-lg-12">
 <center><h1 class="page-header">Sales Report</h1></div></center>
</div>
</form>
 <a href='#' class='btn btn-primary action' onclick="Print()">Download</a><br/><br/>
 <div style="font-size:18px;">
 <?php include("../../connection.php");
  if (isset($_GET['confirmation'])){ 
   $confirmation=$_GET['confirmation'];
   $sql = "select tblreservation.Confirmation,tblusers.FirstName,tblusers.LastName
          FROM tblreservation 
          INNER JOIN tblusers ON tblreservation.Customer_ID=tblusers.Customer_ID
          where tblreservation.Confirmation='".$confirmation."'";
     $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
     while ($row = mysqli_fetch_array($result)) {
        $fname=$row["FirstName"];
        $lname=$row["LastName"];?>


<span>Company Name : Westviewpenssione House</span><br/>
<span>Contact Number : (+64) 1234 567 890 </span>
 </div>
  <div style="font-size:18px; margin-left:400px; margin-top:-50px;">
<span>Customer Confirmation Code : <?php echo $confirmation; ?></span><br/>
<span>Customer Name : <?php echo ucfirst($fname) ." ". ucfirst($lname); ?> </span>
<?php }} mysqli_close($conn); ?>
 </div>
</br>
              <div class="row">
                <div class="col-lg-13">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Guest Reservation or current Transfer Room
                        </div>

                   <div class="panel-body">
                   <div class="dataTable_wrapper" style="overflow:auto">
                               <table class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                    <thead>
                                             <th>Room Number</th>
                                             <th>CategoryName</th>
                                             <th>Rate</th>
                                             <th>Check In</th>
                                             <th>Check Out</th>
                                             <th>Day/s</th>
                                             <th>Current Amount</th>


                                        </tr>
                                    </thead>
                                    <tbody id="result">
                                    <?php 
                                     include("../../connection.php");
                                    if (isset($_GET['confirmation'])){ 
  
                                   $confirmation=$_GET['confirmation'];
                         
                                    $sql = "select tblreservation.Reservation_ID, tblreservation.Confirmation,tblusers.FirstName, tblusers.LastName,
                                            tblrooms.Room_ID,tblreservation.CategoryName,tblreservation.ReservationDate,tblrooms.Rate,
                                            tblreservation.Arrival,tblreservation.Departure,tblreservation.Payable,tblreservation.NumberofDay
                                            FROM tblreservation INNER JOIN tblusers
                                            ON tblreservation.Customer_ID=tblusers.Customer_ID
                                            INNER JOIN tblrooms ON tblrooms.Room_ID=tblreservation.Room_ID where tblreservation.Confirmation='".$confirmation."' "; 

                                      $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                                      $dresult = $conn->query($sql);
                                    if ($dresult->num_rows>0) {
                                        while ($row = $dresult->fetch_assoc()) {
                                            $daterreserve=date_create($row['ReservationDate']);
                                            $arrival=date_create($row['Arrival']);
                                            $departure=date_create($row['Departure']);

                                                echo "<tr>
                                                <td> ".$row["Room_ID"]." </td>
                                                <td> ".$row["CategoryName"]." </td>
                                                <td> ".number_format($row["Rate"],2)." </td>
                                                <td> ".date_format($arrival,'Y/m/d')." </td>
                                                <td> ".date_format($departure,'Y/m/d')." </td>
                                                <td> ".$row["NumberofDay"]." </td>
                                                <td> ".$row["Payable"]." </td>";
                                                }
                                            }
                                                mysqli_close($conn);
                                        }
                                    
                                            ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>

                      <div class="col-lg-13" >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Guest previous Check In And Check Out
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper" >
                                <table class="table table-\striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Room Number</th>
                                            <th>CategoryName</th>
                                            <th>Rate</th>
                                            <th>Check In And Check Out</th>
                                            <th>Number of Day/s</th>
                                            <th>Previous Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    include("../../connection.php");
                                    $sql = "select * from tblroomtransfer inner JOIN tblreservation on tblroomtransfer.Reservation_ID=tblreservation.Reservation_ID where tblreservation.Confirmation='".$confirmation."'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows>0) {
                                        while ($row = $result->fetch_array()) {
                                            echo "<tr>
                                              <td> ".$row["previousRoomnumber"]. "</td>
                                              <td> ".$row["previousCategoryname"]." </td>
                                              <td> ".$row["previousRate"]. "</td>
                                              <td> ".$row["previousInOut"]. "</td>
                                              <td> ".$row["Numbersofday"]. "</td>
                                              <td> ".$row["previousAmount"]. "</td> 
                                            </tr>";
                                        }
                                        mysqli_close($conn);
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            </div>


          
                <div class="col-lg-5"  style="margin-left:-15px; width:500px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Guest Add ons
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper" style="overflow: auto">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="width:400px;">
                                    <thead>
                                        <tr>
                                            <th>Items</th>
                                            <th>Purchase</th>
                                            <th>Price</th>
                                            <th>Amount</th>
                                     
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    include("../../connection.php");
                                    $sql = "select tbladdonreserve.addonid,tbladdonreserve.Reservation_ID, tblusers.FirstName,tblusers.LastName,tbladdonreserve.Item,tbladdonreserve.quantity,tbladdonreserve.UserInCharge,tbladdonreserve.price,tbladdonreserve.Amount 
                                           from tbladdonreserve 
                                          inner JOIN tblusers ON tbladdonreserve.Customer_ID=tblusers.Customer_ID
                                          inner JOIN tblreservation ON tbladdonreserve.Reservation_ID=tblreservation.Reservation_ID where tblreservation.Confirmation='".$confirmation."'";
                                    $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                                    $result = $conn->query($sql);
                                    if ($result->num_rows>0) {
                                        while ($row = $result->fetch_array()) {
                                            echo "<tr>
                                              <td> ".$row["Item"]." </td>
                                              <td> ".$row["quantity"]. "</td>
                                              <td> ".$row["price"]. "</td>
                                              <td> ".number_format($row["Amount"],2). "</td>
                                            </tr>";
                                        }
                                        mysqli_close($conn);
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                           </div>
                           </div>
                            </div>
                          



                            <div style="margin-left:500px; margin-top:40px; font-weight:bold; font-size:15px;">
                                <?php include("../../connection.php");

                                    if (isset($_GET['confirmation'])){ 
  
                                   $confirmation=$_GET['confirmation'];
                         
                                    $sql = "select tblreservation.Payable,tblreservation.AddonPayable,tblreservation.Downpayment
                                            FROM tblreservation 
                                            INNER JOIN tblusers ON tblreservation.Customer_ID=tblusers.Customer_ID
                                            where tblreservation.Confirmation='".$confirmation."'";
     

                               

                                            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                             while ($row = mysqli_fetch_array($result)) {?>

                                             
        
                                <label>Total Rate : <span class="total"><?php echo $row["Payable"];?>.00</span></label><br/>
                                
                              <label>Total Add ons : <span class="total"><?php echo $row["AddonPayable"];?>.00</span></label></br>

                              <label>Reservation Fee: <span class="downpayment"><?php echo $row["Downpayment"];?>.00</span></label></br>

                                   <?php }} mysqli_close($conn);?>
                                <label>Total Due : <span id="totalall"></span></label>
                                 
                             </div>   

         <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>




     <script type="text/javascript">
     $('.total,.downpayment').each(function () {
    var result = 0;

    $('.total').each(function () {
        result +=+$(this).text();
    });
      var resultw = 0;
     $('.downpayment').each(function () {
        resultw +=+$(this).text();

    });
        var total=result - resultw;

  document.getElementById("totalall").innerHTML = total.toFixed(2);
}); 
    </script>

    <script>
function Print() {
    window.print();
}
</script>




</body>
</html>