<?php
require(dirname(__DIR__, 1) . "/system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
require(dirname(__DIR__, 1) . "/panels/header.php");
require(dirname(__DIR__, 1) . "/panels/sidebar.php");
?>
<style>
  .game-list-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    display: flex;
    flex-wrap: wrap;
    /* Allow wrapping to next line */
    gap: 20px;
    /* Space between game cards */
  }

  .game-list-item {
    flex: 1 0 180px;
    /* Grow to fill space, don't shrink below 180px */
    min-width: 140px;
    /* Minimum width to prevent cards from becoming too small */
    max-width: 220px;
    /* Maximum width to keep cards from growing too large */
    height: fit-content;
  }

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
  <div class="game-list-container" id="game-list-container">
    <?php foreach ($games as $game): ?>
      <div class="game-list-item">
        <div class="game-list-wrap" data-analytics="list-ru-trending-games-<?php echo htmlspecialchars($game['gameid']); ?>">
          <div class="game-list-game-card-wrap">
            <a class="game-list-game-link" href="/slot/<?php echo htmlspecialchars($game['name']); ?>">
              <img class="game-list-game-image" loading="lazy" src="<?php echo htmlspecialchars($game['iconurl2'] ?? $game['iconurl'] ?? $game['icon']); ?>" alt="<?php echo htmlspecialchars($game['name']); ?>">
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