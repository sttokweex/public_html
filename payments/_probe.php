<?php
// /payments/_probe.php
while (ob_get_level()) ob_end_clean();
ob_implicit_flush(true);
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('html_errors', 0);

$resp = [
    'alive'       => true,
    'php_version' => PHP_VERSION,
    'sapi'        => php_sapi_name(),
    'time'        => date('c'),
    'method'      => $_SERVER['REQUEST_METHOD'] ?? '',
    'uri'         => $_SERVER['REQUEST_URI'] ?? '',
];
header('Content-Type: application/json; charset=utf-8');
echo json_encode($resp, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
