<?php include'function/function.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" href="img/favicon.ico">
  <title>Paket PC - VSComp</title>

<?php include'template/header3.php';?>

<div class="container">
  <h4>Simulasi PC Rakitan</h4>
  <hr size="10" noshade>
  <div class="row">
  <div class="col-md-8">
  <form class="simulasi">
  <div class="form-group">
    <label for="usr">Item :</label>
    <select class="form-control" id="sel1">
      <option>--Prosessor--</option>
      <option>Intel Core i7-9700F 4.2Ghz</option>
      <option>AMD Ryzen 5 2600 AM4 Box</option>
      <option>Pentium G5400 Gold Cofee Lake</option>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="sel1">
      <option>--Motherboard--</option>
      <option>MSI Z390 MAG Pro Wifi</option>
      <option>ASRock A320M HDV R4.0</option>
      <option>Gigabyte Aorus H310M - 1151</option>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="sel1">
      <option>--Memory--</option>
      <option>Klevv Bolt 16GB (8x2) DDR4-3200</option>
      <option>Team Tforce RGB 16GB (8x2) DDR4-3200</option>
      <option>VGen Stunami Blue LED (8x2) DDR4-3200</option>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="sel1">
      <option>--Hardisk--</option>
      <option>Seagate 1TB Baracuda</option>
      <option>Seagate 1TB Baracuda</option>
      <option>Seagate 1TB Baracuda</option>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="sel1">
      <option>--SSD--</option>
      <option>Samsung 500GB</option>
      <option>Samsung 500GB</option>
      <option>Samsung 500GB</option>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="sel1">
      <option>--Video Card--</option>
      <option>MSI Nvidia RTX 2080Ti Gaming X Trio RGB</option>
      <option>MSI Nvidia RTX 2080Ti Gaming X Trio RGB</option>
      <option>MSI Nvidia RTX 2080Ti Gaming X Trio RGB</option>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="sel1">
      <option>--Power Supply--</option>
      <option>Seasonic Core Gold 650W 80+ Gold</option>
      <option>Seasonic Core Gold 650W 80+ Gold</option>
      <option>Seasonic Core Gold 650W 80+ Gold</option>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="sel1">
      <option>--Casing--</option>
      <option>Cube Gaming Varde + 3 RGB FAN</option>
      <option>Cube Gaming Varde + 3 RGB FAN</option>
      <option>Cube Gaming Varde + 3 RGB FAN</option>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="sel1">
      <option>--Monitor--</option>
      <option>LG 24MK600 IPS</option>
      <option>LG 24MK600 IPS</option>
      <option>LG 24MK600 IPS</option>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="sel1">
      <option>--Keyboard--</option>
      <option>Logitech MK120</option>
      <option>Logitech MK120</option>
      <option>Logitech MK120</option>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="sel1">
      <option>--Mouse--</option>
      <option>Razer Black Mamba</option>
      <option>Razer Black Mamba</option>
      <option>Razer Black Mamba</option>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="sel1">
      <option>--Sound--</option>
      <option>Sonic Gear Quatro Surround Speaker</option>
      <option>Sonic Gear Quatro Surround Speaker</option>
      <option>Sonic Gear Quatro Surround Speaker</option>
    </select>
  </div>
  <div class="form-group">
    <div class="total">
      <h5 align="right">TOTAL</h5>
    </div>
  </div>

  </form>
  </div>

  <div class="col-md-1">
  <div class="qty">
  <div class="form-group">
    <label for="usr">Qty:</label>
    <input type="text" class="form-control" id="usr">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="usr">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="usr">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="usr">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="usr">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="usr">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="usr">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="usr">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="usr">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="usr">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="usr">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="usr">
  </div>
  <div class="form-group">
    <div class="form-qty"><input type="text" class="form-control" id="usr" disabled></div>
  </div>
  </div>
  </div>

  <div class="col-md-3">
  <div class="qty">
  <div class="form-group">
    <label for="usr">Harga:</label>
    <input type="text" class="form-control" id="usr" placeholder="Rp.">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="usr" placeholder="Rp.">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="usr" placeholder="Rp.">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="usr" placeholder="Rp.">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="usr" placeholder="Rp.">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="usr" placeholder="Rp.">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="usr" placeholder="Rp.">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="usr" placeholder="Rp.">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="usr" placeholder="Rp.">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="usr" placeholder="Rp.">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="usr" placeholder="Rp.">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="usr" placeholder="Rp.">
  </div>
  <div class="form-group">
    <div class="form-harga"><input type="text" class="form-control" id="usr" placeholder="Rp." disabled></div>
  </div>
  </div>
  </div>
  </div> <!-- div tutup row -->

  <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4 text-center">
      <div class="button">
        <button type="submit" class="btn btn-primary">Print Preview</button>

      </div>
    </div>
    <div class="col-md-4">
    </div>

  </div>
</div> <!-- div tutup container -->

<br><br><br><br><br><br>

<?php include'template/footer2.php'; ?>
