<?php
$currentRank = "Starter";
$nextRank = "Silver";
$progressMax = 2000; // Минимальный порог для Bronze
$progressValue = 0;

if ($depositesSID >= 0) $currentRank = "Starter";
if ($depositesSID >= 2000) {
    $currentRank = "Silver";
    $nextRank = "Gold";
    $progressMax = 10000;
}
if ($depositesSID >= 10000) {
    $currentRank = "Gold";
    $nextRank = "Ruby";
    $progressMax = 50000;
}
if ($depositesSID >= 50000) {
    $currentRank = "Ruby";
    $nextRank = "Legend";
    $progressMax = 100000;
}
if ($depositesSID >= 100000) {
    $currentRank = "Legend";
    $nextRank = "Max";
    $progressMax = 500000;
}

// Расчет прогресса
$progressValue = min(($depositesSID / $progressMax) * 100, 100);
if ($depositesSID >= $progressMax) $progressValue = 100;
?>





<style>
    .tginputs {
        outline: none;
        border-radius: 8px;
        background: rgb(15, 33, 46);
        color: white;
        padding: 10px;
        padding-left: 15px;
        padding-right: 15px;
        border: 2px solid #2b303b47;
        height: 100%;
        width: 100%;
    }
</style>





<div class="modal fade" id="withdrawl" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>
            <div class="css-auth-main">
                <div class="css-1pkuyyw site_logo_wrapper ">
                    <img alt="<?= $sitename ?>" width="40" height="40" src="/images/logo-mob.svg">
                    <span class="hideonmob"><?= $sitename ?></span>
                </div>

                <p class="chakra-text css-1qb90e6"></p>

                <p class="chakra-text css-1qb90e6">
                    <?= $translations['withdrawal_is_available_after_passing_kyc'] ?>
                </p>

            </div>
        </div>
    </div>
</div>


