<?
require("system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}



require("panels/header.php");
require("panels/sidebar.php");


?>

<body>
    <link href="/css/privacy.css" rel="stylesheet">

    <div class="main-container">
        <div class="privacy-container">
            <div class="privacy-inner">
                <div class="privacy-page">
                    <h3 style="margin-bottom: -10px;"><?= $translations['user_agreement'] ?></h3>
                    <hr>
                    <div class="terms__wrapper">
                        <div>
                            <div>
                                <div>
                                    <?= $translations['user_agreement_attention'] ?>
                                </div>
                            </div>
                            <hr>
                            <h4 style="margin-top: 10px;  font-weight: 500">
                                <?= $translations['terms_1'] ?>
                            </h4>
                        </div>
                        <div>
                            <div class="ter-n">
                                1.1
                            </div>
                            <div>
                                <?= $translations['terms_1_1'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                1.1.1
                            </div>
                            <div>
                                <?= $translations['terms_1_1_1'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                1.1.2
                            </div>
                            <div>
                                <?= $translations['terms_1_1_2'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                1.1.3
                            </div>
                            <div>
                                <?= $translations['terms_1_1_3'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                1.1.4
                            </div>
                            <div>
                                <?= $translations['terms_1_1_4'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                1.1.5
                            </div>
                            <div>
                                <?= $translations['terms_1_1_5'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                1.1.6
                            </div>
                            <div>
                                <?= $translations['terms_1_1_6'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                1.1.7
                            </div>
                            <div><span><?= $translations['coin'] ?></span> – <?= $translations['terms_1_1_7_1'] ?> – <span>N</span> <?= $translations['terms_1_1_7_2'] ?> – <span><?= $translations['coin'] ?></span> – <?= $translations['terms_1_1_7_3'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                1.1.8
                            </div>
                            <div>
                                <?= $translations['terms_1_1_8'] ?> <span><?= $translations['coin'] ?></span>.
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                1.1.9
                            </div>
                            <div>
                                <?= $translations['terms_1_1_9'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                1.2
                            </div>
                            <div>
                                <?= $translations['terms_1_2'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                1.3
                            </div>
                            <div>
                                <?= $translations['terms_1_3'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                1.4
                            </div>
                            <div>
                                <?= $translations['terms_1_4'] ?>
                            </div>
                        </div>

                        <div>
                            <h4 style="margin-top: 10px;  font-weight: 500">
                                2. <?= $translations['terms_2_header'] ?>
                            </h4>
                        </div>
                        <div>
                            <div class="ter-n">
                                2.1
                            </div>
                            <div>
                                <?= $translations['terms_2_1'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                2.2
                            </div>
                            <div>
                                <?= $translations['terms_2_2'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                2.3
                            </div>
                            <div>
                                <?= $translations['terms_2_3'] ?>
                            </div>
                        </div>

                        <div>
                            <h4 style="margin-top: 10px;  font-weight: 500">
                                3. <?= $translations['terms_3_header'] ?>
                            </h4>
                        </div>
                        <div>
                            <div class="ter-n">
                                3.1
                            </div>
                            <div>
                                <?= $translations['terms_3_1'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                3.2
                            </div>
                            <div>
                                <?= $translations['terms_3_2'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                3.2.1
                            </div>
                            <div>
                                <?= $translations['terms_3_2_1'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                3.3
                            </div>
                            <div>
                                <?= $translations['terms_3_3'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                3.3.1
                            </div>
                            <div>
                                <?= $translations['terms_3_3_1'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                3.3.2
                            </div>
                            <div>
                                <?= $translations['terms_3_3_2'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                3.3.3
                            </div>
                            <div>
                                <?= $translations['terms_3_3_3'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                3.4
                            </div>
                            <div>
                                При достижении 12ти месячного периода (подряд) отсутствия авторизации на Сайте от имени Администратора Пользователю направляется электронное уведомление о расторжении Соглашения.
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                3.4.1
                            </div>
                            <div>
                                <?= $translations['terms_3_4_1'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                3.4.2
                            </div>
                            <div>
                                <?= $translations['terms_3_4_2_1'] ?> – <span><?= $translations['coin'] ?></span>, <?= $translations['terms_3_4_2_2'] ?>.
                                <?= $translations['terms_3_4_2_3'] ?>
                            </div>
                        </div>

                        <div>
                            <h4 style="margin-top: 10px;  font-weight: 500">
                                4. <?= $translations['terms_4_header'] ?>
                            </h4>
                            <div>
                                <div class="ter-n">
                                    4.1
                                </div>
                                <div>
                                    <?= $translations['terms_4_1_1'] ?>
                                    <?= $translations['terms_4_1_2'] ?>
                                    <?= $translations['terms_4_1_3'] ?>
                                    <?= $translations['terms_4_1_4'] ?>
                                </div>
                            </div>
                            <div>
                                <div class="ter-n">
                                    4.2
                                </div>
                                <div>
                                    <?= $translations['terms_4_2_1'] ?> – <span><?= $translations['coin'] ?></span> <?= $translations['terms_4_2_2'] ?> <span><?= $translations['coin'] ?></span>.
                                </div>
                            </div>
                        </div>
                        <div>
                            <h4 style="margin-top: 10px;  font-weight: 500">
                                5. <?= $translations['terms_5_header'] ?>
                            </h4>
                        </div>
                        <div>
                            <div class="ter-n">
                                5.1
                            </div>
                            <div>
                                <?= $translations['terms_5_1_1'] ?> – <span><?= $translations['coin'] ?></span>. <?= $translations['terms_5_1_2'] ?> (<span><?= $translations['coin'] ?></span>). <?= $translations['terms_5_1_3'] ?> (<span><?= $translations['coin'] ?></span>) <?= $translations['terms_5_1_4'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                5.2
                            </div>
                            <div>
                                <?= $translations['terms_5_2_1d'] ?>

                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                5.2.1
                            </div>
                            <div>
                                <?= $translations['terms_5_2_1_1'] ?> – <span><?= $translations['coin'] ?></span>. <?= $translations['terms_5_2_1_2'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                5.3
                            </div>
                            <div>
                                <?= $translations['terms_5_3'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                5.4
                            </div>
                            <div><span><?= $translations['coin'] ?></span>, <?= $translations['terms_5_4'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                5.5
                            </div>
                            <div>
                                <?= $translations['terms_5_5'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                5.6
                            </div>
                            <div>
                                <?= $translations['terms_5_6_1'] ?> <span><?= $translations['coin'] ?></span> <?= $translations['terms_5_6_2'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                5.7
                            </div>
                            <div>
                                <?= $translations['terms_5_7'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                5.8
                            </div>
                            <div>
                                <?= $translations['terms_5_8_1'] ?>
                                <?= $translations['terms_5_8_2'] ?> (<span><?= $translations['coin'] ?>N</span>) <?= $translations['terms_5_8_2'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                5.9
                            </div>
                            <div>
                                <?= $translations['terms_5_9'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                5.10
                            </div>
                            <div>
                                <?= $translations['terms_5_10'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                5.11
                            </div>
                            <div>
                                <?= $translations['terms_5_11'] ?>
                            </div>
                        </div>
                        <div>
                            <h4 style="margin-top: 10px;  font-weight: 500">
                                6. <?= $translations['terms_6_header'] ?>
                            </h4>
                        </div>
                        <div>
                            <div class="ter-n">
                                6.1
                            </div>
                            <div>
                                <?= $translations['terms_6_1_1d'] ?> <span><?= $translations['coin'] ?></span> <?= $translations['terms_6_1_2d'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                6.2
                            </div>
                            <div>
                                <?= $translations['terms_6_2_1'] ?>
                                <?= $translations['terms_6_2_2'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                6.3
                            </div>
                            <div>
                                <?= $translations['terms_6_3'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                6.4
                            </div>
                            <div>
                                <?= $translations['terms_6_4_1'] ?>
                                <?= $translations['terms_6_4_2'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                6.5
                            </div>
                            <div>
                                <?= $translations['terms_6_5'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                6.6
                            </div>
                            <div>
                                <?= $translations['terms_6_6'] ?>
                            </div>
                        </div>
                        <div>
                            <h4 style="margin-top: 10px;  font-weight: 500">
                                7. <?= $translations['terms_7_header'] ?>
                            </h4>
                        </div>
                        <div>
                            <div class="ter-n">
                                7.1
                            </div>
                            <div>
                                <?= $translations['terms_7_1'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                7.2
                            </div>
                            <div>
                                <?= $translations['terms_7_2'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                7.3
                            </div>
                            <div>
                                <?= $translations['terms_7_3'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                7.3.1
                            </div>
                            <div>
                                <?= $translations['terms_7_3_1'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                7.3.2
                            </div>
                            <div>
                                <?= $translations['terms_7_3_2'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                7.3.3
                            </div>
                            <div>
                                <?= $translations['terms_7_3_3'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                7.3.4
                            </div>
                            <div>
                                <?= $translations['terms_7_3_4'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                7.3.5
                            </div>
                            <div>
                                <?= $translations['terms_7_3_5'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                7.3.6
                            </div>
                            <div>
                                <?= $translations['terms_7_3_6'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                7.3.7
                            </div>
                            <div>
                                <?= $translations['terms_7_3_7'] ?>
                            </div>
                        </div>
                        <div>
                            <h4 style="margin-top: 10px;  font-weight: 500">
                                8. <?= $translations['terms_8_header'] ?>
                            </h4>
                        </div>
                        <div>
                            <div class="ter-n">
                                8.1
                            </div>
                            <div>
                                <?= $translations['terms_8_1_1'] ?>
                                <?= $translations['terms_8_1_2_1'] ?> <span><?= $translations['coin'] ?></span> <?= $translations['terms_8_1_2_2'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                8.2
                            </div>
                            <div>
                                <?= $translations['terms_8_2'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                8.3
                            </div>
                            <div>
                                <?= $translations['terms_8_3'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                8.4
                            </div>
                            <div>
                                <?= $translations['terms_8_4'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                8.5
                            </div>
                            <div>
                                <?= $translations['terms_8_5'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                8.6
                            </div>
                            <div>
                                <?= $translations['terms_8_6'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                8.7
                            </div>
                            <div>
                                <?= $translations['terms_8_7'] ?>
                            </div>
                        </div>
                        <div>
                            <h4 style="margin-top: 10px;  font-weight: 500">
                                9. <?= $translations['terms_9_header'] ?>
                            </h4>
                        </div>
                        <div>
                            <div class="ter-n">
                                9.1
                            </div>
                            <div>
                                <?= $translations['terms_9_1'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                9.2
                            </div>
                            <div>
                                <?= $translations['terms_9_2_1'] ?>
                                <?= $translations['terms_9_2_2'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                9.3
                            </div>
                            <div>
                                <?= $translations['terms_9_3'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                9.4
                            </div>
                            <div>
                                <?= $translations['terms_9_4'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                9.5
                            </div>
                            <div>
                                <?= $translations['terms_9_5_2'] ?>
                                <?= $translations['terms_9_5_2'] ?>
                            </div>
                        </div>
                        <div>
                            <h4 style="margin-top: 10px;  font-weight: 500">
                                10. <?= $translations['terms_10_header'] ?>
                            </h4>
                        </div>
                        <div>
                            <div class="ter-n">
                                10.1
                            </div>
                            <div>
                                <?= $translations['terms_10_1'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                10.2
                            </div>
                            <div>
                                <?= $translations['terms_10_2'] ?>
                            </div>
                        </div>
                        <div>
                            <h4 style="margin-top: 10px;  font-weight: 500">
                                11. <?= $translations['terms_11_header'] ?>
                            </h4>
                        </div>
                        <div>
                            <div class="ter-n">
                                11.1
                            </div>
                            <div>
                                <?= $translations['terms_11_1'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                11.2
                            </div>
                            <div>
                                <?= $translations['terms_11_2'] ?>
                            </div>
                        </div>
                        <div>
                            <div class="ter-n">
                                11.3
                            </div>
                            <div>
                                <?= $translations['terms_11_3'] ?>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <?
    require("panels/footer.php");
    ?>
</body>

</html>