<?php
require_once("../config/koneksi.php");
	$id = $_POST['id'];
	$transaksi_tgl_selesai = $_POST['transaksi_tgl_selesai'];
	$transaksi_tgl = $_POST['transaksi_tgl'];
	if($transaksi_tgl_selesai <= $transaksi_tgl){
		echo "<script>alert('Tanggal selesai tidak boleh kurang dari tanggal order'); window.location.href = 'transaction_list.php';</script>";
		die();
	}
	$status = $_POST['status'];
	$cekdata = mysqli_query($con, "SELECT invoice,bukti_transfer from transaksi where transaksi_id ='$id' ") or die (mysqli_error());
	$data = mysqli_fetch_array($cekdata);
	if($data['bukti_transfer'] == ''){
		echo "<script>alert('Belum Upload Bukti Transfer'); window.location.href = 'transaction_list.php';</script>";
		die();
	}

	if($data['invoice'] != ""){
		$invoice = $data['invoice'];
	}else{
		$invoice = "";
		if($status == 3){
			 $carikode = mysqli_query($con, "SELECT invoice from transaksi where invoice !='' ") or die (mysqli_error());
	          $datakode = mysqli_fetch_array($carikode);
	          $jumlah_data = mysqli_num_rows($carikode);
	          if($jumlah_data > 0){
	          	$carikd = mysqli_query($con, "SELECT invoice from transaksi where invoice !='' order by invoice desc") or die (mysqli_error());
		          $datakd = mysqli_fetch_array($carikd);
		          //pecah array
		          $pc = explode("/",$datakd['invoice']);
		          // menmbah 1
		          $tb = $pc[1] + 1;
		          if($tb < 10){
		          	$tb = '0'.$tb;
		          }
		          $invoice = "INV/".$tb."/".date('d-m-Y');
	          }else{
	          	$invoice = "INV/01/".date('d-m-Y');	
	          }
		}	
	}

	


	$query=mysqli_query($con,"update transaksi set transaksi_tgl_selesai='$transaksi_tgl_selesai', transaksi_status='$status', invoice='$invoice' where transaksi_id='$id'")or trigger_error(mysqli_error($con)." in ");
	if($query){
		echo "<script>alert('Data Berhasil diupdate'); window.location.href = 'transaction_list.php';</script>";
	}else{
		echo "<script>alert('Gagal update Data'); window.location.href = 'transaction_list.php';</script>";
		echo mysqli_error();
	}
?>