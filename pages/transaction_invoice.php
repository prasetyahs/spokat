<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Invoice</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		
		<?php
		 	require_once ("../config/koneksi.php");
		 	$id = $_GET['id'];
		 	$data = mysqli_query($con,"SELECT transaksi.*,users.username,layanan.* FROM transaksi 
		    INNER JOIN users ON transaksi.id_user = users.id_user
		    INNER JOIN layanan ON transaksi.id_layanan = layanan.id_layanan 
		    where transaksi.transaksi_id = '$id'");
		    $datainv = mysqli_fetch_array($data);
		?>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="../assets/logo/logo_sp.jpg" width="150px" height="150px" />
								</td>

								<td>
									Invoice #: <?php echo $datainv['invoice'] ?><br />
									Tanggal Order: <?php echo date('d-m-Y', strtotime($datainv['transaksi_tgl'])) ?><br />
									Tanggal Selesai: <?php echo date('d-m-Y', strtotime($datainv['transaksi_tgl_selesai'])) ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Spokat Laundry<br />
									Petukangan Utara Jl.Haji Radin, Gg.Perjuangan<br />
									2,No.65B, Rt.12, Rw.03,Kel.Petukangan Utara,Kec.<br />
									Pesanggrahan,Jakarta Selatan
								</td>

								<td>
									Tujuan Pengiriman :<br />
									<?php echo $datainv['transaksi_alamat']; ?> <br/>
									Atas Nama: <br />
									<?php echo $datainv['username'] ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				

				<tr class="heading">
					<td>Item</td>

					<td>Price</td>
				</tr>

				<tr class="item">
					<td>Layanan (<?php echo $datainv['nama_layanan'] ?>)</td>

					<td><?php echo "Rp " . number_format($datainv['harga'],2,',','.') ?></td>
				</tr>

				<tr class="item">
					<td>Jumlah Sepatu (<?php echo $datainv['transaksi_jml_sepatu'] ?>)</td>
					<?php 
						$harga_jml = $datainv['harga'] * $datainv['transaksi_jml_sepatu'];
					?>
					<td><?php echo "Rp " . number_format($harga_jml,2,',','.') ?></td>
				</tr>

				<tr class="item last">
					<td>Ongkos Kirim</td>

					<td>Rp 15.000,00</td>
				</tr>

				<tr class="total">
					<td></td>

					<td>Total: <?php echo "Rp " . number_format($datainv['transaksi_harga'],2,',','.') ?></td>
				</tr>
			</table>
		</div>
		<script type="text/javascript">
		      window.onload = function() { window.print(); }
		 </script>
	</body>
</html>