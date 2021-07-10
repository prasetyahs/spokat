<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.1.0
  </div>
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

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



</div>
</body>
<script type="text/javascript">
  function getIDTransaction(id) {
    $('#idTrade').val(id)
  };

  function getIDKuesioner(id) {
    $('#id_kuesioner').val(id);
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
<script>

</script>

</html>