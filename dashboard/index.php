<?php 
include 'header.php';

//referral program control

    // $count = 0; //to get the number of referrers
    // $ref_code = $row['referral_code'];
    // $ref_q = query("SELECT * FROM users WHERE referrer='$ref_code' ORDER BY id DESC");
    // confirm($ref_q);

    // if (mysqli_num_rows($ref_q) > 0) {
    // while ($ref_row = fetch_array($ref_q)) {
    
    //     $id = $ref_row['id'];
    //     $s_q = query("SELECT status FROM payments WHERE user_id='$id'");
    //     confirm($s_q);
    //     if (mysqli_num_rows($s_q) > 0) {
    //         // $sq_row = fetch_array($s_q);
    //             $count++;
    //     //update all-time-earning on users table
    //      $all_time_earning = $count * 7.5;
    //      $acct_bal = $count * 7.5;
         
    //      $ate_q = query("UPDATE users SET all_time_earning='$all_time_earning', acct_bal='$acct_bal' WHERE id='$session_id'");
    //      confirm($ate_q);
    //             }

    //  }
    //  }

?>

                            
                <!-- page inner -->

            <div class="page-inner">
                <div class="page-title">
                    <h3>Overview</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>

                

                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-lg-3 col-md-3" style="background-color:#0fa797; border-radius: 10px; text-align: center; margin-left: 6%;">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                  <div class="card">
                                    <div class="card-body">
                                        <h1><span class="menu-icon glyphicon glyphicon-usd"></span></h1>
                                        <h3>All Time Earning</h3>

                                        <h1 style="font-weight: 900;"><?= number_format($row['all_time_earning'], 2); ?> USD</h1>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3" style="background-color:#0fa797; border-radius: 10px; text-align: center; margin-left: 6%;">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                  <div class="card">
                                    <div class="card-body">
                                        <h1><span class="menu-icon glyphicon glyphicon-usd"></span></h1>
                                        <h3>Account Balance</h3>

                                        <h1 style="font-weight: 900;"><?= number_format($row['acct_bal'], 2); ?> USD</h1>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3" style="background-color:#0fa797; border-radius: 10px; text-align: center; margin-left: 6%">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                  <div class="card">
                                    <div class="card-body">
                                        <h1><span class="menu-icon glyphicon glyphicon-usd"></span></h1>
                                        <h3>Next Payout</h3>

                                        <?php 

                                        //select all withdrawal request from table associeted with the session_id
                                            $np = query("SELECT amount FROM withdrawal_req WHERE user_id='$session_id' ORDER BY id DESC");
                                            confirm($np);
                                            $np_row = fetch_array($np);

                                            if ($np_row) {
                                                $np_row['amount'] = $np_row['amount'];
                                            } else {
                                                $np_row['amount'] = 0;
                                            }
                                        ?>

                                        <h1 style="font-weight: 900;"><?= number_format($np_row['amount'], 2); ?> USD</h1>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->

                </div><!-- Main Wrapper -->


                <?php 
                //update next_payout on users table
                $next_payout = $np_row['amount'];
                $np_update = query("UPDATE users set next_payout='$next_payout' WHERE id='$session_id'");
                confirm($np_update);

                ?>


                <div class="page-footer">
                    <p class="no-s"><?php echo date("Y"); ?> &copy;Copyright Staflate.</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->

       
        <?php include "footer.php"; ?>