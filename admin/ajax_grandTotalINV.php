<?php
include'../function/function.php';
$sum_total = tampil_data("SELECT SUM(TOTAL_HARGA) AS jumlah FROM list_penjualan");
foreach ($sum_total as $jumlah) {
      $total_harga = $jumlah["jumlah"];
      echo $total_harga;
}

?>
