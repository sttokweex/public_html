<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}



// Определяем язык (Language is already handled by session or default)

$games = [];
$cacheTTL = 300; // 5 минут

// Кэширование в сессию
// if (isset($_SESSION['games_cache']) && isset($_SESSION['games_cache_time']) && (time() - $_SESSION['games_cache_time']) < $cacheTTL) {
//   $games = $_SESSION['games_cache'];
// } else {
// Игры с 5.129.253.12:2002


// Кэширование в сессию
// if (isset($_SESSION['games_cache']) && isset($_SESSION['games_cache_time']) && (time() - $_SESSION['games_cache_time']) < $cacheTTL) {
//   $games = $_SESSION['games_cache'];
// } else {
// Игры с 5.129.253.12:2002
$ppResponseLocal = fetchWithRetry('http://5.129.253.12:2002/game_list.do');
if ($ppResponseLocal !== false) {
  $ppDecodedLocal = json_decode($ppResponseLocal, true);
  $ppGames = (isset($ppDecodedLocal['games']) && is_array($ppDecodedLocal['games'])) ? $ppDecodedLocal['games'] : [];
  foreach ($ppGames as $game) {
    $games[] = [
      'name' => $game['g_title'],
      'gameid' => $game['g_id'],
      'iconurl' => $game['g_icon'] ?? '../images/SlotsPreviews/' . str_replace(' ', '', $game['g_title']) . '.jpg',
      '__source' => 'PP_Local',
      'vendorid' => 'Pragmatic play custom'
    ];
  }
}

