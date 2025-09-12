<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} elseif (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
} else {
    $lang = 'ru';
}
if (!isset($_SESSION['hash'])) {
    header('Location: /');
    exit();
}

require(dirname(__DIR__, 1) . "/system/config.php");
require(dirname(__DIR__, 1) . "/panels/sidebar.php");
require(dirname(__DIR__, 1) . "/panels/header.php");
require_once(dirname(__DIR__, 1) . '/panels/slider.php');
require_once(dirname(__DIR__, 1) . '/panels/footer.php');
require_once(dirname(__DIR__, 1) . '/panels/livefeed.php');
require_once(dirname(__DIR__, 1) . '/panels/chat.php');

$hash = mysqli_real_escape_string($connection, $_SESSION['hash']);
$select = "SELECT * FROM users WHERE hash = '$hash'";
$result = mysqli_query($connection, $select) or die("Ошибка выполнения запроса");
$user = mysqli_fetch_assoc($result);

// Extract gameid from URL (e.g., /slot/dog_house)
$path = $_SERVER['REQUEST_URI'];
$match = preg_match('/\/slot\/([^\/]+)/', $path, $matches);
$gameid = $match && isset($matches[1]) ? $matches[1] : ''; // e.g., 'dog_house'
$gamename = $gameid; // Fallback: use gameid as gamename
$numericGameId = ''; // Для числового gameid в новом API

// Новый список игр из gameListPP.php
// $ppResponse = @file_get_contents('https://frenzycaz.online/slot/api/gameListPP.php');
// $ppDecoded = $ppResponse ? json_decode($ppResponse, true) : null;
// $allGames = (isset($ppDecoded['data']) && is_array($ppDecoded['data'])) ? $ppDecoded['data'] : [];
// $games = $allGames;

// // Поиск названия игры и числового gameid в новом API
// foreach ($allGames as $game) {
//     // Проверяем совпадение по gameid или name (нормализуем для сравнения)
//     $gameNameNormalized = strtolower(str_replace(' ', '_', $game['name'] ?? ''));
//     if (($game['gameid'] ?? '') === $gameid || $gameNameNormalized === strtolower($gameid)) {
//         $gamename = $game['name'] ?? $gameid;
//         $numericGameId = $game['gameid'] ?? ''; // Числовой ID для нового API
//         break;
//     }
// }
$games = [];

// 1. Игры с localhost:2000 (первые в списке)
$ppResponseLocal = @file_get_contents('http://localhost:2000/game_list.do');
if ($ppResponseLocal === false) {
    file_put_contents('debug.log', "Failed to fetch game_list.do: " . error_get_last()['message'] . "\n", FILE_APPEND);
    $ppGames = [];
} else {
    $ppDecodedLocal = json_decode($ppResponseLocal, true);
    $ppGames = (isset($ppDecodedLocal['games']) && is_array($ppDecodedLocal['games'])) ? $ppDecodedLocal['games'] : [];
}
foreach ($ppGames as $game) {
    $games[] = [
        'name' => $game['g_title'],
        'gameid' => $game['g_id'],
        'iconurl' => $game['g_icon'] ?? '../images/SlotsPreviews/' . str_replace(' ', '', $game['g_title'] ?? 'default') . '.png',
        '__source' => 'PP_Local',
        'vendorid' => 'Pragmatic play custom'
    ];
}

// 2. Игры с frenzycaz.online (добавляем после)
$ppResponseOnline = @file_get_contents('https://frenzycaz.online/slot/api/gameListPP.php', false, stream_context_create([
    'ssl' => [
        'verify_peer' => false, // ВРЕМЕННО для обхода TLS-ошибки
        'verify_peer_name' => false,
    ]
]));
if ($ppResponseOnline === false) {

    $allGames = [];
} else {
    $ppDecodedOnline = json_decode($ppResponseOnline, true);
    $allGames = (isset($ppDecodedOnline['data']) && is_array($ppDecodedOnline['data'])) ? $ppDecodedOnline['data'] : [];
}
foreach ($allGames as $game) {
    $games[] = [
        'name' =>  str_replace(' ', '_', $game['name']),
        'gameid' => $game['gameid'],
        'iconurl' => $game['iconurl2'] ?? $game['iconurl'],
        '__source' => 'PP_Online',
        'vendorid' => $game['vendorid'] ?? 'Pragmatic play'
    ];
}

if (empty($bets)) {
    $bets = [];
    for ($i = 0; $i < 15; $i++) {
        $game = $games[array_rand($games)];
        $betAmount = mt_rand(100, 5000000) / 100; // Random between $1 and $5,000
        $multiplier = mt_rand(0, 5000) / 100; // Random between 0.00 and 50.00
        $payout = $betAmount * $multiplier; // Random win or loss
        $bets[] = [
            'id' => uniqid(),
            'game' => $game['name'] ?? 'Unknown Game',
            'user' => 'Скрытый',
            'time' => date('H:i', strtotime('+' . mt_rand(0, 59) . ' minutes')),
            'bet_amount' => '$' . number_format($betAmount, 2),
            'multiplier' => number_format($multiplier, 2),
            'payout' => ($payout < 0 ? '-' : '') . '$' . number_format(abs($payout), 2)
        ];
    }
} else {
    foreach ($bets as &$bet) {
        $game = $games[array_rand($games)];
        $bet['game'] = $game['name'] ?? 'Unknown Game';
        $betAmount = floatval(str_replace(['$', ','], '', $bet['bet_amount']));
        $multiplier = floatval(str_replace('×', '', $bet['multiplier']));
        $payout = $betAmount * $multiplier;
        $bet['payout'] = ($payout < 0 ? '-' : '') . '$' . number_format($payout, 2);
    }
    unset($bet); // Break reference
}

