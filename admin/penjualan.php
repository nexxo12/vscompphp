<?php include'header.php';
      include'../function/function.php';
      session_start();
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
      <a class="nav-link active" id="contact-tab"  href="penjualan.php" role="tab" aria-controls="penjualan" aria-selected="false"><i class="fas fa-money-bill mr-2"></i>Penjualan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="barang-tab"  href="master-barang.php" role="tab" aria-controls="master barang" aria-selected="false"><i class="fas fa-box mr-2"></i>Master Barang</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab"  href="master-supplier.php" role="tab" aria-controls="master supplier" aria-selected="false"><i class="fas fa-truck mr-2"></i>Master Supplier</a>
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

    <!-- penjualan start -->
    <div class="tab-pane fade show active" id="penjualan" role="tabpanel" aria-labelledby="contact-tab">
    <br>
    <div class="card">
      <h5 class="card-header">Penjualan</h5>
    <div class="card-body">
      <a href="history-penjualan.php"><p style="position:absolute; left:85%; top:1.5%;">History penjualan &raquo</p></a>
    <form class="" action="" method="post">
    <table class="table-group" id="form" cellpadding="3" align="center" width="80%" border="0">
      <tr>
        <?php $autonumber_db = autonumber_inv("id_inv"); ?>
        <?php $autonumber_pj = autonumber_pj("ID_PENJUALAN"); ?>
        <td width=""><label for="exampleInputEmail1">No. Faktur</label></td>
        <td width="1%">:</td>
        <td>

          <div class="form-group">
                <input class="form-control mt-3" type="text" name="id_pj" value="<?= $autonumber_db++;  ?>" readonly>
                <input type="hidden" name="id_pjforinv" value="<?=$autonumber_pj ?>">
          </div>
        </td>
        <td width="30%"></td>
        <td><label for="exampleInputEmail1">Tanggal Beli</label></td>
        <td>:</td>
        <td>
          <?php $tgl=date('Y-m-d'); ?>
          <div class="form-group">
          <input class="form-control mt-2" type="text" name="tgl" placeholder="" value="<?=$tgl ?>" readonly>
          </div>
        </td>
      </tr>
      <tr>
        <td width=""><label for="exampleInputEmail1">Barang</label></td>
        <td width="1%">:</td>

        <?php
            if (isset($_POST["add"])) {//periksa jika add mengirimkan data
                $id_add = $_POST["add"];//data diterima sesuai yang dikirimkan
                $d_barang = tampil_data("SELECT NAMA_BARANG FROM master_barang WHERE ID_BARANG = '$id_add'");

            }
            else {
               $id_add = "Kode Barang";//jika tdk ada tampilkan string
            }
       ?>

        <td width="">
          <div class="input-group mt-1">
          <input class="form-control" width="1px" type="text" name="id_barang" value="<?= $id_add; ?>" readonly>
          <div class="input-group-prepend">
            <button class="btn btn-primary launch-modal" type="button" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-search"></i></button>
          </div>
          </div>
        </td>
        <td width=""></td>
        <td><label for="exampleInputEmail1">Kasir</label></td>
        <td>:</td>
        <td>
          <div class="form-group">
          <input class="form-control mt-2" type="text" name="kasir" placeholder="" value="1" readonly>
          </div>
        </td>
      </tr>
      <tr>
        <td width=""><label for="exampleInputEmail1">Customer</label></td>
        <td width="1%">:</td>
        <td>
          <div class="form-group mt-3">
            <select class="form-control" name="customer" required>
              <?php $data_cust = tampil_data("SELECT * FROM pelanggan"); ?>
              <?php foreach ($data_cust as $cust) :?>
              <option value="<?= $cust["ID_PELANGGAN"]; ?>"><?=$cust["NAMA"]; ?></option>
              <?php endforeach; ?>

            </select>
          </div>
        </td>
      </tr>
  </table>
  <br>
  <table align="center" border="0" width="70%">
    <tr>
      <td width="40%">
        <?php
        if (isset($_POST["add"])) {//periksa jika add mengirimkan data
            $id_add = $_POST["add"];//data diterima sesuai yang dikirimkan
            $d_barang = tampil_data("SELECT NAMA_BARANG FROM master_barang WHERE ID_BARANG = '$id_add'");
              foreach ($d_barang as $add_barang) {
                $n_barang = $add_barang["NAMA_BARANG"];
              }

        }
        else {
           $n_barang = " ";//jika tdk ada tampilkan string
        }


        ?>
        <div class="form-group">
          <label for="exampleInputEmail1"><b>Nama barang :</b></label>
          <input class="form-control" name="nama_barang" type="text" placeholder="" value="<?=$n_barang ?>">
        </div>
      </td>

      <?php
      if (isset($_POST["add"])) {//periksa jika add mengirimkan data
            $id_add = $_POST["add"];
            $harga_aw = tampil_data("SELECT HARGA_BELI FROM pembelian_barang WHERE ID_BARANG='$id_add'");
            foreach ($harga_aw as $awal) {
              $awal_harga = $awal["HARGA_BELI"];
              $awal_harga2 = number_format($awal["HARGA_BELI"]);
            }
        }
        else {
              $awal_harga = " ";
              $awal_harga2 = " ";
        }
       ?>
      <td><div class="form-group">
      <label for="exampleInputEmail1"><b>Harga Awal :</b></label>
      <input type="hidden" name="harga_awal" value="<?=$awal_harga;  ?>">
      <input class="form-control" type="text" name="" placeholder="" value="Rp. <?=$awal_harga2;  ?>" readonly>
      </div>
      </td>
      <td width="10%"><div class="form-group">
      <label for="exampleInputEmail1"><b>Jumlah:</b></label>
      <input class="form-control" type="text" name="jumlah" placeholder="" autocomplete="off">
      </div>
      </td>
      <td>

        <?php

        if (isset($_POST["add"])) {//periksa jika add mengirimkan data
              $id_add = $_POST["add"];
              $harga_jl = tampil_data("SELECT HARGA_JUAL FROM master_barang WHERE ID_BARANG='$id_add'");
              foreach ($harga_jl as $jual) {
                $jl_harga = $jual["HARGA_JUAL"];
                $jl_harga2 = number_format($jual["HARGA_JUAL"]);
              }
          }
          else {
                $jl_harga = " ";
                $jl_harga2= " ";
          }


         ?>

      <div class="form-group">
      <label for="exampleInputEmail1"><b>Harga Jual</b></label>
      <input type="hidden" name="harga_jual" value="<?=$jl_harga; ?>">
      <input class="form-control" type="text"  placeholder="" value="Rp. <?=$jl_harga2; ?>">
      </div>
      </td>

    </tr>
  </table>
  <button class="btn btn-submit btn-success mt-2" id="save" type="submit" name="tambah"><i class="fas fa-plus mr-2"></i>Tambah</button><br><br><br>

  <?php
  if (isset($_POST["tambah"])) {
      global $conn;
      //var_dump($_POST);
      //operasi matematika
      $jumlah = $_POST["jumlah"];
      $harga = $_POST["harga_jual"];
      $harga_total = $jumlah * $harga;//end

      //mengambil data dari inputan
      $id_list = $_POST["id_pjforinv"];
      $inv = $_POST["id_pj"];
      $cust = $_POST["customer"];
      $id_barang = $_POST["id_barang"];
      $idlogin = $_POST["kasir"];
      $tgl = $_POST["tgl"];
      $h_awal = $_POST["harga_awal"];
      $jumlah = $_POST["jumlah"];
      $h_jual = $_POST["harga_jual"];
      $query = "INSERT INTO list_penjualan VALUES ('$id_list','$inv','$id_barang','$cust','$idlogin','$tgl','$jumlah','$h_awal','$h_jual','$harga_total') ";
      $hasil = mysqli_query ($conn,$query);
      if ($hasil > 0) {
        echo "";
      }
      else {
        echo mysqli_error($conn);
      }



  }
  ?>


  <table class="table" align="center" border="0">
    <thead>
      <tr>
        <th scope="col" width="5%">No.</th>
        <th scope="col">Nama Barang</th>
        <th scope="col" width="18%">Harga (Rp.)</th>
        <th scope="col" width="7%" class="text-center">Jumlah</th>
        <th scope="col" width="20%">Subtotal (Rp.)</th>
        <th scope="col" width="5%"></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no=1;
      $tampil_pj = tampil_data("SELECT * FROM list_penjualan INNER JOIN master_barang ON list_penjualan.ID_BARANG=master_barang.ID_BARANG");?>
      <?php foreach ($tampil_pj as $list_pj) :
        $barang = $list_pj["NAMA_BARANG"];
      ?>
      <tr>
        <td><?=$no; ?></td>
        <td><?=$list_pj["NAMA_BARANG"]; ?></td>
        <td><?=number_format($list_pj["HARGA_JUAL"]); ?></td>
        <td align="center"><?=$list_pj["JUMLAH_BELI"]; ?></td>
        <td><?=number_format($list_pj["TOTAL_HARGA"]); ?></td>
        <td><button class="btn btn-danger" type="submit" name="delete" value="<?=$list_pj["ID_PENJUALAN"]; ?>"><i class="fas fa-trash"></i></button></td>
      </tr>
    <?php
      $no++;
      endforeach; ?>

      <?php
      if (isset($_POST["delete"])) {//periksa jika add mengirimkan data
          $id_del = $_POST["delete"];//data diterima sesuai yang dikirimkan
          $del_barang = deletepembelian("DELETE FROM list_penjualan WHERE ID_PENJUALAN= '$id_del'");
          $del_barang2 = deletepembelian("DELETE FROM penjualan WHERE ID_PENJUALAN= '$id_del'");

          if ($del_barang > 0) {
              echo "
                  <script>
                  document.location.href = '../admin/penjualan.php';
                  </script>
              ";

          }

          elseif ($del_barang2 > 0) {
            echo "
                <script>
                document.location.href = '../admin/penjualan.php';
                </script>
            ";
          }

          else {
            echo mysqli_error($conn);
          }


        }

      ?>
      <!-- fungsi penjumlahan total harga -->
      <?php $sum_total = tampil_data("SELECT SUM(TOTAL_HARGA) AS jumlah FROM list_penjualan");?>
      <?php foreach ($sum_total as $jumlah) {
            $total_harga = number_format($jumlah["jumlah"]);
            $total_harga2 = $jumlah["jumlah"];
      } ?>

      <!-- fungsi penjumlahan jumlah -->
      <?php $sum_total = tampil_data("SELECT SUM(JUMLAH_BELI) AS jumlah_beli FROM list_penjualan");?>
      <?php foreach ($sum_total as $jumlah) {
            $jumlah_beli = number_format($jumlah["jumlah_beli"]);
      } ?>


      <tr>
        <td colspan="3"><h5 style="margin-left:80%; margin-top:1%;">GRAND TOTAL : </h5><hr></td>
        <td align="center"><h5 style="margin-top:15%;"><?=$jumlah_beli; ?></h5><hr></td>
        <td><h5 class="mt-2"><?=$total_harga; ?></h5><hr></td>
      </tr>
    </tbody>
  </table>
