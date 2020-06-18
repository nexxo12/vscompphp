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
    <form class="penjualan" action="" method="post">
    <table class="table-group" id="form" cellpadding="3" align="center" width="80%" border="0">
      <tr>
        <?php $autonumber_db = autonumber_inv("id_inv"); ?>

        <td width=""><label for="exampleInputEmail1">No. Faktur</label></td>
        <td width="1%">:</td>
        <td>

          <div class="form-group">
                <input class="form-control mt-3" type="text" name="id_pj" value="<?= $autonumber_db;  ?>" readonly>
                <input type="text" style="position:absolute; top:22%; height:1%;" name="id_pjforinv" value="">
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

        <td width="">
          <div class="input-group mt-1">
          <input class="form-control" width="1px" type="text" name="id_barang" id="id_barang" value="Kode Barang" readonly>
          <div class="input-group-prepend">
            <button class="btn btn-primary launch-modal" type="button" data-toggle="modal" data-target="#myModal" onclick="refresh()"><i class="fas fa-search"></i></button>
          </div>
          </div>
        </td>
        <td width=""></td>
        <td><label for="exampleInputEmail1">Kasir</label></td>
        <td>:</td>
        <td>
          <div class="form-group">
          <input class="form-control mt-2" type="hidden" name="kasir" placeholder="" value="<?=$row["ID_LOGIN"]; ?>" readonly>
          <input class="form-control mt-2" type="text" name="nama_kasir" value="<?=$row["NAMA"]; ?>" readonly>
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
        <div class="form-group">
          <label for="exampleInputEmail1"><b>Nama barang :</b></label>
          <input class="form-control" name="nama_barang" type="text" placeholder="" value="" readonly>
        </div>
      </td>

      <td><div class="form-group">
      <label for="exampleInputEmail1"><b>Harga Awal :</b></label>
      <input type="hidden" name="harga_awal" value="">
      <input class="form-control" type="text" name="harga_awal2" placeholder="" value="" readonly>
      </div>
      </td>
      <td width="10%"><div class="form-group">
      <label for="exampleInputEmail1"><b>Jumlah:</b></label>
      <input class="form-control" type="text" name="jumlah" placeholder="" autocomplete="off" required>
      </div>
      </td>
      <td>

      <div class="form-group">
      <label for="exampleInputEmail1"><b>Harga Jual :</b></label>
      <input class="form-control" type="text" name="harga_jual"  placeholder="" value="">
      </div>
      </td>

    </tr>
  </table>
  <button class="btn btn-submit btn-success mt-2" id="save" type="submit" name="tambah"><i class="fas fa-plus mr-2"></i>Tambah</button><br><br><br>
  </form>


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
    <tbody id="content_cart">

    </tbody>

    <!-- fungsi penjumlahan total harga -->
    <?php $sum_total = tampil_data("SELECT SUM(TOTAL_HARGA) AS jumlah FROM list_penjualan");?>
    <?php foreach ($sum_total as $jumlaht) {
          $total_harga = number_format($jumlaht["jumlah"]);
          $total_harga2 = $jumlaht["jumlah"];
    } ?>

    <tfoot>
    <tr>
      <td colspan="3"><h5 style="margin-left:80%; margin-top:1%;">GRAND TOTAL : </h5><hr></td>
      <td align="center"><h5 style="margin-top:15%;" id="jumlah_total"></h5><hr></td>
      <td><h5 class="mt-2" id="total_harga"></h5><hr></td>
    </tr>
    </tfoot>
  </table>


<!-- Checkout ajax jquery -->
<form class="checkout" action="checkout.php" method="post">
  <?php $autonumber_db = autonumber_inv("id_inv"); ?>
  <input type="hidden" name="id_pj" value="<?= $autonumber_db; ?>">
  <input type="hidden" name="tgl" value="<?=$tgl; ?>">
  <input type="hidden" name="total" id="totalInputINV">
  <input type="hidden" name="nama_barang" id="namabarangINV">
  <button class="btn btn-submit btn-success mt-2"  type="submit" name="simpan"><i class="fas fa-shopping-cart mr-2"></i>Checkout</button><br><br>
  </div>
  </div>
  </form>
