
<?php include 'header.php'; 

if (isset($_GET['success'])) {
    echo "<script>alert('Operation successful')</script>";
    
}

if (isset($_GET['status'])) {
    echo "<script>alert('Operation successful, status has been changed to payed')</script>";
    
}

 ?>



<div class="card">
    <div class="table-responsive">
        <table class="table table-hover table-borderless table-striped">
            <thead class="card-head">
              <tr>
                <th scope="col">SN</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Bank</th>
                <th scope="col">Account Num.</th>
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
                <th scope="col">Request Time</th>
                <th scope="col">Edit</th>
                <!-- <th scope="col">Delete</th> -->
              </tr>
            </thead>
            <tbody class="card-body">

    <?php

    $query = query("SELECT * FROM withdrawal_req ORDER BY id ASC");
    confirm($query); 

    $sn = 1;
    while ($row = fetch_array($query)) {
        $session_id = $row['id'];
    
     ?>
               
              <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['bank']; ?></td>
                <td><?php echo $row['acct_number']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['req_date']; ?></td>
                <td>
                    <a href="edit_withdrawal.php<?php echo '?id='.$session_id; ?>">Edit Status </a>
                </td>
                <!-- <td>
                    <a href="<?php echo '?delete='.$session_id; ?>">Delete</a>
                </td> -->
              </tr>
      <?php
        }

        // if (isset($_GET['delete'])) {
        //     $delete = $_GET['delete'];
        //     $qy = query("DELETE FROM users WHERE id='$delete'");
        //     confirm($qy);
        //     header('location: index.php');
        // }  

  ?>
            </tbody>
        </table>
    </div>
</div>



<?php include 'footer.php';  ?>