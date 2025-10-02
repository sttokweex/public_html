
<?php
$selecter1 = "SELECT * FROM users WHERE hash = '$sid'";
$result4 = mysqli_query($connection, $selecter1);
$row = mysqli_fetch_array($result4);
if ($row) {
  $id = $row['id'];
}
$time = intval(time());
$sql_select = "SELECT * FROM users WHERE hash='$sid'";
$result = mysqli_query($connection, $sql_select);
$row = mysqli_fetch_array($result);
if ($row) {
  $bonus = intval($row['bdate']);
  $balance = $row['balance'];
  $vk = $row['social'];
}
$vk_id = substr($vk, -9);
$remaining_seconds = 86400 - ($time - $bonus); // Total remaining seconds
$minutes = floor($remaining_seconds / 60);
$hours = floor($minutes / 60);
$minutes = $minutes - ($hours * 60);
$seconds = $remaining_seconds % 60;

$getDepsForLevel = "SELECT SUM(amount) AS total_deposits FROM deposits WHERE user_id='$id'";
$getDepsForLevel2 = mysqli_query($connection, $getDepsForLevel);
$leveldeposits = mysqli_fetch_array($getDepsForLevel2);
$depositesID = $leveldeposits['total_deposits'] ? floatval($leveldeposits['total_deposits']) : 0;

// Calculate progress for deposit bonuses
$progress_max_100 = 100; // Goal for $100 deposit bonus
$progress_max_1000 = 1000; // Goal for $1,000 deposit bonus
$progress_max_5000 = 5000; // Goal for $5,000 deposit bonus
$progress_percentage_100 = min(($depositesID / $progress_max_100) * 100, 100);
$progress_percentage_1000 = min(($depositesID / $progress_max_1000) * 100, 100);
$progress_percentage_5000 = min(($depositesID / $progress_max_5000) * 100, 100);
$formatted_deposites = number_format($depositesID, 2);
?>

