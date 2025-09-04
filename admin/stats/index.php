<?
require (dirname(__DIR__, 2)."/system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require (dirname(__DIR__, 1)."/additionally/header.php");

   $sql_select1 = "SELECT COUNT(*) FROM users";
   $result1 = mysqli_query($connection,$sql_select1);
   $row = mysqli_fetch_array($result1);
   if($row)
   {
   $users = $row['COUNT(*)'];
   }
   $sql_select33 = "SELECT SUM(amount) FROM deposits WHERE status='1'";
   $result33 = mysqli_query($connection,$sql_select33);
   $row = mysqli_fetch_array($result33);
   if($row)
   {
   $deps = $row['SUM(amount)'];
   }
   $sql_select3311 = "SELECT SUM(balance) FROM users";
   $result3311 = mysqli_query($connection,$sql_select3311);
   $row = mysqli_fetch_array($result3311);
   if($row)
   {
   $balanceall = $row['SUM(balance)'];
   }
   $sql_select44 = "SELECT SUM(sum) FROM withdraws WHERE status='1'";
   $result44 = mysqli_query($connection,$sql_select44);
   $row = mysqli_fetch_array($result44);
   if($row)
   {
   $withdraws = $row['SUM(sum)'];
   }
   if($deps == '') {
   $deps = 0;
   }
   if($withdraws == '') {
   $withdraws = 0;
   }


if($withdraws > $deps){
$typeWith = 'text-danger';
$health = 'Отрицательная';
$status = '0';
}else
if($withdraws < $deps){
$typeWith = 'text-success';
$health = 'Положительная';
$status = '1';
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



<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

<div class="container">

<?if($status == 1){?>
<div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    Поздравляем! Статистика сайта положительная.
  </div>
</div>
<?}else{?>
<div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
    Увы, но статистика сайта отрицательная.
  </div>
</div>
<?}?>

<div class="admin-card">
    <div class="header">Статистика  <div class="bord"></div></div>
<!-- CONTENT -->

                           <div class="table-responsive">
                              <table class="table table-striped table-dark">
                                 <thead>
                                    <tr>
<th class="tbl-name">Пользователей</th>
<th class="tbl-name ">Баланс игроков</th>
<th class="tbl-name ">Пополнено</th>
<th class="tbl-name ">Выплачено</th>
<th class="tbl-name ">Статистика</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                                                  <tr role="row" class="odd">
                                       <td><?=round($users, 2);?></td>
                                       <td><?=round($balanceall, 2);?> Р</td>
                                       <td><?=round($deps, 2);?> Р</td>
                                       <td><?=round($withdraws, 2);?> Р</td>
                                       <td class="<?=$typeWith?> fw-bold"><?=$health?></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>

</div>





</div>


<?php } else { header('Location: ../error404'); } ?>