<div class="vault-modal-container hide-modal" data-testid="modal-vault">
    <div class="modal-overlay"></div>
    <div class="vault-modal-card">
        <div class="vault-modal-header">
            <div class="vault-header-stack">
                <div class="vault-title-group">
                    <svg class="vault-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <path fill="currentColor" d="M20 2H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2v2h4v-2h8v2h4v-2c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2m-7 8.79V15c0 .55-.45 1-1 1s-1-.45-1-1v-4.21c-.88-.39-1.5-1.26-1.5-2.29a2.5 2.5 0 0 1 5 0c0 1.02-.62 1.9-1.5 2.29"></path>
                    </svg>
                    <h3 class="vault-heading"><?php echo $translations['modal_vault_title']; ?></h3>
                </div>
            </div>
            <button type="button" class="vault-close-button" aria-label="<?php echo $translations['modal_close_aria_label']; ?>" data-testid="modal-close">
                <svg class="vault-close-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                    <path fill="currentColor" d="M4.293 4.293a1 1 0 0 1 1.338-.069l.076.069L12 10.586l6.293-6.293.076-.069a1 1 0 0 1 1.407 1.407l-.069.076L13.414 12l6.293 6.293.069.076a1 1 0 0 1-1.407 1.406l-.076-.068L12 13.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L10.586 12 4.293 5.707l-.068-.076a1 1 0 0 1 .068-1.338"></path>
                </svg>
            </button>
        </div>
        <div class="vault-modal-content">
            <div class="vault-content-container">
                <div class="vault-content-inner">
                    <div class="vault-tabs">
                        <div class="vault-tabs-wrapper">
                            <div class="vault-tabs-slider">
                                <button type="button" class="vault-tab-button vault-tab-active" data-testid="vault-tab-deposit"><?php echo $translations['modal_vault_deposit_tab']; ?></button>
                                <button type="button" class="vault-tab-button" data-testid="vault-tab-withdraw"><?php echo $translations['modal_vault_withdraw_tab']; ?></button>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="vault-wallet-dropdown">
                        <span class="vault-systemwallet vault-systemwallet-active" data-payment-method="cloudpay">
                            <img src="../images/wallet/cloudpay.png" alt="<?php echo $translations['modal_vault_cloudpay_alt']; ?>" class="vault-system-icon">
                        </span>
                    </div> -->
                    <form class="vault-deposit-form" data-testid="vault-deposit">
                        <label class="vault-input-label">
                            <div class="vault-input-wrapper">
                                <div class="vault-input-content">
                                    <div class="vault-input-icon">
                                        <svg class="vault-currency-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <path fill="#F7931A" d="M22.974 12.026C22.974 18.086 18.06 23 12 23S1.026 18.087 1.026 12.026C1.026 5.966 5.94 1.052 12 1.052s10.974 4.914 10.974 10.974"></path>
                                            <path fill="#fff" d="M16.932 10.669c.213-1.437-.88-2.21-2.378-2.726l.484-1.948-1.182-.296-.481 1.897c-.313-.079-.633-.151-.949-.223l.481-1.9-1.185-.296-.485 1.945a31 31 0 0 1-.756-.179l-1.636-.409L8.532 7.8s.88.203.86.213a.633.633 0 0 1 .553.69V8.7l-.553 2.22q.071.018.13.04l-.007-.002-.123-.03-.777 3.093a.43.43 0 0 1-.546.28l.003.001-.863-.213-.588 1.351 1.544.381.845.22-.491 1.97 1.185.295.485-1.948q.483.129.945.244l-.485 1.941 1.186.296.488-1.966c2.024.382 3.544.227 4.183-1.601.515-1.471-.024-2.32-1.09-2.874.777-.165 1.358-.677 1.516-1.728m-2.712 3.797c-.364 1.475-2.842.688-3.646.478l.65-2.598c.804.189 3.381.588 2.996 2.12m.368-3.818c-.344 1.34-2.406.657-3.066.492l.591-2.365c.667.165 2.822.478 2.475 1.873"></path>
                                        </svg>
                                    </div>
                                    <input class="vault-input-field" type="number" data-testid="vault-deposit-amount" name="amount" step="1e-8" placeholder="<?php echo $translations['modal_vault_input_placeholder']; ?>" autocomplete="on" id="depositSize" onkeyup="mindepsum()" value="100">
                                </div>
                                <div class="vault-input-button-wrapper">
                                    <button type="button" class="vault-max-button"><?php echo $translations['modal_vault_max_button']; ?></button>
                                </div>
                            </div>
                            <span class="vault-label-content">
                                <div class="vault-label-left">
                                    <span class="vault-label-text"><?php echo $translations['amount']; ?></span>
                                </div>
                                <div class="vault-currency-conversion">
                                    <span class="vault-conversion-text" id="depositSizeAlert">0,00$</span>
                                </div>
                            </span>
                        </label>

                        <div class="vault-submit-wrapper">
                            <button type="submit" class="vault-submit-button" data-testid="vault-deposit-submit" id="depBtn" onclick="deposit();">
                                <span class="vault-submit-text"><?php echo $translations['modal_vault_deposit_button']; ?></span>
                            </button>
                            <button type="submit" class="vault-submit-button hide-modal" data-testid="vault-deposit-submit" id="withBtn">
                                <span class="vault-submit-text"><?php echo $translations['modal_vault_withdraw_button']; ?></span>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="vault-footer">
                    <a class="vault-learn-more-link" href="/ru/blog/how-to-use-our-vault"><?php echo $translations['modal_vault_learn_more']; ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        const $tabButtons = $('.vault-tab-button');
        const $tabButtonsVip = $('.vip-tab-button');
        const $submitButtons = $('.vault-submit-button');
        $tabButtonsVip.on('click', function() {
            $tabButtonsVip.removeClass('vip-tab-active');
            $(this).addClass('vip-tab-active');

        });
        $tabButtons.on('click', function() {
            $tabButtons.removeClass('vault-tab-active');
            $(this).addClass('vault-tab-active');
            $submitButtons.each(function() {
                if ($(this).hasClass('hide-modal')) {
                    $(this).removeClass('hide-modal');
                } else {
                    $(this).addClass('hide-modal');
                }
            });
        });
    });
    let paymentMethod = 'cloudpay';

    function setPaymentMethod(method, event) {
        paymentMethod = method;
        $(".vault-systemwallet").removeClass('vault-systemwallet-active');
        $(event.target).closest('.vault-systemwallet').addClass('vault-systemwallet-active');
        $('#systemPay').val(method);
    }

    function withdraw(e) {
        e.preventDefault()
    }

    function deposit() {
        const amount = Number(document.getElementById('depositSize').value);

        if (!paymentMethod) {
            toastr['error']('Выберите метод оплаты');
            return;
        }

        const star_limit = Number("<?php echo $star_limit; ?>");
        if (paymentMethod === 'tgstars' && amount > star_limit) {
            toastr['error']('Лимит звезд 500 в день!');
            return;
        }

        redirectToPaymentPage(paymentMethod, amount);
    }



    function mindepsum() {
        let mininaldep = $('#min_sum_deps').html();
        mininaldep = Number(mininaldep);
        let inp = $('#depositSize').val();

        if (inp < mininaldep || inp > 1000000) {
            $('#depositSize').css('border', '2px solid #8d1818');
            $('#depositSizeAlert').show();
            $('#depositSizeAlert').html(<?php echo json_encode($translations['sum']); ?> + " " + <?php echo json_encode($translations['from']); ?> + " <b>" + mininaldep + "</b> " + <?php echo json_encode($translations['to']); ?> + " <b>1000000</b>");
            $('#depBtn').attr("disabled", true);
            $('#depBtn').css("opacity", "0.5");
        } else {
            $('#depositSize').val(inp);
            $('#depositSize').css('border', '2px solid #2b303b47');
            $('#depositSizeAlert').hide();
            $('#depBtn').attr("disabled", false);
            $('#depBtn').css("opacity", "1");
        }
    }

    function redirectToPaymentPage(method, amount) {

        const DEBUG = true;
        const payload = {
            method: method,
            amount: amount,
            promoDeposit: 0,
        };

        if (DEBUG) {
            console.groupCollapsed('deposit → /payments/cb.php');
            console.log('payload:', payload);
        }

        $.ajax({
                url: '/payments/cb.php',
                method: 'POST',
                data: payload,
                dataType: 'json',
                timeout: 20000
            })
            .done(function(data, textStatus, jqXHR) {
                if (DEBUG) {
                    console.log('HTTP status:', jqXHR.status, textStatus);
                    console.log('Content-Type:', jqXHR.getResponseHeader('Content-Type'));
                    console.log('raw response:', jqXHR.responseText);
                    console.log('parsed data:', data);
                }

                if (typeof data !== 'object') {
                    try {
                        data = JSON.parse(jqXHR.responseText);
                    } catch (e) {
                        console.error('JSON parse error:', e);
                        toastr['error']('Некорректный ответ сервера (JSON).');
                        if (DEBUG) console.groupEnd?.();
                        return;
                    }
                }

                if (data && data.response === 'success' && data.redirect) {
                    toastr['success']('<?php echo $translations['redirection']; ?>: ' + data.redirect);
                    if (DEBUG) console.log('Redirecting to:', data.redirect);
                    setTimeout(function() {
                        window.location.assign(data.redirect);
                    }, 300);
                } else {
                    const msg = (data && (data.message || data.error || data.description)) || 'Неизвестная ошибка';
                    if (DEBUG) console.warn('Business error payload:', data);
                    toastr['error'](msg);
                }
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX FAIL:', {
                    textStatus,
                    errorThrown,
                    status: jqXHR.status,
                    response: jqXHR.responseText
                });
                toastr['error']('Ошибка соединения: ' + textStatus + (errorThrown ? ' (' + errorThrown + ')' : ''));
                console.log('Ошибка соединения: ' + textStatus + (errorThrown ? ' (' + errorThrown + ')' : ''))
            })
            .always(function() {
                if (DEBUG) console.groupEnd?.();
            });

    }



    async function generateInvoiceLink(user_id, amount) {
        const response = await fetch('/payments/create-invoice.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Telegram-Init-Data': Telegram.WebApp.initData,
            },
            body: JSON.stringify({
                user_id: user_id,
                amount: amount
            }),
        });
        const data = await response.json();
        console.log('data', data);
        return data.invoice_url;
    }
