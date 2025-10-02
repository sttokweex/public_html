<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
if (isset($_SESSION['lang']) && $_SESSION['lang'] === 'ru') {
  $current_language = 'Русский';
} else {
  // По умолчанию - English
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
      <svg fill="rgba(177,186,211,1)" viewBox="0 0 64 64" class="svg-icon " style="">

        <path d="M64 64H0V51h64zm0-25.5H0v-13h64zM64 13H0V0h64z"></path>
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
          <button type="button" tabindex="0" class="anchor_button" style='cursor:default;' disabled=true data-button-root="">
            <svg data-ds-icon="Casino" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="svg-icon" style="color: white;"><!---->
              <path fill="currentColor" d="m2.14 4.63 7.25-3.38c.63-.3 1.34-.23 1.89.11-.09.14-.18.28-.26.43L4.81 15.1 1.17 7.29c-.47-1-.03-2.19.97-2.66"></path>
              <path fill="currentColor" fill-rule="evenodd" d="m21.86 4.63-7.25-3.38c-1-.47-2.19-.03-2.66.97l-6.76 14.5c-.47 1-.03 2.19.97 2.66l7.25 3.38c1 .47 2.19.03 2.66-.97l6.76-14.5c.47-1 .03-2.19-.97-2.66m-9.54 11-.85-4.81 4.23-2.44.85 4.81z" clip-rule="evenodd"></path>
            </svg><!----> <!----> <!----> <!----><!----><!----></button></a>
        <a class="sidebar_anchor_base favorite-box" href="/favorites">
          <button type="button" tabindex="0" class="anchor_button" data-button-root="">
            <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon " style="">
              <title><?php echo htmlspecialchars($translations['favorites']); ?></title>
              <path d="m32.001 16 3.094 5.759c1.742 3.218 4.813 5.525 8.457 6.201l.074.012 6.425 1.146-4.505 4.72a12 12 0 0 0-3.396 8.385q0 .882.124 1.732l-.008-.064.88 6.453-5.546-2.666c-1.635-.807-3.563-1.281-5.599-1.281s-3.964.471-5.675 1.313l.075-.034-5.545 2.666.88-6.453c.074-.5.116-1.08.116-1.668a12 12 0 0 0-3.398-8.39l.004.005-4.505-4.854 6.425-1.146a12.15 12.15 0 0 0 8.501-6.15l.032-.063 3.094-5.626zm0-14.613h-.006c-1.32 0-2.466.736-3.052 1.822l-.01.018-7.599 14.292a3.53 3.53 0 0 1-2.432 1.784l-.022.004-15.998 2.88A3.47 3.47 0 0 0 0 25.602c0 .93.366 1.774.962 2.398l-.002-.002 11.225 11.705a3.37 3.37 0 0 1 .93 2.982l.004-.02-2.186 15.998a3.466 3.466 0 0 0 3.432 3.946h.008a3.25 3.25 0 0 0 1.644-.382l-.018.008 14.264-6.88a4.19 4.19 0 0 1 3.704.01l-.024-.01 14.053 6.88a3.15 3.15 0 0 0 1.5.374h.021-.002q.052.003.114.002a3.466 3.466 0 0 0 3.43-3.966l.002.018-2.186-15.998a3.37 3.37 0 0 1 .934-2.88L63.034 28.08a3.468 3.468 0 0 0-1.872-5.81l-.022-.003-15.998-2.88a3.53 3.53 0 0 1-2.47-1.846l-.01-.02-7.6-14.292a3.47 3.47 0 0 0-3.061-1.84h-.006z"></path>
            </svg>
            <span class="is-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($translations['favorites']); ?></span>
          </button>
        </a>
        <a class="sidebar_anchor_base recent-box" href="/recent">
          <button type="button" tabindex="0" class="anchor_button" data-button-root="">
            <svg fill="currentColor" viewBox="0 0 96 96" class="svg-icon " style="">
              <title><?php echo htmlspecialchars($translations['recent']); ?></title>
              <path d="M52.117 4.113C76.354 4.116 96 23.763 96 48S76.353 91.886 52.113 91.887c-11.019 0-21.087-4.058-28.742-10.719l8.707-10.04a30.4 30.4 0 0 0 19.996 7.462c16.852 0 30.515-13.664 30.516-30.516S68.927 17.56 52.074 17.56c-15.184 0-27.777 11.086-30.148 25.785h7.828L14.855 64.426 0 43.344h8.473l.015-.203c2.539-21.885 21.079-38.898 43.63-39.028M45.45 29.375h13.332v15.86L70.988 57.44l-9.437 9.438-16.102-16.106z"></path>
            </svg>
            <span class="is-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($translations['recent']); ?></span>
          </button>
        </a>
        <a class="sidebar_anchor_base challenge-box" href="/challenges">
          <button type="button" tabindex="0" class="anchor_button" data-button-root="">
            <svg fill="currentColor" viewBox="0 0 96 96" class="svg-icon " style="">
              <title><?php echo htmlspecialchars($translations['contests']); ?></title>
              <path d="M48.05.055C74.535.055 96 21.52 96 48.004s-21.467 47.949-47.95 47.95C21.569 95.953.103 74.485.103 48.003c0-6.845 1.435-13.358 3.898-18.941h6.594l2.992 2.953a37.9 37.9 0 0 0-3.578 16.125c0 21.031 17.05 38.082 38.082 38.082 21.031 0 38.082-17.05 38.082-38.082S69.122 10.059 48.09 10.059c-5.853 0-11.398 1.322-16.121 3.582l-2.996-2.996V4.05l-.301.12A47.3 47.3 0 0 1 46.668.075l1.285-.02zm-.105 19.98c15.446 0 27.97 12.52 27.97 27.969-.001 15.445-12.524 27.969-27.97 27.969s-27.968-12.521-27.968-27.97v-.073c0-2.957.469-5.803 1.28-8.278l8.75 8.79v.023c.247 9.706 8.182 17.501 17.942 17.52l-.004.042h.22c9.93 0 17.979-8.05 17.98-17.98 0-9.854-7.927-17.862-17.762-17.984l-8.79-8.75-.195.054a27.4 27.4 0 0 1 8.477-1.332zm-27.047-6.117 26.215 26.094h.84A7.993 7.993 0 1 1 40 48.82l-.04-.8a6 6 0 0 1 0-.855L17.903 25.026l-3.992-3.996H8.313L0 21.027V11.04h10.988V.051h9.91z"></path>
            </svg>
            <span class="is-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($translations['contests']); ?></span>
          </button>
        </a>
        <a class="sidebar_anchor_base mybets-box" href="my-bets">
          <button type="button" tabindex="0" class="anchor_button" data-button-root="">
            <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon " style="">
              <title><?php echo htmlspecialchars($translations['my_bets']); ?></title>
              <path d="M0 3.55v7.12h7.12v49.787h6.214c.778-3.122 3.556-5.398 6.866-5.398a7.07 7.07 0 0 1 6.856 5.348l.01.048h9.974c.778-3.122 3.556-5.398 6.866-5.398a7.07 7.07 0 0 1 6.856 5.348l.01.048h6.16V10.667h7.066v-7.12zm35.546 37.335h-17.76V35.55h17.76zM46.214 26.67H17.788v-5.334h28.426z"></path>
            </svg>
            <span class="is-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($translations['my_bets']); ?></span>
          </button>
        </a>
        <div class="spacing_div">
          <hr class="spacing">
        </div>
        <div class="wrapper-text"><span class="" style="max-width: 100%;"><?php echo htmlspecialchars($translations['games']); ?></span></div>
        <div id="slots" data-testid="slots" class="sidebar_accordion">
          <div class="accordion accordion-stacked">
            <div class="header header-stacked">
              <button type="button" tabindex="0" class="promo_anchor_button" aria-label="<?php echo htmlspecialchars($translations['slots']); ?>" data-button-root="">
                <svg fill="currentColor" viewBox="0 0 96 96" class="svg-icon is_small" style="">
                  <title><?php echo htmlspecialchars($translations['slots']); ?></title>
                  <path d="M30.48 42.441a79.7 79.7 0 0 0-5.8 15.84 30.1 30.1 0 0 0 0 14.36l.718 3-16.277 4A37.9 37.9 0 0 1 12 53.719l-12 2.84v-11.68l29.36-7.04zM96 46.88l-.922 4.64A85.5 85.5 0 0 0 83.2 63.32a30.56 30.56 0 0 0-6 13.04l-.597 3L60 76.32a38.12 38.12 0 0 1 13.36-22.28l-12-2.36 5.038-10.64zM72 24.12a134 134 0 0 0-15.2 22.957 49.8 49.8 0 0 0-5.6 22.8v5H32.32a55.6 55.6 0 0 1 5-22.757A87 87 0 0 1 50.8 31h-28V16.36H72z"></path>
                </svg>
                <svg fill="currentColor" viewBox="0 0 64 64" class="svg_isopen svg-icon" style="">
                  <path d="m26.307 53.996 20.998-20.998L26.307 12 20 18.306 34.694 33 20.001 47.694 26.307 54z"></path>
                </svg>
                <div class="header-title overflow-hidden">
                  <span slot="title" class="sidebar_accordion_title">
                    <svg fill="currentColor" viewBox="0 0 96 96" class="svg-icon " style="">
                      <title><?php echo htmlspecialchars($translations['slots']); ?></title>
                      <path d="M30.48 42.441a79.7 79.7 0 0 0-5.8 15.84 30.1 30.1 0 0 0 0 14.36l.718 3-16.277 4A37.9 37.9 0 0 1 12 53.719l-12 2.84v-11.68l29.36-7.04zM96 46.88l-.922 4.64A85.5 85.5 0 0 0 83.2 63.32a30.56 30.56 0 0 0-6 13.04l-.597 3L60 76.32a38.12 38.12 0 0 1 13.36-22.28l-12-2.36 5.038-10.64zM72 24.12a134 134 0 0 0-15.2 22.957 49.8 49.8 0 0 0-5.6 22.8v5H32.32a55.6 55.6 0 0 1 5-22.757A87 87 0 0 1 50.8 31h-28V16.36H72z"></path>
                    </svg>
                    <span class="is-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($translations['slots']); ?></span>
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
                <a class="sidebar_anchor_base" data-sveltekit-reload="off" data-sveltekit-preload-data="off" href="/slot/The_Dog_House">

                  <button type="button" tabindex="0" class="anchor_button">
                    <img src="/images/sidebar/icons/dog-house.gif" class="svg-icon gif-icon">
                    <span class="is-truncate" style="max-width: 100%;">The Dogs House</span>
                  </button>
                </a>
                <a class="sidebar_anchor_base" data-sveltekit-reload="off" data-sveltekit-preload-data="off" href="slot/Sugar_Rush">

                  <button type="button" tabindex="0" class="anchor_button">
                    <img src="/images/sidebar/icons/sugar-rush.png" class="svg-icon gif-icon">
                    <span class="is-truncate" style="max-width: 100%;">Sugar Rush</span>
                  </button>
                </a>
                <a class="sidebar_anchor_base" data-sveltekit-reload="off" data-sveltekit-preload-data="off" href="slot/Gates_Of_Olympus">
                  <button type="button" tabindex="0" class="anchor_button">
                    <img src="/images/sidebar/icons/best.gif" class="svg-icon gif-icon">
                    <span class="is-truncate" style="max-width: 100%;">Gates of Olympus</span>
                  </button>
                </a>
                <a class="sidebar_anchor_base" data-sveltekit-reload="off" data-sveltekit-preload-data="off" href="slot/Sweet_Bonanza">
                  <button type="button" tabindex="0" class="anchor_button" data-analytics="sidebar-all-promotions-link" data-button-root="">
                    <img src="/images/sidebar/icons/sweet.gif" class="svg-icon gif-icon">
                    <span class="is-truncate" style="max-width: 100%;">Sweet Bonanza</span>
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>
        <a class="sidebar_anchor_base" href="">
          <button type="button" tabindex="0" class="anchor_button" data-button-root="">
            <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon " style="">
              <title><?php echo htmlspecialchars($translations['popular']); ?></title>
              <path d="M57.164 0a6.836 6.836 0 0 1 6.79 7.629l-.798 6.836-.011.133a28.9 28.9 0 0 1-8.266 17.086L44.188 42.367l.93 8.473L31.976 64 30.34 51.078c-8.374-3.028-14.1-8.943-17.438-17.437L0 32.023l13.16-13.14 8.473.93L32.316 9.12c4.491-4.477 10.446-7.494 17.22-8.277l6.8-.793q.408-.05.828-.05M8.637 41.125c2.4 6.9 7.869 12.368 14.937 14.82 0 0-4.697 8.467-20.676 5.649C.07 45.615 8.586 40.957 8.586 40.957zm35.64-30.187a7.995 7.995 0 0 0 0 15.988v.039a7.995 7.995 0 0 0 7.996-7.992v-.04a8 8 0 0 0-7.996-7.995"></path>
            </svg>
            <span class="is-truncate" style="max-width: 100%;"><?php echo htmlspecialchars($translations['popular']); ?></span>
          </button>
        </a>

        <div class="spacing_div">
          <hr class="spacing">
        </div>
        <div id="promotions" data-testid="promotions" class="sidebar_accordion">
          <div class="accordion accordion-stacked">
            <div class="header header-stacked">
              <button type="button" tabindex="0" class="promo_anchor_button" aria-label="<?php echo htmlspecialchars($translations['promotions']); ?>" data-button-root="">
                <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon is_small" style="">
                  <title><?php echo htmlspecialchars($translations['promotions']); ?></title>
                  <path d="M28.652 60.5H11.883c-1.85 0-3.347-1.5-3.347-3.348V37.036c-1.85 0-3.348-1.5-3.348-3.348v-6.722c0-1.85 1.5-3.348 3.348-3.348h20.116zm26.812-36.884H35.347V60.5h16.768c1.85 0 3.349-1.5 3.349-3.348V37.036c1.85 0 3.348-1.5 3.348-3.348v-6.722c0-1.85-1.5-3.348-3.348-3.348zM45.417 3.5C38.006 3.5 32 9.508 32 16.918h13.417c1.85 0 3.349-1.5 3.349-3.348V6.848c0-1.85-1.5-3.348-3.349-3.348m-26.836 0c-1.85 0-3.347 1.5-3.347 3.348v6.722c0 1.85 1.5 3.348 3.347 3.348H32C32 9.506 25.99 3.5 18.58 3.5"></path>
                </svg>
                <svg fill="currentColor" viewBox="0 0 64 64" class="svg_isopen svg-icon" style="">
                  <path d="m26.307 53.996 20.998-20.998L26.307 12 20 18.306 34.694 33 20.001 47.694 26.307 54z"></path>
                </svg>
                <div class="header-title overflow-hidden">
                  <span slot="title" class="sidebar_accordion_title">
                    <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon " style="">
                      <title><?php echo htmlspecialchars($translations['promotions']); ?></title>
                      <path d="M28.652 60.5H11.883c-1.85 0-3.347-1.5-3.347-3.348V37.036c-1.85 0-3.348-1.5-3.348-3.348v-6.722c0-1.85 1.5-3.348 3.348-3.348h20.116zm26.812-36.884H35.347V60.5h16.768c1.85 0 3.349-1.5 3.349-3.348V37.036c1.85 0 3.348-1.5 3.348-3.348v-6.722c0-1.85-1.5-3.348-3.348-3.348zM45.417 3.5C38.006 3.5 32 9.508 32 16.918h13.417c1.85 0 3.349-1.5 3.349-3.348V6.848c0-1.85-1.5-3.348-3.349-3.348m-26.836 0c-1.85 0-3.347 1.5-3.347 3.348v6.722c0 1.85 1.5 3.348 3.347 3.348H32C32 9.506 25.99 3.5 18.58 3.5"></path>
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
                <svg data-ds-icon="Language" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="svg_icon is_small">
                  <title><?php echo htmlspecialchars($translations['language']); ?></title>
                  <path fill="currentColor" d="M7.14 9.87c1.49.31 3.13.48 4.86.48s3.37-.18 4.86-.48c-.34-4.02-1.6-7.36-3.23-8.73-.53-.08-1.07-.13-1.63-.13s-1.1.05-1.63.13C8.74 2.52 7.48 5.86 7.14 9.87m8.32-8.31c1.28 1.84 2.19 4.69 2.49 8.05 1.75-.46 3.21-1.11 4.2-1.88a11.05 11.05 0 0 0-6.68-6.17zM18.05 12c0 1.59-.14 3.09-.38 4.48 1.4.33 2.64.77 3.67 1.31a10.92 10.92 0 0 0 1.18-8.99c-1.14.81-2.68 1.48-4.5 1.94q.03.615.03 1.26m-12.1 0c0-.43.01-.84.03-1.26-1.82-.46-3.37-1.13-4.5-1.94a10.92 10.92 0 0 0 1.18 8.99c1.04-.54 2.28-.99 3.67-1.31-.24-1.39-.38-2.89-.38-4.48m1.12-1.01c-.01.33-.02.67-.02 1.01 0 1.49.13 2.93.37 4.25 1.42-.26 2.96-.4 4.58-.4s3.17.15 4.58.4c.23-1.32.37-2.76.37-4.25 0-.34 0-.68-.02-1.01-1.51.3-3.17.46-4.93.46s-3.42-.16-4.93-.46m10.38 6.57c-.45 1.98-1.14 3.66-1.99 4.88 2.11-.7 3.93-2.02 5.26-3.74-.92-.46-2.02-.85-3.26-1.14zM12 16.95c-1.54 0-3.01.14-4.37.38.58 2.54 1.57 4.54 2.74 5.53.53.08 1.07.13 1.63.13s1.1-.05 1.63-.13c1.17-.99 2.15-2.99 2.74-5.53-1.36-.25-2.83-.38-4.37-.38m-3.46 5.49c-.85-1.23-1.54-2.9-1.99-4.88-1.24.29-2.34.68-3.26 1.14a11.06 11.06 0 0 0 5.26 3.74zM1.86 7.73c.99.77 2.45 1.42 4.2 1.88.3-3.36 1.2-6.21 2.49-8.05-3.02 1-5.46 3.26-6.68 6.17z"></path>
                </svg>
                <svg fill="currentColor" viewBox="0 0 64 64" class="svg_isopen svg-icon" style="">
                  <path d="m26.307 53.996 20.998-20.998L26.307 12 20 18.306 34.694 33 20.001 47.694 26.307 54z"></path>
                </svg>
                <div class="header-title overflow-hidden">
                  <span slot="title" class="sidebar_accordion_title">
                    <svg data-ds-icon="Language" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="svg_icon">
                      <title><?php echo htmlspecialchars($translations['language']); ?></title>
                      <path fill="currentColor" d="M7.14 9.87c1.49.31 3.13.48 4.86.48s3.37-.18 4.86-.48c-.34-4.02-1.6-7.36-3.23-8.73-.53-.08-1.07-.13-1.63-.13s-1.1.05-1.63.13C8.74 2.52 7.48 5.86 7.14 9.87m8.32-8.31c1.28 1.84 2.19 4.69 2.49 8.05 1.75-.46 3.21-1.11 4.2-1.88a11.05 11.05 0 0 0-6.68-6.17zM18.05 12c0 1.59-.14 3.09-.38 4.48 1.4.33 2.64.77 3.67 1.31a10.92 10.92 0 0 0 1.18-8.99c-1.14.81-2.68 1.48-4.5 1.94q.03.615.03 1.26m-12.1 0c0-.43.01-.84.03-1.26-1.82-.46-3.37-1.13-4.5-1.94a10.92 10.92 0 0 0 1.18 8.99c1.04-.54 2.28-.99 3.67-1.31-.24-1.39-.38-2.89-.38-4.48m1.12-1.01c-.01.33-.02.67-.02 1.01 0 1.49.13 2.93.37 4.25 1.42-.26 2.96-.4 4.58-.4s3.17.15 4.58.4c.23-1.32.37-2.76.37-4.25 0-.34 0-.68-.02-1.01-1.51.3-3.17.46-4.93.46s-3.42-.16-4.93-.46m10.38 6.57c-.45 1.98-1.14 3.66-1.99 4.88 2.11-.7 3.93-2.02 5.26-3.74-.92-.46-2.02-.85-3.26-1.14zM12 16.95c-1.54 0-3.01.14-4.37.38.58 2.54 1.57 4.54 2.74 5.53.53.08 1.07.13 1.63.13s1.1-.05 1.63-.13c1.17-.99 2.15-2.99 2.74-5.53-1.36-.25-2.83-.38-4.37-.38m-3.46 5.49c-.85-1.23-1.54-2.9-1.99-4.88-1.24.29-2.34.68-3.26 1.14a11.06 11.06 0 0 0 5.26 3.74zM1.86 7.73c.99.77 2.45 1.42 4.2 1.88.3-3.36 1.2-6.21 2.49-8.05-3.02 1-5.46 3.26-6.68 6.17z"></path>
                    </svg>
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