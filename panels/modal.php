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

<!-- Модальное окно с бонусом тг
<div class="modal fade" id="bonustg" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
<div class="dice_sidebar-header">
<div class="icon-gradient"><i class="fa fa-telegram" aria-hidden="true"></i></div>
<p style="color: #fff;margin-bottom: 0px;margin-left: 10px;">Единоразовый бонус за TG</p>
</div>
        <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>
      </div>
<hr>
      <div class="modal-body">


<p class="mt-3 text-center" style="color: var(--main-color-hight);margin-bottom: 20px;margin-top: -20px !important;"> Чтобы получить <b>50 монет</b> на баланс, перейдите в нашего бота и отправьте ему команду:</p>
<div class="col-lg-10" style="margin: 0px auto;">
<div class="form-group">
<div style="display: flex; align-items: center;">
<input type="text" class="tginputs" id="bind" readonly="readonly" value="/bind <?= $id ?>" style="flex: 1;">
<button class="buttonProject" onclick="copyClick()" style="margin-left: 10px;"><i class="fa fa-copy"></i></button>
</div>
<br>
<center>
<a class="buttonProject" style="width: 100%;text-decoration: none;color: #000 !important;display: flex;justify-content: center;align-items: center;" href="https://t.me/crazebonus_bot?start" target="_blank">Перейти</a>
</center>

</div>
</div>

<script>
var telega_link = document.getElementById("bind");
var botedlink = $('#bind').val();
function copyClick() {
  telega_link.select();
  document.execCommand("copy");
  toastr['success']("Скопировали значение: "+botedlink)
}
</script>

      </div>
    </div>
  </div>
</div>
-->


<!-- Модальное окно с авторизацией -->
<!-- <div class="modal fade" id="authorization" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">

        <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>

<div class="css-auth-main">
    <div class="css-1pkuyyw">
<svg style="width: 50px;" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48">
<linearGradient id="BiF7D16UlC0RZ_VqXJHnXa_oWiuH0jFiU0R_gr1" x1="9.858" x2="38.142" y1="9.858" y2="38.142" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#33bef0"></stop><stop offset="1" stop-color="#0a85d9"></stop></linearGradient><path fill="url(#BiF7D16UlC0RZ_VqXJHnXa_oWiuH0jFiU0R_gr1)" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"></path><path d="M10.119,23.466c8.155-3.695,17.733-7.704,19.208-8.284c3.252-1.279,4.67,0.028,4.448,2.113    c-0.273,2.555-1.567,9.99-2.363,15.317c-0.466,3.117-2.154,4.072-4.059,2.863c-1.445-0.917-6.413-4.17-7.72-5.282    c-0.891-0.758-1.512-1.608-0.88-2.474c0.185-0.253,0.658-0.763,0.921-1.017c1.319-1.278,1.141-1.553-0.454-0.412    c-0.19,0.136-1.292,0.935-1.745,1.237c-1.11,0.74-2.131,0.78-3.862,0.192c-1.416-0.481-2.776-0.852-3.634-1.223    C8.794,25.983,8.34,24.272,10.119,23.466z" opacity=".05"></path><path d="M10.836,23.591c7.572-3.385,16.884-7.264,18.246-7.813c3.264-1.318,4.465-0.536,4.114,2.011    c-0.326,2.358-1.483,9.654-2.294,14.545c-0.478,2.879-1.874,3.513-3.692,2.337c-1.139-0.734-5.723-3.754-6.835-4.633    c-0.86-0.679-1.751-1.463-0.71-2.598c0.348-0.379,2.27-2.234,3.707-3.614c0.833-0.801,0.536-1.196-0.469-0.508    c-1.843,1.263-4.858,3.262-5.396,3.625c-1.025,0.69-1.988,0.856-3.664,0.329c-1.321-0.416-2.597-0.819-3.262-1.078    C9.095,25.618,9.075,24.378,10.836,23.591z" opacity=".07"></path><path fill="#fff" d="M11.553,23.717c6.99-3.075,16.035-6.824,17.284-7.343c3.275-1.358,4.28-1.098,3.779,1.91    c-0.36,2.162-1.398,9.319-2.226,13.774c-0.491,2.642-1.593,2.955-3.325,1.812c-0.833-0.55-5.038-3.331-5.951-3.984    c-0.833-0.595-1.982-1.311-0.541-2.721c0.513-0.502,3.874-3.712,6.493-6.21c0.343-0.328-0.088-0.867-0.484-0.604    c-3.53,2.341-8.424,5.59-9.047,6.013c-0.941,0.639-1.845,0.932-3.467,0.466c-1.226-0.352-2.423-0.772-2.889-0.932    C9.384,25.282,9.81,24.484,11.553,23.717z"></path>
</svg>    
        <svg viewBox="0 0 24 24" focusable="false" class="chakra-icon css-9mglm9" xmlns="http://www.w3.org/2000/svg">
            <path fill="#e2bf56" d="M12.707 15.293l4.44-4.44a.5.5 0 00-.354-.853H7.207a.5.5 0 00-.353.854l4.439 4.439a1 1 0 001.414 0z"></path>
        </svg>
        <div class="css-almxzv">
            <img src="/images/logo-mob_2.png" class="css-1wl1iil" />
            
            </div>
    </div>
    <p class="chakra-text css-1qb90e6">Вход через Telegram</p>
    <p class="chakra-text css-1p66bll">Нажмите "Авторизоваться", чтобы продолжить</p>
    


    <div class="css-dvxtzn">
        
        
        
        <button type="button" class="buttonProject css-padded" onClick="loginTg();">Авторизоваться</button>
        <p class="chakra-text css-1u3drzn">
            Я ознакомился(-лась) с<br />
            <a target="_blank" rel="noopener" class="chakra-link css-1vx4nlb" href="/privacy-terms">Пользовательским соглашением</a>
        </p>
    </div>

