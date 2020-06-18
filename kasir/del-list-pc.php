<?php
include'../function/function.php';
if (isset($_GET["hapus"])) {//periksa jika add mengirimkan data
    $id_del = $_GET["hapus"];//data diterima sesuai yang dikirimkan
    $del_barang = delete("DELETE FROM paket_pc WHERE ID_PC= '$id_del'");

    if ($del_barang > 0) {
        echo "
            <script>
            alert('Data Berhasil Dihapus!!');
            document.location.href = 'list-paket-pc.php';
            </script>
        ";

    }

    else {
      echo "
          <script>
          alert('Data Gagal Dihapus!!');
          </script>
      ";
      echo mysqli_error($conn);
    }


  }
?>
