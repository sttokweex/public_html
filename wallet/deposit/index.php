<?php
require (dirname(__DIR__, 2)."/system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} elseif (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
} else {
    $lang = 'en';
}
$allowed = ['en','es','ru'];
if (!in_array($lang, $allowed, true)) {
    $lang = 'en';
}

// подключаем файл перевода
$path = dirname(__DIR__,2) . "/lang/{$lang}.php";
if (is_file($path)) {
    $translations = require $path;
} else {
    // страховка: если файла нет — грузим en
    $translations = require dirname(__DIR__,2) . "/lang/en.php";
}
if (!isset($_SESSION['hash']) || empty($_SESSION['hash'])) {
    header('Location: /');
    die();
}

require (dirname(__DIR__, 2)."/panels/header.php");
require (dirname(__DIR__, 2)."/panels/sidebar.php");
require (dirname(__DIR__, 2)."/panels/chat.php");
?>

<body>

 <link href="../../css/wallet.css" rel="stylesheet">
 <link href="../../css/referal.css" rel="stylesheet">


<div class="container">

<div class="refferal">
      <div class="refferal__left">
          <div class="refferal__user">
              <div class="refferal__avatar">
                <img onClick="location.href='/profile'" class="user" src="<?=$img?>">
              </div>
              <div class="refferal__balance">
              <div class="" style="border-radius:50%;background: #f5aa1c;color: #000;    padding: 0px 8px 0px 8px;font-weight: bold;">$</div>
                <span><?=$balance;?></span>
              </div>
          </div>
          <div class="refferal__nav">
             <a href="#" class="active"><?= $translations['deposit'] ?></a>
             <a href="/wallet/withdraw"><?= $translations['withdraw'] ?></a>
             <a href="/wallet/send"><?= $translations['transfer'] ?></a>
          </div>
      </div>
      <div class="refferal__right">

        <div class="refferal__link">
          <div class="refferal__link-title">
            <p><?= $translations['select_payment_method'] ?></p>
          </div>

          <div class="systems">
            <!-- <span class="systemwallet" onClick="$('.systemwallet').removeClass('activeWallet') ;$(this).addClass(' activeWallet'); $('#systemPay').val('sbp');">
                <img src="../images/wallet/sbp.svg">
                <span style="color: var(--main-color-hight);">СБП</span>
                <span class="bonusdep d-none">+5%</span>
            </span>

            <span class="systemwallet" onClick="$('.systemwallet').removeClass('activeWallet') ;$(this).addClass(' activeWallet'); $('#systemPay').val('fkwallet');">
                <img src="../images/wallet/fkwallet.svg">
                <span style="color: var(--main-color-hight);">FK Wallet</span>
            </span>

            <span class="systemwallet" onClick="$('.systemwallet').removeClass('activeWallet') ;$(this).addClass(' activeWallet'); $('#systemPay').val('allbanks');">
                <img src="../images/wallet/allbanks.svg">
                <span style="color: var(--main-color-hight);">Любой банк</span>
            </span>
            <span class="systemwallet" onClick="setPaymentMethod('tgstars', event);">
                <img src="../images/wallet/tgstars.png">
                <span style="color: var(--main-color-hight);">TG Stars</span>
            </span>

            <span class="systemwallet" onClick="setPaymentMethod('cryptobot', event);">
                <img src="../images/wallet/cryptobot.png">
                <span style="color: var(--main-color-hight);">Crypto Bot</span>
            </span>