</script>
</div>
<div class="vip-modal-container hide-modal" data-testid="modal-vip">
    <div class="modal-overlay"></div>
    <div class="vault-modal-card">
        <div class="vault-modal-header">
            <div class="vault-header-stack">
                <div class="vault-title-group">
                    <svg data-ds-icon="Trophy" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
                        <path fill="currentColor" d="M21.08 4H19c0-1.1-.9-2-2-2H7c-1.1 0-2 .9-2 2H2.92C1.8 4 .9 4.91.92 6.03c.04 2.48.69 6.41 4.35 6.86A6.98 6.98 0 0 0 11 17.9v1.08h-1c-2.21 0-4 1.79-4 4h12c0-2.21-1.79-4-4-4h-1V17.9c2.76-.4 4.99-2.39 5.73-5.02 3.65-.46 4.31-4.38 4.35-6.86.02-1.12-.88-2.03-2-2.03zM4 10.11c-.57-.68-1.04-1.9-1.08-4.1H4zM16.11 9l-1.45 1.04.57 1.71c.34 1.03-.83 1.89-1.71 1.26l-1.51-1.08-1.51 1.08c-.88.63-2.05-.24-1.71-1.26l.57-1.71L7.91 9c-.89-.63-.44-2.03.65-2.03h1.82l.58-1.75c.34-1.02 1.79-1.02 2.13 0l.58 1.75h1.82c1.09 0 1.54 1.4.65 2.03zM20 10.1V6h1.08c-.04 2.21-.51 3.43-1.08 4.1"></path>
                    </svg>
                    <h3 class="vault-heading"><?php echo $translations['modal_vip_title']; ?></h3>
                </div>
            </div>
            <button type="button" class="vip-close-button" aria-label="<?php echo $translations['modal_close_aria_label']; ?>" data-testid="modal-close">
                <svg class="vault-close-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                    <path fill="currentColor" d="M4.293 4.293a1 1 0 0 1 1.338-.069l.076.069L12 10.586l6.293-6.293.076-.069a1 1 0 0 1 1.407 1.407l-.069.076L13.414 12l6.293 6.293.069.076a1 1 0 0 1-1.407 1.406l-.076-.068L12 13.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L10.586 12 4.293 5.707l-.068-.076a1 1 0 0 1 .068-1.338"></path>
                </svg>
            </button>
        </div>
        <div class="vault-modal-content ScrollY">
            <div class="vault-content-container">
                <div class="vault-content-inner">
                    <div class="vault-tabs">
                        <div class="vault-tabs-wrapper">
                            <div class="vault-tabs-slider">
                                <button type="button" class="vip-tab-button vip-tab-active" data-testid="vip-tab-deposit"><?php echo $translations['modal_vip_overview_tab']; ?></button>
                                <button type="button" class="vip-tab-button" data-testid="vip-tab-withdraw"><?php echo $translations['modal_vip_rewards_tab']; ?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vip-modal-unstate">
                    <div class="vip-modal-banner-outer">
                        <div class="vip-modal-banner" style="background-image: url('/assets/media/header-bg.DLFzM8kq.png');">
                            <div class="rank-card-main">
                                <div class="rank-card-inner">
                                    <div class="rank-card" id="rankCard">
                                        <div class="username">
                                            <span><?php echo htmlspecialchars($login); ?></span>
                                            <svg fill="none" viewBox="0 0 96 96" class="svg-icon" style="width: 1.25rem; height: 1.25rem;">
                                                <title></title>
                                                <path fill="#2F4553" d="m48 14.595 8.49 15.75a13.68 13.68 0 0 0 9.66 7.08L84 40.635l-12.39 12.9a13.9 13.9 0 0 0-3.9 9.63q-.069.96 0 1.92l2.46 17.76-15.66-7.56a15 15 0 0 0-6.51-1.53 15 15 0 0 0-6.6 1.5l-15.57 7.53 2.46-17.76q.051-.93 0-1.86a13.9 13.9 0 0 0-3.9-9.63L12 40.635l17.64-3.21a13.62 13.62 0 0 0 9.84-7.02zm0-12.54a5.22 5.22 0 0 0-4.59 2.73l-11.4 21.45a5.4 5.4 0 0 1-3.66 2.67l-24 4.32A5.25 5.25 0 0 0 0 38.385a5.13 5.13 0 0 0 1.44 3.6l16.83 17.55a5.16 5.16 0 0 1 1.47 3.6q.024.435 0 .87l-3.27 24a3 3 0 0 0 0 .72 5.19 5.19 0 0 0 5.19 5.22h.18a5.1 5.1 0 0 0 2.16-.6l21.39-10.32a6.4 6.4 0 0 1 2.76-.63 6.2 6.2 0 0 1 2.79.66l21 10.32c.69.377 1.464.573 2.25.57h.21a5.22 5.22 0 0 0 5.19-5.19q.024-.375 0-.75l-3.27-24q-.025-.375 0-.75a5 5 0 0 1 1.47-3.57l16.77-17.7a5.19 5.19 0 0 0-2.82-8.7l-24-4.32a5.22 5.22 0 0 1-3.69-2.76l-11.4-21.45a5.22 5.22 0 0 0-4.65-2.7"></path>
                                            </svg>
                                        </div>
                                        <div class="progress-value-main">
                                            <div class="progress-value">
                                                <div class="progress-text">
                                                    <a class="toRank" href="/ranks"><?php echo $translations['your_vip_progress']; ?></a>
                                                    <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon" style="">
                                                        <title></title>
                                                        <path d="M8 37.486h30.909L28.665 47.73l6.313 6.314L56 33.022 34.978 12l-6.313 6.314 10.244 10.244H8v8.933z"></path>
                                                    </svg>
                                                </div>
                                                <div class="progress-text-percent" id="progressValue"><?php echo number_format($progressValue, 2); ?>%</div>
                                            </div>
                                            <div class="progressWag">
                                                <progress class="wagerProgress" value="<?= round($depositesSID, 2); ?>" max="<?php echo $progressMax ?>"></progress>
                                            </div>
                                            <div class="levels">
                                                <div class="levels-div">
                                                    <span class="svg-span">
                                                        <svg fill="none" viewBox="0 0 96 96" class="svg-icon" style="width: 1.25rem; height: 1.25rem;">
                                                            <title></title>
                                                            <path fill="#2F4553" d="m48 14.595 8.49 15.75a13.68 13.68 0 0 0 9.66 7.08L84 40.635l-12.39 12.9a13.9 13.9 0 0 0-3.9 9.63q-.069.96 0 1.92l2.46 17.76-15.66-7.56a15 15 0 0 0-6.51-1.53 15 15 0 0 0-6.6 1.5l-15.57 7.53 2.46-17.76q.051-.93 0-1.86a13.9 13.9 0 0 0-3.9-9.63L12 40.635l17.64-3.21a13.62 13.62 0 0 0 9.84-7.02zm0-12.54a5.22 5.22 0 0 0-4.59 2.73l-11.4 21.45a5.4 5.4 0 0 1-3.66 2.67l-24 4.32A5.25 5.25 0 0 0 0 38.385a5.13 5.13 0 0 0 1.44 3.6l16.83 17.55a5.16 5.16 0 0 1 1.47 3.6q.024.435 0 .87l-3.27 24a3 3 0 0 0 0 .72 5.19 5.19 0 0 0 5.19 5.22h.18a5.1 5.1 0 0 0 2.16-.6l21.39-10.32a6.4 6.4 0 0 1 2.76-.63 6.2 6.2 0 0 1 2.79.66l21 10.32c.69.377 1.464.573 2.25.57h.21a5.22 5.22 0 0 0 5.19-5.19q.024-.375 0-.75l-3.27-24q-.025-.375 0-.75a5 5 0 0 1 1.47-3.57l16.77-17.7a5.19 5.19 0 0 0-2.82-8.7l-24-4.32a5.22 5.22 0 0 1-3.69-2.76l-11.4-21.45a5.22 5.22 0 0 0-4.65-2.7"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="span-text"><?php echo $currentRank; ?></span>
                                                </div>
                                                <div class="levels-div">
                                                    <span class="svg-span">
                                                        <svg fill="none" viewBox="0 0 96 96" class="svg-icon" style="">
                                                            <title></title>
                                                            <path fill="#C69C6D" d="m48.002 14.603 8.48 15.757c1.97 3.693 5.495 6.336 9.677 7.068l.08.012 17.64 3.2L71.48 53.56a13.84 13.84 0 0 0-3.884 9.63q0 .978.132 1.922l-.01-.072 2.44 17.758L54.52 75.24c-1.908-.934-4.15-1.48-6.52-1.48s-4.613.546-6.608 1.518l.09-.039-15.637 7.56 2.438-17.759c.078-.555.123-1.197.123-1.85 0-3.741-1.482-7.137-3.887-9.633l.003.003-12.518-12.92 17.638-3.2a13.64 13.64 0 0 0 9.842-7.008l.036-.072zm0-12.521h-.01a5.2 5.2 0 0 0-4.577 2.733l-.015.027L32 26.28a5.3 5.3 0 0 1-3.648 2.675l-.033.006-23.997 4.32C1.853 33.717 0 35.847 0 38.406a5.2 5.2 0 0 0 1.443 3.596L1.44 42l16.837 17.558a5.06 5.06 0 0 1 1.473 3.578q0 .458-.078.894l.006-.03L16.4 87.997a5.2 5.2 0 0 0 5.148 5.918h.012c.045.003.102.003.156.003.834 0 1.623-.207 2.31-.576l-.027.013 21.397-10.32a6.2 6.2 0 0 1 2.76-.638c1.004 0 1.952.236 2.795.653l-.036-.014 21.08 10.319a4.7 4.7 0 0 0 2.249.56h.033-.003c.051.003.111.003.171.003a5.2 5.2 0 0 0 5.144-5.948l.004.027-3.28-23.998a5.06 5.06 0 0 1 1.4-4.32l16.84-17.557a5.18 5.18 0 0 0 1.448-3.6c0-2.55-1.836-4.67-4.257-5.114l-.033-.006-23.997-4.32a5.3 5.3 0 0 1-3.705-2.768l-.015-.03-11.399-21.44a5.2 5.2 0 0 0-4.593-2.759h-.008z"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="span-text"><?php echo htmlspecialchars($nextRank); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vip-modal-more">
                        <button class="vip-modal-more-open">
                            <span tag="span" type="body" size="md" strong="true" variant="neutral-default" class="text-neutral-default ds-body-md-strong" data-ds-text="true">
                                <span><?php echo $translations['modal_vip_privileges_button']; ?></span>
                            </span>
                            <svg data-ds-icon="ChevronDown" width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0 transition-all duration-50">
                                <path fill="currentColor" d="M17.293 8.293a1 1 0 1 1 1.414 1.414l-6 6a1 1 0 0 1-1.414 0l-6-6-.068-.076A1 1 0 0 1 6.63 8.225l.076.068L12 13.586z"></path>
                            </svg>
                        </button>
                        <div class="vip-modal-more-container closed">
                            <div class="vip-modal-more-content">
                                <div class="vip-modal-more-level">
                                    <div class="vip-modal-more-level-header">
                                        <svg class="vip-modal-more-icon" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <path fill="#D1A773" d="m12 4.727 1.944 3.431a3.12 3.12 0 0 0 2.217 1.54l.019.002 4.042.697-2.841 2.814a2.94 2.94 0 0 0-.86 2.516l-.002-.016.559 3.867-3.584-1.646A3.6 3.6 0 0 0 12 17.61c-.543 0-1.057.119-1.514.33l.02-.008-3.583 1.646.559-3.867a2.94 2.94 0 0 0-.863-2.5l-2.868-2.814L7.793 9.7c.988-.154 1.808-.732 2.256-1.526l.008-.016zM12 2h-.002a1.2 1.2 0 0 0-1.049.595l-.003.006L8.334 7.27a1.21 1.21 0 0 1-.836.583l-.008.001-5.5.94c-.565.095-.99.56-.99 1.117 0 .303.126.579.33.783l3.859 3.823a1.07 1.07 0 0 1 .32.974v-.007l-.75 5.226a1 1 0 0 0-.012.157c0 .625.533 1.132 1.19 1.132h.004l.035.001c.191 0 .372-.045.53-.125l-.007.002 4.904-2.247a1.5 1.5 0 0 1 1.273.003l-.008-.003 4.83 2.247c.15.077.328.122.516.122h.008l.038.001c.658 0 1.191-.507 1.191-1.132q0-.084-.012-.163v.005l-.75-5.226a1.07 1.07 0 0 1 .321-.94l3.858-3.824A1.1 1.1 0 0 0 23 9.936c0-.555-.42-1.017-.976-1.114l-.007-.001-5.5-.94a1.21 1.21 0 0 1-.848-.604l-.004-.006-2.612-4.67A1.2 1.2 0 0 0 12 2"></path>
                                        </svg>
                                        <span class="vip-modal-more-level-title"><?php echo $translations['modal_vip_level_bronze']; ?></span>
                                    </div>
                                    <div class="vip-modal-more-benefits">
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_bronze_1']; ?></span>
                                        </div>
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_bronze_2']; ?></span>
                                        </div>
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_bronze_3']; ?></span>
                                        </div>
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_bronze_4']; ?></span>
                                        </div>
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_bronze_5']; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="vip-modal-more-divider"></div>
                                <div class="vip-modal-more-level">
                                    <div class="vip-modal-more-level-header">
                                        <svg class="vip-modal-more-icon" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <path fill="#BDBDBD" d="m12 4.727 1.944 3.431a3.12 3.12 0 0 0 2.217 1.54l.019.002 4.042.697-2.841 2.814a2.94 2.94 0 0 0-.86 2.516l-.002-.016.559 3.867-3.584-1.646A3.6 3.6 0 0 0 12 17.61c-.543 0-1.057.119-1.514.33l.02-.008-3.583 1.646.559-3.867a2.94 2.94 0 0 0-.863-2.5l-2.868-2.814L7.793 9.7c.988-.154 1.808-.732 2.256-1.526l.008-.016zM12 2h-.002a1.2 1.2 0 0 0-1.049.595l-.003.006L8.334 7.27a1.21 1.21 0 0 1-.836.583l-.008.001-5.5.94c-.565.095-.99.56-.99 1.117 0 .303.126.579.33.783l3.859 3.823a1.07 1.07 0 0 1 .32.974v-.007l-.75 5.226a1 1 0 0 0-.012.157c0 .625.533 1.132 1.19 1.132h.004l.035.001c.191 0 .372-.045.53-.125l-.007.002 4.904-2.247a1.5 1.5 0 0 1 1.273.003l-.008-.003 4.83 2.247c.15.077.328.122.516.122h.008l.038.001c.658 0 1.191-.507 1.191-1.132q0-.084-.012-.163v.005l-.75-5.226a1.07 1.07 0 0 1 .321-.94l3.858-3.824A1.1 1.1 0 0 0 23 9.936c0-.555-.42-1.017-.976-1.114l-.007-.001-5.5-.94a1.21 1.21 0 0 1-.848-.604l-.004-.006-2.612-4.67A1.2 1.2 0 0 0 12 2"></path>
                                        </svg>
                                        <span class="vip-modal-more-level-title"><?php echo $translations['modal_vip_level_silver']; ?></span>
                                    </div>
                                    <div class="vip-modal-more-benefits">
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_silver_1']; ?></span>
                                        </div>
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_silver_2']; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="vip-modal-more-divider"></div>
                                <div class="vip-modal-more-level">
                                    <div class="vip-modal-more-level-header">
                                        <svg class="vip-modal-more-icon" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <path fill="#FFB947" d="m12 4.727 1.944 3.431a3.12 3.12 0 0 0 2.217 1.54l.019.002 4.042.697-2.841 2.814a2.94 2.94 0 0 0-.86 2.516l-.002-.016.559 3.867-3.584-1.646A3.6 3.6 0 0 0 12 17.61c-.543 0-1.057.119-1.514.33l.02-.008-3.583 1.646.559-3.867a2.94 2.94 0 0 0-.863-2.5l-2.868-2.814L7.793 9.7c.988-.154 1.808-.732 2.256-1.526l.008-.016zM12 2h-.002a1.2 1.2 0 0 0-1.049.595l-.003.006L8.334 7.27a1.21 1.21 0 0 1-.836.583l-.008.001-5.5.94c-.565.095-.99.56-.99 1.117 0 .303.126.579.33.783l3.859 3.823a1.07 1.07 0 0 1 .32.974v-.007l-.75 5.226a1 1 0 0 0-.012.157c0 .625.533 1.132 1.19 1.132h.004l.035.001c.191 0 .372-.045.53-.125l-.007.002 4.904-2.247a1.5 1.5 0 0 1 1.273.003l-.008-.003 4.83 2.247c.15.077.328.122.516.122h.008l.038.001c.658 0 1.191-.507 1.191-1.132q0-.084-.012-.163v.005l-.75-5.226a1.07 1.07 0 0 1 .321-.94l3.858-3.824A1.1 1.1 0 0 0 23 9.936c0-.555-.42-1.017-.976-1.114l-.007-.001-5.5-.94a1.21 1.21 0 0 1-.848-.604l-.004-.006-2.612-4.67A1.2 1.2 0 0 0 12 2"></path>
                                        </svg>
                                        <span class="vip-modal-more-level-title"><?php echo $translations['modal_vip_level_gold']; ?></span>
                                    </div>
                                    <div class="vip-modal-more-benefits">
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_gold_1']; ?></span>
                                        </div>
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_gold_2']; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="vip-modal-more-divider"></div>
                                <div class="vip-modal-more-level">
                                    <div class="vip-modal-more-level-header">
                                        <svg class="vip-modal-more-icon" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <path fill="red" d="m12 4.727 1.944 3.431a3.12 3.12 0 0 0 2.217 1.54l.019.002 4.042.697-2.841 2.814a2.94 2.94 0 0 0-.86 2.516l-.002-.016.559 3.867-3.584-1.646A3.6 3.6 0 0 0 12 17.61c-.543 0-1.057.119-1.514.33l.02-.008-3.583 1.646.559-3.867a2.94 2.94 0 0 0-.863-2.5l-2.868-2.814L7.793 9.7c.988-.154 1.808-.732 2.256-1.526l.008-.016zM12 2h-.002a1.2 1.2 0 0 0-1.049.595l-.003.006L8.334 7.27a1.21 1.21 0 0 1-.836.583l-.008.001-5.5.94c-.565.095-.99.56-.99 1.117 0 .303.126.579.33.783l3.859 3.823a1.07 1.07 0 0 1 .32.974v-.007l-.75 5.226a1 1 0 0 0-.012.157c0 .625.533 1.132 1.19 1.132h.004l.035.001c.191 0 .372-.045.53-.125l-.007.002 4.904-2.247a1.5 1.5 0 0 1 1.273.003l-.008-.003 4.83 2.247c.15.077.328.122.516.122h.008l.038.001c.658 0 1.191-.507 1.191-1.132q0-.084-.012-.163v.005l-.75-5.226a1.07 1.07 0 0 1 .321-.94l3.858-3.824A1.1 1.1 0 0 0 23 9.936c0-.555-.42-1.017-.976-1.114l-.007-.001-5.5-.94a1.21 1.21 0 0 1-.848-.604l-.004-.006-2.612-4.67A1.2 1.2 0 0 0 12 2"></path>
                                        </svg>
                                        <span class="vip-modal-more-level-title"><?php echo $translations['modal_vip_level_ruby']; ?></span>
                                    </div>
                                    <div class="vip-modal-more-benefits">
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_ruby_1']; ?></span>
                                        </div>
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_ruby_2']; ?></span>
                                        </div>
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_ruby_3']; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="vip-modal-more-divider"></div>
                                <div class="vip-modal-more-level">
                                    <div class="vip-modal-more-level-header">
                                        <svg class="vip-modal-more-icon" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <path fill="purple" d="m12 4.727 1.944 3.431a3.12 3.12 0 0 0 2.217 1.54l.019.002 4.042.697-2.841 2.814a2.94 2.94 0 0 0-.86 2.516l-.002-.016.559 3.867-3.584-1.646A3.6 3.6 0 0 0 12 17.61c-.543 0-1.057.119-1.514.33l.20-.008-3.583 1.646.559-3.867a2.94 2.94 0 0 0-.863-2.5l-2.868-2.814L7.793 9.7c.988-.154 1.808-.732 2.256-1.526l.008-.016zM12 2h-.002a1.2 1.2 0 0 0-1.049.595l-.003.006L8.334 7.27a1.21 1.21 0 0 1-.836.583l-.008.001-5.5.94c-.565.095-.99.56-.99 1.117 0 .303.126.579.33.783l3.859 3.823a1.07 1.07 0 0 1 .32.974v-.007l-.75 5.226a1 1 0 0 0-.012.157c0 .625.533 1.132 1.19 1.132h.004l.035.001c.191 0 .372-.045.53-.125l-.007.002 4.904-2.247a1.5 1.5 0 0 1 1.273.003l-.008-.003 4.83 2.247c.15.077.328.122.516.122h.008l.038.001c.658 0 1.191-.507 1.191-1.132q0-.084-.012-.163v.005l-.75-5.226a1.07 1.07 0 0 1 .321-.94l3.858-3.824A1.1 1.1 0 0 0 23 9.936c0-.555-.42-1.017-.976-1.114l-.007-.001-5.5-.94a1.21 1.21 0 0 1-.848-.604l-.004-.006-2.612-4.67A1.2 1.2 0 0 0 12 2"></path>
                                        </svg>
                                        <span class="vip-modal-more-level-title"><?php echo $translations['modal_vip_level_legend']; ?></span>
                                    </div>
                                    <div class="vip-modal-more-benefits">
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_legend_1']; ?></span>
                                        </div>
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_legend_2']; ?></span>
                                        </div>
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_legend_3']; ?></span>
                                        </div>
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_legend_4']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vip-footer">
                        <a class="vault-learn-more-link" href="/ru/blog/how-to-use-our-vault"><?php echo $translations['modal_vip_learn_more']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.vip-modal-more').on('click', function() {

        $('.vip-modal-more-container ').toggleClass('closed')
    })
