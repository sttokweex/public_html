<?
require(dirname(__DIR__, 2) . "/system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
require(dirname(__DIR__, 1) . "/additionally/header.php");

$sql_select5 = "SELECT * FROM withdraws ORDER BY id + 0 DESC";
$result5 = mysqli_query($connection, $sql_select5);

// проверка на админа
$admin_check = "SELECT * FROM users WHERE hash = '$sid'";
$result_admin = mysqli_query($connection, $admin_check);
$row = mysqli_fetch_array($result_admin);
if ($row) {
  $last_check = $row['admin'];
}

if ($last_check == 1) {
?>

  <div class="container">

    <div class="admin-card">
      <div class="header">Выплаты <div class="bord"></div>
      </div>
      <!-- CONTENT -->

      <div class="table-responsive" id="withdraws-tbl">
        <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Дата</th>
              <th scope="col">ID игрока</th>
              <th scope="col">Кошелек</th>
              <th scope="col">ПС</th>
              <th scope="col">Сумма</th>
              <th scope="col">БАНК</th>
              <th scope="col">Статус</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($row = mysqli_fetch_array($result5)) {
              $id = $row['id'];
              $user_id = $row['user_id'];
              $sum = $row['sum'];
              $wallet = $row['wallet'];
              $status = $row['status'];
              $ps = $row['ps'];
              $fake = true; // $row['fake']
              $date = $row['date'];
              $sbpnking = $row['banksbp'];

              $sum = round($sum, 2);
              $checkico = "<i style='color:#4ba136;font-size: 14px;margin-right:5px;' class='fa fa-check' aria-hidden='true'></i>";
              $waitico = "<i style='color:#bd8c18;font-size: 14px;margin-right:5px;' class='fa fa-clock' aria-hidden='true'></i>";
              $errorico = "<i style='color:#b13333;font-size: 14px;margin-right:5px;transform: rotate(45deg);' class='fa fa-plus' aria-hidden='true'></i>";
              $procesico = "<i style='color:#fff;font-size: 14px;margin-right:5px;' class='fa fa-bolt' aria-hidden='true'></i>";
              if ($fake == 0) {
                $is_fake = "Нет";
                $sql_select2 = "SELECT * FROM users WHERE id='$user_id'";
                $result2 = mysqli_query($connection, $sql_select2);
                $row = mysqli_fetch_array($result2);
                if ($row) {
                  $login = $row['login'];
                }
              }
              if ($fake == 1) {
                $user_id = "Нет";
                $is_fake = "Да";
                $login = true; //$row['login_fake'];
              }
              if ($status == 0) {
                $stat = "<td class='sorting_1' tabindex='0' onclick=" . "$('#editidw').html('$id');$('#useridw').html('$user_id');$('#usersumw').html('$sum');" . " data-toggle='modal' data-target='#editstatus' style='cursor:pointer;'><span style='color:#bd8c18;font-weight:bold;'>$waitico Изменить</span></td>";
              }



              if ($status == 1) {
                $stat = "<td class='sorting_1' tabindex='0' onclick=" . "$('#editidw').html('$id');$('#useridw').html('$user_id');$('#usersumw').html('$sum');" . " data-toggle='modal' data-target='#editstatus' style='cursor:pointer;'><span style='color:#bd8c18;font-weight:bold;'><span style='color:#4ba136;'>$checkico Успешно</span></td>";
              }
              if ($status == 2) {
                $stat = "<td class='sorting_1' tabindex='0' onclick=" . "$('#editidw').html('$id');$('#useridw').html('$user_id');$('#usersumw').html('$sum');" . " data-toggle='modal' data-target='#editstatus' style='cursor:pointer;'><span style='color:#bd8c18;font-weight:bold;'><span style='color:#b13333;'>$errorico Отозван</span></td>";
              }
              if ($status == 3) {
                $stat = "<td class='sorting_1' tabindex='0' onclick=" . "$('#editidw').html('$id');$('#useridw').html('$user_id');$('#usersumw').html('$sum');" . " data-toggle='modal' data-target='#editstatus' style='cursor:pointer;'><span style='color:#fff;font-weight:bold;'><span style='color:#fff;'>$procesico В процессе</span></td>";
              }
              if ($sbpnking == 0) {
                $sbpnking = '-';
              }
              if ($sbpnking == 1) {
                $sbpnking = 'Сбербанк';
              }
              if ($sbpnking == 2) {
                $sbpnking = 'Тинькофф';
              }
              if ($sbpnking == 3) {
                $sbpnking = 'Райффайзен';
              }
              if ($sbpnking == 4) {
                $sbpnking = 'Альфа-банк';
              }
              if ($sbpnking == 5) {
                $sbpnking = 'ВТБ';
              }
              if ($sbpnking == 6) {
                $sbpnking = 'OZON';
              }
              if ($sbpnking == 7) {
                $sbpnking = 'МТС';
              }
              if ($sbpnking == 8) {
                $sbpnking = 'Уралсиб';
              }
              if ($sbpnking == 9) {
                $sbpnking = 'Ренессанс';
              }
              echo "
                                                                         <tr>
                                                                           <td>$id</td>
                                                                           <td>$date</td>
                                                                           <td>$user_id</td>
                                                                           <td>$wallet</td>
                                                                           <td> <img style='width:50px' src='../images/wallet/$ps.svg'></td>
                                                                           <td>$sum</td>
                                                                           <td>$sbpnking</td>
                                       								 $stat
                                       								  </tr>
                                       ";
            }
            ?>
          </tbody>
        </table>
      </div>

    </div>





  </div>



<?php } else {
  header('Location: ../error404');
} ?>