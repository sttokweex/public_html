<?
require("../system/config.php");

if (session_status() !== PHP_SESSION_ACTIVE) {
   session_start();
}
require("additionally/header.php");

// проверка на админа
$admin_check = "SELECT * FROM users WHERE hash = '$sid'";
$result_admin = mysqli_query($connection, $admin_check);
$row = mysqli_fetch_array($result_admin);
if ($row) {
   $last_check = $row['admin'];
}

if ($is_teh == 0) {
   $is_tehSelect = '';
} else {
   $is_tehSelect = 'selected';
}

if ($last_check == 1) {
?>


   <link href="../admin/additionally/css.css" rel="stylesheet">
   <div class="container">

      <div class="admin-card">
         <div class="header">Настройки <button class='buttonProject abs-btn' onclick="saves()">Сохранить</button>
            <div class="bord"></div>
         </div>
         <!-- CONTENT -->


         <div class="settingsMenu" id="setting-tbl">

            <!--wager start-->
            <div class="listwrap">
               <span class="header">Вагер</span>
               <div class="list">
                  <!-- settings list -->

                  <div class="col-lg-3">
                     <div class="form-group">
                        <span>Вагер на промокоды</span>
                        <input type="text" class="main-form-input" id="coefpromwag" placeholder="Коэф. вагера на промокоды" value="<?= $coefpromo ?>" />
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="form-group">
                        <span>Вагер на прочие бонусы</span>
                        <input type="text" class="main-form-input" id="coefbonwag" placeholder="Коэф. вагера на бонусы" value="<?= $coefbonus ?>" />
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="form-group">
                        <span>Вагер на депозит</span>
                        <input type="text" class="main-form-input" id="coefdepwag" placeholder="Коэф. вагера на депозит" value="<?= $coefdeposit ?>" />
                     </div>
                  </div>

                  <div class="col-lg-3">
                     <div class="form-group">
                        <span>Сколько списывать с вагера при ставке</span>
                        <input type="text" class="main-form-input" id="wager_for_bets" placeholder="Списывание вагер при ставке" value="<?= $wager_for_bets ?>" />
                     </div>
                  </div>



                  <!-- settings list -->
               </div>
            </div>
            <!--wager end-->

            <!--main start-->
            <div class="listwrap">
               <span class="header">Основное</span>
               <div class="list">
                  <!-- settings list -->

                  <div class="col-lg-3">
                     <div class="form-group">
                        <span>Название сайта</span>
                        <input type="text" class="main-form-input" id="sitename" placeholder="Название сайта" value="<?= $sitename ?>" />
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="form-group">
                        <span>Домен сайта</span>
                        <input type="text" class="main-form-input" id="sitedomen" placeholder="Домен ~(.site)" value="<?= $sitedomen ?>" />
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="form-group">
                        <span>Ссылка на сайт</span>
                        <input type="text" class="main-form-input" id="" placeholder="" value="<?= $linksite ?>" readonly="" />
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="form-group">
                        <span>Технические работы</span>
                        <select class="main-form-input" id="tehworks">
                           <option value="0" <?= $is_tehSelect ?>>Нет</option>
                           <option value="1" <?= $is_tehSelect ?>>Да</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="form-group">
                        <span>Ссылка на аккаунт (без @)</span>
                        <input type="text" class="main-form-input" id="sitesupport" placeholder="Ссылка на аккаунт" value="<?= $sitesupport ?>" />
                     </div>
                  </div>
                  <!-- <div class="col-lg-3">
            <div class="form-group">
               <span >Ключ gRecaptcha</span>
               <input  type="text" class="main-form-input" id="grecaptchakeys" placeholder="Ключ рекапчи" value="<?= $grecaptcha ?>"/>
            </div>
         </div>
         <div class="col-lg-3">
            <div class="form-group">
               <span>Ссылка на группу ВК</span>
               <input type="text" class="main-form-input" id="sitegroup" placeholder="Ссылка на группу vk" value="<?= $sitegroup ?>"/>
            </div>
         </div>
         <div class="col-lg-3">
            <div class="form-group">
               <span>Ссылка на Телеграм</span>
               <input type="text" class="main-form-input" id="sitesupport" placeholder="Ссылка на тг" value="<?= $sitesupport ?>"/>
            </div>
         </div>
         <div class="col-lg-3">
            <div class="form-group">
               <span >Мин. ставка в режимах</span>
               <input  type="number" class="main-form-input" id="minbet" placeholder="Ключ рекапчи" value="<?= $minbet ?>"/>
            </div>
         </div>
         <div class="col-lg-3">
            <div class="form-group">
               <span >Макс. ставка в режимах</span>
               <input  type="number" class="main-form-input" id="maxbet" placeholder="Ключ рекапчи" value="<?= $maxbet ?>"/>
            </div>
         </div>
         <div class="col-lg-3">
            <div class="form-group">
               <span >Макс. ставка в BONUSBUY</span>
               <input  type="number" class="main-form-input" id="bbmaxbet" placeholder="Макс. ставка в BONUSBUY" value="<?= $maxsizebonusgame ?>"/>
            </div>
         </div>     -->
                  <!-- settings list -->
               </div>
            </div>
            <!--main end-->

            <!--Авторизация start-->
            <!-- <div class="listwrap">
<span class="header">Авторизация ВКонтакте</span>
<div class="list"> -->
            <!-- settings list -->

            <!--  <div class="col-lg-3">
           <div class="form-group">
              <span >ID ВК группы</span>
              <input  type="text" class="main-form-input" id="id_vk" placeholder="ID ВК группы" value="<?= $id_vk ?>"/>
           </div>
        </div>
        <div class="col-lg-3">
           <div class="form-group">
              <span >Токен ВК группы</span>
              <input  type="text" class="main-form-input" id="token_vk" placeholder="Токен ВК группы" value="<?= $token_vk ?>"/>
           </div>
        </div> -->

            <!-- settings list -->
            <!-- </div>
</div> -->
            <!--Авторизация end-->

            <!--Freekassa start-->
            <!-- <div class="listwrap">
<span class="header">Платежная система</span>
<div class="list"> -->
            <!-- settings list -->

            <!--  <div class="col-lg-3">
           <div class="form-group">
              <span >ID FreeKassa (new)</span>
              <input  type="text" class="main-form-input" id="fkid" placeholder="ID FreeKassa (new)" value="<?= $fkid ?>"/>
           </div>
        </div>
        <div class="col-lg-3">
           <div class="form-group">
              <span >Секретный ключ 1 FreeKassa (new)</span>
              <input  type="text" class="main-form-input" id="fks1" placeholder="Secret1 FreeKassa (new)" value="<?= $fks1 ?>"/>
           </div>
        </div>
        <div class="col-lg-3">
           <div class="form-group">
              <span >Секретный ключ 2 FreeKassa (new)</span>
              <input  type="text" class="main-form-input" id="fks2" placeholder="Secret2 FreeKassa (new)" value="<?= $fks2 ?>"/>
           </div>
        </div>  -->

            <!-- settings list -->
            <!-- </div>
</div> -->
            <!--Freekassa end-->


            <!--Пополнение start-->
            <div class="listwrap">
               <span class="header">Пополнение</span>
               <div class="list">
                  <!-- settings list -->

                  <div class="col-lg-3">
                     <div class="form-group">
                        <span>Сумма депа для вывода</span>
                        <input type="text" class="main-form-input" id="dep_withdraw" placeholder="Сумма депозита для вывода" value="<?= $dep_withdraw ?>" />
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="form-group">
                        <span>Мин. сумма депа</span>
                        <input type="text" class="main-form-input" id="min_deposit" placeholder="Минимальная сумма депозита" value="<?= $min_sum_dep ?>" />
                     </div>
                  </div>

                  <!-- settings list -->
               </div>
            </div>
            <!--Пополнение end-->


            <!--Вывод start-->
            <div class="listwrap">
               <span class="header">Вывод</span>
               <div class="list">
                  <!-- settings list -->

                  <div class="col-lg-3">
                     <div class="form-group">
                        <span>Мин. сумма вывода на СБП</span>
                        <input type="number" class="main-form-input" id="withdraw_min_sbp" placeholder="Мин. сумма вывода на СБП" value="<?= $withdraw_min_sbp ?>" />
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="form-group">
                        <span>Мин. сумма вывода на CryptoBot</span>
                        <input type="number" class="main-form-input" id="withdraw_min_fkwallet" placeholder="Мин. сумма вывода на FKWALLET" value="<?= $withdraw_min_fkwallet ?>" />
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="form-group">
                        <span>Мин. сумма вывода (глобальная)</span>
                        <input type="number" class="main-form-input" id="min_withdraw_sum" placeholder="Мининимальная сумма вывода" value="<?= $min_withdraw_sum ?>" />
                     </div>
                  </div>
                  <!-- settings list -->
               </div>
            </div>
            <!--Вывод end-->




            <!--Бонусы start-->
            <div class="listwrap">
               <span class="header">Бонусы</span>
               <div class="list">
                  <!-- settings list -->

                  <!-- <div class="col-lg-3">
            <div class="form-group">
               <span >Бонус за подписку на группу</span>
               <input  type="number" class="main-form-input" id="vkgroupsize" placeholder="Бонус за подписку на группу" value="<?= $vkgroupsize ?>"/>
            </div>
         </div>
         <div class="col-lg-3">
            <div class="form-group">
               <span >Бонус за репост записи</span>
               <input  type="number" class="main-form-input" id="vkrepostsize" placeholder="Бонус за репост записи" value="<?= $vkrepostsize ?>"/>
            </div>
         </div>   -->
                  <div class="col-lg-3">
                     <div class="form-group">
                        <span>Мин. сумма в раздаче</span>
                        <input type="number" class="main-form-input" id="daily_min" placeholder="Мин. сумма в раздаче" value="<?= $min_daily_size ?>" />
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="form-group">
                        <span>Макс. сумма в раздаче</span>
                        <input type="number" class="main-form-input" id="daily_max" placeholder="Макс. сумма в раздаче" value="<?= $max_daily_size ?>" />
                     </div>
                  </div>

                  <!-- settings list -->
               </div>
            </div>
            <!--Бонусы end-->

            <!-- Для проверки подписки start-->
            <!-- <div class="listwrap">
<span class="header">Для проверки подписки</span>
<div class="list"> -->
            <!-- settings list -->

            <!-- <div class="col-lg-3">
            <div class="form-group">
               <span >Токен группы вк</span>
               <input  type="text" class="main-form-input" id="vkgrouptoken" placeholder="Токен группы вк" value="<?= $vkgrouptoken ?>"/>
            </div>
         </div>
         <div class="col-lg-3">
            <div class="form-group">
               <span >Айди группы вк</span>
               <input  type="text" class="main-form-input" id="vkgoupid" placeholder="Айди группы вк" value="<?= $vkgoupid ?>"/>
            </div>
         </div> -->

            <!-- settings list -->
            <!-- </div>
</div> -->
            <!-- Для проверки подписки end-->

         </div>

      </div>

      <br>
      <br>
      <br>



   </div>



<?php } else {
   header('Location: ../error404');
} ?>