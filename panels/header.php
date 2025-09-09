<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
// Определяем язык

$ppResponse = @file_get_contents('http://localhost:8940/game_list.do');
$ppDecoded = $ppResponse ? json_decode($ppResponse, true) : null;
$ppGames = (isset($ppDecoded['games']) && is_array($ppDecoded['games'])) ? $ppDecoded['games'] : [];
$games =  $ppGames;

if (empty($bets)) {
  $bets = [];
  for ($i = 0; $i < 15; $i++) {
    $game = $games[array_rand($games)];
    $betAmount = mt_rand(100, 5000000) / 100; // Random between $1 and $5,000
    $multiplier = mt_rand(0, 5000) / 100; // Random between 1.00 and 5.00
    $payout = $betAmount * $multiplier; // Random win or loss
    $bets[] = [
      'id' => uniqid(),
      'game' => $game['g_title'],
      'user' => 'Скрытый',
      'time' => date('H:i', strtotime('+' . mt_rand(0, 59) . ' minutes')),
      'bet_amount' => '$' . number_format($betAmount, 2),
      'multiplier' => number_format($multiplier, 2),
      'payout' => ($payout < 0 ? '-' : '') . '$' . number_format(abs($payout), 2)
    ];
  }
} else {
  // For existing bets, randomize game and recalculate payout
  foreach ($bets as &$bet) {
    $bet['game'] = $games[array_rand($games)];
    // Extract numeric value from bet_amount
    $betAmount = floatval(str_replace(['$', ','], '', $bet['bet_amount']));
    $multiplier = floatval(str_replace('×', '', $bet['multiplier']));
    $payout = mt_rand(0, 1) ? $betAmount * $multiplier : -$betAmount * $multiplier;
    $bet['payout'] = ($payout < 0 ? '-' : '') . '$' . number_format($payout, 2);
  }
  unset($bet); // Break reference
}

// помечаем источник, чтобы на клике знать какой auth дергать
foreach ($ppGames as &$game) {
  $game['__source'] = 'PP';
  // Устанавливаем vendorid, если его нет, например 'pragmatic'
  if (!isset($game['vendorid'])) {
    $game['vendorid'] = 'Pragmatic play';
  }
}

unset($game);

$games = $ppGames;
if (!is_array($games)) {
  $games = []; // Если API не вернул данные, используем пустой массив
}

// Для отладки: проверить содержимое сессии
// Раскомментируйте для проверки
// var_dump($_SESSION); die();

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
  // ... остальные сообщения ...
];


// Проверка реферального параметра
$refer = isset($_GET['i']) ? $_GET['i'] : '';
if ($refer !== '') {
  $_SESSION['ref'] = $refer;
  session_write_close(); // Сохранить данные сессии перед редиректом
  header('Location: /');
  exit;
}

// Проверка соединения с базой данных
if (!isset($connection) || !$connection) {
  die("Ошибка соединения с базой данных: " . mysqli_connect_error());
}

// Проверка сессии
$sid = isset($_SESSION['hash']) ? $_SESSION['hash'] : '';
$login = isset($_SESSION['login']) ? $_SESSION['login'] : '';

if ($sid) {
  // Используем подготовленные выражения для защиты от SQL-инъекций
  $select = "SELECT * FROM users WHERE hash = ?";
  $stmt = $connection->prepare($select);
  $stmt->bind_param("s", $sid);
  $stmt->execute();
  $result = $stmt->get_result();
  $get = $result->fetch_assoc();

  if ($get) {
    $login = $get['login'] ?? '';
    $wager = $get['wager'] ?? 0;
    $star_limit = $get['star_limit'] ?? 0;
    $balance = isset($get['balance']) ? round($get['balance'], 2) : 0;
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
  } else {
    // Значения по умолчанию, если пользователь не найден
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
  }
}

// Проверка депозитов
$depositesSID = 0;
if ($sid) {
  $getDepsForLevel = "SELECT SUM(amount) FROM deposits WHERE hash_user = ?";
  $stmt = $connection->prepare($getDepsForLevel);
  $stmt->bind_param("s", $sid);
  $stmt->execute();
  $result = $stmt->get_result();
  $leveldeposits = $result->fetch_assoc();
  $depositesSID = $leveldeposits['SUM(amount)'] ?? 0;
}

