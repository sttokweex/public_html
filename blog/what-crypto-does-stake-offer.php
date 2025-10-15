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
            <?php echo generateButton('crypto_bet_button', $translations); ?>
          </div>
          <?php
          echo generateHeading('crypto_bet_button', $translations, ['tag' => 'h1', 'size' => 'xl', 'class' => 'text-neutral-default ds-heading-xl']);
          ?>
          <div class="share-wrapper flex items-center svelte-1wssqgl">
            <span type="body" tag="span" size="sm" class="ds-body-sm" data-ds-text="true"><?php echo htmlspecialchars($translations['share_date']); ?></span>
            <span type="body" tag="span" size="md" class="ds-body-md flex gap-4" data-ds-text="true"><!----><!----><a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration:none] hover:[text-decoration:none] bg-grey-700 text-white hover:bg-grey-900 hover:text-white focus-visible:outline-white var(--ds-font-size-xs) [&amp;_svg]:text-grey-200 [&amp;:hover&gt;svg]:text-white px-[0.75rem] rounded-full inline-flex items-center gap-1 py-3" href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Fstake1039.com%2Fblog%2Fwhat-is-crypto-gambling-guide" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="" target="_blank" rel="external noreferrer noopener"><!----><svg data-ds-icon="Facebook" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                  <path fill="currentColor" d="M20.8 1H3.2C1.99 1 1 1.99 1 3.2v17.6c0 1.21.99 2.2 2.2 2.2h10.373v-7.249a.55.55 0 0 0-.55-.55h-1.595a.56.56 0 0 1-.55-.55v-1.903c0-.297.253-.55.55-.55h1.595c.297 0 .55-.242.55-.55v-1.65c0-1.232.308-2.167 1.012-2.871s1.628-1.056 2.816-1.056c.671 0 1.287.022 1.815.077a.54.54 0 0 1 .484.55v1.606c0 .297-.253.55-.55.55h-1.045q-.858 0-1.188.396-.264.396-.264 1.056v1.342c0 .308.253.55.55.55h1.87a.55.55 0 0 1 .539.627l-.253 1.892a.546.546 0 0 1-.539.484h-1.617a.55.55 0 0 0-.55.55V23H20.8c1.21 0 2.2-.99 2.2-2.2V3.2c0-1.21-.99-2.2-2.2-2.2"></path>
                </svg><!----></a><!----> <a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration:none] hover:[text-decoration:none] bg-grey-700 text-white hover:bg-grey-900 hover:text-white focus-visible:outline-white var(--ds-font-size-xs) [&amp;_svg]:text-grey-200 [&amp;:hover&gt;svg]:text-white py-[0.375rem] px-[0.75rem] rounded-full inline-flex items-center gap-1" href="https://x.com/intent/tweet?url=https%3A%2F%2Fstake1039.com%2Fblog%2Fwhat-is-crypto-gambling-guide&amp;text=x.com+%28Twitter%29&amp;hashtags=stake" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="" target="_blank" rel="external noreferrer noopener"><!----><svg data-ds-icon="Twitter" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                  <path fill="currentColor" d="M18.38 2h3.37l-7.4 8.49L23 22h-6.79l-5.31-7-6.08 7H1.44l7.84-9.08L1 2h6.96l4.8 6.39zM17.2 20.01h1.87L6.97 3.92H4.96z"></path>
                </svg><!----></a><!----></span>
          </div>
          <img class="hero svelte-1wssqgl" alt="<?php echo htmlspecialchars($translations['image_alt_news_content']); ?>" src="https://cdn.sanity.io/images/tdrhge4k/stake-com-production/a9a959769981e6280c0e946553bd9f7e0f85ee73-1200x630.png?q=80&auto=format">
          <div class="content-block svelte-k165h5">
            <?php
            echo generateHeading('crypto_guide_heading', $translations, [], 'Crypto_Guide_-_Different_Types_of_Cryptocurrencies_at_Stake.com');
            echo generateParagraph('intro_text', $translations, [
              'crypto casino' => ['href' => '/casino/home', 'textKey' => 'crypto_casino_text'],
              'online sportsbook' => ['href' => '/sports/home', 'textKey' => 'online_sportsbook_text'],
              'Stake.com' => ['href' => '/', 'textKey' => 'stake_com_text']
            ]);
            echo generateParagraph('intro_text_2', $translations, [
              'live casino games' => ['href' => '/casino/group/live-casino', 'textKey' => 'live_casino_games_text'],
              'online slots' => ['href' => '/casino/group/slots', 'textKey' => 'online_slots_text'],
              'live matches' => ['href' => '/sports/live', 'textKey' => 'live_matches_text'],
              'upcoming tournaments' => ['href' => '/sports/upcoming', 'textKey' => 'upcoming_tournaments_text']
            ]);
            echo generateParagraph('intro_text_3', $translations);
            echo generateHeading('bitcoin_crypto_heading', $translations, ['tag' => 'h3', 'size' => 'md', 'class' => 'text-neutral-default ds-heading-md'], 'What_are_Bitcoin_&_Cryptocurrency?');
            echo generateParagraph('bitcoin_crypto_text', $translations, [
              'Bitcoin' => ['href' => '/blog/what-is-bitcoin', 'textKey' => 'bitcoin_text']
            ]);
            echo generateParagraph('bitcoin_crypto_text_2', $translations);
            echo generateParagraph('bitcoin_crypto_text_3', $translations);
            echo generateHeading('crypto_offered_heading', $translations, ['tag' => 'h3', 'size' => 'md', 'class' => 'text-neutral-default ds-heading-md'], 'What_Crypto_is_Offered_at_Stake.com?');
            echo generateParagraph('crypto_offered_text', $translations);
            echo '<ul class="svelte-42q2bt">';
            $cryptoList = [
              'crypto_btc' => null,
              'crypto_eth' => null,
              'crypto_ltc' => null,
              'crypto_doge' => null,
              'crypto_bch' => null,
              'crypto_trx' => null,
              'crypto_eos' => null,
              'crypto_usdt' => null,
              'crypto_bnb' => null,
              'crypto_cro' => null,
              'crypto_usdc' => null,
              'crypto_ape' => null,
              'crypto_dai' => null,
              'crypto_link' => null,
              'crypto_sand' => null,
              'crypto_shib' => null,
              'crypto_uni' => null,
              'crypto_matic' => null,
              'crypto_sol' => null,
              'crypto_xrp' => null,
              'crypto_trump' => null
            ];
            foreach ($cryptoList as $key => $linkData) {
              echo generateListItem($key, $translations, $linkData);
            }
            echo '</ul>';
            echo generateParagraph('learn_crypto_text', $translations, [
              'learncrypto.com' => ['href' => 'https://learncrypto.com/my-learning/C001-cryptocurrencies?utm_source=utm-link-genera[…]ign=stake_blogs&utm_term=utm-generator&utm_content=stakeblogs', 'textKey' => 'learncrypto_com_text', 'external' => true]
            ]);
            echo generateHeading('bitcoin_heading', $translations, ['tag' => 'h4', 'size' => 'sm', 'class' => 'text-neutral-default ds-heading-sm'], 'Bitcoin_(BTC)');
            echo generateParagraph('bitcoin_text', $translations, [
              'is much easier to track' => ['href' => '/blog/understanding-the-bitcoin-price-chart', 'textKey' => 'bitcoin_track_text']
            ]);
            echo generateParagraph('bitcoin_text_2', $translations, [
              'Most players on Stake use Bitcoin' => ['href' => '/blog/who-uses-bitcoin', 'textKey' => 'bitcoin_use_text']
            ]);
            echo generateParagraph('bitcoin_text_3', $translations);
            echo generateParagraph('bitcoin_text_4', $translations, [
              'full guide on Bitcoin' => ['href' => '/blog/what-is-bitcoin', 'textKey' => 'bitcoin_guide_text']
            ]);
            echo generateHeading('ethereum_heading', $translations, ['tag' => 'h4', 'size' => 'sm', 'class' => 'text-neutral-default ds-heading-sm'], 'Ethereum_(ETH)');
            echo generateParagraph('ethereum_text', $translations);
            echo generateParagraph('ethereum_text_2', $translations);
            echo generateParagraph('ethereum_text_3', $translations, [
              'staking with Ethereum' => ['href' => '/blog/what-is-ethereum-eth-crypto-betting', 'textKey' => 'ethereum_staking_text']
            ]);
            echo generateHeading('litecoin_heading', $translations, ['tag' => 'h4', 'size' => 'sm', 'class' => 'text-neutral-default ds-heading-sm'], 'Litecoin_(LTC)');
            echo generateParagraph('litecoin_text', $translations);
            echo generateParagraph('litecoin_text_2', $translations);
            echo generateParagraph('litecoin_text_3', $translations);
            echo generateParagraph('litecoin_text_4', $translations, [
              'Litecoin with our guide' => ['href' => '/blog/what-is-litecoin-ltc-crypto-betting', 'textKey' => 'litecoin_guide_text']
            ]);
            echo generateHeading('dogecoin_heading', $translations, ['tag' => 'h4', 'size' => 'sm', 'class' => 'text-neutral-default ds-heading-sm'], 'Dogecoin_(DOGE)');
            echo generateParagraph('dogecoin_text', $translations, [
              'Dogecoin' => ['href' => '/blog/what-is-dogecoin-crypto-guide', 'textKey' => 'dogecoin_text_link']
            ]);
            echo generateParagraph('dogecoin_text_2', $translations);
            echo generateParagraph('dogecoin_text_3', $translations);
            echo generateHeading('bitcoin_cash_heading', $translations, ['tag' => 'h4', 'size' => 'sm', 'class' => 'text-neutral-default ds-heading-sm'], 'Bitcoin_Cash_(BCH)');
            echo generateParagraph('bitcoin_cash_text', $translations);
            echo generateParagraph('bitcoin_cash_text_2', $translations);
            echo generateParagraph('bitcoin_cash_text_3', $translations);
            echo generateParagraph('bitcoin_cash_text_4', $translations);
            echo generateHeading('tron_heading', $translations, ['tag' => 'h4', 'size' => 'sm', 'class' => 'text-neutral-default ds-heading-sm'], 'Tron_(TRX)');
            echo generateParagraph('tron_text', $translations, [
              'Tron' => ['href' => '/blog/what-is-tron-trx-crypto-guide', 'textKey' => 'tron_text_link']
            ]);
            echo generateParagraph('tron_text_2', $translations);
            echo generateHeading('eos_heading', $translations, ['tag' => 'h4', 'size' => 'sm', 'class' => 'text-neutral-default ds-heading-sm'], 'EOS_(EOS)');
            echo generateParagraph('eos_text', $translations, [
              'EOS' => ['href' => '/blog/eos-on-stake', 'textKey' => 'eos_text_link']
            ]);
            echo generateParagraph('eos_text_2', $translations, [
              'why you should switch to EOS' => ['href' => '/blog/why-you-should-switch-to-eos-on-stake', 'textKey' => 'eos_switch_text']
            ]);
            echo generateHeading('usdt_heading', $translations, ['tag' => 'h4', 'size' => 'sm', 'class' => 'text-neutral-default ds-heading-sm'], 'Tether_(USDT)');
            echo generateParagraph('usdt_text', $translations, [
              'Tether Coin' => ['href' => '/blog/what-is-tether-usdt-crypto', 'textKey' => 'usdt_coin_text']
            ]);
            echo generateParagraph('usdt_text_2', $translations);
            echo generateHeading('bnb_heading', $translations, ['tag' => 'h4', 'size' => 'sm', 'class' => 'text-neutral-default ds-heading-sm'], 'Binance_Coin_(BNB)');
            echo generateParagraph('bnb_text', $translations);
            echo generateHeading('cro_heading', $translations, ['tag' => 'h4', 'size' => 'sm', 'class' => 'text-neutral-default ds-heading-sm'], 'Cronos_(CRO)');
            echo generateParagraph('cro_text', $translations);
            echo generateHeading('usdc_heading', $translations, ['tag' => 'h4', 'size' => 'sm', 'class' => 'text-neutral-default ds-heading-sm'], 'USD_Coin_(USDC)');
            echo generateParagraph('usdc_text', $translations);
            echo generateParagraph('usdc_text_2', $translations);
            echo generateHeading('ape_heading', $translations, ['tag' => 'h4', 'size' => 'sm', 'class' => 'text-neutral-default ds-heading-sm'], 'ApeCoin_(APE)');
            echo generateParagraph('ape_text', $translations);
            echo generateParagraph('ape_text_2', $translations);
            echo generateHeading('dai_heading', $translations, ['tag' => 'h4', 'size' => 'sm', 'class' => 'text-neutral-default ds-heading-sm'], 'Dai_(DAI)');
            echo generateParagraph('dai_text', $translations);
            echo generateParagraph('dai_text_2', $translations);
            echo generateParagraph('dai_text_3', $translations);
            echo generateParagraph('dai_text_4', $translations);
            echo generateParagraph('dai_text_5', $translations);
            echo generateHeading('link_heading', $translations, ['tag' => 'h4', 'size' => 'sm', 'class' => 'text-neutral-default ds-heading-sm'], 'Chainlink_(LINK)');
            echo generateParagraph('link_text', $translations);
            echo generateParagraph('link_text_2', $translations);
            echo generateParagraph('link_text_3', $translations);
            echo generateParagraph('link_text_4', $translations);
            echo generateHeading('sand_heading', $translations, ['tag' => 'h4', 'size' => 'sm', 'class' => 'text-neutral-default ds-heading-sm'], 'The_Sandbox_(SAND)');
            echo generateParagraph('sand_text', $translations);
            echo generateParagraph('sand_text_2', $translations);
            echo generateParagraph('sand_text_3', $translations);
            echo generateHeading('shib_heading', $translations, ['tag' => 'h4', 'size' => 'sm', 'class' => 'text-neutral-default ds-heading-sm'], 'Shiba_Inu_(SHIB)');
            echo generateParagraph('shib_text', $translations);
            echo generateParagraph('shib_text_2', $translations);
            echo generateParagraph('shib_text_3', $translations);
            echo generateHeading('uni_heading', $translations, ['tag' => 'h4', 'size' => 'sm', 'class' => 'text-neutral-default ds-heading-sm'], 'Uniswap_(UNI)');
            echo generateParagraph('uni_text', $translations);
            echo generateParagraph('uni_text_2', $translations);
            echo generateHeading('matic_heading', $translations, ['tag' => 'h4', 'size' => 'sm', 'class' => 'text-neutral-default ds-heading-sm'], 'Polygon_(MATIC)');
            echo generateParagraph('matic_text', $translations);
            echo generateParagraph('matic_text_2', $translations);
            echo generateHeading('sol_heading', $translations, ['tag' => 'h4', 'size' => 'sm', 'class' => 'text-neutral-default ds-heading-sm'], 'Solana_(SOL)');
            echo generateParagraph('sol_text', $translations);
            echo generateParagraph('sol_text_2', $translations);
            echo generateHeading('trump_heading', $translations, ['tag' => 'h4', 'size' => 'sm', 'class' => 'text-neutral-default ds-heading-sm'], 'TrumpCoin_(TRUMP)');
            echo generateParagraph('trump_text', $translations);
            echo generateHeading('choose_crypto_heading', $translations, ['tag' => 'h3', 'size' => 'md', 'class' => 'text-neutral-default ds-heading-md'], 'How_to_Choose_Which_Crypto_Coin_is_Right_for_You?');
            echo generateParagraph('choose_crypto_text', $translations);
            echo generateParagraph('choose_crypto_text_2', $translations);
            echo generateParagraph('choose_crypto_text_3', $translations);
            echo generateParagraph('choose_crypto_text_4', $translations);
            echo generateHeading('deposit_withdraw_heading', $translations, ['tag' => 'h3', 'size' => 'md', 'class' => 'text-neutral-default ds-heading-md'], 'How_to_Deposit_&_Withdraw_Cryptocurrency_on_Stake_Casino_&_Sportsbook');
            echo generateParagraph('deposit_withdraw_text', $translations);
            echo '<ol class="svelte-q82j6">';
            $depositSteps = ['deposit_step_1', 'deposit_step_2', 'deposit_step_3', 'deposit_step_4'];
            foreach ($depositSteps as $stepKey) {
              $strongText = strpos($stepKey, 'step_4') !== false ? 'Step 4 (Optional)' : explode('_', $stepKey)[2]; // Adjust for optional
              echo "<li class=\"level-1 svelte-q82j6\"><p type=\"body\" tag=\"p\" size=\"md\" class=\"ds-body-md inline-text\" data-ds-text=\"true\"><span type=\"body\" size=\"md\" tag=\"span\" strong=\"true\" class=\"ds-body-md-strong\" data-ds-text=\"true\">$strongText</span><span type=\"body\" size=\"md\" tag=\"span\" strong=\"false\" class=\"ds-body-md\" data-ds-text=\"true\">{$translations[$stepKey]}</span></p></li>";
            }
            echo '</ol>';
            echo generateParagraph('crypto_list_text', $translations, [
              'list of available cryptocurrencies' => ['href' => '/blog/what-crypto-does-stake-offer', 'textKey' => 'crypto_list_text_link'],
              'guide for choosing the right coin' => ['href' => '/blog/choosing-crypto-coin-guide', 'textKey' => 'crypto_guide_text']
            ]);
            echo generateParagraph('buy_crypto_text', $translations, [
              'Moonpay' => ['href' => 'https://www.moonpay.com/', 'textKey' => 'moonpay_text', 'external' => true],
              'Mesh' => ['href' => '/blog/what-is-mesh-crypto-deposit-integration', 'textKey' => 'mesh_text'],
              'Swapped.com' => ['href' => 'https://swapped.com/', 'textKey' => 'swapped_com_text', 'external' => true],
              'buy your chosen crypto' => ['href' => '/blog/how-to-buy-crypto-on-stake', 'textKey' => 'buy_crypto_text_link']
            ]);
            echo generateParagraph('support_text', $translations, [
              'customer support staff' => ['href' => '/blog/stake-customer-support-guide', 'textKey' => 'customer_support_text'],
              'depositing and withdrawing units' => ['href' => '/blog/deposit-withdrawal-methods-online-betting', 'textKey' => 'deposit_withdraw_units_text']
            ]);
            echo generateParagraph('vault_text', $translations, [
              'Stake Vault' => ['href' => '/blog/how-to-use-our-vault', 'textKey' => 'stake_vault_text'],
              'crypto security guide' => ['href' => '/blog/is-crypto-gambling-safe', 'textKey' => 'crypto_security_guide_text']
            ]);
            echo generateHeading('responsible_gambling_heading', $translations, ['tag' => 'h3', 'size' => 'md', 'class' => 'text-neutral-default ds-heading-md'], 'Responsible_Gambling');
            echo generateParagraph('responsible_gambling_text', $translations);
            echo generateParagraph('responsible_gambling_text_2', $translations, [
              'budget calculator' => ['href' => '/responsible-gambling/calculator', 'textKey' => 'budget_calculator_text'],
              'responsible gambling guide' => ['href' => '/blog/responsible-gambling-online-guide-stake-smart', 'textKey' => 'responsible_gambling_guide_text'],
              'Stake Smart guidelines' => ['href' => '/responsible-gambling/stake-smart', 'textKey' => 'stake_smart_text']
            ]);
            echo generateHeading('promotions_vip_heading', $translations, ['tag' => 'h3', 'size' => 'md', 'class' => 'text-neutral-default ds-heading-md'], 'Casino_Promotions_&_VIP_Club_at_Stake.com');
            echo generateParagraph('promotions_vip_text', $translations, [
              'monthly bonuses' => ['href' => '/blog/how-do-monthly-bonuses-work', 'textKey' => 'monthly_bonuses_text'],
              'exclusive rewards' => ['href' => '/blog/vip-program-levels-benefits-rewards', 'textKey' => 'exclusive_rewards_text'],
              'Stake VIP Club' => ['href' => '/vip-club', 'textKey' => 'stake_vip_club_text']
            ]);
            echo generateParagraph('promotions_vip_text_2', $translations, [
              'online casino guide' => ['href' => '/blog/online-casino-guide', 'textKey' => 'online_casino_guide_text'],
              'sports betting guide' => ['href' => '/blog/sports-betting-guide', 'textKey' => 'sports_betting_guide_text']
            ]);
            ?>
          </div>
        </article>
      </div>
    </div>
  </div>
  <?php render_footer($translations); ?>
</div>