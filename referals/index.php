<?
require (dirname(__DIR__, 1). "/system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION['hash']) || empty($_SESSION['hash'])) {
    header('Location: /');
    die();
}

require (dirname(__DIR__, 1)."/panels/header.php");
require (dirname(__DIR__, 1)."/panels/sidebar.php");
require (dirname(__DIR__, 1)."/panels/chat.php");
require (dirname(__DIR__, 1)."/panels/mobile.php");

$sql_refer1 = "SELECT COUNT(*) FROM users WHERE ref_id = '$id' ORDER BY id DESC";
$sql_refer12 = mysqli_query($connection,$sql_refer1);
$row = mysqli_fetch_array($sql_refer12);

if($refuser == NULL){
$refuser = 'Нет';
}else{
$refuser = "#$refuser";
}

if($row['COUNT(*)'] < 10){
$percent_refs = 2;
$ref_level = 1;
}
if($row['COUNT(*)'] >= 10){
$percent_refs = 4;
$ref_level = 2;
}
if($row['COUNT(*)'] >= 25){
$percent_refs = 6;
$ref_level = 3;
}
if($row['COUNT(*)'] >= 50){
$percent_refs = 8;
$ref_level = 4;
}
if($row['COUNT(*)'] >= 100){
$percent_refs = 10;
$ref_level = 5;
}
?>

<body>
<link href="/css/referal.css" rel="stylesheet">

<div class="container">


  <div class="refferal">
      <div class="refferal__left">
          <div class="refferal__user">
              <div class="refferal__avatar">
                <img onClick="location.href='/profile'" class="user" src="<?=$img?>">
              </div>
              <div class="refferal__balance">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="sign">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0004 21.6C17.3023 21.6 21.6004 17.3019 21.6004 12C21.6004 6.69806 17.3023 2.39999 12.0004 2.39999C6.69846 2.39999 2.40039 6.69806 2.40039 12C2.40039 17.3019 6.69846 21.6 12.0004 21.6ZM10.6295 6.73792C10.2318 6.73792 9.90949 7.06027 9.90949 7.45792V11.7082H8.76562C8.36798 11.7082 8.04562 12.0306 8.04562 12.4282C8.04562 12.8259 8.36798 13.1482 8.76562 13.1482H9.90949V14.1934H8.76562C8.36798 14.1934 8.04562 14.5157 8.04562 14.9134C8.04562 15.311 8.36798 15.6334 8.76562 15.6334H9.90949V17.3842C9.90949 17.7819 10.2318 18.1042 10.6295 18.1042C11.0271 18.1042 11.3495 17.7819 11.3495 17.3842V15.6334H13.7359C14.1336 15.6334 14.4559 15.311 14.4559 14.9134C14.4559 14.5157 14.1336 14.1934 13.7359 14.1934H11.3495V13.1482H13.7359C14.586 13.1482 15.4012 12.8105 16.0023 12.2095C16.6034 11.6084 16.9411 10.7931 16.9411 9.94307C16.9411 9.09301 16.6034 8.27777 16.0023 7.67668C15.4012 7.0756 14.586 6.73792 13.7359 6.73792H10.6295ZM13.7359 11.7082H11.3495V8.17792H13.7359C14.2041 8.17792 14.6531 8.36389 14.9841 8.69492C15.3151 9.02595 15.5011 9.47492 15.5011 9.94307C15.5011 10.4112 15.3151 10.8602 14.9841 11.1912C14.6531 11.5223 14.2041 11.7082 13.7359 11.7082Z" fill="#F5A60B"></path>
                </svg>
                <span><?=$balance;?></span>
              </div>
          </div>
          <div class="refferal__nav">
             <a href="#" class="active"><i class="fa fa-link"></i>Company</a>
             <a href="/referals/reflist"><i class="fa fa-user-plus"></i> Ref</a>
             <!-- <a href="/referals/details"><i class="fa fa-history"></i> Отчисления</a>  -->
          </div>
      </div>
      <div class="refferal__right">
        <div class="refferal__link">
          <div class="refferal__link-title">
            <span>Earn with us</span>
            <p>Main page</p>
          </div>
          <div class="refferal__earn">
            <span>Profit</span>
            <p><?=round($refearn, 2);?> ₽</p>
          </div>
          <div>
            <p>Link</p>
              <div class="refferal__link-wrapp">
                <input id="reflink" value="https://t.me/splitcazbot?start=<?=$id?>" readonly="">
                <div class="refferal__link-value">https://t.me/splitcazbot?start=<?=$id?></div>
                <button type="button" onClick="copyRefer()">Copy <i class="fa fa-copy"></i></button>
              </div>
          </div>
        </div>

        <div class="refferal__stages">
            <div class="refferal__link-title">
              <p>Lvl</p>
            </div>
            <input id="refsCount" class="d-none" value="<?=$ref_level?>">
            <div class="ref-levels">
                <div class="ref-levels__line ref-levels__line_lvl-1"></div>
              <div class="ref-levels__lvl" id="lvl1" style="margin-left: -1px;">
                <div class="ref-levels__percent">2%</div>
                <div class="ref-levels__lvl-title">1</div>
                <div class="ref-levels__friends">
                    <div class="ref-levels__friends-cnt">0</div>
                    <div class="ref-levels__friends-title">ref</div>
                </div>
              </div>
              <div class="ref-levels__lvl" id="lvl2">
                <div class="ref-levels__percent">4%</div>
                <div class="ref-levels__lvl-title">2</div>
                <div class="ref-levels__friends">
                    <div class="ref-levels__friends-cnt">10</div>
                    <div class="ref-levels__friends-title">ref</div>
                </div>
              </div>
              <div class="ref-levels__lvl" id="lvl3">
                <div class="ref-levels__percent">6%</div>
                <div class="ref-levels__lvl-title">3</div>
                <div class="ref-levels__friends">
                    <div class="ref-levels__friends-cnt">25</div>
                    <div class="ref-levels__friends-title">ref</div>
                </div>
              </div>
              <div class="ref-levels__lvl" id="lvl4">
                <div class="ref-levels__percent">8%</div>
                <div class="ref-levels__lvl-title nextlvl-4">4</div>
                <div class="ref-levels__friends">
                    <div class="ref-levels__friends-cnt">50</div>
                    <div class="ref-levels__friends-title">ref</div>
                </div>
              </div>
              <div class="ref-levels__lvl" id="lvl5">
                <div class="ref-levels__percent">10%</div>
                <div class="ref-levels__lvl-title">5</div>
                <div class="ref-levels__friends">
                    <div class="ref-levels__friends-cnt">100+</div>
                    <div class="ref-levels__friends-title">ref</div>
                </div>
              </div>
          </div>
        </div>

        <div class="refferal__link">
          <div class="refferal__link-title">
            <span>Statistics are updated in real time</span>
            <p>Info</p>
          </div>
          <div class="refferal__stats">
            <div class="refferal__stat">
              <p><?=round($row['COUNT(*)'], 2);?></p>
              <span>Invite</span>
            </div>
            <div class="refferal__stat">
              <p><?=$percent_refs?>%</p>
              <span>Profit %</span>
            </div>
            <div class="refferal__stat">
              <p><?=$refuser?></p>
              <span>ID ref</span>
            </div>
            <div class="refferal__stat">
              <p><?=round($ref_deps, 2);?> </p>
              <span>Dep</span>
            </div>
            <div class="refferal__stat">
              <p><?=round($ref_deps_sum, 2);?> $</p>
              <span>Sum</span>
            </div>
            <div class="refferal__stat">
              <p><?=round($refearn, 2);?> $</p>
              <span>All profit</span>
            </div>
          </div>
        </div>

      </div>
  </div>

 <!-- tabs start -->
