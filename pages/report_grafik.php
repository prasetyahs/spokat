<?php
include '../functions/crud.php';
require_once("../config/koneksi.php");
require_once 'layout/header.php';
require_once 'layout/sidebar.php';
include '../functions/laporan-grafik.php';

$years = date('Y');

if(isset($_POST['submit_filter'])){
    $years = $_POST['tahun'];
}


$dataGrafikTransaksi = readGrafikTransaksi($years,$con);
$dataLayanan = readDataAllRow($con,"SELECT nama_layanan FROM layanan");
$arrayLayanan = [];
for($i = 0; $i < count($dataLayanan); $i++){
    $namaLayanan = $dataLayanan[$i]['nama_layanan'];
    array_push($arrayLayanan,$namaLayanan);
}
$dataGrafikLayanan = readGrafikLayanan($years,$con);
$dataGrafikJk = readGrafikJk($years,$con);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Grafik</h1>
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
                        <div class="card-body p-4">
                            <form action="" method="post">
                            <div class="row">
                                <div class="col-8 mr-auto"></div>
                                <div class="col-4">
                                    <div class="row">
                                            <div class="col-7">
                                                <input name="tahun" value="<?= $years ?>" autocomplete="off" id="datepicker" style="position:relative;right:-20px;" class="form-control">
                                            </div>
                                            <div class="col-5">
                                                <button type="submit"  name="submit_filter" class="btn btn-outline-primary" style="float: right;"><i class="fa fa-filter"></i> Filter Tahun</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Grafik Transaksi</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Grafik Layanan</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Grafik Jenis Kelamin</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <h4 class="text-center mt-4">Data Transaksi Tahun <?= $years ?></h4>
                                    <canvas id="myChart"></canvas>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab pt-4 pb-2">
                                    <div class="chart-pie pt-4 pb-2">
                                        <h4 class="text-center mt-4">Grafik Transaksi Berdasarkan Layanan Tahun <?= $years ?></h4>
                                        <canvas id="chartLayanan" height="100"></canvas>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <div class="chart-pie pt-4 pb-2">
                                    <h4 class="text-center mt-4">Grafik Transaksi Berdasarkan Jenis Kelamin Tahun <?= $years ?></h4>
                                        <canvas id="chartJk" height="80"></canvas>
                                    </div>
                                </div>
                            </div>
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
<!-- Modal -->


<?php
require_once 'layout/footer.php';
?>
<div class="modal fade" id="modalFilter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    $("#datepicker").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    });
</script>