// Установка рангов
if ($depositesSID < 2000) {
  $cashback_rankt = '0';
  $rakeback_rank = "0.1";
  $bonusdr = 0;
} elseif ($depositesSID >= 10000) {
  $cashback_rankt = '3';
  $rakeback_rank = "0.2";
  $bonusdr = 0;
} elseif ($depositesSID >= 50000) {
  $cashback_rankt = '5';
  $rakeback_rank = "0.3";
  $bonusdr = 500;
} elseif ($depositesSID >= 100000) {
  $cashback_rankt = '7';
  $rakeback_rank = "0.4";
  $bonusdr = 1000;
} elseif ($depositesSID >= 500000) {
  $cashback_rankt = '10';
  $rakeback_rank = "0.5";
  $bonusdr = 5000;
}

$wager = isset($wager) ? round($wager, 2) : 0;

if (isset($is_ban) && $is_ban == 1) {
  header('Location: /ban');
  exit;
}

$is_teh = isset($is_teh) ? $is_teh : 0;
if ($is_teh == 1 && $is_admin == 0) {
  header('Location: /teh');
  exit;
}

$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>

<!-- HTML-код -->


<head>
  <meta charset="utf-8">
  <meta name="author" content="termus">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../images/logo-mob.svg" type="image/png">
  <meta name="description" content="<?= htmlspecialchars($sitename) ?> - Holland Casino">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="/css/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/toastr.css" crossorigin="anonymous" />
  <link href="/css/livefeed.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/banners.css">
  <link href="/css/header.css" rel="stylesheet">
  <link href="/css/index.css" rel="stylesheet">
  <link href="/css/modal.css" rel="stylesheet">
  <link href="/css/chat.css" rel="stylesheet">
  <link href="/css/game_materials.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/slider.css">
  <link href="/css/footer.css" rel="stylesheet">
  <link href="/css/sidebar.css" rel="stylesheet">
  <link href="/css/gameInfo.css" rel="stylesheet">
  <link href="/css/search.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/jquery.dataTables.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js" crossorigin="anonymous"></script>
  <script src="/js/toastr.min.js" crossorigin="anonymous"></script>
  <script src="/js/custom.js?v=43" crossorigin="anonymous"></script>
  <script src="/js/swiper-bundle.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>

  <title><?= strtoupper($sitename); ?> - Holland Casino!</title>
</head>
<style>
  .loader {
    border: 4px solid #ffffff3b;
    border-top-color: #ffffff;
    border-radius: 50%;
    width: 48px;
    height: 48px;
    -webkit-animation: loader-spins 2s linear infinite;
    animation: loader-spins 2s linear infinite;
    display: flex;
    margin: 0 auto;
  }

  @keyframes loader-spins {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(3turn);
    }
  }
</style>


<input id="hashdeps" class="d-none" value="<?= htmlspecialchars($depositesSID) ?>">
<input id="hash_lock" class="d-none" value="<?= htmlspecialchars($lock_save) ?>">

<!-- HEADER -->
<div id="header" class="headerproject" style="user-select:none;">

  <div class="header-content">

    <div class="header-left-section" data-content="">
      <a href="/" target="_self">
        <img alt="Holland Casino Logo"></img>
      </a>
    </div>
    <nav class="header-navigation">
      <ul class="header-nav-list">
        <li class="nav-list-item">
          <span class="nav-list-item-innetText">Online</span>
          <span class="nav-list-item-image icon-x96"></span>
        </li>
        <li class="nav-list-item">
          <span class="nav-list-item-innetText">About us</span>
          <span class="nav-list-item-image icon-x96"></span>
        </li>
        <li class="nav-list-item">
          <span class="nav-list-item-innetText">Play Responsibly</span>
          <span class="nav-list-item-image icon-x96"></span>
        </li>
      </ul>
    </nav>
    <div class="header-right-section">
      <span class="header-search">
        <span class="header-search-icon icon-x96" role="img"></span>
      </span>
      <button class="header-login-button header-auth" onClick="$('#authorization').modal('show');">Login</button>
      <a class="header-register-button header-auth" onClick="event.preventDefault(); $('#registration').modal('show');">Register</a>
    </div>

  </div>
</div>







<?php require("modal.php"); ?>