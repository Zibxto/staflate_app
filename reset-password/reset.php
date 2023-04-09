<?php
session_start();
include "../config/db_conn.php";

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $resultSet = $con->prepare("SELECT password FROM users WHERE email=?");
    $resultSet->bind_param('s', $email);
    $resultSet->execute();
    $result = $resultSet->get_result(); 
}

?>
<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.png">
    <title>Metareels</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/swiper.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/addedstyle.css">
</head>

<body>

<!-- signup form -->

<section class="h-10 gradient-custom">
  <div class="container h-10 col-xl-5 col-lg-5 col-md-12 col-sm-12 p-5 p-5 p-5" style="box-shadow:0px 4px 4px 0px black">
    <div class="row d-flex justify-content-center align-items-center h-10">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-11 col-xl-10 order-2 order-lg-1">

                <p class="text-center h4 fw-bold mb-2 mx-1 mx-md-4 mt-4" style="color:#4f4d4d; font-family:verdana">Set a new password</p>
                
                <div class="alert">
                    <?php 
                        if (isset($_SESSION['reg_fail'])) {
                            echo "<h6 style='color: red'>".$_SESSION['reg_fail']."</h6>";
                            unset($_SESSION['reg_fail']);
                        }
                    ?>
                </div>

                <form method="POST" action="" id="paymentForm">

                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="password" minlength="8" name="password" class="form-control" required />
                      <label class="form-label" for="form3Example3c">New Password</label>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4">
                    <button type="submit" name="newpassword" class="btn btn-lg fw-bold btn-block" style="background-color: #0fa797; color: #ffffff; font-family:verdana">Submit</button>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4 tex" style="color: #ff5252">
                  <p><small>New on our platform? <a href="../signup/">Create account</a></small></p>
                  </div>

                </form>

          <?php
        if (isset($_POST['newpassword'])) {
    

            $rp = $con->prepare("UPDATE users SET password=? WHERE email=?");
            $rp->bind_param('ss', $password, $email);
            $password = $con->real_escape_string($_POST['password']);
            $password = md5($password);
            $email;
            $rp->execute();
            $_SESSION['reset'] = "Your password has been changed successfully, proceed to login";
            header("location: ../signin/index.php");
        }
        $rp->close();
        $resultSet->close();
        $con->close();

    ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- end signup form -->


    <!-- footer -->
   <?php include '../layout/footer.php' ?>

</body>

</html>   