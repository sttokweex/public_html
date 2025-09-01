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
$hash = mysqlI_real_escape_string($connection, $_SESSION['hash']);
$select = "SELECT * FROM users WHERE hash = '" . $hash . "'";
$result = mysqli_query($connection, $select) or die("Ошибка выполнения запроса");
$user = mysqli_fetch_assoc($result);

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

<!DOCTYPE html>
<html>

<head>
    <link href="/css/index.css?v=2" rel="stylesheet">
    <link href="/css/game_materials.css" rel="stylesheet">
    <style>
        .game {
            width: 100%;
            min-height: 100vh;
            /* Full viewport height to allow vertical centering */
            display: flex;
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
            flex-direction: column;
            /* Stack iframe and button vertically */
            gap: 10px;
            /* Space between iframe and button */
        }

        .game-iframe {
            width: 80vw;
            /* 80% of viewport width */
            height: 80vh;
            /* 80% of viewport height */
            max-width: 1200px;
            /* Maximum width to prevent overly large iframes */
            max-height: 800px;
            /* Maximum height for consistency */
            border: none;
            border-radius: 8px;
            /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Subtle shadow */
        }

        .fullscreen-button {
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 700;
            color: #fff;
            background-color: #1b2338;
            border: 1px solid rgba(111, 125, 157, 0.18);
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .fullscreen-button:hover {
            background-color: #2a3a5a;
        }

        .other-content {

            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .other-content-inner {
            max-width: 1200px;


        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .game-iframe {
                width: 90vw;
                /* Slightly larger on smaller screens */
                height: 60vh;
                /* Shorter height on mobile */
            }
        }
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
                <?
                render_slider($games, false);
                renderBetsTable($bets);
                ?></div>
        </div> <?php renderChatComponent('Иван', $sampleMessages);
                render_footer($translations, 'Stake');
                ?>
    </div>
    <script>
        (async function() {

            const path = window.location.pathname;
            const match = path.match(/\/slot\/([^/]+)/); // Ищем /slot/ и захватываем всё до следующего слэша
            const gameName = match ? match[1] : null;
            const userId = <?php echo json_encode($user['id'] ?? ''); ?>;
            const userBalance = <?php echo json_encode($user['balance'] ?? 0); ?>;
            const lang = <?php echo json_encode($lang); ?>;
            var postData = new URLSearchParams({
                agentID: 'frenzycazUSD',
                userId: userId,
                isaffiliate: 'true',
                lang: lang,
                gameName: gameName,
                lobbyUrl: 'http://localhost/slot',
                balance: userBalance
            });

            const authUrl = 'http://localhost:8940/userAuth';

            try {
                var response = await fetch(authUrl, {
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

                var data = await response.json();
                document.getElementById('game-iframe-<?php echo htmlspecialchars($gameid); ?>').src = data.url;
                if (!data.url) {
                    throw new Error('В ответе нет ссылки на игру');
                }
            } catch (error) {
                console.error('Ошибка при получении ссылки:', error.message);
            }
        })();

        function toggleFullscreen(iframeId) {
            const iframe = document.getElementById(iframeId);
            if (!document.fullscreenElement) {
                // Enter fullscreen
                iframe.requestFullscreen().catch(err => {
                    console.error('Error entering fullscreen:', err);
                });
            } else {
                // Exit fullscreen
                document.exitFullscreen().catch(err => {
                    console.error('Error exiting fullscreen:', err);
                });
            }
        }
    </script>


</body>

</html>