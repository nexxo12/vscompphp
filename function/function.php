
<?php
//untuk konek database
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

function tambahdata($data){
  global $conn;
  $id_barang = $data["id_barang"];//data diterima berupa array / banyak data dengan format $POST[id_barang]
  $nama_barang = $data["nama_barang"];
  $satuan = $data["satuan"];
  $harga = $data["harga"];
  $jumlah_data = count($id_barang); //menghitung jumlah data
  for ($i=0; $i < $jumlah_data; $i++) {
    $query = "INSERT INTO master_barang (`ID_BARANG`, `NAMA_BARANG`, `STOK`, `SATUAN`, `HARGA_JUAL`, `STATUS`) VALUES ('$id_barang[$i]','$nama_barang[$i]','','$satuan[$i]','$harga[$i]','') ";
    $hasil = mysqli_query ($conn,$query);
  }


  return $hasil;
}

function deletedata($id){//data value $id diterima dari delete.php yang berupa isi ID_BARANG
  global $conn;
  $hasil = mysqli_query ($conn,"DELETE FROM master_barang WHERE ID_BARANG= '$id'");
  return $hasil;

}

function editbarang($data){// value $data diterima dari edit-barang.php berupa $_POST
  global $conn;
  $id_barang = $data["id_barang"];//DATA diterima berupa $POST["id_barang"] <== dari inputan di edit-barang.php dst
  $nama_barang = $data["nama_barang"];
  $satuan = $data["satuan"];
  $harga = $data["harga"];
  $query = "UPDATE master_barang SET NAMA_BARANG = '$nama_barang', SATUAN = '$satuan', HARGA_JUAL = '$harga' WHERE ID_BARANG = '$id_barang' ;";
  $hasil = mysqli_query ($conn,$query);
  return $hasil;


}

function caribarang($cari){

$query = "SELECT * FROM master_barang WHERE ID_BARANG LIKE '%$cari%' OR NAMA_BARANG LIKE '%$cari%'";
return tampil_data($query);

}

?>
