<?
require (dirname(__DIR__, 1)."/system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require (dirname(__DIR__, 1)."/panels/header.php");
require (dirname(__DIR__, 1)."/panels/sidebar.php");
require (dirname(__DIR__, 1)."/panels/chat.php");

?>
<body>
<link href="../css/game_materials.css" rel="stylesheet">
<link href='../css/mines2.css' rel='stylesheet'>
<script src="../js/minesjs.js" crossorigin="anonymous"></script>
<script type="text/javascript">
function historys() {
if(navigator.onLine == true) {
$("#livegames").load("mines.php #livegames");
 }
}
setInterval('historys()',500);
</script>


<div class="container">


<div class="dice">
	<div class="dice_sidebar">
		<div class="dice_sidebar-header">
			<i class="icon-gradient">
<?=$minesicon?>
			</i>
			<p style="color: #fff;margin-bottom: 0px;margin-left: 10px;">Mines</p>
		</div>
		<div class="dice_sidebar_field dice_sidebar-toolbar">
			<div class="dice_sidebar_field__header">Sum</div>
			<div class="dice_sidebar_field__body">
				<button onclick="$('#inputBetAmount').val(1);" class="buttonProject" style="width:25%;">Min</button><button onclick="$('#inputBetAmount').val(Number($('#inputBetAmount').val())*2);" class="buttonProject" style="width:25%;">X2</button>
				<div class="input_gradient"><input value="1" id="inputBetAmount"/><span></span></div>
				<button onclick="$('#inputBetAmount').val(Number($('#inputBetAmount').val())/2);" class="buttonProject" style="width:25%;">/2</button><button onclick="var max = $('#userBalance').attr('myBalance');$('#inputBetAmount').val(Math.max(max,1));" class="buttonProject"style="width:25%;">Max</button>
			</div>
		</div>
		<div class="dice_sidebar_field dice_sidebar-toolbar">
			<div class="dice_sidebar_field__header">Bombs</div>
			<div class="dice_sidebar_field__body">
				<button onclick="$('#betBombMines').val(2);getRtMines(2); _mines.setXS(2);" class="buttonProject" style="width:25%;">2</button><button onclick="$('#betBombMines').val(5);getRtMines(5); _mines.setXS(5);" class="buttonProject" style="width:25%;">5</button>
				<div class="input_gradient "><input value="2" max="24" onkeyup="_mines.setXS($(this).val()); var diamonds = $(this).val(); getRtMines(diamonds);" onchange="isright(this);" name="amount" id="betBombMines" class="mines-betzzz"/><span></span></div>
				<button onclick="$('#betBombMines').val(10);getRtMines(10); _mines.setXS(10);" class="buttonProject" style="width:25%;">10</button><button onclick="$('#betBombMines').val(24);getRtMines(24); _mines.setXS(24);" class="buttonProject"  style="width:25%;">24</button>
			</div>
		</div>

<button class="buttonProject w100 mbtts start-game-btn" id="mines_start" data-btn="game" onclick="startgameMine();">Play</button>

<div class="finish-game-btn">
<button id="finishmines" disabled="disabled" class="buttonProject mbtts w100" data-btn="collect" onclick="finishgameMine();">Take: <span style='margin-left:5px;' id="win">0.00 </span></button>

<button id="automines" style="width:98%" class="buttonAutoMiner mbtts mt-3 finish-game-btn" data-btn="collect" onclick="autoselect_mines()">Auto </button>
</div>

<script>
function getRtMines(id){
var diamond = id;

var realDiamonds = 25-diamond;

$('#counterD').html(realDiamonds);
$('#counterB').html(diamond);
}

</script>

</div>

<!-- MAIN STRUCTURE START -->
<div class="dice_main">
<div class="dice-game">



<div class="minesRateCount leftDiamonds">
<img src="../images/logo-mob_2.png">
<span id="counterD">23</span>
</div>

<div class="minesRateCount rightMines">
<img src="../images/mines/angry.png">
<span id="counterB">2</span>
</div>

<div class="minesModaled">
  <div class="minesModaledContainer">
     <div class="headContainer"><div class="headText">Win</div></div>

     <div class="contentMultiplier">0x</div>
     <hr class="contentHr">

     <div class="minesPayoutBlock">
         <span class="minesPayoutValue">
             <span class="minesPayoutValueGroup">
                 <span class="minesPayoutSum">0</span>
                 <span class="minesPayoutVault">$</span>
             </span>
           </span>
    </div>

  </div>
</div>


<!-- mines game -->


<div class="card-body">
      <div id="mines" class="minefield">



               <button onclick="mmine(1)" id="b1" class="mine btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(2)" id="b2" class="mine btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(3)" id="b3" class="mine btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(4)" id="b4" class="mine   btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(5)" id="b5" class="mine   btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(6)" id="b6" class="mine   btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(7)" id="b7" class="mine   btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(8)" id="b8" class="mine   btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(9)" id="b9" class="mine   btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(10)" id="b10" class="mine   btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(11)" id="b11" class="mine   btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(12)" id="b12" class="mine   btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(13)" id="b13" class="mine   btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(14)" id="b14" class="mine   btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(15)" id="b15" class="mine   btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(16)" id="b16" class="mine   btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(17)" id="b17" class="mine   btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(18)" id="b18" class="mine   btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(19)" id="b19" class="mine   btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(20)" id="b20" class="mine   btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(21)" id="b21" class="mine   btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(22)" id="b22" class="mine   btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(23)" id="b23" class="mine   btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(24)" id="b24" class="mine   btn btn-mines" style="background-color:#ffffff"></button>
               <button onclick="mmine(25)" id="b25" class="mine   btn btn-mines" style="background-color:#ffffff"></button>



</div>

                <div id="mines-modal"></div>


<div class="xs" >
<div class="item" data-p="1" data-mine="1.09">1.09x</div>
<div class="item" data-p="2" data-mine="1.19">1.19x</div>
<div class="item" data-p="3" data-mine="1.3">1.3x</div>
<div class="item" data-p="4" data-mine="1.43">1.43x</div>
<div class="item" data-p="5" data-mine="1.58">1.58x</div>
<div class="item" data-p="6" data-mine="1.75">1.75x</div>
<div class="item" data-p="7" data-mine="1.96">1.96x</div>
<div class="item" data-p="8" data-mine="2.21">2.21x</div>
<div class="item" data-p="9" data-mine="2.5">2.5x</div>
<div class="item" data-p="10" data-mine="2.86">2.86x</div>
<div class="item" data-p="11" data-mine="3.3">3.3x</div>
<div class="item" data-p="12" data-mine="3.85">3.85x</div>
<div class="item" data-p="13" data-mine="4.55">4.55x</div>
<div class="item" data-p="14" data-mine="5.45">5.45x</div>
<div class="item" data-p="15" data-mine="6.67">6.67x</div>
<div class="item" data-p="16" data-mine="8.33">8.33x</div>
<div class="item" data-p="17" data-mine="10.71">10.71x</div>
<div class="item" data-p="18" data-mine="14.29">14.29x</div>
<div class="item" data-p="19" data-mine="20">20x</div>
<div class="item" data-p="20" data-mine="30">30x</div>
<div class="item" data-p="21" data-mine="50">50x</div>
<div class="item" data-p="22" data-mine="100">100x</div>
<div class="item" data-p="23" data-mine="300">300x</div>
</div>



</div>




</div>
</div>
<!-- MAIN STRUCTURE END-->

</div>

<?
require (dirname(__DIR__, 1)."/panels/livefeed.php");
?>
</div>

<?
require (dirname(__DIR__, 1)."/panels/footer.php");
?>



</body>
</html>
