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


<div class="Popup__container--JOj hide-modal" id="registration">
    <div class="Overlay__overlay--1hJ "></div>
    <div tabindex="-1" class="col-mob-4 col-dsk-10 Popup__popup--1aD Popup__light--jJb popup-theme-light scroll-theme-light PagePopup__container--3CX " style="width: 66%;">
        <div class="col-mob-4 col-dsk-7 Popup__contentContainer--2cN">
            <div class="col-mob-4 col-dsk-6">
                <div class="Popup__logoSection--2Vy"><img class="Logo__light--1ys" alt="Holland Casino Logo"><a class="PlainText__text--1wg PlainText__medium--1_S Link__link--3vh Popup__terms--1Dp PlainText__light--3iV" href="/en/tc" target="_self"><span class="Icon__icon--x96 Icon__medium--DLa Popup__tcIcon--3iX" role="img" aria-label="icon_undefined" style="background-image: url(&quot;N/A&quot;);"></span></a></div>
                <div class="popup-modal__inner-content ">
                    <div>
                        <div id="main-content" class="layout-wrapper Layout__layoutWrapper--2mq default-1-column">
                            <div id="6454ba58-03db-e757-0fd2-d6b01a41ea9b" data-column-id="column-1" class="Layout__layout--nVs  " style="width: 100%;">
                                <div id="layout-column_column-1" class="portlet-dropzone portlet-column-content fn-portlet-container column-1">
                                    <div id="p_p_id_5" data-portlet-title="Register" data-portlet-id="5" data-portlet-column="column-1" data-portlet-type="registration" data-react-portlet-id="5" class="portlet portlet_name_registration portlet-wrapper fn-portlet-wrapper portlet-boundary portlet-boundary_5_ portlet-registration registration portlet_type_no-border ">
                                        <div class="fn-portlet portlet__content portlet__content_border_none portlet__content_type_registration portlet-theme-light">
                                            <style>
                                                :root {
                                                    --chat-z-index: 105;
                                                    --help-button-z-index: 104;
                                                }
                                            </style>
                                            <div>
                                                <div class="bb-app-root">
                                                    <div>
                                                        <div class="portlet-registration__messages fn-register-messages"></div>

                                                        <div class="registration-wizard fn-register-content  align-block-by-center col-dsk-6 col-mob-4" tabindex="-1">
                                                            <div class="fn-register-step portlet-registration__step portlet-registration__step--1">
                                                                <form action="" class="form form_name_registration legacy-form" novalidate="">
                                                                    <div class="form__fieldset">
                                                                        <fieldset class="field field_name_Custom11"><input type="hidden" id="Custom11" value="CheckInLiteRegistration" name="Custom11"></fieldset>
                                                                        <fieldset class="field field_name_inbox"><input type="hidden" id="inbox" name="inbox" value="true"></fieldset>
                                                                        <fieldset class="form__fieldset fieldset_name_email">
                                                                            <div class="field field_name_email fn-validate email" data-validation-type="email">
                                                                                <div class="field__control"><label for="text" class="input-title">Login</label><input type="text" id="login" placeholder="Email address" aria-label="Email address" name="email" class="generic_email "></div>
                                                                            </div>
                                                                        </fieldset>
                                                                        <fieldset class="fieldset fieldset_name_dateOfBirth fn-validate fn-generic-datepicker select" data-validation-type="dateOfBirth">
                                                                            <legend class="fieldset__legend">Date of birth</legend>
                                                                            <div class="field-group field-group_name_date">
                                                                                <div class="field field_name_day">
                                                                                    <div class="field__control"><span><label class="input-title" for="day_dateOfBirth">Day</label><span class="js-select"><select name="day_dateOfBirth" aria-label="Day" id="day_dateOfBirth">
                                                                                                    <option value="01">1</option>
                                                                                                    <option value="02">2</option>
                                                                                                    <option value="03">3</option>
                                                                                                    <option value="04">4</option>
                                                                                                    <option value="05">5</option>
                                                                                                    <option value="06">6</option>
                                                                                                    <option value="07">7</option>
                                                                                                    <option value="08">8</option>
                                                                                                    <option value="09">9</option>
                                                                                                    <option value="10">10</option>
                                                                                                    <option value="11">11</option>
                                                                                                    <option value="12">12</option>
                                                                                                    <option value="13">13</option>
                                                                                                    <option value="14">14</option>
                                                                                                    <option value="15">15</option>
                                                                                                    <option value="16">16</option>
                                                                                                    <option value="17">17</option>
                                                                                                    <option value="18">18</option>
                                                                                                    <option value="19">19</option>
                                                                                                    <option value="20">20</option>
                                                                                                    <option value="21">21</option>
                                                                                                    <option value="22">22</option>
                                                                                                    <option value="23">23</option>
                                                                                                    <option value="24">24</option>
                                                                                                    <option value="25">25</option>
                                                                                                    <option value="26">26</option>
                                                                                                    <option value="27">27</option>
                                                                                                    <option value="28">28</option>
                                                                                                    <option value="29">29</option>
                                                                                                    <option value="30">30</option>
                                                                                                    <option value="31">31</option>
                                                                                                </select><span class="js-select__display">1</span></span></span></div>
                                                                                </div>
                                                                                <div class="field field_name_month">
                                                                                    <div class="field__control"><span><label class="input-title" for="month_dateOfBirth">Month</label><span class="js-select"><select name="month_dateOfBirth" aria-label="Month" id="month_dateOfBirth">
                                                                                                    <option value="01">January</option>
                                                                                                    <option value="02">February</option>
                                                                                                    <option value="03">March</option>
                                                                                                    <option value="04">April</option>
                                                                                                    <option value="05">May</option>
                                                                                                    <option value="06">June</option>
                                                                                                    <option value="07">July</option>
                                                                                                    <option value="08">August</option>
                                                                                                    <option value="09">September</option>
                                                                                                    <option value="10">October</option>
                                                                                                    <option value="11">November</option>
                                                                                                    <option value="12">December</option>
                                                                                                </select><span class="js-select__display">January</span></span></span></div>
                                                                                </div>
                                                                                <div class="field field_name_year">
                                                                                    <div class="field__control"><span><label class="input-title" for="year_dateOfBirth">Year</label><span class="js-select"><select id="year_dateOfBirth" name="year_dateOfBirth" aria-label="Year">
                                                                                                    <option value="2007">2007</option>
                                                                                                    <option value="2006">2006</option>
                                                                                                    <option value="2005">2005</option>
                                                                                                    <option value="2004">2004</option>
                                                                                                    <option value="2003">2003</option>
                                                                                                    <option value="2002">2002</option>
                                                                                                    <option value="2001">2001</option>
                                                                                                    <option value="2000">2000</option>
                                                                                                    <option value="1999">1999</option>
                                                                                                    <option value="1998">1998</option>
                                                                                                    <option value="1997">1997</option>
                                                                                                    <option value="1996">1996</option>
                                                                                                    <option value="1995">1995</option>
                                                                                                    <option value="1994">1994</option>
                                                                                                    <option value="1993">1993</option>
                                                                                                    <option value="1992">1992</option>
                                                                                                    <option value="1991">1991</option>
                                                                                                    <option value="1990">1990</option>
                                                                                                    <option value="1989">1989</option>
                                                                                                    <option value="1988">1988</option>
                                                                                                    <option value="1987">1987</option>
                                                                                                    <option value="1986">1986</option>
                                                                                                    <option value="1985">1985</option>
                                                                                                    <option value="1984">1984</option>
                                                                                                    <option value="1983">1983</option>
                                                                                                    <option value="1982">1982</option>
                                                                                                    <option value="1981">1981</option>
                                                                                                    <option value="1980">1980</option>
                                                                                                    <option value="1979">1979</option>
                                                                                                    <option value="1978">1978</option>
                                                                                                    <option value="1977">1977</option>
                                                                                                    <option value="1976">1976</option>
                                                                                                    <option value="1975">1975</option>
                                                                                                    <option value="1974">1974</option>
                                                                                                    <option value="1973">1973</option>
                                                                                                    <option value="1972">1972</option>
                                                                                                    <option value="1971">1971</option>
                                                                                                    <option value="1970">1970</option>
                                                                                                    <option value="1969">1969</option>
                                                                                                    <option value="1968">1968</option>
                                                                                                    <option value="1967">1967</option>
                                                                                                    <option value="1966">1966</option>
                                                                                                    <option value="1965">1965</option>
                                                                                                    <option value="1964">1964</option>
                                                                                                    <option value="1963">1963</option>
                                                                                                    <option value="1962">1962</option>
                                                                                                    <option value="1961">1961</option>
                                                                                                    <option value="1960">1960</option>
                                                                                                    <option value="1959">1959</option>
                                                                                                    <option value="1958">1958</option>
                                                                                                    <option value="1957">1957</option>
                                                                                                    <option value="1956">1956</option>
                                                                                                    <option value="1955">1955</option>
                                                                                                    <option value="1954">1954</option>
                                                                                                    <option value="1953">1953</option>
                                                                                                    <option value="1952">1952</option>
                                                                                                    <option value="1951">1951</option>
                                                                                                    <option value="1950">1950</option>
                                                                                                    <option value="1949">1949</option>
                                                                                                    <option value="1948">1948</option>
                                                                                                    <option value="1947">1947</option>
                                                                                                    <option value="1946">1946</option>
                                                                                                    <option value="1945">1945</option>
                                                                                                    <option value="1944">1944</option>
                                                                                                    <option value="1943">1943</option>
                                                                                                    <option value="1942">1942</option>
                                                                                                    <option value="1941">1941</option>
                                                                                                    <option value="1940">1940</option>
                                                                                                    <option value="1939">1939</option>
                                                                                                    <option value="1938">1938</option>
                                                                                                    <option value="1937">1937</option>
                                                                                                    <option value="1936">1936</option>
                                                                                                    <option value="1935">1935</option>
                                                                                                    <option value="1934">1934</option>
                                                                                                    <option value="1933">1933</option>
                                                                                                    <option value="1932">1932</option>
                                                                                                    <option value="1931">1931</option>
                                                                                                    <option value="1930">1930</option>
                                                                                                    <option value="1929">1929</option>
                                                                                                    <option value="1928">1928</option>
                                                                                                    <option value="1927">1927</option>
                                                                                                    <option value="1926">1926</option>
                                                                                                    <option value="1925">1925</option>
                                                                                                </select><span class="js-select__display">2007</span></span></span></div>
                                                                                </div>
                                                                            </div>
                                                                        </fieldset>
                                                                        <fieldset class="form__fieldset fieldset_name_password">
                                                                            <div class="field field_name_password fn-validate password" data-validation-type="password">
                                                                                <div class="field__control"><label for="password" class="input-title">New Password</label><input type="password" id="password" placeholder="Password" aria-label="New Password" name="password" class="generic_password fn-input-type-password">
                                                                                    <div tabindex="0" class="password-visibility fn-toggle-password-visibility fn-accessibility-element">Show</div>
                                                                                </div>
                                                                            </div>
                                                                        </fieldset>
                                                                        <fieldset class="field field_name_tc fn-validate checkbox" data-validation-type="tc">
                                                                            <div class="field__control fn-highlight-control fn-accessibility-element" aria-label="I'm 18 + and agree to the &lt;a underline class=&quot;fn-popup-open&quot; data-article-id=&quot;REGISTRATION-TERMS-AND-CONDITIONS&quot; data-title=&quot;Terms &amp; Conditions&quot;  href=&quot;#&quot;&gt;terms and conditions&lt;/a&gt;." tabindex="0"><span class="js-checkbox"><input type="checkbox" id="tc" name="tc" value="" class="" tabindex="-1"><span class="js-checkbox__display"></span></span><span class="field__control-label"><label for="tc" class="">I'm 18 + and agree to the <a underline="" class="fn-popup-open" data-article-id="REGISTRATION-TERMS-AND-CONDITIONS" data-title="Terms &amp; Conditions" href="#">terms and conditions</a>.</label></span></div>
                                                                        </fieldset>
                                                                        <fieldset class="field field_name_marketing fn-validate checkbox" data-validation-type="marketing">
                                                                            <div class="field__control fn-highlight-control fn-accessibility-element" aria-label="Yes, I would like to be notified of special promotions, bonuses, and other interesting information through digital channels (24+)." tabindex="0"><span class="js-checkbox"><input type="checkbox" id="marketing" name="marketing" value="true" class="" tabindex="-1"><span class="js-checkbox__display"></span></span><span class="field__control-label"><label for="marketing" class="">Yes, I would like to be notified of special promotions, bonuses, and other interesting information through digital channels (24+).</label></span></div>
                                                                        </fieldset>
                                                                        <fieldset class="field field_name_text0"><input type="hidden" id="text0" value="EUR" name="text0"></fieldset>
                                                                        <fieldset class="field field_name_accountBusinessPhase"><input type="hidden" id="accountBusinessPhase" value="online" name="accountBusinessPhase"></fieldset>
                                                                        <fieldset class="field field_name_accountBusinessPhaseTAG"><input type="hidden" id="accountBusinessPhaseTAG" value="online" name="accountBusinessPhaseTAG"></fieldset>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="portlet__actions fn-register-controls align-block-by-center col-dsk-6 col-mob-4">
                                                            <div class="row "><button type="button" onclick="reglogpass()" class="btn btn_type_success fn-submit">Create account</button></div>
                                                            <p class="registration__help-link small bold">Already have an account? <a class="underline fn-redirect" onclick="showLogin(event)">Login here</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="p_p_id_8" data-portlet-title="Web Content" data-portlet-id="8" data-portlet-column="column-1" data-portlet-type="56" data-react-portlet-id="8" class="portlet portlet_name_56 portlet-wrapper fn-portlet-wrapper portlet-boundary portlet-boundary_8_ portlet-56 56 portlet_type_no-border ">
                                        <div class="fn-portlet portlet__content portlet__content_border_none portlet__content_type_56 portlet-theme-light">
                                            <div class="" data-web-content-id="REGISTRATION_PRIVACY_STATEMENT">
                                                <article>
                                                    <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__light--3iV" style="font-size: 0.875rem;">
                                                        Read more about how Holland Casino Online handles your personal data in our <u><a class="PlainText__text--1wg PlainText__medium--1_S   PlainText__light--3iV" href="/en/privacy-policy" target="_blank" style="font-size: 0.875rem;">Privacy Statement</a></u>.</p>
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="CloseButton__close--P7G Popup__close--wnk" onclick="$('#registration').addClass('hide-modal')" aria-label="Close button"><span class="Icon__icon--x96 Icon__close-small-black--2Um Icon__small--12i" role="img" aria-label="icon_close-small-black"></span></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).ready(function() {
            $('.Icon__visibility--1ZK, .password-visibility').on('click', function() {
                const $input = $(this).siblings('input[type="password"], input[type="text"]').first();
                if ($input.length) {
                    const currentType = $input.attr('type');
                    const newType = (currentType === 'password') ? 'text' : 'password';
                    $input.attr('type', newType);
                }
                // Переключаем класс активности у кнопки, если нужно
                $(this).toggleClass('Icon__active--1EL password-visibility--enabled');
            });
        });


    });

    function showLogin() {
        event.preventDefault();
        $('#registration').addClass('hide-modal');
        $('#authorization').removeClass('hide-modal');

    }

    function reglogpass() {

        if ($('#login').val() == '') {
            $('#login').css('border', '2px solid #8d1818');
            return toastr['error']('Write login')
        }
        if ($('#password').val() == '') {
            $('#password').css('border', '2px solid #8d1818');
            return toastr['error']('Write pass')
        }

        $.ajax({
            type: 'POST',
            url: 'auth/auth.php',
            data: {
                type: 'reg',
                email: '',
                login: $('#login').val(),
                pass: $('#password').val(),
            },
            success: function(data) {
                //var obj = jQuery.parseJSON(data);
                //console.log(data)
                if (data.response == "success") {
                    window.location.reload();
                } else {
                    return toastr['error'](data.message);
                }
            }
        });
    }
