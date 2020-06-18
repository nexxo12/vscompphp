<?php
include'../function/function.php';
    $id_add = $_GET["add"];
    $harga_jl = tampil_data("SELECT HARGA_JUAL FROM master_barang WHERE ID_BARANG='$id_add'");
      foreach ($harga_jl as $jual) {
          echo $jl_harga = $jual["HARGA_JUAL"];
          $jl_harga2 = number_format($jual["HARGA_JUAL"]);
      }



?>
