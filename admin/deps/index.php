<?
require (dirname(__DIR__, 2)."/system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require (dirname(__DIR__, 1)."/additionally/header.php");

   $sql_select5 = "SELECT * FROM deposits WHERE status = '1' ORDER BY id + 0 DESC";
   $result5 = mysqli_query($connection,$sql_select5);

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

<div class="container">

<div class="admin-card">
    <div class="header">Пополнения  <div class="bord"></div></div>
<!-- CONTENT -->

                           <div class="table-responsive" id="promo-table">
                              <table class="table table-striped table-dark">
                                 <thead>
                                    <tr>
                                       <th scope="col">ID</th>
                                       <th scope="col">ID игрока</th>
                                       <th scope="col">ТГ</th>
                                       <th scope="col">Дата</th>
                                       <th scope="col">Сумма</th>
                                       <th scope="col">Метод</th>
                                       <th scope="col">Статус</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                                                       <?php
                                       while($row = mysqli_fetch_array($result5)) {

                                          $hash_user =  $row['hash_user'];
                                          $tg_username = '-';
                                          $sql_selectUser = "SELECT * FROM users WHERE hash='$hash_user'";
                                          $resultUser = mysqli_query($connection,$sql_selectUser);
                                          $rowUser = mysqli_fetch_array($resultUser);
                                          if($rowUser){
                                             $tg_username = $rowUser['tg_username'];
                                          }




                                       $id = $row['id'];
                                       $date = $row['date'];
                                       $sum = $row['amount'];
                                       $user = $row['user_id'];
                                       $transaction = $row['invoice_id'];
                                       $method = $row['system'];

                                       $transaction = $row['invoice_id'];
                                       $status = $row['status'];
                                       $sum = round($sum, 2);
$checkico = "<i style='color:#4ba136;font-size: 14px;margin-right:5px;' class='fa fa-check' aria-hidden='true'></i>";
$waitico = "<i style='color:#4b5261;font-size: 14px;margin-right:5px;' class='fa fa-clock' aria-hidden='true'></i>";
$method_img = "<img style='width:20px;' src='../images/wallet/".$method.".png'>";
if ($status == 0){
    $sstatus = "<span style='color:#4b5261;'>$waitico В ожидании</span>";
}
if ($status == 1){
    $sstatus = "<span style='color:#4ba136;'>$checkico Оплачен</span>";
}
                                       echo "
                                                                         <tr>
                                                                           <td>$id</td>
                                                                           <td>$user</td>
                                                                           <td>@$tg_username</td>
                                                                           <td>$date</td>
                                                                           <td>$sum</td>
                                                                           <td>$method_img $method</td>
                                                                           <td>$sstatus</td>
                                       								  </tr>";
                                       }
                                         ?>
                                 </tbody>



                              </table>
                           </div>

</div>





</div>


<?php } else { header('Location: ../error404'); } ?>
