// Глобальный объект переводов
window.T = {};
// Удобная обёртка: t('key', 'fallback') → вернёт перевод или запасное значение/сам ключ
window.t = (k, fb = '') =>
  window.T && Object.prototype.hasOwnProperty.call(window.T, k)
    ? window.T[k]
    : fb || k;

fetch('../lang/translations.php')
  .then(r => r.json())
  .then(tr => {
    window.T = tr;
    console.log('i18n loaded');
  })
  .catch(err => {
    console.warn('i18n load failed', err);
    window.T = {};
  });

/* -- -- -- -- DICE GAME START -- -- -- -- */
function betMin() {
  var nwin = $('#MinRange').html();
  var win = ((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2);
  var sum = $('#BetSize').val();
  var coef = win - sum;
  $.ajax({
    type: 'POST',
    url: '../actions/classicdice.php',
    beforeSend: function () {
      $('#betLoad').css('display', '');
      $('#error_bet').css('display', 'none');
      $('#succes_bet').css('display', 'none');
    },
    data: {
      type: 'minbet',
      win: coef,
      sum: sum,
      nwin: nwin,
      per: $('#BetPercent').val(),
    },
    success: function (data) {
      $('#betLoad').css('display', 'none');
      var obj = jQuery.parseJSON(data);
      if (obj.success == 'success') {
        $('#error_bet').css('display', 'none');
        $('#succes_bet').show();
        $('#succes_bet').html(`${T.win} <b>` + obj.fullwin);

        $('#userBalance').text(obj.new_balance);
        $('#userBalance').attr('myBalance', obj.new_balance);

        $('#hashBet').fadeOut('slow', function () {
          $('#hashBet').fadeIn('slow', function () {});
        });
        $('#hashBet').html(obj.hash);
        return;
      }

      if (obj.success == 'errorMess') {
        toastr['error'](obj.error);
        $('#betLoad').css('display', '');
        $('#succes_bet').css('display', 'none');
        $('#error_bet').css('display', 'none');
      }

      if (obj.success == 'error') {
        $('#userBalance').text(obj.new_balance);
        $('#userBalance').attr('myBalance', obj.new_balance);
        $('#succes_bet').css('display', 'none');
        $('#error_bet').html(obj.error);
        $('#hashBet').fadeOut('slow', function () {
          $('#hashBet').fadeIn('slow', function () {});
        });
        $('#hashBet').html(obj.hash);
        return $('#error_bet').css('display', '');
      }
    },
  });
}

function betMax() {
  var nwin = $('#MaxRange').html();
  var win = ((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2);
  var sum = $('#BetSize').val();
  var coef = win - sum;
  $.ajax({
    type: 'POST',
    url: '../actions/classicdice.php',
    beforeSend: function () {
      $('#betLoad').css('display', '');
      $('#error_bet').css('display', 'none');
      $('#succes_bet').css('display', 'none');
    },
    data: {
      type: 'maxbet',
      win: coef,
      sum: sum,
      nwin: nwin,
      per: $('#BetPercent').val(),
    },
    success: function (data) {
      $('#betLoad').css('display', 'none');
      var obj = jQuery.parseJSON(data);
      if (obj.success == 'success') {
        $('#userBalance').text(obj.new_balance);
        $('#userBalance').attr('myBalance', obj.new_balance);

        $('#error_bet').css('display', 'none');
        $('#succes_bet').html(`${T.win} <b>` + obj.fullwin);
        $('#hashBet').fadeOut('slow', function () {
          $('#hashBet').fadeIn('slow', function () {});
        });
        $('#hashBet').html(obj.hash);
        return $('#succes_bet').css('display', '');
      }

      if (obj.success == 'errorMess') {
        toastr['error'](obj.error);
        $('#betLoad').css('display', '');
        $('#succes_bet').css('display', 'none');
        $('#error_bet').css('display', 'none');
      }

      if (obj.success == 'error') {
        $('#userBalance').text(obj.new_balance);
        $('#userBalance').attr('myBalance', obj.new_balance);
        $('#succes_bet').css('display', 'none');
        $('#error_bet').html(obj.error);
        $('#hashBet').fadeOut('slow', function () {
          $('#hashBet').fadeIn('slow', function () {});
        });
        $('#hashBet').html(obj.hash);
        return $('#error_bet').css('display', '');
      }
    },
  });
}

/* -- -- -- -- DICE GAME END -- -- -- -- */

/* -- -- -- -- BUBBLES GAME START -- -- -- -- */
function bubble() {
  $.ajax({
    type: 'POST',
    url: '../actions/bubbles.php',
    beforeSend: function () {},
    data: {
      type: 'bubble',
      chance: $('#BetPercent').val(),
      amount: $('#BetSize').val(),
    },
    success: function (data) {
      var obj = jQuery.parseJSON(data);

      if (obj.success == 'success') {
        $('#bigX').html('x' + obj.game_coef);
        $('#bigX').css('color', '#27b73a');

        let container = document.querySelector('.lastcoef .content');
        let div3 = document.createElement('div');
        div3.className = 'bubble-box-win';
        div3.textContent = 'x' + obj.game_coef;
        container.prepend(div3);

        $('#bht').hide(200);

        $('#hashBet').fadeOut('slow', function () {
          $('#hashBet').fadeIn('slow', function () {});
        });
        $('#hashBet').html(obj.game_hash);

        $('#userBalance').text(obj.game_balance).toFixed(2);
        $('#userBalance').attr('myBalance', obj.game_balance).toFixed(2);
      }

      if (obj.success == 'lose') {
        $('#bigX').html('x' + obj.game_coef);
        $('#bigX').css('color', '#c33030');

        let container = document.querySelector('.lastcoef .content');
        let div3 = document.createElement('div');
        div3.className = 'bubble-box-lose';
        div3.textContent = 'x' + obj.game_coef;
        container.prepend(div3);

        $('#bht').hide(200);
        $('#hashBet').fadeOut('slow', function () {
          $('#hashBet').fadeIn('slow', function () {});
        });
        $('#hashBet').html(obj.game_hash);

        $('#userBalance').text(obj.game_balance).toFixed(2);
        $('#userBalance').attr('myBalance', obj.game_balance).toFixed(2);
      }

      if (obj.success == 'error') {
        toastr['error'](obj.error);
      }
    },
  });
}

function validateBetPercent(inp) {
  if (inp.value > 100000) {
    inp.value = 100000;
  }

  inp.value = inp.value
    .replace(/[,]/g, '.')
    .replace(/[^\d,.]*/g, '')
    .replace(/([,.])[,.]+/g, '$1')
    .replace(/^[^\d]*(\d+([.,]\d{0,2})?).*$/g, '$1');
}

function updateProfit() {
  $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
  $('#MaxRange').html(
    999999 - Math.floor(($('#BetPercent').val() / 100) * 999999)
  );
  $('#BetX').html((100 / $('#BetPercent').val()).toFixed(2));
  $('#upgradeCef').html(
    ($('#upgradeWin').val() / $('#BetSizeUpgrade').val()).toFixed(2)
  );
  $('#upgradeChance').html((100 / $('#upgradeCef').html()).toFixed(2));
  $('#BetProfit').html(
    ($('#BetPercent').val() * $('#BetSize').val()).toFixed(2)
  );
}

function validateBetSize(inp) {
  inp.value = inp.value
    .replace(/[,]/g, '.')
    .replace(/[^\d,.]*/g, '')
    .replace(/([,.])[,.]+/g, '$1')
    .replace(/^[^\d]*(\d+([.,]\d{0,2})?).*$/g, '$1');
}

function isright(obj) {
  var value = +obj.value.replace(/\D/g, '') || 24;
  var min = +obj.getAttribute('min');
  var max = +obj.getAttribute('max');
  obj.value = Math.min(max, Math.max(min, value));
}
/* -- -- -- -- BUBBLES GAME END -- -- -- -- */

/* -- -- -- -- БОНУСЫ START -- -- -- -- */
function vkBonus() {
  $.ajax({
    type: 'POST',
    url: '../scriptController.php',
    data: {
      type: 'vkBonus',
    },
    success: function (data) {
      var obj = jQuery.parseJSON(data);
      if (obj.success == 'success') {
        $('.balance-amount').html(obj.new_balance);

        toastr['success']('+100');
      } else {
        toastr['error'](obj.error);
      }
    },
  });
}

function vkBonsdfus() {
  $.ajax({
    type: 'POST',
    url: '../scriptController.php',
    data: {
      type: 'vkBonsdfus',
    },
    success: function (data) {
      var obj = jQuery.parseJSON(data);
      if (obj.success == 'success') {
        $('.balance-amount').html(obj.new_balance);
        toastr['success']('+10');
      } else {
        toastr['error'](obj.error);
      }
    },
  });
}
function getRakeback() {
  $.ajax({
    type: 'POST',
    url: '../scriptController.php',
    beforeSend: function () {
      $('#rbbtn').html('<div class="loaderThink"></div>');
    },
    data: {
      type: 'rakeback',
    },
    success: function (data) {
      var obj = jQuery.parseJSON(data);
      if (obj.success == 'success') {
        $('#rbbtn').html(T.take);
        $('#rakebackval').html('0');
        toastr['success'](
          `${T.enrolled} Rakeback: <b>` + obj.rakebacksize + '</b>'
        );
        $('#userBalance').html(obj.new_balance);
        updateBalance(obj.balance, obj.new_balance);
      } else {
        $('#rbbtn').html(T.take);
        return toastr['error'](obj.error);
      }
    },
  });
}

function getCashback() {
  $.ajax({
    type: 'POST',
    url: '../scriptController.php',
    beforeSend: function () {
      $('#csbtn').html('<div class="loaderThink"></div>');
    },
    data: {
      type: 'cashback',
    },
    success: function (data) {
      var obj = jQuery.parseJSON(data);
      if (obj.success == 'success') {
        $('#csbtn').html(T.take);
        $('#cashbackval').html('0');
        toastr['success'](
          `${T.enrolled} Cashback: <b>` + obj.cashbacksize + '</b>'
        );
        $('#userBalance').html(obj.new_balance);
        updateBalance(obj.balance, obj.new_balance);
      } else {
        $('#csbtn').html(T.take);
        return toastr['error'](obj.error);
      }
    },
  });
}

function getDaily() {
  $.ajax({
    type: 'POST',
    url: '../scriptController.php',
    beforeSend: function () {},
    data: {
      type: 'bonus',
    },
    success: function (data) {
      var obj = jQuery.parseJSON(data);
      if (obj.success == 'success') {
        toastr['success'](`You got ${obj.bonussize}`);
        $('.balance-amount').html(obj.new_balance);
      } else {
        toastr['error'](obj.error);
      }
    },
  });
}
function vkRepost() {
  $.ajax({
    type: 'POST',
    url: '../scriptController.php',
    data: {
      type: 'vkRepost',
    },
    success: function (data) {
      var obj = jQuery.parseJSON(data);
      if (obj.success == 'success') {
        toastr['success']('+500');
        $('.balance-amount').html(obj.new_balance);
      } else {
        toastr['error'](obj.error);
      }
    },
  });
}
function deployPromo() {
  if ($('#promoCode').val() == '') {
    $('#promoCode').css('border', '2px solid #8d1818');
    return toastr['error'](T.enter_promo);
  }

  $.ajax({
    type: 'POST',
    url: 'scriptController.php',
    data: {
      type: 'deployPromo',
      promoactive: $('#promoCode').val(),
    },
    success: function (data) {
      var obj = jQuery.parseJSON(data);
      if (obj.success == 'success') {
        //$("#newbonusestbl").load("bonusnew.php #newbonusestbl");
        toastr['success'](obj.mess);
        window.location.reload();
      } else {
        return toastr['error'](obj.error);
      }
    },
  });
}

function activePromo() {
  $.ajax({
    type: 'POST',
    url: 'scriptController.php',
    data: {
      type: 'activePromo',
      promoactive: $('#promoCode').val(),
    },
    success: function (data) {
      var obj = jQuery.parseJSON(data);
      if (obj.response == 'success') {
        // window.location.reload();
        //$("#activedbonustbl").load("bonusnew.php #activedbonustbl");
        if (obj.type_promo == 'freespins') {
          toastr['success'](T.free_spins_activated);
        } else {
          toastr['success'](T.promo_code_activated);
        }

        $('.balance-amount').html(obj.new_balance);
        updateBalance(obj.balance, obj.new_balance);
      } else {
        return toastr['error'](obj.message);
      }
    },
  });
}

// function activePromoNew(name) {
//     $.ajax({
//         type: 'POST',
//         url: 'scriptController.php',
//         data: {
//             type: "activePromoNew",
//             promoactive: name,
//         },
//         success: function(data) {
//             var obj = jQuery.parseJSON(data);
//             if (obj.success == "success") {
//                 window.location.reload();
//                 //$("#activedbonustbl").load("bonusnew.php #activedbonustbl");
//                 toastr['success']('Промокод активирован')
//                 $('#userBalance').html(obj.new_balance);
//                 updateBalance(obj.balance, obj.new_balance);
//             } else {
//                 return toastr['error'](obj.error)
//             }
//         }
//     });
// }
/* -- -- -- -- БОНУСЫ END -- -- -- -- */

/* -- -- -- -- ПРОВЕЕРКА НА ЧЕСТНОСТЬ START -- -- -- -- */
function checkFairness(id, x, amount, res) {
  let gotoid = id;
  let gotox = x;
  let gotoamo = amount;
  let gotoresp = res;

  const gotoC1 = Math.random().toString(16).substring(2, 32);
  const gotoC2 = Math.random().toString(36).substring(2, 10);
  $('#fairGameId').html(gotoid);
  $('#fairGameId2').html('#' + gotoid);
  $('#fairBet').html(gotoamo + ' ₽');

  $('#fairResult').html(gotoresp + ' ₽');
  $('#fairString').html(gotoC1);
  $('#fairSalt').html(gotoC2);

  if (gotox == 0) {
    $('#fairResult').css('color', '#ed3c57');
    $('#fairCoefBox').css('background-color', 'rgb(209 3 3 / 15%)');
    $('#fairCoefBox').css('color', '#ed3c57');
    $('#fairCoef').html('x0.00');
  } else {
    $('#fairResult').css('color', '#06d155');
    $('#fairCoefBox').css('background-color', 'rgba(3, 209, 105, .15)');
    $('#fairCoefBox').css('color', '#06d155');
    $('#fairCoef').html('x' + gotox);
  }
}
/* -- -- -- -- ПРОВЕЕРКА НА ЧЕСТНОСТЬ END -- -- -- -- */

/* -- -- -- -- BONUS BUY GAME START -- -- -- -- */
function buybonus() {
  $.ajax({
    type: 'POST',
    url: '../actions/bonusbuy.php',
    beforeSend: function () {},
    data: {
      type: 'bonusbuy',
      sizebonus: $('#bonusprice').html(),
      sizebet: $('#bonusbets').val(),
    },
    success: function (data) {
      var obj = jQuery.parseJSON(data);
      if (obj.success == 'success') {
        $('#userBalance').html(obj.new_balance);
        $('#playbtn').prop('disabled', true);

        function setCoefficient1() {
          $('#x4').html(obj.coef3);
          $('#win_s').html(obj.ws1);
          $('#winner').slideToggle(300);
        }

        function loadCoef1() {
          setTimeout(setCoefficient1, 1500);
        }

        function setCoefficient2() {
          $('#x3').html(obj.coef2);
          $('#win_s').html(obj.ws2);
        }

        function loadCoef2() {
          setTimeout(setCoefficient2, 3000);
        }

        function setCoefficient3() {
          $('#x2').html(obj.coef1);
          $('#win_s').html(obj.ws3);
        }

        function loadCoef3() {
          setTimeout(setCoefficient3, 4900);
        }

        function getWin() {
          $('#userBalance').html(obj.new_balance2);
          toastr['success'](obj.winmess);
        }

        function loadgetwin() {
          setTimeout(getWin, 6000);
        }
        if (obj.resultg == 'plus') {
          $('#x5wrap').fadeOut(1000);
          $('#x5wrap').fadeIn(500);
          $('#x4wrap').fadeOut(1000);
          $('#x4wrap').fadeIn(1000);
          $('#x3wrap').fadeOut(1000);
          $('#x3wrap').fadeIn(1900);
          $('#x2wrap').fadeOut(1000);
          $('#x2wrap').fadeIn(4000);
          loadGreenStart();
          loadCoef1();
          loadCoef2();
          loadCoef3();
          loadgetwin();
          loadDefaultStart();
        }
        if (obj.resultg == 'minus') {
          $('#x5wrap').fadeOut(1000);
          $('#x5wrap').fadeIn(500);
          $('#x4wrap').fadeOut(1000);
          $('#x4wrap').fadeIn(1000);
          $('#x3wrap').fadeOut(1000);
          $('#x3wrap').fadeIn(1900);
          $('#x2wrap').fadeOut(1000);
          $('#x2wrap').fadeIn(4000);
          loadRedStart();
          loadCoef1();
          loadCoef2();
          loadCoef3();
          loadgetwin();
          loadDefaultStart();
        }
      } else {
        toastr['error'](obj.error);
        $('#playbtn').prop('disabled', false);
      }
    },
  });
}

function loadGreen() {
  $('#x2wrap').css(
    'background',
    'linear-gradient(90deg, rgb(27, 147, 30), rgb(71, 183, 65))'
  );
  $('#x3wrap').css(
    'background',
    'linear-gradient(90deg, rgb(27, 147, 30), rgb(71, 183, 65))'
  );
  $('#x4wrap').css(
    'background',
    'linear-gradient(90deg, rgb(27, 147, 30), rgb(71, 183, 65))'
  );
  $('#x5wrap').css(
    'background',
    'linear-gradient(90deg, rgb(27, 147, 30), rgb(71, 183, 65))'
  );
}

function loadGreenStart() {
  setTimeout(loadGreen, 2000);
}

function loadRed() {
  $('#x2wrap').css(
    'background',
    'linear-gradient(90deg, rgb(209, 33, 33), rgb(231, 86, 86))'
  );
  $('#x3wrap').css(
    'background',
    'linear-gradient(90deg, rgb(209, 33, 33), rgb(231, 86, 86))'
  );
  $('#x4wrap').css(
    'background',
    'linear-gradient(90deg, rgb(209, 33, 33), rgb(231, 86, 86))'
  );
  $('#x5wrap').css(
    'background',
    'linear-gradient(90deg, rgb(209, 33, 33), rgb(231, 86, 86))'
  );
}

function loadRedStart() {
  setTimeout(loadRed, 2000);
}

function loadDefault() {
  $('#x2wrap').css('background', '#24252f');
  $('#x3wrap').css('background', '#24252f');
  $('#x4wrap').css('background', '#24252f');
  $('#x5wrap').css('background', '#24252f');
  $('#x2').html('•');
  $('#x3').html('•');
  $('#x4').html('•');
  $('#x5').html('•');
  $('#winner').slideToggle(300);
  $('#playbtn').prop('disabled', false);
}

function loadDefaultStart() {
  setTimeout(loadDefault, 7000);
}
/* -- -- -- -- BONUS BUY GAME END -- -- -- -- */

/* -- -- -- -- WITHDRAW START -- -- -- -- */
function getwiths() {
  $('#withdrawT').load('../wallet/withdraw.php #withdrawT');
}

function createwithdraw() {
  $.ajax({
    type: 'POST',
    url: '../scriptController.php',
    beforeSend: function () {
      $('#withBtn').html('<div class="loaderThink"></div>');
    },
    data: {
      type: 'withdrawuser',
      system: $('#systemwithdraw').val(),
      wallet: $('#walletNumber').val(),
      sbpbank: $('#sbpvibor').val(),
      min_sum: $('#min_sum').html(),
      sum: $('#WithdrawSize').val(),
    },
    success: function (data) {
      var obj = jQuery.parseJSON(data);
      if (obj.success == 'success') {
        $('#withdrawT').load('../wallet/withdraw.php #withdrawT');
        $('#withBtn').html(T.create_payment);
        toastr['success'](T.application_created);
        $('#userBalance').html(obj.new_balance);
        location.reload();
        return;
      } else {
        $('#withBtn').html(T.create_payment);

        toastr['error'](obj.error);
      }
    },
  });
}

function removeWithdraw(id) {
  $.ajax({
    type: 'POST',
    url: '../scriptController.php',
    data: {
      type: 'deletewithdraw',
      del: id,
    },
    success: function (data) {
      var obj = jQuery.parseJSON(data);
      if (obj.success == 'success') {
        $('#withdrawT').load('../wallet/withdraw.php #withdrawT');
        $('#userBalance').html(obj.new_balance);
        location.reload();
      }
    },
  });
}

function minwithsum() {
  let mininal = $('#min_sum').html();
  mininal = Number(mininal);
  let inp = $('#WithdrawSize').val();
  if (inp < mininal || inp > 1000000) {
    $('#WithdrawSize').css('border', '2px solid #8d1818');
    $('#withdrawSizeAlert').show();
    $('#withdrawSizeAlert').html(
      `${T.amount_from} <b>` + mininal + `</b> ${T.up} <b>1000000</b>`
    );
    $('#withBtn').attr('disabled', true);
    $('#withBtn').css('opacity', '0.5');
  } else {
    $('#WithdrawSize').val(inp);
    $('#WithdrawSize').css('border', '2px solid #2b303b47');
    $('#withdrawSizeAlert').hide();
    $('#withBtn').attr('disabled', false);
    $('#withBtn').css('opacity', '1');
  }
}

function minwithnumber() {
  let inp = $('#walletNumber').val();
  if (inp.length < 5) {
    $('#walletNumber').css('border', '2px solid #8d1818');
    $('#walletNumberAlert').show();
    $('#walletNumberAlert').html(
      `${T.length_of_wallet_from} <b>5</b> ${T.characters}`
    );
    $('#withBtn').attr('disabled', true);
    $('#withBtn').css('opacity', '0.5');
  } else {
    $('#walletNumber').css('border', '2px solid #2b303b47');
    $('#walletNumberAlert').hide();
    $('#withBtn').attr('disabled', false);
    $('#withBtn').css('opacity', '1');
  }
}

/* -- -- -- -- WITHDRAW END -- -- -- -- */

/* -- -- -- -- DEPOSIT START -- -- -- -- */
function deposit() {
  $.ajax({
    type: 'POST',
    url: '../scriptController.php',
    beforeSend: function () {
      $('#depBtn').html('<div class="loaderThink"></div>');
    },
    data: {
      type: 'deposit',
      system: $('#systemPay').val(),
      sum: $('#depositSize').val(),
      promoDeposit: $('#promoDeposit').val(),
    },
    success: function (data) {
      var obj = jQuery.parseJSON(data);
      if (obj.success == 'success') {
        $('#depBtn').html(T.proceed_to_payment);
        toastr['success'](T.lets_go_to_the_payment_page);
        window.location.href = obj.locations;
      }
      if (obj.success == 'error') {
        $('#depBtn').html(T.proceed_to_payment);
        toastr['error'](obj.error);
      }
    },
  });
}

/* -- -- -- -- DEPOSIT END -- -- -- -- */

/* ЗАГРУЗКА КАРТИНКИ РАНГА ВОЗЛЕ ФОТКИ ПРОФИЛЯ В HEADER START */
function getrankimg() {
  var userDeps_2 = $('#hashdeps').val();
  if (userDeps_2 >= 0) {
    $('#userRankImg').attr('src', '/images/ranks/starter.png');
  }
  if (userDeps_2 >= 500) {
    $('#userRankImg').attr('src', '/images/ranks/silver.png');
  }
  if (userDeps_2 >= 2500) {
    $('#userRankImg').attr('src', '/images/ranks/gold.png');
  }
  if (userDeps_2 >= 5000) {
    $('#userRankImg').attr('src', '/images/ranks/ruby.png');
  }
  if (userDeps_2 >= 10000) {
    $('#userRankImg').attr('src', '/images/ranks/Legend.png');
  }
}
document.addEventListener('DOMContentLoaded', getrankimg);

function getrankimgProfile() {
  var userDeps_3 = $('#hashdeps').val();
  if (userDeps_3 >= 0) {
    $('.currentLevel').attr('src', '/images/ranks/starter.png');
    $('.bgLevel').css('filter', 'hue-rotate(200deg)');
  }
  if (userDeps_3 >= 500) {
    $('.currentLevel').attr('src', '/images/ranks/silver.png');
    $('.bgLevel').css('filter', 'hue-rotate(55deg)');
  }
  if (userDeps_3 >= 2500) {
    $('.currentLevel').attr('src', '/images/ranks/gold.png');
    $('.bgLevel').css('filter', 'hue-rotate(-150deg)');
  }
  if (userDeps_3 >= 5000) {
    $('.currentLevel').attr('src', '/images/ranks/ruby.png');
    $('.bgLevel').css('filter', 'hue-rotate(170deg)');
  }
  if (userDeps_3 >= 10000) {
    $('.currentLevel').attr('src', '/images/ranks/Legend.png');
    $('.bgLevel').css('filter', 'hue-rotate(130deg)');
  }
}
document.addEventListener('DOMContentLoaded', getrankimgProfile);

/* ЗАГРУЗКА КАРТИНКИ РАНГА ВОЗЛЕ ФОТКИ ПРОФИЛЯ В HEADER END */

/* УСТАНОВКА ДАТЫ РОЖДЕНИЯ В ПРОФИЛЕ START */
function setBirthday() {
  $.ajax({
    type: 'POST',
    url: '../scriptController.php',
    data: {
      type: 'setBirthday',
      birthday: $('#userBirthday').val(),
    },
    success: function (data) {
      var obj = jQuery.parseJSON(data);
      if (obj.success == 'success') {
        return toastr['success'](T.date_of_birth_saved);
      } else {
        return toastr['error'](obj.error);
      }
    },
  });
}
/* УСТАНОВКА ДАТЫ РОЖДЕНИЯ В ПРОФИЛЕ END */

/* БОНУС ЗА ДНЮХУ START */

function getBonusBirthday() {
  $.ajax({
    type: 'POST',
    url: '../scriptController.php',
    data: {
      type: 'bonusBirthday',
    },
    success: function (data) {
      var obj = jQuery.parseJSON(data);
      if (obj.success == 'success') {
        toastr['success'](T.bonus_received);
        $('#userBalance').html(obj.new_balance);
        updateBalance(obj.balance, obj.new_balance);
        return;
      } else {
        return toastr['error'](obj.error);
      }
    },
  });
}

/* БОНУС ЗА ДНЮХУ END */

/* TICKET START */

function createTicket() {
  $.ajax({
    type: 'POST',
    url: '../scriptController.php',
    beforeSend: function () {
      $('#sendbtn').html('<div class="loaderThink"></div>');
    },
    data: {
      type: 'createTicket',
      typeticket: $('#typeticket').val(),
      subject: $('#subject').val(),
      message: $('#message').val(),
    },
    success: function (data) {
      var obj = jQuery.parseJSON(data);
      if (obj.success == 'success') {
        toastr['success'](T.appeal_created);
        $('#sendbtn').html(T.send);
        $('#createTicket').hide();
        $('#listTickets').fadeIn(1000);
        getTicket(obj.tickethash);
      } else {
        $('#sendbtn').html(T.send);
        toastr['error'](obj.error);
      }
    },
  });
}
function getTicket(hash) {
  $.ajax({
    type: 'POST',
    url: '../scriptController.php',
    data: {
      type: 'getTicket',
      ticket_id: hash,
    },
    success: function (data) {
      var obj = jQuery.parseJSON(data);
      if (obj.success == 'success') {
        if (obj.system_mess == '') {
          $('#sysmsg').hide();
          $('#system_message').html(T.no_answer);
        }
        $('#listTickets').hide();
        $('#chatTicket').fadeIn(1000);
        $('#ticket_subjects').html(obj.ticket_subject);
        $('#user_message').html(obj.user_mess);
        $('#system_message').html(obj.system_mess);

        if (obj.status_ticket == 2) {
          $('#ticket_status_div').show();
          $('#ticket_status').html(T.ticket_closed);
        }
      } else {
        return toastr['error'](obj.error);
      }
    },
  });
}
