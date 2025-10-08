<?php
function renderBetsTable($translations)
{

?>
    <div class="livefeed">
        <div class="tabs">
            <div class="inner-tabs">
                <div class="tabs-wrapper">

                    <span><?php echo htmlspecialchars($translations['casino_bets']); ?></span>

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