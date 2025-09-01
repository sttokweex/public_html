<?
require("system/config.php");
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
$path = dirname(__DIR__, 1) . "/lang/{$lang}.php";
if (is_file($path)) {
    $translations = require $path;
} else {
    // страховка: если файла нет — грузим en
    $translations = require dirname(__DIR__, 1) . "/lang/en.php";
}

if (!isset($_SESSION['hash']) || empty($_SESSION['hash'])) {
    header('Location: /');
    die();
}

require("panels/header.php");
require("panels/sidebar.php");
require("panels/chat.php");
renderChatComponent('Иван', $sampleMessages);
require("panels/mobile.php");
?>
<link href="/css/bonus.css" rel="stylesheet">

<body>


    <div class="main-container">
        <div class="bonus-container">
            <div class="bonus-inner ">
                <div class="bonus-content">
                    <!--promocode-->
                    <div class="bonuspromo" style="margin-bottom:10px;">
                        <div class="wrapper">
                            <input id="promoCode" placeholder="Enter promo there">
                            <button class="buttonProject" onclick="activePromo()"><?= $translations['active'] ?></button>
                        </div>
                    </div>


                    <?
                    $check_actual_bonuses_sql2 = "SELECT COUNT(*) FROM actived_promo WHERE user_id='$id' AND status='0' ORDER BY id DESC";
                    $check_actual_bonuses_sql_result2 = mysqli_query($connection, $check_actual_bonuses_sql2);
                    $row = mysqli_fetch_array($check_actual_bonuses_sql_result2);
                    if ($row['COUNT(*)'] == 0) {
                        echo '';
                    } else {
                    ?>
                        <span class="heading"><?= $translations['active_bonus'] ?></span>
                    <?php
                        $select_sql_bonuses2 = "SELECT * FROM actived_promo WHERE user_id='$id' AND status='0' ORDER BY id";
                        $res_sql_bonuses2 = mysqli_query($connection, $select_sql_bonuses2);
                        while ($row = mysqli_fetch_array($res_sql_bonuses2)) {

                            $id = $row['id'];
                            $name = $row['name'];
                            $sum = $row['sum'];
                            $wag_start = $row['wag_start'];
                            $wag_end = $row['wag_end'];
                            $user_id = $row['user_id'];
                            $data = $row['data'];
                            $status = $row['status'];

                            $percentage = ($wag_start / $wag_end) * 100;
                            if ($percentage > 100) {
                                $percentage = '100';
                            }
                            $percentage = round($percentage, 2);

                            $sum = round($sum, 2);
                            $wag_end = round($wag_end, 2);
                            $wag_start = round($wag_start, 2);
                            echo "
<div class='activebonuspromo'>
    <div class='info'>
        <span class='nameBonus'>" . htmlspecialchars($name) . "</span>

        <div class='progressWag'>
            <progress class='wagerProgress' value='" . htmlspecialchars($wag_start) . "' max='" . htmlspecialchars($wag_end) . "'></progress>
            <span>" . htmlspecialchars($percentage) . "%</span>
        </div>

        <div class='infobg'>
            <span class='textinfo'>" . htmlspecialchars($translations['amount_issued']) . "</span>
            <span class='suminfo'>" . htmlspecialchars($sum) . " RUB</span>
        </div>

        <div class='infobg'>
            <span class='textinfo'>" . htmlspecialchars($translations['required_bids']) . "</span>
            <span class='suminfo'>" . htmlspecialchars($wag_end) . " RUB</span>
        </div>

        <div class='infobg'>
            <span class='textinfo'>" . htmlspecialchars($translations['bet_placed']) . "</span>
            <span class='suminfo'>" . htmlspecialchars($wag_start) . " RUB</span>
        </div>

        <button class='cancelBonus' onClick='cancelBonus();'>" . htmlspecialchars($translations['cancel_bonus']) . "</button>
    </div>
</div>";
                        }
                    }
                    ?>

                    <script>
                        function cancelBonus() {
                            $.ajax({
                                type: 'POST',
                                url: 'scriptController.php',
                                beforeSend: function() {},
                                data: {
                                    type: "cancelBonusActive",
                                },
                                success: function(data) {
                                    var obj = jQuery.parseJSON(data);
                                    if (obj.success == "success") {
                                        $('#userBalance').html('0');
                                        window.location.reload();
                                        toastr['success']('Бонус отменен')
                                    } else {
                                        toastr['error'](obj.error)
                                    }
                                }
                            });
                        }
                    </script>
                    <?
                    $check_actual_bonuses_sql2 = "SELECT COUNT(*) FROM now_promo WHERE user_id='$id' AND status='0' ORDER BY id DESC";
                    $check_actual_bonuses_sql_result2 = mysqli_query($connection, $check_actual_bonuses_sql2);
                    $row = mysqli_fetch_array($check_actual_bonuses_sql_result2);
                    if ($row['COUNT(*)'] == 0) {
                        echo '';
                    } else {
                    ?>
                        <!--Доступные бонусы start-->
                        <div class="bonusall">
                            <span class="heading"><?= $translations['new_bonus'] ?></span>
                            <div class="menu">
                                <!--Список бонусов start-->
                                <?php
                                $sql_selects = "SELECT * FROM now_promo WHERE user_id='$id' AND status='0' ORDER BY id DESC";
                                $result_selects = mysqli_query($connection, $sql_selects);
                                while ($row = mysqli_fetch_array($result_selects)) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $sum = $row['sum'];
                                    $wag_start = $row['wag_start'];
                                    $wag_end = $row['wag_end'];
                                    $user_id = $row['user_id'];
                                    $data = $row['data'];
                                    $status = $row['status'];
                                    echo '
<div class="bonus">
    <div class="mui">
        <div class="image">
            <div class="main bonusPhoto1"><u id="promocodeName">' . htmlspecialchars($name) . '</u></div>
        </div>
    </div>
    <span class="bonus111">' . htmlspecialchars($translations['promo_code']) . '</span>
    <button class="buttonProject" onClick="activePromoNew(\'' . addslashes($name) . '\');">'
                                        . htmlspecialchars($translations['active']) .
                                        '</button>
</div>';
                                }
                                ?>
                                <!--Список бонусов end-->
                            </div>
                        </div>
                        <!--Доступные бонусы end-->
                    <?
                    }
                    ?>

                    <!-- Стартовые бонусы start-->
                    <div class="bonusall">
                        <span class="heading"><?= $translations['bonus'] ?></span>
                        <div class="menu">
                            <!--Список бонусов start-->

                            <?
                            if ($birthday != NULL || $birthday != '') {
                                $birthdayGet = new DateTime($birthday);
                                $todayDate = new DateTime(date("Y-m-d"));
                                if ($birthdayGet->format("m-d") == $todayDate->format("m-d")) {
                            ?>
                                    <div class="bonus">
                                        <div class="mui">
                                            <div class="image">
                                                <span class="currency"><?= $bonusdr ?>₽</span>
                                                <div class="main bonusPhotoBirth"></div>
                                            </div>
                                        </div>
                                        <span class="bonus111"><?= $translations['bonus_birthday'] ?></span>
                                        <button class="buttonProject" onClick="getBonusBirthday();"><?= $translations['get'] ?></button>
                                    </div>
                            <? }
                            } ?>




                            <div class="bonus">
                                <div class="mui">
                                    <div class="image">
                                        <span class="currency"><?= $translations['up'] ?> 10$</span>
                                        <div class="main bonusPhoto24"></div>
                                    </div>
                                </div>
                                <span class="bonus111"><?= $translations['daily_bonus'] ?></span>
                                <button class="buttonProject" onClick="getDaily();"><?= $translations['get'] ?></button>
                            </div>



                            <div class="bonus">
                                <div class="mui">
                                    <div class="image">
                                        <span class="currency">10$</span>
                                        <div class="main bonusPhotoTg" style=""></div>
                                    </div>
                                </div>
                                <span class="bonus111"><?= $translations['for_dep'] ?> 100$</span>
                                <?php
                                if ($get['tgg'] == 0) {
                                ?>
                                    <button class="buttonProject" onClick="vkBonsdfus();"><?= $translations['get'] ?></button>
                                <?php
                                } else {
                                ?>
                                    <button class="buttonProjectSuccess"><?= $translations['already_got'] ?></button>
                                <?php } ?>
                            </div>


                            <div class="bonus">
                                <div class="mui">
                                    <div class="image">
                                        <span class="currency">100$</span>
                                        <div class="main bonusPhotoVk"></div>
                                    </div>
                                </div>
                                <span class="bonus111"><?= $translations['for_dep'] ?> 1000$ </span>
                                <?php
                                if ($get['vkb'] == 0) {
                                ?>
                                    <button class="buttonProject" onClick="vkBonus();"><?= $translations['get'] ?></button>
                                <?php
                                } else {
                                ?>
                                    <button class="buttonProjectSuccess"><?= $translations['already_got'] ?></button>
                                <?php } ?>
                            </div>

                            <div class="bonus">
                                <div class="mui">
                                    <div class="image">
                                        <span class="currency">50$</span>
                                        <div class="main bonusPhotoVk2"></div>
                                    </div>
                                </div>
                                <span class="bonus111"><?= $translations['for_dep'] ?> 5000$</span>
                                <?php
                                if ($get['vkrep'] == 0) {
                                ?>
                                    <button class="buttonProject" onclick="vkRepost();"><?= $translations['get'] ?></button>
                                <?php
                                } else {
                                ?>
                                    <button class="buttonProjectSuccess"><?= $translations['already_got'] ?></button>
                                <?php } ?>
                            </div>




                            <!--Список бонусов end-->
                        </div>
                    </div>
                    <!--Стартовые бонусы end-->

                    <div class="actions-cards">

                        <!-- <div class="action">
