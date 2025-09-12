<?php
header('Content-Type: application/json');

require_once(dirname(__DIR__, 2) . '/system/connect.php');

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (empty($data['userID'])) {
    http_response_code(200);
    echo json_encode([
        'code' => 3,
        'message' => 'Missing required fields'
    ]);
    exit;
}

$userID = mysqlI_real_escape_string($connection, $data['userID']);

$res = mysqli_query($connection, "SELECT balance FROM users WHERE id = '$userID'");
if (!$res) {
    http_response_code(200);
    echo json_encode([
        'code' => 2,
        'message' => 'Database error',
        'mysqli_error' => mysqli_error($connection)
    ]);
    exit;
}

if (mysqli_num_rows($res) === 0) {
    http_response_code(200);
    echo json_encode([
        'code' => 1,
        'message' => 'User not found'
    ]);
    exit;
}

$row     = mysqli_fetch_assoc($res);
$balance = floatval($row['balance']);

// Округление в меньшую сторону до сотых
function floorToHundredths($value)
{
    return floor($value * 100) / 100;
}

echo json_encode([
    'code'    => 0,
    'message' => '',
    'balance' => floorToHundredths($balance)
]);
