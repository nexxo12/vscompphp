<?php
include'../function/function.php';
?>
<?php
$no=1;
$tampil_pj = tampil_data("SELECT * FROM list_penjualan INNER JOIN master_barang ON list_penjualan.ID_BARANG=master_barang.ID_BARANG");  ?>
<?php foreach ($tampil_pj as $list_pj) : ?>

  <tr>
    <td><?=$no; ?></td>
    <td><?=$list_pj["NAMA_BARANG"]; ?></td>
    <td><?=number_format($list_pj["HARGA_JL"]); ?></td>
    <td align="center"><?=$list_pj["JUMLAH_BELI"]; ?></td>
    <td><?=number_format($list_pj["TOTAL_HARGA"]); ?></td>
    <td> <a class="hapus" href="del-cart.php?id=<?=$list_pj["ID_PENJUALAN"]; ?>"><button class="btn btn-danger" type="submit" name="delete" value=""><i class="fas fa-trash"></i></button></a></td>
  </tr>

<?php
$no++;
endforeach;
 ?>
