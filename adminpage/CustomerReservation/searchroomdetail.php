
<?php
session_start();
error_reporting(0);
include("../../connection.php");


    if ($_POST)
    { 
    $arrival=$_POST['searchstartdate']; 
    $departure=$_POST['searchenddate']; 
    $reservationid=$_SESSION['Reservation_ID'];
    $type=$_SESSION['type'];


    $searchstartdate = \DateTime::createFromFormat('d/m/Y', $arrival);
    $searchenddate= \DateTime::createFromFormat('d/m/Y', $departure);

    $fromdate=$searchstartdate->format('Y-m-d');
    $todate=$searchenddate->format('Y-m-d');
    $from=date_create($fromdate);
    $to=date_create($todate);
    $diff= date_diff($from, $to); 
    $Numberofdays = $diff->d;//output



          $sql = "select tblusers.FirstName,tblusers.LastName,tblrooms.Rate,tblreservation.Arrival,tblreservation.Departure,tblreservation.AddonPayable,tblreservation.NumberofDay,tblreservation.Downpayment,tblreservation.Status,tblreservation.Payable,tblreservation.transaction,tblreservation.Room_ID,tblreservation.CategoryName FROM tblreservation 
          inner join tblrooms on tblreservation.Room_ID=tblrooms.Room_ID
          inner join tblusers on tblreservation.Customer_ID=tblusers.Customer_ID
          WHERE tblreservation.Reservation_ID='$reservationid'";
             $result = mysqli_query($conn, $sql);
             $row = mysqli_fetch_array($result);
                $fname=$row['FirstName'];
                $lname=$row['LastName'];
                $start = $row['Arrival'];
                $end= $row['Departure'];
                $status=$row['Status'];
                $currentstartdate = \DateTime::createFromFormat('Y-m-d', $start);
                $currentenddate = \DateTime::createFromFormat('Y-m-d', $end);

                $startdate=$currentstartdate->format('Y-m-d');
                $enddate=$currentenddate->format('Y-m-d');

                $from2=date_create($startdate);
                $to2=date_create($enddate);
                $diff2= date_diff($from2, $from);// compute xa old arrival ug CURRENT arrival
                $Numberofdays2 = $diff2->d; // output

                $diff3= date_diff($to2, $to); // compute xa  old departure ug current departure
                $Numberofdays3 = $diff3->d;

                 $Rate=$row['Rate'];

                 $numberofdays=$row['NumberofDay'];
                 $payable = $row['Payable'];
                 $downpayment=$row['Downpayment'];
                 $addonpayable=$row['AddonPayable']; 
                 $transaction=$row['transaction'];
                 $roomnumber=$row['Room_ID'];
                 $roomtype=$row['CategoryName'];

    


               if ($fromdate < $start  || $todate<$fromdate)
              {
              echo '<script>alert("Your current arrival date is less than to old arrival . please choose the right date");</script>';
              echo '<script>window.location="../room/roomtransferdetails.php?rid="'.$reservationid.'"";</script>';
              }
              else if ($todate < $end)
              {
              echo '<script>alert("your current departure is less than  to old Departure.please choose the right date");</script>';
              echo '<script>window.location="../room/roomtransferdetails.php?rid="'.$reservationid.'"";</script>';
              }
              else if ($fromdate == $todate)
              {
              echo '<script>alert("Invalid Date .please choose the right date");</script>';
              echo '<script>window.location="../room/roomtransferdetails.php?rid="'.$reservationid.'"";</script>';
              }
                        
           else
           { 

            $sql = "select tblrooms.Room_ID, tblcategories.CategoryName, tblrooms.Category_ID, 
            tblrooms.Rate,tblrooms.Discount, tblrooms.Description, tblrooms.Status,tblrooms.No_adult,tblrooms.No_child,tblrooms.Date_Start,tblrooms.Date_End,tblrooms.Image 
            FROM tblrooms INNER JOIN 
            tblcategories ON tblrooms.Category_ID=tblcategories.Category_ID WHERE Room_ID NOT IN
            (select Room_ID from tblreservation WHERE Reservation_ID is null
            OR Departure > '".$fromdate."' AND Arrival < '".$todate."' AND tblreservation.Status!='Cancelled' AND tblreservation.Status!='Check Out'
              Union
            select Room_ID from tblwalkins WHERE Customer_ID is null
            OR Departure >= '".$fromdate."' AND Arrival <= '".$todate."') ORDER by tblrooms.Date_Start ASC";

  
           
                                     $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

                                    while($row=mysqli_fetch_assoc($result)) {
                                    $arrival=date_create($row['Date_Start']);
                                    $departure=date_create($row['Date_End']);    
                                    $promofrom=$row['Date_Start'];
                                    $promoto=$row['Date_End'];
                                  ?>
                                <div class='table-responsive' style='overflow:auto'>
                                <table class='table table-striped'>

                                     <tbody><tr>
                                     <td><?php echo $row["Room_ID"]; ?></td>
                                     <td><?php echo $row["CategoryName"]; ?></td>
                                     <td><?php echo $row["Rate"]; ?></td>
                                     <?php
                                    if ($fromdate < $promoto && $todate > $promofrom  && $row['Discount']>0)
                                     {    
                                     ?> 
                                     <td><?php echo $row["Discount"]; ?></td>
                                    <?php }         
                                     else
                                      {?>                
                                      <td><?php echo "No Set Promo" ;?></td>
                                     <?PHP }?>
                                     <td><?php echo $row["Description"]; ?></td>
                                     <td><?php echo $row["Status"]; ?></td>
                                     <td><?php echo $row["No_adult"]; ?></td>
                                     <td><?php echo $row["No_child"]; ?></td>
                                     <?php
                                     if ($fromdate < $promoto && $todate > $promofrom  && $row['Discount']>0)
                                     {
                                      ?>
                                      <td><?php echo date_format($arrival,"Y/m/d");?></td>
                                     <?php }         
                                     else
                                      {?>                
                                      <td><?php echo "No Set Promo" ;?></td>
                                     <?PHP }?>
                                     <?php
                                     if ($fromdate < $promoto && $todate > $promofrom  && $row['Discount']>0)
                                     {
                                      ?>
                                      <td><?php echo date_format($departure,"Y/m/d");?></td>
                                     <?php }         
                                     else
                                      {?>                
                                      <td><?php echo "No Set Promo" ;?></td>
                                     <?PHP }?>

                                    <td><a rel="facebox"  href="editpic.php?id=<?php echo $row["Room_ID"];?>"><img id="imagelist" style="border: thin solid silver;float: left;padding: 5px;width: 70px;height: 70px;margin: 0 5px 0 0;" src=<?php echo $row['Image']; ?>></td>
                                     <td><button class='transferroom' style='border-radius: 4px; color: #000; background-image: linear-gradient(to bottom, #FBB633, #F89516); border-color: #FDD680; height:40px;' data-toggle='modal' data-target='#transferroom' data-roomid="<?php echo $row['Room_ID'];?>">Transfer</button></td>
                                     </tr></tbody></table>
                                     </div>
                                     </div>
                    <?php 
                          $_SESSION['status']=$status;
                          $_SESSION['searchstartdate']=$fromdate;
                          $_SESSION['searchenddate']=$todate;
                          $_SESSION['fname']=$fname;
                          $_SESSION['lname']=$lname;
                          $_SESSION['status']=$status;
                          $_SESSION['startdate']=$start;
                          $_SESSION['enddate']=$end;
                          $_SESSION['numberofdays']=$numberofdays;
                          $_SESSION['Numberofdays']=$Numberofdays;
                          $_SESSION['Numberofdays2']=$Numberofdays2;
                          $_SESSION['Numberofdays3']=$Numberofdays3;
                          $_SESSION['payable']=$payable;
                          $_SESSION['downpayment']=$downpayment;
                          $_SESSION['addonpayable']=$addonpayable;
                          $_SESSION['Rate']=$Rate;
                          $_SESSION['from']=$from;
                          $_SESSION['to']=$to;
                          $_SESSION['transaction']=$transaction;
                          $_SESSION['roomnumber']=$roomnumber;
                          $_SESSION['roomtype']=$roomtype;


                     }}}?>
 

                            <div class="modal fade" id="transferroom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel=<?php echo $row['Room_ID'];?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Room Details</h4>
                                        </div>
                                        <div class="modal-body">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button type="button" onClick="validTransfer()" data-dismiss="modal"  class="btn btn-primary">Yes</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                                
                          </div>
