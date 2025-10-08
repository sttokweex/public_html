<?php
header('Content-Type: application/json');

// Подключение
require_once(dirname(__DIR__, 2) . '/system/connect.php');

// Получение входных данных
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Проверка обязательных полей
$required = ['userID', 'betAmount', 'winAmount', 'transactionID', 'agentID', 'sign', 'gameID'];
foreach ($required as $field) {
  if (!isset($data[$field])) {
    http_response_code(200);
    echo json_encode(['code' => 1, 'message' => "Missing field: $field"]);
    exit;
  }
}

$userID        = mysqli_real_escape_string($connection, $data['userID']);
$betAmount     = floatval($data['betAmount']);
$winAmount     = floatval($data['winAmount']);
$transactionID = mysqli_real_escape_string($connection, $data['transactionID']);
$roundID       = isset($data['roundID']) ? mysqli_real_escape_string($connection, $data['roundID']) : '';
$freeSpinID    = isset($data['freeSpinID']) ? mysqli_real_escape_string($connection, $data['freeSpinID']) : '';
$balance = isset($data['balance']) ? mysqli_real_escape_string($connection, $data['balance']) : '';


// Проверка дублирования транзакции
$check = mysqli_query($connection, "SELECT id FROM transactions WHERE transaction_id = '$transactionID'");
if (mysqli_num_rows($check) > 0) {
  echo json_encode([
    'code'    => 1,
    'message' => 'Transaction already processed',
    'balance' => round($balance, 2)
  ]);
  exit;
}

// Расчёт нового баланса
$newBalance = $balance;

// Обновление баланса
$update = mysqli_query($connection, "UPDATE users SET balance = '$newBalance' WHERE id = '$userID'");
if (!$update || mysqli_affected_rows($connection) === 0) {
  http_response_code(200);
  echo json_encode(['code' => 3, 'message' => 'Failed to update balance', 'balance' => $balance]);
  exit;
}

// Лог транзакции
$platformTransactionID = md5(uniqid('', true));
$now = date('Y-m-d H:i:s');

mysqli_query($connection, "
    INSERT INTO transactions (
        transaction_id, user_id, bet_amount, win_amount, platform_transaction_id, type, round_id, created_at
    ) VALUES (
        '$transactionID', '$userID', '$betAmount', '$winAmount', '$platformTransactionID', 'betwin', '$roundID', '$now'
    )
");

echo json_encode([
  'code'                   => 0,
  'message'                => '',
  'platformTransactionID'  => $platformTransactionID,
  'balance'                => $newBalance
]);