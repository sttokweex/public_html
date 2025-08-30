<?
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

if (isset($_SESSION['lang'])) {
  $lang = $_SESSION['lang'];
} elseif (isset($_COOKIE['lang'])) {
  $lang = $_COOKIE['lang'];
} else {
  $lang = 'en';
}
$allowed = ['en', 'es', 'ru'];
if (!in_array($lang, $allowed, true)) {
  $lang = 'en';
}

// подключаем файл перевода
$path = dirname(__DIR__) . "/lang/{$lang}.php";
if (is_file($path)) {
  $translations = require $path;
} else {
  // страховка: если файла нет — грузим en
  $translations = require dirname(__DIR__) . "/lang/en.php";
}

$refer = $_GET['i'] || '';
if ($refer != '') {
  $_SESSION['ref'] = $refer;
  header('Location: /');
}
$sid = $_SESSION['hash'];
$select = "SELECT * FROM users WHERE hash = '$sid'";
$result = mysqli_query($connection, $select);
$get = mysqli_fetch_array($result);
if ($get) {
  $login = $get['login'];
  $wager = $get['wager'];
  $star_limit = $get['star_limit'];
  $balance = round($get['balance'], 2);
  $id = $get['id'];
  $social_link = $get['social'];
  $is_admin = $get['admin'];
  $is_ban = $get['ban'];
  $img = $get['img'];
  $usersRef = $get['refs'];
  $refearn = $get['refearn'];
  $refuser = $get['ref_id'];
  $data_reg = $get['data_reg'];
  $rakeback = $get['rakeback'];
  $cashback = $get['cashback'];
  $total_send = $get['total_send'];
  $total_rakeback = $get['total_rakeback'];
  $total_cashback = $get['total_cashback'];
  $total_promo = $get['total_promo'];
  $birthday = $get['birthday'];
  $birth_bon = $get['birth_bon'];
  $real_name = $get['name'];
  $real_surname = $get['surname'];
  $real_country = $get['country'];
  $real_town = $get['town'];
  $real_email = $get['email'];
  $real_telephone = $get['telephone'];
  $lock_save = $get['lock_save'];

  $tgid = $get['tg_id'];

  $ref_deps = $get['ref_deps'];
  $ref_deps_sum = $get['ref_deps_sum'];
}
$getDepsForLevel = "SELECT SUM(amount) FROM deposits WHERE hash_user='$sid' AND status='1'";
$getDepsForLevel2 = mysqli_query($connection, $getDepsForLevel);
$leveldeposits = mysqli_fetch_array($getDepsForLevel2);
$depositesSID = $leveldeposits['SUM(amount)'];

if ($depositesSID < 2000) { /* starter rank */
  $cashback_rankt = '0'; /* 0% cashback*/
  $rakeback_rank = "0.1"; /* 0.1% rakeback*/
  $bonusdr = 0; /* 0 монет */
}
if ($depositesSID >= 10000) { /* silver rank */
  $cashback_rankt = '3'; /* 3% cashback*/
  $rakeback_rank = "0.2"; /* 0.2% rakeback*/
  $bonusdr = 0; /* 0 монет */
}
if ($depositesSID >= 50000) { /* gold rank */
  $cashback_rankt = '5'; /* 5% cashback*/
  $rakeback_rank = "0.3"; /* 0.3% rakeback*/
  $bonusdr = 500; /* 250 монет */
}
if ($depositesSID >= 100000) { /* ruby rank */
  $cashback_rankt = '7'; /* 7% cashback*/
  $rakeback_rank = "0.4"; /* 0.4% rakeback*/
  $bonusdr = 1000; /* 500 монет */
}
if ($depositesSID >= 500000) { /* legend rank */
  $cashback_rankt = '10'; /* 10% cashback*/
  $rakeback_rank = "0.5"; /* 0.5% rakeback*/
  $bonusdr = 5000; /* 1000 монет */
}
$wager = round($wager, 2);
if ($is_ban == 1) {
  header('Location: /ban');
}
//if($is_teh == 1){header('Location: /teh');}

if ($is_teh == 1 and $is_admin == 0) {
  header('Location: /teh');
  exit;
}

$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<html lang="<?= htmlspecialchars($lang, ENT_QUOTES, 'UTF-8') ?>">

