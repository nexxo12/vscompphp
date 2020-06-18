
<?php
//untuk konek database
  date_default_timezone_set('Asia/Jakarta');
 $conn= mysqli_connect ("localhost","root","","coba_penjualan");
 if($conn){
   echo "";
 }
 else {
   echo "<script>alert('Gagal konek database')</script>";
 }
//end koneksi

//function ambil perintah sql dari variabel query
function tampil_data($query){
  //menjadikan @conn variabel global
  global $conn;
  //variabel hasil yang menyimpan data dari db
  $hasil = mysqli_query ($conn,$query);
  //menyediakan array
  $array = [];
  //mengambil semua data di db lalu di looping
  while($data = mysqli_fetch_assoc($hasil)){
    $array[] = $data;

  }
  return $array;
}

function tampil_data_count($query){
  //menjadikan @conn variabel global
  global $conn;
  //variabel hasil yang menyimpan data dari db
  $hasil = mysqli_query ($conn,$query);
  //menyediakan array
  $array = [];
  //mengambil semua data di db lalu di looping
  while($data = mysqli_fetch_array($hasil)){
    $array[] = $data;

  }
  return $array;
}

function autonumber_db($id){
  global $conn;
  $query = "SELECT MAX($id) AS kode FROM master_barang";
  $hasil = mysqli_query ($conn,$query);
  $data = mysqli_fetch_assoc($hasil);
  $kode = $data["kode"]; //mengambil data 'kode'
  $short_id = substr ($kode, 2, 3); //data id dibagi 2 angka depan 3 angka setelahnya (BR000)
  $tambah_id = $short_id+1; // data di increment
  //kondisi jika jumlah angka 1, misal 1,2,3,4,dst
  if (strlen($tambah_id)==1) {
      $format = "BR00".$tambah_id;
  }
  //kondisi jika jumlah angka 2, misal = 12,20,22,dst
  elseif (strlen($tambah_id)==2) {
      $format = "BR0".$tambah_id;
  }
  else {
      $format = "BR".$tambah_id;
  }
  return $format;
}

function autonumber_beli($id){
  global $conn;
  $query = "SELECT MAX($id) AS kode FROM pembelian_barang";
  $hasil = mysqli_query ($conn,$query);
  $data = mysqli_fetch_assoc($hasil);
  $kode = $data["kode"]; //mengambil data 'kode'
  $short_id = substr ($kode, 2, 3); //data id dibagi 2 angka depan 3 angka setelahnya (BR000)
  $tambah_id = $short_id+1; // data di increment
  //kondisi jika jumlah angka 1, misal 1,2,3,4,dst
  if (strlen($tambah_id)==1) {
      $format = "BL00".$tambah_id;
  }
  //kondisi jika jumlah angka 2, misal = 12,20,22,dst
  elseif (strlen($tambah_id)==2) {
      $format = "BL0".$tambah_id;
  }
  else {
      $format = "BL".$tambah_id;
  }
  return $format;
}

function autonumber_inv($id){
  global $conn;
  $query = "SELECT MAX($id) AS kode FROM inv_penjualan";
  $hasil = mysqli_query ($conn,$query);
  $data = mysqli_fetch_assoc($hasil);
  $kode = $data["kode"]; //mengambil data 'kode'
  $short_id = substr ($kode, 3, 5);
  $tambah_id = $short_id+1; // data di increment
  //kondisi jika jumlah angka 1, misal 1,2,3,4,dst
  if (strlen($tambah_id)==1) {
      $format = "INV0000".$tambah_id;
  }
  //kondisi jika jumlah angka 2, misal = 12,20,22,dst
  elseif (strlen($tambah_id)==2) {
      $format = "INV000".$tambah_id;
  }
  elseif (strlen($tambah_id)==3) {
      $format = "INV00".$tambah_id;
  }
  elseif (strlen($tambah_id)==4) {
      $format = "INV0".$tambah_id;
  }
  else {
      $format = "INV".$tambah_id;
  }
  return $format;
}

