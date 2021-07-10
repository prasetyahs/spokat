<?php 
require_once ("../config/koneksi.php");
include "../assets/fpdf17/fpdf.php";
$today = date('Y-m-d');

$pdf = new FPDF ('P','mm',array(210,297)); //tipe kertas P potrait, mm milimeter, 210,297 ukuran kertas
$pdf->addPage();
$pdf-> Image('logo_sp.jpg',2,0,40,40);
$pdf-> SetFont('Arial','B',18);
$pdf-> Cell(60);
$pdf-> Cell(65,10,'Laporan Transaksi',0,1,'C');
$pdf->Ln(3);
$pdf-> SetFont('Arial','B',18);
$pdf-> Cell(60);
$pdf-> Cell(65,1,'Spokat Wash',0,1,'C');
$pdf->Ln(15);

$pdf->SetLineWidth(1);
$pdf->Line(10,36,200,36);
$pdf->SetLineWidth(0);
$pdf->Line(10,37,200,37);

$pdf-> SetFont('Arial','B',10); //tipe font, bold, ukuran font
//$pdf-> Cell(50,6,'Tanggal : ' . tgl_indo($today) , 0,1,'C');

//bikin tabel
$pdf-> Cell(25,6,'Invoice', 1,0,'C');
$pdf-> Cell(27,6,'Tanggal Order', 1,0,'C');
$pdf-> Cell(25,6,'Pelanggan', 1,0,'C');
$pdf-> Cell(32,6,'Layanan', 1,0,'C');
$pdf-> Cell(29,6,'Tanggal Selesai', 1,0,'C');
$pdf-> Cell(29,6,'Harga', 1,0,'C');
$pdf-> Cell(25,6,'Status Order', 1,0,'C');

$dari = $_POST['dari'];
$sampai = $_POST['sampai'];

$query = mysqli_query($con,"SELECT transaksi.*,users.username,layanan.nama_layanan FROM transaksi 
    INNER JOIN users ON transaksi.id_user = users.id_user
    INNER JOIN layanan ON transaksi.id_layanan = layanan.id_layanan
    where transaksi.transaksi_tgl between '$dari' and '$sampai' ");
while($data = mysqli_fetch_array($query)){
$status = '';
 if ($data['transaksi_status'] == "0") {
  $status = 'PENDING';
} else if ($data['transaksi_status'] == "1") {
  $status = 'PROSES';
} else if ($data['transaksi_status'] == "2") {
  $status = 'DICUCI';	
} else if ($data['transaksi_status'] == "3") {
  $status = 'SELESAI';
}
$pdf->Ln(6);
$pdf-> Cell(25,6,$data['invoice'], 1,0,'C');
$pdf-> Cell(27,6,$data['transaksi_tgl'], 1,0,'C');
$pdf-> Cell(25,6,$data['username'], 1,0,'C');
$pdf-> Cell(32,6,$data['nama_layanan'], 1,0,'C');
$pdf-> Cell(29,6,$data['transaksi_tgl_selesai'], 1,0,'C');
$pdf-> Cell(29,6,'Rp.'.number_format($data['transaksi_harga']), 1,0,'C');
$pdf-> Cell(25,6,$status, 1,0,'C');
}


$pdf-> Output();

?>
