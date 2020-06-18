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
      <a class="nav-link" id="profile-tab" href="garansi.php" role="tab" aria-controls="garansi" aria-selected="false"><i class="fas fa-history mr-2"></i>Garansi</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" id="profile-tab" href="news.php" role="tab" aria-controls="news" aria-selected="false"><i class="fas fa-newspaper mr-2"></i>News</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" href="promo.php" role="tab" aria-controls="promo" aria-selected="false"><i class="fas fa-percentage mr-2"></i>Promo</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">tampilan dasboard</div>
    <div class="tab-pane fade" id="pembelian" role="tabpanel" aria-labelledby="profile-tab"></div><!-- end pembelian -->
    <div class="tab-pane fade" id="penjualan" role="tabpanel" aria-labelledby="contact-tab">penjualan</div>
    <!-- tab master barang -->
    <div class="tab-pane fade" id="master-barang" role="tabpanel" aria-labelledby="profile-tab"></div> <!-- end master barang -->
    <!-- master supplier start -->
    <div class="tab-pane fade" id="master-supplier" role="tabpanel" aria-labelledby="contact-tab"></div> <!-- end master supplier -->
    <div class="tab-pane fade" id="master-customer" role="tabpanel" aria-labelledby="profile-tab">master customer</div>
    <div class="tab-pane fade" id="garansi" role="tabpanel" aria-labelledby="contact-tab">Garansi</div>

    <div class="tab-pane fade show active" id="news" role="tabpanel" aria-labelledby="contact-tab">

      <div class="form-input">
          <form class="" action="" method="POST">
          <table>
            <tr>
              <td><button class="btn btn-success" type="submit" name="tambah"><i class="fas fa-plus mr-2"></i>Buat Posting</button></a></td>
            </tr>
        </table>
        </form>
        <br>


        <!-- php untuk input jumlah data -->
        <?php
            if(isset($_POST["tambah"])){
              //$jumlah di looping


        ?>
        <form class="" action="" method="post" enctype="multipart/form-data">
        <div class="table-news">
          <br>
        <table cellpadding="4" align="center" border="0" width="92%">

          <tr>
            <td width="12%">
              <label for="exampleInputEmail1">Judul : </label>
            </td>
            <td>
              <input class="form-control" type="text" name="judul" value="">
            </td>
          </tr>
          <tr>
            <td>
              <label for="exampleInputEmail1">Pilih gambar : </label>
            </td>
            <td>
              <?php $tgl=date('Y-m-d H:i:s'); ?>
              <input type="hidden" name="tanggal-waktu" value="<?=$tgl; ?>">
              <input class="" type="file" name="gambar" value="">
            </td>
          </tr>
          <tr>
            <td>
              <label for="exampleInputEmail1" style="margin-bottom:228px;">Isi : </label>
            </td>
            <td>
              <textarea id="texteditor" name="isi" rows="10" cols="132"></textarea>
            </td>
          </tr>
      </table>
      <br>
      <button class="btn btn-submit btn-success" id="save" type="submit" name="save"><i class="fas fa-save mr-2"></i>Save</button><br><br>
      </div>
      </form>
        <!--php penutup if  -->
        <?php
            }
         ?>

         <!-- php untuk tombol save -->
         <?php

             if(isset($_POST["save"])){
                //var_dump($_POST);
                //var_dump($_FILES);
                if (tambahposting($_POST) > 0) {

                    echo "<script language=\"javascript\">
                    swal({
                          title: \"Berhasil!\",
                          text: \"Sukses membuat posting!\",
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
        <table class="table table-bordered ">
          <thead class="thead-dark text-center">
            <tr>
              <th scope="col" width="1%">No.</th>
              <th scope="col" width="">Judul</th>
              <th scope="col" width="16%">Gambar</th>
              <th scope="col" width="10%">Waktu</th>
              <th scope="col" width="14%">Atur</th>
            </tr>
          </thead>
          <?php
            $no=1;
            $data_news = tampil_data("SELECT * FROM news");
            ?>
            <?php $no=1; foreach ($data_news as $news) : ?>
            <tbody>
              <tr>
                <td align="center"><?= $no ?></td>
                <td><?= $news["JUDUL"]; ?></td>
                <td align="center"><img src="../img/news/<?=$news["GAMBAR"]; ?>" alt="" style="height:50px; width:100px;"></td>
                <td align="center"><?= $news["WAKTU"]; ?></td>
                <td>
                    <a href="edit-post.php?id=<?=$news["ID_NEWS"]; ?>" ><button class="btn btn-warning" type="button" name="edit"><i class="fas fa-edit"></i></button></a>
                    <a href="../read/news.php?view=<?=$news["ID_NEWS"]; ?>" target="_blank"><button class="btn btn-primary" type="button" name="view"><i class="fas fa-eye"></i></button></a>
                    <a href="del-post.php?id=<?=$news["ID_NEWS"]; ?>" onclick="return confirm('Apakah anda yakin ?');"><button class="btn btn-danger" type="button" name="delete"><i class="fas fa-trash"></i></button></a>
                </td>
              </tr>
            </tbody>
          <?php $no++; endforeach; ?>
        </table>

    </div>

    </div> <!-- end news -->
    <div class="tab-pane fade" id="promo" role="tabpanel" aria-labelledby="contact-tab">promo</div>

  </div> <!-- end tab-content -->

</div>
</div> <!-- end container -->

<br><br><br><br><br>

<script>
  CKEDITOR.replace( 'texteditor' );
</script>
</body>
</html>
