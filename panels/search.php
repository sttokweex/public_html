<?php
function renderSearch($games)
{
?>
  <div class="home-search-wrap">
    <div role="button" class="home-search-overlay" tabindex="0" style="z-index: 1449; display: none;">
      <div class="home-search-overlay-top"></div>
      <div class="home-search-overlay-main">
        <div class="search-results"></div> <!-- Контейнер для результатов поиска -->
      </div>
    </div>
    <div class="home-search-wrap-inner">
      <div class="home-input-wrap">
        <div class="home-search-icon">
          <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon">
            <title></title>
            <path d="M63.999 56.219 56.217 64 38.55 46.328a28 28 0 0 0 7.777-7.777zM23.1 0a23.1 23.1 0 1 1-.003 46.2A23.1 23.1 0 0 1 23.1 0m5.317 10.258a13.9 13.9 0 0 0-8.032-.79 13.9 13.9 0 0 0-7.117 3.802 13.9 13.9 0 0 0-3.8 7.117 13.9 13.9 0 0 0 .789 8.031 13.903 13.903 0 0 0 22.672 4.512 13.9 13.9 0 0 0-4.512-22.672"></path>
          </svg>
        </div>
        <input data-testid="search" placeholder="Найдите свою игру">
        <div class="cross-icon svelte-prg7fh"><!----><!----><button type="button" tabindex="0" class="inline-flex relative items-center gap-2 justify-center rounded-(--ds-radius-md,0.25rem) font-semibold whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:text-white focus-visible:outline-hidden text-sm leading-none" data-button-root=""><!----><!----><svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon " style="">
              <title></title>
              <path d="M56 15.374 48.626 8 32 24.626 15.374 8 8 15.374 24.626 32 8 48.626 15.374 56 32 39.374 48.626 56 56 48.626 39.374 32z"></path><!---->
            </svg></button><!----></div>
      </div>

    </div>
  </div>

  <script>
    $(document).ready(function() {
      // Проверяем, загружен ли jQuery
      if (typeof jQuery === 'undefined') {
        console.error('jQuery не загружен. Подключите jQuery перед этим скриптом.');
        return;
      }

      // Находим элементы
      const $searchInput = $('input[data-testid="search"]');
      const $searchOverlay = $('.home-search-overlay');
      const $searchResults = $('.search-results');

      // Проверяем наличие элементов
      if (!$searchInput.length || !$searchOverlay.length || !$searchResults.length) {

        return;
      }

      // Передаём массив игр из PHP в JavaScript
      const games = <?php echo json_encode($games); ?>;
      console.log(games)
      // Сохраняем позицию прокрутки
      let scrollPosition = 0;

      // Показываем оверлей и блокируем скролл при фокусе
      $searchInput.on('focus', function() {

        scrollPosition = $(window).scrollTop();
        $searchOverlay.fadeIn(300);
        $('html, body').addClass('no-scroll');
      });

      // Скрываем оверлей и разрешаем скролл при потере фокуса
      $searchInput.on('blur', function() {

        $searchOverlay.fadeOut(300);
        $('html, body').removeClass('no-scroll');
        $(window).scrollTop(scrollPosition);
        $searchResults.empty(); // Очищаем результаты при закрытии
      });

      // Закрытие оверлея при клике на него
      $searchOverlay.on('click', function(e) {
        if (e.target === this) { // Только если клик по самому оверлею

          $searchInput.blur();
        }
      });

      // Запрещаем прокрутку на сенсорных устройствах
      $searchOverlay.on('touchmove', function(e) {
        e.preventDefault();

      });

      // Закрытие по клавише Esc
      $(document).on('keydown', function(e) {
        if (e.key === 'Escape' && $searchInput.is(':focus')) {

          $searchInput.blur();
        }
      });

      // Поиск игр при вводе текста
      $searchInput.on('input', function() {
        const query = $(this).val().trim().toLowerCase();


        // Очищаем результаты
        $searchResults.empty();

        if (query.length === 0) {
          return; // Ничего не показываем, если запрос пустой
        }

        // Фильтруем игры по g_title
        const filteredGames = games.filter(function(game) {
          return game.g_title && game.g_title.replace("_", ' ').toLowerCase().includes(query);
        });



        // Выводим результаты
        if (filteredGames.length > 0) {
          filteredGames.forEach(function(game) {
            const $resultItem = $('<div>').addClass('search-result-item').text(game.g_title.replaceAll("_", ' '));
            $searchResults.append($resultItem);
          });
        } else {
          $searchResults.append('<div class="search-result-item no-results">Игры не найдены</div>');
        }
      });
    });
  </script>
<?php
}
?>