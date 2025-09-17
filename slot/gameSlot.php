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
require(dirname(__DIR__, 1) . "/faq/faq.php");

$hash = mysqli_real_escape_string($connection, $_SESSION['hash']);
$select = "SELECT * FROM users WHERE hash = '$hash'";
$result = mysqli_query($connection, $select) or die("Ошибка выполнения запроса");
$user = mysqli_fetch_assoc($result);

// Extract gameid from URL (e.g., /slot/vs20doghouse)
$path = $_SERVER['REQUEST_URI'];
$match = preg_match('/\/slot\/([^\/]+)/', $path, $matches);
$gameid = $match && isset($matches[1]) ? $matches[1] : ''; // e.g., 'vs20doghouse'
$gamename = $gameid; // Fallback: use gameid as gamename

// Fetch game title from API if available
$ppResponse = @file_get_contents('http://localhost:8940/game_list.do');
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

// Ensure $gameid and $gamename are strings to avoid htmlspecialchars errors
$gameid = (string) $gameid;
$gamename = (string) $gamename;

// Existing bets logic
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
        $bet['game'] = $games[array_rand($games)]['g_title'];
        // Extract numeric value from bet_amount
        $betAmount = floatval(str_replace(['$', ','], '', $bet['bet_amount']));
        $multiplier = floatval(str_replace('×', '', $bet['multiplier']));
        $payout = $betAmount * $multiplier;
        $bet['payout'] = ($payout < 0 ? '-' : '') . '$' . number_format($payout, 2);
    }
    unset($bet); // Break reference
}

// Add __source and vendorid to ppGames
foreach ($ppGames as &$game) {
    $game['__source'] = 'PP';
    if (!isset($game['vendorid'])) {
        $game['vendorid'] = 'Pragmatic play';
    }
}
unset($game);

$games = $ppGames;
if (!is_array($games)) {
    $games = [];
}
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
        const path = window.location.pathname;
        const match = path.match(/\/slot\/([^/]+)/);
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