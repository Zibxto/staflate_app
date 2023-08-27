<?php 
if (isset($_GET['signout'])) {
     echo "<script>alert('Logout Successful')</script>";
}

header("location: signup/index.php");
?>