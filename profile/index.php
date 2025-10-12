<?
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


$total_deps_found = "SELECT SUM(amount) FROM deposits WHERE user_id = '$id' AND status = '1'";
$total_deps_found_query = mysqli_query($connection, $total_deps_found);
$totalDepsRow = mysqli_fetch_array($total_deps_found_query);
$allDepositsUser = $totalDepsRow['SUM(amount)'];

$total_withs_found = "SELECT SUM(sum) FROM withdraws WHERE user_id = '$id' AND status = '1'";
$total_withs_found_query = mysqli_query($connection, $total_withs_found);
$totalwithsRow = mysqli_fetch_array($total_withs_found_query);
$allWithdrawsUser = $totalwithsRow['SUM(sum)'];
?>


<link href="../css/profileNew.css" rel="stylesheet">
<link href="../css/index.css" rel="stylesheet">

<div class="main-container ">

  <style>

  </style>




  <div class="profile-container">
    <div class="profile-inner ">
      <div class="profile_container-content ">

        <div class="profile_leftside">

          <div class="profile_user">
            <div class="profile_user-avatar"><img src="<?= $img ?>" alt="profile"></div>
            <span class="profile_user-login"><?= $login ?> ID:<?= $id ?></span>
            <span class="profile_user-date"><?= $translations['at_site_since'] ?> <?= $data_reg ?></span>
          </div>
          <div class="profile_menu">
            <span class="profile_settings"><?= $translations['settings'] ?></span>
            <ul id="menu">
              <li id="gt1" class="active">
                <div class="icon"><i class="fa fa-info-circle"></i></div><?= $translations['info'] ?>
              </li>
              <li id="gt2">
                <div class="icon"><i class="fa fa-user-plus"></i></div><?= $translations['socials'] ?>
              </li>
              <li id="gt4">
                <div class="icon"><i class="fa fa-bookmark"></i></div><?= $translations['statistic'] ?>
              </li>
              <li id="logout">
                <div class="icon"><i class="fa fa-arrow-left"></i></div><?= $translations['log_out'] ?>
              </li>
            </ul>
          </div>

        </div>

        <div class="profile_content">

          <div class="profile_content_information" id="tab1">
            <span class="title"><?= $translations['information'] ?></span>
            <div class="info_body">
              <div class="info_row">
                <div class="info_group">
                  <span class="info_group_label"><?= $translations['name'] ?></span>
                  <input class="info_group_input" type="text" placeholder="<?= $translations['name'] ?>" value="<?= $real_name ?>" id="real_name">
                  <div class="info_group_saved"></div>
                  <i class="fa fa-lock info_group_lock"></i>
                </div>
                <div class="info_group">
                  <span class="info_group_label"><?= $translations['so-name'] ?></span>
                  <input class="info_group_input" type="text" placeholder="<?= $translations['so-name'] ?>" value="<?= $real_surname ?>" id="real_surname">
                  <div class="info_group_saved"></div>
                  <i class="fa fa-lock info_group_lock"></i>
                </div>
              </div>
              <div class="info_row">
                <div class="info_group">
                  <span class="info_group_label"><?= $translations['date_birthday'] ?></span>
                  <input class="info_group_input" placeholder="<?= $translations['date_birthday'] ?>" type="date" value="<?= $birthday ?>" min="1900-01-01" max="2100-12-31" id="userBirthday">
                  <div class="info_group_saved"></div>
                  <i class="fa fa-lock info_group_lock"></i>
                </div>
                <div class="info_group">
                  <span class="info_group_label"><?= $translations['country'] ?></span>
                  <input class="info_group_input" type="text" placeholder="<?= $translations['country'] ?>" value="<?= $real_country ?>" id="real_country">
                  <div class="info_group_saved"></div>
                  <i class="fa fa-lock info_group_lock"></i>
                </div>
              </div>
              <div class="info_row">
                <div class="info_group">
                  <span class="info_group_label"><?= $translations['city'] ?></span>
                  <input class="info_group_input" type="text" placeholder="<?= $translations['city'] ?>" value="<?= $real_town ?>" id="real_town">
                  <div class="info_group_saved"></div>
                  <i class="fa fa-lock info_group_lock"></i>
                </div>
                <div class="info_group">
                  <span class="info_group_label"><?= $translations['e-mail'] ?></span>
                  <input class="info_group_input" type="text" placeholder="<?= $translations['e-mail'] ?>" value="<?= $real_email ?>" id="real_email">
                  <div class="info_group_saved"></div>
                  <i class="fa fa-lock info_group_lock"></i>
                </div>
              </div>
              <div class="info_row">
                <div class="info_group">
                  <span class="info_group_label"><?= $translations['phone'] ?></span>
                  <input class="info_group_input" type="number" placeholder="<?= $translations['phone'] ?>" value="<?= $real_telephone ?>" id="real_telephone">
                  <div class="info_group_saved"></div>
                  <i class="fa fa-lock info_group_lock"></i>
                </div>
                <div class="info_group profile-save_button">
                  <button class="buttonProject info_button-save" onClick="updateUserInfo()"><?= $translations['save'] ?></button>
                </div>
              </div>

              <div class="info_row" style="margin-top: 10px;">
                <div class="info_group">
                  <span class="info_group_label"><?= $translations['wager'] ?>:</span>
                  <span style="font-weight: bold;color: var(--main-color-hight);font-size: 24px;margin-top: -10px;"><?= $wager ?></span>
                </div>
              </div>

            </div>
          </div>

          <div class="profile_content_socials" id="tab2" style="display:none;">
            <span class="title"><?= $translations['socials'] ?></span>
            <div class="social_content">
              <div class="social_list">


                <?
                if ($get['tg'] == 1) {
                ?>
                  <button class="social-button social-tg">
                    <svg width="27" height="27" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M41.4193 7.30899C41.4193 7.30899 45.3046 5.79399 44.9808 9.47328C44.8729 10.9883 43.9016 16.2908 43.1461 22.0262L40.5559 39.0159C40.5559 39.0159 40.3401 41.5048 38.3974 41.9377C36.4547 42.3705 33.5408 40.4227 33.0011 39.9898C32.5694 39.6652 24.9068 34.7955 22.2086 32.4148C21.4531 31.7655 20.5897 30.4669 22.3165 28.9519L33.6487 18.1305C34.9438 16.8319 36.2389 13.8019 30.8426 17.4812L15.7331 27.7616C15.7331 27.7616 14.0063 28.8437 10.7686 27.8698L3.75342 25.7055C3.75342 25.7055 1.16321 24.0823 5.58815 22.459C16.3807 17.3729 29.6555 12.1786 41.4193 7.30899Z" fill="#ffffff"></path>
                    </svg><?= $tgid ?></button>
                <? } ?>
              </div>
            </div>
          </div>



          <div class="profile_content_details" id="tab4" style="display:none;">
            <span class="title">Statistic</span>
            <div class="stats_content">
              <div class="stats_list">

                <div class="user_statistic">
                  <img src="/images/profile/moneyBig.png" alt="money">
                  <p>All deposits</p>
                  <h2><?= round(isset($allDepositsUser) ? $allDepositsUser : 0, 2); ?>₽</h2>
                </div>
                <div class="user_statistic">
                  <img src="/images/profile/moneyBig.png" alt="money">
                  <p>All withdrawl</p>
                  <h2><?= round(isset($allWithdrawsUser) ? $allWithdrawsUser : 0, 2); ?>₽</h2>
                </div>
                <div class="user_statistic">
                  <img src="/images/profile/moneyBig.png" alt="money">
                  <p>All transwer</p>
                  <h2><?= round(intval($total_send ?? 0), 2); ?>₽</h2>
                </div>
                <div class="user_statistic">
                  <img src="/images/profile/moneyBig.png" alt="money">
                  <p>All rakeback</p>
                  <h2><?= round(intval($total_rakeback ?? 0), 2); ?>₽</h2>
                </div>
                <div class="user_statistic">
                  <img src="/images/profile/moneyBig.png" alt="money">
                  <p>All cashback</p>
                  <h2><?= round(intval($total_cashback ?? 0), 2); ?>₽</h2>
                </div>
                <div class="user_statistic">
                  <img src="/images/profile/moneyBig.png" alt="money">
                  <p>All promo</p>
                  <h2><?= round(intval($total_promo ?? 0), 2); ?>₽</h2>
                </div>



              </div>
            </div>
          </div>


        </div>

      </div>


    </div>
  </div>

