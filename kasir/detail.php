<?php include'header.php';

?>

<div class="container-fluid custom-container">
  <div class="nav-menu">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link" id="home-tab"  href="dasboard.php" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-home mr-2"></i>Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="contact-tab"  href="pembelian.php" role="tab" aria-controls="pembelian" aria-selected="false"><i class="fas fa-shopping-cart mr-2"></i>Pembelian</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" id="contact-tab"  href="penjualan.php" role="tab" aria-controls="penjualan" aria-selected="false"><i class="fas fa-money-bill mr-2"></i>Penjualan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="barang-tab"  href="master-barang.php" role="tab" aria-controls="master barang" aria-selected="false"><i class="fas fa-box mr-2"></i>Master Barang</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab"  href="master-supplier.php" role="tab" aria-controls="master supplier" aria-selected="false"><i class="fas fa-truck mr-2"></i>Master Supplier</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab"  href="master-customer.php" role="tab" aria-controls="master customer" aria-selected="false"><i class="fas fa-users mr-2"></i>Master Customer</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab"  href="garansi.php" role="tab" aria-controls="garansi" aria-selected="false"><i class="fas fa-history mr-2"></i>Garansi</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab"  href="news.php" role="tab" aria-controls="news" aria-selected="false"><i class="fas fa-newspaper mr-2"></i>News</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab"  href="promo.php" role="tab" aria-controls="promo" aria-selected="false"><i class="fas fa-percentage mr-2"></i>Promo</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">tampilan dasboard</div>
    <div class="tab-pane fade" id="pembelian" role="tabpanel" aria-labelledby="profile-tab">pembelian</div>

    <!-- penjualan start -->
    <div class="tab-pane fade show active" id="penjualan" role="tabpanel" aria-labelledby="contact-tab">
    <br>
    <div class="card">
      <h5 class="card-header">Detail Penjualan</h5>
    <div class="card-body">
      <br><br>
      <?php $invoice = $_GET["id"]; ?>
      <?php $data_pj = tampil_data("SELECT * FROM penjualan INNER JOIN master_barang ON penjualan.ID_BARANG=master_barang.ID_BARANG INNER JOIN pelanggan ON penjualan.ID_PELANGGAN=pelanggan.ID_PELANGGAN WHERE INV_PENJUALAN = '$invoice'")  ?>
      <?php foreach ($data_pj as $inv) :?>
      <?php endforeach; ?>

      <table cellpadding="3">
        <tr>
          <td><h5>INVOICE</h5></td>
          <td><h5>:</h5></td>
          <td><h5><?=$inv["INV_PENJUALAN"]; ?></h5></td>
        </tr>
        <tr>
          <td><h5>Tanggal Transaksi</h5></td>
          <td><h5>:</h5></td>
          <td><h5><?=$inv["TANGGAL_TRANSAKSI"]; ?></h5></td>
        </tr>
        <tr>
          <td><h5>Pelanggan</h5></td>
          <td><h5>:</h5></td>
          <td><h5><?=$inv["NAMA"]; ?></h5></td>
        </tr>
        <tr>
          <td><h5>Kasir</h5></td>
          <td><h5>:</h5></td>
          <td><h5><?=$row["NAMA"]; ?></h5></td>
        </tr>
      </table>
      <br>
      <table class="table ">
        <thead>
          <tr>
            <th scope="col" width="" class="text-center">No.</th>
            <th scope="col" width="">Nama Barang</th>
            <th scope="col" width="" class="text-center">Harga Jual</th>
            <th scope="col" width="" class="text-center">Jumlah Beli</th>
            <th scope="col" width="" class="text-center">Total Harga</th>
          </tr>
        </thead>
        <tbody>
          <?php $invoice = $_GET["id"]; $no=1; ?>
          <?php $data_pj = tampil_data("SELECT * FROM penjualan INNER JOIN master_barang ON penjualan.ID_BARANG=master_barang.ID_BARANG WHERE INV_PENJUALAN = '$invoice'")  ?>
          <?php foreach ($data_pj as $inv) :?>
          <tr>
            <td align="center"><?=$no; ?></td>
            <td><?=$inv["NAMA_BARANG"]; ?></td>
            <td align="center">Rp. <?=number_format($inv["HARGA_JUALPJ"]); ?></td>
            <td align="center"><?=$inv["JUMLAH_BELI"]; ?></td>
            <td align="center">Rp. <?=number_format($inv["TOTAL_HARGA"]); ?></td>
          </tr>
        <?php $no++; endforeach; ?>
        </tbody>
      </table>
      <a href="history-penjualan.php"><button class="btn btn-primary" type="submit" name="kembali" value="" style="margin-left:45%;">Kembali</button></a>

    </div> <!-- end card body -->
  </div> <!-- end card -->
  </div> <!-- end penjualan -->
    <!-- tab master barang -->
    <div class="tab-pane fade" id="master-barang" role="tabpanel" aria-labelledby="profile-tab"></div> <!-- end master barang -->
    <!-- master supplier start -->
    <div class="tab-pane fade" id="master-supplier" role="tabpanel" aria-labelledby="contact-tab"></div> <!-- end master supplier -->
    <div class="tab-pane fade" id="master-customer" role="tabpanel" aria-labelledby="profile-tab">master customer</div>
    <div class="tab-pane fade" id="garansi" role="tabpanel" aria-labelledby="contact-tab">Garansi</div>
    <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="contact-tab">news</div>
    <div class="tab-pane fade" id="promo" role="tabpanel" aria-labelledby="contact-tab">promo</div>

  </div> <!-- end tab-content -->

</div> <!-- end nav menu -->
</div> <!-- end container -->

<br><br><br><br><br>
</body>
</html>
