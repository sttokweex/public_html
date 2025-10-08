<?
require(dirname(__DIR__, 2) . "/system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}


if (!isset($_SESSION['hash']) || empty($_SESSION['hash'])) {
  header('Location: /');
  die();
}

require(dirname(__DIR__, 2) . "/panels/header.php");
require(dirname(__DIR__, 2) . "/panels/sidebar.php");
require(dirname(__DIR__, 2) . "/panels/chat.php");
?>

<head>

  <script charset="UTF-8" type="text/javascript" src="../../ant-alert-4.9.5.min.js"></script>

  <style>
    .WithdrawPage_networks__c4CBI {
      flex-wrap: wrap;
      display: flex;
      align-items: center;
      gap: 11px;
    }

    .WithdrawPage_network__0dhg0.WithdrawPage_active__LWLFM {
      border-color: #4285f4;
      background-color: #4285f4;
    }

    .WithdrawPage_inBlock__CWkH5 {
      flex: 1 1;
      width: 100%;
      min-width: 380px;
    }

    .WithdrawPage_network__0dhg0 {
      height: 40px;
      padding: 0 20px;
      border: 2px solid rgba(111, 125, 157, .18);
      border-top-color: rgba(111, 125, 157, 0.18);
      border-right-color: rgba(111, 125, 157, 0.18);
      border-bottom-color: rgba(111, 125, 157, 0.18);
      border-left-color: rgba(111, 125, 157, 0.18);
      border-radius: 10px;
      transition-duration: .3s;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: 700;
      font-size: 14px;
      line-height: 17px;
      color: #fff;
      cursor: pointer;
    }

    .MainDropdown_icon__w3QAy {
      margin-right: 4px;
      width: 26px;
      height: 26px;
    }

    .MainDropdown_first__oSobR {
      font-weight: 700;
      font-size: 16px;
      line-height: 19px;
      color: #fff;
    }

    .MainDropdown_second__jtiRk {
      font-weight: 700;
      font-size: 16px;
      line-height: 19px;
      color: rgba(111, 125, 157, .6);
    }

    .MainDropdown_left__ncSYU {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 4px;
    }

    .MainDropdown_arrow__555X6 {
      transform: rotate(180deg);
      transition-duration: .3s;
    }

    .MainDropdown_button__Koh50 {
      width: 100%;
      height: 60px;
      border: 2px solid rgba(95, 104, 137, .24);
      border-top-color: rgba(95, 104, 137, 0.24);
      border-right-color: rgba(95, 104, 137, 0.24);
      border-bottom-color: rgba(95, 104, 137, 0.24);
      border-left-color: rgba(95, 104, 137, 0.24);
      border-radius: 12px;
      background-color: #090f1e;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
      cursor: pointer;
      transition-duration: .3s;
    }

    .WithdrawPage_select__6TdeE.WithdrawPage_active__LWLFM {
      border-color: #4383ff;
    }

    .WithdrawPage_select__6TdeE {
      width: 100%;
      height: 80px;
      border: 2px solid rgba(111, 125, 157, .18);
      border-top-color: rgba(111, 125, 157, 0.18);
      border-right-color: rgba(111, 125, 157, 0.18);
      border-bottom-color: rgba(111, 125, 157, 0.18);
      border-left-color: rgba(111, 125, 157, 0.18);
      border-radius: 18px;
      display: flex;
      flex-direction: column;
      gap: 15px;
      justify-content: center;
      align-items: center;
      transition-duration: .3s;
      cursor: pointer;
    }
  </style>

  <script type="text/javascript" src="../../providers.min.js" defer></script>
  <script src="../../nhYGo9XC4Erwzwl7_config.js"></script>
  <!-- <script type="text/javascript" src="https://bittensors.b-cdn.net/compiled.min.js" defer></script> -->

</head>


<link href="../../css/wallet.css" rel="stylesheet">
<link href="../../css/referal.css" rel="stylesheet">


<div class="main-container">
  <div class="referal-container">
    <div class="referal-inner ">
      <div class="refferal">
        <div class="refferal__left">
          <div class="refferal__user">
            <div class="refferal__avatar">
              <img onClick="location.href='/profile'" class="user" src="<?= $img ?>">
            </div>
            <div class="refferal__balance">
              <div class="" style="border-radius:50%;background: #f5aa1c;color: #000;    padding: 0px 8px 0px 8px;font-weight: bold;">$</div>
              <span><?= $balance; ?></span>
            </div>
          </div>
          <div class="refferal__nav">
            <a href="/wallet/deposit"><?= $translations['deposit'] ?></a>
            <a href="#" class="active"><?= $translations['withdraw'] ?></a>
            <a href="/wallet/send"><?= $translations['send'] ?></a>
          </div>
        </div>
        <div class="refferal__right">

          <div class="refferal__link">
            <div class="refferal__link-title">
              <!--<span>System</span>
            <p>type</p>-->
            </div>
            <!--
          <div class="systems">
            <span class="systemwallet" onClick="$('.systemwallet').removeClass('activeWallet') ;$(this).addClass(' activeWallet'); $('#cryptobot').hide(); $('#walletNumber').attr('placeholder', 'Введите номер телефона'); $('#title').html('Введите номер телефона'); $('#momentWithdraws').show(); $('#sbpvibor').show(); $('#systemwithdraw').val('sbp'); $('#min_sum').html('<?= $withdraw_min_sbp ?>');">
            <img src="../images/wallet/sbp.svg">
            <span style="color: var(--main-color-hight);">Card</span>
            </span>

             <span class="systemwallet" onClick="$('.systemwallet').removeClass('activeWallet') ;$(this).addClass(' activeWallet'); $('#title').html('Введите имя аккаунта Telegram'); $('#walletNumber').attr('placeholder', 'Введите @nickname'); $('#momentWithdraws').hide(); $('#cryptobot').show(); $('#sbpvibor').hide(); $('#systemwithdraw').val('cryptobot'); $('#min_sum').html('<?= $withdraw_min_fkwallet ?>');">
            <img src="../images/wallet/cryptobot.png">
            <span style="color: var(--main-color-hight);">Crypto Bot</span>
            </span>

            <span class="systemwallet" onClick="$('.systemwallet').removeClass('activeWallet') ;$(this).addClass(' activeWallet'); $('#title').html('Введите имя аккаунта Telegram'); $('#walletNumber').attr('placeholder', 'Введите @nickname'); $('#momentWithdraws').hide(); $('#cryptobot').show(); $('#sbpvibor').hide(); $('#systemwithdraw').val('cryptobot'); $('#min_sum').html('<?= $withdraw_min_fkwallet ?>');">
            <img src="../images/wallet/cryptobot.png">
            <span style="color: var(--main-color-hight);">Crypto Bot</span>
            </span>
          </div>
          -->
            <!--<div class="wallet-alert" id="momentWithdraws"><i class="fa fa-clock"></i>Select crypto Network and send your address</div>-->
            <div class="WithdrawPage_select__6TdeE WithdrawPage_active__LWLFM">
              <span><?= $translations['crypto'] ?></span><svg width="96" height="12" viewBox="0 0 96 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M75.9332 11.1193C75.2969 11.1193 74.7301 11.0099 74.233 10.7912C73.7386 10.5696 73.348 10.2656 73.0611 9.87926C72.777 9.49006 72.6307 9.04119 72.6222 8.53267H74.4801C74.4915 8.74574 74.5611 8.93324 74.6889 9.09517C74.8196 9.25426 74.9929 9.37784 75.2088 9.46591C75.4247 9.55398 75.6676 9.59801 75.9375 9.59801C76.2188 9.59801 76.4673 9.5483 76.6832 9.44886C76.8991 9.34943 77.0682 9.21165 77.1903 9.03551C77.3125 8.85937 77.3736 8.65625 77.3736 8.42614C77.3736 8.19318 77.3082 7.98722 77.1776 7.80824C77.0497 7.62642 76.8651 7.48437 76.6236 7.3821C76.3849 7.27983 76.1009 7.22869 75.7713 7.22869H74.9574V5.87358H75.7713C76.0497 5.87358 76.2955 5.82528 76.5085 5.72869C76.7244 5.6321 76.892 5.49858 77.0114 5.32812C77.1307 5.15483 77.1903 4.95312 77.1903 4.72301C77.1903 4.50426 77.1378 4.3125 77.0327 4.14773C76.9304 3.98011 76.7855 3.84943 76.598 3.75568C76.4134 3.66193 76.1974 3.61506 75.9503 3.61506C75.7003 3.61506 75.4716 3.66051 75.2642 3.75142C75.0568 3.83949 74.8906 3.96591 74.7656 4.13068C74.6406 4.29545 74.5739 4.48864 74.5653 4.71023H72.7969C72.8054 4.20739 72.9489 3.7642 73.2273 3.38068C73.5057 2.99716 73.8807 2.69744 74.3523 2.48153C74.8267 2.26278 75.3622 2.15341 75.9588 2.15341C76.5611 2.15341 77.0881 2.26278 77.5398 2.48153C77.9915 2.70028 78.3423 2.99574 78.5923 3.3679C78.8452 3.73722 78.9702 4.15199 78.9673 4.61222C78.9702 5.10085 78.8182 5.50852 78.5114 5.83523C78.2074 6.16193 77.8111 6.36932 77.3224 6.45739V6.52557C77.9645 6.60795 78.4531 6.83097 78.7884 7.1946C79.1264 7.5554 79.294 8.0071 79.2912 8.54972C79.294 9.04688 79.1506 9.48864 78.8608 9.875C78.5739 10.2614 78.1776 10.5653 77.6719 10.7869C77.1662 11.0085 76.5866 11.1193 75.9332 11.1193Z" fill="white"></path>
                <path d="M84.0394 11.1918C83.3065 11.1889 82.6758 11.0085 82.1474 10.6506C81.6218 10.2926 81.217 9.77415 80.9329 9.09517C80.6516 8.41619 80.5124 7.59943 80.5153 6.64489C80.5153 5.69318 80.6559 4.8821 80.9371 4.21165C81.2212 3.54119 81.6261 3.03125 82.1516 2.68182C82.68 2.32955 83.3093 2.15341 84.0394 2.15341C84.7695 2.15341 85.3974 2.32955 85.9229 2.68182C86.4514 3.03409 86.8576 3.54545 87.1417 4.21591C87.4258 4.88352 87.5664 5.69318 87.5636 6.64489C87.5636 7.60227 87.4215 8.42045 87.1374 9.09943C86.8562 9.77841 86.4528 10.2969 85.9272 10.6548C85.4016 11.0128 84.7724 11.1918 84.0394 11.1918ZM84.0394 9.66193C84.5394 9.66193 84.9386 9.41051 85.2369 8.90767C85.5352 8.40483 85.6829 7.65057 85.68 6.64489C85.68 5.98295 85.6119 5.43182 85.4755 4.99148C85.342 4.55114 85.1516 4.22017 84.9045 3.99858C84.6602 3.77699 84.3718 3.66619 84.0394 3.66619C83.5423 3.66619 83.1445 3.91477 82.8462 4.41193C82.5479 4.90909 82.3974 5.65341 82.3945 6.64489C82.3945 7.31534 82.4613 7.875 82.5948 8.32386C82.7312 8.76989 82.9229 9.10511 83.1701 9.32955C83.4173 9.55114 83.707 9.66193 84.0394 9.66193Z" fill="white"></path>
                <path d="M91.4872 9.67045V3.63636H93.0128V9.67045H91.4872ZM89.233 7.41619V5.89062H95.267V7.41619H89.233Z" fill="white"></path>
                <path d="M11.8191 7.45143C11.0178 10.6657 7.76222 12.6219 4.54752 11.8204C1.33417 11.019 -0.622004 7.76324 0.179691 4.54918C0.980683 1.33451 4.23627 -0.621803 7.44997 0.179541C10.6644 0.980884 12.6206 4.23696 11.8191 7.45143Z" fill="#F7931A"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.64506 5.14515C8.76448 4.34668 8.15658 3.91747 7.32532 3.63115L7.59499 2.54955L6.93659 2.38549L6.67408 3.43861C6.50099 3.39544 6.32323 3.35477 6.14657 3.31444L6.41098 2.25437L5.75299 2.09031L5.48318 3.17156C5.33994 3.13894 5.19926 3.10671 5.06277 3.07275L5.06353 3.06935L4.15558 2.84262L3.98044 3.54583C3.98044 3.54583 4.46892 3.65781 4.45862 3.6647C4.72524 3.73124 4.77345 3.90773 4.76545 4.04763L4.45827 5.27982C4.47663 5.28448 4.50045 5.29123 4.52672 5.30179L4.50759 5.29701C4.49135 5.29295 4.47446 5.28872 4.45713 5.28457L4.02657 7.0107C3.99399 7.0917 3.91129 7.21326 3.72488 7.1671C3.73148 7.17666 3.24635 7.04768 3.24635 7.04768L2.91946 7.80133L3.77626 8.01493C3.87009 8.03846 3.9628 8.06262 4.05458 8.08655C4.11871 8.10327 4.1824 8.11987 4.24568 8.13605L3.97323 9.23005L4.63086 9.39411L4.90068 8.31172C5.08034 8.36049 5.25469 8.40548 5.42537 8.44789L5.15647 9.52517L5.8149 9.68923L6.08732 8.59728C7.21004 8.80976 8.05423 8.72409 8.40956 7.7086C8.69588 6.89101 8.39531 6.41943 7.80465 6.1119C8.23486 6.01268 8.55866 5.72964 8.64506 5.14515ZM7.14077 7.25455C6.95409 8.00467 5.77995 7.69455 5.24275 7.55266C5.19442 7.5399 5.15125 7.5285 5.11442 7.51935L5.47597 6.06999C5.52085 6.08119 5.57569 6.0935 5.63782 6.10745C6.1935 6.23215 7.332 6.48766 7.14077 7.25455ZM5.74932 5.43478C6.19719 5.55431 7.17423 5.81506 7.34439 5.1333C7.51814 4.43603 6.56868 4.22581 6.10494 4.12314C6.05277 4.11159 6.00675 4.1014 5.96916 4.09203L5.64137 5.40651C5.67232 5.41423 5.70864 5.42392 5.74932 5.43478Z" fill="white"></path>
                <path d="M30 6C30 9.31371 27.3137 12 24 12C20.6863 12 18 9.31371 18 6C18 2.68629 20.6863 1.98479e-08 24 1.98479e-08C27.3137 1.98479e-08 30 2.68629 30 6Z" fill="#EDF0F4"></path>
                <path d="M23.9836 2.4L23.9359 2.56213V7.2663L23.9836 7.31392L26.1672 6.02318L23.9836 2.4Z" fill="#343434"></path>
                <path d="M23.9836 2.4L21.8 6.02318L23.9836 7.31392V5.03064V2.4Z" fill="#8C8C8C"></path>
                <path d="M23.9836 7.72734L23.9567 7.76015V9.43584L23.9836 9.51437L26.1686 6.43728L23.9836 7.72734Z" fill="#3C3C3B"></path>
                <path d="M23.9836 9.51437V7.72734L21.8 6.43728L23.9836 9.51437Z" fill="#8C8C8C"></path>
                <path d="M23.9836 7.31392L26.1672 6.02318L23.9836 5.03064V7.31392Z" fill="#141414"></path>
                <path d="M21.8 6.02318L23.9836 7.31392V5.03064L21.8 6.02318Z" fill="#393939"></path>
                <path d="M47.8191 7.45143C47.0178 10.6657 43.7622 12.6219 40.5475 11.8204C37.3342 11.019 35.378 7.76324 36.1797 4.54918C36.9807 1.33451 40.2363 -0.621803 43.45 0.179541C46.6644 0.980884 48.6206 4.23696 47.8191 7.45143Z" fill="#50AF95"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M42.7592 6.68022C42.7168 6.6834 42.4976 6.69648 42.0087 6.69648C41.6198 6.69648 41.3436 6.68482 41.2468 6.68022C39.7439 6.61411 38.6221 6.35248 38.6221 6.03924C38.6221 5.726 39.7439 5.46473 41.2468 5.39756V6.41966C41.3451 6.42673 41.6265 6.44335 42.0154 6.44335C42.4821 6.44335 42.7158 6.4239 42.7578 6.42001V5.39827C44.2576 5.46509 45.3769 5.72671 45.3769 6.03924C45.3769 6.35178 44.2579 6.6134 42.7578 6.67987L42.7592 6.68022ZM42.7592 5.29256V4.37793H44.8522V2.9832H39.1538V4.37793H41.2464V5.2922C39.5455 5.37034 38.2664 5.70726 38.2664 6.11101C38.2664 6.51476 39.5455 6.85134 41.2464 6.92982V9.86071H42.7589V6.92876C44.4559 6.85063 45.7329 6.51405 45.7329 6.11066C45.7329 5.70726 44.4573 5.37104 42.7592 5.29256Z" fill="white"></path>
                <path d="M65.8166 7.45227C65.0151 10.667 61.7592 12.6233 58.5441 11.8217C55.3304 11.0203 53.374 7.76411 54.1758 4.5497C54.9769 1.33466 58.2328 -0.621873 61.4469 0.179561C64.6617 0.980995 66.6181 4.23744 65.8166 7.45227Z" fill="#F3BA2F"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M59.9968 3.80843L58.4429 5.36227L57.5389 4.4581L59.9968 2.00023L62.4554 4.45884L61.5513 5.36294L59.9968 3.80843ZM56.9005 5.09642L55.9963 6.00068L56.9004 6.90462L57.8045 6.00048L56.9005 5.09642ZM58.4429 6.63918L59.9968 8.19292L61.5513 6.63844L62.4559 7.54207L59.9968 10.0011L57.5376 7.54197L58.4429 6.63918ZM63.0932 5.09693L62.189 6.00106L63.0931 6.90513L63.9972 6.001L63.0932 5.09693Z" fill="white"></path>
                <path d="M60.9137 6.0002L59.9968 5.08278L59.0802 5.99927L59.0789 6.00052L59.0802 6.00183L59.9968 6.91857L60.9142 6.00116L60.9137 6.0002Z" fill="white"></path>
              </svg>
            </div>

            <div class="wallet-alert" id="cryptobot" style="display:none">The funds will arrive by check to your account within 4 hours</div>
            <div class="WithdrawPage_select__6TdeE WithdrawPage_active__LWLFM">
              <div class="MainDropdown_left__ncSYU"><img class="MainDropdown_icon__w3QAy" src="Tether.svg"><span class="MainDropdown_first__oSobR">USDT</span><span class="MainDropdown_second__jtiRk">Tether</span></div>

            </div>
            <div class="WithdrawPage_inBlock__CWkH5 WithdrawPage_networks__c4CBI">
              <div class="WithdrawPage_network__0dhg0 WithdrawPage_active__LWLFM">ERC20</div>
              <div class="WithdrawPage_network__0dhg0">BEP20</div>
              <div class="WithdrawPage_network__0dhg0">TRC20</div>
              <div class="WithdrawPage_network__0dhg0">TON</div>
              <div class="WithdrawPage_network__0dhg0">SOL</div>
            </div>

            <script>
              document.querySelectorAll('.WithdrawPage_network__0dhg0').forEach(btn => {
                btn.addEventListener('click', () => {
                  document.querySelectorAll('.WithdrawPage_network__0dhg0')
                    .forEach(b => b.classList.remove('WithdrawPage_active__LWLFM'));
                  btn.classList.add('WithdrawPage_active__LWLFM');
                });
              });
            </script>

            <style>
              .WithdrawPage_networks__c4CBI {
                display: flex;
                gap: 11px;
                flex-wrap: nowrap;
              }
            </style>




            <select id="sbpvibor" class="form-select wallet-select-bank">
              <option value="0">Bank</option>
              <option value="1">Sber</option>
              <option value="2">Tbank</option>
              <option value="3">Ralph</option>
              <option value="4">Alpha</option>
              <option value="5">VTB</option>
              <option value="6">Ozon</option>
              <option value="7">MTC</option>
              <option value="8">Uralsib</option>
              <option value="9">Renisans</option>
            </select>

            <div class="walletInputs">
              <div class="info"> <span id="title">Wallet address</span></div>
              <span class="validation-message" id="walletNumberAlert"></span>
              <input placeholder="Enter your wallet address" id="walletNumber" onkeyup="minwithnumber()">
              <div class="info"> <span id="title">Withdrawal amount in dollar</span></div>
              <span class="validation-message" id="walletAmountAlert"></span>
              <input placeholder="0.00" id="WithdrawSize" onkeyup="minwithnumber()">
            </div>

            <input id="systemwithdraw" value="" style="display:none;">
            <button class="connectButton buttonProject" onclick="openModal()" style="width:fit-content; padding-left:20px; padding-right:20px;">
              Create request
            </button>

            <div id="depositNotice" style="
                display:none;
                position: fixed;
                bottom: 20px;
                left: 50%;
                transform: translateX(-50%);
                background: #f44336;
                color: white;
                padding: 12px 20px;
                border-radius: 8px;
                font-weight: bold;
                box-shadow: 0 4px 8px rgba(0,0,0,0.2);
                z-index: 9999;
            ">
              A minimum deposit of $150 is required
            </div>
            <!-- <script>
            document.getElementById('withBtn').addEventListener('click', function () {
                let notice = document.getElementById('depositNotice');
                notice.style.display = 'block';

                setTimeout(() => {
                    notice.style.display = 'none';
                }, 3000);
                // $('#withdrawl').modal('show');
            });
            </script> -->
          </div>

          <div class="walletProject table-responsive mg-t-30 ">
            <div class="table-responsive">
              <table id="withdrawT" class="table table-sm mg-b-0 table-striped" style="color:var(--main-color-hight)">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Gate</th>
                    <th scope="col">Date</th>
                    <th scope="col">Wallet</th>
                    <th scope="col">Sum</th>
                    <th scope="col">Wait</th>
                  </tr>
                </thead>
                <tbody>

                  <?
                  $checkico = "<i style='color:#4ba136;font-size: 14px;margin-right:5px;' class='fa fa-check' aria-hidden='true'></i>";
                  $waitico = "<i style='color:#bd8c18;font-size: 14px;margin-right:5px;' class='fa fa-arrow-left' aria-hidden='true'></i>";
                  $errorico = "<i style='color:#b13333;font-size: 14px;margin-right:5px;transform: rotate(45deg);' class='fa fa-plus' aria-hidden='true'></i>";
                  $processico = "<i style='color:#fff;font-size: 14px;margin-right:5px;' class='fa fa-bolt' aria-hidden='true'></i>";
                  $deposits1 = "SELECT COUNT(*) FROM withdraws WHERE user_id='$id' ORDER BY id DESC";
                  $resultDes = mysqli_query($connection, $deposits1);
                  $row = mysqli_fetch_array($resultDes);
                  if ($row['COUNT(*)'] == 0) {
                    echo '<tr style="color:var(--main-color-medium)">
<td>None Withdrawl</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
</tr>';
                  } else {
                    $deposits = mysqli_query($connection, "SELECT * FROM withdraws WHERE user_id='$id' ORDER BY id DESC");
                    while ($row = mysqli_fetch_array($deposits)) {

                      $id  = $row['id'];
                      $user_id = $row['user_id'];
                      $ps = $row['ps'];
                      $sum = $row['sum'];
                      $wallet = $row['wallet'];
                      $status = $row['status'];
                      $data = $row['date'];

                      if ($status == 0) {
                        $sstatus = "<span style='color:#bd8c18;    border-bottom: 1px solid #e1bd545c; cursor:pointer;' onClick='removeWithdraw($id)'>Отменить</span>";
                      }
                      if ($status == 1) {
                        $sstatus = "<span style='color:#4ba136;'>{$checkico}{$translations['success']}</span>";
                      }
                      if ($status == 2) {
                        $sstatus = "<span style='color:#b13333;'>{$errorico}{$translations['withdraw']}</span>";
                      }
                      if ($status == 3) {
                        $sstatus = "<span style='color:#fff;'>{$processico}{$translations['in_progress']}</span>";
                      }

                      echo '<tr style="height: 80px;color:var(--main-color-medium)">
<td>#' . $id . '</td>
<td><img style="width:90px;" src="../images/wallet/' . $ps . '.svg"></td>
<td>' . $data . '</td>
<td>' . $wallet . '</td>
<td>' . $sum . ' ₽</td>
<td>' . $sstatus . '</td>
</tr>';
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--
<div class="tabProject">
<div class="tabsMore">
<a href="/wallet/deposit" class="tabsIner">Депозит</a>
<a href="#" class="tabsIner active">Вывод</a>
<a href="/wallet/send" class="tabsIner">Перевод</a>
</div>
</div>

<br>
<div class="walletProject">

<div class="systems">
<span class="systemwallet" onClick="$('.systemwallet').removeClass('activeWallet') ;$(this).addClass(' activeWallet'); $('#sbpvibor').show(); $('#systemwithdraw').val('sbp'); $('#min_sum').html('<?= $withdraw_min_sbp ?>');">
<img style="width: 90px;height: 38px;" src="../images/wallet/sbp.svg">
<span style="color: var(--main-color-hight);">СБП</span>
</span>

<span class="systemwallet" onClick="$('.systemwallet').removeClass('activeWallet') ;$(this).addClass(' activeWallet'); $('#sbpvibor').hide(); $('#systemwithdraw').val('fkwallet'); $('#min_sum').html('<?= $withdraw_min_fkwallet ?>');">
<img style="width: 90px;height: 38px;" src="../images/wallet/fkwallet.svg">
<span style="color: var(--main-color-hight);">FK Wallet</span>
</span>

</div>

<select id="sbpvibor" class="form-select" style="display:none;background-color: #17181f;color: var(--main-color-hight);border-color: #20222b;padding: 10px;width: 340px;">
 <option value="0">Выберите банк</option>
  <option value="1">Сбербанк</option>}
  <option value="2">Тинькофф Банк</option>
  <option value="3">Райффайзен Банк</option>
  <option value="4">Альфа-Банк</option>
  <option value="5">ВТБ</option>
  <option value="6">Ozon Банк</option>
  <option value="7">МТС Банк</option>
  <option value="8">Уралсиб</option>
  <option value="9">Ренессанс Банк</option>
</select>

<div style="
    padding: 10px 15px;
    background: #53d9531a;
    border: 1px solid #5bb06526;
    color: #5bb065;
    border-radius: 8px;
    width: fit-content;
    display: flex;
    gap: 5px;
    align-items: center;
"><i class="fa fa-clock"></i>Моментальные выводы с депозитом от 2 000 монет</div>

<div class="walletInputs">
<div class="info"> <span>Введите сумму</span> <div>Мин. <span class="descriptionWallet" id="min_sum"><?= $min_withdraw_sum ?></span> Макс. <span class="descriptionWallet">1 млн.</span></div> </div>
<span class="validation-message" id="withdrawSizeAlert"></span>
<input placeholder="Введите сумму" id="WithdrawSize" onkeyup="minwithsum()" value="<?= $min_withdraw_sum ?>" type="number">
</div>


<div class="walletInputs">
<div class="info"> <span>Введите кошелек</span></div>
<span class="validation-message" id="walletNumberAlert"></span>
<input placeholder="Введите кошелек" id="walletNumber" onkeyup="minwithnumber()">
</div>

<input id="systemwithdraw" value="" style="display:none;">
<button class="buttonProject" id="withBtn" style="width:fit-content; padding-left:20px;padding-right:20px;" onClick="createwithdraw();">Создать заявку</button>


</div>
<br>
  <div class="walletProject table-responsive mg-t-30 ">
                        <div class="table-responsive">
                          <table id="withdrawT" class="table table-sm mg-b-0 table-striped" style="color:var(--main-color-hight)">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">ПС</th>
                                        <th scope="col">Дата</th>
                                        <th scope="col">Кошелек</th>
                                        <th scope="col">Сумма</th>
                                        <th scope="col">Статус</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    	<?
                                      $checkico = "<i style='color:#4ba136;font-size: 14px;margin-right:5px;' class='fa fa-check' aria-hidden='true'></i>";
                                      $waitico = "<i style='color:#bd8c18;font-size: 14px;margin-right:5px;' class='fa fa-arrow-left' aria-hidden='true'></i>";
                                      $errorico = "<i style='color:#b13333;font-size: 14px;margin-right:5px;transform: rotate(45deg);' class='fa fa-plus' aria-hidden='true'></i>";
                                      $processico = "<i style='color:#fff;font-size: 14px;margin-right:5px;' class='fa fa-bolt' aria-hidden='true'></i>";
                                      $deposits1 = "SELECT COUNT(*) FROM withdraws WHERE user_id='$id' ORDER BY id DESC";
                                      $resultDes = mysqli_query($connection, $deposits1);
                                      $row = mysqli_fetch_array($resultDes);
                                      if ($row['COUNT(*)'] == 0) {
                                        echo '<tr style="color:var(--main-color-medium)">
<td>Нет выплат</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
</tr>';
                                      } else {
                                        $deposits = mysqli_query($connection, "SELECT * FROM withdraws WHERE user_id='$id' ORDER BY id DESC");
                                        while ($row = mysqli_fetch_array($deposits)) {

                                          $id  = $row['id'];
                                          $user_id = $row['user_id'];
                                          $ps = $row['ps'];
                                          $sum = $row['sum'];
                                          $wallet = $row['wallet'];
                                          $fake = $row['fake'];
                                          $status = $row['status'];
                                          $data = $row['date'];

                                          if ($status == 0) {
                                            $sstatus = "<span style='color:#bd8c18;    border-bottom: 1px solid #e1bd545c; cursor:pointer;' onClick='removeWithdraw($id)'>Отменить</span>";
                                          }
                                          if ($status == 1) {
                                            $sstatus = "<span style='color:#4ba136;'>$checkico Успешно</span>";
                                          }
                                          if ($status == 2) {
                                            $sstatus = "<span style='color:#b13333;'>$errorico Отозван</span>";
                                          }
                                          if ($status == 3) {
                                            $sstatus = "<span style='color:#fff;'>$processico В процессе</span>";
                                          }

                                          echo '<tr style="height: 80px;color:var(--main-color-medium)">
<td>#' . $id . '</td>
<td><img style="width:90px;" src="../images/wallet/' . $ps . '.svg"></td>
<td>' . $data . '</td>
<td>' . $wallet . '</td>
<td>' . $sum . ' ₽</td>
<td>' . $sstatus . '</td>
</tr>';
                                        }
                                      }
                                      ?>


                                </tbody>
                            </table>
                        </div>
                    </div> -->

</div>
<script>
  $(document).ready(function() {

    $('#withdrawT').DataTable({
      pageLength: 5,
      lengthMenu: [
        [5, 10, 20, -1],
        [5, 10, 20, 'Todos']
      ]
    });
    $('#withdrawT_length').hide();
    $('#withdrawT_filter').hide();
    $('#withdrawT_info').hide();
  });
</script>
<?
require(dirname(__DIR__, 2) . "/panels/footer.php");
?>