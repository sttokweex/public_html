<?
require (dirname(__DIR__, 2)."/system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require (dirname(__DIR__, 1)."/additionally/header.php");

   $sql_select5 = "SELECT * FROM users";
   $result5 = mysqli_query($connection,$sql_select5);
   $sql_select1 = "SELECT COUNT(*) FROM users";
   $result1 = mysqli_query($connection,$sql_select1);
   $row = mysqli_fetch_array($result1);
   if($row)
   {
   $users_count = $row['COUNT(*)'];
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

<body>

    <!-- Datatable plugin CSS file -->
    <link rel="stylesheet" href=
"../css/jquery.dataTables.min.css" />
      <!-- Datatable plugin JS library file -->
     <script type="text/javascript" src=
"../js/jquery.dataTables.min.js">
     </script>

<div class="container">
<style>.avatar{border-radius: 10px;width: 30px;margin-left:10px;}</style>
<div class="admin-card">
    <div class="header">Пользователи (всего: <?=$users_count?>)   <div class="bord"></div></div>
<!-- CONTENT -->

                           <div class="table-responsive" id="users-block">
                              <table class="table table-striped table-dark" id="us-table">
                                 <thead>
                                    <tr>
                                <th class="tbl-name">ID</th>
                                       <th class="tbl-name ">Логин</th>
                                       <th class="tbl-name ">WAGER</th>
                                       <th class="tbl-name">Баланс</th>
                                       <th class="tbl-name">VK</th>
                                       <th class="tbl-name">TG</th>
                                       <th class="tbl-name">Статус</th>
                                       <th class="tbl-name text-center">Действия</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       while($row = mysqli_fetch_array($result5)) {
                                           $id = $row['id'];
                                       $userwager = $row['wager'];
                                       $img = $row['img'];
                                       $login = $row['login'];
                                       $names = $row['login'];

                                       $social = $row['hash'];
                                       $balance = $row['balance'];
                                       $ban = $row['ban'];
                                       $admin = $row['admin'];
                                       $imgs = $row['img'];
                                       $ip = $row['ip'];
                                       $tg = $row['tg'];

                                       if($tg == 0){
                                           $tg = 'Нет';
                                       }
                                       if($tg == 1){
                                           $tg = 'Да';
                                       }
                                       $balance = round($balance, 2);

                                       if($admin == 1) {
                                        $prava = "Админ";
                                       }
                                       if($admin == 0) {
                                        $prava = "Игрок";
                                       }
                                       if($login != '') {
                                         $name = $login;
                                       }
                                       if($social == '') {
                                         $stat_social = '<font color="red">Не привязан</font>';
                                       }
                                       if($social != '') {
                                        $stat_social = 'Перейти';
                                       }

                                       if($ban == 1) {
                                        $button_ban = "<button class='additionalBtn text-danger fw-bold' style='width: 100%;height: 30px;margin-bottom: 0px;padding-top: 3px;margin-bottom:5px;' onclick="."unban_adm('$id')"."><h6 class='mob-b-t'>Разбан</h6></button>";
                                        $status = "Да";
                                        $ban_icon = "<i class='fa fa-lock' aria-hidden='true' style='color:orange; margin-top:5px;margin-left:5px;' id='icon-$id'></i>";
                                       }
                                       if($ban == 0) {
                                        $button_ban = "<button class='additionalBtn text-success fw-bold' style='width: 100%;height: 30px;margin-bottom: 0px;padding-top: 3px;margin-bottom:5px;' onclick="."ban_adm('$id');"."><h6 class='mob-b-t'>Бан</h6></button>";
                                        $status = "Нет";
                                        $ban_icon = "";
                                       }
                                       echo "<tr role='row' class='odd' >
                                       <td>$id</td>
                                       <td><span id='$id'>$name <img class='avatar' src='$imgs;' > $ban_icon</span></td>
                                       <td>$userwager</td>
                                       <td>$balance</td>
                                       <td><a href='$social' target='_blank'>$stat_social</a></td>
                                       <td>$tg</td>
                                       <td>$prava</td>
                                       <td>
                                       <button class='additionalBtn' style='color:var(--main-color-hight);width: 100%;height: 30px;margin-bottom: 0px;padding-top: 3px;' onclick="."location.href='/admin/userInfo?id=$id'"."><h6 class='mob-b-t'>Подробнее</h6></button>

                                         </td>

                                       </tr>";
                                       }


                                         ?>
                                 </tbody>
                              </table>
                           </div>

</div>





</div>

<script>
         $(document).ready(function() {
            $('#us-table').DataTable({
                pageLength : 10,
    lengthMenu: [[10, 20, 50], [10, 20, 50]],
            });
        });
</script>
</body>
</html>
<?php } else { header('Location: ../error404'); } ?>
