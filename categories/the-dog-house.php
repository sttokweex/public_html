<?php
require(dirname(__DIR__, 1) . "/system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

require(dirname(__DIR__, 1) . "/panels/header.php");
require(dirname(__DIR__, 1) . "/panels/sidebar.php");
$games = array_filter($games, function ($game) {
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
<style>
  .game-list-game-image {
    width: 100%;
    /* Ensure image scales with the card */
    height: auto;
    /* Maintain aspect ratio */
  }

  .game-list-wrap {
    position: relative;
  }
</style>

<div class="main-container" id="main-content">
  <div class="GoBack__container--F0q"><a class="PlainText__text--1wg PlainText__medium--1_S Link__link--3vh GoBack__goBack--2Ee PlainText__dark--3fd" href="/" target="_self">Go back</a></div>
  <div class="GamesHeader__categoryTitle--aFh cms-games-grid-category-title">
    <h2 class="Headings__head--2LV Headings__bold--iD3 Headings__h2--3Bv Headings__dark--1eH GamesHeader__categoryName--WNE ">Dog House</h2>
  </div>
  <div class="game-list-container" id="game-list-container">
    <?php foreach ($games as $game): ?>
      <div class="game-list-item">
        <div class="game-list-wrap" data-analytics="list-ru-trending-games-<?php echo htmlspecialchars($game['gameid']); ?>">
          <div class="game-list-game-card-wrap">
            <a class="game-list-game-link" href="/slot/<?php echo htmlspecialchars($game['name']); ?>">
              <img class="game-list-game-image" loading="lazy" src="<?php echo htmlspecialchars($game['iconurl2'] ?? $game['iconurl'] ?? $game['icon']); ?>" alt="<?php echo htmlspecialchars($game['name']); ?>">
              <div tabindex="0" class="GameViewBasic__container--1nm cms-games-grid-basic-view AccessibilityElement__wrapper--3x7" title="Fire Blaze: Orange Wizard" aria-label="Game Fire Blaze: Orange Wizard">

                <div class="GameViewBasic__hoverContainer--1St cms-games-grid-game-hover-state">
                  <div class="GameViewBasic__hoverContainerDefault--1BR cms-games-grid-game-hover-state-default">
                    <div tabindex="0" class="GameMoreInfo__gameInfoIcon--2Z- GameViewBasic__gameInfoIcon--3Wf cms-games-grid-game-more-info-icon AccessibilityElement__wrapper--3x7" aria-label="Game info popup"></div>
                    <div class="GameViewBasic__hoverControls--2fs">
                      <h4 class="Headings__head--2LV Headings__bold--iD3 Headings__h4--2JP Headings__dark--1eH GameName__gameName--MSl GameViewBasic__hoverGameName--1uw cms-games-grid-game-name"><?php echo htmlspecialchars(str_replace('_', ' ', $game['name'])); ?></h4><button type="button" class="GamePlayButton__button--3lB  cms-games-grid-game-play-button Button__btn--THI Button__large--6PM Button__primary--3wk Button__success--3NL Button__dark--2vB">Play</button>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<script>
  function adjustGameCards() {
    const container = document.getElementById('game-list-container');
    const gameItems = container.getElementsByClassName('game-list-item');
    const containerWidth = container.offsetWidth;
    const minCardWidth = 140 + 20; // Minimum card width (140px) + gap (20px)

  }

  // Run on page load
  window.addEventListener('load', adjustGameCards);
  // Run on window resize
  window.addEventListener('resize', adjustGameCards);
</script>

<?php
require(dirname(__DIR__, 1) . "/panels/footer.php");
render_footer($translations);
?>