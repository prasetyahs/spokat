<?php
include '../config/koneksi.php';
$username = $_POST['username'];
$no_hp = $_POST['no_hp'];
$password = md5($_POST['password']);
$hak_akses = $_POST['hak_akses'];
$data = mysqli_query($con,"select * from users where username='$username'");
$jumlah = mysqli_num_rows($data);
$hasil = mysqli_fetch_assoc($data);
	if(!$username || !$password || !$no_hp || !$hak_akses){
	  echo "<script>alert('Masih ada data Kosong'); window.location.href = 'user_add.php';</script>";
	}else{
	  if ($jumlah > 0){
          echo "<script>alert('Username ada yang sama'); window.location.href = 'user_add.php';</script>";
      }else{
      	$simpan = mysqli_query($con,"insert into users values(null,'$username','$password','$no_hp','$hak_akses')")or trigger_error(mysqli_error($con)." in ");	
      }
	}
	if (!$simpan) {
        echo "<script>alert('Maaf gagal menambah data'); window.location.href = 'user_add.php';</script>";
    }else{
        echo "<script>alert('Data Berhasil ditambah'); window.location.href = 'user_list.php';</script>";
    }
?>
