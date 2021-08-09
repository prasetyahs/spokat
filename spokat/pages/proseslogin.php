<?php
require_once("../config/koneksi.php");
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	//cek data
	$data = mysqli_query($con,"select * from users where username='$username' and 
		password='$password'");
	$jumlah = mysqli_num_rows($data);
	$hasil = mysqli_fetch_assoc($data);
	// die;
	//cek user sudah ada
	if($jumlah == 0) {
		echo "<script>alert('User belum terdaftar'); window.location.href = 'login.php';</script>";
	} else {
		//cek password salah
		if($password <> $hasil['password']) {
			echo "Password Salah!<br/>";
			echo "<a href='login.php'>Back</a>";
		} else {
				$_SESSION['username'] = $hasil['username'];
				$_SESSION['hak_akses'] = $hasil['hak_akses'];
				$_SESSION['id_user'] = $hasil['id_user'];
			 echo "<script>alert('Login Berhasil'); window.location.href = 'index.php';</script>";
		}
	}
?>