<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

// Define sidebar items using translation keys
$sidebar_items = [
  'casino',
  'live-casino',
  'sports',
  'poker',
  'promotions',
  'leaderboards',
  'faq',
];

// Mapping of translation keys to English-based image names
$image_map = [
  'casino' => 'casino',
  'live-casino' => 'livecasino',
  'sports' => 'sports',
  'poker' => 'poker',
  'promotions' => 'promotions',
  'leaderboards' => 'leaderboards',
  'faq' => 'faq',
];
?>

<section class="sidebar">
  <div class="sidebar-content">
    <?php foreach ($sidebar_items as $item): ?>
      <div style="opacity: 1; margin-left: 0rem;" class="sidebar-item-outer">
        <div class="sidebar-item">
          <a href="<?php
                    if ($item == 'casino') {
                      echo '/slot';
                    } elseif ($item == 'faq') {
                      echo 'https://www.hollandcasino.nl/en/over-ons/update';
                    } else {
                      echo 'https://www.hollandcasino.nl/en/' . htmlspecialchars($item);
                    }
                    ?>"> <span class="sidebar-item-image icon-x96">
              <img src="../images/<?php echo htmlspecialchars($image_map[$item]); ?>-inactive.svg" data-active-src="../images/<?php echo htmlspecialchars($image_map[$item]); ?>-active.svg" alt="<?php echo htmlspecialchars($translations[$item]); ?> icon" loading="lazy">
            </span>
            <span class="sidebar-item-text"><?php echo htmlspecialchars($translations[$item]); ?></span>
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<script>
  $(document).ready(function() {
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