function autonumber_pj($id){
  global $conn;
  $query = "SELECT MAX($id) AS kode FROM penjualan";
  $hasil = mysqli_query ($conn,$query);
  $data = mysqli_fetch_array($hasil);
  $kode = $data["kode"]; //mengambil data 'kode'
  $kode++;

  return $kode;
}

function autonumber_user($id){
  global $conn;
  $query = "SELECT MAX($id) AS kode FROM login";
  $hasil = mysqli_query ($conn,$query);
  $data = mysqli_fetch_array($hasil);
  $kode = $data["kode"]; //mengambil data 'kode'
  $kode++;

  return $kode;
}

function autonumber_cust($id){
  global $conn;
  $query = "SELECT MAX($id) AS kode FROM pelanggan";
  $hasil = mysqli_query ($conn,$query);
  $data = mysqli_fetch_array($hasil);
  $kode = $data["kode"]; //mengambil data 'kode'
  $kode++;

  return $kode;
}

function autonumber_supplier($id){
  global $conn;
  $query = "SELECT MAX($id) AS kode FROM supplier";
  $hasil = mysqli_query ($conn,$query);
  $data = mysqli_fetch_assoc($hasil);
  $kode = $data["kode"]; //mengambil data 'kode'
  $tambah_id = $kode+1; // data di increment
  $tahun = date("Y");
  if (strlen($tambah_id) == 1) {
      $format = $tahun.$tambah_id;
  }
  else {
    $format = $tambah_id;
  }

  return $format;
}

function tambahdata($data){
  global $conn;
  $id_barang = $data["id_barang"];//data diterima berupa array / banyak data dengan format $POST[id_barang]
  $nama_barang = $data["nama_barang"];
  $kategori = $data["kategori"];
  $satuan = $data["satuan"];
  $harga = $data["harga"];
  $jumlah_data = count($id_barang); //menghitung jumlah data
  for ($i=0; $i < $jumlah_data; $i++) {
    $query = "INSERT INTO master_barang VALUES ('$id_barang[$i]','$kategori[$i]','$nama_barang[$i]','','$satuan[$i]','$harga[$i]','') ";
    $hasil = mysqli_query ($conn,$query);
  }
}

function tambahpaketPC($data){
  global $conn;
  $proc = $data["proc"];
  $mobo = $data["mobo"];
  $ram = $data["ram"];
  $hdd = $data["hdd"];
  $ssd = $data["ssd"];
  $vga = $data["vga"];
  $psu = $data["psu"];
  $casing = $data["casing"];
  $monitor = $data["monitor"];
  $keyb = $data["keyb"];
  $mouse = $data["mouse"];
  $speak = $data["speaker"];
  $harga = $data["hargapc"];
  $tgl = $data["tgl"];
  $query = "INSERT INTO paket_pc VALUES('','$harga','$tgl','$proc','$mobo','$ram','$hdd','$ssd','$vga','$psu','$casing','$monitor','$keyb','$mouse','$speak')";
  $hasil = mysqli_query ($conn,$query);
  return $hasil;
}

function tambahkategori($data){
  global $conn;
  $kategori = $data["kategori"];
  $query = "INSERT INTO kategori VALUES('','$kategori')";
  $hasil = mysqli_query ($conn,$query);
  return $hasil;
}

