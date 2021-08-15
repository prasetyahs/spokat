<?php
require_once("../config/koneksi.php");
require_once "../functions/crud.php";
require_once 'layout/header.php';
require_once 'layout/sidebar.php';

$dataReview = readDataAllRow($con, "SELECT * FROM tb_rating 
join transaksi on tb_rating.id_transaksi = transaksi.transaksi_id join users on users.id_user = transaksi.id_user 
join layanan on transaksi.id_layanan = layanan.id_layanan");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Review Pelanggan</h1>
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
                            <?php if ($_SESSION['hak_akses'] == 'user') { ?>
                                <div class="row justify-content-between">
                                    <p><a href="transaction_add.php" class="btn btn-success"><i class="fa fa-plus"></i> Transaksi Baru</a></p>

                                </div>
                            <?php } ?>
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Invoice</th>
                                        <th>Nama Pengguna Jasa</th>
                                        <th>Nama Layanan</th>
                                        <th>Pesan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i =0;
                                    foreach ($dataReview as $v) {
                                    ?>
                                        <tr>
                                            <td style="font-weight: bold;"><?= ++$i ?>.</td>
                                            <td><?= $v['invoice'] ?></td>
                                            <td><?= $v['nama'] ?></td>
                                            <td><?= $v['nama_layanan'] ?></td>
                                            <td><?= $v['pesan'] ?></td>
                                  
                                        </tr>
                                    <?php    }
                                    ?>
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