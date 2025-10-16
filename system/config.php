<?php
require("connect.php");
require("carset.php");

// Начинаем сессию, если она еще не начата
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}



// Проверяем сначала сессию, затем куки
if (isset($_SESSION['lang']) && !empty($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} elseif (isset($_COOKIE['lang']) && !empty($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
}

// Проверяем, что язык разрешен
$allowed = ['en', 'es', 'ru'];
if (!in_array($lang, $allowed, true)) {
    $lang = 'en';
}

// Формируем путь к файлу перевода
$path = dirname(__DIR__, 1) . "/lang/{$lang}.php";

// Загружаем файл перевода
if (is_file($path) && is_readable($path)) {
    $translations = require $path;
} else {
    // Если файл перевода не найден, логируем ошибку и загружаем язык по умолчанию (en)
    error_log("Translation file not found or unreadable: $path");
    $path = dirname(__DIR__, 1) . "/lang/en.php";
    $translations = is_file($path) && is_readable($path) ? require $path : [];
}
