<?
require ("system/config.php");
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
$path = __DIR__ . "/lang/{$lang}.php";
if (is_file($path)) {
    $translations = require $path;
} else {
    // страховка: если файла нет — грузим en
    $translations = require __DIR__ . "/lang/en.php";
}

require ("panels/header.php");
require ("panels/sidebar.php");
require ("panels/chat.php");
require("panels/mobile.php");
?> 

<body>
 <link href="/css/privacy.css" rel="stylesheet"> 
   
<div class="container">

<div class="privacy-page">
<h3 style="margin-bottom: -10px;"><?= $translations['private_policy'] ?></h3>
<hr>
	<?= $translations['private_policy_last_update'] ?> <br />
	<br />
	<p><?= $translations['private_terms_header'] ?></p>
	<p>
		<?= $translations['private_terms_1'] ?>
	</p>
	<p><?= $translations['private_terms_2'] ?></p>
	<h3><?= $translations['private_terms_3'] ?></h3>
	<?= $translations['private_terms_4'] ?>
	<ul>
		<li><?= $translations['name'] ?></li>
		<li><?= $translations['date'] ?></li>
		<li><?= $translations['ip-address'] ?></li>
		<li><?= $translations['number-s_of_wallets_from_which_deposits'] ?></li>
	</ul>
	<p><?= $translations['private_terms_5'] ?></p>
	<p><?= $translations['private_terms_6'] ?></p>
	<h3><?= $translations['private_terms_7'] ?></h3>
	<p><?= $translations['private_terms_8'] ?></p>
	<p><?= $translations['private_terms_9'] ?></p>
	<p><?= $translations['private_terms_10'] ?></p>
	<p><?= $translations['private_terms_11'] ?></p>
	<h3><?= $translations['private_terms_12'] ?></h3>
	<p>
		- <?= $translations['private_terms_13'] ?> <br />
		- <?= $translations['private_terms_14'] ?> <br />
		- <?= $translations['private_terms_15'] ?> <br />
		- <?= $translations['private_terms_16'] ?>
	</p>
	<h3><?= $translations['private_terms_17'] ?></h3>
	<p>
		- <?= $translations['private_terms_18'] ?> <br />
		- <?= $translations['private_terms_19'] ?> <br />
		- <?= $translations['private_terms_20'] ?>
	</p>
	<h3><?= $translations['private_terms_21'] ?></h3>
	<p>
		- <?= $translations['private_terms_22'] ?> <br />
		- <?= $translations['private_terms_23'] ?> <br />
		- <?= $translations['private_terms_24'] ?> <br />
		- <?= $translations['private_terms_25'] ?> <br />
		- <?= $translations['private_terms_26'] ?> <br />
		- <?= $translations['private_terms_27'] ?> <br />
		- <?= $translations['private_terms_28'] ?> <br />
		- <?= $translations['private_terms_29'] ?> <br />
		- <?= $translations['private_terms_30'] ?>
	</p>
	<h3><?= $translations['private_terms_31'] ?></h3>
	<p>
		<?= $translations['private_terms_32_1'] ?>
		<a href="mailto:help@<?=$sitename?>.com"> help@<?=$sitename?>.com</a> <?= $translations['private_terms_32_2'] ?>
	</p>
	<h3><?= $translations['private_terms_33'] ?></h3>
	<p> <?= $translations['private_terms_34'] ?> <a href="mailto:help@<?=$sitename?>.com">help@<?=$sitename?>.com</a></p>
	<p>
		<?= $translations['private_terms_35'] ?>
	</p>
	<h3><?= $translations['private_terms_36'] ?></h3>
	<p><?= $translations['private_terms_37'] ?></p>
	<p><?= $translations['private_terms_38'] ?></p>
	<p><?=$sitename?> <?= $translations['private_terms_39'] ?></p>
	<p><?= $translations['private_terms_40'] ?></p>
	<h3><?= $translations['private_terms_41'] ?></h3>
	<p><?= $translations['private_terms_42'] ?></p>
	<p><?= $translations['private_terms_43'] ?></p>
	<p><?= $translations['private_terms_44'] ?></p>
	<p>
		<?= $translations['private_terms_45'] ?>
	</p>
	<p><?= $translations['private_terms_46_1'] ?> <?=$sitename?> <?= $translations['private_terms_46_2'] ?></p>
	<h3><?= $translations['private_terms_47'] ?></h3>
	<p>
		<?= $translations['private_terms_48'] ?>
	</p>
	<h3><?= $translations['private_terms_49'] ?></h3>
	<?= $translations['private_terms_50'] ?>
	<p><?= $translations['private_terms_51'] ?>&nbsp;<a href="mailto:help@<?=$sitename?>.com">help@<?=$sitename?>.com</a>.</p>

</div>



</div> 
 
 
<?
require ("panels/footer.php");
?>  
</body>
</html>