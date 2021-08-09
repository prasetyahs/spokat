<?php
require_once("../config/koneksi.php");
  $id = $_POST['transaksi_id'];
  $lokasi_file = $_FILES['bukti_transfer']['tmp_name'];
  $tipe_file   = $_FILES['bukti_transfer']['type'];
  $nama_file   = $_FILES['bukti_transfer']['name'];
  $direktori   = "../assets/gambar/$nama_file";

  if (!empty($lokasi_file)) {
    move_uploaded_file($lokasi_file,$direktori);
    $query=mysqli_query($con,"update transaksi set bukti_transfer='$nama_file' where transaksi_id='$id'");
    echo "<script>alert('Bukti Berhasil di upload'); window.location.href = 'transaction_list.php';</script>";
  }else{
    echo "<script>alert('Maaf gagal upload bukti transfer'); window.location.href = 'transaction_list.php';</script>";
  }
?>