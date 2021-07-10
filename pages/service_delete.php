<?php
require_once("../config/koneksi.php");
$id = $_GET['id'];
$sql=mysqli_query($con,"delete from layanan where id_layanan='$id'")or trigger_error(mysqli_error($koneksi)." in ");
if($sql){
	 echo "<script>alert('Data Berhasil dihapus'); window.location.href = 'service_list.php';</script>";
}else{
	echo "<script>alert('Gagal hapus data'); window.location.href = 'service_list.php';</script>";
}
?>