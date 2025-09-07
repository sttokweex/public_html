<?php
function renderSearch($games, $translations)
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
        <input data-testid="search" placeholder="<?php echo $translations['find_game'] ?>">
        <div class="cross-icon ">
          <button type="button" tabindex="0" class="search-close-button">
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

      // Process each search container independently
      $('.home-search-wrap').each(function() {
        var $container = $(this);
        var $searchInput = $container.find('input[data-testid="search"]');
        var $searchOverlay = $container.find('.home-search-overlay');
        var $searchResults = $container.find('.search-results');
        var $crossButton = $container.find('.cross-icon button');

        if (!$searchInput.length || !$searchOverlay.length || !$searchResults.length) {
          console.error('Не найдены элементы поиска в контейнере:', $container);
          return;
        }

        const games = <?php echo json_encode($games); ?>;

        $searchInput.on('focus', function() {
          $searchOverlay.fadeIn(300);
          $('html, body').addClass('no-scroll');
          $crossButton.addClass('is-open')
        });

        $searchInput.on('blur', function() {
          // Optional: Add any blur-specific logic here
        });

        $searchOverlay.on('click', function(e) {
          $searchResults.removeClass('active');
          $searchOverlay.fadeOut(300);
          $('html, body').removeClass('no-scroll');
          $('.header-search').removeClass('is-open');
          $searchResults.empty();
          $('.search-close-button')
          $crossButton.removeClass('is-open')
        });

        // Prevent clicks on search results from bubbling up
        $searchResults.on('click', function(e) {
          e.stopPropagation();
        });

        // Handle search result link clicks
        $searchResults.on('click', 'a.search-result-item', function(e) {
          e.stopPropagation();
          var href = $(this).attr('href');
          console.log('Переход по ссылке:', href);
          window.location.href = href;
        });

        $searchOverlay.on('touchmove', function(e) {
          $searchResults.removeClass('active');
          e.preventDefault();
        });

        // Close on Escape key
        $(document).on('keydown', function(e) {
          if (e.key === 'Escape' && $searchInput.is(':focus')) {
            $searchResults.removeClass('active');
            $searchOverlay.fadeOut(300);
            $('html, body').removeClass('no-scroll');
            $('.header-search').removeClass('is-open');
            $searchResults.empty();
            $crossButton.removeClass('is-open')
          }
        });

        // Handle search input
        $searchInput.on('input', function() {
          var query = $(this).val().trim().toLowerCase();
          $searchResults.empty();

          if (query.length === 0) {
            $searchResults.removeClass('active');
            return;
          }

          $searchResults.addClass('active');
          var filteredGames = games.filter(function(game) {
            return game.g_title && game.g_title.replace("_", ' ').toLowerCase().includes(query);
          });

          if (filteredGames.length > 0) {
            filteredGames.forEach(function(game) {
              var $resultItem = $('<a>')
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
            $searchResults.append('<div class="search-result-item no-results"><? echo $translations['games_not_found']?></div>');
          }
        });

        // Clear search input
        $crossButton.on('click', function(e) {
          $searchResults.removeClass('active');
          $searchOverlay.fadeOut(300);
          $('.home-input-wrap').blur();

          $('html, body').removeClass('no-scroll');
          $('.header-search').removeClass('is-open');
          $searchResults.empty();
          $crossButton.removeClass('is-open')
        });

        // Integrate with .open-search button
        $container.find('.open-search').on('click', function(e) {
          e.stopPropagation();
          var $search = $container.find('.header-search');
          $search.toggleClass('closed');
          if (!$search.hasClass('closed')) {
            $searchInput.focus();
          }
        });
      });
    });
  </script>
<?php
}
?>