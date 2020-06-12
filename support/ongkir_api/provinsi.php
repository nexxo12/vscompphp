<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
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
  $arr_provinsi = json_decode($response,TRUE);
  //var_dump($arr_provinsi["rajaongkir"]["results"]);
  $data_provinsi = $arr_provinsi["rajaongkir"]["results"];
  // echo "<pre>";
  // print_r($data_provinsi);
  // echo "<pre>";
  echo "<option>--Pilih Provinsi--</option>";
  foreach ($data_provinsi as $key => $prov) {
    echo "<option value='".$prov["province_id"]."' id_prov='".$prov["province_id"]."'>";
    echo $prov["province"];
    echo "</option>";

  }

}
?>
