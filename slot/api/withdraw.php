<?php
header('Content-Type: application/json');

require_once('system/connect.php');

$input = file_get_contents('php://input');
$data = json_decode($input, true);

$required = ['userID', 'amount', 'transactionID', 'agentID', 'sign', 'gameID'];
foreach ($required as $field) {
    if (!isset($data[$field])) {
        http_response_code(200);
        echo json_encode(['code' => 1, 'message' => "Missing field: $field"]);
        exit;
    }
}

$userID = mysqlI_real_escape_string($connection,$data['userID']);
$amount = floatval($data['amount']);
$transactionID = mysqlI_real_escape_string($connection,$data['transactionID']);
$roundID = isset($data['roundID']) ? mysqlI_real_escape_string($connection,$data['roundID']) : null;
$freeSpinID = isset($data['freeSpinID']) ? mysqlI_real_escape_string($connection,$data['freeSpinID']) : null;

// Проверка дубликата транзакции
$res = mysqli_query($connection,"SELECT id FROM transactions WHERE transaction_id = '$transactionID'");
if ($res && mysqli_num_rows($res) > 0) {
    // Уже обработано — вернуть баланс
    $resBal = mysqli_query($connection,"SELECT balance FROM users WHERE id = '$userID'");
    $balance = 0;
    if ($resBal && mysqli_num_rows($resBal) > 0) {
        $balance = floatval(mysqli_fetch_assoc($resBal)['balance']);
    }

    echo json_encode([
        'code' => 0,
        'message' => 'Transaction already processed',
        'balance' => round($balance, 2)
    ]);
    exit;
}

// Получение текущего баланса
$resUser = mysqli_query($connection,"SELECT balance FROM users WHERE id = '$userID'");
if (!$resUser || mysqli_num_rows($resUser) === 0) {
    http_response_code(200);
    echo json_encode(['code' => 2, 'message' => 'User not found']);
    exit;
}
$row = mysqli_fetch_assoc($resUser);
$balance = floatval($row['balance']);

// Расчёт нового баланса
$newBalance = round($balance - $amount, 2);

// Начинаем "ручную транзакцию"
mysqli_query($connection,"START TRANSACTION");

// Обновление баланса
$update = mysqli_query($connection,"UPDATE users SET balance = '$newBalance' WHERE id = '$userID'");
if (!$update || mysqli_affected_rows() === 0) {
    mysqli_query($connection,"ROLLBACK");
    http_response_code(200);
    echo json_encode(['code' => 3, 'message' => 'Failed to update balance', 'balance' => $balance]);
    exit;
}

// Логирование транзакции
$type = 'betwin'; // списание
$platformTransactionID = md5(uniqid('', true));
$now = date('Y-m-d H:i:s');

$insert = mysqli_query($connection,"
    INSERT INTO transactions (
        transaction_id, user_id, bet_amount, win_amount, platform_transaction_id, type, round_id, created_at
    ) VALUES (
        '$transactionID', '$userID', '$amount', 0, '$platformTransactionID', '$type', " . ($roundID ? "'$roundID'" : "NULL") . ", '$now'
    )
");

if (!$insert || mysqli_affected_rows() === 0) {
    mysqli_query($connection,"ROLLBACK");
    http_response_code(200);
    echo json_encode(['code' => 3, 'message' => 'Failed to insert transaction', 'balance' => $balance]);
    exit;
}

mysqli_query($connection,"COMMIT");

echo json_encode([
    'code' => 0,
    'message' => '',
    'platformTransactionID' => $platformTransactionID,
    'balance' => $newBalance
]);
