<!DOCTYPE html>
<?php include'../function/function.php';?>
<html lang="en">
<head>
  <link rel="shortcut icon" href="../img/favicon.ico">
  <title>Cek Ongkir - VSComp</title>

<?php include'../template/header.php';?>

<div class="container">
  <h4>Cek Ongkir</h4>
  <hr size="10" noshade>
  <div class="row">
    <div class="input-ongkir">
        <div class="input-position">
        <div class="form-group">
          <label for="usr">Kota Asal :</label>
          <input class="form-control" type="text" name="" value="Surabaya" readonly>
          <br>
          <label for="usr">Tujuan :</label>
          <select class="form-control" name="provinsi">

          </select>
          <br>
          <select class="form-control" name="kotakab">

          </select>
          <br>
          <label for="usr">Berat Kiriman (gram) :</label>
          <input type="text" class="form-control" id="berat" placeholder="berat (gram)" value="">
          <br>
          <label for="usr">Ekpedisi :</label>
          <select class="form-control" name="ekpedisi">

          </select>
          <br>
          <div class="button-cek">
            <!--<button type="submit" class="btn btn-primary w-50" disabled>Cek</button>-->
          </div>

        </div> <!-- end from-grup -->
      </div> <!-- end input-position -->
    </div> <!-- end input-ongkir -->

    <div class="h6">
      <h6>Result :</h6>
    </div>
    <div class="result-ongkir">
      <table class="table" width="100%">
        <thead>
          <tr>
            <th scope="col">Ekpedisi</th>
            <th scope="col">Jenis Layanan</th>
            <th scope="col">Estimasi (hari)</th>
            <th scope="col">Tarif</th>
          </tr>
        </thead>
        <tbody id="result-ekpedisi">

        </tbody>
      </table>
    </div>

    </div> <!-- end row -->
  </div> <!-- end container -->

<br><br><br><br>
<?php include'../template/footer.php'; ?>
