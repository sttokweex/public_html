<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}



$sid = $_SESSION['hash'];
require("system/config.php");
$type = $_POST['type'];
$error = 0;
$fa = '';
$mess = '';
$balancenew = '';
$randomb = '';
$sql_select = "SELECT * FROM `users` WHERE hash='$sid'";
$result = mysqli_query($connection, $sql_select);
$row = mysqli_fetch_array($result);
$idsdfsdfsdf = $row['id'];
$getDepsForLevel = "SELECT SUM(amount) FROM deposits WHERE user_id='$idsdfsdfsdf'";
$getDepsForLevel2 = mysqli_query($connection, $getDepsForLevel);
$leveldeposits = mysqli_fetch_array($getDepsForLevel2);
$depositesSsadasdasdID = $leveldeposits['SUM(amount)'];

if ($type == "minesnew") {
    //  $id = $_POST['id'];
    $arr = [];
    $sql_select = "SELECT * FROM `users` WHERE hash='$sid'";
    $result = mysqli_query($connection, $sql_select);
    $row = mysqli_fetch_array($result);
    $id = $row['id'];
    $sql_select = "SELECT * FROM `mines` WHERE id_users='$id' and onOff = '1'";
    $result = mysqli_query($connection, $sql_select);
    $row = mysqli_fetch_array($result);
    $bet = $row['bet'];
    $win = $row['win'];
    $mines = unserialize($mines);
    $click = $row['click'];
    $click = unserialize($click);
    $click = array_map('intval', $click);
    $caef = $win / $bet;
    $mines = json_encode($mines);
    $click = json_encode($click);
    $result = array(
        'success' => "success",
        'mines_id' => "$id",
        'bet' => "$bet",
        'win' => "$win",
        'click' => $click,
    );
}
////////////////////////////////////////////
if ($type == "autoselect_mines") {
    $sql_select = "SELECT * FROM `users` WHERE hash='$sid'";
    $result = mysqli_query($connection, $sql_select);
    $row = mysqli_fetch_array($result);
    $id = $row['id'];
    $query = ("SELECT * FROM `mines` WHERE id_users = '$id' AND onOff = '1'");
    $result = mysqli_query($connection, $query);
    $games = mysqli_fetch_array($result);

    if ($games) {
        $click = $games['click'];
        $click = unserialize($click);
        $select = mt_rand(1, 25);

        if (in_array($select, $click)) {

            while (in_array($select, $click)) {
                $select = mt_rand(1, 25);
            }
        }

        $result = array(
            'success' => "true",
            'select' => "$select"
        );
    }
}
/////////////////////////////////////////////
if ($type == "createTicket") {

    $typeticket = $_POST['typeticket'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql_select = "SELECT * FROM users WHERE hash='$sid'";
    $result = mysqli_query($connection, $sql_select);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $user_id = $row['id'];
    }

    if (!$typeticket) {
        $error = 1;
        $mess = $translations['select_a_treatment_section'];
        $fa = "error";
    }
    if (!$subject) {
        $error = 2;
        $mess = $translations['enter_the_subject_of_the_request'];
        $fa = "error";
    }
    if (!$message) {
        $error = 3;
        $mess = $translations['enter_the_message_text'];
        $fa = "error";
    }
    if (!$sid) {
        $error = 4;
        $mess = $translations['log_in_to_your_account'];
        $fa = "error";
    }

    if ($error == 0) {
        $hasht = rand(100000000000, 900000000000);
        $data_ticket = date("d.m.Y H:i");
        $insert_sql1 = "
        INSERT INTO `support` (`hash`,`user_id`, `subject`, `message`, `data`, `system_msg`, `type`, `status`)
        VALUES ('{$hasht}', '{$user_id}', '{$subject}', '{$message}', '{$data_ticket}', '', '{$typeticket}', '0')";
        mysqli_query($connection, $insert_sql1);

        $fa = "success";
    }
    $result = array(
        'success' => "$fa",
        'tickethash' => "$hasht",
        'error' => "$mess"
    );
}
/////////////////////////////////////////////
if ($type == "getTicket") {

    $ticket_id = $_POST['ticket_id'];

    $sql_select = "SELECT * FROM users WHERE hash='$sid'";
    $result = mysqli_query($connection, $sql_select);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $current_user_id = $row['id'];
    }

    $sql_select2 = "SELECT * FROM support WHERE hash='$ticket_id'";
    $result2 = mysqli_query($connection, $sql_select2);
    $row = mysqli_fetch_array($result2);
    if ($row) {
        $user_id_ticket = $row['user_id'];
        $ticket_subject = $row['subject'];
        $ticket_user_mess = $row['message'];
        $ticket_sys_mess = $row['system_msg'];
        $ticket_status = $row['status'];
        $ticket_type = $row['type'];
    }

    if ($user_id_ticket != $current_user_id) {
        $error = 1;
        $mess = $translations['you_do_not_have_access_to_this_ticket'];
        $fa = "error";
    }
    if (!$sid) {
        $error = 2;
        $mess = $translations['log_in_to_your_account'];
        $fa = "error";
    }
    if ($error == 0) {
        $fa = "success";
    }
    $result = array(
        'success' => "$fa",
        'ticketid' => "$ticket_id",
        'ticket_subject' => "$ticket_subject",
        'user_mess' => "$ticket_user_mess",
        'system_mess' => "$ticket_sys_mess",
        'status_ticket' => "$ticket_status",
        'type_ticket' => "$ticket_type",
        'error' => "$mess"
    );
}

