<?php include'../function/function.php';


global $conn;
$query = "SELECT MAX(ID_PENJUALAN) AS kode FROM penjualan";
$hasil = mysqli_query ($conn,$query);
$data = mysqli_fetch_array($hasil);
$kode = $data["kode"]; //mengambil data 'kode'
$kode++;

echo $kode;
?>
