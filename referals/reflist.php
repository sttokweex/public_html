<?php
require(dirname(__DIR__, 1) . "/system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

if (!isset($_SESSION['hash']) || empty($_SESSION['hash'])) {
  header('Location: /');
  die();
}

require(dirname(__DIR__, 1) . "/panels/header.php");
require(dirname(__DIR__, 1) . "/panels/sidebar.php");
require(dirname(__DIR__, 1) . "/panels/chat.php");
require(dirname(__DIR__, 1) . "/panels/mobile.php");
//  renderChatComponent('Иван', $sampleMessages,$translations);

$sql_refer1 = "SELECT COUNT(*) FROM users WHERE ref_id = '$id' ORDER BY id DESC";
$sql_refer12 = mysqli_query($connection, $sql_refer1);
$row = mysqli_fetch_array($sql_refer12);

if ($row['COUNT(*)'] < 50) {
  $percent_refs = 2;
  $ref_level = 1;
  $width_ref = '0';
}
if ($row['COUNT(*)'] >= 10) {
  $percent_refs = 4;
  $ref_level = 2;
  $width_ref = '25';
}
if ($row['COUNT(*)'] >= 25) {
  $percent_refs = 6;
  $ref_level = 3;
  $width_ref = '50';
}
if ($row['COUNT(*)'] >= 50) {
  $percent_refs = 8;
  $ref_level = 4;
  $width_ref = '75';
}
if ($row['COUNT(*)'] >= 100) {
  $percent_refs = 10;
  $ref_level = 5;
  $width_ref = '100';
}

if ($refuser == NULL) {
  $refuser = $translations['none'];
} else {
  $refuser = "#$refuser";
}
?>

<link href="/css/referal.css" rel="stylesheet">

<div class="main-container">
  <div class="referal-container">
    <div class="referal-inner">
      <div class="refferal">
        <div class="refferal__left">
          <div class="refferal__user">
            <div class="refferal__avatar">
              <img onClick="location.href='/profile'" class="user" src="<?= htmlspecialchars($img) ?>">
            </div>
            <div class="refferal__balance">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="sign">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0004 21.6C17.3023 21.6 21.6004 17.3019 21.6004 12C21.6004 6.69806 17.3023 2.39999 12.0004 2.39999C6.69846 2.39999 2.40039 6.69806 2.40039 12C2.40039 17.3019 6.69846 21.6 12.0004 21.6ZM10.6295 6.73792C10.2318 6.73792 9.90949 7.06027 9.90949 7.45792V11.7082H8.76562C8.36798 11.7082 8.04562 12.0306 8.04562 12.4282C8.04562 12.8259 8.36798 13.1482 8.76562 13.1482H9.90949V14.1934H8.76562C8.36798 14.1934 8.04562 14.5157 8.04562 14.9134C8.04562 15.311 8.36798 15.6334 8.76562 15.6334H9.90949V17.3842C9.90949 17.7819 10.2318 18.1042 10.6295 18.1042C11.0271 18.1042 11.3495 17.7819 11.3495 17.3842V15.6334H13.7359C14.1336 15.6334 14.4559 15.311 14.4559 14.9134C14.4559 14.5157 14.1336 14.1934 13.7359 14.1934H11.3495V13.1482H13.7359C14.586 13.1482 15.4012 12.8105 16.0023 12.2095C16.6034 11.6084 16.9411 10.7931 16.9411 9.94307C16.9411 9.09301 16.6034 8.27777 16.0023 7.67668C15.4012 7.0756 14.586 6.73792 13.7359 6.73792H10.6295ZM13.7359 11.7082H11.3495V8.17792H13.7359C14.2041 8.17792 14.6531 8.36389 14.9841 8.69492C15.3151 9.02595 15.5011 9.47492 15.5011 9.94307C15.5011 10.4112 15.3151 10.8602 14.9841 11.1912C14.6531 11.5223 14.2041 11.7082 13.7359 11.7082Z" fill="#F5A60B"></path>
              </svg>
              <span><?= htmlspecialchars($balance) ?></span>
            </div>
          </div>
          <div class="refferal__nav">
            <a href="/referals"><i class="fa fa-link"></i> <?= htmlspecialchars($translations['company']) ?></a>
            <a href="/referals/reflist" class="active"><i class="fa fa-user-plus"></i> <?= htmlspecialchars($translations['referrals']) ?></a>
          </div>
        </div>
        <div class="refferal__right">
          <div class="refferal__link">
            <div class="refferal__link-title">
              <span><?= htmlspecialchars($translations['list_ref']) ?></span>
              <p><?= htmlspecialchars($translations['your_ref']) ?></p>
            </div>
            <div class="refferal__earn">
              <span><?= htmlspecialchars($translations['my_ref']) ?></span>
              <p><?= round($row['COUNT(*)'], 2); ?> <?= htmlspecialchars($translations['persons']) ?></p>
            </div>
          </div>

          <div class="refferal__table">
            <?php
            if ($row['COUNT(*)'] == 0) {
            ?>
              <div class="norefsblock" id="noReferals">
                <div class="content">
                  <i class="fa fa-users"></i>
                  <span class="title"><?= htmlspecialchars($translations['none_ref']) ?></span>
                  <span class="desc"><?= htmlspecialchars($translations['attract_users']) ?></span>
                  <button class="buttonProject" onClick="location.href='/referals/'"><?= htmlspecialchars($translations['go_to']) ?></button>
                </div>
              </div>
            <?php } else { ?>
              <table id="referals_table" style="user-select:none;" class="table table-dark table-striped">
                <thead>
                  <tr>
                    <th scope="col"><?= htmlspecialchars($translations['id']) ?></th>
                    <th scope="col"><?= htmlspecialchars($translations['ref']) ?></th>
                    <th scope="col"><?= htmlspecialchars($translations['dep']) ?></th>
                    <th scope="col"><?= htmlspecialchars($translations['all_profit']) ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql_refer1 = "SELECT * FROM users WHERE ref_id = '$id' ORDER BY id DESC";
                  $sql_refer12 = mysqli_query($connection, $sql_refer1);
                  while ($row = mysqli_fetch_array($sql_refer12)) {
                    $idref = $row['id'];
                    $loginref = $row['login'];
                    $imgref = $row['img'];

                    $loginref = strtok($loginref, ' ');

                    $getDepsForRef = "SELECT SUM(amount) FROM deposits WHERE user_id='$idref' AND status='1'";
                    $getDepsForRef2 = mysqli_query($connection, $getDepsForRef);
                    $referedSumDep = mysqli_fetch_array($getDepsForRef2);
                    $currentDeps = $referedSumDep['SUM(amount)'];

                    $currentDepsPercent = ($currentDeps / 100) * $percent_refs;

                    $currentDepsPercent = round($currentDepsPercent, 2);
                    $currentDeps = round($currentDeps, 2);
                    echo "
                                            <tr>
                                                <td>#$idref</td>
                                                <td><img class='referalPhoto' src='" . htmlspecialchars($imgref) . "'>" . htmlspecialchars($loginref) . "</td>
                                                <td style='color:#efb028;'><i style='margin-right:5px;' class='fa fa-coins'></i>$currentDeps</td>
                                                <td style='color:#efb028;'><i style='margin-right:5px;' class='fa fa-coins'></i>$currentDepsPercent</td>
                                            </tr>
                                        ";
                  }
                  ?>
                </tbody>
              </table>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

  </div>
</div><?php
      require(dirname(__DIR__, 1) . "/panels/footer.php");
      render_footer($translations);
      ?>

<script>
  $(document).ready(function() {
    $('#referals_table').DataTable({
      pageLength: 10,
      order: [
        [0, 'desc']
      ]
    });
    $('#referals_table_length').hide();
    $('#referals_table_info').hide();
  });
</script>