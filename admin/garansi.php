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
      <a class="nav-link" id="contact-tab" href="pembelian.php" role="tab" aria-controls="pembelian" aria-selected="false"><i class="fas fa-shopping-cart mr-2"></i>Pembelian</a>
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
      <a class="nav-link active" id="profile-tab" href="garansi.php" role="tab" aria-controls="garansi" aria-selected="false"><i class="fas fa-history mr-2"></i>Garansi</a>
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
    <div class="tab-pane fade" id="pembelian" role="tabpanel" aria-labelledby="profile-tab"></div><!-- end pembelian -->
    <div class="tab-pane fade" id="penjualan" role="tabpanel" aria-labelledby="contact-tab">penjualan</div>
    <div class="tab-pane fade" id="master-barang" role="tabpanel" aria-labelledby="profile-tab"></div> <!-- end master barang -->
    <div class="tab-pane fade" id="master-supplier" role="tabpanel" aria-labelledby="contact-tab"></div> <!-- end master supplier -->
    <div class="tab-pane fade" id="master-customer" role="tabpanel" aria-labelledby="profile-tab"></div> <!-- end master customer -->
    <div class="tab-pane fade show active" id="garansi" role="tabpanel" aria-labelledby="contact-tab">
      <br><br>
      <table class="table table-bordered ">
        <thead class="thead-dark text-center">
          <tr>
            <th scope="col" width="5%">No.</th>
            <th scope="col" width="20%">Invoice</th>
            <th scope="col" width="">Customer</th>
            <th scope="col" width="20%">Tanggal Beli</th>
            <th scope="col" width="20%">Tanggal Habis</th>
            <th scope="col" width="">Atur Garansi</th>
          </tr>
        </thead>
        <tbody>
          <?php $data_cust = tampil_data("SELECT * FROM `garansi` INNER JOIN penjualan on garansi.INV_PENJUALAN=penjualan.INV_PENJUALAN INNER JOIN pelanggan ON penjualan.ID_PELANGGAN=pelanggan.ID_PELANGGAN")  ?>
          <?php foreach ($data_cust as $cust) {
              $customer = $cust["NAMA"];
              $inv_pj = $cust["INV_PENJUALAN"];
          }
          if (!empty($cust["TGL_HABIS"])) {

            $tgl_hbs = tampil_data("SELECT TGL_HABIS FROM garansi WHERE INV_PENJUALAN = '$inv_pj'");
            foreach ($tgl_hbs as $tgl) {
              $note = $tgl["TGL_HABIS"];
            }

           }
           else {
             $note = "<p style=\"color:red;\">Garansi Belum di Atur</p>";

           }

          ?>


          <?php $no=1; $data_grs = tampil_data("SELECT * FROM inv_penjualan")  ?>
          <?php foreach ($data_grs as $garansi) :?>
          <tr>
            <td align="center"><?=$no; ?></td>
            <td align="center"><?=$garansi["id_inv"]; ?></td>
            <td align="center"><?=$customer; ?></td>
            <td align="center"><?=$garansi["TGL_TRX"]; ?></td>
            <td align="center"><?=$note; ?></td>
            <td align="center">
                <a href="garansi-set.php?id=<?=$garansi["id_inv"]; ?>" ><button class="btn btn-warning" type="button" name="edit"><i class="fas fa-edit"></i></button>
                <a href="delete.php?id=<?=$garansi["id_inv"]; ?>" onclick="return confirm('Apakah anda yakin ?');"><button class="btn btn-danger" type="button" name="delete"><i class="fas fa-trash"></i></button></a>
            </td>
          </tr>
        <?php $no++; endforeach; ?>
        </tbody>
      </table>



    </div> <!-- end garansi -->
    <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="contact-tab">news</div>
    <div class="tab-pane fade" id="promo" role="tabpanel" aria-labelledby="contact-tab">promo</div>

  </div> <!-- end tab-content -->

</div>
</div> <!-- end container -->

<br><br><br><br><br>

</body>
</html>
