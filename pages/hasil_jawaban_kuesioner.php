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
                    <h1>Data Transaksi</h1>
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
                                        <th>Nama User</th>
                                        <th>Pertanyaan</th>
                                        <th>Jawaban</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT users.username,tb_jawaban_kuesioner.*,tb_kuesioner.* FROM tb_jawaban_kuesioner join users on tb_jawaban_kuesioner.id_user = users.id_user join tb_kuesioner on tb_jawaban_kuesioner.id_kuesioner = tb_kuesioner.id_kuesioner";
                                    $execute = mysqli_query($con, $query);
                                    $result = mysqli_fetch_all($execute, MYSQLI_ASSOC);
                                    $no = 1;
                                    foreach ($result as $dt) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $dt['username'] ?></td>
                                            <td><?= $dt['pertanyaan'] ?></td>
                                            <td>
                                                <div style="width: 100px;" class="<?= $dt['jawaban'] == 'Baik' ? 'bg-success' : 'bg-warning' ?> pl-2 pr-2 text-center rounded">
                                                    <span style="font-size: 13px;" class="text-white"><?= $dt['jawaban'] ?></span>
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
<!-- /.content-wrapper -->
<?php
require_once 'layout/footer.php';
?>