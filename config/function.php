<?php

function query($sql) {

	global $con;
	return mysqli_query($con, $sql);
}

function confirm($result) {
	global $con;
	if (!$result) {
		die("Query failed ".mysqli_error($con));
	}
}

function escape_string($string) {
	global $con;
	return mysqli_real_escape_string($con, $string);
}

function fetch_array($result) {
	return mysqli_fetch_array($result);
}

?>