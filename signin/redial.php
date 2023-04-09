<?php
ob_start();
include "../config/db_conn.php";
include "../config/session.php";

$r_stmt = $con->prepare("SELECT * FROM users WHERE id=?");
$r_stmt->bind_param('i', $session_id);
$r_stmt->execute();
$result = $r_stmt->get_result();
$row = $result->fetch_assoc();

if ($row['rank'] == 1 && $row['verified'] == 1) {

				 header("location: ../admin");
				 session_write_close();
				 exit();
			}
			else if ($row['rank'] == 0 && $row['verified'] == 1) {
				$p_stmt = $con->prepare("SELECT user_id FROM payments WHERE user_id = ?");
				$p_stmt->bind_param('i', $session_id);
				$p_stmt->execute();
				$result = $p_stmt->get_result();

				if ($result->num_rows > 0) {
					header("location: ../dashboard");
				} else {
					header("location: ../dashboard/pay.php");
				}
				
				session_write_close();
				exit();
			} else {
			 	$_SESSION['unverified'] = "Failed, your account has not been verified";
			    header("location: index.php");
			}

$r_stmt->close();
$p_stmt->close();
$con->close();

ob_end_flush();
 ?>