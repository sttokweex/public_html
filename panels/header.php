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
$allowed = ['en','es','ru'];
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
if($refer != '') {
$_SESSION['ref'] = $refer;
header('Location: /');
}
$sid = $_SESSION['hash'];
$select = "SELECT * FROM users WHERE hash = '$sid'";
$result = mysqli_query($connection,$select);
$get = mysqli_fetch_array($result);
if($get)
{
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
$getDepsForLevel2 = mysqli_query($connection,$getDepsForLevel);
$leveldeposits = mysqli_fetch_array($getDepsForLevel2);
$depositesSID = $leveldeposits['SUM(amount)'];

if($depositesSID < 2000){ /* starter rank */
$cashback_rankt = '0'; /* 0% cashback*/
$rakeback_rank = "0.1"; /* 0.1% rakeback*/
$bonusdr = 0; /* 0 монет */
}
if($depositesSID >= 10000){ /* silver rank */
$cashback_rankt = '3'; /* 3% cashback*/
$rakeback_rank = "0.2"; /* 0.2% rakeback*/
$bonusdr = 0; /* 0 монет */
}
if($depositesSID >= 50000){ /* gold rank */
$cashback_rankt = '5'; /* 5% cashback*/
$rakeback_rank = "0.3"; /* 0.3% rakeback*/
$bonusdr = 500; /* 250 монет */
}
if($depositesSID >= 100000){ /* ruby rank */
$cashback_rankt = '7'; /* 7% cashback*/
$rakeback_rank = "0.4"; /* 0.4% rakeback*/
$bonusdr = 1000; /* 500 монет */
}
if($depositesSID >= 500000){ /* legend rank */
$cashback_rankt = '10'; /* 10% cashback*/
$rakeback_rank = "0.5"; /* 0.5% rakeback*/
$bonusdr = 5000; /* 1000 монет */
}
$wager = round($wager, 2);
if($is_ban == 1){header('Location: /ban');}
//if($is_teh == 1){header('Location: /teh');}

if($is_teh == 1 and $is_admin == 0){
header('Location: /teh');
exit;
}

$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<html lang="<?= htmlspecialchars($lang, ENT_QUOTES, 'UTF-8') ?>">

<head>
    <!-- TikTok Pixel Code Start -->
    <script>
    !function (w, d, t) {
      w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie","holdConsent","revokeConsent","grantConsent"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(
    var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var r="https://analytics.tiktok.com/i18n/pixel/events.js",o=n&&n.partner;ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=r,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};n=document.createElement("script")
    ;n.type="text/javascript",n.async=!0,n.src=r+"?sdkid="+e+"&lib="+t;e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(n,e)};


      ttq.load('D2I9PA3C77U9PLHENAQG');
      ttq.page();
    }(window, document, 'ttq');
    </script>
    <!-- TikTok Pixel Code End -->
  <meta charset="utf-8">
  <meta name="author" content="termus">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../images/logo-mob.svg" type="image/png">
  <meta name="description" content="<?=$sitename?> - Split!">
  <!-- CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@800&family=Rubik&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link href='https://fonts.googleapis.com/css?family=Rubik' rel='stylesheet'>

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
<link rel="stylesheet" href="/css/toastr.css" crossorigin="anonymous"/>
  <!-- NEW CSS -->
  <link href='/css/header.css' rel='stylesheet'>
  <link href='/css/livefeed.css' rel='stylesheet'>
  <link href='/css/footer.css' rel='stylesheet'>
  <link href='/css/sidebar.css' rel='stylesheet'>
  <link href='/css/more.css' rel='stylesheet'>
  <link href='/css/modal.css' rel='stylesheet'>
    <link rel="stylesheet" href="/css/jquery.dataTables.min.css" />
     <script type="text/javascript" src="/js/jquery.dataTables.min.js"> </script>

     <script src="https://telegram.org/js/telegram-web-app.js"></script>

  <title><?=strtoupper($sitename);?> -  Split !</title>


