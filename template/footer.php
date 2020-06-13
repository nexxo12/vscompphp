<div class="footer-bawah">
  <div class="container-fluid">
  <div class="row">
      <div class="col-md-5 text-white mr-5">
          <table class="footer-table" border="0" cellpadding="7" width="100%">
            <tr>
              <td><img class="content-footer" src="../img/msi.png" alt="MSI"></img></td>
              <td><img class="content-footer" src="../img/gigabyte.png" alt="Power Supply"></img></td>
              <td><img class="content-footer" src="../img/intel.png" alt="Power Supply"></img></td>
              <td><img class="content-footer" src="../img/thermaltahke.png" alt="thermaltahke"></img></td>
              <td><img class="content-footer" src="../img/klevv.png" alt="Power Supply"></img></td>
            </tr>
            <tr>
              <td><img class="content-footer" src="../img/amd.png" alt="MSI"></img></td>
              <td><img class="content-footer" src="../img/asrock.png" alt="Power Supply"></img></td>
              <td><img class="content-footer" src="../img/colorful.png" alt="Power Supply"></img></td>
              <td><img class="content-footer" src="../img/galax_logo.png" alt="thermaltahke"></img></td>
              <td><img class="content-footer" src="../img/gskill.png" alt="Power Supply"></img></td>
            </tr>
          </table>
      </div>
      <div class="space-footer">

      </div>
      <div class="col-md-2 text-white mt-5 pl-5">
          <div class="footer-item-position">
          <h5 class="ml-5">Support</h5>
          <div class="dropdown-divider ml-5"></div>
          <ul class="list-unstyled ml-5">
               <li><a href="../support/faq.php" class="footer-link">FAQ</a></li>
               <li><a href="../support/contact.php" class="footer-link">Contact</a></li>
               <li><a href="../support/warranty.php" class="footer-link">Warranty</a></li>
               <li><a href="../support/login.php" class="footer-link">Login</a></li>

        </ul>
        </div>
      </div>
      <div class="col-md-2 text-white mt-5 pl-5">
        <div class="footer-item-position">
        <h5 class="ml-5">Social Media</h5>
        <div class="dropdown-divider ml-5"></div>
        <ul class="list-unstyled ml-5">
             <li>
               <span style="font-size: 20px; color: Dodgerblue;">
               <i class="fab fa-facebook-square"></i>
               </span>
               <a href="#" class="footer-link ml-1">Ravino Rahman</a></li>

             <li>
               <span style="font-size: 20px; color: Dodgerblue;">
               <i class="fab fa-twitter"></i>
               </span>
               <a href="#" class="footer-link ml-1">@VinoriousID</a></li>
             <li>
               <span style="font-size: 20px; color: red;">
               <i class="fab fa-youtube"></i>
               </span>
               <a href="#" class="footer-link ml-1">VinoriousID</a></li>

      </ul>
      </div>
      </div>
  </div>
  <br>
  <div class="dropdown-divider"></div>
  <div class="col-md-12 text-white mt-3">
      <center><p>Copyright © 2020 VSComp - All Rights Reserved</p></center>
  </div>
</div>
</div>

<!--script animasi scroll menu nav-->
<script type="text/javascript">
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    document.getElementById("nav").style.padding = "13px 10px";
    document.getElementById("logo").style.fontSize = "15px";
  } else {
    document.getElementById("nav").style.padding = "20px 10px";
    document.getElementById("logo").style.fontSize = "95px";
  }
}
</script>

<script>
   $(document).ready(function(){
       $('#tabel-data').DataTable();
   });
</script>

<!-- ajax mengambil data provinsi -->
<script type="text/javascript">
$(document).ready(function(){
  $.ajax({
    type : 'POST',
    url : 'ongkir_api/provinsi.php',
    success: function(data_provinsi){
      $("select[name=provinsi]").html(data_provinsi);
    }
  });

  $("select[name=provinsi]").on("change",function(){
    var idProvPilih = $("option:selected",this).attr("id_prov")
    $.ajax({
      type : 'POST',
      url : 'ongkir_api/kota-kab.php',
      data: 'idProvinsi='+idProvPilih,
      success: function(data_kotaKab){
        $("select[name=kotakab]").html(data_kotaKab);
      }
    });
  });

  $.ajax({
    type : 'POST',
    url : 'ongkir_api/kurir.php',
    success: function(data_kurir){
      $("select[name=ekpedisi]").html(data_kurir);
    }
  });

  $("select[name=ekpedisi]").on("change",function(){
    var kurir = $(this).val();
    var tujuan = $("option:selected","select[name=kotakab]").val();
    var berat = $("#berat").val();
    $.ajax({
      type : 'POST',
      url : 'ongkir_api/ekpedisi.php',
      data: 'idkurir='+kurir+'&idtujuan='+tujuan+'&berat='+berat,
      success: function(data_ongkir){
        $("#result-ekpedisi").html(data_ongkir);

      }
    });

  })

})

</script>

<script>
  CKEDITOR.replace( 'texteditor' );
</script>


</body>
</html>
