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
      <br>
      <div class="form-input">
        <form class="" action="" method="post">
        <div class="card custom-container2">
          <a href="list-paket-pc.php"><p style="position:absolute; left:85%; top:1%;">List Paket PC &raquo</p></a>
            <h5 class="card-header">Tambah List Paket PC</h5>
        <div class="card-body">


                   <!-- php untuk tombol save -->
                   <?php

                       if(isset($_POST["save"])){
                          //var_dump($_POST);

                          if (tambahpaketPC($_POST) > 0) {
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

        <table class="table-group" id="form" cellpadding="4" align="center" border="0" width="100%">
          <tr>
            <td width="10%">
                <label for="exampleInputEmail1">Prosessor</label>
                <div class="input-group mb-1">
                    <?php $tgl=date('Y-m-d'); ?>
                    <input type="hidden" name="tgl" value="<?=$tgl ?>">
                    <input type="text" class="form-control" name="proc" placeholder="" value="" autofocus>
                    <div class="input-group-prepend">
                      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal" onclick="refresh()"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </td>
          </tr>
          <tr>
            <td width="48%">
              <label for="exampleInputEmail1">Motherboard</label>
              <div class="input-group mb-1">
                  <input type="text" class="form-control" name="mobo" placeholder="" value="" autofocus>
                  <div class="input-group-prepend">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal" onclick="refresh()"><i class="fas fa-search"></i></button>
                  </div>
              </div>

            </td>
          </tr>
          <tr>
            <td>
              <div class="form-group">
                <label for="exampleInputEmail1">Memory</label>
                <div class="input-group mb-1">
                    <input type="text" class="form-control" name="ram" placeholder="" value="" autofocus>
                    <div class="input-group-prepend">
                      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal" onclick="refresh()"><i class="fas fa-search"></i></button>
                    </div>
                </div>
              </div>

            </td>
          </tr>
          <tr>
            <td width="10%">
              <div class="form-group">
                <label for="exampleInputEmail1">HDD</label>
                <div class="input-group mb-1">
                    <input type="text" class="form-control" name="hdd" placeholder="" value="" autofocus>
                    <div class="input-group-prepend">
                      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal" onclick="refresh()"><i class="fas fa-search"></i></button>
                    </div>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-group">
                <label for="exampleInputEmail1">SSD</label>
                <div class="input-group mb-1">
                    <input type="text" class="form-control" name="ssd" placeholder="" value="" autofocus>
                    <div class="input-group-prepend">
                      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal" onclick="refresh()"><i class="fas fa-search"></i></button>
                    </div>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-group">
                <label for="exampleInputEmail1">VGA</label>
                <div class="input-group mb-1">
                    <input type="text" class="form-control" name="vga" placeholder="" value="" autofocus>
                    <div class="input-group-prepend">
                      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal" onclick="refresh()"><i class="fas fa-search"></i></button>
                    </div>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-group">
                <label for="exampleInputEmail1">PSU</label>
                <div class="input-group mb-1">
                    <input type="text" class="form-control" name="psu" placeholder="" value="" autofocus>
                    <div class="input-group-prepend">
                      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal" onclick="refresh()"><i class="fas fa-search"></i></button>
                    </div>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-group">
                <label for="exampleInputEmail1">Casing</label>
                <div class="input-group mb-1">
                    <input type="text" class="form-control" name="casing" placeholder="" value="" autofocus>
                    <div class="input-group-prepend">
                      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal" onclick="refresh()"><i class="fas fa-search"></i></button>
                    </div>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-group">
                <label for="exampleInputEmail1">Monitor</label>
                <div class="input-group mb-1">
                    <input type="text" class="form-control" name="monitor" placeholder="" value="" autofocus>
                    <div class="input-group-prepend">
                      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal" onclick="refresh()"><i class="fas fa-search"></i></button>
                    </div>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-group">
                <label for="exampleInputEmail1">Keyboard</label>
                <div class="input-group mb-1">
                    <input type="text" class="form-control" name="keyb" placeholder="" value="" autofocus>
                    <div class="input-group-prepend">
                      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal" onclick="refresh()"><i class="fas fa-search"></i></button>
                    </div>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-group">
                <label for="exampleInputEmail1">Mouse</label>
                <div class="input-group mb-1">
                    <input type="text" class="form-control" name="mouse" placeholder="" value="" autofocus>
                    <div class="input-group-prepend">
                      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal" onclick="refresh()"><i class="fas fa-search"></i></button>
                    </div>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-group">
                <label for="exampleInputEmail1">Speaker</label>
                <div class="input-group mb-1">
                    <input type="text" class="form-control" name="speaker" placeholder="" value="" autofocus>
                    <div class="input-group-prepend">
                      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal" onclick="refresh()"><i class="fas fa-search"></i></button>
                    </div>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-group">
                <label for="exampleInputEmail1">Harga Total</label>
                <div class="input-group mb-1">
                    <input type="text" class="form-control" name="hargapc" placeholder="" value="" autofocus>
                </div>
              </div>
            </td>
          </tr>

      </table>
    </div>
    </div>
      <br>

          <button class="btn btn-submit btn-success" id="save" type="submit" name="save"><i class="fas fa-save mr-2"></i>Save</button><br><br>
          </form>

        <br>
    </div>

    <!-- The Modal Barang-->
    <div class="modal fade" id="myModal">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h5 class="modal-title">Daftar Barang</h5>
              <input class="form-control mr-sm-2" style="width:30%; margin-left:46%;" type="search" placeholder="Kategori / Nama Barang ..." aria-label="Search" name="kunci" id="kunci" autocomplete='off' autofocus>
              <button class="btn btn-primary" type="submit" value="1" name="cari"><i class="fas fa-search"></i></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <h6 style="color:red;">Info : Copy Nama Barang, dan Paste ke inputan</h6>
            <table class="table table-bordered ">
              <thead class="thead-dark text-center">
                <tr>
                  <th scope="col" width="10%">Kode</th>
                  <th scope="col" width="">Nama Barang</th>
                  <th scope="col" width="14%">Kategori</th>
                  <th scope="col" width="8%">Stok</th>
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

<script type="text/javascript">
$(document).ready(function(){
    $('#kunci').on('keyup', function(){
      $('#isi-barang').load('detail-barangPaketPC.php?keyword=' + $('#kunci').val())
    })
});
</script>

<script>
function refresh(){
  $.get('detail-barangPaketPC.php', function(data_brg){
    $('#isi-barang').html(data_brg);
  });


}

</script>

</body>
</html>
