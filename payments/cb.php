<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$sid = $_SESSION['hash'];

require (dirname(__DIR__, 1)."/system/config.php");

$result = mysqli_query($connection,"SELECT * FROM `users` WHERE hash= '$sid'");
$row = mysqli_fetch_array($result);
$user_id = $row['id'];

header('Content-Type: application/json');

if($_POST['method'] == 'cryptobot') {

    $amount = $_POST['amount'];
    $promo = $_POST['promoDeposit'];
    $date_dep = date("d.m.Y H:i:s");

    if ($amount >= $min_sum_dep) {

        if (isset($promo) && trim($promo) != '') {
            $sql_select = "SELECT * FROM `users` WHERE hash='$sid'";
            $result = mysqli_query($connection,$sql_select);
            $row = mysqli_fetch_array($result);
            $user_id = $row['id'];

            $sql_select1 = "SELECT * FROM promo WHERE name='$promo'";
            $result1 = mysqli_query($connection,$sql_select1);
            $row = mysqli_fetch_array($result1);
            if ($row) {
                $idpromo = $row['id'];
                $promo_new = $row['name'];
                $idactive = $row['id_active'];
                $promo_type = $row['type'];
            }

            $sql_select2 = "SELECT * FROM promo_log WHERE promo_id='$idpromo' and user_id ='$user_id'";
		    $result2 = mysqli_query($connection,$sql_select2) or die(mysqli_error($connection));
		    $row2 = mysqli_fetch_array($result2);
		    if ($row2) {
			    exit(json_encode(['response' => 'error', 'message' => 'Вы уже активировали данный промо-код!']));
		    }

            if (empty($promo_new)) {
                exit(json_encode(['response' => 'error', 'message' => 'Промокод не найден']));
            }

            if ($promo_type != 'deposit') {
                exit(json_encode(['response' => 'error', 'message' => 'Это не промо к депозиту']));
            }
        }

        $apiToken = '376741:AASDjbZwmD3C3KUBnFtcxikSaKZBxTsipTl';
        //$apiToken = '35268:AAyh0KXjTZNgpyPACpztFT7iC7AXGSGFgxL';

        $hash_dep = md5(microtime(true));

        $data = [
            'currency_type' => 'fiat',
            'fiat' => 'RUB',
            'amount' => isset($_POST['amount']) ? $_POST['amount'] : '100.00',
            'description' => 'Пополнение счета',
            'paid_btn_name' => 'viewItem',
            'paid_btn_url' => 'https://ysplit.online',
            'payload' => $hash_dep,
        ];

        $data = http_build_query($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://pay.crypt.bot/api/createInvoice?' . $data);
        //curl_setopt($ch, CURLOPT_URL, 'https://testnet-pay.crypt.bot/api/createInvoice?' . $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Crypto-Pay-API-Token: ' . $apiToken,
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resp = curl_exec($ch);
        curl_close($ch);
        $resp = json_decode($resp);

        if ($resp->ok) {
            $invoice_id = $resp->result->invoice_id;
            if (isset($promo) && trim($promo) == '') {
                $promo = 0;
            }
            mysqli_query($connection,"INSERT INTO `deposits` (`id`,`user_id`,`amount`,`hash_dep`,`invoice_id`,`hash_user`,`system`,`promo`,`status`,`date`) VALUES (NULL,'$user_id','$amount','$hash_dep','$invoice_id','$sid','cryptobot','$promo','0','$date_dep')");

            $link = $resp->result->pay_url;
            echo json_encode(['response' => 'success', 'redirect' => $link]);
        } else {
            echo json_encode(['response' => 'error', 'message' => 'Ошибка']);
        }

    } else {
        echo json_encode(['response' => 'error', 'message' => 'Минимальная сумма депозита ' . $min_sum_dep]);
    }
}else if($_POST['method'] == 'cloudpay'){

    $amount = $_POST['amount'];
    $promo = $_POST['promoDeposit'];
    $date_dep = date("d.m.Y H:i:s");

    if ($amount >= $min_sum_dep) {

        if (isset($promo) && trim($promo) != '') {
            $sql_select = "SELECT * FROM `users` WHERE hash='$sid'";
            $result = mysqli_query($connection,$sql_select);
            $row = mysqli_fetch_array($result);
            $user_id = $row['id'];

            $sql_select1 = "SELECT * FROM promo WHERE name='$promo'";
            $result1 = mysqli_query($connection,$sql_select1);
            $row = mysqli_fetch_array($result1);
            if ($row) {
                $idpromo = $row['id'];
                $promo_new = $row['name'];
                $idactive = $row['id_active'];
                $promo_type = $row['type'];
            }

            $sql_select2 = "SELECT * FROM promo_log WHERE promo_id='$idpromo' and user_id ='$user_id'";
		    $result2 = mysqli_query($connection,$sql_select2) or die(mysqli_error($connection));
		    $row2 = mysqli_fetch_array($result2);
		    if ($row2) {
			    exit(json_encode(['response' => 'error', 'message' => 'Вы уже активировали данный промо-код!']));
		    }

            if (empty($promo_new)) {
                exit(json_encode(['response' => 'error', 'message' => 'Промокод не найден']));
            }

            if ($promo_type != 'deposit') {
                exit(json_encode(['response' => 'error', 'message' => 'Это не промо к депозиту']));
            }
        }

        $apiToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1dWlkIjoiTmpjeU5qWT0iLCJ0eXBlIjoicHJvamVjdCIsInYiOiI2MDc3MTM0OWVlZjQxMzgxMDExOWI1YmY1ZWEwNzI3NGM4MWMzOTM5YjkwZDYzZDVmZmM2ZjZlMGNlNjIwNzg0IiwiZXhwIjo4ODE1NTExMTE0Mn0.cowc-J82PAQ4eQ0TOYcCq5mlNx953zqhi-e55zj-k5M';
        $shop_id = 'PXfngSToCBiU5OJv';

        $hash_dep = md5(microtime(true));

        mysqli_query($connection,"INSERT INTO `deposits` (`user_id`,`amount`,`hash_dep`,`hash_user`,`system`,`promo`,`status`,`date`) VALUES ('$user_id','$amount','$hash_dep','$sid','cloudpay','$promo','0','$date_dep')");
        $new_deposit_id = mysqli_insert_id($connection);

        $invoiceData = [
            'shop_id' => $shop_id,
            'amount' => $amount,
            'order_id' => $new_deposit_id,
            //'currency' => 'RUB',
        ];

        $createInvoice = sendRequest($apiToken, "invoice/create", "POST", $invoiceData);
        if($createInvoice && $createInvoice['status'] == 'success'){
            $invoice_id =  $createInvoice['result']['uuid'];
            mysqli_query($connection,"UPDATE deposits SET invoice_id = '$invoice_id' WHERE id = '$new_deposit_id'");
            $link = $createInvoice['result']['link'];
            echo json_encode(['response' => 'success', 'redirect' => $link]);
        }else{
            echo json_encode(['response' => 'error', 'message' => 'Ошибка создания счета!']);
        }

    } else {
        echo json_encode(['response' => 'error', 'message' => 'Минимальная сумма депозита ' . $min_sum_dep]);
    }

}

function sendRequest($apiKey, $endpoint, $method = "POST", $payload = null) {
    $url = 'https://api.cryptocloud.plus/v2/' . $endpoint;
    $headers = [
        "Authorization: Token " . $apiKey,
        "Content-Type: application/json"
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    if ($payload !== null) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        throw new Exception(curl_error($ch));
    }
    curl_close($ch);

    return json_decode($response, true);
}

