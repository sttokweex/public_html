<?php
function render_slider($games, $hasMargin, $translations, $type)
{
  // Определяем текст и иконку в зависимости от $type
  $userAgent = $_SERVER['HTTP_USER_AGENT'];
  $isSafari = false;
  if (strpos($userAgent, 'Safari') !== false && strpos($userAgent, 'Chrome') === false) {
    // Обнаружен Safari (не Chrome)
    $isSafari = true;
  }
  if ($type === "ourGames") {
    $text = $translations['new_releases'];
    $icon = '<svg data-ds-icon="New" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
                    <path fill="currentColor" d="M22 12c-7.8 1.21-8.79 2.2-10 10-1.21-7.8-2.2-8.79-10-10 7.8-1.21 8.79-2.2 10-10 1.21 7.8 2.2 8.79 10 10m2-7c-3.12.48-3.52.88-4 4-.48-3.12-.88-3.52-4-4 3.12-.48 3.52-.88 4-4 .48 3.12.88 3.52 4 4M8 19c-3.12.48-3.52.88-4 4-.48-3.12-.88-3.52-4-4 3.12-.48 3.52-.88 4-4 .48 3.12.88 3.52 4 4"></path>
                </svg>';
    $games = array_filter($games, function ($game) {
      return isset($game['vendorid']) && $game['vendorid'] === 'Pragmatic play custom';
    });
    $groupSlug = 'new-releases';
  } elseif ($type === 'sugar') {
    $icon = '<img src="/images/sidebar/icons/sugar-rush.png" class="svg-icon gif-icon">';
    $text = "Sugar Rush";
    $games = array_filter($games, function ($game) {
      $search_terms = ['sugar_rush'];
      $game_name = strtolower($game['name']);
      foreach ($search_terms as $term) {
        if (stripos($game_name, $term) !== false) {
          return true;
        }
      }
      return false;
    });
    $groupSlug = 'popular-sugar';
  } elseif ($type === 'zews') {
    $icon = '<img src="/images/sidebar/icons/best.gif" class="svg-icon gif-icon">';
    $text = "Gates of Olympus";
    $games = array_filter($games, function ($game) {
      $search_terms = ['gates_of_olympus'];
      $game_name = strtolower($game['name']);
      foreach ($search_terms as $term) {
        if (stripos($game_name, $term) !== false) {
          return true;
        }
      }
      return false;
    });
    $groupSlug = 'popular-zews';
  } elseif ($type === 'sweet') {
    $icon = '<img src="/images/sidebar/icons/sweet.gif" class="svg-icon gif-icon">';
    $text = "Sweet Bonanza";
    $games = array_filter($games, function ($game) {
      $search_terms = ['sweet_bonanza'];
      $game_name = strtolower($game['name']);
      foreach ($search_terms as $term) {
        if (stripos($game_name, $term) !== false) {
          return true;
        }
      }
      return false;
    });
    $groupSlug = 'popular-fruits';
  } elseif ($type === 'dogs') {
    $icon = '<img src="/images/sidebar/icons/dog-house.gif" class="svg-icon gif-icon">';
    $text = "The Dog House";
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
    $groupSlug = 'popular-dogs';
  } else {
    $icon = '<svg data-ds-icon="Slots" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0" style="color: var(--color-grey-200) !important;"><!----><path fill="currentColor" d="M7.62 10.61a20 20 0 0 0-1.45 3.96 7.5 7.5 0 0 0 0 3.59l.18.75-4.07 1A9.47 9.47 0 0 1 3 13.43l-3 .71v-2.92l7.34-1.76zM24 11.72l-.23 1.16a21.4 21.4 0 0 0-2.97 2.95 7.64 7.64 0 0 0-1.5 3.26l-.15.75-4.15-.76a9.53 9.53 0 0 1 3.34-5.57l-3-.59 1.26-2.66z"></path><path fill="currentColor" d="M18 6.03a33.5 33.5 0 0 0-3.8 5.74 12.44 12.44 0 0 0-1.4 5.7v1.25H8.08a13.9 13.9 0 0 1 1.25-5.69 21.7 21.7 0 0 1 3.37-5.28h-7V4.09H18z"></path></svg>'; // Можно задать иконку по умолчанию, если нужно
    $text = $translations['slots'];
    $groupSlug = 'all-slots';
    // Игры не фильтруются, используются все
  }

?>
  <div class="game-slider" data-slider-id="<?php echo $text ?>">
    <div class="game-slider-header">
      <span class="game-slider-wrapper">
        <a class="game-slider-header-link" href="/group/<?php echo htmlspecialchars($groupSlug); ?>">
          <? echo ($icon) ?>
          <span class="game-slider-header-title"><?php echo htmlspecialchars($text) ?></span>
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
        <?php


        ?>

        <div class="game-slider-slide">
          <div class="game-slider-wrap" data-analytics="slider-ru-trending-games-<?php echo htmlspecialchars($game['gameid']); ?>">
            <div class="game-slider-image-focus">
              <div class="game-slider-game-card-wrap">
                <a class="game-slider-game-link" href="/slot/<?php echo htmlspecialchars($game['name']); ?>">
                  <div class="game-slider-img-wrap">
                    <img class="game-slider-game-image" <?php if (!$isSafari): ?>
                      loading="lazy"
                      <?php endif; ?> src="<?php echo htmlspecialchars($game['iconurl2'] ?? $game['iconurl'] ?? $game['icon']); ?>" alt="<?php echo htmlspecialchars($game['name']); ?>">
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

        const slideWidthPx = 200;
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

        $('.game-slider').each(function() {
          const $container = $(this);
          const $gallery = $container.find('.game-slider-gallery');
          const $forwardBtn = $container.find('.game-slider-forward');
          const $backwardBtn = $container.find('.game-slider-backward');



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