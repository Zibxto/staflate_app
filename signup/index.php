<?php
session_start();

// if(isset($_GET['transaction'])){
//     if('transaction'=='cancelled') {
//         echo "<script>alert('Transaction cancelled')</script>";
//     }

// }

if (isset($_GET['email_exist'])) {
      echo "<script>alert('Email already in use, try another!')</script>";
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
              <div class="col-md-10 col-lg-11 col-xl-10 order-2 order-lg-1">

                <p class="text-center h4 fw-bold mb-2 mx-1 mx-md-4 mt-4" style="color:#4f4d4d; font-family:verdana">Sign up</p>
                
                <div class="alert alert-success" role="alert" style="padding: 0px; text-align: center;">
                    <?php 
                        if (isset($_SESSION['reg_failed'])) {
                            echo "<p style='color: #191a19'>".$_SESSION['reg_failed']."</p>";
                            unset($_SESSION['reg_failed']);
                        }
                    ?>
                </div>

                <form method="POST" action="regcode.php" id="paymentForm">

                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="first-name" name="firstname" class="form-control"  required />
                      <label class="form-label" for="form3Example1c">First Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="last-name" name="lastname" class="form-control" required />
                      <label class="form-label" for="form3Example1c">Last Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="email-address" name="email" class="form-control" required />
                      <label class="form-label" for="form3Example3c">Your Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="password" minlength="8" name="password" class="form-control" required />
                      <label class="form-label" for="form3Example3c">Password</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="hidden" name="referrer" value="<?php 
                        if (isset($_SESSION['refer'])) {
                          echo $_SESSION['refer'];
                        } else {
                          echo "";
                        }
                       ?>" id="referral_code" name="referral_code" class="form-control" readonly/>
                      <!-- <label class="form-label" for="form3Example3c">Referrer Code</label> -->
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-3">
                    <input class="form-check-input me-2" type="checkbox" name="terms" value="" id="form2Example3c" required />
                    <label class="form-check-label" for="form2Example3">
                      I agree  to all statements in <a href="../terms.php">Terms of service</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4">
                    <button type="submit" name="register" class="btn btn-lg fw-bold btn-block" style="background-color: #0fa797; color: #ffffff; font-family:verdana">Sign up</button>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4 tex" style="color: #ff5252">
                  <p><small>Already have an account? <a href="../signin/">sign in</a></small></p>
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