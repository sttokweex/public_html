<?
require (dirname(__DIR__, 2)."/system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require (dirname(__DIR__, 1)."/additionally/header.php");

   $sql_select5 = "SELECT * FROM promo ORDER BY id + 0 DESC";
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

<body>
<div class="container">

<div class="admin-card">
    <div class="header">Промокоды  <button class='buttonProject abs-btn' data-toggle="modal" data-target="#createPromocode">Создать промокод</button> <div class="bord"></div></div>
<!-- CONTENT -->

                           <div class="table-responsive" id="promo-table">
                              <table class="table table-striped table-dark">
                                 <thead>
                                    <tr>
                                       <th scope="col">ID</th>
                                       <th scope="col">Дата</th>
                                       <th scope="col">Название</th>
                                       <th scope="col">Сумма</th>
                                       <th scope="col" >Активаций</th>
                                       <th scope="col">Тип</th>
                                       <th scope="col">Удалить</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       while($row = mysqli_fetch_array($result5)) {
                                       $id = $row['id'];
                                       $date = $row['date'];
                                       $name = $row['name'];
                                       $sum = $row['sum'];
                                       $active = $row['active'];
                                       $actived = $row['actived'];
                                       $type = $row['type'];



                                       echo "
                                                                         <tr>
                                                                           <td>$id</td>
                                                                           <td>$date</td>
                                                                           <td>$name</td>
                                                                           <td>$sum</td>
                                                                           <td>$active / $actived</td>
                                                                           <td>$type</td>
                                                                           <td onclick='del_promo(".$id.")' style='color: blue;'><button class='buttonProject'>Удалить</button></td>
                                       								  </tr> ";
                                       }


                                         ?>
                                 </tbody>
                              </table>
                           </div>

</div>





</div>


</body>
</html>
<?php } else { header('Location: ../error404'); } ?>
