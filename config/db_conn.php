<?php

$con = new mysqli("localhost", "root", "", "Staflate");
if (!$con) {
    echo "Not connected to database" . mysqli_error($con);
}

?>