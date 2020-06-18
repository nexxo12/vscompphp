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
        <div class="card">

        <h5 class="card-header">List Paket PC</h5>
        <div class="card-body">
        <table class="table table-bordered ">
          <thead class="thead-dark text-center">
            <tr>
              <th scope="col" width="5%">No.</th>
              <th scope="col" width="">Nama Barang</th>
              <th scope="col" width="15%">Aksi</th>
            </tr>
          </thead>
          <?php
            $no=1;
            $data_barang = tampil_data("SELECT * FROM paket_pc");
            foreach ($data_barang as $barang) :?>
            <tbody id="isi-barang">
              <tr>
                <td align="center" rowspan=""><?=$no; ?></td>
                <td>
                  <div id="accordion">
                  <div class="card">
                    <div class="card-header bg-primary">
                      <a class="card-link text-white" data-toggle="collapse" href="#paket<?=$no; ?>">
                        <h6>Paket PC Rakitan #<?=$no; ?> (Rp. <?=number_format($barang["HARGA_PC"]); ?>) </h6>
                      </a>
                    </div>
                    <div id="paket<?=$no; ?>" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <table width="100%" class="table table-borderless ">
                          <tr>
                            <td width="15%">Prosessor</td>
                            <td>:</td>
                            <td> <?=$barang["PROC"]; ?></td>
                          </tr>
                          <tr>
                            <td width="15%">Motherboard</td>
                            <td>:</td>
                            <td><?=$barang["MOBO"]; ?></td>
                          </tr>
                          <tr>
                            <td width="15%">RAM</td>
                            <td>:</td>
                            <td><?=$barang["RAM"]; ?></td>
                          </tr>
                          <tr>
                            <td width="15%">Hardisk</td>
                            <td>:</td>
                            <td><?=$barang["HDD"]; ?></td>
                          </tr>
                          <tr>
                            <td width="15%">SSD</td>
                            <td>:</td>
                            <td><?=$barang["SSD"]; ?></td>
                          </tr>
                          <tr>
                            <td width="15%">Display</td>
                            <td>:</td>
                            <td><?=$barang["VGA"]; ?></td>
                          </tr>
                          <tr>
                            <td width="15%">Power Supply</td>
                            <td>:</td>
                            <td><?=$barang["PSU"]; ?></td>
                          </tr>
                          <tr>
                            <td width="15%">Casing</td>
                            <td>:</td>
                            <td><?=$barang["CASING"]; ?></td>
                          </tr>
                          <tr>
                            <td width="15%">Monitor</td>
                            <td>:</td>
                            <td><?=$barang["MONITOR"]; ?></td>
                          </tr>
                          <tr>
                            <td width="15%">Keyboard</td>
                            <td>:</td>
                            <td><?=$barang["KEYB"]; ?></td>
                          </tr>
                          <tr>
                            <td width="15%">Mouse</td>
                            <td>:</td>
                            <td><?=$barang["MOUSE"]; ?></td>
                          </tr>
                          <tr>
                            <td width="15%">Speaker</td>
                            <td>:</td>
                            <td><?=$barang["SPEAK"]; ?></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                </td>
                <td  rowspan="">
                    <a href="edit-list-pc.php?id=<?=$barang["ID_PC"] ?>" ><button class="btn btn-warning" type="button" name="edit"><i class="fas fa-edit"></i></button></a>
                    <a href="../paket-pc.php" target="_blank"><button class="btn btn-primary" type="button" name="view"><i class="fas fa-eye"></i></button></a>
                    <a href="del-list-pc.php?hapus=<?=$barang["ID_PC"] ?>" ><button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?');"  type="button" name="hapus"><i class="fas fa-trash"></i></button>
                </td>

              </tr>

            </tbody>

           <?php
           $no++;
           endforeach;
           ?>

        </table>
        <br>
        <a href="paket-pc.php"><button class="btn btn-primary" type="button" name="kembali" value="" style="margin-left:45%;">Kembali</button></a>
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
</body>
</html>
