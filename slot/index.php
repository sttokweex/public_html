<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}



$requestUri = $_SERVER['REQUEST_URI'];
require_once '../panels/slider.php';
require_once '../panels/footer.php';
require_once '../faq/faq.php';
require_once '../panels/livefeed.php';
require_once '../panels/gameInfo.php';
require_once '../panels/search.php';
require_once '../panels/banners.php';
require_once '../panels/chat.php';

if (strpos($requestUri, '/slot/api/GetBalance') !== false) {
    require 'slot/api/getBalance.php';
    exit;
}

if (strpos($requestUri, '/slot/api/BetWin') !== false) {
    require 'slot/api/betWin.php';
    exit;
}
if (strpos($requestUri, '/slot/api/CustomBet') !== false) {
    require 'slot/api/customBet.php';
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

require("../system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require("../panels/header.php");
require("../panels/sidebar.php");
require("../panels/mobile.php");

// Определяем SVG-переменные для баннеров и поиска (пустые)
$dropdown_arrow_svg = '';
$search_icon_svg = '';





?>










<div class="main-container" id="main-content">
    <div class="home-page-content-inner">

        <?php
        renderBanners();
        // renderSearch($games, $translations);
        ?>

        <div class="home-container home-has-padding home-has-margin">

            <?
            // renderChatComponent('Иван', $sampleMessages, $translations);
            render_slider($games, false, $translations);
            render_slider($games, true, $translations);
            render_faq($translations)
            // renderBetsTable($bets, $translations);
            // renderCasinoComponent($translations);

            ?>

        </div>


    </div>
</div> <?php render_footer($translations) ?>