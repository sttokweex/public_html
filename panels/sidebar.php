
<?
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
$allowed = ['en','es','ru'];
if (!in_array($lang, $allowed, true)) {
    $lang = 'en';
}

// подключаем файл перевода
$path = dirname(__DIR__) . "/lang/{$lang}.php";
if (is_file($path)) {
    $translations = require $path;
} else {
    // страховка: если файла нет — грузим en
    $translations = require dirname(__DIR__) . "/lang/en.php";
}

$diceicon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" aria-hidden="true" class="icon"><path d="M7.962 2.848L0 15.17l6.76 13.192 7.962-12.322-6.76-13.191zM3.97 15.982a1.15 1.15 0 010-2.3 1.15 1.15 0 010 2.3zm2.785 5.489a1.15 1.15 0 010-2.3 1.15 1.15 0 010 2.3zm.378-10.329a1.15 1.15 0 010-2.3 1.15 1.15 0 010 2.3zm3.061 5.727a1.148 1.148 0 110-2.299 1.15 1.15 0 010 2.3zm6.183.239L8.26 29.67l15.374.771 8.117-12.563-15.374-.77zm-.835 10.538a1.15 1.15 0 010-2.298 1.15 1.15 0 010 2.298zm9.21-5.026a1.15 1.15 0 010-2.298 1.15 1.15 0 010 2.298zm.29-20.283L9.517 1.559l6.958 13.581L32 15.917l-6.958-13.58zM21.36 9.971a1.15 1.15 0 010-2.3 1.15 1.15 0 010 2.3z"></path></svg>';
$minesicon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" aria-hidden="true" class="icon"><path d="M20.174 10.247V8.219a1.082 1.082 0 00-1.081-1.081h-1.639V5.166h1.798c.633 0 1.223-.25 1.659-.703a2.277 2.277 0 00.642-1.689v.005l-.058-1.563A1.26 1.26 0 0020.236.001l-.05.001h.002a1.261 1.261 0 00-1.214 1.26l.001.049v-.002l.049 1.335h-1.751a2.345 2.345 0 00-2.342 2.342v2.152h-2.025a1.082 1.082 0 00-1.081 1.081v2.028c-4.158 1.663-7.103 5.732-7.103 10.477 0 6.218 5.058 11.277 11.277 11.277s11.277-5.059 11.277-11.277c0-4.745-2.945-8.814-7.103-10.476z"></path></svg>';
$bonusbuyicon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 32" fill="currentColor" aria-hidden="true" class="icon"><path d="M21.777 12.966L17.87 29.465l-3.906-16.457c-.042-.249-1.288-6.732-.707-9.808.208-1.164.997-1.953 1.87-2.452a5.46 5.46 0 015.569.042c.831.499 1.579 1.288 1.787 2.41.54 2.992-.665 9.517-.706 9.766zm4.779 18.12c-2.66.831-5.818.457-7.481.208.208-.083.416-.208.665-.291 2.743-.582 5.07-1.247 6.94-1.912.249.208.374.416.416.665.083.54-.374 1.164-.54 1.33zm-9.933.208c-1.662.291-4.821.623-7.439-.166-.166-.208-.623-.79-.54-1.371a.97.97 0 01.416-.665c1.87.665 4.197 1.33 6.94 1.912.208.125.416.208.623.291zm-2.618-1.372c-8.769-2.203-12.301-5.07-12.551-5.236-.956-1.039-1.288-1.953-1.081-2.66.332-1.039 1.87-1.496 2.41-1.621a27.174 27.174 0 003.449 3.657c.249.208 4.156 3.616 7.771 5.86zm3.283.748c-.79-.166-1.496-.416-2.161-.831-3.782-2.161-8.395-6.192-8.436-6.234C1.496 19.034.54 15.002.499 14.712c-.166-1.579.166-2.743.997-3.449 1.247-1.081 3.366-.831 3.99-.707.042.249.125.499.208.79 0 .042.79 2.66 2.66 6.358 1.662 3.366 4.53 8.27 8.935 12.966zm16.998-6.026c-.249.208-3.74 3.034-12.551 5.236 3.616-2.244 7.522-5.652 7.771-5.86a27.046 27.046 0 003.449-3.657c.54.125 2.036.582 2.41 1.621.208.706-.125 1.621-1.081 2.66zm.956-9.932c-.042.249-.997 4.239-6.151 8.852-.042.042-4.655 4.073-8.436 6.234a8.021 8.021 0 01-2.161.831c4.364-4.696 7.231-9.6 8.893-12.925 1.87-3.699 2.66-6.317 2.66-6.358.083-.249.125-.54.208-.79.623-.125 2.743-.416 3.99.707.831.665 1.164 1.829.997 3.449zm-5.777-3.533c-.083.249-3.034 9.766-11.013 18.535l3.907-16.582c.042-.249 1.247-6.483.748-9.766.873-.291 3.948-1.039 5.694.499 1.413 1.205 1.621 3.657.665 7.314zM17.288 29.714a55.235 55.235 0 01-8.25-11.948l-.145-.312c-1.787-3.574-2.577-6.151-2.618-6.275-.956-3.616-.748-6.109.665-7.356 1.704-1.538 4.779-.79 5.693-.499-.499 3.325.665 9.517.707 9.808l3.948 16.582z"></path></svg>';
$bubblesicon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" aria-hidden="true" class="icon"><path d="M15.829.204C7.199.204.137 7.265.137 15.896s7.061 15.692 15.692 15.692c8.63 0 15.692-7.061 15.692-15.692S24.46.204 15.829.204zm5.884 7.846c1.079 0 1.962 1.275 1.962 2.942s-.883 2.942-1.962 2.942c-1.078 0-1.961-1.275-1.961-2.942s.883-2.942 1.961-2.942zm-11.768 0c1.079 0 1.962 1.275 1.962 2.942s-.883 2.942-1.962 2.942-1.962-1.275-1.962-2.942.883-2.942 1.962-2.942zm5.884 19.614c-5.1 0-9.316-4.315-9.807-9.709 2.844 1.667 6.276 2.648 9.807 2.648s6.963-.98 9.807-2.648c-.49 5.394-4.707 9.709-9.807 9.709z"></path></svg>';
?>

