<?php
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
$path = dirname(__DIR__) . "/lang/{$lang}.php";
if (is_file($path)) {
    $translations = require $path;
} else {
    $translations = require dirname(__DIR__) . "/lang/en.php";
}
?>

<style>
.hotcoef{
    width: 20px;
    margin-top: -4px;
}
.livefeedUser{
    width: 100%;
    display: flex;
    gap: 10px;
    align-items: center;
}
.livefeedUser img{
    width: 32px;
    height: 32px;
    border-radius: 50px;
    padding: 3px;
    background: var(--main-gradient);
    box-shadow: 0px 0px 7px #e2c8603b;
}
.livefeedUser span{
  color: #fff;
}
.coinsOrange{
color:#ffbb29;font-size: 14px;margin-right:5px;
}
.coinsGreen{
font-size: 14px;margin-right:5px;
}
.livedata{
color: #748198;font-weight: 300; font-size:12px;
}
.mousePoint{
cursor:pointer!important;
}
.feedHide{
    background: #2a2c38;
    color: var(--main-color-hight);
    height: 32px;
    width: 32px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 8px;
    position: absolute;
    cursor: pointer;
    right: 15;
}
</style>

<header class="livefeed position-relative">
    <div class="heading__icon heading__icon_pulsing"></div>
    <h2>Live</h2>
    <i id="hLF" class="fa fa-arrow-down feedHide" onClick="$('#livegames').fadeToggle();$('#hLF').hide();$('#sLF').show();"></i>
    <i style="display:none;" id="sLF" class="fa fa-arrow-up feedHide" onClick="$('#livegames').fadeToggle();$('#hLF').show();$('#sLF').hide();"></i>
</header>

<table id="livegames" style="user-select:none;" class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col"><?php echo $translations['game']; ?></th>
            <th scope="col"><?php echo $translations['player']; ?></th>
            <th scope="col"><?php echo $translations['bet']; ?></th>
            <th scope="col" class="hideonmob">X</th>
            <th scope="col"><?php echo $translations['win']; ?></th>
        </tr>
    </thead>
    <tbody>
    <?php
    $sql_select22231 = "SELECT COUNT(*) FROM dice ORDER BY id DESC";
    $result5521 = mysqli_query($connection,$sql_select22231);
    $row = mysqli_fetch_array($result5521);

    if ($row['COUNT(*)'] == 0) {
        echo "<tr>
            <td>" . $translations['no_games'] . "</td>
            <td>&nbsp</td>
            <td>&nbsp</td>
            <td>&nbsp</td>
            <td>&nbsp</td>
        </tr>";
    } else {
        $sql_select5 = "SELECT * FROM dice ORDER BY id + 0 DESC LIMIT 8";
        $result5 = mysqli_query($connection,$sql_select5);
        while ($row = mysqli_fetch_array($result5)) {
            $id = $row['id'];
            $game = $row['game'];
            $user_id = $row['user_id'];
            $bet = $row['bet'];
            $win = $row['win'];
            $data = $row['create_at'];
            $coefficient = $row['coef'];

            $sql_selectuser = "SELECT * FROM users WHERE id = '$user_id'";
            $result_user = mysqli_query($connection,$sql_selectuser);
            while ($row = mysqli_fetch_array($result_user)) {
                $login = $row['login'];
                $img = $row['img'];
            }

            $s3 = strtok($login, ' ');

            // Демо-данные
            $id = $coef = round(rand(28346, 2384238423), 2);
            $loginArr = [
                "James", "Olivia", "Liam", "Emma", "Noah",
                "Ava", "William", "Sophia", "Oliver", "Isabella",
                "Benjamin", "Charlotte", "Elijah", "Amelia", "Lucas",
                "Mia", "Mason", "Harper", "Logan", "Evelyn"
            ];
            $loginn = array_rand($loginArr);
            $login = $loginArr[$loginn];
            $s3 = strtok($login, 1);
            $bet = round(rand(10, 30), 2);
            $coef = round(rand(10, 109), 2);
            $win = round($bet * $coef, 2);

            if ($win == '0') {
                $color = 'color:#4b5261;';
                $colorcoin = 'color:#4b5261;';
            } else {
                $color = 'color:white;';
                $colorcoin = 'color:#31a840;';
            }

            if ($coef > 100) {
                $coefNew = "<img class='hotcoef' src='/images/hot.png'> x$coef";
            } else {
                $coefNew = "x$coef";
            }

            // games icon list
            if ($game == 'Dice') {
                $gameicon = $diceicon;
            }
            if ($game == 'Mines') {
                $gameicon = $minesicon;
            }
            if ($game == 'Bubbles') {
                $gameicon = $bubblesicon;
            }
            if ($game == 'BonusBuy') {
                $gameicon = $bonusbuyicon;
            }

            echo "<tr class='mousePoint' href='#checkFair' data-toggle='modal' onClick='checkFairness($id,$coef,$bet,$win);showLoadedr();loadingFair();'>
                <td><span class='livefeedmore livefeedinfo'>Slot <span class='livedata'>" . date('d.m.Y') . "</span></span></td>
                <td><div class='livefeedUser'> $s3 </div></td>
                <td><i class='fa fa-coins coinsOrange'></i>$bet</td>
                <td class='hideonmob' style='$color'>$coefNew</td>
                <td style='$color'><i style='$colorcoin' class='fa fa-coins coinsGreen'></i> $win</td>
            </tr>";
        }
    }
    ?>
    </tbody>
</table>
