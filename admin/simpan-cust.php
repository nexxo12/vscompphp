<?php
include'../function/function.php';

if(isset($_POST["id_cust"])){
   //var_dump($_POST);
   $id_cust = $_POST["id_cust"];//data diterima berupa format $POST[id_supp] dari master-suppier.php
   $nama = htmlspecialchars($_POST["nama"]);
   $alamat = htmlspecialchars($_POST["alamat"]);
   $hp = htmlspecialchars($_POST["hp"]);
   $query = "INSERT INTO pelanggan VALUES ('$id_cust','$nama','$alamat','$hp') ";
   $hasil = mysqli_query ($conn,$query);
   if ($hasil > 0) {
     echo "berhasil";
   }
   else {
     echo mysqli_error($conn);
   }
 }
 ?>
