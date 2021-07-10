<?php

require_once("../config/koneksi.php");

$rate = $_POST['rating'];
$message = $_POST['message'];
$id_transaksi = $_POST['id_transaksi'];

if (!empty($rate) && !empty($message)) {
    $query = "INSERT INTO tb_rating VALUES ('','$id_transaksi','$message','$rate')";
    $execute = mysqli_query($con, $query);    
    echo "<script>alert('Sukses Mereview Pesananmu'); window.location.href = 'transaction_list.php';</script>";
} else {
    echo "<script>alert('Masih ada data Kosong'); window.location.href = 'transaction_list.php';</script>";
}
