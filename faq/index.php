<?
require (dirname(__DIR__,1)."/system/config.php");
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
$path = dirname(__DIR__,1) . "/lang/{$lang}.php";
if (is_file($path)) {
    $translations = require $path;
} else {
    // страховка: если файла нет — грузим en
    $translations = require dirname(__DIR__,1) . "/lang/en.php";
}

require (dirname(__DIR__,1)."/panels/header.php");
require (dirname(__DIR__,1)."/panels/sidebar.php");
require (dirname(__DIR__,1)."/panels/chat.php");
require(dirname(__DIR__,1)."/panels/mobile.php");
?> 

<body>
<link href="/css/faq.css" rel="stylesheet">
   
<div class="container">
	<section class="accordion">
		<div class="tab">
			<input type="checkbox" name="accordion-1" id="cb1" />
			<label for="cb1" class="tab__label"><span><?= $translations['what'] ?> <span style="font-weight: bold;"><?=strtoupper($sitename);?></span></span></label>
			<div class="tab__content">
				<p>
					<?=strtoupper($sitename);?> — <?= $translations['faq1'] ?>
				</p>
			</div>
		</div>
		<div class="tab">
			<input type="checkbox" name="accordion-1" id="cb2" />
			<label for="cb2" class="tab__label"><?= $translations['how_to_play'] ?> ?</label>
			<div class="tab__content">
				<p><?= $translations['faq2'] ?></p>
			</div>
		</div>
		<div class="tab">
			<input type="checkbox" name="accordion-1" id="cb3" />
			<label for="cb3" class="tab__label"><?= $translations['bonus'] ?></label>
			<div class="tab__content">
				<p><?= $translations['faq3'] ?></p>
			</div>
		</div>
		<div class="tab">
			<input type="checkbox" name="accordion-1" id="cb4" />
			<label for="cb4" class="tab__label"><?= $translations['collaboration'] ?></label>
			<div class="tab__content">
				<p><?= $translations['faq4_1'] ?> <a href="https://t.me/splitaff">@splitaff</a>. <?= $translations['faq4_2'] ?></p>
			</div>
		</div>
		<div class="tab">
			<input type="checkbox" name="accordion-1" id="cb5" />
			<label for="cb5" class="tab__label"><?= $translations['Rules'] ?></label>
			<div class="tab__content">
				<p>
					<?=$sitename?> <?= $translations['faq5'] ?>
				</p>
			</div>
		</div>
	</section>
</div>

 
 
<?
require (dirname(__DIR__,1)."/panels/footer.php");
?>  
</body>
</html>