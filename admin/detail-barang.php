<?php include'../function/function.php';
  if (isset($_GET["keyword"])) {
      $keyword = $_GET["keyword"];
      $tampil_barang = caribarang($_GET["keyword"]);

  }
  else {
      $tampil_barang = tampil_data("SELECT * FROM master_barang");
  }

    foreach ($tampil_barang as $tampil) :?>
      <tr>
        <td><?= $tampil["ID_BARANG"]; ?></td>
        <td><?= $tampil["NAMA_BARANG"]; ?></td>
        <td align="center"><?= $tampil["STOK"]; ?></td>
        <?php
          if ($tampil["STOK"]==0) {
        ?>
          <td><button class="btn btn-primary" type="button" id="add" value="" disabled><i class="fas fa-plus"></i></button></a></td>
        <?php
          }
          elseif ($tampil["STOK"]!=0) {
         ?>
          <td><a href="penjualan.php?add=<?= $tampil["ID_BARANG"]; ?>"><button class="btn btn-primary" type="submit" id="add" value=""><i class="fas fa-plus"></i></button></a></td>
         <?php
          }
         ?>




      </tr>



<?php endforeach;  ?>
<script type="text/javascript">


</script>
