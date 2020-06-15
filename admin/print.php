<?php include'../function/function.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
    <title>Print - VSComp</title>
  </head>
  <body>
<div class="container">

  <?php $invoice = $_GET["inv"]; ?>
  <?php $data_pj = tampil_data("SELECT * FROM penjualan INNER JOIN master_barang ON penjualan.ID_BARANG=master_barang.ID_BARANG INNER JOIN pelanggan ON penjualan.ID_PELANGGAN=pelanggan.ID_PELANGGAN WHERE INV_PENJUALAN = '$invoice'")  ?>
  <?php foreach ($data_pj as $inv) :?>
  <?php endforeach; ?>

  <table width="100%" border="0">
    <tr>
      <td rowspan="3" width="12%"><img src="../img/LogoWEBV2.png" alt="" style="height:130px; width:130px;"></td>
      <td width="35%">
        <h3>VSComputer</h3>
        <i class="fas fa-map-marker-alt mr-2"></i>Bendul merisi permai Blok D no. D9 - Surabaya
      </td>
      <td></td>
      <td><h5>INVOICE : <?=$inv["INV_PENJUALAN"]; ?></h5><strong><?=$inv["NAMA"]; ?></strong></td>
    </tr>
    <tr>
      <td><i class="fas fa-envelope-square mr-2"></i>ravinorahman@gmail.com</td>
      <td></td>
      <td>Alamat : <?=$inv["ALAMAT"]; ?></td>
    </tr>
    <tr>
      <td><i class="fab fa-whatsapp mr-2"></i>08385-352-5037</td>
      <td></td>
      <td>Hp : <?=$inv["HP"]; ?></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td width="30%"></td>
      <td>Tanggal : <?=$inv["TANGGAL_TRANSAKSI"]; ?></td>
    </tr>

  </table>
<br>
<table class="table table-border" align="center">
  <thead>
    <tr>
      <th scope="col" width="5%">No.</th>
      <th scope="col">Nama Barang</th>
      <th scope="col" width="18%">Harga (Rp.)</th>
      <th scope="col" width="7%" class="text-center">Jumlah</th>
      <th scope="col" width="20%">Subtotal (Rp.)</th>
    </tr>
  </thead>
    <tbody>
      <?php $no=1; foreach ($data_pj as $inv) :?>
          <tr>
            <td align="center"><?=$no; ?></td>
            <td><?=$inv["NAMA_BARANG"]; ?></td>
            <td ><?=number_format($inv["HARGA_JUALPJ"]); ?></td>
            <td align="center"><?=$inv["JUMLAH_BELI"]; ?></td>
            <td><?=number_format($inv["TOTAL_HARGA"]); ?></td>
          </tr>
    </tbody>
    <?php $no++; endforeach; ?>
    <tfoot>
      <!-- menampilkan total harga -->
      <?php $sum_total = tampil_data("SELECT SUM(TOTAL_HARGA) AS jumlah FROM penjualan WHERE INV_PENJUALAN = '$invoice'");?>
      <?php foreach ($sum_total as $jumlaht) {
            $total_harga = number_format($jumlaht["jumlah"]);
      } ?>
      <!-- menampilkan total jumlah -->
      <?php $sum_jumlah = tampil_data("SELECT SUM(JUMLAH_BELI) AS jumlah_beli FROM penjualan WHERE INV_PENJUALAN = '$invoice'");?>
      <?php foreach ($sum_jumlah as $jumlaht) {
            $total_beli = number_format($jumlaht["jumlah_beli"]);
      } ?>
      <tr>
        <td colspan="2" class="bg-light"><h5>Catatan : </h5><p>- Garansi tidak berlaku apabila terjadi "Human Error"<br>
                              - Barang yang dibeli tidak dapat dikembalikan/ditukar <br>
                              - Untuk cek garansi, silahkan masukan invoice di Web pada menu "Warranty"</p></td>
        <td><h4 style="text-align:right;">Grand Total : </h4></td>
        <td align="center"><h4><?=$total_beli;  ?></h4></td>
        <td><h4><?=$total_harga;  ?></h4></td>
      </tr>
    </tfoot>
</table>

</div>

<script type="text/javascript">
window.print();
</script>
</body>
</html>
