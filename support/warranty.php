<?php include'../function/function.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" href="../img/favicon.ico">
  <title>Warranty - VSComp</title>

<?php include'../template/header.php';?>
<br><br>
<div class="container">
  <h4>Warranty</h4>
  <hr size="10" noshade>
  <br>
  <form class="" action="" method="post">
  <div class="input-warranty">
    <input type="text" class="form-control" name="invoice" id="berat" placeholder="Masukan Invoice Nota">
    <button type="submit" name="cek" class="btn btn-primary">Cek</button>
  </div>
  </form>
  <br><br>
  <table class="table table-bordered" width="100%">
    <thead>
      <tr align="center">
        <th scope="col">Barang</th>
        <th scope="col">Tanggal Beli</th>
        <th scope="col">Tanggal Habis</th>
        <th scope="col">Sisa Hari</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php

      if (isset($_POST["cek"])) {
          $inv = $_POST["invoice"];
          $data_garansi = tampil_data("SELECT * FROM garansi INNER JOIN master_barang ON garansi.ID_BARANG=master_barang.ID_BARANG WHERE INV_PENJUALAN = '$inv'");
          $data_barang = carigaransi($_POST["invoice"]);

      ?>
      <!--memasukan data ke table  -->
      <?php foreach ($data_garansi as $garansi) :?>
      <?php
        $tgl_hbs = $garansi["TGL_HABIS"];
        $tgl_beli = date('Y-m-d');
      ?>
        <?php
          $query = "SELECT datediff ('$tgl_hbs','$tgl_beli') as hari FROM garansi WHERE INV_PENJUALAN = '$inv'";
          $hasil = mysqli_query ($conn,$query);
          $data = mysqli_fetch_assoc($hasil);
          $selisihHari = $data["hari"];
          if ($selisihHari < 1) {
              $status = "<p style=\"color:red;\">Garansi Habis</p>";
          }
          else {
              $status = "<p style=\"color:green;\">Garansi Tersedia</p>";
          }
         ?>
      <tr>
        <td><?=$garansi["NAMA_BARANG"]; ?></td>
        <td align="center"><?=$garansi["TGL_BELI"]; ?></td>
        <td align="center"><?=$garansi["TGL_HABIS"]; ?></td>
        <td align="center"><?=$selisihHari; ?></td>
        <td align="center"><?=$status; ?></td>
      </tr>
    <?php
      endforeach;
      }
    ?>
    </tbody>
  </table>


</div> <!-- end container -->

<br><br><br><br><br><br><br><br><br><br><br>


<?php include'../template/footer.php'; ?>