function tambahdata_supp($data){
    global $conn;
    $id_barang = $data["id_supp"];//data diterima berupa format $POST[id_supp] dari master-suppier.php
    $nama_supp = htmlspecialchars($data["nama_supp"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $hp = htmlspecialchars($data["hp"]);
    $query = "INSERT INTO supplier VALUES ('$id_barang','$nama_supp','$alamat','$hp') ";
    $hasil = mysqli_query ($conn,$query);
    return $hasil;
  }


  function upload_gambar(){
    //menganmbil isi array dari $_FILES
    $namaFile = $_FILES["gambar"]["name"]; //nama file
    $sizeFile = $_FILES["gambar"]["size"]; //ukuran file
    $errFile = $_FILES["gambar"]["error"]; //error file, jika yg diupload bukan gambar
    $tmpFile = $_FILES["gambar"]["tmp_name"]; //tempat penyimpana gambar

    //cek gambar diupload / tidak
    if ($errFile == 4) {
      echo "<script language=\"javascript\">
      swal({
            title: \"Warning!\",
            text: \"Gambar wajib diupload..!\",
            icon: \"warning\",
            button: \"OK\",
          });

      </script>";
      return false;
    }

    //cek tipe file yang diupload
    $TYPEektensionFile = ['jpg', 'jpeg', 'bmp', 'png', 'svg', 'gif'];
    $GETektensionFile = explode('.', $namaFile); // memecah string berupa array (explode) ex: blabla.jpg > 'blabla''jpg'
    $GETektensionFile = strtolower(end($GETektensionFile)); // (end) mengambil kata yang paling akhir, (strtolower) membuat semua huruf kecil
    if (!in_array($GETektensionFile, $TYPEektensionFile)) { //in_array untuk mengecek string didalam array
      echo "<script language=\"javascript\">
      swal({
            title: \"Warning!\",
            text: \"Supported Image (jpg, jpeg, bmp, png, svg, gif)\",
            icon: \"warning\",
            button: \"OK\",
          });

      </script>";
      return false;
    }

    //cek ukuran Gambar
    if ($sizeFile > 2000000) {
      echo "<script language=\"javascript\">
      swal({
            title: \"Warning!\",
            text: \"Maximum File Upload 2MB..!!\",
            icon: \"warning\",
            button: \"OK\",
          });

      </script>";
      return false;
    }

    //generate nama gambar random
    $namaFileRandom = uniqid();
    $namaFileRandom .= '.';
    $namaFileRandom .= $GETektensionFile;

    //lolos pengecekan gambar, lalu upload
    move_uploaded_file($tmpFile, '../img/news/' .$namaFileRandom);
    return $namaFileRandom;
  }

    // lanjutan di function bawah

  function tambahposting($data){
      global $conn;
      $judul = htmlspecialchars($data["judul"]);
      //$gambar = htmlspecialchars($data["gambar"]);
      $isi = htmlspecialchars($data["isi"]);
      $tgltime = $data["tanggal-waktu"];

      //upload gambar
      $gambar = upload_gambar();
      if (!$gambar) { //jika gagal (trus / false)
          return false;
      }

      $query = "INSERT INTO news VALUES ('','$judul','$gambar','$tgltime','$isi') ";
      $hasil = mysqli_query ($conn,$query);
      return $hasil;
    }

    function upload_gambar_promo(){
      //menganmbil isi array dari $_FILES
      $namaFile = $_FILES["gambar"]["name"]; //nama file
      $sizeFile = $_FILES["gambar"]["size"]; //ukuran file
      $errFile = $_FILES["gambar"]["error"]; //error file, jika yg diupload bukan gambar
      $tmpFile = $_FILES["gambar"]["tmp_name"]; //tempat penyimpana gambar

      //cek gambar diupload / tidak
      if ($errFile == 4) {
        echo "<script language=\"javascript\">
        swal({
              title: \"Warning!\",
              text: \"Gambar wajib diupload..!\",
              icon: \"warning\",
              button: \"OK\",
            });

        </script>";
        return false;
      }

      //cek tipe file yang diupload
      $TYPEektensionFile = ['jpg', 'jpeg', 'bmp', 'png', 'svg', 'gif'];
      $GETektensionFile = explode('.', $namaFile); // memecah string berupa array (explode) ex: blabla.jpg > 'blabla''jpg'
      $GETektensionFile = strtolower(end($GETektensionFile)); // (end) mengambil kata yang paling akhir, (strtolower) membuat semua huruf kecil
      if (!in_array($GETektensionFile, $TYPEektensionFile)) { //in_array untuk mengecek string didalam array
        echo "<script language=\"javascript\">
        swal({
              title: \"Warning!\",
              text: \"Supported Image (jpg, jpeg, bmp, png, svg, gif)\",
              icon: \"warning\",
              button: \"OK\",
            });

        </script>";
        return false;
      }

      //cek ukuran Gambar
      if ($sizeFile > 2000000) {
        echo "<script language=\"javascript\">
        swal({
              title: \"Warning!\",
              text: \"Maximum File Upload 2MB..!!\",
              icon: \"warning\",
              button: \"OK\",
            });

        </script>";
        return false;
      }

      //generate nama gambar random
      $namaFileRandom = uniqid();
      $namaFileRandom .= '.';
      $namaFileRandom .= $GETektensionFile;

      //lolos pengecekan gambar, lalu upload
      move_uploaded_file($tmpFile, '../img/promo/' .$namaFileRandom);
      return $namaFileRandom;
    }

      // lanjutan di function bawah

    function tambahpromo($data){
        global $conn;
        $judul = htmlspecialchars($data["judul"]);
        //$gambar = htmlspecialchars($data["gambar"]);
        $isi = htmlspecialchars($data["isi"]);
        $tgltime = $data["tanggal-waktu"];

        //upload gambar
        $gambar = upload_gambar_promo();
        if (!$gambar) { //jika gagal (trus / false)
            return false;
        }

        $query = "INSERT INTO promo VALUES ('','$judul','$gambar','$tgltime','$isi') ";
        $hasil = mysqli_query ($conn,$query);
        return $hasil;
      }



  function tambahdata_cust($data){
      global $conn;
      $id_cust = $data["id_cust"];//data diterima berupa format $POST[id_supp] dari master-suppier.php
      $nama = htmlspecialchars($data["nama"]);
      $alamat = htmlspecialchars($data["alamat"]);
      $hp = htmlspecialchars($data["hp"]);
      $query = "INSERT INTO pelanggan VALUES ('$id_cust','$nama','$alamat','$hp') ";
      $hasil = mysqli_query ($conn,$query);
      return $hasil;
    }

function tambahdata_user($data){
        global $conn;
        $id = $data["id_login"];//data diterima berupa format $POST[id_supp] dari master-suppier.php
        $nama = $data["nama"];
        $alamat = $data["alamat"];
        $username = $data["username"];
        $password = md5($data["password"]);
        $level = $data["level"];
        $query = "INSERT INTO login VALUES ('$id','$username','$password','$nama','$alamat','$level') ";
        $hasil = mysqli_query ($conn,$query);
        return $hasil;
      }

function tambahdata_beli($data){
      global $conn;
      $id_beli = $data["id_beli"];
      $id_supp = $data["supp"];
      $id_barang = $data["id_barang"];
      $id_login = $data["id_login"];
      $satuan = $data["satuan"];
      $jumlah = $data["jumlah"];
      $harga = $data["harga"];
      $tgl = $data["tgl"];
      $query = "INSERT INTO pembelian_barang VALUES ('$id_beli','$id_supp','$id_barang','$id_login', '$jumlah', '$satuan', '$harga', '$tgl') ";
      $hasil = mysqli_query ($conn,$query);
      mysqli_error($conn);
      return $hasil;
      var_dump($data);
}


function deletedata($id){//data value $id diterima dari delete.php yang berupa isi ID_BARANG
  global $conn;
  $hasil = mysqli_query ($conn,"DELETE FROM master_barang WHERE ID_BARANG= '$id'");
  return $hasil;

}
function deleteproduklaris($id){//data value $id diterima dari delete.php yang berupa isi ID_BARANG
  global $conn;
  $hasil = mysqli_query ($conn,"DELETE FROM produk_terjual WHERE ID_BARANG= '$id'");
  return $hasil;

}

function deletepembelian($query){
  //menjadikan @conn variabel global
  global $conn;
  //variabel hasil yang menyimpan data dari db
  $hasil = mysqli_query ($conn,$query);
  return $hasil;

}

function delete($query){
  //menjadikan @conn variabel global
  global $conn;
  //variabel hasil yang menyimpan data dari db
  $hasil = mysqli_query ($conn,$query);
  return $hasil;

}

function deletesupplier($id){//data value $id diterima dari delete.php yang berupa isi ID_BARANG
  global $conn;
  $hasil = mysqli_query ($conn,"DELETE FROM supplier WHERE ID_SUPP= '$id'");
  return $hasil;

}

function editbarang($data){// value $data diterima dari edit-barang.php berupa $_POST
  global $conn;
  $id_barang = $data["id_barang"];//DATA diterima berupa $POST["id_barang"] <== dari inputan di edit-barang.php dst
  $kategori = $data["kategori"];
  $nama_barang = $data["nama_barang"];
  $satuan = $data["satuan"];
  $harga = $data["harga"];
  $query = "UPDATE master_barang SET ID_KATEGORI= '$kategori', NAMA_BARANG = '$nama_barang', SATUAN = '$satuan', HARGA_JUAL = '$harga' WHERE ID_BARANG = '$id_barang' ;";
  $hasil = mysqli_query ($conn,$query);
  return $hasil;


}

function editPaketPC($data){// value $data diterima dari edit-barang.php berupa $_POST
  global $conn;
  $id = $data["id_pc"];
  $proc = $data["proc"];
  $mobo = $data["mobo"];
  $ram = $data["ram"];
  $hdd = $data["hdd"];
  $ssd = $data["ssd"];
  $vga = $data["vga"];
  $psu = $data["psu"];
  $casing = $data["casing"];
  $monitor = $data["monitor"];
  $keyb = $data["keyb"];
  $mouse = $data["mouse"];
  $speak = $data["speaker"];
  $harga = $data["hargapc"];
  $query = "UPDATE paket_pc SET HARGA_PC = '$harga', PROC = '$proc', MOBO = '$mobo', RAM = '$ram', HDD = '$hdd', SSD = '$ssd', VGA = '$vga', PSU = '$psu',
                                CASING = '$casing', MONITOR = '  $monitor', KEYB = '$keyb',  MOUSE = '$mouse', SPEAK = '$speak' WHERE ID_PC = '$id' ;";
  $hasil = mysqli_query ($conn,$query);
  return $hasil;


}

function editsupp($data){// value $data diterima dari edit-suppier.php berupa $_POST
  global $conn;
  $id_supp = $data["id_supp"];//data diterima berupa format $POST[id_supp] dari master-suppier.php
  $nama_supp = $data["nama_supp"];
  $alamat = $data["alamat"];
  $hp = $data["hp"];
  $query = "UPDATE supplier SET NAMA = '$nama_supp', ALAMAT = '$alamat', NO_HP = '$hp' WHERE ID_SUPP = $id_supp";
  $hasil = mysqli_query ($conn,$query);
  return $hasil;


}

function editprofile($data){// value $data diterima dari edit-suppier.php berupa $_POST
  global $conn;
  $id = $data["id_login"];//data diterima berupa format $POST[id_supp] dari master-suppier.php
  $nama = $data["nama"];
  $alamat = $data["alamat"];
  $username = $data["username"];
  $password = md5($data["password"]);
  $level = $data["level"];
  $query = "UPDATE login SET NAMA = '$nama', ALAMAT = '$alamat', USERNAME = '$username', PASSWORD= '$password', LEVEL = '$level' WHERE ID_LOGIN = $id";
  $hasil = mysqli_query ($conn,$query);
  return $hasil;


}

function editpost($data){// value $data diterima dari edit-suppier.php berupa $_POST
  global $conn;
  $id_news = $data["id_news"];//data diterima berupa format $POST[id_supp] dari master-suppier.php
  $judul = htmlspecialchars($data["judul"]);
  $gambarOld = $data["old_gambar"];
  $isi = htmlspecialchars($data["isi"]);
  $tgltime = $data["tanggal-waktu"];

  //cek user pilih gambar baru / tidak
  if ($_FILES["gambar"]["error"] == 4) {
      $gambar = $gambarOld;
  }
  else {
      $gambar = upload_gambar();
  }


  $query = "UPDATE news SET JUDUL = '$judul', GAMBAR = '$gambar', WAKTU = '$tgltime', ISI = '$isi' WHERE ID_NEWS = $id_news";
  $hasil = mysqli_query ($conn,$query);
  return $hasil;


}

function editpromo($data){// value $data diterima dari edit-suppier.php berupa $_POST
  global $conn;
  $id_promo = $data["id_promo"];//data diterima berupa format $POST[id_supp] dari master-suppier.php
  $judul = htmlspecialchars($data["judul"]);
  $gambarOld = $data["old_gambar"];
  $isi = htmlspecialchars($data["isi"]);
  $tgltime = $data["tanggal-waktu"];

  //cek user pilih gambar baru / tidak
  if ($_FILES["gambar"]["error"] == 4) {
      $gambar = $gambarOld;
  }
  else {
      $gambar = upload_gambar_promo();
  }


  $query = "UPDATE promo SET JUDUL = '$judul', GAMBAR = '$gambar', WAKTU = '$tgltime', ISI = '$isi' WHERE ID_PROMO = $id_promo";
  $hasil = mysqli_query ($conn,$query);
  return $hasil;


}

function editcust($data){// value $data diterima dari edit-suppier.php berupa $_POST
  global $conn;
  $id_cust = $data["id_cust"];//data diterima berupa format $POST[id_supp] dari master-suppier.php
  $nama = $data["nama"];
  $alamat = $data["alamat"];
  $hp = $data["hp"];
  $query = "UPDATE pelanggan SET NAMA = '$nama', ALAMAT = '$alamat', HP = '$hp' WHERE ID_PELANGGAN = $id_cust";
  $hasil = mysqli_query ($conn,$query);
  return $hasil;


}

function editgaransi($data){// value $data diterima berupa $_POST
  global $conn;
  $id_grs = $data["id_grs"];
  $inv = $data["inv"];
  $nama_brg = $data["id_barang"];
  $tgl_beli = $data["tgl_beli"];
  $tgl_habis = $data["tgl_habis"];
  $query = "UPDATE garansi SET TGL_HABIS = '$tgl_habis' WHERE INV_PENJUALAN = '$inv'";
  $hasil = mysqli_query ($conn,$query);
  return $hasil;


}


function caribarang($cari){
$query = "SELECT * FROM master_barang INNER JOIN kategori ON master_barang.ID_KATEGORI=kategori.ID_KATEGORI WHERE ID_BARANG LIKE '%$cari%' OR NAMA_BARANG LIKE '%$cari%' OR KATEGORI LIKE '%$cari%'";
return tampil_data($query);

}

function caribarangModal($cari){
$query = "SELECT * FROM master_barang WHERE ID_BARANG LIKE '%$cari%' OR NAMA_BARANG LIKE '%$cari%'";
$hasil = mysqli_query ($conn,$query);
$data = mysqli_fetch_assoc($hasil);
return $data;

}

function carisupp($cari){
$query = "SELECT * FROM supplier WHERE ID_SUPP LIKE '%$cari%' OR NAMA LIKE '%$cari%'";
return tampil_data($query);

}

function carigaransi($cari){
$query = "SELECT * FROM garansi WHERE INV_PENJUALAN ='$cari'";
return tampil_data($query);

}

?>
