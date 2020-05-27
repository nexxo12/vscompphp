<div class="footer-bawah">
  <div class="container-fluid">
  <div class="row">
      <div class="col-md-5 text-white mr-5">
          <table class="footer-table" border="0" cellpadding="7" width="100%">
            <tr>
              <td><img class="content-footer" src="img/msi.png" alt="MSI"></img></td>
              <td><img class="content-footer" src="img/gigabyte.png" alt="Power Supply"></img></td>
              <td><img class="content-footer" src="img/intel.png" alt="Power Supply"></img></td>
              <td><img class="content-footer" src="img/thermaltahke.png" alt="thermaltahke"></img></td>
              <td><img class="content-footer" src="img/klevv.png" alt="Power Supply"></img></td>
            </tr>
            <tr>
              <td><img class="content-footer" src="img/amd.png" alt="MSI"></img></td>
              <td><img class="content-footer" src="img/asrock.png" alt="Power Supply"></img></td>
              <td><img class="content-footer" src="img/colorful.png" alt="Power Supply"></img></td>
              <td><img class="content-footer" src="img/galax_logo.png" alt="thermaltahke"></img></td>
              <td><img class="content-footer" src="img/gskill.png" alt="Power Supply"></img></td>
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
               <li><a href="support/faq.php" class="footer-link">FAQ</a></li>
               <li><a href="support/contact.php" class="footer-link">Contact</a></li>
               <li><a href="support/warranty.php" class="footer-link">Warranty</a></li>
               <li><a href="admin/login.php" class="footer-link">Login</a></li>

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

