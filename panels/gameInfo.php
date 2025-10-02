<?php
function renderCasinoComponent($translations)
{

  $svg_external_link = '<svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon " style=""> <title></title> <path d="M24.059 3.766v7.058H10.824v42.352h42.352V39.94h7.058v20.293H3.766V3.766zm36.18 0V24.94h-7.06v-9.12l-25.3 25.296-4.992-4.996 25.297-25.297h-9.125V3.766z"></path></svg>'; // Здесь был SVG для внешних ссылок, оставлен пустым
?>

  <div class="see-more " data-content="">
    <div class="see-more-content ">
      <div class="see-more-column-container" style="column-count: 2;">
        <div class="see-more-content-block">
          <h1><span id="main_title"><?php echo htmlspecialchars($translations['main_title']); ?></span></h1>
          <p><span><?php echo htmlspecialchars($translations['intro_since_2017']); ?></span><a href="/ru">Stake.com</a><span><?php echo htmlspecialchars($translations['intro_cryptocurrencies']); ?></span></p>
          <p><span><?php echo htmlspecialchars($translations['stake_originals_intro']); ?></span><a href="/ru/casino/home"><?php echo htmlspecialchars($translations['online_casino_platform']); ?></a><span><?php echo htmlspecialchars($translations['stake_originals_growth']); ?></span><a href="/ru/blog/online-vs-offline-slot-machines"><?php echo htmlspecialchars($translations['online_slots']); ?></a><span><?php echo htmlspecialchars($translations['live_dealer_games']); ?></span></p>
          <p><span><?php echo htmlspecialchars($translations['anniversary_intro']); ?></span><a href="/ru/blog/birthday-wins-best-games-bet-bonuses"><?php echo htmlspecialchars($translations['stake_birthday']); ?></a><span><?php echo htmlspecialchars($translations['anniversary_achievements']); ?></span><a href="/ru/blog/2024-online-gambling-betting-statistics-trends"><?php echo htmlspecialchars($translations['year_2024_review']); ?></a><span>.</span></p>
          <p><span><?php echo htmlspecialchars($translations['big_wins_info']); ?></span></p>
          <p><span><?php echo htmlspecialchars($translations['new_releases_info']); ?></span></p>
          <h2><span id="available_casino_games"><?php echo htmlspecialchars($translations['available_casino_games']); ?></span></h2>
          <p><span><?php echo htmlspecialchars($translations['game_variety_intro']); ?></span><a href="/ru/provably-fair/overview"><?php echo htmlspecialchars($translations['provably_fair_games']); ?></a><span><?php echo htmlspecialchars($translations['game_categories']); ?></span><a href="/ru/blog/understanding-random-number-generators-rngs"><?php echo htmlspecialchars($translations['rng']); ?></a><span><?php echo htmlspecialchars($translations['browser_based_games']); ?></span></p>
          <p><span><?php echo htmlspecialchars($translations['guides_intro']); ?></span><a href="/ru/blog/category/how-to-guides"><?php echo htmlspecialchars($translations['guides']); ?></a><span><?php echo htmlspecialchars($translations['guides_for_beginners']); ?></span><a href="/ru/blog/best-online-casino-games-for-beginners"><?php echo htmlspecialchars($translations['beginner_games']); ?></a><span><?php echo htmlspecialchars($translations['guides_for_experienced']); ?></span></p>
          <h3><span id="stake_originals"><?php echo htmlspecialchars($translations['stake_originals']); ?></span></h3>
          <p><span><?php echo htmlspecialchars($translations['stake_originals_collection']); ?></span><a href="/ru/casino/group/stake-originals"><?php echo htmlspecialchars($translations['stake_originals_link']); ?></a><span><?php echo htmlspecialchars($translations['stake_originals_games']); ?></span><a href="/ru/casino/games/dice"><?php echo htmlspecialchars($translations['dice']); ?></a><span>, </span><a href="/ru/casino/games/plinko"><?php echo htmlspecialchars($translations['plinko']); ?></a><span>, </span><a href="/ru/casino/games/mines"><?php echo htmlspecialchars($translations['mines']); ?></a><span>, </span><a href="/ru/casino/games/crash"><?php echo htmlspecialchars($translations['crash']); ?></a><span>, </span><a href="/ru/casino/games/limbo"><?php echo htmlspecialchars($translations['limbo']); ?></a><span>, </span><a href="/ru/casino/games/hilo"><?php echo htmlspecialchars($translations['hilo']); ?></a><span>, </span><a href="/ru/casino/games/keno"><?php echo htmlspecialchars($translations['keno']); ?></a><span>, </span><a href="/ru/casino/games/wheel"><?php echo htmlspecialchars($translations['wheel']); ?></a><span>, </span><a href="/ru/casino/games/diamonds"><?php echo htmlspecialchars($translations['diamonds']); ?></a><span>, </span><a href="/ru/casino/games/dragon-tower"><?php echo htmlspecialchars($translations['dragon_tower']); ?></a><span><?php echo htmlspecialchars($translations['and']); ?></span><a href="/ru/casino/games/slide"><?php echo htmlspecialchars($translations['slide']); ?></a><span>. <?php echo htmlspecialchars($translations['also_try']); ?></span><a href="/ru/casino/games/slots-samurai"><?php echo htmlspecialchars($translations['blue_samurai']); ?></a><span>, </span><a href="/ru/casino/games/slots"><?php echo htmlspecialchars($translations['scarab_spin']); ?></a><span>, </span><a href="/ru/casino/games/pump"><?php echo htmlspecialchars($translations['pump']); ?></a><span>, </span><a href="/ru/casino/games/cases"><?php echo htmlspecialchars($translations['cases']); ?></a><span>, </span><a href="/ru/casino/games/flip"><?php echo htmlspecialchars($translations['flip']); ?></a><span>, </span><a href="/ru/casino/games/rock-paper-scissors"><?php echo htmlspecialchars($translations['rock_paper_scissors']); ?></a><span>, </span><a href="/ru/casino/games/snakes"><?php echo htmlspecialchars($translations['snakes']); ?></a><span>, </span><a href="/ru/casino/games/darts"><?php echo htmlspecialchars($translations['darts']); ?></a><span>, </span><a href="/ru/casino/games/bars"><?php echo htmlspecialchars($translations['bars']); ?></a><span>, </span><a href="/ru/casino/games/packs"><?php echo htmlspecialchars($translations['packs']); ?></a><span>, </span><a href="/ru/casino/games/primedice"><?php echo htmlspecialchars($translations['prime_dice']); ?></a><span><?php echo htmlspecialchars($translations['and']); ?></span><a href="/ru/casino/games/tome-of-life"><?php echo htmlspecialchars($translations['tome_of_life']); ?></a><span>. <?php echo htmlspecialchars($translations['learn_stake_originals']); ?></span></p>
          <ul>
            <li>
              <p><a href="/ru/blog/how-to-play-plinko-on-stake"><?php echo htmlspecialchars($translations['how_to_play_plinko']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-samurai-slots-on-stake"><?php echo htmlspecialchars($translations['how_to_play_blue_samurai']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-hilo-on-stake"><?php echo htmlspecialchars($translations['how_to_play_hilo']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-limbo-on-stake"><?php echo htmlspecialchars($translations['how_to_play_limbo']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-slide-on-stake"><?php echo htmlspecialchars($translations['how_to_play_slide']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-diamonds-on-stake"><?php echo htmlspecialchars($translations['how_to_play_diamonds']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-scarab-spin-on-stake"><?php echo htmlspecialchars($translations['how_to_play_scarab_spin']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-crash-on-stake"><?php echo htmlspecialchars($translations['how_to_play_crash']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-dragon-tower-on-stake"><?php echo htmlspecialchars($translations['how_to_play_dragon_tower']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-tome-of-life-on-stake"><?php echo htmlspecialchars($translations['how_to_play_tome_of_life']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-mines-on-stake"><?php echo htmlspecialchars($translations['how_to_play_mines']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-pump-on-stake"><?php echo htmlspecialchars($translations['how_to_play_pump']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-cases-on-stake"><?php echo htmlspecialchars($translations['how_to_play_cases']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-flip-on-stake"><?php echo htmlspecialchars($translations['how_to_play_flip']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-rock-paper-scissors-on-stake"><?php echo htmlspecialchars($translations['how_to_play_rock_paper_scissors']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-snakes-on-stake"><?php echo htmlspecialchars($translations['how_to_play_snakes']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-darts-on-stake"><?php echo htmlspecialchars($translations['how_to_play_darts']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-bars-on-stake"><?php echo htmlspecialchars($translations['how_to_play_bars']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-packs-on-stake"><?php echo htmlspecialchars($translations['how_to_play_packs']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/fi/blog/how-to-play-dice-on-stake"><?php echo htmlspecialchars($translations['how_to_play_dice']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-blackjack-on-stake"><?php echo htmlspecialchars($translations['how_to_play_blackjack']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-wheel-on-stake"><?php echo htmlspecialchars($translations['how_to_play_wheel']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-keno-on-stake"><?php echo htmlspecialchars($translations['how_to_play_keno']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-roulette"><?php echo htmlspecialchars($translations['how_to_play_roulette']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-baccarat"><?php echo htmlspecialchars($translations['how_to_play_baccarat']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-video-poker-on-stake"><?php echo htmlspecialchars($translations['how_to_play_video_poker']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/how-to-play-prime-dice-on-stake"><?php echo htmlspecialchars($translations['how_to_play_prime_dice']); ?></a></p>
            </li>
          </ul>
          <p><span><?php echo htmlspecialchars($translations['stake_originals_classics']); ?></span><a href="/ru/casino/games/blackjack"><?php echo htmlspecialchars($translations['blackjack']); ?></a><span>, </span><a href="/ru/casino/games/roulette"><?php echo htmlspecialchars($translations['roulette']); ?></a><span>, </span><a href="/ru/casino/games/baccarat"><?php echo htmlspecialchars($translations['baccarat']); ?></a><span><?php echo htmlspecialchars($translations['and']); ?></span><a href="/ru/casino/games/video-poker"><?php echo htmlspecialchars($translations['video_poker']); ?></a><span>. <?php echo htmlspecialchars($translations['stake_exclusives_intro']); ?></span><a href="/ru/blog/stake-exclusive-slot-games-features"><?php echo htmlspecialchars($translations['exclusive_games_features']); ?></a><span><?php echo htmlspecialchars($translations['exclusive_games_info']); ?></span></p>
          <h3><span id="slot_games"><?php echo htmlspecialchars($translations['slot_games']); ?></span></h3>
          <p><span><?php echo htmlspecialchars($translations['slots_intro']); ?></span><a href="/ru/blog/free-spins-bonus-rounds-guide"><?php echo htmlspecialchars($translations['bonus_features']); ?></a><span><?php echo htmlspecialchars($translations['slots_features']); ?></span><a href="/ru/blog/slot-machine-symbols-guide"><?php echo htmlspecialchars($translations['slot_symbols']); ?></a><span><?php echo htmlspecialchars($translations['slot_symbols_info']); ?></span></p>
          <p><span><?php echo htmlspecialchars($translations['classic_slots_themes']); ?></span><a href="/ru/blog/popular-slot-game-themes"><?php echo htmlspecialchars($translations['slot_themes']); ?></a><span><?php echo htmlspecialchars($translations['classic_slots_info']); ?></span></p>
          <p><span><?php echo htmlspecialchars($translations['popular_slots']); ?></span><a href="/ru/casino/games/netent-gonzos-quest"><?php echo htmlspecialchars($translations['gonzos_quest']); ?></a><span>,</span><a href="/ru/casino/games/titan-gaming-battle-of-gods"><?php echo htmlspecialchars($translations['battle_of_gods']); ?></a><span><?php echo htmlspecialchars($translations['slots_variety']); ?></span></p>
          <h3><span id="how_to_play_slots"><?php echo htmlspecialchars($translations['how_to_play_slots']); ?></span></h3>
          <p><span><?php echo htmlspecialchars($translations['slots_beginner_guide']); ?></span><a href="/ru/blog/how-to-play-slots"><?php echo htmlspecialchars($translations['play_slots_guide']); ?></a><span>. <?php echo htmlspecialchars($translations['demo_mode']); ?></span><a href="/ru/blog/free-play-slot-games"><?php echo htmlspecialchars($translations['demo_mode_link']); ?></a><span><?php echo htmlspecialchars($translations['demo_mode_info']); ?></span></p>
          <p><span><?php echo htmlspecialchars($translations['cascade_slots']); ?></span><a href="/ru/blog/what-are-cluster-pays-slots"><?php echo htmlspecialchars($translations['cluster_pays']); ?></a><span><?php echo htmlspecialchars($translations['cluster_pays_info']); ?></span></p>
          <p><span><?php echo htmlspecialchars($translations['traditional_slots']); ?></span><a href="/ru/casino/games/pragmatic-play-sweet-bonanza"><?php echo htmlspecialchars($translations['sweet_bonanza']); ?></a><span><?php echo htmlspecialchars($translations['win_all_ways']); ?></span><a href="/ru/blog/what-are-slot-paylines-explained"><?php echo htmlspecialchars($translations['paylines']); ?></a><span><?php echo htmlspecialchars($translations['and']); ?></span><a href="/ru/blog/what-does-slot-volatility-mean"><?php echo htmlspecialchars($translations['slot_volatility']); ?></a><span><?php echo htmlspecialchars($translations['slot_mechanics']); ?></span><a href="/ru/blog/scatter-symbols-slot-game-guide"><?php echo htmlspecialchars($translations['scatter_symbols']); ?></a><span><?php echo htmlspecialchars($translations['bonus_buy']); ?></a><span>, <?php echo htmlspecialchars($translations['expanding_reels']); ?>, <?php echo htmlspecialchars($translations['free_spins']); ?>, </span><a href="/ru/blog/wild-symbols-slot-game-guide"><?php echo htmlspecialchars($translations['wild_symbols']); ?></a><span>, </span><a href="/ru/blog/hold-and-win-slot-bonus-feature-explained"><?php echo htmlspecialchars($translations['hold_and_win']); ?></a><span><?php echo htmlspecialchars($translations['and_more']); ?>.</span></p>
          <h4><span id="search_by_categories"><?php echo htmlspecialchars($translations['search_by_categories']); ?></span></h4>
          <p><span><?php echo htmlspecialchars($translations['categories_intro']); ?></span></p>
          <p><span><?php echo htmlspecialchars($translations['main_game_mechanics']); ?></span></p>
          <ul>
            <li>
              <p><a href="/ru/casino/group/bonus-buy"><?php echo htmlspecialchars($translations['bonus_buy']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/slots"><?php echo htmlspecialchars($translations['slots']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/cascading"><?php echo htmlspecialchars($translations['cascading']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/megaways"><?php echo htmlspecialchars($translations['megaways']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/respin"><?php echo htmlspecialchars($translations['respin']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/3-reels"><?php echo htmlspecialchars($translations['three_reels']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/multi-ways"><?php echo htmlspecialchars($translations['multi_ways']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/volatility-switch"><?php echo htmlspecialchars($translations['volatility_switch']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/enhanced-rtp"><?php echo htmlspecialchars($translations['enhanced_rtp']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/stake-engine"><?php echo htmlspecialchars($translations['stake_engine']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/mines"><?php echo htmlspecialchars($translations['mines']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/puzzle-games"><?php echo htmlspecialchars($translations['puzzle_games']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/multiplayer"><?php echo htmlspecialchars($translations['multiplayer']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/jackpot-slots"><?php echo htmlspecialchars($translations['jackpot_slots']); ?></a></p>
            </li>
          </ul>
          <p><span><?php echo htmlspecialchars($translations['best_collections']); ?></span></p>
          <ul>
            <li>
              <p><a href="/ru/casino/group/recommended-slots"><?php echo htmlspecialchars($translations['recommended_slots']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/featured-slots"><?php echo htmlspecialchars($translations['featured_slots']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/stake-exclusives"><?php echo htmlspecialchars($translations['stake_exclusives']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/new-releases"><?php echo htmlspecialchars($translations['new_releases']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/early-access"><?php echo htmlspecialchars($translations['early_access']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/eddies-favourites"><?php echo htmlspecialchars($translations['eddies_favourites']); ?></a></p>
            </li>
          </ul>
          <p><span><?php echo htmlspecialchars($translations['promotional_games']); ?></span></p>
          <ul>
            <li>
              <p><a href="/ru/casino/group/drops-wins"><?php echo htmlspecialchars($translations['drops_wins']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/stake-vs-eddie"><?php echo htmlspecialchars($translations['stake_vs_eddie']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/the-level-up"><?php echo htmlspecialchars($translations['the_level_up']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/reel-rumble"><?php echo htmlspecialchars($translations['reel_rumble']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/conquer-the-casino"><?php echo htmlspecialchars($translations['conquer_the_casino']); ?></a></p>
            </li>
          </ul>
          <p><span><?php echo htmlspecialchars($translations['visual_themes']); ?></span></p>
          <ul>
            <li>
              <p><span><?php echo htmlspecialchars($translations['mythology_history']); ?></span></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/egyptian"><?php echo htmlspecialchars($translations['egyptian']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/greek-empire"><?php echo htmlspecialchars($translations['greek_empire']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/ancient"><?php echo htmlspecialchars($translations['ancient']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/romans"><?php echo htmlspecialchars($translations['romans']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/vikings"><?php echo htmlspecialchars($translations['vikings']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/aztec"><?php echo htmlspecialchars($translations['aztec']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/history"><?php echo htmlspecialchars($translations['history']); ?></a></p>
            </li>
            <li>
              <p><span><?php echo htmlspecialchars($translations['regional_themes']); ?></span></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/oriental"><?php echo htmlspecialchars($translations['oriental']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/japanese"><?php echo htmlspecialchars($translations['japanese']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/arabian"><?php echo htmlspecialchars($translations['arabian']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/latino"><?php echo htmlspecialchars($translations['latino']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/african"><?php echo htmlspecialchars($translations['african']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/indian"><?php echo htmlspecialchars($translations['indian']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/international"><?php echo htmlspecialchars($translations['international']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/travel"><?php echo htmlspecialchars($translations['travel']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/irish"><?php echo htmlspecialchars($translations['irish']); ?></a></p>
            </li>
            <li>
              <p><span><?php echo htmlspecialchars($translations['natural_seasonal']); ?></span></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/animals"><?php echo htmlspecialchars($translations['animals']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/nature"><?php echo htmlspecialchars($translations['nature']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/sea"><?php echo htmlspecialchars($translations['sea']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/jungle"><?php echo htmlspecialchars($translations['jungle']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/farm"><?php echo htmlspecialchars($translations['farm']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/fishing"><?php echo htmlspecialchars($translations['fishing']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/winter"><?php echo htmlspecialchars($translations['winter']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/summer"><?php echo htmlspecialchars($translations['summer']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/halloween"><?php echo htmlspecialchars($translations['halloween']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/christmas"><?php echo htmlspecialchars($translations['christmas']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/easter"><?php echo htmlspecialchars($translations['easter']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/lunar-new-year"><?php echo htmlspecialchars($translations['lunar_new_year']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/oktoberfest"><?php echo htmlspecialchars($translations['oktoberfest']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/seasonal"><?php echo htmlspecialchars($translations['seasonal']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/brazilian-carnival"><?php echo htmlspecialchars($translations['brazilian_carnival']); ?></a></p>
            </li>
            <li>
              <p><span><?php echo htmlspecialchars($translations['fantasy_adventure']); ?></span></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/fantasy"><?php echo htmlspecialchars($translations['fantasy']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/dragons"><?php echo htmlspecialchars($translations['dragons']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/magic"><?php echo htmlspecialchars($translations['magic']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/adventure"><?php echo htmlspecialchars($translations['adventure']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/fairy"><?php echo htmlspecialchars($translations['fairy']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/horror"><?php echo htmlspecialchars($translations['horror']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/space"><?php echo htmlspecialchars($translations['space']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/wild-west"><?php echo htmlspecialchars($translations['wild_west']); ?></a></p>
            </li>
            <li>
              <p><span><?php echo htmlspecialchars($translations['pop_culture']); ?></span></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/party"><?php echo htmlspecialchars($translations['party']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/music"><?php echo htmlspecialchars($translations['music']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/joker"><?php echo htmlspecialchars($translations['joker']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/candy"><?php echo htmlspecialchars($translations['candy']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/comic"><?php echo htmlspecialchars($translations['comic']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/anime"><?php echo htmlspecialchars($translations['anime']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/retro"><?php echo htmlspecialchars($translations['retro']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/romance"><?php echo htmlspecialchars($translations['romance']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/naughty"><?php echo htmlspecialchars($translations['naughty']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/war"><?php echo htmlspecialchars($translations['war']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/branded"><?php echo htmlspecialchars($translations['branded']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/food"><?php echo htmlspecialchars($translations['food']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/miscellaneous"><?php echo htmlspecialchars($translations['miscellaneous']); ?></a></p>
            </li>
            <li>
              <p><span><?php echo htmlspecialchars($translations['wealth_rewards']); ?></span></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/money"><?php echo htmlspecialchars($translations['money']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/gold"><?php echo htmlspecialchars($translations['gold']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/gems"><?php echo htmlspecialchars($translations['gems']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/777"><?php echo htmlspecialchars($translations['777']); ?></a></p>
            </li>
            <li class="level2">
              <p><a href="/ru/casino/group/vegas"><?php echo htmlspecialchars($translations['vegas']); ?></a></p>
            </li>
          </ul>
          <h3><span id="table_games"><?php echo htmlspecialchars($translations['table_games']); ?></span></h3>
          <p><span><?php echo htmlspecialchars($translations['table_games_intro']); ?></span><a href="/ru/blog/how-to-play-online-poker"><?php echo htmlspecialchars($translations['poker']); ?></a><span>.</span></p>
          <p><span><?php echo htmlspecialchars($translations['popular_table_games']); ?></span><a href="/ru/blog/how-to-play-blackjack-on-stake"><?php echo htmlspecialchars($translations['blackjack']); ?></a><span>, </span><a href="/ru/blog/how-to-play-baccarat"><?php echo htmlspecialchars($translations['baccarat']); ?></a><span>, </span><a href="/ru/blog/how-to-play-roulette"><?php echo htmlspecialchars($translations['roulette']); ?></a><span>, <?php echo htmlspecialchars($translations['card_games']); ?>, </span><a href="/ru/casino/games/poker"><?php echo htmlspecialchars($translations['stake_poker']); ?></a><span><?php echo htmlspecialchars($translations['table_games_advantages']); ?></span><a href="/ru/blog/casino-house-edge-guide"><?php echo htmlspecialchars($translations['house_edge']); ?></a><span><?php echo htmlspecialchars($translations['table_games_rules']); ?></span><a href="/ru/blog/how-to-play-casino-table-games"><?php echo htmlspecialchars($translations['table_games_guide']); ?></a><span>.</span></p>
          <p><span><?php echo htmlspecialchars($translations['electronic_table_games']); ?></span><a href="/ru/blog/return-to-player-rtp-guide"><?php echo htmlspecialchars($translations['rtp']); ?></a><span><?php echo htmlspecialchars($translations['electronic_table_games_info']); ?></span></p>
          <p><span><?php echo htmlspecialchars($translations['table_games_category']); ?></span></p>
          <ul>
            <li>
              <p><a href="/ru/casino/group/live-casino"><?php echo htmlspecialchars($translations['live_casino']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/game-shows"><?php echo htmlspecialchars($translations['game_shows']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/baccarat"><?php echo htmlspecialchars($translations['baccarat']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/blackjack"><?php echo htmlspecialchars($translations['blackjack']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/poker"><?php echo htmlspecialchars($translations['poker']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/roulette"><?php echo htmlspecialchars($translations['roulette']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/cards"><?php echo htmlspecialchars($translations['cards']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/table-games"><?php echo htmlspecialchars($translations['table_games']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/video-poker"><?php echo htmlspecialchars($translations['video_poker']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/stake-table-games"><?php echo htmlspecialchars($translations['stake_table_games']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/group/first-person"><?php echo htmlspecialchars($translations['first_person']); ?></a></p>
            </li>
          </ul>
          <h3><span id="live_dealer_table_games"><?php echo htmlspecialchars($translations['live_dealer_table_games']); ?></span></h3>
          <p><span><?php echo htmlspecialchars($translations['live_dealer_intro']); ?></span></p>
          <p><span><?php echo htmlspecialchars($translations['live_dealer_games']); ?></span><a href="/ru/casino/group/live-casino#Live_Baccarat_on_Stake"><?php echo htmlspecialchars($translations['live_baccarat']); ?></a><span>, </span><a href="/ru/casino/group/live-casino#Live_Blackjack_on_Stake"><?php echo htmlspecialchars($translations['live_blackjack']); ?></a><span>, </span><a href="/ru/casino/games/evolution-craps"><?php echo htmlspecialchars($translations['live_craps']); ?></a><span>, </span><a href="/ru/casino/games/pragmatic-play-stake-roulette"><?php echo htmlspecialchars($translations['live_roulette']); ?></a><span><?php echo htmlspecialchars($translations['and']); ?></span><a href="/ru/blog/stake-poker-tournaments-guide"><?php echo htmlspecialchars($translations['poker_tournaments']); ?></a><span><?php echo htmlspecialchars($translations['live_dealer_experience']); ?></span></p>
          <h4><span id="live_casino_game_shows"><?php echo htmlspecialchars($translations['live_casino_game_shows']); ?></span></h4>
          <p><span><?php echo htmlspecialchars($translations['game_shows_intro']); ?></span></p>
          <p><span><?php echo htmlspecialchars($translations['game_shows_features']); ?></span></p>
          <p><span><?php echo htmlspecialchars($translations['popular_game_shows']); ?></span><a href="/ru/casino/games/evolution-crazy-time"><?php echo htmlspecialchars($translations['crazy_time']); ?></a><span>, </span><a href="/ru/casino/games/evolution-monopoly-live"><?php echo htmlspecialchars($translations['monopoly_live']); ?></a><span>, </span><a href="/ru/casino/games/pragmatic-play-live-sweet-bonanza-candyland"><?php echo htmlspecialchars($translations['sweet_bonanza_candyland']); ?></a><span>, </span><a href="/ru/casino/games/evolution-deal-or-no-deal"><?php echo htmlspecialchars($translations['deal_or_no_deal']); ?></a><span>, </span><a href="/ru/casino/games/evolution-mega-ball"><?php echo htmlspecialchars($translations['mega_ball']); ?></a><span>, </span><a href="/ru/casino/games/evolution-stock-market"><?php echo htmlspecialchars($translations['stock_market']); ?></a><span>, </span><a href="/ru/casino/games/evolution-balloon-race"><?php echo htmlspecialchars($translations['balloon_race']); ?></a><span><?php echo htmlspecialchars($translations['and_many_others']); ?></span></p>
          <h2><span id="game_series"><?php echo htmlspecialchars($translations['game_series']); ?></span></h2>
          <p><span><?php echo htmlspecialchars($translations['game_series_intro']); ?></span><a href="/ru/blog/best-online-casino-game-providers"><?php echo htmlspecialchars($translations['top_providers']); ?></a><span><?php echo htmlspecialchars($translations['slot_series']); ?></span><a href="/ru/casino/group/sagas"><?php echo htmlspecialchars($translations['slot_sagas']); ?></a><span><?php echo htmlspecialchars($translations['slot_series_info']); ?></span></p>
          <p><span><?php echo htmlspecialchars($translations['big_bass_intro']); ?></span><a href="/ru/casino/games/pragmatic-play-big-bass-bonanza"><?php echo htmlspecialchars($translations['big_bass_bonanza']); ?></a><span><?php echo htmlspecialchars($translations['big_bass_series']); ?></span></p>
          <ul>
            <li>
              <p><a href="/ru/casino/games/pragmatic-play-big-bass-bonanza-megaways"><?php echo htmlspecialchars($translations['big_bass_bonanza_megaways']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/games/pragmatic-play-big-bass-splash"><?php echo htmlspecialchars($translations['big_bass_splash']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/games/pragmatic-play-big-bass-hold-and-spinner"><?php echo htmlspecialchars($translations['big_bass_hold_and_spinner']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/games/pragmatic-play-big-bass-bonanza-keeping-it-reel"><?php echo htmlspecialchars($translations['big_bass_bonanza_keeping_it_reel']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/games/pragmatic-play-big-bass-amazon-xtreme"><?php echo htmlspecialchars($translations['big_bass_amazon_xtreme']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/games/pragmatic-play-christmas-big-bass-bonanza"><?php echo htmlspecialchars($translations['christmas_big_bass_bonanza']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/casino/games/pragmatic-play-bigger-bass-blizzard-christmas-catch"><?php echo htmlspecialchars($translations['bigger_bass_blizzard']); ?></a></p>
            </li>
          </ul>
          <p><span><?php echo htmlspecialchars($translations['other_game_series']); ?></span><a href="/ru/casino/games/pragmatic-play-the-dog-house"><?php echo htmlspecialchars($translations['the_dog_house']); ?></a><span><?php echo htmlspecialchars($translations['rich_wilde_series']); ?></span><a href="/ru/casino/games/playngo-book-of-dead"><?php echo htmlspecialchars($translations['book_of_dead']); ?></a><span><?php echo htmlspecialchars($translations['from']); ?></span><a href="/ru/casino/group/playn-go"><?php echo htmlspecialchars($translations['playn_go']); ?></a><span><?php echo htmlspecialchars($translations['and']); ?></span><a href="/ru/casino/games/relax-money-train"><?php echo htmlspecialchars($translations['money_train']); ?></a><span><?php echo htmlspecialchars($translations['from_relax_gaming']); ?></span></p>
          <h2><span id="betting_resources"><?php echo htmlspecialchars($translations['betting_resources']); ?></span></h2>
          <p><span><?php echo htmlspecialchars($translations['blog_resources']); ?></span></p>
          <p><span><?php echo htmlspecialchars($translations['betting_strategies_intro']); ?></span></p>
          <ul>
            <li>
              <p><a href="/ru/blog/progressive-betting-strategy-positive-vs-negative"><?php echo htmlspecialchars($translations['progressive_betting']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/fibonacci-betting-system-explained"><?php echo htmlspecialchars($translations['fibonacci']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/what-is-the-1-3-2-6-betting-system-guide"><?php echo htmlspecialchars($translations['sequence_1326']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/paroli-betting-system-strategy-explained"><?php echo htmlspecialchars($translations['paroli']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/dalembert-betting-system-explained"><?php echo htmlspecialchars($translations['dalembert']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/martingale-betting-system-explained"><?php echo htmlspecialchars($translations['martingale']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/labouchere-betting-system-method-explained"><?php echo htmlspecialchars($translations['labouchere']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/keefer-roulette-system-betting-strategy-explained"><?php echo htmlspecialchars($translations['keefer']); ?></a></p>
            </li>
            <li>
              <p><a href="/ru/blog/oscars-grind-betting-system-explained"><?php echo htmlspecialchars($translations['oscars_grind']); ?></a></p>
            </li>
          </ul>
          <p><span><?php echo htmlspecialchars($translations['blog_updates']); ?></span></p>
          <h2><span id="deposit_and_responsible_betting"><?php echo htmlspecialchars($translations['deposit_and_responsible_betting']); ?></span></h2>
          <p><span><?php echo htmlspecialchars($translations['deposit_options']); ?></span><a href="/ru/blog/how-to-deposit-argentine-pesos-ars"><?php echo htmlspecialchars($translations['ars']); ?></a><span>, </span><a href="/ru/blog/how-to-deposit-chilean-pesos-clp"><?php echo htmlspecialchars($translations['clp']); ?></a><span>, </span><a href="/ru/blog/how-to-deposit-canadian-dollars-cad"><?php echo htmlspecialchars($translations['cad']); ?></a><span>, </span><a href="/ru/blog/how-to-deposit-vietnamese-dong-vnd"><?php echo htmlspecialchars($translations['vnd']); ?></a><span>, </span><a href="/ru/blog/how-to-deposit-indian-rupees-inr"><?php echo htmlspecialchars($translations['inr']); ?></a><span><?php echo htmlspecialchars($translations['and']); ?></span><a href="/ru/blog/how-to-deposit-turkish-lira-try"><?php echo htmlspecialchars($translations['try']); ?></a><span>. <?php echo htmlspecialchars($translations['currency_display']); ?></span></p>
          <p><span><?php echo htmlspecialchars($translations['payment_methods_info']); ?></span><a href="https://help.stake.com/en/collections/5701792-local-currency" target="_blank" rel="external noreferrer noopener"><?php echo htmlspecialchars($translations['available_currencies']); ?><?php echo $svg_external_link ?></a><span><?php echo htmlspecialchars($translations['payment_guide']); ?></span><a href="/ru/blog/local-currency-deposit-withdraw-guide"><?php echo htmlspecialchars($translations['payment_guide_link']); ?></a><span>.</span></p>
          <p><span><?php echo htmlspecialchars($translations['crypto_deposits']); ?></span><a href="/ru/blog/what-is-bitcoin"><?php echo htmlspecialchars($translations['btc']); ?></a><span>, </span><a href="/ru/blog/what-is-ethereum-eth-crypto-betting"><?php echo htmlspecialchars($translations['eth']); ?></a><span>, </span><a href="/ru/blog/what-is-tether-usdt-crypto"><?php echo htmlspecialchars($translations['usdt']); ?></a><span>, </span><a href="/ru/blog/eos-on-stake"><?php echo htmlspecialchars($translations['eos']); ?></a><span>, </span><a href="/ru/blog/what-is-dogecoin-crypto-guide"><?php echo htmlspecialchars($translations['doge']); ?></a><span>, </span><a href="/ru/blog/what-is-litecoin-ltc-crypto-betting"><?php echo htmlspecialchars($translations['ltc']); ?></a><span>, </span><a href="/ru/blog/what-is-solana-sol-crypto-coin"><?php echo htmlspecialchars($translations['sol']); ?></a><span>, </span><a href="/ru/blog/what-is-tron-trx-crypto-guide"><?php echo htmlspecialchars($translations['trx']); ?></a><span><?php echo htmlspecialchars($translations['crypto_list']); ?></span><a href="/ru/blog/what-crypto-does-stake-offer"><?php echo htmlspecialchars($translations['crypto_list_link']); ?></a><span><?php echo htmlspecialchars($translations['crypto_choice']); ?></span><a href="/ru/blog/choosing-crypto-coin-guide"><?php echo htmlspecialchars($translations['crypto_choice_guide']); ?></a><span>.</span></p>
          <p><span><?php echo htmlspecialchars($translations['customer_support']); ?></span><a href="/ru/blog/stake-customer-support-guide"><?php echo htmlspecialchars($translations['support_guide']); ?></a><span>. <?php echo htmlspecialchars($translations['support_services']); ?></span><a href="/ru/blog/deposit-withdrawal-methods-online-betting"><?php echo htmlspecialchars($translations['deposit_withdrawal']); ?></a><span>.</span></p>
          <p><span><?php echo htmlspecialchars($translations['moonpay_service']); ?></span><a href="https://www.moonpay.com/" target="_blank" rel="external noreferrer noopener"><?php echo htmlspecialchars($translations['moonpay']); ?><?php echo $svg_external_link ?></a><span><?php echo htmlspecialchars($translations['moonpay_payment_methods']); ?></span><a href="https://support.moonpay.com/hc/en-gb/articles/360017624078-What-are-your-supported-payment-methods-" target="_blank" rel="external noreferrer noopener"><?php echo htmlspecialchars($translations['moonpay_documentation']); ?><?php echo $svg_external_link ?></a><span>. <?php echo htmlspecialchars($translations['other_services']); ?></span><a href="https://swapped.com" target="_blank" rel="external noreferrer noopener"><?php echo htmlspecialchars($translations['swapped']); ?><?php echo $svg_external_link ?></a><span><?php echo htmlspecialchars($translations['and']); ?></span><a href="/ru/blog/what-is-mesh-crypto-deposit-integration"><?php echo htmlspecialchars($translations['mesh']); ?></a><span><?php echo htmlspecialchars($translations['crypto_purchase']); ?></span></p>
          <p><span><?php echo htmlspecialchars($translations['stake_vault']); ?></span><a href="/ru/blog/how-to-use-our-vault"><?php echo htmlspecialchars($translations['vault_guide']); ?></a><span><?php echo htmlspecialchars($translations['vault_info']); ?></span><a href="/ru/blog/is-crypto-gambling-safe"><?php echo htmlspecialchars($translations['crypto_safety']); ?></a><span><?php echo htmlspecialchars($translations['crypto_safety_info']); ?></span></p>
          <p><span><?php echo htmlspecialchars($translations['responsible_gaming']); ?></span><a href="/ru/blog/responsible-gambling-online-guide-stake-smart"><?php echo htmlspecialchars($translations['responsible_gaming_guide']); ?></a><span>. <?php echo htmlspecialchars($translations['control_gaming']); ?></span><a href="/ru/responsible-gambling/stake-smart"><?php echo htmlspecialchars($translations['smart_betting_guide']); ?></a><span>. <?php echo htmlspecialchars($translations['budget_tools']); ?></span><a href="/ru/responsible-gambling/calculator"><?php echo htmlspecialchars($translations['budget_calculator']); ?></a><span><?php echo htmlspecialchars($translations['and']); ?></span><a href="/ru/blog/how-much-to-gamble-budget-calculator"><?php echo htmlspecialchars($translations['betting_limits_guide']); ?></a><span><?php echo htmlspecialchars($translations['budget_management']); ?></span></p>
          <h2><span id="top_game_providers"><?php echo htmlspecialchars($translations['top_game_providers']); ?></span></h2>
          <p><span><?php echo htmlspecialchars($translations['providers_intro']); ?></span><a href="/ru/casino/collection/provider"><?php echo htmlspecialchars($translations['reputable_providers']); ?></a><span><?php echo htmlspecialchars($translations['providers_info']); ?></span></p>
          <p><span><?php echo htmlspecialchars($translations['top_providers_list']); ?></span><a href="/ru/casino/group/twist-gaming"><?php echo htmlspecialchars($translations['twist_gaming']); ?></a><span>, </span><a href="/ru/casino/group/massive-studios"><?php echo htmlspecialchars($translations['massive_studios']); ?></a><span>, </span><a href="/ru/casino/group/titan-gaming"><?php echo htmlspecialchars($translations['titan_gaming']); ?></a><span>, </span><a href="/ru/casino/group/pragmatic-play"><?php echo htmlspecialchars($translations['pragmatic_play']); ?></a><span>, </span><a href="/ru/casino/group/evolution-gaming"><?php echo htmlspecialchars($translations['evolution_gaming']); ?></a><span>, </span><a href="/ru/casino/group/quickspin"><?php echo htmlspecialchars($translations['quickspin']); ?></a><span>, </span><a href="/ru/casino/group/relax-gaming"><?php echo htmlspecialchars($translations['relax_gaming']); ?></a><span>, </span><a href="/ru/casino/group/big-time-gaming"><?php echo htmlspecialchars($translations['big_time_gaming']); ?></a><span>, </span><a href="/ru/casino/group/playn-go"><?php echo htmlspecialchars($translations['playn_go']); ?></a><span>, </span><a href="/ru/casino/group/gamomat"><?php echo htmlspecialchars($translations['gamomat']); ?></a><span>, </span><a href="/ru/casino/group/hacksaw-gaming"><?php echo htmlspecialchars($translations['hacksaw_gaming']); ?></a><span>, </span><a href="/ru/casino/group/push-gaming"><?php echo htmlspecialchars($translations['push_gaming']); ?></a><span>, </span><a href="/ru/casino/group/netent"><?php echo htmlspecialchars($translations['netent']); ?></a><span>, </span><a href="/ru/casino/group/no-limit-city"><?php echo htmlspecialchars($translations['nolimit_city']); ?></a><span><?php echo htmlspecialchars($translations['providers_reputation']); ?></span></p>
          <p><span><?php echo htmlspecialchars($translations['popular_games']); ?></span><a href="/ru/casino/games/twist-gaming-pixel-farm"><?php echo htmlspecialchars($translations['pixel_farm']); ?></a><span>, </span><a href="/ru/casino/games/twist-gaming-carp-diem"><?php echo htmlspecialchars($translations['carp_diem']); ?></a><span>, </span><a href="/ru/casino/games/hacksaw-wanted-dead-or-a-wild"><?php echo htmlspecialchars($translations['wanted_dead_or_a_wild']); ?></a><span>, </span><a href="/ru/casino/games/pragmatic-play-gates-of-olympus"><?php echo htmlspecialchars($translations['gates_of_olympus']); ?></a><span>, </span><a href="/ru/casino/games/hacksaw-rip-city"><?php echo htmlspecialchars($translations['rip_city']); ?></a><span>, </span><a href="/ru/casino/games/pragmatic-play-big-bass-splash"><?php echo htmlspecialchars($translations['big_bass_splash']); ?></a><span>, </span><a href="/ru/casino/games/pragmatic-play-sweet-fiesta"><?php echo htmlspecialchars($translations['sweet_fiesta']); ?></a><span>, </span><a href="/ru/casino/games/hacksaw-dork-unit"><?php echo htmlspecialchars($translations['dork_unit']); ?></a><span>, </span><a href="/ru/casino/games/pragmatic-play-fruit-party"><?php echo htmlspecialchars($translations['fruit_party']); ?></a><span>, </span><a href="/ru/casino/games/hacksaw-bloodthirst"><?php echo htmlspecialchars($translations['bloodthirst']); ?></a><span>, </span><a href="/ru/casino/games/pragmatic-play-buffalo-king"><?php echo htmlspecialchars($translations['buffalo_king']); ?></a><span>, </span><a href="/ru/casino/games/pragmatic-play-floating-dragon"><?php echo htmlspecialchars($translations['floating_dragon']); ?></a><span>, </span><a href="/ru/casino/games/evolution-lightning-dice"><?php echo htmlspecialchars($translations['lightning_dice']); ?></a><span>, </span><a href="/ru/casino/games/evolution-super-sic-bo"><?php echo htmlspecialchars($translations['super_sic_bo']); ?></a><span>, </span><a href="/ru/casino/games/evolution-side-bet-city"><?php echo htmlspecialchars($translations['side_bet_city']); ?></a><span><?php echo htmlspecialchars($translations['and_many_others']); ?></span></p>
          <p><span><?php echo htmlspecialchars($translations['game_variety_experience']); ?></span><a href="/ru/vip-club"><?php echo htmlspecialchars($translations['vip_program']); ?></a><span>, <?php echo htmlspecialchars($translations['competitions']); ?></span><a href="/ru/blog/best-casino-competitions-giveaways"><?php echo htmlspecialchars($translations['competitions_guide']); ?></a><span>, <?php echo htmlspecialchars($translations['and']); ?></span><a href="/ru/blog/best-casino-bonuses-on-stake"><?php echo htmlspecialchars($translations['casino_bonuses']); ?></a><span><?php echo htmlspecialchars($translations['vip_rewards']); ?></span><a href="/ru/blog/vip-program-levels-benefits-rewards"><?php echo htmlspecialchars($translations['vip_rewards_link']); ?></a><span><?php echo htmlspecialchars($translations['from']); ?></span><a href="/ru/blog/what-is-stake-rakeback"><?php echo htmlspecialchars($translations['rakeback']); ?></a><span><?php echo htmlspecialchars($translations['to']); ?></span><a href="/ru/blog/what-is-stake-reload-bonus"><?php echo htmlspecialchars($translations['reload_bonus']); ?></a><span><?php echo htmlspecialchars($translations['and']); ?></span><a href="/ru/blog/perks-benefits-of-stake-vip-hosts"><?php echo htmlspecialchars($translations['vip_host']); ?></a><span>! <?php echo htmlspecialchars($translations['vip_faq']); ?></span><a href="/ru/blog/stake-vip-program-faqs-help"><?php echo htmlspecialchars($translations['vip_faq_link']); ?></a></p>
          <p><span><?php echo htmlspecialchars($translations['start_playing']); ?></span><a href="/ru/blog/online-casino-guide"><?php echo htmlspecialchars($translations['online_casino_guide']); ?></a><span>!</span></p>
        </div>
      </div>
      <span class="see-more-space"></span>
      <div class="see-more-button-wrapper">
        <button type="button" tabindex="0" aria-label="<?php echo htmlspecialchars($translations['show_content']); ?>"><?php echo htmlspecialchars($translations['show_more']); ?></button>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('.see-more-button-wrapper button').on('click', function() {
        var $seeMore = $(this).closest('.see-more');
        var $content = $seeMore.find('.see-more-content');
        var $button = $(this);
        $seeMore.toggleClass('is-open');
        $content.toggleClass('is-open');
        if ($seeMore.hasClass('is-open')) {
          $button.text('<?php echo htmlspecialchars($translations['show_less']); ?>');
        } else {
          $button.text('<?php echo htmlspecialchars($translations['show_more']); ?>');
        }
      });
    });
  </script>
<?php
}
?>