<head>
  <!-- TikTok Pixel Code Start -->

  <!-- TikTok Pixel Code End -->
  <meta charset="utf-8">
  <meta name="author" content="termus">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../images/logo-mob.svg" type="image/png">
  <meta name="description" content="<?= $sitename ?> - Split!">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
  <!-- CSS -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


  <!-- End CSS -->
  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="/js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js" crossorigin="anonymous"></script>
  <!-- End Scripts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="/js/toastr.min.js" crossorigin="anonymous"></script>
  <script src="/js/custom.js?v=43" crossorigin="anonymous"></script>

  <script src="/js/swiper-bundle.min.js" crossorigin="anonymous"></script>
  <link href="/css/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/toastr.css" crossorigin="anonymous" />
  <link href="/css/livefeed.css" rel="stylesheet">
  <link href='/css/header.css' rel='stylesheet'>
  <link href="/css/index.css" rel="stylesheet">
  <link href="/css/chat.css" rel="stylesheet">
  <link href="/css/game_materials.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/slider.css">
  <link href='/css/footer.css' rel='stylesheet'>
  <link href='/css/sidebar.css' rel='stylesheet'>
  <link href='/css/gameInfo.css' rel='stylesheet'>
  <link href='/css/search.css' rel='stylesheet'>



  <link rel="stylesheet" href="/css/jquery.dataTables.min.css" />
  <script type="text/javascript" src="/js/jquery.dataTables.min.js"> </script>



  <title><?= strtoupper($sitename); ?> - Split !</title>


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

  /* добавлено: стили селектора языка */
  .lang-switch {
    margin-right: 10px;
    display: flex;
    align-items: center;
  }

  .lang-switch select {
    height: 36px;
    border-radius: 8px;
    background: #090f1e;
    border: 1px solid rgba(95, 104, 137, .24);
    color: #fff;
    padding: 0 10px;
    cursor: pointer;
  }
</style>
<input id="hashdeps" class="d-none" value="<?= $depositesSID ?>">
<input id="hash_lock" class="d-none" value="<?= $lock_save ?>">

<!-- HEADER -->

<div id="header" class="headerproject" style="user-select:none;">
  <div class="header-content">
    <div class="wrap normal" data-content=""><!--[!--><!--[--><!--[!--><svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 200" class="svelte-md2ju7">
        <g id="Layer_5">
          <path fill="currentColor" d="M31.47,58.5c-.1-25.81,16.42-40.13,46.75-40.23,21.82-.08,25.72,14.2,25.72,19.39,0,9.94-14.06,20.48-14.06,20.48,0,0,.78,6.19,12.85,6.14,12.07-.05,23.83-8.02,23.76-27.96-.06-22.91-24.06-33.38-47.78-33.29C58.87,3.09,6.24,5.88,6.42,58.13c.18,46.41,87.76,50.5,87.83,80.21.12,32.27-36.08,40.96-48.33,40.96s-17.23-8.67-17.25-13.43c-.09-26.13,25.92-33.41,25.92-33.41,0-1.95-1.52-10.64-11.59-10.6-25.95.05-36.28,22.36-36.21,44.14.07,18.53,13.16,30.09,32.94,30.01,37.82-.14,80.46-18.59,80.3-59.56-.14-38.32-88.46-48.33-88.57-77.96Z"></path>
          <path fill="currentColor" d="M391.96,161.17c-.3-.73-1.15-.56-2.27.37-4.29,3.54-14.1,13.56-37.06,13.65-41.85.16-49.12-68.83-49.12-68.83,0,0,31.9-23.81,36.88-33.42,4.98-9.61-10.87-11.7-10.87-11.7,0,0-22.31,27.15-38.13,35.1,1.72-11.81,13.42-38.72,14.09-54.2.67-15.48-18.63-11.7-21.72-10.22,0,6.76-17.06,68.1-23.27,101.82-3.66,5.85-8.88,12.54-13.56,12.55-2.71,0-3.71-5.02-3.73-12.22,0-9.99,5.5-25.99,5.46-35.71,0-6.73-3.09-7.13-5.75-7.12-.58,0-3.77.09-4.36.09-6.83,0-4.58-5.85-10.73-5.79-18.8.07-42.75,20.59-43.79,51.57-6.35,4.2-15.23,9.5-19.77,9.52-4.76,0-5.94-4.4-5.95-8.2,0-6.68,10.8-46.37,10.8-46.37,0,0,13.76-3.53,19.77-4.69,4.54-.89,5.85-1.22,7.62-3.41s5.22-6.73,8.01-10.8c2.79-4.08.05-7.23-5.11-7.21-6.77,0-24.88,4.29-24.88,4.29,0,0,8.7-37.5,8.69-38.26s-.98-1.16-2.45-1.15c-3.3,0-9.18,1.77-12.94,3.12-5.76,2.06-10.45,9.12-11.4,12.4s-7.46,29.02-7.46,29.02c0,0-34.88,12.04-39.65,13.85-.29.1-.49.37-.49.68s3.99,15.6,12.17,15.54c5.85,0,23.04-7.04,23.04-7.04,0,0-8.83,35.1-8.78,46.81,0,7.51,3.54,16.3,18.21,16.26,13.65,0,25.6-7.05,32.29-11.96,3.66,9.25,12.3,11.79,18.2,11.77,13.22,0,23.4-10.55,24.71-11.96,1.72,4.06,5.76,11.85,15.01,11.82,5.23,0,10.64-5.85,14.63-11.53-.08,1.18-.06,2.36.05,3.54,1.6,14.55,23.2,6,24.38,3.97.73-10.52.27-32.03,4.48-45.31,5.58,45.3,26.74,75.78,64.78,75.64,21.27-.08,32.18-6.19,36.69-11.23,3.69-4.08,4.94-9.81,3.29-15.06ZM209.45,146.23c-18.26.07,5.59-47.27,21.17-47.33.02,6.1-.32,47.26-21.17,47.33Z"></path>
          <path fill="currentColor" d="M357.73,160.74c16.49-.06,29.25-10.91,31.59-14.44,3.02-4.59-3.51-11.53-5.59-11.41-5.21,4.98-10.65,11.01-22.87,11.05-14.38.06-11.13-15.77-11.13-15.77,0,0,27.68,3.58,38.81-16.32,3.56-6.37,3.71-15.17,2.27-18.97s-9.49-10.81-22.3-9.75c-15.74,1.33-35.57,17.74-39.93,37.45-3.5,15.86,3.12,38.26,29.14,38.17ZM375.28,94.33c2.59-.09,2.36,4.18,1.67,8.65-.98,6.06-9.29,21.45-25.17,20.85,1.1-8.96,12.91-29.15,23.53-29.5h-.03Z"></path>
        </g>
      </svg><!--]--><!--]--><!--]--></div>
    <!-- <a class="site_logo_wrapper" href="/">
