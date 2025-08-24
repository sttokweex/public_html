<?
require (dirname(__DIR__, 1)."/system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require ("additionally/header.php");

$userInf = $_GET['id'];

   $sql_select1 = "SELECT COUNT(*) FROM users";
   $result1 = mysqli_query($connection,$sql_select1);
   $row = mysqli_fetch_array($result1);
   if($row)
   {
   $users = $row['COUNT(*)'];
   }

   // получаем данные пользователя
   $getInfouser = "SELECT * FROM users WHERE id = '$userInf'";
   $getInfouser222 = mysqli_query($connection,$getInfouser);
   $row = mysqli_fetch_array($getInfouser222);
   if($row)
   {
   $imgUser = $row['img'];
   $loginUser = $row['login'];
   $regUser = $row['data_reg'];
   $balanceUser = $row['balance'];
   $freespins = $row['freespins'];

   $ref_idUser = $row['ref_id'];
   $vkUser = $row['social'];
   $vkUserURL = $row['social'];
   $refsUser = $row['refs'];
   $refearnUser = $row['refearn'];
   $banUser = $row['ban'];
   $chat_banUser = $row['chat_ban'];
   $podkrutUser = $row['podkrut'];
   $podkrutUser2 = $row['podkrut'];
   $wagerUser = $row['wager'];
   $rakebackUser = $row['rakeback'];
   $ipUser = $row['ip'];
   $birthday = $row['birthday'];
   $is_yt = $row['is_yt'];

//личные данные
$real_name1 = $row['name'];
$real_surname1 = $row['surname'];
$real_country1 = $row['country'];
$real_town1 = $row['town'];
$real_email1 = $row['email'];
$real_telephone1 = $row['telephone'];
$lock_save1 = $row['lock_save'];

if(!$real_name1){
$real_name1 = 'Отсутствует';
}
if(!$real_surname1){
$real_surname1 = 'Отсутствует';
}
if(!$real_country1){
$real_country1 = 'Отсутствует';
}
if(!$real_town1){
$real_town1 = 'Отсутствует';
}
if(!$real_email1){
$real_email1 = 'Отсутствует';
}
if(!$real_telephone1){
$real_telephone1 = 'Отсутствует';
}

   $vkUser = substr($vkUser, -9);
   $balanceUser = round($balanceUser, 2);
   $refsUser = round($refsUser, 2);
   $refearnUser = round($refearnUser, 2);
   $wagerUser = round($wagerUser, 2);
   $rakebackUser = round($rakebackUser, 2);
   }

   if($is_yt == 0){
    $is_ytSec = '';
    }else{
    $is_ytSec = 'selected';
    }

if($podkrutUser2 == 0){
$getPodSec = '';
}else{
$getPodSec = 'selected';
}

if($lock_save1 == 0){
$getLockSave = '';
}else{
$getLockSave = 'selected';
}

if($banUser == 0){
$getUserBan = '';
}else{
$getUserBan = 'selected';
}




if($birthday == NULL){
$birthday = 'Не указано';
}
if($ref_idUser == NULL || $ref_idUser == 0){
$ref_idUser = 'Нет';
}
if($refsUser == NULL || $refsUser == 0){
$refsUser = '0';
}
if($refearnUser == NULL || $refearnUser == 0){
$refearnUser = '0';
}
if($banUser == NULL || $banUser == 0){
$banUser = 'Нет';
}else{
$banUser = 'Да';
}
if($chat_banUser == NULL || $chat_banUser == 0){
$chat_banUser = 'Нет';
}else{
$chat_banUser = 'Да';
}
if($podkrutUser == NULL || $podkrutUser == 0){
$podkrutUser = 'Нет';
}else{
$podkrutUser = 'Да';
}
if($rakebackUser == NULL || $rakebackUser == 0){
$rakebackUser = '0';
}
if($wagerUser == NULL || $wagerUser == 0){
$wagerUser = '0';
}


   // проверка на админа
   $admin_check = "SELECT * FROM users WHERE hash = '$sid'";
   $result_admin = mysqli_query($connection,$admin_check);
   $row = mysqli_fetch_array($result_admin);
   if($row)
   {
   $last_check = $row['admin'];
   }

if($last_check == 1) {
?>
    <!-- Datatable plugin CSS file -->
    <link rel="stylesheet" href=
"../css/jquery.dataTables.min.css" />
      <!-- Datatable plugin JS library file -->
     <script type="text/javascript" src=
"../js/jquery.dataTables.min.js">
     </script>

<body>


<div class="container">


<div class="admin-card">
    <div class="header" style="    display: block;">ID #<span id="userid"><?=$userInf?></span> <button class='buttonProject abs-btn' onClick="save_user_edit();">Сохранить данные</button> <div style="margin-top: 10px;" class="bord"></div></div>
<!-- CONTENT -->

<div class="userInfoProfile">

<div class="main">
<img class="img" src="<?=$imgUser?>">
<span class="login"><?=$loginUser?></span>
<span class="data"><?=$regUser?></span>
</div>

<div class="more" id="users-block">


<div class="col-lg-3">
<div class="form-group">
<span>Логин</span>
<input type="text" class="main-form-input" id="username" value="<?=$loginUser?>"/>
</div>
</div>

<div class="col-lg-3">
<div class="form-group">
<span>Баланс</span>
<input type="number" class="main-form-input" id="userbal" value="<?=$balanceUser?>"/>
</div>
</div>

<div class="col-lg-3">
<div class="form-group">
<span >Подкрутка</span>
<select class="main-form-input" id="podkrutka">
<option value="0" <?=$getPodSec?>>Нет</option>
<option value="1" <?=$getPodSec?>>Да</option>
</select>
</div>
</div>


<div class="col-lg-3">
<div class="form-group">
<span >Заблокирован</span>
<select class="main-form-input" id="ban_user">
<option value="0" <?=$getUserBan?>>Нет</option>
<option value="1" <?=$getUserBan?>>Да</option>
</select>
</div>
</div>

<div class="col-lg-3">
<div class="form-group">
<span >Блок редактирования профиля</span>
<select class="main-form-input" id="lock_save_user">
<option value="0" <?=$getLockSave?>>Нет</option>
<option value="1" <?=$getLockSave?>>Да</option>
</select>
</div>
</div>

<div class="col-lg-3">
<div class="form-group">
<span >Ютюбер</span>
<select class="main-form-input" id="is_yt">
<option value="0" <?=$is_ytSec?>>Нет</option>
<option value="1" <?=$is_ytSec?>>Да</option>
</select>
</div>
</div>

<div class="col-lg-3">
<div class="form-group">
<span>Фриспины</span>
<input type="text" class="main-form-input" id="freespins" value="<?=$freespins?>"/>
</div>
</div>

<div class="col-lg-3">
 <button class="buttonProject w100" style="margin-top: 25px;" onClick="resetWager()">Обнулить вагер</button>
</div>

</div>

</div>
<br>
<div class="moreInformations">
<span>Профиль ВК: <a href="<?=$vkUserURL?>"><?=$vkUser?></a></span>
<span>Чей реферал: <p><?=$ref_idUser?></p></span>
<span>Рефералов: <p><?=$refsUser?></p></span>
<span>Заработано с рефки: <p><?=$refearnUser?></p></span>
<span>Забанен: <p><?=$banUser?></p></span>
<span>Забанен в чате: <p><?=$chat_banUser?></p></span>
<span>Подкрутка: <p><?=$podkrutUser?></p></span>
<span>Вагер: <p><?=$wagerUser?></p></span>
<span>Рейкбек: <p><?=$rakebackUser?></p></span>
<span>IP: <p><?=$ipUser?></p></span>
</div>
<hr>
<div class="moreInformations">
<span>Имя: <p><?=$real_name1?></p></span>
<span>Фамилия: <p><?=$real_surname1?></p></span>
<span>Дата рождения: <p><?=$birthday?></p></span>
<span>Страна: <p><?=$real_country1?></p></span>
<span>Город: <p><?=$real_town1?></p></span>
<span>E-MAIL: <p><?=$real_email1?></p></span>
<span>Номер телефона: <p><?=$real_telephone1?></p></span>
</div>
<br>


<!-- Пополнения -->
                            <div class="userTable">
                              <span class="title">Пополнения</span>
                              <table class="table table-dark table-striped" id="depositsTable">
                                 <thead>
                                    <tr>
                                       <th scope="col">ID</th>
                                       <th scope="col">№ транзакции</th>
                                       <th scope="col">Дата</th>
                                       <th scope="col">Сумма</th>
                                       <th scope="col">Метод</th>
                                       <th scope="col">Статус</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                                                       <?php
   $select_deps = "SELECT * FROM deposits WHERE user_id = '$userInf' ORDER BY id + 0 DESC";
   $deposits_sql = mysqli_query($connection,$select_deps);
                                       while($row = mysqli_fetch_array($deposits_sql)) {
                                       $id = $row['id'];
                                       $user = $row['user_id'];
                                       $sum = $row['amount'];
                                       $sum = round($sum, 2);
                                       $transaction = $row['invoice_id'];
                                       $method = $row['system'];
                                       $status = $row['status'];
                                       $date = $row['date'];
$checkico = "<i style='color:#4ba136;font-size: 14px;margin-right:5px;' class='fa fa-check' aria-hidden='true'></i>";
$waitico = "<i style='color:#4b5261;font-size: 14px;margin-right:5px;' class='fa fa-clock' aria-hidden='true'></i>";

if ($status == 0){
    $sstatus = "<span style='color:#4b5261;'>$waitico В ожидании</span>";
}
if ($status == 1){
    $sstatus = "<span style='color:#4ba136;'>$checkico Оплачен</span>";
}
                                       echo "
                                                                         <tr>
                                                                           <td>$id</td>
                                                                           <td>#$transaction</td>
                                                                           <td>$date</td>
                                                                           <td>$sum</td>
                                                                           <td><img style='width:90px;' src='../images/wallet/$method.svg'></td>
                                                                           <td>$sstatus</td>
                                       								  </tr>";
                                       }
                                         ?>
                                 </tbody>



                              </table>
                           </div>



<!-- Выплаты -->
                            <div class="userTable">
                              <span class="title">Выплаты</span>
                              <table class="table table-dark table-striped" id="withdrawssTable">
                                 <thead>
                                    <tr>
                                       <th scope="col">ID</th>
                                        <th scope="col">ПС</th>
                                        <th scope="col">Дата</th>
                                        <th scope="col">Кошелек</th>
                                        <th scope="col">Сумма</th>
                                        <th scope="col">Статус</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   	<?
$checkico = "<i style='color:#4ba136;font-size: 14px;margin-right:5px;' class='fa fa-check' aria-hidden='true'></i>";
$waitico = "<i style='color:#bd8c18;font-size: 14px;margin-right:5px;' class='fa fa-arrow-left' aria-hidden='true'></i>";
$errorico = "<i style='color:#b13333;font-size: 14px;margin-right:5px;transform: rotate(45deg);' class='fa fa-plus' aria-hidden='true'></i>";

$deposits = mysqli_query($connection,"SELECT * FROM withdraws WHERE user_id='$userInf' ORDER BY id DESC");
while ($row = mysqli_fetch_array($deposits)){

  $id  = $row['id'];
  $user_id = $row['user_id'];
  $ps = $row['ps'];
  $sum = $row['sum'];
  $wallet = $row['wallet'];
  $fake = $row['fake'];
  $status = $row['status'];
  $data = $row['date'];

if ($status == 0){
    $sstatus = "<span style='color:#bd8c18;'>Ожидание</span>";
}
if ($status == 1){
    $sstatus = "<span style='color:#4ba136;'>$checkico Успешно</span>";
}
if ($status == 2){
    $sstatus = "<span style='color:#b13333;'>$errorico Отозван</span>";
}

echo '<tr style="height: 80px;color:var(--main-color-medium)">
<td>#'.$id.'</td>
<td><img style="width:90px;" src="../images/wallet/'.$ps.'.svg"></td>
<td>'.$data.'</td>
<td>'.$wallet.'</td>
<td>'.$sum.' ₽</td>
<td>'.$sstatus.'</td>
</tr>' ;
}

	?>
                                 </tbody>



                              </table>
                           </div>


<!-- games -->
                            <div class="userTable">
                              <span class="title">Ставки</span>
                             <table id="livegames" style="user-select:none;" class="table table-dark table-striped">
                                 <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                       <th scope="col">Игра</th>
                                       <th scope="col">Ставка</th>
                                       <th scope="col">Коэф.</th>
                                       <th scope="col">Выигрыш</th>
                                    </tr>
                                 </thead>


                                 <tbody>
                                    <?php

$sql_select22231 = "SELECT COUNT(*) FROM dice WHERE user_id='$userInf' ORDER BY id DESC";
$result5521 = mysqli_query($connection,$sql_select22231);
$row = mysqli_fetch_array($result5521);
if($row['COUNT(*)'] == 0)
{

echo "
<tr>
<td>Нет игр</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
</tr>";

}else{

                                       $sql_select5 = "SELECT * FROM dice WHERE user_id='$userInf' ORDER BY id + 0 DESC";
                                       $result5 = mysqli_query($connection,$sql_select5);
                                       while($row = mysqli_fetch_array($result5)) {
                                       //вывод из бд
                                       $id = $row['id'];
                                       $game = $row['game'];
                                       $user_id = $row['user_id'];
                                       $bet = $row['bet'];
                                       $win = $row['win'];
                                       $data = $row['create_at'];
                                       $coefficient = $row['coef'];

                                       $sql_selectuser = "SELECT * FROM users WHERE id = '$user_id'";
                                       $result_user = mysqli_query($connection,$sql_selectuser);
                                       while($row = mysqli_fetch_array($result_user)) {
                                       $login = $row['login'];
                                       $img = $row['img'];
                                       }

                                       $s3 = strtok($login,' ');


                                       //не менять!



                                       if($win == '0'){
                                       $color = 'color:#4b5261;';
                                       $colorcoin = 'color:#4b5261;';
                                       }else{
                                           $color = 'color:white;';
                                           $colorcoin = 'color:#31a840;';
                                       }

                                       $coef = round($coefficient, 2);
                                       $win = round($win, 2);
                                       $bet = round($bet, 2);

                                        $coefNew = "x$coef";


                                       /* games icon list */
                                       if($game == 'Dice'){
                                           $gameicon = $diceicon;
                                       }
                                       if($game == 'Mines'){
                                           $gameicon = $minesicon;
                                       }
                                       if($game == 'Bubbles'){
                                           $gameicon = $bubblesicon;
                                       }
                                       if($game == 'BonusBuy'){
                                           $gameicon = $bonusbuyicon;
                                       }
echo "
<tr>
<td>$id</td>
<td><span class='livefeedmore'><span class='hideonmob livefeedinfo'>$game <span style='opacity:0.6;font-size:12px;' class='livedata'>$data</span></span></span></td>
<td><i class='fa fa-coins' style='color:#ffbb29;margin-right:10px;'></i>$bet</td>
<td class='hideonmob' style='$color'>$coefNew</td>
<td style='$color'><i style='$colorcoin' class='fa fa-coins coinsGreen' style='margin-right:10px;'></i> $win</td>
</tr>";
}
}
                                         ?>
                                 </tbody>
                              </table>
                           </div>





</div>

   <script>
         $(document).ready(function() {
            $('#livegames').DataTable({
                pageLength : 10,
    lengthMenu: [[10, 20, 50], [10, 20, 50]],
        order: [[0, 'desc']]
            });
        });
        $(document).ready(function() {
            $('#depositsTable').DataTable({
                pageLength : 5,
    lengthMenu: [[5, 10, 20], [5, 10, 20]],
        order: [[0, 'desc']]
            });
        });
        $(document).ready(function() {
            $('#withdrawssTable').DataTable({
                pageLength : 5,
    lengthMenu: [[5, 10, 20], [5, 10, 20]],
        order: [[0, 'desc']]
    });
        });

    </script>


</body>
</html>
<?php } else { header('Location: ../error404'); } ?>
