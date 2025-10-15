<?php
require(dirname(__DIR__, 1) . "/system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
require(dirname(__DIR__, 1) . "/panels/header.php");
require(dirname(__DIR__, 1) . "/panels/sidebar.php");
?>

<div class="main-container" id="main-content">
  <div class="" data-web-content-id="COOKIEPAGE_2025">
    <article>
      <style>
        .main.content.first--content {
          margin-top: 3rem !important;
        }

        :root {
          --hc-fuchsia: #fb258d !important;
        }

        .main__content h1,
        h2,
        h3 {
          font-weight: 800 !important;
          color: var(--hc-fuchsia) !important;
          margin-bottom: 1.5rem;
        }

        .main__content h1 {
          font-weight: 900 !important;
          background-image: linear-gradient(to left, #fb258d, #fc8d43) !important;
          -webkit-background-clip: text !important;
          background-clip: text !important;
          color: transparent !important;
        }

        /* Optional styling voor content */
        .main__content ol,
        .main__content p,
        .main__content ul {
          font-weight: 350 !important;
          margin-bottom: 1.5rem;
        }

        .main__content b,
        .main__content strong {
          font-weight: 800 !important;
        }

        .main__content ol,
        .main__content ul {
          list-style-position: outside;
          margin-inline-start: 2rem;
          margin-top: 1.5rem;
        }

        .main__content ol li,
        .main__content ul li {
          padding-left: 0.25rem;
        }

        .main__content li::marker {
          color: #ff914c;
        }

        .main__content li+li {
          margin-top: 0.25rem;
        }

        .main__content ul {
          list-style: disc;
        }

        .main__content ul ul {
          list-style-type: circle;
          margin-left: 0.5rem;
        }

        .main__content ul ul ul {
          list-style-type: square;
          margin-left: 1rem;
        }

        .main__content ol {
          list-style: decimal;
        }

        .main__content a {
          color: #fff;
          font-weight: 350;
          text-decoration: none;
          position: relative;
        }

        .main__content a:hover {
          color: var(--hc-pink) !important;
          text-decoration: underline;
          transition:
            color 150ms ease-in-out,
            text-decoration 150ms 150ms ease-in-out;
        }

        .main__content hr {
          border: 1px solid rgba(255, 255, 255, 0.4);
          margin: 1.5em 0;
        }

        .main__content table {
          max-width: 100%;
          overflow-x: auto;
          border-collapse: collapse;
          margin: 25px 0;
          font-size: 0.9em;
        }

        .main__content table thead tr {
          background-color: rgba(55, 88, 119, 0.13);
          color: #ffffff;
          text-align: left;
        }

        .main__content table td,
        .main__content table th {
          padding: 12px 15px;
        }

        .main__content table tbody tr:nth-of-type(even) {
          background-color: rgba(55, 88, 119, 0.13);
        }

        .main__content table tbody tr:last-of-type {
          border-bottom: 2px solid rgba(55, 88, 119, 0.13);
        }

        /*********** Needed for light modals ***************/

        .withStyleProps__contentCentered--1yc {
          text-align: left !important;
        }

        .popup-theme-light .main__content table,
        .scroll-theme-light .main__content table {
          background: var(--hc-gray);
          color: var(--light-theme-font-color);
        }

        .popup-theme-light .main__content table th,
        .scroll-theme-light .main__content table th {
          color: var(--light-theme-font-color);
        }
      </style>

      <div class="col-mob-4 col-dsk-8 Articles__articles--12Q main__content">
        <h1 class="Headings__head--2LV Headings__bold--iD3 Headings__h1--284 Headings__dark--1eH">
          <?php echo $translations['cookie_statement_title']; ?></h1>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <?php echo $translations['cookie_statement_intro']; ?>
        </p>
        <h2 class="Headings__head--2LV Headings__bold--iD3 Headings__h2--3Bv Headings__dark--1eH">
          <?php echo $translations['what_are_cookies']; ?></h2>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <?php echo $translations['cookies_description']; ?>
        </p>
        <h2 class="Headings__head--2LV Headings__bold--iD3 Headings__h2--3Bv Headings__dark--1eH">
          <?php echo $translations['which_cookies_we_place']; ?></h2>
        <h3 class="Headings__head--2LV Headings__bold--iD3 Headings__h3--16M Headings__dark--1eH">
          <?php echo $translations['necessary_cookies']; ?></h3>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <?php echo $translations['necessary_cookies_description']; ?>
        </p>
        <h3 class="Headings__head--2LV Headings__bold--iD3 Headings__h3--16M Headings__dark--1eH">
          <?php echo $translations['analytical_cookies']; ?></h3>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <?php echo $translations['analytical_cookies_description']; ?>
        </p>
        <h3 class="Headings__head--2LV Headings__bold--iD3 Headings__h3--16M Headings__dark--1eH">
          <?php echo $translations['preference_cookies']; ?></h3>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <?php echo $translations['preference_cookies_description']; ?>
        </p>
        <h3 class="Headings__head--2LV Headings__bold--iD3 Headings__h3--16M Headings__dark--1eH">
          <?php echo $translations['marketing_cookies']; ?></h3>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <?php echo $translations['marketing_cookies_description']; ?>
        </p>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <?php echo $translations['cookies_overview']; ?>
        </p>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <iframe src="https://www.hollandcasino.nl/library/general/cookiedeclaration-en.html" style="width: 100%; height: 300px; background: rgb(255, 255, 255); font-family: var(--Cadiz);" title="<?php echo $translations['iframe_cookie_declaration']; ?>"></iframe>
        </p>
        <h3 class="Headings__head--2LV Headings__bold--iD3 Headings__h3--16M Headings__dark--1eH">
          <?php echo $translations['cookie_partners']; ?></h3>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <?php echo $translations['cookie_partners_description']; ?>
        </p>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <strong><?php echo $translations['meta']; ?></strong>
        </p>
        <ul>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['meta_description']; ?>
          </li>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['meta_category']; ?>
          </li>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['meta_tracking']; ?>
          </li>
        </ul>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <strong><?php echo $translations['adform']; ?></strong>
        </p>
        <ul>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['adform_description']; ?>
          </li>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['adform_category']; ?>
          </li>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['adform_data']; ?>
          </li>
        </ul>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <strong><?php echo $translations['xandr']; ?></strong>
        </p>
        <ul>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['xandr_description']; ?>
          </li>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['xandr_category']; ?>
          </li>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['xandr_tracking']; ?>
          </li>
        </ul>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <strong><?php echo $translations['optimove']; ?></strong>
        </p>
        <ul>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['optimove_description']; ?>
          </li>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['optimove_category']; ?>
          </li>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['optimove_data']; ?>
          </li>
        </ul>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <strong><?php echo $translations['google_analytics']; ?></strong>
        </p>
        <ul>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['google_analytics_description']; ?>
          </li>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['google_analytics_category']; ?>
          </li>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['google_analytics_data']; ?>
          </li>
        </ul>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <strong><?php echo $translations['billy_grace']; ?></strong>
        </p>
        <ul>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['billy_grace_description']; ?>
          </li>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['billy_grace_category']; ?>
          </li>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['billy_grace_data']; ?>
          </li>
        </ul>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <strong><?php echo $translations['google_display_video']; ?></strong>
        </p>
        <ul>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['google_display_video_description']; ?>
          </li>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['google_display_video_category']; ?>
          </li>
        </ul>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <strong><?php echo $translations['digital_audience']; ?></strong>
        </p>
        <ul>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['digital_audience_description']; ?>
          </li>
        </ul>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <strong><?php echo $translations['google_ads']; ?></strong>
        </p>
        <ul>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['google_ads_description']; ?>
          </li>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['google_ads_data']; ?>
          </li>
        </ul>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <strong><?php echo $translations['microsoft_ads']; ?></strong>
        </p>
        <ul>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['microsoft_ads_description']; ?>
          </li>
        </ul>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <strong><?php echo $translations['glassbox']; ?></strong>
        </p>
        <ul>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['glassbox_description']; ?>
          </li>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['glassbox_category']; ?>
          </li>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
            <?php echo $translations['glassbox_data']; ?>
          </li>
        </ul>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd" lang="NL-NL" paraeid="{da310116-e970-41b8-b696-f28e25193e76}{120}" paraid="1932770885" xml:lang="NL-NL">
          <strong><?php echo $translations['cheq']; ?></strong>
        </p>
        <ul>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd" lang="NL-NL" paraeid="{622d21e8-bcd8-4bfb-9fba-28477aff1bbc}{38}" paraid="886595669" xml:lang="NL-NL">
            <?php echo $translations['cheq_description']; ?>
          </li>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd" lang="NL-NL" paraeid="{622d21e8-bcd8-4bfb-9fba-28477aff1bbc}{53}" paraid="1232362" xml:lang="NL-NL">
            <?php echo $translations['cheq_category']; ?>
          </li>
          <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd" lang="NL-NL" paraeid="{622d21e8-bcd8-4bfb-9fba-28477aff1bbc}{60}" paraid="1311053167" xml:lang="NL-NL">
            <?php echo $translations['cheq_data']; ?>
          </li>
        </ul>
        <h3 class="Headings__head--2LV Headings__bold--iD3 Headings__h3--16M Headings__dark--1eH">
          <?php echo $translations['accepting_deleting_cookies']; ?></h3>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <?php echo $translations['accepting_deleting_cookies_description']; ?>
        </p>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <?php echo $translations['cookie_management_browser']; ?>
        </p>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <?php echo $translations['cookie_deletion_note']; ?>
        </p>
        <h3 class="Headings__head--2LV Headings__bold--iD3 Headings__h3--16M Headings__dark--1eH">
          <?php echo $translations['changes']; ?></h3>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <?php echo $translations['changes_description']; ?>
        </p>
        <h3 class="Headings__head--2LV Headings__bold--iD3 Headings__h3--16M Headings__dark--1eH">
          <?php echo $translations['contact']; ?></h3>
        <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
          <?php echo $translations['contact_description']; ?>
        </p>
      </div>
    </article>
  </div>
</div>
<?php
require(dirname(__DIR__, 1) . "/panels/footer.php");
render_footer($translations);
?>