<script type="text/javascript">
    $(document).ready(function(){
        $('#proc').change(function(){
            var proc = $(this).val();
            $('#qty_proc').on('keyup',function(){
              var qty = parseInt($(this).val());
              $.ajax({
                type : 'POST',
                url : 'function/data-simulasi.php',
                data : 'id='+proc,
                success: function(data){
                  var harga = parseInt(data);
                  totalproc = harga*qty;
                  $('#proc_output').val(totalproc);
                  $('#total_all').val(totalproc);


                }
              });

            })

        })
        $('#mobo').change(function(){
            var mobo = $(this).val();
            $('#qty_mobo').on('keyup',function(){
              var qty = parseInt($(this).val());
              $.ajax({
                type : 'POST',
                url : 'function/data-simulasi.php',
                data : 'id='+mobo,
                success: function(data){
                  var harga = parseInt(data);
                  totalmb = harga*qty;
                  var total2 = totalproc + totalmb;
                  $('#mobo_output').val(totalmb);
                  $('#total_all').val(total2);

                }
              });

            })

        })
        $('#ram').change(function(){
            var ram = $(this).val();
            $('#qty_ram').on('keyup',function(){
              var qty = parseInt($(this).val());
              $.ajax({
                type : 'POST',
                url : 'function/data-simulasi.php',
                data : 'id='+ram,
                success: function(data){
                  var harga = parseInt(data);
                  totalram = harga*qty;
                  var total3 = totalproc + totalmb + totalram;
                  $('#ram_output').val(totalram);
                  $('#total_all').val(total3);

                }
              });

            })

        })
        $('#hdd').change(function(){
            var hdd = $(this).val();
            $('#qty_hdd').on('keyup',function(){
              var qty = parseInt($(this).val());
              $.ajax({
                type : 'POST',
                url : 'function/data-simulasi.php',
                data : 'id='+hdd,
                success: function(data){
                  var harga = parseInt(data);
                  totalhdd = harga*qty;
                  var total4 = totalproc + totalmb + totalram + totalhdd;
                  $('#hdd_output').val(totalhdd);
                  $('#total_all').val(total4);



                }
              });

            })

        })
        $('#ssd').change(function(){
            var ssd = $(this).val();
            $('#qty_ssd').on('keyup',function(){
              var qty = parseInt($(this).val());
              $.ajax({
                type : 'POST',
                url : 'function/data-simulasi.php',
                data : 'id='+ssd,
                success: function(data){
                  var harga = parseInt(data);
                  totalssd = harga*qty;
                  var total5 = totalproc + totalmb + totalram + totalhdd + totalssd;
                  $('#ssd_output').val(totalssd);
                  $('#total_all').val(total5);
                }
              });

            })

        })
        $('#vga').change(function(){
            var vga = $(this).val();
            $('#qty_vga').on('keyup',function(){
              var qty = parseInt($(this).val());
              $.ajax({
                type : 'POST',
                url : 'function/data-simulasi.php',
                data : 'id='+vga,
                success: function(data){
                  var harga = parseInt(data);
                  totalvga = harga*qty;
                  var total6 = totalproc + totalmb + totalram + totalhdd + totalssd + totalvga;
                  $('#vga_output').val(totalvga);
                  $('#total_all').val(total6);
                }
              });

            })

        })
        $('#psu').change(function(){
            var psu = $(this).val();
            $('#qty_psu').on('keyup',function(){
              var qty = parseInt($(this).val());
              $.ajax({
                type : 'POST',
                url : 'function/data-simulasi.php',
                data : 'id='+psu,
                success: function(data){
                  var harga = parseInt(data);
                  totalpsu = harga*qty;
                  var total7 = totalproc + totalmb + totalram + totalhdd + totalssd + totalvga + totalpsu;
                  $('#psu_output').val(totalpsu);
                  $('#total_all').val(total7);

                }
              });

            })

        })
        $('#casing').change(function(){
            var casing = $(this).val();
            $('#qty_casing').on('keyup',function(){
              var qty = parseInt($(this).val());
              $.ajax({
                type : 'POST',
                url : 'function/data-simulasi.php',
                data : 'id='+casing,
                success: function(data){
                  var harga = parseInt(data);
                  totalcasing = harga*qty;
                  var total8 = totalproc + totalmb + totalram + totalhdd + totalssd + totalvga + totalpsu + totalcasing;
                  $('#casing_output').val(totalcasing);
                  $('#total_all').val(total8);

                }
              });

            })

        })
        $('#monitor').change(function(){
            var monitor = $(this).val();
            $('#qty_monitor').on('keyup',function(){
              var qty = parseInt($(this).val());
              $.ajax({
                type : 'POST',
                url : 'function/data-simulasi.php',
                data : 'id='+monitor,
                success: function(data){
                  var harga = parseInt(data);
                  totalmonitor = harga*qty;
                  var total9 = totalproc + totalmb + totalram + totalhdd + totalssd + totalvga + totalpsu + totalcasing + totalmonitor;
                  $('#monitor_output').val(totalmonitor);
                  $('#total_all').val(total9);

                }
              });

            })

        })
        $('#keyboard').change(function(){
            var keyboard = $(this).val();
            $('#qty_keyboard').on('keyup',function(){
              var qty = parseInt($(this).val());
              $.ajax({
                type : 'POST',
                url : 'function/data-simulasi.php',
                data : 'id='+keyboard,
                success: function(data){
                  var harga = parseInt(data);
                  totalkeyb = harga*qty;
                  var total10 = totalproc + totalmb + totalram + totalhdd + totalssd + totalvga + totalpsu + totalcasing + totalmonitor + totalkeyb;
                  $('keyboard_output').val(totalkeyb);
                  $('#total_all').val(total10);

                }
              });

            })

        })
        $('#mouse').change(function(){
            var mouse = $(this).val();
            $('#qty_mouse').on('keyup',function(){
              var qty = parseInt($(this).val());
              $.ajax({
                type : 'POST',
                url : 'function/data-simulasi.php',
                data : 'id='+mouse,
                success: function(data){
                  var harga = parseInt(data);
                  totalmouse = harga*qty;
                  var total11 = totalproc + totalmb + totalram + totalhdd + totalssd + totalvga + totalpsu + totalcasing + totalmonitor + totalkeyb + totalmouse;
                  $('#mouse_output').val(totalmouse);
                  $('#total_all').val(total11);
                }
              });

            })

        })
        $('#sound').change(function(){
            var sound = $(this).val();
            $('#qty_sound').on('keyup',function(){
              var qty = parseInt($(this).val());
              $.ajax({
                type : 'POST',
                url : 'function/data-simulasi.php',
                data : 'id='+sound,
                success: function(data){
                  var harga = parseInt(data);
                  totalsound = harga*qty;
                  var total12 = totalproc + totalmb + totalram + totalhdd + totalssd + totalvga + totalpsu + totalcasing + totalmonitor + totalkeyb + totalmouse + totalsound;
                  $('#sound_output').val(totalsound);
                  $('#total_all').val(total12);
                }
              });

            })

        })
        totalproc = 0;
        totalmb = 0;
        totalram = 0;
        totalhdd = 0;
        totalssd = 0;
        totalvga = 0;
        totalpsu = 0;
        totalcasing = 0;
        totalmonitor = 0;
        totalkeyb = 0;
        totalmouse = 0;
        totalsound = 0;

    });


