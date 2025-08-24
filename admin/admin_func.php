<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require (dirname(__DIR__, 1)."/system/config.php");
$sid = $_SESSION['hash'];
$type = $_POST['type'];
$error = 0;
$fa = "";
$admin_check = "SELECT * FROM users WHERE hash = '$sid'";
$result_admin = mysqli_query($connection,$admin_check);
$row = mysqli_fetch_array($result_admin);
if($row)
{
$check_adm = $row['admin'];
}






if($type == "fakeChatMessage") {
  $fakemessage = $_POST['fakemessage'];

if($check_adm != 1) {
  $error = 1;
  $mess = "Вы не являетесь администратором";
  $fa = "error";
}

  if($check_adm == 1) {

$f_contentsph = file("additionally/rdnchatimg.txt");
$lineph = $f_contentsph[rand(0, count($f_contentsph) - 1)];

$f_contentslog = file("additionally/rdnchatlogin.txt");
$linelog = $f_contentslog[rand(0, count($f_contentslog) - 1)];

$loginfake = '<span style="color: #ffc943;font-weight: 600">' . $linelog . '</span>';


$query1 = mysqli_query($connection,"INSERT INTO `chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$loginfake','$lineph','$fakemessage','https://vk.com/','none')");



    $fa = "success";
  }
  $result = array(
    'success' => "$fa",
	'error' => "$mess"
    );
}





if($type == "responseTicket") {
  $ticket_id = $_POST['ticket_id'];
  $ticket_mess = $_POST['ticket_mess'];

if($check_adm != 1) {
  $error = 1;
  $mess = "Вы не являетесь администратором";
  $fa = "error";
}

  if($check_adm == 1) {

$update_sql1 = "Update support set system_msg = '$ticket_mess', status = 2 WHERE id='$ticket_id'";
      mysqli_query($connection,$update_sql1);

    $fa = "success";
  }
  $result = array(
    'success' => "$fa",
	'error' => "$mess"
    );
}

if($type == "resetWager") {
  $user_id_selected = $_POST['user_id_selected'];

if($check_adm != 1) {
  $error = 1;
  $mess = "Вы не являетесь администратором";
  $fa = "error";
}

  if($check_adm == 1) {

    $update_config_1 = "Update users set wager = '0' WHERE id = '$user_id_selected'";
      mysqli_query($connection,$update_config_1);

    $fa = "success";
  }
  $result = array(
    'success' => "$fa",
	'error' => "$mess"
    );
}

