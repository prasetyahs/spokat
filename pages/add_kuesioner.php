<?php

require_once("../config/koneksi.php");

$question = $_POST['question'];
$query = "INSERT INTO tb_kuesioner VALUES ('','$question')";
$execute = mysqli_query($con, $query);
if ($execute) {
    echo "<script>alert('Berhasil Menambah Pertanyaan'); window.location.href = 'kuesioner.php';</script>";
} else {
    echo "<script>alert('Sepertinya ada masalah, silahkan coba lagi'); window.location.href = 'kuesioner.php';</script>";
}
