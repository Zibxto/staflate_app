<?php 
include 'header.php';
?>


<style>
.tooltip {
  position: relative;
  display: inline-block;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 140px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  position: absolute;
  z-index: 1;
  bottom: 150%;
  left: 50%;
  margin-left: -75px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}

table {
    width: 100%;
    text-align: center;
    max-height: 100vh;
    overflow-y: scroll;
}

tr {
    border: solid grey 1px;
}

tr:hover {
    background-color: #0fa797;
}

td {
    padding: 6px 0px 6px 0px;
}
</style>

                            
                <!-- page inner -->

            <div class="page-inner">
                <div class="page-title">
                    <h3>Referral</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>

                

                <div id="main-wrapper">
                    <div class="row">

                        <div class="col-lg-6 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                  <div class="card">
                                    <div class="card-header">
                                        <p>Share your referral link or code to your friends and family to earn 50%  when they sign up.</p>
                                    </div>
                                    <div class="card-body">

                                        <input class="h5" type="text" value="https://metareels.pro/index.php?refer=<?= $row['referral_code']; ?>" id="myInput" style="border: none; width: 100%;">

                                        <div>
                                        <button class="btn btn-success btn-block" onclick="myFunction()" onmouseout="outFunc()">
                                          Copy text
                                          </button>
                                        </div>
                                    </div>          
                                  </div>

                                  <hr>

                                  <div style="margin-top:5%; background-color:#000003; border-radius: 16px 6px 6px 0px; padding: 10px; color:#f2f2f2" class="card">
                                    <div class="card-header">
                                        <h3>Referral Bonus</h3>
                                    </div>
                                    <div class="card-body">
                                        <table>
                                            <?php
                                            $count = 0; //to get the number of referrers
                                            $ref_code = $row['referral_code'];
                                          $ref_q = query("SELECT * FROM users WHERE referrer='$ref_code' ORDER BY id DESC");
                                          confirm($ref_q);

                                          if (mysqli_num_rows($ref_q) > 0) {
                                          while ($ref_row = fetch_array($ref_q)) {
                                            ?>
                                            <tr>
                                                <td><?= $ref_row['firstname'] . " " . $ref_row['lastname']; ?></td>
                                                
                                                <td>
                                                <?php
                                                $id = $ref_row['id'];
                                                $s_q = query("SELECT status FROM payments WHERE user_id='$id'");
                                                confirm($s_q);
                                                if (mysqli_num_rows($s_q) > 0) {
                                                    // $sq_row = fetch_array($s_q);
                                                        echo "Earned";
                                                        $count++;
                                                //update all-time-earning on users table
                                                 $all_time_earning = $count * 7.5;
                                                 $acct_bal = $count * 7.5;
                                                 
                                                 $ate_q = query("UPDATE users SET all_time_earning='$all_time_earning', acct_bal='$acct_bal' WHERE id='$session_id'");
                                                 confirm($ate_q);
                                                        } else {
                                                            echo "Pending";
                                                        }
                                                    ?>
                                                </td>
                                                
                                            </tr>
                                            <?php

                                             }
                                             } else {
                                                echo "<h5>You have not referred anyone</h5>";
                                             }
                                           ?>
                                        </table>
                                    </div>
                                      
                                  </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- Row -->

                </div><!-- Main Wrapper -->


                <div class="page-footer">
                    <p class="no-s"><?php echo date("Y"); ?> &copy;Copyright Metareels.</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->


        <script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  navigator.clipboard.writeText(copyText.value);
  
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copied: " + copyText.value;
}

function outFunc() {
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copy to clipboard";
}
</script>

       
        <?php include "footer.php"; ?>