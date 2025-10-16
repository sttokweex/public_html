
<?php
require(dirname(__DIR__, 1) . "/system/connect.php");


require(dirname(__DIR__, 1) . "/panels/header.php");
require(dirname(__DIR__, 1) . "/panels/sidebar.php");
require_once(dirname(__DIR__, 1) . "/panels/footer.php");

?>

<div class="main-container scrollable-1 ScrollY" id="main-content">
  <div class="favorite-container">
    <div class="favorite-inner">
      <div class="mybets-stack-container">
        <div class="mybets-wrap">
          <div class="mybets-header-stack">
            <div class="mybets-title-group">
              <h1 class="mybets-heading">
                <svg data-ds-icon="Security" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0 text-[var(--color-grey-200)]"><!---->
                  <path fill="currentColor" fill-rule="evenodd" d="M11.18 3a2.12 2.12 0 0 1 1.64 0l7.08 2.57c.73.31 1.2 1 1.2 1.77v1.65c0 8.62-4.98 11.2-7.57 12.61-.95.52-2.11.52-3.06 0C7.88 20.18 2.9 17.61 2.9 8.99V7.34c0-.76.47-1.46 1.2-1.77zM12 7a2.5 2.5 0 0 0-2.5 2.5c0 1.03.62 1.9 1.5 2.29V15c0 .55.45 1 1 1s1-.45 1-1v-3.21c.88-.39 1.5-1.27 1.5-2.29A2.5 2.5 0 0 0 12 7" clip-rule="evenodd"></path>
                </svg>
                <?php echo htmlspecialchars($translations['policies']); ?>
              </h1>
            </div>
            <a class="mybets-close-button" href="/casino/home">
              <svg class="mybets-close-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                <path fill="currentColor" d="M4.293 4.293a1 1 0 0 1 1.338-.069l.076.069L12 10.586l6.293-6.293.076-.069a1 1 0 0 1 1.407 1.407l-.069.076L13.414 12l6.293 6.293.069.076a1 1 0 0 1-1.407 1.406l-.076-.068L12 13.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L10.586 12 4.293 5.707l-.068-.076a1 1 0 0 1 .068-1.338"></path>
              </svg>
            </a>
          </div>
        </div>
        <div class="mybets-content-stack">
          <div class="mybets-sidebar-card" style="">
            <div class="mybets-nav-outer-wrapper">
              <div class="mybets-nav-wrapper">
                <button class="mybets-nav-link" data-testid="global-navbar-Term-tab" onclick="window.location.href='/policies/terms'">
                  <span class="mybets-nav-text"><?php echo htmlspecialchars($translations['nav_terms_of_service']); ?></span>
                </button>
                <button class="mybets-nav-link" data-testid="global-navbar-AML-tab" onclick="window.location.href='/policies/aml'">
                  <span class="mybets-nav-text"><?php echo htmlspecialchars($translations['nav_aml']); ?></span>
                </button>
                <button class="mybets-nav-link mybets-nav-active" data-testid="global-navbar-Privacy-tab">
                  <span class="mybets-nav-text"><?php echo htmlspecialchars($translations['nav_privacy']); ?></span>
                </button>
                <div class="mybets-nav-dash"></div>
              </div>
            </div>
          </div>
          <div class="card variant-default p-6 overflow-hidden relative page-card svelte-1vf4wu3" id='terms'>
            <div style="">
              <div class="layout-spacing variant-normal svelte-tm71ti no-bottom-spacing"><!----><!---->
                <div class="wrap svelte-1y88mpk"><!----><!----><!----><!----><!----><!----><!---->
                  <div class="content-block svelte-k165h5">
                    <h1 type="heading" tag="h1" size="xl" variant="neutral-default" class="text-neutral-default ds-heading-xl" data-ds-text="true">
                      <span id="Privacy_Policy"><?php echo htmlspecialchars($translations['privacy_title']); ?></span>
                    </h1>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['intro_p1_part1']); ?></span>
                      <a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration-line:underline] [text-decoration-style:solid] [text-decoration-skip-ink:none] [text-decoration-thickness:8%] [text-underline-offset:25%] hover:[text-decoration-thickness:14%] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:outline-hidden var(--ds-font-size-sm) !bg-transparent !text-white [&amp;_svg]:!text-white focus-visible:text-white focus-visible!:[&amp;_svg]:text-white inline-flex items-center gap-1 whitespace-normal" href="/" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="off" external="false">
                        <span type="body" tag="span" size="md" class="ds-body-md" data-ds-text="true">https://stake.com/</span>
                      </a>
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['intro_p1_part2']); ?></span>
                    </p>
                    <h3 type="heading" tag="h2" size="lg" variant="neutral-default" class="text-neutral-default ds-heading-lg" data-ds-text="true">
                      <span id="1._Website_Use"><?php echo htmlspecialchars($translations['section_1_title']); ?></span>
                    </h3>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_1_p1']); ?></span>
                    </p>
                    <h2 type="heading" tag="h2" size="lg" variant="neutral-default" class="text-neutral-default ds-heading-lg" data-ds-text="true">
                      <span id="2._Personal_Information"><?php echo htmlspecialchars($translations['section_2_title']); ?></span>
                    </h2>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_p1']); ?></span>
                    </p>
                    <ul class="svelte-42q2bt">
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_list_1']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_list_2']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_list_3']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_list_4']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_list_5']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_list_6']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_list_7']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_list_8']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_list_9']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_list_10']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_list_11']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_list_12']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_list_13']); ?></span>
                        </p>
                      </li>
                      <li class="level-2 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration-line:underline] [text-decoration-style:solid] [text-decoration-skip-ink:none] [text-decoration-thickness:8%] [text-underline-offset:25%] hover:[text-decoration-thickness:14%] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:text-white focus-visible:outline-hidden var(--ds-font-size-sm) inline-flex items-center gap-1 whitespace-normal" href="/policies/terms" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="off" external="false">
                            <span type="body" tag="span" size="md" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_list_14']); ?></span>
                          </a>
                        </p>
                      </li>
                      <li class="level-2 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration-line:underline] [text-decoration-style:solid] [text-decoration-skip-ink:none] [text-decoration-thickness:8%] [text-underline-offset:25%] hover:[text-decoration-thickness:14%] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:text-white focus-visible:outline-hidden var(--ds-font-size-sm) inline-flex items-center gap-1 whitespace-normal" href="/policies/anti-money-laundering" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="off" external="false">
                            <span type="body" tag="span" size="md" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_list_15']); ?></span>
                          </a>
                        </p>
                      </li>
                    </ul>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_p2']); ?></span>
                    </p>
                    <ul class="svelte-42q2bt">
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_list_16']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_list_17']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_list_18']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_list_19']); ?></span>
                        </p>
                      </li>
                    </ul>
                    <h3 type="heading" tag="h2" size="lg" variant="neutral-default" class="text-neutral-default ds-heading-lg" data-ds-text="true">
                      <span id="3._Data_Processing_Purposes"><?php echo htmlspecialchars($translations['section_3_title']); ?></span>
                    </h3>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_p1']); ?></span>
                    </p>
                    <ul class="svelte-42q2bt">
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_list_1']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_list_2']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_list_3']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_list_4']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_list_5']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_list_6']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_list_7']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_list_8']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_list_9']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_list_10']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_list_11']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_list_12']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_list_13']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_list_14']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_list_15']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_list_16']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_list_17']); ?></span>
                        </p>
                      </li>
                    </ul>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_p2']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_p3']); ?></span>
                    </p>
                    <h2 type="heading" tag="h2" size="lg" variant="neutral-default" class="text-neutral-default ds-heading-lg" data-ds-text="true">
                      <span id="4._Direct_Marketing_and_Opting_Out"><?php echo htmlspecialchars($translations['section_4_title']); ?></span>
                    </h2>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_4_p1_part1']); ?></span>
                      <a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration:none] hover:[text-decoration:none] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:text-white focus-visible:outline-hidden var(--ds-font-size-sm) inline-flex gap-1 items-center" href="mailto:support@stake.com" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="" target="_blank" rel="external noreferrer noopener" external="true">
                        <span type="body" tag="span" size="md" class="ds-body-md" data-ds-text="true">support@stake.com</span>
                        <svg data-ds-icon="External" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
                          <path fill="currentColor" d="M20 13.4c-.55 0-1 .45-1 1v4c0 .33-.27.6-.6.6H5.6c-.33 0-.6-.27-.6-.6V5.6c0-.33.27-.6.6-.6h4.8c.55 0 1-.45 1-1s-.45-1-1-1H5.6C4.17 3 3 4.17 3 5.6v12.8C3 19.83 4.17 21 5.6 21h12.8c1.43 0 2.6-1.17 2.6-2.6v-4c0-.55-.45-1-1-1"></path>
                          <path fill="currentColor" d="M14.4 3c-.55 0-1 .45-1 1s.45 1 1 1h3.19L8.1 14.49a.996.996 0 0 0 .71 1.7c.26 0 .51-.1.71-.29l9.49-9.49V9.6c0 .55.45 1 1 1s1-.45 1-1V4c0-.55-.45-1-1-1z"></path>
                        </svg>
                      </a>
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_4_p1_part2']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_4_p2']); ?></span>
                    </p>
                    <h3 type="heading" tag="h2" size="lg" variant="neutral-default" class="text-neutral-default ds-heading-lg" data-ds-text="true">
                      <span id="5._Management_and_Sharing_of_your_Personal_Information"><?php echo htmlspecialchars($translations['section_5_title']); ?></span>
                    </h3>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_p1']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_p2']); ?></span>
                    </p>
                    <ul class="svelte-42q2bt">
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_list_1']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_list_2']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_list_3']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_list_4']); ?></span>
                        </p>
                      </li>
                    </ul>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_p3']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_p4']); ?></span>
                    </p>
                    <h2 type="heading" tag="h2" size="lg" variant="neutral-default" class="text-neutral-default ds-heading-lg" data-ds-text="true">
                      <span id="6._Security_of_Personal_Information"><?php echo htmlspecialchars($translations['section_6_title']); ?></span>
                    </h2>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_6_p1']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_6_p2']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_6_p3']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_6_p4']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_6_p5']); ?></span>
                    </p>
                    <h2 type="heading" tag="h2" size="lg" variant="neutral-default" class="text-neutral-default ds-heading-lg" data-ds-text="true">
                      <span id="7._Access_to_Personal_Information"><?php echo htmlspecialchars($translations['section_7_title']); ?></span>
                    </h2>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_7_p1_part1']); ?></span>
                      <a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration:none] hover:[text-decoration:none] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:text-white focus-visible:outline-hidden var(--ds-font-size-sm) inline-flex gap-1 items-center" href="mailto:support@stake.com" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="" target="_blank" rel="external noreferrer noopener" external="true">
                        <span type="body" tag="span" size="md" class="ds-body-md" data-ds-text="true">support@stake.com</span>
                        <svg data-ds-icon="External" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
                          <path fill="currentColor" d="M20 13.4c-.55 0-1 .45-1 1v4c0 .33-.27.6-.6.6H5.6c-.33 0-.6-.27-.6-.6V5.6c0-.33.27-.6.6-.6h4.8c.55 0 1-.45 1-1s-.45-1-1-1H5.6C4.17 3 3 4.17 3 5.6v12.8C3 19.83 4.17 21 5.6 21h12.8c1.43 0 2.6-1.17 2.6-2.6v-4c0-.55-.45-1-1-1"></path>
                          <path fill="currentColor" d="M14.4 3c-.55 0-1 .45-1 1s.45 1 1 1h3.19L8.1 14.49a.996.996 0 0 0 .71 1.7c.26 0 .51-.1.71-.29l9.49-9.49V9.6c0 .55.45 1 1 1s1-.45 1-1V4c0-.55-.45-1-1-1z"></path>
                        </svg>
                      </a>
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_7_p1_part2']); ?></span>
                    </p>
                    <h2 type="heading" tag="h2" size="lg" variant="neutral-default" class="text-neutral-default ds-heading-lg" data-ds-text="true">
                      <span id="8._Delete_Personal_Data"><?php echo htmlspecialchars($translations['section_8_title']); ?></span>
                    </h2>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_8_p1_part1']); ?></span>
                      <a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration:none] hover:[text-decoration:none] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:text-white focus-visible:outline-hidden var(--ds-font-size-sm) inline-flex gap-1 items-center" href="mailto:support@stake.com" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="" target="_blank" rel="external noreferrer noopener" external="true">
                        <span type="body" tag="span" size="md" class="ds-body-md" data-ds-text="true">support@stake.com</span>
                        <svg data-ds-icon="External" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
                          <path fill="currentColor" d="M20 13.4c-.55 0-1 .45-1 1v4c0 .33-.27.6-.6.6H5.6c-.33 0-.6-.27-.6-.6V5.6c0-.33.27-.6.6-.6h4.8c.55 0 1-.45 1-1s-.45-1-1-1H5.6C4.17 3 3 4.17 3 5.6v12.8C3 19.83 4.17 21 5.6 21h12.8c1.43 0 2.6-1.17 2.6-2.6v-4c0-.55-.45-1-1-1"></path>
                          <path fill="currentColor" d="M14.4 3c-.55 0-1 .45-1 1s.45 1 1 1h3.19L8.1 14.49a.996.996 0 0 0 .71 1.7c.26 0 .51-.1.71-.29l9.49-9.49V9.6c0 .55.45 1 1 1s1-.45 1-1V4c0-.55-.45-1-1-1z"></path>
                        </svg>
                      </a>
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_8_p1_part2']); ?></span>
                    </p>
                    <h2 type="heading" tag="h2" size="lg" variant="neutral-default" class="text-neutral-default ds-heading-lg" data-ds-text="true">
                      <span id="9._Contact_Details"><?php echo htmlspecialchars($translations['section_9_title']); ?></span>
                    </h2>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_9_p1_part1']); ?></span>
                      <a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration:none] hover:[text-decoration:none] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:text-white focus-visible:outline-hidden var(--ds-font-size-sm) inline-flex gap-1 items-center" href="mailto:support@stake.com" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="" target="_blank" rel="external noreferrer noopener" external="true">
                        <span type="body" tag="span" size="md" class="ds-body-md" data-ds-text="true">support@stake.com</span>
                        <svg data-ds-icon="External" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
                          <path fill="currentColor" d="M20 13.4c-.55 0-1 .45-1 1v4c0 .33-.27.6-.6.6H5.6c-.33 0-.6-.27-.6-.6V5.6c0-.33.27-.6.6-.6h4.8c.55 0 1-.45 1-1s-.45-1-1-1H5.6C4.17 3 3 4.17 3 5.6v12.8C3 19.83 4.17 21 5.6 21h12.8c1.43 0 2.6-1.17 2.6-2.6v-4c0-.55-.45-1-1-1"></path>
                          <path fill="currentColor" d="M14.4 3c-.55 0-1 .45-1 1s.45 1 1 1h3.19L8.1 14.49a.996.996 0 0 0 .71 1.7c.26 0 .51-.1.71-.29l9.49-9.49V9.6c0 .55.45 1 1 1s1-.45 1-1V4c0-.55-.45-1-1-1z"></path>
                        </svg>
                      </a>
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_9_p1_part2']); ?></span>
                    </p>
                    <h2 type="heading" tag="h2" size="lg" variant="neutral-default" class="text-neutral-default ds-heading-lg" data-ds-text="true">
                      <span id="10._International_Data_Transfers"><?php echo htmlspecialchars($translations['section_10_title']); ?></span>
                    </h2>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_10_p1']); ?></span>
                    </p>
                    <h2 type="heading" tag="h2" size="lg" variant="neutral-default" class="text-neutral-default ds-heading-lg" data-ds-text="true">
                      <span id="11._Legal_Basis_for_Processing"><?php echo htmlspecialchars($translations['section_11_title']); ?></span>
                    </h2>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_11_p1']); ?></span>
                    </p>
                    <ul class="svelte-42q2bt">
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_11_list_1_title']); ?></span>
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_11_list_1_description']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_11_list_2_title']); ?></span>
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_11_list_2_description']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_11_list_3_title']); ?></span>
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_11_list_3_description']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_11_list_4_title']); ?></span>
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_11_list_4_description']); ?></span>
                        </p>
                      </li>
                    </ul>
                    <h2 type="heading" tag="h2" size="lg" variant="neutral-default" class="text-neutral-default ds-heading-lg" data-ds-text="true">
                      <span id="12._Supervisor_Authority"><?php echo htmlspecialchars($translations['section_12_title']); ?></span>
                    </h2>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_12_p1']); ?></span>
                    </p>
                    <h2 type="heading" tag="h2" size="lg" variant="neutral-default" class="text-neutral-default ds-heading-lg" data-ds-text="true">
                      <span id="13._Updates_to_this_Privacy_Policy"><?php echo htmlspecialchars($translations['section_13_title']); ?></span>
                    </h2>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_13_p1_part1']); ?></span>
                      <a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration-line:underline] [text-decoration-style:solid] [text-decoration-skip-ink:none] [text-decoration-thickness:8%] [text-underline-offset:25%] hover:[text-decoration-thickness:14%] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:outline-hidden var(--ds-font-size-sm) !bg-transparent !text-white [&amp;_svg]:!text-white focus-visible:text-white focus-visible!:[&amp;_svg]:text-white inline-flex items-center gap-1 whitespace-normal" href="/" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="off" external="false">
                        <span type="body" tag="span" size="md" class="ds-body-md" data-ds-text="true">https://stake.com/</span>
                      </a>
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_13_p1_part2']); ?></span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php render_footer($translations); ?>
</div>
