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
    <div class="tab-pane fade" id="master-barang" role="tabpanel" aria-labelledby="profile-tab"></div> <!-- end master barang -->

    <!-- master supplier start -->
    <div class="tab-pane fade  show active" id="master-supplier" role="tabpanel" aria-labelledby="contact-tab">
      <div class="form-input">

        <?php
          $id = $_GET["id"];//data id diterima dari master-barang.php
          $data_supp = tampil_data("SELECT * FROM supplier WHERE ID_SUPP = '$id'")[0];
         ?>

        <form class="" action="" method="post">
        <table class="table-group" id="form" cellpadding="4" align="center">
          <tr>
            <td>
              <div class="form-group">
              <label for="exampleInputEmail1">ID Supplier</label>
              <input class="form-control input-kategori" type="text" name="id_supp" value="<?= $data_supp["ID_SUPP"]; ?>" readonly>
              </div>
            </td>
            <td>
                <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input class="form-control" type="text" name="nama_supp" placeholder="" value="<?= $data_supp["NAMA"]; ?>">
                </div>
            </td>
            <td>
              <div class="form-group">
              <label for="exampleInputEmail1">Alamat</label>
              <input class="form-control input-barang" type="text" name="alamat" placeholder="" value="<?= $data_supp["ALAMAT"]; ?>">
              </div>
            </td>
            <td>
              <div class="form-group">
              <label for="exampleInputEmail1">No HP</label>
              <input class="form-control input-harga" name="hp" type="text" placeholder="" value="<?= $data_supp["NO_HP"]; ?>">
              </div>
            </td>
          </tr>
        </table>
          <button class="btn btn-submit btn-success" id="save" type="submit" name="update"><i class="fas fa-save mr-2"></i>Update</button><br><br>
          </form>

          <!-- php untuk kondisi tombol save ditekan -->
           <?php
           if (isset($_POST["update"])) {
             if (editsupp($_POST) > 0) {
               echo "
                   <script>
                   alert('Data Berhasil Diupdate!!');
                   document.location.href = '../admin/master-supplier.php';
                   </script>
               ";

             }

             else {
               echo "
                   <script>
                   alert('Data Gagal Diupdate!!');
                   </script>
               ";
             }
           }
            ?>


    <form class="form-inline" style="float:right" action="" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword" autofocus>
      <button class="btn btn-primary" type="submit" name="cari"><i class="fas fa-search"></i></button>
    </form><br><br>

    <table class="table table-bordered ">
      <thead class="thead-dark text-center">
        <tr>
          <th scope="col" width="1%">No.</th>
          <th scope="col" width="1%">ID</th>
          <th scope="col" width="10%">Nama Supplier</th>
          <th scope="col" width="10%">Alamat</th>
          <th scope="col" width="5%">No HP</th>
          <th scope="col" width="2.5%">Aksi</th>
        </tr>
      </thead>
      <?php
        $no=1;
        $data_supplier = tampil_data("SELECT * FROM supplier");
        foreach ($data_supplier as $supplier) :?>

        <tbody>
          <tr>
            <td align="center"><?= $no ?></td>
            <td align="center"><?= $supplier["ID_SUPP"]; ?></td>
            <td><?= $supplier["NAMA"]; ?></td>
            <td align="center"><?= $supplier["ALAMAT"]; ?></td>
            <td align="center"><?= $supplier["NO_HP"]; ?></td>
            <td>
                <a href="edit-supplier.php?id=<?=$supplier["ID_SUPP"]; ?>" ><button class="btn btn-warning" type="button" name="edit"><i class="fas fa-edit"></i></button>
                <a href="delete-supplier.php?id=<?=$supplier["ID_SUPP"]; ?>" onclick="return confirm('Apakah anda yakin ?');"><button class="btn btn-danger" type="button" name="delete"><i class="fas fa-trash"></i></button></a>
            </td>
          </tr>
        </tbody>

       <?php
        $no++;
        endforeach;
       ?>

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
