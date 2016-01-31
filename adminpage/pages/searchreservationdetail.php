<?php
 
 include('../../connection.php'); // wa ni labot
 
 
    if($_POST)
    {
    $q=isset($_POST['searchreservationdetail']) ? htmlspecialchars($_POST['searchreservationdetail']) : ""; // tanang special characters, kay i convert pareha ani "&#32;"
                         
    $sql = "select tblreservation.Reservation_ID,tblusers.FirstName, tblusers.LastName, tblusers.Contact,tblusers.Email,
            tblrooms.Room_ID,tblreservation.CategoryName,tblreservation.ReservationDate,
            tblreservation.Arrival,tblreservation.Departure,tblreservation.NumberofDay,tblreservation.Status,tblreservation.Payable,tblreservation.Confirmation
            FROM tblreservation INNER JOIN tblusers ON tblreservation.Customer_ID=tblusers.Customer_ID
            INNER JOIN tblrooms ON tblrooms.Room_ID=tblreservation.Room_ID 
            where tblusers.FirstName like ? Or tblusers.LastName like ?"; // ang mga ? kay i substitute sa $q
 
    $stmt = $conn->prepare($sql);
    if ($stmt) {
      $param = "%" . $q . "%";
      $stmt->bind_param("ss", $param, $param); // since duha man ka '?', duha pud ka $param, nya $param gigamit kay pareha raman nang duha
    
      $stmt->execute(); // run ang query
      $stmt->store_result(); // para ni sa num_rows
      $stmt->bind_result($reservationID, $first_name, $last_name, $contact, $email, $roomID, $roomtype, $date_reserve, $dateIn, $dateOut, $numbersofDays, $status,
                         $amount,$confirmation);
       // kaning bind_result, dapat sequence ang order sa pag SELECT statement.. tan-awa gani... pwede ra ikay magbuot sa ngalan, basta mag sunod na sila
      $daterreserve=date_create($date_reserve);
      $arrival=date_create($dateIn);
      $departure=date_create($dateOut);
      if ($stmt->num_rows > 0) {
        while ($stmt->fetch()) {
          // mas dali pa ni kaysa katong row['FirstName']
          echo "<tr>
          <td> ".$first_name." </td> 
          <td> ".$last_name. "</td>
          <td> ".$contact." </td> 
          <td> ".$email. "</td>
          <td> ".$roomID." </td>
          <td> ".$roomtype." </td>
          <td> ".date_format($daterreserve,'Y/m/d')." </td>
          <td> ".date_format($arrival,'Y/m/d')." </td>
          <td> ".date_format($departure,'Y/m/d')." </td>
          <td> ".$numbersofDays. "</td>
          <td> ".$status. "</td>
          <td> ".number_format($amount,2). "</td>

         <td><a href='../room/autoaddon.php?rid=".$reservationID."' class=' btn btn-success' >Add on</a></td>
         <td><a href='../room/roomtransferdetails.php?rid=".mysqli_real_escape_string($conn, $reservationID)."' value=".$roomID."' class='btn btn-danger transfer' >Transfer Room</a></td>";
           if ($status=="Pending")
            {
           echo "<td><a href='../CustomerReservation/transaction.php?confirmation=".$confirmation."'   class='btn btn-primary action'>Action</a></td>";
            }
           else if ($status=="Confirm" || $status=="Reserve/DownPayment" || $status=="Reserve")
           {
           echo "<td><a href='../CustomerReservation/transaction2.php?confirmation=".$confirmation."'  onclick='return UpdateCheckin()'  class='btn btn-primary action'>Check In</a></td>";
           } 
           else if ($status=="Check In" )
           {
          echo "<td><a href='../CustomerReservation/transaction2.php?confirmation=".$confirmation."' onclick=' return UpdateCheckout()'   class='btn btn-primary action'>Check Out</a></td>";
           }   
           else
            {
            echo "<td><a href='#'' class='btn btn-primary action'>Check Out</a></td>";
               
           }
           if ($status=="Cancelled" || $status=="Check Out")
          {
           echo "<td><a class='btn btn-danger transfer'><span>Cancel</span></a></td>"; 
          }
          else
          {
          echo "<td><a onclick='reserveDelete(".$reservationID.")' href='#' data-toggle='modal' data-target='#reservedelete' class='btn btn-danger transfer'><span>Cancel</span></a></td>";
          echo "</tr>";
        }
      }
      }
      else {
        echo "No records found";
      }
    }
    else
      echo mysqli_error($conn); // pang debug ra nimu
  }
  
?>