//
if ($type == "withdrawuser") {
    $sql_select2 = "SELECT * FROM users WHERE hash='$sid'";
    $result2 = mysqli_query($connection, $sql_select2);
    $row = mysqli_fetch_array($result2);
    if ($row) {
        $user_id = $row['id'];
        $login = $row['login'];
        $ban = $row['ban'];
        $balance = $row['balance'];
        $telephone = $row['telephone'];
        $active_w = $row['act_w'];
    }
    $sql_select23 = "SELECT SUM(amount) FROM deposits WHERE user_id='$user_id' AND status = '1'";
    $result23 = mysqli_query($connection, $sql_select23);
    $row = mysqli_fetch_array($result23);
    if ($row) {
        $sumdep = $row['SUM(amount)'];
    }
    if ($sumdep == '') {
        $sumdep = 0;
    }
    $wallet = $_POST['wallet'];
    $sum = $_POST['sum'];
    $systemw = $_POST['system'];
    $sbpnaming = $_POST['sbpbank'];
    $min_sum = $_POST['min_sum'];
    $dwallet = strlen($wallet);


    if ($wallet == '' || $sum == '') {
        $error = 1;
        $mess = $translations['fill_in_all_the_fields'];
        $fa = "error";
    }
    if ($sum > $balance) {
        $error = 2;
        $mess = $translations['insufficient_funds'];
        $fa = "error";
    }
    if ($ban == 1) {
        $error = 3;
        $mess = $translations['your_account_is_blocked'];
        $fa = "error";
    }
    if ($sum != '' && $wallet != '') {
        if (!is_numeric($sum)) {
            $error = 4;
            $mess = $translations['enter_the_correct_amount'];
            $fa = "error";
        }
        if ($dwallet < 5 || $dwallet > 20) {
            $error = 5;
            $mess = $translations['wallet_from_5_to_20_characters'];
            $fa = "error";
        }

        if ($sum < $min_sum) {
            $error = 6;
            $mess = $translations['minimum_amount_for_now'] . " " . $min_sum;
            $fa = "error";
        }
        if (!preg_match("#^[aA-zZ0-9\-_.]+$#", $sum)) {
            $mess = $translations['invalid_characters_in_sum'];
            $fa = "error";
            $error = 7;
        }
        if (!preg_match("#^[aA-zZ0-9@\-_.]+$#", $wallet)) {
            $mess = $translations['invalid_characters_in_banking_details'];
            $fa = "error";
            $error = 8;
        }
        if ($sumdep < $dep_withdraw) {
            $mess = $translations['top_up_your_balance_for_withdrawal_of_funds'] . " (" . $dep_withdraw . ")";
            $error = 9;
            $fa = "error";
        }
        if ($wagers > 0) {
            $mess = $wagers . " " . $translations['wager_for_withdraw'];
            $error = 10;
            $fa = "error";
        }
        if ($telephone == NULL) {
            $mess = $translations['link_the_phone_number_in_your_profile_settings'];
            $error = 11;
            $fa = "error";
        }
        if ($systemw == NULL) {
            $mess = $translations['choose_a_payment_system'];
            $error = 12;
            $fa = "error";
        }
    }
    if (!$sid) {
        $error = 25;
        $mess = $translations['log_in_to_your_account'];
        $fa = "error";
    }

    $checkprg = mysqli_query($connection, "SELECT * FROM actived_promo WHERE user_id='$user_id' AND status='0'");
    $num_rowsrg = mysqli_num_rows($checkprg);
    if ($num_rowsrg) {
        $mess = $translations['you_have_an_active_bonus_replace_or_wager_to_get_results'];
        $error = 13;
        $fa = "error";
    }

    if ($error == 0) {
        $summ = round($sum, 2);
        $summnew = $summ * 0.95;
        $newbalance = $balance - $sum;
        $datas = date("d.m.Y");
        $datass = date("H:i:s");
        $data = "$datas $datass";
        $insert_sql11 = "INSERT INTO `withdraws` (`id`, `user_id`, `ps`, `wallet`, `sum`, `date`, `status`, `banksbp`) VALUES (NULL, '$user_id', '$systemw', '$wallet', '$summnew', '$data', '0', '$sbpnaming');";
        mysqli_query($connection, $insert_sql11);
        $update_sql1 = "UPDATE users SET balance = '$newbalance', act_w = '1' WHERE hash = '$sid'";
        mysqli_query($connection, $update_sql1);
        $fa = "success";
    }

    $result = array(
        'success' => "$fa",
        'error' => "$mess",
        'balance' => "$balance",
        'new_balance' => "$newbalance"
    );
}
/////////////////////////////////////////////
if ($type == "deletewithdraw") {
    $id_delete = $_POST['del'];
    $sql_select2 = "SELECT * FROM users WHERE hash='$sid'";
    $result2 = mysqli_query($connection, $sql_select2);
    $row = mysqli_fetch_array($result2);
    if ($row) {
        $user_id = $row['id'];
        $login = $row['login'];
        $ban = $row['ban'];
        $balance = $row['balance'];
    }
    $sql_select3 = "SELECT * FROM withdraws WHERE id='$id_delete'";
    $result3 = mysqli_query($connection, $sql_select3);
    $row = mysqli_fetch_array($result3);
    if ($row) {
        $user_id_w = $row['user_id'];
        $sum = $row['sum'];
        $status = $row['status'];
    }
    if ($status != 0) {
        $error = 1;
        $mess = "";
        $fa = "error";
    }
    if ($user_id != $user_id_w) {
        $error = 2;
        $mess = $translations['error_connecting_to_server'];
        $fa = "error";
    }
    if (!$sid) {
        $error = 25;
        $mess = $translations['log_in_to_your_account'];
        $fa = "error";
    }
    if ($error == 0) {
        $delete = "DELETE FROM `withdraws` WHERE id = '$id_delete'";
        mysqli_query($connection, $delete);
        $summsa = ($sum * 100) / 95;
        $newbalance = $balance + $summsa;
        $update_sql1 = "UPDATE users SET balance = '$newbalance', act_w = '0' WHERE hash = '$sid'";
        mysqli_query($connection, $update_sql1);
        $fa = "success";
    }
    $result = array(
        'success' => "$fa",
        'error' => "$mess",
        'balance' => "$balance",
        'new_balance' => "$newbalance"
    );
}
/////////////////////////////////////////////
if ($type == "vkRepost") {
    $sql_select = "SELECT * FROM users WHERE hash='$sid'";
    $result = mysqli_query($connection, $sql_select);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $balance = $row['balance'];
        $vbonus1 = $row['vkrep'];
    }
    if ($depositesSsadasdasdID < 5000) {
        $error = 5;
        $mess = $translations['the_amount_of_deposits_for_all_time_must_be_more_than_5000$'];
        $fa = "error";
    }
    if ($vbonus1 == 1) {
        $error = 1;
        $fa = "error";
        $mess = $translations['you_have_already_received_a_bonus_for_reposting'];
    }
    if (!$sid) {
        $error = 2;
        $mess = $translations['log_in_to_your_account'];
        $fa = "error";
    }
    if ($error == 0) {
        $randomb = 0;
        $balancenew = $balance + 500;
        $summavkre = $randomb * $coefbonus;
        $vkbonusrep = $wagers + $summavkre;
        $update_sql = "Update users set balance='$balancenew', wager='$vkbonusrep' WHERE hash='$sid'";
        mysqli_query($connection, $update_sql) or die("Ошибка вставки" . mysqli_error($connection));
        $update_sql12 = "Update users set vkrep='1' WHERE hash='$sid'";
        mysqli_query($connection, $update_sql12) or die("Ошибка вставки" . mysqli_error($connection));
        $fa = "success";
    }
    $result = array(
        'success' => "$fa",
        'error' => "$mess",
        'balance' => "$balance",
        'new_balance' => "$balancenew",

    );
}
/////////////////////////////////////////////
if ($type == "vkBonus") {
    $sql_select = "SELECT * FROM users WHERE hash='$sid'";
    $result = mysqli_query($connection, $sql_select);
    $row = mysqli_fetch_array($result);

    if ($row) {
        $balance = $row['balance'];
        $vk = $row['social'];
        $vbonus = $row['vkb'];
    }
    if ($depositesSsadasdasdID  < 1000) {
        $error = 5;
        $mess = $translations['the_amount_of_deposits_for_all_time_must_be_more_than_1000$'];
        $fa = "error";
    }
    if ($vbonus == 1) {
        $error = 1;
        $fa = "error";
        $mess = $translations['you_have_already_received_a_bonus'];
    }
    $vk_id = substr($vk, -9);


    if (!$sid) {
        $error = 5;
        $mess = $translations['log_in_to_your_account'];
        $fa = "error";
    }
    if ($error == 0) {
        $randomb = 0;
        $balancenew = $balance + 100;
        $summavksub = $randomb * $coefbonus;
        $vkbonussubs = $wagers + $summavksub;
        $update_sql = "Update users set balance='$balancenew', wager='$vkbonussubs' WHERE hash='$sid'";
        mysqli_query($connection, $update_sql) or die("Ошибка вставки" . mysqli_error($connection));
        $update_sql1 = "Update users set vkb='1' WHERE hash='$sid'";
        mysqli_query($connection, $update_sql1) or die("Ошибка вставки" . mysqli_error($connection));
        $fa = "success";
    }
    $result = array(
        'success' => "$fa",
        'error' => "$mess",
        'balance' => "$balance",
        'new_balance' => "$balancenew",

    );
}
if ($type == "vkBonsdfus") {
    $sql_select = "SELECT * FROM users WHERE hash='$sid'";
    $result = mysqli_query($connection, $sql_select);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $balance = $row['balance'];
        $vk = $row['social'];
        $vbonus = $row['tgg'];
    }
    if ($depositesSsadasdasdID < 100) {
        $error = 5;
        $mess = $translations['the_amount_of_deposits_for_all_time_must_be_more_than_100$'];
        $fa = "error";
    }
    if ($vbonus == 1) {
        $error = 1;
        $fa = "error";
        $mess = $translations['you_have_already_received_a_bonus'];
    }
    $vk_id = substr($vk, -9);


    if (!$sid) {
        $error = 5;
        $mess = $translations['log_in_to_your_account'];
        $fa = "error";
    }
    if ($error == 0) {
        $randomb = 0;
        $balancenew = $balance + 10;
        $summavksub = $randomb * $coefbonus;
        $vkbonussubs = $wagers + $summavksub;
        $update_sql = "Update users set balance='$balancenew', wager='$vkbonussubs' WHERE hash='$sid'";
        mysqli_query($connection, $update_sql) or die("Ошибка вставки" . mysqli_error($connection));
        $update_sql1 = "Update users set tgg='1' WHERE hash='$sid'";
        mysqli_query($connection, $update_sql1) or die("Ошибка вставки" . mysqli_error($connection));
        $fa = "success";
    }
    $result = array(
        'success' => "$fa",
        'error' => "$mess",
        'balance' => "$balance",
        'new_balance' => "$balancenew",
    );
}
/////////////////////////////////////////////
if ($type == "deposit") {
    $system = $_POST['system'];
    $summa = $_POST['sum'];
    $sql_select = "SELECT * FROM users WHERE hash='$sid'";
    $result = mysqli_query($connection, $sql_select);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $bala = $row['balance'];
        $user_id = $row['id'];
    }

    if ($system == NULL) {
        $error = 1;
        $mess = $translations['select_replenishment_system'];
        $fa = "error";
    }
    if ($summa == NULL) {
        $error = 2;
        $mess = $translations['enter_amount'];
        $fa = "error";
    }
    if ($summa < $min_sum_dep) {
        $error = 3;
        $mess = $translations['min_sum'] . " " . $min_sum_dep;
        $fa = "error";
    }
    if ($fks1 == NULL) {
        $error = 4;
        $mess = $translations['secret_word_1_is_not_specified'];
        $fa = "error";
    }
    if ($fkid == NULL) {
        $error = 5;
        $mess = $translations['cash_register_ID_not_specified'];
        $fa = "error";
    }
    if (!$sid) {
        $error = 25;
        $mess = $translations['log_in_to_your_account'];
        $fa = "error";
    }

    if ($system == 'sbp') {
        $systemfk = '42';
    }
    if ($system == 'fkwallet') {
        $systemfk = '1';
    }
    if ($system == 'allbanks') {
        $systemfk = '13';
    }
    if ($system == 'usdt') {
        $systemfk = '15';
    }

    if ($error == 0) {

        $data_pay = date("d.m.Y H:i");

        $order_idd = rand(100000000000, 900000000000);

        $currency = 'RUB';
        $us_id = $user_id;




        $m_id = '';
        $m_secret_1 = '';
        $amount = $summa;
        $order_id = $order_idd;
        $sign = md5($m_id . '|' . $m_secret_1 . '|' . $amount . '|' . $order_id);

        $link = "https://linepay.fun/pay?order_id=" . $order_id . "&m_id=" . $m_id . "&amount=" . $amount . "&us_key=" . $us_id . "&sign=" . $sign;






        $insert_sql1 = "
INSERT INTO `deposits` (`user_id`, `amount`, `data`, `transaction`, `method`, `status`)
VALUES ('{$us_id}', '{$summa}', '{$data_pay}', '{$order_idd}', '{$system}', '0')
";
        mysqli_query($connection, $insert_sql1);

        $fa = "success";
    }
    $result = array(
        'success' => "$fa",
        'locations' => "$link",
        'error' => "$mess"
    );
}


