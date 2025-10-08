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
require(dirname(__DIR__, 1) . "/panels/header.php");
require(dirname(__DIR__, 1) . "/panels/sidebar.php");

require_once(dirname(__DIR__, 1) . '/panels/slider.php');
require_once(dirname(__DIR__, 1) . '/panels/footer.php');
require_once(dirname(__DIR__, 1) . '/panels/livefeed.php');
require_once(dirname(__DIR__, 1) . '/panels/chat.php');
require(dirname(__DIR__, 1) . "/faq/faq.php");

$hash = mysqli_real_escape_string($connection, $_SESSION['hash']);
$select = "SELECT * FROM users WHERE hash = '$hash'";
$result = mysqli_query($connection, $select) or die("Ошибка выполнения запроса");
$user = mysqli_fetch_assoc($result);

// Extract gameid from URL (e.g., /slot/vs20doghouse)
$path = $_SERVER['REQUEST_URI'];
$match = preg_match('/\/slot\/([^\/]+)/', $path, $matches);
$gameid = $match && isset($matches[1]) ? $matches[1] : '';
$gamename = (string)$gameid; // Fallback: использовать gameid как имя игры



?>

<!DOCTYPE html>



<link href="/css/index.css?v=2" rel="stylesheet">
<link href="/css/game_materials.css" rel="stylesheet">
<style>
    /* Existing styles unchanged */
</style>



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
            render_faq($translations);
            ?>
        </div>
    </div>

</div> <?php
        //  renderChatComponent('Иван', $sampleMessages, $translations);
        render_footer($translations,);
        ?>
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
            authUrl = 'http://5.129.253.12:2000/userAuth';
        } else {
            postData = new URLSearchParams({
                agentID: 'frenzycazUSD',
                userID: userId,
                isaffiliate: 'true',
                lang: 'us',
                gameid: game?.gameid ?? gameName,
                lobbyUrl: "https://frenzycaz.online/slot"
            });
            authUrl = 'http://5.129.253.12:2200/slot/api/userAuthPP.php';
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