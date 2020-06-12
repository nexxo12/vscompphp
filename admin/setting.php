<?php include'header.php';

?>

<div class="container-fluid custom-setprofile">

      <br>
      <form class="" action="" method="post">
      <div class="card">
        <h5 class="card-header">Setting Profile</h5>
      <div class="card-body">
        <?php
          $getID_Log = tampil_data("SELECT * FROM login WHERE USERNAME = '$user'");
          foreach ($getID_Log as $idLog) {
            $id = $idLog["ID_LOGIN"];
          }
          $setting = tampil_data("SELECT * FROM login WHERE ID_LOGIN = '$id'")[0];
         ?>
        <table class="table-group" id="form" cellpadding="4" align="center">
          <tr>
            <div class="form-group">
            <td><input class="form-control" type="hidden" name="id_login" value="<?=$setting["ID_LOGIN"]; ?>" readonly></td>
            </div>
          </tr>
          <tr>
            <div class="form-group">
            <td>
              <label>Nama</label>
            </td>
            <td> : </td>
            <td><input class="form-control" type="text" name="nama" value="<?=$setting["NAMA"]; ?>" autocomplete="off"></td>
            </div>
          </tr>
          <tr>
            <div class="form-group">
            <td>
              <label style="position:absolute; top:22%;">Alamat</label>
            </td>
            <td><label style="position:absolute; top:22%;"> : </label></td>
            <td><textarea name="alamat" rows="8" cols="40"><?=$setting["ALAMAT"]; ?></textarea>
            </div>
          </tr>
          <tr>
            <div class="form-group">
            <td>
              <label>Username</label>
            </td>
            <td> : </td>
            <td><input class="form-control" type="text" name="username" value="<?=$setting["USERNAME"]; ?>" autocomplete="off"></td>
            </div>
          </tr>
          <tr>
            <div class="form-group">
            <td>
              <label>Password</label>
            </td>
            <td> : </td>
            <td><input class="form-control" type="password" name="password" value="" autocomplete="off" required></td>
            </div>
          </tr>
          <tr>
            <div class="form-group">
            <td>
              <label>Level</label>
            </td>
            <td> : </td>
            <td><input class="form-control" type="text" name="" value="<?=$setting["LEVEL"]; ?>" autocomplete="off" readonly></td>
            </div>
          </tr>
          <tr>
            <div class="form-group">
            <td>
              <label>Ubah akses</label>
            </td>
            <td> : </td>
            <td>

              <div class="form-group mt-2">
                <select class="form-control" name="level" required>
                  <?php
                    if ($setting["LEVEL"] =="super") {
                  ?>
                    <option value="super" selected>Super Admin</option>
                    <option value="kasir">Kasir</option>
                  <?php
                    }
                   ?>
                   <?php
                    if ($setting["LEVEL"] =="kasir") {
                    ?>
                    <option value="kasir" selected>Kasir</option>
                    <option value="super">Super Admin</option>
                    <?php
                    }
                    ?>

                </select>
              </div>

            </td>
            </div>
          </tr>
        </table>
          <button class="btn btn-submit btn-success" id="save" type="submit" name="update"><i class="fas fa-save mr-2"></i>Update</button><br><br>

      </div>
      </div>
      </form>
      <!-- php untuk kondisi tombol save ditekan -->
       <?php
       if (isset($_POST["update"])) {
         if (editprofile($_POST) > 0) {
           echo "<script language=\"javascript\">
           swal({
                 title: \"Berhasil!\",
                 text: \"Data barang berhasil diubah!\",
                 icon: \"success\",
                 button: \"OK\",
               }).then((oke) => {
                 document.location.href = 'setting.php';
                 });;

           </script>";

         }

         else {
           echo "
               <script>
               alert('Data Gagal Diupdate!!');
               </script>
           ";
         }
       }
        ?>



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
