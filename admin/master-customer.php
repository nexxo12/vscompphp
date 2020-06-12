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

          <table class="table-group" id="form" cellpadding="4" border="0" style="width:30%;">
            <form class="" action="simpan-cust.php" method="post">
            <tr>
              <div class="form-group">
              <?php $number_cust = autonumber_cust("ID_PELANGGAN") ?>
              <td><input class="form-control" type="hidden" name="id_cust" value="<?=$number_cust ?>" readonly></td>
              </div>
            </tr>
            <tr>
              <div class="form-group">
              <td>
                <label>Nama</label>
              </td>
              <td> : </td>
              <td><input class="form-control" type="text" name="nama" value="" autocomplete="off"></td>
              </div>
            </tr>
            <tr>
              <div class="form-group">
              <td>
                <label>Alamat</label>
              </td>
              <td> : </td>
              <td><textarea name="alamat" rows="8" cols="40"></textarea>
              </div>
            </tr>
            <tr>
              <div class="form-group">
              <td>
                <label>HP</label>
              </td>
              <td> : </td>
              <td><input class="form-control" type="text" name="hp" value=""></td>
              </div>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td><button class="btn btn-primary" type="submit" name="simpan">Simpan</button></td>
            </tr>
          </table>
          </form>
    </div> <!-- end col-md -->

         <div class="col-md-8">
           <table class="table table-bordered mt-4" border="1">
               <thead class="thead-dark text-center">
                 <th scope="col" width="5%">ID</th>
                 <th scope="col" width="30%">Nama</th>
                 <th scope="col">Alamat</th>
                 <th scope="col" width="10%">Hp</th>
                 <th scope="col" width="15%">Aksi</th>
               </thead>
               <tbody id="content">

               </tbody>
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

<script type="text/javascript">
  $(document).ready(function(){
    //disini untuk menjalankan function
    loadData();

    $('form').on('submit', function(e){//disable loading saat tekan tombol
      e.preventDefault();
      $.ajax({ //menjalankan ajax dg jquery
          type:$(this).attr('method'), //menentukan post / get, (this) = form
          url:$(this).attr('action'), //url untuk action pada form
          data:$(this).serialize(), //data untuk mengambil dan input dari form inputan
          success:function(){ //jika sukses
            loadData();
            swal("Berhasil!", "Data berhasil disimpan!", "success").then((oke) => {
              document.location.href = 'master-customer.php';
              });
            resetinput();
          }

      })
    })
  })


  //membuat function ambil data dari db
  function loadData(){
    $.get('../admin/data-cust.php', function(data_cust){ //mengambil data dari data-cust
        $('#content').html(data_cust); //menampilkan isi dari data-cust di tag id=content
        $('.hapus').click(function(e){
          e.preventDefault();
          $.ajax({ //menjalankan ajax dg jquery
              type:'GET', //menentukan post / get, (this) = form
              url:$(this).attr('href'), //url untuk action pada link
              success:function(){ //jika sukses
              var yakin = confirm("Yakin akan dihapus ?");
              if (yakin) {
                 swal("Berhasil!", "Data berhasil dihapus!", "success");
               } else {
                 swal("Gagal Dihapus!!");
               }
               loadData();


              }

          })
        })

    })
  }



  function resetinput(){
    $('[name=alamat]').val('');
    $('[name=nama]').val('');
    $('[name=hp]').val('');
    $('[name=nama]').focus();
  }


</script>
</body>
</html>