<!-- Modal 1: Daily Bonus -->
<div class="promo-modal-container hide-modal" data-testid="modal-bonus-daily">
  <div class="modal-overlay"></div>
  <div class="vault-modal-card">
    <div class="promoMain">
      <div class="promo-banner">
        <div class="promo-modal-header">
          <div class="vault-header-stack">
            <div class="vault-title-group">
              <h3 class="vault-heading"><?php echo $translations['modal_daily_bonus_title']; ?></h3>
            </div>
          </div>
          <button type="button" class="vault-close-button" aria-label="<?php echo $translations['modal_close_aria_label']; ?>" data-testid="modal-close">
            <svg class="vault-close-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
              <path fill="currentColor" d="M4.293 4.293a1 1 0 0 1 1.338-.069l.076.069L12 10.586l6.293-6.293.076-.069a1 1 0 0 1 1.407 1.407l-.069.076L13.414 12l6.293 6.293.069.076a1 1 0 0 1-1.407 1.406l-.076-.068L12 13.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L10.586 12 4.293 5.707l-.068-.076a1 1 0 0 1 .068-1.338"></path>
            </svg>
          </button>
        </div>
        <div class="promo-banner-image">
          <img class="!object-contain" alt="<?php echo $translations['modal_daily_bonus_image_alt']; ?>" src="https://cdn.sanity.io/images/tdrhge4k/stake-com-production/57d1eb33690b1e1f9b90358ae754b27fe243f459-1080x1080.png?w=220&amp;h=220&amp;fit=min&amp;auto=format" breakpoints="220,330" loading="lazy" decoding="async" srcset="https://cdn.sanity.io/images/tdrhge4k/stake-com-production/57d1eb33690b1e1f9b90358ae754b27fe243f459-1080x1080.png?w=220&amp;h=220&amp;fit=min&amp;auto=format 220w, https://cdn.sanity.io/images/tdrhge4k/stake-com-production/57d1eb33690b1e1f9b90358ae754b27fe243f459-1080x1080.png?w=330&amp;h=330&amp;fit=min&amp;auto=format 330w" sizes="(min-width: 220px) 220px, 100vw" style="object-fit: cover; max-width: 220px; max-height: 220px; aspect-ratio: 1 / 1; width: 100%;">
        </div>
        <div class="timer chromatic-ignore" id="timer1" data-remaining="<?php echo $remaining_seconds; ?>">
          <div class="timer-item">
            <span tag="span" type="body" variant="neutral-default" size="md" strong="true" class="ds-body-md-strong text-white" data-ds-text="true">0</span>
            <span tag="span" type="body" size="sm" strong="true" class="ds-body-sm-strong" data-ds-text="true"><?php echo $translations['timer_day']; ?></span>
          </div>
          <div class="timer-item">
            <span id="hours1" tag="span" type="body" variant="neutral-default" size="md" strong="true" class="ds-body-md-strong text-white" data-ds-text="true"><?php echo $hours; ?></span>
            <span tag="span" type="body" size="sm" strong="true" class="ds-body-sm-strong" data-ds-text="true"><?php echo $translations['timer_hour']; ?></span>
          </div>
          <div class="timer-item">
            <span id="minutes1" tag="span" type="body" variant="neutral-default" size="md" strong="true" class="ds-body-md-strong text-white" data-ds-text="true"><?php echo $minutes; ?></span>
            <span tag="span" type="body" size="sm" strong="true" class="ds-body-sm-strong" data-ds-text="true"><?php echo $translations['timer_minute']; ?></span>
          </div>
          <div class="timer-item">
            <span id="seconds1" tag="span" type="body" variant="neutral-default" size="md" strong="true" class="ds-body-md-strong text-white" data-ds-text="true"><?php echo $seconds; ?></span>
            <span tag="span" type="body" size="sm" strong="true" class="ds-body-sm-strong" data-ds-text="true"><?php echo $translations['timer_second']; ?></span>
          </div>
        </div>
      </div>
      <div class="promo-description">
        <span tag="span" type="body" size="md" class="ds-body-md text-center" data-chromatic="ignore" data-ds-text="true"><?php echo $translations['modal_daily_bonus_description']; ?></span>
      </div>
      <div class="promo-cta">
        <div class="promo-cta-link">
          <button type="button" tabindex="0" class="" target="_blank" onclick="getDaily()" data-button-root="">
            <span type="body" tag="span" size="md" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo $translations['modal_claim_now_button']; ?></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal 2: Bonus for $100 Deposit -->
