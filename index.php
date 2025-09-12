<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}


$requestUri = $_SERVER['REQUEST_URI'];
require_once './panels/slider.php';
require_once './panels/footer.php';
require_once './faq/faq.php';
require_once './panels/livefeed.php';
require_once './panels/gameInfo.php';
require_once './panels/search.php';
require_once './panels/homeHeader.php';
require_once './panels/chat.php';

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

require("system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require("panels/header.php");
require("panels/sidebar.php");
require("panels/mobile.php");

// Определяем SVG-переменные для баннеров и поиска (пустые)
$dropdown_arrow_svg = '';
$search_icon_svg = '';







?>

<body>
    <script type="text/javascript">
        function historys() {
            if (navigator.onLine == true) {
                $("#livegames").load("index.php #livegames");
            }
        }
        setInterval('historys()', 5000);
    </script>



    <div class="main-container" id="main-content">
        <div class="home-page-content-inner">

            <?php

            renderHomeHeader($translations, $login, $depositesSID);


            ?>

            <div class="home-container home-has-padding home-has-margin">

                <?
                renderSearch($games, $translations);
                // renderChatComponent('Иван', $sampleMessages, $translations);
                render_slider($games, false, $translations);
                render_slider($games, true, $translations);;
                renderBetsTable($bets, $translations);
                render_faq($translations, 'Stake');
                renderCasinoComponent($translations);

                ?>

            </div>

            <?php render_footer($translations, 'Stake') ?>
        </div>
    </div>


</body>

</html>