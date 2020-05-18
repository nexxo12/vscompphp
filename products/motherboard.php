<?php include'../function/function.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" href="../img/favicon.ico">
  <title>Motherboard List - VSComp</title>

<?php include'../template/header.php';?>

<h4 align="center">Motherboard Stock</h4>
<div class="container">
  <hr noshade></hr>
  <table class="table table-borderless" id="tabel-data">
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
      $data_mobo = tampil_data("SELECT * FROM master_barang WHERE ID_KATEGORI = 3");
      ?>
      <!--memasukan data ke table  -->
      <?php foreach ($data_mobo as $mobo) :?>
      <?php
        if ($mobo["STOK"] == 0) {
            $mobo_jumlah = "<p style=\"color:red;\">Habis</p>";
        }
        elseif ($mobo["STOK"] < 5) {
            $mobo_jumlah = "<p style=\"color:yellow;\">Hampir Habis</p>";
        }
        else {
            $mobo_jumlah = "<p style=\"color:green;\">Ready</p>";
        }
       ?>
      <tr>
        <!-- memilah data -->
        <td><?= $mobo["ID_BARANG"]; ?></td>
        <td><?= $mobo["NAMA_BARANG"]; ?></td>
        <td align="center"><?= $mobo["STOK"]; ?></td>
        <td align="center"><?= $mobo["SATUAN"]; ?></td>
        <td>Rp. <?= number_format($mobo["HARGA_JUAL"]); ?></td>
        <td align="center"><?= $mobo_jumlah ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div> <!-- end container -->

<br><br><br><br><br><br><br><br><br><br><br>

<?php include'../template/footer.php'; ?>
