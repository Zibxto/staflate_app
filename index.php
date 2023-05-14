<?php 
session_start();

//get referrer code from url if exist
if (isset($_GET['refer'])) {
  $refer = $_GET['refer'];
  $_SESSION['refer'] = $refer;
}

if (isset($_GET['signout'])) {
     echo "<script>alert('Logout Successful')</script>";
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
                <ul class="navbar-nav nav">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">All You Need</a></li>
                    <li class="nav-item"><a class="nav-link" href="#space">Special Offers</a></li>
                    <li class="nav-item"><a class="nav-link" href="#moreinfo">More Info</a></li>
                </ul>

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
                            <h3>FOR ANYONE ON FACEBOOK AS A CONTENT CREATOR AND NON CONTENT CREATOR.</h3>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md"></div>
                </div>
                <div class="row">
                    <div class="col-md"></div>
                    <div class="col-md-9">
                        <img src="img/intro.jpeg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end intro -->

    <!-- more intro -->
    <div id="home" class="about">
        <div class="container">
            <h3>ULTIMATE FACEBOOK META DOLLARPRINT</h3> <br>
            <p>This Program is For You if</p>
            <p><b>YOU ARE STRUGGLING CONTENT CREATORS</b> who create content(i.e. pictures, text, reels and short video and live video) on TikTok, Facebook, Instagram and YouTube that want to make more money from their content Creation.</p>

            <p><b>INELIGIBLE CONTENT CREATOR</b> on Facebook Reels Play Bonus program who want to become ELIGIBLE CONTENT CREATOR to start earning from zero to $35,000 a month withfacebook Reels play bonus program.</p>

            <p><b>ALSO FOR THE NON-CONTENT CREATORS</b> with the Help of Facebook Reels API which allow and enable the posting of third-party content creation you can also earn with Facebook Reels Play Bonus program.</p>

            <p><b>DISCOVER</b> the step by step straight part to how anyone can make money on Facebook Reels Play Bonus Program by posting your own content and other people content using the Facebook Reels PBP/API DollarprintBlueprint. This program is to help you and assist you with the secretto start earning on Facebook Reels Play Bonus Program as a newbie.</p>

            <h3 style="color: #bf0404; margin-top: 8%;">“Any one on FACEBOOK can do this with your internet connected Smartphone.”</h3>
            <p>Get Started Right Now With The Facebook Reels PBP Dollarprint Blueprint Course.</p>
            <a href="./signup/"><button class="button font-weight-bold">START NOW</button></a>

            <h3 style="margin-top: 8%;">CHANGING THE LIVES OF REELS CONTENT CREATORS AND NON CONTENT CREATORS</h3>
            <p>Join over 1000+ reels Content creators who are actively creating content to make money on Facebook reels play bonus program were reels creator earn upto $35,000 a monthand as a non-creator posting other people reels content.</p>

        </div>
    </div>
    <!-- end more intro -->



    <!-- all you need.... -->
    <div id="about" class="about" style="margin-top: -15%; text-shadow: rgb(82, 81, 82) 1px 1px;">
        <div class="container">
            <h3>SOME THINGS TO LEARN ABOUT ULTIMATE FACEBOOK META DOLLAR PRINT BLUEPRINT (UFMD)</h3>
            <ol>
                <li>
                    <p>
                        Facebook Page Monetization $450
                    </p>
                </li>
                <li>
                    <p>
                        Facebook Reels Monetization $100
                    </p>
                </li>
                <li>
                    <p>
                       Ai Content Creation ( Here you will learn how to use Ai to create content) $100
                    </p>
                </li>
                <li>
                    <p>
                       Ai Copywriting ( Here you will learn how to use Ai for Copywriting)$100
                    </p>
                </li>
                <li>
                    <p>
                        Ai sales. Here you will learn how to use Ai for marketing and make sales while you are sleeping $300
                    </p>
                </li>
                <li>
                    <p>
                       Facebook Reels Bonus Eligibility Requirement And Your payout set up. Here you will learn eligibility requirement on facebook reels play bonus and how to apply for the bonus. $150
                    </p>
                </li>
                <li>
                    <p>
                       Learn more than 5 powerful Monetization Tools to monetize page Content as a complete NOVICE $2,000 a month $300
                    </p>
                </li>
                <li>
                    <p>
                        Facebook form of Content creation (this will expose to you what content to create/post to make you earn on facebook reels play bonus $200
                    </p>
                </li>
                <li>
                    <p>
                     Reels sales letter Marketing $50
                    </p>
                </li>
                <li>
                    <p>
                        Facebook Ads Creative Secrets and monetization $500
                    </p>
                </li>
                <li>
                    <p>
                        Presentation Skills $100.
                    </p>
                </li>
                <li>
                    <p>
                        Whatsapp Marketing + Whatsapp Ai chat $200
                    </p>
                </li>
                <li>
                    <p>
                        YouTube Ads Secret $100.
                    </p>
                </li>
                <li>
                    <p>
                        Twitter Ads Secret $200
                    </p>
                </li>
                <li>
                    <p>
                        Website design, sales funnel and landing page $400
                    </p>
                </li>
                <li>
                    <p>
                        Graphics design $50
                    </p>
                </li>
                <li>
                    <p>
                        Traffic Hacking Secret $100 <br> Etc.

                    </p>
                </li>
                
            </ol> <br>

            <h4>TOTAL VALUE - $3,400</h4>
            <h5 style="color:#bf0404">(If you learn them separately)</h5>
            <h5 style="color:#bf0404">NOW $15</h5>

            
           
        </div>
    </div>
    <!-- end all you need.... -->

    <!-- special offers -->
    <div id="space" class="space">
        <div class="container">
            <div class="row gx-5">
                <div class="col-md">
                    <h3>WHAT YOU WILL BE GETTING WHEN YOU GET STARTED</h3>
                    <h4 style="color: darkolivegreen;">Today special offers</h4>
                    <img src="img/space1.jpeg" alt="">
                    <h3>COME JOIN US</h3>
                    <a href="./signup/"><button class="button">Get started for only<b class="fs-5">$15</b></button></a>
                </div>
            
                <div class="col-md col-sm-6">
                    <div class="content">
                        <p>
                            Everything you will need to create qualifying reels contents and to become eligible creator to start making from zero up to $35,000 a month on facebook reels play bonus program creating &posting  reels content ($300)
                        </p> 
                    </div>
                    <div class="content">
                        <p>Ultimate Facebook Meta Dollarprint membership account where you can earn massive commission with facebook reels PBP dollarprint ($200)

                        </p>
                    </div>
                </div>
                <div class="col-md col-sm-6">
                    <div class="content">
                    
                        <p>Weekly coaching call with 8 figure facebook reels bonus earning coaching across the globe helping you with winningSecretand strategythat will guide you step-by-step to succeed ($500)
                        </p>
                    </div>
                    <div class="content">
                        
                        <p>Access to Facebook Reels PBP/API helps community on telegram and where like minded creatorsand non creatorsare waiting to answer all your questions to help you succeed by every means,you are never alone ($100)
                            
                        </p>
                    </div>
                </div>

                <div class="col-md col-sm-6">
                    <div class="content">
                    
                        <p>Full access to facebook reels PBP/API dollarprint, here you will learn over 7powerfull digital skills to create qualifying reels & contents in a Done-with you format and make money as you create reels contents ($100)
                        </p>
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <div class="content">
                        <h5 style="color: #bf0404;">TOTAL VALUE: $1,400 + $3,500 
                            = $4,900
                        </h5>
                    </div>
                 </div>
            </div>
        </div>
    </div>


    <div class="about" style="margin-top: -15%;">
        <div class="container">
            <div>
                <h3>ULTIMATE FACEBOOK META DOLLARPRINT IS FOR YOU</h3>
                <p>
                    We identified every person on Facebook,YouTube,TikTok,Instagram etc who create and post reels and short video content either for personal, business, organization or brand or also for non-creators.
                </p>
            </div>
            <div>
                <h3>Let’s see if this is the best for</h3>
                <ol style="list-style-type: square;">
                    <li>
                        <p>
                            Anyone on Facebook creating and posting personal reels, brand reels, products etc who want more money.
                        </p>
                    </li>
                    <li>
                        <p>
                            A facebook reels content creators who want to make money on facebook reels play bonus.
                        </p>
                    </li>

                    <li>
                        <p>
                            Anyone who wants to make money on Facebook page, Ads and Reels 
                        </p>
                    </li>
                    <li>
                        <p>
                           Facebook Advertisers who want their Ads to be monetize. 
                        </p>
                    </li>
                    <li>
                        <p>
                          Reels creators who want to earn from Facebook reels bonus. 
                        </p>
                    </li>
                    <li>
                        <p>
                          An Affiliate marketer who want more sales and make huge commission  
                        </p>
                    </li>
                    <li>
                        <p>
                            Non-creators who are posting other people reels on facebook reels Play Bonus programwho want to make more money. 
                        </p>
                    </li>
                    <li>
                        <p>
                            A student in need of steady pockets money. 
                        </p>
                    </li>
                    <li>
                        <p>
                            A business owner in need of more online sales. 
                        </p>
                    </li>
                    <li>
                        <p>
                            A startup, looking for investment capital to expand. 
                        </p>
                    </li>
                    <li>
                        <p>
                            Any one who like to build an online business making minimum$5,000 monthly.
                        </p>
                    </li>
                </ol>
            </div>
            <div>
                <h5 style="color:#bf0404">However, There Is No Guarantee That These Prices Will Remain As It Is.</h5>
                <p>
                    It might go up immediately when you leave this page
                    So don't blink at all.

                </p>
                <b><a href="#">Get The Program Now</a></b>
            </div>
        </div>

    </div>
    <!-- end space -->

    <!-- more info -->

    <div id="moreinfo" class="about">
        <div class="container" style="margin-top: -30%;">
            <h4 style="color: #bf0404;">30 DAY CONDITIONAL GUARANTEE</h4>
            <legend>You Are Covered By Staflate 30-Day Refund Policy</legend> <br><br>

            <h6 class="text-start">You might be thinking:</h6> <br>
            <h6 class="text-start">Is this product worth it?</h6>
            <p class="text-start">
                Will this product really deliver on these promises?
                The good thing is that since you are purchasing Facebook Reels PBP/API Dollarprint Blueprint on Staflate you are covered by Staflate 30-day refund policy.

            </p>
            <p class="text-start">
                Staflate is known to be the most trusted and customer friendly platform for all reels digital content creators and non creators.
            </p>

            <h6 class="text-start">What the Staflate refund policy means is that:</h6>
            <p class="text-start">
                You have 30 days from the day you ordered this product to check it. If this product does not contain everything promised on this page, then you are entitled to a refund and all you have to do is reach out to the Staflate customer support to get your money back.
            </p>

            <h6 class="text-start">So what are you waiting for?</h6>
            <p class="text-start">
                You have everything you will need to achieve success plus additional bonuses, plus iron clad 30 days full money back guarantee
            </p>
            <p class="text-start">
                So now, you have your own financial destiny in your hands. It is up to you to make the right decision right now, and gain access to this program or you can skip this opportunity now, and keep on wishing for money.
            </p>

            <h6 style="color: #f2c02f;">Click on the button below and secure your spot now!</h6>
            <button class="button font-weight-bold" style="background-color: #bf0404;"><a href="./signup/" style="color: aliceblue;"> Get The Program Now</a></button>

            <p>
                Staflate Affiliate Network  provide opportunity for any one from anywhere in the world to learn from expert. You can choose what you want to become on social media platform, with Staflate you can become it.
            </p>



        </div> 

    </div>

   <!-- end more info -->

    <!-- testimonial -->
    


    
    <!-- end testimonial -->


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