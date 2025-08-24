<?php
include ("../../system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$systemimg = "../images/logo-mob.png";
$sid = $_SESSION['hash'];
//данные чата
$query = ("SELECT * FROM `chat`");
$result = mysqli_query($connection,$query);
$getChat = mysqli_fetch_array($result);
$chatLogin = $getChat['login'];
$chatPhoto = $getChat['photo'];
$mess = $getChat['mess'];

//данные юзера
$query = ("SELECT * FROM `users` WHERE `hash` = '$sid'");
$result = mysqli_query($connection,$query);
$userInfo = mysqli_fetch_array($result);

$idu = $userInfo['id'];
$login = $userInfo['login'];;
$prava = $userInfo['admin'];
$photo = $userInfo['img'];
$ban = $userInfo['chat_ban'];
if (isset($_POST['chatGet']) == "ok")
{
    if ($prava == 0)
    {
        $query = ("SELECT * FROM `chat`");
        $result = mysqli_query($connection,$query);
        while (($chat = mysqli_fetch_array($result)))
        {
            $chatLogin = $chat['login'];
            $mess = $chat['mess'];
            $idUsersChat = $chat['id_users'];
            $photo = $chat['photo'];
            $p .= '<div class="chat-box-item">
    <div class="chat-avatar"><img class="chat-avatar" style="box-shadow: 0 0 0 0.2rem rgba(0,0,0,.2);cursor:pointer" src="' . $photo . '"></div>
    <div class="chat-mess">
     <div class="chat-mess-name">
    <div>' . $chatLogin . '</div>
     </div>
     <div class="chat-mess-mess">
    ' . $mess . '
     </div>
    </div>
  </div>';
        }
    }
    if ($prava == 1 || $prava == 2)
    {
        $query = ("SELECT * FROM `chat`");
        $result = mysqli_query($connection,$query);
        while (($chat = mysqli_fetch_array($result)))
        {
            $chat_id = $chat['id'];
            $vk_id = $chat['vk_id'];
            $chatLogin = $chat['login'];
            $mess = $chat['mess'];
            $idUsersChat = $chat['id_users'];
            $photo = $chat['photo'];
            $idl = $chat['id_users'];
            $query1 = ("SELECT * FROM `users` WHERE `id` = '$idl'");
            $result1 = mysqli_query($connection,$query1);
            $userInff = mysqli_fetch_array($result1);

            $loginban = $userInff['login'];;
            $ban = $userInff['chat_ban'];
            if ($idUsersChat == 0)
            {
                $fa = "";
                $sup = "";
            }
            if ($idUsersChat != 0)
            {
                if ($ban == 1)
                {
                    $fa = "<p onclick='noblockUsers(" . $idl . ")' style='margin-bottom: 0px;'>Разбан</p>";
                }
                if ($ban == 0)
                {
                    $fa = "<p onclick='blockUsers(" . $idl . ");' style='margin-bottom: 0px;'>Бан</p>";
                }
                if ($prava == 1)
                {
                    $sup = "<i class='fa fa-life-ring' style='cursor:pointer; color:orange;' title='Выдать права модератора' onclick='mod(" . $idl . ");'></i>";
                }
            }
            $p .= '<div class="chat-box-item">
     <div class="chat-avatar"><img class="chat-avatar" style="box-shadow: 0 0 0 0.2rem rgba(0,0,0,.2);cursor:pointer" src="' . $photo . '"></div>
     <div class="chat-mess">
      <div class="chat-mess-name">
     <div style="cursor: pointer"><span onclick=\'var u = $(this); $("#inputChat1").val(u.text() + ", "); $("#inputChat1").focus(); return false;\'>' . $chatLogin . '</span></div>
      </div>
      <div class="chat-mess-mess">
     ' . $mess . '
      </div>

      <div class="chat-mess-mess" style="display: flex;gap: 10px;">
     <button class="btn chatButtonAd" onclick="delMess(' . $chat_id . ');">Удалить</button><button class="btn chatButtonAd">' . $fa . '</button>
      </div>

     </div>
   </div>';
        }
    }

    $obj = array(
        "chat" => "$p"
    );
}
if (isset($_POST['mess']))
{
    $mess = $_POST['mess'];
    $image = explode('/simg', $mess) [1];
    $unid = explode('/unban', $mess) [1];
    $banid = explode('/ban', $mess) [1];
    $sys = explode('/sys', $mess) [1];
    $promo = explode('/promo ', $mess) [1];
    if ($ban != 1)
    {
        $query = ("SELECT * FROM `kot_admin`");
        $resultad = mysqli_query($connection,$query);
        $admin = mysqli_fetch_array($resultad);
        $chat = $admin['chat'];

        if ($chat == 0)
        {

            $mess = htmlspecialchars($mess);
            $query = ("SELECT * FROM `users` WHERE `hash`= '$sid'");
            $result = mysqli_query($connection,$query);
            $token = mysqli_num_rows($result);
            if ($token != null)
            {

                if ($prava == "1")
                {
                    $colorNickname = 'style="color: #f95b56;font-weight: 600"';
                    $avaBorder = "border: 3px solid #f95b56;";
                }
                if ($prava == "0")
                {
                    $colorNickname = 'style="color: #ffc943;font-weight: 600"';
                    $avaBorder = "border: 3px solid #ffc943;";
                }
                if ($prava == "2")
                {
                    $colorNickname = 'style="color: #28a392;font-weight: 600;"';
                    $avaBorder = "border: 3px solid #28a392;";
                }

                $login = '<span ' . $colorNickname . '>' . $login . '</span>';
                if ($photo == '')
                {
                    $photo = "https://vk.com/images/camera_100.png?ava=1";
                }
                if (!$unid && !$image && !$banid && !$sys && !$promo)
                {
                    $query = mysqli_query($connection,"INSERT INTO `chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','$vk_id','$idu')");
                }
                if ($prava == 1 || $prava == 2)
                {
                    if ($promo)
                    {
                        $datas = date("d.m.Y");
                        $datass = date("H:i:s");
                        $data = "$datas $datass";

                        $ChatPromoSum = '5'; //сумма промокода создаваемая в чате
                        $ChatPromoAct = '30'; //кол-во акт промокода создаваемая в чате
                        $quer = mysqli_query($connection,"INSERT INTO `promo` (`id`, `date`, `name`, `sum`, `active`, `actived`, `id_active`) VALUES (NULL, '$data', '$promo', '$ChatPromoSum', '$ChatPromoAct', '0', '');");
                        $login = '<span style="color: #ffc943;font-weight: 600">' . $sitename . '</span>';
                        $mess = '<span style="font-weight: 700">Промокод ' . $promo . ' <br>Активаций: ' . "$ChatPromoAct" . '<br>Сумма: ' . "$ChatPromoSum" . '</span>';
                        $photo = $systemimg;
                        $query1 = mysqli_query($connection,"INSERT INTO `chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/','none')");
                    }
                    if ($sys)
                    {
                        $login = '<span style="color: #ffc943;font-weight: 600">' . $sitename . '</span>';
                        $mess = '<span style="font-weight: 700">' . $sys . '</span>';
                        $photo = $systemimg;
                        $query1 = mysqli_query($connection,"INSERT INTO `chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/','none')");
                    }
                    if ($unid)
                    {
                        $query = ("SELECT * FROM `users` WHERE `id` = '$unid'");
                        $result = mysqli_query($connection,$query);
                        $userInf = mysqli_fetch_array($result);
                        $unlog = $userInf['login'];
                        $adm = $userInf['admin'];
                        $unban = mysqli_query($connection,"UPDATE users SET chat_ban = 0 WHERE id = '$unid'");
                        $login = '<span style="color: #ffc943;font-weight: 600">' . $sitename . '</span>';
                        $mess = '<span style="font-weight: 700">Игрок <font color="#ffc943">' . $unlog . '</font> разблокирован.</span>';
                        $photo = '../images/logo-mob.png';
                        $query = mysqli_query($connection,"INSERT INTO `chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/','none')");

                    }
                    if ($banid)
                    {
                        $query = ("SELECT * FROM `users` WHERE `id` = '$banid'");
                        $result = mysqli_query($connection,$query);
                        $userInf = mysqli_fetch_array($result);
                        $banlog = $userInf['login'];
                        $adm = $userInf['admin'];
                        if ($prava == 2 && $adm == 1 || $prava == 2 && $adm == 2 || $prava == 1 && $adm == 1)
                        {
                            $login = '<span style="color: #ffc943;font-weight: 600">' . $sitename . '</span>';
                            $mess = '<span style="font-weight: 700">Игрок <font color="#ffc943">' . $banlog . '</font> не может быть заблокирован.</span>';
                            $photo = $systemimg;
                            $query1 = mysqli_query($connection,"INSERT INTO `chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/','none')");
                        }
                        if ($prava == 2 && $adm == 2 || $prava == 2 && $adm == 0 || $prava == 1 && $adm == 2 || $prava == 1 && $adm == 0)
                        {
                            $ban = mysqli_query($connection,"UPDATE users SET chat_ban = 1 WHERE id = '$banid'");
                            $login = '<span style="color: #ffc943;font-weight: 600">' . $sitename . '</span>';
                            $mess = '<span style="font-weight: 700">Игрок <font color="#ffc943">' . $banlog . '</font> заблокирован навсегда!</span>';
                            $photo = '../images/logo-mob.png';
                            $query = mysqli_query($connection,"INSERT INTO `chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/','none')");
                        }
                    }
                    if ($image)
                    {
                        $img = '<p><img src=' . $image . ' style="max-width:100%;height:100px"></p>';
                        $login = '<span style="color: #ffc943;font-weight: 600">' . $sitename . '</span>';
                        $mess = '<span style="font-weight: 700">' . $img . '</span>';
                        $photo = '../images/logo-mob.png';
                        $query = mysqli_query($connection,"INSERT INTO `chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/','none')");
                    }
                }
                if ($mess == '/clear')
                {
                    if ($prava == 1 || $prava == 2)
                    {
                        $query = mysqli_query($connection,"TRUNCATE `chat`");
                        $login = '<span style="color: #ffc943;font-weight: 600">' . $sitename . '</span>';
                        $mess = '<span style="font-weight: 700">Чат очищен администрацией</span>';
                        $photo = '../images/logo-mob.png';
                        $query = mysqli_query($connection,"INSERT INTO `chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/','none')");
                    }
                }

            }
            else
            {
                $obj = array(
                    "good" => "false",
                    "mess" => "Авторизуйтесь"
                );
            }
        }
        else
        {
            $obj = array(
                "good" => "false",
                "mess" => "Чат недоступен"
            );
        }
    }
    else
    {
        $obj = array(
            "good" => "false",
            "mess" => "Вы заблокированы"
        );
    }

}
if (isset($_POST['del']))
{
    $del = $_POST['del'];
    if ($prava == 1 || $prava == 2)
    {
        $query = mysqli_query($connection,"DELETE FROM `chat` WHERE `id` = '$del'");
    }
}
if (isset($_POST['chat_ban']))
{
    $chat_ban = $_POST['chat_ban'];
    if ($prava == 1 || $prava == 2)
    {
        $query = ("SELECT * FROM `users` WHERE `id` = '$chat_ban'");
        $result = mysqli_query($connection,$query);
        $userInf = mysqli_fetch_array($result);
        $is_admin = $userInf['admin'];
        $loginban = $userInf['login'];;
        $ban = $userInf['chat_ban'];

        if ($prava < $is_admin || $is_admin == 0)
        {

            $query1 = mysqli_query($connection,"UPDATE `users` SET `admin` = '0' WHERE `id` = '$chat_ban'");

            $query = mysqli_query($connection,"UPDATE `users` SET `chat_ban` = '1' WHERE `id` = '$chat_ban'");

            $login = '<span style="color: #ffc943;font-weight: 600">' . $sitename . '</span>';
            $mess = '<span style="font-weight: 700">Пользователь <font color="red">' . $loginban . '</font> заблокирован в чате</span>';
            $photo = $systemimg;
            $query1 = mysqli_query($connection,"INSERT INTO `chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/','none')");
        }
        if ($prava == $is_admin)
        {
            $error = 1;
        }
        if ($error == 1 || $prava == 0 && $is_admin == 2 || $is_admin == 1 && $prava == 2)
        {
            $login = '<span style="color: #ffc943;font-weight: 600">' . $sitename . '</span>';
            $mess = '<span style="font-weight: 700">Пользователь <font color="red">' . $loginban . '</font> не может быть заблокирован в чате, т.к его уровень прав выше или равен вашему!</span>';
            $photo = $systemimg;
            $query1 = mysqli_query($connection,"INSERT INTO `chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/','none')");
        }
    }
}
if (isset($_POST['no_chat_ban']))
{
    $chat_ban = $_POST['no_chat_ban'];
    $query = ("SELECT * FROM `users` WHERE `id` = '$chat_ban'");
    $result = mysqli_query($connection,$query);
    $userInf = mysqli_fetch_array($result);
    $loginban = $userInf['login'];;
    $ban = $userInf['chat_ban'];

    if ($prava == 1 || $prava == 2)
    {
        $query = mysqli_query($connection,"UPDATE `users` SET `chat_ban` = '0' WHERE `id` = '$chat_ban'");
        if ($ban == 1)
        {
            $login = '<span style="color: #ffc943;font-weight: 600">' . $sitename . '</span>';
            $mess = '<span style="font-weight: 700">Пользователь <font color="green">' . $loginban . '</font> разблокирован в чате</span>';
            $photo = $systemimg;
            $query1 = mysqli_query($connection,"INSERT INTO `chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/','none')");
        }
    }
}
if (isset($_POST['moder']))
{
    $idm = $_POST['moder'];
    $query = ("SELECT * FROM `users` WHERE `id` = '$idm'");
    $result = mysqli_query($connection,$query);
    $userInf = mysqli_fetch_array($result);
    $loginm = $userInf['login'];;
    $is_admin = $userInf['admin'];
    if ($prava == 1)
    {
        if ($is_admin == 0 && $is_admin != 1)
        {
            $query = mysqli_query($connection,"UPDATE `users` SET `admin` = '2' WHERE `id` = '$idm'");

            $login = '<span style="color: #ffc943;font-weight: 600">' . $sitename . '</span>';
            $mess = '<span style="font-weight: 700">Пользователь <font color="blue">' . $loginm . '</font> назначен модератором в чате!</span>';
            $photo = $systemimg;
            $query1 = mysqli_query($connection,"INSERT INTO `chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/','none')");

        }
        if ($is_admin == 1)
        {
            $login = '<span style="color: #ffc943;font-weight: 600">' . $sitename . '</span>';
            $mess = '<span style="font-weight: 700">Пользователь <font color="blue">' . $loginm . '</font> не может быть назначен модератором в чате, т.к его уровень прав выше или равен данному!</span>';
            $photo = $systemimg;
            $query1 = mysqli_query($connection,"INSERT INTO `chat` (`login`,`photo`,`mess`,`vk_id`,`id_users`) VALUES ('$login','$photo','$mess','https://vk.com/','none')");
        }
    }
}

echo json_encode($obj);
?>
