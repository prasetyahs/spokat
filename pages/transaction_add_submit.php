<?php
require_once("../config/koneksi.php");
  $id_layanan = $_POST['id_layanan'];
  $id_user = $_POST['id_user'];
  $transaksi_jml_sepatu = $_POST['transaksi_jml_sepatu'];
  $harga = $_POST['harga'];
  $transaksi_status = 0;
  $transaksi_tgl = date('Y-m-d');
  $alamat = $_POST['alamat'];

  $total_harga = ($harga * $transaksi_jml_sepatu) + 15000; 

      if(!$id_layanan || !$transaksi_jml_sepatu || !$alamat ){
         echo "<script>alert('Masih ada data Kosong'); window.location.href = 'transaction_add.php';</script>";
      }else{
          $simpan = mysqli_query($con,"INSERT INTO transaksi VALUES(null,
                                                                   null,
                                                                   '$id_layanan',
                                                                   '$id_user',
                                                                   '$transaksi_jml_sepatu',
                                                                   '$total_harga',
                                                                   '$transaksi_status',
                                                                   '$transaksi_tgl',
                                                                   null,
                                                                   '$alamat',
                                                                   null)")or trigger_error(mysqli_error($con)." in ");
      }
      if (!$simpan) {
          echo "<script>alert('Maaf gagal order'); window.location.href = 'transaction_add.php';</script>";
      }else{
        echo "<script>alert('Berhasil order Silahkan Upload Bukti Transaksi'); window.location.href = 'transaction_list.php';</script>";
      }
?>