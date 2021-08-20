<?php
require_once("../config/koneksi.php");
require_once 'layout/header.php';
require_once 'layout/sidebar.php';
require_once '../functions/crud.php';

if (isset($_POST['add_complain'])) {
    $kategori = $_POST['kategori'];
    $insert = "INSERT INTO tb_kategori_komplain VALUES('','$kategori')";
    $insert = mysqli_query($con, $insert);
    echo "<script>alert('Berhasil Menambahkan Data')</script>";
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = "DELETE FROM tb_kategori_komplain where id = $id";
    $delete = mysqli_query($con, $delete);
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Komplain</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Invoice</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Layanan</th>
                                        <th>Jenis Komplain</th>
                                        <th>Pesan</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $result = readDataAllRow($con, "SELECT * FROM tb_komplain join tb_kategori_komplain on tb_komplain.kategori_komplain = tb_kategori_komplain.id 
                                    join transaksi on tb_komplain.id_transaksi = transaksi_id join users on users.id_user = transaksi.id_user join layanan on layanan.id_layanan = transaksi.id_layanan");
                                    foreach ($result as $dt) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?>.</td>
                                            <td><?= $dt['invoice'] ?></td>
                                            <td><?= $dt['transaksi_tgl'] ?></td>
                                            <td><?= $dt['nama'] ?></td>
                                            <td><?= $dt['nama_layanan'] ?></td>
                                            <td><?= $dt['jenis_komplain'] ?></td>
                                            <td><?= $dt['pesan'] ?></td>

                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-3">

                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <span class="text-bold" style="font-size: 20px;">
                                Tambah Kategori Komplain
                            </span>
                            <form action="" method="post">
                                <div class="form-group mt-2">
                                    <input name="kategori" id="kategori" class="form-control" placeholder="Kategori Komplain"></input>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Tambah" name="add_complain">
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <span class="text-bold" style="font-size: 20px;">
                                Kategori Komplain
                            </span>
                            <table id="example2" class="mt-2 table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Komplain</th>
                                        <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $result = readDataAllRow($con, "SELECT * FROM tb_kategori_komplain");
                                    foreach ($result as $dt) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?>.</td>
                                            <td><?= $dt['jenis_komplain'] ?></td>
                                            <td>
                                                <a href="complain.php?id=<?= $dt['id'] ?>" class="btn btn-sm btn-danger">Hapus</a>
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