<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} elseif (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
} else {
    $lang = 'en';
}
$allowed = ['en','es','ru'];
if (!in_array($lang, $allowed, true)) {
    $lang = 'en';
}

// подключаем файл перевода
$path = dirname(dirname(__DIR__)) . "/lang/{$lang}.php";
if (is_file($path)) {
    $translations = require $path;
} else {
    // страховка: если файла нет — грузим en
    $translations = require dirname(dirname(__DIR__)) . "/lang/en.php";
}

function createInvoice($amount, $description, $apiToken) {
    $url = 'https://pay.crypt.bot/api/createInvoice';

    $data = [
        'currency_type' => 'crypto',
        'asset' => 'USDT',
        'amount' => $amount,
        'description' => $description,
        'allow_comments' => true,
        'allow_anonymous' => true,
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Crypto-Pay-API-Token: ' . $apiToken,
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $response = curl_exec($ch);
    
    if ($response === false) {
        return [
            'ok' => false,
            'error' => 'cURL error: ' . curl_error($ch)
        ];
    }

    curl_close($ch);
    
    return json_decode($response, true);
}

$apiToken = '366662:AAxHPFfhCst4mMCVINSOjNYIVU3U7gxPCU7'; 
$amount = isset($_POST['amount']) ? $_POST['amount'] : '10.00';
$description = <?= $translations['top_up_your_account'] ?>;

$result = createInvoice($amount, $description, $apiToken);

$responseData = [];

if (isset($result['ok']) && $result['ok']) {
    $responseData['status'] = 'success';
    $responseData['invoice_url'] = $result['result']['web_app_invoice_url']; 
} else {
    $responseData['status'] = 'error';
    $responseData['message'] = isset($result['error']) ? $result['error'] : <?= $translations['unknown_error'] ?>;
}

header('Content-Type: application/json');
echo json_encode($responseData);
?>