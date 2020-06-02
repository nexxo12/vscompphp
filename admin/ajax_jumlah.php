<?php
include'../function/function.php';
$sum_total = tampil_data("SELECT SUM(JUMLAH_BELI) AS jumlah_beli FROM list_penjualan");
foreach ($sum_total as $jumlah) {
      $jumlah_beli = number_format($jumlah["jumlah_beli"]);
      echo $jumlah_beli;
}

?>