<!-- <div class="tabProject" style="display: none">
<div class="tabsMore">
<a href="#" class="tabsIner active"> <i class="fa fa-link"></i> Кампания</a>
<a href="/referals/reflist" class="tabsIner"> <i class="fa fa-user-plus"></i> Рефералы</a>
<a href="/referals/details" class="tabsIner"> <i class="fa fa-history"></i> Отчисления</a>
</div>
</div> -->
<!-- tabs end -->

<br>

<!-- <div class="affiliate_group" style="display: none">

<div class="affiliate_table">
<span class="affiliate_header">Моя кампания</span>

<div class="affiliate_table_colums"><span>НАЗВАНИЕ И ДАТА</span><span>ДОХОД И ССЫЛКА</span><span>СТАТУС</span></div>
<div class="affiliate_company">
 <div class="grouped">
   <span class="title">#<?=$id?></span>
   <span class="data"><?=$data_reg?></span>
 </div>
 <div class="grouped">
   <span class="amount"><?=round($refearn, 2);?> ₽</span>
<input id="reflink" autocomplete="off" readonly="" value="https://<?=$_SERVER['SERVER_NAME']?>/?i=<?=$id?>" />
   <span class="url" onClick="copyRefer()">https://<?=$_SERVER['SERVER_NAME']?>/?i=<?=$id?> <i class="fa fa-copy"></i></span>
 </div>
 <div class="grouped">
   <span class="status"><i class="fa fa-check"></i> Активная</span>
 </div>

