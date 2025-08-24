<?php
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
$path = __DIR__ . "/lang/{$lang}.php";
if (is_file($path)) {
    $translations = require $path;
} else {
    $translations = require __DIR__ . "/lang/en.php";
}

$requestUri = $_SERVER['REQUEST_URI'];

if (strpos($requestUri, '/slot/api/GetBalance') !== false) {
    require 'slot/api/getBalance.php';
    exit;
}


if (strpos($requestUri, '/slot/api/BetWin') !== false) {
    require 'slot/api/betWin.php';
    exit;
}

if (strpos($requestUri, '/slot/api/Withdraw') !== false) {
    require 'slot/api/withdraw.php';
    exit;
}

if (strpos($requestUri, '/slot/api/Deposit') !== false) {
    require 'slot/api/deposit.php';
    exit;
}

if (strpos($requestUri, '/slot/api/RollbackTransaction') !== false) {
    require 'slot/api/rollbackTransaction.php';
    exit;
}

require ("system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require ("panels/header.php");
require ("panels/sidebar.php");
require ("panels/chat.php");
require("panels/mobile.php");
?> 
<body>
<script type="text/javascript">
function historys() {
if(navigator.onLine == true) {
$("#livegames").load("index.php #livegames");
 } 
}
setInterval('historys()', 5000);
</script> 

<link href="/css/index.css" rel="stylesheet">
<link href="/css/game_materials.css" rel="stylesheet"> 

<div class="container">

<div class="banners">
    <div class="banners__left">
        <div class="swiper-wrapper">
            <a href="/slot" class="swiper-slide">
                <img src="/images/banners/maxwin_new.png">
                <div class="banners__overlay">
                    <div class="button">
                        <?= $translations['more'] ?>
                    </div>
                </div>
            </a>
            <a href="/slot" class="swiper-slide">
                <img src="/images/banners/highrisk_new.png">
                <div class="banners__overlay">
                    <div class="button">
                        <?= $translations['more'] ?>
                    </div>
                </div>
            </a>
            <a href="/slot" class="swiper-slide">
                <img src="/images/banners/maxwin_2_new.png">
                <div class="banners__overlay">
                    <div class="button">
                        <?= $translations['more'] ?>
                    </div>
                </div>
            </a>
            <a href="/slot" class="swiper-slide">
                <img src="/images/banners/zeus_new.png">
                <div class="banners__overlay">
                    <div class="button">
                        <?= $translations['more'] ?>
                    </div>
                </div>
            </a>
        </div>
        <div class="banners__left-arrow">
            <button type="button" class="prev">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path d="M382.678 226.804 163.73 7.86C158.666 2.792 151.906 0 144.698 0s-13.968 2.792-19.032 7.86l-16.124 16.12c-10.492 10.504-10.492 27.576 0 38.064L293.398 245.9l-184.06 184.06c-5.064 5.068-7.86 11.824-7.86 19.028 0 7.212 2.796 13.968 7.86 19.04l16.124 16.116c5.068 5.068 11.824 7.86 19.032 7.86s13.968-2.792 19.032-7.86L382.678 265c5.076-5.084 7.864-11.872 7.848-19.088.016-7.244-2.772-14.028-7.848-19.108z" fill="currentColor" opacity="1" data-original="#000000"></path></g></svg>
            </button>
            <button type="button" class="next">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path d="M382.678 226.804 163.73 7.86C158.666 2.792 151.906 0 144.698 0s-13.968 2.792-19.032 7.86l-16.124 16.12c-10.492 10.504-10.492 27.576 0 38.064L293.398 245.9l-184.06 184.06c-5.064 5.068-7.86 11.824-7.86 19.028 0 7.212 2.796 13.968 7.86 19.04l16.124 16.116c5.068 5.068 11.824 7.86 19.032 7.86s13.968-2.792 19.032-7.86L382.678 265c5.076-5.084 7.864-11.872 7.848-19.088.016-7.244-2.772-14.028-7.848-19.108z" fill="currentColor" opacity="1" data-original="#000000"></path></g></svg>
            </button>
        </div>
    </div>
    <div class="banners__right">
        <a href="/bonus" class="banners__item">
            <img src="/images/banners/cashback_mobile_new.png" alt="">
            <div class="banners__overlay">
                <div class="button">
                    <?= $translations['more'] ?>
                </div>
            </div>
        </a>
        <a href="/referals" class="banners__item">
            <img src="/images/banners/refferal_mobile_new.png" alt="">
            <div class="banners__overlay">
                <div class="button">
                    <?= $translations['more'] ?>
                </div>
            </div>
        </a>
    </div>
</div>
 
    
<!-- <div class="alert_index">
<div class="badge">
</div>
<div class="info">
<div class="name">Бонус за депозит</div>
<div class="description">Получи <?=$vkrepostsize?> спинов за депозит!</div>
</div>
<button class="gtbtnBonus" onClick="location.href='/bonus'">Получить</button>
</div>
 -->

<?
require ("panels/livefeed.php");
?>

</div> 


<?
require ("panels/footer.php");
?> 
<script>
    $(document).ready(function() { 
        const slider = new Swiper('.banners__left', {
            slidesPerView: 1,
            spaceBetween: 16,
            navigation: {
                prevEl: '.banners__left-arrow .prev',
                nextEl: '.banners__left-arrow .next'
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            }
        })
    });
</script>
<!-- <script src="https://telegram.org/js/telegram-web-app.js"></script>
<script>
    alert(Telegram.WebApp.initData);
</script> -->
</body>
</html>