</script>

<script type="text/javascript">
  $(document).ready(function(){

    $('#qty_proc').on('keyup',function(){
      proc = parseInt($(this).val());
      $('#qty_total').val(proc);

          $('#qty_mobo').on('keyup',function(){
            mobo = parseInt($(this).val());
            total1 = proc + mobo;
            $('#qty_total').val(total1);

              $('#qty_ram').on('keyup',function(){
                ram = parseInt($(this).val());
                total2 = proc + mobo + ram;
                $('#qty_total').val(total2);

                  $('#qty_hdd').on('keyup',function(){
                    hdd = parseInt($(this).val());
                    total3 = proc + mobo + ram + hdd;
                    $('#qty_total').val(total3);

                    $('#qty_ssd').on('keyup',function(){
                      ssd = parseInt($(this).val());
                      total4 = proc + mobo + ram + hdd + ssd;
                      $('#qty_total').val(total4);

                      $('#qty_vga').on('keyup',function(){
                        vga = parseInt($(this).val());
                        total5 = proc + mobo + ram + hdd + ssd + vga;
                        $('#qty_total').val(total5);

                        $('#qty_psu').on('keyup',function(){
                          psu = parseInt($(this).val());
                          total6 = proc + mobo + ram + hdd + ssd + vga + psu;
                          $('#qty_total').val(total6);

                          $('#qty_casing').on('keyup',function(){
                            casing = parseInt($(this).val());
                            total7 = proc + mobo + ram + hdd + ssd + vga + psu + casing;
                            $('#qty_total').val(total7);

                            $('#qty_monitor').on('keyup',function(){
                              monitor = parseInt($(this).val());
                              total8 = proc + mobo + ram + hdd + ssd + vga + psu + casing + monitor;
                              $('#qty_total').val(total8);

                              $('#qty_keyboard').on('keyup',function(){
                                keyboard = parseInt($(this).val());
                                total9 = proc + mobo + ram + hdd + ssd + vga + psu + casing + monitor + keyboard;
                                $('#qty_total').val(total9);

                                $('#qty_mouse').on('keyup',function(){
                                  mouse = parseInt($(this).val());
                                  total10 = proc + mobo + ram + hdd + ssd + vga + psu + casing + monitor + keyboard + mouse;
                                  $('#qty_total').val(total10);

                                  $('#qty_sound').on('keyup',function(){
                                    sound = parseInt($(this).val());
                                    total11 = proc + mobo + ram + hdd + ssd + vga + psu + casing + monitor + keyboard + mouse + sound;
                                    $('#qty_total').val(total11);

                                  })
                                })
                              })
                            })
                          })
                        })
                      })
                    })
                  })
              })

          })

    })

  })
</script>


</body>
</html>
