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

// Подключаем файл перевода
$path = __DIR__ . "/lang/{$lang}.php";
if (is_file($path)) {
    $translations = require $path;
} else {
    $translations = require __DIR__ . "/lang/en.php";
}

$requestUri = $_SERVER['REQUEST_URI'];
require_once './panels/slider.php';
require_once './panels/footer.php';
require_once './faq/faq.php';
require_once './panels/livefeed.php';
require_once './panels/gameinfo.php';
require_once './panels/search.php';
require_once './panels/homeHeader.php';
require_once './panels/chat.php';

if (strpos($requestUri, '/slot/api/GetBalance') !== false) {
    require 'slot/api/getBalance.php';
    exit;
}

if (strpos($requestUri, '/slot/api/BetWin') !== false) {
    require 'slot/api/betWin.php';
    exit;
}

if (strpos($requestUri, '/slot/api/Withdraw') !== false) {
    require 'slot/api/withdraw.php';
    exit;
}

if (strpos($requestUri, '/slot/api/Deposit') !== false) {
    require 'slot/api/deposit.php';
    exit;
}

if (strpos($requestUri, '/slot/api/RollbackTransaction') !== false) {
    require 'slot/api/rollbackTransaction.php';
    exit;
}

require("system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require("panels/header.php");
require("panels/sidebar.php");
require("panels/mobile.php");

// Определяем SVG-переменные для баннеров и поиска (пустые)
$dropdown_arrow_svg = '';
$search_icon_svg = '';



$ppResponse = @file_get_contents('http://localhost:8940/game_list.do');
$ppDecoded = $ppResponse ? json_decode($ppResponse, true) : null;
$ppGames = (isset($ppDecoded['games']) && is_array($ppDecoded['games'])) ? $ppDecoded['games'] : [];
$games =  $ppGames;

if (empty($bets)) {
    $bets = [];
    for ($i = 0; $i < 15; $i++) {
        $game = $games[array_rand($games)];
        $betAmount = mt_rand(100, 5000000) / 100; // Random between $1 and $5,000
        $multiplier = mt_rand(0, 5000) / 100; // Random between 1.00 and 5.00
        $payout = $betAmount * $multiplier; // Random win or loss
        $bets[] = [
            'id' => uniqid(),
            'game' => $game['g_title'],
            'user' => 'Скрытый',
            'time' => date('H:i', strtotime('+' . mt_rand(0, 59) . ' minutes')),
            'bet_amount' => '$' . number_format($betAmount, 2),
            'multiplier' => number_format($multiplier, 2),
            'payout' => ($payout < 0 ? '-' : '') . '$' . number_format(abs($payout), 2)
        ];
    }
} else {
    // For existing bets, randomize game and recalculate payout
    foreach ($bets as &$bet) {
        $bet['game'] = $games[array_rand($games)];
        // Extract numeric value from bet_amount
        $betAmount = floatval(str_replace(['$', ','], '', $bet['bet_amount']));
        $multiplier = floatval(str_replace('×', '', $bet['multiplier']));
        $payout = mt_rand(0, 1) ? $betAmount * $multiplier : -$betAmount * $multiplier;
        $bet['payout'] = ($payout < 0 ? '-' : '') . '$' . number_format($payout, 2);
    }
    unset($bet); // Break reference
}

// помечаем источник, чтобы на клике знать какой auth дергать
foreach ($ppGames as &$game) {
    $game['__source'] = 'PP';
    // Устанавливаем vendorid, если его нет, например 'pragmatic'
    if (!isset($game['vendorid'])) {
        $game['vendorid'] = 'Pragmatic play';
    }
}

unset($game);

$games = $ppGames;
if (!is_array($games)) {
    $games = []; // Если API не вернул данные, используем пустой массив
}
?>







<body>
    <script type="text/javascript">
        function historys() {
            if (navigator.onLine == true) {
                $("#livegames").load("index.php #livegames");
            }
        }
        setInterval('historys()', 5000);
    </script>



    <div class="main-container" id="main-content">
        <div class="home-page-content-inner">

            <?php
            renderHomeHeader();
            renderSearch($games);
            ?>

            <div class="home-container home-has-padding home-has-margin">

                <?
                renderChatComponent('Иван', $sampleMessages);
                render_slider($games, false);
                render_slider($games, true);
                renderBetsTable($bets);
                render_faq($translations, 'Stake');
                renderCasinoComponent();

                ?>

            </div>

            <?php render_footer($translations, 'Stake') ?>
        </div>
    </div>


</body>

</html>