<?php
  require_once('../config/koneksi.php');
 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <?php if ($_SESSION['hak_akses'] == 'super' || $_SESSION['hak_akses'] == 'admin') { ?>
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                  <div class="inner">
                    <?php
                      $sql = mysqli_query($con,"SELECT * FROM layanan");
                      $count = mysqli_num_rows($sql);
                      echo "<h3>$count</h3>"
                    ?>
                    <p>Data Layanan</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="service_list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                       <?php
                          $sql = mysqli_query($con,"SELECT * FROM transaksi");
                          $count = mysqli_num_rows($sql);
                          echo "<h3>$count</h3>"
                        ?>
                      <p>Data Transaksi</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="transaction_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                       <?php
                          $sql = mysqli_query($con,"SELECT * FROM tb_kuesioner");
                          $count = mysqli_num_rows($sql);
                          echo "<h3>$count</h3>"
                        ?>
                      <p>Kuisoner</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="kuesioner.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>  
            <?php } ?>
            <?php if ($_SESSION['hak_akses'] == 'user') { ?>
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                       <?php
                          $user_id = $_SESSION['id_user'];
                          $sql = mysqli_query($con,"SELECT * FROM transaksi where id_user='$user_id'");
                          $count = mysqli_num_rows($sql);
                          echo "<h3>$count</h3>"
                        ?>
                      <p>Data Transaksi</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="transaction_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
            <?php } ?>
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
