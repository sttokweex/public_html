<?php

if (isset($_SESSION['lang']) && $_SESSION['lang'] === 'ru') {
  $current_language = 'Русский';
} elseif (isset($_SESSION['lang']) && $_SESSION['lang'] === 'en') {
  // По умолчанию - English
  $current_language = 'English';
} elseif (isset($_SESSION['lang']) && $_SESSION['lang'] === 'es') {
  $current_language = 'Español';
} else {
  $current_language = 'English';
}
$diceicon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" aria-hidden="true" class="icon"><path d="M7.962 2.848L0 15.17l6.76 13.192 7.962-12.322-6.76-13.191zM3.97 15.982a1.15 1.15 0 010-2.3 1.15 1.15 0 010 2.3zm2.785 5.489a1.15 1.15 0 010-2.3 1.15 1.15 0 010 2.3zm.378-10.329a1.15 1.15 0 010-2.3 1.15 1.15 0 010 2.3zm3.061 5.727a1.148 1.148 0 110-2.299 1.15 1.15 0 010 2.3zm6.183.239L8.26 29.67l15.374.771 8.117-12.563-15.374-.77zm-.835 10.538a1.15 1.15 0 010-2.298 1.15 1.15 0 010 2.298zm9.21-5.026a1.15 1.15 0 010-2.298 1.15 1.15 0 010 2.298zm.29-20.283L9.517 1.559l6.958 13.581L32 15.917l-6.958-13.58zM21.36 9.971a1.15 1.15 0 010-2.3 1.15 1.15 0 010 2.3z"></path></svg>';
$minesicon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" aria-hidden="true" class="icon"><path d="M20.174 10.247V8.219a1.082 1.082 0 00-1.081-1.081h-1.639V5.166h1.798c.633 0 1.223-.25 1.659-.703a2.277 2.277 0 00.642-1.689v.005l-.058-1.563A1.26 1.26 0 0020.236.001l-.05.001h.002a1.261 1.261 0 00-1.214 1.26l.001.049v-.002l.049 1.335h-1.751a2.345 2.345 0 00-2.342 2.342v2.152h-2.025a1.082 1.082 0 00-1.081 1.081v2.028c-4.158 1.663-7.103 5.732-7.103 10.477 0 6.218 5.058 11.277 11.277 11.277s11.277-5.059 11.277-11.277c0-4.745-2.945-8.814-7.103-10.476z"></path></svg>';
$bonusbuyicon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 32" fill="currentColor" aria-hidden="true" class="icon"><path d="M21.777 12.966L17.87 29.465l-3.906-16.457c-.042-.249-1.288-6.732-.707-9.808.208-1.164.997-1.953 1.87-2.452a5.46 5.46 0 015.569.042c.831.499 1.579 1.288 1.787 2.41.54 2.992-.665 9.517-.706 9.766zm4.779 18.12c-2.66.831-5.818.457-7.481.208.208-.083.416-.208.665-.291 2.743-.582 5.07-1.247 6.94-1.912.249.208.374.416.416.665.083.54-.374 1.164-.54 1.33zm-9.933.208c-1.662.291-4.821.623-7.439-.166-.166-.208-.623-.79-.54-1.371a.97.97 0 01.416-.665c1.87.665 4.197 1.33 6.94 1.912.208.125.416.208.623.291zm-2.618-1.372c-8.769-2.203-12.301-5.07-12.551-5.236-.956-1.039-1.288-1.953-1.081-2.66.332-1.039 1.87-1.496 2.41-1.621a27.174 27.174 0 003.449 3.657c.249.208 4.156 3.616 7.771 5.86zm3.283.748c-.79-.166-1.496-.416-2.161-.831-3.782-2.161-8.395-6.192-8.436-6.234C1.496 19.034.54 15.002.499 14.712c-.166-1.579.166-2.743.997-3.449 1.247-1.081 3.366-.831 3.99-.707.042.249.125.499.208.79 0 .042.79 2.66 2.66 6.358 1.662 3.366 4.53 8.27 8.935 12.966zm16.998-6.026c-.249.208-3.74 3.034-12.551 5.236 3.616-2.244 7.522-5.652 7.771-5.86a27.046 27.046 0 003.449-3.657c.54.125 2.036.582 2.41 1.621.208.706-.125 1.621-1.081 2.66zm.956-9.932c-.042.249-.997 4.239-6.151 8.852-.042.042-4.655 4.073-8.436 6.234a8.021 8.021 0 01-2.161.831c4.364-4.696 7.231-9.6 8.893-12.925 1.87-3.699 2.66-6.317 2.66-6.358.083-.249.125-.54.208-.79.623-.125 2.743-.416 3.99.707.831.665 1.164 1.829.997 3.449zm-5.777-3.533c-.083.249-3.034 9.766-11.013 18.535l3.907-16.582c.042-.249 1.247-6.483.748-9.766.873-.291 3.948-1.039 5.694.499 1.413 1.205 1.621 3.657.665 7.314zM17.288 29.714a55.235 55.235 0 01-8.25-11.948l-.145-.312c-1.787-3.574-2.577-6.151-2.618-6.275-.956-3.616-.748-6.109.665-7.356 1.704-1.538 4.779-.79 5.693-.499-.499 3.325.665 9.517.707 9.808l3.948 16.582z"></path></svg>';
$bubblesicon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" aria-hidden="true" class="icon"><path d="M15.829.204C7.199.204.137 7.265.137 15.896s7.061 15.692 15.692 15.692c8.63 0 15.692-7.061 15.692-15.692S24.46.204 15.829.204zm5.884 7.846c1.079 0 1.962 1.275 1.962 2.942s-.883 2.942-1.962 2.942c-1.078 0-1.961-1.275-1.961-2.942s.883-2.942 1.961-2.942zm-11.768 0c1.079 0 1.962 1.275 1.962 2.942s-.883 2.942-1.962 2.942-1.962-1.275-1.962-2.942.883-2.942 1.962-2.942zm5.884 19.614c-5.1 0-9.316-4.315-9.807-9.709 2.844 1.667 6.276 2.648 9.807 2.648s6.963-.98 9.807-2.648c-.49 5.394-4.707 9.709-9.807 9.709z"></path></svg>';
?>

