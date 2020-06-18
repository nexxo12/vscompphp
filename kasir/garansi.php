<?php include'header.php';

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
      <?php
      $data_garansi = tampil_data("SELECT INV_PENJUALAN, TGL_HABIS FROM garansi");
      $data_garansi2 = array_map("unserialize", array_unique(array_map("serialize", $data_garansi)));
      // $data_garansi_inv = tampil_data("SELECT INV_PENJUALAN FROM garansi WHERE TGL_HABIS = '0000-00-00'");
      // $inv = array_map("unserialize", array_unique(array_map("serialize", $data_garansi_inv)));
      // foreach ($inv as $invoice) {
      //   $inv_garansi = $invoice["INV_PENJUALAN"]." ";
      // }
      // echo "<pre>";
      // echo print_r($data_garansi2);
      // echo "</pre>";
      foreach ($data_garansi2 as $grs) {
         $data_tgl = $grs["TGL_HABIS"];
         if ($data_tgl == "0000-00-00" ) {
           //echo "string" .$inv_count;
           echo "
             <div class=\"alert alert-warning\"><i class=\"fas fa-info-circle mr-1\"></i>
             <strong>Info!</strong> Ada garansi yang belum di atur, silahkan cek <b>".$grs["INV_PENJUALAN"]."</b> dan <b>Atur Garansi!!</b></div>"
             ;

          }
          else {
            echo " ";

          }

      }







      ?>

      <table class="table table-bordered " id="tabel-data">
        <thead class="thead-dark text-center">
          <tr>
            <th scope="col" width="5%">No.</th>
            <th scope="col" width="10%">Invoice</th>
            <th scope="col" width="45%">Nama Barang</th>
            <th scope="col" width="10%">Tanggal Beli</th>
            <th scope="col" width="10%">Atur Garansi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; $data_grs = tampil_data("SELECT * FROM inv_penjualan")  ?>
          <?php foreach ($data_grs as $garansi) :?>
          <tr>
            <td align="center"><?=$no; ?></td>
            <td align="center"><?=$garansi["id_inv"]; ?></td>
            <td><?=$garansi["BARANG"]; ?></td>
            <td align="center"><?=$garansi["TGL_TRX"]; ?></td>
            <td align="center">
                <a href="garansi-set.php?id=<?=$garansi["id_inv"]; ?>" ><button class="btn btn-warning" type="button" name="edit"><i class="fas fa-edit"></i></button>
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

<script type="text/javascript">
$(document).ready(function(){
    $('#tabel-data').DataTable();
});
</script>
</body>
</html>
