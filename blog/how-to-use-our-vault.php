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
            <a class="inline-flex relative items-center gap-2 justify-center [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition [text-decoration:none] hover:[text-decoration:none] bg-grey-700 text-white hover:bg-grey-900 hover:text-white focus-visible:outline-white var(--ds-font-size-sm) [&amp;_svg]:text-grey-200 [&amp;:hover&gt;svg]:text-white py-[0.625rem] px-[1.25rem] shadow-none rounded-(--ds-radius-md)" href="/" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="off">
              <svg data-ds-icon="ChevronLeft" width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
                <path fill="currentColor" d="M14.293 5.293a1 1 0 1 1 1.414 1.414L10.414 12l5.293 5.293.068.076a1 1 0 0 1-1.406 1.406l-.076-.068-6-6a1 1 0 0 1 0-1.414z"></path>
              </svg>
            </a>
            <button type="button" tabindex="0" class="inline-flex relative items-center gap-2 justify-center [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition bg-grey-700 text-white hover:bg-grey-900 hover:text-white focus-visible:outline-white var(--ds-font-size-sm) [&amp;_svg]:text-grey-200 [&amp;:hover&gt;svg]:text-white py-[0.625rem] px-[1.25rem] shadow-none rounded-(--ds-radius-md) overflow-hidden" data-button-root="">
              <span tag="span" type="body" size="md" strong="true" class="ds-body-md-strong truncate" data-ds-text="true"><?php echo $translations['page_title_vault'];
                                                                                                                          ?></span>
            </button>
          </div>
          <?php
          echo generateHeading('page_title_vault', $translations, ['tag' => 'h1', 'size' => 'xl', 'class' => 'text-neutral-default ds-heading-xl']);
          ?>
          <div class="share-wrapper flex items-center svelte-1wssqgl">
            <span type="body" tag="span" size="sm" class="ds-body-sm" data-ds-text="true"><?php echo htmlspecialchars($translations['share_date']); ?></span>
            <span type="body" tag="span" size="md" class="ds-body-md flex gap-4" data-ds-text="true"><!----><!----><a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration:none] hover:[text-decoration:none] bg-grey-700 text-white hover:bg-grey-900 hover:text-white focus-visible:outline-white var(--ds-font-size-xs) [&amp;_svg]:text-grey-200 [&amp;:hover&gt;svg]:text-white px-[0.75rem] rounded-full inline-flex items-center gap-1 py-3" href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Fstake1039.com%2Fblog%2Fwhat-is-crypto-gambling-guide" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="" target="_blank" rel="external noreferrer noopener"><!----><svg data-ds-icon="Facebook" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                  <path fill="currentColor" d="M20.8 1H3.2C1.99 1 1 1.99 1 3.2v17.6c0 1.21.99 2.2 2.2 2.2h10.373v-7.249a.55.55 0 0 0-.55-.55h-1.595a.56.56 0 0 1-.55-.55v-1.903c0-.297.253-.55.55-.55h1.595c.297 0 .55-.242.55-.55v-1.65c0-1.232.308-2.167 1.012-2.871s1.628-1.056 2.816-1.056c.671 0 1.287.022 1.815.077a.54.54 0 0 1 .484.55v1.606c0 .297-.253.55-.55.55h-1.045q-.858 0-1.188.396-.264.396-.264 1.056v1.342c0 .308.253.55.55.55h1.87a.55.55 0 0 1 .539.627l-.253 1.892a.546.546 0 0 1-.539.484h-1.617a.55.55 0 0 0-.55.55V23H20.8c1.21 0 2.2-.99 2.2-2.2V3.2c0-1.21-.99-2.2-2.2-2.2"></path>
                </svg><!----></a><!----> <a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration:none] hover:[text-decoration:none] bg-grey-700 text-white hover:bg-grey-900 hover:text-white focus-visible:outline-white var(--ds-font-size-xs) [&amp;_svg]:text-grey-200 [&amp;:hover&gt;svg]:text-white py-[0.375rem] px-[0.75rem] rounded-full inline-flex items-center gap-1" href="https://x.com/intent/tweet?url=https%3A%2F%2Fstake1039.com%2Fblog%2Fwhat-is-crypto-gambling-guide&amp;text=x.com+%28Twitter%29&amp;hashtags=stake" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="" target="_blank" rel="external noreferrer noopener"><!----><svg data-ds-icon="Twitter" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                  <path fill="currentColor" d="M18.38 2h3.37l-7.4 8.49L23 22h-6.79l-5.31-7-6.08 7H1.44l7.84-9.08L1 2h6.96l4.8 6.39zM17.2 20.01h1.87L6.97 3.92H4.96z"></path>
                </svg><!----></a><!----></span>
          </div>
          <img class="hero svelte-1wssqgl" alt="<?php echo htmlspecialchars($translations['image_alt_news_content']); ?>" src="https://cdn.sanity.io/images/tdrhge4k/stake-com-production/b1c5d0bcdbd6d8e95cf55d3d90ea0119a975617a-2400x1260.jpg?q=80&auto=format">
          <div class="content-block svelte-k165h5">
            <?php
            echo generateHeading('vault_explained_heading', $translations, [], 'The_Stake_Vault_Explained:_How_to_Use_Our_Online_Vault_to_Store_Funds');
            echo generateParagraph('vault_explained_text', $translations, [
              'casino_games' => ['href' => '/casino/home', 'textKey' => 'casino_text'],
              'sports' => ['href' => '/sports/home', 'textKey' => 'sports_text']
            ]);
            echo generateParagraph('vault_explained_text_2', $translations, [
              'Stake.com' => ['href' => '/', 'textKey' => 'stake_com_text']
            ]);
            echo generateHeading('what_is_vault_heading', $translations, [], 'What_is_the_Vault_on_Stake.com?');
            echo generateParagraph('what_is_vault_text', $translations, [
              'blockchain' => ['href' => '/blog/stake-and-the-blockchain', 'textKey' => 'blockchain_text']
            ]);
            echo generateParagraph('vault_promotions_text', $translations);
            echo generateHeading('access_vault_heading', $translations, [], 'How_Do_You_Access_the_Vault?');
            echo generateParagraph('access_vault_intro', $translations);
            echo '<ul class="svelte-42q2bt">';
            $accessSteps = ['access_step_1', 'access_step_2', 'access_step_3', 'access_step_4', 'access_step_5'];
            foreach ($accessSteps as $index => $stepKey) {
              $linkData = ($index === 2) ? ['href' => '/?operation=deposit&currency=btc&modal=vault', 'textKey' => 'account_vault_text'] : null;
              echo generateListItem($stepKey, $translations, $linkData);
            }
            echo '</ul>';
            echo generateParagraph('access_vault_security', $translations);
            echo generateHeading('use_vault_heading', $translations, [], 'How_Do_You_Use_the_Vault?');
            echo generateParagraph('use_vault_text', $translations);
            echo generateParagraph('use_vault_text_2', $translations, [
              'cards' => ['href' => '/casino/group/cards', 'textKey' => 'cards_text'],
              'dice' => ['href' => '/casino/group/dice', 'textKey' => 'dice_text'],
              'slots' => ['href' => '/casino/group/slots', 'textKey' => 'slots_text'],
              'live' => ['href' => '/sports/live', 'textKey' => 'live_text'],
              'upcoming' => ['href' => '/sports/upcoming', 'textKey' => 'upcoming_text']
            ]);
            echo generateHeading('vault_purpose_heading', $translations, [], 'What_is_the_Vault_Used_for?');
            echo generateParagraph('vault_purpose_text', $translations, [
              'casino_offers' => ['href' => '/promotions/category/casino', 'textKey' => 'casino_offers_text'],
              'giveaway_prizes' => ['href' => '/promotions/promotion/weekly-giveaway', 'textKey' => 'giveaway_prizes_text'],
              'weekly_promotions' => ['href' => '/promotions/promotion/challenges', 'textKey' => 'weekly_promotions_text']
            ]);
            echo generateParagraph('vault_purpose_text_2', $translations, [
              'monthly_bonuses' => ['href' => '/blog/how-do-monthly-bonuses-work', 'textKey' => 'monthly_bonuses_text'],
              'stake_vip' => ['href' => '/blog/how-to-become-a-vip-on-stake', 'textKey' => 'stake_vip_text'],
              'exclusive_rewards' => ['href' => '/blog/vip-program-levels-benefits-rewards', 'textKey' => 'exclusive_rewards_text'],
              'Stake VIP Club' => ['href' => '/vip-club', 'textKey' => 'stake_vip_club_text']
            ]);
            echo generateParagraph('vault_purpose_text_3', $translations);
            echo generateHeading('vault_benefits_heading', $translations, [], 'What_Are_the_Benefits_of_Using_the_Vault?');
            echo generateParagraph('vault_benefits_intro', $translations);
            echo '<ul class="svelte-42q2bt">';
            $benefitKeys = ['benefit_1', 'benefit_2', 'benefit_3', 'benefit_4', 'benefit_5', 'benefit_6'];
            foreach ($benefitKeys as $key) {
              echo generateListItem($key, $translations);
            }
            echo '</ul>';
            echo generateHeading('vault_safety_heading', $translations, [], 'Is_Storing_Funds_in_the_Vault_Safe?');
            echo generateParagraph('vault_safety_text', $translations);
            echo generateParagraph('vault_safety_text_2', $translations);
            echo generateHeading('withdraw_funds_heading', $translations, [], 'How_Do_You_Withdraw_Funds_from_the_Vault?');
            echo generateParagraph('withdraw_funds_text', $translations);
            echo generateParagraph('withdraw_funds_text_2', $translations, [
              'deposit_withdrawal_methods' => ['href' => '/blog/deposit-withdrawal-methods-online-betting', 'textKey' => 'deposit_withdrawal_methods_text'],
              'Mesh' => ['href' => '/blog/what-is-mesh-crypto-deposit-integration', 'textKey' => 'mesh_text'],
              'Moonpay' => ['href' => 'https://www.moonpay.com/', 'textKey' => 'moonpay_text', 'external' => true],
              'Swapped.com' => ['href' => 'https://swapped.com/', 'textKey' => 'swapped_com_text', 'external' => true],
              'Passkey feature' => ['href' => 'https://help.stake.com/en/articles/11872129-how-to-use-passkeys-at-stake-com', 'textKey' => 'passkey_feature_text', 'external' => true]
            ]);
            echo generateParagraph('payment_methods_info', $translations, [
              'guide_to_payment_methods' => ['href' => '/blog/deposit-withdrawal-methods-online-betting', 'textKey' => 'guide_to_payment_methods_text']
            ]);
            echo generateHeading('vault_storage_duration_heading', $translations, [], 'How_Long_Can_You_Store_Funds_in_the_Vault?');
            echo generateParagraph('vault_storage_duration_text', $translations);
            echo generateParagraph('vault_storage_duration_text_2', $translations, [
              'how_to_buy_crypto' => ['href' => '/blog/how-to-buy-crypto-on-stake', 'textKey' => 'how_to_buy_crypto_text']
            ]);
            echo generateHeading('vault_crypto_heading', $translations, [], 'What_Crypto_Can_You_Store_in_the_Vault?');
            echo generateParagraph('vault_crypto_text', $translations, [
              'wide_selection_crypto' => ['href' => '/blog/what-crypto-does-stake-offer', 'textKey' => 'wide_selection_crypto_text']
            ]);
            echo '<ul class="svelte-42q2bt">';
            $cryptoLinks = [
              ['key' => 'crypto_btc', 'href' => '/blog/what-is-bitcoin', 'textKey' => 'crypto_btc'],
              ['key' => 'crypto_eth', 'href' => '/blog/what-is-ethereum-eth-crypto-betting', 'textKey' => 'crypto_eth'],
              ['key' => 'crypto_ltc', 'href' => '/blog/what-is-litecoin-ltc-crypto-betting', 'textKey' => 'crypto_ltc'],
              ['key' => 'crypto_doge', 'href' => '/blog/what-is-dogecoin-crypto-guide', 'textKey' => 'crypto_doge'],
              ['key' => 'crypto_sol', 'href' => '/blog/what-is-solana-sol-crypto-coin', 'textKey' => 'crypto_sol'],
              ['key' => 'crypto_eos', 'href' => '/blog/eos-on-stake', 'textKey' => 'crypto_eos'],
              ['key' => 'crypto_usdt', 'href' => '/blog/what-is-tether-usdt-crypto', 'textKey' => 'crypto_usdt'],
              ['key' => 'crypto_bch', 'href' => '', 'textKey' => 'crypto_bch'],
              ['key' => 'crypto_trx', 'href' => '/blog/what-is-tron-trx-crypto-guide', 'textKey' => 'crypto_trx'],
              ['key' => 'crypto_bnb', 'href' => '', 'textKey' => 'crypto_bnb'],
              ['key' => 'crypto_usdc', 'href' => '', 'textKey' => 'crypto_usdc'],
              ['key' => 'crypto_ape', 'href' => '', 'textKey' => 'crypto_ape'],
              ['key' => 'crypto_dai', 'href' => '', 'textKey' => 'crypto_dai'],
              ['key' => 'crypto_link', 'href' => '', 'textKey' => 'crypto_link'],
              ['key' => 'crypto_sand', 'href' => '', 'textKey' => 'crypto_sand'],
              ['key' => 'crypto_shib', 'href' => '', 'textKey' => 'crypto_shib'],
              ['key' => 'crypto_uni', 'href' => '', 'textKey' => 'crypto_uni'],
              ['key' => 'crypto_matic', 'href' => '', 'textKey' => 'crypto_matic'],
              ['key' => 'crypto_cro', 'href' => '', 'textKey' => 'crypto_cro'],
              ['key' => 'crypto_xrp', 'href' => '', 'textKey' => 'crypto_xrp'],
              ['key' => 'crypto_trump', 'href' => '', 'textKey' => 'crypto_trump']
            ];
            foreach ($cryptoLinks as $crypto) {
              echo generateListItem($crypto['key'], $translations, $crypto['href'] ? ['href' => $crypto['href'], 'textKey' => $crypto['textKey']] : null);
            }
            echo '</ul>';
            echo generateParagraph('crypto_learning_text', $translations, [
              'learncrypto_com' => ['href' => 'https://learncrypto.com/my-learning/C001-cryptocurrencies?utm_source=utm-link-genera[…]ign=stake_blogs&utm_term=utm-generator&utm_content=stakeblogs', 'textKey' => 'learncrypto_com_text', 'external' => true]
            ]);
            echo generateHeading('conclusion_heading', $translations, [], 'Conclusion:_Why_You_Should_Utilise_the_Vault_Feature_on_Stake.com');
            echo generateParagraph('conclusion_text', $translations, [
              'best_games' => ['href' => '/casino/group/recommended-slots', 'textKey' => 'best_games_text'],
              'live_casino_games' => ['href' => '/casino/group/live-casino', 'textKey' => 'live_casino_games_text'],
              'table_games' => ['href' => '/casino/group/table-games', 'textKey' => 'table_games_text'],
              'basketball' => ['href' => '/sports/basketball', 'textKey' => 'basketball_text'],
              'American football' => ['href' => '/sports/american-football', 'textKey' => 'american_football_text']
            ]);
            echo generateParagraph('conclusion_text_2', $translations, [
              'casino_promotions' => ['href' => '/promotions/category/casino', 'textKey' => 'casino_promotions_text'],
              'sports_offers' => ['href' => '/promotions/category/sports', 'textKey' => 'sports_offers_text']
            ]);
            echo generateParagraph('conclusion_text_3', $translations, [
              'online_casino_guide' => ['href' => '/blog/online-casino-guide', 'textKey' => 'online_casino_guide_text'],
              'guide_to_sports_betting' => ['href' => '/blog/sports-betting-guide', 'textKey' => 'sports_betting_guide_text']
            ]);
            echo generateParagraph('responsible_gambling_text', $translations, [
              'responsible_gambling_guide' => ['href' => '/blog/responsible-gambling-online-guide-stake-smart', 'textKey' => 'responsible_gambling_guide_text'],
              'budget_calculator' => ['href' => '/responsible-gambling/calculator', 'textKey' => 'budget_calculator_link_text'],
              'how_much_to_gamble' => ['href' => '/blog/how-much-to-gamble-budget-calculator', 'textKey' => 'how_much_to_gamble_text']
            ]);
            ?>
          </div>
        </article>
      </div>
    </div>
  </div>
  <?php render_footer($translations); ?>
</div>