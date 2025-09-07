<?
require("connect.php");
require("carset.php");
// Определяем язык
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

// Load translation file
$path = dirname(__DIR__, 1) . "/lang/{$lang}.php";
if (is_file($path) && is_readable($path)) {
  $translations = require $path;
} else {
  error_log("Translation file not found or unreadable: $path");
  $translations = dirname(__DIR__, 1) . "/lang/ru.php";
}
