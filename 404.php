<?
require("system/config.php");
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
$allowed = ['en', 'es', 'ru'];
if (!in_array($lang, $allowed, true)) {
    $lang = 'en';
}

// подключаем файл перевода
$path = __DIR__ . "/lang/{$lang}.php";
if (is_file($path)) {
    $translations = require $path;
} else {
    // страховка: если файла нет — грузим en
    $translations = require __DIR__ . "/lang/ru.php";
}

require("panels/header.php");
require("panels/sidebar.php");
require("panels/chat.php");
?>

<body>


    <div class="container">

        <style>
            .notfoundimage {
                width: 500px;
                height: 500px;
                justify-items: center;
                justify-content: center;
                display: flex;
                margin: 0 auto;
                outline: none;
                user-select: none;
            }

            .notfoundtext {
                text-align: center;
                color: #fff;
                font-size: 32px;
            }

            .notfoundblock {
                justify-content: center;
                display: grid;
                gap: 20px;
            }
        </style>
        <div class="notfoundblock">
            <img class="notfoundimage" src="/images/404/notfound.png">
            <span class="notfoundtext"><?= $translations['page_not_found'] ?></span>
        </div>
    </div>


    <?
    require("panels/footer.php");
    ?>
</body>

</html>