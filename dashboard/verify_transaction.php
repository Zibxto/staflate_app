<?php
include "../config/db_conn.php";
include '../config/function.php';
include '../config/session.php';

$sql = query("SELECT * FROM users WHERE id='$session_id'");
confirm($sql);
$row = fetch_array($sql);
$user_id = $row['id'];

$ref = $_GET['reference'];
if ($ref =='') {
  header("loaction: javascript://history.go(-1)");
}

  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_7e51739b1e51e1609027b8e124a7e9c5e4c0b9f1",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    // convert json object to php object
    $result = json_decode($response);
  }
    // check if payment was successful  
  if ($result->data->status == 'success') {
    $status = $result->data->status;
    $reference = $result->data->reference;
    $email = $result->data->customer->email;
    $firstname = $result->data->customer->first_name;
    $lastname = $result->data->customer->last_name;
    date_default_timezone_set('Africa/Lagos');
    $payment_date = date('m/d/Y h:i:s a', time());

    $stmt = $con->prepare("INSERT INTO payments (user_id,firstname,lastname,email,status,reference,payment_date) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param('sssssss', $user_id,$firstname,$lastname,$email,$status,$reference,$payment_date);
    $stmt->execute();

    if ($stmt) {
      // 	 send email optional
      $to = $email;
         $subject = "Payment Confirmation";
         $headers = array(
                "MIME-Version" =>"1.0",
                "Content-Type" =>"text/html;charset=UTF-8",
                "From" =>"Metareels support@metareels.pro",
                "Reply-To" =>"support@metareels.pro"
         );

         $referral_code = $_SESSION['referral_code'];

          ob_start();
          include ("payment-confirmation-email.php");
          $message = ob_get_contents();
          ob_get_clean();

          mail($to, $subject, $message, $headers);
          header("Refresh: 2 url='index.php'");
    }

  $stmt->close();
  $con->close();

  }

   else {
    $_SESSION['payment_failed'] = "Payment failed, try again";
    header("Refresh: 2 url='pay.php'");
    exit;
  }

  unset($_SESSION['referral_code']);
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
