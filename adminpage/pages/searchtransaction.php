<?php
 
 include('../../connection.php'); // wa ni labot
 
 
if($_POST)
{
$q=isset($_POST['search']) ? htmlspecialchars($_POST['search']) : ""; // tanang special characters, kay i convert pareha ani "&#32;"
                         
      $sql = "select tblusers.FirstName,tblusers.LastName,tblreservation.Room_ID,tblreservation.CategoryName,tbltransaction.DateReserve,tbltransaction.DateIn,tbltransaction.DateOut,tblreservation.Downpayment,tbltransaction.Amount,tblreservation.Status,
              tbltransaction.UserInCharge,tblreservation.Confirmation,tbltransaction.Reservation_ID,tblreservation.AddonPayable
              from tbltransaction INNER JOIN tblreservation on tbltransaction.Reservation_ID=tblreservation.Reservation_ID 
              INNER JOIN tblusers on tbltransaction.Customer_ID=tblusers.Customer_ID
              where tblusers.FirstName like ? Or tblusers.LastName like ?"; // ang mga ? kay i substitute sa $q
 
    $stmt = $conn->prepare($sql);
    if ($stmt) {
      $param = "%" . $q . "%";
      $stmt->bind_param("ss", $param, $param); // since duha man ka '?', duha pud ka $param, nya $param gigamit kay pareha raman nang duha
    
      $stmt->execute(); // run ang query
      $stmt->store_result(); // para ni sa num_rows
      $stmt->bind_result($first_name, $last_name, $roomID, $categoryName, $date_reserve, $dateIn, $dateOut, $downpayment, $amount , $reservationStatus, $userInCharge , $confirmation, $reservertionID,$addonpayable);
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
          <td> ".$roomID." </td>
          <td> ".$categoryName." </td>
          <td> ".date_format($daterreserve,'Y/m/d')." </td>";
          if ($dateIn=="0000-00-00")
          {
            echo "<td>Not Yet Check In</td>";
          }
          else
          {
            echo " <td> ".date_format($arrival,'Y/m/d')." </td>";
          }
          if ($dateOut=="")
          {
            echo "<td>Not Yet Check Out</td>";
          }
          else
          {
            echo " <td> ".date_format($departure,'Y/m/d')." </td>";
          }
          echo 
          "<td> ".$downpayment. "</td>
           <td> ".$addonpayable. "</td>
           <td> ".number_format($amount,2). "</td>
           <td> ".$userInCharge." </td>
          <td> ".$reservationStatus." </td>";
          echo "<td><a href='../room/autoaddon.php?rid=".$reservertionID."' class=' btn btn-success' >Add on</a></td>
          <td><a href='../room/roomtransferdetails.php?rid=".mysqli_real_escape_string($conn, $reservertionID)."' class='btn btn-danger transfer' >Transfer Room</a></td>";
           if ($reservationStatus=="Pending")
          {
          echo "<td><a href='../CustomerReservation/transaction.php?confirmation=".$confirmation."'   class='btn btn-primary action'>Action</a></td>";
          }
           else if ($reservationStatus=="Confirmed" || $reservationStatus=="Reserve/DownPayment" || $reservationStatus=="Reserve")
          {
          echo "<td><a href='../CustomerReservation/transaction2.php?confirmation=".$confirmation."'  onclick='return UpdateCheckin()'  class='btn btn-primary action'>Check In</a></td>";
          } 
         else if ($reservationStatus=="Check In" )
          {
          echo "<td><a href='../CustomerReservation/transaction2.php?confirmation=".$confirmation."' onclick=' return UpdateCheckout()'   class='btn btn-primary action'>Check Out</a></td>";
          }   
         else
         {
          echo "<td><a href='#'' class='btn btn-primary action'>Check Out</a></td>";
         }
         if ($reservationStatus=="Cancelled" || $reservationStatus=="Check Out")
         {
          echo "<td><a class='btn btn-danger transfer'><span>Cancel</span></a></td>"; 
         }
         else
         {
        echo "<td><a onclick='reserveDelete(".$reservertionID.")' href='#' data-toggle='modal' data-target='#reservedelete' class='btn btn-danger transfer'><span>Cancel</span></a></td>";
        echo "</tr>";
         }
        }
      }
      else {
        echo "No records found";
      }
    }
  }
?>