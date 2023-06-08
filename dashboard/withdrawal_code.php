<?php 
ob_start();
include '../config/db_conn.php';
include '../config/function.php';
include '../config/session.php';

$sql = query("SELECT user_id FROM payments WHERE user_id='$session_id'");
confirm($sql);

if (mysqli_num_rows($sql) < 1) {
    header("location: pay.php");

}

$ru_sql = query("SELECT * FROM users WHERE id='$session_id'");
confirm($sql);
$row = fetch_array($ru_sql);


?>

<?php

                if (isset($_POST['withdrawal'])) {
                    $user_id = $session_id;
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $email = $row['email'];
                    $bank = $con->real_escape_string($_POST['bank']);
                    $acct_no = $con->real_escape_string($_POST['acct_no']);
                    $amt = $con->real_escape_string($_POST['amt']);
                    date_default_timezone_set('Africa/Lagos');
                    $req_date = date('m/d/Y h:i:s a', time());

                    if ($row['acct_bal'] >= $amt && $amt != '0' ) {
                   
                    $stmt = $con->prepare("INSERT INTO withdrawal_req (user_id, firstname, lastname, email, bank, acct_number, amount, req_date) VALUES (?,?,?,?,?,?,?,?)");
                    $stmt->bind_param('ssssssss', $user_id,$firstname,$lastname,$email,$bank,$acct_no,$amt,$req_date);

                    if ($stmt->execute()) {

                            //update account balance after withdrawal req.

                        $new_acct_bal = $row['acct_bal'] - number_format($amt, 2);
                        //update account balance in db
                        $ab_update = query("UPDATE users SET acct_bal='$new_acct_bal' WHERE id='$session_id'");
                        confirm($ab_update);
                         header("location: withdrawal.php?success");
                    } else {
                        header("location: withdrawal.php?failed");
                    }

                 } elseif ($amt == '0') {
                     header("location: withdrawal.php?z");
                 } else {
                    header("location: withdrawal.php?insufficient");
                 }

                    $stmt->close();
                    $con->close();
                }

                 ?>
