<?php 
session_start();
include '../config/db_conn.php'; 
 

	if (isset($_POST['reset'])) {
		$email = $con->real_escape_string($_POST['email']);	
		
		$check_email = $con->prepare("SELECT email FROM users WHERE email=?");
		$check_email->bind_param('s', $email);
		$check_email->execute();
		$result = $check_email->get_result();
		
		if ($result->num_rows) {
		// 	 send email
		 $to = $email;
         $subject = "Reset Password";
         $headers = array(
                "MIME-Version" =>"1.0",
                "Content-Type" =>"text/html;charset=UTF-8",
                "From" =>"Metareels support@metareels.pro",
                "Reply-To" =>"support@metareels.pro"
         );

          ob_start();
          include ("password-reset-email.php");
          $message = ob_get_contents();
          ob_get_clean();
          
          mail($to, $subject, $message, $headers);

		 $_SESSION['password_reset_S'] = "We have sent a password reset link to your email";
	     header("Refresh:2 url ='index.php'");
		} else {
		    $_SESSION['password_reset_F'] = "Email is not Registered";
	     header("Refresh:2 url ='index.php'");
		}
		   


	}

    $check_email->close();
    $con->close();

	
?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/favicon.png"><!-- Site Title  -->
    <title>Processing</title><!-- Vendor Bundle CSS -->
    <link rel="stylesheet" href="../assets/css/vendor.bundle49f7.css?ver=104"><!-- Custom styles for this template -->
    <link rel="stylesheet" href="../assets/css/style49f7.css?ver=104" id="layoutstyle">
    <script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','../../www.google-analytics.com/analytics.js','ga');ga('create', 'UA-91615293-2', 'auto');ga('send', 'pageview');</script>
</head>
    <body class="page-ath">
        <div class="vh100 d-flex align-items-center">
        <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7 col-xl-6 text-center">
        <div class="error-content">
        <h1 style="color: #0fa797; font-size: 2vw; text-align: center;">Data Operation Processing!</h1>
        <p>Redirecting... </p>
    
    
        </div>
        </div>
        </div>
        </div>
        </div>

</html>