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
require(dirname(__DIR__, 1) . "/panels/header.php");
require(dirname(__DIR__, 1) . "/panels/sidebar.php");

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
        .game {
            position: relative;
            width: 100%;
            max-width: 100%;
            height: 0;
            padding-bottom: 56.25%;
            overflow: hidden;
            display: flex;
            justify-content: center;
        }

        .game-iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .game-container {
            width: 100%;
            display: flex;
            justify-content: center;
            margin: 2.5rem 0;
            flex-direction: column;
            max-width: 1200px;
        }



        .indicator.svelte-g4k249 {
            position: absolute;
            width: calc(1.5em - 4px);
            height: calc(1.5em - 4px);
            border-radius: 9999px;
            background: white;
            left: 0;
            transition: .25s;
            transition-property: transform, translate, scale, rotate;
        }

        .fullscreen-button,
        .demo-button {
            position: absolute;
            bottom: 10px;
            z-index: 10;
            padding: 8px 16px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .fullscreen-button {
            right: 10px;
        }

        .demo-button {
            right: 120px;
        }

        .game-footer.svelte-18h3pyu:not(.original) {
            padding: 0.5rem;
            border-bottom-left-radius: .5rem;
            border-bottom-right-radius: .5rem;
        }

        .game-footer.svelte-18h3pyu {
            height: 63px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            background: #0f212e;
        }

        .fullscreen-button:hover,
        .demo-button:hover {
            background-color: #555;
        }

        label.svelte-g4k249 :where(.svelte-g4k249):not(:last-child) {
            margin-right: 1rem;
        }

        .slider.disabled.svelte-g4k249 {
            cursor: not-allowed;
            opacity: .5;
        }

        svg.svelte-nu4xlf {
            color: white !important;
            border-radius: 0 !important;
        }

        .wrap.small.svelte-10nnz84 svg {
            height: 1.25rem;
        }

        .slider.svelte-g4k249 {
            position: relative;
            outline: 0;
            width: 2.5em;
            height: 1.5em;
            border: 2px solid #2f4553;
            border-radius: 9999px;
            background: none;
            background-color: #2f4553;
            background-size: 100%;
            background-image: none;
            background-position: center;
            background-repeat: no-repeat;
            transition: background .25s, border-color .25s;
            cursor: pointer;
            flex-shrink: 0;
        }

        input.svelte-g4k249 {
            position: absolute;
            left: 0;
            opacity: 0;
            z-index: -1;
        }

        label.checked.svelte-g4k249 .slider:where(.svelte-g4k249) {
            background-color: #00b801;
            border-color: #00b801;
        }

        label.checked.svelte-g4k249 .indicator.svelte-g4k249 {
            --slider-size: 2.5em;
            --border-size: 4px;
            --indicator-size: calc(1.5em - var(--border-size));
            transform: translate(calc(var(--slider-size) - var(--indicator-size) - var(--border-size)))
        }

        label.svelte-g4k249 {
            position: relative;
            display: inline-flex;
            align-items: center;
            flex-direction: row;
            align-items: flex-start;
            --slider-size: 2.5em;
            --border-size: 4px;
            --indicator-size: calc(1.5em - 4px);
        }

        .game-main {
            display: flex;
            justify-content: center;
            padding: 0 3vw;
        }

        .game-main.theatre .game-container {

            max-width: 1500px;
        }

        .game-main.theatre {
            padding: 0;
        }
    </style>

    <title><?= htmlspecialchars($gamename) ?> - Stake</title>
</head>

<body>
    <div class="main-container">
        <div class="game-main">
            <div class="game-container">
                <div class="game">
                    <iframe
                        id="game-iframe-<?= htmlspecialchars($gameid) ?>"
                        class="game-iframe"
                        title="<?= htmlspecialchars($gamename) ?>"
                        allow="fullscreen">
                    </iframe>

                </div>
                <div class="game-footer relative svelte-18h3pyu" style="--game-footer-height: 63px;">
                    <div class="stack x-space-between y-center gap-none padding-none direction-horizontal padding-left-auto
    padding-top-auto padding-bottom-auto padding-right-small svelte-1klblr3" style="width: auto;">
                        <div class="hoverable svelte-bft4ul">
                            <button type="button" tabindex="0" onclick="toggleFullscreen('game-iframe-<?= htmlspecialchars($gameid) ?>')" class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] inline-flex relative items-center gap-2 justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:text-white focus-visible:outline-hidden var(--ds-font-size-sm) py-[0.8125rem] px-[1rem]" data-button-root="">
                                <svg data-ds-icon="FullscreenView" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                                    <path fill="currentColor" d="M9.29 13.29 3 19.58v-3.19c0-.55-.45-1-1-1s-1 .45-1 1v5.6c0 .55.45 1 1 1h5.6c.55 0 1-.45 1-1s-.45-1-1-1H4.41l6.29-6.29a.996.996 0 1 0-1.41-1.41M16.4 1c-.55 0-1 .45-1 1s.45 1 1 1h3.19L13.3 9.29a.996.996 0 0 0 .71 1.7c.26 0 .51-.1.71-.29l6.29-6.29V7.6c0 .55.45 1 1 1s1-.45 1-1V2c0-.55-.45-1-1-1z"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="theater-mode svelte-a8mqxw">
                            <div class="hoverable svelte-bft4ul">
                                <button type="button" tabindex="0" onclick="toggleTheatre()" class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] inline-flex relative items-center gap-2 justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:text-white focus-visible:outline-hidden var(--ds-font-size-sm) py-[0.8125rem] px-[1rem]" data-button-root="">
                                    <svg data-ds-icon="ViewTheatre" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
                                        <path fill="currentColor" d="M21 8v8H3V8zm0-2H3c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>


                        <div slot="left"></div>
                    </div>
                    <div class="flex items-center absolute top-[50%] left-[50%] -translate-[50%]">
                        <div class="wrap small svelte-10nnz84" data-content="">
                            <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 200" class="svelte-nu4xlf">
                                <g id="Layer_5">
                                    <path fill="currentColor" d="M31.47,58.5c-.1-25.81,16.42-40.13,46.75-40.23,21.82-.08,25.72,14.2,25.72,19.39,0,9.94-14.06,20.48-14.06,20.48,0,0,.78,6.19,12.85,6.14,12.07-.05,23.83-8.02,23.76-27.96-.06-22.91-24.06-33.38-47.78-33.29C58.87,3.09,6.24,5.88,6.42,58.13c.18,46.41,87.76,50.5,87.83,80.21.12,32.27-36.08,40.96-48.33,40.96s-17.23-8.67-17.25-13.43c-.09-26.13,25.92-33.41,25.92-33.41,0-1.95-1.52-10.64-11.59-10.6-25.95.05-36.28,22.36-36.21,44.14.07,18.53,13.16,30.09,32.94,30.01,37.82-.14,80.46-18.59,80.3-59.56-.14-38.32-88.46-48.33-88.57-77.96Z"></path>
                                    <path fill="currentColor" d="M391.96,161.17c-.3-.73-1.15-.56-2.27.37-4.29,3.54-14.1,13.56-37.06,13.65-41.85.16-49.12-68.83-49.12-68.83,0,0,31.90-23.81,36.88-33.42,4.98-9.61-10.87-11.7-10.87-11.7,0,0-22.31,27.15-38.13,35.1,1.72-11.81,13.42-38.72,14.09-54.20.67-15.48-18.63-11.7-21.72-10.22,0,6.76-17.06,68.1-23.27,101.82-3.66,5.85-8.88,12.54-13.56,12.55-2.71,0-3.71-5.02-3.73-12.22,0-9.99,5.50-25.99,5.46-35.71,0-6.73-3.09-7.13-5.75-7.12-.58,0-3.77.09-4.36.09-6.83,0-4.58-5.85-10.73-5.79-18.80.07-42.75,20.59-43.79,51.57-6.35,4.20-15.23,9.50-19.77,9.52-4.76,0-5.94-4.40-5.95-8.20,0-6.68,10.80-46.37,10.80-46.37,0,0,13.76-3.53,19.77-4.69,4.54-.89,5.85-1.22,7.62-3.41s5.22-6.73,8.01-10.80c2.79-4.08.05-7.23-5.11-7.21-6.77,0-24.88,4.29-24.88,4.29,0,0,8.70-37.50,8.69-38.26s-.98-1.16-2.45-1.15c-3.30,0-9.18,1.77-12.94,3.12-5.76,2.06-10.45,9.12-11.40,12.40s-7.46,29.02-7.46,29.02c0,0-34.88,12.04-39.65,13.85-.29.10-.49.37-.49.68s3.99,15.60,12.17,15.54c5.85,0,23.04-7.04,23.04-7.04,0,0-8.83,35.10-8.78,46.81,0,7.51,3.54,16.30,18.21,16.26,13.65,0,25.60-7.05,32.29-11.96,3.66,9.25,12.30,11.79,18.20,11.77,13.22,0,23.40-10.55,24.71-11.96,1.72,4.06,5.76,11.85,15.01,11.82,5.23,0,10.64-5.85,14.63-11.53-.08,1.18-.06,2.36.05,3.54,1.60,14.55,23.20,6.00,24.38,3.97.73-10.52.27-32.03,4.48-45.31,5.58,45.30,26.74,75.78,64.78,75.64,21.27-.08,32.18-6.19,36.69-11.23,3.69-4.08,4.94-9.81,3.29-15.06ZM209.45,146.23c-18.26.07,5.59-47.27,21.17-47.33.02,6.10-.32,47.26-21.17,47.33Z"></path>
                                    <path fill="currentColor" d="M357.73,160.74c16.49-.06,29.25-10.91,31.59-14.44,3.02-4.59-3.51-11.53-5.59-11.41-5.21,4.98-10.65,11.01-22.87,11.05-14.38.06-11.13-15.77-11.13-15.77,0,0,27.68,3.58,38.81-16.32,3.56-6.37,3.71-15.17,2.27-18.97s-9.49-10.81-22.30-9.75c-15.74,1.33-35.57,17.74-39.93,37.45-3.50,15.86,3.12,38.26,29.14,38.17ZM375.28,94.33c2.59-.09,2.36,4.18,1.67,8.65-.98,6.06-9.29,21.45-25.17,20.85,1.10-8.96,12.91-29.15,23.53-29.50h-.03Z"></path>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class="right">
                        <div slot="right" class="pr-6">
                            <button type="button" tabindex="0" class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] inline-flex relative items-center gap-2 justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] bg-transparent text-white hover:bg-transparent hover:text-white focus-visible:outline-hidden var(--ds-font-size-sm) [&amp;_svg]:text-grey-200 [&amp;:hover&gt;svg]:text-white" data-analytics="toggle-play-real-button" data-button-root="">
                                <span type="body" tag="span" size="md" strong="true" variant="neutral-default" class="text-neutral-default ds-body-md-strong" data-ds-text="true">Fun Play</span>
                                <label class="variant-default svelte-g4k249">
                                    <input type="checkbox" aria-checked="false" class="svelte-g4k249" id="play-mode-toggle">
                                    <span class="slider svelte-g4k249">
                                        <div class="indicator svelte-g4k249"></div>
                                    </span>
                                </label>
                                <span type="body" tag="span" size="md" strong="true" variant="neutral-subtle" class="text-neutral-subtle ds-body-md-strong" data-ds-text="true">Real Play</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="other-content">
            <div class="other-content-inner">
                <?php
                render_slider($games, false, $translations, 'default');
                renderBetsTable($translations);
                ?>
            </div>
        </div>
        <?php
        render_footer($translations, 'Stake');
        ?>
    </div>
    <script>
        // Initialize checkbox state and toggle visual update
        document.querySelectorAll('label.variant-default').forEach(label => {
            const checkbox = label.querySelector('input[type="checkbox"]');
            if (checkbox.checked) {
                label.classList.add('checked');
            } else {
                label.classList.remove('checked');
            }
            checkbox.addEventListener('change', () => {
                if (checkbox.checked) {
                    label.classList.add('checked');
                    loadRealGame(); // Load real game when checked
                } else {
                    label.classList.remove('checked');
                    loadDemoGame(); // Load demo game when unchecked
                }
            });
        });

        // Function to load demo game
        async function loadDemoGame() {
            const gameName = <?= json_encode($gameid) ?>;
            const userId = <?= json_encode($user['id'] ?? '') ?>;
            try {
                const response = await fetch(`http://5.129.253.12:2200/gameStartDemo?gameName=${encodeURIComponent(gameName)}&userId=${encodeURIComponent(userId)}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) throw new Error('API Error: ' + response.status);
                const data = await response.json();
                if (!data.iframeUrl) throw new Error('No demo iframe URL in response');

                document.getElementById('game-iframe-<?= htmlspecialchars($gameid) ?>').src = data.iframeUrl;
            } catch (error) {
                console.error('Error switching to demo mode:', error);
            }
        }

        // Function to load real game
        async function loadRealGame() {
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
                authUrl = 'http://5.129.253.12:2200/userAuth';
            } else {
                postData = new URLSearchParams({
                    agentID: 'frenzycazUSD',
                    userID: userId,
                    isaffiliate: 'true',
                    lang: 'us',
                    gameid: game?.gameid ?? gameName,
                    lobbyUrl: "https://frenzycaz.online/slot"
                });
                authUrl = 'http://5.129.253.12:2202/slot/api/userAuthPP.php';
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
        }

        // Initial load based on checkbox state
        (async function() {
            const checkbox = document.getElementById('play-mode-toggle');
            if (checkbox.checked) {
                await loadRealGame();
            } else {
                await loadDemoGame();
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

        function toggleTheatre() {
            $('.game-main').toggleClass('theatre')

        }

        // Optional: Keep the demo button functionality
        async function switchToDemoMode() {
            const checkbox = document.getElementById('play-mode-toggle');
            checkbox.checked = false;
            checkbox.dispatchEvent(new Event('change')); // Trigger the change event
        }
    </script>
</body>

</html>