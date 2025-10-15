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

// Utility functions
function generateLink($href, $textKey, $translations, $attributes = [], $external = false)
{
  $defaultAttributes = [
    'class' => '[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,"salt"_on)] relative justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration-line:underline] [text-decoration-style:solid] [text-decoration-skip-ink:none] [text-decoration-thickness:8%] [text-underline-offset:25%] hover:[text-decoration-thickness:14%] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:text-white focus-visible:outline-hidden var(--ds-font-size-sm) inline-flex items-center gap-1 whitespace-normal',
    'data-sveltekit-reload' => 'off',
    'data-sveltekit-preload-data' => 'off',
    'data-sveltekit-noscroll' => 'off'
  ];
  if ($external) {
    $defaultAttributes['target'] = '_blank';
    $defaultAttributes['rel'] = 'external noreferrer noopener';
    $defaultAttributes['external'] = 'true';
    $defaultAttributes['class'] = str_replace('[text-decoration-line:underline] [text-decoration-style:solid] [text-decoration-skip-ink:none] [text-decoration-thickness:8%] [text-underline-offset:25%] hover:[text-decoration-thickness:14%]', '[text-decoration:none] hover:[text-decoration:none]', $defaultAttributes['class']);
  }
  $attributes = array_merge($defaultAttributes, $attributes);
  $attrString = '';
  foreach ($attributes as $key => $value) {
    $attrString .= " $key=\"" . htmlspecialchars($value) . "\"";
  }
  $text = htmlspecialchars($translations[$textKey]);
  return "<a href=\"$href\"$attrString><span type=\"body\" tag=\"span\" size=\"md\" class=\"ds-body-md\" data-ds-text=\"true\">$text</span></a>";
}

function generateButton($textKey, $translations, $attributes = [])
{
  $defaultAttributes = [
    'type' => 'button',
    'tabindex' => '0',
    'class' => '[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,"salt"_on)] inline-flex relative items-center gap-2 justify-center [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] bg-grey-700 text-white hover:bg-grey-900 hover:text-white focus-visible:outline-white var(--ds-font-size-sm) [&_svg]:text-grey-200 [&:hover>svg]:text-white py-[0.625rem] px-[1.25rem] shadow-none rounded-(--ds-radius-md) overflow-hidden',
    'data-button-root' => ''
  ];
  $attributes = array_merge($defaultAttributes, $attributes);
  $attrString = '';
  foreach ($attributes as $key => $value) {
    $attrString .= " $key=\"" . htmlspecialchars($value) . "\"";
  }
  $text = htmlspecialchars($translations[$textKey]);
  return "<button$attrString><span tag=\"span\" type=\"body\" size=\"md\" strong=\"true\" class=\"ds-body-md-strong truncate\" data-ds-text=\"true\">$text</span></button>";
}

function generateHeading($textKey, $translations, $attributes = [], $id = '')
{
  $defaultAttributes = [
    'type' => 'heading',
    'tag' => 'h2',
    'size' => 'lg',
    'variant' => 'neutral-default',
    'class' => 'text-neutral-default ds-heading-lg',
    'data-ds-text' => 'true'
  ];
  $attributes = array_merge($defaultAttributes, $attributes);
  $attrString = '';
  foreach ($attributes as $key => $value) {
    $attrString .= " $key=\"" . htmlspecialchars($value) . "\"";
  }
  $idAttr = $id ? " id=\"$id\"" : '';
  $text = htmlspecialchars($translations[$textKey]);
  return "<{$attributes['tag']}$attrString$idAttr><span>$text</span></{$attributes['tag']}>";
}

function generateParagraph($textKey, $translations, $links = [], $attributes = [])
{
  $defaultAttributes = [
    'type' => 'body',
    'tag' => 'p',
    'size' => 'md',
    'class' => 'ds-body-md inline-text',
    'data-ds-text' => 'true'
  ];
  $attributes = array_merge($defaultAttributes, $attributes);
  $attrString = '';
  foreach ($attributes as $key => $value) {
    $attrString .= " $key=\"" . htmlspecialchars($value) . "\"";
  }
  $text = $translations[$textKey];
  foreach ($links as $placeholder => $linkData) {
    $link = generateLink($linkData['href'], $linkData['textKey'], $translations, $linkData['attributes'] ?? [], $linkData['external'] ?? false);
    $text = str_replace("[$placeholder]", $link, $text);
  }
  return "<p$attrString>$text</p>";
}