if($type == "save_edit") {
  $newsitename = $_POST['sitename'];
  $newsitedomen = $_POST['sitedomen'];
  $newsitegroup = $_POST['sitegroup'];
  $newsitesupport = $_POST['sitesupport'];
  $newminwithdraw = $_POST['min_withdraw_sum'];
  $newcoefbonwag = $_POST['coefbon1wag'];
  $newcoefdepwag = $_POST['coefdep1wag'];
  $depwithdraw = $_POST['dep_withdraw'];
  $mindep = $_POST['min_deposit'];
  $token = $_POST['token_vk'];
  $idgroup = $_POST['id_vk'];
  $fkid = $_POST['fkid'];
  $fks1 = $_POST['fks1'];
  $fks2 = $_POST['fks2'];
  $vkgoupid = $_POST['vkgoupid'];
  $vkgrouptoken = $_POST['vkgrouptoken'];
  $tehworks = $_POST['tehworks'];
  $grecaptchakeys = $_POST['grecaptchakeys'];
  $minbet = $_POST['minbet'];
  $maxbet = $_POST['maxbet'];
  $daily_min = $_POST['daily_min'];
  $daily_max = $_POST['daily_max'];
  $vkgroupsize = $_POST['vkgroupsize'];
  $vkrepostsize = $_POST['vkrepostsize'];
  $coefpromwag = $_POST['coefpromwag'];
  $withdraw_min_sbp = $_POST['withdraw_min_sbp'];
  $withdraw_min_fkwallet = $_POST['withdraw_min_fkwallet'];
  $bbmaxbet = $_POST['bbmaxbet'];
  $wager_for_bets = $_POST['wager_for_bets'];

if($check_adm != 1) {
  $error = 1;
  $mess = "Вы не являетесь администратором";
  $fa = "error";
}

  if($check_adm == 1) {

    $update_config_1 = "Update config set sitename = '$newsitename'";
      mysqli_query($connection,$update_config_1);
    $update_config_2 = "Update config set sitedomen = '$newsitedomen'";
      mysqli_query($connection,$update_config_2);
    $update_config_3 = "Update config set sitegroup = '$newsitegroup'";
      mysqli_query($connection,$update_config_3);
    $update_config_4 = "Update config set sitesupport = '$newsitesupport'";
      mysqli_query($connection,$update_config_4);
    $update_config_5 = "Update config set min_withdraw_sum = '$newminwithdraw'";
      mysqli_query($connection,$update_config_5);
    $update_config_6 = "Update config set dep_withdraw = '$depwithdraw'";
      mysqli_query($connection,$update_config_6);
    $update_config_7 = "Update config set min_sum_dep = '$mindep'";
      mysqli_query($connection,$update_config_7);
    $update_config_8 = "Update config set token_vk = '$token'";
      mysqli_query($connection,$update_config_8);
    $update_config_9 = "Update config set id_vk = '$idgroup'";
      mysqli_query($connection,$update_config_9);
     $update_config_10 = "Update config set wagerbonus = '$newcoefbonwag'";
      mysqli_query($connection,$update_config_10);
     $update_config_11 = "Update config set wagerdeposit = '$newcoefdepwag'";
      mysqli_query($connection,$update_config_11);
     $update_config_12 = "Update config set fkid = '$fkid'";
      mysqli_query($connection,$update_config_12);
     $update_config_13 = "Update config set fks1 = '$fks1'";
      mysqli_query($connection,$update_config_13);
     $update_config_14 = "Update config set fks2 = '$fks2'";
      mysqli_query($connection,$update_config_14);
     $update_config_15 = "Update config set vkgoupid = '$vkgoupid'";
      mysqli_query($connection,$update_config_15);
     $update_config_16 = "Update config set vkgrouptoken = '$vkgrouptoken'";
      mysqli_query($connection,$update_config_16);
     $update_config_17 = "Update config set tehworks = '$tehworks'";
      mysqli_query($connection,$update_config_17);
     $update_config_18 = "Update config set grecaptcha = '$grecaptchakeys'";
      mysqli_query($connection,$update_config_18);
     $update_config_19 = "Update config set minbet = '$minbet'";
      mysqli_query($connection,$update_config_19);
     $update_config_20 = "Update config set maxbet = '$maxbet'";
      mysqli_query($connection,$update_config_20);
     $update_config_21 = "Update config set daily_min = '$daily_min'";
      mysqli_query($connection,$update_config_21);
     $update_config_22 = "Update config set daily_max = '$daily_max'";
      mysqli_query($connection,$update_config_22);
     $update_config_23 = "Update config set vkgroupsize = '$vkgroupsize'";
      mysqli_query($connection,$update_config_23);
     $update_config_24 = "Update config set vkrepostsize = '$vkrepostsize'";
      mysqli_query($connection,$update_config_24);
     $update_config_25 = "Update config set wagerpromo = '$coefpromwag'";
      mysqli_query($connection,$update_config_25);
     $update_config_26 = "Update config set bonusbuy_game_maxbet = '$bbmaxbet'";
      mysqli_query($connection,$update_config_26);
     $update_config_27 = "Update config set wager_for_bets = '$wager_for_bets'";
      mysqli_query($connection,$update_config_27);


//config_wallet
     $update_config_wallet_1 = "Update config_wallet set withdraw_min_sbp = '$withdraw_min_sbp'";
      mysqli_query($connection,$update_config_wallet_1);
     $update_config_wallet_2 = "Update config_wallet set withdraw_min_fkwallet = '$withdraw_min_fkwallet'";
      mysqli_query($connection,$update_config_wallet_2);

    $fa = "success";
  }
  $result = array(
    'success' => "$fa",
	'error' => "$mess"
    );
}

