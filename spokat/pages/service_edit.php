<?php
	require_once ("../config/koneksi.php");
 	require_once 'layout/header.php';
 	require_once 'layout/sidebar.php';
  $id = $_GET['id'];
  $data = mysqli_query($con,"select * from layanan where id_layanan = '$id'");
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Layanan</h1>
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
                <form action="service_edit_submit.php" method="post">
	            	<div class="col-md-12">
        		      <div class="form-group">
	                      <label>Nama Layanan</label>
                        <input type="hidden" name="id_layanan" value="<?php echo $d['id_layanan']; ?>">
	                      <input type="text" name="nama_layanan" class="form-control" placeholder="tulis nama layanan disini" value="<?php echo $d['nama_layanan']; ?>">
                  	  </div>

                  	  <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" cols="30" rows="10"><?php echo $d['deskripsi']; ?></textarea>
                      </div>

	                  <div class="form-group">
	                      <label>Harga</label>
	                      <?php
                                $rp = number_format($d['harga']);
                                $rp_r = str_replace(',', '.', $rp);
                        ?>
                        <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga .." id="rupiah" value="<?php echo $rp_r ?>">
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

<script type="text/javascript">
        
        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e){
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });
 
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split           = number_string.split(','),
            sisa            = split[0].length % 3,
            rupiah          = split[0].substr(0, sisa),
            ribuan          = split[0].substr(sisa).match(/\d{3}/gi);
 
            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
 
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ?  rupiah : '');
        }
    </script>

<?php 
 	require_once 'layout/footer.php';
?>