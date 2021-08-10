<?php
	require_once ("../config/koneksi.php");
 	require_once 'layout/header.php';
 	require_once 'layout/sidebar.php';
 	$data = mysqli_query($con,"select * from users where hak_akses != 'super' ");
                
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User</h1>
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
                <?php if($_SESSION['hak_akses'] == 'super'){ ?>
                  <p><a href="user_add.php" class="btn btn-success"><i class="fa fa-plus"></i>Tambah User / Admin</a></p>
                <?php } ?>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  	<th>No</th>
                    <th>Usename</th>
                    <th>Nomor HP</th>
                    <th>Hak Akses</th>
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
                        <td><?php echo $d['username']; ?></td>
                        <td><?php echo $d['no_hp']; ?></td>
                        <td><?php echo $d['hak_akses']; ?></td>
                        <td>
                            <a href="user_edit.php?id=<?php echo $d['id_user']; ?>" class="btn btn-sm btn-info">Edit</a>
                            <a href="user_delete.php?id=<?php echo $d['id_user']; ?>" class="btn btn-sm btn-danger">Hapus</a>
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