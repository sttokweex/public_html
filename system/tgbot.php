<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$data = file_get_contents('php://input');
$data = json_decode($data, true);
file_put_contents(__DIR__ . '/message.txt', print_r($data, true));

$tg_id = $data['message']['from']['id'];
$tg_username = $data['message']['from']['username'];
$ref_id_sep = $data['message']['text'];
$ref_id_sep = explode("/start", $ref_id_sep);
$refid = trim($ref_id_sep[1]);

$webapp_url = 'https://frenzyc.com';
$bot_token = '7238976720:AAFXzvoBI3FDmv5CwFmHCvBvb_zXlQPpLFw';

define('BOT_TOKEN', '7008339760:AAGuowmc0o60BjNWAMY4pYWZ3loZGL653-U');

require("config.php");

if (isset($data['pre_checkout_query'])) {

	$query = $data['pre_checkout_query'];
    $queryId = $query['id'];
    $userId = $query['from']['id'];
    $amount = $query['total_amount'];

    $canProceed = true;

	$response = [
		'pre_checkout_query_id' => $queryId,
		'ok' => true,
	];
    file_put_contents(__DIR__ . '/payment.log',
        date('Y-m-d H:i:s') . " | req: " .  print_r($response, true) . "\n",
        FILE_APPEND
    );
	$url = "https://api.telegram.org/bot{$bot_token}/answerPreCheckoutQuery";
	$ch = curl_init($url);
	curl_setopt_array($ch, [
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => json_encode($response),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HTTPHEADER => ['Content-Type: application/json']
	]);
	$result = curl_exec($ch);
	curl_close($ch);

    file_put_contents(__DIR__ . '/payment.log',
        date('Y-m-d H:i:s') . " | Response: " . $result . "\n",
        FILE_APPEND
    );

    http_response_code(200);
    exit;
}

