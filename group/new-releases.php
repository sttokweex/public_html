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
      return isset($game['vendorid']) && $game['vendorid'] === 'Pragmatic play custom';
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
              <h1 type="heading" variant="neutral-default" tag="h1" size="xl" class="text-neutral-default ds-heading-xl" data-ds-text="true"><?php echo htmlspecialchars($translations['new_releases']) ?></h1>
            </div>
            <div class="right favorite-page"><img class="favorite-page" src="https://mediumrare.imgix.net/group-banner-default.png" alt="Favorites"></div>
          </div>
        </div>
      </div>
      <?php
      renderSearch($games, $translations);
      ?>
      <!-- Сетка для отображения игр -->
      <div class="games-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 16px; padding: 16px;">
        <?php if (!empty($filtered_games)): ?>
          <?php foreach ($filtered_games as $game): ?>
             <a class="game-slider-game-link" href="/slot/<?php echo htmlspecialchars($game['name']); ?>">
            <div class="game-card" style="background: #fff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); overflow: hidden;">
              <img src="<?php echo htmlspecialchars($game['iconurl']); ?>" alt="<?php echo htmlspecialchars($game['name']); ?>" style="width: 100%; height: 100% ; object-fit: cover;">
            
            </div>
             </a>
          <?php endforeach; ?>
        <?php else: ?>
          <p style="text-align: center; color: #666;">Нет игр для отображения.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php render_footer($translations); ?>
</div>