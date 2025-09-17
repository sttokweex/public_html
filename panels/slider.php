<?php
function render_slider($games, $hasMargin, $translations)
{
?>
  <div class="game-slider<?php echo $hasMargin ? ' home-has-margin' : ''; ?>">
    <div class="game-slider-header">


      <div class="game-slider-header-title"><?php echo $translations['trending_games']; ?></div>
      <a class="game-slider-header-link"> Больше игр</a>


      <button class="game-slider-left"></button>
      <button class="game-slider-right"></button>
    </div>
    <div class="game-slider-gallery game-slider-scrollX game-slider-hide-scrollbar">

      <?php foreach ($games as $game): ?>
        <div class="game-slider-slide">
          <div class="game-slider-wrap" data-analytics="slider-ru-trending-games-<?php echo htmlspecialchars($game['g_id']); ?>">
            <div class="game-slider-game-card-wrap">
              <a class="game-slider-game-link" href="/slot/<?php echo htmlspecialchars(str_replace(' ', '_', $game['g_title'])); ?>">
                <img id="" class="game-slider-game-image" src="../images/SlotsPreviews/<?php echo htmlspecialchars(str_replace('_', '', $game['g_title'])); ?>.jpg">
              </a>
            </div>
          </div>
        </div>

      <?php endforeach; ?>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      // Проверяем, загружен ли jQuery
      if (typeof jQuery === 'undefined') {
        console.error('<?php echo htmlspecialchars($translations['jquery_error'] ?? 'jQuery is not loaded. Include jQuery before this script.'); ?>');
        return;
      }

      // Ищем каждый контейнер слайдера
      $('.game-slider').each(function(index) {
        const $container = $(this);
        const $gallery = $container.find('.game-slider-gallery');
        const $forwardBtn = $container.find('.game-slider-right');
        const $backwardBtn = $container.find('.game-slider-left');
        let isAnimating = false; // Флаг для блокировки анимации

        // Проверяем наличие всех элементов
        if (!$gallery.length || !$forwardBtn.length || !$backwardBtn.length) {
          return; // Пропускаем этот слайдер
        }

        // Рассчитываем количество видимых карточек
        const cardWidth = $container.find('.game-slider-game-card-wrap')[0].clientWidth;
        const galleryWidth = $gallery[0].clientWidth; // Ширина видимой области галереи
        const visibleCards = Math.floor(galleryWidth / cardWidth); // Количество видимых карточек
        const scrollAmount = (visibleCards + 1) * cardWidth; // Расстояние прокрутки

        // Обработчик для кнопки "Вперед"
        $forwardBtn.on('click', function() {
          if (isAnimating) return; // Игнорируем клик, если анимация выполняется
          isAnimating = true; // Устанавливаем флаг

          $gallery.stop(true).animate({
            scrollLeft: $gallery.scrollLeft() + scrollAmount
          }, 50, function() {
            isAnimating = false; // Снимаем флаг после завершения анимации
            updateButtonState();
          });
        });

        // Обработчик для кнопки "Назад"
        $backwardBtn.on('click', function() {
          if (isAnimating) return; // Игнорируем клик, если анимация выполняется
          isAnimating = true; // Устанавливаем флаг

          $gallery.stop(true).animate({
            scrollLeft: $gallery.scrollLeft() - scrollAmount
          }, 50, function() {
            isAnimating = false; // Снимаем флаг после завершения анимации
            updateButtonState();
          });
        });

        // Функция обновления состояния кнопок
        function updateButtonState() {
          const maxScroll = $gallery[0].scrollWidth - $gallery[0].clientWidth;
          const currentScroll = $gallery.scrollLeft();

          $backwardBtn.prop('disabled', currentScroll <= 0);
          $forwardBtn.prop('disabled', currentScroll >= maxScroll - 1);
        }

        // Инициализация состояния кнопок
        updateButtonState();
        // Обновление состояния при прокрутке
        $gallery.on('scroll', updateButtonState);
      });
    });
  </script>
<?php
}
?>