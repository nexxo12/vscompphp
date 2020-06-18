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
        $id = $_GET["id"];//data id diterima dari master-barang.php
        $garansi = tampil_data("SELECT * FROM garansi INNER JOIN master_barang ON garansi.ID_BARANG = master_barang.ID_BARANG WHERE INV_PENJUALAN = '$id'")[0];
       ?>

       <form class="" action="" method="post">
       <table class="table-group" id="form" cellpadding="4" align="center">
         <tr>
           <td width="10%">
             <div class="form-group">
             <label for="exampleInputEmail1">Invoice : </label>
             <input type="hidden" name="id_grs" value="<?= $garansi["ID_GARANSI"]; ?>">
             <input class="form-control" type="text" name="inv" value="<?= $garansi["INV_PENJUALAN"]; ?>" readonly>
             </div>
           </td>
           <td width="45%">
             <div class="form-group">
             <label for="exampleInputEmail1">Nama barang : </label>
             <input type="hidden" name="id_barang" value="<?= $garansi["ID_BARANG"]; ?>">
             <input class="form-control" type="text" name="" value="<?= $garansi["NAMA_BARANG"]; ?>" readonly>
             </div>

           </td>
           <td>
             <div class="form-group">
               <label for="exampleInputEmail1">Tanggal Pembelian : </label>
               <input class="form-control" type="text" name="tgl_beli" value="<?= $garansi["TGL_BELI"]; ?>" readonly>
             </div>

           </td>
           <td width="">
             <label for="exampleInputEmail1">Tanggal Habis : </label>
             <div class="input-group mb-3">
               <div class="input-group-prepend">
                 <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
               </div>
                <input class="form-control datepicker" type="text" name="tgl_habis" value="<?= $garansi["TGL_HABIS"]; ?>" autocomplete="off">
             </div>
           </td>
         </tr>
     </table>
     <button class="btn btn-submit btn-success" id="save" type="submit" name="simpan"><i class="fas fa-upload mr-2"></i>Simpan</button>
   </form>
   <!-- php untuk kondisi tombol save ditekan -->
    <?php
    if (isset($_POST["simpan"])) {
      if (editgaransi($_POST) > 0) {
        echo "<script language=\"javascript\">
        swal({
              title: \"Berhasil!\",
              text: \"Garansi berhasil di tambah!\",
              icon: \"success\",
              button: \"OK\",
            }).then((oke) => {
              document.location.href = 'garansi.php';
              });;

        </script>";

      }

      else {
        echo mysqli_error($conn);
      }
    }
     ?>

     <?php
     $data_cust = tampil_data("SELECT * FROM `garansi` INNER JOIN penjualan on garansi.INV_PENJUALAN=penjualan.INV_PENJUALAN INNER JOIN pelanggan ON penjualan.ID_PELANGGAN=pelanggan.ID_PELANGGAN");
     foreach ($data_cust as $cust) {
         $customer = $cust["NAMA"];
         $inv_pj = $cust["INV_PENJUALAN"];
     }
     ?>
     <br><br>
     <table cellpadding="3">
       <tr>
         <td><h6>INVOICE</h6></td>
         <td><h6>:</h6></td>
         <td><h6><?=$inv_pj; ?></h6></td>
       </tr>
       <tr>
         <td><h6>Customer</h6></td>
         <td><h6>:</h6></td>
         <td><h6><?=$customer; ?></h6></td>
       </tr>
     </table>
    <form class="" action="" method="post">
      <table class="table table-bordered ">
        <thead class="thead-dark text-center">
          <tr>
            <th scope="col" width="5%">No.</th>
            <th scope="col" width="10%">Invoice</th>
            <th scope="col" width="45%">Nama Barang</th>
            <th scope="col" width="14%">Tanggal Beli</th>
            <th scope="col" width="14%">Tanggal Habis</th>
          </tr>
        </thead>
        <tbody>


          <?php $no=1; $data_grs = tampil_data("SELECT * FROM garansi INNER JOIN master_barang ON garansi.ID_BARANG = master_barang.ID_BARANG WHERE INV_PENJUALAN = '$id'")  ?>
          <?php foreach ($data_grs as $garansi) :?>
          <tr>
            <td align="center"><?=$no; ?></td>
            <td align="center"><?=$garansi["INV_PENJUALAN"]; ?></td>
            <td><?=$garansi["NAMA_BARANG"]; ?></td>
            <td align="center"><?=$garansi["TGL_BELI"]; ?></td>
            <td align="center"><?=$garansi["TGL_HABIS"]; ?></td>
          </tr>
        <?php $no++; endforeach; ?>
        </tbody>
      </table>
      </form>
      <a href="garansi.php"><button class="btn btn-primary btn-submit" type="submit" name=""><i class="fas fa-undo mr-2"></i>Kembali</button></a>



    </div> <!-- end garansi -->
    <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="contact-tab">news</div>
    <div class="tab-pane fade" id="promo" role="tabpanel" aria-labelledby="contact-tab">promo</div>

  </div> <!-- end tab-content -->

</div>
</div> <!-- end container -->

<br><br><br><br><br>


<script type="text/javascript">
 $(function(){
  $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>
</body>
</html>
