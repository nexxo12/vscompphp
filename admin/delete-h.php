<?php
    include'../function/function.php';
    $id = $_GET["id"]; //variabel menerima 'id' yang dikirim dari 'master-barang.php'
    $del_barang = deletepembelian("DELETE FROM inv_penjualan WHERE id_inv= '$id'");
    $del_pj = deletepembelian("DELETE FROM penjualan WHERE INV_PENJUALAN= '$id'");
    $del_grs = deletepembelian("DELETE FROM garansi WHERE INV_PENJUALAN= '$id'");

    if ($del_barang > 0 and $del_pj > 0 and $del_grs > 0) {
        echo "
            <script>
            alert('Data Berhasil Dihapus!!');
            document.location.href = '../admin/history-penjualan.php';
            </script>
        ";

    }

    else {
      echo "
          <script>
          alert('Data Gagal Dihapus!!');
          document.location.href = '../admin/history-penjualan.php';
          </script>
      ";
      echo mysqli_error($conn);
    }

 ?>