</script>


<div id="authorization" class="hide-modal PopupManager__layer--2ri ">
    <div class="Overlay__overlay--1hJ "></div>
    <div class="PopupManager__layout--ZNy ">
        <div id="3e560104-05ef-4961-9fa6-1fa582cea8d9" tabindex="-1" class="col-mob-4 col-dsk-10 Popup__popup--1aD Popup__light--jJb popup-theme-light scroll-theme-light">
            <div class="col-mob-4 col-dsk-7 Popup__contentContainer--2cN">
                <div class="col-mob-4 col-dsk-6">
                    <div class="Popup__logoSection--2Vy"><img class="Logo__light--1ys" alt="Holland Casino Logo"><a class="PlainText__text--1wg PlainText__medium--1_S Link__link--3vh Popup__terms--1Dp PlainText__light--3iV" href="/en/tc" target="_self"><span class="Icon__icon--x96 Icon__medium--DLa Popup__tcIcon--3iX" role="img" aria-label="icon_undefined" style="background-image: url(&quot;N/A&quot;);"></span></a></div>
                    <div class="Popup__header--2Nl LoginPopup__popupTitle--2-5">
                        <h3 class="Headings__head--2LV Headings__bold--iD3 Headings__h3--16M Headings__light--PsR popup-modal__title Popup__title--1Ay" tabindex="-1">Welcome back!</h3>
                    </div>
                    <div class="popup-modal__inner-content ">
                        <div>
                            <p class="PlainText__text--1wg PlainText__medium--1_S LoginPopup__popupDescription--3xM PlainText__light--3iV"><span class="">Please enter your email and password if you have an account.</span></p>
                            <form novalidate="">
                                <div>
                                    <div class="Control__control--1It Control__invalid--29u Control__light--2it control-invalid" data-react-control="invalid"><label class="Label__label--1VL Control__label--3JY" for="userName">Login</label>
                                        <div class="Control__content--36z"><input class="components__input--2w4 " name="userName" type="text" id="userName" tabindex="0" aria-label="input" placeholder="Your login" value=""> </div>
                                    </div>
                                    <div class="Control__control--1It Control__light--2it control-" data-react-control=""><label class="Label__label--1VL Control__label--3JY" for="password">Password</label>
                                        <div class="Control__content--36z"><input class="components__input--2w4 " name="password" type="password" id="passwordLogin" tabindex="0" aria-label="input" placeholder="Password" value=""><span class="Icon__icon--x96 Icon__visibility--1ZK Icon__medium--DLa Icons__visibilityIcon--1J_ " aria-label="icon_visibility" role="img"></span> </div>
                                    </div>
                                    <div class="Control__control--1It  Checkbox__control--2lU Control__light--2it control-" data-react-control="">
                                        <div class="Control__content--36z Checkbox__content--1sO"><label tabindex="0" class="CheckboxShallow__checkbox--25p AccessibilityElement__wrapper--3x7" for="fd544967-ae6c-4031-b1be-1619f5d7b9d0" aria-label="checkbox"><input tabindex="-1" type="checkbox" id="fd544967-ae6c-4031-b1be-1619f5d7b9d0" class="CheckboxShallow__input--3xj " name="rememberMe" value=""><span class="CheckboxShallow__checkMark--3Wb"></span><span class="CheckboxShallow__label--3R0">Remember me</span></label></div>
                                    </div>
                                </div>
                                <div class="LoginReact__formActions--2Oo"><button type="button" class="Button__btn--THI Button__large--6PM Button__primary--3wk Button__success--3NL Button__fluid--Kf2 Button__light--dPe" onclick="authlogpass()">LOG IN</button></div>
                            </form>
                            <div class="GridRow__colsRow--JL1 LoginPopup__helpLinks--2EF">
                                <p class="PlainText__text--1wg PlainText__small--2s0 col-mob-4 col-dsk-3 PlainText__light--3iV"><span class=""><span bold="">No account yet? <a href="#" onclick="showreg(event)" underline="">Register here.</a></span></span></p>
                                <p class="PlainText__text--1wg PlainText__small--2s0 col-mob-4 col-dsk-2 PlainText__light--3iV"><span class=""><span bold=""><a href="/wachtwoordvergeten" underline="">Forgot your password?</a></span></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="CloseButton__close--P7G Popup__close--wnk" onclick="$('#authorization').addClass('hide-modal')" aria-label="Close button"><span class="Icon__icon--x96 Icon__close-small-black--2Um Icon__small--12i" role="img" aria-label="icon_close-small-black"></span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function showreg() {
        event.preventDefault();
        $('#registration').removeClass('hide-modal');
        $('#authorization').addClass('hide-modal');

    }

    function authlogpass() {
        if ($('#userName').val() == '') {
            $('#userName').css('border', '2px solid #8d1818');
            return toastr['error']('Введите логин')
        }
        if ($('#passwordLogin').val() == '') {
            $('#passwordLogin').css('border', '2px solid #8d1818');
            return toastr['error']('Введите пароль')
        }

        $.ajax({
            type: 'POST',
            url: 'auth/auth.php',
            data: {
                type: 'login',
                login: $('#userName').val(),
                pass: $('#passwordLogin').val(),
            },
            success: function(data) {
                //var obj = jQuery.parseJSON(data);
                //console.log(data)
                if (data.response == "success") {

                    window.location.reload();
                } else {
                    return toastr['error'](data.message);
                }
            }
        });
    }
</script>




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