
<?php include 'header.php'; ?>



<div class="card">
    <div class="table-responsive">
        <table class="table table-hover table-borderless table-striped">
            <thead class="card-head">
              <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Payment Date</th>
              </tr>
            </thead>
            <tbody class="card-body">

    <?php

    $query = query("SELECT * FROM payments ORDER BY id ASC");
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
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['payment_date']; ?></td>
              </tr>
      <?php
        }
  ?>
            </tbody>
        </table>
    </div>
</div>



<?php include 'footer.php';  ?>