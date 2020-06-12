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
          <form class="" action="" method="POST">
          <table>
            <tr>
              <td><button class="btn btn-success" type="submit" name="tambah"><i class="fas fa-plus mr-2"></i>Tambah Data</button></a></td>
            </tr>
        </table>
        </form>
        <br>


        <!-- php untuk input jumlah data -->
        <?php
            $autonumber_db = autonumber_supplier("ID_SUPP");//memanggil function autonumber
            if(isset($_POST["tambah"])){
              //$jumlah di looping


        ?>
        <form class="" action="" method="post">
        <table class="table-group" id="form" cellpadding="4" align="center">
          <tr>
            <td>
              <div class="form-group">
              <label for="exampleInputEmail1">ID Supplier</label>
              <input class="form-control input-kategori" type="text" name="id_supp" value="<?= $autonumber_db; ?>" readonly>
              </div>
            </td>
            <td>
              <div class="form-group">
              <label for="exampleInputEmail1">Nama Supplier</label>
              <input class="form-control" type="text" name="nama_supp" placeholder="">
              </div>

            </td>
            <td>
              <div class="form-group">
              <label for="exampleInputEmail1">Alamat</label>
              <input class="form-control input-barang" type="text" name="alamat" placeholder="">
              </div>
            </td>
            <td>
              <div class="form-group">
              <label for="exampleInputEmail1">No HP</label>
              <input class="form-control input-harga" name="hp" type="text" placeholder="08xxxxxx">
              </div>
            </td>
          </tr>
      </table>

          <button class="btn btn-submit btn-success" id="save" type="submit" name="save"><i class="fas fa-save mr-2"></i>Save</button><br><br>
          </form>
        <!--php penutup if  -->
        <?php
            }
         ?>

         <!-- php untuk tombol save -->
         <?php

             if(isset($_POST["save"])){
                //var_dump($_POST);

                if (tambahdata_supp($_POST) > 0) {

                    echo "<script language=\"javascript\">
                    swal({
                          title: \"Berhasil!\",
                          text: \"Data supplier berhasil ditambah!\",
                          icon: \"success\",
                          button: \"OK\",
                        });

                    </script>";


                }

                else {
                    echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                        <strong>Gagal!</strong> Data gagal disimpan, cek ulang!!
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                        </button></div>";
                        echo mysqli_error($conn);
                }

              }
          ?>
          <!-- end php -->
        <br>



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
        //start untuk pencarian
        if (isset($_POST["cari"])) {//name 'cari' dari form pencarian
        $data_supplier = carisupp($_POST["keyword"]);//$data_supplier ditumpuk dengan value keyword, dikirim ke function.php
        }
        //end pencarian

        foreach ($data_supplier as $supplier) :?>
        <tbody>
          <tr>
            <td align="center" name="no"><?= $no ?></td>
            <td align="center" name="supp"><?= $supplier["ID_SUPP"]; ?></td>
            <td name="nama"><?= $supplier["NAMA"]; ?></td>
            <td align="center" name="alamat"><?= $supplier["ALAMAT"]; ?></td>
            <td align="center" name="nohp"><?= $supplier["NO_HP"]; ?></td>
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
