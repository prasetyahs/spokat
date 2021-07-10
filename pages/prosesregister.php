<?php
require_once("../config/koneksi.php");
  $username = $_POST['username'];
  $no_hp = $_POST['no_hp'];
  $password = md5($_POST['password']);
  //mengecek username sama atau tidak
  $data = mysqli_query($con,"select * from users where username='$username'");
  $jumlah = mysqli_num_rows($data);
  $hasil = mysqli_fetch_assoc($data);
      if(!$username || !$no_hp || !$password ){
         echo "<script>alert('Masih ada data Kosong'); window.location.href = 'register.php';</script>";
      }else{
          if ($jumlah > 0){
          echo "<script>alert('Username ada yang sama'); window.location.href = 'register.php';</script>";
          }else{
            $simpan = mysqli_query($con,"INSERT INTO users VALUES(null,
                                                                   '$username',
                                                                   '$password',
                                                                   '$no_hp',
                                                                   'user')")or trigger_error(mysqli_error($con)." in ");
          }
      }
      if (!$simpan) {
          echo "<script>alert('Maaf gagal register'); window.location.href = 'register.php';</script>";
      }else{
          echo "<script>alert('Berhasil register'); window.location.href = 'login.php';</script>";
      }
?>