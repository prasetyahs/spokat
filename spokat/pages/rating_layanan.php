<?php
require_once("../config/koneksi.php");
require_once 'layout/header.php';
require_once 'layout/sidebar.php';

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Hasil Rating</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                          
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Layanan</th>
                                        <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM  layanan";
                                    $exec = mysqli_query($con, $sql);
                                    $result = mysqli_fetch_all($exec, MYSQLI_ASSOC);
                                    $no = 1;
                                    foreach ($result as $dt) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?>.</td>
                                            <td><?= $dt['nama_layanan'] ?></td>
                                            <td>
                                                <div class="col-12 d-flex justify-content-center">
                                                    <a href="hasil_rating.php?id_layanan=<?= $dt['id_layanan'] ?>" class="btn btn-outline-primary"><i class="fa fa-edit"></i> Lihat Hasil Rating</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php
require_once 'layout/footer.php';
?>
