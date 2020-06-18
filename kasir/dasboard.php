<?php include'header.php';

?>

<div class="container-fluid custom-container">
  <div class="nav-menu">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab"  href="dasboard.php" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-home mr-2"></i>Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="contact-tab"  href="pembelian.php" role="tab" aria-controls="pembelian" aria-selected="false"><i class="fas fa-shopping-cart mr-2"></i>Pembelian</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="contact-tab"  href="penjualan.php" role="tab" aria-controls="penjualan" aria-selected="false"><i class="fas fa-money-bill mr-2"></i>Penjualan</a>
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
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <br><br>
    <div class="row">
    <div class="col-md-4">
      <div class="card mb-3" style="max-width: 24rem;">
      <div class="card-header bg-primary text-white"><h4>Total Pembelian</h4></div>
      <div class="card-body card-body-custom">
        <table>
          <tr>
            <?php $sum_total = tampil_data("SELECT SUM(HARGA_BELI) AS jumlah FROM pembelian_barang");?>
            <?php foreach ($sum_total as $jumlah) {
                  $total_harga = number_format($jumlah["jumlah"]);
            } ?>
            <td><h1 class="card-title" style="font-weight:bold; margin-top:20px;">Rp. <?=$total_harga; ?></h1></td>
          </tr>
        </table>
        <p class="card-text"><div class="pembelian"><i class="fas fa-shopping-cart"></i></div></p>
      </div>
      </div>
    </div> <!-- end col md -->
    <div class="col-md-4">

      <div class="card mb-3" style="max-width: 24rem;">
      <div class="card-header bg-danger text-white"><h4>Total Penjualan</h4></div>
      <div class="card-body card-body-custom">
        <table>
          <tr>
            <?php $sum_total = tampil_data("SELECT SUM(TOTAL_HARGA) AS jumlah FROM penjualan");?>
            <?php foreach ($sum_total as $jumlah) {
                  $total_harga = number_format($jumlah["jumlah"]);
            } ?>
            <td><h1 class="card-title" style="font-weight:bold; margin-top:20px;">Rp. <?=$total_harga; ?></h1></td>
          </tr>
        </table>
        <p class="card-text"><div class="pembelian"><i class="fas fa-money-bill"></i></div></p>
      </div>
      </div>

    </div> <!-- end col md -->
    <div class="col-md-4">

      <div class="card mb-3" style="max-width: 24rem;">
      <div class="card-header bg-warning text-white"><h4>Total Produk</h4></div>
      <div class="card-body card-body-custom">
        <table>
          <tr>
            <?php
            global $conn;
            $hasil = mysqli_query ($conn,"SELECT * FROM master_barang");
            $barang = mysqli_num_rows($hasil);
            ?>
            <td><h1 class="card-title number-counter" style="font-weight:bold; margin-top:20px;" data-count-from="0" data-count-to="<?=$barang; ?>" data-count-speed="80"></h1></td>
          </tr>
        </table>
        <p class="card-text"><div class="pembelian"><i class="fas fa-box"></i></div></p>
      </div>
      </div>

    </div> <!-- end col md -->
  </div> <!-- end row -->
  <br>
  <div class="row">
  <div class="col-md-4">
    <div class="card mb-3" style="max-width: 24rem;">
    <div class="card-header bg-warning text-white"><h4>Total Supplier</h4></div>
    <div class="card-body card-body-custom">
      <table>
        <tr>
          <?php
          global $conn;
          $hasil = mysqli_query ($conn,"SELECT * FROM supplier");
          $supp = mysqli_num_rows($hasil);
          ?>
          <td><h1 class="card-title number-counter" style="font-weight:bold; margin-top:20px;" data-count-from="0" data-count-to="<?=$supp; ?>" data-count-speed="80"></h1></td>
        </tr>
      </table>
      <p class="card-text"><div class="pembelian"><i class="fas fa-truck"></i></div></p>
    </div>
    </div>
  </div> <!-- end col md -->
  <div class="col-md-4">

    <div class="card mb-3" style="max-width: 24rem;">
    <div class="card-header bg-danger text-white"><h4>Total Transaksi</h4></div>
    <div class="card-body card-body-custom">
      <table>
        <tr>
          <?php
          global $conn;
          $hasil = mysqli_query ($conn,"SELECT * FROM inv_penjualan");
          $cust = mysqli_num_rows($hasil);
          ?>
          <td><h1 class="card-title number-counter" style="font-weight:bold; margin-top:20px;" data-count-from="0" data-count-to="<?=$cust; ?>" data-count-speed="80"></h1></td>
        </tr>
      </table>
      <p class="card-text"><div class="pembelian"><i class="fas fa-handshake"></i></div></p>
    </div>
    </div>

  </div> <!-- end col md -->
  <div class="col-md-4">

    <div class="card mb-3" style="max-width: 24rem;">
    <div class="card-header bg-primary text-white"><h4>Total Posting</h4></div>
    <div class="card-body card-body-custom">
      <table>
        <tr>
          <?php
          global $conn;
          $hasil = mysqli_query ($conn,"SELECT * FROM news");
          $news = mysqli_num_rows($hasil);
          ?>
          <td><h1 class="card-title number-counter" style="font-weight:bold; margin-top:20px;" data-count-from="0" data-count-to="<?=$news; ?>" data-count-speed="80">Rp.0000</h1></td>
        </tr>
      </table>
      <p class="card-text"><div class="pembelian"><i class="fas fa-newspaper"></i></div></p>
    </div>
    </div>

  </div> <!-- end col md -->
</div> <!-- end row -->

<br><br>
<h3><strong>PRODUK TERLARIS :</strong></h3>
<hr>
<div class="chart-category">
  <canvas id="produk-laris"></canvas>

