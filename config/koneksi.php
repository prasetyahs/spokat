<?php
	$con = @mysqli_connect("localhost", "root", "", "spokat");
	global $con;
	//cek koneksi error atau tidak
	if ($con->connect_error) {
		echo "Error: " . $con->connect_error;
		exit();
	}
	session_start();
?>