<?php

include('../system/config.php');

/* данные freekassa */
$merchant_id = $fkid;
$merchant_secret = $fks2;

/* проверка ip */
function getIP() {
if(isset($_SERVER['HTTP_X_REAL_IP'])) return $_SERVER['HTTP_X_REAL_IP'];
return $_SERVER['REMOTE_ADDR'];
}

if (!in_array(getIP(), array('168.119.157.136', '168.119.60.227', '138.201.88.124', '178.154.197.79', '51.250.54.238', '116.203.217.0', '51.250.25.122'))) die("hacking attempt!");
$sign = md5($merchant_id.':'.$_REQUEST['AMOUNT'].':'.$merchant_secret.':'.$_REQUEST['MERCHANT_ORDER_ID']);
if ($sign != $_REQUEST['SIGN']) {
die('wrong sign');
}

/* данные возвращаемые платежом */
$label = $_GET['MERCHANT_ID']; //айди магазина
$order_id = $_GET['MERCHANT_ORDER_ID']; //айди транзакции в системе
$user_id_pay = $_GET['us_id']; //айди пользователя
$suma = $_GET['AMOUNT']; //сумма платежа
$suma2 = $_GET['AMOUNT']; //сумма платежа (дубль)
$currency_pay = $_GET['CUR_ID']; //метод оплаты

/* проверяем существует ли ордер у платежа и выполняем действия */
if (is_numeric($user_id_pay))
{
/* достаем данные пользователя */
$sql_select = "SELECT * FROM users WHERE id='$user_id_pay'";
$result = mysqli_query($connection,$sql_select);
$row = mysqli_fetch_array($result);
if($row)
{
$balance = $row['balance'];
$ref = $row['ref_id'];
}

/* зачисление РЕФЕРАЛА */
$sql_select = "SELECT * FROM users WHERE id='$ref'";
$result = mysqli_query($connection,$sql_select);
$row = mysqli_fetch_array($result);
if($row)
{
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

$sumaref = ($suma / 100) * $percent_refs; //процент отчисления рефки для рефера
if($ref >= 1)
{
$sql_select = "SELECT * FROM users WHERE id='$ref'";
$result = mysqli_query($connection,$sql_select);
$row = mysqli_fetch_array($result);
if($row)
{
$reefearns = $row['refearn'];
$ref_deps = $row['ref_deps'];
$ref_deps_sum = $row['ref_deps_sum'];

$ref_deps_all = $ref_deps + 1;
$ref_deps_sum_all = $ref_deps_sum + $suma;

$erarn = $reefearns+$sumaref;
$balanceref = $row['balance'];
$balancerefs = $balanceref + $sumaref;
$update_sql1 = "Update users set balance='$balancerefs', refearn='$erarn', ref_deps='$ref_deps_all', ref_deps_sum='$ref_deps_sum_all' WHERE id='$ref'";
mysqli_query($connection,$update_sql1) or die("" . mysqli_error());


        $data_refeer = date("d.m H:i");
        $insert_sql1 = "
        INSERT INTO `referal_details` (`user_id`, `type`, `sum`, `data`)
        VALUES ('{$ref}', 'dep', '$sumaref', '{$data_refeer}')";
        mysqli_query($connection,$insert_sql1);

}
}

/* если заявка оплачена то зачисляем платеж пользователю*/

/* бонус к депозиту через СБП */
if($currency_pay == 42){
$suma = ($suma / 100) * 105; //%% к депозиту бонус
}else{
$suma = $suma;
}

$balancenew = $balance + $suma;
$sumawag = $suma * $coefdeposit;

$update_sql1 = "Update users set balance='$balancenew', wager = wager+$sumawag WHERE id='$user_id_pay'";
mysqli_query($connection,$update_sql1);

/* если заявка оплачена то обновляеем статус платежа*/
$update_pay_sql = "Update deposits set status = 1 WHERE transaction='$order_id'";
mysqli_query($connection,$update_pay_sql);

/* если заявкка оплачена то добавляем пользователю кешбек в аккаунт */

$getDepsForLevel = "SELECT SUM(amount) FROM deposits WHERE user_id='$user_id_pay' AND status ='1'";
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

$cashbacksum = ($suma2 / 100) * $cashback_rankt;
$update_pay_sql = "UPDATE users SET cashback = cashback + $cashbacksum WHERE id='$user_id_pay'";
mysqli_query($connection,$update_pay_sql);


}

    die('OK');
?>
