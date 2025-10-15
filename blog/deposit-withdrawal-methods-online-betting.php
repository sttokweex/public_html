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
  $baseClasses = "relative justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] ring-offset-background transition [text-decoration-line:underline] [text-decoration-style:solid] [text-decoration-skip-ink:none] [text-decoration-thickness:8%] [text-underline-offset:25%] hover:[text-decoration-thickness:14%] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:text-white focus-visible:outline-hidden var(--ds-font-size-sm) inline-flex items-center gap-1 whitespace-normal";
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
  $class = $size === 'lg' ? 'ds-heading-lg' : 'ds-heading-md';
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
  return "<li class=\"level-1 svelte-q82j6\">" . generateParagraph($text, $translations, $links) . "</li>";
}

// Function to generate a social share button
function generateSocialButton($platform, $href, $iconSvg)
{
  return "<a class=\"relative justify-center [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition [text-decoration:none] hover:[text-decoration:none] bg-grey-700 text-white hover:bg-grey-900 hover:text-white focus-visible:outline-white var(--ds-font-size-xs) [&amp;_svg]:text-grey-200 [&amp;:hover&gt;svg]:text-white px-[0.75rem] rounded-full inline-flex items-center gap-1 py-3\" href=\"$href\" data-sveltekit-reload=\"off\" data-sveltekit-preload-data=\"off\" data-sveltekit-noscroll=\"\" target=\"_blank\" rel=\"external noreferrer noopener\">$iconSvg</a>";
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
              <span tag="span" type="body" size="md" strong="true" class="ds-body-md-strong truncate" data-ds-text="true"><?php echo $translations['payment_methods_button']; ?></span>
            </button>
          </div>
          <?php echo generateHeading(1, "payment_methods_heading_text", "payment-methods-heading", $translations, "xl"); ?>
          <div class="share-wrapper flex items-center svelte-1wssqgl">
            <span type="body" tag="span" size="sm" class="ds-body-sm" data-ds-text="true"><?php echo $translations['share_date']; ?></span>
            <span type="body" tag="span" size="md" class="ds-body-md flex gap-4" data-ds-text="true"><!----><!----><a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration:none] hover:[text-decoration:none] bg-grey-700 text-white hover:bg-grey-900 hover:text-white focus-visible:outline-white var(--ds-font-size-xs) [&amp;_svg]:text-grey-200 [&amp;:hover&gt;svg]:text-white px-[0.75rem] rounded-full inline-flex items-center gap-1 py-3" href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Fstake1039.com%2Fblog%2Fwhat-is-crypto-gambling-guide" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="" target="_blank" rel="external noreferrer noopener"><!----><svg data-ds-icon="Facebook" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                  <path fill="currentColor" d="M20.8 1H3.2C1.99 1 1 1.99 1 3.2v17.6c0 1.21.99 2.2 2.2 2.2h10.373v-7.249a.55.55 0 0 0-.55-.55h-1.595a.56.56 0 0 1-.55-.55v-1.903c0-.297.253-.55.55-.55h1.595c.297 0 .55-.242.55-.55v-1.65c0-1.232.308-2.167 1.012-2.871s1.628-1.056 2.816-1.056c.671 0 1.287.022 1.815.077a.54.54 0 0 1 .484.55v1.606c0 .297-.253.55-.55.55h-1.045q-.858 0-1.188.396-.264.396-.264 1.056v1.342c0 .308.253.55.55.55h1.87a.55.55 0 0 1 .539.627l-.253 1.892a.546.546 0 0 1-.539.484h-1.617a.55.55 0 0 0-.55.55V23H20.8c1.21 0 2.2-.99 2.2-2.2V3.2c0-1.21-.99-2.2-2.2-2.2"></path>
                </svg><!----></a><!----> <a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration:none] hover:[text-decoration:none] bg-grey-700 text-white hover:bg-grey-900 hover:text-white focus-visible:outline-white var(--ds-font-size-xs) [&amp;_svg]:text-grey-200 [&amp;:hover&gt;svg]:text-white py-[0.375rem] px-[0.75rem] rounded-full inline-flex items-center gap-1" href="https://x.com/intent/tweet?url=https%3A%2F%2Fstake1039.com%2Fblog%2Fwhat-is-crypto-gambling-guide&amp;text=x.com+%28Twitter%29&amp;hashtags=stake" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="" target="_blank" rel="external noreferrer noopener"><!----><svg data-ds-icon="Twitter" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                  <path fill="currentColor" d="M18.38 2h3.37l-7.4 8.49L23 22h-6.79l-5.31-7-6.08 7H1.44l7.84-9.08L1 2h6.96l4.8 6.39zM17.2 20.01h1.87L6.97 3.92H4.96z"></path>
                </svg><!----></a><!----></span>
          </div>
          <img class="hero svelte-1wssqgl" alt="<?php echo $translations['image_alt_news_content']; ?>" src="https://cdn.sanity.io/images/tdrhge4k/stake-com-production/67b99860d6152cc818001b0251df4b03a01c4cff-1200x630.jpg?q=80&amp;auto=format">
          <div class="content-block svelte-k165h5">
            <?php
            echo generateHeading(2, "how_to_deposit_withdraw_heading", "How_to_Deposit_&amp;_Withdraw_-_Online_Betting_Payment_Methods", $translations);
            echo generateParagraph("deposit_intro_text", $translations, [
              '[slots]' => ['href' => '/casino/group/slots', 'text' => 'slots_text'],
              '[table games]' => ['href' => '/casino/group/table-games', 'text' => 'table_games_text'],
              '[live dealer games]' => ['href' => '/casino/group/live-casino', 'text' => 'live_dealer_games_text']
            ]);
            echo generateParagraph("deposit_withdrawal_ease_text", $translations);
            echo generateParagraph("discover_funding_guide_text", $translations, [
              '[Stake.com]' => ['href' => '/', 'text' => 'stake_com_text']
            ]);
            echo generateHeading(2, "how_to_bet_online_heading", "How_to_Bet_Online?", $translations);
            echo generateParagraph("betting_online_ease_text", $translations, [
              '[extensive game library]' => ['href' => '/casino/group/recommended-slots', 'text' => 'extensive_game_library_text'],
              '[casino how-to-guides]' => ['href' => '/blog/category/how-to-guides', 'text' => 'casino_how_to_guides_text']
            ]);
            echo generateParagraph("sports_betting_text", $translations, [
              '[soccer]' => ['href' => '/sports/soccer', 'text' => 'soccer_text'],
              '[American football]' => ['href' => '/sports/american-football', 'text' => 'american_football_text'],
              '[live sporting events]' => ['href' => '/sports/live', 'text' => 'live_sporting_events_text'],
              '[online sportsbook]' => ['href' => '/sports/home', 'text' => 'online_sportsbook_text'],
              '[guide to sports betting]' => ['href' => '/blog/sports-betting-guide', 'text' => 'guide_to_sports_betting_text']
            ]);
            echo generateHeading(2, "fund_betting_account_heading", "How_Do_I_Fund_My_Betting_Account?", $translations);
            echo generateParagraph("fund_account_methods_text", $translations, [
              '[casino]' => ['href' => '/casino/home', 'text' => 'casino_text'],
              '[sports]' => ['href' => '/sports/home', 'text' => 'sports_text'],
              '[using a passkey]' => ['href' => 'https://help.stake.com/en/articles/11872129-how-to-use-passkeys-at-stake-com', 'text' => 'using_a_passkey_text', 'external' => true, 'icon' => true]
            ]);
            echo generateParagraph("funding_options_text", $translations, [
              '[local currency]' => ['href' => '/blog/local-currency-deposit-withdraw-guide', 'text' => 'local_currency_text'],
              '[cryptocurrency available on Stake]' => ['href' => '/blog/what-crypto-does-stake-offer', 'text' => 'cryptocurrency_available_text'],
              '[BTC]' => ['href' => '/blog/what-is-bitcoin', 'text' => 'btc_text'],
              '[ETH]' => ['href' => '/blog/what-is-ethereum-eth-crypto-betting', 'text' => 'eth_text'],
              '[LTC]' => ['href' => '/blog/what-is-litecoin-ltc-crypto-betting', 'text' => 'ltc_text'],
              '[DOGE]' => ['href' => '/blog/what-is-dogecoin-crypto-guide', 'text' => 'doge_text'],
              '[TRX]' => ['href' => '/blog/what-is-tron-trx-crypto-guide', 'text' => 'trx_text'],
              '[EOS]' => ['href' => '/blog/eos-on-stake', 'text' => 'eos_text'],
              '[USDT]' => ['href' => '/zh/blog/what-is-tether-usdt-crypto', 'text' => 'usdt_text']
            ]);
            echo generateHeading(3, "local_currency_method_heading", "Method_for_Local_Currency", $translations, "md");
            ?>
            <ol class="svelte-q82j6">
              <?php
              echo generateListItem("local_currency_step_1", $translations);
              echo generateListItem("local_currency_step_2", $translations);
              echo generateListItem("local_currency_step_3", $translations, [
                '[Canadian Dollars]' => ['href' => '/blog/how-to-deposit-canadian-dollars-cad', 'text' => 'canadian_dollars_text'],
                '[Turkish Lira]' => ['href' => '/blog/how-to-deposit-turkish-lira-try', 'text' => 'turkish_lira_text'],
                '[Vietnamese Dong]' => ['href' => '/blog/how-to-deposit-vietnamese-dong-vnd', 'text' => 'vietnamese_dong_text'],
                '[Argentine Pesos]' => ['href' => '/blog/how-to-deposit-argentine-pesos-ars', 'text' => 'argentine_pesos_text'],
                '[Chilean Pesos]' => ['href' => '/blog/how-to-deposit-chilean-pesos-clp', 'text' => 'chilean_pesos_text'],
                '[Mexican Pesos]' => ['href' => '/blog/how-to-deposit-mexican-pesos-mxn', 'text' => 'mexican_pesos_text'],
                '[USD in Ecuador]' => ['href' => '/blog/how-to-deposit-usd-ecuador-currency', 'text' => 'usd_ecuador_text'],
                '[Indian Rupees]' => ['href' => '/blog/how-to-deposit-indian-rupees-inr', 'text' => 'indian_rupees_text']
              ]);
              echo generateListItem("local_currency_step_4", $translations);
              echo generateListItem("local_currency_step_5", $translations);
              echo generateListItem("local_currency_step_6", $translations);
              echo generateListItem("local_currency_step_7", $translations);
              echo generateListItem("local_currency_step_8", $translations);
              ?>
            </ol>
            <?php
            echo generateHeading(3, "crypto_method_heading", "Method_for_Cryptocurrency", $translations, "md");
            ?>
            <ol class="svelte-q82j6">
              <?php
              echo generateListItem("crypto_step_1", $translations);
              echo generateListItem("crypto_step_2", $translations);
              echo generateListItem("crypto_step_3", $translations, [
                '[crypto exchange platforms]' => ['href' => '/blog/what-is-a-cryptocurrency-exchange', 'text' => 'crypto_exchange_platforms_text'],
                '[Mesh]' => ['href' => '/blog/what-is-mesh-crypto-deposit-integration', 'text' => 'mesh_text'],
                '[Moonpay]' => ['href' => 'https://www.moonpay.com/', 'text' => 'moonpay_text', 'external' => true, 'icon' => true],
                '[Swapped.com]' => ['href' => 'https://swapped.com/', 'text' => 'swapped_com_text', 'external' => true, 'icon' => true],
                '[buy your chosen crypto]' => ['href' => '/blog/how-to-buy-crypto-on-stake', 'text' => 'buy_chosen_crypto_text']
              ]);
              echo generateListItem("crypto_step_4", $translations);
              echo generateListItem("crypto_step_5", $translations, [
                '[crypto exchange]' => ['href' => '/blog/what-is-a-cryptocurrency-exchange', 'text' => 'crypto_exchange_text']
              ]);
              echo generateListItem("crypto_step_6", $translations);
              echo generateListItem("crypto_step_7", $translations, [
                '[vault]' => ['href' => '/blog/how-to-use-our-vault', 'text' => 'vault_text']
              ]);
              ?>
            </ol>
            <?php
            echo generateHeading(2, "accepted_payment_methods_heading", "What_are_the_Accepted_Payment_Methods?", $translations);
            echo generateParagraph("add_funds_methods_text", $translations, [
              '[buy Bitcoin with PayPal]' => ['href' => '/blog/how-can-i-buy-bitcoin-with-paypal', 'text' => 'buy_bitcoin_paypal_text']
            ]);
            echo generateParagraph("moonpay_payment_text", $translations, [
              '[payment methods]' => ['href' => 'https://support.moonpay.com/hc/en-gb/articles/360017624078-What-are-your-supported-payment-methods-', 'text' => 'payment_methods_text', 'external' => true, 'icon' => true]
            ]);
            ?>
            <ul class="svelte-42q2bt">
              <?php
              $paymentMethods = [
                "payment_method_credit_cards",
                "payment_method_apple_pay",
                "payment_method_google_pay",
                "payment_method_sepa",
                "payment_method_uk_faster_payments",
                "payment_method_pix"
              ];
              foreach ($paymentMethods as $method) {
                echo generateListItem($method, $translations);
              }
              ?>
            </ul>
            <?php
            echo generateHeading(2, "bet_bonuses_heading", "Are_there_Bet_Bonuses_for_Specific_Payment_Methods?", $translations);
            echo generateParagraph("unlock_bonuses_text", $translations);
            echo generateParagraph("latest_promotions_text", $translations, [
              '[our latest promotions]' => ['href' => '/promotions', 'text' => 'latest_promotions_text']
            ]);
            echo generateParagraph("vip_club_text", $translations, [
              '[rakeback]' => ['href' => '/blog/what-is-stake-rakeback', 'text' => 'rakeback_text'],
              '[reloads]' => ['href' => '/blog/what-is-stake-reload-bonus', 'text' => 'reloads_text'],
              '[VIP host]' => ['href' => '/blog/perks-benefits-of-stake-vip-hosts', 'text' => 'vip_host_text'],
              '[VIP FAQ]' => ['href' => '/blog/stake-vip-program-faqs-help', 'text' => 'vip_faq_text']
            ]);
            echo generateHeading(2, "withdrawal_heading", "How_to_Make_a_Withdrawal_from_my_Betting_Account?", $translations);
            echo generateParagraph("withdrawal_ease_text", $translations);
            ?>
            <ol class="svelte-q82j6">
              <?php
              $withdrawalSteps = [
                "withdrawal_step_1",
                "withdrawal_step_2",
                "withdrawal_step_3",
                "withdrawal_step_4"
              ];
              foreach ($withdrawalSteps as $step) {
                echo generateListItem($step, $translations);
              }
              ?>
            </ol>
            <?php
            echo generateParagraph("withdrawal_help_text", $translations, [
              '[help page]' => ['href' => 'https://help.stake.com/en/articles/5091165-crypto-how-to-make-a-withdrawal', 'text' => 'help_page_text', 'external' => true, 'icon' => true]
            ]);
            echo generateHeading(3, "withdrawal_time_heading", "How_Long_Do_Withdrawals_Take?", $translations, "md");
            echo generateParagraph("withdrawal_processing_time_text", $translations);
            echo generateHeading(2, "choosing_payment_method_heading", "What_Should_I_Consider_When_Choosing_a_Payment_Method_to_Bet_Online?", $translations);
            echo generateParagraph("payment_method_tips_text", $translations);
            ?>
            <ol class="svelte-q82j6">
              <?php
              echo generateListItem("crypto_payment_tip_1", $translations, [
                '[purchasing crypto]' => ['href' => '/blog/how-to-buy-crypto-on-stake', 'text' => 'purchasing_crypto_text']
              ]);
              echo generateListItem("crypto_payment_tip_2", $translations, [
                '[payment options and coins]' => ['href' => '/blog/choosing-crypto-coin-guide', 'text' => 'payment_options_coins_text'],
                '[crypto price chart]' => ['href' => '/blog/understanding-the-bitcoin-price-chart', 'text' => 'crypto_price_chart_text']
              ]);
              echo generateListItem("crypto_payment_tip_3", $translations, [
                '[Blockchain technology]' => ['href' => '/blog/stake-and-the-blockchain', 'text' => 'blockchain_technology_text'],
                '[how to stay safe]' => ['href' => '/blog/is-crypto-gambling-safe', 'text' => 'how_to_stay_safe_text']
              ]);
              echo generateListItem("responsible_gambling_tip", $translations, [
                '[gamble responsibly]' => ['href' => '/responsible-gambling/stake-safe', 'text' => 'gamble_responsibly_text'],
                '[how you can practice responsible gambling]' => ['href' => '/blog/responsible-gambling-online-guide-stake-smart', 'text' => 'practice_responsible_gambling_text'],
                '[budget calculator]' => ['href' => '/responsible-gambling/calculator', 'text' => 'budget_calculator_text'],
                '[how much you can afford to bet]' => ['href' => '/blog/how-much-to-gamble-budget-calculator', 'text' => 'afford_to_bet_text']
              ]);
              ?>
            </ol>
            <?php
            echo generateParagraph("secure_funding_text", $translations);
            echo generateHeading(2, "fastest_payment_method_heading", "What_is_the_Fastest_Payment_Method_for_Online_Betting?", $translations);
            echo generateParagraph("crypto_fastest_method_text", $translations);
            echo generateParagraph("crypto_betting_benefits_text", $translations);
            echo generateParagraph("fiat_processing_text", $translations, [
              '[customer support team]' => ['href' => '/blog/stake-customer-support-guide', 'text' => 'customer_support_team_text']
            ]);
            echo generateHeading(2, "deposit_withdrawal_limits_heading", "Deposit_and_Withdrawal_Limits_&amp;_Minimums", $translations);
            echo generateParagraph("crypto_limits_text", $translations);
            echo generateParagraph("withdrawal_restrictions_text", $translations);
            echo generateParagraph("check_limits_text", $translations);
            echo generateParagraph("crypto_minimums_intro_text", $translations);
            ?>
            <ul class="svelte-42q2bt">
              <?php
              $cryptoLimits = [
                "btc_minimum_withdrawal",
                "eth_minimum_withdrawal",
                "ltc_minimum_withdrawal",
                "usdt_minimum_withdrawal",
                "doge_minimum_withdrawal",
                "eos_minimum_withdrawal",
                "trx_minimum_withdrawal"
              ];
              foreach ($cryptoLimits as $limit) {
                echo generateListItem($limit, $translations);
              }
              ?>
            </ul>
            <?php
            echo generateParagraph("crypto_limits_info_text", $translations, [
              '[crypto minimum withdrawals and fees]' => ['href' => 'https://help.stake.com/en/articles/4793601-crypto-what-are-the-withdrawal-limits', 'text' => 'crypto_minimum_withdrawals_fees_text', 'external' => true, 'icon' => true],
              '[help centre page]' => ['href' => 'https://help.stake.com/en/', 'text' => 'help_centre_page_text', 'external' => true, 'icon' => true]
            ]);
            ?>
          </div>
        </article>
      </div>
    </div>
  </div>
  <?php render_footer($translations); ?>
</div>