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
require_once(dirname(__DIR__, 1) . "/panels/livefeed.php");
require_once(dirname(__DIR__, 1) . "/panels/search.php");
?>

<div class="main-container" id="main-content">
  <div class="favorite-container">
    <div class="favorite-inner">
      <div class="group-banner-wrap favorite-page">
        <div class="group-banner-bg favorite-page"></div>
        <div class="banner-wrap favorite-page">
          <div class="banner favorite-page">
            <div class="left favorite-page">
              <h1 type="heading" variant="neutral-default" tag="h1" size="xl" class="text-neutral-default ds-heading-xl" data-ds-text="true"><? echo htmlspecialchars($translations['favorites']) ?></h1>
            </div>
            <div class="right favorite-page"><img class="favorite-page" src="https://mediumrare.imgix.net/group-banner-default.png" alt="Favorites"></div>
          </div>
        </div>
      </div>
      <?
      renderSearch($games, $translations);
      ?><div class="no-games favorite-empty"><span tag="span" type="body" size="md" class="ds-body-md" data-ds-text="true"><? echo htmlspecialchars($translations['no-favorite-1']) ?>
          <svg data-ds-icon="Favorite" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="">
            <path fill="currentColor" d="m12 4.81 2.12 3.76.45.8 5.13 1.03-2.92 3.18-.62.67.1.91.5 4.29-3.92-1.8-.83-.38-.83.38-3.92 1.8.5-4.29.1-.91-.62-.67-2.92-3.18 5.13-1.03.45-.8 2.12-3.76M12 1.94c-.39 0-.79.2-1.01.59L8.14 7.59l-5.7 1.15a1.16 1.16 0 0 0-.62 1.92l3.93 4.28-.67 5.77C5 21.43 5.57 22 6.23 22c.16 0 .32-.03.48-.11l5.28-2.42 5.28 2.42c.16.07.32.11.48.11.66 0 1.23-.57 1.15-1.29l-.67-5.77 3.93-4.28c.61-.66.26-1.74-.62-1.92l-5.7-1.15-2.85-5.06c-.22-.39-.61-.59-1.01-.59z"></path>
            <path fill="currentColor" d="M11.99 1.94c.396.003.782.203 1 .59l2.85 5.06 5.7 1.15c.88.18 1.23 1.26.62 1.92l-3.93 4.28.67 5.77c.08.72-.49 1.29-1.15 1.29l-.12-.007q-.12-.015-.24-.056l-.12-.047-5.28-2.42-5.28 2.42c-.16.08-.32.11-.48.11l-.123-.006a1.16 1.16 0 0 1-1.035-1.15l.008-.134.67-5.77-3.93-4.28a1.16 1.16 0 0 1 .62-1.92l5.7-1.15 2.85-5.06a1.16 1.16 0 0 1 1-.59m.009 16.434.407.187 5.267 2.413.036.012-5.286-2.427-.413-.19zM2.522 9.92a.2.2 0 0 0 .038.066l3.926 4.276.31.338-.723 6.219h.001a.2.2 0 0 0 .006.074l.003.006.684-5.856.048-.45-.31-.335-.002-.003zM9.9 8.57l-.45.8-5.13 1.03 2.92 3.18.62.67-.1.91-.5 4.29 3.92-1.8.83-.38.83.38 3.92 1.8-.5-4.29-.1-.91.62-.67 2.92-3.18-5.13-1.03-.45-.8-2.1-3.76zm2.09-5.63a.2.2 0 0 0-.07.021.1.1 0 0 0-.031.024l-.028.036L8.786 8.48l-.448.09-3.16.638 3.625-.729 2.345-4.16.862.485.845-.476-.737-1.307a.16.16 0 0 0-.058-.062.2.2 0 0 0-.07-.018"></path>
          </svg><? echo htmlspecialchars($translations['no-favorite-2']) ?></span></div>
      <div class="favorite-slider">
        <button type="button" tabindex="0" class="favorite-slider-button" disabled="" data-testid="pagination-previous" data-button-root=""><? echo htmlspecialchars($translations['prev']) ?></button>
        <button type="button" tabindex="0" class="favorite-slider-button" disabled="" data-testid="pagination-previous" data-button-root=""><? echo htmlspecialchars($translations['next']) ?></button>
      </div>
      <? renderBetsTable($translations); ?>
    </div>
  </div><? render_footer($translations) ?>
</div>