/////////////////////////////////////////////
if ($type == "bonus") {
    $selecter1 = "SELECT * FROM users WHERE hash = '$sid'";
    $result4 = mysqli_query($connection, $selecter1);
    $row = mysqli_fetch_array($result4);
    if ($row) {
        $id = $row['id'];
    }
    $time = intval(time());
    $sql_select = "SELECT * FROM users WHERE hash='$sid'";
    $result = mysqli_query($connection, $sql_select);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $bonus = intval($row['bdate']);
        $balance = $row['balance'];
        $vk = $row['social'];
    }
    $vk_id = substr($vk, -9);
    $seconds = $time - $bonus;
    $seconds = 86400 - $seconds;
    $minutes = floor($seconds / 60);
    $hours = floor($minutes / 60);
    $minutes = $minutes - ($hours * 60);
    if (!$sid) {
        $error = 5;
        $mess = $translations['log_in_to_your_account'];
        $fa = "error";
    }
    if ($time - $bonus > 86400) {
        if ($error == 0) {
            $randomb = rand($min_daily_size, $max_daily_size);
            $balancenew = $balance + $randomb;
            $summadailywag = $randomb * $coefbonus;
            $wagerdaily = $wagers + $summadailywag;
            $update_sql = "Update users set balance='$balancenew', wager='$wagerdaily'  WHERE hash='$sid'";
            mysqli_query($connection, $update_sql) or die("Insertion error" . mysqli_error($connection));
            $update_sql1 = "Update users set bdate='$time' WHERE hash='$sid'";
            mysqli_query($connection, $update_sql1) or die("Insertion error" . mysqli_error($connection));
            $fa = "success";
        }
    } else {
        $error = 1;
        $fa = "error";
        $mess = "Wait $hours hours";
    }
    $result = array(
        'success' => "$fa",
        'error' => "$mess",
        'balance' => "$balance",
        'new_balance' => "$balancenew",
        'bonussize' => "$randomb"
    );
}
//
if ($type == "sendmoney") {
    $playerid = $_POST['playerid'];
    $playersum = $_POST['playersum'];
    $sql_select = "SELECT * FROM users WHERE hash='$sid'";
    $result = mysqli_query($connection, $sql_select);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $bala = $row['balance'];
        $user_id = $row['id'];
    }
    $deposits1 = "SELECT COUNT(*) FROM users WHERE id='$playerid'";
    $resultDes = mysqli_query($connection, $deposits1);
    $rowcon = mysqli_fetch_array($resultDes);

    $sql_select23 = "SELECT SUM(amount) FROM deposits WHERE user_id='$user_id'";
    $result23 = mysqli_query($connection, $sql_select23);
    $row = mysqli_fetch_array($result23);
    if ($row) {
        $sumdep = $row['SUM(amount)'];
    }
    if ($sumdep == '') {
        $sumdep = 0;
    }

    if ($sumdep < $dep_for_send) {
        $error = 1;
        $mess = $translations['transfers_become_available_after_making_a_minimum_deposit_of'] . " " . $dep_for_send;
        $fa = "error";
    }
    if ($rowcon['COUNT(*)'] == 0) {
        $error = 2;
        $mess = $translations['player_not_found'];
        $fa = "error";
    }
    if ($playerid == NULL) {
        $error = 3;
        $mess = $translations['chose_id_player'];
        $fa = "error";
    }
    if ($playersum == NULL) {
        $error = 4;
        $mess = $translations['chose_sum'];
        $fa = "error";
    }

    if ($playersum < 10) {
        $error = 5;
        $mess = $translations['transfer_amount_starting_from_10_coins'];
        $fa = "error";
    }
    if ($playersum > 1000) {
        $error = 6;
        $mess = $translations['transfer_amount_over_from_100_coins'];
        $fa = "error";
    }
    if ($playerid == $user_id) {
        $error = 7;
        $mess = $translations['you_cant_translate_to_yourself'];
        $fa = "error";
    }
    if (!$sid) {
        $error = 8;
        $mess = $translations['log_in_to_your_account'];
        $fa = "error";
    }
    $sql_select22222 = "SELECT * FROM users WHERE id='$playerid'";
    $result22222222 = mysqli_query($connection, $sql_select22222);
    $row = mysqli_fetch_array($result22222222);

    if ($row) {
        $bala2 = $row['balance'];
    }
    if ($error == 0) {
        $playersum = round($playersum, 2);
        $balancesend = $bala - $playersum;
        $playersum2 = $playersum / 100 * 95;
        $newbalance2 = $bala2 + $playersum2;
        $update_sql1 = "UPDATE users SET balance = '$balancesend' WHERE hash = '$sid'";
        mysqli_query($connection, $update_sql1);
        $update_sql1 = "UPDATE users SET balance = '$newbalance2' WHERE id = '$playerid'";
        mysqli_query($connection, $update_sql1);
        $update_sql1 = "UPDATE users SET total_send = total_send + $playersum WHERE hash = '$sid'";
        mysqli_query($connection, $update_sql1);
        $fa = "success";
    }
    $result = array(
        'success' => "$fa",
        'new_balance' => "$balancesend",
        'send_id' => "$playerid",
        'send_sum' => "$playersum",
        'error' => "$mess"
    );
}
/////////////////////////////////////////////
if ($type == "rakeback") {
    $sql_select = "SELECT * FROM users WHERE hash='$sid'";
    $result = mysqli_query($connection, $sql_select);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $rakeback = $row['rakeback'];
        $balance = $row['balance'];
        $id = $row['id'];
    }
    if ($_SESSION['timestamp'] + 1 > time()) {
        $error = 12;
        $fa = "error";
        $mess = $translations['not_so_fast'];
    } else {
        $_SESSION['timestamp'] = time();
    }
    if ($rakeback < 100) {
        $error = 1;
        $mess = $translations['minimum_withdrawal_100_coins'];
        $fa = "error";
    }
    if (!$sid) {
        $error = 15;
        $mess = $translations['log_in_to_your_account'];
        $fa = "error";
    }
    if ($error == 0) {
        $rakeback = round($rakeback, 2);
        $balance = round($balance, 2);
        $newrakeback = $balance + $rakeback;
        $update_sql1 = "UPDATE users SET balance = '$newrakeback' WHERE hash = '$sid'";
        mysqli_query($connection, $update_sql1);
        $update_sql1 = "UPDATE users SET rakeback = '0' WHERE hash = '$sid'";
        mysqli_query($connection, $update_sql1);
        $update_sql1 = "UPDATE users SET total_rakeback = total_rakeback + $rakeback WHERE hash = '$sid'";
        mysqli_query($connection, $update_sql1);

        $data_details = date("d.m H:i");
        $insert_sql1 = "
        INSERT INTO `more_details` (`user_id`, `data`, `suma`, `type`, `note`)
        VALUES ('{$id}', '{$data_details}', '{$rakeback}', 'rakeback', '')";
        mysqli_query($connection, $insert_sql1);

        $fa = "success";
    }
    $result = array(
        'success' => "$fa",
        'rakebacksize' => "$rakeback",
        'new_balance' => "$newrakeback",
        'rakebacknow' => "0",
        'error' => "$mess"
    );
}
/////////////////////////////////////////////
if ($type == "deployPromo") {

    $sql_select2 = "SELECT * FROM users WHERE hash='$sid'";
    $result2 = mysqli_query($connection, $sql_select2);
    $row = mysqli_fetch_array($result2);
    if ($row) {
        $user_id = $row['id'];
        $ban = $row['ban'];
        $balance = $row['balance'];
        $wagers = $row['wager'];
    }
    $promo = $_POST['promoactive'];
    $sql_select = sprintf("SELECT COUNT(*) FROM promo WHERE name='%s'", mysqlI_real_escape_string($connection, $promo));
    $result = mysqli_query($connection, $sql_select);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $count = $row['COUNT(*)'];
    }
    $selectCountActivedBonus1 = "SELECT COUNT(*) FROM actived_promo WHERE user_id='$user_id' ORDER BY id DESC";
    $result_selectCountActivedBonus1 = mysqli_query($connection, $selectCountActivedBonus1);
    $row = mysqli_fetch_array($result_selectCountActivedBonus1);
    if ($row['COUNT(*)'] > 0) {
        $error = 15;
        $mess = $translations['you_already_have_an_active_bonus'];
        $fa = "error";
    }

    if ($balance > 0.99) {
        $error = 1;
        $mess = $translations['your_balance_must_be_less_than_1_coin'];
        $fa = "error";
    }
    if ($promo == '') {
        $error = 2;
        $mess = $translations['enter_promo'];
        $fa = "error";
    }
    if ($count == 0) {
        $error = 3;
        $mess = $translations['promo_expired_or_does_not_exist'];
        $fa = "error";
    }
    if ($count != 0) {
        $sql_select1 = "SELECT * FROM promo WHERE name='$promo'";
        $result1 = mysqli_query($connection, $sql_select1);
        $row = mysqli_fetch_array($result1);
        if ($row) {
            $sum = $row['sum'];
            $limit = $row['active'];
            $actived = $row['actived'];
            $idactive = $row['id_active'];
        }
    }
    if ($count == 1) {
        if ($limit == $actived || $actived > $limit) {
            $error = 3;
            $mess = $translations['activations_for_this_promo_code_have_been_exhausted'];
            $fa = "error";
        }
        if ($ban == 1) {
            $error = 4;
            $mess = $translations['account_is_blocked_activation_of_promo_code_is_not_possible'];
            $fa = "error";
        }
    }
    if (!$sid) {
        $error = 25;
        $mess = $translations['log_in_to_your_account'];
        $fa = "error";
    }
    $checkprg = mysqli_query($connection, "SELECT * FROM now_promo WHERE user_id='$user_id' AND name='$promo'");
    $num_rowsrg = mysqli_num_rows($checkprg);

    if ($num_rowsrg) {
        $error = 5;
        $mess = $translations['you_have_already_activated_this_promo_code'];
        $fa = "error";
    } else {
        if ($error == 0) {

            $sum_wager = $sum * $coefpromo;
            $data = date('d.m.Y H:i:s');

            $update_sql2 = "INSERT INTO `now_promo` (`id`, `name`, `sum`, `wag_start`, `wag_end`, `user_id`, `data`, `status`) VALUES ('', '$promo', '$sum', '0', '$sum_wager', '$user_id', '$data', '0');";
            mysqli_query($connection, $update_sql2);
            $message = "Success";
            $fa = "success";
        }
    }
    $result = array(
        'success' => "$fa",
        'error' => "$mess",
        'mess' => "$message"
    );
}
//

