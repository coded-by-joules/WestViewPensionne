
<?php
session_start();
include("../../connection.php");
    if ($_GET)
    { 
        $roomid=$_GET['roomid']; 
        $reservationid=$_SESSION['Reservation_ID'];
        $type=$_SESSION['type'];
        $Rate=$_SESSION['Rate'];
        $fromdate=$_SESSION['searchstartdate'];
        $todate=$_SESSION['searchenddate'];
        $start=$_SESSION['startdate'];
        $end=$_SESSION['enddate'];
        $numberofdays=$_SESSION['numberofdays'];
        $Numberofdays=$_SESSION['Numberofdays'];
        $Numberofdays2=$_SESSION['Numberofdays2'];
        $Numberofdays3=$_SESSION['Numberofdays3'];
        $payable=$_SESSION['payable'];
        $status=$_SESSION['status'];
        $from=$_SESSION['from'];
        $to=$_SESSION['to'];



        $sql = "select tblrooms.Room_ID, tblcategories.CategoryName, tblrooms.Category_ID, 
            tblrooms.Rate,tblrooms.Discount, tblrooms.Description, tblrooms.Status,tblrooms.No_adult,tblrooms.No_child,tblrooms.Date_Start,tblrooms.Date_End,tblrooms.Image 
            FROM tblrooms INNER JOIN 
            tblcategories ON tblrooms.Category_ID=tblcategories.Category_ID 
               WHERE tblrooms.Room_ID='$roomid'";
             $result = mysqli_query($conn, $sql);
             $row = mysqli_fetch_array($result);
             $promofrom=$row['Date_Start'];
             $promoto=$row['Date_End'];
             $rate=$row['Rate'];
             $percent=$row['Discount'];

             echo '<div class="form-group">
                   <img  src='.$row['Image'].' width="185" height="155" style="float:left; margin-bottom:5px;">
                   <label style="margin-left:10px;">Room Description : '.$row['Description'].'</label></br>';
                    if ($fromdate < $promoto && $todate > $promofrom  && $percent>0)
                   {
                    echo '<label style="margin-left:10px;">Discount : '.$row['Discount'].'</label></br>';
                   }
                   else
                   {
                       echo '';
                   }
                   echo '
                   <label style="margin-left:10px;">Room Number :<span id="roomid" name="categoryname">'.$row['Room_ID'].'</span></label></br>
                   <label style="margin-left:10px;">Room Type :<span id="roomtype" name="roomid">'.$row['CategoryName'].'</span></label></br>
                   <label style="margin-left:10px;">Room Rate :<span id="amount" name="rate">'.$row['Rate'].'</span></label></br>
                   <label style="margin-left:10px;">Date Transfer :<span id="sd" name="arrival">'.$fromdate.'</span> to </label><label><span style="margin-left:5px;" id="ed" name="departure">'.$todate.'</span></label></br>
                   <label style="display:none;"><span id="type" name="type">'.$type.'</span></label>
                   <label style="margin-left:10px;>Numbero of days : '.$Numberofdays.' day</label>';
                    if (($status=="Pending" || $status=="Reserve")  &&  $percent==0)
                    {

                        $totalamount=$rate * $Numberofdays ; //currentrate * currentdate + total of add on payable  
                   echo   '<label style="margin-left:10px;>Total Amount : '.$totalamount.'</label>';
                    }
                   else if (($status=="Pending" || $status=="Reserve") && $fromdate >= $promofrom && $todate <= $promoto  &&  $percent>0)
                    {

                       $percent=$row['Discount']; //10%
                        $totalrate=  $rate * $Numberofdays; //1000
                        $discount=($totalrate/100) * $percent ;//.04 percent/100
                        $finaltotal= $totalrate-$discount;  
                        $totalamount=$finaltotal;  
                       echo   '<label style="margin-left:10px;>Total Amount : '.$totalamount.'</label>';
                    }
                  else  if (($status=="Pending" || $status=="Reserve") && $fromdate < $promoto && $todate >$promofrom && $todate<=$promoto  && $percent>0)
                    {

                        $currentstartdate = \DateTime::createFromFormat('Y-m-d', $promofrom);
                        $currentenddate = \DateTime::createFromFormat('Y-m-d', $promoto);
                        $startdate=$currentstartdate->format('Y-m-d');
                        $enddate=$currentenddate->format('Y-m-d');
                        $from2=date_create($startdate);
                        $to2=date_create($enddate);
                        $diff2= date_diff($from, $from2);// gkuha ni nako xa arrival na date ug promo date start para xa pag total xa adlaw
                        $diff3= date_diff($from2, $to); // gkuha ni nako xa promo date start na date ug promo date end para xa pag total xa adlaw
                        $Numberofdays4 = $diff2->d; //days xa arrival ug  promo start date
                        $Numberofdays5= $diff3->d; //days xa promo start date ug  departure
                        $percent=$row['Discount'];
                        $totalrate=  $rate * $Numberofdays4; //1000
                        $promo=$rate * $Numberofdays5;
                        $discount=($promo/100) * $percent ;//.04 percent/100
                        $totaldiscount=$promo-$discount;  
                        $totalamount=$totalrate + $totaldiscount;

                       echo   '<label style="margin-left:10px;>Total Amount : '.$totalamount.'</label>';
                    }
                    if (($status=="Pending" || $status=="Reserve") && $fromdate < $promoto && $todate > $promofrom  && $percent>0)
                      {

                       $currentstartdate = \DateTime::createFromFormat('Y-m-d', $promofrom);
                       $currentenddate = \DateTime::createFromFormat('Y-m-d', $promoto);
                        $startdate=$currentstartdate->format('Y-m-d');
                        $enddate=$currentenddate->format('Y-m-d');
                        $from2=date_create($startdate);
                        $to2=date_create($enddate);
                        $diff2= date_diff($from, $from2);// gkuha ni nako xa arrival na date ug promo date start para xa pag total xa adlaw
                        $diff3= date_diff($to2, $to); // gikuha ni nako xa promo date end date ug departure para xa pagcompute xa adlaw
                        $diff4= date_diff($from2, $to2);// gikuha nu nako xa  promo date start ug promo date end para makuha nako ang total xa adlaw
                        $Numberofdays4 = $diff2->d;
                        $Numberofdays5 = $diff3->d;
                        $Numberofdays6 = $diff4->d;


                        $percent=$row['Discount']; //10%
                        $datestart=  $rate * $Numberofdays4; //1000
                        $dateend=$rate * $Numberofdays5;
                        $promo=$rate * $Numberofdays6;
                        $discount=($promo/100) * $percent ;//.04 percent/100
                        $totaldiscount=$promo-$discount;  
                        $totalamount=$datestart + $dateend + $totaldiscount;

                      echo   '<label style="margin-left:10px;>Total Amount : '.$totalamount.'</label>';
                      }
                      else if($fromdate == $start && $todate == $end && $Rate==$rate )
                      {
                          $totalamount=$payable + $addonpayable;
                         echo   '<label style="margin-left:10px;>Total Amount: '.$totalamount.' </label>';
                      }
                      else if ($start==$fromdate && $todate == $end && $percent==0) { // if ang date is same xa arrival ug departure mas gamay xa old departure or departure mas dako xa departure
                          $totalamount=$rate * $Numberofdays - $payable;
                          echo   '<label style="margin-left:10px;>Total Amount: '.$totalamount.' </label>';
                      }  
                      else if ($start==$fromdate && $todate == $end && $fromdate >= $promofrom && $todate <= $promoto  &&  $percent>0) { // if ang date is same xa arrival ug departure mas gamay xa old departure or departure mas dako xa departure
                     
                        $percent=$row['Discount']; //10%
                        $totalrate=  $rate * $Numberofdays; //1000
                        $discount=($totalrate/100) * $percent ;//.04 percent/100
                        $finaltotal= $totalrate-$discount;  
                        $totalamount=$finaltotal + $payable ; 
                       echo   '<label style="margin-left:10px;>Total Amount: '.$totalamount.' </label>';
                      } 
                        else if ($start==$fromdate && $todate == $end && $fromdate < $promoto && $todate >$promofrom && $todate<=$promoto  && $percent>0) { // if ang date is same xa arrival ug departure mas gamay xa old departure or departure mas dako xa departure
                        $currentstartdate = \DateTime::createFromFormat('Y-m-d', $promofrom);
                        $currentenddate = \DateTime::createFromFormat('Y-m-d', $promoto);
                        $startdate=$currentstartdate->format('Y-m-d');
                        $enddate=$currentenddate->format('Y-m-d');
                        $from2=date_create($startdate);
                        $to2=date_create($enddate);
                        $diff2= date_diff($from, $from2);// gkuha ni nako xa arrival na date ug promo date start para xa pag total xa adlaw
                        $diff3= date_diff($from2, $to); // gkuha ni nako xa promo date start na date ug promo date end para xa pag total xa adlaw
                        $Numberofdays4 = $diff2->d; //days xa arrival ug  promo start date
                        $Numberofdays5= $diff3->d; //days xa promo start date ug  departure
                        
                        $percent=$row['Discount']; //10%
                        $totalrate=  $rate * $Numberofdays4; //1000
                        $promo=$rate * $Numberofdays5;
                        $discount=($promo/100) * $percent ;//.04 percent/100
                        $totaldiscount=$promo-$discount;  
                        $totalamount=$totalrate + $totaldiscount + $payable ;

                       echo   '<label style="margin-left:10px;>Total Amount: '.$totalamount.' </label>';
                      } 
                     else if ($start==$fromdate && $todate == $end && $fromdate < $promoto && $todate > $promofrom  && $percent>0) { // if ang date is same xa arrival ug departure mas gamay xa old departure or departure mas dako xa departure
                       
                        $currentstartdate = \DateTime::createFromFormat('Y-m-d', $promofrom);
                        $currentenddate = \DateTime::createFromFormat('Y-m-d', $promoto);
                        $startdate=$currentstartdate->format('Y-m-d');
                        $enddate=$currentenddate->format('Y-m-d');
                        $from2=date_create($startdate);
                        $to2=date_create($enddate);
                        $diff2= date_diff($from, $from2);// gkuha ni nako xa arrival na date ug promo date start para xa pag total xa adlaw
                        $diff3= date_diff($to2, $to); // gikuha ni nako xa promo date end date ug departure para xa pagcompute xa adlaw
                        $diff4= date_diff($from2, $to2);// gikuha nu nako xa  promo date start ug promo date end para makuha nako ang total xa adlaw
                        $Numberofdays4 = $diff2->d;
                        $Numberofdays5 = $diff3->d;
                        $Numberofdays6 = $diff4->d;

                        $percent=$row['Discount']; //10%
                        $datestart=  $rate * $Numberofdays4; //1000
                        $dateend=$rate * $Numberofdays5;
                        $promo=$rate * $Numberofdays6;
                        $discount=($promo/100) * $percent ;//.04 percent/100
                        $totaldiscount=$promo-$discount;  
                        $totalamount=$datestart + $dateend + $totaldiscount  + $payable;          
                        echo   '<label style="margin-left:10px;>Total Amount: '.$totalamount.' </label>';
                      }                
                      else if ($todate==$end && $fromdate > $start &&  $percent==0) {
                        $totalrate2=$Rate * $Numberofdays2;
                        $decreaseamount=$payable-$Rate;
                        $nowrate=$rate * $Numberofdays;
                        $totalamount=$decreaseamount+$nowrate ;
                        echo   '<label style="margin-left:10px;>Total Amount : '.$totalamount.' </label>';
                      }
                      else if ($todate==$end && $fromdate > $start && $fromdate >= $promofrom && $todate <= $promoto  &&  $percent>0) {
                        $percent=$row['Discount']; //10%
                        $totalrate=$Rate * $Numberofdays2;
                        $decreaseamount=$payable-$totalrate;
                        $nowrate=$rate * $Numberofdays;
                        $discount=($nowrate/100) * $percent ;//.04 percent/100
                        $finaltotal= $nowrate-$discount;  
                        $totalamount=$decreaseamount+$finaltotal;
                        echo   '<label style="margin-left:10px;>Total Amount : '.$totalamount.' </label>';
                       }

                      else if ($todate==$end && $fromdate > $start && $fromdate < $promoto && $todate >$promofrom && $todate<=$promoto  && $percent>0) {
                   
                        $currentstartdate = \DateTime::createFromFormat('Y-m-d', $promofrom);
                        $currentenddate = \DateTime::createFromFormat('Y-m-d', $promoto);
                        $startdate=$currentstartdate->format('Y-m-d');
                        $enddate=$currentenddate->format('Y-m-d');
                        $from2=date_create($startdate);
                        $to2=date_create($enddate);
                        $diff2= date_diff($from, $from2);// gkuha ni nako xa arrival na date ug promo date start para xa pag total xa adlaw
                        $diff3= date_diff($from2, $to); // gkuha ni nako xa promo date start na date ug promo date end para xa pag total xa adlaw
                        $Numberofdays4 = $diff2->d; //days xa arrival ug  promo start date
                        $Numberofdays5 = $diff3->d; //days xa promo start date ug  departure
                        
                        $percent=$row['Discount']; //10%
                        $totalrate=$Rate * $Numberofdays2;
                        $decreaseamount=$payable-$totalrate;
                        $nowrate=$rate * $Numberofdays4;
                        $promo=$rate * $Numberofdays5;
                        $discount=($promo/100) * $percent ;//.04 percent/100
                        $totaldiscount=$nowrate-$discount ;
                        $totalamount=$decreaseamount+ $nowrate + $totaldiscount;
                        echo   '<label style="margin-left:10px;>Total Amount : '.$totalamount.' </label>';
                      }
                      else if ($todate==$end && $fromdate > $start && $fromdate < $promoto && $todate > $promofrom  && $percent>0) {

                        $currentstartdate = \DateTime::createFromFormat('Y-m-d', $promofrom);
                        $currentenddate = \DateTime::createFromFormat('Y-m-d', $promoto);
                        $startdate=$currentstartdate->format('Y-m-d');
                        $enddate=$currentenddate->format('Y-m-d');
                        $from2=date_create($startdate);
                        $to2=date_create($enddate);
                        $diff2= date_diff($from, $from2);// gkuha ni nako xa arrival na date ug promo date start para xa pag total xa adlaw
                        $diff3= date_diff($to2, $to); // gikuha ni nako xa promo date end date ug departure para xa pagcompute xa adlaw
                        $diff4= date_diff($from2, $to2);// gikuha nu nako xa  promo date start ug promo date end para makuha nako ang total xa adlaw
                        $Numberofdays4 = $diff2->d;
                        $Numberofdays5 = $diff3->d;
                        $Numberofdays6 = $diff4->d;

                        $percent=$row['Discount']; //10%
                        $totalrate=$Rate * $Numberofdays2;
                        $decreaseamount=$payable-$totalrate;
                        $datestart=  $rate * $Numberofdays4; //1000
                        $dateend=$rate * $Numberofdays5;
                        $promo=$rate * $Numberofdays6;
                        $discount=($promo/100) * $percent ;//.04 percent/100
                        $totaldiscount=$promo-$discount;  
                        $totalamount=$decreaseamount + $datestart + $dateend + $totaldiscount;
                        echo   '<label style="margin-left:10px;>Total Amount : '.$totalamount.' </label>';
                        }
                      else if ($end<$todate && $fromdate > $start && $fromdate >= $promofrom && $todate <= $promoto  &&  $percent>0) {
                        $percent=$row['Discount']; //10%
                        $totalrate=$Rate * $Numberofdays2;
                        $decreaseamount=$payable-$totalrate;
                        $nowrate=$rate * $Numberofdays;
                        $discount=($nowrate/100) * $percent ;//.04 percent/100
                        $finaltotal= $nowrate-$discount;  
                        $totalamount=$decreaseamount+$finaltotal;
                        echo   '<label style="margin-left:10px;>Total Amount : '.$totalamount.' </label>';
                       }

                      else if ($end < $todate && $fromdate > $start && $fromdate < $promoto && $todate >$promofrom && $todate<=$promoto  && $percent>0) {
                   
                        $currentstartdate = \DateTime::createFromFormat('Y-m-d', $promofrom);
                        $currentenddate = \DateTime::createFromFormat('Y-m-d', $promoto);
                        $startdate=$currentstartdate->format('Y-m-d');
                        $enddate=$currentenddate->format('Y-m-d');
                        $from2=date_create($startdate);
                        $to2=date_create($enddate);
                        $diff2= date_diff($from, $from2);// gkuha ni nako xa arrival na date ug promo date start para xa pag total xa adlaw
                        $diff3= date_diff($from2, $to); // gkuha ni nako xa promo date start na date ug promo date end para xa pag total xa adlaw
                        $Numberofdays4 = $diff2->d; //days xa arrival ug  promo start date
                        $Numberofdays5 = $diff3->d; //days xa promo start date ug  departure

                        $percent=$row['Discount']; //10%
                        $totalrate=$Rate * $Numberofdays2;
                        $decreaseamount=$payable-$totalrate;
                        $nowrate=$rate * $Numberofdays4;
                        $promo=$rate * $Numberofdays5;
                        $discount=($promo/100) * $percent ;//.04 percent/100
                        $totaldiscount=$nowrate-$discount; 
                        $totalamount=$decreaseamount+ $nowrate + $totaldiscount;
                        echo   '<label style="margin-left:10px;>Total Amount : '.$totalamount.' </label>';
                      }
                      else if ($end < $todate && $fromdate > $start && $fromdate < $promoto && $todate > $promofrom  && $percent>0) {

                        $currentstartdate = \DateTime::createFromFormat('Y-m-d', $promofrom);
                        $currentenddate = \DateTime::createFromFormat('Y-m-d', $promoto);
                        $startdate=$currentstartdate->format('Y-m-d');
                        $enddate=$currentenddate->format('Y-m-d');
                        $from2=date_create($startdate);
                        $to2=date_create($enddate);
                        $diff2= date_diff($from, $from2);// gkuha ni nako xa arrival na date ug promo date start para xa pag total xa adlaw
                        $diff3= date_diff($to2, $to); // gikuha ni nako xa promo date end date ug departure para xa pagcompute xa adlaw
                        $diff4= date_diff($from2, $to2);// gikuha nu nako xa  promo date start ug promo date end para makuha nako ang total xa adlaw
                        $Numberofdays4 = $diff2->d;
                        $Numberofdays5 = $diff3->d;
                        $Numberofdays6 = $diff4->d;

                        $percent=$row['Discount']; //10%
                        $totalrate=$Rate * $Numberofdays2;
                        $decreaseamount=$payable-$totalrate;
                        $datestart=  $rate * $Numberofdays4; //1000
                        $dateend=$rate * $Numberofdays5;
                        $promo=$rate * $Numberofdays6;
                        $discount=($promo/100) * $percent ;//.04 percent/100
                        $totaldiscount=$promo-$discount;  
                        $totalamount=$decreaseamount + $datestart + $dateend + $totaldiscount;

                        echo   '<label style="margin-left:10px;>Total Amount : '.$totalamount.' </label>';
                        }     
                        else 
                        {
                        $totalrate=$Rate * $Numberofdays2;
                        $decreaseamount=$payable-$totalrate;
                        $nowrate=$rate * $Numberofdays;
                        $totalamount=$decreaseamount+$nowrate;
                       echo   '<label style="margin-left:10px;>Total Amount : '.$totalamount.' </label>';

                        }

                        $_SESSION['totalamount']=$totalamount;
                        $_SESSION['percent']=$percent;
                        $_SESSION['promofrom']=$promofrom;
                        $_SESSION['promoto']=$promoto;
                        $_SESSION['start']=$start;
                        $_SESSION['end']=$end;

                  echo ' </div>';

    }

?>