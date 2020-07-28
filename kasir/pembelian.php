<?php include'header.php';

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
        <a href="history-pembelian.php"><p class="history">History pembelian &raquo</p></a>
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
                    if (isset($_GET["add"])) {//periksa jika add mengirimkan data
                        $id_add = $_GET["add"];//data diterima sesuai yang dikirimkan
                        $d_barang = tampil_data("SELECT NAMA_BARANG FROM master_barang WHERE ID_BARANG = '$id_add'");
                        foreach ($d_barang as $add_barang) {
                          $n_barang = $add_barang["NAMA_BARANG"];
                        }

                    }
                    else {
                       $n_barang = "Cari Nama Barang";//jika tdk ada tampilkan string
                    }
               ?>
                <input type="hidden" name="id_login" value="<?=$row["ID_LOGIN"]; ?>">
                <input type="hidden" name="id_barang" value="<?= $id_add; ?>">
                <input type="text" class="form-control" placeholder="" value="<?= $n_barang; ?>" autofocus required readonly>
                <div class="input-group-prepend">
                  <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal" onclick="refresh()"><i class="fas fa-search"></i></button>
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


    <!-- The Modal Barang-->
    <div class="modal fade" id="myModal">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h5 class="modal-title">Daftar Barang</h5>
              <input class="form-control mr-sm-2" style="width:30%; margin-left:46%;" type="search" placeholder="Search" aria-label="Search" name="keyword" id="keyword" autofocus autocomplete='off'>
              <button class="btn btn-primary" type="submit" value="1" name="cari"><i class="fas fa-search"></i></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">

            <table class="table table-bordered ">
              <thead class="thead-dark text-center">
                <tr>
                  <th scope="col" width="13%">Kode</th>
                  <th scope="col" width="">Nama Barang</th>
                  <th scope="col" width="10%">Aksi</th>
                </tr>
              </thead>

              <tbody id="isi-barang">
                <tr>

                </tr>
              </tbody>
            </table>


          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

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

<script type="text/javascript">
$(document).ready(function(){
    $('#keyword').on('keyup', function(){
      $('#isi-barang').load('detail-barangPemb.php?keyword=' + $('#keyword').val())
    })


});
</script>

<script>
function refresh(){
  $.get('detail-barangPemb.php', function(data_brg){
    $('#isi-barang').html(data_brg);
  })
}

</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#tabel-data').DataTable();
});
</script>

</body>
</html>