<div  class="header">
<div class="name">Rakeback</div>
</div>
<div class="score">
<span class="bonusBalance odometer" id="rakebackval"><?= round(intval($rakeback), 2); ?></span>
</div>
<div class="description">Баланс вашего rakeback</div>
<button id="rbbtn" class="buttonProject h-auto" onClick="getRakeback();">Забрать</button>
<span class='infoBonus' href='#infoRakeback' data-toggle='modal'><i style='color: #fff;'class='fa fa-info-circle' aria-hidden='true'></i></span>
</div> -->

                        <div class="action">
                            <div class="header">
                                <div class="name"><?= $translations['cashback'] ?></div>
                            </div>
                            <div class="score">
                                <span class="bonusBalance odometer" id="cashbackval"><?= round(intval($cashback), 2); ?></span>
                            </div>
                            <div class="description"><?= $translations['your_cashback'] ?></div>
                            <button id="csbtn" class="buttonProject h-auto" onClick="getCashback();"><?= $translations['get'] ?></button>
                            <span class='infoBonus' href='#infoCashback' data-toggle='modal'><i style='color: #fff;' class='fa fa-info-circle' aria-hidden='true'></i></span>
                        </div>


                    </div>
                </div>
            </div>
        </div> <?
                require(dirname(__DIR__, 1) . "/panels/footer.php");
                render_footer($translations, 'Stake')
                ?>
    </div>




</body>

</html>