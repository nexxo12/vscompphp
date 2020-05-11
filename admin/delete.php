<?php
    include'../function/function.php';
    $id = $_GET["id"]; //variabel menerima 'id' yang dikirim dari 'master-barang.php'

    if (deletedata($id) > 0) {
        echo "
            <script>
            alert('Data Berhasil Dihapus!!');
            document.location.href = '../admin/master-barang.php';
            </script>
        ";

    }


    else {
      echo "
          <script>
          alert('Data Gagal Dihapus!!');
          document.location.href = '../admin/master-barang.php';
          </script>
      ";
    }

 ?>
