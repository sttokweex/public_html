<?
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
require(dirname(__DIR__, 1) . "/panels/chat.php");
renderchatComponent('Иван', $sampleMessages, $translations);
require(dirname(__DIR__, 1) . "/panels/mobile.php");



?>


<link href="/css/ranks.css" rel="stylesheet">

<div class="main-container">
	<div class="rank-container">
		<div class="rank-inner ">
			<div class="rank-content">
				<span class="separator separator_big separator_mb"><span><?= $translations['vip-club'] ?></span></span>
				<div class="rank-page">
					<div class="rank" id="rankStarter">
						<img src="/images/ranks/starter.png" />
						<span class="name"><?= $translations['starter'] ?></span>
						<hr class="mt-3" />
						<span class="description"><?= $translations['cashback'] ?><span class="badges">0%</span></span>
						<hr />
						<span class="description"><?= $translations['rakeback'] ?><span class="badges">0.1%</span></span>
						<hr />
						<span class="description"><?= $translations['bonus_birthday'] ?><span class="badges">0$</span></span>
						<hr />
						<span class="needDeposit"><?= $translations['none_deposits'] ?></span>
						<hr />
						<div class="progressWag">
							<progress class="wagerProgress" value="<?= isset($depositesSID) ? round($depositesSID, 2) : 0; ?>" max="500"></progress>
							<span class="progres" id="StarterProgress"><?= isset($depositesSID) ? round($depositesSID, 2) : 0; ?>/500</span>
							<i id="StarterOk" class="fa fa-check symbolOk"></i>
						</div>
					</div>
					<div class="rank" id="rankSilver">
						<img src="/images/ranks/silver.png" />
						<span class="name"><?= $translations['silver'] ?></span>
						<hr class="mt-3" />
						<span class="description"><?= $translations['cashback'] ?><span class="badges">3%</span></span>
						<hr />
						<span class="description"><?= $translations['rakeback'] ?><span class="badges">0.2%</span></span>
						<hr />
						<span class="description"><?= $translations['bonus_birthday'] ?><span class="badges">0$</span></span>
						<hr />
						<span class="needDeposit"><?= $translations['deposit_500$_all_time'] ?></span>
						<hr />
						<div class="progressWag">
							<progress class="wagerProgress" value="<?= isset($depositesSID) ? round($depositesSID, 2) : 0; ?>" max="2500"></progress>
							<span class="progres" id="SilverProgress"><?= isset($depositesSID) ? round($depositesSID, 2) : 0; ?>/2500</span>
							<i id="SilverOk" class="fa fa-check symbolOk"></i>
						</div>
					</div>
					<div class="rank" id="rankGold">
						<img src="/images/ranks/gold.png" />
						<span class="name"><?= $translations['gold'] ?></span>
						<hr class="mt-3" />
						<span class="description"><?= $translations['cashback'] ?><span class="badges">5%</span></span>
						<hr />
						<span class="description"><?= $translations['rakeback'] ?><span class="badges">0.3%</span></span>
						<hr />
						<span class="description"><?= $translations['bonus_birthday'] ?><span class="badges">5$</span></span>
						<hr />
						<span class="needDeposit"><?= $translations['deposit_2500$_all_time'] ?></span>
						<hr />
						<div class="progressWag">
							<progress class="wagerProgress" value="<?= isset($depositesSID) ? round($depositesSID, 2) : 0; ?>" max="5000"></progress>
							<span class="progres" id="GoldProgress"><?= isset($depositesSID) ? round($depositesSID, 2) : 0; ?>/5000</span>
							<i id="GoldOk" class="fa fa-check symbolOk"></i>
						</div>
					</div>
					<div class="rank" id="rankRuby">
						<img src="/images/ranks/ruby.png" />
						<span class="name"><?= $translations['ruby'] ?></span>
						<hr class="mt-3" />
						<span class="description"><?= $translations['cashback'] ?><span class="badges">7%</span></span>
						<hr />
						<span class="description"><?= $translations['rakeback'] ?><span class="badges">0.4%</span></span>
						<hr />
						<span class="description"><?= $translations['bonus_birthday'] ?><span class="badges">10$</span></span>
						<hr />
						<span class="needDeposit"><?= $translations['deposit_5000$_all_time'] ?></span>
						<hr />
						<div class="progressWag">
							<progress class="wagerProgress" value="<?= isset($depositesSID) ? round($depositesSID, 2) : 0; ?>" max="10000"></progress>
							<span class="progres" id="RubyProgress"><?= isset($depositesSID) ? round($depositesSID, 2) : 0; ?>/10000</span>
							<i id="RubyOk" class="fa fa-check symbolOk"></i>
						</div>
					</div>
					<div class="rank" id="rankLegend">
						<img src="/images/ranks/Legend.png" />
						<span class="name"><?= $translations['legend'] ?></span>
						<hr class="mt-3" />
						<span class="description"><?= $translations['cashback'] ?><span class="badges">10%</span></span>
						<hr />
						<span class="description"><?= $translations['rakeback'] ?><span class="badges">0.5%</span></span>
						<hr />
						<span class="description"><?= $translations['bonus_birthday'] ?><span class="badges">50$</span></span>
						<hr />
						<span class="needDeposit"><?= $translations['deposit_10000$_all_time'] ?></span>
						<hr />
						<div class="progressWag" id="topRank" style="display:none;">
							<progress class="wagerProgress" value="<?= isset($depositesSID) ? round($depositesSID, 2) : 0; ?>" max="<?= isset($depositesSID) ? round($depositesSID, 2) : 0; ?>"></progress>
							<span class="progres" id="LegendProgress"><?= isset($depositesSID) ? round($depositesSID, 2) : 0; ?>/500000</span>
							<i id="LegendOk" class="fa fa-check symbolOk"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <?
					require(dirname(__DIR__, 1) . "/panels/footer.php");
					render_footer($translations, 'Stake')
					?>
</div>

<script>
	function loadTableRanks() {
		var userDeps = <?php echo json_encode($depositesSID); ?>;

		if (userDeps >= 0) {
			$('#rankStarter').addClass(' active');
		}
		if (userDeps >= 500) {
			$('#rankSilver').addClass(' active');
			$('#rankStarter').css('opacity', '0.5');
			$('#rankStarter').removeClass('active');

			$('#StarterProgress').hide();
			$('#StarterOk').show();
		}
		if (userDeps >= 2500) {
			$('#rankGold').addClass(' active');
			$('#rankSilver').css('opacity', '0.5');
			$('#rankSilver').removeClass('active');

			$('#SilverProgress').hide();
			$('#SilverOk').show();
		}
		if (userDeps >= 5000) {
			$('#rankRuby').addClass(' active');
			$('#rankGold').css('opacity', '0.5');
			$('#rankGold').removeClass('active');

			$('#GoldProgress').hide();
			$('#GoldOk').show();
		}
		if (userDeps >= 10000) {
			$('#rankLegend').addClass(' active');
			$('#rankRuby').css('opacity', '0.5');
			$('#rankRuby').removeClass('active');

			$('#RubyProgress').hide();
			$('#RubyOk').show();
			$('#topRank').show();
			$('#LegendProgress').hide();
			$('#LegendOk').show();
		}

	};
	document.addEventListener("DOMContentLoaded", loadTableRanks);
</script>