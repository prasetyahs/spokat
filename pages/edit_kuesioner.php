<?php
require_once("../config/koneksi.php");

$id = $_POST['id_kuesioner'];
$question = $_POST['question'];
$query = "UPDATE tb_kuesioner set pertanyaan = '$question' where id_kuesioner = '$id' ";
mysqli_query($con, $query);
echo "<script>alert('Berhasil Merubah kuesioner'); window.location.href = 'kuesioner.php';</script>";

