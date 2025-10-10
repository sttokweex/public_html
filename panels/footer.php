<?php
function render_footer($translations, $current_language = 'en')
{
	// Use session language if set, otherwise fall back to default
	if (isset($_SESSION['lang'])) {
		$current_language = $_SESSION['lang']; // Use language code (e.g., 'ru' or 'en')
	}
?>
	<link href="/css/footer.css" rel="stylesheet">
	<footer>
		<div class="footer">
			<div class="footer-wrapper col-mob-4 col-dsk-12">
				<div class="footer-grid">
					<div class="col-mob-4 col-dsk-12">
						<div class="footer-media">
							<div class="col-mob-4 col-dsk-4">
								<div class="footer-media-terms">
									<span class="footer-media-title"><?php echo $translations['footer_gambling_cost']; ?></span>
									<a class="footer-media-terms-image" href="https://www.hollandcasino.nl/en/online/veilig-en-verantwoord-spelen" target="_self"><img loading="lazy" alt="Terms" draggable="false" class="Image__image--2Bt Media__termsImage--17n" src="../images/HC_RG_LOGO_RGB.png"></a>
								</div>
							</div>
							<div class="col-mob-4 col-dsk-4">
								<div class="footer-media-sponsors">
									<a class="footer-media-image" href="https://kansspelautoriteit.nl/veilig-spelen/" target="_self">
										<img loading="lazy" alt="REGULATORY Logo  1 - KSA Logo " draggable="false" class="footer-media-sponsors-image" src="../images/svgviewer-output.svg">
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-mob-4 col-dsk-6">
						<ul class="footer-grid">
							<li class="col-mob-4 col-dsk-3 footer-menu-block">
								<span class="footer-menu-title"><?php echo $translations['footer_holland_casino_online']; ?></span>
								<ul class="footer-menu-inner">
									<li><a class="footer-menu-link" href="https://www.hollandcasino.nl/en/terms-conditions" target="_self"><?php echo $translations['footer_terms_conditions']; ?></a></li>
									<li><a class="footer-menu-link" href="https://www.hollandcasino.nl/en/online/veilig-en-verantwoord-spelen" target="_self"><?php echo $translations['footer_play_responsibly']; ?></a></li>
									<li><a class="footer-menu-link" href="https://www.hollandcasino.nl/en/privacy-policy" target="_self"><?php echo $translations['footer_privacy_statement']; ?></a></li>
									<li><a class="footer-menu-link" href="https://www.hollandcasino.nl/en/wedregels" target="_self"><?php echo $translations['footer_betting_rules']; ?></a></li>
									<li><a class="footer-menu-link" href="https://www.hollandcasino.nl/en/informatie-sportorganisaties" target="_self"><?php echo $translations['footer_info_sports_organisations']; ?></a></li>
									<li><a class="footer-menu-link" href="https://www.hollandcasino.nl/en/cookie-policy" target="_self"><?php echo $translations['footer_cookie_statement']; ?></a></li>
									<li><a class="footer-menu-link" href="https://www.hollandcasino.nl/en/cookie-settings" target="_self"><?php echo $translations['footer_cookie_settings']; ?></a></li>
									<li><a class="footer-menu-link" href="https://www.hollandcasino.nl/en/afmelden-advertenties" target="_self"><?php echo $translations['footer_ad_preferences']; ?></a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="col-mob-4 col-dsk-6">
						<div class="footer-media-providers">
							<h4 class="footer-media-providers-title"><?php echo $translations['footer_game_providers']; ?></h4>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/playtech" target="_self">
								<img loading="lazy" alt="Playtech" draggable="false" class="footer-media-providers-image" src="../images/providers/Playtech.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/pragmatic-play" target="_self">
								<img loading="lazy" alt="Pragmatic Play" draggable="false" class="footer-media-providers-image" src="../images/providers/pragmatic.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/greentube" target="_self">
								<img loading="lazy" alt="Greentube" draggable="false" class="footer-media-providers-image" src="../images/providers/greentube.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/play-n-go" target="_self">
								<img loading="lazy" alt="Play N Go" draggable="false" class="footer-media-providers-image" src="../images/providers/playngo.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/games-global" target="_self">
								<img loading="lazy" alt="Microgaming" draggable="false" class="footer-media-providers-image" src="../images/providers/gamesglobal.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/skywind-group" target="_self">
								<img loading="lazy" alt="Skywind" draggable="false" class="footer-media-providers-image" src="../images/providers/skywind.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/igt" target="_self">
								<img loading="lazy" alt="IGT" draggable="false" class="footer-media-providers-image" src="../images/providers/igt.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/ruby-play" target="_self">
								<img loading="lazy" alt="Ruby Play" draggable="false" class="footer-media-providers-image" src="../images/providers/rubyplay.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/light-and-wonder" target="_self">
								<img loading="lazy" alt="Light and Wonder" draggable="false" class="footer-media-providers-image" src="../images/providers/lightwonder.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/blueprint-gaming" target="_self">
								<img loading="lazy" alt="Blueprint" draggable="false" class="footer-media-providers-image" src="../images/providers/blueprint.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/relax" target="_self">
								<img loading="lazy" alt="Relax" draggable="false" class="footer-media-providers-image" src="../images/providers/relax.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/spinomenal" target="_self">
								<img loading="lazy" alt="Spinomenal" draggable="false" class="footer-media-providers-image" src="../images/providers/spinomenal.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/quickspin" target="_self">
								<img loading="lazy" alt="Quickspin" draggable="false" class="footer-media-providers-image" src="../images/providers/quickspin.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/bragg" target="_self">
								<img loading="lazy" alt="Oryx" draggable="false" class="footer-media-providers-image" src="../images/providers/bragg.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/netent" target="_self">
								<img loading="lazy" alt="Netent" draggable="false" class="footer-media-providers-image" src="../images/providers/netent.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/red-tiger" target="_self">
								<img loading="lazy" alt="Red Tiger" draggable="false" class="footer-media-providers-image" src="../images/providers/redtiger.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/isoftbet" target="_self">
								<img loading="lazy" alt="iSoftBet" draggable="false" class="footer-media-providers-image" src="../images/providers/isoftbet.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/habanero-games" target="_self">
								<img loading="lazy" alt="Habanero" draggable="false" class="footer-media-providers-image" src="../images/providers/habanero.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/pariplay" target="_self">
								<img loading="lazy" alt="Pariplay" draggable="false" class="footer-media-providers-image" src="../images/providers/pariplay.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/betsoft" target="_self">
								<img loading="lazy" alt="Betsoft" draggable="false" class="footer-media-providers-image" src="../images/providers/betsoft.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/elk-studios" target="_self">
								<img loading="lazy" alt="ELK Studios" draggable="false" class="footer-media-providers-image" src="../images/providers/elkstudios.svg">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/red-rake" target="_self">
								<img loading="lazy" alt="Redrake" draggable="false" class="footer-media-providers-image" src="../images/providers/redrake.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/kiron" target="_self">
								<img loading="lazy" alt="Kiron" draggable="false" class="footer-media-providers-image" src="../images/providers/kiron.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/raw" target="_self">
								<img loading="lazy" alt="Raw" draggable="false" class="footer-media-providers-image" src="../images/providers/raw.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/inspired" target="_self">
								<img loading="lazy" alt="Inspired" draggable="false" class="footer-media-providers-image" src="../images/providers/inspired.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/yggdrasil" target="_self">
								<img loading="lazy" alt="Yggdrasil" draggable="false" class="footer-media-providers-image" src="../images/providers/yggdrasil.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/booming-games" target="_self">
								<img loading="lazy" alt="Booming games" draggable="false" class="footer-media-providers-image" src="../images/providers/boominggames.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/1x2-gaming" target="_self">
								<img loading="lazy" alt="1x2 gaming" draggable="false" class="footer-media-providers-image" src="../images/providers/1X2gaming.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/playzido" target="_self">
								<img loading="lazy" alt="Playzido" draggable="false" class="footer-media-providers-image" src="../images/providers/playzido.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/game-providers/mga" target="_self">
								<img loading="lazy" alt="MGA" draggable="false" class="footer-media-providers-image" src="../images/providers/mga.png">
							</a>
						</div>
						<div class="footer-media-payment">
							<h4 class="footer-media-payment-title"><?php echo $translations['footer_payment_methods']; ?></h4>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/casino" target="_self">
								<img loading="lazy" alt="Payment Method 1 - Ideal" draggable="false" class="footer-media-payment-image" src="../images/payments/ideal.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/casino" target="_self">
								<img loading="lazy" alt="Payment Method 2 - VISA" draggable="false" class="footer-media-payment-image" src="../images/payments/visa.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/casino" target="_self">
								<img loading="lazy" alt="Payment Method 3 - MasterCard" draggable="false" class="footer-media-payment-image" src="../images/payments/mastercard.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/casino" target="_self">
								<img loading="lazy" alt="Payment Method 4 - Maestro" draggable="false" class="footer-media-payment-image" src="../images/payments/maestro.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/casino" target="_self">
								<img loading="lazy" alt="Payment Method 5 - Trustly" draggable="false" class="footer-media-payment-image" src="../images/payments/trustly%20Payment.png">
							</a>
							<a class="footer-media-image" href="https://www.hollandcasino.nl/en/casino" target="_self">
								<img loading="lazy" alt="Payment Method 6 - Paypal" draggable="false" class="footer-media-payment-image" src="../images/payments/paypal.webp?siteid=1">
							</a>
						</div>
					</div>
				</div>
				<div class="footer-grid">
					<div class="col-mob-4 col-dsk-12">
						<div class="footer-language">
							<h4 class="footer-language-title"><?php echo $translations['footer_language_selection']; ?></h4>
							<div class="footer-language-select">
								<select class="footer-language-dropdown" id="language-select">
									<option value="en" <?php echo $current_language === 'en' ? 'selected' : ''; ?>><?php echo $translations['footer_language_en']; ?></option>
									<option value="ru" <?php echo $current_language === 'ru' ? 'selected' : ''; ?>><?php echo $translations['footer_language_ru']; ?></option>
									<option value="es" <?php echo $current_language === 'es' ? 'selected' : ''; ?>><?php echo $translations['footer_language_ea']; ?></option>

								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-grid">
					<div class="col-mob-4 col-dsk-12">
						<div class="footer-contact">
							<div class="footer-contact-wrapper">
								<p class="footer-contact-text"><span><?php echo $translations['footer_copyright']; ?></span></p>
								<ul>
									<li><a class="footer-contact-text" href="https://www.hollandcasino.nl/en/casino" target="_self"><?php echo $translations['footer_license_info']; ?></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<script>
		document.getElementById('language-select').addEventListener('change', function() {
			var lang = this.value;
			window.location.href = '/language.php?lang=' + encodeURIComponent(lang);
		});
	</script>
<?php
}
?>