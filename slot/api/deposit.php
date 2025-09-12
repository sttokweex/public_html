<?php
header('Content-Type: application/json');

require_once(dirname(__DIR__, 2) . '/system/connect.php');

// Получение JSON
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Проверка обязательных полей
$required = ['userID', 'amount', 'transactionID'];
foreach ($required as $field) {
    if (!isset($data[$field])) {
        http_response_code(200);
        echo json_encode(['code' => 1, 'message' => "Missing field: $field"]);
        exit;
    }
}

$userID           = mysqlI_real_escape_string($connection, $data['userID']);
$amount           = floatval($data['amount']);
$transactionID    = mysqlI_real_escape_string($connection, $data['transactionID']);
$refTransactionID = isset($data['refTransactionID']) ? mysqlI_real_escape_string($connection, $data['refTransactionID']) : null;

// Проверка на дубликат
$check = mysqli_query($connection, "SELECT id FROM transactions WHERE transaction_id = '$transactionID'");
if (mysqli_num_rows($check) > 0) {
    $res = mysqli_query($connection, "SELECT balance FROM users WHERE id = '$userID'");
    $balance = ($res && mysqli_num_rows($res) > 0) ? floatval(mysqli_fetch_assoc($res)['balance']) : 0;
    echo json_encode([
        'code'    => 1,
        'message' => 'Transaction already processed',
        'balance' => $balance
    ]);
    exit;
}

// Получение текущего баланса
$res = mysqli_query($connection, "SELECT balance FROM users WHERE id = '$userID'");
if (!$res || mysqli_num_rows($res) === 0) {
    http_response_code(200);
    echo json_encode(['code' => 2, 'message' => 'User not found']);
    exit;
}
$row     = mysqli_fetch_assoc($res);
$balance = floatval($row['balance']);

// Обновление баланса
$newBalance = round($balance + $amount, 2);
$update = mysqli_query($connection, "UPDATE users SET balance = '$newBalance' WHERE id = '$userID'");
if (!$update || mysqli_affected_rows($connection) === 0) {
    http_response_code(200);
    echo json_encode(['code' => 3, 'message' => 'Failed to update balance', 'balance' => $balance]);
    exit;
}

// Внутренний ID + дата
$platformTransactionID = md5(uniqid('', true));
$now = date('Y-m-d H:i:s');

// Запись транзакции
$type = 'deposit';
mysqli_query($connection, "INSERT INTO transactions (
        transaction_id, user_id, bet_amount, win_amount, ref_transaction_id, platform_transaction_id, type, created_at
    ) VALUES (
        '$transactionID', '$userID', 0, '$amount', '$refTransactionID', '$platformTransactionID', '$type', '$now'
    )
");

// Ответ
echo json_encode([
    'code'                   => 0,
    'message'                => '',
    'platformTransactionID'  => $platformTransactionID,
    'balance'                => $newBalance
]);
