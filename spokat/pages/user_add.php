<?php
	require_once ("../config/koneksi.php");
 	require_once 'layout/header.php';
 	require_once 'layout/sidebar.php';
                
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah User / Admin</h1>
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
                <form action="user_add_submit.php" method="post">
	            	<div class="col-md-12">
        		          <div class="form-group">
	                      <label>Username</label>
	                      <input type="text" name="username" class="form-control" placeholder="tulis username disini">
                  	  </div>

                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="tulis password disini">
                      </div>

                      <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="number" name="no_hp" class="form-control" placeholder="tulis Nomor HP disini">
                      </div>

                      <div class="form-group">
                            <label>Hak Akses</label>
                            <select name="hak_akses" class="form-control">
                              <option value="">Pilih Hak Akses</option>
                               <option value="user">User</option>
                               <option value="admin">Admin</option>
                            </select>
                      </div>

	            	</div>
	            	<div class="col-md-12">
                       <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-success btn-lg" value="Save">
                        </div>
                    </div>
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