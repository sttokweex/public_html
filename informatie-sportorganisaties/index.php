<?php
require(dirname(__DIR__, 1) . "/system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
require(dirname(__DIR__, 1) . "/panels/header.php");
require(dirname(__DIR__, 1) . "/panels/sidebar.php");
?>

<div class="main-container" id="main-content">
  <div class="" data-web-content-id="INFOPAGE_INFO_SPORTORGANISATIONS">
    <article>
      <div class="col-mob-4 col-dsk-8 Articles__articles--12Q">
        <article class="Articles__article--3SO">
          <h2 class="Headings__head--2LV Headings__bold--iD3 Headings__h2--3Bv Headings__dark--1eH Articles__title--2MR"><?php echo $translations['info_sports_organisations_title']; ?></h2>
          <div class="Articles__content--2Mi ">
            <article>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd" paraeid="{37fac574-6bb4-4297-96d6-d49dc6cfa318}{215}" paraid="2106921608">
                <?php echo $translations['sports_betting_provider']; ?>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd" paraeid="{37fac574-6bb4-4297-96d6-d49dc6cfa318}{221}" paraid="2111856824">
                <?php echo $translations['sports_competitions_overview']; ?>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <a class="PlainText__text--1wg PlainText__medium--1_S Link__link--3vh Button__btn--THI Button__large--6PM Button__primary--3wk Button__success--3NL Button__dark--2vB PlainText__dark--3fd" href="https://www.hollandcasino.nl/library/Pages/information-sportorganisations/HCO%20Sports%20List.xlsx" target="_self"><?php echo $translations['download_overview_link']; ?></a>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd" paraeid="{37fac574-6bb4-4297-96d6-d49dc6cfa318}{231}" paraid="1714021246">
                <?php echo $translations['match_fixing_prevention']; ?>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd" paraeid="{37fac574-6bb4-4297-96d6-d49dc6cfa318}{237}" paraid="1034623189">
                <?php echo $translations['suspicious_betting_patterns']; ?>
              </p>
              <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                <?php echo $translations['contact_info']; ?>
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