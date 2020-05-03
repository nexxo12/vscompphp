<?php include'header.php';
      include'../function/function.php';
?>

<div class="container-fluid custom-container">
  <div class="nav-menu">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link" id="home-tab" href="dasboard.php" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-home mr-2"></i>Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" id="contact-tab" href="pembelian.php" role="tab" aria-controls="pembelian" aria-selected="false"><i class="fas fa-shopping-cart mr-2"></i>Pembelian</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="contact-tab" href="penjualan.php" role="tab" aria-controls="penjualan" aria-selected="false"><i class="fas fa-money-bill mr-2"></i>Penjualan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="barang-tab" href="master-barang.php" role="tab" aria-controls="master barang" aria-selected="false"><i class="fas fa-box mr-2"></i>Master Barang</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" href="master-supplier.php" role="tab" aria-controls="master supplier" aria-selected="false"><i class="fas fa-truck mr-2"></i>Master Supplier</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" href="master-customer.php" role="tab" aria-controls="master customer" aria-selected="false"><i class="fas fa-users mr-2"></i>Master Customer</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" href="garansi.php" role="tab" aria-controls="garansi" aria-selected="false"><i class="fas fa-history mr-2"></i>Garansi</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" href="news.php" role="tab" aria-controls="news" aria-selected="false"><i class="fas fa-newspaper mr-2"></i>News</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" href="promo.php" role="tab" aria-controls="promo" aria-selected="false"><i class="fas fa-percentage mr-2"></i>Promo</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">tampilan dasboard</div>
      <br>
      <table class="table-group" id="form" cellpadding="4" align="center" width="100%">
        <tr>
          <td><label for="exampleInputEmail1">No. Faktur : </label></td>
          <td>
            <div class="form-group">
            <input class="form-control" type="text" name="id_barang" value="">
            </div>
          </td>

          <td><label for="exampleInputEmail1">Supplier :</label></td>
          <td>
            <div class="form-group">
            <input class="form-control" type="text" name="nama_barang" placeholder="">
            </div>
          </td>

          <td><label for="exampleInputEmail1">Tanggal :</label></td>
          <td>
            <div class="form-group">
            <input class="form-control" type="text" name="satuan" placeholder="Satuan">
            </div>
          </td>
        </tr>
        <tr>
          <td><label for="exampleInputEmail1">Tanggal</label></td>
          <td>
            <div class="form-group">
            <input class="form-control" name="harga" type="text" placeholder="Rp.">
            </div>
          </td>
      </tr>
    </table>

    </div>
    <!-- end pembelian -->
    <div class="tab-pane fade" id="penjualan" role="tabpanel" aria-labelledby="contact-tab">penjualan</div>
    <!-- tab master barang -->
    <div class="tab-pane fade" id="master-barang" role="tabpanel" aria-labelledby="profile-tab"></div> <!-- end master barang -->
    <!-- master supplier start -->
    <div class="tab-pane fade" id="master-supplier" role="tabpanel" aria-labelledby="contact-tab"></div> <!-- end master supplier -->
    <div class="tab-pane fade" id="master-customer" role="tabpanel" aria-labelledby="profile-tab">master customer</div>
    <div class="tab-pane fade" id="garansi" role="tabpanel" aria-labelledby="contact-tab">Garansi</div>
    <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="contact-tab">news</div>
    <div class="tab-pane fade" id="promo" role="tabpanel" aria-labelledby="contact-tab">promo</div>

  </div> <!-- end tab-content -->

</div>
</div> <!-- end container -->

<br><br><br><br><br>

</body>
</html>