-->
            <span class="systemwallet" onClick="setPaymentMethod('cloudpay', event);">
                <img src="../images/wallet/cloudpay.png">
                <span style="color: var(--main-color-hight);">Cloudpay</span>
            </span>

            <input id="systemPay" style="display:none;">
          </div>



            <div class="walletInputs">
                <div class="info"> <span><?= $translations['amount'] ?></span> <div><?= $translations['min'] ?>. <span class="descriptionWallet" id="min_sum_deps"><?=$min_sum_dep?></span> <?= $translations['max'] ?>. <span class="descriptionWallet">1 ml.</span></div> </div>
                <span class="validation-message" id="depositSizeAlert"></span>
                <input placeholder="Enter sum" id="depositSize" onkeyup="mindepsum()" value="100" type="number">
            </div>

          <div class="walletInputs" style="width:40%;">
                <div class="info"> <span><?= $translations['promo_code'] ?></span></div>
                <span class="validation-message" id="promoDepositsdfs"></span>
                <input placeholder="Enter promo" id="promoDeposit" type="text">
            </div>

			<input type="hidden" id="userId" value="<?php echo $userId; ?>">

            <button class="buttonProject" id="depBtn" style="width:fit-content; padding-left:20px;padding-right:20px;" onClick="deposit();"><?= $translations['process_payment'] ?></button>

        </div>

        <div class="walletProject table-responsive mg-t-30 ">
                        <div class="table-responsive">
                                    <table id="deposits_table" class="table table-sm mg-b-0 table-striped" style="color:var(--main-color-hight)">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col"><?= $translations['amount'] ?></th>

                                                    <th scope="col">№ <?= $translations['transaction'] ?></th>
                                                    <th scope="col"><?= $translations['method'] ?></th>
                                                    <th scope="col"><?= $translations['status'] ?></th>
                                                    <th scope="col"><?= $translations['date'] ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                    <?
            $checkico = "<i style='color:#4ba136;font-size: 14px;margin-right:5px;' class='fa fa-check' aria-hidden='true'></i>";
            $waitico = "<i style='color:#4b5261;font-size: 14px;margin-right:5px;' class='fa fa-clock' aria-hidden='true'></i>";


            $deposits1 = "SELECT COUNT(*) FROM deposits WHERE user_id='$id' ORDER BY id DESC";
            $resultDes = mysqli_query($connection,$deposits1);
            $row = mysqli_fetch_array($resultDes);
            if($row['COUNT(*)'] == 0)
            {
            echo '<tr style="color:var(--main-color-medium)">
            <td>Нет пополнений</td>
            <td>&nbsp</td>
            <td>&nbsp</td>
            <td>&nbsp</td>
            <td>&nbsp</td>
            </tr>' ;
            }else{
            $deposits = mysqli_query($connection,"SELECT * FROM deposits WHERE user_id='$id' ORDER BY id DESC");
            while ($row = mysqli_fetch_array($deposits)){
            $i = $row['id'];
            $summa = $row['amount'];
            $time = $row['date'];
            $transac = $row['invoice_id'];
            $method = $row['system'];
            $status = $row['status'];

            if ($status == 0) {
                $sstatus = "<span style='color:#4b5261;'>{$waitico}{$translations['waiting']}</span>";
            }

            if ($status == 1){
                $sstatus = "<span style='color:#4ba136;'>{$waitico}{$translations['success']}</span>";
            }


            echo '<tr style="color:var(--main-color-medium)">
            <td>#'.$i.'</td>
            <td>'.$summa.' $</td>

            <td>#'.$transac.'</td>
            <td><img style="width:40px;" src="../images/wallet/'.$method.'.png"></td>
            <td>'.$sstatus.'</td>
            <td>'.$time.'</td>

            </tr>' ;
            }
            }
                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>

      </div>
  </div>

<!-- <div class="tabProject">
<div class="tabsMore">
<a href="#" class="tabsIner active">Депозит</a>
<a href="/wallet/withdraw" class="tabsIner">Вывод</a>
<a href="/wallet/send" class="tabsIner">Перевод</a>
</div>
</div> -->


<!-- <div class="walletProject">

<div class="systems">
<span class="systemwallet" onClick="$('.systemwallet').removeClass('activeWallet') ;$(this).addClass(' activeWallet'); $('#systemPay').val('sbp');">
<img style="width: 90px;height: 38px;" src="../images/wallet/sbp.svg">
<span style="color: var(--main-color-hight);">СБП</span>
<span class="bonusdep d-none">+5%</span>
</span>

<span class="systemwallet" onClick="$('.systemwallet').removeClass('activeWallet') ;$(this).addClass(' activeWallet'); $('#systemPay').val('fkwallet');">
<img style="width: 90px;height: 38px;" src="../images/wallet/fkwallet.svg">
<span style="color: var(--main-color-hight);">FK Wallet</span>
</span>

