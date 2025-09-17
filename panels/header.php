<?php


require_once __DIR__ . '/search.php';
$currency_svg = '<svg fill="none" viewBox="0 0 96 96" class="svg-icon">
    <path fill="#FFC800" d="M48 96c26.51 0 48-21.49 48-48S74.51 0 48 0 0 21.49 0 48s21.49 48 48 48"></path>
    <path fill="#473800" d="M48.158 21.922c10.16 0 16.56 4.92 20.32 10.72l-8.68 4.72c-2.28-3.44-6.48-6.16-11.64-6.16-8.88 0-15.36 6.84-15.36 16.12s6.48 16.12 15.36 16.12c4.48 0 8.44-1.84 10.6-3.76v-5.96h-13.08v-8.96h23.4v18.76c-5 5.6-12 9.28-20.88 9.28-14.32 0-26.12-10-26.12-25.44s11.76-25.36 26.12-25.36z"></path>
</svg>';

$dropdown_svg = '<svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon">
    <path d="M32.274 49.762 9.204 26.69l6.928-6.93 16.145 16.145L48.42 19.762l6.93 6.929-23.072 23.07z"></path>
</svg>';

$sampleMessages = [
  ['sender' => 'Иван', 'text' => 'Привет, как дела?'],
  ['sender' => 'Мария', 'text' => 'Отлично, а у тебя?'],
  ['sender' => 'Иван', 'text' => 'Привет, как дела?'],
  ['sender' => 'Мария', 'text' => 'Отлично, а у тебя?'],
  ['sender' => 'Иван', 'text' => 'Привет, как дела?'],
  ['sender' => 'Мария', 'text' => 'Отлично, а у тебя?'],
  ['sender' => 'Иван', 'text' => 'Привет, как дела?'],
  ['sender' => 'Мария', 'text' => 'Отлично, а у тебя?'],
  ['sender' => 'Иван', 'text' => 'Привет, как дела?'],
  ['sender' => 'Мария', 'text' => 'Отлично, а у тебя?'],
  ['sender' => 'Иван', 'text' => 'Привет, как дела?'],
  ['sender' => 'Мария', 'text' => 'Отлично, а у тебя?'],
  ['sender' => 'Иван', 'text' => 'Привет, как дела?'],
  ['sender' => 'Мария', 'text' => 'Отлично, а у тебя?'],
  ['sender' => 'Иван', 'text' => 'Привет, как дела?'],
  ['sender' => 'Мария', 'text' => 'Отлично, а у тебя?'],
  ['sender' => 'Иван', 'text' => 'Привет, как дела?'],
  ['sender' => 'Мария', 'text' => 'Отлично, а у тебя?'],
  ['sender' => 'Иван', 'text' => 'Привет, как дела?'],
  ['sender' => 'Мария', 'text' => 'Отлично, а у тебя?'],
  ['sender' => 'Иван', 'text' => 'Привет, как дела?'],
  ['sender' => 'Мария', 'text' => 'Отлично, а у тебя?'],
  ['sender' => 'Иван', 'text' => 'Привет, как дела?'],
  ['sender' => 'Мария', 'text' => 'Отлично, а у тебя?'],
];

$games = [];
$cacheTTL = 300; // 5 минут

// Кэширование в сессию
// if (isset($_SESSION['games_cache']) && isset($_SESSION['games_cache_time']) && (time() - $_SESSION['games_cache_time']) < $cacheTTL) {
//   $games = $_SESSION['games_cache'];
// } else {
// Игры с 5.129.253.12:2002
$ppResponseLocal = @file_get_contents('http://5.129.253.12:2002/game_list.do');
if ($ppResponseLocal !== false) {
  $ppDecodedLocal = json_decode($ppResponseLocal, true);
  $ppGames = (isset($ppDecodedLocal['games']) && is_array($ppDecodedLocal['games'])) ? $ppDecodedLocal['games'] : [];
  foreach ($ppGames as $game) {
    $games[] = [
      'name' => $game['g_title'],
      'gameid' => $game['g_id'],
      'iconurl' => $game['g_icon'] ?? '../images/slotsPreviews/' . str_replace(' ', '', $game['g_title']) . '.jpg',
      '__source' => 'PP_Local',
      'vendorid' => 'Pragmatic play custom'
    ];
  }
}

