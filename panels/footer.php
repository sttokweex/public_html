<?php
function render_footer($translations)
{
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
									<a class="footer-media-terms-image" href="/en/online/veilig-en-verantwoord-spelen" target="_self"><img alt="Terms" draggable="false" class="Image__image--2Bt Media__termsImage--17n" src="https://www.hollandcasino.nl/library/Footer/HC_RG_LOGO_RGB%20(1).png"></a>
								</div>
							</div>
							<div class="col-mob-4 col-dsk-4">
								<div class="footer-media-sponsors">
									<a class="footer-media-image" href="https://kansspelautoriteit.nl/veilig-spelen/" target="_self">
										<img alt="REGULATORY Logo  1 - KSA Logo " draggable="false" class="footer-media-sponsors-image" src="https://www.hollandcasino.nl/library/Footer/Regulatory%20Logos/svgviewer-output.svg">
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-mob-4 col-dsk-6">
						<ul class="footer-grid">
							<li class="col-mob-4 col-dsk-3 footer-menu-block">
								<span class="footer-menu-title"><?php echo $translations['footer_holland_casino_online']; ?></span>
								<ul>
									<li><a class="footer-menu-link" href="/en/terms-conditions" target="_self"><?php echo $translations['footer_terms_conditions']; ?></a></li>
									<li><a class="footer-menu-link" href="/en/online/veilig-en-verantwoord-spelen" target="_self"><?php echo $translations['footer_play_responsibly']; ?></a></li>
									<li><a class="footer-menu-link" href="/en/privacy-policy" target="_self"><?php echo $translations['footer_privacy_statement']; ?></a></li>
									<li><a class="footer-menu-link" href="/en/wedregels" target="_self"><?php echo $translations['footer_betting_rules']; ?></a></li>
									<li><a class="footer-menu-link" href="/en/informatie-sportorganisaties" target="_self"><?php echo $translations['footer_info_sports_organisations']; ?></a></li>
									<li><a class="footer-menu-link" href="/en/cookie-policy" target="_self"><?php echo $translations['footer_cookie_statement']; ?></a></li>
									<li><a class="footer-menu-link" href="/en/cookie-settings" target="_self"><?php echo $translations['footer_cookie_settings']; ?></a></li>
									<li><a class="footer-menu-link" href="/en/afmelden-advertenties" target="_self"><?php echo $translations['footer_ad_preferences']; ?></a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="col-mob-4 col-dsk-6">
						<div class="footer-media-providers">
							<h4 class="footer-media-providers-title"><?php echo $translations['footer_game_providers']; ?></h4>
							<a class="footer-media-image" href="/en/game-providers/playtech" target="_self">
								<img alt="Playtech" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Footer/Game%20providers/Playtech.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/pragmatic-play" target="_self">
								<img alt="Pragmatic Play" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/pragmatic.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/greentube" target="_self">
								<img alt="Greentube" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/greentube.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/play-n-go" target="_self">
								<img alt="Play N Go" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/playngo.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/games-global" target="_self">
								<img alt="Microgaming" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/gamesglobal.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/skywind-group" target="_self">
								<img alt="Skywind" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/skywind.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/igt" target="_self">
								<img alt="IGT" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/igt.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/ruby-play" target="_self">
								<img alt="Ruby Play" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/rubyplay.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/light-and-wonder" target="_self">
								<img alt="Light and Wonder" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/lightwonder.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/blueprint-gaming" target="_self">
								<img alt="Blueprint" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/blueprint.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/relax" target="_self">
								<img alt="Relax" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/relax.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/spinomenal" target="_self">
								<img alt="Spinomenal" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/spinomenal.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/quickspin" target="_self">
								<img alt="Quickspin" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/quickspin.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/bragg" target="_self">
								<img alt="Oryx" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/bragg.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/netent" target="_self">
								<img alt="Netent" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/netent.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/red-tiger" target="_self">
								<img alt="Red Tiger" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/redtiger.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/isoftbet" target="_self">
								<img alt="iSoftBet" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/isoftbet.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/habanero-games" target="_self">
								<img alt="Habanero" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/habanero.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/pariplay" target="_self">
								<img alt="Pariplay" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/pariplay.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/betsoft" target="_self">
								<img alt="Betsoft" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/betsoft.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/elk-studios" target="_self">
								<img alt="ELK Studios" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/elkstudios.svg">
							</a>
							<a class="footer-media-image" href="/en/game-providers/red-rake" target="_self">
								<img alt="Redrake" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/redrake.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/kiron" target="_self">
								<img alt="Kiron" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/kiron.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/raw" target="_self">
								<img alt="Raw" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/raw.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/inspired" target="_self">
								<img alt="Inspired" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/HCO_Partner-logos/inspired.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/yggdrasil" target="_self">
								<img alt="Yggdrasil" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/HCO_Partner-logos/yggdrasil.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/booming-games" target="_self">
								<img alt="Booming games" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/HCO_Partner-logos/boominggames.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/1x2-gaming" target="_self">
								<img alt="1x2 gaming" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/HCO_Partner-logos/1X2gaming.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/playzido" target="_self">
								<img alt="Playzido" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/HCO_Partner-logos/playzido.png">
							</a>
							<a class="footer-media-image" href="/en/game-providers/mga" target="_self">
								<img alt="MGA" draggable="false" class="footer-media-providers-image" src="https://www.hollandcasino.nl/library/Provider%20Logos/Provider%20Logos%20for%20game%20info%20page/HCO_Partner-logos/mga.png">
							</a>
						</div>
						<div class="footer-media-payment">
							<h4 class="footer-media-payment-title"><?php echo $translations['footer_payment_methods']; ?></h4>
							<a class="footer-media-image" href="/en/casino" target="_self">
								<img alt="Payment Method 1 - Ideal" draggable="false" class="footer-media-payment-image" src="https://www.hollandcasino.nl/library/Footer/Payment%20Methods/ideal.png">
							</a>
							<a class="footer-media-image" href="/en/casino" target="_self">
								<img alt="Payment Method 2 - VISA" draggable="false" class="footer-media-payment-image" src="https://www.hollandcasino.nl/library/Footer/Payment%20Methods/visa.png">
							</a>
							<a class="footer-media-image" href="/en/casino" target="_self">
								<img alt="Payment Method 3 - MasterCard" draggable="false" class="footer-media-payment-image" src="https://www.hollandcasino.nl/library/Footer/Payment%20Methods/mastercard.png">
							</a>
							<a class="footer-media-image" href="/en/casino" target="_self">
								<img alt="Payment Method 4 - Maestro" draggable="false" class="footer-media-payment-image" src="https://www.hollandcasino.nl/library/Footer/Payment%20Methods/maestro.png">
							</a>
							<a class="footer-media-image" href="/en/casino" target="_self">
								<img alt="Payment Method 5 - Trustly" draggable="false" class="footer-media-payment-image" src="https://www.hollandcasino.nl/library/Footer/Payment%20Methods/trustly%20Payment.png">
							</a>
							<a class="footer-media-image" href="/en/casino" target="_self">
								<img alt="Payment Method 6 - Paypal" draggable="false" class="footer-media-payment-image" src="https://www.hollandcasino.nl/library/Footer/Payment%20Methods/paypal.webp?siteid=1">
							</a>
						</div>
					</div>
				</div>
				<div class="footer-grid">
					<div class="col-mob-4 col-dsk-12">
						<div class="footer-contact">
							<div class="footer-contact-wrapper">
								<p class="footer-contact-text"><span><?php echo $translations['footer_copyright']; ?></span></p>
								<ul>
									<li><a class="footer-contact-text" href="/en/casino" target="_self"><?php echo $translations['footer_license_info']; ?></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
<?php
}
?>