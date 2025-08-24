<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$allowed = array('en','es','ru');

// Проверка GET параметра
if (isset($_GET['lang']) && in_array($_GET['lang'], $allowed, true)) {
    $lang = $_GET['lang'];
    setcookie('lang', $lang, time() + 86400 * 30, '/', '', false, true);
    $_SESSION['lang'] = $lang;
}

// Определяем, куда редиректить
if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != '') {
    $back = $_SERVER['HTTP_REFERER'];
} else {
    $back = '/';
}

// Защита от зацикливания на language.php
if (strpos($back, 'language.php') !== false) {
    $back = '/';
} else {
    $qPos = strpos($back, '?');
    if ($qPos !== false) {
        $back = substr($back, 0, $qPos);
    }
}

header("Location: " . $back);
exit;
