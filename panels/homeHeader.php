<?php
function renderHomeHeader($translations, $login, $depositesSID)
{
?>


    <div class="hero-wrapper-main home-has-padding">
      <div class="grid-heroes is-snap-start">
        <div class="hero-content-main scrollX hide-scrollbar" style="grid-auto-columns: calc(33.33% - 0.6875rem);">
          <div class="hero relative h-full">
            <a class="block h-full modal-trigger" href="#" data-modal="modal-bonus-daily" data-analytics="hero-link-casino-1">
              <div class="hero-wrapper">
                <div class="hero-content-wrapper">
                  <div class="hero-content">
                    <div class="badge-content">
                      <div class="badge variant-white size-sm text-size-sm svelte-dahbpg is-inline"><?php echo htmlspecialchars($translations['promotion']); ?></div>
                    </div>
                    <span tag="span" type="display" size="sm" variant="neutral-default" class="text-neutral-default ds-display-sm line-clamp-2" data-ds-text="true"><?php echo htmlspecialchars($translations['daily_bonus']); ?></span>
                    <div class="line-clamp-2">
                      <span tag="span" type="body" variant="neutral-default" size="sm" class="text-neutral-default ds-body-sm" data-ds-text="true"><?php echo htmlspecialchars($translations['daily_bonus_desc']); ?> <span tag="span" type="body" variant="neutral-default" size="sm" strong="true" class="text-neutral-default ds-body-sm-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['read_more']); ?></span></span>
                    </div>
                  </div>
                </div>
                <div class="img-wrap">
                  <div class="img-inner">

                    <img class="!object-contain" alt="<?php echo htmlspecialchars($translations['daily_bonus']); ?>" src="https://cdn.sanity.io/images/tdrhge4k/stake-com-production/57d1eb33690b1e1f9b90358ae754b27fe243f459-1080x1080.png?w=220&amp;h=220&amp;fit=min&amp;auto=format" breakpoints="220,330" loading="lazy" decoding="async" srcset="https://cdn.sanity.io/images/tdrhge4k/stake-com-production/57d1eb33690b1e1f9b90358ae754b27fe243f459-1080x1080.png?w=220&amp;h=220&amp;fit=min&amp;auto=format 220w, https://cdn.sanity.io/images/tdrhge4k/stake-com-production/57d1eb33690b1e1f9b90358ae754b27fe243f459-1080x1080.png?w=330&amp;h=330&amp;fit=min&amp;auto=format 330w" sizes="(min-width: 220px) 220px, 100vw" style="object-fit: contain; max-width: 220px; max-height: 220px; aspect-ratio: 1 / 1; width: 100%;">
                  </div>
                </div>
              </div>
            </a>
            <div class="hero-button-wrapper">
              <a class="modal-trigger" href="#" data-modal="modal-bonus-daily" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="off" data-analytics="hero-button-casino-1" style="min-width: 7.5rem; max-width: 10.625rem;"><?php echo htmlspecialchars($translations['learn_more']); ?></a>
            </div>
          </div>
          <div class="hero relative h-full">
            <a class="block h-full modal-trigger" href="#" data-modal="modal-bonus-100" data-analytics="hero-link-casino-2">
              <div class="hero-wrapper">
                <div class="hero-content-wrapper">
                  <div class="hero-content">
                    <div class="badge-content">
                      <div class="badge variant-white size-sm text-size-sm svelte-dahbpg is-inline"><?php echo htmlspecialchars($translations['promotion']); ?></div>
                    </div>
                    <span tag="span" type="display" size="sm" variant="neutral-default" class="text-neutral-default ds-display-sm line-clamp-2" data-ds-text="true"><?php echo htmlspecialchars($translations['bonus_100_deposit']); ?></span>
                    <div class="line-clamp-2">
                      <span tag="span" type="body" variant="neutral-default" size="sm" class="text-neutral-default ds-body-sm" data-ds-text="true"><?php echo htmlspecialchars($translations['bonus_100_deposit_desc']); ?> <span tag="span" type="body" variant="neutral-default" size="sm" strong="true" class="text-neutral-default ds-body-sm-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['read_more']); ?></span></span>
                    </div>
                  </div>
                </div>
                <div class="img-wrap">
                  <div class="img-inner">
                    <img class="!object-contain" alt="<?php echo htmlspecialchars($translations['bonus_100_deposit']); ?>" src="https://cdn.sanity.io/images/tdrhge4k/stake-com-production/7e49b8a90b2e8341baf0a848777d83b814061c2e-1080x1080.png?w=220&amp;h=220&amp;fit=min&amp;auto=format" breakpoints="220,330" loading="lazy" decoding="async" srcset="https://cdn.sanity.io/images/tdrhge4k/stake-com-production/7e49b8a90b2e8341baf0a848777d83b814061c2e-1080x1080.png?w=220&amp;h=220&amp;fit=min&amp;auto=format 220w, https://cdn.sanity.io/images/tdrhge4k/stake-com-production/7e49b8a90b2e8341baf0a848777d83b814061c2e-1080x1080.png?w=330&amp;h=330&amp;fit=min&amp;auto=format 330w" sizes="(min-width: 220px) 220px, 100vw" style="object-fit: cover; max-width: 220px; max-height: 220px; aspect-ratio: 1 / 1; width: 100%;">
                  </div>
                </div>
              </div>
            </a>
            <div class="hero-button-wrapper">
              <a class="modal-trigger" href="#" data-modal="modal-bonus-100" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="off" data-analytics="hero-button-casino-2" style="min-width: 7.5rem; max-width: 10.625rem;"><?php echo htmlspecialchars($translations['learn_more']); ?></a>
            </div>
          </div>
          <div class="hero relative h-full">
            <a class="block h-full modal-trigger" href="#" data-modal="modal-bonus-1000" data-analytics="hero-link-casino-3">
              <div class="hero-wrapper">
                <div class="hero-content-wrapper">
                  <div class="hero-content">
                    <div class="badge-content">
                      <div class="badge variant-white size-sm text-size-sm svelte-dahbpg is-inline"><?php echo htmlspecialchars($translations['promotion']); ?></div>
                    </div>
                    <span tag="span" type="display" size="sm" variant="neutral-default" class="text-neutral-default ds-display-sm line-clamp-2" data-ds-text="true"><?php echo htmlspecialchars($translations['bonus_1000_deposit']); ?></span>
                    <div class="line-clamp-2">
                      <span tag="span" type="body" variant="neutral-default" size="sm" class="text-neutral-default ds-body-sm" data-ds-text="true"><?php echo htmlspecialchars($translations['bonus_1000_deposit_desc']); ?> <span tag="span" type="body" variant="neutral-default" size="sm" strong="true" class="text-neutral-default ds-body-sm-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['read_more']); ?></span></span>
                    </div>
                  </div>
                </div>
                <div class="img-wrap">
                  <div class="img-inner">
                    <img class="!object-contain" alt="<?php echo htmlspecialchars($translations['bonus_1000_deposit']); ?>" src="https://cdn.sanity.io/images/tdrhge4k/stake-com-production/06f1d29f304d176cf9424bee83acbd8b36fd1cca-1080x1080.png?w=220&amp;h=220&amp;fit=min&amp;auto=format" breakpoints="220,330" loading="lazy" decoding="async" srcset="https://cdn.sanity.io/images/tdrhge4k/stake-com-production/06f1d29f304d176cf9424bee83acbd8b36fd1cca-1080x1080.png?w=220&amp;h=220&amp;fit=min&amp;auto=format 220w, https://cdn.sanity.io/images/tdrhge4k/stake-com-production/06f1d29f304d176cf9424bee83acbd8b36fd1cca-1080x1080.png?w=330&amp;h=330&amp;fit=min&amp;auto=format 330w" sizes="(min-width: 220px) 220px, 100vw" style="object-fit: cover; max-width: 220px; max-height: 220px; aspect-ratio: 1 / 1; width: 100%;">
                  </div>
                </div>
              </div>
            </a>
            <div class="hero-button-wrapper">
              <a class="modal-trigger" href="#" data-modal="modal-bonus-1000" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="off" data-analytics="hero-button-casino-3" style="min-width: 7.5rem; max-width: 10.625rem;"><?php echo htmlspecialchars($translations['learn_more']); ?></a>
            </div>
          </div>
          <div class="hero relative h-full">
            <a class="block h-full modal-trigger" href="#" data-modal="modal-bonus-5000" data-analytics="hero-link-casino-4">
              <div class="hero-wrapper">
                <div class="hero-content-wrapper">
                  <div class="hero-content">
                    <div class="badge-content">
                      <div class="badge variant-white size-sm text-size-sm svelte-dahbpg is-inline"><?php echo htmlspecialchars($translations['promotion']); ?></div>
                    </div>
                    <span tag="span" type="display" size="sm" variant="neutral-default" class="text-neutral-default ds-display-sm line-clamp-2" data-ds-text="true"><?php echo htmlspecialchars($translations['bonus_5000_deposit']); ?></span>
                    <div class="line-clamp-2">
                      <span tag="span" type="body" variant="neutral-default" size="sm" class="text-neutral-default ds-body-sm" data-ds-text="true"><?php echo htmlspecialchars($translations['bonus_5000_deposit_desc']); ?> <span tag="span" type="body" variant="neutral-default" size="sm" strong="true" class="text-neutral-default ds-body-sm-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['read_more']); ?></span></span>
                    </div>
                  </div>
                </div>
                <div class="img-wrap">
                  <div class="img-inner">
                    <img class="!object-contain" alt="<?php echo htmlspecialchars($translations['bonus_5000_deposit']); ?>" src="https://cdn.sanity.io/images/tdrhge4k/stake-com-production/b69d739b139cf35dcbbe5549963499568ce3e031-1080x1080.png?w=220&amp;h=220&amp;fit=min&amp;auto=format" breakpoints="220,330" loading="lazy" decoding="async" srcset="https://cdn.sanity.io/images/tdrhge4k/stake-com-production/b69d739b139cf35dcbbe5549963499568ce3e031-1080x1080.png?w=220&amp;h=220&amp;fit=min&amp;auto=format 220w, https://cdn.sanity.io/images/tdrhge4k/stake-com-production/b69d739b139cf35dcbbe5549963499568ce3e031-1080x1080.png?w=330&amp;h=330&amp;fit=min&amp;auto=format 330w" sizes="(min-width: 220px) 220px, 100vw" style="object-fit: cover; max-width: 220px; max-height: 220px; aspect-ratio: 1 / 1; width: 100%;">
                  </div>
                </div>
              </div>
            </a>
            <div class="hero-button-wrapper">
              <a href="#" class="modal-trigger"  data-modal="modal-bonus-5000" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="off" data-analytics="hero-button-casino-4" style="min-width: 7.5rem; max-width: 10.625rem;"><?php echo htmlspecialchars($translations['learn_more']); ?></a>
            </div>
          </div>
        </div>
        <div class="hero-arrow hero-arrow-right">
          <button class="grid-heroes-button" data-testid="heroes-scroll-right" data-analytics="hero-scroll-right">
            <svg data-ds-icon="ChevronRight" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
              <path fill="currentColor" d="M8.293 5.293a1 1 0 0 1 1.338-.069l.076.069 6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 1 1-1.414-1.414L13.586 12 8.293 6.707l-.068-.076a1 1 0 0 1 .068-1.338"></path>
            </svg>
          </button>
        </div>
        <div class="hero-arrow hero-arrow-left">
          <button class="grid-heroes-button" data-testid="heroes-scroll-right" data-analytics="hero-scroll-right">
            <svg data-ds-icon="ChevronLeft" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
              <path fill="currentColor" d="M14.293 5.293a1 1 0 1 1 1.414 1.414L10.414 12l5.293 5.293.068.076a1 1 0 0 1-1.406 1.406l-.076-.068-6-6a1 1 0 0 1 0-1.414z"></path>
            </svg>
          </button>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function() {
        // Carousel scroll logic
        var $container = $('.hero-content-main');
        var $leftBtn = $('.hero-arrow-left button');
        var $rightBtn = $('.hero-arrow-right button');

        function updateArrows() {
          var scrollLeft = $container.scrollLeft();
          var containerWidth = $container.outerWidth();
          var scrollWidth = $container[0].scrollWidth;
          var maxScroll = scrollWidth - containerWidth;

          if (scrollLeft <= 0) {
            $leftBtn.hide();
          } else {
            $leftBtn.show();
          }

          if (scrollLeft >= maxScroll - 1) {
            $rightBtn.hide();
          } else {
            $rightBtn.show();
          }
        }

        updateArrows();
        $container.on('scroll', updateArrows);

        var scrollAmount = $('.hero').first().outerWidth(true);

        $rightBtn.on('click', function() {
          $container.animate({
            scrollLeft: '+=' + scrollAmount
          }, 300, function() {
            updateArrows();
          });
        });

        $leftBtn.on('click', function() {
          $container.animate({
            scrollLeft: '-=' + scrollAmount
          }, 300, function() {
            updateArrows();
          });
        });

        $(window).on('resize', updateArrows);

        // Modal trigger logic
        $('.modal-trigger').on('click', function(e) {
          e.preventDefault(); // Prevent default link behavior
          var modalId = $(this).data('modal'); // Get target modal ID
          $('.vault-modal-container').addClass('hide-modal'); // Hide all modals
          $(`[data-testid="${modalId}"]`).removeClass('hide-modal'); // Show target modal
        });

        // Modal close logic
        $('.vault-close-button').on('click', function() {
          $('.vault-modal-container').addClass('hide-modal'); // Hide all modals
        });

        // Optional: Close modal when clicking overlay
        $('.modal-overlay').on('click', function() {
          $('.vault-modal-container').addClass('hide-modal'); // Hide all modals
        });
      });
    </script>
 

<?php
}
?>