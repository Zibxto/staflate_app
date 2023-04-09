<?php include 'header.php'; ?>

<?php

$user_id = $_GET['id'];

 		$qs = query("SELECT status FROM withdrawal_req WHERE id='$user_id'");
 		confirm($qs);
 		$qs_row = fetch_array($qs);

  ?>


 			<div class="card" style="background-color:#f2f2f2;">
 				<form style="margin: 5%;" method="POST" action="">
 					Status: <input list="status" type="" name="status">
 					<datalist id="status">
 						<option value="Paid">
 					</datalist>
 					 <br><br>
 					<input style="color: red; background-color: gold; padding: 15px; border-radius: 5px;" type="submit" name="edit" value="EDIT">			
 				</form>

 				<?php
			 	if (isset($_POST['edit'])) {
			 		$status = escape_string($_POST['status']);

			 	$qe = query("UPDATE withdrawal_req SET status='$status' WHERE id='$user_id'");
			 	confirm($qe);
			 		header("location: withdrawal.php?status");

			 	
			 		
			 	}

			  ?>
				
			 </div> 



<?php include 'footer.php'; ?>