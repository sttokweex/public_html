<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require("system/config.php");

require("panels/header.php");

require("panels/sidebar.php");
$requestUri = $_SERVER['REQUEST_URI'];

require_once './panels/slider.php';
require_once './panels/footer.php';
require_once './faq/faq.php';
require_once './panels/search.php';
require_once './panels/banners.php';

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



// Определяем SVG-переменные для баннеров и поиска (пустые)
$dropdown_arrow_svg = '';
$search_icon_svg = '';






?>












<div class="main-container" id="main-content">
    <div class="home-page-content-inner">

        <?php

        renderBanners($translations);


        ?>

        <div class="home-container">

            <?

            // renderChatComponent('Иван', $sampleMessages, $translations);
            render_slider($games, false, $translations, true); ?>
            <div class="fn-portlet portlet__content portlet__content_border_none portlet__content_type_56 portlet-theme-dark">
                <div class="" data-web-content-id="SPOTLIGHT_CASINO_WO_JUL25">
                    <article>
                        <div aria-label="Spotlight card" class="col-mob-4 col-dsk-12 Card__cardContainer--3vW">
                            <div class="Card__imageContainer--2iX" style="background-image: url(/images/bgpromo.webp)"><span class="Icon__icon--x96 Icon__medium--DLa Card__cornerIcon--3I6 SpotlightIcon__corner--2f-" role="img" aria-label="icon_corner"></span><img alt="Spotlight image" draggable="false" class="Image__image--2Bt Card__image--1yK" src="/images/asset.webp">
                                <div class="Card__contentBlock--2LI Card__iconPresent--9n6">
                                    <div class="Card__containerImages--28g"><span class="Icon__icon--x96 Icon__small--12i Card__icon24--3n1 SpotlightIcon__icon24--1YT" role="img" aria-label="icon_icon24"></span></div>
                                    <p class="PlainText__text--1wg PlainText__bold--1ba PlainText__large--2Lt Card__header--Ono PlainText__dark--3fd"><?php echo $translations['daily_offer']; ?></p>
                                    <p class="PlainText__text--1wg PlainText__medium--1_S Card__subtitle--2nS PlainText__dark--3fd"><?php echo $translations['casino']; ?></p>
                                    <h2 class="Headings__head--2LV Headings__bold--iD3 Headings__h2--3Bv Headings__dark--1eH"><?php echo $translations['daily_bonus_delight']; ?></h2>
                                    <div class="Card__description--3Yf">
                                        <article>
                                            <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['claim_daily_reward']; ?></p>
                                        </article>
                                    </div><a class="PlainText__text--1wg PlainText__medium--1_S Link__link--3vh CardButton__button--gcB Button__btn--THI Button__large--6PM Button__primary--3wk Button__success--3NL Button__dark--2vB PlainText__dark--3fd" href="/bonus">More info</a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <?
            render_slider($games, true, $translations);

            render_faq($translations, 'Stake');


            ?>

        </div>


    </div>
</div>
<?php render_footer($translations) ?>