/*
if ($type == "activePromoNew")
{

    $sql_select2 = "SELECT * FROM users WHERE hash='$sid'";
    $result2 = mysqli_query($connection,$sql_select2);
    $row = mysqli_fetch_array($result2);
    if ($row)
    {
        $tp = $row['tp'];
        $user_id = $row['id'];
        $ban = $row['ban'];
        $balance = $row['balance'];
        $wagers = $row['wager'];
        $id = $row['id'];

    }
    $promo = $_POST['promoactive'];
    $sql_select = sprintf("SELECT COUNT(*) FROM promo WHERE name='%s'", mysqlI_real_escape_string($connection,$promo));
    $result = mysqli_query($connection,$sql_select);
    $row = mysqli_fetch_array($result);
    if ($row)
    {
        $count = $row['COUNT(*)'];
        $timep = 3600 - (time() - $tp);
    }

    if ($_SESSION['timestamp'] + 1 > time())
    {
        $error = 12;
        $fa = "error";
        $mess = "Не так быстро";
    }
    else
    {
        $_SESSION['timestamp'] = time();
    }
    $selectCountActivedBonus1 = "SELECT COUNT(*) FROM actived_promo WHERE user_id='$user_id' ORDER BY id DESC";
    $result_selectCountActivedBonus1 = mysqli_query($connection,$selectCountActivedBonus1);
    $row = mysqli_fetch_array($result_selectCountActivedBonus1);
    if ($row['COUNT(*)'] > 0)
    {
        $error = 15;
        $mess = "У вас уже имеется активный бонус!";
        $fa = "error";
    }
    if ($balance > 0.99)
    {
        $error = 6;
        $mess = "Ваш баланс должен быть меньше 1 монеты";
        $fa = "error";
    }
    if ($promo == '')
    {
        $error = 2;
        $mess = "Введите промокод";
        $fa = "error";
    }
    if ($count == 0)
    {
        $delete_proms = ("DELETE FROM `now_promo` WHERE name = '$promo' AND user_id = '$user_id'");
        mysqli_query($connection,$delete_proms);
        $error = 3;
        $mess = "Промокод не найден";
        $fa = "error";
    }
    if ($count != 0)
    {
        $sql_select1 = "SELECT * FROM promo WHERE name='$promo'";
        $result1 = mysqli_query($connection,$sql_select1);
        $row = mysqli_fetch_array($result1);
        if ($row)
        {
            $sum = $row['sum'];
            $limit = $row['active'];
            $actived = $row['actived'];
            $idactive = $row['id_active'];
        }
    }
    if ($count == 1)
    {
        if ($limit == $actived || $actived > $limit)
        {
            $delete_proms = ("DELETE FROM `now_promo` WHERE name = '$promo' AND user_id = '$user_id'");
            mysqli_query($connection,$delete_proms);
            $error = 3;
            $mess = "Активации промокода закончились";
            $fa = "error";
        }
        if ($ban == 1)
        {
            $error = 4;
            $mess = "Ваш аккаунт заблокирован";
            $fa = "error";
        }
    }
    if (preg_match("/$user_id /", $idactive))
    {
        $delete_proms = ("DELETE FROM `now_promo` WHERE name = '$promo' AND user_id = '$user_id'");
        mysqli_query($connection,$delete_proms);
        $error = 5;
        $mess = "Вы уже активировали этот код";
        $fa = "error";
    }



    if (!$sid)
    {
        $error = 25;
        $mess = "Войдите в аккаунт!";
        $fa = "error";
    }
    if ($error == 0)
    {
        $time = time();

        $newbalance = $balance + $sum;
        $newactive = $actived + 1;
        $newid = "$user_id $idactive";
        $sumwaggg = $sum * $coefbonus;
        $wagerpromo = $wagers + $sumwaggg;

        $update_sql1 = "UPDATE users SET balance = '$newbalance' WHERE hash = '$sid'";
        mysqli_query($connection,$update_sql1);

        $update_sql2 = "UPDATE promo SET actived = '$newactive' WHERE name = '$promo'";
        mysqli_query($connection,$update_sql2);

        $update_sql3 = "UPDATE promo SET id_active = '$newid' WHERE name = '$promo'";
        mysqli_query($connection,$update_sql3);

        $update_sql3 = "UPDATE now_promo SET status = '1' WHERE name = '$promo' AND user_id = '$user_id'";
        mysqli_query($connection,$update_sql3);

        $update_sql3 = "UPDATE users SET total_promo = total_promo + $sum WHERE hash = '$sid'";
        mysqli_query($connection,$update_sql3);

        $sum_wager = $sum * $coefpromo;
        $data = date('d.m.Y H:i:s');
        $update_sql2 = "INSERT INTO `actived_promo` (`id`, `name`, `sum`, `wag_start`, `wag_end`, `user_id`, `data`, `status`) VALUES ('', '$promo', '$sum', '0', '$sum_wager', '$user_id', '$data', '0');";
        mysqli_query($connection,$update_sql2);

        $data_details = date("d.m H:i");
        $insert_sql1 = "
        INSERT INTO `more_details` (`user_id`, `data`, `suma`, `type`, `note`)
        VALUES ('{$id}', '{$data_details}', '{$sum}', 'promo', '{$promo}')";
        mysqli_query($connection,$insert_sql1);

        $fa = "success";
    }
    $result = array(
        'success' => "$fa",
        'error' => "$mess",
        'balance' => "$balance",
        'new_balance' => "$newbalance"
    );
}
*/

