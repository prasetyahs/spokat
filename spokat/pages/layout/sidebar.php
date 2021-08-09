<?php
require_once("../config/koneksi.php");
?>
<!-- Main Sidebar Container -->


<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <span class="brand-text font-weight-light"><?php echo $_SESSION['username']; ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="index.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <?php if ($_SESSION['hak_akses'] == 'super') { ?>
          <li class="nav-item">
            <a href="user_list.php" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
        <?php } ?>
        <li class="nav-item">
          <a href="transaction_list.php" class="nav-link">
            <i class="nav-icon fa fa-money-bill"></i>
            <p>
              Transaksi
            </p>
          </a>
        </li>

        <?php if ($_SESSION['hak_akses'] != 'super' && $_SESSION['hak_akses'] != 'admin') { ?>
          <li class="nav-item">
            <a href="simulasi_method.php" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>
                Simulasi Rekomendasi
              </p>
            </a>
          </li>
        <?php } ?>
        <?php if ($_SESSION['hak_akses'] == 'super' || $_SESSION['hak_akses'] == 'admin') { ?>
          <li class="nav-item">
            <a href="kuesioner.php" class="nav-link">
              <i class="nav-icon fa fa-question"></i>
              <p>
                Kuesioner
              </p>
            </a>
          </li>
         
        <?php } ?>
        <li class="nav-item">
            <a href="hasil_jawaban_kuesioner.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Hasil Kuesioner
              </p>
            </a>
          </li>
        <?php if ($_SESSION['hak_akses'] == 'super' || $_SESSION['hak_akses'] == 'admin') { ?>
          <!-- <li class="nav-item">
            <a href="report.php" class="nav-link">
              <i class="nav-icon fa fa-newspaper"></i>
              <p>
                Laporan
              </p>
            </a>
          </li> -->
             <li class="nav-item">
            <a href="rating_layanan.php" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Rating Layanan
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-newspaper"></i>
            <p>
              Laporan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="report.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Transaksi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="report_grafik.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Grafik</p>
              </a>
            </li>
          </ul>
        </li>
        <?php } ?>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tools"></i>
            <p>
              Pengaturan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <?php if ($_SESSION['hak_akses'] == 'super' || $_SESSION['hak_akses'] == 'admin') { ?>
              <li class="nav-item">
                <a href="service_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengaturan Layanan</p>
                </a>
              </li>
            <?php } ?>
            <li class="nav-item">
              <a href="change_password.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Ganti Password</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="about.php" class="nav-link">
            <i class="nav-icon fa fa-address-book"></i>
            <p>
              About
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>