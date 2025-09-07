<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
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
	$cashback = $row['cashback'];
	$tg_id = $row['tg_id'];

    $select_sql_deps_cash = "SELECT SUM(amount) FROM deposits WHERE user_id='$id' AND status='1'";
    $select_sql_deps_cash2 = mysqli_query($connection,$select_sql_deps_cash);
    $rowdepscash = mysqli_fetch_array($select_sql_deps_cash2);
    $sumsdeps = $rowdepscash['SUM(amount)'];


    if ($cashback > 1 && $sumsdeps >= 500)
    {
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

		sendMessage($tg_id, <?= $translations['dont_miss_your_chance_get_cashback'] ?>." ".$cashback. " " .<?= $translations['coins_in_the_bonus_section'] ?>, $keyboard);
	}

}
