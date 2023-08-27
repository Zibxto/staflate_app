<?php 
session_start();

//get referrer code from url if exist
if (isset($_GET['refer'])) {
  $refer = $_GET['refer'];
  $_SESSION['refer'] = $refer;
}

?>

<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Staflate</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/line-awesome.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/addedstyle.css">

    <style>
        @media screen and (max-width: 600px) {

            .container a img {
                width: 100%;
                height: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- loader -->
    <div class="loader">
        <div class="loading">
            <div class="spinner-grow aloader" role="status">
                <span class="sr-only"></span>
            </div>
        </div>
    </div>
    <!-- end loader -->


    <!-- navbar -->
    <div id="navbar" class="navbar navbar-expand-lg justify-content-center align-items-center">
        <div class="container">
            <a href="" class="navbar-brand"><img src="img/logo.png" style="width: 50%; height: 50%;" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			        <i class="la la-bars"></i>
			    </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav nav" style="margin-left: 16px;">
                <li><a href="./signin/"> <button class="button font-weight-bold">Sign in</button></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end navbar -->


    <!-- intro -->
    <div id="home" class="intro">
        <div class="container">
            <div class="content">
                <div class="row align-items-center">
                    <div class="col-md-12 col-sm-12 col-lg-7">
                        <div class="content-text">
                            <h2 style="color: #bf0404;">Attention</h2>
                            <h4>This Facebook Page Monetization Program Will show you the step-by-step guide to monetize your Facebook page and start earning a minimum of $1,000 monthly as a new beginner without selling any digital products even though all you have is zero follower</h4>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div style="width: 80%; height: 50vh; margin: auto; margin-top: 15%;">
                        <iframe class="landing-video" width="100%" height="440" src="https://www.youtube-nocookie.com/embed/aTwWJ_yyMxY?modestbranding=1&&controls=1" frameborder="0" allow="accelerometer; autoplay; gyroscope;" allowfullscreen></iframe>
                        <style>
                        @media screen and (max-width: 900px) {
                                .landing-video {
                                    width: 100%;
                                    margin-top: 20%;
                                }
                                }
                    </style>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end intro -->

    <!-- more intro -->
    <div id="home" class="about">
        <div class="container">
            <a href="./signup/"><button class="button font-weight-bold">GET THE PROGRAM</button></a> <br><br>
            <p>Are you struggling to turn your Facebook page into a monetize page where you can start earning in dollars?</p>
            <p>Imagineturning your content into cash from your monetize Facebook page earning in dollars consistently every month.</p>

            <p><a href="./signup/"><b>Get The program</b></a> to Monetize your Facebook page. </p>

            <h3 style="color: #bf0404; margin-top: 8%;">IMPORTANT: Earnings And Legal Disclaimers.</h3>
            <p>Staflate is an online marketplace for promoting valuable digital products that help to solve people problem.</p>
            <p>All information submitted here is subject to our terms and conditions</p>
        </div>
    </div>
    <!-- end more intro -->


    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row">
                <!-- <div class="col-md col-sm-6">
                    <ul>
                        <li><a href=""><i class="la la-facebook"></i></a></li>
                        <li><a href=""><i class="la la-twitter"></i></a></li>
                        <li><a href=""><i class="la la-instagram"></i></a></li>
                        <li><a href=""><i class="la la-youtube"></i></a></li>
                        <li><a href=""><i class="la la-linkedin"></i></a></li>
                    </ul>
                </div> -->
                <div class="col-md col-sm-6">
                    <div class="cp">
                        <span> <?php echo date("Y"); ?>&copy;Copyright Staflate </span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <!-- script -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.filterizr.min.js"></script>
    <script src="js/magnific-popup.min.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html>