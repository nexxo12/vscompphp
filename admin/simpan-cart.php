<?php
include'../function/function.php';

if(isset($_POST["id_pjforinv"])){
   //var_dump($_POST);
   $jumlah = $_POST["jumlah"];
   $harga = $_POST["harga_jual"];
   $harga_total = $jumlah * $harga;//end

   //mengambil data dari inputan
   $id_list = $_POST["id_pjforinv"];
   $inv = $_POST["id_pj"];
   $cust = $_POST["customer"];
   $id_barang = $_POST["id_barang"];
   $idlogin = $_POST["kasir"];
   $tgl = $_POST["tgl"];
   $h_awal = $_POST["harga_awal"];
   $jumlah = $_POST["jumlah"];
   $h_jual = $_POST["harga_jual"];
   $query = "INSERT INTO list_penjualan VALUES ('$id_list','$inv','$id_barang','$cust','$idlogin','$tgl','$jumlah','$h_awal','$h_jual','$harga_total') ";
   $hasil = mysqli_query ($conn,$query);
   if ($hasil > 0) {
     echo "";
   }
   else {
     echo mysqli_error($conn);
   }
 }

 ?>
