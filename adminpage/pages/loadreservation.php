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
                                                <td> ".number_format($row["Payable"],2) . "</td>

                                                <td><a href='../room/autoaddon.php?rid=".$row['Reservation_ID']."' class=' btn btn-success' >Add on</a></td>
                                                <td><a href='../room/roomtransferdetails.php?rid=".mysqli_real_escape_string($conn, $row['Reservation_ID'])."' value=".$row['Room_ID']."' class='btn btn-danger transfer' >Transfer Room</a></td>";
                                                 if ($row['Status']=="Pending")
                                                {
                                                echo "<td><a href='../CustomerReservation/transaction.php?confirmation=".$row['Confirmation']."'   class='btn btn-primary action'>Action</a></td>";
                                                }
                                                else if ($row['Status']=="Confirm" || $row['Status']=="Reserve/DownPayment" || $row['Status']=="Reserve")
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
                                                }
                                                $arrival=$row['Arrival'];
                                                $departure=$row['Departure'];
                                        
                                    } mysqli_close($conn);
                                            ?>