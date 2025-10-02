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
require_once(dirname(__DIR__, 1) . "/panels/footer.php");
?>

<div class="main-container" id="main-content">
  <div class="favorite-container">
    <div class="favorite-inner">
      <div class="mybets-stack-container">
        <div class="mybets-wrap">
          <div class="mybets-header-stack">
            <div class="mybets-title-group">
              <h1 class="mybets-heading">
                <svg data-ds-icon="List" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="mybets-icon">
                  <path fill="currentColor" d="M18 2H5c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h13c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2M6 17c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1m0-5c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1m0-5c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1m10 10H9c-.55 0-1-.45-1-1s.45-1 1-1h7c.55 0 1 .45 1 1s-.45 1-1 1m0-5H9c-.55 0-1-.45-1-1s.45-1 1-1h7c.55 0 1 .45 1 1s-.45 1-1 1m0-5H9c-.55 0-1-.45-1-1s.45-1 1-1h7c.55 0 1 .45 1 1s-.45 1-1 1"></path>
                </svg>
                <?php echo htmlspecialchars($translations['transactions']); ?>
              </h1>
            </div>
            <a class="mybets-close-button" href="/casino/home">
              <svg class="mybets-close-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                <path fill="currentColor" d="M4.293 4.293a1 1 0 0 1 1.338-.069l.076.069L12 10.586l6.293-6.293.076-.069a1 1 0 0 1 1.407 1.407l-.069.076L13.414 12l6.293 6.293.069.076a1 1 0 0 1-1.407 1.406l-.076-.068L12 13.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L10.586 12 4.293 5.707l-.068-.076a1 1 0 0 1 .068-1.338"></path>
              </svg>
            </a>
          </div>
        </div>
        <div class="mybets-content-stack">
          <div class="mybets-sidebar-card">
            <div class="mybets-nav-outer-wrapper">
              <div class="mybets-nav-wrapper">
                <button class="mybets-nav-link mybets-nav-active" data-testid="global-navbar-Casino-tab">
                  <span class="mybets-nav-text"><?php echo htmlspecialchars($translations['deposits']); ?></span>
                </button>
                <button class="mybets-nav-link" data-testid="global-navbar-Casino-tab">
                  <span class="mybets-nav-text"><?php echo htmlspecialchars($translations['withdrawls']); ?></span>
                </button>
                <button class="mybets-nav-link" data-testid="global-navbar-Casino-tab">
                  <span class="mybets-nav-text"><?php echo htmlspecialchars($translations['bonuses']); ?></span>
                </button>
                <div class="mybets-nav-dash"></div>
              </div>
            </div>
          </div>
          <div class="mybets-main-card">
            <div class="mybets-table-section deposits-page">
              <div class="mybets-table-wrapper">
                <table id="deposits_table" class="mybets-table">
                  <thead>
                    <tr class="mybets-table-header">
                      <th><span class="mybets-table-heading"><?php echo htmlspecialchars($translations['date']); ?></span></th>
                      <th class="mybets-table-cell-left"><span class="mybets-table-heading"><?php echo htmlspecialchars($translations['status']); ?></span></th>
                      <th class="mybets-table-cell-left"><span class="mybets-table-heading"><?php echo htmlspecialchars($translations['method']); ?></span></th>
                      <th class="mybets-table-cell-left"><span class="mybets-table-heading"><?php echo htmlspecialchars($translations['transaction']); ?></span></th>
                      <th class="mybets-table-cell-right"><span class="mybets-table-heading"><?php echo htmlspecialchars($translations['amount']); ?></span></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $checkico = "<i style='color:#4ba136;font-size: 14px;margin-right:5px;' class='fa fa-check' aria-hidden='true'></i>";
                    $waitico = "<i style='color:#4b5261;font-size: 14px;margin-right:5px;' class='fa fa-clock' aria-hidden='true'></i>";

                    // Initialize deposit count
                    $depositCount = 0;

                    // Check database connection
                    if (!$connection || mysqli_connect_errno()) {
                      echo '<tr><td colspan="5">Database connection error: ' . mysqli_connect_error() . '</td></tr>';
                    } else {
                      // Use prepared statement to prevent SQL injection
                      $stmt = mysqli_prepare($connection, "SELECT COUNT(*) AS count FROM deposits WHERE user_id = ? ORDER BY id DESC");
                      if ($stmt) {
                        $id = isset($id) ? $id : '';
                        mysqli_stmt_bind_param($stmt, "s", $id);
                        mysqli_stmt_execute($stmt);
                        $resultDes = mysqli_stmt_get_result($stmt);

                        if ($resultDes && $row = mysqli_fetch_array($resultDes, MYSQLI_ASSOC)) {
                          $depositCount = (int)$row['count'];
                        }
                        mysqli_stmt_close($stmt);
                      } else {
                        echo '<tr><td colspan="5">Query preparation error: ' . mysqli_error($connection) . '</td></tr>';
                      }
                    }

                    // Render table rows
                    if ($depositCount == 0) {
                      echo '<tr style="display:none;"></tr>'; // Hide table row, rely on mybets-empty-state
                    } else {
                      $stmt = mysqli_prepare($connection, "SELECT * FROM deposits WHERE user_id = ? ORDER BY id DESC");
                      if ($stmt) {
                        mysqli_stmt_bind_param($stmt, "s", $id);
                        mysqli_stmt_execute($stmt);
                        $deposits = mysqli_stmt_get_result($stmt);

                        while ($depositRow = mysqli_fetch_array($deposits, MYSQLI_ASSOC)) {
                          $summa = htmlspecialchars($depositRow['amount']);
                          $time = htmlspecialchars($depositRow['date']);
                          $transac = htmlspecialchars($depositRow['invoice_id']);
                          $method = htmlspecialchars($depositRow['system']);
                          $status = $depositRow['status'];

                          if ($status == 0) {
                            $sstatus = "<span style='color:#4b5261;'>{$waitico}" . htmlspecialchars($translations['waiting']) . "</span>";
                          } elseif ($status == 1) {
                            $sstatus = "<span style='color:#4ba136;'>{$checkico}" . htmlspecialchars($translations['success']) . "</span>";
                          } else {
                            $sstatus = "<span style='color:#4b5261;'>" . htmlspecialchars($translations['unknown']) . "</span>";
                          }

                          echo '<tr style="color:var(--main-color-medium)">
                                    <td>' . $time . '</td>
                                    <td class="mybets-table-cell-left">' . $sstatus . '</td>
                                    <td class="mybets-table-cell-left"><img style="width:40px;" src="../images/wallet/' . $method . '.png" alt="' . $method . '"></td>
                                    <td class="mybets-table-cell-left">#' . $transac . '</td>
                                    <td class="mybets-table-cell-right">' . $summa . ' $</td>
                                </tr>';
                        }
                        mysqli_stmt_close($stmt);
                      } else {
                        echo '<tr><td colspan="5">Query error: ' . mysqli_error($connection) . '</td></tr>';
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <div class="mybets-empty-state" <?php echo $depositCount > 0 ? 'style="display:none;"' : ''; ?>>
                <div class="mybets-empty-icon">
                  <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M69.5298 21.2739H58.4108C57.0786 21.2739 55.9986 22.3539 55.9986 23.6862V77.5877C55.9986 78.92 57.0786 80 58.4108 80H69.5298C70.8621 80 71.9421 78.92 71.9421 77.5877V23.6862C71.9421 22.3539 70.8621 21.2739 69.5298 21.2739Z" fill="#263742"></path>
                    <path d="M45.5615 36.9571H34.4424C33.1102 36.9571 32.0302 38.0371 32.0302 39.3694V77.5877C32.0302 78.9199 33.1102 79.9999 34.4424 79.9999H45.5615C46.8937 79.9999 47.9737 78.9199 47.9737 77.5877V39.3694C47.9737 38.0371 46.8937 36.9571 45.5615 36.9571Z" fill="#263742"></path>
                    <path d="M21.5892 52.2665H10.4702C9.13792 52.2665 8.05792 53.3465 8.05792 54.6787V77.5877C8.05792 78.92 9.13792 80 10.4702 80H21.5892C22.9215 80 24.0015 78.92 24.0015 77.5877V54.6787C24.0015 53.3465 22.9215 52.2665 21.5892 52.2665Z" fill="#263742"></path>
                    <path d="M21.8054 54.9316C21.8054 51.7407 19.2187 49.154 16.0278 49.154C12.8369 49.154 10.2501 51.7407 10.2501 54.9316V71.2491C10.2501 74.44 12.8369 77.0268 16.0278 77.0268C19.2187 77.0268 21.8054 74.44 21.8054 71.2491V54.9316Z" fill="#334552"></path>
                    <path d="M45.7777 38.1194C45.7777 34.9284 43.1909 32.3417 40 32.3417C36.8091 32.3417 34.2224 34.9284 34.2224 38.1194V71.1209C34.2224 74.3118 36.8091 76.8986 40 76.8986C43.1909 76.8986 45.7777 74.3118 45.7777 71.1209V38.1194Z" fill="#334552"></path>
                    <path d="M69.746 21.9485C69.746 18.7575 67.1593 16.1708 63.9684 16.1708C60.7775 16.1708 58.1907 18.7575 58.1907 21.9485V71.0219C58.1907 74.2128 60.7775 76.7995 63.9684 76.7995C67.1593 76.7995 69.746 74.2128 69.746 71.0219V21.9485Z" fill="#334552"></path>
                    <path d="M16.0279 46.3862C19.2573 46.3862 21.8752 43.7683 21.8752 40.5389C21.8752 37.3095 19.2573 34.6916 16.0279 34.6916C12.7985 34.6916 10.1806 37.3095 10.1806 40.5389C10.1806 43.7683 12.7985 46.3862 16.0279 46.3862Z" fill="#3C8725"></path>
                    <path d="M16. letter-spacing: -0.02em;0277 42.0786C17.7507 42.0786 19.1475 40.6819 19.1475 38.9589C19.1475 37.2358 17.7507 35.8391 16.0277 35.8391C14.3047 35.8391 12.9079 37.2358 12.9079 38.9589C12.9079 40.6819 14.3047 42.0786 16.0277 42.0786Z" fill="#69E244"></path>
                    <path d="M22.33 32.3417L17.1462 27.1579L33.5883 10.7158L39.9892 17.1167L57.1059 0L62.2933 5.18743L39.9892 27.4879L33.5883 21.0833L22.33 32.3417Z" fill="#334552"></path>
                  </svg>
                </div>
                <span class="transaction-empty-text"><?php echo htmlspecialchars($translations['no-deps']); ?></span>
              </div>
            </div>
            <div class="mybets-table-section withdrawls-page hide">
              <div class="mybets-table-wrapper">
                <table id="withdrawls_table" class="mybets-table">
                  <thead>
                    <tr class="mybets-table-header">
                      <th><span class="mybets-table-heading"><?php echo htmlspecialchars($translations['id']); ?></span></th>
                      <th class="mybets-table-cell-left"><span class="mybets-table-heading"><?php echo htmlspecialchars($translations['gate']); ?></span></th>
                      <th class="mybets-table-cell-left"><span class="mybets-table-heading"><?php echo htmlspecialchars($translations['date']); ?></span></th>
                      <th class="mybets-table-cell-left"><span class="mybets-table-heading"><?php echo htmlspecialchars($translations['wallet']); ?></span></th>
                      <th class="mybets-table-cell-right"><span class="mybets-table-heading"><?php echo htmlspecialchars($translations['amount']); ?></span></th>
                      <th class="mybets-table-cell-left"><span class="mybets-table-heading"><?php echo htmlspecialchars($translations['status']); ?></span></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $checkico = "<i style='color:#4ba136;font-size: 14px;margin-right:5px;' class='fa fa-check' aria-hidden='true'></i>";
                    $waitico = "<i style='color:#bd8c18;font-size: 14px;margin-right:5px;' class='fa fa-arrow-left' aria-hidden='true'></i>";
                    $errorico = "<i style='color:#b13333;font-size: 14px;margin-right:5px;transform: rotate(45deg);' class='fa fa-plus' aria-hidden='true'></i>";
                    $processico = "<i style='color:#fff;font-size: 14px;margin-right:5px;' class='fa fa-bolt' aria-hidden='true'></i>";

                    // Initialize withdrawal count
                    $withdrawCount = 0;

                    // Check database connection
                    if (!$connection || mysqli_connect_errno()) {
                      echo '<tr><td colspan="6">Database connection error: ' . mysqli_connect_error() . '</td></tr>';
                    } else {
                      // Use prepared statement to prevent SQL injection
                      $stmt = mysqli_prepare($connection, "SELECT COUNT(*) AS count FROM withdraws WHERE user_id = ? ORDER BY id DESC");
                      if ($stmt) {
                        $id = isset($id) ? $id : '';
                        mysqli_stmt_bind_param($stmt, "s", $id);
                        mysqli_stmt_execute($stmt);
                        $resultWithdraw = mysqli_stmt_get_result($stmt);

                        if ($resultWithdraw && $row = mysqli_fetch_array($resultWithdraw, MYSQLI_ASSOC)) {
                          $withdrawCount = (int)$row['count'];
                        }
                        mysqli_stmt_close($stmt);
                      } else {
                        echo '<tr><td colspan="6">Query preparation error: ' . mysqli_error($connection) . '</td></tr>';
                      }
                    }

                    // Render table rows
                    if ($withdrawCount == 0) {
                      echo '<tr style="display:none;"></tr>'; // Hide table row, rely on mybets-empty-state
                    } else {
                      $stmt = mysqli_prepare($connection, "SELECT * FROM withdraws WHERE user_id = ? ORDER BY id DESC");
                      if ($stmt) {
                        mysqli_stmt_bind_param($stmt, "s", $id);
                        mysqli_stmt_execute($stmt);
                        $withdraws = mysqli_stmt_get_result($stmt);

                        while ($withdrawRow = mysqli_fetch_array($withdraws, MYSQLI_ASSOC)) {
                          $wid = htmlspecialchars($withdrawRow['id']);
                          $ps = htmlspecialchars($withdrawRow['ps']);
                          $sum = htmlspecialchars($withdrawRow['sum']);
                          $wallet = htmlspecialchars($withdrawRow['wallet']);
                          $status = $withdrawRow['status'];
                          $data = htmlspecialchars($withdrawRow['date']);

                          if ($status == 0) {
                            $sstatus = "<span style='color:#bd8c18;border-bottom: 1px solid #e1bd545c;cursor:pointer;' onClick='removeWithdraw($wid)'>" . htmlspecialchars($translations['cancel']) . "</span>";
                          } elseif ($status == 1) {
                            $sstatus = "<span style='color:#4ba136;'>{$checkico}" . htmlspecialchars($translations['success']) . "</span>";
                          } elseif ($status == 2) {
                            $sstatus = "<span style='color:#b13333;'>{$errorico}" . htmlspecialchars($translations['withdraw']) . "</span>";
                          } elseif ($status == 3) {
                            $sstatus = "<span style='color:#fff;'>{$processico}" . htmlspecialchars($translations['in_progress']) . "</span>";
                          } else {
                            $sstatus = "<span style='color:#4b5261;'>" . htmlspecialchars($translations['unknown']) . "</span>";
                          }

                          echo '<tr style="color:var(--main-color-medium)">
                                    <td>#' . $wid . '</td>
                                    <td class="mybets-table-cell-left"><img style="width:90px;" src="../images/wallet/' . $ps . '.svg" alt="' . $ps . '"></td>
                                    <td class="mybets-table-cell-left">' . $data . '</td>
                                    <td class="mybets-table-cell-left">' . $wallet . '</td>
                                    <td class="mybets-table-cell-right">' . $sum . ' ₽</td>
                                    <td class="mybets-table-cell-left">' . $sstatus . '</td>
                                </tr>';
                        }
                        mysqli_stmt_close($stmt);
                      } else {
                        echo '<tr><td colspan="6">Query error: ' . mysqli_error($connection) . '</td></tr>';
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <div class="mybets-empty-state" <?php echo $withdrawCount > 0 ? 'style="display:none;"' : ''; ?>>
                <div class="mybets-empty-icon">
                  <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M69.5298 21.2739H58.4108C57.0786 21.2739 55.9986 22.3539 55.9986 23.6862V77.5877C55.9986 78.92 57.0786 80 58.4108 80H69.5298C70.8621 80 71.9421 78.92 71.9421 77.5877V23.6862C71.9421 22.3539 70.8621 21.2739 69.5298 21.2739Z" fill="#263742"></path>
                    <path d="M45.5615 36.9571H34.4424C33.1102 36.9571 32.0302 38.0371 32.0302 39.3694V77.5877C32.0302 78.9199 33.1102 79.9999 34.4424 79.9999H45.5615C46.8937 79.9999 47.9737 78.9199 47.9737 77.5877V39.3694C47.9737 38.0371 46.8937 36.9571 45.5615 36.9571Z" fill="#263742"></path>
                    <path d="M21.5892 52.2665H10.4702C9.13792 52.2665 8.05792 53.3465 8.05792 54.6787V77.5877C8.05792 78.92 9.13792 80 10.4702 80H21.5892C22.9215 80 24.0015 78.92 24.0015 77.5877V54.6787C24.0015 53.3465 22.9215 52.2665 21.5892 52.2665Z" fill="#263742"></path>
                    <path d="M21.8054 54.9316C21.8054 51.7407 19.2187 49.154 16.0278 49.154C12.8369 49.154 10.2501 51.7407 10.2501 54.9316V71.2491C10.2501 74.44 12.8369 77.0268 16.0278 77.0268C19.2187 77.0268 21.8054 74.44 21.8054 71.2491V54.9316Z" fill="#334552"></path>
                    <path d="M45.7777 38.1194C45.7777 34.9284 43.1909 32.3417 40 32.3417C36.8091 32.3417 34.2224 34.9284 34.2224 38.1194V71.1209C34.2224 74.3118 36.8091 76.8986 40 76.8986C43.1909 76.8986 45.7777 74.3118 45.7777 71.1209V38.1194Z" fill="#334552"></path>
                    <path d="M69.746 21.9485C69.746 18.7575 67.1593 16.1708 63.9684 16.1708C60.7775 16.1708 58.1907 18.7575 58.1907 21.9485V71.0219C58.1907 74.2128 60.7775 76.7995 63.9684 76.7995C67.1593 76.7995 69.746 74.2128 69.746 71.0219V21.9485Z" fill="#334552"></path>
                    <path d="M16.0279 46.3862C19.2573 46.3862 21.8752 43.7683 21.8752 40.5389C21.8752 37.3095 19.2573 34.6916 16.0279 34.6916C12.7985 34.6916 10.1806 37.3095 10.1806 40.5389C10.1806 43.7683 12.7985 46.3862 16.0279 46.3862Z" fill="#3C8725"></path>
                    <path d="M16.0277 42.0786C17.7507 42.0786 19.1475 40.6819 19.1475 38.9589C19.1475 37.2358 17.7507 35.8391 16.0277 35.8391C14.3047 35.8391 12.9079 37.2358 12.9079 38.9589C12.9079 40.6819 14.3047 42.0786 16.0277 42.0786Z" fill="#69E244"></path>
                    <path d="M22.33 32.3417L17.1462 27.1579L33.5883 10.7158L39.9892 17.1167L57.1059 0L62.2933 5.18743L39.9892 27.4879L33.5883 21.0833L22.33 32.3417Z" fill="#334552"></path>
                  </svg>
                </div>
                <span class="transaction-empty-text"><?php echo htmlspecialchars($translations['no-with']); ?></span>
              </div>
            </div>
            <div class="mybets-table-section bonuses-page hide">
              <div class="mybets-table-wrapper">
                <table class="mybets-table">
                  <thead>
                    <tr class="mybets-table-header">
                      <th><span class="mybets-table-heading"><?php echo htmlspecialchars($translations['date']); ?></span></th>
                      <th class="mybets-table-cell-left"><span class="mybets-table-heading"><?php echo htmlspecialchars($translations['type']); ?></span></th>
                      <th class=""><span class="mybets-table-heading"><?php echo htmlspecialchars($translations['amount']); ?></span></th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
              <div class="mybets-empty-state">
                <div class="mybets-empty-icon">
                  <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M69.5298 21.2739H58.4108C57.0786 21.2739 55.9986 22.3539 55.9986 23.6862V77.5877C55.9986 78.92 57.0786 80 58.4108 80H69.5298C70.8621 80 71.9421 78.92 71.9421 77.5877V23.6862C71.9421 22.3539 70.8621 21.2739 69.5298 21.2739Z" fill="#263742"></path>
                    <path d="M45.5615 36.9571H34.4424C33.1102 36.9571 32.0302 38.0371 32.0302 39.3694V77.5877C32.0302 78.9199 33.1102 79.9999 34.4424 79.9999H45.5615C46.8937 79.9999 47.9737 78.9199 47.9737 77.5877V39.3694C47.9737 38.0371 46.8937 36.9571 45.5615 36.9571Z" fill="#263742"></path>
                    <path d="M21.5892 52.2665H10.4702C9.13792 52.2665 8.05792 53.3465 8.05792 54.6787V77.5877C8.05792 78.92 9.13792 80 10.4702 80H21.5892C22.9215 80 24.0015 78.92 24.0015 77.5877V54.6787C24.0015 53.3465 22.9215 52.2665 21.5892 52.2665Z" fill="#263742"></path>
                    <path d="M21.8054 54.9316C21.8054 51.7407 19.2187 49.154 16.0278 49.154C12.8369 49.154 10.2501 51.7407 10.2501 54.9316V71.2491C10.2501 74.44 12.8369 77.0268 16.0278 77.0268C19.2187 77.0268 21.8054 74.44 21.8054 71.2491V54.9316Z" fill="#334552"></path>
                    <path d="M45.7777 38.1194C45.7777 34.9284 43.1909 32.3417 40 32.3417C36.8091 32.3417 34.2224 34.9284 34.2224 38.1194V71.1209C34.2224 74.3118 36.8091 76.8986 40 76.8986C43.1909 76.8986 45.7777 74.3118 45.7777 71.1209V38.1194Z" fill="#334552"></path>
                    <path d="M69.746 21.9485C69.746 18.7575 67.1593 16.1708 63.9684 16.1708C60.7775 16.1708 58.1907 18.7575 58.1907 21.9485V71.0219C58.1907 74.2128 60.7775 76.7995 63.9684 76.7995C67.1593 76.7995 69.746 74.2128 69.746 71.0219V21.9485Z" fill="#334552"></path>
                    <path d="M16.0279 46.3862C19.2573 46.3862 21.8752 43.7683 21.8752 40.5389C21.8752 37.3095 19.2573 34.6916 16.0279 34.6916C12.7985 34.6916 10.1806 37.3095 10.1806 40.5389C10.1806 43.7683 12.7985 46.3862 16.0279 46.3862Z" fill="#3C8725"></path>
                    <path d="M16.0277 42.0786C17.7507 42.0786 19.1475 40.6819 19.1475 38.9589C19.1475 37.2358 17.7507 35.8391 16.0277 35.8391C14.3047 35.8391 12.9079 37.2358 12.9079 38.9589C12.9079 40.6819 14.3047 42.0786 16.0277 42.0786Z" fill="#69E244"></path>
                    <path d="M22.33 32.3417L17.1462 27.1579L33.5883 10.7158L39.9892 17.1167L57.1059 0L62.2933 5.18743L39.9892 27.4879L33.5883 21.0833L22.33 32.3417Z" fill="#334552"></path>
                  </svg>
                </div>
                <span class="transaction-empty-text"><?php echo htmlspecialchars($translations['no-bonuses']); ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('#deposits_table').DataTable({
        pageLength: 5,
        lengthMenu: [
          [5, 10, 20, -1],
          [5, 10, 20, 'Todos']
        ],
        order: [
          [0, 'desc']
        ]
      });
      $('#deposits_table_length').hide();
      $('#deposits_table_filter').hide();
      $('#deposits_table_info').hide();

      $('#withdrawls_table').DataTable({
        pageLength: 5,
        lengthMenu: [
          [5, 10, 20, -1],
          [5, 10, 20, 'Todos']
        ],
        order: [
          [0, 'desc']
        ]
      });
      $('#withdrawls_table_length').hide();
      $('#withdrawls_table_filter').hide();
      $('#withdrawls_table_info').hide();
    });
  </script>
  <?php render_footer($translations); ?>
</div>