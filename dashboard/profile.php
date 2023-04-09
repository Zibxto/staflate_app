<?php 
include 'header.php';

if (isset($_GET['edit_success'])) {
    echo "<script>alert('Operation successful')</script>";
    
}

if (isset($_GET['edit_failed'])) {

    echo "<script>alert('Operation failed, try again')</script>";
}

if (isset($_GET['success'])) {
    echo "<script>alert('Operation successful')</script>";
    
}

if (isset($_GET['failed'])) {

    echo "<script>alert('Operation failed, try again')</script>";
}

if (isset($_GET['pr'])) {

    echo "<script>alert('Operation failed, type in the correct current password')</script>";
}
?>

                            
                <!-- page inner -->

            <div class="page-inner">
                <div class="page-title">
                    <h3>Profile</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>

                

                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h5 class="panel-title">Edit Profile</h5>
                                </div>
                                <div class="panel-body">
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">First name</label>
                                            <input type="text" name="firstname" value="<?= $row['firstname']; ?>" class="form-control" id="exampleInputEmail1" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Last name</label>
                                            <input type="text" name="lastname" value="<?= $row['lastname']; ?>"  class="form-control" id="exampleInputEmail1" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" name="email" value="<?= $row['email']; ?>" class="form-control" id="exampleInputEmail1" required>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" required> Confirm changes
                                            </label>
                                        </div>
                                        <button type="submit" name="edit" class="btn btn-block" style="background-color: #0fa797; color: #ffffff; font-family:verdana">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h5 class="panel-title">Change Password</h5>
                                </div>
                                <div class="panel-body">
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Old password</label>
                                            <input type="password" name="oldpword" minlength="8" class="form-control" id="exampleInputEmail1" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">New password</label>
                                            <input type="password" name="newpword" minlength="8" class="form-control" id="exampleInputEmail1" required>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" required> Confirm changes
                                            </label>
                                        </div>
                                        <button type="submit" name="edit_p" class="btn btn-block" style="background-color: #0fa797; color: #ffffff; font-family:verdana">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->

                </div><!-- Main Wrapper -->


                <?php

                if (isset($_POST['edit'])) {
                    $firstname = $con->real_escape_string($_POST['firstname']);
                    $lastname = $con->real_escape_string($_POST['lastname']);
                    $email = $con->real_escape_string($_POST['email']);
                    $stmt = $con->prepare("UPDATE users SET firstname=?, lastname=?, email=? WHERE id=? ");
                    $stmt->bind_param('sssi', $firstname,$lastname,$email,$session_id);
                    
                    $stmt->execute();

                    if ($stmt->execute()) {
                         header("location: profile.php?edit_success");
                    } else {
                        header("location: profile.php?edit_failed");
                    }

                   

                    $stmt->close();
                }

                if (isset($_POST['edit_p'])) {
                    $oldpword = $con->real_escape_string($_POST['oldpword']);
                    $oldpword = md5($oldpword);
                    $newpword = $con->real_escape_string($_POST['newpword']);
                    $newpword = md5($newpword);
                    
                    if ($oldpword == $row['password']) {
                    $stmt = $con->prepare("UPDATE users SET password=? WHERE id=? ");
                    $stmt->bind_param('si', $newpword,$session_id);
                    
                    $stmt->execute();

                    if ($stmt->execute()) {
                         header("location: profile.php?success");
                    } else {
                        header("location: profile.php?failed");
                    }

                     } else {
                        header("location: profile.php?pr");
                     }

                   

                    $stmt->close();
                }

                $con->close();
                 ?>


                <div class="page-footer">
                    <p class="no-s"><?php echo date("Y"); ?> &copy;Copyright Metareels.</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->

       
        <?php include "footer.php"; ?>