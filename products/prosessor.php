<?php include'../function/function.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" href="../img/favicon.ico">
  <title>Prosessor List - VSComp</title>

<?php include'../template/header.php';?>

<h4 align="center">Prosessor Stock</h4>
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
      $data_proc = tampil_data("SELECT * FROM master_barang WHERE ID_KATEGORI = 1");
      //var_dump($data_proc);");
      //var_dump($data_proc);
      ?>
      <!--memasukan data ke table  -->
      <?php foreach ($data_proc as $proc) :?>
        <?php
          if ($proc["STOK"] == 0) {
              $proc_jumlah = "<p style=\"color:red;\">Habis</p>";
          }
          elseif ($proc["STOK"] < 5) {
              $proc_jumlah = "<p style=\"color:orange;\">Hampir Habis</p>";
          }
          else {
              $proc_jumlah = "<p style=\"color:green;\">Ready</p>";
          }
         ?>
      <tr>
        <!-- memilah data -->
        <td><?= $proc["ID_BARANG"]; ?></td>
        <td><?= $proc["NAMA_BARANG"]; ?></td>
        <td align="center"><?= $proc["STOK"]; ?></td>
        <td align="center"><?= $proc["SATUAN"]; ?></td>
        <td>Rp. <?= number_format($proc["HARGA_JUAL"]); ?></td>
        <td align="center"><?= $proc_jumlah; ?></td>
      </tr>
    <?php endforeach; ?>

    </tbody>
  </table>
</div> <!-- end container -->

<br><br><br><br><br><br><br><br><br><br><br>

<?php include'../template/footer.php'; ?>
