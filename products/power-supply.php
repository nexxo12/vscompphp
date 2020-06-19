<?php include'../function/function.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" href="../img/favicon.ico">
  <title>Power Supply List - VSComp</title>

<?php include'../template/header.php';?>

<h4 align="center">Power Supply Stock</h4>
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
      $data_psu = tampil_data("SELECT * FROM master_barang WHERE ID_KATEGORI = 5");
      //var_dump($data_proc);
      ?>
      <!--memasukan data ke table  -->
      <?php foreach ($data_psu as $psu) :?>
        <?php
          if ($psu["STOK"] == 0) {
              $psu_jumlah = "<p style=\"color:red;\">Habis</p>";
          }
          elseif ($psu["STOK"] < 5) {
              $psu_jumlah = "<p style=\"color:orange;\">Hampir Habis</p>";
          }
          else {
              $psu_jumlah = "<p style=\"color:green;\">Ready</p>";
          }
         ?>
      <tr>
        <td><?= $psu["ID_BARANG"]; ?></td>
        <td><?= $psu["NAMA_BARANG"]; ?></td>
        <td align="center"><?= $psu["STOK"]; ?></td>
        <td align="center"><?= $psu["SATUAN"]; ?></td>
        <td>Rp. <?=number_format($psu["HARGA_JUAL"]); ?></td>
        <td align="center"><?= $psu_jumlah; ?></td>
      </tr>
    <?php endforeach; ?>

    </tbody>
  </table>
</div> <!-- end container -->

<br><br><br><br><br><br><br><br><br><br><br>
<?php include'../template/footer.php'; ?>