</head>
<style>
  .loader{border: 4px solid #ffffff3b;border-top-color: #ffffff;border-radius: 50%;width: 48px;height: 48px;-webkit-animation: loader-spins 2s linear infinite;animation: loader-spins 2s linear infinite;display: flex;margin: 0 auto;}
  @keyframes loader-spins{0% {transform: rotate(0deg);}100% {transform: rotate(3turn);}}

  /* добавлено: стили селектора языка */
  .lang-switch { margin-right: 10px; display: flex; align-items: center; }
  .lang-switch select {
    height: 36px;
    border-radius: 8px;
    background: #090f1e;
    border: 1px solid rgba(95,104,137,.24);
    color: #fff;
    padding: 0 10px;
    cursor: pointer;
  }
</style>
<input id="hashdeps" class="d-none" value="<?=$depositesSID?>">
<input id="hash_lock" class="d-none" value="<?=$lock_save?>">

<!-- HEADER -->

<div class="headerproject" style="user-select:none;">

<a class="site_logo_wrapper" href="/">
<img alt="<?=$sitename?>" width="40" height="40" src="/images/logo-mob.svg">
<span class="hideonmob"><?=$sitename?></span>
</a>

<div class="header_Wrapper">

<div class="header_Navigation">
<?php $currentLang = in_array($lang, ['en','es','ru'], true) ? $lang : 'en'; ?>
<div class="lang-switch">
  <select id="langSelect" aria-label="Language">
    <option value="en" <?= $currentLang === 'en' ? 'selected' : '' ?>>EN</option>
    <option value="es" <?= $currentLang === 'es' ? 'selected' : '' ?>>ES</option>
    <option value="ru" <?= $currentLang === 'ru' ? 'selected' : '' ?>>RU</option>
  </select>
</div>

<?php if(!$_SESSION['login']) { ?>
<a href="/slot" type="button" class="header_NavButton"><?= $translations['games'] ?></a>
<a href="/faq" type="button" class="header_NavButton">FAQ</a>
<a href="https://t.me/splitsupports" type="button" class="header_NavButton"><?= $translations['support'] ?></a>
<?}else{?>
<a id="gamesBox" href="/slot" type="button" class="header_NavButton"><?= $translations['games'] ?></a>
<a id="bonusBox" href="/bonus" type="button" class="header_NavButton"><?= $translations['bonus'] ?></a>
<a id="refsBox" href="/referals" type="button" class="header_NavButton"><?= $translations['referals'] ?></a>
<a id="faqBox" href="/faq" type="button" class="header_NavButton"><?= $translations['faq'] ?></a>
<a id="supportBox" href="https://t.me/splitsupports" type="button" class="header_NavButton"><?= $translations['support'] ?></a>
<a id="ranksBox" href="/ranks" type="button" class="header_NavButton"><?= $translations['ranks'] ?> <span class="d-none newhbadge"><?= $translations['new'] ?>!</span> </a>
<?if($is_admin == 1){?>
<a href="/admin" type="button" class="header_NavButton"><?= $translations['admin_panel'] ?></a>
<?}?>
<?}?>
</div>

<?php if(!$_SESSION['login']) { ?>

<div class="header_RightBlock">

 <div class="balance_Container">

    <button id="auth-button" type="button" onClick="$('#authorization').modal('show');" style="padding: 12px;" class="buttonProject"><?= $translations['login'] ?></button>
<!--
    <button id="auth-button" style="display: none;padding: 12px" class="buttonProject" onclick="Telegram.WebApp.openTelegramLink('https://t.me/splitcazbot?start=webapp')">
      Авторизация
    </button>
-->
  </div>
</div>
<?}else{?>
<div class="header_RightBlock">

<div class="balwrapper">
 <div class="balblock">
<!--
  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="sign">
			<path fill-rule="evenodd" clip-rule="evenodd" d="M12.0004 21.6C17.3023 21.6 21.6004 17.3019 21.6004 12C21.6004 6.69806 17.3023 2.39999 12.0004 2.39999C6.69846 2.39999 2.40039 6.69806 2.40039 12C2.40039 17.3019 6.69846 21.6 12.0004 21.6ZM10.6295 6.73792C10.2318 6.73792 9.90949 7.06027 9.90949 7.45792V11.7082H8.76562C8.36798 11.7082 8.04562 12.0306 8.04562 12.4282C8.04562 12.8259 8.36798 13.1482 8.76562 13.1482H9.90949В14.1934H8.76562C8.36798 14.1934 8.04562 14.5157 8.04562 14.9134C8.04562 15.311 8.36798 15.6334 8.76562 15.6334H9.90949В17.3842C9.90949 17.7819 10.2318 18.1042 10.6295 18.1042C11.0271 18.1042 11.3495 17.7819 11.3495 17.3842В15.6334H13.7359C14.1336 15.6334 14.4559 15.311 14.4559 14.9134C14.4559 14.5157 14.1336 14.1934 13.7359 14.1934H11.3495В13.1482H13.7359C14.586 13.1482 15.4012 12.8105 16.0023 12.2095C16.6034 11.6084 16.9411 10.7931 16.9411 9.94307C16.9411 9.09301 16.6034 8.27777 16.0023 7.67668C15.4012 7.0756 14.586 6.73792 13.7359 6.73792H10.6295ZM13.7359 11.7082H11.3495В8.17792H13.7359C14.2041 8.17792 14.6531 8.36389 14.9841 8.69492C15.3151 9.02595 15.5011 9.47492 15.5011 9.94307C15.5011 10.4112 15.3151 10.8602 14.9841 11.1912C14.6531 11.5223 14.2041 11.7082 13.7359 11.7082Z" fill="#F5A60B"></path>
		</svg>
-->
    <div class="" style="border-radius:50%;background: #f5aa1c;color: #000;padding: 5px 8px 5px 8px;font-weight: bold;">$</div>

   <span class="odometer" id="userBalance" myBalance="<?=$balance;?>"><?=$balance;?></span>
<img src="/images/arrow-down.svg">
 </div>

<button class="buttonProject" onClick="location.href='/wallet'"><i class="fa fa-wallet" aria-hidden="true"></i></button>

</div>

<div class="userPicture">
    <img onClick="location.href='/profile'" class="user" src="<?=$img?>">
    <img onClick="location.href='/ranks'" id="userRankImg" class="ranked" src="/images/ranks/starter.png">
</div>

</div>
<?}?>
</div>

<?php if(!$_SESSION['login']) { ?>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    if (window.Telegram && Telegram.WebApp) {
        if(Telegram.WebApp.platform == 'web'){
          document.getElementById('auth-button').style.display = 'block';
        }else{
          document.getElementById('auth-button').style.display = 'none';
          Telegram.WebApp.expand();

          const user = Telegram.WebApp.initDataUnsafe.user;

          if (user) {

              console.log('sendAuthData', Telegram.WebApp.initData);

              $.ajax({
                  type: 'POST',
                  url: 'auth/tg/tgAuthWebApp.php',
                  dataType: 'json',
                  data: {
                    initData: Telegram.WebApp.initData
                  },
                  success: function(data) {
                    if (data.response === 'success') {
                      console.log('Auth success:', data.user);
                      window.location.reload();
                    } else {
                        console.error('Auth error:', data.message);
                        return toastr['error'](obj.message);
                    }
                  }
              });

          } else {
              document.getElementById('auth-button').style.display = 'block';
          }
        }

    } else {
        console.log('Not in Telegram WebApp');
    }
});
</script>
<?}?>

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
  document.addEventListener('DOMContentLoaded', function () {
    var sel = document.getElementById('langSelect');
    if (!sel) return;
    sel.addEventListener('change', function () {
      var lang = this.value;
      window.location.href = '/language.php?lang=' + encodeURIComponent(lang);
    });
  });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('register') === '1') {
        $('#authorization').modal('show');
        // убираем параметр из адресной строки без перезагрузки
        if (history.replaceState) {
            const newUrl = window.location.origin + window.location.pathname;
            history.replaceState(null, '', newUrl);
        }
    }
});
</script>


</div>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.8/themes/odometer-theme-default.min.css" integrity="sha512-jHurNV8IL4Q4DRHzlRaIboSWZqnA3KU6KTiRQrtU+jxE1MHxdiveHrztuHhyna6PWTE427SxNDDUqjaruirB2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.8/odometer.min.js" integrity="sha512-51WDTV7haD9BBDc8RWH2r5TnuSiRyAqEnbGyuKHYn+qpYCrCckxFeqlr1I5UoOULijyLV2vnHO9LS4MrAzHxwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?
require("modal.php");
?>
