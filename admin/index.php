
<?php include 'header.php'; 

if (isset($_GET['success'])) {
    echo "<script>alert('Operation successful')</script>";
    
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
                <th scope="col">Verified</th>
                <th scope="col">ALL_Time_Earning</th>
                <th scope="col">Acct_Bal</th>
                <th scope="col">Next_payout</th>
                <th scope="col">Reg. Time</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody class="card-body">

    <?php

    $query = query("SELECT * FROM users ORDER BY id ASC");
    confirm($query); 

    $sn = 1;
    while ($row = fetch_array($query)) {
        $session_id = $row['id'];
        
    if ($row['rank'] == 0) {
       
    
     ?>
               
              <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['verified']; ?></td>
                <td><?php echo $row['all_time_earning']; ?></td>
                <td><?php echo $row['acct_bal']; ?></td>
                <td><?php echo $row['next_payout']; ?></td>
                <td><?php echo $row['reg_date']; ?></td>
                <td>
                    <a href="edit_user.php<?php echo '?id='.$session_id; ?>">Edit</a>
                </td>
                <td>
                    <a href="<?php echo '?delete='.$session_id; ?>">Delete</a>
                </td>
              </tr>
      <?php
        }

 }

        if (isset($_GET['delete'])) {
            $delete = $_GET['delete'];
            $qy = query("DELETE FROM users WHERE id='$delete'");
            confirm($qy);
            header('location: index.php');
        }  

  ?>
            </tbody>
        </table>
    </div>
</div>



<?php include 'footer.php';  ?>