</div>

<br><br><br>
<h3><strong>JUMLAH PRODUK PER-KATEGORI :</strong></h3>
<hr>
<div class="chart-category">
  <canvas id="myChart"></canvas>

</div>



    </div> <!-- end home -->
    <div class="tab-pane fade" id="pembelian" role="tabpanel" aria-labelledby="profile-tab">pembelian</div>
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


<!-- php untuk mengambil data kategori -->
<?php
global $conn;
$hasil = mysqli_query ($conn,"SELECT * FROM kategori");
$array = [];
while($data = mysqli_fetch_assoc($hasil)){
  $array[] = $data;
  $data_kat[] = $data['KATEGORI'];

}
 ?>

<!-- chart untuk menampilkan data per kategori -->
<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?=json_encode($data_kat) ?>,
        datasets: [{
            label: 'Jumlah Stok',
            data: [
              <?php
              global $conn;
              $hasil = mysqli_query ($conn,"SELECT * FROM master_barang WHERE ID_KATEGORI = 1");
              echo $proc = mysqli_num_rows($hasil);
              ?>,
              <?php
              global $conn;
              $hasil = mysqli_query ($conn,"SELECT * FROM master_barang WHERE ID_KATEGORI = 2");
              echo $ram = mysqli_num_rows($hasil);
              ?>,
              <?php
              global $conn;
              $hasil = mysqli_query ($conn,"SELECT * FROM master_barang WHERE ID_KATEGORI = 3");
              echo $mobo = mysqli_num_rows($hasil);
              ?>,
              <?php
              global $conn;
              $hasil = mysqli_query ($conn,"SELECT * FROM master_barang WHERE ID_KATEGORI = 4");
              echo $hdd = mysqli_num_rows($hasil);
              ?>,
              <?php
              global $conn;
              $hasil = mysqli_query ($conn,"SELECT * FROM master_barang WHERE ID_KATEGORI = 5");
              echo $psu = mysqli_num_rows($hasil);
              ?>,
              <?php
              global $conn;
              $hasil = mysqli_query ($conn,"SELECT * FROM master_barang WHERE ID_KATEGORI = 6");
              echo $vga = mysqli_num_rows($hasil);
              ?>,
              <?php
              global $conn;
              $hasil = mysqli_query ($conn,"SELECT * FROM master_barang WHERE ID_KATEGORI = 7");
              echo $casing = mysqli_num_rows($hasil);
              ?>,
              <?php
              global $conn;
              $hasil = mysqli_query ($conn,"SELECT * FROM master_barang WHERE ID_KATEGORI = 8");
              echo $monitor = mysqli_num_rows($hasil);
              ?>,
              <?php
              global $conn;
              $hasil = mysqli_query ($conn,"SELECT * FROM master_barang WHERE ID_KATEGORI = 9");
              echo $keyboard = mysqli_num_rows($hasil);
              ?>,
              <?php
              global $conn;
              $hasil = mysqli_query ($conn,"SELECT * FROM master_barang WHERE ID_KATEGORI = 10");
              echo $ssd = mysqli_num_rows($hasil);
              ?>,
              <?php
              global $conn;
              $hasil = mysqli_query ($conn,"SELECT * FROM master_barang WHERE ID_KATEGORI = 11");
              echo $mouse = mysqli_num_rows($hasil);
              ?>,
              <?php
              global $conn;
              $hasil = mysqli_query ($conn,"SELECT * FROM master_barang WHERE ID_KATEGORI = 12");
              echo $speak = mysqli_num_rows($hasil);
              ?>
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>

<!-- data nama produk -->
<?php

global $conn;
$hasil = mysqli_query ($conn,"SELECT * FROM produk_terjual INNER JOIN master_barang ON produk_terjual.ID_BARANG=master_barang.ID_BARANG WHERE TOTAL >= 3 ORDER BY TOTAL DESC LIMIT 0,6");
$array = [];
while($data = mysqli_fetch_assoc($hasil)){
  $array[] = $data;
  $data_produk[] = $data['NAMA_BARANG'];
  $jumlah_produk[] = $data['TOTAL'];

}

 ?>
<!-- chart untuk menampilkan produk terlaris -->
<script>

var ctx = document.getElementById('produk-laris');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: <?=json_encode($data_produk) ?>,
        datasets: [{
            label: 'Produk Terjual',
            data: <?=json_encode($jumlah_produk) ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>

<script>

(function($) {
  $.fn.countTo = function(options) {
    return this.each(function() {
      //-- Arrange
      var FRAME_RATE = 60; // Predefine default frame rate to be 60fps
      var $el = $(this);
      var countFrom = parseInt($el.attr('data-count-from'));
      var countTo = parseInt($el.attr('data-count-to'));
      var countSpeed = $el.attr('data-count-speed'); // Number increment per second

      //-- Action
      var rafId;
      var increment;
      var currentCount = countFrom;
      var countAction = function() {              // Self looping local function via requestAnimationFrame
        if(currentCount < countTo) {              // Perform number incremeant
          $el.text(Math.floor(currentCount));     // Update HTML display
          increment = countSpeed / FRAME_RATE;    // Calculate increment step
          currentCount += increment;              // Increment counter
          rafId = requestAnimationFrame(countAction);
        } else {                                  // Terminate animation once it reaches the target count number
          $el.text(countTo);                      // Set to the final value before everything stops
          //cancelAnimationFrame(rafId);
        }
      };
      rafId = requestAnimationFrame(countAction); // Initiates the looping function
    });
  };
}(jQuery));

//-- Executing
$('.number-counter').countTo();

</script>
</body>
</html>
