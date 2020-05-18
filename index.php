
<?php include'template/header-index.php';
      include'function/function.php';
?>

<div id="demo" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="img/gambar1.png" class="d-block w-100" alt="Asrock">
    </div>
    <div class="carousel-item">
        <img src="img/gambar2.png" class="d-block w-100" alt="MSI x570">
    </div>
    <div class="carousel-item">
        <img src="img/gambar3.png" class="d-block w-100" alt="MSI MPG">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<div class="container-fluid">
<div class="row">
  <div class="col-md-4 col-sm-12">
          <a href="products/prosessor.php">
          <img class="gambar-produk" data-aos="zoom-in" data-aos-duration="1000" src="img/Prosessor2.jpg" alt="Prosesor">
          <div class="overlay">
            <div class="text">PROSESSOR</div>
          </div>
          </img></a>
  </div>
  <div class="col-md-4 col-sm-12">
      <a href="products/motherboard.php">
      <img class="gambar-produk" data-aos="zoom-in" data-aos-duration="1000" src="img/mobo.jpg" alt="Motherboard"></img></a>
      <div class="overlay">
        <div class="text">MOTHERBOARD</div>
      </div>
  </div>
  <div class="col-md-4 col-sm-12">
      <a href="products/memory.php">
      <img class="gambar-produk" data-aos="zoom-in" data-aos-duration="1000" src="img/ram.jpg" alt="RAM"></img></a>
      <div class="overlay">
        <div class="text">MEMORY</div>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4 col-sm-12">
      <a href="products/power-supply.php">
      <img class="gambar-produk" data-aos="zoom-in" data-aos-duration="1000" src="img/psu.jpg" alt="Power Supply"></img></a>
      <div class="overlay">
        <div class="text">POWER SUPPLY</div>
      </div>
  </div>
  <div class="col-md-4 col-sm-12">
      <a href="products/casing.php">
      <img class="gambar-produk" data-aos="zoom-in" data-aos-duration="1000" src="img/case.jpg" alt="Casing"></img></a>
      <div class="overlay">
        <div class="text">CASING</div>
      </div>
  </div>
  <div class="col-md-4 col-sm-12">
      <a href="products/ssd-hdd.php">
      <img class="gambar-produk" data-aos="zoom-in" data-aos-duration="1000" src="img/ssd.jpg" alt="SSD & HDD"></img></a>
      <div class="overlay">
        <div class="text">SSD & HDD</div>
      </div>
  </div>
</div>
</div>

<div class="container-fluid">
<div class="row">
  <div class="col-md-4 col-sm-6 bg-dark">
    <table class="table table-dark table-hover" data-aos="fade-right"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine"
     data-aos-duration="1000">
    <thead>
      <tr>
       <th><h3>NEWS</h3></th>
     </tr>
   </thead>
   <tbody>
      <?php $data_news = tampil_data("SELECT * FROM news");?>
       <?php foreach ($data_news as $news) : ?>
      <tr>
        <td><?=$news["WAKTU"]; ?></td>
        <td><a class="news" href="news.php?view=<?=$news["ID_NEWS"]; ?>"><?=$news["JUDUL"]; ?></a></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  </div>
  <div class="col-md-4 col-sm-6 bg-dark">
    <table class="table table-dark table-hover" data-aos="fade-up" data-aos-duration="1000">
    <thead>
      <tr>
       <th><h3>VIDEOS</h3></th>
     </tr>
   </thead>
   <tbody>
      <tr>
        <td colspan="2"><iframe width="100%" height="200%" src="https://www.youtube.com/embed/Gjq5gTyR-wM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
      </tr>

    </tbody>
  </table>
  </div>
  <div class="col-md-4 col-sm-6 bg-dark">
    <table class="table table-dark table-hover" data-aos="fade-left"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine"
     data-aos-duration="1000">
    <thead>
      <tr>
       <th><h3>PROMO</h3></th>
     </tr>
   </thead>
   <tbody>
      <tr>
        <td>31-03-2020</td>
        <td>Three Months Extension for Warranty </td>
      </tr>
      <tr>
        <td>31-03-2020</td>
        <td>Three Months Extension for Warranty </td>
      </tr>
      <tr>
        <td>31-03-2020</td>
        <td>Three Months Extension for Warranty </td>
      </tr>
      <tr>
        <td>31-03-2020</td>
        <td>Three Months Extension for Warranty </td>
      </tr>
      <tr>
        <td>31-03-2020</td>
        <td>Three Months Extension for Warranty </td>
      </tr>
      <tr>
        <td>31-03-2020</td>
        <td>Three Months Extension for Warranty </td>
      </tr>
    </tbody>
  </table>
  </div>
</div>
</div>
<?php include'template/footer-index.php'; ?>
