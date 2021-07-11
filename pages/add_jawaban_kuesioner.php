<?php
require_once("../config/koneksi.php");

$user_id = $_SESSION['id_user'];
$id_transaksi = $_POST['id_transaksi'];
$sql = "SELECT * FROM  tb_kuesioner";
$exec = mysqli_query($con, $sql);
$row = mysqli_fetch_all($exec, MYSQLI_ASSOC);
$i = 1;
foreach ($row as $dt) {
    if (isset($_POST['question' . $i])) {
        $result = $_POST['question' . $i];
    }
    if (!empty($result)) {
        $id_kuesioner = $dt['id_kuesioner'];
        $query = "INSERT INTO tb_jawaban_kuesioner (id_kuesioner,id_user,id_transaksi,jawaban) VALUES ($id_kuesioner,$user_id,$id_transaksi,'$result')";
        $ex = mysqli_query($con, $query);
    } else {
        echo "<script>alert('Isi kuesioner dengan benar'); window.location.href = 'transaction_list.php';</script>";
        die;
    }
    $i++;
}
echo "<script>alert('Berhasil Menyiman kuesioner,Terimakasih atas Jawabannya'); window.location.href = 'transaction_list.php';</script>";