</script>
</div>

</div>
<div class="modal fade" id="authorization" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="css-auth-main">
                <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>

                <p class="chakra-text css-1qb90e6"><?= $translations['sign_in'] ?></p>
                <p class="chakra-text css-1qb90e6"></p>

                <div class="form-group">
                    <input id="userLogin" class="tginputs" type="text" placeholder="Login">
                </div>
                <p class="chakra-text css-1qb90e6"></p>
                <div class="form-group">
                    <input id="userPass" class="tginputs" type="password" placeholder="Password">
                </div>
                <p class="chakra-text css-1qb90e6"></p>
                <p class="chakra-text css-1qb90e6"></p>
                <div class="css-dvxtzn" style="margin-bottom:10px">
                    <button type="button" class="buttonProject css-padded" onClick="authlogpass();"><?= $translations['login'] ?></button>
                    <p class="chakra-text css-1u3drzn"><?= $translations['dont_have_account'] ?> <a href="#" onClick="showReg()"><?= $translations['signup'] ?></a></p>
                    <p class="chakra-text css-1u3drzn"><?= $translations['i_have_read'] ?><br />
                        <a target="_blank" rel="noopener" class="chakra-link css-1vx4nlb" href="/privacy-terms"><?= $translations['user_agreement'] ?></a>
                    </p>
                </div>

            </div>
        </div>
    </div>
    <script>
        function showReg() {
            $('#registration').modal('show');
            $('#authorization').modal('hide');
        }

        function authlogpass() {
            if ($('#userLogin').val() == '') {
                $('#userLogin').css('border', '2px solid #8d1818');
                return toastr['error']('Введите логин')
            }
            if ($('#userPass').val() == '') {
                $('#userPass').css('border', '2px solid #8d1818');
                return toastr['error']('Введите пароль')
            }

            $.ajax({
                type: 'POST',
                url: 'auth/auth.php',
                data: {
                    type: 'login',
                    login: $('#userLogin').val(),
                    pass: $('#userPass').val(),
                },
                success: function(data) {
                    //var obj = jQuery.parseJSON(data);
                    //console.log(data)
                    if (data.response == "success") {
                        toastr['success']('Success!');
                        window.location.reload();
                    } else {
                        return toastr['error'](data.message);
                    }
                }
            });
        }
    </script>
