<?
require ("system/config.php");
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
$allowed = ['en','es','ru'];
if (!in_array($lang, $allowed, true)) {
    $lang = 'en';
}

// подключаем файл перевода
$path = __DIR__ . "/lang/{$lang}.php";
if (is_file($path)) {
    $translations = require $path;
} else {
    // страховка: если файла нет — грузим en
    $translations = require __DIR__ . "/lang/en.php";
}

$sid = $_SESSION['hash'];

$select = "SELECT * FROM users WHERE hash = '$sid'";
         $result = mysqli_query($connection,$select);
         $get = mysqli_fetch_array($result);
		 if($get)
		{
          $login = $get['login'];
          $pass = $get['pass'];
          $balance = round($get['balance'], 2);
          $id = $get['id'];
          $social_link = $get['social'];
          $is_admin = $get['admin'];
          $is_ban = $get['ban'];
          $img = $get['img'];
          $usersRef = $get['refs'];
          $refearn = $get['refearn'];
          $data_reg = $get['data_reg'];
          $rakeback = $get['rakeback'];
        }

$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<html lang="<?= htmlspecialchars($lang, ENT_QUOTES, 'UTF-8') ?>">

<head>
  <meta charset="utf-8">
  <meta name="author" content="termus">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../images/logo-mob.png" type="image/png">
  <meta name="description" content="<?=$sitename?> - <?= $translations['catch_your_coefficient_by_the_tail'] ?>">
  <!-- CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@800&family=Rubik&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link href='https://fonts.googleapis.com/css?family=Rubik' rel='stylesheet'>

  <!-- End CSS -->
  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js" crossorigin="anonymous"></script>
  <!-- End Scripts -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="/js/toastr.min.js" crossorigin="anonymous"></script>

<link rel="stylesheet" href="/css/toastr.css" crossorigin="anonymous"/>
  <!-- NEW CSS -->
  <link href='/css/header.css' rel='stylesheet'>
  <link href='/css/livefeed.css' rel='stylesheet'>
  <link href='/css/footer.css' rel='stylesheet'>
  <link href='/css/sidebar.css' rel='stylesheet'>
  <link href='/css/more.css' rel='stylesheet'>
  <link href='/css/modal.css' rel='stylesheet'>

  <title><?=$sitename?> - <?= $translations['catch_your_coefficient_by_the_tail'] ?></title>
</head>


<body>


<div class="container">

<style>
   .notfoundimage{
    width: 500px;
    height: 500px;
    justify-items: center;
    justify-content: center;
    display: flex;
    margin: 0 auto;
    outline: none;
    user-select: none;
   }
   .notfoundtext{
text-align: center;
    color: #fff;
    font-size: 32px;
   }
   .notfoundblock{
    justify-content: center;
    display: grid;
    gap: 20px;
   }
</style>
<div class="notfoundblock">
<img class="notfoundimage" src="/images/404/notfound.png">
<span class="notfoundtext"><?= $translations['account_blocked'] ?></span>
</div>
</div>

<script>
var stateObj = { foo: "bar" };
   history.pushState(stateObj, "", "/");
</script>
<?
require ("panels/footer.php");
?>
</body>
</html>
