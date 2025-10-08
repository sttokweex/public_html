<?php
function render_slider($games, $hasMargin, $translations, $isOurGames = false)
{
  // Filter games if isOurGames is true
  if ($isOurGames) {
    $games = array_filter($games, function ($game) {
      return isset($game['vendorid']) && $game['vendorid'] === 'Pragmatic play custom';
    });
  } else {
    $excludedGames = [
      'Starlight_Princess',
      'Sweet_Bonanza',
      'Gates_of_Olympus',
      'The_Dog_House',
      'Pirate_Gold',
      'Great_Rhino',
      'Monkey_Warrior',
      'Dog_House_Megaways'
    ];
    // Keep only games that don't have 'Pragmatic play custom' vendorid
    $games = array_filter($games, function ($game) {
      return !isset($game['vendorid']) || $game['vendorid'] !== 'Pragmatic play custom';
    });
  }
?>
  <div class="game-slider<?php echo $hasMargin ? ' home-has-margin' : ''; ?>">
    <div class="game-slider-header">
      <div class="game-slider-header-title"><?php echo $translations['trending_games']; ?></div>
      <a class="game-slider-header-link" href="/categories/trending-games"> Больше игр</a>
      <button class="game-slider-left"></button>
      <button class="game-slider-right"></button>
    </div>
    <div class="game-slider-gallery game-slider-scrollX game-slider-hide-scrollbar">
      <?php foreach ($games as $game): ?>
        <div class="game-slider-slide">
          <div class="game-slider-wrap" data-analytics="slider-ru-trending-games-<?php echo htmlspecialchars($game['gameid']); ?>">
            <div class="game-slider-game-card-wrap">
              <a class="game-slider-game-link" href="/slot/<?php echo htmlspecialchars($game['name']); ?>">
                <img class="game-slider-game-image" loading="lazy" src="<?php echo htmlspecialchars($game['iconurl2'] ?? $game['iconurl'] ?? $game['icon']); ?>" alt="<?php echo htmlspecialchars($game['name']); ?>">
              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <script>
    // Проверяем jQuery


    // Функция расчета ширины слайдов и scrollAmount
    function calculateSlideWidth($gallery) {
      const totalWidth = $gallery.width();
      if (totalWidth <= 0) {
        return;
      }

      const slideWidthPx = 175;
      const countSlide = Math.max(1, Math.floor(totalWidth / slideWidthPx));
      const slideWidthPercent = 100 / countSlide;
      $gallery.css({
        'grid-auto-columns': `calc(${slideWidthPercent}% - 16px)`
      });

      const $container = $gallery.closest('.game-slider');
      const $forwardBtn = $container.find('.game-slider-right');
      const $backwardBtn = $container.find('.game-slider-left');

      // Пересчет scrollAmount для скролла на ширину галереи
      const cardWidth = $container.find('.game-slider-game-card-wrap')[0].clientWidth;
      const galleryWidth = $gallery[0].clientWidth;
      const visibleCards = Math.floor(galleryWidth / cardWidth);
      $gallery.data('scrollAmount', (visibleCards) * cardWidth);

      updateButtonState($gallery, $backwardBtn, $forwardBtn);
    }

    // Функция обновления состояния кнопок
    function updateButtonState($gallery, $backwardBtn, $forwardBtn) {
      const maxScroll = $gallery[0].scrollWidth - $gallery[0].clientWidth;

      const currentScroll = $gallery.scrollLeft();
      $backwardBtn.prop('disabled', currentScroll <= 0);
      $forwardBtn.prop('disabled', currentScroll >= maxScroll - 1);
    }

    // Инициализация всех слайдеров
    function initSliders() {
      $('.game-slider').each(function() {
        const $container = $(this);
        const $gallery = $container.find('.game-slider-gallery');
        const $forwardBtn = $container.find('.game-slider-right');
        const $backwardBtn = $container.find('.game-slider-left');
        // Инициализация кнопок


        if (!$gallery.length || !$forwardBtn.length || !$backwardBtn.length) {
          console.warn('Галерея или кнопки не найдены');
          return;
        }

        // Инициализация ширины слайдов
        setTimeout(function() {
          calculateSlideWidth($gallery);
        }, 100);

        // Обработчики кнопок
        $forwardBtn.off('click.slider').on('click.slider', function(e) {
          e.preventDefault();
          if ($gallery.is(':animated')) return;

          const scrollAmount = $gallery.data('scrollAmount') || 0;
          $gallery.animate({
            scrollLeft: $gallery.scrollLeft() + scrollAmount
          }, 300, function() {
            updateButtonState($gallery, $backwardBtn, $forwardBtn);
          });
        });

        $backwardBtn.off('click.slider').on('click.slider', function(e) {
          e.preventDefault();
          if ($gallery.is(':animated')) return;

          const scrollAmount = $gallery.data('scrollAmount') || 0;
          $gallery.animate({
            scrollLeft: $gallery.scrollLeft() - scrollAmount
          }, 300, function() {
            updateButtonState($gallery, $backwardBtn, $forwardBtn);
          });
        });

        // Обработчик скролла
        $gallery.off('scroll.slider').on('scroll.slider', function() {
          updateButtonState($gallery, $backwardBtn, $forwardBtn);
        });


      });
    }

    // Настройка отслеживания изменений размера
    function setupResizeObserver() {
      $('.game-slider-gallery').each(function() {
        const $gallery = $(this);
        let lastWidth = 0;

        const checkWidth = function() {
          const currentWidth = $gallery.width();
          if (Math.abs(currentWidth - lastWidth) > 5 && currentWidth > 0) {
            lastWidth = currentWidth;
            calculateSlideWidth($gallery);
          }
        };

        const interval = setInterval(checkWidth, 250);
        $gallery.one('remove', function() {
          clearInterval(interval);
        });
      });
    }

    $(window).on('load', function() {
      initSliders();
      setupResizeObserver();
    });
  </script>
<?php
}
?>