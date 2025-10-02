<?php
require(dirname(__DIR__, 1) . "/system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

if (!isset($_SESSION['hash']) || empty($_SESSION['hash'])) {
  header('Location: /');
  die();
}

require(dirname(__DIR__, 1) . "/panels/header.php");
require(dirname(__DIR__, 1) . "/panels/sidebar.php");
require_once(dirname(__DIR__, 1) . "/panels/footer.php");

?>

<div class="main-container" id="main-content">
  <div class="favorite-container">
    <div class="favorite-inner">
      <div class="mybets-stack-container">
        <div class="mybets-wrap">
          <div class="mybets-header-stack">
            <div class="mybets-title-group">
              <h1 class="mybets-heading">
                <svg class="mybets-icon" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                  <path fill="currentColor" d="M22 1h-7c0 1.66-1.34 3-3 3S9 2.66 9 1H2v22h7c0-1.66 1.34-3 3-3s3 1.34 3 3h7zm-3.54 7.91-7.22 5.78a1.436 1.436 0 0 1-1.92-.1L6.43 11.7c-.56-.56-.56-1.48 0-2.04s1.48-.56 2.04 0l1.97 1.97 6.21-4.97c.62-.5 1.53-.4 2.03.23.5.62.4 1.53-.23 2.03z"></path>
                </svg>
                <? echo htmlspecialchars($translations['my_bets']) ?>
              </h1>
            </div>
            <a class="mybets-close-button" href="/casino/home">
              <svg class="mybets-close-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                <path fill="currentColor" d="M4.293 4.293a1 1 0 0 1 1.338-.069l.076.069L12 10.586l6.293-6.293.076-.069a1 1 0 0 1 1.407 1.407l-.069.076L13.414 12l6.293 6.293.069.076a1 1 0 0 1-1.407 1.406l-.076-.068L12 13.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L10.586 12 4.293 5.707l-.068-.076a1 1 0 0 1 .068-1.338"></path>
              </svg>
            </a>
          </div>
        </div>
        <div class="mybets-content-stack">
          <div class="mybets-sidebar-card">
            <div class="mybets-nav-outer-wrapper">
              <div class="mybets-nav-wrapper">
                <button class="mybets-nav-link mybets-nav-active" data-testid="global-navbar-Casino-tab">
                  <span class="mybets-nav-text"> <? echo htmlspecialchars($translations['casino']) ?></span>
                </button>

                <div class="mybets-nav-dash"></div>
              </div>
            </div>
          </div>
          <div class="mybets-main-card">
            <div class="mybets-table-section casino-page">
              <div class="mybets-table-wrapper">


                <table class="mybets-table">
                  <thead>
                    <tr class="mybets-table-header">
                      <th class="mybets-table-cell-left"><span class="mybets-table-heading">Game</span></th>
                      <th class="mybets-table-cell-left"><span class="mybets-table-heading">Bet ID</span></th>
                      <th class="mybets-table-cell-right"><span class="mybets-table-heading">Date</span></th>
                      <th class="mybets-table-cell-right"><span class="mybets-table-heading">Bet Amount</span></th>
                      <th class="mybets-table-cell-right"><span class="mybets-table-heading">Multiplier</span></th>
                      <th class="mybets-table-cell-right"><span class="mybets-table-heading">Payout</span></th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>

              </div>
              <div class="mybets-empty-state">
                <div class="mybets-empty-icon">
                  <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M69.5298 21.2739H58.4108C57.0786 21.2739 55.9986 22.3539 55.9986 23.6862V77.5877C55.9986 78.92 57.0786 80 58.4108 80H69.5298C70.8621 80 71.9421 78.92 71.9421 77.5877V23.6862C71.9421 22.3539 70.8621 21.2739 69.5298 21.2739Z" fill="#263742"></path>
                    <path d="M45.5615 36.9571H34.4424C33.1102 36.9571 32.0302 38.0371 32.0302 39.3694V77.5877C32.0302 78.9199 33.1102 79.9999 34.4424 79.9999H45.5615C46.8937 79.9999 47.9737 78.9199 47.9737 77.5877V39.3694C47.9737 38.0371 46.8937 36.9571 45.5615 36.9571Z" fill="#263742"></path>
                    <path d="M21.5892 52.2665H10.4702C9.13792 52.2665 8.05792 53.3465 8.05792 54.6787V77.5877C8.05792 78.92 9.13792 80 10.4702 80H21.5892C22.9215 80 24.0015 78.92 24.0015 77.5877V54.6787C24.0015 53.3465 22.9215 52.2665 21.5892 52.2665Z" fill="#263742"></path>
                    <path d="M21.8054 54.9316C21.8054 51.7407 19.2187 49.154 16.0278 49.154C12.8369 49.154 10.2501 51.7407 10.2501 54.9316V71.2491C10.2501 74.44 12.8369 77.0268 16.0278 77.0268C19.2187 77.0268 21.8054 74.44 21.8054 71.2491V54.9316Z" fill="#334552"></path>
                    <path d="M45.7777 38.1194C45.7777 34.9284 43.1909 32.3417 40 32.3417C36.8091 32.3417 34.2224 34.9284 34.2224 38.1194V71.1209C34.2224 74.3118 36.8091 76.8986 40 76.8986C43.1909 76.8986 45.7777 74.3118 45.7777 71.1209V38.1194Z" fill="#334552"></path>
                    <path d="M69.746 21.9485C69.746 18.7575 67.1593 16.1708 63.9684 16.1708C60.7775 16.1708 58.1907 18.7575 58.1907 21.9485V71.0219C58.1907 74.2128 60.7775 76.7995 63.9684 76.7995C67.1593 76.7995 69.746 74.2128 69.746 71.0219V21.9485Z" fill="#334552"></path>
                    <path d="M16.0279 46.3862C19.2573 46.3862 21.8752 43.7683 21.8752 40.5389C21.8752 37.3095 19.2573 34.6916 16.0279 34.6916C12.7985 34.6916 10.1806 37.3095 10.1806 40.5389C10.1806 43.7683 12.7985 46.3862 16.0279 46.3862Z" fill="#3C8725"></path>
                    <path d="M16.0277 42.0786C17.7507 42.0786 19.1475 40.6819 19.1475 38.9589C19.1475 37.2358 17.7507 35.8391 16.0277 35.8391C14.3047 35.8391 12.9079 37.2358 12.9079 38.9589C12.9079 40.6819 14.3047 42.0786 16.0277 42.0786Z" fill="#69E244"></path>
                    <path d="M22.33 32.3417L17.1462 27.1579L33.5883 10.7158L39.9892 17.1167L57.1059 0L62.2933 5.18743L39.9892 27.4879L33.5883 21.0833L22.33 32.3417Z" fill="#334552"></path>
                  </svg>
                </div>
                <span class="mybets-empty-text"><? echo htmlspecialchars($translations['no-bets']) ?></span>
                <span class="mybets-empty-text">
                  <a class="mybets-action-link" href="/"><? echo htmlspecialchars($translations['start-play']) ?></a>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div><? render_footer($translations) ?>
</div>