</div>



    </div>
  </div>
</div>

<div class="modal fade" id="authorization" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>
            <div class="css-auth-main">
	            <div class="css-1pkuyyw">
                    <svg style="width: 50px;" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 48 48"><linearGradient id="BiF7D16UlC0RZ_VqXJHnXa_oWiuH0jFiU0R_gr1" x1="9.858" x2="38.142" y1="9.858" y2="38.142" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#33bef0"></stop><stop offset="1" stop-color="#0a85d9"></stop></linearGradient><path fill="url(#BiF7D16UlC0RZ_VqXJHnXa_oWiuH0jFiU0R_gr1)" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"></path><path d="M10.119,23.466c8.155-3.695,17.733-7.704,19.208-8.284c3.252-1.279,4.67,0.028,4.448,2.113	c-0.273,2.555-1.567,9.99-2.363,15.317c-0.466,3.117-2.154,4.072-4.059,2.863c-1.445-0.917-6.413-4.17-7.72-5.282	c-0.891-0.758-1.512-1.608-0.88-2.474c0.185-0.253,0.658-0.763,0.921-1.017c1.319-1.278,1.141-1.553-0.454-0.412	c-0.19,0.136-1.292,0.935-1.745,1.237c-1.11,0.74-2.131,0.78-3.862,0.192c-1.416-0.481-2.776-0.852-3.634-1.223	C8.794,25.983,8.34,24.272,10.119,23.466z" opacity=".05"></path><path d="M10.836,23.591c7.572-3.385,16.884-7.264,18.246-7.813c3.264-1.318,4.465-0.536,4.114,2.011	c-0.326,2.358-1.483,9.654-2.294,14.545c-0.478,2.879-1.874,3.513-3.692,2.337c-1.139-0.734-5.723-3.754-6.835-4.633	c-0.86-0.679-1.751-1.463-0.71-2.598c0.348-0.379,2.27-2.234,3.707-3.614c0.833-0.801,0.536-1.196-0.469-0.508	c-1.843,1.263-4.858,3.262-5.396,3.625c-1.025,0.69-1.988,0.856-3.664,0.329c-1.321-0.416-2.597-0.819-3.262-1.078	C9.095,25.618,9.075,24.378,10.836,23.591z" opacity=".07"></path><path fill="#fff" d="M11.553,23.717c6.99-3.075,16.035-6.824,17.284-7.343c3.275-1.358,4.28-1.098,3.779,1.91	c-0.36,2.162-1.398,9.319-2.226,13.774c-0.491,2.642-1.593,2.955-3.325,1.812c-0.833-0.55-5.038-3.331-5.951-3.984	c-0.833-0.595-1.982-1.311-0.541-2.721c0.513-0.502,3.874-3.712,6.493-6.21c0.343-0.328-0.088-0.867-0.484-0.604	c-3.53,2.341-8.424,5.59-9.047,6.013c-0.941,0.639-1.845,0.932-3.467,0.466c-1.226-0.352-2.423-0.772-2.889-0.932	C9.384,25.282,9.81,24.484,11.553,23.717z"></path></svg>	
		            <svg viewBox="0 0 24 24" focusable="false" class="chakra-icon css-9mglm9" xmlns="http://www.w3.org/2000/svg"><path fill="#e2bf56" d="M12.707 15.293l4.44-4.44a.5.5 0 00-.354-.853H7.207a.5.5 0 00-.353.854l4.439 4.439a1 1 0 001.414 0z"></path></svg>
		            <div class="css-almxzv"><img src="/images/logo-mob_2.png" class="css-1wl1iil" /></div>
	            </div>
	            
	            <p class="chakra-text css-1qb90e6">Вход через Telegram</p>
    	            <p class="chakra-text css-1p66bll">Напишите нашему <a class="chakra-link css-1vx4nlb" target="_blank" href="https://t.me/splitcazbot?getcode=0">БОТУ</a> /start и введите в это поле полученный код</p>
	            <p class="chakra-text css-1qb90e6"></p>
	            <div class="form-group">
                    <input id="userTgCode" class="tginputs" type="text" placeholder="Введите код">
                </div>
                <p class="chakra-text css-1qb90e6"></p>
                <p class="chakra-text css-1qb90e6"></p>
    
	            <div class="css-dvxtzn">
                    <button type="button" class="buttonProject css-padded" onClick="authtgbot();">Авторизоваться</button>
		            <p class="chakra-text css-1u3drzn">Я ознакомился(-лась) с<br />
			            <a target="_blank" rel="noopener" class="chakra-link css-1vx4nlb" href="/privacy-terms">Пользовательским соглашением</a>
		            </p>
	            </div>
            </div>
        </div>
    </div>
    <script>
    function authtgbot() {
        if ($('#userTgCode').val() == '') {
            $('#userTgCode').css('border', '2px solid #8d1818');
            return toastr['error']('Введите код')
        }
    
        $.ajax({
            type: 'POST',
            url: 'auth/tg/tgAuthToken.php',
            data: {
                type: "authtgbot",
                userTgCode: $('#userTgCode').val(),
            },
            success: function(data) {
                var obj = jQuery.parseJSON(data);
                if (obj.response == "success") {
                    window.location.reload();
                } else {
                    return toastr['error'](obj.message);
                }
            }
        });
    }
    </script>
</div>


-->



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