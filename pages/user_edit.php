<?php
	require_once ("../config/koneksi.php");
 	require_once 'layout/header.php';
 	require_once 'layout/sidebar.php';
  $id = $_GET['id'];
  $data = mysqli_query($con,"select * from users where id_user = '$id'");
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit User</h1>
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
                <?php while($d=mysqli_fetch_array($data)){ ?>
                <form action="user_edit_submit.php" method="post">
	            	<div class="col-md-12">
        		      <div class="form-group">
	                      <label>Username</label>
                        <input type="hidden" name="id_user" value="<?php echo $d['id_user']; ?>">
	                      <input type="text" name="username" class="form-control" value="<?php echo $d['username']; ?>" readonly>
                  </div>

                  <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                  </div>

                  <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="number" name="no_hp" class="form-control" value="<?php echo $d['no_hp']; ?>">
                  </div>

	            	</div>
	            	<div class="col-md-12">
                       <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-success btn-lg" value="Update">
                        </div>
                    </div>
	            </form>
            <?php }?>
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