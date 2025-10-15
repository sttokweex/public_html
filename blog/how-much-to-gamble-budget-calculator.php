<?php
require(dirname(__DIR__, 1) . "/system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

if (!isset($_SESSION['hash']) || empty($_SESSION['hash'])) {
  header('Location: /');
  die();
}

require(dirname(__DIR__, 1) . "/panels/header.php");
require(dirname(__DIR__, 1) . "/panels/sidebar.php");
require_once(dirname(__DIR__, 1) . "/panels/footer.php");

// Function to generate a link with consistent styling
function generateLink($href, $text, $translations, $isExternal = false, $icon = null)
{
  $baseClasses = "[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration-line:underline] [text-decoration-style:solid] [text-decoration-skip-ink:none] [text-decoration-thickness:8%] [text-underline-offset:25%] hover:[text-decoration-thickness:14%] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:text-white focus-visible:outline-hidden var(--ds-font-size-sm) inline-flex items-center gap-1 whitespace-normal";
  if ($isExternal) {
    $baseClasses = str_replace("[text-decoration-line:underline] [text-decoration-style:solid] [text-decoration-skip-ink:none] [text-decoration-thickness:8%] [text-underline-offset:25%] hover:[text-decoration-thickness:14%]", "[text-decoration:none] hover:[text-decoration:none]", $baseClasses);
    $rel = 'rel="external noreferrer noopener"';
    $target = 'target="_blank"';
  } else {
    $rel = '';
    $target = '';
  }
  $iconSvg = $icon ? "<svg data-ds-icon=\"External\" width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" class=\"inline-block shrink-0\"><path fill=\"currentColor\" d=\"M20 13.4c-.55 0-1 .45-1 1v4c0 .33-.27.6-.6.6H5.6c-.33 0-.6-.27-.6-.6V5.6c0-.33.27-.6.6-.6h4.8c.55 0 1-.45 1-1s-.45-1-1-1H5.6C4.17 3 3 4.17 3 5.6v12.8C3 19.83 4.17 21 5.6 21h12.8c1.43 0 2.6-1.17 2.6-2.6v-4c0-.55-.45-1-1-1\"></path><path fill=\"currentColor\" d=\"M14.4 3c-.55 0-1 .45-1 1s.45 1 1 1h3.19L8.1 14.49a.996.996 0 0 0 .71 1.7c.26 0 .51-.1.71-.29l9.49-9.49V9.6c0 .55.45 1 1 1s1-.45 1-1V4c0-.55-.45-1-1-1z\"></path></svg>" : '';
  return "<a class=\"$baseClasses\" href=\"$href\" data-sveltekit-reload=\"off\" data-sveltekit-preload-data=\"off\" data-sveltekit-noscroll=\"off\" $rel $target><span type=\"body\" tag=\"span\" size=\"md\" class=\"ds-body-md\" data-ds-text=\"true\">{$translations[$text]}</span>$iconSvg</a>";
}

// Function to generate a heading
function generateHeading($level, $text, $id, $translations, $size = 'lg')
{
  $tag = "h$level";
  $class = $size === 'lg' ? 'ds-heading-lg' : ($size === 'xl' ? 'ds-heading-xl' : 'ds-heading-md');
  return "<$tag type=\"heading\" tag=\"$tag\" size=\"$size\" variant=\"neutral-default\" class=\"text-neutral-default $class\" data-ds-text=\"true\"><span id=\"$id\">{$translations[$text]}</span></$tag>";
}

// Function to generate a paragraph
function generateParagraph($text, $translations, $links = [])
{
  $content = $translations[$text];
  foreach ($links as $placeholder => $linkData) {
    $content = str_replace($placeholder, generateLink($linkData['href'], $linkData['text'], $translations, $linkData['external'] ?? false, $linkData['icon'] ?? null), $content);
  }
  return "<p type=\"body\" tag=\"p\" size=\"md\" class=\"ds-body-md inline-text\" data-ds-text=\"true\">$content</p>";
}

// Function to generate a list item
function generateListItem($text, $translations, $links = [])
{
  return "<li class=\"level-1 svelte-42q2bt\">" . generateParagraph($text, $translations, $links) . "</li>";
}

// Function to generate a social share button
function generateSocialButton($platform, $href, $iconSvg)
{
  return "<a class=\"[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration:none] hover:[text-decoration:none] bg-grey-700 text-white hover:bg-grey-900 hover:text-white focus-visible:outline-white var(--ds-font-size-xs) [&amp;_svg]:text-grey-200 [&amp;:hover&gt;svg]:text-white px-[0.75rem] rounded-full inline-flex items-center gap-1 py-3\" href=\"$href\" data-sveltekit-reload=\"off\" data-sveltekit-preload-data=\"off\" data-sveltekit-noscroll=\"\" target=\"_blank\" rel=\"external noreferrer noopener\">$iconSvg</a>";
}
?>

<div class="main-container scrollable-1 ScrollY" id="main-content">
  <div class="favorite-container">
    <div class="favorite-inner">
      <div class="flex flex-col gap-6">
        <article class="ctainer svelte-1wssqgl" data-blog-single="">
          <div class="flex flex-row gap-2 max-w-full">
            <a class="inline-flex relative items-center gap-2 justify-center [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition [text-decoration:none] hover:[text-decoration:none] bg-grey-700 text-white hover:bg-grey-900 hover:text-white focus-visible:outline-white var(--ds-font-size-sm) [&amp;_svg]:text-grey-200 [&amp;:hover&gt;svg]:text-white py-[0.625rem] px-[1.25rem] shadow-none rounded-(--ds-radius-md)" href="/" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="off">
              <svg data-ds-icon="ChevronLeft" width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
                <path fill="currentColor" d="M14.293 5.293a1 1 0 1 1 1.414 1.414L10.414 12l5.293 5.293.068.076a1 1 0 0 1-1.406 1.406l-.076-.068-6-6a1 1 0 0 1 0-1.414z"></path>
              </svg>
            </a>
            <button type="button" tabindex="0" class="inline-flex relative items-center gap-2 justify-center [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition bg-grey-700 text-white hover:bg-grey-900 hover:text-white focus-visible:outline-white var(--ds-font-size-sm) [&amp;_svg]:text-grey-200 [&amp;:hover&gt;svg]:text-white py-[0.625rem] px-[1.25rem] shadow-none rounded-(--ds-radius-md) overflow-hidden" data-button-root="">
              <span tag="span" type="body" size="md" strong="true" class="ds-body-md-strong truncate" data-ds-text="true"><?php echo $translations['how_much_betwin']; ?></span>
            </button>
          </div>
          <?php echo generateHeading(1, "how_much_betwin", "budget-calculator-heading", $translations, "xl"); ?>
          <div class="share-wrapper flex items-center svelte-1wssqgl">
            <span type="body" tag="span" size="sm" class="ds-body-sm" data-ds-text="true"><?php echo $translations['share_date']; ?></span>
            <span type="body" tag="span" size="md" class="ds-body-md flex gap-4" data-ds-text="true"><!----><!----><a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration:none] hover:[text-decoration:none] bg-grey-700 text-white hover:bg-grey-900 hover:text-white focus-visible:outline-white var(--ds-font-size-xs) [&amp;_svg]:text-grey-200 [&amp;:hover&gt;svg]:text-white px-[0.75rem] rounded-full inline-flex items-center gap-1 py-3" href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Fstake1039.com%2Fblog%2Fwhat-is-crypto-gambling-guide" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="" target="_blank" rel="external noreferrer noopener"><!----><svg data-ds-icon="Facebook" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                  <path fill="currentColor" d="M20.8 1H3.2C1.99 1 1 1.99 1 3.2v17.6c0 1.21.99 2.2 2.2 2.2h10.373v-7.249a.55.55 0 0 0-.55-.55h-1.595a.56.56 0 0 1-.55-.55v-1.903c0-.297.253-.55.55-.55h1.595c.297 0 .55-.242.55-.55v-1.65c0-1.232.308-2.167 1.012-2.871s1.628-1.056 2.816-1.056c.671 0 1.287.022 1.815.077a.54.54 0 0 1 .484.55v1.606c0 .297-.253.55-.55.55h-1.045q-.858 0-1.188.396-.264.396-.264 1.056v1.342c0 .308.253.55.55.55h1.87a.55.55 0 0 1 .539.627l-.253 1.892a.546.546 0 0 1-.539.484h-1.617a.55.55 0 0 0-.55.55V23H20.8c1.21 0 2.2-.99 2.2-2.2V3.2c0-1.21-.99-2.2-2.2-2.2"></path>
                </svg><!----></a><!----> <a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration:none] hover:[text-decoration:none] bg-grey-700 text-white hover:bg-grey-900 hover:text-white focus-visible:outline-white var(--ds-font-size-xs) [&amp;_svg]:text-grey-200 [&amp;:hover&gt;svg]:text-white py-[0.375rem] px-[0.75rem] rounded-full inline-flex items-center gap-1" href="https://x.com/intent/tweet?url=https%3A%2F%2Fstake1039.com%2Fblog%2Fwhat-is-crypto-gambling-guide&amp;text=x.com+%28Twitter%29&amp;hashtags=stake" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="" target="_blank" rel="external noreferrer noopener"><!----><svg data-ds-icon="Twitter" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                  <path fill="currentColor" d="M18.38 2h3.37l-7.4 8.49L23 22h-6.79l-5.31-7-6.08 7H1.44l7.84-9.08L1 2h6.96l4.8 6.39zM17.2 20.01h1.87L6.97 3.92H4.96z"></path>
                </svg><!----></a><!----></span>
          </div>
          <img class="hero svelte-1wssqgl" alt="<?php echo $translations['image_alt_news_content']; ?>" src="https://cdn.sanity.io/images/tdrhge4k/stake-com-production/db027627b52f8764bc48ef443ab5699a0a05b2f8-1200x630.png?q=80&amp;auto=format">
          <div class="content-block svelte-k165h5">
            <?php
            echo generateParagraph("intro_text_1", $translations, [
              '[Stake.com]' => ['href' => '/', 'text' => 'stake_com_text'],
              '[online slot machines]' => ['href' => '/casino/group/slots', 'text' => 'slots_text'],
              '[favourite live sporting events]' => ['href' => '/sports/live', 'text' => 'live_sporting_events_text']
            ]);
            echo generateParagraph("intro_text_2", $translations, [
              '[Stake.com]' => ['href' => '/', 'text' => 'stake_com_text']
            ]);
            echo generateHeading(2, "responsible_gambling_heading", "What_is_Responsible_Gambling?", $translations);
            echo generateParagraph("responsible_gambling_text", $translations, [
              '[casino games]' => ['href' => '/casino/home', 'text' => 'casino_text'],
              '[sports bets]' => ['href' => '/sports/home', 'text' => 'sports_text']
            ]);
            echo generateParagraph("responsible_gambling_tools_text", $translations);
            echo generateHeading(2, "how_much_to_gamble_heading", "How_Do_I_Know_How_Much_Money_to_Gamble_With?", $translations);
            echo generateParagraph("how_much_to_gamble_text", $translations);
            echo generateHeading(3, "budget_calculator_heading", "Budget_Calculator", $translations, "md");
            echo generateParagraph("budget_calculator_text", $translations, [
              '[The Stake.com budget calculator]' => ['href' => '/responsible-gambling/calculator', 'text' => 'budget_calculator_link_text']
            ]);
            echo generateParagraph("budget_calculator_allocation_text", $translations);
            echo generateHeading(3, "how_to_use_budget_calculator_heading", "How_to_Use_the_Budget_Calculator", $translations, "md");
            echo generateParagraph("budget_calculator_usage_text", $translations);
            echo generateParagraph("budget_calculator_decision_text", $translations);
            echo generateHeading(2, "money_management_tips_heading", "Money_Management_Tips", $translations);
            echo generateParagraph("money_management_intro_text", $translations);
            ?>
            <ul class="svelte-42q2bt">
              <?php
              $moneyManagementTips = [
                "money_management_tip_1",
                "money_management_tip_2",
                "money_management_tip_3",
                "money_management_tip_4"
              ];
              foreach ($moneyManagementTips as $tip) {
                echo generateListItem($tip, $translations);
              }
              ?>
            </ul>
            <?php
            echo generateHeading(2, "problem_gambling_signs_heading", "Knowing_the_Signs_of_Problem_Gambling", $translations);
            echo generateParagraph("problem_gambling_signs_text", $translations);
            ?>
            <ul class="svelte-42q2bt">
              <?php
              $problemGamblingSigns = [
                "problem_gambling_sign_1",
                "problem_gambling_sign_2",
                "problem_gambling_sign_3",
                "problem_gambling_sign_4",
                "problem_gambling_sign_5",
                "problem_gambling_sign_6"
              ];
              foreach ($problemGamblingSigns as $sign) {
                echo generateListItem($sign, $translations);
              }
              ?>
            </ul>
            <?php
            echo generateHeading(2, "regain_control_heading", "How_to_Regain_Control_Over_Gambling", $translations);
            echo generateParagraph("regain_control_intro_text", $translations);
            ?>
            <ul class="svelte-42q2bt">
              <?php
              echo generateListItem("regain_control_deposit_limits", $translations);
              echo generateListItem("regain_control_loss_limits", $translations);
              echo generateListItem("regain_control_get_help", $translations);
              ?>
            </ul>
            <?php
            echo generateHeading(2, "more_responsible_gambling_tips_heading", "More_Tips_&amp;_Strategies_to_Gamble_Responsibly", $translations);
            echo generateParagraph("more_responsible_gambling_tips_text", $translations, [
              '[Stake Smart guidelines]' => ['href' => '/responsible-gambling/stake-safe', 'text' => 'stake_smart_guidelines_text'],
              '[responsible gambling advice]' => ['href' => '/blog/responsible-gambling-online-guide-stake-smart', 'text' => 'responsible_gambling_advice_text']
            ]);
            ?>
            <ul class="svelte-42q2bt">
              <?php
              echo generateListItem("responsible_gambling_how_to_guides", $translations, [
                '[how-to guides]' => ['href' => '/blog/category/how-to-guides', 'text' => 'how_to_guides_text']
              ]);
              echo generateListItem("responsible_gambling_table_games", $translations, [
                '[How to play casino table games]' => ['href' => '/blog/how-to-play-casino-table-games', 'text' => 'how_to_play_table_games_text']
              ]);
              echo generateListItem("responsible_gambling_live_casino", $translations, [
                '[How to play live casino games]' => ['href' => '/blog/how-to-play-live-casino-games', 'text' => 'how_to_play_live_casino_text']
              ]);
              echo generateListItem("responsible_gambling_slots", $translations, [
                '[How to play slots]' => ['href' => '/blog/how-to-play-slots', 'text' => 'how_to_play_slots_text']
              ]);
              echo generateListItem("responsible_gambling_guides", $translations, [
                '[online casino guide]' => ['href' => '/blog/online-casino-guide', 'text' => 'online_casino_guide_text'],
                '[sports betting guide]' => ['href' => '/blog/sports-betting-guide', 'text' => 'sports_betting_guide_text']
              ]);
              echo generateListItem("responsible_gambling_provably_fair", $translations, [
                '[classic table game]' => ['href' => '/casino/group/table-games', 'text' => 'classic_table_game_text'],
                '[Stake Originals]' => ['href' => '/casino/group/stake-originals', 'text' => 'stake_originals_text'],
                '[what provably fair means and why it’s important]' => ['href' => '/provably-fair/overview', 'text' => 'provably_fair_text']
              ]);
              ?>
            </ul>
          </div>
        </article>
      </div>
    </div>
  </div>
  <?php render_footer($translations); ?>
</div>