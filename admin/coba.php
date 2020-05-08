<?php include'../function/function.php';


global $conn;
$query = "SELECT MAX(id_inv) AS kode FROM inv_penjualan";
$hasil = mysqli_query ($conn,$query);
$data = mysqli_fetch_array($hasil);
$kode = $data["kode"]; //mengambil data 'kode'
$short_id = (int) substr ($kode, 1, 6); //data id dibagi 2 angka depan 3 angka setelahnya (BR000)
$short_id++; // data di increment
$new_code = sprintf("%06s", $short_id);

echo $new_code++;
?>
