<?php
require_once("../config/koneksi.php");
require_once 'layout/header.php';
require_once 'layout/sidebar.php';
include __DIR__ . "../../vendor/autoload.php";
function groupingArray($originalArray)
{
  $arr = array();
  foreach ($originalArray as $key => $item) {
    $arr[$item['id_user']][$key] = $item;
  }
  return $arr;
}
$id_user = $_SESSION['id_user'];
$sql = "SELECT tb_rating.rate,transaksi.id_user,layanan.nama_layanan FROM tb_rating join transaksi on tb_rating.id_transaksi = transaksi.transaksi_id join layanan on transaksi.id_layanan = layanan.id_layanan";
$exc = mysqli_query($con, $sql);
$result = mysqli_fetch_all($exc, MYSQLI_ASSOC);

if (!empty($result)) {
  $oldData = groupingArray($result);
  $newData =  new stdClass;
  foreach ($oldData as $k => $d) {
    $tmp = new stdClass;
    foreach ($d as $kl => $dl) {
      $nama_layanan = $dl['nama_layanan'];
      $rate  = $dl['rate'];
      if (property_exists($tmp, $nama_layanan)) {
        $n_same = 1;
        foreach ($d as $kt => $dt) {
          $nl = $dt['nama_layanan'];
          $r  = $dt['rate'];
          if (property_exists($tmp, $nl)) {
            ++$n_same;
            $tmp->$nama_layanan = ($tmp->$nama_layanan + $r);
            unset($oldData[$k][$kt]);
          }
        }
        // $tmp->$nama_layanan = number_format(($tmp->$nama_layanan / $n_same), 1, '.', '');
        $tmp->$nama_layanan = sprintf("%.2f", ($tmp->$nama_layanan / $n_same));
      } else {
        $tmp->$nama_layanan = $rate;
      }
      unset($oldData[$k][$kl]);
    }
    $newData->$k = (array) $tmp;
  }
  $newData = (array) $newData;
}

if (!empty($newData) && array_key_exists($id_user, $newData)) {
  $data = new \stojg\recommend\Data($newData);
  $recommendations = $data->recommend($id_user, new \stojg\recommend\strategy\Cosine());
  $consine = $data->findNearest($id_user, new \stojg\recommend\strategy\Cosine());
  $sort = $data->sort($recommendations, false);
  //ini tadi gua pindahin ke bawah buat ngasih tau hasilnya
  print_r(simulatonStep($result, $consine, $recommendations, $sort));die;
}
function simulatonStep($data, $consine, $predict,$sortData)
{
  $result = array();
  $result['data'] = $data;
  $result['consine'] = $consine;
  $result['sort'] = $sortData;
  $result['predict'] = $predict;
  return $result;
}

function array_unique_key($input, $keys)
{
  $input = array_filter($input, function ($key) use (&$keys) {
    return isset($keys[$key]) ? false : $keys[$key] = true;
  }, ARRAY_FILTER_USE_KEY);
  return array_map(function ($value) use (&$keys) {
    return is_array($value) ? array_unique_key($value, $keys) : $value;
  }, $input);
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Transaksi Baru</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-9 col-9">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <form action="transaction_add_submit.php" method="post">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Layanan</label>
                    <select name="id_layanan" id="id_layanan" class="form-control">
                      <option value="">Pilih Layanan</option>
                      <!-- mengambil nilai combo box dari database -->
                      <?php
                      $query = mysqli_query($con, "select id_layanan,nama_layanan from layanan");
                      while ($data2 = mysqli_fetch_assoc($query)) {
                        if ($data1 == $data2[$id_layanan])
                          echo "<option value=$data2[id_layanan] selected>$data2[nama_layanan]</option>";
                        else echo "<option value=$data2[id_layanan]>$data2[nama_layanan]</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" readonly="" cols="30" rows="10"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" required readonly>
                  </div>

                  <div class="form-group">
                    <label>Jumlah Sepatu</label>
                    <input type="hidden" class="form-control" name="id_user" value="<?php echo $id_user ?>">
                    <input type="number" class="form-control" id="jml_sepatu" name="transaksi_jml_sepatu" placeholder="Masukkan sepatu cucian .." required="required" min="1">
                  </div>

                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" cols="20" rows="5"></textarea>
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
        </div>
        <div class="col-sm-3 col-3">
          <div class="card pl-4 pr-4 pt-3 pb-3">
            <h5>Rekomendasi Layanan Untukmu</h5>
            <ul class="list-group">
              <?php
              if (!empty($recommendations)) {
                foreach ($recommendations  as $rec) { ?>
                  <li class="list-group-item list-group-item-danger mb-2 text-dark" style="font-weight: 700;"><?= $rec['key'] ?></li>
                <?php }
              } else { ?>
                <li class="list-group-item list-group-item-danger mb-2 text-dark text-center" style="font-weight: 700;">Tidak Tersedia</li>
              <?php } ?>
            </ul>
          </div>
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
<script type='text/javascript'>
  $(document).ready(function() {
    // Nama Change
    $('#id_layanan').change(function() {
      // id User
      var id_layanan = $(this).val();
      //console.log(id);
      // AJAX request 
      $.ajax({
        url: 'Price.php?id_layanan=' + id_layanan,
        type: 'get',
        dataType: 'json',
        success: function(response) {
          // var len = 0;
          // if(response['data'] != null){
          // len = response['data'].length;
          // }

          //console.log(len);

          //if(len > 0){
          // Read data and create <option >
          //for(var i=0; i<len; i++){

          //var id = response['data'].id;
          var harga = response['data'].harga;
          var deskripsi = response['data'].deskripsi;
          $('#harga').val(harga);
          $('#deskripsi').val(deskripsi);
          //}
          //}

        }
      });
    });

  });
</script>

<?php
require_once 'layout/footer.php';
?>