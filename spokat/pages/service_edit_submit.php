<?php
require_once("../config/koneksi.php");
	$id_layanan = $_POST['id_layanan'];
	$nama_layanan = $_POST['nama_layanan'];
	$harga = $_POST['harga'];
	$harga_r = str_replace(".","",$harga);
	$deskripsi = $_POST['deskripsi'];
	$query=mysqli_query($con,"update layanan set nama_layanan='$nama_layanan',deskripsi='$deskripsi', harga='$harga_r' where id_layanan='$id_layanan'");
	if($query){
		echo "<script>alert('Data Berhasil diupdate'); window.location.href = 'service_list.php';</script>";
	}else{
		echo "<script>alert('Gagal update Data'); window.location.href = 'service_edit.php';</script>";
		echo mysqli_error();
	}
?>