<img alt="<?= $sitename ?>" width="40" height="40" src="/images/logo-mob.svg">
<span class="hideonmob"><?= $sitename ?></span> -->
    </a>



    <div class="header_Navigation">
      <?php $currentLang = in_array($lang, ['en', 'es', 'ru'], true) ? $lang : 'en'; ?>
      <!-- <div class="lang-switch">
  <select id="langSelect" aria-label="Language">
    <option value="en" <?= $currentLang === 'en' ? 'selected' : '' ?>>EN</option>
    <option value="es" <?= $currentLang === 'es' ? 'selected' : '' ?>>ES</option>
    <option value="ru" <?= $currentLang === 'ru' ? 'selected' : '' ?>>RU</option>
  </select>
</div> -->

      <?php if (!$_SESSION['login']) { ?>

      <? } else { ?>
        <a id="gamesBox" href="/slot" type="button" class="header_NavButton"><?= $translations['games'] ?></a>
        <a id="bonusBox" href="/bonus" type="button" class="header_NavButton"><?= $translations['bonus'] ?></a>
        <a id="refsBox" href="/referals" type="button" class="header_NavButton"><?= $translations['referals'] ?></a>
        <a id="faqBox" href="/faq" type="button" class="header_NavButton"><?= $translations['faq'] ?></a>
        <a id="supportBox" href="https://t.me/splitsupports" type="button" class="header_NavButton"><?= $translations['support'] ?></a>
        <a id="ranksBox" href="/ranks" type="button" class="header_NavButton"><?= $translations['ranks'] ?> <span class="d-none newhbadge"><?= $translations['new'] ?>!</span> </a>
        <? if ($is_admin == 1) { ?>
          <a href="/admin" type="button" class="header_NavButton"><?= $translations['admin_panel'] ?></a>
        <? } ?>
      <? } ?>
    </div>

    <?php if (!$_SESSION['login']) { ?>



      <div class="balance_Container">
        <div class="auth-buttons">
          <button id="auth-button" type="button" onClick="$('#authorization').modal('show');" class="login_Button font-semibold"><?= $translations['login'] ?></button>
          <button id="auth-button" type="button" onClick="$('#authorization').modal('show');" class="register_Button font-semibold"><?= $translations['register'] ?></button>
        </div>
        <!--
    <button id="auth-button" style="display: none;padding: 12px" class="buttonProject" onclick="Telegram.WebApp.openTelegramLink('https://t.me/splitcazbot?start=webapp')">
      Авторизация
    </button>
-->
      </div>
  </div>
</div>
<? } else { ?>
  <div class="header_RightBlock">

    <div class="balwrapper">
      <div class="balblock">
        <!--
  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="sign">
			<path fill-rule="evenodd" clip-rule="evenodd" d="M12.0004 21.6C17.3023 21.6 21.6004 17.3019 21.6004 12C21.6004 6.69806 17.3023 2.39999 12.0004 2.39999C6.69846 2.39999 2.40039 6.69806 2.40039 12C2.40039 17.3019 6.69846 21.6 12.0004 21.6ZM10.6295 6.73792C10.2318 6.73792 9.90949 7.06027 9.90949 7.45792V11.7082H8.76562C8.36798 11.7082 8.04562 12.0306 8.04562 12.4282C8.04562 12.8259 8.36798 13.1482 8.76562 13.1482H9.90949В14.1934H8.76562C8.36798 14.1934 8.04562 14.5157 8.04562 14.9134C8.04562 15.311 8.36798 15.6334 8.76562 15.6334H9.90949В17.3842C9.90949 17.7819 10.2318 18.1042 10.6295 18.1042C11.0271 18.1042 11.3495 17.7819 11.3495 17.3842В15.6334H13.7359C14.1336 15.6334 14.4559 15.311 14.4559 14.9134C14.4559 14.5157 14.1336 14.1934 13.7359 14.1934H11.3495В13.1482H13.7359C14.586 13.1482 15.4012 12.8105 16.0023 12.2095C16.6034 11.6084 16.9411 10.7931 16.9411 9.94307C16.9411 9.09301 16.6034 8.27777 16.0023 7.67668C15.4012 7.0756 14.586 6.73792 13.7359 6.73792H10.6295ZM13.7359 11.7082H11.3495В8.17792H13.7359C14.2041 8.17792 14.6531 8.36389 14.9841 8.69492C15.3151 9.02595 15.5011 9.47492 15.5011 9.94307C15.5011 10.4112 15.3151 10.8602 14.9841 11.1912C14.6531 11.5223 14.2041 11.7082 13.7359 11.7082Z" fill="#F5A60B"></path>
		</svg>
-->
        <div class="" style="border-radius:50%;background: #f5aa1c;color: #000;padding: 5px 8px 5px 8px;font-weight: bold;">$</div>

        <span class="odometer" id="userBalance" myBalance="<?= $balance; ?>"><?= $balance; ?></span>
        <img src="/images/arrow-down.svg">
      </div>

      <button class="buttonProject" onClick="location.href='/wallet'"><i class="fa fa-wallet" aria-hidden="true"></i></button>

    </div>

    <div class="userPicture">
      <img onClick="location.href='/profile'" class="user" src="<?= $img ?>">
      <img onClick="location.href='/ranks'" id="userRankImg" class="ranked" src="/images/ranks/starter.png">
    </div>

  </div>
<? } ?>
</div>

<?php if (!$_SESSION['login']) { ?>

<? } ?>

<script>
  if (location.pathname == "/") {
    document.getElementById('gamesBox').className += ' activeBox'
  }
  if (location.pathname == "/bonus") {
    document.getElementById('bonusBox').className += ' activeBox'
  }
  if (location.pathname == "/referals") {
    document.getElementById('refsBox').className += ' activeBox'
  }
  if (location.pathname == "/faq") {
    document.getElementById('faqBox').className += ' activeBox'
  }
  if (location.pathname == "/support") {
    document.getElementById('supportBox').className += ' activeBox'
  }
  if (location.pathname == "/ranks") {
    document.getElementById('ranksBox').className += ' activeBox'
  }
</script>

<!-- добавлено: обработчик селектора языка -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var sel = document.getElementById('langSelect');
    if (!sel) return;
    sel.addEventListener('change', function() {
      var lang = this.value;
      window.location.href = '/language.php?lang=' + encodeURIComponent(lang);
    });
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
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


</div>


<?
require("modal.php");
?>