<div class="promo-modal-container hide-modal" data-testid="modal-bonus-100">
  <div class="modal-overlay"></div>
  <div class="vault-modal-card">
    <div class="promoMain">
      <div class="promo-banner">
        <div class="promo-modal-header">
          <div class="vault-header-stack">
            <div class="vault-title-group">
              <h3 class="vault-heading"><?php echo $translations['modal_100_deposit_title']; ?></h3>
            </div>
          </div>
          <button type="button" class="vault-close-button" aria-label="<?php echo $translations['modal_close_aria_label']; ?>" data-testid="modal-close">
            <svg class="vault-close-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
              <path fill="currentColor" d="M4.293 4.293a1 1 0 0 1 1.338-.069l.076.069L12 10.586l6.293-6.293.076-.069a1 1 0 0 1 1.407 1.407l-.069.076L13.414 12l6.293 6.293.069.076a1 1 0 0 1-1.407 1.406l-.076-.068L12 13.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L10.586 12 4.293 5.707l-.068-.076a1 1 0 0 1 .068-1.338"></path>
            </svg>
          </button>
        </div>
        <div class="promo-banner-image">
          <img class="!object-contain" alt="<?php echo $translations['modal_100_deposit_image_alt']; ?>" src="https://cdn.sanity.io/images/tdrhge4k/stake-com-production/7e49b8a90b2e8341baf0a848777d83b814061c2e-1080x1080.png?w=220&amp;h=220&amp;fit=min&amp;auto=format" breakpoints="220,330" loading="lazy" decoding="async" srcset="https://cdn.sanity.io/images/tdrhge4k/stake-com-production/7e49b8a90b2e8341baf0a848777d83b814061c2e-1080x1080.png?w=220&amp;h=220&amp;fit=min&amp;auto=format 220w, https://cdn.sanity.io/images/tdrhge4k/stake-com-production/7e49b8a90b2e8341baf0a848777d83b814061c2e-1080x1080.png?w=330&amp;h=330&amp;fit=min&amp;auto=format 330w" sizes="(min-width: 220px) 220px, 100vw" style="object-fit: cover; max-width: 220px; max-height: 220px; aspect-ratio: 1 / 1; width: 100%;">
        </div>
      </div>
      <div class="raffle-progress">
        <div class="raffle-progress-header">
          <span tag="span" type="body" size="md" class="ds-body-md" data-ds-text="true"><?php echo $translations['modal_100_deposit_progress']; ?></span>
          <span tag="span" type="body" size="md" variant="neutral-default" iconspace="false" strong="true" class="text-neutral-default ds-body-md-strong" data-ds-text="true">
            <div role="presentation" class="progress-promo">
              <span class="progress-promo-content" style=""><span tag="span" type="body" class="" size="md" strong="false" variant="neutral-default" data-ds-text="true" style="max-width: 12ch;">$<?php echo $formatted_deposites; ?></span></span>
            </div> &nbsp;/&nbsp; <div role="presentation" class="progress-promo"> <span class="progress-promo-content" style=""><span tag="span" type="body" class="" size="md" strong="false" variant="neutral-default" data-ds-text="true" style="max-width: 12ch;">$100</span></span> </div>
          </span>
        </div>
        <div max="100" role="meter" aria-valuemin="0" aria-valuemax="100" aria-valuenow="<?php echo $progress_percentage_100; ?>" data-value="<?php echo $progress_percentage_100; ?>" data-state="loading" data-max="100" data-melt-progress="" data-progress-root="" class="promo-progress-bar">
          <div class="" style="right: calc(100% - <?php echo $progress_percentage_100; ?>%);"></div>
        </div>
      </div>
      <div class="promo-description">
        <span tag="span" type="body" size="md" class="ds-body-md text-center" data-chromatic="ignore" data-ds-text="true"><?php echo $translations['modal_100_deposit_description']; ?></span>
      </div>
      <div class="promo-cta">
        <div class="promo-cta-link">
          <button type="button" tabindex="0" onClick="vkBonsdfus();" class="" target="_blank" data-button-root="">
            <span type="body" tag="span" size="md" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo $translations['modal_claim_bonus_button']; ?></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal 3: Bonus for $1,000 Deposit -->
