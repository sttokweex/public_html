<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

// Define sidebar items using translation keys
$sidebar_items = [
  'all-slots',
  'popular',
  'promotions',
  'stats',
];

// Mapping of translation keys to English-based image names
$image_map = [
  'all-slots' => 'casino',
  'popular' => 'livecasino',
  'promotions' => 'promotions',
  'stats' => 'leaderboards',
];
?>
<div id="side-menus" class="SideMenus__menus--38M" style="top: 64px;">
  <div id="mobile-nav">
    <div class="Sidebar__container--2Ro">
      <div class="Overlay__overlay--13G Sidebar__overlay--uHV" style="opacity: 1;">
        <div class="Overlay__overlay--1hJ "></div>
      </div>
      <div class="Sidebar__sidebar--3j1 Sidebar__left--1qg Sidebar__sidebar--1pz Sidebar__dark--Ga_" style="transform: translate3d(0%, 0px, 0px);">
        <div class="Sidebar__sidebarContent--Jmu">
          <div class="SidebarContent__sidebarContent--1YE">
            <div class="GamesSearch__active--3Df">
              <div class="GridRow__colsRow--JL1 GamesSearch__gridRow--1xF">
                <div class="col-mob-4 col-dsk-2"></div>
                <div class="col-mob-4 col-dsk-8">
                  <div class="GamesSearch__inputWrapper--1s1">
                    <div class="GamesSearch__inputContainer--1pZ">
                      <input class="components__input--2w4 GamesSearch__input--AJm" placeholder="<?= $translations['search_for_games'] ?>" value="">
                      <span class="GamesSearch__inputIconContainer--2mR">
                        <span class="Icon__icon--x96 Icon__search--1AY Icon__medium--DLa Icon__isRound--3vi GamesSearch__icon--1P6 undefined" role="img" aria-label="icon_search"></span>
                      </span>
                    </div>
                  </div>
                </div>

              </div>
              <!-- Added Search Results Container -->
              <div class="SearchResults__list--1aE SearchResults__shown--3yB" style="opacity: 0;">
                <ul class="col-mob-4 col-dsk-8"></ul>
              </div>
            </div>
            <div class="Tabs__tabs--o9x Tabs__dark--1zL">
              <p class="PlainText__text--1wg PlainText__medium--1_S Tabs__tab--2rN Tabs__active--1K8 Tabs__tabs-width-3--2Kz PlainText__dark--3fd">
                <span class="Icon__icon--x96 Icon__slots--mAl Icon__large--2F8 Icon__active--1EL" role="img" aria-label="icon_slots"></span>
                <span class="Tabs__text--2uU"><?= $translations['slots'] ?></span>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S Tabs__tab--2rN Tabs__tabs-width-3--2Kz PlainText__dark--3fd">
                <span class="Icon__icon--x96 Icon__multiple-users--1L0 Icon__large--2F8" role="img" aria-label="icon_multiple-users"></span>
                <span class="Tabs__text--2uU"><?= $translations['about_us'] ?></span>
              </p>
              <!-- <p class="PlainText__text--1wg PlainText__medium--1_S Tabs__tab--2rN Tabs__tabs-width-3--2Kz PlainText__dark--3fd">
                <span class="Icon__icon--x96 Icon__responsible-gaming--2Gl Icon__large--2F8" role="img" aria-label="icon_responsible-gaming"></span>
                <span class="Tabs__text--2uU"><?= $translations['play_responsibly'] ?></span>
              </p> -->
            </div>
            <div class="SlidingPane__panel--3DT SlidingMenu__slidingPanel--2AQ SidebarContent__slidingMenu--2dQ">
              <div class="SlidingPane__sliding--3Sw" style="transform: translate3d(0%, 0px, 0px);">
                <a class="PlainText__text--1wg PlainText__medium--1_S Link__link--3vh MenuItem__item--1ED MenuItem__dark--gB7 PlainText__dark--3fd" href="/slot/The_Dog_House">
                  <span class="MenuItem__itemTitle--1dC">The Dog House</span>
                </a>
                <a class="PlainText__text--1wg PlainText__medium--1_S Link__link--3vh MenuItem__item--1ED MenuItem__dark--gB7 PlainText__dark--3fd" href="/slot/Sweet_Bonanza">
                  <span class="MenuItem__itemTitle--1dC">Sweet Bonanza</span>
                </a>
                <a class="PlainText__text--1wg PlainText__medium--1_S Link__link--3vh MenuItem__item--1ED MenuItem__dark--gB7 PlainText__dark--3fd" href="/slot/Gates_of_Olympus">
                  <span class="MenuItem__itemTitle--1dC">Gates of Olympus</span>
                </a>
                <a class="PlainText__text--1wg PlainText__medium--1_S Link__link--3vh MenuItem__item--1ED MenuItem__dark--gB7 PlainText__dark--3fd" href="/slot/Sugar_Rush">
                  <span class="MenuItem__itemTitle--1dC">Sugar Rush</span>
                </a>
              </div>
              <div class="SlidingPane__sliding--3Sw" style="transform: translate3d(0%, 0px, 0px);">
                <a class="PlainText__text--1wg PlainText__medium--1_S Link__link--3vh MenuItem__item--1ED MenuItem__dark--gB7 PlainText__dark--3fd" href="https://t.me/splitsupports" target="_self">
                  <span class="MenuItem__itemTitle--1dC"><?= $translations['about_us'] ?></span>
                </a>
                <a class="PlainText__text--1wg PlainText__medium--1_S Link__link--3vh MenuItem__item--1ED MenuItem__dark--gB7 PlainText__dark--3fd" href="https://t.me/splitsupports" target="_self">
                  <span class="MenuItem__itemTitle--1dC"><?= $translations['contact_us'] ?></span>
                </a>
              </div>
              <!-- <div class="SlidingPane__sliding--3Sw" style="transform: translate3d(0%, 0px, 0px);">
                <a class="PlainText__text--1wg PlainText__medium--1_S Link__link--3vh MenuItem__item--1ED MenuItem__dark--gB7 PlainText__dark--3fd" href="/en/online/veilig-en-verantwoord-spelen/overzicht" target="_self">
                  <span class="MenuItem__itemTitle--1dC"><?= $translations['overview'] ?></span>
                </a>
                <a class="PlainText__text--1wg PlainText__medium--1_S Link__link--3vh MenuItem__item--1ED MenuItem__dark--gB7 PlainText__dark--3fd" href="/en/online/veilig-en-verantwoord-spelen/preventiebeleid-kansspelen" target="_self">
                  <span class="MenuItem__itemTitle--1dC"><?= $translations['prevention_policy'] ?></span>
                </a>
                <a class="PlainText__text--1wg PlainText__medium--1_S Link__link--3vh MenuItem__item--1ED MenuItem__dark--gB7 PlainText__dark--3fd" href="/en/online/veilig-en-verantwoord-spelen/spelrisico" target="_self">
                  <span class="MenuItem__itemTitle--1dC"><?= $translations['gaming_risks'] ?></span>
                </a>
                <a class="PlainText__text--1wg PlainText__medium--1_S Link__link--3vh MenuItem__item--1ED MenuItem__dark--gB7 PlainText__dark--3fd" href="/en/online/veilig-en-verantwoord-spelen/verantwoord-speelgedrag" target="_self">
                  <span class="MenuItem__itemTitle--1dC"><?= $translations['game_tips_tools'] ?></span>
                </a>
                <a class="PlainText__text--1wg PlainText__medium--1_S Link__link--3vh MenuItem__item--1ED MenuItem__dark--gB7 PlainText__dark--3fd" href="/en/online/veilig-en-verantwoord-spelen/hulpverlening" target="_self">
                  <span class="MenuItem__itemTitle--1dC"><?= $translations['assistance'] ?></span>
                </a>
                <a class="PlainText__text--1wg PlainText__medium--1_S Link__link--3vh MenuItem__item--1ED MenuItem__dark--gB7 PlainText__dark--3fd" href="/en/online/veilig-en-verantwoord-spelen/ouderlijk-toezicht" target="_self">
                  <span class="MenuItem__itemTitle--1dC"><?= $translations['parental_control'] ?></span>
                </a>
                <a class="PlainText__text--1wg PlainText__medium--1_S Link__link--3vh MenuItem__item--1ED MenuItem__dark--gB7 PlainText__dark--3fd" href="/en/online/veilig-en-verantwoord-spelen/zelftest" target="_self">
                  <span class="MenuItem__itemTitle--1dC"><?= $translations['self_assessment_test'] ?></span>
                </a>
                <a class="PlainText__text--1wg PlainText__medium--1_S Link__link--3vh MenuItem__item--1ED MenuItem__dark--gB7 PlainText__dark--3fd" href="/en/online/veilig-en-verantwoord-spelen/jongvolwassenen" target="_self">
                  <span class="MenuItem__itemTitle--1dC"><?= $translations['young_adults'] ?></span>
                </a>
                <a class="PlainText__text--1wg PlainText__medium--1_S Link__link--3vh MenuItem__item--1ED MenuItem__dark--gB7 PlainText__dark--3fd" href="/en/stortingslimieten-faq" target="_self">
                  <span class="MenuItem__itemTitle--1dC"><?= $translations['deposit_limits_faq'] ?></span>
                </a>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<section class="sidebar">
  <div class="sidebar-content">
    <?php foreach ($sidebar_items as $item): ?>
      <div style="opacity: 1; margin-left: 0rem;" class="sidebar-item-outer">
        <div class="sidebar-item">
          <a href="<?php
                    if ($item == 'all-slots') {
                      echo '/categories/all-slots';
                    } elseif ($item == 'popular') {
                      echo '/categories/popular';
                    } elseif ($item == 'promotions') {
                      echo '/bonus';
                    } else {
                      echo '/stats';
                    }
                    ?>">
            <span class="sidebar-item-image icon-x96">
              <img src="../images/<?php echo htmlspecialchars($image_map[$item]); ?>-inactive.svg" data-active-src="../images/<?php echo htmlspecialchars($image_map[$item]); ?>-active.svg" alt="icon" loading="lazy">
            </span>
            <span class="sidebar-item-text"><?= htmlspecialchars($translations[$item]) ?></span>
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<script>
  $(document).ready(function() {
    // Pass PHP games array to JavaScript (ensure this is available from the header)
    const games = <?php echo json_encode($games); ?>;

    // Sidebar search input handler
    $('#side-menus .GamesSearch__input--AJm').on('input', function() {
      const query = $(this).val().trim().toLowerCase();
      const $resultsList = $('#side-menus .SearchResults__list--1aE ul');
      const $searchContainer = $('#side-menus .GamesSearch__active--3Df');
      const $tabs = $('#side-menus .Tabs__tabs--o9x');
      const $slidingMenu = $('#side-menus .SlidingMenu__slidingPanel--2AQ');

      $resultsList.empty(); // Clear previous results

      if (query === '') {
        $('#side-menus .SearchResults__list--1aE').css({
          'opacity': '0',
          'display': 'none'
        });
        $tabs.css('opacity', '1');
        $slidingMenu.css('opacity', '1');
        return;
      }

      // Filter games
      const filteredGames = games.filter(game =>
        game.name &&
        game.name.toLowerCase().replace(/_/g, ' ').includes(query)
      );

      // Render results
      if (filteredGames.length > 0) {
        $('#side-menus .SearchResults__list--1aE').css({
          'opacity': '1',
          'display': 'block'
        });
        $tabs.css('opacity', '0'); // Hide tabs during search
        $slidingMenu.css('opacity', '0'); // Hide sliding menu during search
        filteredGames.forEach(game => {
          // Prepare display title by replacing underscores with spaces
          const displayTitle = game.name.replace(/_/g, ' ');
          // Escape query for regex to prevent errors with special characters
          const escapedQuery = query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
          const regex = new RegExp(`(${escapedQuery})`, 'gi');
          const highlightedTitle = displayTitle.replace(regex, '<span class="GamesSearch__searchQuery--gUs">$1</span>');
          const $listItem = $(`
          <li class="GameItem__item--20s" data-game-id="${game.name}">
            <img alt="${game.name}" draggable="false" class="Image__image--2Bt SearchResults__image--3DV" src="${game.iconurl}" loading="lazy">
            <span class="SearchResults__gameName--1fp">${highlightedTitle}</span>
          </li>
        `);
          // Add click event to redirect to game page and close sidebar
          $listItem.on('click', function() {
            window.location.href = `/slot/${game.name}`;
            // Close sidebar
            $('.Icon__close-medium--2c4').trigger('click');
          });
          $resultsList.append($listItem);
        });
      } else {
        $('#side-menus .SearchResults__list--1aE').css({
          'opacity': '0',
          'display': 'none'
        });
        $tabs.css('opacity', '1');
        $slidingMenu.css('opacity', '1');
      }
    });

    // Handle sidebar search close button
    $('#side-menus .GamesSearch__closeBtn--1IO').on('click', function() {
      const $searchInput = $('#side-menus .GamesSearch__input--AJm');
      const $resultsList = $('#side-menus .SearchResults__list--1aE ul');
      const $tabs = $('#side-menus .Tabs__tabs--o9x');
      const $slidingMenu = $('#side-menus .SlidingMenu__slidingPanel--2AQ');

      // Clear search input and results
      $searchInput.val('');
      $resultsList.empty();
      $('#side-menus .SearchResults__list--1aE').css({
        'opacity': '0',
        'display': 'none'
      });
      $tabs.css('opacity', '1');
      $slidingMenu.css('opacity', '1');
    });

    // Handle blur event on search input
    $('#side-menus .GamesSearch__input--AJm').on('blur', function(event) {
      // Delay the blur action to allow click events on results to fire
      setTimeout(() => {
        const $searchInput = $(this);
        const $resultsList = $('#side-menus .SearchResults__list--1aE ul');
        const $tabs = $('#side-menus .Tabs__tabs--o9x');
        const $slidingMenu = $('#side-menus .SlidingMenu__slidingPanel--2AQ');

        // Check if focus moved to a search result item; if so, skip blur action
        const $relatedTarget = $(event.relatedTarget);
        if ($relatedTarget.closest('#side-menus .GameItem__item--20s').length) {
          return;
        }

        // Clear search input and results
        $searchInput.val('');
        $resultsList.empty();
        $('#side-menus .SearchResults__list--1aE').css({
          'opacity': '0',
          'display': 'none'
        });
        $tabs.css('opacity', '1');
        $slidingMenu.css('opacity', '1');
      }, 100); // 100ms delay to allow click events to process
    });
  });
