<?php
ob_start();
include "../config/db_conn.php";

if (isset($_POST['login'])) {
	
	$email = $con->real_escape_string($_POST['email']);
	$password = $con->real_escape_string($_POST['password']);
	$password = md5($password);

	$sel_stmt = $con->prepare("SELECT * FROM users WHERE email=? AND password=?");
	$sel_stmt->bind_param('ss', $email, $password);
	$sel_stmt->execute();
	$result = $sel_stmt->get_result();
	$row = $result->fetch_assoc();

	if ($result->num_rows > 0) {

		session_start();
		session_regenerate_id();
		$_SESSION['id'] = $row['id'];
		header("Refresh:2 url ='redial.php'");
		session_write_close();	
	} else {
				session_start();
				$_SESSION['invalid_login'] = "Email or Password Incorrect!";
				header("Refresh:2 url ='index.php'");	
				session_write_close();
			}

	$sel_stmt->close();
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
    <title>Staflate</title><!-- Vendor Bundle CSS -->
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
