<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$requestUri = $_SERVER['REQUEST_URI'];
require_once dirname(__DIR__, 1) . '/panels/slider.php';
require_once dirname(__DIR__, 1) . '/panels/footer.php';
require_once dirname(__DIR__, 1) . '/faq/faq.php';
require_once dirname(__DIR__, 1) . '/panels/livefeed.php';
require_once dirname(__DIR__, 1) . '/panels/gameInfo.php';
require_once dirname(__DIR__, 1) . '/panels/search.php';
require_once dirname(__DIR__, 1) . '/panels/homeHeader.php';
require_once dirname(__DIR__, 1) . '/panels/chat.php';

if (strpos($requestUri, '/slot/api/GetBalance') !== false) {
    require 'slot/api/getBalance.php';
    exit;
}

if (strpos($requestUri, '/slot/api/BetWin') !== false) {
    require 'slot/api/betWin.php';
    exit;
}
if (strpos($requestUri, '/slot/api/customBet') !== false) {
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
require(dirname(__DIR__, 1) . "/panels/header.php");
require(dirname(__DIR__, 1) . "/panels/sidebar.php");
require(dirname(__DIR__, 1) . "/panels/mobile.php");

// Определяем SVG-переменные для баннеров и поиска (пустые)
$dropdown_arrow_svg = '';
$search_icon_svg = '';

// Получаем список игр из двух API


?>

<div class="main-container" id="main-content">
    <div class="home-page-content-inner">
        <?php
        renderHomeHeader($translations, $login, $depositesSID);
        renderSearch($games, $translations);
        ?>
        <div class="home-container home-has-padding home-has-margin">
            <?php
            // renderChatComponent('Иван', $sampleMessages, $translations);
            render_slider($games, false, $translations);
            render_slider($games, true, $translations);;
            renderBetsTable($bets, $translations);
            renderCasinoComponent($translations);
            ?>
        </div>
        <?php render_footer($translations, 'Stake') ?>
    </div>
</div>

<!-- 
    Важно: Компоненты (slider.php, search.php, livefeed.php и т.д.) должны использовать поля:
    - name (для названий игр)
    - gameid (для идентификаторов)
    - iconurl (для иконок)
    Убедитесь, что все компоненты обновлены для работы с этими полями вместо g_title, g_name, icon.
-->