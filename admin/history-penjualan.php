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
      <h5 class="card-header">History Penjualan</h5>
    <div class="card-body">
      <table class="table table-bordered table-responsive-sm" id="tabel-data">
        <thead class="thead-dark ">
          <tr>
            <th scope="col" width="12%" class="text-center">Invoice</th>
            <th scope="col" width="">Nama Barang</th>
            <th scope="col" width="15%" class="text-center">Total Transaksi</th>
            <th scope="col" width="15%" class="text-center">Tanggal Transaksi</th>
            <th scope="col" width="16%" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $data_inv = tampil_data("SELECT * FROM inv_penjualan")  ?>
          <?php foreach ($data_inv as $inv) :?>
          <tr>
            <td align="center"><?=$inv["id_inv"]; ?></td>
            <td><?=$inv["BARANG"]; ?></td>
            <td align="center">Rp. <?=number_format($inv["GRAND_TOTAL"]); ?></td>
            <td align="center"><?=$inv["TGL_TRX"]; ?></td>
            <td align="center">
              <a href="detail.php?id=<?=$inv["id_inv"]; ?>"><button class="btn btn-success" type="submit" name="detail" value=""><i class="fas fa-list"></i></button></a>
              <a href="print-view.php?inv=<?=$inv["id_inv"]; ?>" target="_blank"><button class="btn btn-info" type="submit" name="print" value=""><i class="fas fa-print"></i></button></a>
              <a href="delete-h.php?id=<?=$inv["id_inv"]; ?>"><button class="btn btn-danger" type="submit" name="delete" value="" onclick="return confirm('Apakah anda yakin ?');"><i class="fas fa-trash"></i></button></a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
      <a href="penjualan.php"><button class="btn btn-primary" type="submit" name="kembali" value="" style="margin-left:45%;">Kembali</button></a>

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

<script type="text/javascript">
$(document).ready(function(){
    $('#tabel-data').DataTable();
});
</script>
</body>
</html>
