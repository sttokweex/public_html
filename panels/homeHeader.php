<?php
function renderHomeHeader($translations, $login, $depositesSID)
{
  $currentRank = "Starter";
  $nextRank = "Silver";
  $progressMax = 2000; // Минимальный порог для Bronze
  $progressValue = 0;

  if ($depositesSID >= 0) $currentRank = "Starter";
  if ($depositesSID >= 2000) {
    $currentRank = "Silver";
    $nextRank = "Gold";
    $progressMax = 10000;
  }
  if ($depositesSID >= 10000) {
    $currentRank = "Gold";
    $nextRank = "Ruby";
    $progressMax = 50000;
  }
  if ($depositesSID >= 50000) {
    $currentRank = "Ruby";
    $nextRank = "Legend";
    $progressMax = 100000;
  }
  if ($depositesSID >= 100000) {
    $currentRank = "Legend";
    $nextRank = "Max";
    $progressMax = 500000;
  }

  // Расчет прогресса
  $progressValue = min(($depositesSID / $progressMax) * 100, 100);
  if ($depositesSID >= $progressMax) $progressValue = 100;
?>

  <div class="home-header-wrapper">
    <div class="home-container-upper home-has-padding ">
      <div class="home-header-inner">
        <?php if (!(!isset($_SESSION['login']) || !$_SESSION['login'])) { ?>
          <div class="authentificated">
            <div class="rank-card-main">
              <div class="rank-card-inner">

                <div class="rank-card" id="rankCard">
                  <div class="username">
                    <span>
                      <?php echo htmlspecialchars($login); ?>
                    </span>
                    <svg fill="none" viewBox="0 0 96 96" class="svg-icon " style="width: 1.25rem; height: 1.25rem;"><!---->
                      <title></title>
                      <path fill="#2F4553" d="m48 14.595 8.49 15.75a13.68 13.68 0 0 0 9.66 7.08L84 40.635l-12.39 12.9a13.9 13.9 0 0 0-3.9 9.63q-.069.96 0 1.92l2.46 17.76-15.66-7.56a15 15 0 0 0-6.51-1.53 15 15 0 0 0-6.6 1.5l-15.57 7.53 2.46-17.76q.051-.93 0-1.86a13.9 13.9 0 0 0-3.9-9.63L12 40.635l17.64-3.21a13.62 13.62 0 0 0 9.84-7.02zm0-12.54a5.22 5.22 0 0 0-4.59 2.73l-11.4 21.45a5.4 5.4 0 0 1-3.66 2.67l-24 4.32A5.25 5.25 0 0 0 0 38.385a5.13 5.13 0 0 0 1.44 3.6l16.83 17.55a5.16 5.16 0 0 1 1.47 3.6q.024.435 0 .87l-3.27 24a3 3 0 0 0 0 .72 5.19 5.19 0 0 0 5.19 5.22h.18a5.1 5.1 0 0 0 2.16-.6l21.39-10.32a6.4 6.4 0 0 1 2.76-.63 6.2 6.2 0 0 1 2.79.66l21 10.32c.69.377 1.464.573 2.25.57h.21a5.22 5.22 0 0 0 5.19-5.19q.024-.375 0-.75l-3.27-24q-.025-.375 0-.75a5 5 0 0 1 1.47-3.57l16.77-17.7a5.19 5.19 0 0 0-2.82-8.7l-24-4.32a5.22 5.22 0 0 1-3.69-2.76l-11.4-21.45a5.22 5.22 0 0 0-4.65-2.7"></path><!---->
                    </svg>
                  </div>
                  <div class="progress-value-main">
                    <div class="progress-value">

                      <div class="progress-text">
                        <a class="toRank" href="/ranks">
                          <?php echo $translations['your_vip_progress']; ?>
                          <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon " style="">
                            <title></title>
                            <path d="M8 37.486h30.909L28.665 47.73l6.313 6.314L56 33.022 34.978 12l-6.313 6.314 10.244 10.244H8v8.933z"></path><!---->
                          </svg>
                        </a>
                      </div>
                      <div class="progress-text-percent" id="progressValue"><?php echo number_format($progressValue, 2); ?>%</div>
                    </div>
                    <div class="progressWag">
                      <progress class="wagerProgress" value="<?= round($depositesSID, 2); ?>" max="<?php echo $progressMax ?>"></progress>
                    </div>
                    <div class="levels">
                      <div class="levels-div">
                        <span class="svg-span">
                          <svg fill="none" viewBox="0 0 96 96" class="svg-icon " style="width: 1.25rem; height: 1.25rem;"><!---->
                            <title></title>
                            <path fill="#2F4553" d="m48 14.595 8.49 15.75a13.68 13.68 0 0 0 9.66 7.08L84 40.635l-12.39 12.9a13.9 13.9 0 0 0-3.9 9.63q-.069.96 0 1.92l2.46 17.76-15.66-7.56a15 15 0 0 0-6.51-1.53 15 15 0 0 0-6.6 1.5l-15.57 7.53 2.46-17.76q.051-.93 0-1.86a13.9 13.9 0 0 0-3.9-9.63L12 40.635l17.64-3.21a13.62 13.62 0 0 0 9.84-7.02zm0-12.54a5.22 5.22 0 0 0-4.59 2.73l-11.4 21.45a5.4 5.4 0 0 1-3.66 2.67l-24 4.32A5.25 5.25 0 0 0 0 38.385a5.13 5.13 0 0 0 1.44 3.6l16.83 17.55a5.16 5.16 0 0 1 1.47 3.6q.024.435 0 .87l-3.27 24a3 3 0 0 0 0 .72 5.19 5.19 0 0 0 5.19 5.22h.18a5.1 5.1 0 0 0 2.16-.6l21.39-10.32a6.4 6.4 0 0 1 2.76-.63 6.2 6.2 0 0 1 2.79.66l21 10.32c.69.377 1.464.573 2.25.57h.21a5.22 5.22 0 0 0 5.19-5.19q.024-.375 0-.75l-3.27-24q-.025-.375 0-.75a5 5 0 0 1 1.47-3.57l16.77-17.7a5.19 5.19 0 0 0-2.82-8.7l-24-4.32a5.22 5.22 0 0 1-3.69-2.76l-11.4-21.45a5.22 5.22 0 0 0-4.65-2.7"></path><!---->
                          </svg>
                        </span>
                        <span class="span-text"><? echo $currentRank ?> </span>
                      </div>
                      <div class="levels-div">
                        <span class="svg-span"><svg fill="none" viewBox="0 0 96 96" class="svg-icon " style="">
                            <title></title>
                            <path fill="#C69C6D" d="m48.002 14.603 8.48 15.757c1.97 3.693 5.495 6.336 9.677 7.068l.08.012 17.64 3.2L71.48 53.56a13.84 13.84 0 0 0-3.884 9.63q0 .978.132 1.922l-.01-.072 2.44 17.758L54.52 75.24c-1.908-.934-4.15-1.48-6.52-1.48s-4.613.546-6.608 1.518l.09-.039-15.637 7.56 2.438-17.759c.078-.555.123-1.197.123-1.85 0-3.741-1.482-7.137-3.887-9.633l.003.003-12.518-12.92 17.638-3.2a13.64 13.64 0 0 0 9.842-7.008l.036-.072zm0-12.521h-.01a5.2 5.2 0 0 0-4.577 2.733l-.015.027L32 26.28a5.3 5.3 0 0 1-3.648 2.675l-.033.006-23.997 4.32C1.853 33.717 0 35.847 0 38.406a5.2 5.2 0 0 0 1.443 3.596L1.44 42l16.837 17.558a5.06 5.06 0 0 1 1.473 3.578q0 .458-.078.894l.006-.03L16.4 87.997a5.2 5.2 0 0 0 5.148 5.918h.012c.045.003.102.003.156.003.834 0 1.623-.207 2.31-.576l-.027.013 21.397-10.32a6.2 6.2 0 0 1 2.76-.638c1.004 0 1.952.236 2.795.653l-.036-.014 21.08 10.319a4.7 4.7 0 0 0 2.249.56h.033-.003c.051.003.111.003.171.003a5.2 5.2 0 0 0 5.144-5.948l.004.027-3.28-23.998a5.06 5.06 0 0 1 1.4-4.32l16.84-17.557a5.18 5.18 0 0 0 1.448-3.6c0-2.55-1.836-4.67-4.257-5.114l-.033-.006-23.997-4.32a5.3 5.3 0 0 1-3.705-2.768l-.015-.03-11.399-21.44a5.2 5.2 0 0 0-4.593-2.759h-.008z"></path><!---->
                          </svg></span>
                        <span class="span-text"><?php echo htmlspecialchars($nextRank); ?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } else { ?>
          <div class="home-header-inner-content">
            <div>
              <div class="home-header-inner-padding">
                <h1 style="display: block;" class="home-header-title">
                  <?php echo $translations['largest_online_casino']; ?>
                </h1>
              </div>
              <button type="button" tabindex="0" class="home-register-button" data-analytics="unauth-homepage-signup" data-button-root="">
                <?php echo $translations['register']; ?>
              </button>
            </div>
            <div class="home-oauth">
              <div class="home-oauth-label">
                <p style="" class="home-oauth-label-text">
                  <?php echo $translations['or_register_via']; ?>
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
        <?php } ?>
        <div class="home-feature-wrapper">
          <div style="--border-color: #017aff;" class="home-gradient-border">
            <a data-testid="home-feature-casino-link" class="home-feature-link" href="/ru/casino/home" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="off" data-analytics="homepage-casino-home">
              <div class="home-feature-content">
                <div class="home-feature-image">
                  <img alt="<?php echo $translations['casino']; ?>" src="https://mediumrare.imgix.net/stake-casino-home-18-jul-25-en.png?w=350&h=230&fit=min&auto=format" style="object-fit: cover; max-width: 350px; max-height: 230px; aspect-ratio: 1.5217391304347827; width: 100%;" loading="lazy" decoding="async" srcset="https://mediumrare.imgix.net/stake-casino-home-18-jul-25-en.png?w=350&h=230&fit=min&auto=format 350w, https://mediumrare.imgix.net/stake-casino-home-18-jul-25-en.png?w=640&h=421&fit=min&auto=format 640w, https://mediumrare.imgix.net/stake-casino-home-18-jul-25-en.png?w=700&h=460&fit=min&auto=format 700w" sizes="(min-width: 350px) 350px, 100vw">
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
                      <?php echo $translations['casino']; ?>
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
                  <img alt="<?php echo $translations['sports']; ?>" src="https://mediumrare.imgix.net/stake-sports-home-18-jul-25-en.png?w=350&h=230&fit=min&auto=format" style="object-fit: cover; max-width: 350px; max-height: 230px; aspect-ratio: 1.5217391304347827; width: 100%;" loading="lazy" decoding="async" srcset="https://mediumrare.imgix.net/stake-sports-home-18-jul-25-en.png?w=350&h=230&fit=min&auto=format 350w, https://mediumrare.imgix.net/stake-sports-home-18-jul-25-en.png?w=640&h=421&fit=min&auto=format 640w, https://mediumrare.imgix.net/stake-sports-home-18-jul-25-en.png?w=700&h=460&fit=min&auto=format 700w" sizes="(min-width: 350px) 350px, 100vw">
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
                      <?php echo $translations['sports']; ?>
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

<?php
}
?>