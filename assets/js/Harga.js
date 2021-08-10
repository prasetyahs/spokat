// JavaScript Document isi file Nama.js
function Harga(){
 var id_layanan = document.getElementById('id_layanan').value;
 var url = "Harga.php?id_layanan=" +id_layanan;
 ambilData(url, "harga");
}