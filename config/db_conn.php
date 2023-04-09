<?php

$con = new mysqli("localhost", "root", "", "metareels");
if (!$con) {
    echo "Not connected to database" . mysqli_error($con);
}

?>