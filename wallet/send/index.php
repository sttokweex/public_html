<?
require(dirname(__DIR__, 2) . "/system/config.php");
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
$allowed = ['en', 'es', 'ru'];
if (!in_array($lang, $allowed, true)) {
    $lang = 'en';
}

// подключаем файл перевода
$path = dirname(__DIR__, 2) . "/lang/{$lang}.php";
if (is_file($path)) {
    $translations = require $path;
} else {
    // страховка: если файла нет — грузим en
    $translations = require dirname(__DIR__, 2) . "/lang/ru.php";
}

if (!isset($_SESSION['hash']) || empty($_SESSION['hash'])) {
    header('Location: /');
    die();
}

require(dirname(__DIR__, 2) . "/panels/header.php");
require(dirname(__DIR__, 2) . "/panels/sidebar.php");
require(dirname(__DIR__, 2) . "/panels/chat.php");
?>



<link href="../../css/wallet.css" rel="stylesheet">
<link href="../../css/referal.css" rel="stylesheet">

<div class="main-container">
    <div class="referal-container">
        <div class="referal-inner ">
            <div class="refferal">
                <div class="refferal__left">
                    <div class="refferal__user">
                        <div class="refferal__avatar">
                            <img onClick="location.href='/profile'" class="user" src="<?= $img ?>">
                        </div>
                        <div class="refferal__balance">
                            <div class="" style="border-radius:50%;background: #f5aa1c;color: #000;    padding: 0px 8px 0px 8px;font-weight: bold;">$</div>
                            <span><?= $balance; ?></span>
                        </div>
                    </div>
                    <div class="refferal__nav">
                        <a href="/wallet/deposit"><?= $translations['deposit'] ?></a>
                        <a href="/wallet/withdraw"><?= $translations['withdraw'] ?></a>
                        <a href="#" class="active"><?= $translations['send'] ?></a>
                    </div>
                </div>
                <div class="refferal__right">
                    <div class="refferal__link">
                        <div class="refferal__link-title">
                            <span><?= $translations['send'] ?></span>
                            <p><?= $translations['send_to_user'] ?></p>
                        </div>
                        <div class="walletSentInputs">
                            <div class="walletInputs">
                                <div class="info"> <span><?= $translations['user_id'] ?></span></div>
                                <input placeholder="Enter id" id="playerId" type="number">
                            </div>
                            <div class="walletInputs">
                                <div class="info"> <span><?= $translations['sum'] ?></span></div>
                                <input placeholder="Enter sum" id="playerSum" type="number">
                            </div>
                        </div>
                        <button class="buttonProject" id="sendBtn" style="width:fit-content; padding-left:20px;padding-right:20px;" onClick="sendMoney();"><?= $translations['send'] ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="tabProject">
<div class="tabsMore">
<a href="/wallet/deposit" class="tabsIner">Депозит</a>
<a href="/wallet/withdraw" class="tabsIner">Вывод</a>
<a href="#" class="tabsIner active">Перевод</a>
</div>
</div>

<br>

<div class="walletProject" style="">

<div class="walletSentInputs">
<div class="walletInputs">
<div class="info"> <span>Айди игрока</span></div>
<input placeholder="Введите айди" id="playerId" type="number">
</div>
<div class="walletInputs">
<div class="info"> <span>Сумма</span></div>
<input placeholder="Введите сумму" id="playerSum" type="number">
</div>
</div>

<button class="buttonProject" style="width:fit-content; padding-left:20px;padding-right:20px;" id="sendBtn" onClick="sendMoney();">Перевести</button>

    </div>

</div>  -->

    <script>
        function sendMoney() {
            $.ajax({
                type: 'POST',
                url: '../scriptController.php',
                beforeSend: function() {
                    $('#sendBtn').html('<div class="loaderThink"></div>');
                },
                data: {
                    type: "sendmoney",
                    playerid: $('#playerId').val(),
                    playersum: $("#playerSum").val()
                },
                success: function(data) {
                    var obj = jQuery.parseJSON(data);
                    if (obj.success == "success") {
                        $('#sendBtn').html(<?= $translations['translate'] ?>);
                        toastr['success'](<?= $translations['you_translated'] ?> + " " + obj.send_sum + " " + <?= $translations['you coins_to_the_player'] ?> + " " + obj.send_id)
                        $('#userBalance').html(obj.new_balance);
                    }
                    if (obj.success == "error") {
                        $('#sendBtn').html('<?= $translations['translate'] ?>');
                        toastr['error'](obj.error)
                    }
                }
            });
        }
    </script>

    <?
    require(dirname(__DIR__, 2) . "/panels/footer.php");
    ?>