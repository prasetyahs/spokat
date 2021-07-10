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
            <h1>Laporan Transaksi</h1>
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
                <form action="report_pdf.php" target="_blank" method="post">
	            	<div class="col-md-12">
        		      <div class="form-group">
	                   <label>Dari Tanggal</label>
	                   <input type="date" name="dari" class="form-control">
                  </div>

                  <div class="form-group">
                     <label>Sampai Tanggal</label>
                     <input type="date" name="sampai" class="form-control">
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