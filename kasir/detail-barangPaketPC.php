<?php include'../function/function.php';

  if (isset($_GET["keyword"])) {
      $keyword = $_GET["keyword"];
      $tampil_barang = caribarang($_GET["keyword"]);

  }
  else {
      $tampil_barang = tampil_data("SELECT * FROM master_barang INNER JOIN kategori ON master_barang.ID_KATEGORI=kategori.ID_KATEGORI ORDER BY KATEGORI ASC");
  }

    foreach ($tampil_barang as $tampil) :?>
      <tr>
        <td><?= $tampil["ID_BARANG"]; ?></td>
        <td><?= $tampil["NAMA_BARANG"]; ?></td>
        <td align="center"><?= $tampil["KATEGORI"]; ?></td>
        <td align="center"><?= $tampil["STOK"]; ?></td>

      </tr>



<?php endforeach;  ?>
