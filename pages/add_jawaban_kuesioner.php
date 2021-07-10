<?php
require_once("../config/koneksi.php");

$user_id = $_SESSION['id_user'];
$sql = "SELECT * FROM  tb_kuesioner";
$exec = mysqli_query($con, $sql);
$row = mysqli_fetch_all($exec,MYSQLI_ASSOC);
$i = 1;
foreach ($row as $dt) {
    $result = $_POST['question' . $i];
    $id_kuesioner = $dt['id_kuesioner'];
    $query = "INSERT INTO tb_jawaban_kuesioner (id_kuesioner,id_user,jawaban) VALUES ($id_kuesioner,$user_id,'$result')";
    $ex = mysqli_query($con, $query);
    $i++;
}
echo "<script>alert('Berhasil Menyiman kuesioner,Terimakasih atas Jawabannya'); window.location.href = 'transaction_list.php';</script>";