<?php include'function/function.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" href="img/favicon.ico">
  <title>Paket PC - VSComp</title>

<?php include'template/header2.php';?>
<br>

<div class="container-fluid custom-container">
  <br>
  <div class="row">
    <?php
    $no=1;
    $data_barang = tampil_data("SELECT * FROM paket_pc");
    foreach ($data_barang as $barang) :?>
    <div class="col-md-3 mb-3 paketPC">
      <div class="card" style="width: 19rem;">
        <div class="card-header bg-primary text-white"><h5>Paket PC Rakitan #<?=$no; ?></h5></div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><h2>IDR <?=number_format($barang["HARGA_PC"]); ?></h2></li>
            <li class="list-group-item"><?=$barang["PROC"]; ?></li>
            <li class="list-group-item"><?=$barang["RAM"]; ?></li>
            <li class="list-group-item"><?=$barang["MOBO"]; ?></li>
            <li class="list-group-item"><?=$barang["SSD"]; ?></li>
            <li class="list-group-item"><?=$barang["HDD"]; ?></li>
            <li class="list-group-item"><?=$barang["VGA"]; ?></li>
            <li class="list-group-item"><?=$barang["PSU"]; ?></li>
            <li class="list-group-item"><?=$barang["CASING"]; ?></li>
            <li class="list-group-item"><?=$barang["MONITOR"]; ?></li>
            <li class="list-group-item"><?=$barang["KEYB"]; ?></li>
            <br>
              <div class="order">
              <a href="support/contact.php"><button type="submit" class="btn btn-primary order">Order</button></a>
              </div>
            <br>
            <p class="card-text"><small class="text-muted">Last updated : <?=$barang["TGL_PC"]; ?></small></p>

          </ul>

      </div>
   </div> <!-- end col-md -->
   <!--<div class="space"></div>-->
   <?php $no++; endforeach; ?>
  </div> <!-- end row -->

  <br>
</div> <!-- end container -->

<br><br><br>


<?php include'template/footer2.php'; ?>
