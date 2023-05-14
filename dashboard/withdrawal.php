<?php 
include 'header.php';

if (isset($_GET['success'])) {
    echo "<script>alert('Operation successful, your withdrawal request will be processed within 48 hours')</script>";
    
}

if (isset($_GET['failed'])) {

    echo "<script>alert('Operation failed, try again')</script>";
}

if (isset($_GET['insufficient'])) {

    echo "<script>alert('Operation failed, you do not have sufficient balance for this transaction')</script>";
}

if (isset($_GET['z'])) {

    echo "<script>alert('Please input an amount above 0')</script>";
}
?>

<style>
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

td, th{
    padding: 6px;
    text-align: left;

}
</style>
                            
                <!-- page inner -->

            <div class="page-inner">
                <div class="page-title">
                    <h3>Withdrawals</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li class="active">Withdrawals</li>
                        </ol>
                    </div>
                </div>

                

                <div id="main-wrapper">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h5 class="panel-title">Request Withdrawal</h5>
                                </div>
                                <div class="panel-body">
                                    <form method="POST" action="withdrawal_code.php">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Bank</label>
                                            <input type="text" name="bank" class="form-control" id="exampleInputEmail1" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Account Number</label>
                                            <input type="" name="acct_no" class="form-control" id="exampleInputEmail1" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Amount (USD)</label>
                                            <input type="" name="amt" class="form-control" id="exampleInputEmail1" required>
                                        </div>
                                        <button type="submit" name="withdrawal" class="btn btn-block" style="background-color: #0fa797; color: #ffffff; font-family:verdana">Request</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                  <div style="margin-top:5%; background-color:#000003; border-radius: 16px 6px 6px 0px; padding: 10px; color:#f2f2f2" class="card">
                                    <div class="card-header">
                                        <h3>Withdrawals</h3>
                                    </div>
                                    <div class="card-body">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Amount</th>
                                                    <th>Time</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $w_r = query("SELECT * FROM withdrawal_req WHERE user_id='$session_id' ORDER BY id ASC");
                                                    confirm($w_r);
                                                    while ($w_row = fetch_array($w_r)) {

                                                ?>
                                            <tr>
                                                <td><?= number_format($w_row['amount'], 2) ?> USD</td>
                                                <td><?= $w_row['req_date'] ?></td>
                                                <td><?= $w_row['status'] ?></td>
                                                
                                            </tr>

                                        <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                      
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->

                </div><!-- Main Wrapper -->


                

                <div class="page-footer">
                    <p class="no-s"><?php echo date("Y"); ?> &copy;Copyright Staflate.</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->

       
        <?php include "footer.php"; ?>