<?php
require_once("../config/koneksi.php");
require_once 'layout/header.php';
require_once 'layout/sidebar.php';
include '../functions/crud.php';
include '../functions/hasil_rating.php';

$idLayanan = $_GET['id_layanan'];
$getDataLayanan = readDataPerRow($con, "SELECT * FROM layanan WHERE id_layanan = $idLayanan");
$getDataRating = getDataRating($idLayanan,$con);
// var_dump($getDataRating);die;
$dataUlasan = readDataAllRow($con,"SELECT * FROM tb_rating
                                        JOIN transaksi ON tb_rating.id_transaksi = transaksi.transaksi_id 
                                        WHERE id_layanan = $idLayanan");
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
                        <div class="card-body p-4">
                            <h5>Data Rating Layanan <?= $getDataLayanan['nama_layanan'] ?></h5>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <div class="d-flex justify-content-center">
                                        <?php if(is_nan($getDataRating['rata_rata'])){ ?>
                                        <h1 class="font-weight-bold txt-rating">0
                                        <?php }else{ ?>
                                        <h1 class="font-weight-bold txt-rating"><?= $getDataRating['rata_rata'] ?>
                                        <?php } ?>
                                            <span style="font-size: 30%;margin-left:-15px;">/5</span>
                                        </h1>
                                         <br>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="clip-star" style="background: gold;width: 50px; height: 50px;"></div>
                                        <div class="clip-star" style="background: gold;width: 50px; height: 50px;"></div>
                                        <div class="clip-star" style="background: gold;width: 50px; height: 50px;"></div>
                                        <div class="clip-star" style="background: gold;width: 50px; height: 50px;"></div>
                                        <div class="clip-star" style="background: gold;width: 50px; height: 50px;"></div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                    <!-- bintang 5 -->
                                    <?php 
                                        if($getDataRating['rata_rata'] != 0){

                                            $lengthProgress5 = ($getDataRating['bintang5']/$getDataRating['all_bintang'])*100;
                                            $lengthProgress4 = ($getDataRating['bintang4']/$getDataRating['all_bintang'])*100;
                                            $lengthProgress3 = ($getDataRating['bintang3']/$getDataRating['all_bintang'])*100;
                                            $lengthProgress2 = ($getDataRating['bintang2']/$getDataRating['all_bintang'])*100;
                                            $lengthProgress1 = ($getDataRating['bintang1']/$getDataRating['all_bintang'])*100;
                                        }
                                    ?>
                                    <div class="row text-left">
                                        <div class="pull-left col-sm-2 col-md-3 col" style="line-height: 1;"><span class="clip-star1"></span><span style="font-size: 25px; padding-left: 10px;">5</span></div>
                                        <div class="text-left col-sm-8 col-md-7 col pos-progress">
                                            <div class="progress " style="height: 9px; margin: 8px 0px; width: 100%;">
                                                <div role="progressbar" class="progress-bar progress-bar-success" style="width: <?= $lengthProgress5 ?>%;"></div>
                                            </div>
                                        </div>
                                        <div class="text-right col col-2 pos-progress">
                                            <?= $getDataRating['bintang5'] ?>
                                        </div>
                                    </div>
                                    <!-- Bintang 4 -->
                                    <div class="row text-left mt-3">
                                        <div class="pull-left col-sm-2 col-md-3 col" style="line-height: 1;"><span class="clip-star1"></span><span style="font-size: 25px; padding-left: 10px;">4</span></div>
                                        <div class="text-left col-sm-8 col-md-7 col pos-progress">
                                            <div class="progress " style="height: 9px; margin: 8px 0px; width: 100%;">
                                                <div role="progressbar" class="progress-bar progress-bar-success" style="width: <?= $lengthProgress4 ?>%;"></div>
                                            </div>
                                        </div>
                                        <div class="text-right col col-2 pos-progress">
                                        <?= $getDataRating['bintang4'] ?>
                                        </div>
                                    </div>
                                    <!-- Bintang 3 -->
                                    <div class="row text-left mt-3">
                                        <div class="pull-left col-sm-2 col-md-3 col" style="line-height: 1;"><span class="clip-star1"></span><span style="font-size: 25px; padding-left: 10px;">3</span></div>
                                        <div class="text-left col-sm-8 col-md-7 col pos-progress">
                                            <div class="progress " style="height: 9px; margin: 8px 0px; width: 100%;">
                                                <div role="progressbar" class="progress-bar progress-bar-success" style="width: <?= $lengthProgress3 ?>%;"></div>
                                            </div>
                                        </div>
                                        <div class="text-right col col-2 pos-progress">
                                        <?= $getDataRating['bintang3'] ?>
                                        </div>
                                    </div>
                                    <!-- Bintang 2 -->
                                    <div class="row text-left mt-3">
                                        <div class="pull-left col-sm-2 col-md-3 col" style="line-height: 1;"><span class="clip-star1"></span><span style="font-size: 25px; padding-left: 10px;">2</span></div>
                                        <div class="text-left col-sm-8 col-md-7 col pos-progress">
                                            <div class="progress " style="height: 9px; margin: 8px 0px; width: 100%;">
                                                <div role="progressbar" class="progress-bar progress-bar-success" style="width: <?= $lengthProgress2 ?>%;"></div>
                                            </div>
                                        </div>
                                        <div class="text-right col col-2 pos-progress">
                                        <?= $getDataRating['bintang2'] ?>
                                        </div>
                                    </div>
                                    <!-- Bintang 1 -->
                                    <div class="row text-left mt-3">
                                        <div class="pull-left col-sm-2 col-md-3 col" style="line-height: 1;"><span class="clip-star1"></span><span style="font-size: 25px; padding-left: 10px;">1</span></div>
                                        <div class="text-left col-sm-8 col-md-7 col pos-progress">
                                            <div class="progress " style="height: 9px; margin: 8px 0px; width: 100%;">
                                                <div role="progressbar" class="progress-bar progress-bar-success" style="width: <?= $lengthProgress1 ?>%;"></div>
                                            </div>
                                        </div>
                                        <div class="text-right col col-2 pos-progress">
                                            <?= $getDataRating['bintang1'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Ulasan</th>
                                        <th>Rating</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($dataUlasan as $dt) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?>.</td>
                                            <td><?= $dt['pesan'] ?></td>
                                            <td><?= $dt['rate'] ?></td>
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