<div class="promo-modal-container hide-modal" data-testid="modal-bonus-1000">
  <div class="modal-overlay"></div>
  <div class="vault-modal-card">
    <div class="promoMain">
      <div class="promo-banner">
        <div class="promo-modal-header">
          <div class="vault-header-stack">
            <div class="vault-title-group">
              <h3 class="vault-heading"><?php echo $translations['modal_1000_deposit_title']; ?></h3>
            </div>
          </div>
          <button type="button" class="vault-close-button" aria-label="<?php echo $translations['modal_close_aria_label']; ?>" data-testid="modal-close">
            <svg class="vault-close-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
              <path fill="currentColor" d="M4.293 4.293a1 1 0 0 1 1.338-.069l.076.069L12 10.586l6.293-6.293.076-.069a1 1 0 0 1 1.407 1.407l-.069.076L13.414 12l6.293 6.293.069.076a1 1 0 0 1-1.407 1.406l-.076-.068L12 13.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L10.586 12 4.293 5.707l-.068-.076a1 1 0 0 1 .068-1.338"></path>
            </svg>
          </button>
        </div>
        <div class="promo-banner-image">
          <img class="!object-contain" alt="<?php echo $translations['modal_1000_deposit_image_alt']; ?>" src="https://cdn.sanity.io/images/tdrhge4k/stake-com-production/06f1d29f304d176cf9424bee83acbd8b36fd1cca-1080x1080.png?w=220&amp;h=220&amp;fit=min&amp;auto=format" breakpoints="220,330" loading="lazy" decoding="async" srcset="https://cdn.sanity.io/images/tdrhge4k/stake-com-production/06f1d29f304d176cf9424bee83acbd8b36fd1cca-1080x1080.png?w=220&amp;h=220&amp;fit=min&amp;auto=format 220w, https://cdn.sanity.io/images/tdrhge4k/stake-com-production/06f1d29f304d176cf9424bee83acbd8b36fd1cca-1080x1080.png?w=330&amp;h=330&amp;fit=min&amp;auto=format 330w" sizes="(min-width: 220px) 220px, 100vw" style="object-fit: cover; max-width: 220px; max-height: 220px; aspect-ratio: 1 / 1; width: 100%;">
        </div>
      </div>
      <div class="raffle-progress">
        <div class="raffle-progress-header">
          <span tag="span" type="body" size="md" class="ds-body-md" data-ds-text="true"><?php echo $translations['modal_1000_deposit_progress']; ?></span>
          <span tag="span" type="body" size="md" variant="neutral-default" iconspace="false" strong="true" class="text-neutral-default ds-body-md-strong" data-ds-text="true">
            <div role="presentation" class="progress-promo">
              <span class="progress-promo-content" style=""><span tag="span" type="body" class="" size="md" strong="false" variant="neutral-default" data-ds-text="true" style="max-width: 12ch;">$<?php echo $formatted_deposites; ?></span></span>
            </div> &nbsp;/&nbsp; <div role="presentation" class="progress-promo"> <span class="progress-promo-content" style=""><span tag="span" type="body" class="" size="md" strong="false" variant="neutral-default" data-ds-text="true" style="max-width: 12ch;">$1,000</span></span> </div>
          </span>
        </div>
        <div max="100" role="meter" aria-valuemin="0" aria-valuemax="100" aria-valuenow="<?php echo $progress_percentage_1000; ?>" data-value="<?php echo $progress_percentage_1000; ?>" data-state="loading" data-max="100" data-melt-progress="" data-progress-root="" class="promo-progress-bar">
          <div class="" style="right: calc(100% - <?php echo $progress_percentage_1000; ?>%);"></div>
        </div>
      </div>
      <div class="promo-description">
        <span tag="span" type="body" size="md" class="ds-body-md text-center" data-chromatic="ignore" data-ds-text="true"><?php echo $translations['modal_1000_deposit_description']; ?></span>
      </div>
      <div class="promo-cta">
        <div class="promo-cta-link">
          <button type="button" tabindex="0" class="" target="_blank" onClick="vkBonus();" data-button-root="">
            <span type="body" tag="span" size="md" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo $translations['modal_claim_bonus_button']; ?></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal 4: Bonus for $5,000 Deposit -->
