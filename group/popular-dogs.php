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
// Фильтрация игр по указанным названиям
$filtered_games = array_filter($games, function ($game) {
  $search_terms = ['the_dog_house'];
  $game_name = strtolower($game['name']);
  foreach ($search_terms as $term) {
    if (stripos($game_name, $term) !== false) {
      return true;
    }
  }
  return false;
});
?>

<div class="main-container" id="main-content">
  <div class="favorite-container">
    <div class="favorite-inner">
      <div class="group-banner-wrap favorite-page">
        <div class="group-banner-bg favorite-page"></div>
        <div class="banner-wrap favorite-page">
          <div class="banner favorite-page">
            <div class="left favorite-page">
              <h1 type="heading" variant="neutral-default" tag="h1" size="xl" class="text-neutral-default ds-heading-xl" data-ds-text="true"><?php echo htmlspecialchars($translations['popular']) ?></h1>
            </div>
            <div class="right favorite-page"><img class="favorite-page" src="https://mediumrare.imgix.net/group-banner-default.png" alt="Favorites"></div>
          </div>
        </div>
      </div>
      <?php
      renderSearch($games, $translations);
      ?>
      <!-- Сетка для отображения игр -->
      <div class="games-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 16px; padding: 16px 0;"> <?php if (!empty($filtered_games)): ?>
          <?php foreach ($filtered_games as $game): ?>
            <div class="game-slider-wrap" data-analytics="slider-ru-trending-games-<?php echo htmlspecialchars($game['gameid']); ?>">
              <div class="game-slider-image-focus">
                <div class="game-slider-game-card-wrap">
                  <a class="game-slider-game-link" href="/slot/<?php echo htmlspecialchars($game['name']); ?>">
                    <div class="game-slider-img-wrap">
                      <img class="game-slider-game-image" loading="lazy" src="<?php echo htmlspecialchars($game['iconurl2'] ?? $game['iconurl'] ?? $game['icon']); ?>" alt="<?php echo htmlspecialchars($game['name']); ?>">
                    </div>
                  </a>
                  <div class="hover-button svelte-zglogk"><!----><!----><button type="button" data-gamename="<?php echo htmlspecialchars($game['name'], ENT_QUOTES); ?>" tabindex=" 0" class="copy-slot-link-btn [font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] inline-flex relative items-center gap-2 justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] bg-grey-400 text-white hover:bg-grey-300 hover:text-white focus-visible:outline-white var(--ds-font-size-xs) shadow-md px-[0.75rem] py-3" data-button-root=""><!----><!----><svg data-ds-icon="Popout" width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                        <path fill="currentColor" d="M14.395 3c-.55 0-1 .45-1 1s.45 1 1 1h3.19l-9.49 9.49a.996.996 0 0 0 .71 1.7c.26 0 .51-.1.71-.29l9.49-9.49V9.6c0 .55.45 1 1 1s1-.45 1-1V4c0-.55-.45-1-1-1z"></path>
                        <path fill="currentColor" d="M19.995 19h-15V4c0-.55-.45-1-1-1s-1 .45-1 1v16c0 .55.45 1 1 1h16c.55 0 1-.45 1-1s-.45-1-1-1"></path>
                      </svg></button><!----></div>

                </div>
                <div class="stack x-flex-start y-center gap-smaller padding-none direction-horizontal padding-left-auto
    padding-top-smaller padding-bottom-auto padding-right-auto svelte-1klblr3"><!----><span class="scale-up block svelte-rxhcv3 is-relative" style="width: 6px; height: 6px;"><!----></span><!----> <!----><span type="body" tag="span" size="xs" class="ds-body-xs" data-ds-text="true"><!----><!----><!----><span tag="span" type="body" size="xs" variant="neutral-default" class="text-neutral-default ds-body-xs" data-ds-text="true"><!----><!----> <?php echo htmlspecialchars($game['online']); ?></span><!----> playing</span><!----><!----></div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p style="text-align: center; color: #666;">Нет игр для отображения.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php render_footer($translations); ?>
</div>