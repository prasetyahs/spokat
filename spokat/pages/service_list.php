<?php
	require_once ("../config/koneksi.php");
 	require_once 'layout/header.php';
 	require_once 'layout/sidebar.php';
 	$data = mysqli_query($con,"select * from layanan");
                
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Layanan</h1>
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
                <p><a href="service_add.php" class="btn btn-success"><i class="fa fa-plus"></i>Tambah Data</a></p>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  	<th>No</th>
                    <th>Nama Layanan</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  	<?php
	                  	$no = 1; 
	                  	while($d=mysqli_fetch_array($data)){ 
                  	?>
                  	  <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['nama_layanan']; ?></td>
                        <td><?php echo "Rp " . number_format($d['harga'],2,',','.') ?></td>
                        <td><?php echo $d['deskripsi']; ?></td>
                        <td>
                            <a href="service_edit.php?id=<?php echo $d['id_layanan']; ?>" class="btn btn-sm btn-info">Edit</a>
                            <a href="service_delete.php?id=<?php echo $d['id_layanan']; ?>" class="btn btn-sm btn-danger">Hapus</a>
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


<?php 
 	require_once 'layout/footer.php';
?>