<!-- end checkout -->

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
                <th scope="col" width="5%">Stok</th>
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

<!-- script checkout brg -->
<script type="text/javascript">
  $(document).ready(function(){
    $('.checkout').on('submit',function(e){//disable loading saat tekan tombol pada form class checkout
      e.preventDefault();
      $.ajax({ //menjalankan ajax
          type:$(this).attr('method'), //menentukan post / get, (this) = form
          url:$(this).attr('action'), //url tujuan pengiriman data
          data:$(this).serialize(), //data yang akan dikirimkan
          success:function(){ //jika sukses
            swal("Berhasil!", "Data berhasil disimpan!", "success").then((oke) => {
              $('#ModalPrint').modal('show')
              });
          }

      })
    })
  })

</script>

<!-- script add cart -->
<script type="text/javascript">
$(document).ready(function(){
  loadData();
  JumlahTotal();
  TotalHarga();
  TotalInputHarga();
  ShowNamaBarangINV();
  idPJ();
  $('button[name=tambah]').click(function(e){//disable loading saat tekan tombol
    e.preventDefault();
    var data = $('.penjualan').serialize();
    $.ajax({ //menjalankan ajax dg jquery
        type: 'POST', //menentukan post / get, (this) = form
        url: 'simpan-cart.php', //url untuk action pada form
        data: data, //data untuk mengambil dan input dari form inputan
        success:function(){ //jika sukses
          loadData();
          JumlahTotal();
          TotalHarga();
          TotalInputHarga();
          ShowNamaBarangINV();
          resetinput();
          idPJ();
        }

    })
  })
})

function loadData(){
  $.get('data-cart.php', function(data_cart){
    $('#content_cart').html(data_cart);
    $('.hapus').click(function(e){
      e.preventDefault();
      $.ajax({ //menjalankan ajax dg jquery
          type:'GET', //menentukan post / get, (this) = form
          url:$(this).attr('href'), //url untuk action pada link
          success:function(){ //jika sukses
           loadData();
           JumlahTotal();
           TotalHarga();
           TotalInputHarga();
           ShowNamaBarangINV();
           idPJ();


          }

      })
    })
  })
}

function refresh(){
  $.get('detail-barang.php', function(data_brg){
    $('#isi-barang').html(data_brg);
  })
}

function JumlahTotal(){
  $.get('ajax_jumlah.php', function(data_jumlah){
      $('#jumlah_total').html(data_jumlah);
  })

}

function TotalHarga(){
  $.get('ajax_grandTotal.php', function(data_total){
      $('#total_harga').html(data_total);
  })

}

function idPJ(){
  $.get('ajax_idbrg.php', function(data_id){
      $('[name=id_pjforinv]').val(data_id);
  })

}

function TotalInputHarga(){
  $.get('ajax_grandTotalINV.php', function(data_total){
      $('#totalInputINV').val(data_total);
  })

}

function ShowNamaBarangINV(){
  $.get('ajax_namabarangINV.php', function(data_total){
      $('#namabarangINV').val(data_total);
  })

}

function resetinput(){
  $('[name=nama_barang]').val('');
  $('[name=harga_awal2]').val('');
  $('[name=harga_awal]').val('');
  $('[name=jumlah]').val('');
  $('[name=harga_jual2]').val('');
  $('[name=harga_jual]').val('');
  $('[name=id_barang]').val('');
}
</script>

<!-- script pencarian brg modal -->
<script type="text/javascript">
$(document).ready(function(){
    $('#keyword').on('keyup', function(){
      $('#isi-barang').load('detail-barang.php?keyword=' + $('#keyword').val())
    })
});
</script>

<!-- redirect untuk tombol close print -->
<script type="text/javascript">
function redirect(){
  document.location.href = 'penjualan.php';
}

</script>

</body>
</html>