</script>
<script>
  $(document).ready(function() {
    const closeIcon = document.querySelector('.Icon__close-medium--2c4');
    const menuIcon = document.querySelector('.Icon__navigation-menu--R7v');
    const fadingContainer = document.querySelector('.Header__fadingContainer--1hB');
    const sideMenus = document.getElementById('side-menus');
    const sidebar = document.querySelector('.Sidebar__sidebar--3j1');
    const overlay = document.querySelector('.Overlay__overlay--13G');

    // Default state
    fadingContainer.style.opacity = '0';
    sideMenus.style.opacity = '0';
    sideMenus.style.visibility = 'hidden';
    sidebar.style.transform = 'translate3d(-100%, 0, 0)';
    overlay.style.opacity = '0';

    // Menu icon click (open sidebar)
    menuIcon.addEventListener('click', () => {
      menuIcon.style.display = 'none';
      closeIcon.style.display = 'block'
      fadingContainer.style.opacity = '1';
      sideMenus.style.visibility = 'visible';
      sideMenus.style.opacity = '1';
      sidebar.style.transform = 'translate3d(0%, 0, 0)';
      overlay.style.opacity = '1';

    });

    // Close icon click (close sidebar)
    closeIcon.addEventListener('click', () => {
      menuIcon.style.display = 'block';
      closeIcon.style.display = 'none'
      fadingContainer.style.opacity = '0';
      sidebar.style.transform = 'translate3d(-100%, 0, 0)';
      overlay.style.opacity = '0';
    });
    overlay.addEventListener('transitionend', (e) => {
      if (e.propertyName === 'opacity') {
        sideMenus.style.visibility = overlay.style.opacity === '0' ? 'hidden' : 'visible';
      }
    });
    // Tab switching logic (unchanged)
    const tabs = document.querySelectorAll('.Tabs__tab--2rN');
    const panels = document.querySelectorAll('.SlidingPane__sliding--3Sw');
    let activeIndex = 0;

    // Initially hide all panels except the first one
    panels.forEach((panel, index) => {
      panel.style.transition = 'transform 0.5s ease-in-out';
      if (index !== 0) {
        panel.style.display = 'none';
      } else {
        panel.style.display = 'block';
        panel.style.transform = 'translate3d(0%, 0, 0)';
      }
    });

    tabs.forEach((tab, index) => {
      tab.addEventListener('click', () => {
        if (index === activeIndex) return;

        tabs.forEach(t => {
          t.classList.remove('Tabs__active--1K8');
          const icon = t.querySelector('.Icon__icon--x96');
          if (icon) {
            icon.classList.remove('Icon__active--1EL');
          }
        });

        tab.classList.add('Tabs__active--1K8');
        const clickedIcon = tab.querySelector('.Icon__icon--x96');
        if (clickedIcon) {
          clickedIcon.classList.add('Icon__active--1EL');
        }

        const currentPanel = panels[activeIndex];
        const newPanel = panels[index];

        newPanel.style.display = 'block';
        newPanel.style.transform = index > activeIndex ? 'translate3d(100%, 0, 0)' : 'translate3d(-100%, 0, 0)';

        newPanel.offsetHeight;

        currentPanel.style.transform = index > activeIndex ? 'translate3d(-100%, 0, 0)' : 'translate3d(100%, 0, 0)';
        newPanel.style.transform = 'translate3d(0%, 0, 0)';

        setTimeout(() => {
          currentPanel.style.display = 'none';
        }, 500);

        activeIndex = index;
      });
    });

    $('.sidebar-item').each(function() {
      const $item = $(this);
      const $img = $item.find('.sidebar-item-image img');
      const $link = $item.find('a');
      const defaultSrc = $img.attr('src');
      const activeSrc = $img.data('active-src');
      const currentPathRaw = window.location.pathname;
      const currentPath = currentPathRaw
      const isRoot = (currentPathRaw === '/' || currentPath === '' || currentPath === '/');
      const itemHref = $link.attr('href') ? $link.attr('href').replace(/\/$/, '') : '';
      const itemText = $item.find('.sidebar-item-text').text()
      // Set active state for casino item if on root URL, or if URL matches item href
      if (isRoot && itemText === '<?php echo ($translations['casino']); ?>') {
        $item.addClass('active');
        $img.attr('src', activeSrc);
      } else if (itemHref && currentPath === itemHref) {
        $item.addClass('active');
        $img.attr('src', activeSrc);
      }

      // Hover events
      $item.on('mouseenter', function() {

        $img.attr('src', activeSrc);
      });

      $item.on('mouseleave', function() {
        // Only remove active class and revert image if not on current page or not casino on root
        if (!((currentPath === '' || currentPath === '/') && itemText === '<?php echo strtolower($translations['casino']); ?>') && currentPath !== itemHref) {
          $img.attr('src', defaultSrc);
        }
      });
    });
  });
</script>