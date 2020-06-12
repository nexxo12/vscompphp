<?php

// $tujuan = $_POST["idtujuan"];
// $kurir = $_POST["idkurir"];
// $berat = $_POST["berat"];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  //CURLOPT_POSTFIELDS => "origin=444&destination=".$tujuan."&weight=".$berat."&courier=".$kurir,
  CURLOPT_POSTFIELDS => "origin=444&destination=114&weight=1700&courier=jne",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
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
  $arr_ekpedisi = json_decode($response,TRUE);
  //var_dump($arr_provinsi["rajaongkir"]["results"]);
  $data_ekpedisi = $arr_ekpedisi["rajaongkir"]["results"]["0"]["costs"];
  $data_kurir = $arr_ekpedisi["rajaongkir"]["query"]["courier"];
  // echo "<pre>";
  // print_r($data_kurir);
  // echo "<pre>";

  foreach ($data_ekpedisi as $key => $ekpedisi) {
    echo "<tr>";
    echo "<td>".strtoupper($data_kurir)."</td>";
    echo "<td>".$ekpedisi["service"]."</td>";
    echo "<td>".$ekpedisi["cost"]["0"]["etd"]."</td>";
    echo "<td>Rp. ".number_format($ekpedisi["cost"]["0"]["value"])."</td>";
    echo "</tr>";

  }

}
?>