if ($type == "activePromo") {
    $promoget = $_POST['promoactive'];
    $sql_select1 = "SELECT * FROM promo WHERE name='$promoget'";
    $result1 = mysqli_query($connection, $sql_select1);
    $row = mysqli_fetch_array($result1);
    if ($row) {
        $idpromo = $row['id'];
        $price = $row['sum'];
        $count = $row['active'];
        $type_promo = $row['type'];
    }

    if ($price == "") {
        exit(json_encode(['response' => 'error', 'message' => $translations['promo_code_not_found']]));
    } else {
        $sql_select1 = "SELECT * FROM users WHERE hash='$sid'";
        $result1 = mysqli_query($connection, $sql_select1) or die(mysqli_error($connection));
        $row = mysqli_fetch_array($result1) or die(mysqli_error($connection));
        if ($row) {
            $user_id = $row['id'];
            $balance = $row['balance'];
            $freespins = $row['freespins'];
            $dep_week = $row['dep_week'];
        }
        if ($dep_week < 50.00) {
            exit(json_encode(['response' => 'error', 'message' => $translations['min_deposit']]));
        }
        $sql_select2 = "SELECT * FROM promo_log WHERE promo_id='$idpromo' and user_id ='$user_id'";
        $result2 = mysqli_query($connection, $sql_select2) or die(mysqli_error($connection));
        $row2 = mysqli_fetch_array($result2);
        if ($row2) {
            exit(json_encode(['response' => 'error', 'message' => $translations['you_have_already_activated_this_promo_code']]));
        }

        $sql_select5 = "SELECT COUNT(*) FROM promo_log WHERE promo_id='$idpromo'";
        $result5 = mysqli_query($connection, $sql_select5) or die(mysqli_error($connection));
        $row = mysqli_fetch_array($result5);
        if ($row) {
            $countcomplete = $row['COUNT(*)'];
        } else {
            exit(json_encode(['response' => 'error', 'message' => $translations['error']]));
        }
        if ($countcomplete >= $count) {
            exit(json_encode(['response' => 'error', 'message' => $translations['activation_limit_reached']]));
        }
        $newbalance = $balance;
        if ($type_promo == 'freespins') {
            $newspins = $freespins + $price;
            mysqli_query($connection, "UPDATE users SET freespins = '$newspins' WHERE hash = '$sid'");
        } else {
            $newbalance = $balance + $price;
            mysqli_query($connection, "UPDATE users SET balance = '$newbalance' WHERE hash = '$sid'");
        }

        mysqli_query($connection, "INSERT INTO `promo_log` (`id`, `promo_id`, `user_id`) VALUES (NULL, '$idpromo', '$user_id')");

        mysqli_query($connection, "Update promo set actived = actived+1 WHERE name='$promoget'");
        exit(json_encode(['response' => 'success', 'new_balance' => $newbalance, 'type_promo' => $type_promo]));
    }
}