</div>

<div class="modal fade" id="registration" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>
            <div class="css-auth-main">
                <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>
                <p class="chakra-text css-1qb90e6"><?= $translations['signup'] ?></p>
                <p class="chakra-text css-1qb90e6"></p>

                <div class="form-group">
                    <input id="signupLogin" class="tginputs" type="text" placeholder="<?= htmlspecialchars($translations['login']) ?>">
                </div>
                <p class="chakra-text css-1qb90e6"></p>
                <div class="form-group">
                    <input id="signupemail" class="tginputs" type="text" placeholder="<?= htmlspecialchars($translations['e-mail']) ?>">
                </div>
                <p class="chakra-text css-1qb90e6"></p>
                <div class="form-group">
                    <input id="signupPass" class="tginputs" type="password" placeholder="<?= htmlspecialchars($translations['password']) ?>">
                </div>
                <p class="chakra-text css-1qb90e6"></p>
                <p class="chakra-text css-1qb90e6"></p>
                <div class="css-dvxtzn" style="margin-bottom:10px">
                    <button type="button" class="buttonProject css-padded" onClick="reglogpass();"><?= $translations['signup'] ?></button>
                    <p class="chakra-text css-1u3drzn"><?= $translations['already_registered'] ?> <a href="#" onClick="showLogin()"><?= $translations['login'] ?></a></p>
                    <p class="chakra-text css-1u3drzn"><?= $translations['i_have_read'] ?><br />
                        <a target="_blank" rel="noopener" class="chakra-link css-1vx4nlb" href="/privacy-terms"><?= $translations['user_agreement'] ?></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showLogin() {
            $('#registration').modal('hide');
            $('#authorization').modal('show');

        }

        function reglogpass() {
            if ($('#signupemail').val() == '') {
                $('#signupemail').css('border', '2px solid #8d1818');
                return toastr['error']('Write email')
            }
            if ($('#signupLogin').val() == '') {
                $('#signupLogin').css('border', '2px solid #8d1818');
                return toastr['error']('Write login')
            }
            if ($('#signupPass').val() == '') {
                $('#signupPass').css('border', '2px solid #8d1818');
                return toastr['error']('Write pass')
            }

            $.ajax({
                type: 'POST',
                url: 'auth/auth.php',
                data: {
                    type: 'reg',
                    email: $('#signupemail').val(),
                    login: $('#signupLogin').val(),
                    pass: $('#signupPass').val(),
                },
                success: function(data) {
                    //var obj = jQuery.parseJSON(data);
                    //console.log(data)
                    if (data.response == "success") {
                        toastr['success']('Success!');
                        window.location.reload();
                    } else {
                        return toastr['error'](data.message);
                    }
                }
            });
        }
    </script>
