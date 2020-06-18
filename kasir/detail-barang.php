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
          <td><button class="btn btn-primary" type="submit" id="add" name="tambah" value="<?= $tampil["ID_BARANG"]; ?>"><i class="fas fa-plus"></i></button></a></td>
         <?php
          }
         ?>




      </tr>



<?php endforeach;  ?>
<script type="text/javascript">
$(document).ready(function(){
  $('button[name=tambah]').click(function(e){
    e.preventDefault();
    var kd_brg = $(this).val();
    $('#myModal').modal('hide')
    $.ajax({ //menjalankan ajax dg jquery
        type:'GET', //menentukan post / get, (this) = form
        url: 'ajax_kodebrg.php', //url untuk action pada link
        data: 'add='+kd_brg,
        success:function(kdbarang){ //jika sukses
          $('input[name=id_barang]').val(kdbarang);
        }

    })
    $.ajax({ //menjalankan ajax dg jquery
        type:'GET', //menentukan post / get, (this) = form
        url: 'ajax_namabrg.php', //url untuk action pada link
        data: 'add='+kd_brg,
        success:function(namabarang){ //jika sukses
          $('input[name=nama_barang]').val(namabarang);
        }

    })
    $.ajax({ //menjalankan ajax dg jquery
        type:'GET', //menentukan post / get, (this) = form
        url: 'ajax_hargaawal.php', //url untuk action pada link
        data: 'add='+kd_brg,
        success:function(hargaawal){ //jika sukses
          $('input[name=harga_awal]').val(hargaawal);
        }

    })
    $.ajax({ //menjalankan ajax dg jquery
        type:'GET', //menentukan post / get, (this) = form
        url: 'ajax_hargaawalNF.php', //url untuk action pada link
        data: 'add='+kd_brg,
        success:function(hargaawalNF){ //jika sukses
          $('input[name=harga_awal2]').val(hargaawalNF);
        }

    })
    $.ajax({ //menjalankan ajax dg jquery
        type:'GET', //menentukan post / get, (this) = form
        url: 'ajax_hargajual.php', //url untuk action pada link
        data: 'add='+kd_brg,
        success:function(hargajual){ //jika sukses
          $('input[name=harga_jual]').val(hargajual);
        }

    })
    $.ajax({ //menjalankan ajax dg jquery
        type:'GET', //menentukan post / get, (this) = form
        url: 'ajax_idbrg.php', //url untuk action pada link
        success:function(id_brg){ //jika sukses
          $('input[name=id_pjforinv]').val(id_brg);
        }

    })
  })

})

</script>
