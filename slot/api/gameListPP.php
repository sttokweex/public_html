<?php
header('Content-Type: application/json');

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api3.goldslotcity.com/gamelist',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer 31c3a1f2b3324ae1bb4d296ef49eda0c',
    'Content-Type: application/json',
    'Accept: application/json'
  ),
));

$response = curl_exec($curl);
curl_close($curl);

echo $response;