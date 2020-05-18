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
        <td><a href="penjualan.php?add=<?= $tampil["ID_BARANG"]; ?>"><button class="btn btn-primary" type="submit" id="add"><i class="fas fa-plus"></i></button></a></td>
      </tr>



<?php endforeach;  ?>
