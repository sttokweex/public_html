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
$ppResponseLocal = fetchWithRetry('http://5.129.253.12:2002/game_list.do');
if ($ppResponseLocal !== false) {
  $ppDecodedLocal = json_decode($ppResponseLocal, true);
  $ppGames = (isset($ppDecodedLocal['games']) && is_array($ppDecodedLocal['games'])) ? $ppDecodedLocal['games'] : [];
  foreach ($ppGames as $game) {
    $games[] = [
      'name' => $game['g_title'],
      'online' => rand(500, 900),
      'gameid' => $game['g_id'],
      'iconurl' => $game['g_icon'] ?? '../images/slotsPreviews/' . str_replace(' ', '', $game['g_title']) . '.jpg',
      '__source' => 'PP_Local',
      'vendorid' => 'Pragmatic play custom'
    ];
  }
}

function fetchWithRetry($url, $maxRetries = 6, $retryDelay = 1)
{
  $attempt = 0;
  while ($attempt < $maxRetries) {
    $response = @file_get_contents($url);
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
      'online' => rand(300, 900),
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
$getDepsForLevel = "SELECT SUM(amount) FROM deposits WHERE hash_user='$sid' AND status ='1'";
$getDepsForLevel2 = mysqli_query($connection, $getDepsForLevel);
$leveldeposits = mysqli_fetch_array($getDepsForLevel2);
$depositesSID = $leveldeposits['SUM(amount)'];
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
  <link rel="stylesheet" href="https://use.typekit.net/aba0ebl.css">
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" as="style" onload="this.rel='stylesheet'">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="/css/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/toastr.css" crossorigin="anonymous" />
  <link href="/css/livefeed.css" rel="stylesheet">
  <link href="/css/header.css" rel="stylesheet">
  <link href="/css/favorite.css" rel="stylesheet">
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
  <link href="/css/recent.css" rel="stylesheet">
  <link href="/css/myBets.css" rel="stylesheet">
  <link href="/css/transactions.css" rel="stylesheet">
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
  .loading {
    z-index: 2000;
    position: fixed;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    background: rgb(26, 44, 56);
    display: flex;
    align-items: center;
    touch-action: none;
    justify-content: center;
    flex-direction: column;
  }

  .loader {
    width: 100%;
    max-width: 100px;
  }
</style>
<div data-layout="" class="overlay" style="--header-height: 60px;z-index: 1598;"></div>
<div id="" class="loading"> <img class="loader" src="/assets/media/Stake-preloader.ynQo6d0c.gif" alt="loading"></div>
<div id="header" class="headerproject" style="user-select:none;">

  <div class="header-content">
    <div class="notifications-widget closed" style="z-index: 901;">
      <div class="notifications-header">
        <div class="notification-title"><svg data-ds-icon="NotificationOn" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
            <path fill="currentColor" d="M12 23c1.66 0 3-1.34 3-3H9c0 1.66 1.34 3 3 3m9-8h-1v-5c0-3.74-2.56-6.86-6.03-7.74.01-.08.03-.17.03-.26 0-1.1-.9-2-2-2s-2 .9-2 2c0 .09.01.17.03.26C6.57 3.14 4 6.27 4 10v5H3c-1.1 0-2 .9-2 2s.9 2 2 2h18c1.1 0 2-.9 2-2s-.9-2-2-2"></path>
          </svg>
          <h3 type="heading" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true">Notifications</h3>
        </div>
        <div style="cursor:help; display:inline-flex;"><button type="button" tabindex="0" class="notification-close" aria-label="Close Notification Widget" data-button-root=""><svg data-ds-icon="Cross" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
              <path fill="currentColor" d="M4.293 4.293a1 1 0 0 1 1.338-.069l.076.069L12 10.586l6.293-6.293.076-.069a1 1 0 0 1 1.407 1.407l-.069.076L13.414 12l6.293 6.293.069.076a1 1 0 0 1-1.407 1.406l-.076-.068L12 13.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L10.586 12 4.293 5.707l-.068-.076a1 1 0 0 1 .068-1.338"></path>
            </svg></button> </div>
      </div>
      <div class="scrollY notification-list-scroll">
        <div class="empty-notifications">
          <div class="empty-list spacing-compact " data-icon="empty-promotions">
            <div class="large-icon"><svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M70.4335 51.5259L68.4468 50.2228H49.414V57.1123L70.4335 51.5259Z" fill="#263742"></path>
                <path d="M47.8647 56.2146V70.6773L65.1935 62.8354C68.3831 61.3909 70.4335 58.215 70.4335 54.7155V51.5305L47.8647 56.2192V56.2146Z" fill="#334552"></path>
                <path d="M33.0331 75.7533V51.0793H46.9671V75.7533C46.9671 78.0954 45.0625 80 42.7204 80H37.2798C34.9377 80 33.0331 78.0954 33.0331 75.7533Z" fill="#263742"></path>
                <path d="M29.5698 48.5504V71.8437C29.5698 76.6919 50.4299 76.6919 50.4299 71.8437V48.5504H29.5698Z" fill="#334552"></path>
                <path d="M3.56552 11.6147L29.57 48.6461C29.57 54.0958 50.43 54.0958 50.43 48.6461L76.4345 11.6147H3.56552Z" fill="#263742"></path>
                <path d="M76.4345 10.6032C76.4345 14.2166 70.2147 17.4107 60.7097 19.3245C57.6385 19.9442 54.2257 20.4272 50.5667 20.7507C49.6782 20.8282 48.7805 20.8965 47.8647 20.9512C45.3312 21.1152 42.702 21.2018 40 21.2018C37.2979 21.2018 34.6688 21.1152 32.1353 20.9512C31.2194 20.8965 30.3218 20.8282 29.4333 20.7507C25.7789 20.4272 22.3614 19.9442 19.2903 19.3199C9.78982 17.4107 3.56552 14.2166 3.56552 10.6032C3.56552 4.74796 19.8827 0 40 0C60.1173 0 76.4345 4.74796 76.4345 10.6032Z" fill="#334552"></path>
                <path d="M47.8647 20.9512C45.3312 21.1152 42.702 21.2018 40 21.2018C37.2979 21.2018 34.6688 21.1152 32.1353 20.9512L32.7551 8.83525H47.2451L47.8647 20.9512Z" fill="#0C1D29"></path>
                <path d="M39.9999 11.6147C44.0012 11.6147 47.2451 10.3703 47.2451 8.83525C47.2451 7.30017 44.0012 6.05566 39.9999 6.05566C35.9987 6.05566 32.7551 7.30017 32.7551 8.83525C32.7551 10.3703 35.9987 11.6147 39.9999 11.6147Z" fill="#3C8725"></path>
                <path d="M40.0001 10.0336C42.8639 10.0336 45.1855 9.14212 45.1855 8.0424C45.1855 6.94267 42.8639 6.05117 40.0001 6.05117C37.1363 6.05117 34.8147 6.94267 34.8147 8.0424C34.8147 9.14212 37.1363 10.0336 40.0001 10.0336Z" fill="#0C1D29"></path>
                <path d="M40 4.91201C38.5693 4.91201 37.4073 6.1514 37.4073 6.82578C37.4073 7.50015 38.5693 8.04694 40 8.04694C41.4308 8.04694 42.5927 7.50015 42.5927 6.82578C42.5927 6.1514 41.4308 4.91201 40 4.91201Z" fill="#69E244"></path>
                <path d="M54.212 50.7695V49.7443L57.8801 49.7352L58.8734 50.1589V50.8424L54.9274 51.3801L54.212 50.7695Z" fill="#69E244"></path>
              </svg></div>
            <span tag="span" type="body" size="md" strong="true" variant="neutral-default" class="text-neutral-default ds-body-md-strong" data-ds-text="true">No Notifications Available</span>
            <span tag="span" type="body" size="sm" class="ds-body-sm" data-ds-text="true">Your interactions will be visible here</span>
          </div>
        </div>
        <div></div>
      </div>
    </div>
    <div class="header-search"><?php renderSearch($games, $translations); ?></div>
    <div class="wrap normal" data-content="">
      <a href="/" class="logo-container">
        <svg id="Layer_1" class="logo1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 200" class="svelte-nu4xlf">
          <g id="Layer_5">
            <path fill="currentColor" d="M31.47,58.5c-.1-25.81,16.42-40.13,46.75-40.23,21.82-.08,25.72,14.2,25.72,19.39,0,9.94-14.06,20.48-14.06,20.48,0,0,.78,6.19,12.85,6.14,12.07-.05,23.83-8.02,23.76-27.96-.06-22.91-24.06-33.38-47.78-33.29C58.87,3.09,6.24,5.88,6.42,58.13c.18,46.41,87.76,50.5,87.83,80.21.12,32.27-36.08,40.96-48.33,40.96s-17.23-8.67-17.25-13.43c-.09-26.13,25.92-33.41,25.92-33.41,0-1.95-1.52-10.64-11.59-10.6-25.95.05-36.28,22.36-36.21,44.14.07,18.53,13.16,30.09,32.94,30.01,37.82-.14,80.46-18.59,80.3-59.56-.14-38.32-88.46-48.33-88.57-77.96Z"></path>
            <path fill="currentColor" d="M391.96,161.17c-.3-.73-1.15-.56-2.27.37-4.29,3.54-14.1,13.56-37.06,13.65-41.85.16-49.12-68.83-49.12-68.83,0,0,31.9-23.81,36.88-33.42,4.98-9.61-10.87-11.7-10.87-11.7,0,0-22.31,27.15-38.13,35.1,1.72-11.81,13.42-38.72,14.09-54.2.67-15.48-18.63-11.7-21.72-10.22,0,6.76-17.06,68.1-23.27,101.82-3.66,5.85-8.88,12.54-13.56,12.55-2.71,0-3.71-5.02-3.73-12.22,0-9.99,5.5-25.99,5.46-35.71,0-6.73-3.09-7.13-5.75-7.12-.58,0-3.77.09-4.36.09-6.83,0-4.58-5.85-10.73-5.79-18.8.07-42.75,20.59-43.79,51.57-6.35,4.2-15.23,9.5-19.77,9.52-4.76,0-5.94-4.4-5.95-8.2,0-6.68,10.8-46.37,10.8-46.37,0,0,13.76-3.53,19.77-4.69,4.54-.89,5.85-1.22,7.62-3.41s5.22-6.73,8.01-10.8c2.79-4.08.05-7.23-5.11-7.21-6.77,0-24.88,4.29-24.88,4.29,0,0,8.7-37.5,8.69-38.26s-.98-1.16-2.45-1.15c-3.3,0-9.18,1.77-12.94,3.12-5.76,2.06-10.45,9.12-11.4,12.4s-7.46,29.02-7.46,29.02c0,0-34.88,12.04-39.65,13.85-.29.1-.49.37-.49.68s3.99,15.6,12.17,15.54c5.85,0,23.04-7.04,23.04-7.04,0,0-8.83,35.1-8.78,46.81,0,7.51,3.54,16.3,18.21,16.26,13.65,0,25.6-7.05,32.29-11.96,3.66,9.25,12.3,11.79,18.2,11.77,13.22,0,23.4-10.55,24.71-11.96,1.72,4.06,5.76,11.85,15.01,11.82,5.23,0,10.64-5.85,14.63-11.53-.08,1.18-.06,2.36.05,3.54,1.6,14.55,23.2,6,24.38,3.97.73-10.52.27-32.03,4.48-45.31,5.58,45.3,26.74,75.78,64.78,75.64,21.27-.08,32.18-6.19,36.69-11.23,3.69-4.08,4.94-9.81,3.29-15.06ZM209.45,146.23c-18.26.07,5.59-47.27,21.17-47.33.02,6.1-.32,47.26-21.17,47.33Z"></path>
            <path fill="currentColor" d="M357.73,160.74c16.49-.06,29.25-10.91,31.59-14.44,3.02-4.59-3.51-11.53-5.59-11.41-5.21,4.98-10.65,11.01-22.87,11.05-14.38.06-11.13-15.77-11.13-15.77,0,0,27.68,3.58,38.81-16.32,3.56-6.37,3.71-15.17,2.27-18.97s-9.49-10.81-22.3-9.75c-15.74,1.33-35.57,17.74-39.93,37.45-3.5,15.86,3.12,38.26,29.14,38.17ZM375.28,94.33c2.59-.09,2.36,4.18,1.67,8.65-.98,6.06-9.29,21.45-25.17,20.85,1.1-8.96,12.91-29.15,23.53-29.5h-.03Z"></path>
          </g>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130 200" class="logo2" style="height:2.5rem;">
          <title>Logo</title>
          <path fill="currentColor" d="M31.47,58.5c-.1-25.81,16.42-40.13,46.75-40.23,21.82-.08,25.72,14.2,25.72,19.39,0,9.94-14.06,20.48-14.06,20.48,0,0,.78,6.19,12.85,6.14,12.07-.05,23.83-8.02,23.76-27.96-.06-22.91-24.06-33.38-47.78-33.29C58.87,3.09,6.24,5.88,6.42,58.13c.18,46.41,87.76,50.5,87.83,80.21.12,32.27-36.08,40.96-48.33,40.96s-17.23-8.67-17.25-13.43c-.09-26.13,25.92-33.41,25.92-33.41,0-1.95-1.52-10.64-11.59-10.6-25.95.05-36.28,22.36-36.21,44.14.07,18.53,13.16,30.09,32.94,30.01,37.82-.14,80.46-18.59,80.3-59.56-.14-38.32-88.46-48.33-88.57-77.96Z"></path>
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
                  </span>
                  <div class="" style="border-radius:50%;background: #f5aa1c;color: #000;font-weight: 700; min-width:20px;
                  min-height:20px;font-size:0.875rem; display:flex; justify-content:center;align-items:center;"><span>$</span></div>


                </button>

              </div>
            </div>
          </div>
          <button type="button" class="balance-wallet-button">
            <span><?php echo htmlspecialchars($translations['wallet']) ?></span>
            <svg data-ds-icon="Wallet" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="svg-icon">
              <path fill="currentColor" d="M21 6h-4c0 .71-.16 1.39-.43 2H20c.55 0 1 .45 1 1s-.45 1-1 1H4c-.55 0-1-.45-1-1s.45-1 1-1h3.43C7.16 7.39 7 6.71 7 6H3c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2m-2 11c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2"></path>
              <path fill="currentColor" d="M9.38 9h5.24C15.46 8.27 16 7.2 16 6c0-2.21-1.79-4-4-4S8 3.79 8 6c0 1.2.54 2.27 1.38 3"></path>
            </svg></button>
        </div>
      </div>
    <?php } ?>
    <div class="header_Navigation">

      <?php $currentLang = in_array($lang, ['en', 'es', 'ru'], true) ? $lang : 'en'; ?>
      <?php if (empty($_SESSION['login'])) { ?>
        <div class="balance_Container">
          <div class="auth-buttons">
            <button id="auth-button" type="button" onClick="$('#authorization').removeClass('hide-modal')" class="login_Button font-semibold"><?= $translations['login'] ?></button>
            <button id="auth-button" type="button" onClick="$('#registration').removeClass('hide-modal')" class="register_Button font-semibold"><?= $translations['register'] ?></button>
          </div>
        </div>
      <?php } else { ?>
        <div class="header_RightBlock">
          <!-- <button class="header-anchor open-search">
            <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon">
              <path d="M63.999 56.219 56.217 64 38.55 46.328a28 28 0 0 0 7.777-7.777zM23.1 0a23.1 23.1 0 1 1-.003 46.2A23.1 23.1 0 0 1 23.1 0m5.317 10.258a13.9 13.9 0 0 0-8.032-.79 13.9 13.9 0 0 0-7.117 3.802 13.9 13.9 0 0 0-3.8 7.117 13.9 13.9 0 0 0 .789 8.031 13.903 13.903 0 0 0 22.672 4.512 13.9 13.9 0 0 0-4.512-22.672"></path>
            </svg>
            <span><?php echo $translations['find'] ?></span>
          </button> --> <button class="header-dropdown header-anchor">
            <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon">
              <path d="M50.84 38.191A19.84 19.84 0 0 1 64 56.86V64H0v-7.14a19.84 19.84 0 0 1 13.16-18.67 26.6 26.6 0 0 0 8.645 5.778A26.6 26.6 0 0 0 32 46a26.6 26.6 0 0 0 10.195-2.031 26.6 26.6 0 0 0 8.645-5.778M32 0a19.62 19.62 0 0 1 18.137 12.117 19.632 19.632 0 0 1-21.965 26.766A19.635 19.635 0 0 1 12.746 23.46 19.63 19.63 0 0 1 32 0"></path>
            </svg>
            <div class="dropdown-menu-settings">
              <div class="dropdown-menu-settings-outer">
                <div class="dropdown-menu-settings-content">
                  <a id="walletBox" class="dropdown-item">
                    <svg data-ds-icon="Wallet" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
                      <path fill="currentColor" d="M21 6h-4c0 .71-.16 1.39-.43 2H20c.55 0 1 .45 1 1s-.45 1-1 1H4c-.55 0-1-.45-1-1s.45-1 1-1h3.43C7.16 7.39 7 6.71 7 6H3c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2m-2 11c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2"></path>
                      <path fill="currentColor" d="M9.38 9h5.24C15.46 8.27 16 7.2 16 6c0-2.21-1.79-4-4-4S8 3.79 8 6c0 1.2.54 2.27 1.38 3"></path>
                    </svg>
                    <span><?php echo $translations['wallet'] ?></span></a>
                  <a id="profile" href="/settings" class="dropdown-item">
                    <svg data-ds-icon="Settings" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
                      <path fill="currentColor" d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6"></path>
                      <path fill="currentColor" d="m20.26 11.08 1.84-1.69L19 4.25l-2.22.8a.994.994 0 0 1-1.32-.74L15 2H9l-.52 2.59c-.12.58-.71.94-1.28.76l-2.52-.79-2.9 5.26 1.91 1.61c.46.39.48 1.09.03 1.5l-1.84 1.69 3.1 5.14 2.22-.8c.58-.21 1.2.14 1.32.74l.46 2.31h6l.52-2.59c.12-.58.71-.94 1.28-.76l2.52.79 2.9-5.26-1.91-1.61a.995.995 0 0 1-.03-1.5M12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5"></path>
                    </svg>
                    <span><?php echo $translations['settings'] ?></span>

                  </a>
                  <a id="transactionsBox" href="/transactions" class="dropdown-item">
                    <svg data-ds-icon="List" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
                      <path fill="currentColor" d="M18 2H5c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h13c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2M6 17c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1m0-5c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1m0-5c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1m10 10H9c-.55 0-1-.45-1-1s.45-1 1-1h7c.55 0 1 .45 1 1s-.45 1-1 1m0-5H9c-.55 0-1-.45-1-1s.45-1 1-1h7c.55 0 1 .45 1 1s-.45 1-1 1m0-5H9c-.55 0-1-.45-1-1s.45-1 1-1h7c.55 0 1 .45 1 1s-.45 1-1 1"></path>
                    </svg>
                    <span><?php echo $translations['transactions'] ?></span></a>
                  <a id="vipBox" disabled class="dropdown-item">
                    <svg data-ds-icon="Trophy" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
                      <path fill="currentColor" d="M21.08 4H19c0-1.1-.9-2-2-2H7c-1.1 0-2 .9-2 2H2.92C1.8 4 .9 4.91.92 6.03c.04 2.48.69 6.41 4.35 6.86A6.98 6.98 0 0 0 11 17.9v1.08h-1c-2.21 0-4 1.79-4 4h12c0-2.21-1.79-4-4-4h-1V17.9c2.76-.4 4.99-2.39 5.73-5.02 3.65-.46 4.31-4.38 4.35-6.86.02-1.12-.88-2.03-2-2.03zM4 10.11c-.57-.68-1.04-1.9-1.08-4.1H4zM16.11 9l-1.45 1.04.57 1.71c.34 1.03-.83 1.89-1.71 1.26l-1.51-1.08-1.51 1.08c-.88.63-2.05-.24-1.71-1.26l.57-1.71L7.91 9c-.89-.63-.44-2.03.65-2.03h1.82l.58-1.75c.34-1.02 1.79-1.02 2.13 0l.58 1.75h1.82c1.09 0 1.54 1.4.65 2.03zM20 10.1V6h1.08c-.04 2.21-.51 3.43-1.08 4.1"></path>
                    </svg><span><?php echo $translations['vip'] ?></span></a>
                  <a id="bonusBox" href="/bonus" class="dropdown-item"><svg data-ds-icon="Gift" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!--[!--><!--]-->
                      <path fill="currentColor" d="M21 5h-3.35c.22-.46.35-.96.35-1.5C18 1.57 16.43 0 14.5 0c-.98 0-1.86.41-2.5 1.06A3.5 3.5 0 0 0 9.5 0C7.57 0 6 1.57 6 3.5c0 .54.13 1.04.35 1.5H3c-1.1 0-2 .9-2 2v1c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2m-6.5-3c.83 0 1.5.67 1.5 1.5S15.33 5 14.5 5 13 4.33 13 3.5 13.67 2 14.5 2M8 3.5C8 2.67 8.67 2 9.5 2s1.5.67 1.5 1.5S10.33 5 9.5 5 8 4.33 8 3.5M3 21c0 1.1.9 2 2 2h6V12H3zm10 2h6c1.1 0 2-.9 2-2v-9h-8z"></path>
                    </svg><span><?php echo $translations['bonus'] ?></span></a>
                  <a id="referrals" href="/referals" class="dropdown-item">
                    <svg data-ds-icon="Affiliate" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
                      <path fill="currentColor" d="M12 11a5 5 0 1 0 0-10 5 5 0 0 0 0 10"></path>
                      <path fill="currentColor" fill-rule="evenodd" d="M16.5 21v-.14l-.91-.65c-.5.19-1.04.29-1.59.29-2.48 0-4.5-2.02-4.5-4.5 0-1.16.45-2.2 1.17-3H9c-4.42 0-8 3.58-8 8 0 1.1.9 2 2 2h13.99c-.3-.61-.49-1.28-.49-2" clip-rule="evenodd"></path>
                      <path fill="currentColor" d="M21 18c-.64 0-1.23.2-1.72.54l-2.41-1.72c.08-.26.13-.53.13-.82s-.05-.56-.13-.82l2.41-1.72c.49.34 1.08.54 1.72.54 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .29.05.56.13.82l-2.41 1.72C15.23 13.2 14.64 13 14 13c-1.66 0-3 1.34-3 3s1.34 3 3 3c.64 0 1.23-.2 1.72-.54l2.41 1.72c-.08.26-.13.53-.13.82 0 1.66 1.34 3 3 3s3-1.34 3-3-1.34-3-3-3"></path>
                    </svg>
                    <span><?php echo $translations['referals'] ?></span>

                  </a>
                  <a id="supportBox" href="https://t.me/stakesupports" class="dropdown-item"><svg data-ds-icon="Support" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
                      <path fill="currentColor" d="M12 1C6.49 1 2 5.34 2 10.67v4.61a1 1 0 0 0 .69.95l3.89 1.26c1.25.27 2.42-.68 2.42-1.96v-4.05c0-1.27-1.17-2.22-2.42-1.96l-2.55.55C4.35 6.12 7.8 3.01 12 3.01s7.65 3.12 7.97 7.06l-2.55-.55c-1.25-.27-2.42.68-2.42 1.96v4.05c0 1.27 1.17 2.22 2.42 1.96l2.58-.55v1.07c0 1.1-.9 2-2 2h-4v-.5c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v1.5c0 .55.45 1 1 1h6c2.21 0 4-1.79 4-4v-7.33c0-5.33-4.49-9.67-10-9.67z"></path>
                    </svg><span><?php echo $translations['support'] ?></span></a>


                  <?php if ($is_admin == 1) { ?>
                    <a href="/admin" type="button" class="dropdown-item"><?= $translations['admin_panel'] ?></a>
                  <?php } ?>
                  <a id="logoutBox" href="/logout" class="dropdown-item"><svg data-ds-icon="Logout" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
                      <path fill="currentColor" d="M16 13H3c-.55 0-1-.45-1-1s.45-1 1-1h13c.55 0 1 .45 1 1s-.45 1-1 1"></path>
                      <path fill="currentColor" d="M8 18.66c-.26 0-.51-.1-.71-.29L.93 12l6.36-6.36A.996.996 0 1 1 8.7 7.05L3.75 12l4.95 4.95a.996.996 0 0 1-.71 1.7z"></path>
                      <path fill="currentColor" fill-rule="evenodd" d="M20 2h-8v7h4c1.66 0 3 1.34 3 3s-1.34 3-3 3h-4v7h8c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2" clip-rule="evenodd"></path>
                    </svg><span><?php echo $translations['logout'] ?></span></a>
                </div>
              </div>
            </div>
          </button>
          <button class="header-anchor notification">
            <span class="" style="border: 1.5px solid var(--grey-600);"></span>
            <svg data-ds-icon="NotificationOn" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="svg-icon">
              <path fill="currentColor" d="M12 23c1.66 0 3-1.34 3-3H9c0 1.66 1.34 3 3 3m9-8h-1v-5c0-3.74-2.56-6.86-6.03-7.74.01-.08.03-.17.03-.26 0-1.1-.9-2-2-2s-2 .9-2 2c0 .09.01.17.03.26C6.57 3.14 4 6.27 4 10v5H3c-1.1 0-2 .9-2 2s.9 2 2 2h18c1.1 0 2-.9 2-2s-.9-2-2-2"></path>
            </svg>

          </button>

          <!-- <button class="header-anchor header-chat-close">
            <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon">
              <path d="M32 1.914c-.288-.01-.628-.016-.97-.016C14.254 1.898.586 15.204.002 31.838L0 31.892a28.66 28.66 0 0 0 7.476 19.256l-.02-.024c-.688 4.028-1.89 7.636-3.552 10.974l.102-.228c4.634-.396 8.878-1.73 12.654-3.81l-.164.082c4.474 2.35 9.774 3.728 15.398 3.728h.112H32c.3.01.654.016 1.008.016 16.768 0 30.428-13.31 30.99-29.942l.002-.052C63.414 15.204 49.746 1.9 32.97 1.9q-.512 0-1.018.016l.05-.002zM16.138 37.602a5.948 5.948 0 1 1 0-11.896 5.948 5.948 0 0 1 0 11.896m15.862 0a5.948 5.948 0 1 1 0-11.896 5.948 5.948 0 0 1 0 11.896m15.862 0a5.948 5.948 0 1 1 0-11.896 5.948 5.948 0 0 1 0 11.896"></path>
            </svg>
          </button> -->
        </div>
      <?php } ?>
    </div>
  </div>
</div>
<div class="support-wrap" style="margin-top: 1em;">
  <a href="https://t.me/splitsupports" target="_blank" tabindex="0" class="support-button" aria-label="<?php echo htmlspecialchars($translations['support']); ?>">
    <svg data-ds-icon="Support" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="support-icon">
      <title><?php echo htmlspecialchars($translations['support']); ?></title>
      <path fill="currentColor" d="M12 1C6.49 1 2 5.34 2 10.67v4.61a1 1 0 0 0 .69.95l3.89 1.26c1.25.27 2.42-.68 2.42-1.96v-4.05c0-1.27-1.17-2.22-2.42-1.96l-2.55.55C4.35 6.12 7.8 3.01 12 3.01s7.65 3.12 7.97 7.06l-2.55-.55c-1.25-.27-2.42.68-2.42 1.96v4.05c0 1.27 1.17 2.22 2.42 1.96l2.58-.55v1.07c0 1.1-.9 2-2 2h-4v-.5c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v1.5c0 .55.45 1 1 1h6c2.21 0 4-1.79 4-4v-7.33c0-5.33-4.49-9.67-10-9.67z"></path>
    </svg>
  </a>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Функция для проверки загрузки всех изображений
    if (location.pathname == "/favorites") {
      $('.favorite-box button').addClass('activeBox');
    }
    if (location.pathname == "/my-bets") {
      $('.mybets-box button').addClass('activeBox');
    }
    if (location.pathname == "/recent") {
      $('.recent-box button').addClass('activeBox');
    }
    if (location.pathname == "/challenges") {
      $('.challenge-box button').addClass('activeBox');
    }

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
        $('.loading').hide();
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
    const games = <?php echo json_encode(array_column($games, 'name')); ?>;

    function generateRandomBet() {
      const game = games[Math.floor(Math.random() * games.length)] || 'Unknown Game';
      const betAmount = (Math.random() * (500 - 1) + 1).toFixed(2);
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
    $('.notification-close').on('click', function(e) {
      e.stopPropagation();
      $('.notifications-widget').addClass('closed');
    });
    $('.notification').on('click', function(e) {
      e.stopPropagation();
      $('.notifications-widget').toggleClass('closed');
      $('.dropdown-menu-settings').removeClass('active');
    });

    $('#vipBox').on('click', function() {
      $('.vip-modal-container').removeClass('hide-modal')
    })
    $('.vip-close-button').on('click', function() {
      $('.vip-modal-container').addClass('hide-modal')
    });
    $('.balance-wallet-button').on('click', function() {
      $('.vault-modal-container').removeClass('hide-modal')
    });
    $('#walletBox').on('click', function() {
      $('.vault-modal-container').removeClass('hide-modal')
    });
    $('.vault-close-button').on('click', function() {
      $('.vault-modal-container').addClass('hide-modal')
      $('.promo-modal-container').addClass('hide-modal')
      $('.auth-modal-container').addClass('hide-modal')
      $('.register-modal-container').addClass('hide-modal')
    });
    $('.modal-overlay').on('click', function() {
      $(this).parent().toggleClass('hide-modal');
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
      $('.dropdown-menu-settings').toggleClass('active');
      $('.notifications-widget').addClass('closed');
    });
    $('.modal-trigger').on('click', function(e) {
      e.preventDefault(); // Prevent default link behavior
      var modalId = $(this).data('modal'); // Get target modal ID
      $('.vault-modal-container').addClass('hide-modal'); // Hide all modals
      $(`[data-testid="${modalId}"]`).removeClass('hide-modal'); // Show target modal
    });
    $(document).on('click', function(e) {
      if (!$(e.target).closest('.header-dropdown').length) {
        $('.dropdown-menu-settings').removeClass('active');
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

<?php require("modal.php");

if (!(!isset($_SESSION['login']) || !$_SESSION['login'])) {
  require("promoModal.php");
} ?>