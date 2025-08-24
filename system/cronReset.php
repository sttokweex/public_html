<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$bot_token = '7008339760:AAGuowmc0o60BjNWAMY4pYWZ3loZGL653-U';
$webapp_url = 'https://frenzycaz.online';

require("config.php");

mysqli_query($connection,"UPDATE users SET notif_b_sended = '0', star_limit = '500'");
