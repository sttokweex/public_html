<?php
require(dirname(__DIR__, 1) . "/system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
require(dirname(__DIR__, 1) . "/panels/header.php");
require(dirname(__DIR__, 1) . "/panels/sidebar.php");
?>

<div class="main-container" id="main-content">
  <div id="6454ba58-03db-e757-0fd2-d6b01a41ea9b" data-column-id="column-1" class="Layout__layout--nVs  " style="width: 100%;">
    <div id="layout-column_column-1" class="portlet-dropzone portlet-column-content fn-portlet-container column-1">
      <div id="p_p_id_3" data-portlet-title="Banner" data-portlet-id="3" data-portlet-column="column-1" data-portlet-type="banner" data-react-portlet-id="3" class="portlet portlet_name_banner portlet-wrapper fn-portlet-wrapper portlet-boundary portlet-boundary_3_ portlet-banner banner portlet_type_no-border ">
        <div class="fn-portlet portlet__content portlet__content_border_none portlet__content_type_banner portlet-theme-dark">
          <div class="withHollandLayouts__wrapper--1pq withHollandLayouts__hero--1XD" style="--header-height: -64px; --scrollbar-width: 0px; --shadow-visibility-top: 0%; --shadow-visibility-bottom: 0%;">
            <div class="Banner__banner--3iV withHollandLayouts__banner--TRh cms-banner">
              <div class="Slider__component--1n1 withHollandLayouts__slider--1Em">
                <div class="Slider__container--3ik Banner__sliderContainer---jy">
                  <div class="Slider__sliderOverlay--1GK hidden" style="height: 981px;"></div>
                  <ul class="Slider__slider---o- Banner__slider--vgq" style="height: 100vh;">
                    <li aria-hidden="false" class="Slider__slide--2nK  " style="--slide-gap: 0px;">
                      <div class="Slide__slide--2BW" tabindex="0">
                        <div class="Slide__wc--3gK withHollandLayouts__wc--3IO">
                          <div class="" data-web-content-id="OPTOUT_PAGE_KSA_HERO_DEC24">
                            <article>
                              <style>
                                .promo {
                                  min-height: auto;
                                  margin-top: -150px;
                                  position: absolute;
                                  width: 100vw;
                                  height: 100vh;
                                  border: 0;
                                  top: 0;
                                  left: 0;
                                  text-align: left;
                                  user-select: none;
                                }

                                .hero {
                                  position: relative;
                                  width: 100%;
                                }

                                .hero__bg {
                                  position: absolute;
                                  height: 100vh;
                                  width: 100vw;
                                  display: block;
                                  background-repeat: no-repeat;
                                  background-size: cover;
                                  background-position: top center;
                                  background-attachment: fixed;
                                }

                                .hero__bg.show__desktop {
                                  display: none;
                                }

                                .hero__bg.show__mobile {
                                  display: block;
                                }

                                .hero__caption {
                                  position: relative;
                                  display: flex;
                                  margin: 0 auto;
                                  flex-direction: column;
                                  padding: 1rem;
                                  gap: 1rem;
                                }

                                .hero__content {
                                  z-index: 1;
                                  display: flex;
                                  flex-direction: column;
                                  width: 100%;
                                  gap: 0.5rem;
                                }

                                .hero__heading {
                                  width: calc(100% - 36px);
                                }

                                .hero__title,
                                .hero__title span {
                                  display: inline-block;
                                  font-family: var(--Cadiz);
                                  font-weight: 800 !important;
                                  font-size: 1.4rem !important;
                                  line-height: 1.125 !important;
                                  color: #fff;
                                  white-space: wrap;
                                }

                                .hero__title.text--gradient,
                                .hero__title.text--gradient span {
                                  background: linear-gradient(to right, #fc8846 5%, #fb2b89 100%);
                                  -webkit-background-clip: text;
                                  background-clip: text;
                                  color: transparent;
                                }

                                .root-premiumPage .hero__title.text--gradient {
                                  background: var(--hc-gold-gradient);
                                  background-clip: text;
                                  -webkit-background-clip: text;
                                  -webkit-text-fill-color: #0000;
                                  color: transparent;
                                }

                                .hero__subtitle,
                                .hero__subtitle span {
                                  font-family: var(--Cadiz);
                                  font-size: 1.125rem !important;
                                  font-weight: 350 !important;
                                  line-height: 1.125 !important;
                                  color: #fff;
                                  white-space: wrap;
                                }

                                .hero__button {
                                  display: inline-flex;
                                  justify-content: center;
                                  align-self: flex-start;
                                  min-width: 170px;
                                  background: linear-gradient(to right, #fc8846 5%, #fb2b89 100%);
                                  background-color: #599bb3;
                                  font-family: var(--Cadiz);
                                  font-weight: 800;
                                  font-size: 1.125rem;
                                  color: #fff;
                                  text-align: left;
                                  text-decoration: none;
                                  border: 0;
                                  border-radius: 4px;
                                  box-shadow: 0 15px 20px -15px #000;
                                  margin-bottom: 0.5rem;
                                  padding: 10px 5px;
                                  cursor: pointer;
                                }

                                .hero__button:hover {
                                  background: linear-gradient(to right, #fb2b89 5%, #fc8846 100%);
                                  background-color: #408c99;
                                }

                                .hero__asset {
                                  position: relative;
                                  margin: 0 auto;
                                  display: block;
                                  object-fit: contain;
                                  aspect-ratio: 16/9;
                                  width: 100%;
                                }

                                .stamp {
                                  position: absolute;
                                  top: 1rem;
                                  right: 1rem;
                                  display: block;
                                  width: 36px;
                                  height: 36px;
                                  object-fit: contain;
                                }

                                @media only screen and (min-width: 768px) {
                                  .promo {
                                    position: relative;
                                    min-height: 30rem;
                                    width: 100vw;
                                    margin-top: 0;
                                    top: unset;
                                    left: unset;
                                    height: unset;
                                  }

                                  .hero__bg.show__desktop {
                                    display: block;
                                    margin-top: calc(-1 * var(--scroll-margin-top));
                                  }

                                  .hero__bg.show__mobile {
                                    display: none;
                                  }

                                  .hero__caption {
                                    align-items: center;
                                    padding: 3rem 2rem;
                                    flex-direction: row;
                                    gap: 1rem;
                                  }

                                  .hero__content {
                                    gap: 1rem;
                                  }

                                  .hero__asset {
                                    width: 40%;
                                    aspect-ratio: unset;
                                  }

                                  .hero__title,
                                  .hero__title span {
                                    font-size: 1.75rem !important;
                                  }

                                  .hero__subtitle,
                                  .hero__subtitle span {
                                    font-size: 1.5rem !important;
                                  }

                                  .hero__button {
                                    min-width: 200px;
                                    font-size: 1.25rem;
                                    padding: 15px 5px;
                                    margin-bottom: 0;
                                  }

                                  .stamp {
                                    position: relative;
                                    left: 0;
                                    bottom: 0;
                                    right: unset;
                                    top: unset;
                                    display: block;
                                    width: 50px;
                                    height: 50px;
                                  }
                                }

                                @media only screen and (min-width: 769px) {
                                  .hero__content {
                                    max-width: 45%;
                                    margin-bottom: 0;
                                  }

                                  .hero__asset {
                                    top: 15%;
                                    right: 0;
                                  }
                                }

                                @media only screen and (min-width: 993px) {

                                  .hero__title,
                                  .hero__title span {
                                    font-size: 2rem !important;
                                  }

                                  .hero__subtitle,
                                  .hero__subtitle span {
                                    font-size: 1.875rem !important;
                                  }

                                  .hero__heading {
                                    width: auto;
                                  }

                                  .hero__caption {
                                    padding: 3rem 3.5rem;
                                  }
                                }

                                @media only screen and (min-width: 993px) {
                                  .hero__content {
                                    max-width: 60%;
                                  }
                                }

                                @keyframes zoomIn {
                                  0% {
                                    opacity: 0;
                                    transform: scale(0);
                                  }

                                  100% {
                                    opacity: 1;
                                    transform: scale(1);
                                  }
                                }

                                .animate-zoom {
                                  animation: zoomIn 1.5s ease-out forwards;
                                }

                                .pulsedot {
                                  stroke-width: 2px;
                                  stroke-opacity: 1;
                                }

                                @keyframes fadein {
                                  0% {
                                    opacity: 0;
                                    visibility: visible;
                                  }

                                  100% {
                                    opacity: 1;
                                    visibility: visible;
                                  }
                                }

                                .animate-fadein {
                                  animation: fadein 1.5s ease-out forwards;
                                }

                                @keyframes bouncein {
                                  0% {
                                    opacity: 1;
                                    transform: scale(1);
                                    visibility: visible;
                                  }

                                  40% {
                                    opacity: 0;
                                    transform: scale(0.3);
                                    visibility: visible;
                                  }

                                  60% {
                                    transform: scale(1.1);
                                    opacity: 1;
                                    visibility: visible;
                                  }

                                  80% {
                                    transform: scale(0.75);
                                    opacity: 1;
                                    visibility: visible;
                                  }

                                  100% {
                                    transform: scale(1);
                                    opacity: 1;
                                    visibility: visible;
                                  }
                                }

                                .animate-bouncein {
                                  animation: bouncein 2s ease forwards;
                                }

                                @keyframes pulse {

                                  0%,
                                  100% {
                                    stroke-width: 2px;
                                    opacity: 0.5;
                                  }

                                  50% {
                                    stroke-width: 4px;
                                    opacity: 0.7;
                                  }
                                }

                                .animate-pulse {
                                  animation: pulse 2s ease-in-out infinite;
                                }

                                @keyframes rotate {
                                  100% {
                                    transform: rotate(360deg);
                                  }
                                }

                                .animate-rotate {
                                  animation: rotate 2s linear infinite;
                                }

                                @keyframes pendulum {
                                  0% {
                                    transform: rotate(10deg);
                                  }

                                  50% {
                                    transform: rotate(-5deg);
                                  }

                                  100% {
                                    transform: rotate(10deg);
                                  }
                                }

                                .animate-pendulum {
                                  animation: pendulum 3.5s ease-in-out forwards infinite;
                                }

                                @keyframes slideIn {
                                  0% {
                                    transform: translateX(100px) scale(0.2);
                                    opacity: 0;
                                  }

                                  100% {
                                    transform: translateX(0) scale(1);
                                    opacity: 1;
                                  }
                                }

                                .animate-slideIn {
                                  animation: slideIn 2s ease forwards;
                                }

                                @keyframes slideOut {
                                  0% {
                                    transform: translateX(0) scale(1);
                                    opacity: 1;
                                  }

                                  100% {
                                    transform: translateX(-100px) scale(0.2);
                                    opacity: 0;
                                  }
                                }

                                .animate-slideOut {
                                  animation: slideOut 2s ease forwards;
                                }

                                @keyframes shake {

                                  0%,
                                  100% {
                                    transform: translateX(0);
                                  }

                                  25% {
                                    transform: translateX(-5px);
                                  }

                                  50% {
                                    transform: translateX(5px);
                                  }

                                  75% {
                                    transform: translateX(-5px);
                                  }
                                }

                                .animate-shake {
                                  animation: shake 2.5s ease-in-out forwards;
                                }

                                @keyframes slideDown {
                                  0% {
                                    transform: translateY(-100px);
                                    opacity: 0;
                                  }

                                  100% {
                                    transform: translateY(0);
                                    opacity: 1;
                                  }
                                }

                                .animate-slideDown {
                                  animation: slideDown 2s ease forwards;
                                }

                                @keyframes flip {
                                  0% {
                                    transform: perspective(400px) rotateY(0deg);
                                  }

                                  50% {
                                    transform: perspective(400px) rotateY(180deg);
                                  }

                                  100% {
                                    transform: perspective(400px) rotateY(0deg);
                                  }
                                }

                                .animate-flip {
                                  animation: flip 2s ease forwards;
                                }

                                @keyframes wobble {

                                  0%,
                                  100% {
                                    transform: translateX(0);
                                  }

                                  15% {
                                    transform: translateX(-30px) rotate(-10deg);
                                  }

                                  30% {
                                    transform: translateX(15px) rotate(10deg);
                                  }

                                  45% {
                                    transform: translateX(-5px) rotate(-5deg);
                                  }
                                }

                                .animate-wobble {
                                  animation: wobble 2s ease forwards;
                                }
                              </style>

                              <section class="promo single--hero">
                                <div class="hero">
                                  <div class="hero__bg show__desktop" style="background-image: url(&quot;../images/bg_black.webp&quot;); opacity: 1;"></div>
                                  <div class="hero__bg show__mobile" style="background-image: url(&quot;../images/bg_mobile_black.webp&quot;);"></div>
                                  <div class="hero__caption col-mob-4 col-dsk-12">
                                    <div class="hero__content">
                                      <div class="hero__heading">
                                        <div class="hero__title text--gradient" style="transform: translate(0px, 0px); opacity: 1;"><?php echo $translations['hero_title']; ?></div>
                                        <div class="hero__subtitle" style="transform: translate(0px, 0px); opacity: 1;"></div>
                                      </div>
                                    </div>
                                    <img alt="<?php echo $translations['key_visual_alt']; ?>" draggable="false" class="Image__image--2Bt hero__asset animate-zoom" src="../images/asset black.webp" data-animation="zoom" style="opacity: 1; transform: translate(0px, 0px);">
                                  </div>
                                </div>
                              </section>
                            </article>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="p_p_id_1" data-portlet-title="Web Content" data-portlet-id="1" data-portlet-column="column-1" data-portlet-type="56" data-react-portlet-id="1" class="portlet portlet_name_56 portlet-wrapper fn-portlet-wrapper portlet-boundary portlet-boundary_1_ portlet-56 56 portlet_type_no-border ">
        <div class="fn-portlet portlet__content portlet__content_border_none portlet__content_type_56 portlet-theme-dark">
          <div class="" data-web-content-id="OPTOUT_PAGE_KSA_INTRO_DEC24">
            <article>
              <style>
                :root {
                  --hc-fuchsia: #fb258d;
                }

                .main__content {
                  margin: var(--hc-distance-between-components) 0;
                }

                .main__content h1,
                .main__content h2,
                .main__content h3,
                .main__content h4 {
                  font-weight: 800 !important;
                  color: var(--hc-fuchsia);
                  margin-bottom: 1rem;
                }

                .main__content h1 span {
                  font-size: 2.5rem !important;
                  line-height: 3rem !important;
                  font-weight: 800 !important;
                }

                .main__content h2 span {
                  font-size: 2rem !important;
                  line-height: 2.5rem !important;
                  font-weight: 800 !important;
                }

                .main__content h3 span {
                  font-size: 1.625rem !important;
                  line-height: 2.125rem !important;
                  font-weight: 800 !important;
                }

                .main__content h4 span {
                  font-size: 1rem !important;
                  line-height: 1.5rem !important;
                  font-weight: 800 !important;
                }

                .mobile-layout .main__content h1 span {
                  font-size: 1.875rem !important;
                  line-height: 2.125rem !important;
                  font-weight: 800 !important;
                }

                .mobile-layout .main__content h2 span {
                  font-size: 1.5rem !important;
                  line-height: 1.875rem !important;
                  font-weight: 800 !important;
                }

                .mobile-layout .main__content h3 span {
                  font-size: 1.25rem !important;
                  line-height: 1.5rem !important;
                  font-weight: 800 !important;
                }

                .mobile-layout .main__content h4 span {
                  font-size: 1rem !important;
                  line-height: 1.5rem !important;
                  font-weight: 800 !important;
                }

                .main__content h2:not(:first-child),
                .main__content h3:not(:first-child),
                .main__content h4:not(:first-child) {
                  margin-top: 2.5rem;
                }

                .main__content h1,
                .main__content h1 span {
                  font-weight: 900 !important;
                  background-image: linear-gradient(to left, var(--hc-fuchsia), var(--hc-orange)) !important;
                  -webkit-background-clip: text !important;
                  background-clip: text !important;
                  line-height: 1.2;
                }

                .root-premiumPage .main__content h1,
                .root-premiumPage .main__content h2,
                .root-premiumPage .main__content h3,
                .root-premiumPage .main__content h4 {
                  background: var(--hc-gold-gradient);
                  background-clip: text;
                  -webkit-background-clip: text;
                  -webkit-text-fill-color: #0000;
                  color: transparent;
                }

                .main__content h1 span,
                .main__content h2 span,
                .main__content h3 span,
                .main__content h4 span {
                  color: var(--hc-fuchsia) !important;
                }

                .main__content ol,
                .main__content p,
                .main__content ul {
                  font-weight: 350 !important;
                  margin-bottom: 1.5rem;
                }

                .main__content b,
                .main__content strong {
                  font-weight: 800 !important;
                }

                .main__content ol,
                .main__content ul {
                  list-style-position: outside;
                  padding-left: 1.5rem;
                }

                .main__content ol li,
                .main__content ul li {
                  padding-left: 0.25rem;
                }

                .main__content li::marker {
                  color: var(--hc-orange);
                }

                .main__content li+li {
                  margin-top: 0.25rem;
                }

                .main__content ul {
                  list-style: disc;
                }

                .main__content ul ul {
                  list-style-type: circle;
                }

                .main__content ul ul ul {
                  list-style-type: square;
                }

                .main__content ol {
                  list-style: decimal;
                }

                .main__content a {
                  color: #fff;
                  font-weight: 350;
                  text-decoration: none;
                  position: relative;
                  transition:
                    color 150ms ease-in-out,
                    text-decoration 150ms 150ms ease-in-out;
                  text-decoration: underline;
                }

                .main__content a:hover {
                  color: #ff616d !important;
                }

                .main__content a.Button__primary--3wk {
                  font-weight: 700;
                  text-decoration: none;
                }

                .main__content a.Button__primary--3wk:hover {
                  color: #fff !important;
                }

                .main__content hr {
                  border: 1px solid rgba(255, 255, 255, 0.4);
                  margin: 1.5em 0;
                }

                .main__content .table-wrapper {
                  overflow-x: auto;
                  max-width: 100%;
                }

                .main__content table {
                  width: 100%;
                  border-collapse: collapse;
                  margin: 25px 0;
                  font-size: 0.9em;
                }

                .main__content table thead tr {
                  background-color: rgba(55, 88, 119, 0.13);
                  color: #ffffff;
                  text-align: left;
                }

                .main__content table td,
                .main__content table th {
                  padding: 12px 15px;
                }

                .main__content table tbody tr:nth-of-type(even) {
                  background-color: rgba(55, 88, 119, 0.13);
                }

                .main__content table tbody tr:last-of-type {
                  border-bottom: 2px solid rgba(55, 88, 119, 0.13);
                }

                .popup-theme-light .main__content table,
                .scroll-theme-light .main__content table {
                  background: var(--hc-gray);
                  color: var(--light-theme-font-color);
                }

                .popup-theme-light .main__content table th,
                .scroll-theme-light .main__content table th {
                  color: var(--light-theme-font-color);
                }

                .popup-theme-light .main__content a,
                .scroll-theme-light .main__content a {
                  color: var(--light-theme-font-color);
                }
              </style>

              <div class="main__content">
                <div style="display: none;">
                  <?php echo $translations['optout_info']; ?>
                </div>
                <h1 class="Headings__head--2LV Headings__bold--iD3 Headings__h1--284 Headings__dark--1eH">
                  <?php echo $translations['how_advertising_works']; ?>
                </h1>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['advertising_system_example']; ?>
                </p>
                <h3 class="Headings__head--2LV Headings__bold--iD3 Headings__h3--16M Headings__dark--1eH">
                  <?php echo $translations['disclaimer']; ?>
                </h3>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['disclaimer_text']; ?>
                </p>
                <h2 class="Headings__head--2LV Headings__bold--iD3 Headings__h2--3Bv Headings__dark--1eH">
                  <?php echo $translations['how_gambling_ads_work']; ?>
                </h2>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['gambling_ads_notice']; ?>
                </p>
                <h2 class="Headings__head--2LV Headings__bold--iD3 Headings__h2--3Bv Headings__dark--1eH">
                  <?php echo $translations['what_are_cookies']; ?>
                </h2>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['cookies_description']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['cookies_used_for']; ?>
                </p>
                <ul>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                    <?php echo $translations['cookies_collect_info']; ?>
                  </li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                    <?php echo $translations['cookies_display_ads']; ?>
                  </li>
                </ul>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <strong><?php echo $translations['tip']; ?>:</strong>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['cookies_tip']; ?>
                </p>
                <h2 class="Headings__head--2LV Headings__bold--iD3 Headings__h2--3Bv Headings__dark--1eH">
                  <?php echo $translations['no_ads_preference']; ?>
                </h2>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['no_ads_preference_text']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <a class="PlainText__text--1wg PlainText__medium--1_S Link__link--3vh Button__btn--THI Button__large--6PM Button__primary--3wk Button__success--3NL Button__dark--2vB PlainText__dark--3fd" href="/en/en/afmelden-advertenties/formulier" target="_self" aria-label="<?php echo $translations['unsubscribe_from_ads']; ?>"><?php echo $translations['unsubscribe_from_ads']; ?></a>
                </p>
              </div>
            </article>
          </div>
        </div>
      </div>
      <div id="p_p_id_4" data-portlet-title="Web Content" data-portlet-id="4" data-portlet-column="column-1" data-portlet-type="56" data-react-portlet-id="4" class="portlet portlet_name_56 portlet-wrapper fn-portlet-wrapper portlet-boundary portlet-boundary_4_ portlet-56 56 portlet_type_no-border ">
        <div class="fn-portlet portlet__content portlet__content_border_none portlet__content_type_56 portlet-theme-dark">
          <div class="" data-web-content-id="OPTOUT_PAGE_KSA_ACCORDIONS_DEC24">
            <article>
              <section class="dropdown-section">
                <div class="dropdown" data-type="terms" data-loaded="true">
                  <div class="dropdown-header">
                    <img alt="" draggable="false" class="Image__image--2Bt " src="../images/faq-arrow-down-footer.png" width="20" height="20">
                    <h4 class="Headings__head--2LV Headings__bold--iD3 Headings__h4--2JP Headings__dark--1eH"><?php echo $translations['reduce_gambling_ads']; ?></h4>
                  </div>
                  <div class="dropdown-content">
                    <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                      <?php echo $translations['adjust_ad_platforms']; ?>
                    </p>
                    <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                      <strong><?php echo $translations['on_instagram']; ?>:</strong>
                    </p>
                    <ul>
                      <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                        <?php echo $translations['instagram_step_1']; ?>
                      </li>
                      <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                        <?php echo $translations['instagram_step_2']; ?>
                      </li>
                    </ul>
                    <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                      <strong><?php echo $translations['on_facebook']; ?>:</strong>
                    </p>
                    <ul>
                      <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                        <?php echo $translations['facebook_step_1']; ?>
                      </li>
                      <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                        <?php echo $translations['facebook_step_2']; ?>
                      </li>
                      <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                        <?php echo $translations['facebook_step_3']; ?>
                      </li>
                    </ul>
                    <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                      <?php echo $translations['ad_settings_duration']; ?>
                    </p>
                  </div>
                </div>
                <div class="dropdown " data-type="terms" data-loaded="true">
                  <div class="dropdown-header">
                    <img alt="" draggable="false" class="Image__image--2Bt " src="../images/faq-arrow-down-footer.png" width="20" height="20">
                    <h4 class="Headings__head--2LV Headings__bold--iD3 Headings__h4--2JP Headings__dark--1eH"><?php echo $translations['opt_out_other_websites']; ?></h4>
                  </div>
                  <div class="dropdown-content">
                    <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                      <?php echo $translations['publisher_networks_ads']; ?>
                    </p>
                    <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                      <?php echo $translations['opt_out_major_publishers']; ?>
                    </p>
                    <ul>
                      <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                        <strong><?php echo $translations['dpg_media']; ?>:</strong> <?php echo $translations['dpg_media_opt_out']; ?>
                      </li>
                      <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                        <strong><?php echo $translations['mediahuis']; ?>:</strong> <?php echo $translations['mediahuis_opt_out']; ?>
                      </li>
                      <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                        <strong><?php echo $translations['massarius']; ?>:</strong> <?php echo $translations['massarius_opt_out']; ?>
                      </li>
                    </ul>
                    <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                      <strong><?php echo $translations['tip']; ?>:</strong> <?php echo $translations['check_cookie_banner']; ?>
                    </p>
                    <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                      <?php echo $translations['direct_opt_out_options']; ?>
                    </p>
                    <ul>
                      <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                        <strong><?php echo $translations['azerion']; ?>:</strong> <?php echo $translations['azerion_opt_out']; ?>
                      </li>
                      <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                        <strong><?php echo $translations['espn']; ?>:</strong> <?php echo $translations['espn_opt_out']; ?>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="dropdown " data-type="terms" data-loaded="true">
                  <div class="dropdown-header">
                    <img alt="" draggable="false" class="Image__image--2Bt " src="../images/faq-arrow-down-footer.png" width="20" height="20">
                    <h4 class="Headings__head--2LV Headings__bold--iD3 Headings__h4--2JP Headings__dark--1eH"><?php echo $translations['adjust_browser_settings']; ?></h4>
                  </div>
                  <div class="dropdown-content">
                    <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                      <?php echo $translations['disable_cookies_browser']; ?>
                    </p>
                    <ul>
                      <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                        <strong><?php echo $translations['google_chrome']; ?>:</strong> <?php echo $translations['chrome_settings']; ?>
                      </li>
                      <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                        <strong><?php echo $translations['safari']; ?>:</strong> <?php echo $translations['safari_settings']; ?>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="dropdown " data-type="terms" data-loaded="true">
                  <div class="dropdown-header">
                    <img alt="" draggable="false" class="Image__image--2Bt " src="../images/faq-arrow-down-footer.png" width="20" height="20">
                    <h4 class="Headings__head--2LV Headings__bold--iD3 Headings__h4--2JP Headings__dark--1eH"><?php echo $translations['change_account_settings']; ?></h4>
                  </div>
                  <div class="dropdown-content">
                    <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                      <?php echo $translations['prevent_gambling_ads_accounts']; ?>
                    </p>
                    <ul>
                      <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                        <strong><?php echo $translations['google']; ?>:</strong> <?php echo $translations['google_ad_settings']; ?>
                      </li>
                      <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                        <strong><?php echo $translations['facebook']; ?>:</strong> <?php echo $translations['facebook_ad_settings']; ?>
                      </li>
                      <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                        <strong><?php echo $translations['microsoft']; ?>:</strong> <?php echo $translations['microsoft_settings']; ?>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="dropdown " data-type="terms" data-loaded="true">
                  <div class="dropdown-header">
                    <img alt="" draggable="false" class="Image__image--2Bt " src="../images/faq-arrow-down-footer.png" width="20" height="20">
                    <h4 class="Headings__head--2LV Headings__bold--iD3 Headings__h4--2JP Headings__dark--1eH"><?php echo $translations['mobile_devices']; ?></h4>
                  </div>
                  <div class="dropdown-content">
                    <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                      <?php echo $translations['disable_personalized_ads_phone']; ?>
                    </p>
                    <ul>
                      <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                        <strong><?php echo $translations['iphone']; ?>:</strong> <?php echo $translations['iphone_settings']; ?>
                      </li>
                      <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                        <strong><?php echo $translations['android']; ?>:</strong> <?php echo $translations['android_settings']; ?>
                      </li>
                    </ul>
                  </div>
                </div>
              </section>

              <style type="text/css">
                .dropdown-section #paragraph {
                  font-family: "Cadiz" !important;
                  font-weight: 300 !important;
                }

                .dropdown-section {
                  max-width: 100%;
                  margin: 40px auto;
                }

                .dropdown-content {
                  max-height: 0;
                  overflow: hidden;
                  padding: 0 20px;
                  background-color: rgba(95, 92, 109, 0.33);
                  border-radius: 7px;
                  margin-top: 6px;
                  transition: max-height 0.4s ease-out, padding 0.4s ease-out;
                }

                .dropdown.active .dropdown-content {
                  min-height: 100px !important;
                  max-height: 400px;
                  padding: 1.25rem;
                  overflow-y: auto;
                }

                .dropdown-header {
                  display: flex;
                  align-items: center;
                  margin: auto;
                  border-radius: 0.5rem;
                  background-color: rgba(157, 154, 174, 0.33);
                  margin-top: 6px;
                  cursor: pointer;
                  padding: 0.75rem;
                  transition: background-color 0.4s;
                }

                .dropdown.active .dropdown-header {
                  background-color: rgba(95, 92, 109, 0.33);
                  border: 1px solid #ff616d;
                }

                .dropdown-header h4 {
                  font-size: 1.3rem;
                  font-weight: 400;
                  margin: 0;
                }

                .dropdown-header img {
                  height: 18px;
                  width: 18px;
                  margin-right: 10px;
                  transition: transform 0.4s;
                }

                .dropdown.active .dropdown-header img {
                  transform: rotate(180deg);
                }

                .dropdown-content p,
                .dropdown-content ol,
                .dropdown-content ul {
                  margin-bottom: 20px;
                }

                .dropdown-content a {
                  font-weight: 300;
                  text-decoration: underline;
                }

                .dropdown-content .hc-table {
                  font-family: "Cadiz" !important;
                  font-weight: 300 !important;
                  max-width: 100%;
                  overflow-x: auto;
                  border-collapse: collapse;
                  margin: 25px 0;
                  font-size: 0.9em;
                }

                .dropdown-content .hc-table thead tr {
                  background-color: #37587721;
                  color: #ffffff;
                  text-align: left;
                }

                .dropdown-content .hc-table th,
                .dropdown-content .hc-table td {
                  padding: 12px 15px;
                }

                .dropdown-content .hc-table tbody tr:nth-of-type(even) {
                  background-color: #37587721;
                }

                .dropdown-content .hc-table tbody tr:last-of-type {
                  border-bottom: 2px solid #37587721;
                }

                .dropdown-content ul {
                  margin: 1.25rem 0;
                  padding-left: 1rem;
                }

                .dropdown-content ul li {
                  list-style-type: none;
                  position: relative;
                  margin-bottom: 0;
                  padding-left: 30px;
                  font-family: "Cadiz" !important;
                  font-weight: 300 !important;
                  margin-bottom: 0.86em;
                }

                .dropdown-content ul li::before {
                  content: "•";
                  color: #ff616d;
                  position: absolute;
                  left: 0;
                  top: 0;
                  font-size: 3rem;
                }

                .dropdown-content ol {
                  list-style-type: none;
                  counter-reset: list-counter;
                  margin: 1.25rem 0;
                  padding-left: 1rem;
                }

                .dropdown-content li {
                  margin: 1.25rem 0;
                }

                .dropdown-content ol li {
                  counter-increment: list-counter;
                  position: relative;
                  margin-bottom: 0;
                  padding-left: 30px;
                  font-family: "Cadiz" !important;
                  font-weight: 300 !important;
                  margin-bottom: 0.86em;
                }

                .dropdown-content ol li::before {
                  content: counter(list-counter) ".";
                  color: #ff616d;
                  position: absolute;
                  left: 0;
                  top: 0;
                  font-size: 1em;
                  text-align: right;
                }

                .dropdown-content .hc-table {
                  border-collapse: collapse;
                  margin: 25px 0;
                  font-size: 0.9em;
                }

                .dropdown-content .hc-table thead tr {
                  background-color: rgba(55, 88, 119, 0.13);
                  color: #ffffff;
                  text-align: left;
                }

                .dropdown-content .hc-table th,
                .dropdown-content .hc-table td {
                  padding: 12px 15px;
                }

                .dropdown-content .hc-table tbody tr:nth-of-type(even) {
                  background-color: rgba(55, 88, 119, 0.13);
                }

                .dropdown-content .hc-table tbody tr:last-of-type {
                  border-bottom: 2px solid rgba(55, 88, 119, 0.13);
                }

                .dropdown-content hr {
                  border: 1px solid rgba(255, 255, 255, 0.4);
                  margin: 1.5em 0;
                }

                @media only screen and (min-width: 992px) {
                  .dropdown-section {
                    max-width: 60vw;
                  }
                }
              </style>
            </article>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $('.dropdown-header').on('click', function() {
    var dropdown = $(this).closest('.dropdown');
    dropdown.toggleClass('active');
  });
</script>
<?php
require(dirname(__DIR__, 1) . "/panels/footer.php");
render_footer($translations);
?>