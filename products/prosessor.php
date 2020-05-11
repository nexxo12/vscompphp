<?php include'template/header.php';
      include'function/function.php';
?>

<h4 align="center">Prosessor Stock</h4>
<div class="container">
  <hr noshade></hr>
  <table class="table table-borderless">
    <thead>
      <tr>
        <th scope="col" width="0">ID</th>
        <th scope="col">Nama</th>
        <th scope="col" width="0">Jumlah</th>
        <th scope="col" width="0">Satuan</th>
        <th scope="col">Harga</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      //menjalankan function di function.php
      $data_proc = tampil_data("SELECT * FROM master_barang WHERE ID_BARANG LIKE '%PR%'");
      //var_dump($data_proc);
      ?>
      <!--memasukan data ke table  -->
      <?php foreach ($data_proc as $proc) :?>
      <tr>
        <!-- memilah data -->
        <td><?= $proc["ID_BARANG"]; ?></td>
        <td><?= $proc["NAMA_BARANG"]; ?></td>
        <td><?= $proc["STOK"]; ?></td>
        <td><?= $proc["SATUAN"]; ?></td>
        <td>Rp. <?= $proc["HARGA_JUAL"]; ?></td>
        <td><?= $proc["STATUS"]; ?></td>
      </tr>
    <?php endforeach; ?>

    </tbody>
  </table>
</div> <!-- end container -->

<br><br><br><br><br><br><br><br><br>

<?php include'template/footer.php'; ?>
