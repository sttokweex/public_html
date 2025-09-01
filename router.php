<?php
// Получаем путь из URL
$uri = urldecode(
  parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// Проверяем, существует ли запрошенный файл или директория
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
  return false; // Встроенный сервер обработает существующий файл (например, /referals/index.php)
}

// Обработка корневого пути /
if ($uri === '/' || $uri === '') {
  require_once __DIR__ . '/index.php'; // Перенаправляем на главную страницу
} elseif (preg_match('#^/slot/.+#', $uri)) {
  // Перенаправляем запросы /slot/* на slot_handler.php
  require_once __DIR__ . '/slot/gameSlot.php'; // Укажите ваш PHP-файл для слотов
} else {
  // Для всех остальных случаев возвращаем 404
  http_response_code(404);
  echo "404 Not Found";
  exit;
}
