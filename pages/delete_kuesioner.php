<?php

require_once("../config/koneksi.php");

$id = $_GET['id_kuesioner'];
$query = "DELETE From tb_kuesioner where id_kuesioner = '$id'";
$ex = mysqli_query($con, $query);
echo "<script>alert('Berhasil Hapus'); window.location.href = 'kuesioner.php';</script>";