</div>
<hr>
<input id="refsCount" class="d-none" value="<?=$ref_level?>">
<div class="ref-levels">
      <div class="ref-levels__line ref-levels__line_lvl-1"></div>
      <div class="ref-levels__lvl" id="lvl1" style="margin-left: -1px;">
        <div class="ref-levels__percent">2%</div>
        <div class="ref-levels__lvl-title">1</div>
        <div class="ref-levels__friends">
            <div class="ref-levels__friends-cnt">0</div>
            <div class="ref-levels__friends-title">рефов</div>
        </div>
      </div>
      <div class="ref-levels__lvl" id="lvl2">
        <div class="ref-levels__percent">4%</div>
        <div class="ref-levels__lvl-title">2</div>
        <div class="ref-levels__friends">
            <div class="ref-levels__friends-cnt">10</div>
            <div class="ref-levels__friends-title">рефов</div>
        </div>
      </div>
      <div class="ref-levels__lvl" id="lvl3">
        <div class="ref-levels__percent">6%</div>
        <div class="ref-levels__lvl-title">3</div>
        <div class="ref-levels__friends">
            <div class="ref-levels__friends-cnt">25</div>
            <div class="ref-levels__friends-title">рефов</div>
        </div>
      </div>
      <div class="ref-levels__lvl" id="lvl4">
        <div class="ref-levels__percent">8%</div>
        <div class="ref-levels__lvl-title nextlvl-4">4</div>
        <div class="ref-levels__friends">
            <div class="ref-levels__friends-cnt">50</div>
            <div class="ref-levels__friends-title">рефов</div>
        </div>
      </div>
      <div class="ref-levels__lvl" id="lvl5">
        <div class="ref-levels__percent">10%</div>
        <div class="ref-levels__lvl-title">5</div>
        <div class="ref-levels__friends">
            <div class="ref-levels__friends-cnt">100+</div>
            <div class="ref-levels__friends-title">рефов</div>
        </div>
      </div>
  </div>
</div>


<div class="affiliate_table">
<span class="affiliate_header">Статистика</span>

 <div class="affiliate-campaigns-stats-blocks">
   <div class="affiliate-campaigns-stats-block">
     <div class="key-value-block">
       <div class="key-value-block-body">
         <span class="key-value-block__title">Всего приглашено</span>
         <span class="key-value-block__value"><?=round($usersRef, 2);?></span>
       </div>
       <div class="key-value-block-body">
         <span class="key-value-block__title">Процент отчислений</span>
         <span class="key-value-block__value"><?=$percent_refs?>%</span>
       </div>
       <div class="key-value-block-body">
         <span class="key-value-block__title">ID Реферала</span>
         <span class="key-value-block__value"><?=$refuser?></span>
       </div>
     </div>
   </div>
 </div>

 <div class="affiliate-campaigns-stats-blocks">
   <div class="affiliate-campaigns-stats-block">
     <div class="key-value-block">
       <div class="key-value-block-body">
         <span class="key-value-block__title">Депозиты</span>
         <span class="key-value-block__value"><?=round($ref_deps, 2);?> шт.</span>
       </div>
       <div class="key-value-block-body">
         <span class="key-value-block__title">Сумма</span>
         <span class="key-value-block__value"><?=round($ref_deps_sum, 2);?> ₽</span>
       </div>
     </div>
   </div>
 </div>

 <div class="affiliate-campaigns-stats-blocks">
   <div class="affiliate-campaigns-stats-block">
     <div class="key-value-block">
       <div class="key-value-block-body">
         <span class="key-value-block__title">Общий доход</span>
         <span class="key-value-block__value"><?=round($refearn, 2);?> ₽</span>
       </div>
     </div>
   </div>
 </div>

</div>

</div> -->






</div>

 <script>
    function loadRefsCounter() {
    var userRefs = $('#refsCount').val();

    if(userRefs == 1){
      $('#lvl1').addClass(' active');
     }
    if(userRefs == 2){
      $('#lvl2').addClass(' active');
     }
    if(userRefs == 3){
      $('#lvl3').addClass(' active');
     }
    if(userRefs == 4){
      $('#lvl4').addClass(' active');
     }
    if(userRefs == 5){
      $('#lvl5').addClass(' active');
     }

    }
document.addEventListener("DOMContentLoaded", loadRefsCounter);
 </script>
<script>
var referal_link = document.getElementById("reflink");
var reflink = $('#reflink').val();
function copyRefer() {
  referal_link.select();
  document.execCommand("copy");
  toastr['success']("Скопировали значение: "+reflink)
}
</script>

<?
require (dirname(__DIR__, 1)."/panels/footer.php");
?>
</body>
</html>