function fetchWithRetry($url, $context, $maxRetries = 3, $retryDelay = 1)
{
  $attempt = 0;
  while ($attempt < $maxRetries) {
    $response = @file_get_contents($url, false, $context);
    if ($response !== false) {
      return $response;
    }
    $attempt++;
    if ($attempt < $maxRetries) {
      sleep($retryDelay);
    }
  }
  return false;
}

// Игры с frenzycaz.online
$ppResponseOnline = fetchWithRetry('https://frenzycaz.online/slot/api/gameListPP.php', stream_context_create([
  'ssl' => [
    'verify_peer' => false,
    'verify_peer_name' => false,
  ]
]));
if ($ppResponseOnline !== false) {
  $ppDecodedOnline = json_decode($ppResponseOnline, true);
  $allGames = (isset($ppDecodedOnline['data']) && is_array($ppDecodedOnline['data'])) ? $ppDecodedOnline['data'] : [];
  foreach ($allGames as $game) {
    $games[] = [
      'name' => str_replace(' ', '_', $game['name']),
      'gameid' => $game['gameid'],
      'iconurl' => $game['iconurl2'] ?? $game['iconurl'],
      '__source' => 'PP_Online',
      'vendorid' => $game['vendorid'] ?? 'Pragmatic play'
    ];
  }
}

//   // Сохраняем в сессию
//   $_SESSION['games_cache'] = $games;
//   $_SESSION['games_cache_time'] = time();
// }

if (empty($bets)) {
  $bets = [];
  for ($i = 0; $i < 15; $i++) {
    $game = $games[array_rand($games)] ?? ['name' => 'Unknown Game'];
    $betAmount = mt_rand(100, 5000000) / 100;
    $multiplier = mt_rand(0, 5000) / 100;
    $payout = $betAmount * $multiplier;
    $bets[] = [
      'id' => uniqid(),
      'game' => $game['name'],
      'user' => 'Скрытый',
      'time' => date('H:i', strtotime('+' . mt_rand(0, 59) . ' minutes')),
      'bet_amount' => '$' . number_format($betAmount, 2),
      'multiplier' => number_format($multiplier, 2),
      'payout' => ($payout < 0 ? '-' : '') . '$' . number_format(abs($payout), 2)
    ];
  }
} else {
  foreach ($bets as &$bet) {
    $bet['game'] = $games[array_rand($games)]['name'] ?? 'Unknown Game';
    $betAmount = floatval(str_replace(['$', ','], '', $bet['bet_amount']));
    $multiplier = floatval(str_replace('×', '', $bet['multiplier']));
    $payout = $betAmount * $multiplier;
    $bet['payout'] = ($payout < 0 ? '-' : '') . '$' . number_format($payout, 2);
  }
  unset($bet);
}

if (empty($games)) {
  $games = [];
}

// Проверка реферального параметра
if (!empty($_GET['i'])) {
  $_SESSION['ref'] = $_GET['i'];
  header('Location: /');
  exit;
}

// Проверка соединения с базой данных
if (!isset($connection) || !$connection) {
  die("Ошибка соединения с базой данных: " . mysqli_connect_error());
}

// Проверка сессии
$sid = $_SESSION['hash'] ?? '';
$login = $_SESSION['login'] ?? '';

