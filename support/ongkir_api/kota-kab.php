<?php
$idprov = $_POST["idProvinsi"];
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=".$idprov,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: 95be7567e2b243b07bdbc8fd9eb763ae"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
  //konversi json ke array
  $arr_kotaKab = json_decode($response,TRUE);
  //var_dump($arr_provinsi["rajaongkir"]["results"]);
  $data_kotaKab = $arr_kotaKab["rajaongkir"]["results"];
  // echo "<pre>";
  // print_r($data_kotaKab);
  // echo "<pre>";
  echo "<option>--Pilih Kota / Kabupaten--</option>";
  foreach ($data_kotaKab as $key => $kota) {
    echo "<option value='".$kota["city_id"]."' id_prov='".$kota["city_id"]."' postal='".$kota["postal_code"]."' provinsi='".$kota["province"]."'>";
    echo $kota["type"]." ";
    echo $kota["city_name"];
    echo "</option>";

  }

}
?>
