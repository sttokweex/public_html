<?php
function renderBetsTable($translations)
{
    // SVG placeholders
    $gameIconSvg = '<svg fill="currentColor" viewBox="0 0 96 96" class="svg-icon " style=""> <title></title> <path d="M30.48 42.441a79.7 79.7 0 0 0-5.8 15.84 30.1 30.1 0 0 0 0 14.36l.718 3-16.277 4A37.9 37.9 0 0 1 12 53.719l-12 2.84v-11.68l29.36-7.04zM96 46.88l-.922 4.64A85.5 85.5 0 0 0 83.2 63.32a30.56 30.56 0 0 0-6 13.04l-.597 3L60 76.32a38.12 38.12 0 0 1 13.36-22.28l-12-2.36 5.038-10.64zM72 24.12a134 134 0 0 0-15.2 22.957 49.8 49.8 0 0 0-5.6 22.8v5H32.32a55.6 55.6 0 0 1 5-22.757A87 87 0 0 1 50.8 31h-28V16.36H72z"></path><!----></svg>';
    $userIconSvg = '<svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon " style=""> <title></title> <path d="M8.887 43.074c7.87-1.22 15.212-1.515 21.547 0h3.05c6.498-1.484 13.79-1.24 21.508 0v2.5l-3.05.582c-.001.116-.06 9.23-9.235 9.23-6.222 0-8.245-5.58-8.906-9.23h-3.723c-.66 3.65-2.685 9.23-8.906 9.23-9.174 0-9.234-9.114-9.234-9.23l-3.051-.582zM61.539 30.77a2.458 2.458 0 0 1 .523 4.86l.633-.071A221 221 0 0 1 32 37.688c-10.419 0-20.666-.726-29.54-1.997a2.462 2.462 0 0 1 0-4.922zM42.051 8.613c2.814 0 5.19 1.881 5.953 4.496l3.64 12.79h-39.39l3.64-12.79.008-.046a6.2 6.2 0 0 1 5.946-4.45z"></path><!----></svg>';
    $currencyIconSvg = '';
?>
    <div class="livefeed">
        <div class="tabs">
            <div class="inner-tabs">
                <div class="tabs-wrapper">
                    <div class="tabs-slider">
                        <div class="tabs-content ">
                            <button type='button' class="tabs-button active"><span><?php echo htmlspecialchars($translations['casino_bets']); ?></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="live-table-wrapper">
            <table class="live-table-content is-fixed stripey slide-down-even">
                <thead class="bg-grey-600">
                    <tr>
                        <th class="left"><span class="flex items-center h-[1.7em]"><?php echo htmlspecialchars($translations['game']); ?></span></th>
                        <th class="left"><?php echo htmlspecialchars($translations['user']); ?></th>
                        <th class="right"><?php echo htmlspecialchars($translations['time']); ?></th>
                        <th class="right"><?php echo htmlspecialchars($translations['bet_amount']); ?></th>
                        <th class="right"><?php echo htmlspecialchars($translations['multiplier']); ?></th>
                        <th class="right"><?php echo htmlspecialchars($translations['payout']); ?></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
<?php
}
?>