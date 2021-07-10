<?php
require_once("../config/koneksi.php");
require_once 'layout/header.php';
require_once 'layout/sidebar.php';
$user_id = $_SESSION['id_user'];
if ($_SESSION['hak_akses'] == 'user') {
  $data = mysqli_query($con, "SELECT transaksi.*,users.username,layanan.nama_layanan FROM transaksi 
    INNER JOIN users ON transaksi.id_user = users.id_user
    INNER JOIN layanan ON transaksi.id_layanan = layanan.id_layanan 
    where transaksi.id_user = '$user_id'");
} else {
  $data = mysqli_query($con, "SELECT transaksi.*,users.username,layanan.nama_layanan FROM transaksi 
    INNER JOIN users ON transaksi.id_user = users.id_user
    INNER JOIN layanan ON transaksi.id_layanan = layanan.id_layanan");
}
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
              <?php if ($_SESSION['hak_akses'] == 'user') { ?>
                <div class="row justify-content-between">
                  <p><a href="transaction_add.php" class="btn btn-success"><i class="fa fa-plus"></i> Transaksi Baru</a></p>
                  <?php
                  $user_id = $_SESSION['id_user'];
                  $sql = "SELECT * FROM  tb_jawaban_kuesioner where id_user = $user_id";
                  $exec = mysqli_query($con, $sql);
                  $row = mysqli_num_rows($exec);
                  if ($row <= 0) {
                  ?>
                  <?php } ?>
                </div>
              <?php } ?>
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Invoice</th>
                    <th>Tanggal Order</th>
                    <?php if ($_SESSION['hak_akses'] == 'super' || $_SESSION['hak_akses'] == 'admin') { ?>
                      <th>Pelanggan</th>
                    <?php } ?>
                    <th>Layanan</th>
                    <th>Tanggal Selesai</th>
                    <th>Harga</th>
                    <th>Status Order</th>
                    <th>Bukti Transfer</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($d = mysqli_fetch_array($data)) {
                  ?>
                    <tr>
                      <div id="modalID" style="display: none;"><?= $d['transaksi_id'] ?></div>

                      <td><?php echo $d['invoice']; ?></td>
                      <td><?php echo $d['transaksi_tgl']; ?></td>
                      <?php if ($_SESSION['hak_akses'] == 'super' || $_SESSION['hak_akses'] == 'admin') { ?>
                        <td><?php echo $d['username']; ?></td>
                      <?php } ?>
                      <td><?php echo $d['nama_layanan']; ?></td>
                      <td><?php echo $d['transaksi_tgl_selesai']; ?></td>
                      <td><?php echo "Rp " . number_format($d['transaksi_harga'], 2, ',', '.') ?></td>
                      <td>
                        <?php
                        if ($d['transaksi_status'] == "0") {
                          echo "<div class='label label-warning'>PENDING</div>";
                        } else if ($d['transaksi_status'] == "1") {
                          echo "<div class='label label-info'>PROSES</div>";
                        } else if ($d['transaksi_status'] == "2") {
                          echo "<div class='label label-success'>DICUCI</div>";
                        } else if ($d['transaksi_status'] == "3") {
                          echo "<div class='label label-success'>SELESAI</div>";
                        }
                        ?>
                      </td>
                      <td><?php if ($d['bukti_transfer'] != "") { ?>
                          <img id="myImg<?php echo $d['transaksi_id'] ?>" src="../assets/gambar/<?php echo $d['bukti_transfer']; ?>" onmouseover="getid(this);" width="150px" height="150px">
                        <?php } ?>
                      </td>
                      <td>
                        <?php if ($_SESSION['hak_akses'] == 'super' || $_SESSION['hak_akses'] == 'admin') { ?>
                          <?php if ($d['invoice'] == "") { ?>
                            <a href="transaction_edit.php?id=<?php echo $d['transaksi_id']; ?>" class="btn btn-sm btn-info">Edit</a>
                          <?php } ?>
                          <a href="transaction_delete.php?id=<?php echo $d['transaksi_id']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                        <?php } ?>
                        <?php if ($d['invoice'] != "") { ?>
                          <a href="transaction_invoice.php?id=<?php echo $d['transaksi_id']; ?>" class="btn btn-sm btn-warning">Invoice</a>
                        <?php } ?>
                        <?php if ($d['bukti_transfer'] == "" && $_SESSION['hak_akses'] == 'user') { ?>
                          <a href="transaction_upload_transfer.php?id=<?php echo $d['transaksi_id']; ?>" class="btn btn-sm btn-primary">Upload</a>
                        <?php } ?>
                        <?php
                        $ex = mysqli_query($con, "SELECT * FROM tb_rating where id_transaksi = " . $d['transaksi_id']);
                        $rating = mysqli_num_rows($ex);
                        if ($d['transaksi_status'] == "3" && $_SESSION['hak_akses'] == 'user' && $rating < 1) { ?>
                          <a type="button" onclick="getIDTransaction(<?= $d['transaksi_id'] ?>)" href="transaction_list.php" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalRating">
                            Rating
                          </a>
                          <a type="button" onclick="getIDTransaction(<?= $d['transaksi_id'] ?>)" href="transaction_list.php" class="btn btn-sm btn-warning text-white" data-toggle="modal" data-target="#modalKuesioner">
                            Isi Kuesioner
                          </a>
                        <?php } ?>
                      </td>
                    </tr>
                  <?php } ?>
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

<div class="modal fade " id="modalKuesioner" tabindex="-1" role="dialog" aria-labelledby="modalKuesionerLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl	" role="document">
    <form action="add_jawaban_kuesioner.php" method="post">
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