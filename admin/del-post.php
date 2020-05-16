<?php
    include'../function/function.php';
    $id = $_GET["id"]; //variabel menerima 'id' yang dikirim dari 'master-barang.php'
    $del_post = delete("DELETE FROM news WHERE ID_NEWS= '$id'");

    if (file_exists) {
      // code...
    }

    if ($del_post > 0) {
        echo "berhasil";

    }


    else {
      echo mysqli_error($conn);
    }

 ?>
