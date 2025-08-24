<?php
// Включить отображение ошибок
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

// Проверка входных параметров
$requiredFields = ['agentID', 'userID', 'isaffiliate', 'lang', 'gameid', 'lobbyUrl'];
$missingFields = [];

foreach ($requiredFields as $field) {
    if (!isset($_POST[$field])) {
        $missingFields[] = $field;
    }
}

if (!empty($missingFields)) {
    http_response_code(400);
    echo json_encode([
        'error' => 'Missing required fields',
        'missing' => $missingFields
    ]);
    exit;
}

// Подготовка данных в формате JSON
$jsonData = json_encode([
    'agentID'   => $_POST['agentID'],
    'userID'    => $_POST['userID'],
    'isaffiliate' => filter_var($_POST['isaffiliate'], FILTER_VALIDATE_BOOLEAN),
    'lang'      => $_POST['lang'],
    'gameid'    => (int)$_POST['gameid'],
    'lobbyUrl'  => $_POST['lobbyUrl']
]);

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api3.goldslotcity.com/userAuth',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 10,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $jsonData,
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer 31c3a1f2b3324ae1bb4d296ef49eda0c',
        'Content-Type: application/json',
        'Accept: application/json'
    ),
));

$response = curl_exec($curl);
$curlError = curl_error($curl);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);

// Проверка ответа
if ($response === false || trim($response) === '') {
    http_response_code(502);
    echo json_encode([
        'error' => 'Empty API response or cURL error',
        'curl_error' => $curlError,
        'http_code' => $httpCode
    ]);
    exit;
}

// Проверка JSON
$data = json_decode($response, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(502);
    echo json_encode([
        'error' => 'Invalid JSON returned from API',
        'response_raw' => $response
    ]);
    exit;
}

// Проверка наличия ссылки
if (!isset($data['url'])) {
    http_response_code(502);
    echo json_encode([
        'error' => 'API did not return a game URL',
        'response' => $data
    ]);
    exit;
}

// Всё успешно
http_response_code(200);
echo json_encode([
    'code' => 0,
    'message' => 'OK',
    'url' => $data['url']
]);
