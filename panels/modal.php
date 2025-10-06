<?php

?>

<link rel="stylesheet" href="/css/game_materials.css" crossorigin="anonymous" />
<link rel="stylesheet" href="/css/modal.css" crossorigin="anonymous" />



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