<div class="sidebar_project">

  <button type="button" class="sidebar__btn-close">
    <span><?= $translations['menu'] ?></span> <i></i>
  </button>

<a href="/bonus" class="sidebarBanner hideonmob">
<div class="sidebarBannerInfo">
    <span class="mainInfo"><?= $translations['bonus'] ?></span>
    <span class="mainDesc"><?= $translations['free'] ?>*</span>
</div>
</a>


<ul class="toggle-menu-list">
  <li id="toggleMenuList" class="activeSidebar"><img style="width:24px;height:24px;" src="/images/logo-gray.png"> <?= $translations['the_best'] ?> <?=strtoupper($sitename);?> <img class="downArrowSvg" src="../images/arrow-down.svg"></li>
</ul>

<ul id="projectGamesList">
<li id="gameDice" onClick="location.href='/slot/The_Dog_House'"><img src="/images/sidebar/icons/dog-house.gif"> <span>The Dog House</span></li>
  <li id="gameMines" onClick="location.href='/slot/Sweet_Bonanza'"><img src="/images/sidebar/icons/sweet.gif"> <span>Sweet Bonanza</span></li>
  <li id="gameBubbles" onClick="location.href='/slot/Gates_of_Olympus'"><img src="/images/sidebar/icons/best.gif"> <span>Gates of Olympus</span></li>
  <li id="gameBonusbuy" onClick="location.href='/slot/Sugar_Rush'"><img src="/images/sidebar/icons/sugar-rush.png"> <span>Sugar Rush</span></li>
</ul>

<script>
$(document).ready(function(){
	$('#toggleMenuList').click(function(){
		$('#projectGamesList').slideToggle(500);      
		return false;
	});
});

if (location.pathname == "/slot") {
document.getElementById('gameDice').className += 'activeSidebar2'
}
</script>

</div>