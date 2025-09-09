<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

// Define sidebar items using translation keys
$sidebar_items = [
  'sidebar_casino',
  'sidebar_live_casino',
  'sidebar_sports',
  'sidebar_poker',
  'sidebar_promotions',
  'sidebar_leaderboards',
  'sidebar_faq',
];

// Mapping of translation keys to English-based image names
$image_map = [
  'sidebar_casino' => 'casino',
  'sidebar_live_casino' => 'livecasino',
  'sidebar_sports' => 'sports',
  'sidebar_poker' => 'poker',
  'sidebar_promotions' => 'promotions',
  'sidebar_leaderboards' => 'leaderboards',
  'sidebar_faq' => 'faq',
];
?>

<section class="sidebar">
  <div class="sidebar-content">
    <?php foreach ($sidebar_items as $item): ?>
      <div style="opacity: 1; margin-left: 0rem;">
        <div class="sidebar-item">
          <a href="/<?php echo htmlspecialchars($translations[$item]); ?>">
            <span class="sidebar-item-image icon-x96">
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
      const currentPath = window.location.pathname.replace(/\/$/, '');
      const itemHref = $link.attr('href') ? $link.attr('href').replace(/\/$/, '') : '';
      const itemText = $item.find('.sidebar-item-text').text().toLowerCase();

      // Set active state for casino item if on root URL, or if URL matches item href
      if ((currentPath === '' || currentPath === '/') && itemText === '<?php echo strtolower($translations['sidebar_casino']); ?>') {
        $item.addClass('active');
        $img.attr('src', activeSrc);
      } else if (itemHref && currentPath === itemHref) {
        $item.addClass('active');
        $img.attr('src', activeSrc);
      }

      // Hover events
      $item.on('mouseenter', function() {
        $item.addClass('active');
        $img.attr('src', activeSrc);
      });

      $item.on('mouseleave', function() {
        // Only remove active class and revert image if not on current page or not casino on root
        if (!((currentPath === '' || currentPath === '/') && itemText === '<?php echo strtolower($translations['sidebar_casino']); ?>') && currentPath !== itemHref) {
          $item.removeClass('active');
          $img.attr('src', defaultSrc);
        }
      });
    });
  });
</script>