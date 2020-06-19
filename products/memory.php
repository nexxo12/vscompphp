<?php include'../function/function.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" href="../img/favicon.ico">
  <title>Memory List - VSComp</title>

<?php include'../template/header.php';?>

<h4 align="center">Memory Stock</h4>
<div class="container">
  <hr noshade></hr>
  <table class="table table-borderless table-responsive-sm" id="tabel-data">
    <thead class="text-center">
      <tr>
        <th scope="col" width="0">ID</th>
        <th scope="col">Nama</th>
        <th scope="col" width="0">Jumlah</th>
        <th scope="col" width="0">Satuan</th>
        <th scope="col">Harga</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      //menjalankan function di function.php
      $data_ram = tampil_data("SELECT * FROM master_barang WHERE ID_KATEGORI = 2");
      ?>
      <!--memasukan data ke table  -->
      <?php foreach ($data_ram as $ram) :?>
      <?php
        if ($ram["STOK"] == 0) {
            $ram_jumlah = "<p style=\"color:red;\">Habis</p>";
        }
        elseif ($ram["STOK"] < 5) {
            $ram_jumlah = "<p style=\"color:orange;\">Hampir Habis</p>";
        }
        else {
            $ram_jumlah = "<p style=\"color:green;\">Ready</p>";
        }
       ?>
      <tr>
        <!-- memilah data -->
        <td><?= $ram["ID_BARANG"]; ?></td>
        <td><?= $ram["NAMA_BARANG"]; ?></td>
        <td align="center"><?= $ram["STOK"]; ?></td>
        <td align="center"><?= $ram["SATUAN"]; ?></td>
        <td>Rp. <?= number_format($ram["HARGA_JUAL"]); ?></td>
        <td align="center"><?= $ram_jumlah ?></td>
      </tr>
    <?php endforeach; ?>

    </tbody>
  </table>
</div> <!-- end container -->

<br><br><br><br><br><br><br><br><br><br><br>

<?php include'../template/footer.php'; ?>
