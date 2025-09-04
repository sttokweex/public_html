<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Определяем язык
if (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} elseif (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
} else {
    $lang = 'en';
}

$allowed = array('en', 'es', 'ru');
if (!in_array($lang, $allowed, true)) {
    $lang = 'en';
}

// Подключаем файл перевода (в той же директории)
$path = __DIR__ . "/" . $lang . ".php";
if (is_file($path)) {
    $translations = require $path;
} else {
    $translations = require __DIR__ . "/ru.php";
}

// Отдаём JSON
header('Content-Type: application/json; charset=utf-8');
echo json_encode($translations, JSON_UNESCAPED_UNICODE);
exit;