<span class="systemwallet" onClick="$('.systemwallet').removeClass('activeWallet') ;$(this).addClass(' activeWallet'); $('#systemPay').val('allbanks');">
<img style="width: 90px;height: 38px;" src="../images/wallet/allbanks.svg">
<span style="color: var(--main-color-hight);">Любой банк</span>
</span>

<span class="systemwallet"
          onClick="setPaymentMethod('USDT');">
          <img style="width: 90px;height: 38px;" src="../images/wallet/usdt.svg">
          <span style="color: var(--main-color-hight);">USDT TRC-20</span>
    </span>

<input id="systemPay" style="display:none;">
</div>

<div class="walletInputs">
<div class="info"> <span>Введите сумму</span> <div>Мин. <span class="descriptionWallet" id="min_sum_deps"><?=$min_sum_dep?></span> Макс. <span class="descriptionWallet">1 млн.</span></div> </div>
<span class="validation-message" id="depositSizeAlert"></span>
<input placeholder="Введите сумму" id="depositSize" onkeyup="mindepsum()" value="<?=$min_sum_dep?>" type="number">
</div>

<button class="buttonProject" id="depBtn" style="width:fit-content; padding-left:20px;padding-right:20px;" onClick="deposit();">Перейти к оплате</button>


</div>
<br>
  <div class="walletProject table-responsive mg-t-30 ">
                        <div class="table-responsive">
                          <table id="deposits_table" class="table table-sm mg-b-0 table-striped" style="color:var(--main-color-hight)">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Сумма</th>

                                        <th scope="col">Дата</th>
                                        <th scope="col">№ транзакции</th>
                                        <th scope="col">Метод</th>
                                        <th scope="col">Статус</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    	<?
$checkico = "<i style='color:#4ba136;font-size: 14px;margin-right:5px;' class='fa fa-check' aria-hidden='true'></i>";
$waitico = "<i style='color:#4b5261;font-size: 14px;margin-right:5px;' class='fa fa-clock' aria-hidden='true'></i>";


$deposits1 = "SELECT COUNT(*) FROM deposits WHERE user_id='$id' ORDER BY id DESC";
$resultDes = mysqli_query($connection,$deposits1);
$row = mysqli_fetch_array($resultDes);
if($row['COUNT(*)'] == 0)
{
echo '<tr style="color:var(--main-color-medium)">
<td>Нет пополнений</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
</tr>' ;
}else{
$deposits = mysqli_query($connection,"SELECT * FROM deposits WHERE user_id='$id' ORDER BY id DESC");
while ($row = mysqli_fetch_array($deposits)){
$summa = $row['suma'];
$i = $row['id'];
$transac = $row['transaction'];
$time = $row['data'];
$method = $row['method'];
$status = $row['status'];

if ($status == 0){
    $sstatus = "<span style='color:#4b5261;'>$waitico Waiting</span>";
}
if ($status == 1){
    $sstatus = "<span style='color:#4ba136;'>$checkico Success</span>";
}


echo '<tr style="color:var(--main-color-medium)">
<td>#'.$i.'</td>
<td>'.$summa.' ₽</td>
<td>'.$time.'</td>
<td>#'.$transac.'</td>
<td><img style="width:90px;" src="../images/wallet/'.$method.'.svg"></td>
<td>'.$sstatus.'</td>

</tr>' ;
}
}
	?>


                                </tbody>
                            </table>
                        </div>
                    </div> -->

</div>

