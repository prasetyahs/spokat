<?php
	require_once ("../config/koneksi.php");
 	require_once 'layout/header.php';
 	require_once 'layout/sidebar.php';
  $id = $_GET['id'];
 	$data = mysqli_query($con,"SELECT transaksi.*,users.username,layanan.* FROM transaksi 
    INNER JOIN users ON transaksi.id_user = users.id_user
    INNER JOIN layanan ON transaksi.id_layanan = layanan.id_layanan 
    where transaksi.transaksi_id = '$id'");
                
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
                <h3>Data Pesanan </h3>
                <?php
                    while($d=mysqli_fetch_array($data)){ 
                ?>
                <div class="col-4">
                  <table class="table table-striped">
                    <tr>
                      <td>Nama Pemesan</td>
                      <td>:</td>
                      <td><?php echo $d['username'] ?></td>
                    </tr>
                    <tr>
                      <td>Layanan</td>
                      <td>:</td>
                      <td><?php echo $d['nama_layanan'] ?></td>
                    </tr>
                    <tr>
                      <td>Jumlah Sepatu</td>
                      <td>:</td>
                      <td><?php echo $d['transaksi_jml_sepatu'] ?></td>
                    </tr>
                    <tr>
                      <td>Total Harga</td>
                      <td>:</td>
                      <td><?php echo "Rp " . number_format($d['transaksi_harga'],2,',','.') ?></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td>:</td>
                      <td><?php echo $d['transaksi_alamat'] ?></td>
                    </tr>
                </table>
                </div>
                <h5>Catatan</h5>
                <p>Harga Sudah Termasuk Biaya Ongkir dikenakan Rp 15.000</p>
                <p>Harga Layanan <?php echo "Rp " . number_format($d['harga'],2,',','.') ?></p>
                <p>Jumlah Sepatu <?php echo $d['transaksi_jml_sepatu'] ?></p>
                <p>Total = harga layanan x jumlah sepatu + ongkir</p>
                <p>Total Harga = <?php echo "Rp " . number_format($d['transaksi_harga'],2,',','.') ?></p>
              <?php } ?>
              <br>
              <h4>No Rekening = 2312312311</h4>
              <form action="transaction_upload_submit.php" method="post" enctype="multipart/form-data">
                <label>Upload Bukti Transfer</label>
                <input type="hidden" name="transaksi_id" value="<?php echo $id ?>">
                <input type="file" name="bukti_transfer"><br>
                <input type="submit" name="submit" class="btn btn-success btn-sm" value="Upload">
              </form>
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