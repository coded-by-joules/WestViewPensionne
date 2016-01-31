                    <?php
                    include('../../connection.php');
                      $sql = "SELECT * from tblreservationnotify where Unread = 1";
                      $result = $conn->query($sql);
                      $row = $result->fetch_assoc();
                      $count = $result->num_rows;
                      echo $count;
                      $conn->close();

                    ?>