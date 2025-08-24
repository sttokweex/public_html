<?php
require (dirname(__DIR__, 1)."/system/config.php");


$secretKey = 'ZnJJHtGEAIFXBD323ExLyhqrtjHhhwObS24Q';

// проверяем метод запроса
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  //********************//
  //Альтернативный способ получения данных из postback
  // Получение параметров запроса
  // $status = $_POST['status'];
  // $invoice_id = $_POST['invoice_id'];
  // $amount_crypto = $_POST['amount_crypto'];
  // $currency = $_POST['currency'];
  // $order_id = $_POST['order_id'];
  // $token = $_POST['token'];

  //********************//


  // получаем тело запроса
  $body = file_get_contents('php://input');

  file_put_contents("cp_webh.txt", $body);

  // парсим строку в массив данных
  $params = [];
  parse_str($body, $params);

  // проверяем токен
  $token = $params['token'];
  $jwtParts = explode('.', $token);
  $jwtHeader = base64_decode($jwtParts[0]);
  $jwtPayload = base64_decode($jwtParts[1]);
  $signature = $jwtParts[2];

  $validSignature = hash_hmac('sha256', "$jwtParts[0].$jwtParts[1]", $secretKey, true);
  $validSignature = base64_encode($validSignature);
  $validSignature = strtr(rtrim($validSignature, '='), '+/', '-_');

  if ($signature === $validSignature) {
    // токен верный, обрабатываем данные
    $status = $params['status'];
    $invoiceId = $params['invoice_id'];
    $amountCrypto = $params['amount_crypto'];
    $currency = $params['currency'];
    $orderId = $params['order_id'];
    $invoice_info = $params['invoice_info'];

    //$amount = $invoice_info['payload']['amount'];
    //$statusPay = $invoice_info['payload']['status']

    $sql_select = "SELECT * FROM deposits WHERE id='$orderId'";
    $result = mysqli_query($connection,$sql_select);
    $row = mysqli_fetch_array($result);
    if($row){
        $hash_user = $row['hash_user'];
        $promo = $row['promo'];
        $amount = $row['amount'];
    }

    $sql_select = "SELECT * FROM users WHERE hash='$hash_user'";
    $result = mysqli_query($connection,$sql_select);
    $row = mysqli_fetch_array($result);
    if($row){
        $newid = $row['id'];
        $balance = $row['balance'];
        $dep_week = $row['dep_week'];
        $with_week = $row['with_week'];
        $cashback_user = $row['cashback'];
        $ref = $row['ref_id'];
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

    $update_sql1 = "Update users set balance='$balancenew', dep_week='$dep_week_new' WHERE hash='$hash_user'";
    mysqli_query($connection,$update_sql1);

    $update_pay_sql = "Update deposits set status = 1 WHERE id='$orderId'";
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


  } else {
    echo "Invalid token\n";
  }
} else {
  echo "Invalid request method\n";
}
