<?php include'header.php';

?>

<div class="container-fluid custom-setprofile">

      <br>
      <form class="" action="" method="post">
      <div class="card">
        <h5 class="card-header">Tambah Akun</h5>
      <div class="card-body">
        <a href="list-akun.php"><p style="position:absolute; left:83%; top:2%;">List Akun &raquo</p></a>
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
              <?php
                $id_login = autonumber_user("ID_LOGIN");
               ?>
            <td><input class="form-control" type="hidden" name="id_login" value="<?=$id_login ?>" readonly></td>
            </div>
          </tr>
          <tr>
            <div class="form-group">
            <td>
              <label>Nama</label>
            </td>
            <td> : </td>
            <td><input class="form-control" type="text" name="nama" value="" autocomplete="off"></td>
            </div>
          </tr>
          <tr>
            <div class="form-group">
            <td>
              <label style="position:absolute; top:22%;">Alamat</label>
            </td>
            <td><label style="position:absolute; top:22%;"> : </label></td>
            <td><textarea name="alamat" rows="8" cols="40"></textarea>
            </div>
          </tr>
          <tr>
            <div class="form-group">
            <td>
              <label>Username</label>
            </td>
            <td> : </td>
            <td><input class="form-control" type="text" name="username" value="" autocomplete="off"></td>
            </div>
          </tr>
          <tr>
            <div class="form-group">
            <td>
              <label>Password</label>
            </td>
            <td> : </td>
            <td><input class="form-control" type="password" name="password" value="" autocomplete="off"></td>
            </div>
          </tr>
          <tr>
            <div class="form-group">
            <td>
              <label>Akses</label>
            </td>
            <td> : </td>
            <td>

              <div class="form-group mt-2">
                <select class="form-control" name="level" required>
                    <option value="super" selected>Super Admin</option>
                    <option value="kasir" selected>Kasir</option>
                </select>
              </div>

            </td>
            </div>
          </tr>
        </table>
          <button class="btn btn-submit btn-success" id="save" type="submit" name="save"><i class="fas fa-save mr-2"></i>Simpan</button><br><br>

      </div>
      </div>
      </form>
      <!-- php untuk kondisi tombol save ditekan -->
       <?php
       if (isset($_POST["save"])) {
         if (tambahdata_user($_POST) > 0) {
           echo "<script language=\"javascript\">
           swal({
                 title: \"Berhasil!\",
                 text: \"Data berhasil disimpan!\",
                 icon: \"success\",
                 button: \"OK\",
               }).then((oke) => {
                 document.location.href = 'tambah-akun.php';
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
