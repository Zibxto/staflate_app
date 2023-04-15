<?php include 'header.php'; ?>

<?php

$user_id = $_GET['id'];

 		$qs = query("SELECT * FROM tutorial_video WHERE id='$user_id'");
 		confirm($qs);
 		$qs_row = fetch_array($qs);

  ?>


 			<div class="card" style="background-color:#f2f2f2;">
 				<form style="margin: 5%;" method="POST" action="">
 					Title: <input type="" value="<?php echo $qs_row['title']; ?>" name="title"> <br><br>
 					Description: <textarea style="width: 100%" name="description"><?php echo $qs_row['description']; ?></textarea> <br><br>
 					Youtube_ID: <input type="" value="<?php echo $qs_row['youtube_id']; ?>" name="youtube_id"><br><br>
 					Module: <input type="" value="<?php echo $qs_row['module']; ?>" name="module"><br><br>
 					
 					<input style="color: red; background-color: gold; padding: 15px; border-radius: 5px;" type="submit" name="edit" value="EDIT">			
 				</form>

 				<?php
			 	if (isset($_POST['edit'])) {
			 		$title = escape_string($_POST['title']);
			 		$description = escape_string($_POST['description']);
			 		$youtube_id = escape_string($_POST['youtube_id']);
			 		$module = escape_string($_POST['module']);

			 	$qe = query("UPDATE tutorial_video SET title='$title', description='$description', youtube_id='$youtube_id', module='$module' WHERE id='$user_id'");
			 	confirm($qe);
			 		header("location: upload_courses.php?success");

			 	
			 		
			 	}

			  ?>
				
			 </div> 



<?php include 'footer.php'; ?>