<?php
ob_start();
session_start();
include "../config/db_conn.php";

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}


if (isset($_POST['register'])) {

$firstname = $con->real_escape_string($_POST['firstname']);
$lastname = $con->real_escape_string($_POST['lastname']);
$email = $con->real_escape_string($_POST['email']);
$_SESSION['email'] = $email;
$password = $con->real_escape_string($_POST['password']);
$password = md5($password);
$vkey = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
$_SESSION['vkey'] = $vkey;
date_default_timezone_set('Africa/Lagos');
$reg_date = date('m/d/Y h:i:s a', time());
$referral_code = generateRandomString();
$_SESSION['referral_code'] = $referral_code;
$referrer = $con->real_escape_string($_POST['referrer']);


$check_email = $con->prepare("SELECT email FROM users WHERE email=? LIMIT 1");
$check_email->bind_param('s', $email);
$check_email->execute();
$result=$check_email->get_result();

if ($result->num_rows > 0) {
    header("location: index.php?email_exist");
} else {
    $stmt = $con->prepare("INSERT INTO users (firstname,lastname,email,password,vkey, referral_code,referrer,reg_date) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param('ssssssss', $firstname,$lastname,$email,$password,$vkey,$referral_code,$referrer,$reg_date);
    $stmt->execute();

    if ($stmt) {
        //send email
         $to = $email;
         $subject = "Your Confirmation Code";
         $headers = array(
                "MIME-Version" =>"1.0",
                "Content-Type" =>"text/html;charset=UTF-8",
                "From" =>"Metareels support@metareels.pro",
                "Reply-To" =>"support@metareels.pro"
         );

          ob_start();
          include ("confirmation-code-email.php");
          $message = ob_get_contents();
          ob_get_clean();

          mail($to, $subject, $message, $headers);

        $_SESSION['reg_success'] = "Thank you for registering. We have sent a confirmation code to the email address provided, check your inbox (or spam) and enter it below.";
        header("Refresh:2 url ='verify_email.php");
    } else {
            $_SESSION['reg_failed'] = "Registration Failed, try again.";
         header("Refresh:2 url ='index.php");
        }
}

$stmt->close();
$check_email->close();
$con->close();

unset($_SESSION['refer']);
}


 else {
    if (isset($_GET['resendcode'])) {
    if ($_GET['resendcode'] = $_SESSION['email']) {
        $resendcode = $_GET['resendcode'];

    $vkey = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    $_SESSION['vkey'] = $vkey;

    $sql = $con->prepare("UPDATE users SET vkey=? WHERE email=?");
    $sql->bind_param('ss', $vkey,$resendcode);
    $sql->execute();

    if ($sql) {
    // 	 send email
        $to = $resendcode;
         $subject = "Your Confirmation Code";
         $headers = array(
                "MIME-Version" =>"1.0",
                "Content-Type" =>"text/html;charset=UTF-8",
                "From" =>"Metareels support@metareels.pro",
                "Reply-To" =>"support@metareels.pro"
         );

          ob_start();
          include ("confirmation-code-email.php");
          $message = ob_get_contents();
          ob_get_clean();

          mail($to, $subject, $message, $headers);
     
     $_SESSION['confirm_code_resend_success'] = "Thank you for registering. We have resent a confirmation code to the email address provided, check your inbox (or spam) and enter it below.";
     header("Refresh:2 url ='verify_email.php'");
    }else {
        $_SESSION['confirm_code_resend_fail'] = "Something went wrong, try again.";
     header("Refresh:2 url ='verify_email.php");
    } 

        
    } else {
        header("location: ../signin/index.php?s_E");
    }
}

$sql->close();
$con->close();

}


ob_end_flush();
?>


<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/favicon.png"><!-- Site Title  -->
    <title>Metareels</title><!-- Vendor Bundle CSS -->
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
