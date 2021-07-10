<?php

session_start();
//logout
$_SESSION['username'] = '';
unset($_SESSION['username']);
session_unset();
session_destroy();
echo "<script>alert('Logout Berhasil'); window.location.href = 'login.php';</script>";

?>