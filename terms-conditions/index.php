<?php
require(dirname(__DIR__, 1) . "/system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
require(dirname(__DIR__, 1) . "/panels/header.php");
require(dirname(__DIR__, 1) . "/panels/sidebar.php");
?>

<div class="main-container" id="main-content">
  <div class="" data-web-content-id="GENERAL_TERMS">
    <article>
      <div class="col-mob-4 col-dsk-8 Articles__articles--12Q">
        <article class="Articles__article--3SO">
          <div class="Articles__content--2Mi ">
            <article>
              <h1 class="Headings__head--2LV Headings__bold--iD3 Headings__h1--284 Headings__dark--1eH" style="color: rgb(251, 37, 141);">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['terms_and_conditions_title']; ?>
                  </font>
                </font>
              </h1>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['intro_text']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <strong>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['section_1_definitions']; ?>
                    </font>
                  </font>
                </strong>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['definitions_text']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <strong>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['account_term']; ?>
                    </font>
                  </font>
                </strong>
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['account_definition']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <strong>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['cruks_term']; ?>
                    </font>
                  </font>
                </strong>
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['cruks_definition']; ?>
                    <em><?php echo $translations['cruks_dutch']; ?></em>
                    <?php echo $translations['cruks_definition_continue']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <strong>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['customer_service_term']; ?>
                    </font>
                  </font>
                </strong>
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['customer_service_definition']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <strong>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['game_rules_term']; ?>
                    </font>
                  </font>
                </strong>
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['game_rules_definition']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <strong>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['games_term']; ?>
                    </font>
                  </font>
                </strong>
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['games_definition']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <strong>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['holland_casino_term']; ?>
                    </font>
                  </font>
                </strong>
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['holland_casino_definition']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <strong>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['player_term']; ?>
                    </font>
                  </font>
                </strong>
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['player_definition']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <strong>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['terms_and_conditions_term']; ?>
                    </font>
                  </font>
                </strong>
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['terms_and_conditions_definition']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <strong>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['website_term']; ?>
                    </font>
                  </font>
                </strong>
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['website_definition']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <strong>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['section_2_general_provisions']; ?>
                    </font>
                  </font>
                </strong>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['general_provisions_2_1']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['general_provisions_2_2']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['general_provisions_2_3']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['general_provisions_2_4']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['general_provisions_2_5']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['general_provisions_2_6']; ?>
                    <u><?php echo $translations['general_provisions_2_6_underline']; ?></u>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <strong>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['section_3_account_registration']; ?>
                    </font>
                  </font>
                </strong>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['account_registration_3_1']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['account_registration_3_2']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['account_registration_3_3']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['account_registration_3_4']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['account_registration_3_5']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['account_registration_3_6']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['account_registration_3_7']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['account_registration_3_8']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['account_registration_3_9']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['account_registration_3_10']; ?>
                    <em><?php echo $translations['bsn_dutch']; ?></em>
                    <?php echo $translations['account_registration_3_10_continue']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['account_registration_3_11']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['account_registration_3_12']; ?>
                    <em><?php echo $translations['bsn_dutch']; ?></em>
                    <?php echo $translations['account_registration_3_12_continue']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['account_registration_3_13']; ?>
                    <em><?php echo $translations['terrorism_act_dutch']; ?></em>
                    <?php echo $translations['account_registration_3_13_and']; ?>
                    <em><?php echo $translations['terrorism_act_1977_dutch']; ?></em>
                    <?php echo $translations['account_registration_3_13_continue']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['account_registration_3_14']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['account_registration_3_15']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['account_registration_3_16']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['account_registration_3_17']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['account_registration_3_18']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <strong>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['section_4_deposits_withdrawals']; ?>
                    </font>
                  </font>
                </strong>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['deposits_withdrawals_4_1']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['deposits_withdrawals_4_2']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['deposits_withdrawals_4_3']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['deposits_withdrawals_4_4']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['deposits_withdrawals_4_5']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['deposits_withdrawals_4_5_1']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['deposits_withdrawals_4_5_2']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['deposits_withdrawals_4_5_3']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['deposits_withdrawals_4_6']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['deposits_withdrawals_4_7']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['deposits_withdrawals_4_8']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['deposits_withdrawals_4_9']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['deposits_withdrawals_4_10']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['deposits_withdrawals_4_11']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <strong>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['section_5_participation_games']; ?>
                    </font>
                  </font>
                </strong>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['participation_games_5_1']; ?>
                    <em><?php echo $translations['kansspelautoriteit_dutch']; ?></em>
                    <?php echo $translations['participation_games_5_1_continue']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['participation_games_5_2']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['participation_games_5_3']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['participation_games_5_4']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <strong>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['section_6_prevention_addiction']; ?>
                    </font>
                  </font>
                </strong>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['prevention_addiction_6_1']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['prevention_addiction_6_2']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['prevention_addiction_6_3']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['prevention_addiction_6_3_1']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['prevention_addiction_6_3_2']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['prevention_addiction_6_3_3']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['prevention_addiction_6_3_4']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['prevention_addiction_6_3_5']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['prevention_addiction_6_3_6']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['prevention_addiction_6_3_7']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['prevention_addiction_6_4']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <strong>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['section_7_blocking_suspension']; ?>
                    </font>
                  </font>
                </strong>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_1']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_2']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_3']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_4']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_5']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_6']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_6_1']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_6_2']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_6_3']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_6_4']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_6_5']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_6_6']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_6_7']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_6_8']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_6_9']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_6_10']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_6_11']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_6_12']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_6_13']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_6_14']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_6_15']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_6_16']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_6_17']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_6_18']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_7']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_7_1']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_7_2']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_7_3']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_8']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['blocking_suspension_7_9']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <strong>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['section_8_data_protection']; ?>
                    </font>
                  </font>
                </strong>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['data_protection_8_1']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <strong>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['section_9_limitation_liability']; ?>
                    </font>
                  </font>
                </strong>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['limitation_liability_9_1']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['limitation_liability_9_2']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['limitation_liability_9_3']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['limitation_liability_9_4']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['limitation_liability_9_5']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['limitation_liability_9_6']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <strong>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['section_10_intellectual_property']; ?>
                    </font>
                  </font>
                </strong>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['intellectual_property_10_1']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['intellectual_property_10_2']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <strong>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['section_11_customer_service']; ?>
                    </font>
                  </font>
                </strong>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['customer_service_11_1']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['customer_service_11_2']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['customer_service_11_3']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['customer_service_11_4']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['customer_service_11_5']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['customer_service_11_6']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['customer_service_11_7']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <b>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['section_12_limitations']; ?>
                    </font>
                  </font>
                </b>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['limitations_12_1']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <b>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['deposit_limits_title']; ?>
                    </font>
                  </font>
                </b>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['deposit_limits_daily']; ?>
                  </font>
                </font><br>
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['deposit_limits_weekly']; ?>
                  </font>
                </font><br>
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['deposit_limits_monthly']; ?>
                  </font>
                </font><br>
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['deposit_limits_young_adults']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <b>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['gaming_time_limits_title']; ?>
                    </font>
                  </font>
                </b>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['gaming_time_limits_daily']; ?>
                  </font>
                </font><br>
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['gaming_time_limits_weekly']; ?>
                  </font>
                </font><br>
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['gaming_time_limits_monthly']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['gaming_time_limits_calculation']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['gaming_time_limits_tournament']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <b>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['auto_withdrawal_limit_title']; ?>
                    </font>
                  </font>
                </b>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['auto_withdrawal_limit']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <strong>
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['section_13_applicable_law']; ?>
                    </font>
                  </font>
                </strong>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['applicable_law_13_1']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['applicable_law_13_2']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['applicable_law_13_3']; ?>
                  </font>
                </font>
                <a class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd" href="https://ec.europa.eu/consumers/odr/" target="_self">
                  <font dir="auto" style="vertical-align: inherit;">
                    <font dir="auto" style="vertical-align: inherit;">
                      <?php echo $translations['applicable_law_13_3_link']; ?>
                    </font>
                  </font>
                </a>
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['applicable_law_13_3_continue']; ?>
                  </font>
                </font>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <font dir="auto" style="vertical-align: inherit;">
                  <font dir="auto" style="vertical-align: inherit;">
                    <?php echo $translations['applicable_law_13_4']; ?>
                  </font>
                </font>
              </p>
            </article>
          </div>
        </article>
      </div>
    </article>
  </div>
</div>
<?php
require(dirname(__DIR__, 1) . "/panels/footer.php");
render_footer($translations);
?>