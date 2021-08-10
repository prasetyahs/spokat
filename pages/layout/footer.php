<footer class="main-footer">
  <strong>Copyright &copy; 2021-2022 <a href="http://unsada.ac.id">Universitas Darma Persada</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.0.3
  </div>
</footer>
<div class="modal fade " id="modalKuesioner" tabindex="-1" role="dialog" aria-labelledby="modalKuesionerLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl	" role="document">
    <form action="add_jawaban_kuesioner.php" method="post">
      <input type="hidden" name="id_transaksi" id="id_transaksi">
      <div class="modal-content">
        <div class="modal-header justify-content-center">
          <h5 class="modal-title" id="modalKuesionerLabel">Kuesioner</h5>
        </div>
        <div class="modal-body">
          <div class="col-12">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Pertanyaan</th>
                  <th>Baik</th>
                  <th>Cukup</th>
                  <th>Kurang</th>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT * FROM  tb_kuesioner";
                $exec = mysqli_query($con, $sql);
                $result = mysqli_fetch_all($exec, MYSQLI_ASSOC);
                $no = 1;
                foreach ($result as $dt) {
                ?>
                  <tr>
                    <td><?= $no ?>.</td>
                    <td><?= $dt['pertanyaan'] ?></td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="question<?= $no ?>" id="pertanyaan1" value="Baik">
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="question<?= $no ?>" id="pertanyaan1" value="Cukup">
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="question<?= $no ?>" id="pertanyaan1" value="Kurang">
                      </div>
                    </td>
                  </tr>
                <?php
                  $no++;
                } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
  </div>
</div>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../assets/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

<!-- DataTables  & Plugins -->
<script src="../assets/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets/jszip/jszip.min.js"></script>
<script src="../assets/pdfmake/pdfmake.min.js"></script>
<script src="../assets/pdfmake/vfs_fonts.js"></script>
<script src="../assets/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../assets/chart.js/Chart.min.js"></script>
<script src="../assets/demo/chart-pie-demo.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  // CHART TRANSAKSI
  const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember',
  ];
  const data = {
    labels: labels,
    datasets: [{
      label: 'Data Transaksi',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: <?= json_encode($dataGrafikTransaksi) ?>,
    }]
  };
  const config = {
    type: 'bar',
    data,
    options: {}
  };
  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
  // CHART TRANSAKSI

  // CHART LAYANAN
  const dataLayanan = {
    labels: <?= json_encode($arrayLayanan) ?>,
    datasets: [{
      label: 'My First Dataset',
      data: <?= json_encode($dataGrafikLayanan) ?>,
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)',
        'rgb(204, 255, 229)',
        'rgb(255, 102, 178)',
        'rgb(145, 202, 132)',
        'rgb(44, 34, 229)',
        'rgb(225, 23, 14)',
      ],
      hoverOffset: 4
    }]
  };
  const configLayanan = {
    type: 'pie',
    data: dataLayanan,
  };

  var chartLayanan = new Chart(
    document.getElementById('chartLayanan'),
    configLayanan
  );

  // CHART LAYANAN

  // CHART JENIS KELAMIN
  const dataJk = {
    labels: [
      'Laki-Laki',
      'Perempuan'
    ],
    datasets: [{
      label: 'My First Dataset',
      data: <?= json_encode($dataGrafikJk) ?>,
      backgroundColor: [
        'rgb(51, 225, 227)',
        'rgb(255, 168, 51)',
      ],
      hoverOffset: 4
    }]
  };
  const configJk = {
    type: 'pie',
    data: dataJk,
  };

  var chartJk = new Chart(
    document.getElementById('chartJk'),
    configJk
  );
  // CHART JENIS KELAMIN
</script>



