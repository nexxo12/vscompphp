<?php
include'../function/function.php';
$idpj =  autonumber_inv("id_inv");
$tampil_barang = tampil_data("SELECT * FROM penjualan INNER JOIN master_barang ON penjualan.ID_BARANG = master_barang.ID_BARANG WHERE INV_PENJUALAN = '$idpj'");
foreach ($tampil_barang as $barang) {
      $namaBRG = $barang["NAMA_BARANG"];
}
echo $namaBRG;

?>
