<?php
require_once("../config/koneksi.php");
	$id_user = $_POST['id_user'];
	$username = $_POST['username'];
	$no_hp = $_POST['no_hp'];
	$ps = $_POST['password'];
	if($ps != ""){
		$password = md5($_POST['password']);
		$query=mysqli_query($con,"update users set password='$password', no_hp='$no_hp' where id_user='$id_user'");
		if($query){
			echo "<script>alert('Data Berhasil diupdate'); window.location.href = 'user_list.php';</script>";
		}else{
			echo "<script>alert('Gagal update Data'); window.location.href = 'user_edit.php';</script>";
			echo mysqli_error();
		}
	}else{
		$query=mysqli_query($con,"update users set no_hp='$no_hp' where id_user='$id_user'");
		if($query){
			echo "<script>alert('Data Berhasil diupdate'); window.location.href = 'user_list.php';</script>";
		}else{
			echo "<script>alert('Gagal update Data'); window.location.href = 'user_edit.php';</script>";
			echo mysqli_error();
		}
	}
?>