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
      <br>
      <?php
        $id = $_GET["id"];//data id diterima dari master-barang.php
        $data_news = tampil_data("SELECT * FROM news WHERE ID_NEWS = '$id'")[0];
       ?>
      <div class="form-input">
        <form class="" action="" method="post" enctype="multipart/form-data">
        <div class="table-news">
          <br>
        <table cellpadding="4" align="center" border="0" width="92%">

          <tr>
            <td width="12%">
              <label for="exampleInputEmail1">Judul : </label>
            </td>
            <td>
              <input type="hidden" name="id_news" value="<?=$data_news["ID_NEWS"]; ?>">
              <input class="form-control" type="text" name="judul" value="<?=$data_news["JUDUL"]; ?>">
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
              <input type="hidden" name="old_gambar" value="<?=$data_news["GAMBAR"]; ?>">
            </td>
          </tr>
          <tr>
            <td></td>
            <td><img src="../img/news/<?=$data_news["GAMBAR"]; ?>" alt="" style="height:100px; width:200px;"></td>
          </tr>
          <tr>
            <td>
              <label for="exampleInputEmail1" style="margin-bottom:228px;">Isi : </label>
            </td>
            <td>
              <textarea id="texteditor" name="isi" rows="10" cols="132"><?=$data_news["ISI"]; ?></textarea>
            </td>
          </tr>
      </table>
      <br>
      <button class="btn btn-submit btn-success" id="save" type="submit" name="save"><i class="fas fa-save mr-2"></i>Save</button><br><br>
      </div>
      </form>

         <!-- php untuk tombol save -->
         <?php

             if(isset($_POST["save"])){
                //var_dump($_POST);
                //var_dump($_FILES);
                if (editpost($_POST) > 0) {

                    echo "<script language=\"javascript\">
                    swal({
                          title: \"Berhasil!\",
                          text: \"Sukses mengubah data!\",
                          icon: \"success\",
                          button: \"OK\",
                        }).then((oke) => {
                          document.location.href = 'news.php';
                          });;;

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