<script>
    let paymentMethod = '';
    function setPaymentMethod(method, event) {
        paymentMethod = method;
        $(".systemwallet").removeClass('activeWallet');
        $(event.target).closest('.systemwallet').addClass('activeWallet');
        if(paymentMethod == 'tgstars'){
            document.getElementById("descr-stars").style.display = "block";
        }else{
            document.getElementById("descr-stars").style.display = "none";
        }
    }

    function deposit() {
        const amount = Number(document.getElementById('depositSize').value);

        if (!paymentMethod) {
            toastr['error']('Выберите метод оплаты');
            return;
        }

        const star_limit = Number("<?=$star_limit; ?>")
        if (paymentMethod == 'tgstars' && amount > star_limit) {
            toastr['error']('Лимит звезд 500 в день!');
            return;
        }

        redirectToPaymentPage(paymentMethod, amount);
    }
    Telegram.WebApp.onEvent("invoiceClosed", (event) => {
        console.log(event.status)
        if (event.status === "paid") {
            alert("Оплачено! Баланс зачислен.");
        }
    });

    function mindepsum() {
        let mininaldep = $('#min_sum_deps').html();
        mininaldep = Number(mininaldep);
        let inp = $('#depositSize').val();

        let method = $('#depositSize').val();

        if(paymentMethod && paymentMethod == 'tgstars'){
            let amountFromStar = (inp * 0.6).toFixed(0)
            $('#fromStar').html(amountFromStar);
        }

        if (inp < mininaldep || inp > 1000000) {
            $('#depositSize').css('border', '2px solid #8d1818');
            $('#depositSizeAlert').show();
            $('#depositSizeAlert').html(<?= $translations['sum'] ?> + " " + <?= $translations['from'] ?> + "<b>" + mininaldep + "</b>" + " " + <?= $translations['from'] ?> + " " + "<b>1000000</b>");
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

        if(method == 'tgstars'){
            if (window.Telegram && Telegram.WebApp) {
                item_id = "<?php echo $id; ?>"
                payWithStars(amount, item_id)
            }



        }else{
            const DEBUG = true;
            const payload = {
                method: method,
                amount: amount,
                promoDeposit: document.getElementById('promoDeposit').value
            };

            if (DEBUG) {
                console.groupCollapsed('deposit → /payments/cb.php');
                console.log('payload:', payload);
            }

            $.ajax({
                url: '/payments/cb.php',
                method: 'POST',
                data: payload,
                dataType: 'json',           // заставляем парсить JSON
                timeout: 20000
            })
            .done(function(data, textStatus, jqXHR){
                if (DEBUG) {
                    console.log('HTTP status:', jqXHR.status, textStatus);
                    console.log('Content-Type:', jqXHR.getResponseHeader('Content-Type'));
                    console.log('raw response:', jqXHR.responseText);
                    console.log('parsed data:', data);
                }

                // страховка: если data почему-то строка — пытаемся распарсить вручную
                if (typeof data !== 'object') {
                    try { data = JSON.parse(jqXHR.responseText); }
                    catch(e){
                        console.error('JSON parse error:', e);
                        toastr['error']('Некорректный ответ сервера (JSON).');
                        if (DEBUG) console.groupEnd?.();
                        return;
                    }
                }

                if (data && data.response === 'success' && data.redirect) {
                    toastr['success'](<?= json_encode($translations['redirection']) ?> + ': ' + data.redirect);
                    if (DEBUG) console.log('Redirecting to:', data.redirect);

                    // надёжный редирект
                    setTimeout(function(){
                        window.location.assign(data.redirect);
                        // запасной вариант на случай блокировок:
                        // const a = document.createElement('a'); a.href = data.redirect; a.rel='noopener'; document.body.appendChild(a); a.click();
                    }, 300);
                } else {
                    const msg = (data && (data.message || data.error || data.description)) || 'Неизвестная ошибка';
                    if (DEBUG) console.warn('Business error payload:', data);
                    toastr['error'](msg);
                }
            })
            .fail(function(jqXHR, textStatus, errorThrown){
                console.error('AJAX FAIL:', { textStatus, errorThrown, status: jqXHR.status, response: jqXHR.responseText });
                toastr['error']('Ошибка соединения: ' + textStatus + (errorThrown ? ' (' + errorThrown + ')' : ''));
            })
            .always(function(){
                if (DEBUG) console.groupEnd?.();
            });
        }
    }
    async function payWithStars(amount, item_id) {
        Telegram.WebApp.sendData(JSON.stringify({
            method: "pay_with_stars",
            stars: amount,
            item_id: item_id
        }));

        generateInvoiceLink(item_id, amount)
        .then(url => Telegram.WebApp.openInvoice(url))
        .catch(err => console.error(err));
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
      console.log('data', data)
      return data.invoice_url;
    }
</script>

<script>
$(document).ready(function() {
$('#deposits_table').DataTable({
pageLength : 5,
lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
order: [[0, 'desc']]
});
$('#deposits_table_length').hide();
$('#deposits_table_filter').hide();
$('#deposits_table_info').hide();
        });
</script>



<?
require (dirname(__DIR__, 2)."/panels/footer.php");
?>

</body>
</html>
