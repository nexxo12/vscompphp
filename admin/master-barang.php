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

      <div class="form-input">
          <form class="" action="" method="POST">
          <table>
            <tr>
              <td><input class="form-control" type="text" placeholder="Jumlah Data" name="jumlah" required></td>
              <td><button class="btn btn-success" type="submit" name="tambah"><i class="fas fa-plus mr-2"></i>Tambah</button></a></td>

            </tr>
        </table>
      </form>
      <div style="position: absolute; left:36%; top:17.8%;">
        <a href="paket-pc.php"><button class="btn btn-success" type="submit" name="paket_pc"><i class="fas fa-cog mr-2"></i>Paket PC</button></a>
      </div>

        <br>

        <!-- php untuk input jumlah data -->
        <?php
            $autonumber_db = autonumber_db("ID_BARANG");//memanggil function autonumber
            if(isset($_POST["tambah"])){
              //value data di tampung divariabel jumlah
              $jumlah = $_POST["jumlah"];
              //$jumlah di looping
              for ($i=1; $i <= $jumlah ; $i++) {

        ?>
        <form class="" action="" method="post">
        <table class="table-group" id="form" cellpadding="4" align="center">
          <tr>
            <td width="10%">
              <div class="form-group">
              <label for="exampleInputEmail1">ID Barang</label>
              <input class="form-control" type="text" name="id_barang[]" value="<?= $autonumber_db++; ?>" readonly>
              </div>
            </td>
            <td width="48%">
              <div class="form-group">
              <label for="exampleInputEmail1">Nama barang</label>
              <input class="form-control" type="text" name="nama_barang[]" placeholder="Nama barang">
              </div>

            </td>
            <td>
              <div class="form-group">
                <label for="exampleInputEmail1">Kategori</label>
                <select class="form-control" name="kategori[]">
                  <?php $data_kategori = tampil_data("SELECT * FROM kategori"); ?>
                  <?php foreach ($data_kategori as $kategori) :?>
                  <option value="<?= $kategori["ID_KATEGORI"]; ?>"><?=$kategori["KATEGORI"]; ?></option>
                  <?php endforeach; ?>

                </select>
              </div>

            </td>
            <td width="10%">
              <div class="form-group">
              <label for="exampleInputEmail1">Satuan</label>
              <input class="form-control" type="text" name="satuan[]" placeholder="Satuan">
              </div>
            </td>
            <td>
              <div class="form-group">
              <label for="exampleInputEmail1">Harga</label>
              <input class="form-control input-harga" name="harga[]" type="text" placeholder="Rp.">
              </div>
            </td>
          </tr>
      </table>

        <!-- php penutup for -->
        <?php
            }

        ?>
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

                if (tambahdata($_POST) == 0) {
                    echo "<script language=\"javascript\">
                    swal({
                          title: \"Berhasil!\",
                          text: \"Data barang berhasil ditambah!\",
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
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword" id="keyword" autofocus>
      <button class="btn btn-primary" type="submit" name="cari"><i class="fas fa-search"></i></button>
    </form><br><br>

    <table class="table table-bordered ">
      <thead class="thead-dark text-center">
        <tr>
          <th scope="col" width="5%">No.</th>
          <th scope="col" width="6%">ID</th>
          <th scope="col" width="">Nama Barang</th>
          <th scope="col" width="">Kategori</th>
          <th scope="col" width="4%">Jumlah</th>
          <th scope="col" width="5%">Satuan</th>
          <th scope="col" width="14%">Harga Jual</th>
          <th scope="col" width="10%">Aksi</th>
        </tr>
      </thead>
      <?php
        //conf pagenation
        $jumlahtampil = 7;//set tampil data perhalaman
        $jumlahdata = count(tampil_data("SELECT * FROM master_barang"));//menghitung jumlah data di masterbarang
        $jumlahhalaman = ceil($jumlahdata / $jumlahtampil); // menampilkan jumlah halaman (page), ceil = membulatkan angka keatas (1,2 = 2, dst)
        //menentukan halaman aktif
        if (isset($_GET["page"])) {//jika ada kiriman page
          $halamanaktif = $_GET["page"];//set halaman sesuai page = n
          $nomor = ($halamanaktif-1) * $jumlahtampil;
        }else {
          $halamanaktif = 1;//set halaman = 1
          $nomor = 0;
        }
        $no = $nomor+1;
        $awaldata = ($jumlahtampil * $halamanaktif) - $jumlahtampil; // set awal mulai index setiap page
        $data_barang = tampil_data("SELECT * FROM master_barang INNER JOIN kategori ON master_barang.ID_KATEGORI=kategori.ID_KATEGORI LIMIT $awaldata, $jumlahtampil");//menampilkan data limit index awal - akhir
        //end conf pagenation

        //start untuk pencarian
        if (isset($_POST["cari"])) {//name 'cari' dari form pencarian
          $data_barang = caribarang($_POST["keyword"]);//$data_barang ditumpuk dengan value keyword, dikirim ke function.php
        }
        //end pencarian

        foreach ($data_barang as $barang) :?>

        <tbody id="isi-barang">
          <tr>
            <td align="center"><?= $no ?></td>
            <td><?= $barang["ID_BARANG"]; ?></td>
            <td><?= $barang["NAMA_BARANG"]; ?></td>
            <td align="center"><?= $barang["KATEGORI"]; ?></td>
            <td align="center"><?= $barang["STOK"]; ?></td>
            <td align="center"><?= $barang["SATUAN"]; ?></td>
            <td align="center">Rp. <?= number_format($barang["HARGA_JUAL"]); ?></td>
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
    <!-- pagenation -->
    <nav aria-label="Page navigation example">
        <ul class="pagination" style="float:right;">
          <li class="page-item">
            <?php if ($halamanaktif > 1) : ?>
              <a class="page-link" href="?page=<?=$halamanaktif - 1; ?>" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            <?php endif;  ?>
            </a>
          </li>
          <!-- logic navigation -->
          <?php for ($i=1; $i <= $jumlahhalaman ; $i++) {
            if ($i == $halamanaktif) { ?>
              <li class="page-item active"><a class="page-link" href="?page=<?=$i ?>"><?=$i ?></a></li>
            <?php
            }
            else {?>
              <li class="page-item"><a class="page-link" href="?page=<?=$i ?>"><?=$i ?></a></li>
            <?php
            }
            $no++;
          }
            ?>

          <li class="page-item">
            <?php if ($halamanaktif < $jumlahhalaman) : ?>
              <a class="page-link" href="?page=<?=$halamanaktif + 1; ?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            <?php endif;  ?>

            </a>
          </li>
        </ul>
    </nav>
    <!-- end pagenation -->
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

</script>
</body>
</html>