<div class="modal fade" id="modalRating" tabindex="-1" role="dialog" aria-labelledby="modalRatingLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="rating_submit.php" method="post">
      <div class="modal-content">
        <div class="modal-header justify-content-center">
          <h5 class="modal-title" id="modalRatingLabel">Review Jasa Cuci</h5>
        </div>
        <div class="modal-body">
          <div class="col-12">
            <div class="row justify-content-center pt-2 pb-2" style="background-color: #f5f5f5;border-radius:50px">
              <span class="fa fa-star checked mr-2" id="st1"></span>
              <span class="fa fa-star checked mr-2" id="st2"></span>
              <span class="fa fa-star checked mr-2" id="st3"></span>
              <span class="fa fa-star checked mr-2" id="st4"></span>
              <span class="fa fa-star" id="st5"></span>
            </div>
            <div class="row justify-content-center mt-2">
              <h2 class="valueRate">0.0</h2>
            </div>
            <input type="hidden" class="form-control" id="valueRate" name="rating" required></input>
            <input type="hidden" class="form-control" id="idTrade" name="id_transaksi" required></input>
            <div class="form-group mt-1">
              <label>Pesan</label>
              <textarea type="number" rows="5" class="form-control" id="message" name="message" required></textarea>

            </div>

          </div>

        </div>
        <div class="modal-footer">
          <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
  </div>
</div>
<div class="modal fade " id="modalKuesioner" tabindex="-1" role="dialog" aria-labelledby="modalKuesionerLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl	" role="document">
    <form action="add_jawaban_kuesioner.php" method="post">
      <input type="hidden" name="id_transaksi" id="id_transaksi">
      <div class="modal-content">
        <div class="modal-header justify-content-center">
          <h5 class="modal-title" id="modalKuesionerLabel">Kuesioner</h5>
        </div>
        <div class="modal-body">
          <div class="col-12">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Pertanyaan</th>
                  <th>Baik</th>
                  <th>Cukup</th>
                  <th>Kurang</th>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT * FROM  tb_kuesioner";
                $exec = mysqli_query($con, $sql);
                $result = mysqli_fetch_all($exec, MYSQLI_ASSOC);
                $no = 1;
                foreach ($result as $dt) {
                ?>
                  <tr>
                    <td><?= $no ?>.</td>
                    <td><?= $dt['pertanyaan'] ?></td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="question<?= $no ?>" id="pertanyaan1" value="Baik">
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="question<?= $no ?>" id="pertanyaan1" value="Cukup">
                      </div>
                    </td>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="question<?= $no ?>" id="pertanyaan1" value="Kurang">
                      </div>
                    </td>
                  </tr>
                <?php
                  $no++;
                } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
  </div>
</div>



<script type="text/javascript">
  function getIDTransaction(id) {
    $('#idTrade').val(id)
  };

  function getIDKuesioner(id) {
    $('#id_kuesioner').val(id);
    $('#id_transaksi').val(id);
  };

  $(document).ready(function() {
    var nilai = 0;
    $('#modalRating').on('shown.bs.modal', function() {
      $(".modal-backdrop").hide();
    });
    $('#modalKuesioner').on('shown.bs.modal', function() {
      $(".modal-backdrop").hide();
    });
    $('#modalEditKuesioner').on('shown.bs.modal', function() {
      $(".modal-backdrop").hide();
    });
    $("#st1").click(function() {
      $(".fa-star").css("color", "black");
      $("#st1").css("color", "orange");
      nilai = 1;
      $('.valueRate').text(nilai + '.0');
      $('#valueRate').val(nilai);
    });
    $("#st2").click(function() {
      $(".fa-star").css("color", "black");
      $("#st1, #st2").css("color", "orange");
      nilai = 2;
      $('.valueRate').text(nilai + '.0');
      $('#valueRate').val(nilai);
    });
    $("#st3").click(function() {
      $(".fa-star").css("color", "black")
      $("#st1, #st2, #st3").css("color", "orange");
      nilai = 3;
      $('.valueRate').text(nilai + '.0');
      $('#valueRate').val(nilai);

    });
    $("#st4").click(function() {
      $(".fa-star").css("color", "black");
      $("#st1, #st2, #st3, #st4").css("color", "orange");
      nilai = 4;
      $('.valueRate').text(nilai + '.0');
      $('#valueRate').val(nilai);
    });
    $("#st5").click(function() {
      $(".fa-star").css("color", "black");
      $("#st1, #st2, #st3, #st4, #st5").css("color", "orange");
      nilai = 5;
      $('.valueRate').text(nilai + '.0');
      $('#valueRate').val(nilai);
    });
  });
</script>


</body>

</html>