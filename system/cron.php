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

$bot_token = '7008339760:AAGuowmc0o60BjNWAMY4pYWZ3loZGL653-U';
$webapp_url = 'https://frenzycaz.online';

require("config.php");
$time = time();
$ntime = $time - 86400;

function sendMessage($chat_id, $text, $reply_markup = null) {
    global $bot_token;

    $data = [
        'chat_id' => $chat_id,
        'text' => $text,
        'parse_mode' => 'HTML'
    ];

    if ($reply_markup) {
        $data['reply_markup'] = json_encode($reply_markup);
    }

    $url = "https://api.telegram.org/bot{$bot_token}/sendMessage";

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        ]
    ];

    $context  = stream_context_create($options);
    file_get_contents($url, false, $context);
}


$select_users = "SELECT * FROM users ORDER BY id";
$res_sql = mysqli_query($connection,$select_users);


while($row = mysqli_fetch_array($res_sql)) {
	$id = $row['id'];
	$name = $row['name'];
	$bonus = $row['bdate'];
	$tg_id = $row['tg_id'];
	$notif_b_sended = $row['notif_b_sended'];

    if ($time - $bonus > 86400 && $notif_b_sended == 0)
    {
		mysqli_query($connection,"UPDATE users SET notif_b_sended = '1' WHERE tg_id = '$tg_id'");

		$keyboard = [
			'inline_keyboard' => [
				[
					[
						'text' => 'Забрать',
						'web_app' => ['url' => $webapp_url]
					]
				]
			]
		];

		sendMessage($tg_id, <?= $translations['dont_miss_your_chance_get_your_daily_win_in_the_bonus_section'] ?>, $keyboard);
	}

}