if($type == "editstatus") {
$id_edit = $_POST['id_edit'];
$id_user = $_POST['id_user'];
$usersum = $_POST['id_sum'];


$fsdfsdf = ($usersum * 100) / 95;

$status = $_POST['status'];
if($check_adm == 1) {
if($status == "error") {
$update_sql2 = "Update withdraws set status = 2 WHERE id='$id_edit'";
      mysqli_query($connection,$update_sql2);

$update_sql2 = "Update users set balance = balance + $fsdfsdf WHERE id='$id_user'";
      mysqli_query($connection,$update_sql2);

$fa = "success";
}
if($status == "succes") {
$update_sql2 = "Update withdraws set status = 1 WHERE id='$id_edit'";
      mysqli_query($connection,$update_sql2);
$fa = "success";
}

if($status == "procces") {
$update_sql2 = "Update withdraws set status = 3 WHERE id='$id_edit'";
      mysqli_query($connection,$update_sql2);
$fa = "success";
}
}
  $result = array(
    'success' => "$fa",
	'error' => "$mess"
    );
}
if($type == "creatpromo") {
$name = $_POST['promoname'];
$sum = $_POST['promosum'];
$act = $_POST['promoact'];
$type = $_POST['promotype'];
$dpromo = strlen($name);
$check = "SELECT COUNT(*) FROM promo WHERE name = '$name'";
$result = mysqli_query($connection,$check);
$row = mysqli_fetch_array($result);
if($row)
{
$countprom = $row['COUNT(*)'];
}
$dpromo = strlen($name);
if($countprom > 0) {
  $error = 1;
  $mess = "Такой промокод уже существует";
  $fa = "error";
}
if($name == '' || $sum == '' || $act == '') {
  $error = 2;
  $mess = "Заполните все поля";
  $fa = "error";
}
  if($check_adm != 1) {
  $error = 3;
  $mess = "Вы не являетесь администратором";
  $fa = "error";
}
  if($dpromo < 1) {
    $error = 4;
    $mess = "Длина промокода от 1 символа";
    $fa = "error";
}
  if(!is_numeric($sum)) {
    $error = 5;
    $mess = "Введите сумму корректно";
    $fa = "error";
}
  if(!is_numeric($act)) {
    $error = 6;
    $mess = "Введите кол-во корректно";
    $fa = "error";
}
  if($sum < 1) {
    $error = 7;
    $mess = "Сумма промокода от 1";
    $fa = "error";
}
  if($act < 1) {
    $error = 8;
    $mess = "Кол-во от 1";
    $fa = "error";
}
  if($dpromo > 15) {
    $error = 9;
    $mess = "Длина промокода до 15 символов";
    $fa = "error";
}
  if($error == 0) {
    $datas = date("d.m.Y");
	$datass = date("H:i:s");
	$data = "$datas $datass";
    $insert_sql111 = "INSERT INTO `promo` (`id`, `date`,  `name`, `sum`, `active`, `actived`, `type`) VALUES (NULL, '$data', '$name', '$sum', '$act', '0', '$type');";
     mysqli_query($connection,$insert_sql111);
    $fa = "success";
  }
  $result = array(
    'success' => "$fa",
	'error' => "$mess",
    'promoname' => "$name"
    );
}
if($type == "saveInfo") {
$id = $_POST['id'];
$new_log = $_POST['username'];
$freespins = $_POST['freespins'];
$new_bal = $_POST['userbal'];
$podkrutka = $_POST['podkrutka'];
$is_yt = $_POST['is_yt'];
$ban_user = $_POST['ban_user'];
$lock_save_user = $_POST['lock_save_user'];

if($check_adm != 1) {
  $error = 1;
  $mess = "Вы не являетесь администратором";
  $fa = "error";
}
  if($check_adm == 1) {

$update_sql112 = "Update users set podkrut = '$podkrutka', is_yt='$is_yt' WHERE id='$id'";
mysqli_query($connection,$update_sql112);

$update_sql1 = "Update users set login = '$new_log', freespins = '$freespins' WHERE id='$id'";
      mysqli_query($connection,$update_sql1);
$update_sql3 = "Update users set balance = '$new_bal' WHERE id='$id'";
      mysqli_query($connection,$update_sql3);
$update_sql3 = "Update users set ban = '$ban_user' WHERE id='$id'";
      mysqli_query($connection,$update_sql3);
$update_sql3 = "Update users set lock_save = '$lock_save_user' WHERE id='$id'";
      mysqli_query($connection,$update_sql3);


    $fa = "success";
  }

    $result = array(
    'success' => "$fa",
	'error' => "$mess",
	'log' => "$login",
	'pass' => "$pass",
    'bal' => "$balance",
    'id' => "$id"

    );

}
if($type == "getInfo") {
  $id = $_POST['id'];
  $selecter = "SELECT * FROM users WHERE id = '$id'";
$result_select = mysqli_query($connection,$selecter);
$row = mysqli_fetch_array($result_select);
if($row)
{
$login = $row['login'];
$pass = $row['pass'];
$balance = $row['balance'];
}
  if($check_adm == 1) {
    $fa = "success";
  }

    $result = array(
    'success' => "$fa",
	'error' => "$mess",
	'log' => "$login",
	'pass' => "$pass",
    'bal' => "$balance",
    'id' => "$id"

    );

}
if($type == "ban") {
$hash_ban = $_POST['hashuser'];
if($check_adm != 1) {
$error = 1;
$mess = "Вы не являетесь администратором";
$fa = "error";
}
if($check_adm == 1) {
$update_sql4 = "Update users set ban=1 WHERE id='$hash_ban'";
      mysqli_query($connection,$update_sql4);
  $fa = "success";
}
$result = array(
	'success' => "$fa",
	'error' => "$mess"
    );
}

