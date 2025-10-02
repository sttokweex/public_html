<?php
function renderHomeHeader($translations, $login, $depositesSID)
{
?>

  <?php if (!(!isset($_SESSION['login']) || !$_SESSION['login'])) { ?>
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
              <a href="#" class="modal-trigger" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="off" data-analytics="hero-button-casino-4" style="min-width: 7.5rem; max-width: 10.625rem;"><?php echo htmlspecialchars($translations['learn_more']); ?></a>
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
  <?php } else { ?>
    <div class="home-header-wrapper">
      <div class="home-container-upper home-has-padding">
        <div class="home-header-inner">
          <div class="home-header-inner-content">
            <div>
              <div class="home-header-inner-padding">
                <h1 style="display: block;" class="home-header-title">
                  <?php echo htmlspecialchars($translations['largest_online_casino']); ?>
                </h1>
              </div>
              <button type="button" tabindex="0" class="home-register-button" data-analytics="unauth-homepage-signup" data-button-root="">
                <?php echo htmlspecialchars($translations['register']); ?>
              </button>
            </div>
            <div class="home-oauth">
              <div class="home-oauth-label">
                <p style="" class="home-oauth-label-text">
                  <?php echo htmlspecialchars($translations['or_register_via']); ?>
                </p>
              </div>
              <div class="home-oauth home-provider-wrapper">
                <div data-content="" class="home-provider-wrapper">
                  <button type="button" tabindex="0" class="home-provider-button" data-analytics="provider-login-facebook" data-button-root="">
                    <svg fill="none" viewBox="0 0 96 96" class="home-svg-icon" style="">
                      <title></title>
                      <path fill="#0866FF" d="M95.94 47.97C95.94 21.467 74.473 0 47.97 0S0 21.467 0 47.97c0 22.486 15.47 41.374 36.397 46.59v-31.9h-9.894V47.97h9.894v-6.296c0-16.31 7.376-23.925 23.446-23.925 3.058 0 8.274.6 10.433 1.2v13.31c-1.14-.12-3.118-.18-5.516-.18-7.856 0-10.914 3-10.914 10.734v5.157h15.65l-2.698 14.69H53.846v32.98C77.592 92.762 96 72.555 96 48.03z"></path>
                      <path fill="#fff" d="m66.738 62.66 2.699-14.69h-15.65v-5.157c0-7.735 3.057-10.733 10.913-10.733 2.458 0 4.437 0 5.516.18V18.948c-2.158-.6-7.375-1.2-10.433-1.2-16.01 0-23.446 7.556-23.446 23.926v6.296h-9.894v14.69h9.894v31.9c3.718.9 7.615 1.44 11.573 1.44a47 47 0 0 0 5.816-.36V62.66z"></path>
                    </svg>
                  </button>
                </div>
                <div data-content="" class="home-provider-wrapper">
                  <button type="button" tabindex="0" class="home-provider-button" data-analytics="provider-login-google" data-button-root="">
                    <svg fill="none" viewBox="0 0 96 96" class="home-svg-icon" style="">
                      <title></title>
                      <path fill="#0866FF" d="M95.94 47.97C95.94 21.467 74.473 0 47.97 0S0 21.467 0 47.97c0 22.486 15.47 41.374 36.397 46.59v-31.9h-9.894V47.97h9.894v-6.296c0-16.31 7.376-23.925 23.446-23.925 3.058 0 8.274.6 10.433 1.2v13.31c-1.14-.12-3.118-.18-5.516-.18-7.856 0-10.914 3-10.914 10.734v5.157h15.65l-2.698 14.69H53.846v32.98C77.592 92.762 96 72.555 96 48.03z"></path>
                      <path fill="#fff" d="m66.738 62.66 2.699-14.69h-15.65v-5.157c0-7.735 3.057-10.733 10.913-10.733 2.458 0 4.437 0 5.516.18V18.948c-2.158-.6-7.375-1.2-10.433-1.2-16.01 0-23.446 7.556-23.446 23.926v6.296h-9.894v14.69h9.894v31.9c3.718.9 7.615 1.44 11.573 1.44a47 47 0 0 0 5.816-.36V62.66z"></path>
                    </svg>
                  </button>
                </div>
                <div data-content="" class="home-provider-wrapper">
                  <button type="button" tabindex="0" class="home-provider-button" data-analytics="provider-login-line" data-button-root="">
                    <svg fill="none" viewBox="0 0 96 96" class="home-svg-icon" style="">
                      <title></title>
                      <path fill="#0866FF" d="M95.94 47.97C95.94 21.467 74.473 0 47.97 0S0 21.467 0 47.97c0 22.486 15.47 41.374 36.397 46.59v-31.9h-9.894V47.97h9.894v-6.296c0-16.31 7.376-23.925 23.446-23.925 3.058 0 8.274.6 10.433 1.2v13.31c-1.14-.12-3.118-.18-5.516-.18-7.856 0-10.914 3-10.914 10.734v5.157h15.65l-2.698 14.69H53.846v32.98C77.592 92.762 96 72.555 96 48.03z"></path>
                      <path fill="#fff" d="m66.738 62.66 2.699-14.69h-15.65v-5.157c0-7.735 3.057-10.733 10.913-10.733 2.458 0 4.437 0 5.516.18V18.948c-2.158-.6-7.375-1.2-10.433-1.2-16.01 0-23.446 7.556-23.446 23.926v6.296h-9.894v14.69h9.894v31.9c3.718.9 7.615 1.44 11.573 1.44a47 47 0 0 0 5.816-.36V62.66z"></path>
                    </svg>
                  </button>
                </div>
                <div data-content="" class="home-provider-wrapper">
                  <button type="button" tabindex="0" class="home-provider-button" data-analytics="provider-login-twitch" data-button-root="">
                    <svg fill="none" viewBox="0 0 96 96" class="home-svg-icon" style="">
                      <title></title>
                      <path fill="#0866FF" d="M95.94 47.97C95.94 21.467 74.473 0 47.97 0S0 21.467 0 47.97c0 22.486 15.47 41.374 36.397 46.59v-31.9h-9.894V47.97h9.894v-6.296c0-16.31 7.376-23.925 23.446-23.925 3.058 0 8.274.6 10.433 1.2v13.31c-1.14-.12-3.118-.18-5.516-.18-7.856 0-10.914 3-10.914 10.734v5.157h15.65l-2.698 14.69H53.846v32.98C77.592 92.762 96 72.555 96 48.03z"></path>
                      <path fill="#fff" d="m66.738 62.66 2.699-14.69h-15.65v-5.157c0-7.735 3.057-10.733 10.913-10.733 2.458 0 4.437 0 5.516.18V18.948c-2.158-.6-7.375-1.2-10.433-1.2-16.01 0-23.446 7.556-23.446 23.926v6.296h-9.894v14.69h9.894v31.9c3.718.9 7.615 1.44 11.573 1.44a47 47 0 0 0 5.816-.36V62.66z"></path>
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="home-feature-wrapper">
            <div style="--border-color: #017aff;" class="home-gradient-border">
              <a data-testid="home-feature-casino-link" class="home-feature-link" href="/ru/casino/home" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="off" data-analytics="homepage-casino-home">
                <div class="home-feature-content">
                  <div class="home-feature-image">
                    <img alt="<?php echo htmlspecialchars($translations['casino']); ?>" src="https://mediumrare.imgix.net/stake-casino-home-18-jul-25-en.png?w=350&h=230&fit=min&auto=format" style="object-fit: cover; max-width: 350px; max-height: 230px; aspect-ratio: 1.5217391304347827; width: 100%;" loading="lazy" decoding="async" srcset="https://mediumrare.imgix.net/stake-casino-home-18-jul-25-en.png?w=350&h=230&fit=min&auto=format 350w, https://mediumrare.imgix.net/stake-casino-home-18-jul-25-en.png?w=640&h=421&fit=min&auto=format 640w, https://mediumrare.imgix.net/stake-casino-home-18-jul-25-en.png?w=700&h=460&fit=min&auto=format 700w" sizes="(min-width: 350px) 350px, 100vw">
                  </div>
                  <div class="home-feature-text">
                    <div class="home-feature-text-inner">
                      <span style="" class="home-feature-title">
                        <span class="home-icon-container">
                          <svg fill="currentColor" viewBox="0 0 64 64" class="home-svg-icon-mini" style="">
                            <title></title>
                            <path d="M12.265 47.728.21 14.605a3.574 3.574 0 0 1 2.108-4.552l.024-.008L21.624 3.03a3.55 3.55 0 0 1 4.553 2.082l.008.024.694 1.92L12.69 46.075a9 9 0 0 0-.418 1.598zM63.79 15.513 48.002 58.931a3.53 3.53 0 0 1-4.558 2.1l.024.009-21.948-8.001a3.58 3.58 0 0 1-2.124-4.585l-.008.024 15.787-43.39a3.555 3.555 0 0 1 4.559-2.126l-.024-.008 21.948 8a3.58 3.58 0 0 1 2.124 4.585l.008-.024zM50.457 32.687l-1.386-3.254a1.79 1.79 0 0 0-2.333-.956l.012-.005-2.666 1.175a1.787 1.787 0 0 1-2.316-.948l-.004-.012-1.146-2.667a1.764 1.764 0 0 0-2.332-.93l.012-.004-3.28 1.386a1.74 1.74 0 0 0-.929 2.33l-.004-.01 3.92 9.255a1.816 1.816 0 0 0 2.359.928l-.012.005 9.227-3.947a1.736 1.736 0 0 0 .794-2.356l.004.01z"></path>
                          </svg>
                        </span>
                        <?php echo htmlspecialchars($translations['casino']); ?>
                      </span>
                      <div class="home-feature-status">
                        <div class="home-status-indicator"></div>
                        <span style="" class="home-feature-status-text">
                          38&nbsp;984
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div style="--border-color: #00CA51;" class="home-gradient-border">
              <a class="home-feature-link" href="/ru/sports/home" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="off" data-analytics="homepage-sports-home">
                <div class="home-feature-content">
                  <div class="home-feature-image">
                    <img alt="<?php echo htmlspecialchars($translations['sports']); ?>" src="https://mediumrare.imgix.net/stake-sports-home-18-jul-25-en.png?w=350&h=230&fit=min&auto=format" style="object-fit: cover; max-width: 350px; max-height: 230px; aspect-ratio: 1.5217391304347827; width: 100%;" loading="lazy" decoding="async" srcset="https://mediumrare.imgix.net/stake-sports-home-18-jul-25-en.png?w=350&h=230&fit=min&auto=format 350w, https://mediumrare.imgix.net/stake-sports-home-18-jul-25-en.png?w=640&h=421&fit=min&auto=format 640w, https://mediumrare.imgix.net/stake-sports-home-18-jul-25-en.png?w=700&h=460&fit=min&auto=format 700w" sizes="(min-width: 350px) 350px, 100vw">
                  </div>
                  <div class="home-feature-text">
                    <div class="home-feature-text-inner">
                      <span style="" class="home-feature-title">
                        <span class="home-icon-container">
                          <svg fill="currentColor" viewBox="0 0 96 96" class="home-svg-icon-mini" style="">
                            <title></title>
                            <g fill-rule="evenodd" clip-rule="evenodd">
                              <path d="M86.68 76.288a48.1 48.1 0 0 0 7.96-17.153 37.16 37.16 0 0 0-15.4 6.118c2.64 3.558 5.12 7.277 7.44 11.035M63.12 93.481c6.84-2.279 12.96-6.037 18.04-10.875-2.48-4.159-5.12-8.237-8-12.115-5.72 6.117-9.44 14.114-10 22.99zm8.72-76.928c0 11.035-3.6 21.231-9.68 29.548 4.28 4.078 8.32 8.356 12.08 12.914a45.15 45.15 0 0 1 21.6-8.036c.08-1 .16-1.96.16-2.999 0-18.312-10.28-34.226-25.36-42.302.76 3.518 1.2 7.157 1.2 10.875m-58.32-1.879C29.2 21.03 43.64 29.828 56.24 40.703c4.8-6.837 7.6-15.154 7.6-24.15A41.5 41.5 0 0 0 61.16 1.88C56.96.68 52.56 0 48 0 34.44 0 22.24 5.638 13.52 14.674m8 52.218c-6.76 0-13.16-1.36-19.04-3.758C8.84 82.206 26.8 96 48 96c2.4 0 4.72-.24 7.04-.56.16-12.155 5.12-23.19 13.12-31.267-3.48-4.198-7.2-8.156-11.12-11.915-9.12 9.076-21.64 14.674-35.48 14.674z"></path>
                              <path d="M51.08 46.82A145.9 145.9 0 0 0 8.24 21.152C3.04 28.788 0 38.024 0 47.98c0 1.72.12 3.439.28 5.118 6.24 3.638 13.48 5.758 21.24 5.758 11.48 0 21.92-4.599 29.56-12.075z"></path>
                            </g>
                          </svg>
                        </span>
                        <?php echo htmlspecialchars($translations['sports']); ?>
                      </span>
                      <div class="home-feature-status">
                        <div class="home-status-indicator"></div>
                        <span style="" class="home-feature-status-text">
                          11&nbsp;461
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

<?php
}
?>