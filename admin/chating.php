<?
require (dirname(__DIR__, 1)."/system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require ("additionally/header.php");

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
 <script src="js/chat_js.js"></script>
<body>
<div class="container">

<div class="admin-card">
    <div class="header">Чат  <div class="bord"></div></div>
<!-- CONTENT -->



    <nav class="navs" style="background: var(--main-background3);">

<div style="width:100%;background: var(--main-nav)!important;height: calc(100% - 50px); overflow:hidden;padding: 0px;padding-bottom: 20px;" class='chat-main'>
        <!-- Вот в этих 2-х div-ах будут идти наши сообщения из чата -->
        <div class="chat r4" style="overflow:hidden;">

                 <strong><div style="padding:5px" id="chat_area"><!-- Сюда мы будем добавлять новые сообщения --></div></strong>
        </div>
</div>

 <div class="chatGoBlock">
     <input maxlength="100" class="input-chat-go" placeholder="сообщение" autocomplete="off" id="inputChat1" onkeydown="if(event.keyCode==13){ addChat(1); }">
     <button onclick="addChat(1);"><img style="width: 22px;filter: invert(1);opacity: 0.2;" src="../images/send_mess.png"></button>
 </div>


    </nav>

<style>
.chatManage{
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(450px, 1fr));
    grid-column-gap: 35px;
    gap: 35px;
}
.chatManage .option{
display: grid;
    gap: 20px;
    background: var(--main-background3);
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px #00000042;
}
</style>
<hr>
<div class="chatManage">

<div class="option">
Создать промокод в чат (5р 30акт)
<input class="main-form-input" id="chatpromokodname" placeholder="Название промокода">
<button class="buttonProject w100" onClick="chatPromik();">Создать</button>
</div>

<div class="option">
Системное сообщение
<input class="main-form-input" id="chatsystemmessage" placeholder="Текст сообщения">
<button class="buttonProject w100" onClick="chatSystemmess();">Отправить</button>
</div>

<div class="option">
Забанить пользователя в чате
<input class="main-form-input" id="chatbanid" placeholder="Айди пользователя">
<button class="buttonProject w100" onClick="chatGoBan();">Заблокировать</button>
</div>

<div class="option">
Разбанить пользователя в чате
<input class="main-form-input" id="chatunbanid" placeholder="Айди пользователя">
<button class="buttonProject w100" onClick="chatGoUnBan();">Разблокировать</button>
</div>

</div>


<div>
 <span>Отправить фейк сообщение в чат</span>
<input class="main-form-input" id="fakemessage" placeholder="Сообщение">
<button class="buttonProject w100" onClick="fakeChatMess();">Отправить</button>
</div>


<script>

    function fakeChatMess() {
         $.ajax({
         type: 'POST',
         url: 'admin_func.php',

         beforeSend: function() {
                 },
         data: {
         type: "fakeChatMessage",
            fakemessage: $("#fakemessage").val()
         },
         success: function(data) {
             var obj = jQuery.parseJSON(data);
             if (obj.success == "success") {
                 toastr['success']('Сообщение отправлено!')
             }else{
                 toastr['error'](obj.error)


                                             }
                                         }
         });
         }


 function chatPromik(){
 let nameprom = $('#chatpromokodname').val();
 let command = '/promo ';
 if(nameprom == ''){
toastr['error']('Введите название промокода!')
 }else{
 $('#inputChat1').val(command+nameprom);
 addChat(1);
 }
}

 function chatSystemmess(){
 let mess = $('#chatsystemmessage').val();
 let command = '/sys ';
  if(mess == ''){
toastr['error']('Введите сообщение!')
 }else{
 $('#inputChat1').val(command+mess);
 addChat(1);
 }
 }
 function chatGoBan(){
 let iduser = $('#chatbanid').val();
 let command = '/ban ';
   if(iduser == ''){
toastr['error']('Введите айди пользователя!')
 }else{
 $('#inputChat1').val(command+iduser);
 addChat(1);
 }
 }

 function chatGoUnBan(){
 let iduser = $('#chatunbanid').val();
 let command = '/unban ';
   if(iduser == ''){
toastr['error']('Введите айди пользователя!')
 }else{
 $('#inputChat1').val(command+iduser);
 addChat(1);
 }
 }

</script>

</div>

<br>



</div>


</body>
</html>
<?php } else { header('Location: ../error404'); } ?>