</div>



<div class="modal fade" id="recaptchaPromocode" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dice_sidebar-header">
                    <div class="icon-gradient"><i class="fa fa-tasks" aria-hidden="true"></i></div>
                    <p style="color: #fff;margin-bottom: 0px;margin-left: 10px;"><?= $translations['confirm_action'] ?></p>
                </div>
                <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>
            </div>
            <hr>
            <div class="modal-body">
                <div style="justify-content: center;display: flex;margin-top: -30px;" id="promo_captcha" data-callback="hidecp"></div>

                <script>
                    function hidecp() {
                        $('#recaptchaPromocode').modal('hide');
                    }
                </script>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="recaptchaPayout" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dice_sidebar-header">
                    <div class="icon-gradient"><i class="fa fa-tasks" aria-hidden="true"></i></div>
                    <p style="color: #fff;margin-bottom: 0px;margin-left: 10px;"><?= $translations['confirm_action'] ?></p>
                </div>
                <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>
            </div>
            <hr>
            <div class="modal-body">
                <div style="justify-content: center;display: flex;margin-top: -30px;" id="payout_captcha" data-callback="hidecp2"></div>

                <script>
                    function hidecp2() {
                        $('#recaptchaPayout').modal('hide');
                    }
                </script>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="checkFair" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

                <div class="dice_sidebar-header">
                    <div class="icon-gradient"><i class="fa fa-gamepad" aria-hidden="true"></i></div>
                    <p style="color: #fff;margin-bottom: 0px;margin-left: 10px;"><?= $translations['view_game'] ?> #<span id="fairGameId">...</span></p>
                </div>
                <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>
            </div>
            <div class="modal-body">

                <div id="loadFair" class="loader"></div>

                <div id="fairContent" style="display:none;">
                    <div class="fair-page">

                        <div class="mainInfo">
                            <div class="content">
                                <div class="fairness">
                                    <span><?= $translations['status'] ?></span>
                                    <div class="status"><i class="fa fa-check"></i> <?= $translations['round_over'] ?></div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="fairness">
                                    <span><?= $translations['bet_id'] ?></span>
                                    <h3 id="fairGameId2">...</3>
                                </div>
                            </div>
                            <div class="content">
                                <div class="fairness">
                                    <span><?= $translations['bet'] ?></span>
                                    <h3 id="fairBet">... </h3>
                                </div>
                            </div>
                            <div class="content">
                                <div class="fairness">
                                    <span><?= $translations['coefficient'] ?></span>
                                    <div id="fairCoefBox" class="status"><span id="fairCoef">...</span></div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="fairness">
                                    <span><?= $translations['result'] ?></span>
                                    <h3 style="font-weight:bold;" id="fairResult">...</3>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<style>
    .modalBonusInfo {
        display: grid;
        gap: 10px;
    }

    .modalBonusInfo span {
        color: var(--main-color-hight);
    }
