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
      <a class="nav-link active" id="barang-tab" href="master-barang.php" role="tab" aria-controls="master barang" aria-selected="false"><i class="fas fa-box mr-2"></i>Master Barang</a>
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
    <div class="tab-pane fade" id="pembelian" role="tabpanel" aria-labelledby="profile-tab">pembelian</div>
    <div class="tab-pane fade" id="penjualan" role="tabpanel" aria-labelledby="contact-tab">penjualan</div>

    <!-- tab master barang -->
    <div class="tab-pane fade  show active" id="master-barang" role="tabpanel" aria-labelledby="profile-tab">
        <br><br>

        <?php
          $id = $_GET["id"];//data id diterima dari master-barang.php
          $barang = tampil_data("SELECT * FROM master_barang INNER JOIN kategori ON master_barang.ID_KATEGORI=kategori.ID_KATEGORI WHERE ID_BARANG = '$id'")[0];

         ?>

        <form class="" action="" method="post">
        <table class="table-group" id="form" cellpadding="4" align="center">
          <tr>
            <td width="10%">
              <div class="form-group">
              <label for="exampleInputEmail1">ID Barang</label>
              <input class="form-control" type="text" name="id_barang" value="<?= $barang["ID_BARANG"]; ?>" readonly>
              </div>
            </td>
            <td width="48%">
              <div class="form-group">
              <label for="exampleInputEmail1">Nama barang</label>
              <input class="form-control" type="text" name="nama_barang" value="<?= $barang["NAMA_BARANG"]; ?>">
              </div>

            </td>
            <td>
              <div class="form-group">
                <label for="exampleInputEmail1">Kategori</label>
                <select class="form-control" name="kategori">
                    <option value="<?= $barang["ID_KATEGORI"]; ?>"><?=$barang["KATEGORI"]; ?></option>

                </select>
              </div>

            </td>
            <td width="10%">
              <div class="form-group">
              <label for="exampleInputEmail1">Satuan</label>
              <input class="form-control" type="text" name="satuan" value="<?= $barang["SATUAN"]; ?>">
              </div>
            </td>
            <td>
              <div class="form-group">
              <label for="exampleInputEmail1">Harga</label>
              <input class="form-control input-harga" name="harga" type="text" value="<?= $barang["HARGA_JUAL"]; ?>">
              </div>
            </td>
          </tr>
      </table>
      <button class="btn btn-submit btn-success" id="save" type="submit" name="update"><i class="fas fa-upload mr-2"></i>Update</button>
    </form>

    <!-- php untuk kondisi tombol save ditekan -->
     <?php
     if (isset($_POST["update"])) {
       if (editbarang($_POST) > 0) {
         echo "<script language=\"javascript\">
         swal({
               title: \"Berhasil!\",
               text: \"Data barang berhasil diubah!\",
               icon: \"success\",
               button: \"OK\",
             }).then((oke) => {
               document.location.href = 'master-barang.php';
               });;

         </script>";

       }

       else {
         echo mysqli_error($conn);
       }
     }
      ?>


    <form class="form-inline" style="float:right" action="#">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
    </form><br><br>
    <table class="table table-bordered ">
      <thead class="thead-dark">
        <tr>
          <th scope="col" width="5%">No.</th>
          <th scope="col" width="6%">ID</th>
          <th scope="col" width="">Nama Barang</th>
          <th scope="col" width="">Kategori</th>
          <th scope="col" width="4%">Jumlah</th>
          <th scope="col" width="5%">Satuan</th>
          <th scope="col" width="14%">Harga</th>
          <th scope="col" width="10%">Aksi</th>
        </tr>
      </thead>
      <?php
        $no=1;
        $data_barang = tampil_data("SELECT * FROM master_barang INNER JOIN kategori ON master_barang.ID_KATEGORI=kategori.ID_KATEGORI");
        foreach ($data_barang as $barang) :?>

        <tbody>
          <tr>
            <td align="center"><?= $no ?></td>
            <td><?= $barang["ID_BARANG"]; ?></td>
            <td><?= $barang["NAMA_BARANG"]; ?></td>
            <td align="center"><?= $barang["KATEGORI"]; ?></td>
            <td align="center"><?= $barang["STOK"]; ?></td>
            <td align="center"><?= $barang["SATUAN"]; ?></td>
            <td>Rp. <?= number_format($barang["HARGA_JUAL"]); ?></td>
            <td>
                <a href="edit-barang.php?id=<?=$barang["ID_BARANG"]; ?>" ><button class="btn btn-warning" type="button" name="edit"><i class="fas fa-edit"></i></button>
                <a href="delete.php?id=<?=$barang["ID_BARANG"]; ?>" onclick="return confirm('Apakah anda yakin ?');"><button class="btn btn-danger" type="button" name="delete"><i class="fas fa-trash"></i></button></a>
            </td>
          </tr>
        </tbody>

       <?php
        $no++;
        endforeach;
       ?>

    </table>
    </div>
  </div> <!-- end master barang -->

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
