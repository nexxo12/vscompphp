<?php include'function/function.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="shortcut icon" href="img/favicon.ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
    <title>Cetak Simulasi - VSComp</title>
  </head>
  <body>
    <div class="container">
      <?php
        if (isset($_POST["print_p"])) {
            //get id nama barang

              $proc = $_POST["proc"];
              $h_psr = tampil_data("SELECT * FROM master_barang WHERE ID_BARANG = '$proc'");
              foreach ($h_psr as $psr) {
                $nm_psr = $psr["NAMA_BARANG"];
                $hg_psr = $psr["HARGA_JUAL"];
              }


            $mobo = $_POST["mobo"];
              $h_mobo = tampil_data("SELECT * FROM master_barang WHERE ID_BARANG = '$mobo'");
              foreach ($h_mobo as $mb) {
                $nm_mobo = $mb["NAMA_BARANG"];
                $hg_mobo = $mb["HARGA_JUAL"];
              }

            $ram = $_POST["ram"];
            $h_ram = tampil_data("SELECT * FROM master_barang WHERE ID_BARANG = '$ram'");
            foreach ($h_ram as $mem) {
              $nm_ram = $mem["NAMA_BARANG"];
              $hg_ram = $mem["HARGA_JUAL"];
            }
            $hdd = $_POST["hdd"];
            $h_hdd = tampil_data("SELECT * FROM master_barang WHERE ID_BARANG = '$hdd'");
            foreach ($h_hdd as $hddk) {
              $nm_hdd = $hddk["NAMA_BARANG"];
              $hg_hdd = $hddk["HARGA_JUAL"];
            }
            $ssd = $_POST["ssd"];
            $h_ssd = tampil_data("SELECT * FROM master_barang WHERE ID_BARANG = '$ssd'");
            foreach ($h_ssd as $ssdm2) {
              $nm_ssd = $ssdm2["NAMA_BARANG"];
              $hg_ssd = $ssdm2["HARGA_JUAL"];
            }
            $vga = $_POST["vga"];
            $h_vga = tampil_data("SELECT * FROM master_barang WHERE ID_BARANG = '$vga'");
            foreach ($h_vga as $vgac) {
              $nm_vga = $vgac["NAMA_BARANG"];
              $hg_vga = $vgac["HARGA_JUAL"];
            }
            $psu = $_POST["psu"];
            $h_psu = tampil_data("SELECT * FROM master_barang WHERE ID_BARANG = '$psu'");
            foreach ($h_psu as $ps) {
              $nm_psu = $ps["NAMA_BARANG"];
              $hg_psu = $ps["HARGA_JUAL"];
            }
            $casing = $_POST["casing"];
            $h_casing = tampil_data("SELECT * FROM master_barang WHERE ID_BARANG = '$casing'");
            foreach ($h_casing as $csing) {
              $nm_casing = $csing["NAMA_BARANG"];
              $hg_casing = $csing["HARGA_JUAL"];
            }
            $monitor = $_POST["monitor"];
            $h_monitor = tampil_data("SELECT * FROM master_barang WHERE ID_BARANG = '$monitor'");
            foreach ($h_monitor as $mntr) {
              $nm_monitor = $mntr["NAMA_BARANG"];
              $hg_monitor = $mntr["HARGA_JUAL"];
            }
            $keyboard = $_POST["keyb"];
            $h_keyboard = tampil_data("SELECT * FROM master_barang WHERE ID_BARANG = '$keyboard'");
            foreach ($h_keyboard as $kboard) {
              $nm_keyboard = $kboard["NAMA_BARANG"];
              $hg_keyboard = $kboard["HARGA_JUAL"];
            }
            $mouse = $_POST["mouse"];
            $h_mouse = tampil_data("SELECT * FROM master_barang WHERE ID_BARANG = '$mouse'");
            foreach ($h_mouse as $mous) {
              $nm_mouse = $mous["NAMA_BARANG"];
              $hg_mouse = $mous["HARGA_JUAL"];
            }
            $sound = $_POST["sound"];
            $h_sound = tampil_data("SELECT * FROM master_barang WHERE ID_BARANG = '$sound'");
            foreach ($h_sound as $speak) {
              $nm_sound = $speak["NAMA_BARANG"];
              $hg_sound = $speak["HARGA_JUAL"];
            }
            if ($proc == "--Prosessor--") {
                $barang = array();
            }
            elseif ($mobo == "--Motherboard--") {
                $barang = array($nm_psr,$nm_ram);
                $harga_part = array($hg_psr,$hg_ram);
            }
            elseif ($ram == "--Memory--") {
                $barang = array($nm_psr,$nm_mobo);
                $harga_part = array($hg_psr,$hg_mobo);
            }
            elseif ($hdd == "--Hardisk--") {
                $barang = array($nm_psr,$nm_mobo,$nm_ram);
                $harga_part = array($hg_psr,$hg_mobo,$hg_ram);
            }
            elseif ($ssd == "--SSD--") {
                $barang = array($nm_psr,$nm_mobo,$nm_ram,$nm_hdd);
                $harga_part = array($hg_psr,$hg_mobo,$hg_ram,$hg_hdd);
            }
            elseif ($vga == "--Video Card--") {
                $barang = array($nm_psr,$nm_mobo,$nm_ram,$nm_hdd,$nm_ssd);
                $harga_part = array($hg_psr,$hg_mobo,$hg_ram,$hg_hdd,$hg_ssd);
            }
            elseif ($psu == "--Power Supply--") {
                $barang = array($nm_psr,$nm_mobo,$nm_ram,$nm_hdd,$nm_ssd,$nm_vga);
                $harga_part = array($hg_psr,$hg_mobo,$hg_ram,$hg_hdd,$hg_ssd,$hg_vga);
            }
            elseif ($casing == "--Casing--") {
                $barang = array($nm_psr,$nm_mobo,$nm_ram,$nm_hdd,$nm_ssd,$nm_vga,$nm_psu);
                $harga_part = array($hg_psr,$hg_mobo,$hg_ram,$hg_hdd,$hg_ssd,$hg_vga,$hg_psu);
            }
            elseif ($monitor == "--Monitor--") {
                $barang = array($nm_psr,$nm_mobo,$nm_ram,$nm_hdd,$nm_ssd,$nm_vga,$nm_psu,$nm_casing);
                $harga_part = array($hg_psr,$hg_mobo,$hg_ram,$hg_hdd,$hg_ssd,$hg_vga,$hg_psu,$hg_casing);
            }
            elseif ($keyboard == "--Keyboard--") {
                $barang = array($nm_psr,$nm_mobo,$nm_ram,$nm_hdd,$nm_ssd,$nm_vga,$nm_psu,$nm_casing,$nm_monitor);
                $harga_part = array($hg_psr,$hg_mobo,$hg_ram,$hg_hdd,$hg_ssd,$hg_vga,$hg_psu,$hg_casing,$hg_monitor);
            }
            elseif ($mouse == "--Mouse--") {
                $barang = array($nm_psr,$nm_mobo,$nm_ram,$nm_hdd,$nm_ssd,$nm_vga,$nm_psu,$nm_casing,$nm_monitor,$nm_keyboard);
                $harga_part = array($hg_psr,$hg_mobo,$hg_ram,$hg_hdd,$hg_ssd,$hg_vga,$hg_psu,$hg_casing,$hg_monitor,$hg_keyboard);
            }
            elseif ($sound == "--Sound--") {
                $barang = array($nm_psr,$nm_mobo,$nm_ram,$nm_hdd,$nm_ssd,$nm_vga,$nm_psu,$nm_casing,$nm_monitor,$nm_keyboard,$nm_mouse);
                $harga_part = array($hg_psr,$hg_mobo,$hg_ram,$hg_hdd,$hg_ssd,$hg_vga,$hg_psu,$hg_casing,$hg_monitor,$hg_keyboard,$hg_mouse);
            }
            else {
               $barang = array($nm_psr,$nm_mobo,$nm_ram,$nm_hdd,$nm_ssd,$nm_vga,$nm_psu,$nm_casing,$nm_monitor,$nm_keyboard,$nm_mouse,$nm_sound);
               $harga_part = array($hg_psr,$hg_mobo,$hg_ram,$hg_hdd,$hg_ssd,$hg_vga,$hg_psu,$hg_casing,$hg_monitor,$hg_keyboard,$hg_mouse,$hg_sound);
            }


            //get qty Barang
            $qty_proc = $_POST["qty_proc"];
            $qty_mobo = $_POST["qty_mobo"];
            $qty_ram = $_POST["qty_ram"];
            $qty_hdd = $_POST["qty_hdd"];
            $qty_ssd = $_POST["qty_ssd"];
            $qty_vga = $_POST["qty_vga"];
            $qty_psu = $_POST["qty_psu"];
            $qty_casing = $_POST["qty_casing"];
            $qty_monitor = $_POST["qty_monitor"];
            $qty_keyboard = $_POST["qty_keyboard"];
            $qty_mouse = $_POST["qty_mouse"];
            $qty_sound = $_POST["qty_sound"];
            $qty = array($qty_proc,$qty_mobo,$qty_ram,$qty_hdd,$qty_ssd,$qty_vga,$qty_psu,$qty_casing,$qty_monitor,$qty_keyboard,$qty_mouse,$qty_sound);
            $total_qty = array_sum($qty);

            //get harga Barang
            $proc_output = $_POST["proc_output"];
            $mobo_output = $_POST["mobo_output"];
            $ram_output = $_POST["ram_output"];
            $hdd_output = $_POST["hdd_output"];
            $ssd_output = $_POST["ssd_output"];
            $vga_output = $_POST["vga_output"];
            $psu_output = $_POST["psu_output"];
            $casing_output = $_POST["casing_output"];
            $monitor_output = $_POST["monitor_output"];
            $keyboard_output = $_POST["keyboard_output"];
            $mouse_output = $_POST["mouse_output"];
            $sound_output = $_POST["sound_output"];
            $harga = array($proc_output,$mobo_output,$ram_output,$hdd_output,$ssd_output,$vga_output,$psu_output,$casing_output,$monitor_output,$keyboard_output,$mouse_output,$sound_output);
            $total_all = array_sum($harga);

        }

       ?>
       <br>
      <table width="100%" border="0">
        <tr>
          <td rowspan="3" width="12%"><img src="img/LogoWEBV2.png" alt="" style="height:130px; width:130px;"></td>
          <td width="35%">
            <h3>VSComputer</h3>
            <i class="fas fa-map-marker-alt mr-2"></i>Bendul merisi permai Blok D no. D9 - Surabaya
          </td>
          <td><h3 style="text-align:right;">NOTA SIMULASI</h3></td>
        </tr>
        <tr>
          <td><i class="fas fa-envelope-square mr-2"></i>ravinorahman@gmail.com</td>

        </tr>
        <?php
          $tgl = $tgl=date('Y-m-d H:i:s');
         ?>
        <tr>
          <td><i class="fab fa-whatsapp mr-2"></i>08385-352-5037</td>
          <td><h6 style="text-align:right;">Tanggal Cetak : <?=$tgl ?></h6></td>
        </tr>

      </table>
      <br><br>
      <table class="table table-bordered" align="center">
        <thead>
          <tr>
            <th scope="col" width="5%">No.</th>
            <th scope="col">Nama Barang</th>
            <th scope="col" width="18%">Harga (Rp.)</th>
            <th scope="col" width="7%" class="text-center">Jumlah</th>
            <th scope="col" width="20%">Subtotal (Rp.)</th>
          </tr>
        </thead>
          <tbody>
            <?php
              for ($i=0; $i <count($barang) ; $i++) {

             ?>

                <tr>
                  <td align="center"><?=$i+1; ?></td>
                  <td><?=$barang[$i]; ?></td>
                  <td >Rp. <?=number_format($harga_part[$i]); ?></td>
                  <td align="center"><?=$qty[$i]; ?></td>
                  <td>Rp. <?=number_format($harga[$i]); ?></td>
                </tr>

            <?php

              }
             ?>

          </tbody>
          <tfoot>
            <tr>
              <td colspan="3"><h4 style="text-align:right;">Grand Total : </h4></td>
              <td align="center"><h4><?=$total_qty; ?></h4></td>
              <td><h4>Rp. <?=number_format($total_all); ?></h4></td>
            </tr>
          </tfoot>
      </table>
      <h5>Catatan : </h5><p>Nota segera dibawa ke toko atau hubungi admin untuk order sebelum stok barang habis!!</p>
      <button type="button" style="margin-left: 45%;" class="btn btn-primary" onclick="window.print();">Cetak</button>

    </div>

    <script type="text/javascript">
    	//window.print();
    </script>
  </body>
</html>
