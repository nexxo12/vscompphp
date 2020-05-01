<?php include'header.php';
      include'../function/function.php';
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
      <a class="nav-link" id="contact-tab"  href="penjualan.php" role="tab" aria-controls="penjualan" aria-selected="false"><i class="fas fa-money-bill mr-2"></i>Penjualan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="barang-tab"  href="master-barang.php" role="tab" aria-controls="master barang" aria-selected="false"><i class="fas fa-box mr-2"></i>Master Barang</a>
    </li>
    <li class="nav-item">
      <a class="nav-link  active" id="profile-tab"  href="master-supplier.php" role="tab" aria-controls="master supplier" aria-selected="false"><i class="fas fa-truck mr-2"></i>Master Supplier</a>
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
    <div class="tab-pane fade" id="penjualan" role="tabpanel" aria-labelledby="contact-tab">penjualan</div>

    <!-- tab master barang -->
    <div class="tab-pane fade" id="master-barang" role="tabpanel" aria-labelledby="profile-tab">

    </div> <!-- end master barang -->

    <!-- master supplier start -->
    <div class="tab-pane fade  show active" id="master-supplier" role="tabpanel" aria-labelledby="contact-tab">
      <div class="form-input">
          <table>
            <tr>
              <td><input class="form-control" type="text" placeholder="Jumlah Data"></td>
              <td><button class="btn btn-success" type="button" name="button" onclick="tampil_supp()"><i class="fas fa-plus mr-2"></i>Tambah</button></td>
            </tr>
        </table>
        <script type="text/javascript">
          function tampil_supp() {
            document.getElementById("supp1").style.display = "block";
            document.getElementById("supp2").style.display = "block";
          }
        </script>
        <br>

      <table class="table-group" id="supp1" cellpadding="4">
        <tr>
          <td>
            <div class="form-group">
            <label for="exampleInputEmail1">ID</label>
            <input class="form-control" type="text" placeholder="">
            </div>

          </td>
          <td>
            <div class="form-group">
            <label for="exampleInputEmail1">Nama Supplier</label>
            <input class="form-control" type="text" placeholder="">
            </div>

          </td>
          <td>
            <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <input class="form-control" type="text" placeholder="Satuan">
            </div>
          </td>
          <td>
            <div class="form-group">
            <label for="exampleInputEmail1">No HP</label>
            <input class="form-control" type="text" placeholder="Rp.">
            </div>
          </td>
        </tr>
    </table>
    <button class="btn btn-submit btn-success" id="supp2" type="button" name="button"><i class="fas fa-save mr-2"></i>Save</button><br><br>


    <form class="form-inline" style="float:right" action="#">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
    </form><br><br>
    <table class="table table-border">
      <thead>
        <tr>
          <th scope="col" width="0">ID</th>
          <th scope="col" width="0">Nama</th>
          <th scope="col" width="0">Alamat</th>
          <th scope="col">No HP</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>XPG SX8200 256GB M.2 NVME</td>
          <td>200</td>
          <td>Unit</td>
          <td>470.000</td>
          <td>Ready</td>
        </tr>
      </tbody>
    </table>
    </div>
    </div> <!-- end master supplier -->
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