if (isset($data['message']['successful_payment'])) {
    $payment = $data['message']['successful_payment'];
    $userId = $data['message']['from']['id'];
    $chatId = $data['message']['chat']['id'];
    $amount = $payment['total_amount'];
    $currency = $payment['currency'];
    $payload = $payment['invoice_payload'];

	$stars_payed = $payment['total_amount'];


	$amount = $amount * 0.6;

    file_put_contents(__DIR__ . '/payments.log',
        date('Y-m-d H:i:s') . " | User $userId paid $amount $currency. Payload: $payload\n",
        FILE_APPEND
    );

    $sql_select = "SELECT * FROM deposits WHERE hash_dep='$payload'";
    $result = mysqli_query($connection,$sql_select);
    $row = mysqli_fetch_array($result);
    if($row){
        $hash_user = $row['hash_user'];
        $promo = $row['promo'];
        $method = $row['system'];
    }

    $sql_select = "SELECT * FROM users WHERE hash='$hash_user'";
    $result = mysqli_query($connection,$sql_select);
    $row = mysqli_fetch_array($result);
    if($row){
        $newid = $row['id'];
        $balance = $row['balance'];
        $star_limit = $row['star_limit'];
        $dep_week = $row['dep_week'];
        $with_week = $row['with_week'];
        $cashback_user = $row['cashback'];
        $ref = $row['ref_id'];
    }

    if($method == 'tgstars' && $stars_payed > $star_limit){
        return 'Error';
    }

    if ($promo != '0') {
        $sql_select1 = "SELECT * FROM promo WHERE name='$promo'";
        $result1 = mysqli_query($connection,$sql_select1);
        $row = mysqli_fetch_array($result1);
        if ($row)
        {
            $promo_id = $row['id'];
            $promo_sum = $row['sum'];
        }

        $amount = $amount + $amount / $promo_sum;
    }

    $balancenew = $balance + $amount;
    $dep_week_new = $dep_week + $amount;
    $sumawag = $amount * $coefdeposit;

    $newStarLimit = $star_limit;
    if($method = 'tgstars'){
        $newStarLimit = $star_limit - $stars_payed;
    }

    $update_sql1 = "Update users set balance='$balancenew', dep_week='$dep_week_new', wager = wager+$sumawag, star_limit=$newStarLimit WHERE hash='$hash_user'";
    mysqli_query($connection,$update_sql1);

    $update_pay_sql = "Update deposits set status = 1 WHERE hash_dep='$payload'";
    mysqli_query($connection,$update_pay_sql);

    mysqli_query($connection,"INSERT INTO `promo_log` (`id`,`promo_id`,`user_id`) VALUES (NULL,'$promo_id','$newid')");

    $update_pay_sql = "Update promo set actived = actived+1 WHERE name='$promo'";
    mysqli_query($connection,$update_pay_sql);

    /* зачисление РЕФЕРАЛА */
    $sql_select = "SELECT * FROM users WHERE id='$ref'";
    $result = mysqli_query($connection,$sql_select);
    $row = mysqli_fetch_array($result);
    if($row){
        $countref = $row['refs'];
    }

    /* процент рефки в зависимости от кол-во рефов */
    if($countref < 10){
        $percent_refs = 2;
    }
    if($countref >= 10){
        $percent_refs = 4;
    }
    if($countref >= 25){
        $percent_refs = 6;
    }
    if($countref >= 50){
        $percent_refs = 8;
    }
    if($countref >= 100){
        $percent_refs = 10;
    }

    $sumaref = ($amount / 100) * $percent_refs; //процент отчисления рефки для рефера

    if($ref >= 1) {
        $sql_select = "SELECT * FROM users WHERE id='$ref'";
        $result = mysqli_query($connection,$sql_select);
        $row = mysqli_fetch_array($result);
        if($row) {
            $reefearns = $row['refearn'];
            $ref_deps = $row['ref_deps'];
            $ref_deps_sum = $row['ref_deps_sum'];

            $ref_deps_all = $ref_deps + 1;
            $ref_deps_sum_all = $ref_deps_sum + $amount;

            $erarn = $reefearns + $sumaref;
            $balanceref = $row['balance'];
            $balancerefs = $balanceref + $sumaref;
            $update_sql1 = "Update users set balance='$balancerefs', refearn='$erarn', ref_deps='$ref_deps_all', ref_deps_sum='$ref_deps_sum_all' WHERE id='$ref'";
            mysqli_query($connection,$update_sql1) or die("" . mysqli_error());
        }
    }

    $getDepsForLevel = "SELECT SUM(amount) FROM deposits WHERE hash_user='$hash_user' AND status ='1'";
    $getDepsForLevel2 = mysqli_query($connection,$getDepsForLevel);
    $leveldeposits = mysqli_fetch_array($getDepsForLevel2);
    $depositesSID = $leveldeposits['SUM(amount)'];

    if($depositesSID < 500){ /* starter rank */
        $cashback_rankt = '0'; /* 0% */
    }
    if($depositesSID >= 500){ /* silver rank */
        $cashback_rankt = '3'; /* 3% */
    }
    if($depositesSID >= 2500){ /* gold rank */
        $cashback_rankt = '5'; /* 5% */
    }
    if($depositesSID >= 5000){ /* ruby rank */
        $cashback_rankt = '7'; /* 7% */
    }
    if($depositesSID >= 10000){ /* legend rank */
        $cashback_rankt = '10'; /* 10% */
    }

    $whycashbdepwith = $with_week - ($dep_week + $amount);
    $whycashbdepwith = abs($whycashbdepwith);

    if($whycashbdepwith >= 0) {
        $cashbacksum = ($whycashbdepwith / 100) * $cashback_rankt;
    }

    $update_sql1 = "Update users set cashback='$cashbacksum' WHERE hash='$hash_user'";
    mysqli_query($connection,$update_sql1);


    // Отправляем подтверждение пользователю
    $message = "✅ Платеж на $stars_payed STAR получен! Зачислено $amount RUB. Спасибо за покупку.";
    $url = "https://api.telegram.org/bot$bot_token/sendMessage?chat_id=$chatId&text=" . urlencode($message);
    file_get_contents($url);
}

function sendTelegram($method, $response) {
	$ch = curl_init('https://api.telegram.org/bot' . BOT_TOKEN . '/' . $method);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $response);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_exec($ch);
	curl_close($ch);
}
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


