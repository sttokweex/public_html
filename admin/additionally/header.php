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
$path = dirname(dirname(__DIR__)) . "/lang/{$lang}.php";
if (is_file($path)) {
  $translations = require $path;
} else {
  $translations = require dirname(dirname(__DIR__)) . "/lang/en.php";
}

$sid = $_SESSION['hash'];
$select = "SELECT * FROM users WHERE hash = '$sid'";
$result = mysqli_query($connection, $select);
$get = mysqli_fetch_array($result);
if ($get) {
  $login = $get['login'];
  $balance = round($get['balance'], 2);
  $id = $get['id'];
  $social_link = $get['social'];
  $is_admin = $get['admin'];
  $img = $get['img'];
}
if ($is_admin == 0) {
  header('location: /');
  die();
}
require('modals.php');
?>

<html lang="<?= htmlspecialchars($lang, ENT_QUOTES, 'UTF-8') ?>">

<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=.5" />
  <link rel="icon" href="../../images/logo-mob.png" type="image/png">

  <!-- CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@800&family=Rubik&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link href='https://fonts.googleapis.com/css?family=Rubik' rel='stylesheet'>

  <!-- End CSS -->
  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js" crossorigin="anonymous"></script>
  <!-- End Scripts -->
  <script src="../../js/toastr.min.js"></script>
  <script src="../../admin/js/functions.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../../css/toastr.css" crossorigin="anonymous" />
  <!-- NEW CSS -->
  <link href='../../css/header.css' rel='stylesheet'>
  <link href='../../css/livefeed.css' rel='stylesheet'>
  <link href='../../css/footer.css' rel='stylesheet'>
  <link href='../../css/sidebar.css' rel='stylesheet'>
  <link href='../../css/more.css' rel='stylesheet'>
  <link href='../../css/modal.css' rel='stylesheet'>

  <link href="../../css/toastr.css" rel="stylesheet">
  <link href="../../admin/additionally/css.css" rel="stylesheet">
  <title><?= $sitename ?> - Admin Dashboard</title>
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

<!-- HEADER -->



<div class="headerproject">

  <a class="site_logo_wrapper" href="/">
    <span class="hideonmob"><?= $sitename ?></span>
  </a>

  <div class="header_Wrapper">

    <div class="header_Navigation">
      <a id="mains1" href="/admin/" type="button" class="header_NavButton">Настройки</a>
      <a id="mains2" href="/admin/users" type="button" class="header_NavButton">Пользователи</a>
      <a id="mains3" href="/admin/promo" type="button" class="header_NavButton">Промокоды</a>
      <a id="mains4" href="/admin/deps" type="button" class="header_NavButton">Пополнения</a>
      <a id="mains5" href="/admin/withs" type="button" class="header_NavButton">Выводы</a>
      <a id="mains6" href="/admin/stats" type="button" class="header_NavButton">Статистика</a>
    </div>


  </div>


  <script>
    if (location.pathname == "/admin/") {
      document.getElementById('mains1').className += ' activeBox'
    }
    if (location.pathname == "/admin/users") {
      document.getElementById('mains2').className += ' activeBox'
    }
    if (location.pathname == "/admin/promo") {
      document.getElementById('mains3').className += ' activeBox'
    }
    if (location.pathname == "/admin/deps") {
      document.getElementById('mains4').className += ' activeBox'
    }
    if (location.pathname == "/admin/withs") {
      document.getElementById('mains5').className += ' activeBox'
    }
    if (location.pathname == "/admin/stats") {
      document.getElementById('mains6').className += ' activeBox'
    }
    if (location.pathname == "/admin/chating") {
      document.getElementById('mains7').className += ' activeBox'
    }
    if (location.pathname == "/admin/tickets") {
      document.getElementById('mains8').className += ' activeBox'
    }
  </script>


</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.8/themes/odometer-theme-default.min.css" integrity="sha512-jHurNV8IL4Q4DRHzlRaIboSWZqnA3KU6KTiRQrtU+jxE1MHxdiveHrztuHhyna6PWTE427SxNDDUqjaruirB2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.8/odometer.min.js" integrity="sha512-51WDTV7haD9BBDc8RWH2r5TnuSiRyAqEnbGyuKHYn+qpYCrCckxFeqlr1I5UoOULijyLV2vnHO9LS4MrAzHxwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>