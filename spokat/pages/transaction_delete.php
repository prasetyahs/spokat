<?php
require_once("../config/koneksi.php");
$id = $_GET['id'];
$sql=mysqli_query($con,"delete from transaksi where transaksi_id='$id'")or trigger_error(mysqli_error($con)." in ");
if($sql){
	 echo "<script>alert('Data Berhasil dihapus'); window.location.href = 'transaction_list.php';</script>";
}else{
	echo "<script>alert('Gagal hapus data'); window.location.href = 'transaction_list.php';</script>";
}
?>