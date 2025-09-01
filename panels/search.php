<?php
function renderSearch($games)
{
?>
  <div class="home-search-wrap">
    <div role="button" class="home-search-overlay" tabindex="0" style="z-index: 1449; display: none;">
      <div class="home-search-overlay-top"></div>
      <div class="home-search-overlay-main"></div>
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
        <div class="cross-icon svelte-prg7fh">
          <button type="button" tabindex="0" class="inline-flex relative items-center gap-2 justify-center rounded-(--ds-radius-md,0.25rem) font-semibold whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:text-white focus-visible:outline-hidden text-sm leading-none">
            <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon">
              <title></title>
              <path d="M56 15.374 48.626 8 32 24.626 15.374 8 8 15.374 24.626 32 8 48.626 15.374 56 32 39.374 48.626 56 56 48.626 39.374 32z"></path>
            </svg>
          </button>
        </div>
        <div class="search-results"></div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      if (typeof jQuery === 'undefined') {
        console.error('jQuery не загружен. Подключите jQuery перед этим скриптом.');
        return;
      }

      const $searchInput = $('input[data-testid="search"]');
      const $searchOverlay = $('.home-search-overlay');
      const $searchResults = $('.search-results');

      if (!$searchInput.length || !$searchOverlay.length || !$searchResults.length) {
        console.error('Не найдены элементы поиска');
        return;
      }

      const games = <?php echo json_encode($games); ?>;


      $searchInput.on('focus', function() {

        $searchOverlay.fadeIn(300);
        $('html, body').addClass('no-scroll');
      });

      $searchInput.on('blur', function() {
        $searchOverlay.fadeOut(300);
        $('html, body').removeClass('no-scroll');
        $(window).scrollTop(scrollPosition);
        $searchResults.empty();
      });

      $searchOverlay.on('click', function(e) {
        $searchResults.removeClass('active');
        if (e.target === this) {
          $searchInput.blur();
        }
      });

      // Предотвращаем всплытие кликов на результаты поиска
      $searchResults.on('click', function(e) {
        e.stopPropagation();
      });

      // Явно обрабатываем клик по ссылке для отладки
      $searchResults.on('click', 'a.search-result-item', function(e) {
        e.stopPropagation(); // Останавливаем всплытие
        const href = $(this).attr('href');
        console.log('Клик по ссылке:', href); // Отладка
        // Стандартное поведение ссылки должно сработать, но можем принудительно перенаправить
        window.location.href = href; // Принудительное перенаправление
      });

      $searchOverlay.on('touchmove', function(e) {
        $searchResults.removeClass('active');
        e.preventDefault();
      });

      $(document).on('keydown', function(e) {
        if (e.key === 'Escape' && $searchInput.is(':focus')) {
          $searchResults.removeClass('active');
          $searchInput.blur();
        }
      });

      $searchInput.on('input', function() {
        const query = $(this).val().trim().toLowerCase();
        $searchResults.empty();

        if (query.length === 0) {
          $searchResults.removeClass('active');
          return;
        }

        $searchResults.addClass('active');
        const filteredGames = games.filter(function(game) {
          return game.g_title && game.g_title.replace("_", ' ').toLowerCase().includes(query);
        });

        if (filteredGames.length > 0) {
          filteredGames.forEach(function(game) {
            const $resultItem = $('<a>')
              .attr('href', `/slot/${encodeURIComponent(game.g_title)}`)
              .addClass('search-result-item')
              .append(
                $('<img>').attr('src', `../images/SlotsPreviews/${game.g_title.replaceAll("_","")}.png`).attr('alt', game.g_title),
                $('<span>').text(game.g_title.replaceAll('_', ' '))
              );
            console.log('Добавлена ссылка:', $resultItem.attr('href'));
            $searchResults.append($resultItem);
          });
        } else {
          $searchResults.append('<div class="search-result-item no-results">Игры не найдены</div>');
        }
      });

      $('.cross-icon button').on('click', function(e) {
        e.stopPropagation();
        $searchInput.val('').trigger('input').blur();
      });
    });
  </script>
<?php
}
?>