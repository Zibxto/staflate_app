<?php
ob_start();
	include '../config/db_conn.php';
      include '../config/session.php';
    include '../config/function.php';

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Admin - Dashboard</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="../dashboard/image/png" href="images/favicon.png">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/icons.css">
	<link rel="stylesheet" href="css/ui.css">
	<link rel="stylesheet" href="css/added.css">
</head>
<body class="crypt-light">

<?php 


            $u = query("SELECT * FROM users WHERE id='$session_id'");
            confirm($u);
            $q_row = fetch_array($u);

            if ($q_row['rank'] == '0') {
            	header("location: ../dashboard/logout.php");
            }
       
    ?>

	<header>
		<div class="container-full-width">
			<div class="crypt-header">
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-5">
						<div class="row">
							<div class="col-xs-2">
								<a href="index.php">
								<div class="crypt-logo"><img src="../img/logo" alt="">
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-8 d-none d-md-block d-lg-block">
						<ul class="crypt-heading-menu fright">
							<li><a href="index.php">Members</a></li>
							<li><a href="payments.php">Payments</a></li>
							<li><a href="withdrawal.php">Withdrawal_Req.</a></li>
							<li><a href="upload_courses.php">Upload Courses</a></li>
                            <li class="crypt-box-menu menu-green"><a href="../dashboard/logout.php">Logout</a></li>
                            <li class="crypt-box-menu"><b>WELCOME ADMIN <span style="color: tomato;"><?php echo $q_row['firstname']." ".$q_row['lastname']; ?></span></b></li>
						</ul>
					</div>
					<i class="menu-toggle pe-7s-menu d-xs-block d-sm-block d-md-none d-sm-none"></i>
				</div>
			</div>
		</div>
		<div class="crypt-mobile-menu">
			<ul class="crypt-heading-menu">
				<li><a href="index.php">Members</a></li>
				<li><a href="payments.php">Payments</a></li>
				<li><a href="withdrawal.php">Withdrawal_Req.</a></li>
				<li><a href="upload_courses.php">Upload Courses</a></li>
				<li class="crypt-box-menu menu-green"><a href="../dashboard/logout.php">Logout</a></li>
				<li class="crypt-box-menu"><a><b>WELCOME <?php echo $q_row['firstname']." ".$q_row['lastname']; ?></b></a></li>
			</ul>
		</div>
	</header> <br><br>

