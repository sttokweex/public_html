<?php
header('Content-Type: application/json');

$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;

// Fetch games from frenzycaz.online
$ppResponseOnline = @file_get_contents('https://frenzycaz.online/slot/api/gameListPP.php', false, stream_context_create([
  'ssl' => [
    'verify_peer' => false, // ВРЕМЕННО для обхода TLS-ошибки
    'verify_peer_name' => false,
  ]
]));

if ($ppResponseOnline === false) {
  echo json_encode(['games' => [], 'hasMore' => false]);
  exit;
}

$ppDecodedOnline = json_decode($ppResponseOnline, true);
$allGames = (isset($ppDecodedOnline['data']) && is_array($ppDecodedOnline['data'])) ? $ppDecodedOnline['data'] : [];

// Track unique game IDs to avoid duplicates
$seenGameIds = [];
$uniqueGames = [];
foreach ($allGames as $game) {
  if (!isset($game['gameid']) || in_array($game['gameid'], $seenGameIds)) {
    continue;
  }
  $seenGameIds[] = $game['gameid'];
  $uniqueGames[] = $game;
}

// Slice the array to get the requested batch
$batchGames = array_slice($uniqueGames, $offset, $limit);

$games = [];
foreach ($batchGames as $game) {
  $games[] = [
    'name' => str_replace(' ', '_', $game['name']),
    'gameid' => $game['gameid'],
    'iconurl' => $game['iconurl2'] ?? $game['iconurl'],
    '__source' => 'PP_Online',
    'vendorid' => $game['vendorid'] ?? 'Pragmatic play'
  ];
}

// Check if there are more games to load
$hasMore = ($offset + $limit) < count($uniqueGames);

echo json_encode([
  'games' => $games,
  'hasMore' => $hasMore,
  'nextOffset' => $offset + $limit
]);
exit;
