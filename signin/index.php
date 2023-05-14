<?php
session_start();

if (isset($_GET['s_E'])) {
        echo "<script>alert('Session timeout')</script>";
    }
?>
<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.png">
    <title>Staflate</title>
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
  <div class="logo">
         <a href="../"> <img src="../img/logo.png" style="width: 10%; height:10%;"> </a>
    </div>
  <div class="container h-10 col-xl-5 col-lg-5 col-md-12 col-sm-12 p-5" style="box-shadow:0px 4px 4px 0px black">
    <div class="row d-flex justify-content-center align-items-center h-10">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-xl-10 col-lg-11 col-md-12 col-sm-12 order-2 order-lg-1">

                <p class="text-center h4 fw-bold m2-5 mx-1 mx-md-4 mt-4" style="color:#4f4d4d; font-family:verdana">Sign in</p>
                
                <div class="alert alert-success" role="alert" style="padding: 0px; text-align: center;">
                    <?php 
                        if (isset($_SESSION['invalid_login'])) {
                            echo "<p style='color: #191a19'>".$_SESSION['invalid_login']."</p>";
                            unset($_SESSION['invalid_login']);
                        }


                         if (isset($_SESSION['login_verified'])) {
                            echo "<p style='color: #191a19'>".$_SESSION['login_verified']."</p>";
                            unset($_SESSION['login_verified']);
                        }

                        if (isset($_SESSION['unverified'])) {
                            echo "<p style='color: #191a19'>".$_SESSION['unverified']."</p>";
                            unset($_SESSION['unverified']);
                        }

                        if (isset($_SESSION['reset'])) {
                            echo "<p style='color: #191a19'>".$_SESSION['reset']."</p>";
                            unset($_SESSION['reset']);
                        }
                    ?>
                    
                </div>

                <form method="POST" action="logincode.php">

                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="email" name="email" class="form-control" required />
                      <label class="form-label" for="form3Example1c">Email</label>
                    </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="passoword" minlength="8" name="password" class="form-control" required />
                      <label class="form-label" for="form3Example1c">Password</label>
                      <p><small><a href="../reset-password/">Forgot password?</a></small></p>
                    </div>
                    </div>

                  <div class="d-flex justify-content-center mx-4">
                    <button type="submit" name="login" class="btn btn-lg fw-bold btn-block" style="background-color: #0fa797; color: #ffffff">Sign in</button>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4 tex" style="color: #ff5252">
                  <p><small>Don't have an account? <a href="../signup/">Sign up</a></small></p>
                  </div>

                </form>

            

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