if (!is_array($games)) {
    $games = []; // Если API не вернул данные, используем пустой массив
}

// Закомментированный старый код для списка игр
/*
$ppResponse = @file_get_contents('http://51.250.83.228:2000/game_list.do');
$ppDecoded = $ppResponse ? json_decode($ppResponse, true) : null;
$ppGames = (isset($ppDecoded['games']) && is_array($ppDecoded['games'])) ? $ppDecoded['games'] : [];
$games = $ppGames;

// Find game title in $ppGames
foreach ($ppGames as $game) {
    if (isset($game['g_name']) && $game['g_name'] === $gameid) {
        $gamename = isset($game['g_title']) ? $game['g_title'] : $gameid;
        break;
    }
}
*/

// Ensure $gameid and $gamename are strings to avoid htmlspecialchars errors
$gameid = (string) $gameid;
$gamename = (string) $gamename;



?>

<!DOCTYPE html>
<html>

<head>
    <link href="/css/index.css?v=2" rel="stylesheet">
    <link href="/css/game_materials.css" rel="stylesheet">
    <style>
        /* Existing styles unchanged */
    </style>
</head>

<body>
    <div class="main-container">
        <div class="game">
            <iframe
                id="game-iframe-<?php echo htmlspecialchars($gameid); ?>"
                class="game-iframe"
                title="<?php echo htmlspecialchars($gamename); ?>"
                allow="fullscreen">
            </iframe>
            <button class="fullscreen-button" onclick="toggleFullscreen('game-iframe-<?php echo htmlspecialchars($gameid); ?>')">Toggle Fullscreen</button>
        </div>
        <div class="other-content">
            <div class="other-content-inner">
                <?php
                render_slider($games, false, $translations);
                renderBetsTable($bets, $translations);
                ?>
            </div>
        </div>
        <?php
        renderChatComponent('Иван', $sampleMessages, $translations);
        render_footer($translations, 'Stake');
        ?>
    </div>
    <script>
        (async function() {
            const path = window.location.pathname;
            const match = path.match(/\/slot\/([^/]+)/);
            const gameName = match ? match[1] : null;
            const userId = <?php echo json_encode($user['id'] ?? ''); ?>;
            const userBalance = <?php echo json_encode($user['balance'] ?? 0); ?>;
            const lang = <?php echo json_encode($lang); ?>;
            const games = <?php echo json_encode($games); ?>; // Передаём массив $games из PHP

            // Ищем игру в массиве games по имени (gameName из URL)
            const game = games.find(g => g.name && gameName && g.name.replaceAll(' ', '_').toLowerCase() === gameName.toLowerCase());
            console.log(games, game)

            let authUrl, postData;

            if (game && game.__source === 'PP_Local') {
                // Для игр с __source = 'PP_Local' (старый эндпоинт)
                postData = new URLSearchParams({
                    gameName: gameName,
                    userId: userId,
                    agentID: 'frenzycazUSD',
                    isaffiliate: 'true',
                    lang: lang,
                    lobbyUrl: window.location.origin + '/slot',
                    balance: userBalance
                });
                authUrl = 'http://localhost:2000/userAuth';
            } else {
                // Для остальных игр (новый эндпоинт)
                postData = new URLSearchParams({
                    agentID: 'frenzycazUSD',
                    userID: userId,
                    isaffiliate: 'true',
                    lang: 'us',
                    gameid: game.gameid, // Используем game.gameid, если игра найдена
                    lobbyUrl: "http://localhost:2200/slot/"
                });
                authUrl = 'http://localhost:2200/slot/api/userAuthPP.php';
            }

            try {
                const response = await fetch(authUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'Accept': 'application/json'
                    },
                    body: postData.toString()
                });

                if (!response.ok) {
                    throw new Error('Ошибка API: ' + response.status);
                }

                const data = await response.json();
                if (!data.url) {
                    throw new Error('В ответе нет ссылки на игру');
                }
                document.getElementById('game-iframe-<?php echo htmlspecialchars($gameid); ?>').src = data.url;
            } catch (error) {
                console.error('Ошибка при получении ссылки:', error);
            }
        })();

        function toggleFullscreen(iframeId) {
            const iframe = document.getElementById(iframeId);
            if (!document.fullscreenElement) {
                iframe.requestFullscreen().catch(err => {
                    console.error('Error entering fullscreen:', err);
                });
            } else {
                document.exitFullscreen().catch(err => {
                    console.error('Error exiting fullscreen:', err);
                });
            }
        }
    </script>
</body>

</html>