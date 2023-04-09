<?php include 'header.php'; ?>

<?php

$user_id = $_GET['id'];

 		$qs = query("SELECT * FROM users WHERE id='$user_id'");
 		confirm($qs);
 		$qs_row = fetch_array($qs);

  ?>


 			<div class="card" style="background-color:#f2f2f2;">
 				<form style="margin: 5%;" method="POST" action="">
 					First Name: <input type="" value="<?php echo $qs_row['firstname']; ?>" name="firstname"> <br><br>
 					Last Name: <input type="" value="<?php echo $qs_row['lastname']; ?>" name="lastname"> <br><br>
 					Email: <input type="email" value="<?php echo $qs_row['email']; ?>" name="email"><br><br>
 					
 					<input style="color: red; background-color: gold; padding: 15px; border-radius: 5px;" type="submit" name="edit" value="EDIT">			
 				</form>

 				<?php
			 	if (isset($_POST['edit'])) {
			 		$firstname = escape_string($_POST['firstname']);
			 		$lastname = escape_string($_POST['lastname']);
			 		$email = escape_string($_POST['email']);

			 	$qe = query("UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email' WHERE id='$user_id'");
			 	confirm($qe);
			 		header("location: index.php?success");

			 	
			 		
			 	}

			  ?>
				
			 </div> 



<?php include 'footer.php'; ?>