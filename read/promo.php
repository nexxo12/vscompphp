<?php include'../function/function.php';?>
<!DOCTYPE html>
<html lang="en">
<?php
  $id = $_GET["view"];
  $data_news = tampil_data("SELECT * FROM promo WHERE ID_PROMO = '$id'")[0];
 ?>
<head>
  <link rel="shortcut icon" href="../img/favicon.ico">
  <title><?=$data_news["JUDUL"]; ?> - VSComp</title>

<?php include'../template/headerread.php';?>

<div class="container">
  <h2><?=$data_news["JUDUL"]; ?></h2>
  <hr noshade></hr>
  <br>
  <img src="../img/promo/<?=$data_news["GAMBAR"]; ?>" alt="" style="height:100%; width:100%;">
  <br><br>
  <?=htmlspecialchars_decode($data_news["ISI"]); ?>


</div>

<br><br><br><br><br><br>

<?php include'../template/footer.php'; ?>
