<?php
require_once("../config/koneksi.php");
include '../functions/crud.php';
$id = $_GET['id'];
$dataUlasan = readDataAllRow($con, "SELECT * FROM tb_rating
                                        JOIN transaksi ON tb_rating.id_transaksi = transaksi.transaksi_id JOIN users on transaksi.id_user = users.id_user
                                      where id_layanan=$id");

echo json_encode($dataUlasan);