// Игры с frenzycaz.online
$excludedGames = [
  'Starlight_Princess',
  'Sweet_Bonanza',
  'Gates_of_Olympus',
  'The_Dog_House',
  'Pirate_Gold',
  'Great_Rhino',
  'Monkey_Warrior',
  'The_Dog_House_Megaways'
];
$ppResponseOnline = fetchWithRetry('https://frenzycaz.online/slot/api/gameListPP.php');
if ($ppResponseOnline !== false) {
  $ppDecodedOnline = json_decode($ppResponseOnline, true);
  $allGames = (isset($ppDecodedOnline['data']) && is_array($ppDecodedOnline['data'])) ? $ppDecodedOnline['data'] : [];
  foreach ($allGames as $game) {
    // Пропускаем игры с исключёнными именами
    $gameName = str_replace(' ', '_', $game['name']);
    if (in_array($gameName, $excludedGames)) {
      continue;
    }
    $games[] = [
      'name' => $gameName,
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



if (empty($games)) {
  $games = [];
}

function fetchWithRetry($url, $maxRetries = 6, $retryDelay = 1, $timeout = 5)
{
  $attempt = 0;
  while ($attempt < $maxRetries) {
    $context = stream_context_create([
      'http' => [
        'timeout' => $timeout // Устанавливаем таймаут 5 секунд на запрос
      ]
    ]);
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


require_once __DIR__ . '/search.php';
$currency_svg = '<svg fill="none" viewBox="0 0 96 96" class="svg-icon">
    <path fill="#FFC800" d="M48 96c26.51 0 48-21.49 48-48S74.51 0 48 0 0 21.49 0 48s21.49 48 48 48"></path>
    <path fill="#473800" d="M48.158 21.922c10.16 0 16.56 4.92 20.32 10.72l-8.68 4.72c-2.28-3.44-6.48-6.16-11.64-6.16-8.88 0-15.36 6.84-15.36 16.12s6.48 16.12 15.36 16.12c4.48 0 8.44-1.84 10.6-3.76v-5.96h-13.08v-8.96h23.4v18.76c-5 5.6-12 9.28-20.88 9.28-14.32 0-26.12-10-26.12-25.44s11.76-25.36 26.12-25.36z"></path>
</svg>';

$dropdown_svg = '<svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon">
    <path d="M32.274 49.762 9.204 26.69l6.928-6.93 16.145 16.145L48.42 19.762l6.93 6.929-23.072 23.07z"></path>
</svg>';

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
  die($translations['database_connection_error'] . mysqli_connect_error());
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
<style>
  .hl-loader {
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
  }

  .hl-loader,
  .hl-loader .hl-loader-circle {
    position: absolute;
    width: 100px;
    height: 100px;
  }

  .hl-loader .hl-loader-circle {
    background: #fff;
    box-sizing: border-box;
    border: 2px solid #fff;
    border-radius: 100%;
    box-shadow: 0 -41px 0 44px #011c38 inset;
    animation: rotate 1s infinite linear;
  }

  .hl-loader .hl-loader-cross,
  .hl-loader .hl-loader-roulette {
    width: 100px;
    height: 100px;
    position: absolute;
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;
  }

  .hl-loader .hl-loader-roulette {
    background-image: url(../images/loader-roulette.svg);
    animation: spin 1s linear infinite;
  }

  .hl-loader .hl-loader-cross {
    background-image: url(../images/loader-cross.svg);
    animation: spin-cross 5s linear infinite;
  }

  .loader {
    background-color: #011c38;
    width: 100%;
    height: 100%;
    z-index: 2000;
    position: relative;
  }

  @keyframes spin-cross {
    100% {
      transform: rotate(-360deg);
    }
  }

  @keyframes spin {
    100% {
      transform: rotate(360deg);
    }
  }

  @keyframes rotate {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(-360deg);
    }
  }
</style>

<head>
  <meta charset="utf-8">
  <meta name="author" content="termus">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../images/logo-mob.svg" type="image/png">
  <link rel="preload" href="../images/loader-roulette.svg" as="image">
  <link rel="preload" href="../images/loader-cross.svg" as="image">
  <meta name="description" content="<?= htmlspecialchars($sitename) ?> - <?= $translations['holland_casino'] ?>">
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

  <title><?= strtoupper($sitename); ?> - <?= $translations['holland_casino'] ?>!</title>
</head>
<input id="hashdeps" class="d-none" value="<?= htmlspecialchars($depositesSID) ?>">
<div class="loader">
  <div class="hl-loader">
    <div class="hl-loader-circle"></div>
    <div class="hl-loader-roulette"></div>
    <div class="hl-loader-cross"></div>
  </div>
</div>
<!-- HEADER -->
<div id="header" class="headerproject" style="user-select:none;">
  <div class="header-content">
    <div class="Header__fadingContainer--1hB"></div>
    <div class="header-left-section" data-content="">
      <span class="Icon__icon--x96 Icon__close-medium--2c4 Icon__medium--DLa Icon__active--1EL MobileMenu__menuIcon--1Gb" role="img" aria-label="icon_close-medium" style="display: none;"></span>
      <span class="Icon__icon--x96 Icon__navigation-menu--R7v Icon__medium--DLa MobileMenu__menuIcon--1Gb" role="img" aria-label="icon_navigation-menu"></span>
      <a href="/" target="_self">
        <img alt="<?= $translations['holland_casino_logo'] ?>" loading="lazy" src="/images/logo-mob.svg"></img>
      </a>
    </div>
    <div class="GamesSearch__active--3Df">
      <div class="GridRow__colsRow--JL1 GamesSearch__gridRow--1xF">
        <div class="col-mob-4 col-dsk-2"></div>
        <div class="col-mob-4 col-dsk-8">
          <div class="GamesSearch__inputWrapper--1s1">
            <div class="GamesSearch__inputContainer--1pZ"><input class="components__input--2w4 GamesSearch__input--AJm" placeholder="<?= $translations['search_for_games'] ?>" value=""><span class="GamesSearch__inputIconContainer--2mR"><span class="Icon__icon--x96 Icon__search--1AY Icon__medium--DLa Icon__isRound--3vi GamesSearch__icon--1P6 undefined" role="img" aria-label="icon_search"></span></span></div>
          </div>
        </div>
        <div class="col-mob-4 col-dsk-2 GamesSearch__closeButtonContainer--3Pf"><button class="PlainText__text--1wg PlainText__small--2s0 LabeledCloseButton__close--2kg GamesSearch__closeBtn--1IO PlainText__dark--3fd"><?= $translations['close'] ?><span class="Icon__icon--x96 Icon__close-small--35Q Icon__small--12i Icon__active--1EL LabeledCloseButton__closeIcon--11r" role="img" aria-label="icon_close-small"></span></button></div>
      </div>
      <div class="SearchResults__list--1aE SearchResults__shown--3yB" style="opacity: 1;">
        <div class="col-dsk-2"></div>
        <ul class="col-mob-4 col-dsk-8">
        </ul>
        <div class="col-dsk-2"></div>
      </div>
    </div>
    <nav class="header-navigation">
      <ul class="header-nav-list">
        <li class="nav-list-item Item__active--9wz">
          <span class="nav-list-item-innetText"><?= $translations['slots'] ?></span>
          <span class="nav-list-item-image icon-x96"></span>
        </li>
        <li class="nav-list-item">
          <span class="nav-list-item-innetText"><?= $translations['about_us'] ?></span>
          <span class="nav-list-item-image icon-x96"></span>
        </li>
        <li class="nav-list-item">
          <span class="nav-list-item-innetText"><?= $translations['play_responsibly'] ?></span>
          <span class="nav-list-item-image icon-x96"></span>
        </li>
      </ul>
    </nav>
    <div class="header-right-section">
      <span class="header-search">
        <span class="header-search-icon icon-x96" role="img"></span>
      </span>
      <?php if (!empty($_SESSION['login'])) { ?>
        <div class="user-container">
          <div class="balance-display">
            <span class="balance-amount"><?php echo htmlspecialchars(number_format($balance, 2)); ?></span>
            <div class="wallet-button" style="border-radius:50%;background: #f5aa1c;color: #000;font-weight: 700; min-width:20px;
                  min-height:20px;font-size:0.875rem; display:flex; justify-content:center;align-items:center; cursor:pointer;"><span>$</span></div>
          </div>
          <div class="avatar-dropdown">
            <button type="button" class="avatar-button" aria-label="<?= $translations['user_menu'] ?>">
              <?php if (!empty($img)) { ?>
                <img loading="lazy" src="<?php echo htmlspecialchars($img); ?>" alt="<?= $translations['user_avatar'] ?>" class="user-avatar">
              <?php } else { ?>
                <span class="user-avatar-placeholder"><?php echo htmlspecialchars(substr($login, 0, 1)); ?></span>
              <?php } ?>
            </button>
            <div class="avatar-dropdown-menu">
              <a href="/profile" class="dropdown-item"><?= $translations['profile'] ?></a>
              <a href="/slot" class="dropdown-item"><?= $translations['games'] ?></a>
              <a href="/bonus" class="dropdown-item"><?= $translations['bonus'] ?></a>
              <a href="/referals" class="dropdown-item"><?= $translations['referrals'] ?></a>
              <a href="/ranks" class="dropdown-item"><?= $translations['ranks'] ?></a>
              <a href="/wallet/deposit" class="dropdown-item"><?= $translations['deposit'] ?></a>
              <a href="/wallet/withdraw" class="dropdown-item"><?= $translations['withdraw'] ?></a>
              <?php if ($is_admin == 1) { ?>
                <a href="/admin" type="button" class="dropdown-item"><?= $translations['admin_panel'] ?></a>
              <?php } ?>
            </div>
          </div>
        </div>
      <?php } else { ?>
        <button class="header-login-button header-auth" onClick="$('#authorization').modal('show');"><?= $translations['login'] ?></button>
        <a class="header-register-button header-auth" onClick="event.preventDefault(); $('#registration').modal('show');"><?= $translations['register'] ?></a>
      <?php } ?>
    </div>
    <div class="SubContainer__subContainer--3AF" style="opacity: 0;">
      <div class="SubContainer__subContainerWrapper--2Fz">
        <nav class="col-mob-4 col-dsk-12 DesktopSubNavigation__container--30L">
          <ul class="col-mob-4 col-dsk-8 LevelsPath__paths--2bJ">
            <li class="LevelsPath__pathTitle--2CI"><?= $translations['slots'] ?></li>
          </ul>
          <div class="GridRow__colsRow--JL1 ">
            <div class="col-mob-4 col-dsk-2"></div>
            <ul class="col-mob-4 col-dsk-2">
              <li class="DesktopSubNavigation__itemContainer--35m"><span class="Icon__icon--x96 Icon__casino--1m0 Icon__large--2F8 DesktopSubNavigation__menuIcon--34N" role="img" aria-label="icon_casino"></span><a class="PlainText__text--1wg PlainText__small--2s0 Link__link--3vh DesktopSubNavigation__linkItem--2il  PlainText__dark--3fd" href="/slot/The_Dog_House" target="">The Dog House</a></li>
              <li class="DesktopSubNavigation__itemContainer--35m"><span class="Icon__icon--x96 Icon__livecasino--N_a Icon__large--2F8 DesktopSubNavigation__menuIcon--34N" role="img" aria-label="icon_livecasino"></span><a class="PlainText__text--1wg PlainText__small--2s0 Link__link--3vh DesktopSubNavigation__linkItem--2il  PlainText__dark--3fd" href="/slot/Sweet_Bonanza" target="">Sweet Bonanza</a></li>
              <li class="DesktopSubNavigation__itemContainer--35m"><span class="Icon__icon--x96 Icon__sports--3Gc Icon__large--2F8 DesktopSubNavigation__menuIcon--34N" role="img" aria-label="icon_sports"></span><a class="PlainText__text--1wg PlainText__small--2s0 Link__link--3vh DesktopSubNavigation__linkItem--2il  PlainText__dark--3fd" href="/slot/Gates_of_Olympus" target="">Gates of Olympus</a></li>
              <li class="DesktopSubNavigation__itemContainer--35m"><span class="Icon__icon--x96 Icon__goalsetters--9-7 Icon__large--2F8 DesktopSubNavigation__menuIcon--34N" role="img" aria-label="icon_goalsetters"></span><a class="PlainText__text--1wg PlainText__small--2s0 Link__link--3vh DesktopSubNavigation__linkItem--2il  PlainText__dark--3fd" href="/slot/Sugar_Rush" target="">Sugar Rush</a></li>
            </ul>
            <div class="col-mob-4 col-dsk-2"></div>
            <div class="col-mob-4 col-dsk-2"></div>
            <div class="col-mob-4 col-dsk-2"></div>
            <div class="col-mob-4 col-dsk-2"></div>
          </div>
        </nav><button class="PlainText__text--1wg PlainText__small--2s0 LabeledCloseButton__close--2kg  PlainText__dark--3fd"><?= $translations['close'] ?><span class="Icon__icon--x96 Icon__close-small--35Q Icon__small--12i Icon__active--1EL LabeledCloseButton__closeIcon--11r" role="img" aria-label="icon_close-small"></span></button>
      </div>
    </div>

    <div class="SubContainer__subContainer--3AF" style="opacity: 0;">
      <div class="SubContainer__subContainerWrapper--2Fz">
        <nav class="col-mob-4 col-dsk-12 DesktopSubNavigation__container--30L">
          <ul class="col-mob-4 col-dsk-8 LevelsPath__paths--2bJ">
            <li class="LevelsPath__pathTitle--2CI"><?= $translations['about_us'] ?></li>
          </ul>
          <div class="GridRow__colsRow--JL1 ">
            <div class="col-mob-4 col-dsk-2"></div>
            <ul class="col-mob-4 col-dsk-2">
              <li class="DesktopSubNavigation__itemContainer--35m"><a class="PlainText__text--1wg PlainText__small--2s0 Link__link--3vh DesktopSubNavigation__linkItem--2il  PlainText__dark--3fd" href="https://corporate.hollandcasino.nl/over-ons/" target=""><?= $translations['about_us'] ?></a></li>
              <li class="DesktopSubNavigation__itemContainer--35m"><a class="PlainText__text--1wg PlainText__small--2s0 Link__link--3vh DesktopSubNavigation__linkItem--2il  PlainText__dark--3fd" href="https://www.hollandcasino.nl/en/over-ons/contact-us" target=""><?= $translations['contact_us'] ?></a></li>
            </ul>
            <div class="col-mob-4 col-dsk-2"></div>
            <div class="col-mob-4 col-dsk-2"></div>
            <div class="col-mob-4 col-dsk-2"></div>
            <div class="col-mob-4 col-dsk-2"></div>
          </div>
        </nav><button class="PlainText__text--1wg PlainText__small--2s0 LabeledCloseButton__close--2kg  PlainText__dark--3fd"><?= $translations['close'] ?><span class="Icon__icon--x96 Icon__close-small--35Q Icon__small--12i Icon__active--1EL LabeledCloseButton__closeIcon--11r" role="img" aria-label="icon_close-small"></span></button>
      </div>
    </div>
    <div class="SubContainer__subContainer--3AF" style="opacity: 0;">
      <div class="SubContainer__subContainerWrapper--2Fz">
        <nav class="col-mob-4 col-dsk-12 DesktopSubNavigation__container--30L">
          <ul class="col-mob-4 col-dsk-8 LevelsPath__paths--2bJ">
            <li class="LevelsPath__pathTitle--2CI"><?= $translations['play_responsibly'] ?></li>
          </ul>
          <div class="GridRow__colsRow--JL1 ">
            <div class="col-mob-4 col-dsk-2"></div>
            <ul class="col-mob-4 col-dsk-2">
              <li class="DesktopSubNavigation__itemContainer--35m"><a class="PlainText__text--1wg PlainText__small--2s0 Link__link--3vh DesktopSubNavigation__linkItem--2il  PlainText__dark--3fd" href="https://www.hollandcasino.nl/en/online/veilig-en-verantwoord-spelen/overzicht" target=""><?= $translations['overview'] ?></a></li>
              <li class="DesktopSubNavigation__itemContainer--35m"><a class="PlainText__text--1wg PlainText__small--2s0 Link__link--3vh DesktopSubNavigation__linkItem--2il  PlainText__dark--3fd" href="https://www.hollandcasino.nl/en/online/veilig-en-verantwoord-spelen/preventiebeleid-kansspelen" target=""><?= $translations['prevention_policy'] ?></a></li>
              <li class="DesktopSubNavigation__itemContainer--35m"><a class="PlainText__text--1wg PlainText__small--2s0 Link__link--3vh DesktopSubNavigation__linkItem--2il  PlainText__dark--3fd" href="https://www.hollandcasino.nl/en/online/veilig-en-verantwoord-spelen/spelrisico" target=""><?= $translations['gaming_risks'] ?></a></li>
              <li class="DesktopSubNavigation__itemContainer--35m"><a class="PlainText__text--1wg PlainText__small--2s0 Link__link--3vh DesktopSubNavigation__linkItem--2il  PlainText__dark--3fd" href="https://www.hollandcasino.nl/en/online/veilig-en-verantwoord-spelen/verantwoord-speelgedrag" target=""><?= $translations['game_tips_tools'] ?></a></li>
            </ul>
            <ul class="col-mob-4 col-dsk-2">
              <li class="DesktopSubNavigation__itemContainer--35m"><a class="PlainText__text--1wg PlainText__small--2s0 Link__link--3vh DesktopSubNavigation__linkItem--2il  PlainText__dark--3fd" href="https://www.hollandcasino.nl/en/online/veilig-en-verantwoord-spelen/hulpverlening" target=""><?= $translations['assistance'] ?></a></li>
              <li class="DesktopSubNavigation__itemContainer--35m"><a class="PlainText__text--1wg PlainText__small--2s0 Link__link--3vh DesktopSubNavigation__linkItem--2il  PlainText__dark--3fd" href="https://www.hollandcasino.nl/en/online/veilig-en-verantwoord-spelen/ouderlijk-toezicht" target=""><?= $translations['parental_control'] ?></a></li>
              <li class="DesktopSubNavigation__itemContainer--35m"><a class="PlainText__text--1wg PlainText__small--2s0 Link__link--3vh DesktopSubNavigation__linkItem--2il  PlainText__dark--3fd" href="https://www.hollandcasino.nl/en/online/veilig-en-verantwoord-spelen/zelftest" target=""><?= $translations['self_assessment_test'] ?></a></li>
              <li class="DesktopSubNavigation__itemContainer--35m"><a class="PlainText__text--1wg PlainText__small--2s0 Link__link--3vh DesktopSubNavigation__linkItem--2il  PlainText__dark--3fd" href="https://www.hollandcasino.nl/en/online/veilig-en-verantwoord-spelen/jongvolwassenen" target=""><?= $translations['young_adults'] ?></a></li>
            </ul>
            <ul class="col-mob-4 col-dsk-2">
              <li class="DesktopSubNavigation__itemContainer--35m"><a class="PlainText__text--1wg PlainText__small--2s0 Link__link--3vh DesktopSubNavigation__linkItem--2il  PlainText__dark--3fd" href="https://www.hollandcasino.nl/en/stortingslimieten-faq" target=""><?= $translations['deposit_limits_faq'] ?></a></li>
            </ul>
            <div class="col-mob-4 col-dsk-2"></div>
            <div class="col-mob-4 col-dsk-2"></div>
          </div>
        </nav><button class="PlainText__text--1wg PlainText__small--2s0 LabeledCloseButton__close--2kg  PlainText__dark--3fd"><?= $translations['close'] ?><span class="Icon__icon--x96 Icon__close-small--35Q Icon__small--12i Icon__active--1EL LabeledCloseButton__closeIcon--11r" role="img" aria-label="icon_close-small"></span></button>
      </div>
    </div>

  </div>
</div>
<script>
  $(document).ready(function() {
    $('.wallet-button').on('click', function() {
      location.href = '/wallet/deposit';
    })
    const games = <?php echo json_encode(array_column($games, 'name')); ?>;

    function generateRandomBet() {
      const game = games[Math.floor(Math.random() * games.length)] || 'Unknown Game';
      const betAmount = (Math.random() * (50000 - 1) + 1).toFixed(2);
      const multiplier = (Math.random() * 50).toFixed(2);
      const payout = (betAmount * multiplier).toFixed(2);
      const user = 'Скрытый';
      const time = new Intl.DateTimeFormat('en-US', {
        hour: '2-digit',
        minute: '2-digit',
        hour12: false,
        timeZone: 'UTC'
      }).format(new Date());

      return {
        id: Date.now() + '_' + Math.floor(Math.random() * 1000),
        game,
        user,
        time,
        bet_amount: '$' + betAmount,
        multiplier,
        payout: payout < 0 ? '-' + payout : '$' + payout,
      };
    }

    function addBetToTable(bet) {
      const row = `
      <tr data-bet-index="new" data-test-id="${bet.id}">
        <td class="left">
          <button type="button" class="live-button" aria-label="Открыть превью ставки">
              <svg fill="currentColor" viewBox="0 0 96 96" class="svg-icon" style="">
                <title></title>
                <path d="M30.48 42.441a79.7 79.7 0 0 0-5.8 15.84 30.1 30.1 0 0 0 0 14.36l.718 3-16.277 4A37.9 37.9 0 0 1 12 53.719l-12 2.84v-11.68l29.36-7.04zM96 46.88l-.922 4.64A85.5 85.5 0 0 0 83.2 63.32a30.56 30.56 0 0 0-6 13.04l-.597 3L60 76.32a38.12 38.12 0 0 1 13.36-22.28l-12-2.36 5.038-10.64zM72 24.12a134 134 0 0 0-15.2 22.957 49.8 49.8 0 0 0-5.6 22.8v5H32.32a55.6 55.6 0 0 1 5-22.757A87 87 0 0 1 50.8 31h-28V16.36H72z"></path>
              </svg>
            <span class="truncate">${bet.game.replaceAll("_", " ")}</span>
          </button>
        </td>
        <td class="left">
          <div class="live-hoverable">
            <div class="flex items-center gap-1 w-full">
              <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon" style="">
                <title></title>
                <path d="M8.887 43.074c7.87-1.22 15.212-1.515 21.547 0h3.05c6.498-1.484 13.79-1.24 21.508 0v2.5l-3.05.582c-.001.116-.06 9.23-9.235 9.23-6.222 0-8.245-5.58-8.906-9.23h-3.723c-.66 3.65-2.685 9.23-8.906 9.23-9.174 0-9.234-9.114-9.234-9.23l-3.051-.582zM61.539 30.77a2.458 2.458 0 0 1 .523 4.86l.633-.071A221 221 0 0 1 32 37.688c-10.419 0-20.666-.726-29.54-1.997a2.462 2.462 0 0 1 0-4.922zM42.051 8.613c2.814 0 5.19 1.881 5.953 4.496l3.64 12.79h-39.39l3.64-12.79.008-.046a6.2 6.2 0 0 1 5.946-4.45z"></path>
              </svg>
              <span class="truncate">
                <span class="weight-semibold">${bet.user}</span>
              </span>
            </div>
          </div>
        </td>
        <td class="right">${bet.time}</td>
        <td class="right">
          <div class="live-currency">
            <span>${bet.bet_amount}</span>
          </div>
        </td>
        <td class="right">
          <div class="flex items-center justify-end gap-1">
            <span>${bet.multiplier}×</span>
          </div>
        </td>
        <td class="right">
          <div class="live-currency">
            <span class="${bet.multiplier < 1 ? 'live-text-subtle' : 'live-text-success'}">
              ${bet.payout}
            </span>
          </div>
        </td>
      </tr>`;
      const $tbody = $('.live-table-content tbody');

      $tbody.prepend(row);
    }

    // Generate initial 15 bets on page load
    for (let i = 0; i < 10; i++) {
      const newBet = generateRandomBet();
      addBetToTable(newBet);
    }

    function startGeneratingBets() {
      function generateAndSchedule() {
        const newBet = generateRandomBet();
        const $tbody = $('.live-table-content tbody');
        $tbody.children('tr').last().remove();
        addBetToTable(newBet);
        const randomDelay = Math.random() * 5000 + 5000; // 1..4 секунды
        setTimeout(generateAndSchedule, randomDelay);
      }
      generateAndSchedule();
    }

    startGeneratingBets();
  })
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Функция для проверки загрузки всех CSS-файлов
    function areCSSLoaded() {
      return $('link[rel="stylesheet"]').toArray().every(link => {
        try {
          return link.sheet && link.sheet.cssRules.length >= 0;
        } catch (e) {
          return true; // Игнорируем ошибки CORS или недоступные стили
        }
      });
    }

    // Функция для проверки полной загрузки страницы
    function checkResourcesLoaded() {
      if (document.readyState === 'complete' && areCSSLoaded()) {
        // Скрываем лоадер
        $('.loader').hide();
      } else {
        // Продолжаем проверять, если ресурсы ещё не загружены
        setTimeout(checkResourcesLoaded, 100);
      }
    }

    // Запускаем проверку загрузки ресурсов
    checkResourcesLoaded();
  });
</script>
<script>
  $(document).ready(function() {
    // Avatar dropdown toggle
    $('.avatar-button').on('click', function() {
      $(this).siblings('.avatar-dropdown-menu').toggle();
    });
    $(document).on('click', function(e) {
      if (!$(e.target).closest('.avatar-dropdown').length) {
        $('.avatar-dropdown-menu').hide();
      }
    });

    // Track which sub-container is active and if mouse is over it
    let activeSubContainer = null;
    let isOverSubContainer = false;
    let isSearchOpen = false;

    // Map nav-list-item to corresponding SubContainer__subContainer--3AF
    const navItems = $('.nav-list-item');
    const subContainers = $('.SubContainer__subContainer--3AF');

    // Handle hover on nav-list-item
    navItems.each(function(index) {
      $(this).on('mouseenter', function() {
        if (isSearchOpen) return; // Skip if search is open
        // Remove Item__active--9wz from all elements
        $('.Item__active--9wz').removeClass('Item__active--9wz');
        // Remove Item__hoveredItem--Qos from all nav-list-item
        navItems.removeClass('Item__hoveredItem--Qos');
        // Add Item__hoveredItem--Qos to the hovered item
        $(this).addClass('Item__hoveredItem--Qos');
        // Hide all sub-containers and show the corresponding one
        subContainers.css('opacity', '0').removeClass('open');
        $(subContainers[index]).css('opacity', '1').addClass('open');
        activeSubContainer = subContainers[index];
        // Set opacity to 0 for Header__fadingContainer--1hB
        $('.Header__fadingContainer--1hB').css('opacity', '1');

        // Bind close button click for sub-container
        $(activeSubContainer).find('.LabeledCloseButton__close--2kg').off('click').on('click', function() {
          $(activeSubContainer).css('opacity', '0').removeClass('open');
          navItems.removeClass('Item__hoveredItem--Qos');
          navItems.first().addClass('Item__active--9wz');
          $('.Header__fadingContainer--1hB').css('opacity', '0');
          activeSubContainer = null;
          isOverSubContainer = false;
        });

        // Bind sub-container hover events
        $(activeSubContainer).off('mouseenter mouseleave').on('mouseenter', function() {
          isOverSubContainer = true;
        }).on('mouseleave', function(event) {
          isOverSubContainer = false;
          const targetElement = document.elementFromPoint(event.clientX, event.clientY);
          if (!$(targetElement).closest('#header.headerproject, .nav-list-item').length) {
            $(activeSubContainer).css('opacity', '0').removeClass('open');
            navItems.removeClass('Item__hoveredItem--Qos');
            navItems.first().addClass('Item__active--9wz');
            $('.Header__fadingContainer--1hB').css('opacity', '0');
            activeSubContainer = null;
          }
        });
      });
    });

    // Handle mouseleave on header
    $('#header.headerproject').on('mouseleave', function(event) {
      if (!isOverSubContainer && activeSubContainer && !isSearchOpen) {
        const targetElement = document.elementFromPoint(event.clientX, event.clientY);
        if (!$(targetElement).closest('.SubContainer__subContainer--3AF').length) {
          $(activeSubContainer).css('opacity', '0').removeClass('open');
          navItems.removeClass('Item__hoveredItem--Qos');
          navItems.first().addClass('Item__active--9wz');
          $('.Header__fadingContainer--1hB').css('opacity', '0');
          activeSubContainer = null;
        }
      }
    });

    $('.header-search').on('click', function() {
      isSearchOpen = true;
      $('.GamesSearch__active--3Df').addClass('open');
      $('.header-nav-list, .header-right-section').css('display', 'none');
      subContainers.css('opacity', '0').removeClass('open');
      navItems.removeClass('Item__hoveredItem--Qos');
      navItems.first().addClass('Item__active--9wz');
      $('.Header__fadingContainer--1hB').css('opacity', '1');
      activeSubContainer = null;
      isOverSubContainer = false;
      // Clear search input and results
      $('.GamesSearch__input--AJm').val('').trigger('input');
    });

    // Handle search close button
    $('.GamesSearch__active--3Df .LabeledCloseButton__close--2kg').on('click', function() {
      isSearchOpen = false;
      $('.GamesSearch__active--3Df').removeClass('open');
      $('.header-nav-list, .header-right-section').css('display', '');
      navItems.removeClass('Item__hoveredItem--Qos');
      navItems.first().addClass('Item__active--9wz');
      $('.Header__fadingContainer--1hB').css('opacity', '0');
      // Clear search input and results
      $('.GamesSearch__input--AJm').val('');
      $('.SearchResults__list--1aE ul').empty();
    });

    // Pass PHP games array to JavaScript
    const games = <?php echo json_encode($games); ?>;

    // Handle search input
    $('.GamesSearch__input--AJm').on('input', function() {
      const query = $(this).val().trim().toLowerCase();
      const $resultsList = $('.SearchResults__list--1aE ul');
      $resultsList.empty(); // Clear previous results

      if (query === '') {
        $('.SearchResults__list--1aE').css('opacity', '0');
        return;
      }

      // Filter games
      const filteredGames = games.filter(game =>
        game.name &&
        game.name.toLowerCase().replace(/_/g, ' ').includes(query)
      );

      // Render results
      if (filteredGames.length > 0) {
        $('.SearchResults__list--1aE').css('opacity', '1');
        filteredGames.forEach(game => {
          // Prepare display title by replacing underscores with spaces
          const displayTitle = game.name.replace(/_/g, ' ');
          // Escape query for regex to prevent errors with special characters
          const escapedQuery = query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
          const regex = new RegExp(`(${escapedQuery})`, 'gi');
          const highlightedTitle = displayTitle.replace(regex, '<span class="GamesSearch__searchQuery--gUs">$1</span>');
          const $listItem = $(`
          <li class="GameItem__item--20s" data-game-id="${game.name}}">
            <img alt="${game.name}" draggable="false" class="Image__image--2Bt SearchResults__image--3DV" src="${game.iconurl}" loading="lazy">
            <span class="SearchResults__gameName--1fp">${highlightedTitle}</span>
          </li>
        `);
          // Add click event to redirect to game page
          $listItem.on('click', function() {
            window.location.href = `/slot/${game.name}`;
          });
          $resultsList.append($listItem);
        });
      } else {
        $('.SearchResults__list--1aE').css('opacity', '0');
      }
    });

    // Set initial active state for the first nav-list-item
    navItems.first().addClass('Item__active--9wz');
  });
</script>

<?php require("modal.php"); ?>