</form>

<!-- Checkout ajax jquery -->
<form class="checkout" action="checkout.php" method="post">
  <?php $autonumber_db = autonumber_inv("id_inv"); ?>
  <input type="hidden" name="id_pj" value="<?= $autonumber_db; ?>">
  <input type="hidden" name="tgl" value="<?=$tgl; ?>">
  <input type="hidden" name="total" value="<?=$total_harga2; ?>">
  <input type="hidden" name="nama_barang" value="<?= $barang; ?>">
  <button class="btn btn-submit btn-success mt-2"  type="submit" name="simpan"><i class="fas fa-shopping-cart mr-2"></i>Checkout</button><br><br>
  <?php
  if (isset($_POST["simpan"])) {
      global $conn;


  }


   ?>
  </div>
  </div>
  </form>
<!-- end checkout -->

  <!-- modal barang -->
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

        <!-- Modal Print -->
        <div class="modal fade" id="ModalPrint">
          <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Cetak</h4>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <img style="width:71%; height:71%; margin-left:15%; margin-bottom:8%;" src="../img/print2.gif" alt="print"><br>
                <h5 align="center">Cetak Nota ?</h5>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer" >
                <div class="button-print" style="margin-right:25%;">
                  <?php $autonumber_db = autonumber_inv("id_inv"); ?>
                  <a href="print.php?inv=<?=$autonumber_db; ?>" target="_blank"><button type="submit" class="btn btn-primary">Print</button></a>
                  <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="redirect();">Close</button>
                </div>
              </div>

            </div>
          </div>
        </div> <!-- end modal print -->

    </div> <!-- end penjualan -->
    <!-- tab master barang -->
    <div class="tab-pane fade" id="master-barang" role="tabpanel" aria-labelledby="profile-tab"></div> <!-- end master barang -->
    <!-- master supplier start -->
    <div class="tab-pane fade" id="master-supplier" role="tabpanel" aria-labelledby="contact-tab"></div> <!-- end master supplier -->
    <div class="tab-pane fade" id="master-customer" role="tabpanel" aria-labelledby="profile-tab">master customer</div>
    <div class="tab-pane fade" id="garansi" role="tabpanel" aria-labelledby="contact-tab">Garansi</div>
    <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="contact-tab">news</div>
    <div class="tab-pane fade" id="promo" role="tabpanel" aria-labelledby="contact-tab">promo</div>

  </div> <!-- end tab-content -->

</div> <!-- end nav menu -->
</div> <!-- end container -->

<br><br><br><br><br>
<script type="text/javascript">
$(document).ready(function(){
	$('.launch-modal').click(function(){
		$('#exampleModalCenter').modal({
			backdrop: 'static'
		});
	});
});
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.checkout').on('submit',function(e){//disable loading saat tekan tombol pada form class checkout
      e.preventDefault();
      $.ajax({ //menjalankan ajax
          type:$(this).attr('method'), //menentukan post / get, (this) = form
          url:$(this).attr('action'), //url untuk action pada form
          data:$(this).serialize(), //data untuk mengambil dan input dari form inputan
          success:function(){ //jika sukses
            swal("Berhasil!", "Data berhasil disimpan!", "success").then((oke) => {
              $('#ModalPrint').modal('show')
              });
          }

      })
    })
  })

</script>

<script type="text/javascript">
function redirect(){
  document.location.href = 'penjualan.php';
}


</script>

</body>
</html>
