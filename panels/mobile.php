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
?>

 <link href="/css/mobile.css" rel="stylesheet">

<div class="mobile-nav">
	<a href="/slot" class="mobile-nav__link">
<i class="fa fa-gamepad"></i>
		<span><?= $translations['games'] ?></span>
	</a>

	<a onClick="$('.mobilemenu_project').toggle(100);$('.sidebar_project').hide(100);$('.navs').hide(100);" class="mobile-nav__link">
<i class="fa fa-list"></i>
		<span><?= $translations['menu'] ?></span>
	</a>
	
	<a href="/" class="mobile-nav__link mobile-nav__link_main">
<img style="width:26px;height:22px;" src="/images/logo-gray.png">
		<span><?= $translations['main'] ?></span>
	</a>

	<a href="/bonus" class="mobile-nav__link">
<i class="fa fa-gift"></i>	    
		<span><?= $translations['bonus'] ?></span>
	</a>

	<a href="https://t.me/splitsupports<?=$sitesupport?>" class="mobile-nav__link">
    <i class="fa fa-message"></i>	    
		<span><?= $translations['support'] ?></span>
	</a>
</div>


<div class="mobilemenu_project" style="display:none">

<ul id="">
<li class="activeSidebar" onClick="location.href='/referals'"><?= $translations['referals'] ?></li>
<li class="activeSidebar" onClick="location.href='/faq'"><?= $translations['faq'] ?></li>
<li class="activeSidebar" onClick="location.href='https://t.me/<?=$sitesupport?>'"><?= $translations['support'] ?></li>
<li class="activeSidebar" onClick="location.href='/ranks'"><?= $translations['ranks'] ?></li>
<li class="activeSidebar" onClick="location.href='/games/mines'"><?= $translations['mines'] ?></li>
</ul>

</div>

