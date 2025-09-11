<?
require("connect.php"); // Подключение к базе данных
$sid = isset($_SESSION['hash']) ? $_SESSION['hash'] : '';

$wagers = 0; // Значение по умолчанию
$star_limit = 0; // Значение по умолчанию

if ($sid) {
  // Используем подготовленные выражения для защиты от SQL-инъекций
  $select = "SELECT wager, star_limit FROM users WHERE hash = ?";
  $stmt = $connection->prepare($select);
  if (!$stmt) {
    die("Ошибка подготовки запроса: " . $connection->error);
  }
  $stmt->bind_param("s", $sid);
  $stmt->execute();
  $result = $stmt->get_result();
  $get = $result->fetch_assoc();
  $stmt->close();

  if ($get) {
    $wagers = $get['wager'] ?? 0; // Вагер игрока
    $star_limit = $get['star_limit'] ?? 0;
  }
}


$sql_select1 = "SELECT * FROM config";
$result1 = mysqli_query($connection, $sql_select1);
$row = mysqli_fetch_array($result1);
if ($row) {
  $linksite = "https://$_SERVER[HTTP_HOST]"; //url
  $sitename = 'stake';
  $sitegroup = $row['sitegroup']; //группа вк
  $sitedomen = $row['sitedomen']; //домен сайта
  $sitesupport = $row['sitesupport']; //телеграм для связи
  $dep_withdraw = $row['dep_withdraw']; //депозит для вывода
  $min_withdraw_sum = $row['min_withdraw_sum']; // минимальная сумма вывода (глобальная)
  $min_sum_dep = $row['min_sum_dep']; //минимальная сумма депозита
  $id_vk = $row['id_vk']; //айди приложеения вк
  $token_vk = $row['token_vk']; //токен приложения вк
  $coefbonus = $row['wagerbonus']; //коэф вагера на бонусы
  $coefdeposit = $row['wagerdeposit']; //коэф вагера на депозит
  $coefpromo = $row['wagerpromo']; //коэф вагера на промокоды
  $fkid = $row['fkid']; //айди кассы фрикасса
  $fks1 = $row['fks1']; //секретный ключ 1 фрикасса
  $fks2 = $row['fks2']; //секретный ключ 2 фрикасса
  $vkgoupid = $row['vkgoupid']; //айди группы вк
  $vkgrouptoken = $row['vkgrouptoken']; //api токен группы вк
  $is_teh = $row['tehworks']; //технические работы
  $grecaptcha = $row['grecaptcha']; //рекапча ключ
  $maxbet = $row['maxbet']; //максимальная ставка в режимах
  $minbet = $row['minbet']; //минимальная ставка в режимах
  $min_daily_size = $row['daily_min']; //минимальная сумма в раздаче
  $max_daily_size = $row['daily_max']; //максимальная сумма в раздаче
  $vkgroupsize = $row['vkgroupsize']; //бонус за подписку на группу вк
  $vkrepostsize = isset($row['vkrepostsize']) ? $row['vkrepostsize'] : 0; //бонус за репост записи вк
  $dep_for_send = isset($row['dep_for_send']) ? $row['dep_for_send'] : 0; // депозит для перевода игрокам
  $maxsizebonusgame = isset($row['bonusbuy_game_maxbet']) ? $row['bonusbuy_game_maxbet'] : 0; //макс ставка в игре bonusbuy
  $wager_for_bets = isset($row['wager_for_bets']) ? $row['wager_for_bets'] : 0; //сколько будет списывается с общего вагера
  $rakeback_percent = isset($row['rakeback_percent']) ? $row['rakeback_percent'] : 0; //сколько будет отчислятся в рейкбек
  $cashback_percent = isset($row['cashback_percent']) ? $row['cashback_percent'] : 0; //сколько будет отчислятся в cashback
}

$sql_select12 = "SELECT * FROM config_wallet";
$result12 = mysqli_query($connection, $sql_select12);
$row = mysqli_fetch_array($result12);
if ($row) {
  $withdraw_min_sbp = $row['withdraw_min_sbp']; //мин сумма вывода СБП
  $withdraw_min_fkwallet = $row['withdraw_min_fkwallet']; //мин сумма вывода FKWALLET
}

// Для вк
$client_id = $id_vk; // ID приложения
$client_secret = $token_vk; // Защищённый ключ
$redirect_uri = "$linksite/auth/vk/access"; // Адрес сайта
