<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$sid = $_SESSION['hash'];

require (dirname(__DIR__, 1)."/system/config.php");

$result = mysqli_query($connection,"SELECT * FROM `users` WHERE hash= '$sid'");
$row = mysqli_fetch_array($result);
$user_id = $row['id'];

header('Content-Type: application/json');

// 1. Проверяем метод запроса
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    die(json_encode(['error' => 'Method Not Allowed']));
}

// 2. Получаем и валидируем данные
$input = json_decode(file_get_contents('php://input'), true);
if (!$input || !isset($input['user_id'])) {
    http_response_code(400);
    die(json_encode(['error' => 'Invalid or missing data']));
}
/*
// 3. Проверяем подпись Telegram WebApp (безопасность!)
$initData = $_SERVER['HTTP_X_TELEGRAM_INIT_DATA'] ?? '';
if (!verifyTelegramWebApp($initData, "YOUR_BOT_TOKEN")) {
    http_response_code(403);
    die(json_encode(['error' => 'Unauthorized']));
}
*/

$botToken = "7008339760:AAGuowmc0o60BjNWAMY4pYWZ3loZGL653-U";
$invoiceLink = createInvoiceLink($sid, $user_id, $botToken, $input['user_id'], $input['amount']);

echo json_encode(['invoice_url' => $invoiceLink]);


function createInvoiceLink($sid, $user_id,  $botToken, $userId, $amount) {
    if ($amount >= $min_sum_dep) {

        $hash_dep = md5($userId . microtime(true));
        $invoice_id = $userId . '_' . time();
        $promo = 0;
        $date_dep = date("d.m.Y H:i:s");

        $apiUrl = "https://api.telegram.org/bot{$botToken}/createInvoiceLink";
        $postData = [
            'title' => 'Deposit balance',
            'description' => 'Deposit stars in balance',
            'payload' => $hash_dep,
            'provider_token' => '',
            'currency' => 'XTR',
            'prices' => json_encode([['label' => 'Wallet', 'amount' => $amount]]),
        ];
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        if(isset($data['result'])){
            mysqli_query($connection,"INSERT INTO `deposits` (`id`,`user_id`,`amount`,`hash_dep`,`invoice_id`,`hash_user`,`system`,`promo`,`status`,`date`) VALUES (NULL,'$user_id','$amount','$hash_dep','$invoice_id','$sid','tgstars','$promo','0','$date_dep')");
        }

        return $data['result'] ? $data['result'] : '';
    }




}
