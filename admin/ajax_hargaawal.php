<?php
include'../function/function.php';
    $id_add = $_GET["add"];
    $harga_aw = tampil_data("SELECT HARGA_BELI FROM pembelian_barang WHERE ID_BARANG='$id_add' ORDER BY ID_BELI DESC LIMIT 0,1 ");
    foreach ($harga_aw as $awal) {
      echo $awal_harga = $awal["HARGA_BELI"];
      $awal_harga2 = number_format($awal["HARGA_BELI"]);
    }




?>
