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
      <a class="nav-link active" id="contact-tab" href="pembelian.php" role="tab" aria-controls="pembelian" aria-selected="false"><i class="fas fa-shopping-cart mr-2"></i>Pembelian</a>
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
      <a class="nav-link" id="profile-tab" href="news.php" role="tab" aria-controls="news" aria-selected="false"><i class="fas fa-newspaper mr-2"></i>News</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" href="promo.php" role="tab" aria-controls="promo" aria-selected="false"><i class="fas fa-percentage mr-2"></i>Promo</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">tampilan dasboard</div>

    <div class="tab-pane fade show active" id="pembelian" role="tabpanel" aria-labelledby="profile-tab">
      <br>
      <form class="" action="" method="post">
      <div class="card">
        <h5 class="card-header">Pembelian</h5>
      <div class="card-body">

        <?php
          if (isset($_POST["simpan"])) {
            //var_dump($_POST);
            if (tambahdata_beli($_POST) > 0) {
                echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                      <strong>Sukses!</strong> Data berhasil disimpan!!
                      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                      <span aria-hidden=\"true\">&times;</span>
                      </button></div>";

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

      <table class="table-group" id="form" cellpadding="6" align="center" width="80%" border="0">
        <tr>
          <?php $autonumber_db = autonumber_beli("ID_BELI");//memanggil function autonumber ?>
          <td width="15%"><label for="exampleInputEmail1">No. Faktur</label></td>
          <td width="1%">:</td>
          <td>
            <div class="form-group">
            <input class="form-control mt-3" type="text" name="id_beli" value="<?= $autonumber_db++; ?>" readonly>
            </div>
          </td>
        </tr>

        <tr>
          <td><label for="exampleInputEmail1">Nama Barang</label></td>
          <td>:</td>
          <td>
            <div class="input-group mb-1">
                <?php
                    if (isset($_POST["add"])) {//periksa jika add mengirimkan data
                        $id_add = $_POST["add"];//data diterima sesuai yang dikirimkan
                        $d_barang = tampil_data("SELECT NAMA_BARANG FROM master_barang WHERE ID_BARANG = '$id_add'");
                        foreach ($d_barang as $add_barang) {
                          $n_barang = $add_barang["NAMA_BARANG"];
                        }

                    }
                    else {
                       $n_barang = "Masukan Nama Barang";//jika tdk ada tampilkan string
                    }
               ?>
                <input type="hidden" name="id_login" value="1">
                <input type="hidden" name="id_barang" value="<?= $id_add; ?>">
                <input type="text" class="form-control" placeholder="" value="<?= $n_barang; ?>" autofocus required>
                <div class="input-group-prepend">
                  <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-search"></i></button>
                </div>
            </div>
          </td>
        </tr>

        <tr>
          <td><label for="exampleInputEmail1">Satuan</label></td>
          <td>:</td>
          <td>
            <div class="form-group">
            <input class="form-control mt-2" name="satuan" type="text" placeholder="" required>
            </div>
          </td>
        </tr>
        <tr>
          <td><label for="exampleInputEmail1">Jumlah</label></td>
          <td>:</td>
          <td>
            <div class="form-group">
            <input class="form-control mt-2" name="jumlah" type="text" placeholder="" required>
            </div>
          </td>
      </tr>
      <tr>
        <td><label for="exampleInputEmail1">Harga Beli</label></td>
        <td>:</td>
        <td>
          <div class="form-group">
          <input class="form-control mt-2" name="harga" type="text" placeholder="Rp." required>
          </div>
        </td>
    </tr>
      <tr>
        <td><label for="exampleInputEmail1">Supplier</label></td>
        <td>:</td>
        <td>
          <div class="form-group mt-2">
            <select class="form-control" name="supp" required>
              <option>--Supplier--</option>
              <?php $data_supplier = tampil_data("SELECT * FROM supplier"); ?>
              <?php foreach ($data_supplier as $supp) :?>
                  <option value="<?= $supp["ID_SUPP"]; ?>"><?=$supp["NAMA"]; ?></option>
              <?php endforeach; ?>

            </select>
          </div>
        </td>
      </tr>
      <tr>
        <td><label for="exampleInputEmail1">Tanggal Beli</label></td>
        <td>:</td>
        <td>
          <?php $tgl=date('Y-m-d'); ?>
          <div class="form-group">
          <input class="form-control mt-2" type="text" name="tgl" placeholder="" value="<?=$tgl ?>" readonly>
          </div>
        </td>
      </tr>
    </table>
    <button class="btn btn-submit btn-success mt-2" id="save" type="submit" name="simpan"><i class="fas fa-save mr-2"></i>Simpan</button><br><br>
    </div>
    </div>
    </form>


    <!-- modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document" data-backdrop="static">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Daftar Barang</h5>

            <form class="form-inline" style="margin-left:46%;" action="" method="post">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword" autofocus autocomplete='off'>
              <button class="btn btn-primary" type="submit" name="cari"><i class="fas fa-search"></i></button>
            </form>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="" action="" method="post">
            <table class="table table-bordered ">
              <thead class="thead-dark text-center">
                <tr>
                  <th scope="col" width="13%">Kode</th>
                  <th scope="col" width="">Nama Barang</th>
                  <th scope="col" width="10%">Aksi</th>
                </tr>
              </thead>

              <?php $data_barang = tampil_data("SELECT * FROM master_barang"); ?>
              <?php foreach ($data_barang as $barang) : ?>
              <tbody>
                <tr>
                  <td><?= $barang["ID_BARANG"]; ?></td>
                  <td><?= $barang["NAMA_BARANG"]; ?></td>
                  <td>
                      <button class="btn btn-primary" type="submit" name="add" value="<?= $barang["ID_BARANG"]; ?>"><i class="fas fa-plus"></i></button>
                  </td>
                </tr>
              </tbody>
            <?php endforeach; ?>
            </table>
            </div>

            </form>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
          </div>
          </div>
          <!-- end modal -->

    <br><br>

    <table class="table table-bordered ">
      <thead class="thead-dark text-center">
        <tr>
          <th scope="col" width="9%">No Faktur</th>
          <th scope="col" width="35%">Nama Barang</th>
          <th scope="col" width="5%">QTY</th>
          <th scope="col" width="6%">Satuan</th>
          <th scope="col" width="13%">Harga</th>
          <th scope="col" width="13%">Supplier</th>
          <th scope="col" width="9%">Tanggal</th>
          <th scope="col" width="5%">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $data_beli = tampil_data("SELECT *  FROM pembelian_barang INNER JOIN master_barang ON
                           pembelian_barang.ID_BARANG=master_barang.ID_BARANG INNER JOIN supplier ON supplier.ID_SUPP=pembelian_barang.ID_SUPP ORDER BY ID_BELI"); ?>
        <?php foreach ($data_beli as $beli) :?>
        <tr>
          <td align="center"><?=$beli["ID_BELI"]; ?></td>
          <td><?=$beli["NAMA_BARANG"]; ?></td>
          <td align="center"><?=$beli["JUMLAH"]; ?></td>
          <td align="center"><?=$beli["SATUAN"]; ?></td>
          <td>Rp. <?=number_format($beli["HARGA_BELI"]); ?></td>
          <td><?=$beli["NAMA"]; ?></td>
          <td><?=$beli["TGL_BELI"]; ?></td>
          <form class="" action="" method="get">
          <td><button class="btn btn-danger" type="submit" name="delete" value="<?=$beli["ID_BELI"]; ?>" onclick="return confirm('Apakah anda yakin ?');"><i class="fas fa-trash"></i></button></a></td>
          </form>
        </tr>
      <?php
      if (isset($_GET["delete"])) {//periksa jika add mengirimkan data
          $id_del = $_GET["delete"];//data diterima sesuai yang dikirimkan
          $del_barang = deletepembelian("DELETE FROM pembelian_barang WHERE ID_BELI= '$id_del'");

          if ($del_barang > 0) {
              echo "
                  <script>
                  alert('Data Berhasil Dihapus!!');
                  document.location.href = '../admin/pembelian.php';
                  </script>
              ";

          }

          else {
            echo "
                <script>
                alert('Data Gagal Dihapus!!');
                </script>
            ";
            echo mysqli_error($conn);
          }


        }
      ?>
      <?php endforeach; ?>
      </tbody>
    </table>

    </div>
    <!-- end pembelian -->
    <div class="tab-pane fade" id="penjualan" role="tabpanel" aria-labelledby="contact-tab">penjualan</div>
    <!-- tab master barang -->
    <div class="tab-pane fade" id="master-barang" role="tabpanel" aria-labelledby="profile-tab"></div> <!-- end master barang -->
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