function generateListItem($textKey, $translations, $linkData = null)
{
  $text = $linkData ? generateLink($linkData['href'], $textKey, $translations, $linkData['attributes'] ?? [], $linkData['external'] ?? false) : htmlspecialchars($translations[$textKey]);
  return "<li class=\"level-1 svelte-42q2bt\"><p type=\"body\" tag=\"p\" size=\"md\" class=\"ds-body-md inline-text\" data-ds-text=\"true\"><span type=\"body\" size=\"md\" tag=\"span\" strong=\"false\" class=\"ds-body-md\" data-ds-text=\"true\">$text</span></p></li>";
}

// Assume translations are included based on language
?>

<div class="main-container scrollable-1 ScrollY" id="main-content">
  <div class="favorite-container">
    <div class="favorite-inner">
      <div class="flex flex-col gap-6">
        <article class="ctainer svelte-1wssqgl" data-blog-single="">
          <div class="flex flex-row gap-2 max-w-full">
            <a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] inline-flex relative items-center gap-2 justify-center [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition [text-decoration:none] hover:[text-decoration:none] bg-grey-700 text-white hover:bg-grey-900 hover:text-white focus-visible:outline-white var(--ds-font-size-sm) [&amp;_svg]:text-grey-200 [&amp;:hover&gt;svg]:text-white py-[0.625rem] px-[1.25rem] shadow-none rounded-(--ds-radius-md)" href="/" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="off">
              <svg data-ds-icon="ChevronLeft" width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
                <path fill="currentColor" d="M14.293 5.293a1 1 0 1 1 1.414 1.414L10.414 12l5.293 5.293.068.076a1 1 0 0 1-1.406 1.406l-.076-.068-6-6a1 1 0 0 1 0-1.414z"></path>
              </svg>
            </a>
            <?php echo generateButton('local_currency_guide_button', $translations); ?>
          </div>
          <?php
          echo generateHeading('local_currency_guide_button', $translations, ['tag' => 'h1', 'size' => 'xl', 'class' => 'text-neutral-default ds-heading-xl']);
          ?>
          <div class="share-wrapper flex items-center svelte-1wssqgl">
            <span type="body" tag="span" size="sm" class="ds-body-sm" data-ds-text="true"><?php echo htmlspecialchars($translations['share_date']); ?></span>
            <span type="body" tag="span" size="md" class="ds-body-md flex gap-4" data-ds-text="true"><!----><!----><a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration:none] hover:[text-decoration:none] bg-grey-700 text-white hover:bg-grey-900 hover:text-white focus-visible:outline-white var(--ds-font-size-xs) [&amp;_svg]:text-grey-200 [&amp;:hover&gt;svg]:text-white px-[0.75rem] rounded-full inline-flex items-center gap-1 py-3" href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Fstake1039.com%2Fblog%2Fwhat-is-crypto-gambling-guide" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="" target="_blank" rel="external noreferrer noopener"><!----><svg data-ds-icon="Facebook" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                  <path fill="currentColor" d="M20.8 1H3.2C1.99 1 1 1.99 1 3.2v17.6c0 1.21.99 2.2 2.2 2.2h10.373v-7.249a.55.55 0 0 0-.55-.55h-1.595a.56.56 0 0 1-.55-.55v-1.903c0-.297.253-.55.55-.55h1.595c.297 0 .55-.242.55-.55v-1.65c0-1.232.308-2.167 1.012-2.871s1.628-1.056 2.816-1.056c.671 0 1.287.022 1.815.077a.54.54 0 0 1 .484.55v1.606c0 .297-.253.55-.55.55h-1.045q-.858 0-1.188.396-.264.396-.264 1.056v1.342c0 .308.253.55.55.55h1.87a.55.55 0 0 1 .539.627l-.253 1.892a.546.546 0 0 1-.539.484h-1.617a.55.55 0 0 0-.55.55V23H20.8c1.21 0 2.2-.99 2.2-2.2V3.2c0-1.21-.99-2.2-2.2-2.2"></path>
                </svg><!----></a><!----> <a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration:none] hover:[text-decoration:none] bg-grey-700 text-white hover:bg-grey-900 hover:text-white focus-visible:outline-white var(--ds-font-size-xs) [&amp;_svg]:text-grey-200 [&amp;:hover&gt;svg]:text-white py-[0.375rem] px-[0.75rem] rounded-full inline-flex items-center gap-1" href="https://x.com/intent/tweet?url=https%3A%2F%2Fstake1039.com%2Fblog%2Fwhat-is-crypto-gambling-guide&amp;text=x.com+%28Twitter%29&amp;hashtags=stake" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="" target="_blank" rel="external noreferrer noopener"><!----><svg data-ds-icon="Twitter" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                  <path fill="currentColor" d="M18.38 2h3.37l-7.4 8.49L23 22h-6.79l-5.31-7-6.08 7H1.44l7.84-9.08L1 2h6.96l4.8 6.39zM17.2 20.01h1.87L6.97 3.92H4.96z"></path>
                </svg><!----></a><!----></span>
          </div>
          <img class="hero svelte-1wssqgl" alt="<?php echo htmlspecialchars($translations['image_alt_news_content']); ?>" src="https://cdn.sanity.io/images/tdrhge4k/stake-com-production/d68bd0a099ad02439a139635afb292367f3f1614-2400x1260.jpg?q=80&auto=format">
          <div class="content-block svelte-k165h5">
            <?php
            echo generateHeading('deposit_withdraw_heading', $translations, [], 'How_to_Deposit_&_Withdraw_Local_Currency_on_Stake_-_Local_Currency_Guide');
            echo generateParagraph('intro_text', $translations, [
              'Stake Casino' => ['href' => '/casino/home', 'textKey' => 'stake_casino_text'],
              'online slots' => ['href' => '/casino/group/slots', 'textKey' => 'online_slots_text'],
              'live dealer casino games' => ['href' => '/casino/group/live-casino', 'textKey' => 'live_casino_games_text'],
              'Sportsbook' => ['href' => '/sports/home', 'textKey' => 'sportsbook_text'],
              'Stake.com' => ['href' => '/casino/home', 'textKey' => 'stake_com_text']
            ]);
            echo generateParagraph('intro_text_2', $translations);
            echo generateParagraph('intro_text_3', $translations);
            echo generateHeading('payment_methods_heading', $translations, [], 'Overview_of_Payment_Methods');
            echo generateParagraph('payment_methods_text', $translations);
            echo generateHeading('crypto_transactions_heading', $translations, ['tag' => 'h3', 'size' => 'md', 'class' => 'text-neutral-default ds-heading-md'], 'Transacting_with_Crypto');
            echo generateParagraph('crypto_transactions_text', $translations, [
              'BTC' => ['href' => '/blog/what-is-bitcoin', 'textKey' => 'crypto_btc'],
              'ETH' => ['href' => '/blog/what-is-ethereum-eth-crypto-betting', 'textKey' => 'crypto_eth'],
              'USDT' => ['href' => '/blog/what-is-tether-usdt-crypto', 'textKey' => 'crypto_usdt'],
              'EOS' => ['href' => '/blog/eos-on-stake', 'textKey' => 'crypto_eos'],
              'Doge' => ['href' => '/blog/what-is-dogecoin-crypto-guide', 'textKey' => 'crypto_doge'],
              'LTC' => ['href' => '/blog/what-is-litecoin-ltc-crypto-betting', 'textKey' => 'crypto_ltc'],
              'SOL' => ['href' => '/blog/what-is-solana-sol-crypto-coin', 'textKey' => 'crypto_sol'],
              'TRX' => ['href' => '/blog/what-is-tron-trx-crypto-guide', 'textKey' => 'crypto_trx'],
              'list of available cryptocurrencies' => ['href' => '/blog/what-crypto-does-stake-offer', 'textKey' => 'crypto_list_text'],
              'guide for choosing the right coin' => ['href' => '/blog/choosing-crypto-coin-guide', 'textKey' => 'crypto_guide_text']
            ]);
            echo generateParagraph('crypto_purchase_text', $translations, [
              'crypto exchange' => ['href' => '/blog/what-is-a-cryptocurrency-exchange', 'textKey' => 'crypto_exchange_text'],
              'Mesh' => ['href' => '/blog/what-is-mesh-crypto-deposit-integration', 'textKey' => 'mesh_text'],
              'Moonpay' => ['href' => 'https://www.moonpay.com/', 'textKey' => 'moonpay_text', 'external' => true],
              'Swapped.com' => ['href' => 'https://swapped.com/', 'textKey' => 'swapped_com_text', 'external' => true],
              'buy your chosen crypto' => ['href' => '/blog/how-to-buy-crypto-on-stake', 'textKey' => 'buy_crypto_text']
            ]);
            echo generateParagraph('crypto_purchase_text_2', $translations, [
              'crypto exchange' => ['href' => '/blog/what-is-a-cryptocurrency-exchange', 'textKey' => 'crypto_exchange_text'],
              'Mesh' => ['href' => '/blog/what-is-mesh-crypto-deposit-integration', 'textKey' => 'mesh_text'],
              'Moonpay' => ['href' => 'https://www.moonpay.com/', 'textKey' => 'moonpay_text', 'external' => true],
              'Swapped.com' => ['href' => 'https://swapped.com/', 'textKey' => 'swapped_com_text', 'external' => true],
              'buy your chosen crypto' => ['href' => '/blog/how-to-buy-crypto-on-stake', 'textKey' => 'buy_crypto_text']
            ]);
            echo generateHeading('local_currencies_heading', $translations, ['tag' => 'h3', 'size' => 'md', 'class' => 'text-neutral-default ds-heading-md'], 'Transacting_with_Local_Currencies');
            echo generateParagraph('local_currencies_text', $translations, [
              'knowledge base' => ['href' => 'https://help.stake.com/en/collections/5701792-local-currency', 'textKey' => 'knowledge_base_text', 'external' => true]
            ]);
            echo generateHeading('available_currencies_heading', $translations, [], 'Which_Local_Currencies_Are_Available_to_Me?');
            echo generateParagraph('available_currencies_text', $translations);
            echo generateParagraph('currency_guides_text', $translations, [
              'Canadian Dollars' => ['href' => '/blog/how-to-deposit-canadian-dollars-cad', 'textKey' => 'cad_text'],
              'Turkish Lira' => ['href' => '/blog/how-to-deposit-turkish-lira-try', 'textKey' => 'try_text'],
              'Vietnamese Dong' => ['href' => '/blog/how-to-deposit-vietnamese-dong-vnd', 'textKey' => 'vnd_text'],
              'Argentine Pesos' => ['href' => '/blog/how-to-deposit-argentine-pesos-ars', 'textKey' => 'ars_text'],
              'Chilean Pesos' => ['href' => '/blog/how-to-deposit-chilean-pesos-clp', 'textKey' => 'clp_text'],
              'Mexican Pesos' => ['href' => '/blog/how-to-deposit-mexican-pesos-mxn', 'textKey' => 'mxn_text'],
              'USD in Ecuador' => ['href' => '/blog/how-to-deposit-usd-ecuador-currency', 'textKey' => 'usd_ecuador_text'],
              'Indian Rupees' => ['href' => '/blog/how-to-deposit-indian-rupees-inr', 'textKey' => 'inr_text']
            ]);
            echo generateParagraph('balance_currencies_text', $translations);
            echo generateHeading('crypto_vs_local_heading', $translations, [], 'Difference_Between_Crypto_&_Local_Currencies');
            echo generateParagraph('crypto_definition_text', $translations);
            echo generateParagraph('fiat_definition_text', $translations);
            echo generateParagraph('balance_conversion_text', $translations);
            echo generateParagraph('balance_settings_text', $translations);
            echo generateParagraph('balance_fluctuation_text', $translations);
            echo generateHeading('deposit_withdraw_local_heading', $translations, [], 'How_to_Deposit_Funds_&_Make_Withdrawals_in_Local_Currency');
            echo generateParagraph('deposit_withdraw_local_text', $translations);
            echo generateHeading('wager_requirements_heading', $translations, [], 'What_are_the_Wager_Requirements_for_Withdrawals?');
            echo generateParagraph('wager_requirements_text', $translations, [
              'Terms & Conditions' => ['href' => '/policies/terms', 'textKey' => 'terms_conditions_text']
            ]);
            echo generateParagraph('wager_requirements_text_2', $translations);
            echo generateParagraph('wager_requirements_text_3', $translations);
            echo generateParagraph('wager_requirements_info_text', $translations, [
              'active wager requirement' => ['href' => 'https://help.stake.com/en/articles/9609776-can-i-withdraw-or-deposit-funds-while-i-have-an-active-wager-requirement#h_99c1c2b527', 'textKey' => 'active_wager_text', 'external' => true]
            ]);
            echo generateHeading('secure_transactions_heading', $translations, [], 'Secure_Transactions_when_Gambling_Online');
            echo generateParagraph('secure_transactions_text', $translations);
            echo generateParagraph('secure_transactions_text_2', $translations);
            echo generateParagraph('secure_transactions_text_3', $translations);
            echo generateHeading('transaction_safety_tips_heading', $translations, [], 'Tips_for_Safely_Navigating_Transactions_Online');
            echo generateParagraph('transaction_safety_tips_text', $translations, [
              'crypto security' => ['href' => '/blog/is-crypto-gambling-safe', 'textKey' => 'crypto_security_text']
            ]);
            echo generateParagraph('transaction_safety_tips_text_2', $translations);
            echo generateParagraph('transaction_safety_tips_text_3', $translations, [
              'responsible gambling' => ['href' => '/blog/responsible-gambling-online-guide-stake-smart', 'textKey' => 'responsible_gambling_text'],
              'Stake Smart' => ['href' => '/responsible-gambling/stake-smart', 'textKey' => 'stake_smart_text'],
              'betting limits and budgeting guide' => ['href' => '/blog/how-much-to-gamble-budget-calculator', 'textKey' => 'budget_guide_text'],
              'budgeting calculator' => ['href' => '/responsible-gambling/calculator', 'textKey' => 'budget_calculator_text']
            ]);
            echo generateHeading('support_contact_heading', $translations, [], 'Who_Can_I_Contact_For_Further_Support?');
            echo generateParagraph('support_contact_text', $translations, [
              'customer support guide' => ['href' => '/blog/stake-customer-support-guide', 'textKey' => 'customer_support_guide_text']
            ]);
            echo generateParagraph('support_contact_text_2', $translations, [
              'how-to guides' => ['href' => '/blog/category/how-to-guides', 'textKey' => 'how_to_guides_text'],
              'navigating the world of online casinos' => ['href' => '/blog/online-casino-guide', 'textKey' => 'online_casino_guide_text'],
              'slot machine symbols' => ['href' => '/blog/slot-machine-symbols-guide', 'textKey' => 'slot_symbols_text'],
              'bonus round features' => ['href' => '/blog/free-spins-bonus-rounds-guide', 'textKey' => 'bonus_rounds_text'],
              'placing bets on our Sportsbook' => ['href' => '/blog/sports-betting-guide', 'textKey' => 'sports_betting_guide_text']
            ]);
            echo generateParagraph('community_support_text', $translations, [
              'Learn how to register an account' => ['href' => '/blog/what-is-stake-community-forum', 'textKey' => 'register_community_text'],
              'Stake Community Forum' => ['href' => 'https://stakecommunity.com/', 'textKey' => 'community_forum_text', 'external' => true]
            ]);
            ?>
          </div>
        </article>
      </div>
    </div>
  </div>
  <?php render_footer($translations); ?>
</div>