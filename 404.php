<?
require("system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}


require("panels/header.php");
require("panels/sidebar.php");

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