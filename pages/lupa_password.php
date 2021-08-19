<?php
include '../config/koneksi.php';
include '../functions/crud.php';
include '../functions/users.php';

$dataExist = false;
if (isset($_POST['cek_data'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    // var_dump($username != null && $email != null);die;
    if ($username != null && $email != null) {

        if (cekData($_POST['username'], $_POST['email'], $con) == true) {
            $dataExist = true;
           
        } else {
            $_SESSION['message'] = "Data Pengguna Tidak ditemukan !";
            $_SESSION['notif'] = true;
        }
    } else {
        $_SESSION['message'] = "Data tidak boleh kosong !";
        $_SESSION['notif'] = true;
    }
}

if (isset($_POST['change_password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $dataExist = true;
    if (changePassword($_POST, $con) == true) {
        $dataExist = false;
        $_SESSION['message'] = "Konfirmasi password yang anda input tidak sama !";
        $_SESSION['notif_success'] = true;
    }else{
        $_SESSION['message'] = "Konfirmasi password yang anda input tidak sama !";
        $_SESSION['notif_pass'] = true;
    }
}

if (isset($_POST['refresh'])) {
    $dataExist = false;
}



?>

<!DOCTYPE html>
<html>

<head>
    <title>SPOKAT WASH</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
</head>
<link rel="shortcut icon" href="logo/resik.png">

<body style="background: #f0f0f0">
    <br />
    <br />
    <center>
        <h2>SPOKAT WASH</h2>
    </center>
    <br />
    <br />

    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <form action="" method="post">
                <div class="panel">
                    <br />
                    <div class="panel-body">
                        <?php if (isset($_SESSION['notif'])) { ?>
                            <div class="alert alert-danger">
                                <?= $_SESSION['message'] ?>
                            </div>
                        <?php } ?>
                        <?php unset($_SESSION['notif']) ?>
                        <?php unset($_SESSION['message']) ?>
                        <?php if (isset($_SESSION['notif_success'])) { ?>
                                <div class="alert alert-success">
                                <center><strong>Selamat !</strong> Password anda berhasil diperbarui</center>
                                </div>
                            <?php } ?>
                            <?php unset($_SESSION['notif_success']) ?>
                        <?php if ($dataExist == false) { ?>
                            <div class="form-group">
                                <label>Usename</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <input type="submit" name="cek_data" class="btn btn-primary" value="Cek Data">
                        <?php } else { ?>
                            <div class="form-group">
                                <label>Usename</label>
                                <input type="text" readonly value="<?= $username ?>" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" readonly value="<?= $email ?>" class="form-control" name="email">
                            </div>
                            <input type="submit" name="refresh" class="btn btn-primary" value="Kembali">
                        <?php } ?>
                        </form>

                        <hr>
                        <form action="" method="post">
                        <input type="hidden" readonly value="<?= $username ?>" class="form-control" name="username">
                        <input type="hidden" readonly value="<?= $email ?>" class="form-control" name="email">
                        <?php if ($dataExist == true) { ?>
                            <?php if (isset($_SESSION['notif_pass'])) { ?>
                                <div class="alert alert-danger">
                                <center> Konfirmasi password yang anda input tidak sama !</center>
                                </div>
                            <?php } ?>
                            <?php unset($_SESSION['notif_pass']) ?>
                            <?php unset($_SESSION['message']) ?>
                           
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="password" required class="form-control" name="new_pass">
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" required class="form-control" name="confirm_pass">
                            </div>
                            <input type="submit" class="btn btn-primary" name="change_password" value="Perbarui Password">
                        <?php } ?>
                        </form>
                    </div>
                </div>
                <br />
                <p>Kembali <a href="login.php">Login</a></p>
        </div>
        

    </div>
    </div>
</body>

</html>