<?php include'../function/function.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" href="../img/favicon.ico">
  <title>Casing List - VSComp</title>

<?php include'../template/header.php';?>

<h4 align="center">Casing Stock</h4>
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
      $data_case = tampil_data("SELECT * FROM master_barang WHERE ID_KATEGORI = 7");
      ?>
      <!--memasukan data ke table  -->
      <?php foreach ($data_case as $case) :?>
      <?php
        if ($case["STOK"] == 0) {
            $case_jumlah = "<p style=\"color:red;\">Habis</p>";
        }
        elseif ($case["STOK"] < 5) {
            $case_jumlah = "<p style=\"color:orange;\">Hampir Habis</p>";
        }
        else {
            $case_jumlah = "<p style=\"color:green;\">Ready</p>";
        }
       ?>
      <tr>
        <!-- memilah data -->
        <td><?= $case["ID_BARANG"]; ?></td>
        <td><?= $case["NAMA_BARANG"]; ?></td>
        <td align="center"><?= $case["STOK"]; ?></td>
        <td align="center"><?= $case["SATUAN"]; ?></td>
        <td>Rp. <?= number_format($case["HARGA_JUAL"]); ?></td>
        <td align="center"><?= $case_jumlah ?></td>
      </tr>
    <?php endforeach; ?>

    </tbody>
  </table>
</div> <!-- end container -->

<br><br><br><br><br><br><br><br><br><br><br>


<?php include'../template/footer.php'; ?>
