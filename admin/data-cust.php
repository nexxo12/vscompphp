<?php
include'../function/function.php';
?>
<?php $data_cust = tampil_data("SELECT *  FROM pelanggan");  ?>
<?php foreach ($data_cust as $cust) : ?>
      <tr>
      <td><?= $cust["ID_PELANGGAN"]; ?></td>
      <td><?= $cust["NAMA"]; ?></td>
      <td><?= $cust["ALAMAT"]; ?></td>
      <td><?= $cust["HP"]; ?></td>
      <td>
        <a class="update" href="update-cust.php?id=<?= $cust["ID_PELANGGAN"]; ?>" ><button class="btn btn-warning" type="button" name="edit"><i class="fas fa-edit"></i></button>
        <a class="hapus" href="delete-cust.php?id=<?= $cust["ID_PELANGGAN"]; ?>" ><button class="btn btn-danger" type="button" name="delete"><i class="fas fa-trash"></i></button>
      </td>
      </tr>

<?php endforeach;
 ?>
