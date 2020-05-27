<?php include'function/function.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" href="img/favicon.ico">
  <title>Simulasi PC Rakitan - VSComp</title>

<?php include'template/header3.php';?>

<div class="container">
  <h4>Simulasi PC Rakitan</h4>
  <hr size="10" noshade>
  <div class="row">
  <div class="col-md-8">
  <form class="simulasi" method="POST" action="cetak-simulasi.php">
  <div class="form-group">
    <label for="usr">Item :</label>
    <select class="form-control" id="proc" name="proc" required>
      <option>--Prosessor--</option>
      <?php $data_barang = tampil_data("SELECT * FROM master_barang WHERE ID_KATEGORI = 1");  ?>
      <?php foreach ($data_barang as $barang) :
        $id_proc = $barang["ID_BARANG"];
        $nama_proc = $barang["NAMA_BARANG"];
        $hg_proc = $barang["HARGA_JUAL"];
        ?>
      <?php if ($barang["STOK"] == 0) {
          echo "";
        }

      else {
          echo "<option value=".$id_proc.">".$nama_proc."(Rp. ".number_format($hg_proc).")</option>";
      }

      ?>

    <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="mobo" name="mobo" required>
      <option>--Motherboard--</option>
      <?php $data_barang = tampil_data("SELECT * FROM master_barang WHERE ID_KATEGORI = 3");  ?>
      <?php foreach ($data_barang as $barang) :
        $id_mobo = $barang["ID_BARANG"];
        $nama_mobo = $barang["NAMA_BARANG"];
        $hg_mobo = $barang["HARGA_JUAL"];
        ?>
      <?php if ($barang["STOK"] == 0) {
          echo "";
        }

      else {
          echo "<option value=".$id_mobo.">".$nama_mobo."(Rp. ".number_format($hg_mobo).")</option>";
      }

      ?>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="ram" name="ram">
      <option>--Memory--</option>
      <?php $data_barang = tampil_data("SELECT * FROM master_barang WHERE ID_KATEGORI = 2");  ?>
      <?php foreach ($data_barang as $barang) :
        $id_ram = $barang["ID_BARANG"];
        $nama_ram = $barang["NAMA_BARANG"];
        $hg_ram = $barang["HARGA_JUAL"];
        ?>
      <?php if ($barang["STOK"] == 0) {
          echo "";
        }

      else {
          echo "<option value=".$id_ram.">".$nama_ram."(Rp. ".number_format($hg_ram).")</option>";
      }

      ?>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="hdd" name="hdd">
      <option>--Hardisk--</option>
      <?php $data_barang = tampil_data("SELECT * FROM master_barang WHERE ID_KATEGORI = 4");  ?>
      <?php foreach ($data_barang as $barang) :
        $id_hdd = $barang["ID_BARANG"];
        $nama_hdd = $barang["NAMA_BARANG"];
        $hg_hdd = $barang["HARGA_JUAL"];
        ?>
      <?php if ($barang["STOK"] == 0) {
          echo "";
        }

      else {
          echo "<option value=".$id_hdd.">".$nama_hdd."(Rp. ".number_format($hg_hdd).")</option>";
      }

      ?>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="ssd" name="ssd">
      <option>--SSD--</option>
      <?php $data_barang = tampil_data("SELECT * FROM master_barang WHERE ID_KATEGORI = 10");  ?>
      <?php foreach ($data_barang as $barang) :
        $id_ssd = $barang["ID_BARANG"];
        $nama_ssd = $barang["NAMA_BARANG"];
        $hg_ssd = $barang["HARGA_JUAL"];
        ?>
      <?php if ($barang["STOK"] == 0) {
          echo "";
        }

      else {
          echo "<option value=".$id_ssd.">".$nama_ssd."(Rp. ".number_format($hg_ssd).")</option>";
      }

      ?>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="vga" name="vga">
      <option>--Video Card--</option>
      <?php $data_barang = tampil_data("SELECT * FROM master_barang WHERE ID_KATEGORI = 6");  ?>
      <?php foreach ($data_barang as $barang) :
        $id_vga = $barang["ID_BARANG"];
        $nama_vga = $barang["NAMA_BARANG"];
        $hg_vga = $barang["HARGA_JUAL"];
        ?>
      <?php if ($barang["STOK"] == 0) {
          echo "";
        }

      else {
          echo "<option value=".$id_vga.">".$nama_vga."(Rp. ".number_format($hg_vga).")</option>";
      }

      ?>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="psu" name="psu">
      <option>--Power Supply--</option>
      <?php $data_barang = tampil_data("SELECT * FROM master_barang WHERE ID_KATEGORI = 5");  ?>
      <?php foreach ($data_barang as $barang) :
        $id_psu = $barang["ID_BARANG"];
        $nama_psu = $barang["NAMA_BARANG"];
        $hg_psu = $barang["HARGA_JUAL"];
        ?>
      <?php if ($barang["STOK"] == 0) {
          echo "";
        }

      else {
          echo "<option value=".$id_psu.">".$nama_psu."(Rp. ".number_format($hg_psu).")</option>";
      }

      ?>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="casing" name="casing">
      <option>--Casing--</option>
      <?php $data_barang = tampil_data("SELECT * FROM master_barang WHERE ID_KATEGORI = 7");  ?>
      <?php foreach ($data_barang as $barang) :
        $id_case = $barang["ID_BARANG"];
        $nama_case = $barang["NAMA_BARANG"];
        $hg_case = $barang["HARGA_JUAL"];
        ?>
      <?php if ($barang["STOK"] == 0) {
          echo "";
        }

      else {
          echo "<option value=".$id_case.">".$nama_case."(Rp. ".number_format($hg_case).")</option>";
      }

      ?>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="monitor" name="monitor">
      <option>--Monitor--</option>
      <?php $data_barang = tampil_data("SELECT * FROM master_barang WHERE ID_KATEGORI = 8");  ?>
      <?php foreach ($data_barang as $barang) :
        $id_monitor = $barang["ID_BARANG"];
        $nama_monitor = $barang["NAMA_BARANG"];
        $hg_monitor = $barang["HARGA_JUAL"];
        ?>
      <?php if ($barang["STOK"] == 0) {
          echo "";
        }

      else {
          echo "<option value=".$id_monitor.">".$nama_monitor."(Rp. ".number_format($hg_monitor).")</option>";
      }

      ?>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="keyboard" name="keyb">
      <option>--Keyboard--</option>
      <?php $data_barang = tampil_data("SELECT * FROM master_barang WHERE ID_KATEGORI = 9");  ?>
      <?php foreach ($data_barang as $barang) :
        $id_keyb = $barang["ID_BARANG"];
        $nama_keyb = $barang["NAMA_BARANG"];
        $hg_keyb = $barang["HARGA_JUAL"];
        ?>
      <?php if ($barang["STOK"] == 0) {
          echo "";
        }

      else {
          echo "<option value=".$id_keyb.">".$nama_keyb."(Rp. ".number_format($hg_keyb).")</option>";
      }

      ?>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="mouse" name="mouse">
      <option>--Mouse--</option>
      <?php $data_barang = tampil_data("SELECT * FROM master_barang WHERE ID_KATEGORI = 11");  ?>
      <?php foreach ($data_barang as $barang) :
        $id_mouse = $barang["ID_BARANG"];
        $nama_mouse = $barang["NAMA_BARANG"];
        $hg_mouse = $barang["HARGA_JUAL"];
        ?>
      <?php if ($barang["STOK"] == 0) {
          echo "";
        }

      else {
          echo "<option value=".$id_mouse.">".$nama_mouse."(Rp. ".number_format($hg_mouse).")</option>";
      }

      ?>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control" id="sound" name="sound">
      <option>--Sound--</option>
      <?php $data_barang = tampil_data("SELECT * FROM master_barang WHERE ID_KATEGORI = 12");  ?>
      <?php foreach ($data_barang as $barang) :
        $id_sound = $barang["ID_BARANG"];
        $nama_sound = $barang["NAMA_BARANG"];
        $hg_sound = $barang["HARGA_JUAL"];
        ?>
      <?php if ($barang["STOK"] == 0) {
          echo "";
        }

      else {
          echo "<option value=".$id_sound.">".$nama_sound."(Rp. ".number_format($hg_sound).")</option>";
      }

      ?>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <div class="total">
      <h5 align="right">TOTAL</h5>
    </div>
  </div>
  </div>



  <div class="col-md-1">
  <div class="qty">
  <div class="form-group">
    <label for="usr">Qty:</label>
    <input type="text" class="form-control text-center" id="qty_proc" name="qty_proc">
  </div>
  <div class="form-group">
    <input type="text" class="form-control text-center" id="qty_mobo" name="qty_mobo">
  </div>
  <div class="form-group">
    <input type="text" class="form-control text-center" id="qty_ram" name="qty_ram">
  </div>
  <div class="form-group">
    <input type="text" class="form-control text-center" id="qty_hdd" name="qty_hdd">
  </div>
  <div class="form-group">
    <input type="text" class="form-control text-center" id="qty_ssd" name="qty_ssd">
  </div>
  <div class="form-group">
    <input type="text" class="form-control text-center" id="qty_vga" name="qty_vga">
  </div>
  <div class="form-group">
    <input type="text" class="form-control text-center" id="qty_psu" name="qty_psu">
  </div>
  <div class="form-group">
    <input type="text" class="form-control text-center" id="qty_casing" name="qty_casing">
  </div>
  <div class="form-group">
    <input type="text" class="form-control text-center" id="qty_monitor" name="qty_monitor">
  </div>
  <div class="form-group">
    <input type="text" class="form-control text-center" id="qty_keyboard" name="qty_keyboard">
  </div>
  <div class="form-group">
    <input type="text" class="form-control text-center" id="qty_mouse" name="qty_mouse">
  </div>
  <div class="form-group">
    <input type="text" class="form-control text-center" id="qty_sound" name="qty_sound">
  </div>
  <div class="form-group">
   <div class="form-qty"><input type="text" class="form-control" id="qty_total" disabled></div>
 </div>
  </div>
  </div>

  <div class="col-md-3">
  <div class="qty">
  <label for="usr">Harga:</label>
  <div class="form-group">
    <input type="text" class="form-control" id="proc_output" name="proc_output" placeholder="Rp." readonly>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="mobo_output" name="mobo_output" placeholder="Rp." readonly>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="ram_output" name="ram_output" placeholder="Rp." readonly>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="hdd_output" name="hdd_output" placeholder="Rp." readonly>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="ssd_output" name="ssd_output" placeholder="Rp." readonly>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="vga_output" name="vga_output" placeholder="Rp." readonly>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="psu_output" name="psu_output" placeholder="Rp." readonly>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="casing_output" name="casing_output" placeholder="Rp." readonly>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="monitor_output" name="monitor_output"  placeholder="Rp." readonly>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="keyboard_output" name="keyboard_output" placeholder="Rp." readonly>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="mouse_output" name="mouse_output" placeholder="Rp." readonly>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="sound_output" name="sound_output" placeholder="Rp." readonly>
  </div>
  <div class="form-group">
    <div class="form-harga"><input type="text"  class="form-control" id="total_all" name="total_all" placeholder="Rp." readonly></div>
  </div>
  </div>
  </div>
  </div> <!-- div tutup row -->

  <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4 text-center">
      <div class="button">
        <button type="submit" class="btn btn-primary" name="print_p">Print Preview</button>

      </div>
    </form>
    </div>
    <div class="col-md-4">
    </div>

  </div>
</div> <!-- div tutup container -->

<br><br><br><br><br><br>

<?php include'template/footer2.php'; ?>