if ($sid) {
  $query = "SELECT u.*, COALESCE(SUM(d.amount), 0) as total_deposits 
              FROM users u 
              LEFT JOIN deposits d ON u.hash = d.hash_user 
              WHERE u.hash = ? 
              GROUP BY u.id";
  $stmt = $connection->prepare($query);
  $stmt->bind_param("s", $sid);
  $stmt->execute();
  $result = $stmt->get_result();
  $get = $result->fetch_assoc();

  if ($get) {
    $login = $get['login'] ?? '';
    $wager = round($get['wager'] ?? 0, 2);
    $star_limit = $get['star_limit'] ?? 0;
    $balance = round($get['balance'] ?? 0, 2);
    $id = $get['id'] ?? 0;
    $social_link = $get['social'] ?? '';
    $is_admin = $get['admin'] ?? 0;
    $is_ban = $get['ban'] ?? 0;
    $img = $get['img'] ?? '';
    $usersRef = $get['refs'] ?? 0;
    $refearn = $get['refearn'] ?? 0;
    $refuser = $get['ref_id'] ?? 0;
    $data_reg = $get['data_reg'] ?? '';
    $rakeback = $get['rakeback'] ?? 0;
    $cashback = $get['cashback'] ?? 0;
    $total_send = $get['total_send'] ?? 0;
    $total_rakeback = $get['total_rakeback'] ?? 0;
    $total_cashback = $get['total_cashback'] ?? 0;
    $total_promo = $get['total_promo'] ?? 0;
    $birthday = $get['birthday'] ?? '';
    $birth_bon = $get['birth_bon'] ?? 0;
    $real_name = $get['name'] ?? '';
    $real_surname = $get['surname'] ?? '';
    $real_country = $get['country'] ?? '';
    $real_town = $get['town'] ?? '';
    $real_email = $get['email'] ?? '';
    $real_telephone = $get['telephone'] ?? '';
    $lock_save = $get['lock_save'] ?? 0;
    $tgid = $get['tg_id'] ?? '';
    $ref_deps = $get['ref_deps'] ?? 0;
    $ref_deps_sum = $get['ref_deps_sum'] ?? 0;
    $depositesSID = $get['total_deposits'] ?? 0;
  } else {
    $login = '';
    $wager = 0;
    $star_limit = 0;
    $balance = 0;
    $id = 0;
    $social_link = '';
    $is_admin = 0;
    $is_ban = 0;
    $img = '';
    $usersRef = 0;
    $refearn = 0;
    $refuser = 0;
    $data_reg = '';
    $rakeback = 0;
    $cashback = 0;
    $total_send = 0;
    $total_rakeback = 0;
    $total_cashback = 0;
    $total_promo = 0;
    $birthday = '';
    $birth_bon = 0;
    $real_name = '';
    $real_surname = '';
    $real_country = '';
    $real_town = '';
    $real_email = '';
    $real_telephone = '';
    $lock_save = 0;
    $tgid = '';
    $ref_deps = 0;
    $ref_deps_sum = 0;
    $depositesSID = 0;
  }
} else {
  $depositesSID = 0;
}

// Установка рангов


// if ($is_ban == 1) {
//   header('Location: /ban');
//   exit;
// }

$is_teh = $is_teh ?? 0;
if ($is_teh == 1 && $is_admin == 0) {
  header('Location: /teh');
  exit;
}

$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<html lang="<?= htmlspecialchars($lang, ENT_QUOTES, 'UTF-8') ?>">

<head>
  <meta charset="utf-8">
  <meta name="author" content="termus">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../images/logo-mob.svg" type="image/png">
  <meta name="description" content="<?= htmlspecialchars($sitename) ?> - stake!">
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" as="style" onload="this.rel='stylesheet'">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="/css/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/toastr.css" crossorigin="anonymous" />
  <link href="/css/livefeed.css" rel="stylesheet">
  <link href="/css/header.css" rel="stylesheet">
  <link href="/css/index.css" rel="stylesheet">
  <link href="/css/modal.css" rel="stylesheet">
  <link href="/css/ranks.css" rel="stylesheet">
  <link href="/css/chat.css" rel="stylesheet">
  <link href="/css/game_materials.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/slider.css">
  <link href="/css/footer.css" rel="stylesheet">
  <link href="/css/sidebar.css" rel="stylesheet">
  <link href="/css/gameInfo.css" rel="stylesheet">
  <link href="/css/search.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/jquery.dataTables.min.css" />
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="/js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js" crossorigin="anonymous"></script>
  <script src="/js/toastr.min.js" crossorigin="anonymous"></script>
  <script src="/js/custom.js?v=43" crossorigin="anonymous"></script>
  <script src="/js/swiper-bundle.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
  <title><?= strtoupper($sitename); ?> - stake!</title>
</head>

