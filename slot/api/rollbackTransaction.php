<?php
header('Content-Type: application/json');

require_once('system/connect.php'); // подключение через mysqli_connect()

$input = file_get_contents('php://input');
$data = json_decode($input, true);

$required = ['userID', 'refTransactionID', 'agentID', 'sign', 'gameID'];
foreach ($required as $field) {
    if (empty($data[$field])) {
        http_response_code(200);
        echo json_encode(['code' => 1, 'message' => "Missing field: $field"]);
        exit;
    }
}

$userID = mysqlI_real_escape_string($connection,$data['userID']);
$refTransactionID = mysqlI_real_escape_string($connection,$data['refTransactionID']);

// Проверка наличия исходной транзакции
$res = mysqli_query($connection,"SELECT bet_amount, win_amount, user_id FROM transactions WHERE transaction_id = '$refTransactionID' AND user_id = '$userID'");
if (!$res || mysqli_num_rows($res) === 0) {
    http_response_code(200);
    echo json_encode(['code' => 2, 'message' => 'Referenced transaction not found']);
    exit;
}

$txn = mysqli_fetch_assoc($res);

// Проверка, не был ли уже выполнен откат
$res = mysqli_query($connection,"SELECT id FROM transactions WHERE ref_transaction_id = '$refTransactionID' AND type = 'rollback' LIMIT 1");
if ($res && mysqli_num_rows($res) > 0) {
    // Получение текущего баланса
    $resBalance = mysqli_query($connection,"SELECT balance FROM users WHERE id = '$userID'");
    $balance = 0;
    if ($resBalance && mysqli_num_rows($resBalance) > 0) {
        $balance = floatval(mysqli_fetch_assoc($resBalance)['balance']);
    }

    echo json_encode([
        'code' => 0,
        'message' => 'Already rolled back',
        'platformTransactionID' => $refTransactionID,
        'balance' => round($balance, 2)
    ]);
    exit;
}

// Получение текущего баланса пользователя
$resUser = mysqli_query($connection,"SELECT balance FROM users WHERE id = '$userID'");
if (!$resUser || mysqli_num_rows($resUser) === 0) {
    http_response_code(200);
    echo json_encode(['code' => 3, 'message' => 'User not found']);
    exit;
}
$balance = floatval(mysqli_fetch_assoc($resUser)['balance']);

// Вычисление нового баланса
$newBalance = round($balance + floatval($txn['bet_amount']) - floatval($txn['win_amount']), 2);

// Начинаем "ручную транзакцию"
mysqli_query($connection,"START TRANSACTION");

// Обновление баланса
$update = mysqli_query($connection,"UPDATE users SET balance = '$newBalance' WHERE id = '$userID'");
if (!$update || mysqli_affected_rows() === 0) {
    mysqli_query($connection,"ROLLBACK");
    http_response_code(200);
    echo json_encode(['code' => 4, 'message' => 'Failed to update balance']);
    exit;
}

// Вставка rollback-транзакции
$rollbackID = md5(uniqid('', true));
$type = 'rollback';
$negBet = -abs(floatval($txn['bet_amount']));
$negWin = -abs(floatval($txn['win_amount']));
$now = date('Y-m-d H:i:s');

$insert = mysqli_query($connection,"
    INSERT INTO transactions (
        transaction_id, user_id, bet_amount, win_amount, platform_transaction_id, type, ref_transaction_id, created_at
    ) VALUES (
        '$rollbackID', '$userID', '$negBet', '$negWin', '$rollbackID', '$type', '$refTransactionID', '$now'
    )
");

if (!$insert || mysqli_affected_rows() === 0) {
    mysqli_query($connection,"ROLLBACK");
    http_response_code(200);
    echo json_encode(['code' => 5, 'message' => 'Failed to insert rollback transaction']);
    exit;
}

mysqli_query($connection,"COMMIT");

echo json_encode([
    'code' => 0,
    'message' => '',
    'platformTransactionID' => $rollbackID,
    'balance' => $newBalance
]);