<div class="promo-modal-container hide-modal" data-testid="modal-bonus-5000">
  <div class="modal-overlay"></div>
  <div class="vault-modal-card">
    <div class="promoMain">
      <div class="promo-banner">
        <div class="promo-modal-header">
          <div class="vault-header-stack">
            <div class="vault-title-group">
              <h3 class="vault-heading"><?php echo $translations['modal_5000_deposit_title']; ?></h3>
            </div>
          </div>
          <button type="button" class="vault-close-button" aria-label="<?php echo $translations['modal_close_aria_label']; ?>" data-testid="modal-close">
            <svg class="vault-close-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
              <path fill="currentColor" d="M4.293 4.293a1 1 0 0 1 1.338-.069l.076.069L12 10.586l6.293-6.293.076-.069a1 1 0 0 1 1.407 1.407l-.069.076L13.414 12l6.293 6.293.069.076a1 1 0 0 1-1.407 1.406l-.076-.068L12 13.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L10.586 12 4.293 5.707l-.068-.076a1 1 0 0 1 .068-1.338"></path>
            </svg>
          </button>
        </div>
        <div class="promo-banner-image">
          <img class="!object-contain" alt="<?php echo $translations['modal_5000_deposit_image_alt']; ?>" src="https://cdn.sanity.io/images/tdrhge4k/stake-com-production/b69d739b139cf35dcbbe5549963499568ce3e031-1080x1080.png?w=220&amp;h=220&amp;fit=min&amp;auto=format" breakpoints="220,330" loading="lazy" decoding="async" srcset="https://cdn.sanity.io/images/tdrhge4k/stake-com-production/b69d739b139cf35dcbbe5549963499568ce3e031-1080x1080.png?w=220&amp;h=220&amp;fit=min&amp;auto=format 220w, https://cdn.sanity.io/images/tdrhge4k/stake-com-production/b69d739b139cf35dcbbe5549963499568ce3e031-1080x1080.png?w=330&amp;h=330&amp;fit=min&amp;auto=format 330w" sizes="(min-width: 220px) 220px, 100vw" style="object-fit: cover; max-width: 220px; max-height: 220px; aspect-ratio: 1 / 1; width: 100%;">
        </div>
      </div>
      <div class="raffle-progress">
        <div class="raffle-progress-header">
          <span tag="span" type="body" size="md" class="ds-body-md" data-ds-text="true"><?php echo $translations['modal_5000_deposit_progress']; ?></span>
          <span tag="span" type="body" size="md" variant="neutral-default" iconspace="false" strong="true" class="text-neutral-default ds-body-md-strong" data-ds-text="true">
            <div role="presentation" class="progress-promo">
              <span class="progress-promo-content" style=""><span tag="span" type="body" class="" size="md" strong="false" variant="neutral-default" data-ds-text="true" style="max-width: 12ch;">$<?php echo $formatted_deposites; ?></span></span>
            </div> &nbsp;/&nbsp; <div role="presentation" class="progress-promo"> <span class="progress-promo-content" style=""><span tag="span" type="body" class="" size="md" strong="false" variant="neutral-default" data-ds-text="true" style="max-width: 12ch;">$5,000</span></span> </div>
          </span>
        </div>
        <div max="100" role="meter" aria-valuemin="0" aria-valuemax="100" aria-valuenow="<?php echo $progress_percentage_5000; ?>" data-value="<?php echo $progress_percentage_5000; ?>" data-state="loading" data-max="100" data-melt-progress="" data-progress-root="" class="promo-progress-bar">
          <div class="" style="right: calc(100% - <?php echo $progress_percentage_5000; ?>%);"></div>
        </div>
      </div>
      <div class="promo-description">
        <span tag="span" type="body" size="md" class="ds-body-md text-center" data-chromatic="ignore" data-ds-text="true"><?php echo $translations['modal_5000_deposit_description']; ?></span>
      </div>
      <div class="promo-cta">
        <div class="promo-cta-link">
          <button type="button" tabindex="0" class="" target="_blank" onclick="vkRepost();" data-button-root="">
            <span type="body" tag="span" size="md" strong="true" class="ds-body-md-strong" data-ds-text="true"><?php echo $translations['modal_claim_bonus_button']; ?></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Timer for Modal 1: Daily Bonus
    const timer1 = document.getElementById('timer1');
    let remainingSeconds1 = parseInt(timer1.getAttribute('data-remaining'), 10);
    const updateTimer1 = () => {
      if (remainingSeconds1 <= 0) {
        clearInterval(interval1);
        document.getElementById('hours1').textContent = '0';
        document.getElementById('minutes1').textContent = '0';
        document.getElementById('seconds1').textContent = '0';
        return;
      }
      remainingSeconds1--;
      const hours1 = Math.floor(remainingSeconds1 / 3600);
      const minutes1 = Math.floor((remainingSeconds1 % 3600) / 60);
      const seconds1 = remainingSeconds1 % 60;
      document.getElementById('hours1').textContent = hours1.toString().padStart(2, '0');
      document.getElementById('minutes1').textContent = minutes1.toString().padStart(2, '0');
      document.getElementById('seconds1').textContent = seconds1.toString().padStart(2, '0');
    };
    const interval1 = setInterval(updateTimer1, 1000);
    updateTimer1();
  });
</script>
<?php ?>
