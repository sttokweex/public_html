<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} elseif (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
} else {
    $lang = 'en';
}
$allowed = ['en','es','ru'];
if (!in_array($lang, $allowed, true)) {
    $lang = 'en';
}

// подключаем файл перевода
$path = dirname(__DIR__) . "/lang/{$lang}.php";
if (is_file($path)) {
    $translations = require $path;
} else {
    // страховка: если файла нет — грузим en
    $translations = require dirname(__DIR__) . "/lang/en.php";
}
?>

<script src="/js/chat.js?v=1" crossorigin="anonymous"></script> 
<link rel="stylesheet" href="/css/chat.css" crossorigin="anonymous"/>
<style>
    .chat-box-item{
    /* background: #23242f!important;  */
    margin-right:0px!important;
    }
    .chatGoBlock{
    width: 100%;
    background: transparent;
    display: flex;    
    }
    .chatGoBlock button{
    border-radius: 0px 8px 8px 0px;
    background: #272731;
    outline: none;
    border: none;
    color: var(--main-color-medium);
    width: 50px;    
    }
    .input-chat-go{
background: var(--main-background);
    width: 100%;
    border: none;
    outline: none;
    border-radius: 8px 0px 0px 8px;
    padding: 10px;
    color: var(--main-color-hight);        
    }
    .navs {
right: 0 !important;
    min-width: 280px;
    width: 280px;
    top: 80px;
    z-index: 3;
    bottom: 0;
    height: calc(100% - 80px);
    }
    



 .chat-mess {
    display: grid;
    gap: 5px;
}   
.chat-mess-mess {
    color: #ffffff !important;
    font-size: 13px;
    background: #2a2b37 !important;
    padding: 10px 15px 10px 15px;
    border-radius: 8px;
    width: fit-content;
word-wrap: break-word;
word-break:break-word;
}





@media screen and (max-width:1800px) {
    
.navs1{
      width: 185px;  
      min-width: 185px;
}

}

@media screen and (max-width:1600px) {
    
.navs{
     display:none;
}

}


.chatHeaderInfo{
background: var(--main-background);
    border-radius: 8px;
    margin-bottom: 20px;
    padding: 10px;
    display: flex;
    justify-content: space-between;    
       position: relative;
}
.chatHeaderInfoCountry{
color: var(--main-color-medium);
    display: flex;
    gap: 10px;
    align-items: center;    
}
.chatHeaderInfoCountry img{
    width: 24px;
    border-radius: 100px;    
}


.chatHeaderInfoOnline{
display: flex;
    color: var(--main-color-medium);
    align-items: center;
    position: absolute;
    right: 10;
    top: 0;
    bottom: 0;    
}

</style>
<!-- чат start -->

                   <input for="navs-toggle" type="checkbox" id="navs-toggle" hidden>
    <nav class="navs" style="background: var(--main-background3);">
        <center onclick="window.location.href='/'" class="desktop-nav" style="display:none;cursor:pointer;font-weight: 600;padding: 5px;color: #fff;font-size: 25px;">ЧАТ</center>

<div class="chatHeaderInfo">

<div class="chatHeaderInfoCountry">
    <span><?= $translations['online'] ?></span>
</div>    

<div class="chatHeaderInfoOnline">
   <div class="heading__icon  heading__icon_pulsing" style="    margin-right: 14px; width: 6px;height: 6px;"></div>
   <?$chat_online = rand(100,500);?>
    <span><?=$chat_online?></span>
</div>    
    
</div>


<div style="width:100%;background: var(--main-nav)!important;height: calc(100% - 130px); overflow:hidden;padding: 0px;padding-bottom: 20px;" class='chat-main'>
        <!-- Вот в этих 2-х div-ах будут идти наши сообщения из чата -->
        <div class="chat r4" style="overflow:hidden;">
     
                 <strong><div style="padding:5px" id="chat_area"><!-- Сюда мы будем добавлять новые сообщения --></div></strong>
        </div></div>
        
        
 
 <div class="chatGoBlock">
     <input maxlength="100" class="input-chat-go" placeholder="<?= $translations['enter_text'] ?>..." autocomplete="off" id="inputChat1" onkeydown="if(event.keyCode==13){ addChat(1); }">
     <button onclick="addChat(1);"><img style="width: 22px;filter: invert(1);opacity: 0.2;" src="../images/send_mess.png"></button>
 </div>
 

    </nav>
<!-- чат end -->