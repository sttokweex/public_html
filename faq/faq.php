<?php
// SVG content variables (left empty as requested)

function render_faq($translations, $sitename)
{
	$faq_header_icon_svg = '';

	$faq_arrow_icon_svg = '<svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon " style="transform: rotate(0deg);
   "> <title></title> <path d="M32.274 49.762 9.204 26.69l6.928-6.93 16.145 16.145L48.42 19.762l6.93 6.929-23.072 23.07z"></path></svg>';

?>
	<link href="/css/faq.css" rel="stylesheet">
	<section class="faq-section">
		<div class="faq-container">
			<div class="faq-header">
				<h2 class="faq-title">
					<?php echo $faq_header_icon_svg; ?>
					<?php echo $translations['faq_header'] ?? 'Все еще остались вопросы?'; ?>
				</h2>
			</div>
			<div class="faq-list">
				<!-- FAQ Item 1 -->
				<div class="faq-item faq-accordion faq-is-open">
					<div class="faq-accordion-header">
						<div class="faq-accordion-title-wrapper">
							<p class="faq-accordion-title">
								<?php echo $translations['faq_what_is_stake'] ?? 'Что представляет собой Stake?'; ?>
							</p>
						</div>
						<div class="faq-accordion-arrow">
							<?php echo $faq_arrow_icon_svg; ?>
						</div>
					</div>
					<div class="faq-accordion-content faq-is-open">
						<div class="faq-content-wrapper">
							<div class="faq-content-block">
								<p class="faq-inline-text">
									<a class="faq-link" href="">
										<?php echo $sitename; ?>.com
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_stake_description'] ?? ', ведущий бренд в индустрии онлайн-гемблинга с 2017 года, предлагает широкий выбор вариантов онлайн-казино и ставок на спорт и ведет свою деятельность по всему миру на 15 различных языках.'; ?>
									</span>
								</p>
								<p class="faq-inline-text">
									<a class="faq-link" href="/ru/casino/home">
										<?php echo $translations['faq_stake_casino'] ?? 'Казино Stake'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_casino_description'] ?? ' – это надежная и безопасная платформа, на которой можно делать ставки в национальной валюте и криптовалюте по всему миру в '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/group/slots">
										<?php echo $translations['faq_slots'] ?? 'онлайн-слотах'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_games'] ?? ', играх '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/group/stake-originals">
										<?php echo $translations['faq_stake_originals'] ?? 'Stake Originals'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_and'] ?? ' и '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/group/live-casino">
										<?php echo $translations['faq_live_casino'] ?? 'Live-казино'; ?>
									</a>
									<span class="faq-text-subtle">.</span>
									<a class="faq-link" href="/ru/sports/home">
										<?php echo $translations['faq_sportsbook'] ?? 'Букмекер Stake'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_sports_description'] ?? ' предлагает лучшие коэффициенты на все основные спортивные события, включая ряд '; ?>
									</span>
									<a class="faq-link" href="/ru/sports/esports">
										<?php echo $translations['faq_esports'] ?? 'киберспортивных лиг'; ?>
									</a>
									<span class="faq-text-subtle">.</span>
								</p>
								<p class="faq-inline-text">
									<span class="faq-text-subtle">
										<?php echo $translations['faq_promotions'] ?? 'Мы регулярно предоставляем '; ?>
									</span>
									<a class="faq-link" href="/ru/promotions">
										<?php echo $translations['faq_bonuses'] ?? 'бонусы для ставок и акции'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_vip'] ?? ', а также предлагаем присоединиться к эксклюзивному '; ?>
									</span>
									<a class="faq-link" href="/ru/vip-club">
										<?php echo $translations['faq_vip_club'] ?? 'VIP-клубу'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_deposit'] ?? ' – причем насладиться этими преимуществами можно, легко и комфортно '; ?>
									</span>
									<a class="faq-link" href="/ru/blog/deposit-withdrawal-methods-online-betting">
										<?php echo $translations['faq_deposit_link'] ?? 'пополнив счет'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_licensed'] ?? ' на этой лицензированной платформе.'; ?>
									</span>
								</p>
							</div>
						</div>
					</div>
				</div>
				<!-- FAQ Item 2 -->
				<div class="faq-item faq-accordion">
					<div class="faq-accordion-header">
						<div class="faq-accordion-title-wrapper">
							<p class="faq-accordion-title">
								<?php echo $translations['faq_has_license'] ?? 'Имеет ли Stake лицензию?'; ?>
							</p>
						</div>
						<div class="faq-accordion-arrow">
							<?php echo $faq_arrow_icon_svg; ?>
						</div>
					</div>
					<div class="faq-accordion-content">
						<div class="faq-content-wrapper">
							<div class="faq-content-block">
								<p class="faq-inline-text">
									<span class="faq-text-subtle">
										<?php echo $translations['faq_license_info'] ?? 'Stake.com имеет лицензию игорных властей Кюрасао, предоставляя безопасную и надежную платформу для ставок. Stake управляется компанией Medium Rare N.V. в соответствии с Certificate of Operation (заявка № OGL/2024/1451/0918), выданным Curaçao Gaming Control Board, который уполномочен и регулируется Правительством Кюрасао.'; ?>
									</span>
								</p>
								<p class="faq-inline-text">
									<span class="faq-text-subtle">
										<?php echo $translations['faq_verified_operator'] ?? 'Компания Stake является верифицированным оператором '; ?>
									</span>
									<a class="faq-link" href="https://cryptogambling.org/" target="_blank" rel="external noreferrer noopener">
										<?php echo $translations['faq_crypto_gambling'] ?? 'Crypto Gambling Foundation'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_aml_policy'] ?? ' и придерживается строгой политики '; ?>
									</span>
									<a class="faq-link" href="/ru/policies/anti-money-laundering">
										<?php echo $translations['faq_aml_link'] ?? 'по борьбе с отмыванием денег'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_self_exclusion'] ?? '. Stake поощряет ответственное отношение к азартным играм, предлагая эффективную '; ?>
									</span>
									<a class="faq-link" href="/ru/policies/self-exclusion">
										<?php echo $translations['faq_self_exclusion_link'] ?? 'политику самоисключения'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_stake_smart'] ?? ' и различные '; ?>
									</span>
									<a class="faq-link" href="/ru/responsible-gambling/stake-smart">
										<?php echo $translations['faq_stake_smart_link'] ?? 'ресурсы по разумным ставкам Stake Smart'; ?>
									</a>
									<span class="faq-text-subtle">.</span>
								</p>
							</div>
						</div>
					</div>
				</div>
				<!-- FAQ Item 3 -->
				<div class="faq-item faq-accordion">
					<div class="faq-accordion-header">
						<div class="faq-accordion-title-wrapper">
							<p class="faq-accordion-title">
								<?php echo $translations['faq_is_safe'] ?? 'Безопасно ли делать ставки на Stake?'; ?>
							</p>
						</div>
						<div class="faq-accordion-arrow">
							<?php echo $faq_arrow_icon_svg; ?>
						</div>
					</div>
					<div class="faq-accordion-content">
						<div class="faq-content-wrapper">
							<div class="faq-content-block">
								<p class="faq-inline-text">
									<span class="faq-text-subtle">
										<?php echo $translations['faq_safety_info'] ?? 'Stake прилагает все силы для создания безопасной игровой платформы. Мы рады предложить самые актуальные и доступные '; ?>
									</span>
									<a class="faq-link" href="/ru/responsible-gambling/stake-smart">
										<?php echo $translations['faq_gambling_resources'] ?? 'ресурсы, посвященные ставкам в азартных играх'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_responsible_gambling'] ?? '. Чтобы помочь игрокам установить подходящие лимиты ставок, были разработаны '; ?>
									</span>
									<a class="faq-link" href="/ru/blog/responsible-gambling-online-guide-stake-smart">
										<?php echo $translations['faq_responsible_gambling_guide'] ?? 'рекомендации по ответственной игре'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_and'] ?? ', а также '; ?>
									</span>
									<a class="faq-link" href="/ru/responsible-gambling/calculator">
										<?php echo $translations['faq_budget_calculator'] ?? 'калькулятор месячного бюджета'; ?>
									</a>
									<span class="faq-text-subtle">.</span>
								</p>
								<p class="faq-inline-text">
									<span class="faq-text-subtle">
										<?php echo $translations['faq_secure_funds'] ?? 'Делая ставки с помощью местной валюты и криптовалюты, игроки могут быть уверены, что их средства находятся в безопасности благодаря нашей '; ?>
									</span>
									<a class="faq-link" href="/ru/blog/how-to-use-our-vault">
										<?php echo $translations['faq_vault_feature'] ?? 'функции хранилища Stake'; ?>
									</a>
									<span class="faq-text-subtle">.</span>
								</p>
							</div>
						</div>
					</div>
				</div>
				<!-- FAQ Item 4 -->
				<div class="faq-item faq-accordion">
					<div class="faq-accordion-header">
						<div class="faq-accordion-title-wrapper">
							<p class="faq-accordion-title">
								<?php echo $translations['faq_currencies'] ?? 'С помощью каких валют можно делать ставки?'; ?>
							</p>
						</div>
						<div class="faq-accordion-arrow">
							<?php echo $faq_arrow_icon_svg; ?>
						</div>
					</div>
					<div class="faq-accordion-content">
						<div class="faq-content-wrapper">
							<div class="faq-content-block">
								<p class="faq-inline-text">
									<span class="faq-text-subtle">
										<?php echo $translations['faq_currency_info'] ?? 'Ознакомьтесь с нашим широким выбором '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/group/recommended-slots">
										<?php echo $translations['faq_popular_games'] ?? 'популярных игр казино'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_game_experience'] ?? ' и насладитесь честной и увлекательной игрой онлайн. Онлайн-платформа казино Stake предлагает широкий выбор категорий игр, включая '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/group/slots">
										<?php echo $translations['faq_slots'] ?? 'слоты'; ?>
									</a>
									<span class="faq-text-subtle">,</span>
									<a class="faq-link" href="/ru/casino/group/live-casino">
										<?php echo $translations['faq_live_games'] ?? 'live игры с живыми дилерами'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_classic_games'] ?? ', а также многие классические '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/group/table-games">
										<?php echo $translations['faq_table_games'] ?? 'настольные развлечения,'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_table_games_list'] ?? ' такие как '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/group/blackjack">
										<?php echo $translations['faq_blackjack'] ?? 'блэкджек'; ?>
									</a>
									<span class="faq-text-subtle">,</span>
									<a class="faq-link" href="/ru/casino/group/roulette">
										<?php echo $translations['faq_roulette'] ?? 'рулетка'; ?>
									</a>
									<span class="faq-text-subtle">,</span>
									<a class="faq-link" href="/ru/casino/group/poker">
										<?php echo $translations['faq_poker'] ?? 'покер'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_and'] ?? ' и '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/group/baccarat">
										<?php echo $translations['faq_baccarat'] ?? 'баккара'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_providers'] ?? ' – все это прямо в вашем браузере. Stake предлагает лучшие игры от ведущих '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/collection/provider">
										<?php echo $translations['faq_game_providers'] ?? 'провайдеров азартных онлайн-игр'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_provider_list'] ?? ', таких как '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/group/pragmatic-play">
										<?php echo $translations['faq_pragmatic_play'] ?? 'Pragmatic Play'; ?>
									</a>
									<span class="faq-text-subtle">,</span>
									<a class="faq-link" href="/ru/casino/group/hacksaw-gaming">
										<?php echo $translations['faq_hacksaw_gaming'] ?? 'Hacksaw Gaming'; ?>
									</a>
									<span class="faq-text-subtle">,</span>
									<a class="faq-link" href="/ru/casino/group/twist-gaming">
										<?php echo $translations['faq_twist_gaming'] ?? 'Twist Gaming'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_and'] ?? ' и '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/group/evolution-gaming">
										<?php echo $translations['faq_evolution_gaming'] ?? 'Evolution Gaming'; ?>
									</a>
									<span class="faq-text-subtle">.</span>
								</p>
								<p class="faq-inline-text">
									<span class="faq-text-subtle">
										<?php echo $translations['faq_stake_originals'] ?? 'Наши эксклюзивные игры '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/group/stake-originals">
										<?php echo $translations['faq_stake_originals_link'] ?? 'Stake Originals'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_originals_description'] ?? ' также предлагают игрокам любого уровня увлекательный и простой в освоении игровой опыт – от классических настольных игр, таких как '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/games/blackjack">
										<?php echo $translations['faq_blackjack'] ?? 'блэкджек'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_and'] ?? ' и '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/games/baccarat">
										<?php echo $translations['faq_baccarat'] ?? 'баккара'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_popular_games_list'] ?? ', до любимых многими развлечений, таких как '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/games/plinko">
										<?php echo $translations['faq_plinko'] ?? 'Plinko'; ?>
									</a>
									<span class="faq-text-subtle">,</span>
									<a class="faq-link" href="/ru/casino/games/mines">
										<?php echo $translations['faq_mines'] ?? 'Mines'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_and'] ?? ' и '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/games/crash">
										<?php echo $translations['faq_crash'] ?? 'Crash'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_new_games'] ?? '! У нас всегда найдется что-то для каждого, ведь команда постоянно добавляет в коллекцию Stake Originals новые и захватывающие игры с уникальным игровым процессом и особенностями, в том числе в популярных играх, таких как '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/games/darts">
										<?php echo $translations['faq_darts'] ?? 'Darts'; ?>
									</a>
									<span class="faq-text-subtle">,</span>
									<a class="faq-link" href="/ru/casino/games/bars">
										<?php echo $translations['faq_bars'] ?? 'Bars'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_and'] ?? ' и '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/games/packs">
										<?php echo $translations['faq_packs'] ?? 'Packs'; ?>
									</a>
									<span class="faq-text-subtle">.</span>
								</p>
							</div>
						</div>
					</div>
				</div>
				<!-- FAQ Item 5 -->
				<div class="faq-item faq-accordion">
					<div class="faq-accordion-header">
						<div class="faq-accordion-title-wrapper">
							<p class="faq-accordion-title">
								<?php echo $translations['faq_games_available'] ?? 'Какие виды игр доступны в казино?'; ?>
							</p>
						</div>
						<div class="faq-accordion-arrow">
							<?php echo $faq_arrow_icon_svg; ?>
						</div>
					</div>
					<div class="faq-accordion-content">
						<div class="faq-content-wrapper">
							<div class="faq-content-block">
								<p class="faq-inline-text">
									<span class="faq-text-subtle">
										<?php echo $translations['faq_games_intro'] ?? 'Ознакомьтесь с широким выбором '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/group/recommended-slots">
										<?php echo $translations['faq_popular_games'] ?? 'популярных игр казино'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_games_description'] ?? ' и насладитесь честной и увлекательной игрой онлайн. На платформе онлайн-казино Stake представлены различные категории игр, включая '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/group/slots">
										<?php echo $translations['faq_slots'] ?? 'слоты'; ?>
									</a>
									<span class="faq-text-subtle">,</span>
									<a class="faq-link" href="/ru/casino/group/live-casino">
										<?php echo $translations['faq_live_casino_games'] ?? 'игры Live-казино'; ?>
									</a>
									<span class="faq-text-subtle">,</span>
									<a class="faq-link" href="/ru/casino/group/stake-originals">
										<?php echo $translations['faq_stake_originals'] ?? 'продукты Stake Originals'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_classic_games'] ?? ', а также классические игры, такие как '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/group/blackjack">
										<?php echo $translations['faq_blackjack'] ?? 'Блэкджек'; ?>
									</a>
									<span class="faq-text-subtle">,</span>
									<a class="faq-link" href="/ru/casino/group/roulette">
										<?php echo $translations['faq_roulette'] ?? 'Рулетка'; ?>
									</a>
									<span class="faq-text-subtle">,</span>
									<a class="faq-link" href="/ru/casino/group/poker">
										<?php echo $translations['faq_poker'] ?? 'Покер'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_and'] ?? ' и '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/group/baccarat">
										<?php echo $translations['faq_baccarat'] ?? 'Баккара'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_providers'] ?? '. Stake предлагает лучшие игры от таких известных '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/collection/provider">
										<?php echo $translations['faq_igaming_providers'] ?? 'провайдеров iGaming'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_provider_list'] ?? ', как '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/group/pragmatic-play">
										<?php echo $translations['faq_pragmatic_play'] ?? 'Pragmatic Play,'; ?>
									</a>
									<span class="faq-text-subtle"></span>
									<a class="faq-link" href="/ru/casino/group/hacksaw-gaming">
										<?php echo $translations['faq_hacksaw_gaming'] ?? 'Hacksaw Gaming'; ?>
									</a>
									<span class="faq-text-subtle">,</span>
									<a class="faq-link" href="/ru/casino/group/twist-gaming">
										<?php echo $translations['faq_twist_gaming'] ?? 'Twist Gaming'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_and'] ?? ' и '; ?>
									</span>
									<a class="faq-link" href="/ru/casino/group/evolution-gaming">
										<?php echo $translations['faq_evolution'] ?? 'Evolution.'; ?>
									</a>
								</p>
							</div>
						</div>
					</div>
				</div>
				<!-- FAQ Item 6 -->
				<div class="faq-item faq-accordion">
					<div class="faq-accordion-header">
						<div class="faq-accordion-title-wrapper">
							<p class="faq-accordion-title">
								<?php echo $translations['faq_sports_betting'] ?? 'На какие виды спорта можно делать ставки?'; ?>
							</p>
						</div>
						<div class="faq-accordion-arrow">
							<?php echo $faq_arrow_icon_svg; ?>
						</div>
					</div>
					<div class="faq-accordion-content">
						<div class="faq-content-wrapper">
							<div class="faq-content-block">
								<p class="faq-inline-text">
									<span class="faq-text-subtle">
										<?php echo $translations['faq_sports_intro'] ?? 'На нашем сайте представлены все виды спорта и '; ?>
									</span>
									<a class="faq-link" href="/ru/sports/esports">
										<?php echo $translations['faq_esports'] ?? 'киберспорта'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_sports_leagues'] ?? ' – от крупных '; ?>
									</span>
									<a class="faq-link" href="/ru/sports/soccer">
										<?php echo $translations['faq_soccer'] ?? 'футбольных'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_and'] ?? ' и '; ?>
									</span>
									<a class="faq-link" href="/ru/sports/basketball">
										<?php echo $translations['faq_basketball'] ?? 'баскетбольных'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_esports_leagues'] ?? ' лиг до соревнований по '; ?>
									</span>
									<a class="faq-link" href="/ru/sports/dota-2">
										<?php echo $translations['faq_dota2'] ?? 'Dota 2'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_and'] ?? ' и '; ?>
									</span>
									<a class="faq-link" href="/ru/sports/counter-strike">
										<?php echo $translations['faq_csgo'] ?? 'CS:GO'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_betting_resources'] ?? '. Мы предлагаем лучшие в отрасли коэффициенты и специализированные ресурсы для ставок, включая экспертные прогнозы и прогнозы в '; ?>
									</span>
									<a class="faq-link" href="/ru/blog">
										<?php echo $translations['faq_stake_blog'] ?? 'новостном блоге Stake'; ?>
									</a>
									<span class="faq-text-subtle">.</span>
								</p>
								<p class="faq-inline-text">
									<span class="faq-text-subtle">
										<?php echo $translations['faq_sports_events'] ?? 'Вы можете делать ставки на все основные '; ?>
									</span>
									<a class="faq-link" href="/ru/sports/upcoming">
										<?php echo $translations['faq_upcoming_events'] ?? 'предстоящие спортивные события'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_live_betting'] ?? ', размещать '; ?>
									</span>
									<a class="faq-link" href="/ru/blog/live-betting-vs-pre-match-betting">
										<?php echo $translations['faq_live_betting_link'] ?? 'ставки по ходу события'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_streaming'] ?? ' и смотреть '; ?>
									</span>
									<a class="faq-link" href="/ru/blog/how-to-watch-live-stream-sports-free">
										<?php echo $translations['faq_live_streaming'] ?? 'прямые трансляции'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_free_streaming'] ?? ' всех крупнейших спортивных событий бесплатно в '; ?>
									</span>
									<a class="faq-link" href="/ru/sports/home">
										<?php echo $translations['faq_sportsbook'] ?? 'букмекере Stake.'; ?>
									</a>
								</p>
							</div>
						</div>
					</div>
				</div>
				<!-- FAQ Item 7 -->
				<div class="faq-item faq-accordion">
					<div class="faq-accordion-header">
						<div class="faq-accordion-title-wrapper">
							<p class="faq-accordion-title">
								<?php echo $translations['faq_live_streams'] ?? 'Как смотреть прямые трансляции?'; ?>
							</p>
						</div>
						<div class="faq-accordion-arrow">
							<?php echo $faq_arrow_icon_svg; ?>
						</div>
					</div>
					<div class="faq-accordion-content">
						<div class="faq-content-wrapper">
							<div class="faq-content-block">
								<p class="faq-inline-text">
									<span class="faq-text-subtle">
										<?php echo $translations['faq_streaming_info'] ?? 'Stake.com – это идеальное место для просмотра официальных стримов, где представлены все популярные спортивные события и турниры, от '; ?>
									</span>
									<a class="faq-link" href="/ru/sports/tennis">
										<?php echo $translations['faq_tennis'] ?? 'теннисных матчей'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_to'] ?? ' до '; ?>
									</span>
									<a class="faq-link" href="/ru/sports/mma">
										<?php echo $translations['faq_mma'] ?? 'боев MMA'; ?>
									</a>
									<span class="faq-text-subtle">.</span>
								</p>
								<p class="faq-inline-text">
									<span class="faq-text-subtle">
										<?php echo $translations['faq_how_to_stream'] ?? 'Чтобы посмотреть прямую трансляцию последних спортивных событий, нажмите на значок прямой трансляции рядом с событием в '; ?>
									</span>
									<a class="faq-link" href="/ru/sports/home">
										<?php echo $translations['faq_sportsbook'] ?? 'букмекере Stake'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_streaming_guide'] ?? '. Для получения подробной информации ознакомьтесь с нашим полным '; ?>
									</span>
									<a class="faq-link" href="/ru/blog/how-to-watch-live-stream-sports-free">
										<?php echo $translations['faq_streaming_guide_link'] ?? 'руководством по прямой трансляции'; ?>
									</a>
									<span class="faq-text-subtle">
										<?php echo $translations['faq_streaming_end'] ?? ' любимых спортивных событий на Stake.com.'; ?>
									</span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>
		document.addEventListener('DOMContentLoaded', () => {
			// SVG icon strings
			const arrowClosed = `<svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon" style="transform: rotate(0deg);"><title></title><path d="M32.274 49.762 9.204 26.69l6.928-6.93 16.145 16.145L48.42 19.762l6.93 6.929-23.072 23.07z"></path></svg>`;
			const arrowOpen = `<svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon" style="transform: rotate(180deg);"><title></title><path d="M32.274 49.762 9.204 26.69l6.928-6.93 16.145 16.145L48.42 19.762l6.93 6.929-23.072 23.07z"></path></svg>`;

			// Get all accordion headers
			const headers = document.querySelectorAll('.faq-accordion-header');

			headers.forEach(header => {
				header.addEventListener('click', () => {
					const accordion = header.parentElement;
					const content = header.nextElementSibling;
					const arrow = header.querySelector('.faq-accordion-arrow');
					const isOpen = accordion.classList.contains('faq-is-open');

					// Close all other accordions (optional: remove this block if multiple open accordions are desired)
					document.querySelectorAll('.faq-accordion').forEach(otherAccordion => {
						if (otherAccordion !== accordion && otherAccordion.classList.contains('faq-is-open')) {
							otherAccordion.classList.remove('faq-is-open');
							otherAccordion.querySelector('.faq-accordion-content').classList.remove('faq-is-open');
							otherAccordion.querySelector('.faq-accordion-arrow').innerHTML = arrowClosed;
						}
					});

					// Toggle current accordion
					accordion.classList.toggle('faq-is-open', !isOpen);
					content.classList.toggle('faq-is-open', !isOpen);

					// Update arrow icon
					arrow.innerHTML = isOpen ? arrowClosed : arrowOpen;
				});
			});
		});
	</script>

<?php
}
?>