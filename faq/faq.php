<?php
function render_faq($translations)
{
	$faq_header_icon_svg = '';

	$faq_arrow_icon_svg = '<svg width="22" height="12" viewBox="0 0 22 12" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0.939583 0.439108C1.52458 -0.145886 2.47518 -0.145886 3.06018 0.439108L10.9999 8.37882L18.9396 0.439108C19.5246 -0.145886 20.4752 -0.145886 21.0602 0.439108C21.6466 1.02551 21.6466 1.97471 21.0602 2.5611L12.0603 11.561C11.4753 12.146 10.5247 12.146 9.9397 11.561L0.939798 2.5611C0.353401 1.97471 0.353185 1.02551 0.939583 0.439108Z" fill="white"></path>
    </svg>';

?>
	<link href="/css/faq.css" rel="stylesheet">
	<section class="faq-section">
		<div class="faq-container">
			<!-- FAQ Item 1 -->
			<div class="faq-item faq-is-open">
				<div class="faq-item-header">
					<p class="faq-item-title">
						<?php echo $translations['faq_how_does_it_work']; ?>
					</p>
				</div>
				<div class="faq-item-content faq-is-open">
					<p>
						<?php echo $translations['faq_how_does_it_work_p1']; ?>
					</p>
					<p>
						<?php echo $translations['faq_how_does_it_work_p2']; ?>
					</p>
				</div>
				<div class="faq-item-arrow">
					<?php echo $faq_arrow_icon_svg; ?>
				</div>
			</div>

			<!-- FAQ Item 2 -->
			<div class="faq-item">
				<div class="faq-item-header">
					<p class="faq-item-title">
						<?php echo $translations['faq_game_providers']; ?>
					</p>
				</div>
				<div class="faq-item-content">
					<p>
						<?php echo $translations['faq_game_providers_p1']; ?>
					</p>
				</div>
				<div class="faq-item-arrow">
					<?php echo $faq_arrow_icon_svg; ?>
				</div>
			</div>

			<!-- FAQ Item 3 -->
			<div class="faq-item">
				<div class="faq-item-header">
					<p class="faq-item-title">
						<?php echo $translations['faq_legal_in_netherlands']; ?>
					</p>
				</div>
				<div class="faq-item-content">
					<p>
						<?php echo $translations['faq_legal_in_netherlands_p1']; ?>
					</p>
				</div>
				<div class="faq-item-arrow">
					<?php echo $faq_arrow_icon_svg; ?>
				</div>
			</div>

			<!-- FAQ Item 4 -->
			<div class="faq-item">
				<div class="faq-item-header">
					<p class="faq-item-title">
						<?php echo $translations['faq_why_play']; ?>
					</p>
				</div>
				<div class="faq-item-content">
					<p>
						<?php echo $translations['faq_why_play_p1']; ?>
					</p>
				</div>
				<div class="faq-item-arrow">
					<?php echo $faq_arrow_icon_svg; ?>
				</div>
			</div>

			<!-- FAQ Item 5 -->
			<div class="faq-item">
				<div class="faq-item-header">
					<p class="faq-item-title">
						<?php echo $translations['faq_popular_games']; ?>
					</p>
				</div>
				<div class="faq-item-content">
					<p>
						<?php echo $translations['faq_popular_games_p1']; ?>
					</p>
				</div>
				<div class="faq-item-arrow">
					<?php echo $faq_arrow_icon_svg; ?>
				</div>
			</div>

			<!-- FAQ Item 6 -->
			<div class="faq-item">
				<div class="faq-item-header">
					<p class="faq-item-title">
						<?php echo $translations['faq_live_casino']; ?>
					</p>
				</div>
				<div class="faq-item-content">
					<p>
						<?php echo $translations['faq_live_casino_p1']; ?>
					</p>
				</div>
				<div class="faq-item-arrow">
					<?php echo $faq_arrow_icon_svg; ?>
				</div>
			</div>

			<!-- FAQ Item 7 -->
			<div class="faq-item">
				<div class="faq-item-header">
					<p class="faq-item-title">
						<?php echo $translations['faq_age_requirement']; ?>
					</p>
				</div>
				<div class="faq-item-content">
					<p>
						<?php echo $translations['faq_age_requirement_p1']; ?>
					</p>
				</div>
				<div class="faq-item-arrow">
					<?php echo $faq_arrow_icon_svg; ?>
				</div>
			</div>

			<!-- FAQ Item 8 -->
			<div class="faq-item">
				<div class="faq-item-header">
					<p class="faq-item-title">
						<?php echo $translations['faq_payout_time']; ?>
					</p>
				</div>
				<div class="faq-item-content">
					<p>
						<?php echo $translations['faq_payout_time_p1']; ?>
					</p>
				</div>
				<div class="faq-item-arrow">
					<?php echo $faq_arrow_icon_svg; ?>
				</div>
			</div>
		</div>
	</section>
	<script>
		$(document).ready(function() {
			$('.faq-item').each(function() {
				const $item = $(this);
				const $header = $item.find('.faq-item-header');
				const $button = $item.find('.faq-item-arrow');
				$button.on('click', function() {
					$('.faq-item').toggleClass('is-open')

				});
				$header.on('click', function() {
					$('.faq-item').toggleClass('is-open')

				});
			});
		});
	</script>
<?php
}
?>