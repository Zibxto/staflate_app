<?php
session_start();

include '../config/db_conn.php';

        
        if (isset($_POST['confirm_code'])) {
        
            $cc = $con->real_escape_string($_POST['cc']);
            
            $vkey = $_SESSION['vkey'];
            
        
        if ($cc != $vkey) {
        
       $_SESSION['incorrect_cc'] = "Incorrect confirmation code";
       header("location: verify_email.php");
         }
     else {
        
        $update = $con->prepare("UPDATE users SET verified=? WHERE email=?");
        $update->bind_param('is', $verify_value,$email);
        $verify_value = 1;
        $email = $_SESSION['email'];
        $update->execute();

        $_SESSION['login_verified'] = "Your account has been verified, you may now login";
        header("location: ../signin/index.php");

        unset($_SESSION['vkey']);
        unset($_SESSION['email']);

        $update->close();
        $con->close();

        
    }
        
        } 

    ?>