<style>
  .loader {
    border: 4px solid #ffffff3b;
    border-top-color: #ffffff;
    border-radius: 50%;
    width: 48px;
    height: 48px;
    animation: loader-spins 2s linear infinite;
  }

  @keyframes loader-spins {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }
</style>

<div id="header" class="headerproject" style="user-select:none;">
  <div class="header-content">
    <div class="header-search"><?php renderSearch($games, $translations); ?></div>
    <div class="wrap normal" data-content="">
      <a href="/">
        <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 200" class="svelte-md2ju7">
          <g id="Layer_5">
            <path fill="currentColor" d="M31.47,58.5c-.1-25.81,16.42-40.13,46.75-40.23,21.82-.08,25.72,14.2,25.72,19.39,0,9.94-14.06,20.48-14.06,20.48,0,0,.78,6.19,12.85,6.14,12.07-.05,23.83-8.02,23.76-27.96-.06-22.91-24.06-33.38-47.78-33.29C58.87,3.09,6.24,5.88,6.42,58.13c.18,46.41,87.76,50.5,87.83,80.21.12,32.27-36.08,40.96-48.33,40.96s-17.23-8.67-17.25-13.43c-.09-26.13,25.92-33.41,25.92-33.41,0-1.95-1.52-10.64-11.59-10.6-25.95.05-36.28,22.36-36.21,44.14.07,18.53,13.16,30.09,32.94,30.01,37.82-.14,80.46-18.59,80.3-59.56-.14-38.32-88.46-48.33-88.57-77.96Z"></path>
            <path fill="currentColor" d="M391.96,161.17c-.3-.73-1.15-.56-2.27.37-4.29,3.54-14.1,13.56-37.06,13.65-41.85.16-49.12-68.83-49.12-68.83,0,0,31.9-23.81,36.88-33.42,4.98-9.61-10.87-11.7-10.87-11.7,0,0-22.31,27.15-38.13,35.1,1.72-11.81,13.42-38.72,14.09-54.2.67-15.48-18.63-11.7-21.72-10.22,0,6.76-17.06,68.1-23.27,101.82-3.66,5.85-8.88,12.54-13.56,12.55-2.71,0-3.71-5.02-3.73-12.22,0-9.99,5.5-25.99,5.46-35.71,0-6.73-3.09-7.13-5.75-7.12-.58,0-3.77.09-4.36.09-6.83,0-4.58-5.85-10.73-5.79-18.8.07-42.75,20.59-43.79,51.57-6.35,4.2-15.23,9.5-19.77,9.52-4.76,0-5.94-4.4-5.95-8.2,0-6.68,10.8-46.37,10.8-46.37,0,0,13.76-3.53,19.77-4.69,4.54-.89,5.85-1.22,7.62-3.41s5.22-6.73,8.01-10.8c2.79-4.08.05-7.23-5.11-7.21-6.77,0-24.88,4.29-24.88,4.29,0,0,8.7-37.5,8.69-38.26s-.98-1.16-2.45-1.15c-3.3,0-9.18,1.77-12.94,3.12-5.76,2.06-10.45,9.12-11.4,12.4s-7.46,29.02-7.46,29.02,0,0-34.88,12.04-39.65,13.85-.29.1-.49.37-.49.68s3.99,15.6,12.17,15.54c5.85,0,23.04-7.04,23.04-7.04,0,0-8.83,35.1-8.78,46.81,0,7.51,3.54,16.3,18.21,16.26,13.65,0,25.6-7.05,32.29-11.96,3.66,9.25,12.3,11.79,18.2,11.77,13.22,0,23.4-10.55,24.71-11.96,1.72,4.06,5.76,11.85,15.01,11.82,5.23,0,10.64-5.85,14.63-11.53-.08,1.18-.06,2.36.05,3.54,1.6,14.55,23.2,6,24.38,3.97.73-10.52.27-32.03,4.48-45.31,5.58,45.3,26.74,75.78,64.78,75.64,21.27-.08,32.18-6.19,36.69-11.23,3.69-4.08,4.94-9.81,3.29-15.06ZM209.45,146.23c-18.26.07,5.59-47.27,21.17-47.33.02,6.1-.32,47.26-21.17,47.33Z"></path>
            <path fill="currentColor" d="M357.73,160.74c16.49-.06,29.25-10.91,31.59-14.44,3.02-4.59-3.51-11.53-5.59-11.41-5.21,4.98-10.65,11.01-22.87,11.05-14.38.06-11.13-15.77-11.13-15.77,0,0,27.68,3.58,38.81-16.32,3.56-6.37,3.71-15.17,2.27-18.97s-9.49-10.81-22.3-9.75c-15.74,1.33-35.57,17.74-39.93,37.45-3.5,15.86,3.12,38.26,29.14,38.17ZM375.28,94.33c2.59-.09,2.36,4.18,1.67,8.65-.98,6.06-9.29,21.45-25.17,20.85,1.1-8.96,12.91-29.15,23.53-29.5h-.03Z"></path>
          </g>
        </svg>
      </a>
    </div>
    <?php if (!empty($_SESSION['login'])) { ?>
      <div class="balance-container">
        <div class="balance-toggle">
          <div class="balance-coin-toggle">
            <div class="balance-currency-view">
              <div class="balance-dropdown">
                <button type="button" class="balance-dropdown-button" aria-label="Open Dropdown">
                  <span class="balance-currency">
                    <span class="balance-balance"><?php echo htmlspecialchars($balance); ?></span>
                    <span class="balance-currency-name"><?php echo $currency_svg; ?></span>
                  </span>
                  <?php echo $dropdown_svg; ?>
                </button>
                <div class="balance-dropdown-menu">
                  <a href="?currency=gold" class="balance-dropdown-item">Gold</a>
                  <a href="?currency=USD" class="balance-dropdown-item">USD</a>
                  <a href="?currency=RUB" class="balance-dropdown-item">RUB</a>
                </div>
              </div>
            </div>
          </div>
          <button type="button" class="balance-wallet-button"><?php echo htmlspecialchars($translations['wallet']) ?></button>
        </div>
      </div>
    <?php } ?>
    <div class="header_Navigation">
      <?php $currentLang = in_array($lang, ['en', 'es', 'ru'], true) ? $lang : 'en'; ?>
      <?php if (empty($_SESSION['login'])) { ?>
        <div class="balance_Container">
          <div class="auth-buttons">
            <button id="auth-button" type="button" onClick="$('#authorization').modal('show');" class="login_Button font-semibold"><?= $translations['login'] ?></button>
            <button id="auth-button" type="button" onClick="$('#registration').modal('show');" class="register_Button font-semibold"><?= $translations['register'] ?></button>
          </div>
        </div>
      <?php } else { ?>
        <div class="header_RightBlock">
          <button class="header-anchor open-search">
            <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon">
              <path d="M63.999 56.219 56.217 64 38.55 46.328a28 28 0 0 0 7.777-7.777zM23.1 0a23.1 23.1 0 1 1-.003 46.2A23.1 23.1 0 0 1 23.1 0m5.317 10.258a13.9 13.9 0 0 0-8.032-.79 13.9 13.9 0 0 0-7.117 3.802 13.9 13.9 0 0 0-3.8 7.117 13.9 13.9 0 0 0 .789 8.031 13.903 13.903 0 0 0 22.672 4.512 13.9 13.9 0 0 0-4.512-22.672"></path>
            </svg>
            <span><?php echo $translations['find'] ?></span>
          </button>
          <button class="header-dropdown header-anchor">
            <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon">
              <path d="M50.84 38.191A19.84 19.84 0 0 1 64 56.86V64H0v-7.14a19.84 19.84 0 0 1 13.16-18.67 26.6 26.6 0 0 0 8.645 5.778A26.6 26.6 0 0 0 32 46a26.6 26.6 0 0 0 10.195-2.031 26.6 26.6 0 0 0 8.645-5.778M32 0a19.62 19.62 0 0 1 18.137 12.117 19.632 19.632 0 0 1-21.965 26.766A19.635 19.635 0 0 1 12.746 23.46 19.63 19.63 0 0 1 32 0"></path>
            </svg>
            <div class="dropdown-menu">
              <a id="gamesBox" href="/slot" class="dropdown-item"><?php echo $translations['games'] ?></a>
              <a id="bonusBox" href="/bonus" class="dropdown-item"><?php echo $translations['bonus'] ?></a>
              <a id="refsBox" href="/referals" class="dropdown-item"><?php echo $translations['referals'] ?></a>
              <a id="supportBox" href="https://t.me/stakesupports" class="dropdown-item"><?php echo $translations['support'] ?></a>
              <a id="ranksBox" href="/ranks" class="dropdown-item"><?php echo $translations['ranks'] ?></a>
              <a id="profile" href="/profile" class="dropdown-item"><?php echo $translations['profile'] ?></a>
              <?php if ($is_admin == 1) { ?>
                <a href="/admin" type="button" class="dropdown-item"><?= $translations['admin_panel'] ?></a>
              <?php } ?>
            </div>
          </button>
          <button class="header-anchor header-chat-close">
            <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon">
              <path d="M32 1.914c-.288-.01-.628-.016-.97-.016C14.254 1.898.586 15.204.002 31.838L0 31.892a28.66 28.66 0 0 0 7.476 19.256l-.02-.024c-.688 4.028-1.89 7.636-3.552 10.974l.102-.228c4.634-.396 8.878-1.73 12.654-3.81l-.164.082c4.474 2.35 9.774 3.728 15.398 3.728h.112H32c.3.01.654.016 1.008.016 16.768 0 30.428-13.31 30.99-29.942l.002-.052C63.414 15.204 49.746 1.9 32.97 1.9q-.512 0-1.018.016l.05-.002zM16.138 37.602a5.948 5.948 0 1 1 0-11.896 5.948 5.948 0 0 1 0 11.896m15.862 0a5.948 5.948 0 1 1 0-11.896 5.948 5.948 0 0 1 0 11.896m15.862 0a5.948 5.948 0 1 1 0-11.896 5.948 5.948 0 0 1 0 11.896"></path>
            </svg>
          </button>
        </div>
      <?php } ?>
    </div>
  </div>
