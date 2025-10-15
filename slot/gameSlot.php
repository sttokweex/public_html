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
            position: relative;
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

        }

        .main-container-slot {
            max-width: calc(1280px / 12 * 12);
            min-width: calc(1000px - 20vw);
            width: calc(80vw - 1rem * 11 / 12 * 12 + 1rem * 11);
            background-color: #fff0;
            margin: auto;
            padding-top: 64px;
        }

        .main-container-slot.theatre {
            max-width: calc(1400px / 12 * 12);
            min-width: calc(1000px - 20vw);
            width: calc(90vw - 1rem * 11 / 12 * 12 + 1rem * 11);
            background-color: #fff0;
            margin: auto;
            padding-top: 64px;
        }

        @media (max-width: 970px) {
            .main-container-slot.theatre {
                --hc-distance-between-components: 2rem;
                max-width: 100vw;
                min-width: unset;
                width: 100vw;
                margin: 0;
            }

            .main-container-slot {
                --hc-distance-between-components: 2rem;
                max-width: calc(1000px - 2rem);
                width: calc(100vw - 2rem - 1rem * 3 / 4 * 4 + 1rem * 3);
                min-width: unset;
            }

        }

        .stack.direction-horizontal.svelte-1klblr3 {
            grid-auto-flow: column;
        }

        .stack.y-center.svelte-1klblr3 {
            align-items: center;
        }

        .stack.padding-none.svelte-1klblr3 {
            padding: 0;
        }

        .stack.svelte-1klblr3 {
            display: grid;
        }

        .relative {
            position: relative;
        }

        .inline-flex {
            display: inline-flex;
        }

        .text-grey-200 {
            color: #b1bad3;
        }

        .items-center {
            align-items: center;
        }

        .justify-center {
            justify-content: center;
        }

        .rounded-\(--ds-radius-md\) {
            border-radius: 0.5rem;
        }

        .px-\[1rem\] {
            padding-inline: 1rem;
        }

        .\[font-weight\:var\(--ds-font-weight-thick\)\] {
            font-weight: 600;
        }

        .whitespace-nowrap {
            white-space: nowrap;
        }

        .bg-transparent {
            background-color: transparent !important;
        }

        .gap-2 {
            gap: .5rem !important;
        }
    </style>

    <title><?= htmlspecialchars($gamename) ?> - Stake</title>
</head>

<body>
    <div class="main-container-slot">
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
                <div class="game-footer  svelte-18h3pyu" style="--game-footer-height: 63px;">
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

                    <div class="right">
                        <div slot="right" class="pr-6">
                            <button type="button" tabindex="0" class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] inline-flex relative items-center gap-2 justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] bg-transparent text-white hover:bg-transparent hover:text-white focus-visible:outline-hidden var(--ds-font-size-sm) [&amp;_svg]:text-grey-200 [&amp;:hover&gt;svg]:text-white" data-analytics="toggle-play-real-button" data-button-root="">
                                <span type="body" tag="span" size="md" strong="true" variant="neutral-default" class="text-neutral-default ds-body-md-strong" data-ds-text="true">Fun Play</span>
                                <label class="variant-default svelte-g4k249">
                                    <input type="checkbox" aria-checked="false" checked class="svelte-g4k249" id="play-mode-toggle">
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
    </div>
    <div class="main-container">
        <div class="other-content">
            <div class="other-content-inner">
                <?php
                render_slider($games, false, $translations, 'default');

                ?>
            </div>
        </div>

    </div> <?php
            render_footer($translations, 'Stake');
            ?>
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
                const response = await fetch(`http://5.129.253.12:2000/gameStartDemo?gameName=${encodeURIComponent(gameName)}&userId=${encodeURIComponent(userId)}`, {
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
                authUrl = 'http://5.129.253.12:2000/userAuth';
            } else {
                postData = new URLSearchParams({
                    agentID: 'frenzycazUSD',
                    userID: userId,
                    isaffiliate: 'true',
                    lang: 'en',
                    gameid: game?.gameid,
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
            $('.main-container-slot').toggleClass('theatre')

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