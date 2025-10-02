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
  <div class="game-slider" data-slider-id="<?php echo uniqid(); ?>">
    <div class="game-slider-header">
      <span class="game-slider-wrapper">
        <a class="game-slider-header-link" href="/ru/casino/group/recommended-slots?sort=popular">
          <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon " style="color: rgb(177, 186, 211) !important;">
            <title><?php echo htmlspecialchars($translations['trending_games'] ?? 'Trending Games'); ?></title>
            <path d="M12.265 47.728.21 14.605a3.574 3.574 0 0 1 2.108-4.552l.024-.008L21.624 3.03a3.55 3.55 0 0 1 4.553 2.082l.008.024.694 1.92L12.69 46.075a9 9 0 0 0-.418 1.598zM63.79 15.513 48.002 58.931a3.53 3.53 0 0 1-4.558 2.1l.024.009-21.948-8.001a3.58 3.58 0 0 1-2.124-4.585l-.008.024 15.787-43.39a3.555 3.555 0 0 1 4.559-2.126l-.024-.008 21.948 8a3.58 3.58 0 0 1 2.124 4.585l.008-.024zM50.457 32.687l-1.386-3.254a1.79 1.79 0 0 0-2.333-.956l.012-.005-2.666 1.175a1.787 1.787 0 0 1-2.316-.948l-.004-.012-1.146-2.667a1.764 1.764 0 0 0-2.332-.93l.012-.004-3.28 1.386a1.74 1.74 0 0 0-.929 2.33l-.004-.01 3.92 9.255a1.816 1.816 0 0 0 2.359.928l-.012.005 9.227-3.947a1.736 1.736 0 0 0 .794-2.356l.004.01z"></path>
          </svg>
          <span class="game-slider-header-title"><?php echo htmlspecialchars($translations['trending_games']); ?></span>
        </a>
      </span>
      <div class="game-slider-arrows">
        <button type="button" class="game-slider-arrow-button game-slider-backward" disabled>
          <div class="game-slider-arrow-inner">
            <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon ">
              <title><?php echo htmlspecialchars($translations['backward'] ?? 'Backward'); ?></title>
              <path d="M56 37.486H25.091L35.335 47.73l-6.313 6.314L8 33.022 29.022 12l6.313 6.314-10.244 10.244H56v8.933z"></path>
            </svg>
          </div>
        </button>
        <button type="button" class="game-slider-arrow-button game-slider-forward">
          <div class="game-slider-arrow-inner">
            <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon ">
              <title><?php echo htmlspecialchars($translations['forward'] ?? 'Forward'); ?></title>
              <path d="M8 37.486h30.909L28.665 47.73l6.313 6.314L56 33.022 34.978 12l-6.313 6.314 10.244 10.244H8v8.933z"></path>
            </svg>
          </div>
        </button>
      </div>
    </div>
    <div class="game-slider-gallery game-slider-scrollX game-slider-hide-scrollbar">
      <?php $counter = 1; ?>
      <?php foreach ($games as $game): ?>
        <div class="game-slider-slide">
          <div class="game-slider-wrap" data-analytics="slider-ru-trending-games-<?php echo htmlspecialchars($game['gameid']); ?>">
            <div class="game-slider-image-focus">
              <div class="game-slider-game-card-wrap">
                <a class="game-slider-game-link" href="/slot/<?php echo htmlspecialchars($game['name']); ?>">
                  <div class="game-slider-img-wrap">
                    <img class="game-slider-game-image" loading="lazy" src="<?php echo htmlspecialchars($game['iconurl2'] ?? $game['iconurl'] ?? $game['icon']); ?>" alt="<?php echo htmlspecialchars($game['name']); ?>">
                  </div>
                </a>
                <div class="game-slider-ribbon">
                  <div class="game-slider-index-ribbon"><?php echo $counter; ?></div>
                </div>
              </div>
              <div class="game-slider-stack">
                <span class="game-slider-player-count">
                  <span class="game-slider-player-indicator"></span>
                  <span>&nbsp;<span class="game-slider-player-number">123213</span> <?php echo htmlspecialchars($translations['players'] ?? 'Players'); ?></span>
                </span>
              </div>
            </div>
          </div>
        </div>
        <?php $counter++; ?>
      <?php endforeach; ?>
    </div>
  </div>

  <script>
    (function($) {
      'use strict';

      // Проверяем jQuery
      if (typeof $ === 'undefined') {
        console.error('jQuery не загружен');
        return;
      }



      // Функция расчета ширины слайдов
      function calculateSlideWidth($gallery) {


        const totalWidth = $gallery.width();


        if (totalWidth <= 0) {

          return;
        }

        const slideWidthPx = 140;
        const promowidthPx = 390;
        const countSlide = Math.max(1, Math.floor(totalWidth / slideWidthPx));
        const countPromo = Math.max(1, Math.floor(totalWidth / promowidthPx));
        const promoWidthPercent = 100 / countPromo;
        const slideWidthPercent = 100 / countSlide;
        const $container = $gallery.closest('.game-slider');

        const $forwardBtn = $container.find('.game-slider-forward');
        const $backwardBtn = $container.find('.game-slider-backward');

        $('.hero-content-main').css({
          'grid-auto-columns': `calc(${promoWidthPercent}% - 16px)`
        })
        $gallery.css({
          'grid-auto-columns': `calc(${slideWidthPercent}% - 10px)`
        });
        updateButtonState($gallery, $backwardBtn, $forwardBtn);
      }

      function updateButtonState($gallery, $backwardBtn, $forwardBtn) {
        const maxScroll = $gallery[0].scrollWidth - $gallery[0].clientWidth;
        const currentScroll = $gallery.scrollLeft();

        $backwardBtn.prop('disabled', currentScroll <= 0);
        $forwardBtn.prop('disabled', currentScroll >= maxScroll - 1);
      }

      // Инициализация всех слайдеров
      function initSliders() {
        console.log('Инициализация слайдеров');

        $('.game-slider').each(function() {
          const $container = $(this);
          const $gallery = $container.find('.game-slider-gallery');
          const $forwardBtn = $container.find('.game-slider-forward');
          const $backwardBtn = $container.find('.game-slider-backward');

          console.log('Найдены элементы:', {
            container: $container.length,
            gallery: $gallery.length,
            forward: $forwardBtn.length,
            backward: $backwardBtn.length
          });

          if (!$gallery.length) {
            console.warn('Галерея не найдена');
            return;
          }

          // Расчет ширины слайдов
          setTimeout(function() {
            calculateSlideWidth($gallery);
          }, 100);

          // Обработчики кнопок
          $forwardBtn.off('click.slider').on('click.slider', function(e) {
            e.preventDefault();
            console.log('Клик вперед');

            if ($gallery.is(':animated')) return;

            $gallery.animate({
              scrollLeft: $gallery.scrollLeft() + 180
            }, 300, function() {
              updateButtonState($gallery, $backwardBtn, $forwardBtn);
            });
          });

          $backwardBtn.off('click.slider').on('click.slider', function(e) {
            e.preventDefault();
            console.log('Клик назад');

            if ($gallery.is(':animated')) return;

            $gallery.animate({
              scrollLeft: $gallery.scrollLeft() - 180
            }, 300, function() {
              updateButtonState($gallery, $backwardBtn, $forwardBtn);
            });
          });

          // Обработчик скролла
          $gallery.off('scroll.slider').on('scroll.slider', function() {
            updateButtonState($gallery, $backwardBtn, $forwardBtn);
          });

          // Инициализация кнопок
          setTimeout(function() {
            updateButtonState($gallery, $backwardBtn, $forwardBtn);
          }, 200);
        });
      }

      // Простой способ отслеживания изменений ширины
      let resizeTimer;

      function setupResizeObserver() {
        // Для каждого слайдера
        $('.game-slider-gallery').each(function(index) {
          const $gallery = $(this);
          let lastWidth = 0;

          // Проверяем ширину каждые 250ms
          const checkWidth = function() {
            const currentWidth = $gallery.width();
            if (Math.abs(currentWidth - lastWidth) > 5 && currentWidth > 0) { // Изменилась ширина более чем на 5px
              lastWidth = currentWidth;
              calculateSlideWidth($gallery);
            }
          };

          // Интервал для этого слайдера
          const interval = setInterval(checkWidth, 250);

          // Останавливаем при удалении
          $gallery.one('remove', function() {
            clearInterval(interval);
          });
        });





      }

      // Запуск
      $(document).ready(function() {


        // Небольшая задержка для полной загрузки
        setTimeout(function() {
          initSliders();
          setupResizeObserver();
        }, 200);
      });



    })(jQuery);
  </script>


<?php
}
?>