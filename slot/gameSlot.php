<?php
session_start();

// Проверка и установка языка
$lang = $_SESSION['lang'] ?? $_COOKIE['lang'] ?? 'ru';

// Проверка сессии
if (!isset($_SESSION['hash'])) {
    header('Location: /');
    exit;
}

require(dirname(__DIR__, 1) . "/system/config.php");
require(dirname(__DIR__, 1) . "/panels/sidebar.php");
require(dirname(__DIR__, 1) . "/panels/header.php");
require_once(dirname(__DIR__, 1) . '/panels/slider.php');
require_once(dirname(__DIR__, 1) . '/panels/footer.php');
require_once(dirname(__DIR__, 1) . '/panels/livefeed.php');
require_once(dirname(__DIR__, 1) . '/panels/chat.php');

$hash = mysqli_real_escape_string($connection, $_SESSION['hash']);
$query = "SELECT * FROM users WHERE hash = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("s", $hash);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

// Извлечение gameid из URL
$path = $_SERVER['REQUEST_URI'];
$match = preg_match('/\/slot\/([^\/]+)/', $path, $matches);
$gameid = $match && isset($matches[1]) ? $matches[1] : '';
$gamename = (string)$gameid; // Fallback: использовать gameid как имя игры

?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang, ENT_QUOTES, 'UTF-8') ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/index.css?v=2">
    <link rel="stylesheet" href="/css/game_materials.css">
    <style>
        .game-iframe {
            width: 100%;
            height: 600px;
            border: none;
        }

        .fullscreen-button {
            margin-top: 10px;
            padding: 8px 16px;
            cursor: pointer;
        }
    </style>
    <title><?= htmlspecialchars($gamename) ?> - Stake</title>
</head>

<body>
    <div class="main-container">
        <div class="game">
            <iframe
                id="game-iframe-<?= htmlspecialchars($gameid) ?>"
                class="game-iframe"
                title="<?= htmlspecialchars($gamename) ?>"
                allow="fullscreen">
            </iframe>
            <button class="fullscreen-button" onclick="toggleFullscreen('game-iframe-<?= htmlspecialchars($gameid) ?>')">Toggle Fullscreen</button>
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
            const gameName = <?= json_encode($gameid) ?>;
            const userId = <?= json_encode($user['id'] ?? '') ?>;
            const userBalance = <?= json_encode($user['balance'] ?? 0) ?>;
            const lang = <?= json_encode($lang) ?>;
            const games = <?= json_encode($games) ?>;

            const game = games.find(g => g.name && gameName && g.name.replaceAll(' ', '_').toLowerCase() === gameName.toLowerCase());
            let authUrl, postData;

            if (game && game.__source === 'PP_Local') {
                postData = new URLSearchParams({
                    gameName: gameName,
                    userId: userId,
                    agentID: 'frenzycazUSD',
                    isaffiliate: 'true',
                    lang: lang,
                    lobbyUrl: window.location.origin + '/slot',
                    balance: userBalance
                });
                authUrl = 'http://localhost:8940/userAuth';
            } else {
                postData = new URLSearchParams({
                    agentID: 'frenzycazUSD',
                    userID: userId,
                    isaffiliate: 'true',
                    lang: 'us',
                    gameid: game?.gameid ?? gameName,
                    lobbyUrl: "https://frenzycaz.online/slot"
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

                if (!response.ok) throw new Error('API Error: ' + response.status);
                const data = await response.json();
                if (!data.url) throw new Error('No game URL in response');
                document.getElementById('game-iframe-<?= htmlspecialchars($gameid) ?>').src = data.url;
            } catch (error) {
                console.error('Error fetching game URL:', error);
            }
        })();

        function toggleFullscreen(iframeId) {
            const iframe = document.getElementById(iframeId);
            if (!document.fullscreenElement) {
                iframe.requestFullscreen().catch(err => console.error('Error entering fullscreen:', err));
            } else {
                document.exitFullscreen().catch(err => console.error('Error exiting fullscreen:', err));
            }
        }
    </script>
</body>

</html>