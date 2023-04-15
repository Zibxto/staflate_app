
<?php include 'header.php';  ?>

<?php 

if (isset($_GET['upload_exist'])) {
    echo "<script>alert('Upload failed, there is an existing youtube video!')</script>";
}

if (isset($_GET['uploaded'])) {
    echo "<script>alert('Upload Successful!')</script>";
}

if (isset($_GET['not_uploaded'])) {
    echo "<script>alert('Upload not Successful!')</script>";
}

if (isset($_GET['success'])) {
    echo "<script>alert('Edited Successfully!')</script>";
}
// if (isset($_POST['upload'])) {
//     $address = $_POST['address'];
//     $file = $_FILES['image']['name'];

//     $query = query("INSERT INTO upload(address,image) VALUES('$address','$file')");
//     confirm($query);

//     if ($query) {
//         move_uploaded_file($_FILES['image/']['tmp_name'], "$file");
//     }

//     header("location: wallet_address.php");
// }

error_reporting(0);

?>


        <div class="col-md-4">
            <h3 class="text-center">UPLOAD COURSE</h3>

            <form class="my-5" method="POST">
                <label>Video Title</label><br>
                <input type="text" name="title" class="form-control" placeholder="ENTER TITLE"> <br><br>
                <label>Youtube Video ID</label><br>
                <input type="text" name="youtube_id" class="form-control" placeholder="ENTER YOUTUBE VIDEO ID"> <br><br>
                <textarea style="width: 100%" name="description">ENTER DESCRIPTION</textarea> <br><br>
                <label>Course Module</label><br>
                <input type="number" name="module" class="form-control" placeholder="ENTER COURSE MODULE"> <br><br>
                <!-- <label>Course Lesson</label><br>
                <input type="number" name="lesson" class="form-control" placeholder="ENTER COURSE LESSON"> <br><br> -->
                
                <input type="submit" name="upload" value="UPLOAD" class="btn btn-success my-3">
                
            </form>
            
        </div>


        <?php
    
    if (isset($_POST['upload'])) {
        $title = escape_string($_POST['title']);
        $description = escape_string($_POST['description']);
        $youtube_id = escape_string($_POST['youtube_id']);
        $module = escape_string($_POST['module']);
        // $lesson = escape_string($_POST['lesson']);
        date_default_timezone_set('Africa/Lagos');
        $date_uploaded = date('m/d/Y h:i:s a', time());
       
        
         $check_row = query("SELECT youtube_id FROM tutorial_video WHERE youtube_id='$youtube_id' LIMIT 1");
        confirm($check_row);
        
        if (mysqli_num_rows($check_row) > 0) {
            header("location: upload_courses.php?upload_exist");
        } else {

        $sql = "INSERT INTO tutorial_video (title,description,youtube_id,module,date_uploaded) VALUES ('$title','$description','$youtube_id','$module','$date_uploaded')";
        $c_sql = mysqli_query($con, $sql);

        if ($c_sql) {
            header("location: upload_courses.php?uploaded");
        } else {
            header("location: upload_courses.php?not_uploaded");
        }
    }
    
    }

 ?>


 <div class="card">
    <div class="table-responsive">
        <table class="table table-hover table-borderless table-striped">
            <thead class="card-head">
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Youtube_ID</th>
                <th scope="col">Module</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody class="card-body">

    <?php

    $query = query("SELECT * FROM tutorial_video ORDER BY id ASC");
    confirm($query); 

    while ($row = fetch_array($query)) {
        $session_id = $row['id']; 
    
     ?>
               
              <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['youtube_id']; ?></td>
                <td><?php echo $row['module']; ?></td>
                <td>
                    <a href="edit_uploaded_course.php<?php echo '?id='.$session_id; ?>">Edit</a>
                </td>
                <td>
                    <a href="<?php echo '?delete='.$session_id; ?>">Delete</a>
                </td>
              </tr>
      <?php
        }

        if (isset($_GET['delete'])) {
            $delete = $_GET['delete'];
            $qy = query("DELETE FROM tutorial_video WHERE id='$delete'");
            confirm($qy);
            header('location: upload_courses.php');
        }  

  ?>
            </tbody>
        </table>
    </div>
</div>


<?php include 'footer.php';  ?>