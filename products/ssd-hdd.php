<?php include'../function/function.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" href="../img/favicon.ico">
  <title>SSD & HDD List - VSComp</title>

<?php include'../template/header.php';?>

<h4 align="center">SSD & HDD Stock</h4>
<div class="container">
  <hr noshade></hr>
  <table class="table table-borderless" id="tabel-data">
    <thead class="text-center">
      <tr>
        <th scope="col" width="0">ID</th>
        <th scope="col">Nama</th>
        <th scope="col">Tipe</th>
        <th scope="col" width="0">Jumlah</th>
        <th scope="col" width="0">Satuan</th>
        <th scope="col">Harga</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      //menjalankan function di function.php
      $data_hddssd = tampil_data("SELECT * FROM master_barang INNER JOIN kategori ON master_barang.ID_KATEGORI=kategori.ID_KATEGORI WHERE master_barang.ID_KATEGORI = 4 OR master_barang.ID_KATEGORI =10");
      ?>
      <!--memasukan data ke table  -->
      <?php foreach ($data_hddssd as $hddssd) :?>
      <?php
        if ($hddssd["STOK"] == 0) {
            $hddssd_jumlah = "<p style=\"color:red;\">Habis</p>";
        }
        elseif ($mobo["STOK"] < 5) {
            $hddssd_jumlah = "<p style=\"color:orange;\">Hampir Habis</p>";
        }
        else {
            $hddssd_jumlah = "<p style=\"color:green;\">Ready</p>";
        }
       ?>
      <tr>
        <!-- memilah data -->
        <td><?= $hddssd["ID_BARANG"]; ?></td>
        <td><?= $hddssd["NAMA_BARANG"]; ?></td>
        <td align="center"><?= $hddssd["KATEGORI"]; ?></td>
        <td align="center"><?= $hddssd["STOK"]; ?></td>
        <td align="center"><?= $hddssd["SATUAN"]; ?></td>
        <td>Rp. <?= number_format($hddssd["HARGA_JUAL"]); ?></td>
        <td align="center"><?= $hddssd_jumlah ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div> <!-- end container -->
<br><br><br><br><br><br><br><br><br><br><br>

<?php include'../template/footer.php'; ?>
