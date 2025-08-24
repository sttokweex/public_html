<?php
require (dirname(__DIR__, 1)."/system/config.php");

// === ПОВЕДЕНИЕ ОТВЕТА ===
http_response_code(200); // всегда 200
$PLAIN = (isset($_GET['plain']) && $_GET['plain'] == '1') || (isset($_SERVER['HTTP_X_PLAIN']) && $_SERVER['HTTP_X_PLAIN'] == '1');

// Логирование
function log_line($file, $msg) {
    @file_put_contents(__DIR__ . '/' . $file, $msg . "\n", FILE_APPEND);
}

// Универсальный вывод и выход
function out_json_and_exit($payload, $plain) {
    if ($plain) {
        header('Content-Type: text/plain; charset=utf-8');
        echo 'ok'; // платёжке всё равно
    } else {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
    exit;
}

// Диагностика
$diag = array(
    'ts'      => date('c'),
    'method'  => isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : '',
    'remote'  => isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '',
    'ct'      => isset($_SERVER['CONTENT_TYPE']) ? $_SERVER['CONTENT_TYPE'] : '',
    'ok'      => false,
    'stage'   => 'start',
    'error'   => null,
    'parsed'  => null,
    'norm'    => null,
    'notes'   => array(),
);

// === СЫРОЕ ТЕЛО ===
$raw = file_get_contents('php://input');
log_line('cb_webhook.txt', sprintf("%s CT=%s RAW=%s", $diag['ts'], $diag['ct'], $raw));

// === ПАРСИНГ ===
$data = array();
if (stripos($diag['ct'], 'application/x-www-form-urlencoded') !== false) {
    parse_str($raw, $data);
    $diag['notes'][] = 'parsed as form-urlencoded';
} else {
    $json = json_decode($raw, true);
    if (is_array($json)) {
        if (isset($json['payload']) && is_array($json['payload'])) {
            $data = array_merge($json, $json['payload']);
        } else {
            $data = $json;
        }
        $diag['notes'][] = 'parsed as json';
    } elseif (!empty($_POST)) {
        $data = $_POST;
        $diag['notes'][] = 'parsed as $_POST fallback';
    }
}
$diag['parsed'] = $data;

// === НОРМАЛИЗАЦИЯ ===
$status     = isset($data['status']) ? (string)$data['status'] : '';
$order_id   = isset($data['order_id']) ? (int)$data['order_id'] : 0;
$invoice_id = isset($data['invoice_id']) ? (string)$data['invoice_id'] : '';
$currency   = isset($data['currency']) ? (string)$data['currency'] : '';

$amount = null;
if (isset($data['amount']) && is_numeric($data['amount'])) {
    $amount = (float)$data['amount'];
} elseif (isset($data['amount_crypto']) && is_numeric($data['amount_crypto'])) {
    $amount = (float)$data['amount_crypto'];
}

$diag['norm'] = array(
    'status'     => $status,
    'order_id'   => $order_id,
    'amount'     => $amount,
    'currency'   => $currency,
    'invoice_id' => $invoice_id,
);

// === ВАЛИДАЦИЯ СТАТУСА ===
$diag['stage'] = 'status_check';
if (!in_array($status, array('success', 'paid'), true)) {
    $diag['error'] = 'ignored status (not success/paid)';
    $diag['ok'] = true;
    out_json_and_exit($diag, $PLAIN);
}

// === ВАЛИДАЦИЯ ПОЛЕЙ ===
$diag['stage'] = 'field_validation';
if ($order_id <= 0) {
    $diag['error'] = 'missing or bad order_id';
    out_json_and_exit($diag, $PLAIN);
}
if ($amount === null || $amount <= 0) {
    $diag['error'] = 'missing or bad amount/amount_crypto';
    out_json_and_exit($diag, $PLAIN);
}

// === ПОИСК ДЕПОЗИТА ===
$diag['stage'] = 'fetch_deposit';
$q = sprintf("SELECT * FROM deposits WHERE id=%d LIMIT 1", $order_id);
$r = mysqli_query($connection,$q);
if (!$r) {
    $diag['error'] = 'sql error dep_q: '.mysqli_error();
    $diag['notes'][] = $q;
    log_line('cb_webhook_err.txt', $diag['ts']." dep_q: ".mysqli_error());
    out_json_and_exit($diag, $PLAIN);
}
$dep = mysqli_fetch_assoc($r);
if (!$dep) {
    $diag['error'] = 'deposit not found';
    $diag['notes'][] = $q;
    out_json_and_exit($diag, $PLAIN);
}
$diag['notes'][] = array('deposit' => array('id'=>$dep['id'], 'status'=>$dep['status'], 'amount'=>$dep['amount'], 'invoice_id'=>$dep['invoice_id']));

// === ИДЕМПОТЕНТНОСТЬ ===
$diag['stage'] = 'idempotency';
if ((int)$dep['status'] === 1) {
    $diag['ok'] = true;
    $diag['error'] = 'already paid';
    out_json_and_exit($diag, $PLAIN);
}

// === СВЕРКА INVOICE_ID (опц.) ===
if (!empty($invoice_id) && !empty($dep['invoice_id']) && $dep['invoice_id'] !== $invoice_id) {
    $diag['notes'][] = array('invoice_id_mismatch' => array('got'=>$invoice_id, 'expected'=>$dep['invoice_id']));
    log_line('cb_webhook_err.txt', $diag['ts']." invoice_id mismatch dep={$order_id} got={$invoice_id} expected={$dep['invoice_id']}");
}

// === СВЕРКА СУММЫ ===
$diag['stage'] = 'amount_check';
$expected = (float)$dep['amount'];
if (round($expected, 8) !== round($amount, 8)) {
    $diag['error'] = 'amount mismatch';
    $diag['notes'][] = array('mismatch' => array('got'=>$amount, 'expected'=>$expected, 'currency'=>$currency));
    log_line('cb_webhook_err.txt', sprintf("%s amount mismatch dep=%d got=%s expected=%s cur=%s",
        $diag['ts'], $order_id, $amount, $expected, $currency
    ));
    out_json_and_exit($diag, $PLAIN);
}

// === ПОЛЬЗОВАТЕЛЬ ===
$diag['stage'] = 'fetch_user';
$hash_user = $dep['hash_user'];
$promo     = trim((string)$dep['promo']);
$uq = sprintf("SELECT * FROM users WHERE hash='%s' LIMIT 1", mysqlI_real_escape_string($connection,$hash_user));
$ur = mysqli_query($connection,$uq);
if (!$ur) {
    $diag['error'] = 'sql error user_q: '.mysqli_error();
    $diag['notes'][] = $uq;
    log_line('cb_webhook_err.txt', $diag['ts']." user_q: ".mysqli_error());
    out_json_and_exit($diag, $PLAIN);
}
$user = mysqli_fetch_assoc($ur);
if (!$user) {
    $diag['error'] = 'user not found';
    $diag['notes'][] = $uq;
    out_json_and_exit($diag, $PLAIN);
}
$diag['notes'][] = array('user' => array('id'=>$user['id'], 'ref_id'=>$user['ref_id']));

// === ПРОМО ===
$credited = $amount;
if ($promo !== '' && $promo !== '0') {
    $pr = mysqli_query($connection,"SELECT id, `sum` FROM promo WHERE name='".mysqlI_real_escape_string($connection,$promo)."' LIMIT 1");
    if ($pr && ($p = mysqli_fetch_assoc($pr)) && (float)$p['sum'] > 0) {
        $credited = $amount + ($amount / (float)$p['sum']);
        @mysqli_query($connection,"INSERT IGNORE INTO promo_log (promo_id, user_id) VALUES (".(int)$p['id'].", ".(int)$user['id'].")");
        @mysqli_query($connection,"UPDATE promo SET actived = actived + 1 WHERE id=".(int)$p['id']);
        $diag['notes'][] = array('promo_applied' => array('name'=>$promo, 'credited'=>$credited));
    } else {
        $diag['notes'][] = array('promo_skip' => $promo);
    }
}

// === ПОМЕТКА ДЕПОЗИТА ===
$diag['stage'] = 'mark_paid';
$upd = mysqli_query($connection,sprintf("UPDATE deposits SET status=1 WHERE id=%d AND status=0", $order_id));
if (!$upd) {
    $diag['error'] = 'sql error dep_update: '.mysqli_error();
    log_line('cb_webhook_err.txt', $diag['ts']." dep_update: ".mysqli_error());
    out_json_and_exit($diag, $PLAIN);
}
if (mysqli_affected_rows() === 0) {
    $diag['ok'] = true;
    $diag['error'] = 'idempotent: no rows (race)';
    out_json_and_exit($diag, $PLAIN);
}

// === НАЧИСЛЕНИЕ ПОЛЬЗОВАТЕЛЮ ===
$diag['stage'] = 'credit_user';
$credited_sql = mysqlI_real_escape_string($connection,$credited);
$u_upd = mysqli_query($connection,"
    UPDATE users
    SET balance = balance + '{$credited_sql}',
        dep_week = dep_week + '{$credited_sql}'
    WHERE id = ".(int)$user['id']
);
if (!$u_upd) {
    $diag['error'] = 'sql error user_update: '.mysqli_error();
    log_line('cb_webhook_err.txt', $diag['ts']." user_update: ".mysqli_error());
    out_json_and_exit($diag, $PLAIN);
}

// === РЕФЕРАЛ ===
$diag['stage'] = 'referral';
$refLogIns = @mysqli_query($connection,"INSERT INTO ref_log (deposit_id, created_at) VALUES ({$order_id}, NOW())");
if ($refLogIns) {
    $ref_id = (int)$user['ref_id'];
    if ($ref_id > 0) {
        $r2  = mysqli_query($connection,"SELECT refs FROM users WHERE id={$ref_id} LIMIT 1");
        $rr2 = $r2 ? mysqli_fetch_assoc($r2) : null;
        $countref = $rr2 ? (int)$rr2['refs'] : 0;

        $percent = 2;
        if ($countref >= 100) $percent = 10;
        else if ($countref >= 50) $percent = 8;
        else if ($countref >= 25) $percent = 6;
        else if ($countref >= 10) $percent = 4;

        $ref_amount = round($credited * $percent / 100, 8);
        $ra_sql = mysqlI_real_escape_string($connection,$ref_amount);
        @mysqli_query($connection,"
            UPDATE users
            SET balance = balance + '{$ra_sql}',
                refearn = refearn + '{$ra_sql}',
                ref_deps = ref_deps + 1,
                ref_deps_sum = ref_deps_sum + '{$credited_sql}'
            WHERE id = {$ref_id}
        ");
        $diag['notes'][] = array('referral' => array('ref_id'=>$ref_id, 'percent'=>$percent, 'amount'=>$ref_amount));
    } else {
        $diag['notes'][] = array('referral' => 'no ref');
    }
} else {
    $diag['notes'][] = array('referral' => 'duplicate or err');
}

// === ГОТОВО ===
$diag['stage'] = 'done';
$diag['ok'] = true;
out_json_and_exit($diag, $PLAIN);
