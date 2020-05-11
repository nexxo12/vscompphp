<?php
    include'../function/function.php';
    $id = $_GET["id"]; //variabel menerima 'id' yang dikirim dari 'master-barang.php'
    $del_barang = deletepembelian("DELETE FROM pelanggan WHERE ID_PELANGGAN= '$id'");

    if (deletedata($id) > 0) {
        echo "berhasil";

    }


    else {
      echo mysqli_error($conn);
    }

 ?>
