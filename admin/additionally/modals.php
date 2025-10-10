<link rel="stylesheet" href="../../css/game_materials.css" crossorigin="anonymous" />
<link rel="stylesheet" href="../../css/modal.css" crossorigin="anonymous" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<!-- Создание промокода -->
<div class="modal fade" id="createPromocode" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="dice_sidebar-header">
          <div class="icon-gradient"><i class="fa fa-tasks" aria-hidden="true"></i></div>
          <p style="color: #fff;margin-bottom: 0px;margin-left: 10px;">Создание промокода</p>
        </div>
        <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>
      </div>

      <div class="modal-body">

        <div class="modal-forms">
          <span class="title">Название</span>
          <div style="display: flex;gap: 15px;">
            <input class="enter" id="promoname" placeholder="Название промокода">
            <button class="buttonProject" style="width:10%;height: 100%;" onclick="generateRandomCode()"><i style="color:#000;" class="fa fa-brush" aria-hidden="true"></i></button>
          </div>
        </div>
        <div class="modal-forms">
          <span class="title">Сумма (или % к депу)</span>
          <input class="enter" id="promosum" placeholder="Сумма промокода (или % к депу)">

          <div style="display: flex;gap: 10px;">
            <button class="additionalBtn w100" onClick="$('#promosum').val(5);">5</button>
            <button class="additionalBtn w100" onClick="$('#promosum').val(10);">10</button>
            <button class="additionalBtn w100" onClick="$('#promosum').val(15);">15</button>
            <button class="additionalBtn w100" onClick="$('#promosum').val(20);">20</button>
            <button class="additionalBtn w100" onClick="$('#promosum').val(25);">25</button>
            <button class="additionalBtn w100" onClick="$('#promosum').val(50);">50</button>
          </div>

        </div>
        <div class="modal-forms">
          <span class="title">Активаций</span>
          <input class="enter" id="promoact" placeholder="Количество активаций">

          <div style="display: flex;gap: 10px;">
            <button class="additionalBtn w100" onClick="$('#promoact').val(10);">10</button>
            <button class="additionalBtn w100" onClick="$('#promoact').val(15);">15</button>
            <button class="additionalBtn w100" onClick="$('#promoact').val(20);">20</button>
            <button class="additionalBtn w100" onClick="$('#promoact').val(25);">25</button>
            <button class="additionalBtn w100" onClick="$('#promoact').val(50);">50</button>
            <button class="additionalBtn w100" onClick="$('#promoact').val(100);">100</button>
          </div>

        </div>
        <div class="modal-forms">
          <span class="title">Тип промокода</span>
          <select class="main-form-input" id="type_promo">
            <option value="balance">Баланс</option>
            <option value="deposit">% к депозиту</option>
            <option value="freespins">Фриспины</option>
          </select>

        </div>
        <hr>

        <button class="buttonProject w100" onclick="create()">Создать</button>

      </div>
    </div>
  </div>
</div>




<!-- Смена статуса выплаты -->
<div class="modal fade" id="editstatus" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="dice_sidebar-header">
          <div class="icon-gradient"><i class="fa fa-tasks" aria-hidden="true"></i></div>
          <p style="color: #fff;margin-bottom: 0px;margin-left: 10px;">Изменение статуса выплаты <b>#<span id="editidw"></span><span id="useridw" class="d-none"></span><span id="usersumw" class="d-none"> </span></b></p>
        </div>
        <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>
      </div>

      <div class="modal-body" style="justify-content:center;display:flex;gap:10px;">

        <button class="btn btn-success" style="width:140px; display:inline-block" onclick="withdraw_adm('succes')">Выполнить</button>
        <button class="btn btn-danger" style="width:140px; display:inline-block" onclick="withdraw_adm('error')">Отозвать</button>
        <button class="btn btn-info" style="width:140px; display:inline-block" onclick="withdraw_adm('procces')">В процессе</button>

      </div>
    </div>
  </div>
</div>



<!-- Ticket -->
<div class="modal fade" id="ticketEdit" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="dice_sidebar-header">
          <div class="icon-gradient"><i class="fa fa-tasks" aria-hidden="true"></i></div>
          <p style="color: #fff;margin-bottom: 0px;margin-left: 10px;">Тикет <b>#<span id="tid"></span></b></p>
        </div>
        <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>
      </div>

      <div class="modal-body" style="justify-content:center;display:flex;gap:10px;">

        <div class="ticket_wraps">

          <div class="t_create_wrap"><label>Ответить по тикету</label>
            <textarea id="tmess" class="t_area" autocomplete="off" placeholder="Введите текст"></textarea>
          </div>
          <button class="buttonProject w100" onClick="responseTicket();">Ответить и закрыть тикет</button>
        </div>



      </div>
    </div>
  </div>
</div>