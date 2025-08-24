<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION['hash'])) {
    header('Location: /');
    exit();
}

require(dirname(__DIR__, 1) . "/system/config.php");
require(dirname(__DIR__, 1) ."/panels/header.php");
require(dirname(__DIR__, 1) ."/panels/sidebar.php");
require(dirname(__DIR__, 1) ."/panels/chat.php");
require(dirname(__DIR__, 1) ."/panels/mobile.php");

$hash = mysqlI_real_escape_string($connection,$_SESSION['hash']);
$select = "SELECT * FROM users WHERE hash = '$hash'";
$result = mysqli_query($connection,$select);
$user = mysqli_fetch_assoc($result);

$user_tg_id = $user['tg_id'];
$operatorId = ($user['is_yt'] == 1) ? '40262' : '40074';
?>
<body>
<link href="/css/index.css?v=2" rel="stylesheet">
<link href="/css/game_materials.css" rel="stylesheet">

<div class="container">
<?php
// --- Загружаем оба списка игр: PP и PG ---
$ppResponse = @file_get_contents('http://localhost:8940/game_list.do');
$ppDecoded = $ppResponse ? json_decode($ppResponse, true) : null;
$ppGames = (isset($ppDecoded['games']) && is_array($ppDecoded['games'])) ? $ppDecoded['games'] : [];


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

// Уникальные провайдеры
$providers = ['Pragmatic play'];
foreach ($games as $game) {
    if (!empty($game['vendorid']) && !in_array($game['vendorid'], $providers)) {
        $providers[] = $game['vendorid'];
    }
}
sort($providers);
?>


<style>
    .gamesList { width: 100%; }
    .game { display: block; float: left; margin: 10px; text-align: center; width: 160px; }
    .game img { width: 150px; height: 150px; border-radius: 10px; }
    .game .game-title { margin-top: 5px; font-size: 14px; font-weight: bold; color: #fff; }
    #filter-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
    }
    #search {
        flex: 2;
        padding: 10px;
        width: 60%;
        min-width: 200px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    #providerFilter {
        flex: 1;
        padding: 10px;
        width: 40%;
        min-width: 150px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    @media (max-width: 600px) {
        #filter-container {
            flex-direction: column;
        }
        #search, #providerFilter {
            width: 100%;
        }
    }
    .source-badge {
        display:inline-block;
        margin-top:4px;
        font-size:11px;
        padding:2px 6px;
        border-radius:6px;
        background:#1b2338;
        color:#9fb3ff;
        border:1px solid rgba(111,125,157,.18);
    }
</style>

<div id="filter-container">
    <input type="text" id="search" onkeyup="filterGames()" placeholder="Search game...">
    <select id="providerFilter" onchange="filterGames()">
        <option value="">All providers</option>
        <?php foreach ($providers as $provider): ?>
            <option value="<?php echo htmlspecialchars($provider); ?>"><?php echo htmlspecialchars($provider); ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div id="gamesList" class="projectGames">
    <?php foreach ($games as $game): ?>
        <?php
            // Иконка: подстраиваемся под разные ключи
            $icon = '';
            if (!empty($game['iconurl2'])) {
                $icon = $game['iconurl2'];
            } elseif (!empty($game['iconurl'])) {
                $icon = $game['iconurl'];
            } elseif (!empty($game['icon'])) {
                $icon = $game['icon'];
            }
           $vendorid = $game['vendorid'] ?? '';
            $gamename = $game['g_title'] ?? '';
            $gameid = $game['g_id'] ?? '';
            $source = $game['__source'] ?? '';
        ?>
        <div class="game"
             data-provider="<?php echo htmlspecialchars($vendorid); ?>"
             data-title="<?php echo htmlspecialchars($gamename); ?>"
             data-source="<?php echo htmlspecialchars($source); ?>">

           <a class="hwrap newGamesI" href="slot/<?php echo htmlspecialchars(str_replace(' ', '_', $gamename)); ?>" style="padding: 0px !important">
                <img class="gamePhoto" src="<?php echo htmlspecialchars($icon); ?>" alt="<?php echo htmlspecialchars($gamename); ?>">
                <div class="game-title"><?php echo htmlspecialchars($gamename); ?></div>
                <div class="source-badge"><?php echo ('PP'); ?></div>
                <div class="hcap">
                    <button class="playButton"
                        data-gameid="<?php echo htmlspecialchars($gameid); ?>"
                        data-source="<?php echo htmlspecialchars($source); ?>"
                        data-us-id="<?php echo htmlspecialchars($user['id']); ?>">
                        <i class="fa fa-play" aria-hidden="true"></i>
                    </button>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>

<script>


function filterGames() {
    var search = (document.getElementById('search').value || '').toLowerCase();
    var provider = (document.getElementById('providerFilter').value || '').toLowerCase();

    document.querySelectorAll('#gamesList .game').forEach(function(game) {
        var title = (game.getAttribute('data-title') || '').toLowerCase();
        var gameProvider = (game.getAttribute('data-provider') || '').toLowerCase();

        var matchesSearch = !search || title.indexOf(search) !== -1;
        var matchesProvider = !provider || gameProvider === provider;

        game.style.display = (matchesSearch && matchesProvider) ? '' : 'none';
    });
}
</script>

</div>
<?php require(dirname(__DIR__, 1) ."/panels/footer.php"); ?>
</body>
</html>

