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
                ?>
                <div class="tabs" style="">
                    <div class="inner-tabs">
                        <div class="tabs-wrapper ScrollX">
                            <div class="tabs-slider">
                                <div class="tabs-content ">
                                    <button type="button" class="tabs-button active"><svg data-ds-icon="AllGames" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!--[!--><!--]-->
                                            <path fill="currentColor" d="M9.08 1H3a2 2 0 0 0-2 2v6.08a2 2 0 0 0 2 2h6.08a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2M21 1h-6.08a2 2 0 0 0-2 2v6.08a2 2 0 0 0 2 2H21a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2M9.08 12.92H3a2 2 0 0 0-2 2V21a2 2 0 0 0 2 2h6.08a2 2 0 0 0 2-2v-6.08a2 2 0 0 0-2-2m11.92 0h-6.08a2 2 0 0 0-2 2V21a2 2 0 0 0 2 2H21a2 2 0 0 0 2-2v-6.08a2 2 0 0 0-2-2"></path>
                                        </svg><span><? echo htmlspecialchars($translations['lobby']) ?></span></button>
                                </div>
                                <div class="tabs-content">
                                    <button type="button" class="tabs-button">
                                        <img src="/images/sidebar/icons/dog-house.gif" class="svg-icon gif-icon">
                                        <span>The Dog House</span></button>
                                </div>
                                   <div class="tabs-content">
                                    <button type="button" class="tabs-button">
                                        <img src="/images/sidebar/icons/sugar-rush.png" class="svg-icon gif-icon">
                                        <span>Sugar Rush</span></button>
                                </div>
                                   <div class="tabs-content">
                                    <button type="button" class="tabs-button">
                                        <img src="/images/sidebar/icons/best.gif" class="svg-icon gif-icon">
                                        <span>Gates of Olympus</span></button>
                                </div>
                                   <div class="tabs-content">
                                    <button type="button" class="tabs-button">
                                        <img src="/images/sidebar/icons/sweet.png" class="svg-icon gif-icon">
                                        <span>Sweet Bonanza</span></button>
                                </div>
                                <div class="tabs-content">
                                    <button type="button" class="tabs-button"><svg data-ds-icon="New" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!--[!--><!--]-->
                                            <path fill="currentColor" d="M22 12c-7.8 1.21-8.79 2.2-10 10-1.21-7.8-2.2-8.79-10-10 7.8-1.21 8.79-2.2 10-10 1.21 7.8 2.2 8.79 10 10m2-7c-3.12.48-3.52.88-4 4-.48-3.12-.88-3.52-4-4 3.12-.48 3.52-.88 4-4 .48 3.12.88 3.52 4 4M8 19c-3.12.48-3.52.88-4 4-.48-3.12-.88-3.52-4-4 3.12-.48 3.52-.88 4-4 .48 3.12.88 3.52 4 4"></path>
                                        </svg><span><? echo htmlspecialchars($translations['new_releases']) ?></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?
                renderChatComponent('Иван', $sampleMessages, $translations);              
                render_slider($games, false, $translations, 'default');
                render_slider($games, false, $translations, 'ourGames');
                render_slider($games, true, $translations, 'zews');
                render_slider($games, true, $translations, 'dogs'); 
                render_slider($games, true, $translations, 'sweet'); render_slider($games, true, $translations, 'sugar');
                renderBetsTable($translations);
                render_faq($translations, 'Stake');
                renderCasinoComponent($translations);

                ?>

            </div>

            <?php render_footer($translations, 'Stake') ?>
        </div>
    </div>
    <script>
       $(document).ready(function() {
    $('.tabs-button').on('click', function() {
        // Удаляем класс 'active' у всех кнопок в пределах того же контейнера
        $(this).closest('.tabs-slider').find('.tabs-button').removeClass('active');
        // Добавляем класс 'active' к нажатой кнопке
        $(this).addClass('active');

        // Получаем текст кнопки из <span>
        var tabText = $(this).find('span').text().trim();

        // Получаем перевод для 'lobby'
        const translations = <?php echo json_encode($translations, JSON_UNESCAPED_UNICODE); ?>;

        // Скрываем все слайдеры
        $('.game-slider').hide();

        // Если текст кнопки равен translations['lobby'], показываем все слайдеры
        if (tabText === translations['lobby']) {
            $('.game-slider').show();
        } else {
            // Иначе показываем только слайдер с соответствующим data-slider-id
            $(`.game-slider[data-slider-id="${tabText}"]`).show();
        }
    });
});
    </script>

</body>

</html>