if (!empty($data['message']['text'])) {
	$text = $data['message']['text'];
    $cmd = explode(' ', $text);
	if ($cmd[0] === '/start') {

	    $user_exists_query = "SELECT * FROM users WHERE tg_id = '$tg_id'";
        $user_result = mysqli_query($connection,$user_exists_query);
        $user_data = mysqli_fetch_assoc($user_result);

		if ($user_data) {
			// Пользователь существует, выполнить авторизацию
			$_SESSION['hash'] = $user_data['hash'];
			$_SESSION['login'] = 1;

			// Обновить IP пользователя и другую информацию
			$ip = $_SERVER['REMOTE_ADDR'];
            //$last_auth_date = date("Y-m-d H-i-s");


			$token_tg_user = md5(microtime(true));
			mysqli_query($connection,"UPDATE users SET ip = '$ip', token_tg_user = '$token_tg_user' WHERE tg_id = '$tg_id'");


			$keyboard = [
				'inline_keyboard' => [
					[
						[
							'text' => 'Играть',
							'web_app' => ['url' => $webapp_url]
						]
					]
				]
			];
			sendMessage($data['message']['chat']['id'], "Нажмите кнопку ниже, чтобы начать игру:", $keyboard);
			/*
			sendTelegram (
				'sendMessage', [
                	'chat_id' => $data['message']['chat']['id'],
                	'text' => $token_tg_user
            	]
			);
			*/
		} else {
			//пользователь не существует, выполняем регистрацию

			$ip = $_SERVER['REMOTE_ADDR'];
            $date_reg = date("Y-m-d H-i-s");
            $balance = '0';

			// Создаем нового пользователя
			$new_user_hash = md5(microtime()); // Генерация уникального хэша
			//достаем айди реферала (если он есть)
			/*$sql_select52 = "SELECT * FROM users WHERE ref_code = '$refid'";
			$result52 = mysqli_query($connection,$sql_select52);
			while ($row = mysqli_fetch_array($result52)) {
				$refid_iduser = $row['id'];
			}*/
			//генерируем реферальный код
            $ref_code_generate = substr(md5($new_user_hash), 0, 10);
			$ref_code = strtoupper($ref_code_generate);
			$user_id = str_pad(mt_rand(0, 9999999999), 10, '0', STR_PAD_LEFT);

			$login = $data['message']['chat']['first_name'] . ' ' . $data['message']['chat']['last_name'];
			$token_tg_user = md5(microtime(true));

            mysqli_query($connection,"INSERT INTO users (login, user_id, balance, hash, data_reg, ref_id, ip, tg_id, tg_username, token_tg_user) VALUES ('$login', '$user_id', '$balance', '$new_user_hash', '$date_reg', '$refid', '$ip', '$tg_id', '$tg_username', '$token_tg_user')");


			sendMessage($data['message']['chat']['id'], "Нажмите кнопку ниже, чтобы начать игру:", $keyboard);
			/*
            sendTelegram (
				'sendMessage', [
                	'chat_id' => $data['message']['chat']['id'],
                	'text' => $token_tg_user
            	]
			);
*/
            $selectat123 = "SELECT * FROM users WHERE ref_code = '$refid'";
            $resultat123 = mysqli_query($connection,$selectat123);
            $row44 = mysqli_fetch_array($resultat123);
            if(count($row44)>0){
                mysqli_query($connection,"UPDATE users SET refs = refs + 1 WHERE ref_code = '$refid'");
            }

			// Устанавливаем сессии для нового пользователя
			$_SESSION['hash'] = $new_user_hash;
			$_SESSION['login'] = 1;
        }

	}elseif ($cmd[0] === '/getcode') {
		$user_exists_query = "SELECT * FROM users WHERE tg_id = '$tg_id'";
		$user_result = mysqli_query($connection,$user_exists_query);
		$user_data = mysqli_fetch_assoc($user_result);

		if ($user_data) {
			// Пользователь существует, выполнить авторизацию
			$_SESSION['hash'] = $user_data['hash'];
			$_SESSION['login'] = 1;

			// Обновить IP пользователя и другую информацию
			$ip = $_SERVER['REMOTE_ADDR'];
			//$last_auth_date = date("Y-m-d H-i-s");


			$token_tg_user = md5(microtime(true));
			mysqli_query($connection,"UPDATE users SET ip = '$ip', token_tg_user = '$token_tg_user' WHERE tg_id = '$tg_id'");


			sendMessage($data['message']['chat']['id'], $token_tg_user);
		} else {
			//пользователь не существует, выполняем регистрацию

			$ip = $_SERVER['REMOTE_ADDR'];
			$date_reg = date("Y-m-d H-i-s");
			$balance = '0';

			// Создаем нового пользователя
			$new_user_hash = md5(microtime()); // Генерация уникального хэша
			//достаем айди реферала (если он есть)
			/*$sql_select52 = "SELECT * FROM users WHERE ref_code = '$refid'";
			$result52 = mysqli_query($connection,$sql_select52);
			while ($row = mysqli_fetch_array($result52)) {
				$refid_iduser = $row['id'];
			}*/
			//генерируем реферальный код
			$ref_code_generate = substr(md5($new_user_hash), 0, 10);
			$ref_code = strtoupper($ref_code_generate);
			$user_id = str_pad(mt_rand(0, 9999999999), 10, '0', STR_PAD_LEFT);

			$login = $data['message']['chat']['first_name'] . ' ' . $data['message']['chat']['last_name'];
			$token_tg_user = md5(microtime(true));

			mysqli_query($connection,"INSERT INTO users (login, user_id, balance, hash, data_reg, ref_id, ip, tg_id, tg_username, token_tg_user) VALUES ('$login', '$user_id', '$balance', '$new_user_hash', '$date_reg', '$refid', '$ip', '$tg_id', '$tg_username', '$token_tg_user')");

			sendMessage($data['message']['chat']['id'], $token_tg_user);

			$selectat123 = "SELECT * FROM users WHERE ref_code = '$refid'";
			$resultat123 = mysqli_query($connection,$selectat123);
			$row44 = mysqli_fetch_array($resultat123);
			if(count($row44)>0){
				mysqli_query($connection,"UPDATE users SET refs = refs + 1 WHERE ref_code = '$refid'");
			}

			// Устанавливаем сессии для нового пользователя
			$_SESSION['hash'] = $new_user_hash;
			$_SESSION['login'] = 1;
		}

	}
}
