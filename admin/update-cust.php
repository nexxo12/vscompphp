<?php
include'header.php';
    
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
      <a class="nav-link active" id="profile-tab" href="master-customer.php" role="tab" aria-controls="master customer" aria-selected="false"><i class="fas fa-users mr-2"></i>Master Customer</a>
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
    <div class="tab-pane fade" id="pembelian" role="tabpanel" aria-labelledby="profile-tab"></div><!-- end pembelian -->
    <div class="tab-pane fade" id="penjualan" role="tabpanel" aria-labelledby="contact-tab">penjualan</div>
    <div class="tab-pane fade" id="master-barang" role="tabpanel" aria-labelledby="profile-tab"></div> <!-- end master barang -->
    <div class="tab-pane fade" id="master-supplier" role="tabpanel" aria-labelledby="contact-tab"></div> <!-- end master supplier -->

    <!-- master customer start -->
    <div class="tab-pane fade show active" id="master-customer" role="tabpanel" aria-labelledby="profile-tab">

      <br><br>
      <div class="row">
        <div class="col-md-4">
          <?php
            $id_cust = $_GET['id'];
            $data_cust = tampil_data("SELECT * FROM pelanggan WHERE ID_PELANGGAN = '$id_cust'")[0];

           ?>

          <table class="table-group" id="form" cellpadding="4" border="0" style="width:30%;">
            <form class="" action="" method="post">
            <tr>
              <div class="form-group">
              <td><input class="form-control" type="hidden" name="id_cust" value="<?=$data_cust["ID_PELANGGAN"]; ?>" readonly></td>
              </div>
            </tr>
            <tr>
              <div class="form-group">
              <td>
                <label>Nama</label>
              </td>
              <td> : </td>
              <td><input class="form-control" type="text" name="nama" value="<?=$data_cust["NAMA"]; ?>" autocomplete="off"></td>
              </div>
            </tr>
            <tr>
              <div class="form-group">
              <td>
                <label>Alamat</label>
              </td>
              <td> : </td>
              <td><textarea name="alamat" rows="8" cols="40"><?=$data_cust["ALAMAT"]; ?></textarea>
              </div>
            </tr>
            <tr>
              <div class="form-group">
              <td>
                <label>HP</label>
              </td>
              <td> : </td>
              <td><input class="form-control" type="text" name="hp" value="<?=$data_cust["HP"]; ?>"></td>
              </div>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td><button class="btn btn-primary" type="submit" name="update">Update</button></td>
            </tr>
          </table>
          </form>
    </div> <!-- end col-md -->
    <?php
    if (isset($_POST["update"])) {
      if (editcust($_POST) > 0) {
        echo "<script language=\"javascript\">
        swal({
              title: \"Berhasil!\",
              text: \"Data pelanggan berhasil diubah!\",
              icon: \"success\",
              button: \"OK\",
            }).then((oke) => {
              document.location.href = 'master-customer.php';
              });;

        </script>";

      }

      else {
        echo "
            <script>
            alert('Data Gagal Diupdate!!');
            </script>
        ";
        echo mysqli_error($conn);
      }
    }
     ?>

         <div class="col-md-8">
           <table class="table table-bordered mt-4" border="1">
               <thead class="thead-dark text-center">
                 <th scope="col" width="5%">ID</th>
                 <th scope="col" width="30%">Nama</th>
                 <th scope="col">Alamat</th>
                 <th scope="col" width="10%">Hp</th>
               </thead>
               <tbody>
                 <?php $data_cust = tampil_data("SELECT *  FROM pelanggan");  ?>
                 <?php foreach ($data_cust as $cust) : ?>
                 <tr>
                 <td><?= $cust["ID_PELANGGAN"]; ?></td>
                 <td><?= $cust["NAMA"]; ?></td>
                 <td><?= $cust["ALAMAT"]; ?></td>
                 <td><?= $cust["HP"]; ?></td>
                 </tr>
               </tbody>
             <?php endforeach;?>
             </table>

        </div> <!-- end col-md -->
      </div> <!-- end row -->



    </div> <!-- end master customer -->
    <div class="tab-pane fade" id="garansi" role="tabpanel" aria-labelledby="contact-tab">Garansi</div>
    <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="contact-tab">news</div>
    <div class="tab-pane fade" id="promo" role="tabpanel" aria-labelledby="contact-tab">promo</div>

  </div> <!-- end tab-content -->

</div>
</div> <!-- end container -->

<br><br><br><br><br>

</body>
</html>
