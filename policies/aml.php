
<?php
require(dirname(__DIR__, 1) . "/system/config.php");



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
                <svg data-ds-icon="Security" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0 text-[var(--color-grey-200)]">
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
                <button class="mybets-nav-link mybets-nav-active" data-testid="global-navbar-Term-tab" onclick="window.location.href='/policies/terms'">
                  <span class="mybets-nav-text"><?php echo htmlspecialchars($translations['nav_terms_of_service']); ?></span>
                </button>
                <button class="mybets-nav-link mybets-nav-active" data-testid="global-navbar-AML-tab">
                  <span class="mybets-nav-text"><?php echo htmlspecialchars($translations['nav_aml']); ?></span>
                </button>
                <button class="mybets-nav-link" data-testid="global-navbar-Privacy-tab" onclick="window.location.href='/policies/privacy'">
                  <span class="mybets-nav-text"><?php echo htmlspecialchars($translations['nav_privacy']); ?></span>
                </button>
                <div class="mybets-nav-dash"></div>
              </div>
            </div>
          </div>

          <div class="card variant-default p-6 overflow-hidden relative page-card svelte-1vf4wu3" id='terms'>
            <div style="">
              <div class="layout-spacing variant-normal svelte-tm71ti no-bottom-spacing">
                <div class="wrap svelte-1y88mpk ">
                  <div class="content-block svelte-k165h5">
                    <h1 type="heading" tag="h1" size="xl" variant="neutral-default" class="text-neutral-default ds-heading-xl" data-ds-text="true">
                      <span id="Anti-Money_Laundering,_Anti-Terrorist_Financing_statement"><?php echo htmlspecialchars($translations['aml_title']); ?></span>
                    </h1>
                    <h2 type="heading" tag="h2" size="lg" variant="neutral-default" class="text-neutral-default ds-heading-lg" data-ds-text="true">
                      <span id="1._Company_Business_Model"><?php echo htmlspecialchars($translations['section_1_title']); ?></span>
                    </h2>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_1_p1_part1']); ?></span>
                      <span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_1_p1_stake']); ?></span>
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_1_p1_part2']); ?></span>
                      <span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_1_p1_company']); ?></span>
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_1_p1_part3']); ?></span>
                      <a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration-line:underline] [text-decoration-style:solid] [text-decoration-skip-ink:none] [text-decoration-thickness:8%] [text-underline-offset:25%] hover:[text-decoration-thickness:14%] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:outline-hidden var(--ds-font-size-sm) !bg-transparent !text-white [&amp;_svg]:!text-white focus-visible:text-white focus-visible!:[&amp;_svg]:text-white inline-flex items-center gap-1 whitespace-normal" href="/" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="off" external="false">
                        <span type="body" tag="span" size="md" class="ds-body-md" data-ds-text="true">www.stake.com</span>
                      </a>
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_1_p1_part4']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_1_p2']); ?></span>
                    </p>
                    <h2 type="heading" tag="h2" size="lg" variant="neutral-default" class="text-neutral-default ds-heading-lg" data-ds-text="true">
                      <span id="2._Company_Policy_Statement"><?php echo htmlspecialchars($translations['section_2_title']); ?></span>
                    </h2>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_p1_part1']); ?></span>
                      <span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true">AML/CFT</span>
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_p1_part2']); ?></span>
                      <span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true">AML</span>
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_p1_part3']); ?></span>
                      <span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true">FATF</span>
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_p1_part4']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_2_p2']); ?></span>
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
                    </ul>
                    <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true">
                      <span id="3._Definitions"><?php echo htmlspecialchars($translations['section_3_title']); ?></span>
                    </h3>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_p1']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_p2_money_laundering']); ?></span>
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_p2_description']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_p3_placement']); ?></span>
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_p3_description']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_p4_layering']); ?></span>
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_p4_description']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_p5_integration']); ?></span>
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_p5_description']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_p6_suspicious_activity']); ?></span>
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_p6_description']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_p7_sanctions']); ?></span>
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_3_p7_description']); ?></span>
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
                    </ul>
                    <h3 type="heading" tag="h2" size="lg" variant="neutral-default" class="text-neutral-default ds-heading-lg" data-ds-text="true">
                      <span id="4._Governance_and_Oversight"><?php echo htmlspecialchars($translations['section_4_title']); ?></span>
                    </h3>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_4_p1_part1']); ?></span>
                      <span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true">CCO</span>
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_4_p1_part2']); ?></span>
                    </p>
                    <h2 type="heading" tag="h2" size="lg" variant="neutral-default" class="text-neutral-default ds-heading-lg" data-ds-text="true">
                      <span id="5._Know_Your_Customer_and_Transaction_Monitoring"><?php echo htmlspecialchars($translations['section_5_title']); ?></span>
                    </h2>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_p1']); ?></span>
                    </p>
                    <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true">
                      <span id="5._1._Know_Your_Customer"><?php echo htmlspecialchars($translations['section_5_1_title']); ?></span>
                    </h3>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_p1']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_p2']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_p3_part1']); ?></span>
                      <span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true">CIP</span>
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_p3_part2']); ?></span>
                    </p>
                    <ul class="svelte-42q2bt">
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_1']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_2']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_3']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_4']); ?></span>
                        </p>
                      </li>
                    </ul>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_p4']); ?></span>
                    </p>
                    <ul class="svelte-42q2bt">
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <em><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_5_title']); ?></span></em>
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_5_description']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <em><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_6_title']); ?></span></em>
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_6_description_part1']); ?></span>
                          <span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true">KYC Information</span>
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_6_description_part2']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <em><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_7_title']); ?></span></em>
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_7_description']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <em><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_8_title']); ?></span></em>
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_8_description_part1']); ?></span>
                          <span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true">KYC</span>
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_8_description_part2']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <em><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_9_title']); ?></span></em>
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_9_description']); ?></span>
                        </p>
                      </li>
                    </ul>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_p5']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_p6']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_p7']); ?></span>
                    </p>
                    <ul class="svelte-42q2bt">
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_10']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_11']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_12']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_13']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_14']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_15']); ?></span>
                        </p>
                      </li>
                    </ul>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_p8']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_p9']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_p10']); ?></span>
                    </p>
                    <ul class="svelte-42q2bt">
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_16']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_17']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_18']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_19']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_20']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_21']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_list_22']); ?></span>
                        </p>
                      </li>
                    </ul>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_1_p11']); ?></span>
                    </p>
                    <h2 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true">
                      <span id="5.2._Transactions_Monitoring"><?php echo htmlspecialchars($translations['section_5_2_title']); ?></span>
                    </h2>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_p1']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_p2']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_p3']); ?></span>
                    </p>
                    <ul class="svelte-42q2bt">
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_1']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_2']); ?></span>
                        </p>
                      </li>
                    </ul>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_p4']); ?></span>
                    </p>
                    <ul class="svelte-42q2bt">
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <em><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_3_title']); ?></span></em>
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_3_description']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <em><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_4_title']); ?></span></em>
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_4_description']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <em><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_5_title']); ?></span></em>
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_5_description']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <em><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_6_title']); ?></span></em>
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_6_description']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <em><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_7_title']); ?></span></em>
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_7_description']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <em><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_8_title']); ?></span></em>
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_8_description']); ?></span>
                        </p>
                      </li>
                    </ul>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_p5']); ?></span>
                    </p>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_p6']); ?></span>
                    </p>
                    <ul class="svelte-42q2bt">
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <em><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_9_title']); ?></span></em>
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_9_description']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <em><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_10_title']); ?></span></em>
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_10_description']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <em><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_11_title']); ?></span></em>
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_11_description']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <em><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_12_title']); ?></span></em>
                          <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_12_description']); ?></span>
                        </p>
                      </li>
                      <li class="level-1 svelte-42q2bt">
                        <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                          <em><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo htmlspecialchars($translations['section_5_2_list_13_title']); ?></span></em>
                        </p>
                      </li>
                    </ul>
                    <h2 type="heading" tag="h2" size="lg" variant="neutral-default" class="text-neutral-default ds-heading-lg" data-ds-text="true">
                      <span id="6._Education_and_Training"><?php echo htmlspecialchars($translations['section_6_title']); ?></span>
                    </h2>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_6_p1_part1']); ?></span>
                      <span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true">CCO</span>
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_6_p1_part2']); ?></span>
                    </p>
                    <h2 type="heading" tag="h2" size="lg" variant="neutral-default" class="text-neutral-default ds-heading-lg" data-ds-text="true">
                      <span id="7._Reporting"><?php echo htmlspecialchars($translations['section_7_title']); ?></span>
                    </h2>
                    <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true">
                      <span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><?php echo htmlspecialchars($translations['section_7_p1']); ?></span>
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