/////////////////////////////////////////////////////
if ($type == "cancelBonusActive") {
    $sql_select2 = "SELECT * FROM users WHERE hash='$sid'";
    $result2 = mysqli_query($connection, $sql_select2);
    $row = mysqli_fetch_array($result2);
    if ($row) {
        $user_id = $row['id'];
        $ban = $row['ban'];
        $balance = $row['balance'];
        $wagers = $row['wager'];
    }
    $selectCountActivedBonus = "SELECT COUNT(*) FROM actived_promo WHERE user_id='$user_id' ORDER BY id DESC";
    $result_selectCountActivedBonus = mysqli_query($connection, $selectCountActivedBonus);
    $row = mysqli_fetch_array($result_selectCountActivedBonus);
    if ($row['COUNT(*)'] == 0) {
        $error = 1;
        $mess = $translations['you_dont_have_an_active_bonus'];
        $fa = "error";
    }
    if ($_SESSION['timestamp'] + 1 > time()) {
        $error = 3;
        $fa = "error";
        $mess = $translations['not_so_fast'];
    } else {
        $_SESSION['timestamp'] = time();
    }

    $selectCountActivedMines = "SELECT COUNT(*) FROM `mines-game` WHERE `id_users` = '$user_id' AND `onOff` = '1' ORDER BY `id` DESC LIMIT 1";
    $selectCountActivedMines2 = mysqli_query($connection, $selectCountActivedMines);
    $row2 = mysqli_fetch_array($selectCountActivedMines2);
    if ($row2['COUNT(*)'] == 1) {
        $error = 5;
        $mess = $translations['do_you_have_an_active_mines_game'];
        $fa = "error";
    }

    if (!$sid) {
        $error = 25;
        $mess = $translations['log_in_to_your_account'];
        $fa = "error";
    }
    if ($error == 0) {
        $update_sql1 = "UPDATE users SET balance = '0' WHERE id = '$user_id'";
        mysqli_query($connection, $update_sql1);

        $delete_proms_us = ("DELETE FROM `actived_promo` WHERE user_id = '$user_id'");
        mysqli_query($connection, $delete_proms_us);

        $fa = "success";
    }
    $result = array(
        'success' => "$fa",
        'error' => "$mess"
    );
}
//
///////////////////////////////////////////////////////////
if ($type == "cashback") {

    $sql_select = "SELECT * FROM users WHERE hash='$sid'";
    $result = mysqli_query($connection, $sql_select);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $id = $row['id'];
        $balance = $row['balance'];
        $cashback = $row['cashback'];
    }

    $select_sql_deps_cash = "SELECT SUM(amount) FROM deposits WHERE user_id='$id' AND status='1'";
    $select_sql_deps_cash2 = mysqli_query($connection, $select_sql_deps_cash);
    $rowdepscash = mysqli_fetch_array($select_sql_deps_cash2);
    $sumsdeps = $rowdepscash['SUM(amount)'];

    if ($_SESSION['timestamp'] + 1 > time()) {
        $error = 12;
        $fa = "error";
        $mess = $translations['not_so_fast'];
    } else {
        $_SESSION['timestamp'] = time();
    }
    if ($sumsdeps < 500) {
        $error = 1;
        $mess = $translations['cashback_is_available_from_the_Silver_rank'];
        $fa = "error";
    }
    if ($cashback < 1) {
        $error = 1;
        $mess = $translations['minimum_withdrawal_amount_is_1_coin'];
        $fa = "error";
    }
    if (!$sid) {
        $error = 15;
        $mess = $translations['log_in_to_your_account'];
        $fa = "error";
    }
    if (date('w') != 0) {
        $error = 15;
        $mess = $translations['cashback_can_only_be_collected_on_sunday'];
        $fa = "error";
    }
    if ($error == 0) {
        $cashback = round($cashback, 2);
        $balance = round($balance, 2);
        $newcashback = $balance + $cashback;
        $update_sql1 = "UPDATE users SET balance = '$newcashback' WHERE hash = '$sid'";
        mysqli_query($connection, $update_sql1);
        $update_sql1 = "UPDATE users SET cashback = '0' WHERE hash = '$sid'";
        mysqli_query($connection, $update_sql1);
        $update_sql1 = "UPDATE users SET total_cashback = total_cashback + $cashback WHERE hash = '$sid'";
        mysqli_query($connection, $update_sql1);

        $data_details = date("d.m H:i");
        $insert_sql1 = "
        INSERT INTO `more_details` (`user_id`, `data`, `suma`, `type`, `note`)
        VALUES ('{$id}', '{$data_details}', '{$cashback}', 'cashback', '')";
        mysqli_query($connection, $insert_sql1);

        $fa = "success";
    }
    $result = array(
        'success' => "$fa",
        'cashbacksize' => "$cashback",
        'new_balance' => "$newcashback",
        'cashbacknow' => "0",
        'error' => "$mess"
    );
}
//////////////////////////////////////////////////////////
if ($type == "updateUserInfo") {
    $sql_select = "SELECT * FROM users WHERE hash='$sid'";
    $result = mysqli_query($connection, $sql_select);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $user_id = $row['id'];
        $balance = $row['balance'];
        $birthday = $row['birthday'];
        $real_name = $row['name'];
        $real_surname = $row['surname'];
        $real_country = $row['country'];
        $real_town = $row['town'];
        $real_email = $row['email'];
        $real_telephone = $row['telephone'];
        $lock_save = $row['lock_save'];
    }

    $birthdayset = $_POST['userBirthday'];
    $set_name = $_POST['real_name'];
    $set_surname = $_POST['real_surname'];
    $set_country = $_POST['real_country'];
    $set_town = $_POST['real_town'];
    $set_email = $_POST['real_email'];
    $set_telephone = $_POST['real_telephone'];
    if ($lock_save == 1) {
        $error = 1;
        $mess = $translations['you_can_only_change_the_data_1_time'];
        $fa = "error";
    }
    if (!$set_name) {
        $error = 2;
        $mess = $translations['fill_in_the_name_field'];
        $fa = "error";
    }
    if (!$set_surname) {
        $error = 3;
        $mess = $translations['fill_in_the_last_name_field'];
        $fa = "error";
    }
    if (!$set_country) {
        $error = 4;
        $mess = $translations['fill_in_the_country_field'];
        $fa = "error";
    }
    if (!$set_town) {
        $error = 5;
        $mess = $translations['fill_in_the_city_field'];
        $fa = "error";
    }
    if (!$set_email) {
        $error = 6;
        $mess = $translations['fill_in_the_mail_field'];
        $fa = "error";
    }
    if (!$set_telephone) {
        $error = 7;
        $mess = $translations['fill_in_the_phone_field'];
        $fa = "error";
    }
    if (!$birthdayset) {
        $error = 8;
        $mess = $translations['the_date_of_birth_field_is_incorrect'];
        $fa = "error";
    }


    //
    if (!$sid) {
        $error = 13;
        $mess = $translations['log_in_to_your_account'];
        $fa = "error";
    }

    if ($error == 0) {
        $update_sql1 = "UPDATE users SET birthday = '$birthdayset' WHERE hash = '$sid'";
        mysqli_query($connection, $update_sql1);
        $update_sql2 = "UPDATE users SET name = '$set_name' WHERE hash = '$sid'";
        mysqli_query($connection, $update_sql2);
        $update_sql3 = "UPDATE users SET surname = '$set_surname' WHERE hash = '$sid'";
        mysqli_query($connection, $update_sql3);
        $update_sql4 = "UPDATE users SET country = '$set_country' WHERE hash = '$sid'";
        mysqli_query($connection, $update_sql4);
        $update_sql5 = "UPDATE users SET town = '$set_town' WHERE hash = '$sid'";
        mysqli_query($connection, $update_sql5);
        $update_sql6 = "UPDATE users SET email = '$set_email' WHERE hash = '$sid'";
        mysqli_query($connection, $update_sql6);
        $update_sql7 = "UPDATE users SET telephone = '$set_telephone' WHERE hash = '$sid'";
        mysqli_query($connection, $update_sql7);
        $update_sql8 = "UPDATE users SET lock_save = '1' WHERE hash = '$sid'";
        mysqli_query($connection, $update_sql8);
        $fa = "success";
    }
    $result = array(
        'success' => "$fa",
        'error' => "$mess"
    );
}
////////////////////////////////////////////////////////////
if ($type == "bonusBirthday") {
    $sql_select = "SELECT * FROM users WHERE hash='$sid'";
    $result = mysqli_query($connection, $sql_select);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $user_id = $row['id'];
        $balance = $row['balance'];
        $birthday = $row['birthday'];
        $birth_bon = $row['birth_bon'];
    }

    $birthdayGet = new DateTime($birthday);
    $todayDate = new DateTime(date("Y-m-d"));

    $getDepsForLevelBirth = "SELECT SUM(amount) FROM deposits WHERE user_id='$user_id' AND status ='1'";
    $getDepsForLevelBirth2 = mysqli_query($connection, $getDepsForLevelBirth);
    $leveldepositsBirth = mysqli_fetch_array($getDepsForLevelBirth2);
    $depositesSIDBirth = $leveldepositsBirth['SUM(amount)'];

    if ($depositesSIDBirth < 500) { /* starter rank */
        $bonusdr = 0; /* 0 монет */
    }
    if ($depositesSIDBirth >= 500) { /* silver rank */
        $bonusdr = 0; /* 0 монет */
    }
    if ($depositesSIDBirth >= 2500) { /* gold rank */
        $bonusdr = 250; /* 250 монет */
    }
    if ($depositesSIDBirth >= 5000) { /* ruby rank */
        $bonusdr = 500; /* 500 монет */
    }
    if ($depositesSIDBirth >= 10000) { /* legend rank */
        $bonusdr = 1000; /* 1000 монет */
    }

    if ($birth_bon == 1) {
        $error = 1;
        $mess = $translations['you_have_already_received_this_bonus'];
        $fa = "error";
    }
    if (!$sid) {
        $error = 2;
        $mess = $translations['log_in_to_your_account'];
        $fa = "error";
    }


    if ($birthdayGet->format("m-d") == $todayDate->format("m-d")) {
        if ($error == 0) {

            $newbalance = $balance + $bonusdr;
            $update_sql1 = "UPDATE users SET birth_bon = '1' WHERE hash = '$sid'";
            mysqli_query($connection, $update_sql1);
            $update_sql1 = "UPDATE users SET balance = '$newbalance' WHERE hash = '$sid'";
            mysqli_query($connection, $update_sql1);

            $fa = "success";
        }
    } else {
        $error = 3;
        $mess = $translations['birthday_has_not_come_yet'];
        $fa = "error";
    }


    $result = array(
        'success' => "$fa",
        'new_balance' => "$newbalance",
        'error' => "$mess"
    );
}
echo json_encode($result);
