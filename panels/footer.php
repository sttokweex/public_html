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

<div class="footer_project">
	<div class="footerLeft">
		<div class="footer_logotype" style="cursor:pointer" onClick="location.href='/'">
			<img class="footer_logo" src="../../images/logo-mob.svg" />
			<span class="site_name"><?=strtoupper($sitename);?></span>
		</div>
		<span class="footer_copyright">
			© 2025
			<?=strtoupper($sitename);?>. <?= $translations['all_rights_reserved'] ?>
		</span>
		<div class="footer_privacy">
			<a href="/privacy-terms"><?= $translations['user_agreement'] ?></a>
			<a href="/privacy-policy"><?= $translations['privacy_policy'] ?></a>
		</div>
	</div>
</div>
