<?php
require_once("../config/koneksi.php");
require_once 'layout/header.php';
require_once 'layout/sidebar.php';
require_once '../recommend.php';
$user_id = $_SESSION['id_user'];
function groupingArray($originalArray)
{
    $arr = array();
    foreach ($originalArray as $key => $item) {
        $arr[$item['id_user']][$key] = $item;
    }
    return $arr;
}
$id_user = $_SESSION['id_user'];
$sql = "SELECT tb_rating.rate,transaksi.id_user,layanan.nama_layanan FROM tb_rating join transaksi on tb_rating.id_transaksi = transaksi.transaksi_id join layanan on transaksi.id_layanan = layanan.id_layanan";
$exc = mysqli_query($con, $sql);
$result = mysqli_fetch_all($exc, MYSQLI_ASSOC);
if (!empty($result)) {
    $oldData = groupingArray($result);
    $newData =  new stdClass;
    foreach ($oldData as $k => $d) {
        $tmp = new stdClass;
        foreach ($d as $kl => $dl) {
            $nama_layanan = $dl['nama_layanan'];
            $rate  = $dl['rate'];
            if (property_exists($tmp, $nama_layanan)) {
                $n_same = 1;
                foreach ($d as $kt => $dt) {
                    $nl = $dt['nama_layanan'];
                    $r  = $dt['rate'];
                    if (property_exists($tmp, $nl)) {
                        ++$n_same;
                        $tmp->$nama_layanan = ($tmp->$nama_layanan + $r);
                        unset($oldData[$k][$kt]);
                    }
                }
                // $tmp->$nama_layanan = number_format(($tmp->$nama_layanan / $n_same), 1, '.', '');
                $tmp->$nama_layanan = sprintf("%.2f", ($tmp->$nama_layanan / $n_same));
            } else {
                $tmp->$nama_layanan = $rate;
            }
            unset($oldData[$k][$kl]);
        }
        $newData->$k = (array) $tmp;
    }
    $newData = (array) $newData;
    $re = new Recommend();
    if (array_key_exists($id_user, $newData) > 0) {
        $recommendations = $re->simulation($newData, $id_user);
    }
    $recommendations['original_data'] = $result;
    // print_r($recommendations);die;
}
$query = mysqli_query($con, "select id_layanan,nama_layanan from layanan");
$colspan = mysqli_num_rows($query);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Simulasi</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-header">
                                <h5>Data Original</h5>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Users ID</th>
                                            <th>Nama Layanan</th>
                                            <th>Rating</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($recommendations) && !empty($recommendations['original_data'])) {
                                            foreach ($recommendations['original_data'] as $key => $data) {
                                        ?>
                                                <tr>
                                                    <td>
                                                        <?= $data['id_user'] ?>

                                                    </td>
                                                    <td> <?= $data['nama_layanan'] ?></td>
                                                    <td>
                                                        <?= $data['rate'] ?>
                                                    </td>
                                                </tr>

                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-header">
                                <h5>Data Yang Sudah Dirata ratakan</h5>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <th>Users</th>
                                        <th colspan="<?= $colspan ?>">Nama Layanan + Nilai Rate</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($recommendations['rate'] as $k => $data) { ?>
                                            <tr>
                                                <td><?= "USERS " . $k ?></td>
                                                <?php foreach ($data as $key => $dd) {
                                                    if (array_key_exists($key, $data)) { ?>
                                                        <td><?= $key ?></td>
                                                        <td><?= $dd ?></td>
                                                    <?php } else { ?>


                                                <?php }
                                                } ?>
                                            </tr>

                                        <?php
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-header">
                                <h5>Hitung Similarity</h5>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <th>index</th>
                                        <th colspan="<?= $colspan ?>">Nilai Similarity</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($recommendations['similar'] as $k => $data) { ?>
                                            <tr>
                                                <td>
                                                    <?= $k ?>
                                                </td>
                                                <td>
                                                    <?= $data ?>
                                                </td>
                                            </tr>
                                        <?php
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-header">
                                <h5>Hitung Similarity Sum</h5>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <th>index</th>
                                        <th colspan="<?= $colspan ?>">Nilai Similarity Sum</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($recommendations['similarSum'] as $k => $data) { ?>
                                            <tr>
                                                <td>
                                                    <?= $k ?>
                                                </td>
                                                <td>
                                                    <?= $data ?>
                                                </td>
                                            </tr>
                                        <?php
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-header">
                                <h5>Hasil  Rekomendasi</h5>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <th>Peringkat Rekomendasi</th>
                                        <th>Layanan</th>
                                        <th colspan="<?= $colspan ?>">Nilai Similarity Sum</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($recommendations['rank'] as $k => $data) { ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td>
                                                    <?= $k ?>
                                                </td>
                                                <td>
                                                    <?= $data ?>
                                                </td>
                                            </tr>
                                        <?php
                                        } ?>
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

        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- The Modal -->
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
</div>
<script>
    // Get the modal
    var modal = document.getElementById("myModal");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");

    function getid(obj) {
        var img = document.getElementById(obj.id);
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
    }

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    // var img = document.getElementById("myImg");
    // var modalImg = document.getElementById("img01");
    // var captionText = document.getElementById("caption");
    // img.onclick = function(){
    //   modal.style.display = "block";
    //   modalImg.src = this.src;
    //   captionText.innerHTML = this.alt;
    // }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
</script>

<?php
require_once 'layout/footer.php';
?>

<div class="modal fade " id="modalKuesioner" tabindex="-1" role="dialog" aria-labelledby="modalKuesionerLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl	" role="document">
        <form action="add_jawaban_kuesioner.php" method="post">
            <input type="hidden" name="id_transaksi" id="id_transaksi">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title" id="modalKuesionerLabel">Kuesioner</h5>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>Baik</th>
                                    <th>Cukup</th>
                                    <th>Kurang</th>
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
                                        <td><?= $no ?>.</td>
                                        <td><?= $dt['pertanyaan'] ?></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="question<?= $no ?>" id="pertanyaan1" value="Baik">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="question<?= $no ?>" id="pertanyaan1" value="Cukup">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="question<?= $no ?>" id="pertanyaan1" value="Kurang">
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
        </form>
    </div>
</div>