<?php
require_once("../config/koneksi.php");
$dari = $_POST['dari'];
$sampai = $_POST['sampai'];
$data = mysqli_query($con,"SELECT transaksi.*,users.username,layanan.nama_layanan FROM transaksi 
    INNER JOIN users ON transaksi.id_user = users.id_user
    INNER JOIN layanan ON transaksi.id_layanan = layanan.id_layanan
    where transaksi.transaksi_tgl between '$dari' and '$sampai' ");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Export Data Ke Excel Dengan PHP</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Transaksi.xls");
	?>
	<table border="1">
		<tr>
			<th>Invoice</th>
			<th>Tanggal Order</th>
			<th>Pelanggan</th>
			<th>Layanan</th>
			<th>Tanggal Selesai</th>
			<th>Harga</th>
			<th>Status Order</th>
		</tr>
		<?php
           while ($d = mysqli_fetch_array($data)) {

           	if ($d['transaksi_status'] == "0") {
			  $status = 'PENDING';
			} else if ($d['transaksi_status'] == "1") {
			  $status = 'PROSES';
			} else if ($d['transaksi_status'] == "2") {
			  $status = 'DICUCI';	
			} else if ($d['transaksi_status'] == "3") {
			  $status = 'SELESAI';
			}
         ?>
		<tr>
			<td><?php echo $d['invoice']; ?></td>
			<td><?php echo $d['transaksi_tgl']; ?></td>
			<td><?php echo $d['username']; ?></td>
			<td><?php echo $d['nama_layanan']; ?></td>
			<td><?php echo $d['transaksi_tgl_selesai']; ?></td>
			<td><?php echo $d['transaksi_harga']; ?></td>
			<td><?php echo $status; ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>