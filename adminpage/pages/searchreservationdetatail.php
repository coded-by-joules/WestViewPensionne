<?php
session_start();
error_reporting(0);
include("../../connection.php");
    if ($_POST)
    { 
    $fromdate=$_POST['fromdate']; 
    $todate=$_POST['todate']; 

    $searchstartdate = \DateTime::createFromFormat('d/m/Y', $fromdate)->format('Y-m-d');
    $searchenddate= \DateTime::createFromFormat('d/m/Y', $todate)->format('Y-m-d');



                   $sql = "select tblreservation.Reservation_ID, tblreservation.Confirmation,tblusers.FirstName, tblusers.LastName, tblusers.Contact,tblusers.Email,
                           tblrooms.Room_ID,tblreservation.CategoryName,tblreservation.ReservationDate,
                           tblreservation.Arrival,tblreservation.Departure,tblreservation.Payable,tblreservation.NumberofDay,tblreservation.Status,tblreservation.AddonPayable,tblreservation.Downpayment FROM tblreservation INNER JOIN tblusers
                           ON tblreservation.Customer_ID=tblusers.Customer_ID
                           INNER JOIN tblrooms ON tblrooms.Room_ID=tblreservation.Room_ID where tblreservation.Arrival='".$searchstartdate."' AND 
                           tblreservation.Departure='".$searchenddate."'";
           
                                     $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
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
                                              }
                                        
                                    } 
                                      
                                     else
                                     {
                                        echo "";
                    
                                   }
                                                    mysqli_close($conn);

         
       ?>                      

