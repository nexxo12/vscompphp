<?php include'function.php';

$id_barang = $_POST["id"];
$data_harga = tampil_data("SELECT HARGA_JUAL FROM master_barang WHERE ID_BARANG = '$id_barang'");
foreach ($data_harga as $harga) {
  echo $harga["HARGA_JUAL"];
}

?>
