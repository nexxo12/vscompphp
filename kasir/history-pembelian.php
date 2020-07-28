<?php include'header.php';

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

    <div class="tab-pane fade show active" id="pembelian" role="tabpanel" aria-labelledby="profile-tab">
      <br>
      <div class="card">
        <h5 class="card-header">History Pembelian</h5>
      <div class="card-body">
        <table class="table table-bordered table-responsive-sm" id="tabel-data">
          <thead class="thead-dark text-center">
            <tr>
              <th scope="col" width="9%">No Faktur</th>
              <th scope="col" width="35%">Nama Barang</th>
              <th scope="col" width="5%">QTY</th>
              <th scope="col" width="6%">Satuan</th>
              <th scope="col" width="13%">Harga</th>
              <th scope="col" width="13%">Supplier</th>
              <th scope="col" width="9%">Tanggal</th>
              <th scope="col" width="5%">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $data_beli = tampil_data("SELECT *  FROM pembelian_barang INNER JOIN master_barang ON
                               pembelian_barang.ID_BARANG=master_barang.ID_BARANG INNER JOIN supplier ON supplier.ID_SUPP=pembelian_barang.ID_SUPP ORDER BY ID_BELI DESC"); ?>
            <?php foreach ($data_beli as $beli) :?>
            <tr>
              <td align="center"><?=$beli["ID_BELI"]; ?></td>
              <td><?=$beli["NAMA_BARANG"]; ?></td>
              <td align="center"><?=$beli["JUMLAH"]; ?></td>
              <td align="center"><?=$beli["SATUAN"]; ?></td>
              <td>Rp. <?=number_format($beli["HARGA_BELI"]); ?></td>
              <td><?=$beli["NAMA"]; ?></td>
              <td><?=$beli["TGL_BELI"]; ?></td>
              <form class="" action="" method="get">
              <td><button class="btn btn-danger" type="submit" name="delete" value="<?=$beli["ID_BELI"]; ?>" onclick="return confirm('Apakah anda yakin ?');"><i class="fas fa-trash"></i></button></a></td>
              </form>
            </tr>
          <?php
          if (isset($_GET["delete"])) {//periksa jika add mengirimkan data
              $id_del = $_GET["delete"];//data diterima sesuai yang dikirimkan
              $del_barang = deletepembelian("DELETE FROM pembelian_barang WHERE ID_BELI= '$id_del'");

              if ($del_barang > 0) {
                  echo "
                      <script>
                      alert('Data Berhasil Dihapus!!');
                      document.location.href = 'pembelian.php';
                      </script>
                  ";

              }

              else {
                echo "
                    <script>
                    alert('Data Gagal Dihapus!!');
                    </script>
                ";
                echo mysqli_error($conn);
              }


            }
          ?>
          <?php endforeach; ?>
          </tbody>
        </table>
        <a href="pembelian.php"><button class="btn btn-primary" type="submit" name="kembali" value="" style="margin-left:45%;">Kembali</button></a>

      </div> <!-- end card body -->
    </div> <!-- end card -->
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

<script type="text/javascript">
$(document).ready(function(){
    $('#tabel-data').DataTable();
});
</script>

</body>
</html>
