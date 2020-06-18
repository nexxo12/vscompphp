<?php
include'../function/function.php';
    $id_add = $_GET["add"];
    $d_barang = tampil_data("SELECT * FROM master_barang WHERE ID_BARANG = '$id_add'");
    foreach ($d_barang as $kd_brg) {
      echo $kd_brg["ID_BARANG"];
    }



?>
