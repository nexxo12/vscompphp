<?php include'header.php';

?>

<div class="container-fluid custom-container">

      <br>
      <form class="" action="" method="post">
      <div class="card">
        <h5 class="card-header">List Akun</h5>
      <div class="card-body">

        <table class="table table-bordered ">
          <thead class="thead-dark text-center">
            <tr>
              <th scope="col" width="1%">ID.</th>
              <th scope="col" width="10%">Nama</th>
              <th scope="col" width="10%">Alamat</th>
              <th scope="col" width="5%">Username</th>
              <th scope="col" width="2%">Password</th>
              <th scope="col" width="2.5%">Level</th>
              <th scope="col" width="5%">Aksi</th>
            </tr>
          </thead>
          <?php
            $no=1;
            $data_user = tampil_data("SELECT * FROM login");
            foreach ($data_user as $user) :?>
            <tbody>
              <tr>
                <?php
                  if ($_SESSION['username'] == $user["USERNAME"]) {
                 ?>
                 <td align="center" name="no" class="bg-light"><?= $user["ID_LOGIN"]; ?></td>
                 <td align="center" name="supp" class="bg-light"><?= $user["NAMA"]; ?> (Currently)</td>
                 <td name="nama" class="bg-light"><?= $user["ALAMAT"]; ?></td>
                 <td align="center" name="alamat" class="bg-light"><?= $user["USERNAME"]; ?></td>
                 <td align="center" name="nohp" class="bg-light"><?= $user["PASSWORD"]; ?></td>
                 <td align="center" name="nohp" class="bg-light"><?= $user["LEVEL"]; ?></td>
                 <td class="bg-light">
                     <a href="setting.php" ><button class="btn btn-warning" type="button" name="edit"><i class="fas fa-edit"></i></button>
                     <a href="delete-akun.php?id=<?=$user["ID_LOGIN"]; ?>" onclick="return confirm('Apakah anda yakin ?');"><button class="btn btn-danger" type="button" name="delete"><i class="fas fa-trash"></i></button></a>
                 </td>
                 <?php
                  }
                  else {
                    ?>
                    <td align="center" name="no"><?= $user["ID_LOGIN"]; ?></td>
                    <td align="center" name="supp"><?= $user["NAMA"]; ?></td>
                    <td name="nama"><?= $user["ALAMAT"]; ?></td>
                    <td align="center" name="alamat"><?= $user["USERNAME"]; ?></td>
                    <td align="center" name="nohp"><?= $user["PASSWORD"]; ?></td>
                    <td align="center" name="nohp"><?= $user["LEVEL"]; ?></td>
                    <td>
                        <a href="edit-akun.php?id=<?=$user["ID_LOGIN"]; ?>" ><button class="btn btn-warning" type="button" name="edit"><i class="fas fa-edit"></i></button>
                        <a href="delete-akun.php?id=<?=$user["ID_LOGIN"]; ?>" onclick="return confirm('Apakah anda yakin ?');"><button class="btn btn-danger" type="button" name="delete"><i class="fas fa-trash"></i></button></a>
                    </td>
                    <?php
                  }
                 ?>
              </tr>
            </tbody>

           <?php
            $no++;
            endforeach;
           ?>

        </table>

      </div>
      </div>
      </form>
      <!-- php untuk kondisi tombol save ditekan -->

</div> <!-- end container -->

<br><br><br><br><br>

<script type="text/javascript">
$(document).ready(function(){
    $('#keyword').on('keyup', function(){
      $('#isi-barang').load('detail-barangPemb.php?keyword=' + $('#keyword').val())
    })
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#tabel-data').DataTable();
});
</script>

</body>
</html>
