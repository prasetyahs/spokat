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
                    <h1>Data Kuesioner</h1>
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
                            <p><a type="button" onclick="getIDTransaction(<?= $d['transaksi_id'] ?>)" href="transaction_list.php" class="btn btn-success" data-toggle="modal" data-target="#modalKuesioner">
                                    <i class="fa fa-plus"></i> Tambah Pertanyaan Baru
                                </a>
                            </p>
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pertanyaan</th>
                                        <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM  tb_kuesioner";
                                    $exec = mysqli_query($con, $sql);
                                    $result = mysqli_fetch_all($exec, MYSQLI_ASSOC);
                                    $no = 1;
                                    foreach ($result as $dt) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?>.</td>
                                            <td><?= $dt['pertanyaan'] ?></td>
                                            <td>
                                                <div class="col-12">
                                                    <a href="delete_kuesioner.php?id_kuesioner=<?= $dt['id_kuesioner'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                    <a data-toggle="modal" onclick="getIDKuesioner('<?= $dt['id_kuesioner'] ?>')" data-target="#modalEditKuesioner" href="/edit_kuesioner" class="btn btn-warning text-white"><i class="fa fa-edit"></i></a>
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
    <div class="modal fade " id="modalEditKuesioner" tabindex="-1" role="dialog" aria-labelledby="modalEditKuesionerLabel" aria-hidden="true">
        <div class="modal-dialog	" role="document">
            <form action="edit_kuesioner.php" method="post">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h5 class="modal-title" id="modalEditKuesionerLabel">Edit Data</h5>
                    </div>
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="question">Pertanyaan</label>
                                <input type="text" class="form-control" id="question" name="question" required>
                                <input type="hidden" class="form-control" id="id_kuesioner" name="id_kuesioner" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
            </form>
        </div>
    </div>
</div>
    <!-- /.content -->
</div>

<?php
require_once 'layout/footer.php';
?>

<div class="modal fade " id="modalKuesioner" tabindex="-1" role="dialog" aria-labelledby="modalKuesionerLabel" aria-hidden="true">
    <div class="modal-dialog	" role="document">
        <form action="add_kuesioner.php" method="post">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title" id="modalKuesionerLabel">Tambah Pertanyaan Kuesioner</h5>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="question">Pertanyaan</label>
                            <input type="text" class="form-control" id="question" name="question" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
        </form>
    </div>
</div>