</div>
<?
require(dirname(__DIR__, 1) . "/panels/footer.php");
render_footer($translations)
?>
<script>
  $(document).ready(function() {
    $('#user_details').DataTable({


      pageLength: 5,
      lengthMenu: [
        [5, 10, 20, -1],
        [5, 10, 20, 'Todos']
      ],
      order: [
        [0, 'desc']
      ]
    });
    $('#user_details_length').hide();
    $('#user_details_filter').hide();
    $('#user_details_info').hide();
  });


  function lock_info() {
    var lock_info = $('#hash_lock').val();
    if (lock_info == 1) {
      $('.info_group_lock').show();
      $('.info_group_input').prop("disabled", true);
    }
  }
  document.addEventListener("DOMContentLoaded", lock_info);

  function updateUserInfo() {
    $.ajax({
      type: 'POST',
      url: 'scriptController.php',
      beforeSend: function() {
        $('.info_button-save').html('<div class="loaderThink"></div>');
      },
      data: {
        type: "updateUserInfo",
        real_name: $('#real_name').val(),
        real_surname: $('#real_surname').val(),
        userBirthday: $('#userBirthday').val(),
        real_country: $('#real_country').val(),
        real_town: $('#real_town').val(),
        real_email: $('#real_email').val(),
        real_telephone: $('#real_telephone').val()
      },
      success: function(data) {
        var obj = jQuery.parseJSON(data);
        if (obj.success == "success") {
          $('.info_button-save').html('Сохранить');
          $('.info_group_saved').html('Сохранено');
          $('.info_group_saved').fadeIn(200);
          setTimeout(resetInputBlur, 1200);
          return toastr['success']('Информация обновлена')
        } else {
          $('.info_button-save').html('Сохранить');
          return toastr['error'](obj.error)
        }
      }
    });
  }

  function resetInputBlur() {
    $('.info_group_saved').fadeOut(200);
  }
  $("#gt1").click(function() {
    $('#tab1').show();
    $('#tab2').hide();
    $('#tab3').hide();
    $('#tab4').hide();
  });
  $("#gt2").click(function() {
    $('#tab2').show();
    $('#tab3').hide();
    $('#tab1').hide();
    $('#tab4').hide();
  });
  $("#gt3").click(function() {
    $('#tab3').show();
    $('#tab2').hide();
    $('#tab1').hide();
    $('#tab4').hide();
  });
  $("#gt4").click(function() {
    $('#tab4').show();
    $('#tab3').hide();
    $('#tab2').hide();
    $('#tab1').hide();
  });

  $("#logout").click(function() {
    window.location.href = '/logout';
  });


  $("#menu li").click(function() {
    if (!($(this).closest("li").hasClass("active"))) {
      $(this).closest("#menu").find("li.active").removeClass('active');
    }
    $(this).closest("li").addClass('active');
  });
</script>