</style>
<!-- Информация о активном бонусе -->
<div class="modal fade" id="infoBonus" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dice_sidebar-header">
                    <div class="icon-gradient"><i class="fa fa-info-circle" aria-hidden="true"></i></div>
                    <p style="color: #fff;margin-bottom: 0px;margin-left: 10px;"><?= $translations['bonus_information'] ?></p>
                </div>
                <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>
            </div>
            <div class="modal-body">

                <div class="modalBonusInfo">
                    <span>1. <?= $translations['bonus'] ?>: <b><?= $translations['promo_code'] ?></b></span>
                    <span>2. <?= $translations['wager'] ?>: <b>x<?= $coefpromo ?></b></span>
                    <span>3. <?= $translations['maximum_amount_after_wagering'] ?>: <b><?= $translations['unlimited'] ?></b></span>
                    <span>4. <?= $translations['time_to_play_back'] ?>: <b><?= $translations['unlimited'] ?></b></span>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="infoRakeback" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dice_sidebar-header">
                    <div class="icon-gradient"><i class="fa fa-info-circle" aria-hidden="true"></i></div>
                    <p style="color: #fff;margin-bottom: 0px;margin-left: 10px;"><?= $translations['information_about_rakeback'] ?></p>
                </div>
                <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>
            </div>
            <div class="modal-body">
                <div class="modalBonusInfo">
                    <span><?= $translations['return'] ?> <b><?= $rakeback_rank ?>%</b> <?= $translations['from_the_casinos_advantage_on_every_bet_you_make'] ?></span>
                    <span><?= $translations['rakeback_can_be_received_from_any_level'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="infoCashback" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dice_sidebar-header">
                    <div class="icon-gradient"><i class="fa fa-info-circle" aria-hidden="true"></i></div>
                    <p style="color: #fff;margin-bottom: 0px;margin-left: 10px;"><?= $translations['information_about_cashback'] ?></p>
                </div>
                <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>
            </div>
            <div class="modal-body">
                <div class="modalBonusInfo">
                    <span><?= $translations['return'] ?> <b><?= $cashback_rankt ?>%</b> <?= $translations['from_the_funds_spent_per_month'] ?></span>
                    <span><?= $translations['cashback_can_be_received_from_the_silver_rank'] ?></span>
                    <span><?= $translations['cashback_is_available_for_a_month'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>








<!-- interesting js -->
<script>
    function hidenLoader() {
        $('#loadFair').hide();
        $('#fairContent').show();
    }

    function loadingFair() {
        setTimeout(hidenLoader, 500);
    }

    function showLoadedr() {
        $('#loadFair').show();
        $('#fairContent').hide();
    }
</script>

<script>
    var loginCaptcha;
    var promoCaptcha;
    var payoutCaptcha;

    function recaptchaCallback() {
        loginCaptcha = grecaptcha.render('login_captcha', {
            'sitekey': '<?= $grecaptcha ?>',
            'theme': 'dark'
        });
        promoCaptcha = grecaptcha.render('promo_captcha', {
            'sitekey': '<?= $grecaptcha ?>',
            'theme': 'dark'
        });
        payoutCaptcha = grecaptcha.render('payout_captcha', {
            'sitekey': '<?= $grecaptcha ?>',
            'theme': 'dark'
        });
    }
</script>

<script>
    function loginTg() {
        window.location.href = '/auth/tg/redirect';
    }
</script>