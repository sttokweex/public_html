<?php

// Получаем путь из URL
$uri = urldecode(
  parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);



// Проверяем, существует ли запрошенный файл или директория
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
  return false; // Встроенный сервер обработает существующий файл (например, /css/ranks.css)
}

// Обработка корневого пути /
if ($uri === '/' || $uri === '') {
  require_once __DIR__ . '/index.php'; // Перенаправляем на главную страницу
} elseif (preg_match('#^/slot/api/(GetBalance|BetWin|Withdraw|Deposit|RollbackTransaction)#', $uri)) {
  // Handle API endpoints
  require_once __DIR__ . '/index.php';
  exit;
} elseif (preg_match('#^/([^/]+)#', $uri, $matches)) {
  // Проверяем, существует ли PHP-файл для первого сегмента URL
  $segment = strtolower($matches[1]);
  $fileName = $segment . '.php';
  $filePath = __DIR__ . '/' . $fileName;
  $subDirFilePath = __DIR__ . '/' . $segment . '/' . $fileName;

  // Проверяем вложенные маршруты (например, /admin/userInfo)
  if (preg_match('#^/([^/]+)/([^/]+)#', $uri, $nestedMatches)) {
    $parentSegment = strtolower($nestedMatches[1]);
    $childSegment = strtolower($nestedMatches[2]);
    $nestedFilePath = __DIR__ . '/' . $parentSegment . '/' . $childSegment . '.php';
    if (file_exists($nestedFilePath)) {
      require_once $nestedFilePath;
      exit;
    }
  }

  // Проверяем корневой или поддиректорийный PHP-файл
  if (file_exists($filePath)) {
    require_once $filePath;
  } elseif (file_exists($subDirFilePath)) {
    require_once $subDirFilePath;
  } elseif (preg_match('#^/slot/.+#', $uri)) {
    // Специальная обработка для /slot/*
    require_once __DIR__ . '/slot/gameSlot.php';
  } else {
    http_response_code(404);
    require_once __DIR__ . '/404.php';
  }
} else {
  // Для всех остальных случаев возвращаем 404
  http_response_code(404);
  require_once __DIR__ . '/404.php';
}
