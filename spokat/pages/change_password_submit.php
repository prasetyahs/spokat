<?php
require_once("../config/koneksi.php");
	$id_user = $_SESSION['id_user'];
	$password = md5($_POST['password']);
	$query=mysqli_query($con,"update users set password='$password' where id_user='$id_user'");
	if($query){
		echo "<script>alert('Data Berhasil diupdate'); window.location.href = 'change_password.php';</script>";
	}else{
		echo "<script>alert('Gagal update Data'); window.location.href = 'change_password.php';</script>";
		echo mysqli_error();
	}
?>