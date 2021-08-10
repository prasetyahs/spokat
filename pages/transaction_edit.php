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
            <h1>Transaksi Baru</h1>
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
                <?php while($t=mysqli_fetch_array($data)){ ?>
                <form action="transaction_edit_submit.php" method="post">
	            	<div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Pemesan</label>
                            <input type="hidden" name="id" class="form-control" readonly value="<?php echo $t['transaksi_id'] ?>">
                            <input type="text" class="form-control" readonly value="<?php echo $t['username'] ?>">
                        </div>
        		            <div class="form-group">
                            <label>Layanan</label>
                            <input type="text" class="form-control" readonly value="<?php echo $t['nama_layanan'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" readonly cols="30" rows="10"><?php echo $t['deskripsi'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" class="form-control" name="transaksi_harga" value="<?php echo $t['transaksi_harga'] ?>" required readonly>
                        </div>

                      <div class="form-group">
                          <label>Jumlah Sepatu</label>
                          <input type="number" class="form-control"  name="transaksi_jml_sepatu" value="<?php echo $t['transaksi_jml_sepatu'] ?>" readonly >
                      </div>

                      <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" readonly cols="20" rows="5"><?php echo $t['transaksi_alamat'] ?></textarea>
                      </div>
                      <div class="form-group">
                            <label>Tgl. Pesan</label>
                            <input type="date" class="form-control" name="transaksi_tgl" value="<?php echo $t['transaksi_tgl']; ?>" readonly>
                        </div>


                        <div class="form-group">
                            <label>Tgl. Selesai</label>
                            <input type="date" class="form-control" name="transaksi_tgl_selesai" required="required" value="<?php echo $t['transaksi_tgl_selesai']; ?>">
                        </div>
                        <br/>
                            <div class="form-group alert alert-info">
                                <label>Status</label>
                                <select class="form-control" name="status" required="required">
                                    <option <?php if($t['transaksi_status']=="0"){echo "selected='selected'";} ?> value="0">PENDING</option>
                                    <option <?php if($t['transaksi_status']=="1"){echo "selected='selected'";} ?> value="1">PROSES</option>
                                    <option <?php if($t['transaksi_status']=="2"){echo "selected='selected'";} ?> value="2">DI CUCI</option>
                                    <option <?php if($t['transaksi_status']=="3"){echo "selected='selected'";} ?> value="3">SELESAI</option>
                                </select>
                            </div>
	            	</div>
	            	<div class="col-md-12">
                       <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-success btn-lg" value="Update">
                        </div>
                    </div>
	            </form>
              <?php } ?>
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