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
                <div class="tabs" style="margin-bottom:1.5rem">
                    <div class="inner-tabs">
                        <div class="tabs-wrapper ScrollX">
                            <div class="tabs-slider">
                                <div class="tabs-content ">
                                    <button type="button" class="tabs-button active"><svg data-ds-icon="AllGames" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!--[!--><!--]-->
                                            <path fill="currentColor" d="M9.08 1H3a2 2 0 0 0-2 2v6.08a2 2 0 0 0 2 2h6.08a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2M21 1h-6.08a2 2 0 0 0-2 2v6.08a2 2 0 0 0 2 2H21a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2M9.08 12.92H3a2 2 0 0 0-2 2V21a2 2 0 0 0 2 2h6.08a2 2 0 0 0 2-2v-6.08a2 2 0 0 0-2-2m11.92 0h-6.08a2 2 0 0 0-2 2V21a2 2 0 0 0 2 2H21a2 2 0 0 0 2-2v-6.08a2 2 0 0 0-2-2"></path>
                                        </svg><span><? echo htmlspecialchars($translations['lobby']) ?></span></button>
                                </div>
                                <div class="tabs-content">
                                    <button type="button" class="tabs-button"><svg data-ds-icon="Slots" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!--[!--><!--]-->
                                            <path fill="currentColor" d="M7.62 10.61a20 20 0 0 0-1.45 3.96 7.5 7.5 0 0 0 0 3.59l.18.75-4.07 1A9.47 9.47 0 0 1 3 13.43l-3 .71v-2.92l7.34-1.76zM24 11.72l-.23 1.16a21.4 21.4 0 0 0-2.97 2.95 7.64 7.64 0 0 0-1.5 3.26l-.15.75-4.15-.76a9.53 9.53 0 0 1 3.34-5.57l-3-.59 1.26-2.66z"></path>
                                            <path fill="currentColor" d="M18 6.03a33.5 33.5 0 0 0-3.8 5.74 12.44 12.44 0 0 0-1.4 5.7v1.25H8.08a13.9 13.9 0 0 1 1.25-5.69 21.7 21.7 0 0 1 3.37-5.28h-7V4.09H18z"></path>
                                        </svg><span><? echo htmlspecialchars($translations['slots']) ?></span></button>
                                </div>
                                <div class="tabs-content">
                                    <button type="button" class="tabs-button"><svg data-ds-icon="New" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!--[!--><!--]-->
                                            <path fill="currentColor" d="M22 12c-7.8 1.21-8.79 2.2-10 10-1.21-7.8-2.2-8.79-10-10 7.8-1.21 8.79-2.2 10-10 1.21 7.8 2.2 8.79 10 10m2-7c-3.12.48-3.52.88-4 4-.48-3.12-.88-3.52-4-4 3.12-.48 3.52-.88 4-4 .48 3.12.88 3.52 4 4M8 19c-3.12.48-3.52.88-4 4-.48-3.12-.88-3.52-4-4 3.12-.48 3.52-.88 4-4 .48 3.12.88 3.52 4 4"></path>
                                        </svg><span><? echo htmlspecialchars($translations['popular']) ?></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?
                renderChatComponent('Иван', $sampleMessages, $translations);
                echo '<div class="slider-first">';
                render_slider($games, false, $translations, true);
                echo '</div>';
                echo '<div class="slider-second">';
                render_slider($games, true, $translations);
                echo '</div>';
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
                // Remove 'active' from all tabs-content within the same tabs-slider
                $(this).closest('.tabs-slider').find('.tabs-button.active').removeClass('active');
                // Add 'active' to the clicked button's parent tabs-content
                $(this).addClass('active');
                var tabText = $(this).find('span').text().trim();

                // Show/hide sliders based on tab text
                if (tabText === 'Lobby') {
                    $('.slider-first').show();
                    $('.slider-second').show();
                } else if (tabText === 'Popular') {
                    $('.slider-first').show();
                    $('.slider-second').hide();
                } else if (tabText === 'Slots') {
                    $('.slider-first').hide();
                    $('.slider-second').show();
                }
            });
        });
    </script>

</body>

</html>