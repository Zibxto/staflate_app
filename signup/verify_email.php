<?php
session_start();

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
  <div class="container h-10 col-xl-5 col-lg-5 col-md-12 col-sm-12 p-5" style="box-shadow:0px 4px 4px 0px black">
    <div class="row d-flex justify-content-center align-items-center h-10">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-11 col-xl-10 order-2 order-lg-1">

                <p class="text-center h4 fw-bold m2-5 mx-1 mx-md-4 mt-4" style="color:#4f4d4d; font-family:verdana">Enter Confirmation Code</p>
                
                <div class="alert alert-success" role="alert" style="padding: 0px; text-align: center;">
                    <?php 
                        if (isset($_SESSION['reg_success'])) {
                            echo "<p style='color: #191a19'>".$_SESSION['reg_success']."</p>";
                            unset($_SESSION['reg_success']);
                        }
                    ?>

                    <?php 
                        if (isset($_SESSION['confirm_code_resend_success'])) {
                            echo "<p style='color: #191a19'>".$_SESSION['confirm_code_resend_success']."</p>";
                            unset($_SESSION['confirm_code_resend_success']);
                        }
                    ?>

                    <?php 
                        if (isset($_SESSION['confirm_code-resend_fail'])) {
                            echo "<hp style='color: #191a19'>".$_SESSION['confirm_code_fail']."</p>";
                            unset($_SESSION['confirm_code_fail']);
                        }
                    ?>

                    <?php 
                        if (isset($_SESSION['incorrect_cc'])) {
                            echo "<p style='color: #191a19;'>".$_SESSION['incorrect_cc']."</p>";
                            unset($_SESSION['incorrect_cc']);
                        }
                    ?>
                    
                </div>

                <form method="POST" action="verify_email_code.php">

                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="" id="last-name" name="cc" class="form-control" required />
                      <label class="form-label" for="form3Example1c">Confirmation Code</label>
                    </div>
                    </div>

                  <div class="d-flex justify-content-center mx-4">
                    <button type="submit" name="confirm_code" class="btn btn-lg fw-bold btn-block" style="background-color: #0fa797; color: #ffffff">Send</button>
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4 tex" style="color: #ff5252">
                  <p><small>Didn't receive code? <a href="regcode.php?resendcode=<?php
                  if (isset($_SESSION['email'])) {
                   echo $_SESSION['email'];  
                  } else {
                    echo "";
                  }

                 ?>">Resend Code</a></small></p>
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