if($type == "unban") {
$hash_ban = $_POST['hashuser'];
if($check_adm != 1) {
$error = 1;
$mess = "Вы не являетесь администратором";
$fa = "error";
}
if($check_adm == 1) {
$update_sql4 = "Update users set ban=0 WHERE id='$hash_ban'";
      mysqli_query($connection,$update_sql4);
  $fa = "success";
}
$result = array(
	'success' => "$fa",
	'error' => "$mess"
    );

}

if($type == "del_promo") {
$id_promo = $_POST['id_promo'];
if($check_adm == 1) {

$update_sql2 = "DELETE FROM promo WHERE id='$id_promo'";
      mysqli_query($connection,$update_sql2);
$fa = "success";

}
  $result = array(
    'success' => "$fa",
	'error' => "$mess"
    );
}

if($type == "creategift") {
$giftname = $_POST['giftname'];
$prize = $_POST['giftprize'];
$maxusers = $_POST['giftmaxusers'];

$dpromo = strlen($giftname);

$check = "SELECT COUNT(*) FROM gift WHERE giftname = '$name'";
$result = mysqli_query($connection,$check);
$row = mysqli_fetch_array($result);
if($row)
{
$countgift = $row['COUNT(*)'];
}
$dpromo = strlen($name);
if($countgift > 0) {
  $error = 1;
  $mess = "Такой айди конкурса уже существует";
  $fa = "error";
}
if($giftname == '' || $prize == '' || $maxusers == '') {
  $error = 2;
  $mess = "Заполните все поля";
  $fa = "error";
}
  if($check_adm != 1) {
  $error = 3;
  $mess = "Вы не являетесь администратором";
  $fa = "error";
}
  if($giftname > 4) {
  $error = 4;
  $mess = "Длина ID не меньше 4 символов";
  $fa = "error";
}
  if($prize < 50) {
  $error = 5;
  $mess = "Приз не может быть меньше 50 рублей";
  $fa = "error";
}
  if($maxusers == NULL) {
  $error = 6;
  $mess = "Кол-во победителей от 1";
  $fa = "error";
}


  if($error == 0) {
    $datas = date("d.m.Y");
	$datass = date("H:i:s");
	$data = "$datas $datass";
    $insert_sql111 = "INSERT INTO `gift` (`id`, `date`,  `giftname`, `prize`, `max_users`, `users`, `id_active`, `status`) VALUES (NULL, '$data', '$giftname', '$prize', '$maxusers', '0', '', '0');";
     mysqli_query($connection,$insert_sql111);
    $fa = "success";
  }
  $result = array(
    'success' => "$fa",
	'error' => "$mess",
    'promoname' => "$name"
    );
}

if($type == "completeGift") {
$name_gift = $_POST['id_gift'];
if($check_adm == 1) {

$update_sql2 = "Update gift set status=1 WHERE id='$name_gift'";
      mysqli_query($connection,$update_sql2);
$fa = "success";

}
  $result = array(
    'success' => "$fa",
	'error' => "$mess"
    );
}




if($type == "sqlclear_games") {

if($check_adm != 1) {
$error = 1;
$mess = "Вы не являетесь администратором";
$fa = "error";
}

if($error == 0) {
$query = mysqli_query($connection,"TRUNCATE `dice`");
$query = mysqli_query($connection,"TRUNCATE `mines-game`");
$fa = "success";

}
  $result = array(
    'success' => "$fa",
	'error' => "$mess"
    );
}

if($type == "sqlclear_chat") {

if($check_adm != 1) {
$error = 1;
$mess = "Вы не являетесь администратором";
$fa = "error";
}

if($error == 0) {
$query = mysqli_query($connection,"TRUNCATE `chat`");
$login = '<span style="color: #ffc943;font-weight: 600">'.$sitename.'</span>';
$mess = '<span style="font-weight: 700">Чат очищен администрацией</span>';
$photo = '../images/logo-mob.png';
$query = mysqli_query($connection,"INSERT INTO `chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/','none')");
$fa = "success";

}
  $result = array(
    'success' => "$fa",
	'error' => "$mess"
    );
}


echo json_encode($result);
?>