<div class="sidebar_project">

  <div class="sidebar_header">
    <button type="button" class="sidebar__btn-close">
      <svg data-ds-icon="Menu" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
        <path fill="currentColor" d="M19 4H5a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1m.15 6H4.85a.85.85 0 0 0-.85.85v2.3c0 .47.38.85.85.85h14.3c.47 0 .85-.38.85-.85v-2.3a.85.85 0 0 0-.85-.85M19 16H5a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1"></path>
      </svg>

    </button>
    <div class="link_wrap">
      <a class="header-button" id="casino">
        <img class="productImg " alt="Product Img " draggable="false" src="/assets/media/active-casino.D98ZVQ96.svg">
        <span><?= $translations['casino'] ?> </span>
      </a>

    </div>
  </div>
  <div class="content">
    <div class="scrollable">
      <div class="inner_content">
        <a class="sidebar_anchor_base" style='position:relative;'>
          <img class="productImg " alt="Product Img " draggable="false" src="/assets/media/active-casino-mini.C2xccerq.svg">
          <button type="button" tabindex="0" class="anchor_button unhover" style='cursor:default;' data-button-root="">
            <svg data-ds-icon="Casino" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="white" class="inline-block shrink-0" style="color: white;"><!---->
              <path fill="currentColor" d="m2.14 4.63 7.25-3.38c.63-.3 1.34-.23 1.89.11-.09.14-.18.28-.26.43L4.81 15.1 1.17 7.29c-.47-1-.03-2.19.97-2.66"></path>
              <path fill="currentColor" fill-rule="evenodd" d="m21.86 4.63-7.25-3.38c-1-.47-2.19-.03-2.66.97l-6.76 14.5c-.47 1-.03 2.19.97 2.66l7.25 3.38c1 .47 2.19.03 2.66-.97l6.76-14.5c.47-1 .03-2.19-.97-2.66m-9.54 11-.85-4.81 4.23-2.44.85 4.81z" clip-rule="evenodd"></path>
            </svg> </button></a>
        <a class="sidebar_anchor_base favorite-box" href="/favorites">
          <button type="button" tabindex="0" class="anchor_button" data-button-root="">
            <svg data-ds-icon="FavouriteFilled" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
              <path fill="currentColor" d="M12 19.48 6.72 21.9c-.82.37-1.73-.29-1.63-1.18l.67-5.77-3.93-4.28c-.61-.66-.26-1.74.62-1.92l5.7-1.15L11 2.54c.44-.79 1.57-.79 2.02 0l2.85 5.06 5.7 1.15c.88.18 1.23 1.25.62 1.92l-3.93 4.28.67 5.77c.1.9-.81 1.56-1.63 1.18l-5.28-2.42z"></path>
            </svg>
            <span class="is-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($translations['favorites']); ?></span>
          </button>
        </a>
        <a class="sidebar_anchor_base recent-box" href="/recent">
          <button type="button" tabindex="0" class="anchor_button" data-button-root="">
            <svg data-ds-icon="Recent" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
              <path fill="currentColor" fill-rule="evenodd" d="M12 1C5.92 1 1 5.92 1 12s4.92 11 11 11 11-4.92 11-11S18.08 1 12 1m4.21 15.21c-.2.2-.45.29-.71.29s-.51-.1-.71-.29l-3.5-3.5A1 1 0 0 1 11 12V4c0-.55.45-1 1-1s1 .45 1 1v7.59l3.21 3.21c.39.39.39 1.02 0 1.41" clip-rule="evenodd"></path>
            </svg>
            <span class="is-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($translations['recent']); ?></span>
          </button>
        </a>
        <a class="sidebar_anchor_base challenge-box" href="/challenges">
          <button type="button" tabindex="0" class="anchor_button" data-button-root="">
            <svg data-ds-icon="Challenge" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
              <path fill="currentColor" d="m7.92 12.32 1.25-1.88c.37-.56 1.29-.56 1.66 0L12 12.19l1.17-1.75c.37-.56 1.29-.56 1.66 0l1.23 1.85 1.44-1.85L16 7h-3V5h6l-2-2 2-2h-8v6H8l-1.54 3.53zm10.5.2-1.63 2.09c-.2.25-.5.41-.83.38-.32-.01-.62-.18-.8-.44l-1.17-1.75-1.17 1.75c-.37.56-1.29.56-1.66 0L9.99 12.8l-1.17 1.75c-.18.26-.47.43-.78.44h-.05c-.3 0-.58-.13-.77-.37l-1.67-2.04L1 23h22z"></path>
            </svg>
            <span class="is-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($translations['contests']); ?></span>
          </button>
        </a>
        <a class="sidebar_anchor_base mybets-box" href="my-bets">
          <button type="button" tabindex="0" class="anchor_button" data-button-root="">
            <svg data-ds-icon="MyBets" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
              <path fill="currentColor" d="M22 1h-7c0 1.66-1.34 3-3 3S9 2.66 9 1H2v22h7c0-1.66 1.34-3 3-3s3 1.34 3 3h7zm-3.54 7.91-7.22 5.78a1.436 1.436 0 0 1-1.92-.1L6.43 11.7c-.56-.56-.56-1.48 0-2.04s1.48-.56 2.04 0l1.97 1.97 6.21-4.97c.62-.5 1.53-.4 2.03.23.5.62.4 1.53-.23 2.03z"></path>
            </svg>
            <span class="is-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($translations['my_bets']); ?></span>
          </button>
        </a>
        <div class="spacing_div">
          <hr class="spacing">
        </div>
        <div class="wrapper-text"><span class="" style="max-width: 100%;"><?php echo htmlspecialchars($translations['games']); ?></span></div>
        <a class="sidebar_anchor_base" href="/group/new-releases">
          <button type="button" tabindex="0" class="anchor_button" data-button-root="">
            <svg data-ds-icon="New" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
              <path fill="currentColor" d="M22 12c-7.8 1.21-8.79 2.2-10 10-1.21-7.8-2.2-8.79-10-10 7.8-1.21 8.79-2.2 10-10 1.21 7.8 2.2 8.79 10 10m2-7c-3.12.48-3.52.88-4 4-.48-3.12-.88-3.52-4-4 3.12-.48 3.52-.88 4-4 .48 3.12.88 3.52 4 4M8 19c-3.12.48-3.52.88-4 4-.48-3.12-.88-3.52-4-4 3.12-.48 3.52-.88 4-4 .48 3.12.88 3.52 4 4"></path>
            </svg> <span class="is-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($translations['new_releases']); ?></span>
          </button>
        </a>
        <div id="slots" data-testid="slots" class="sidebar_accordion">
          <div class="accordion accordion-stacked">
            <div class="header header-stacked">
              <button type="button" tabindex="0" class="promo_anchor_button" aria-label="<?php echo htmlspecialchars($translations['slots']); ?>" data-button-root="">
                <svg data-ds-icon="Fire" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0 svg_isopen"><!---->
                  <path fill="currentColor" d="M19.38 5.59c-.64-.83-1.93-.77-2.51.11L16 7l-2.56-4.48C12.6 1.05 10.7.55 9.27 1.45c-2.82 1.79-6.86 5.28-7.24 10.7-.36 5.11 3.19 9.84 8.24 10.69A10 10 0 0 0 22 12.99c0-3.02-1.13-5.48-2.62-7.41zM12 21c-2.21 0-4-1.22-4-3 0-2.91 4-6 4-6s4 3.09 4 6c0 1.78-1.79 3-4 3"></path>
                </svg>
                <svg data-ds-icon="ChevronRight" width="12" height="12" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0 svg_isopen" style="position: absolute; right: 0px;"><!---->
                  <path fill="currentColor" d="M8.293 5.293a1 1 0 0 1 1.338-.069l.076.069 6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 1 1-1.414-1.414L13.586 12 8.293 6.707l-.068-.076a1 1 0 0 1 .068-1.338"></path>
                </svg>

                <div class="header-title overflow-hidden">
                  <span slot="title" class="sidebar_accordion_title">
                    <svg data-ds-icon="Fire" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                      <path fill="currentColor" d="M19.38 5.59c-.64-.83-1.93-.77-2.51.11L16 7l-2.56-4.48C12.6 1.05 10.7.55 9.27 1.45c-2.82 1.79-6.86 5.28-7.24 10.7-.36 5.11 3.19 9.84 8.24 10.69A10 10 0 0 0 22 12.99c0-3.02-1.13-5.48-2.62-7.41zM12 21c-2.21 0-4-1.22-4-3 0-2.91 4-6 4-6s4 3.09 4 6c0 1.78-1.79 3-4 3"></path>
                    </svg>


                    <span class="is-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($translations['popular']); ?></span>
                  </span>
                </div>
                <div class="svg_container">
                  <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon " style="transform: rotate(0deg); margin-right: 0;">
                    <path d="M32.274 49.762 9.204 26.69l6.928-6.93 16.145 16.145L48.42 19.762l6.93 6.929-23.072 23.07z"></path>
                  </svg>
                </div>
              </button>
            </div>
            <div class="content render-content">
              <div class="sidebar_content" style="">
                <a class="sidebar_anchor_base" data-sveltekit-reload="off" data-sveltekit-preload-data="off" href="/group/popular-dogs">

                  <button type="button" tabindex="0" class="anchor_button">
                    <img src="/images/sidebar/icons/dog-house.gif" class="svg-icon gif-icon">
                    <span class="is-truncate" style="max-width: 100%;">The Dogs House</span>
                  </button>
                </a>
                <a class="sidebar_anchor_base" data-sveltekit-reload="off" data-sveltekit-preload-data="off" href="/group/popular-sugar">

                  <button type="button" tabindex="0" class="anchor_button">
                    <img src="/images/sidebar/icons/sugar-rush.png" class="svg-icon gif-icon">
                    <span class="is-truncate" style="max-width: 100%;">Sugar Rush</span>
                  </button>
                </a>
                <a class="sidebar_anchor_base" data-sveltekit-reload="off" data-sveltekit-preload-data="off" href="/group/popular-zews">
                  <button type="button" tabindex="0" class="anchor_button">
                    <img src="/images/sidebar/icons/best.gif" class="svg-icon gif-icon">
                    <span class="is-truncate" style="max-width: 100%;">Gates of Olympus</span>
                  </button>
                </a>
                <a class="sidebar_anchor_base" data-sveltekit-reload="off" data-sveltekit-preload-data="off" href="/group/popular-fruits">
                  <button type="button" tabindex="0" class="anchor_button" data-analytics="sidebar-all-promotions-link" data-button-root="">
                    <img src="/images/sidebar/icons/sweet.gif" class="svg-icon gif-icon">
                    <span class="is-truncate" style="max-width: 100%;">Sweet Bonanza</span>
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>


        <div class="spacing_div">
          <hr class="spacing">
        </div>
        <div id="promotions" data-testid="promotions" class="sidebar_accordion">
          <div class="accordion accordion-stacked">
            <div class="header header-stacked">
              <button type="button" tabindex="0" class="promo_anchor_button" aria-label="<?php echo htmlspecialchars($translations['promotions']); ?>" data-button-root="">
                <svg data-ds-icon="Gift" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0 svg_isopen"><!---->
                  <path fill="currentColor" d="M21 5h-3.35c.22-.46.35-.96.35-1.5C18 1.57 16.43 0 14.5 0c-.98 0-1.86.41-2.5 1.06A3.5 3.5 0 0 0 9.5 0C7.57 0 6 1.57 6 3.5c0 .54.13 1.04.35 1.5H3c-1.1 0-2 .9-2 2v1c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2m-6.5-3c.83 0 1.5.67 1.5 1.5S15.33 5 14.5 5 13 4.33 13 3.5 13.67 2 14.5 2M8 3.5C8 2.67 8.67 2 9.5 2s1.5.67 1.5 1.5S10.33 5 9.5 5 8 4.33 8 3.5M3 21c0 1.1.9 2 2 2h6V12H3zm10 2h6c1.1 0 2-.9 2-2v-9h-8z"></path>
                </svg>
                <svg data-ds-icon="ChevronRight" width="12" height="12" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0 svg_isopen" style="position: absolute; right: 0px;"><!---->
                  <path fill="currentColor" d="M8.293 5.293a1 1 0 0 1 1.338-.069l.076.069 6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 1 1-1.414-1.414L13.586 12 8.293 6.707l-.068-.076a1 1 0 0 1 .068-1.338"></path>
                </svg>


                <div class="header-title overflow-hidden">
                  <span slot="title" class="sidebar_accordion_title">
                    <svg data-ds-icon="Gift" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                      <path fill="currentColor" d="M21 5h-3.35c.22-.46.35-.96.35-1.5C18 1.57 16.43 0 14.5 0c-.98 0-1.86.41-2.5 1.06A3.5 3.5 0 0 0 9.5 0C7.57 0 6 1.57 6 3.5c0 .54.13 1.04.35 1.5H3c-1.1 0-2 .9-2 2v1c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2m-6.5-3c.83 0 1.5.67 1.5 1.5S15.33 5 14.5 5 13 4.33 13 3.5 13.67 2 14.5 2M8 3.5C8 2.67 8.67 2 9.5 2s1.5.67 1.5 1.5S10.33 5 9.5 5 8 4.33 8 3.5M3 21c0 1.1.9 2 2 2h6V12H3zm10 2h6c1.1 0 2-.9 2-2v-9h-8z"></path>
                    </svg>


                    <span class="is-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($translations['promotions']); ?></span>
                  </span>
                </div>
                <div class="svg_container">
                  <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon " style="transform: rotate(0deg); margin-right: 0;">

                    <path d="M32.274 49.762 9.204 26.69l6.928-6.93 16.145 16.145L48.42 19.762l6.93 6.929-23.072 23.07z"></path>
                  </svg>
                </div>
              </button>
            </div>
            <div class="content render-content">
              <div class="sidebar_content" style="">
                <button type="button" tabindex="0" class="anchor_button modal-trigger" data-modal="modal-bonus-daily" data-analytics="hero-button-casino-1">
                  <span class="is-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($translations['daily_bonus']); ?></span>
                </button>
                <button type="button" tabindex="0" class="anchor_button modal-trigger" data-modal="modal-bonus-100" data-analytics="hero-button-casino-2">
                  <span class="is-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($translations['bonus_100_deposit']); ?></span>
                </button>
                <button type="button" tabindex="0" class="anchor_button modal-trigger" data-modal="modal-bonus-1000" data-analytics="hero-button-casino-3">
                  <span class="is-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($translations['bonus_1000_deposit']); ?></span>
                </button>
                <button type="button" tabindex="0" class="anchor_button modal-trigger" data-modal="modal-bonus-5000" data-analytics="hero-button-casino-4">
                  <span class="is-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($translations['bonus_5000_deposit']); ?></span>
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="spacing_div">
          <hr class="spacing">
        </div>
        <a class="sidebar_anchor_base" href="https://t.me/splitsupports" target="_blank">
          <button type="button" tabindex="0" class="anchor_button" data-button-root="">
            <svg data-ds-icon="Support" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
              <path fill="currentColor" d="M12 1C6.49 1 2 5.34 2 10.67v4.61a1 1 0 0 0 .69.95l3.89 1.26c1.25.27 2.42-.68 2.42-1.96v-4.05c0-1.27-1.17-2.22-2.42-1.96l-2.55.55C4.35 6.12 7.8 3.01 12 3.01s7.65 3.12 7.97 7.06l-2.55-.55c-1.25-.27-2.42.68-2.42 1.96v4.05c0 1.27 1.17 2.22 2.42 1.96l2.58-.55v1.07c0 1.1-.9 2-2 2h-4v-.5c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v1.5c0 .55.45 1 1 1h6c2.21 0 4-1.79 4-4v-7.33c0-5.33-4.49-9.67-10-9.67z"></path>
            </svg>
            <span class="is-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($translations['support']); ?></span>
          </button>
        </a>



        <div id="languages" data-testid="languages" class="sidebar_accordion">
          <div class="accordion accordion-stacked">
            <div class="header header-stacked">
              <button type="button" tabindex="0" class="promo_anchor_button" aria-label="<?php echo htmlspecialchars($translations['language'] . ': ' . $current_language); ?>" data-button-root="">
                <svg data-ds-icon="Language" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                  <path fill="currentColor" d="M7.14 9.87c1.49.31 3.13.48 4.86.48s3.37-.18 4.86-.48c-.34-4.02-1.6-7.36-3.23-8.73-.53-.08-1.07-.13-1.63-.13s-1.1.05-1.63.13C8.74 2.52 7.48 5.86 7.14 9.87m8.32-8.31c1.28 1.84 2.19 4.69 2.49 8.05 1.75-.46 3.21-1.11 4.2-1.88a11.05 11.05 0 0 0-6.68-6.17zM18.05 12c0 1.59-.14 3.09-.38 4.48 1.4.33 2.64.77 3.67 1.31a10.92 10.92 0 0 0 1.18-8.99c-1.14.81-2.68 1.48-4.5 1.94q.03.615.03 1.26m-12.1 0c0-.43.01-.84.03-1.26-1.82-.46-3.37-1.13-4.5-1.94a10.92 10.92 0 0 0 1.18 8.99c1.04-.54 2.28-.99 3.67-1.31-.24-1.39-.38-2.89-.38-4.48m1.12-1.01c-.01.33-.02.67-.02 1.01 0 1.49.13 2.93.37 4.25 1.42-.26 2.96-.4 4.58-.4s3.17.15 4.58.4c.23-1.32.37-2.76.37-4.25 0-.34 0-.68-.02-1.01-1.51.3-3.17.46-4.93.46s-3.42-.16-4.93-.46m10.38 6.57c-.45 1.98-1.14 3.66-1.99 4.88 2.11-.7 3.93-2.02 5.26-3.74-.92-.46-2.02-.85-3.26-1.14zM12 16.95c-1.54 0-3.01.14-4.37.38.58 2.54 1.57 4.54 2.74 5.53.53.08 1.07.13 1.63.13s1.1-.05 1.63-.13c1.17-.99 2.15-2.99 2.74-5.53-1.36-.25-2.83-.38-4.37-.38m-3.46 5.49c-.85-1.23-1.54-2.9-1.99-4.88-1.24.29-2.34.68-3.26 1.14a11.06 11.06 0 0 0 5.26 3.74zM1.86 7.73c.99.77 2.45 1.42 4.2 1.88.3-3.36 1.2-6.21 2.49-8.05-3.02 1-5.46 3.26-6.68 6.17z"></path>
                </svg>
                <svg data-ds-icon="ChevronRight" width="12" height="12" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0 svg_isopen" style="position: absolute; right: 0px;"><!---->
                  <path fill="currentColor" d="M8.293 5.293a1 1 0 0 1 1.338-.069l.076.069 6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 1 1-1.414-1.414L13.586 12 8.293 6.707l-.068-.076a1 1 0 0 1 .068-1.338"></path>
                </svg>
                <div class="header-title overflow-hidden">
                  <span slot="title" class="sidebar_accordion_title">
                    <span class="is-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($translations['language'] . ': ' . $current_language); ?></span>
                  </span>
                </div>
                <div class="svg_container">
                  <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon" style="transform: rotate(0deg); margin-right: 0;">
                    <path d="M32.274 49.762 9.204 26.69l6.928-6.93 16.145 16.145L48.42 19.762l6.93 6.929-23.072 23.07z"></path>
                  </svg>
                </div>
              </button>
            </div>
            <div class="content render-content">
              <div class="sidebar_content" style="">
                <label class="anchor_button lang-button <?php echo $current_language === 'English' ? 'selected' : ''; ?>" data-lang="en" data-analytics="language-select-english">
                  <input type="radio" name="language" value="en" <?php echo $current_language === 'English' ? 'checked' : ''; ?> style="display: none;">
                  <span class="is-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($translations['language_english']); ?></span>
                  <span class="indicator size-md variant-default custom-radio-indicator"></span>
                </label>
                <label class="anchor_button lang-button <?php echo $current_language === 'Русский' ? 'selected' : ''; ?>" data-lang="ru" data-analytics="language-select-russian">
                  <input type="radio" name="language" value="ru" <?php echo $current_language === 'Русский' ? 'checked' : ''; ?> style="display: none;">
                  <span class="is-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($translations['language_russian']); ?></span>
                  <span class="indicator size-md variant-default custom-radio-indicator"></span>
                </label>
                <label class="anchor_button lang-button <?php echo $current_language === 'Español' ? 'selected' : ''; ?>" data-lang="es" data-analytics="language-select-Español">
                  <input type="radio" name="language" value="en" <?php echo $current_language === 'Español' ? 'checked' : ''; ?> style="display: none;">
                  <span class="is-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($translations['language_es']); ?></span>
                  <span class="indicator size-md variant-default custom-radio-indicator"></span>
                </label>
              </div>
            </div>
          </div>
        </div>

        <script>
          document.querySelectorAll('.anchor_button[data-lang]').forEach(function(button) {
            button.addEventListener('click', function() {
              var lang = this.getAttribute('data-lang');
              window.location.href = '/language.php?lang=' + encodeURIComponent(lang);
            });
          });
        </script>



        <!-- Removed duplicate roulette entries -->
      </div>
    </div>
  </div>
</div>
<?php
?>