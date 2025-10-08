<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

require("../system/config.php");

require("../panels/header.php");

require("../panels/sidebar.php");
$requestUri = $_SERVER['REQUEST_URI'];
require_once('../panels/livefeed.php');
require_once '../panels/footer.php';
require_once '../faq/faq.php';









?>












<div class="main-container" id="main-content">
  <div class="home-page-content-inner">



    <div class="home-container">

      <?

      renderBetsTable($translations);

      render_faq($translations, 'Holland');


      ?>

    </div>


  </div>
</div>
<?php render_footer($translations) ?>