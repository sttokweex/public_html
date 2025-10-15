<?php
function render_footer($translations, $sitename = 'Stake')
{
	// SVG content variables (left empty as requested)
	$svg_external = '<svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon text-grey-300" style=""> <title></title> <path d="M24.059 3.766v7.058H10.824v42.352h42.352V39.94h7.058v20.293H3.766V3.766zm36.18 0V24.94h-7.06v-9.12l-25.3 25.296-4.992-4.996 25.297-25.297h-9.125V3.766z"></path></svg>';
	$svg_blog = '<svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon w-6 md:w-4 h-auto text-white" style=""> <title> Блог</title> <path d="M16.004 2.664v48c0 1.6-1.066 2.666-2.666 2.666s-2.666-1.066-2.666-2.666V7.998h-8v45.334c0 4.534 3.466 8 8 8h50.666V2.666H16.004zM34.67 47.998H24.004V26.664H34.67zm18.668 0H40.004v-8h13.334zm0-13.334H40.004v-8h13.334zm0-13.332H24.004v-8h29.334z"></path></svg>';
	$svg_forum = '<svg fill="currentColor" viewBox="0 0 96 96" class="svg-icon w-6 md:w-4 h-auto text-white" style=""> <title>Форум</title> <path d="M74.04 24.68V44.4c0 8.16-6.64 14.8-14.8 14.8h-29.6v9.88c0 2.72 2.2 4.92 4.92 4.92h29.92L93.8 95.96V29.6c0-2.72-2.2-4.92-4.92-4.92z"></path><path d="M59.24 0H4.92A4.92 4.92 0 0 0 0 4.92v39.52a4.92 4.92 0 0 0 4.92 4.92h54.32a4.92 4.92 0 0 0 4.92-4.92V4.92A4.92 4.92 0 0 0 59.24 0"></path></svg>';
	$svg_facebook = '<svg fill="currentColor" viewBox="0 0 96 96" class="svg-icon w-6 md:w-4 h-auto text-white" style=""> <title>Facebook</title> <path d="M80 8H16c-4.4 0-8 3.6-8 8v64c0 4.4 3.6 8 8 8h37.72V61.64c0-1.12-.92-2-2-2h-5.8c-1.08 0-2-.92-2-2v-6.92c0-1.08.92-2 2-2h5.8c1.08 0 2-.88 2-2v-6c0-4.48 1.12-7.88 3.68-10.44s5.92-3.84 10.24-3.84c2.44 0 4.68.08 6.6.28 1 .08 1.76.96 1.76 2v5.84c0 1.08-.92 2-2 2h-3.8q-3.12 0-4.32 1.44-.96 1.44-.96 3.84v4.88c0 1.12.92 2 2 2h6.8c1.2 0 2.12 1.08 1.96 2.28l-.92 6.88c-.12 1-.96 1.76-1.96 1.76h-5.88c-1.08 0-2 .88-2 2V88H80c4.4 0 8-3.6 8-8V16c0-4.4-3.6-8-8-8"></path></svg>';
	$svg_x = '<svg fill="currentColor" viewBox="0 0 96 96" class="svg-icon w-6 md:w-4 h-auto text-white" style=""> <title>x.com (Twitter)</title> <path d="M73.52 8H87L57.4 41.96 92 88H64.84L43.6 60 19.28 88H5.76l31.36-36.32L4 8h27.84l19.2 25.56zM68.8 80.04h7.48l-48.4-64.36h-8.04z"></path></svg>';
	$svg_instagram = '<svg fill="currentColor" viewBox="0 0 96 96" class="svg-icon w-6 md:w-4 h-auto text-white" style=""> <title>Instagram</title> <path d="M48 60c6.6 0 12-5.4 12-12s-5.4-12-12-12-12 5.4-12 12 5.4 12 12 12"></path><path d="M68.56 8H27.44C16.72 8 8 16.72 8 27.44v41.12C8 79.28 16.72 88 27.44 88h41.12C79.28 88 88 79.28 88 68.56V27.44C88 16.72 79.28 8 68.56 8m3.36 16.2c-2.28 0-4.12-1.84-4.12-4.08S69.64 16 71.92 16 76 17.84 76 20.12s-1.84 4.08-4.08 4.08M48 28c11 0 20 9 20 20s-9 20-20 20-20-9-20-20 9-20 20-20"></path></svg>';
	$svg_youtube = '<svg fill="currentColor" viewBox="0 0 96 96" class="svg-icon w-6 md:w-4 h-auto text-white" style=""> <title>YouTube</title> <path d="M80.722 18.036c-6.64-1.84-30-1.88-32.64-1.88s-26.16.04-32.76 1.88c-4.64 1.2-8.32 5-9.52 9.56-1.84 6.64-1.88 20.08-1.88 20.6 0 .56.04 13.8 1.88 20.52 1.16 4.68 4.8 8.32 9.52 9.56 6.64 1.68 30.12 1.72 32.76 1.72s25.92-.04 32.6-1.72c4.72-1.24 8.36-4.88 9.52-9.48 1.88-6.8 1.88-20.04 1.88-20.6 0-.52 0-13.88-1.88-20.52-1.2-4.68-4.92-8.48-9.48-9.64m-39.32 44.8c-1 0-2-.28-2.92-.76a5.83 5.83 0 0 1-2.88-5.04v-17.72c0-2.08 1.12-3.92 2.88-5 1.8-1 3.96-1.04 5.76 0l15.52 8.88c1.8 1 2.92 2.96 2.92 5s-1.12 4-2.92 5.04l-15.52 8.88c-.92.52-1.88.76-2.88.76z"></path></svg>';
	$svg_shop = '<svg fill="currentColor" viewBox="0 0 96 96" class="svg-icon w-6 md:w-4 h-auto text-white" style=""> <title>Магазин</title> <path d="M12 16h16l4 12h54.24c2.8 0 4.72 2.8 3.76 5.4l-9 24c-.6 1.56-2.08 2.6-3.76 2.6H40c-2.2 0-4 1.8-4 4s1.8 4 4 4h36c2.2 0 4 1.8 4 4s-1.8 4-4 4H32L20 28h-8c-2.2 0-4-1.8-4-4v-4c0-2.2 1.8-4 4-4"></path><path d="M72 88a8 8 0 1 0 0-16 8 8 0 0 0 0 16m-40 0a8 8 0 1 0 0-16 8 8 0 0 0 0 16"></path></svg>';
	$svg_primedice = '<svg fill="currentColor" viewBox="0 0 96 96" class="svg-icon w-6 md:w-4 h-auto text-white" style=""> <title>Primedice</title> <path fill-rule="evenodd" d="m70.884 37.678-21-20.88a2.776 2.776 0 0 0-3.92 0l-21 20.88c-1.08 1.08-1.08 2.88 0 4l20.88 21c1.08 1.12 3.12 1.12 4.2 0l20.88-21c1.08-1.08 1.08-2.88 0-4zm-35.44 5.48c-1.88 0-3.4-1.56-3.4-3.4s1.56-3.4 3.4-3.4 3.4 1.56 3.4 3.4-1.56 3.4-3.4 3.4m12.48 12.48c-1.88 0-3.4-1.56-3.4-3.4s1.56-3.4 3.4-3.4 3.4 1.56 3.4 3.4-1.56 3.4-3.4 3.4m0-12.48c-1.88 0-3.4-1.56-3.4-3.4s1.56-3.4 3.4-3.4 3.4 1.56 3.4 3.4-1.56 3.4-3.4 3.4m0-12.44c-1.88 0-3.4-1.56-3.4-3.4s1.56-3.4 3.4-3.4 3.4 1.56 3.4 3.4-1.56 3.4-3.4 3.4m12.44 12.44c-1.88 0-3.4-1.56-3.4-3.4s1.56-3.4 3.4-3.4 3.4 1.56 3.4 3.4-1.56 3.4-3.4 3.4m-49.08 20.4 23.48-.08c.48 0 .88-.2 1.2-.48.2-.2.4-.44.48-.72.12-.28.2-.56.2-.88 0-.48-.16-.96-.52-1.32l-33-31.6c-.36-.4-.84-.56-1.28-.56-.48 0-.96.16-1.32.52q-.36.36-.48.72c-.08.28-.08.68 0 1.04l9.36 32c.2 1.04.96 1.36 1.92 1.36zm73.44 0-23.48-.08c-.48 0-.88-.2-1.2-.48-.2-.2-.4-.44-.48-.72-.12-.28-.2-.56-.2-.88 0-.48.16-.96.52-1.32l32.96-31.6c.36-.4.84-.56 1.28-.56.48 0 .96.16 1.32.52q.36.36.48.72c.08.28.08.68 0 1.04l-9.36 32c-.2 1.04-.96 1.36-1.92 1.36z" clip-rule="evenodd"></path><path d="M11.044 68.438h73.88c.76 0 1.4.64 1.4 1.4v4.8c0 .76-.64 1.4-1.4 1.4h-73.88c-.76 0-1.4-.64-1.4-1.4v-4.8c0-.76.64-1.4 1.4-1.4"></path></svg>';
	$svg_dropdown_arrow = '<svg fill="currentColor" viewBox="0 0 64 64"><path d="M32.274 49.762 9.204 26.69l6.928-6.93 16.145 16.145L48.42 19.762l6.93 6.929-23.072 23.07z"></path></svg>';
	$svg_logo = '<svg id="Layer_1" class="logo-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 200" class="svelte-md2ju7"><g id="Layer_5"><path fill="currentColor" d="M31.47,58.5c-.1-25.81,16.42-40.13,46.75-40.23,21.82-.08,25.72,14.2,25.72,19.39,0,9.94-14.06,20.48-14.06,20.48,0,0,.78,6.19,12.85,6.14,12.07-.05,23.83-8.02,23.76-27.96-.06-22.91-24.06-33.38-47.78-33.29C58.87,3.09,6.24,5.88,6.42,58.13c.18,46.41,87.76,50.5,87.83,80.21.12,32.27-36.08,40.96-48.33,40.96s-17.23-8.67-17.25-13.43c-.09-26.13,25.92-33.41,25.92-33.41,0-1.95-1.52-10.64-11.59-10.6-25.95.05-36.28,22.36-36.21,44.14.07,18.53,13.16,30.09,32.94,30.01,37.82-.14,80.46-18.59,80.3-59.56-.14-38.32-88.46-48.33-88.57-77.96Z"></path><path fill="currentColor" d="M391.96,161.17c-.3-.73-1.15-.56-2.27.37-4.29,3.54-14.1,13.56-37.06,13.65-41.85.16-49.12-68.83-49.12-68.83,0,0,31.9-23.81,36.88-33.42,4.98-9.61-10.87-11.7-10.87-11.7,0,0-22.31,27.15-38.13,35.1,1.72-11.81,13.42-38.72,14.09-54.2.67-15.48-18.63-11.7-21.72-10.22,0,6.76-17.06,68.1-23.27,101.82-3.66,5.85-8.88,12.54-13.56,12.55-2.71,0-3.71-5.02-3.73-12.22,0-9.99,5.5-25.99,5.46-35.71,0-6.73-3.09-7.13-5.75-7.12-.58,0-3.77.09-4.36.09-6.83,0-4.58-5.85-10.73-5.79-18.8.07-42.75,20.59-43.79,51.57-6.35,4.2-15.23,9.5-19.77,9.52-4.76,0-5.94-4.4-5.95-8.2,0-6.68,10.8-46.37,10.8-46.37,0,0,13.76-3.53,19.77-4.69,4.54-.89,5.85-1.22,7.62-3.41s5.22-6.73,8.01-10.8c2.79-4.08.05-7.23-5.11-7.21-6.77,0-24.88,4.29-24.88,4.29,0,0,8.7-37.5,8.69-38.26s-.98-1.16-2.45-1.15c-3.3,0-9.18,1.77-12.94,3.12-5.76,2.06-10.45,9.12-11.4,12.4s-7.46,29.02-7.46,29.02c0,0-34.88,12.04-39.65,13.85-.29.1-.49.37-.49.68s3.99,15.6,12.17,15.54c5.85,0,23.04-7.04,23.04-7.04,0,0-8.83,35.1-8.78,46.81,0,7.51,3.54,16.3,18.21,16.26,13.65,0,25.6-7.05,32.29-11.96,3.66,9.25,12.3,11.79,18.2,11.77,13.22,0,23.4-10.55,24.71-11.96,1.72,4.06,5.76,11.85,15.01,11.82,5.23,0,10.64-5.85,14.63-11.53-.08,1.18-.06,2.36.05,3.54,1.6,14.55,23.2,6,24.38,3.97.73-10.52.27-32.03,4.48-45.31,5.58,45.3,26.74,75.78,64.78,75.64,21.27-.08,32.18-6.19,36.69-11.23,3.69-4.08,4.94-9.81,3.29-15.06ZM209.45,146.23c-18.26.07,5.59-47.27,21.17-47.33.02,6.1-.32,47.26-21.17,47.33Z"></path><path fill="currentColor" d="M357.73,160.74c16.49-.06,29.25-10.91,31.59-14.44,3.02-4.59-3.51-11.53-5.59-11.41-5.21,4.98-10.65,11.01-22.87,11.05-14.38.06-11.13-15.77-11.13-15.77,0,0,27.68,3.58,38.81-16.32,3.56-6.37,3.71-15.17,2.27-18.97s-9.49-10.81-22.3-9.75c-15.74,1.33-35.57,17.74-39.93,37.45-3.5,15.86,3.12,38.26,29.14,38.17ZM375.28,94.33c2.59-.09,2.36,4.18,1.67,8.65-.98,6.06-9.29,21.45-25.17,20.85,1.1-8.96,12.91-29.15,23.53-29.5h-.03Z"></path></g></svg>';
?>


	<footer class="footer-container">
		<div class="footer-main">
			<div class="footer-inner-main">
				<div data-nosnippet="" class="footer-content">
					<div class="footer-grid">




						<div class="footer-section">
							<p><?php echo $translations['about_us'] ?? 'О нас'; ?></p>
							<ul>
								<li><a href="/vip-club"><span><?php echo $translations['vip_club'] ?? 'ВИП-клуб'; ?></span></a></li>
								<li><a href="/referals"><span><?php echo $translations['affiliates'] ?? 'Партнерам'; ?></span></a></li>
								<li><a href="/policies/privacy"><span><?php echo $translations['privacy_policy'] ?? 'Политика конфиденциальности'; ?></span></a></li>
								<li><a href="/policies/aml"><span><?php echo $translations['aml_policy'] ?? 'Политика AML'; ?></span></a></li>
								<li><a href="/policies/terms"><span><?php echo $translations['terms'] ?? 'Пользовательское соглашение'; ?></span></a></li>
							</ul>
						</div>
						<div class="footer-section">
							<p><?php echo $translations['payments'] ?? 'О платежах'; ?></p>
							<ul>
								<li><a href="/blog/deposit-withdrawal-methods-online-betting"><span><?php echo $translations['deposits_withdrawals'] ?? 'Депозиты и выводы'; ?></span></a></li>
								<li><a href="/blog/local-currency-deposit-withdraw-guide"><span><?php echo $translations['currency_guide'] ?? 'Гид по денежным валютам'; ?></span></a></li>
								<li><a href="/blog/what-is-crypto-gambling-guide"><span><?php echo $translations['crypto_guide'] ?? 'Гид по криптовалютам'; ?></span></a></li>
								<li><a href="/blog/what-crypto-does-stake-offer"><span><?php echo $translations['supported_cryptos'] ?? 'Поддерживаемые криптовалюты'; ?></span></a></li>
								<li><a href="/blog/how-to-use-our-vault"><span><?php echo $translations['vault_guide_1'] ?? 'Как пользоваться хранилищем'; ?></span></a></li>
								<li><a href="/blog/how-much-to-gamble-budget-calculator"><span><?php echo $translations['budget_calculator_1'] ?? 'Как рассчитать игровой бюджет'; ?></span></a></li>
							</ul>
						</div>

					</div>
					<div class="footer-social-icons">
						<ul>
							<li><a href="/ru/blog"><?php echo $svg_blog; ?></a></li>
							<li><a href="https://stakecommunity.com" target="_blank" rel="external noreferrer noopener"><?php echo $svg_forum; ?></a></li>
							<li><a href="https://facebook.com/StakeCasino" target="_blank" rel="external noreferrer noopener"><?php echo $svg_facebook; ?></a></li>
							<li><a href="https://x.com/stake" target="_blank" rel="external noreferrer noopener"><?php echo $svg_x; ?></a></li>
							<li><a href="https://instagram.com/stake" target="_blank" rel="external noreferrer noopener"><?php echo $svg_instagram; ?></a></li>
							<li><a href="https://youtube.com/c/StakeCasinoTV" target="_blank" rel="external noreferrer noopener"><?php echo $svg_youtube; ?></a></li>
							<li><a href="https://shop.stake.com" target="_blank" rel="external noreferrer noopener"><?php echo $svg_shop; ?></a></li>
							<li><a href="https://primedice.com" target="_blank" rel="external noreferrer noopener"><?php echo $svg_primedice; ?></a></li>
						</ul>
					</div>
					<div class="footer-divider"></div>
					<div class="footer-legal">
						<span><?php echo $translations['copyright'] ?? '© 2025 Stake.com | Все права защищены.'; ?></span>
						<p><span class="contents"><?php echo $translations['operator_info'] ?? 'Владельцем и оператором сайта Stake является Medium Rare N.V., регистрационный номер - 145353, юридический адрес - Seru Loraweg 17 B, Curaçao.'; ?></span> <span class="contents"><?php echo $translations['payment_agents'] ?? 'Агентскими компаниями по платежам являются Medium Rare Limited и MRS Tech Limited. Вы можете связаться с нами по электронной почте support@stake.com.'; ?></span></p>
						<p><?php echo $translations['responsible_gambling'] ?? 'Stake является приверженцем ответственного подхода к азартным играм. Для получения более подробной информации посетите ресурс'; ?> <a href="https://www.gamblingtherapy.org/" target="_blank" rel="external noreferrer noopener">Gamblingtherapy.org</a></p>
					</div>
					<p class="footer-btc-rate"><?php echo $translations['btc_rate'] ?? '1 BTC = $111,731.84'; ?></p>
					<div class="footer-language-selector">
						<div class="footer-dropdown"><button type="button"><?php echo $translations['language'] ?? 'Русский'; ?><?php echo $svg_dropdown_arrow; ?></button></div>
					</div>
					<div class="footer-logo">
						<div class="footer-logo-wrap"><?php echo $svg_logo; ?></div>
					</div>
					<div class="footer-certification">
						<div>
							<div>
								<div><a target="_blank" rel="nonoopener" href="https://cert.gcb.cw/certificate?id=ZXlKcGRpSTZJbkJtT0dKb04zWTRhbmc1VERsd1RXTTRRMjVHZDNjOVBTSXNJblpoYkhWbElqb2lSVEJwU2t0emJYSm9LMUkzYm04NVVqSkZRMnRxZHowOUlpd2liV0ZqSWpvaVpEWm1NV0kwT1dNeE9XVmpaVFkyTnpFd01HVmpPV1V4WmpWaU5qRm1NVEprWXpjd05tTTJaamczWkdNM1pHSXdaVEl6T1RFeVlUSXlOell6TnpJNVpTSXNJblJoWnlJNklpSjk="><img alt="" src="../assets/media/seal.Dfnd6-1N.svg"></a></div>
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