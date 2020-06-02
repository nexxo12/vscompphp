<?php
    include'../function/function.php';
    $id = $_GET["id"]; //variabel menerima 'id' yang dikirim dari 'master-barang.php'
    $del_barang = deletepembelian("DELETE FROM list_penjualan WHERE ID_PENJUALAN= '$id'");
    $del_barang2 = deletepembelian("DELETE FROM penjualan WHERE ID_PENJUALAN= '$id'");
    $del_grs = deletepembelian("DELETE FROM garansi WHERE ID_GARANSI= '$id'");

    if ($del_barang > 0 and $del_grs > 0) {
        echo "
            <script>
            document.location.href = '../admin/penjualan.php';
            </script>
        ";

    }

    elseif ($del_barang2 > 0) {
      echo "
          <script>
          document.location.href = '../admin/penjualan.php';
          </script>
      ";
    }

    else {
      echo mysqli_error($conn);
    }


 ?>
