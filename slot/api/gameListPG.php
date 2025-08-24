<?php
header('Content-Type: application/json');

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://apigg.slotgamesapi.com/gamelist',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer c4e36eed619b43fdba191675500dcf38',
    'Content-Type: application/json',
    'Accept: application/json'
  ),
));

$response = curl_exec($curl);
curl_close($curl);

echo $response;