</div>

<script>
  if (location.pathname == "/slot") {
    document.getElementById('gamesBox').className += ' activeBox';
  }
  if (location.pathname == "/bonus") {
    document.getElementById('bonusBox').className += ' activeBox';
  }
  if (location.pathname == "/referals") {
    document.getElementById('refsBox').className += ' activeBox';
  }
  if (location.pathname == "/ranks") {
    document.getElementById('ranksBox').className += ' activeBox';
  }
</script>
<script>
  $(document).ready(function() {
    $('.balance-dropdown-button').on('click', function(e) {
      e.stopPropagation();
      $('.balance-dropdown-menu').toggleClass('active');
    });

    $(document).on('click', function(e) {
      if (!$(e.target).closest('.balance-dropdown').length) {
        $('.balance-dropdown-menu').removeClass('active');
      }
    });

    $('.balance-wallet-button').on('click', function() {
      window.location.href = '/wallet';
    });

    $('.header-chat-close').on('click', function() {
      var $chat = $('.chat-container');
      $chat.toggleClass('closed');
      $('body').toggleClass('chat');
    });

    $('.open-search').on('click', function(e) {
      e.stopPropagation();
      var $search = $('.header-search');
      $search.toggleClass('is-open');
      $search.find('.home-input-wrap input').focus();
    });

    $('.header-dropdown').on('click', function(e) {
      e.stopPropagation();
      $('.dropdown-menu').toggleClass('active');
    });

    $(document).on('click', function(e) {
      if (!$(e.target).closest('.header-dropdown').length) {
        $('.dropdown-menu').removeClass('active');
      }
    });

    var sel = document.getElementById('langSelect');
    if (sel) {
      sel.addEventListener('change', function() {
        var lang = this.value;
        window.location.href = '/language.php?lang=' + encodeURIComponent(lang);
      });
    }

    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('register') === '1') {
      $('#authorization').modal('show');
      if (history.replaceState) {
        const newUrl = window.location.origin + window.location.pathname;
        history.replaceState(null, '', newUrl);
      }
    }
  });
</script>

<?php require("modal.php"); ?>