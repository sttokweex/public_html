<?php
    $getDepsForLevel = "SELECT SUM(amount) FROM deposits WHERE hash_user='$sid' AND status ='1'";
    $getDepsForLevel2 = mysqli_query($connection,$getDepsForLevel);
    $leveldeposits = mysqli_fetch_array($getDepsForLevel2);
    $depositesSID = $leveldeposits['SUM(amount)'];
$currentRank = "Starter";
$nextRank = "Silver";
$progressMax = 500; // Минимальный порог для Bronze
$progressValue = 0;
$cashback_rankt = '0'; /* 0% */
$currentImage = '  <svg fill="none" viewBox="0 0 96 96" class="svg-icon" style="width: 1.25rem; height: 1.25rem;">
                                                            <title></title>
                                                            <path fill="#D1A773" d="m48 14.595 8.49 15.75a13.68 13.68 0 0 0 9.66 7.08L84 40.635l-12.39 12.9a13.9 13.9 0 0 0-3.9 9.63q-.069.96 0 1.92l2.46 17.76-15.66-7.56a15 15 0 0 0-6.51-1.53 15 15 0 0 0-6.6 1.5l-15.57 7.53 2.46-17.76q.051-.93 0-1.86a13.9 13.9 0 0 0-3.9-9.63L12 40.635l17.64-3.21a13.62 13.62 0 0 0 9.84-7.02zm0-12.54a5.22 5.22 0 0 0-4.59 2.73l-11.4 21.45a5.4 5.4 0 0 1-3.66 2.67l-24 4.32A5.25 5.25 0 0 0 0 38.385a5.13 5.13 0 0 0 1.44 3.6l16.83 17.55a5.16 5.16 0 0 1 1.47 3.6q.024.435 0 .87l-3.27 24a3 3 0 0 0 0 .72 5.19 5.19 0 0 0 5.19 5.22h.18a5.1 5.1 0 0 0 2.16-.6l21.39-10.32a6.4 6.4 0 0 1 2.76-.63 6.2 6.2 0 0 1 2.79.66l21 10.32c.69.377 1.464.573 2.25.57h.21a5.22 5.22 0 0 0 5.19-5.19q.024-.375 0-.75l-3.27-24q-.025-.375 0-.75a5 5 0 0 1 1.47-3.57l16.77-17.7a5.19 5.19 0 0 0-2.82-8.7l-24-4.32a5.22 5.22 0 0 1-3.69-2.76l-11.4-21.45a5.22 5.22 0 0 0-4.65-2.7"></path>
                                                        </svg>';
$nextImage = '  <svg fill="none" viewBox="0 0 96 96" class="svg-icon" style="width: 1.25rem; height: 1.25rem;">
                                                            <title></title>
                                                            <path fill="##BDBDBD" d="m48 14.595 8.49 15.75a13.68 13.68 0 0 0 9.66 7.08L84 40.635l-12.39 12.9a13.9 13.9 0 0 0-3.9 9.63q-.069.96 0 1.92l2.46 17.76-15.66-7.56a15 15 0 0 0-6.51-1.53 15 15 0 0 0-6.6 1.5l-15.57 7.53 2.46-17.76q.051-.93 0-1.86a13.9 13.9 0 0 0-3.9-9.63L12 40.635l17.64-3.21a13.62 13.62 0 0 0 9.84-7.02zm0-12.54a5.22 5.22 0 0 0-4.59 2.73l-11.4 21.45a5.4 5.4 0 0 1-3.66 2.67l-24 4.32A5.25 5.25 0 0 0 0 38.385a5.13 5.13 0 0 0 1.44 3.6l16.83 17.55a5.16 5.16 0 0 1 1.47 3.6q.024.435 0 .87l-3.27 24a3 3 0 0 0 0 .72 5.19 5.19 0 0 0 5.19 5.22h.18a5.1 5.1 0 0 0 2.16-.6l21.39-10.32a6.4 6.4 0 0 1 2.76-.63 6.2 6.2 0 0 1 2.79.66l21 10.32c.69.377 1.464.573 2.25.57h.21a5.22 5.22 0 0 0 5.19-5.19q.024-.375 0-.75l-3.27-24q-.025-.375 0-.75a5 5 0 0 1 1.47-3.57l16.77-17.7a5.19 5.19 0 0 0-2.82-8.7l-24-4.32a5.22 5.22 0 0 1-3.69-2.76l-11.4-21.45a5.22 5.22 0 0 0-4.65-2.7"></path>
                                                        </svg>';
if ($depositesSID >= 0) $currentRank = "Starter";
if ($depositesSID >= 500) {
    $cashback_rankt = '3'; /* 3% */
    $currentImage = '  <svg fill="none" viewBox="0 0 96 96" class="svg-icon" style="width: 1.25rem; height: 1.25rem;">
                                                            <title></title>
                                                            <path fill="##BDBDBD" d="m48 14.595 8.49 15.75a13.68 13.68 0 0 0 9.66 7.08L84 40.635l-12.39 12.9a13.9 13.9 0 0 0-3.9 9.63q-.069.96 0 1.92l2.46 17.76-15.66-7.56a15 15 0 0 0-6.51-1.53 15 15 0 0 0-6.6 1.5l-15.57 7.53 2.46-17.76q.051-.93 0-1.86a13.9 13.9 0 0 0-3.9-9.63L12 40.635l17.64-3.21a13.62 13.62 0 0 0 9.84-7.02zm0-12.54a5.22 5.22 0 0 0-4.59 2.73l-11.4 21.45a5.4 5.4 0 0 1-3.66 2.67l-24 4.32A5.25 5.25 0 0 0 0 38.385a5.13 5.13 0 0 0 1.44 3.6l16.83 17.55a5.16 5.16 0 0 1 1.47 3.6q.024.435 0 .87l-3.27 24a3 3 0 0 0 0 .72 5.19 5.19 0 0 0 5.19 5.22h.18a5.1 5.1 0 0 0 2.16-.6l21.39-10.32a6.4 6.4 0 0 1 2.76-.63 6.2 6.2 0 0 1 2.79.66l21 10.32c.69.377 1.464.573 2.25.57h.21a5.22 5.22 0 0 0 5.19-5.19q.024-.375 0-.75l-3.27-24q-.025-.375 0-.75a5 5 0 0 1 1.47-3.57l16.77-17.7a5.19 5.19 0 0 0-2.82-8.7l-24-4.32a5.22 5.22 0 0 1-3.69-2.76l-11.4-21.45a5.22 5.22 0 0 0-4.65-2.7"></path>
                                                        </svg>';
                                                        $nextImage =  '  <svg fill="none" viewBox="0 0 96 96" class="svg-icon" style="width: 1.25rem; height: 1.25rem;">
                                                            <title></title>
                                                            <path fill="##FFB947" d="m48 14.595 8.49 15.75a13.68 13.68 0 0 0 9.66 7.08L84 40.635l-12.39 12.9a13.9 13.9 0 0 0-3.9 9.63q-.069.96 0 1.92l2.46 17.76-15.66-7.56a15 15 0 0 0-6.51-1.53 15 15 0 0 0-6.6 1.5l-15.57 7.53 2.46-17.76q.051-.93 0-1.86a13.9 13.9 0 0 0-3.9-9.63L12 40.635l17.64-3.21a13.62 13.62 0 0 0 9.84-7.02zm0-12.54a5.22 5.22 0 0 0-4.59 2.73l-11.4 21.45a5.4 5.4 0 0 1-3.66 2.67l-24 4.32A5.25 5.25 0 0 0 0 38.385a5.13 5.13 0 0 0 1.44 3.6l16.83 17.55a5.16 5.16 0 0 1 1.47 3.6q.024.435 0 .87l-3.27 24a3 3 0 0 0 0 .72 5.19 5.19 0 0 0 5.19 5.22h.18a5.1 5.1 0 0 0 2.16-.6l21.39-10.32a6.4 6.4 0 0 1 2.76-.63 6.2 6.2 0 0 1 2.79.66l21 10.32c.69.377 1.464.573 2.25.57h.21a5.22 5.22 0 0 0 5.19-5.19q.024-.375 0-.75l-3.27-24q-.025-.375 0-.75a5 5 0 0 1 1.47-3.57l16.77-17.7a5.19 5.19 0 0 0-2.82-8.7l-24-4.32a5.22 5.22 0 0 1-3.69-2.76l-11.4-21.45a5.22 5.22 0 0 0-4.65-2.7"></path>
                                                        </svg>';
    $currentRank = "Silver";
    $nextRank = "Gold";
    $progressMax = 2500;
}
if ($depositesSID >= 2500) {
        $currentImage = '  <svg fill="none" viewBox="0 0 96 96" class="svg-icon" style="width: 1.25rem; height: 1.25rem;">
                                                            <title></title>
                                                            <path fill="##FFB947" d="m48 14.595 8.49 15.75a13.68 13.68 0 0 0 9.66 7.08L84 40.635l-12.39 12.9a13.9 13.9 0 0 0-3.9 9.63q-.069.96 0 1.92l2.46 17.76-15.66-7.56a15 15 0 0 0-6.51-1.53 15 15 0 0 0-6.6 1.5l-15.57 7.53 2.46-17.76q.051-.93 0-1.86a13.9 13.9 0 0 0-3.9-9.63L12 40.635l17.64-3.21a13.62 13.62 0 0 0 9.84-7.02zm0-12.54a5.22 5.22 0 0 0-4.59 2.73l-11.4 21.45a5.4 5.4 0 0 1-3.66 2.67l-24 4.32A5.25 5.25 0 0 0 0 38.385a5.13 5.13 0 0 0 1.44 3.6l16.83 17.55a5.16 5.16 0 0 1 1.47 3.6q.024.435 0 .87l-3.27 24a3 3 0 0 0 0 .72 5.19 5.19 0 0 0 5.19 5.22h.18a5.1 5.1 0 0 0 2.16-.6l21.39-10.32a6.4 6.4 0 0 1 2.76-.63 6.2 6.2 0 0 1 2.79.66l21 10.32c.69.377 1.464.573 2.25.57h.21a5.22 5.22 0 0 0 5.19-5.19q.024-.375 0-.75l-3.27-24q-.025-.375 0-.75a5 5 0 0 1 1.47-3.57l16.77-17.7a5.19 5.19 0 0 0-2.82-8.7l-24-4.32a5.22 5.22 0 0 1-3.69-2.76l-11.4-21.45a5.22 5.22 0 0 0-4.65-2.7"></path>
                                                        </svg>';
                                                               $nextImage =  '  <svg fill="none" viewBox="0 0 96 96" class="svg-icon" style="width: 1.25rem; height: 1.25rem;">
                                                            <title></title>
                                                            <path fill="red" d="m48 14.595 8.49 15.75a13.68 13.68 0 0 0 9.66 7.08L84 40.635l-12.39 12.9a13.9 13.9 0 0 0-3.9 9.63q-.069.96 0 1.92l2.46 17.76-15.66-7.56a15 15 0 0 0-6.51-1.53 15 15 0 0 0-6.6 1.5l-15.57 7.53 2.46-17.76q.051-.93 0-1.86a13.9 13.9 0 0 0-3.9-9.63L12 40.635l17.64-3.21a13.62 13.62 0 0 0 9.84-7.02zm0-12.54a5.22 5.22 0 0 0-4.59 2.73l-11.4 21.45a5.4 5.4 0 0 1-3.66 2.67l-24 4.32A5.25 5.25 0 0 0 0 38.385a5.13 5.13 0 0 0 1.44 3.6l16.83 17.55a5.16 5.16 0 0 1 1.47 3.6q.024.435 0 .87l-3.27 24a3 3 0 0 0 0 .72 5.19 5.19 0 0 0 5.19 5.22h.18a5.1 5.1 0 0 0 2.16-.6l21.39-10.32a6.4 6.4 0 0 1 2.76-.63 6.2 6.2 0 0 1 2.79.66l21 10.32c.69.377 1.464.573 2.25.57h.21a5.22 5.22 0 0 0 5.19-5.19q.024-.375 0-.75l-3.27-24q-.025-.375 0-.75a5 5 0 0 1 1.47-3.57l16.77-17.7a5.19 5.19 0 0 0-2.82-8.7l-24-4.32a5.22 5.22 0 0 1-3.69-2.76l-11.4-21.45a5.22 5.22 0 0 0-4.65-2.7"></path>
                                                        </svg>';
    $cashback_rankt = '5'; /* 5% */
    $currentRank = "Gold";
    $nextRank = "Ruby";
    $progressMax = 5000;
}
if ($depositesSID >= 5000) {
        $currentImage = '  <svg fill="none" viewBox="0 0 96 96" class="svg-icon" style="width: 1.25rem; height: 1.25rem;">
                                                            <title></title>
                                                            <path fill="red" d="m48 14.595 8.49 15.75a13.68 13.68 0 0 0 9.66 7.08L84 40.635l-12.39 12.9a13.9 13.9 0 0 0-3.9 9.63q-.069.96 0 1.92l2.46 17.76-15.66-7.56a15 15 0 0 0-6.51-1.53 15 15 0 0 0-6.6 1.5l-15.57 7.53 2.46-17.76q.051-.93 0-1.86a13.9 13.9 0 0 0-3.9-9.63L12 40.635l17.64-3.21a13.62 13.62 0 0 0 9.84-7.02zm0-12.54a5.22 5.22 0 0 0-4.59 2.73l-11.4 21.45a5.4 5.4 0 0 1-3.66 2.67l-24 4.32A5.25 5.25 0 0 0 0 38.385a5.13 5.13 0 0 0 1.44 3.6l16.83 17.55a5.16 5.16 0 0 1 1.47 3.6q.024.435 0 .87l-3.27 24a3 3 0 0 0 0 .72 5.19 5.19 0 0 0 5.19 5.22h.18a5.1 5.1 0 0 0 2.16-.6l21.39-10.32a6.4 6.4 0 0 1 2.76-.63 6.2 6.2 0 0 1 2.79.66l21 10.32c.69.377 1.464.573 2.25.57h.21a5.22 5.22 0 0 0 5.19-5.19q.024-.375 0-.75l-3.27-24q-.025-.375 0-.75a5 5 0 0 1 1.47-3.57l16.77-17.7a5.19 5.19 0 0 0-2.82-8.7l-24-4.32a5.22 5.22 0 0 1-3.69-2.76l-11.4-21.45a5.22 5.22 0 0 0-4.65-2.7"></path>
                                                        </svg>';
                                                         $nextImage =  '  <svg fill="none" viewBox="0 0 96 96" class="svg-icon" style="width: 1.25rem; height: 1.25rem;">
                                                            <title></title>
                                                            <path fill="purple" d="m48 14.595 8.49 15.75a13.68 13.68 0 0 0 9.66 7.08L84 40.635l-12.39 12.9a13.9 13.9 0 0 0-3.9 9.63q-.069.96 0 1.92l2.46 17.76-15.66-7.56a15 15 0 0 0-6.51-1.53 15 15 0 0 0-6.6 1.5l-15.57 7.53 2.46-17.76q.051-.93 0-1.86a13.9 13.9 0 0 0-3.9-9.63L12 40.635l17.64-3.21a13.62 13.62 0 0 0 9.84-7.02zm0-12.54a5.22 5.22 0 0 0-4.59 2.73l-11.4 21.45a5.4 5.4 0 0 1-3.66 2.67l-24 4.32A5.25 5.25 0 0 0 0 38.385a5.13 5.13 0 0 0 1.44 3.6l16.83 17.55a5.16 5.16 0 0 1 1.47 3.6q.024.435 0 .87l-3.27 24a3 3 0 0 0 0 .72 5.19 5.19 0 0 0 5.19 5.22h.18a5.1 5.1 0 0 0 2.16-.6l21.39-10.32a6.4 6.4 0 0 1 2.76-.63 6.2 6.2 0 0 1 2.79.66l21 10.32c.69.377 1.464.573 2.25.57h.21a5.22 5.22 0 0 0 5.19-5.19q.024-.375 0-.75l-3.27-24q-.025-.375 0-.75a5 5 0 0 1 1.47-3.57l16.77-17.7a5.19 5.19 0 0 0-2.82-8.7l-24-4.32a5.22 5.22 0 0 1-3.69-2.76l-11.4-21.45a5.22 5.22 0 0 0-4.65-2.7"></path>
                                                        </svg>';
    $cashback_rankt = '7'; /* 7% */
    $currentRank = "Ruby";
    $nextRank = "Legend";
    $progressMax = 10000;
}
if ($depositesSID >= 10000) {
        $currentImage = '  <svg fill="none" viewBox="0 0 96 96" class="svg-icon" style="width: 1.25rem; height: 1.25rem;">
                                                            <title></title>
                                                            <path fill="purple" d="m48 14.595 8.49 15.75a13.68 13.68 0 0 0 9.66 7.08L84 40.635l-12.39 12.9a13.9 13.9 0 0 0-3.9 9.63q-.069.96 0 1.92l2.46 17.76-15.66-7.56a15 15 0 0 0-6.51-1.53 15 15 0 0 0-6.6 1.5l-15.57 7.53 2.46-17.76q.051-.93 0-1.86a13.9 13.9 0 0 0-3.9-9.63L12 40.635l17.64-3.21a13.62 13.62 0 0 0 9.84-7.02zm0-12.54a5.22 5.22 0 0 0-4.59 2.73l-11.4 21.45a5.4 5.4 0 0 1-3.66 2.67l-24 4.32A5.25 5.25 0 0 0 0 38.385a5.13 5.13 0 0 0 1.44 3.6l16.83 17.55a5.16 5.16 0 0 1 1.47 3.6q.024.435 0 .87l-3.27 24a3 3 0 0 0 0 .72 5.19 5.19 0 0 0 5.19 5.22h.18a5.1 5.1 0 0 0 2.16-.6l21.39-10.32a6.4 6.4 0 0 1 2.76-.63 6.2 6.2 0 0 1 2.79.66l21 10.32c.69.377 1.464.573 2.25.57h.21a5.22 5.22 0 0 0 5.19-5.19q.024-.375 0-.75l-3.27-24q-.025-.375 0-.75a5 5 0 0 1 1.47-3.57l16.77-17.7a5.19 5.19 0 0 0-2.82-8.7l-24-4.32a5.22 5.22 0 0 1-3.69-2.76l-11.4-21.45a5.22 5.22 0 0 0-4.65-2.7"></path>
                                                        </svg>';
                                                        $nextImage ='  <svg fill="none" viewBox="0 0 96 96" class="svg-icon" style="width: 1.25rem; height: 1.25rem;">
                                                            <title></title>
                                                            <path fill="purple" d="m48 14.595 8.49 15.75a13.68 13.68 0 0 0 9.66 7.08L84 40.635l-12.39 12.9a13.9 13.9 0 0 0-3.9 9.63q-.069.96 0 1.92l2.46 17.76-15.66-7.56a15 15 0 0 0-6.51-1.53 15 15 0 0 0-6.6 1.5l-15.57 7.53 2.46-17.76q.051-.93 0-1.86a13.9 13.9 0 0 0-3.9-9.63L12 40.635l17.64-3.21a13.62 13.62 0 0 0 9.84-7.02zm0-12.54a5.22 5.22 0 0 0-4.59 2.73l-11.4 21.45a5.4 5.4 0 0 1-3.66 2.67l-24 4.32A5.25 5.25 0 0 0 0 38.385a5.13 5.13 0 0 0 1.44 3.6l16.83 17.55a5.16 5.16 0 0 1 1.47 3.6q.024.435 0 .87l-3.27 24a3 3 0 0 0 0 .72 5.19 5.19 0 0 0 5.19 5.22h.18a5.1 5.1 0 0 0 2.16-.6l21.39-10.32a6.4 6.4 0 0 1 2.76-.63 6.2 6.2 0 0 1 2.79.66l21 10.32c.69.377 1.464.573 2.25.57h.21a5.22 5.22 0 0 0 5.19-5.19q.024-.375 0-.75l-3.27-24q-.025-.375 0-.75a5 5 0 0 1 1.47-3.57l16.77-17.7a5.19 5.19 0 0 0-2.82-8.7l-24-4.32a5.22 5.22 0 0 1-3.69-2.76l-11.4-21.45a5.22 5.22 0 0 0-4.65-2.7"></path>
                                                        </svg>';
    $cashback_rankt = '10'; /* 10% */
    $currentRank = "Legend";
    $nextRank = "Max";
    $progressMax = 500000;
}

// Расчет прогресса
$progressValue = min(($depositesSID / $progressMax) * 100, 100);
if ($depositesSID >= $progressMax) $progressValue = 100;
?>





<style>
    .tginputs {
        outline: none;
        border-radius: 8px;
        background: rgb(15, 33, 46);
        color: white;
        padding: 10px;
        padding-left: 15px;
        padding-right: 15px;
        border: 2px solid #2b303b47;
        height: 100%;
        width: 100%;
    }
</style>





<div class="modal fade" id="withdrawl" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>
            <div class="css-auth-main">
                <div class="css-1pkuyyw site_logo_wrapper ">
                    <img alt="<?= $sitename ?>" width="40" height="40" src="/images/logo-mob.svg">
                    <span class="hideonmob"><?= $sitename ?></span>
                </div>

                <p class="chakra-text css-1qb90e6"></p>

                <p class="chakra-text css-1qb90e6">
                    <?= $translations['withdrawal_is_available_after_passing_kyc'] ?>
                </p>

            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        const $tabButtons = $('.vault-tab-button');
        const $tabButtonsVip = $('.vip-tab-button');
        const $submitButtons = $('.vault-submit-button');
        $tabButtonsVip.on('click', function() {
            $tabButtonsVip.removeClass('vip-tab-active');
            $(this).addClass('vip-tab-active');

        });
        $tabButtons.on('click', function() {
            $tabButtons.removeClass('vault-tab-active');
            $(this).addClass('vault-tab-active');
            $submitButtons.each(function() {
                if ($(this).hasClass('hide-modal')) {
                    $(this).removeClass('hide-modal');
                } else {
                    $(this).addClass('hide-modal');
                }
            });
        });
    });
    let paymentMethod = 'cloudpay';

    function setPaymentMethod(method, event) {
        paymentMethod = method;
        $(".vault-systemwallet").removeClass('vault-systemwallet-active');
        $(event.target).closest('.vault-systemwallet').addClass('vault-systemwallet-active');
        $('#systemPay').val(method);
    }

    function withdraw(e) {
        e.preventDefault()
    }

    function deposit() {
        const amount = Number(document.getElementById('depositSize').value);

        if (!paymentMethod) {
            toastr['error']('Выберите метод оплаты');
            return;
        }

        const star_limit = Number("<?php echo $star_limit; ?>");
        if (paymentMethod === 'tgstars' && amount > star_limit) {
            toastr['error']('Лимит звезд 500 в день!');
            return;
        }

        redirectToPaymentPage(paymentMethod, amount);
    }



    function mindepsum() {
        let mininaldep = $('#min_sum_deps').html();
        mininaldep = Number(mininaldep);
        let inp = $('#depositSize').val();

        if (inp < mininaldep || inp > 1000000) {
            $('#depositSize').css('border', '2px solid #8d1818');
            $('#depositSizeAlert').show();
            $('#depositSizeAlert').html(<?php echo json_encode($translations['sum']); ?> + " " + <?php echo json_encode($translations['from']); ?> + " <b>" + mininaldep + "</b> " + <?php echo json_encode($translations['to']); ?> + " <b>1000000</b>");
            $('#depBtn').attr("disabled", true);
            $('#depBtn').css("opacity", "0.5");
        } else {
            $('#depositSize').val(inp);
            $('#depositSize').css('border', '2px solid #2b303b47');
            $('#depositSizeAlert').hide();
            $('#depBtn').attr("disabled", false);
            $('#depBtn').css("opacity", "1");
        }
    }

    function redirectToPaymentPage(method, amount) {

        const DEBUG = true;
        const payload = {
            method: method,
            amount: amount,
            promoDeposit: null
        };

        if (DEBUG) {
            console.groupCollapsed('deposit → /payments/cb.php');
            console.log('payload:', payload);
        }

        $.ajax({
                url: '/payments/cb.php',
                method: 'POST',
                data: payload,
                dataType: 'json',
                timeout: 20000
            })
            .done(function(data, textStatus, jqXHR) {
                if (DEBUG) {
                    console.log('HTTP status:', jqXHR.status, textStatus);
                    console.log('Content-Type:', jqXHR.getResponseHeader('Content-Type'));
                    console.log('raw response:', jqXHR.responseText);
                    console.log('parsed data:', data);
                }

                if (typeof data !== 'object') {
                    try {
                        data = JSON.parse(jqXHR.responseText);
                    } catch (e) {
                        console.error('JSON parse error:', e);
                        toastr['error']('Некорректный ответ сервера (JSON).');
                        if (DEBUG) console.groupEnd?.();
                        return;
                    }
                }

                if (data && data.response === 'success' && data.redirect) {
                    toastr['success']('<?php echo $translations['redirection']; ?>: ' + data.redirect);
                    if (DEBUG) console.log('Redirecting to:', data.redirect);
                    setTimeout(function() {
                        window.location.assign(data.redirect);
                    }, 300);
                } else {
                    const msg = (data && (data.message || data.error || data.description)) || 'Неизвестная ошибка';
                    if (DEBUG) console.warn('Business error payload:', data);
                    toastr['error'](msg);
                }
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX FAIL:', {
                    textStatus,
                    errorThrown,
                    status: jqXHR.status,
                    response: jqXHR.responseText
                });
                toastr['error']('Ошибка соединения: ' + textStatus + (errorThrown ? ' (' + errorThrown + ')' : ''));
                console.log('Ошибка соединения: ' + textStatus + (errorThrown ? ' (' + errorThrown + ')' : ''))
            })
            .always(function() {
                if (DEBUG) console.groupEnd?.();
            });

    }



    async function generateInvoiceLink(user_id, amount) {
        const response = await fetch('/payments/create-invoice.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Telegram-Init-Data': Telegram.WebApp.initData,
            },
            body: JSON.stringify({
                user_id: user_id,
                amount: amount
            }),
        });
        const data = await response.json();
        console.log('data', data);
        return data.invoice_url;
    }
</script>
</div>
<div class="vip-modal-container hide-modal" data-testid="modal-vip">
    <div class="modal-overlay"></div>
    <div class="vault-modal-card">
        <div class="vault-modal-header">
            <div class="vault-header-stack">
                <div class="vault-title-group">
                    <svg data-ds-icon="Trophy" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
                        <path fill="currentColor" d="M21.08 4H19c0-1.1-.9-2-2-2H7c-1.1 0-2 .9-2 2H2.92C1.8 4 .9 4.91.92 6.03c.04 2.48.69 6.41 4.35 6.86A6.98 6.98 0 0 0 11 17.9v1.08h-1c-2.21 0-4 1.79-4 4h12c0-2.21-1.79-4-4-4h-1V17.9c2.76-.4 4.99-2.39 5.73-5.02 3.65-.46 4.31-4.38 4.35-6.86.02-1.12-.88-2.03-2-2.03zM4 10.11c-.57-.68-1.04-1.9-1.08-4.1H4zM16.11 9l-1.45 1.04.57 1.71c.34 1.03-.83 1.89-1.71 1.26l-1.51-1.08-1.51 1.08c-.88.63-2.05-.24-1.71-1.26l.57-1.71L7.91 9c-.89-.63-.44-2.03.65-2.03h1.82l.58-1.75c.34-1.02 1.79-1.02 2.13 0l.58 1.75h1.82c1.09 0 1.54 1.4.65 2.03zM20 10.1V6h1.08c-.04 2.21-.51 3.43-1.08 4.1"></path>
                    </svg>
                    <h3 class="vault-heading"><?php echo $translations['modal_vip_title']; ?></h3>
                </div>
            </div>
            <button type="button" class="vip-close-button" aria-label="<?php echo $translations['modal_close_aria_label']; ?>" data-testid="modal-close">
                <svg class="vault-close-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                    <path fill="currentColor" d="M4.293 4.293a1 1 0 0 1 1.338-.069l.076.069L12 10.586l6.293-6.293.076-.069a1 1 0 0 1 1.407 1.407l-.069.076L13.414 12l6.293 6.293.069.076a1 1 0 0 1-1.407 1.406l-.076-.068L12 13.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L10.586 12 4.293 5.707l-.068-.076a1 1 0 0 1 .068-1.338"></path>
                </svg>
            </button>
        </div>
        <div class="vault-modal-content ScrollY">
            <div class="vault-content-container">
                <div class="vault-content-inner">
                    <div class="vault-tabs">
                        <div class="vault-tabs-wrapper">
                            <div class="vault-tabs-slider">
                                <button type="button" class="vip-tab-button vip-tab-active" data-testid="vip-tab-deposit"><?php echo $translations['modal_vip_overview_tab']; ?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vip-modal-unstate">
                    <div class="vip-modal-banner-outer">
                        <div class="vip-modal-banner" style="background-image: url('/assets/media/header-bg.DLFzM8kq.png');">
                            <div class="rank-card-main">
                                <div class="rank-card-inner">
                                    <div class="rank-card" id="rankCard">
                                        <div class="username">
                                            <span><?php echo htmlspecialchars($login); ?></span>
                                            <svg fill="none" viewBox="0 0 96 96" class="svg-icon" style="width: 1.25rem; height: 1.25rem;">
                                                <title></title>
                                                <path fill="#2F4553" d="m48 14.595 8.49 15.75a13.68 13.68 0 0 0 9.66 7.08L84 40.635l-12.39 12.9a13.9 13.9 0 0 0-3.9 9.63q-.069.96 0 1.92l2.46 17.76-15.66-7.56a15 15 0 0 0-6.51-1.53 15 15 0 0 0-6.6 1.5l-15.57 7.53 2.46-17.76q.051-.93 0-1.86a13.9 13.9 0 0 0-3.9-9.63L12 40.635l17.64-3.21a13.62 13.62 0 0 0 9.84-7.02zm0-12.54a5.22 5.22 0 0 0-4.59 2.73l-11.4 21.45a5.4 5.4 0 0 1-3.66 2.67l-24 4.32A5.25 5.25 0 0 0 0 38.385a5.13 5.13 0 0 0 1.44 3.6l16.83 17.55a5.16 5.16 0 0 1 1.47 3.6q.024.435 0 .87l-3.27 24a3 3 0 0 0 0 .72 5.19 5.19 0 0 0 5.19 5.22h.18a5.1 5.1 0 0 0 2.16-.6l21.39-10.32a6.4 6.4 0 0 1 2.76-.63 6.2 6.2 0 0 1 2.79.66l21 10.32c.69.377 1.464.573 2.25.57h.21a5.22 5.22 0 0 0 5.19-5.19q.024-.375 0-.75l-3.27-24q-.025-.375 0-.75a5 5 0 0 1 1.47-3.57l16.77-17.7a5.19 5.19 0 0 0-2.82-8.7l-24-4.32a5.22 5.22 0 0 1-3.69-2.76l-11.4-21.45a5.22 5.22 0 0 0-4.65-2.7"></path>
                                            </svg>
                                        </div>
                                        <div class="progress-value-main">
                                            <div class="progress-value">
                                                <div class="progress-text">
                                                    <a class="toRank" href="/ranks"><?php echo $translations['your_vip_progress']; ?></a>
                                                    <svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon" style="">
                                                        <title></title>
                                                        <path d="M8 37.486h30.909L28.665 47.73l6.313 6.314L56 33.022 34.978 12l-6.313 6.314 10.244 10.244H8v8.933z"></path>
                                                    </svg>
                                                </div>
                                                <div class="progress-text-percent" id="progressValue"><?php echo number_format($progressValue, 2); ?>%</div>
                                            </div>
                                            <div class="progressWag">
                                                <progress class="wagerProgress" value="<?= round($depositesSID, 2); ?>" max="<?php echo $progressMax ?>"></progress>
                                            </div>
                                            <div class="levels">
                                                <div class="levels-div">
                                                    <span class="svg-span">
                                                      <? echo $currentImage?>
                                                    </span>
                                                    <span class="span-text"><?php echo $currentRank; ?></span>
                                                </div>
                                                <div class="levels-div">
                                                    <span class="svg-span">
                                                           <? echo $nextImage?>
                                                    </span>
                                                    <span class="span-text"><?php echo htmlspecialchars($nextRank); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vip-modal-more">
                        <button class="vip-modal-more-open">
                            <span tag="span" type="body" size="md" strong="true" variant="neutral-default" class="text-neutral-default ds-body-md-strong" data-ds-text="true">
                                <span><?php echo $translations['modal_vip_privileges_button']; ?></span>
                            </span>
                            <svg data-ds-icon="ChevronDown" width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0 transition-all duration-50">
                                <path fill="currentColor" d="M17.293 8.293a1 1 0 1 1 1.414 1.414l-6 6a1 1 0 0 1-1.414 0l-6-6-.068-.076A1 1 0 0 1 6.63 8.225l.076.068L12 13.586z"></path>
                            </svg>
                        </button>
                        <div class="vip-modal-more-container closed">
                            <div class="vip-modal-more-content">
                                <div class="vip-modal-more-level">
                                    <div class="vip-modal-more-level-header">
                                        <svg class="vip-modal-more-icon" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <path fill="#D1A773" d="m12 4.727 1.944 3.431a3.12 3.12 0 0 0 2.217 1.54l.019.002 4.042.697-2.841 2.814a2.94 2.94 0 0 0-.86 2.516l-.002-.016.559 3.867-3.584-1.646A3.6 3.6 0 0 0 12 17.61c-.543 0-1.057.119-1.514.33l.02-.008-3.583 1.646.559-3.867a2.94 2.94 0 0 0-.863-2.5l-2.868-2.814L7.793 9.7c.988-.154 1.808-.732 2.256-1.526l.008-.016zM12 2h-.002a1.2 1.2 0 0 0-1.049.595l-.003.006L8.334 7.27a1.21 1.21 0 0 1-.836.583l-.008.001-5.5.94c-.565.095-.99.56-.99 1.117 0 .303.126.579.33.783l3.859 3.823a1.07 1.07 0 0 1 .32.974v-.007l-.75 5.226a1 1 0 0 0-.012.157c0 .625.533 1.132 1.19 1.132h.004l.035.001c.191 0 .372-.045.53-.125l-.007.002 4.904-2.247a1.5 1.5 0 0 1 1.273.003l-.008-.003 4.83 2.247c.15.077.328.122.516.122h.008l.038.001c.658 0 1.191-.507 1.191-1.132q0-.084-.012-.163v.005l-.75-5.226a1.07 1.07 0 0 1 .321-.94l3.858-3.824A1.1 1.1 0 0 0 23 9.936c0-.555-.42-1.017-.976-1.114l-.007-.001-5.5-.94a1.21 1.21 0 0 1-.848-.604l-.004-.006-2.612-4.67A1.2 1.2 0 0 0 12 2"></path>
                                        </svg>
                                        <span class="vip-modal-more-level-title"><?php echo $translations['modal_vip_level_bronze']; ?></span>
                                    </div>
                                    <div class="vip-modal-more-benefits">
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_bronze_1']; ?></span>
                                        </div>
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_bronze_2']; ?></span>
                                        </div>
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_bronze_3']; ?></span>
                                        </div>
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_bronze_4']; ?></span>
                                        </div>
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_bronze_5']; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="vip-modal-more-divider"></div>
                                <div class="vip-modal-more-level">
                                    <div class="vip-modal-more-level-header">
                                        <svg class="vip-modal-more-icon" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <path fill="#BDBDBD" d="m12 4.727 1.944 3.431a3.12 3.12 0 0 0 2.217 1.54l.019.002 4.042.697-2.841 2.814a2.94 2.94 0 0 0-.86 2.516l-.002-.016.559 3.867-3.584-1.646A3.6 3.6 0 0 0 12 17.61c-.543 0-1.057.119-1.514.33l.02-.008-3.583 1.646.559-3.867a2.94 2.94 0 0 0-.863-2.5l-2.868-2.814L7.793 9.7c.988-.154 1.808-.732 2.256-1.526l.008-.016zM12 2h-.002a1.2 1.2 0 0 0-1.049.595l-.003.006L8.334 7.27a1.21 1.21 0 0 1-.836.583l-.008.001-5.5.94c-.565.095-.99.56-.99 1.117 0 .303.126.579.33.783l3.859 3.823a1.07 1.07 0 0 1 .32.974v-.007l-.75 5.226a1 1 0 0 0-.012.157c0 .625.533 1.132 1.19 1.132h.004l.035.001c.191 0 .372-.045.53-.125l-.007.002 4.904-2.247a1.5 1.5 0 0 1 1.273.003l-.008-.003 4.83 2.247c.15.077.328.122.516.122h.008l.038.001c.658 0 1.191-.507 1.191-1.132q0-.084-.012-.163v.005l-.75-5.226a1.07 1.07 0 0 1 .321-.94l3.858-3.824A1.1 1.1 0 0 0 23 9.936c0-.555-.42-1.017-.976-1.114l-.007-.001-5.5-.94a1.21 1.21 0 0 1-.848-.604l-.004-.006-2.612-4.67A1.2 1.2 0 0 0 12 2"></path>
                                        </svg>
                                        <span class="vip-modal-more-level-title"><?php echo $translations['modal_vip_level_silver']; ?></span>
                                    </div>
                                    <div class="vip-modal-more-benefits">
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_silver_1']; ?></span>
                                        </div>
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_silver_2']; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="vip-modal-more-divider"></div>
                                <div class="vip-modal-more-level">
                                    <div class="vip-modal-more-level-header">
                                        <svg class="vip-modal-more-icon" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <path fill="#FFB947" d="m12 4.727 1.944 3.431a3.12 3.12 0 0 0 2.217 1.54l.019.002 4.042.697-2.841 2.814a2.94 2.94 0 0 0-.86 2.516l-.002-.016.559 3.867-3.584-1.646A3.6 3.6 0 0 0 12 17.61c-.543 0-1.057.119-1.514.33l.02-.008-3.583 1.646.559-3.867a2.94 2.94 0 0 0-.863-2.5l-2.868-2.814L7.793 9.7c.988-.154 1.808-.732 2.256-1.526l.008-.016zM12 2h-.002a1.2 1.2 0 0 0-1.049.595l-.003.006L8.334 7.27a1.21 1.21 0 0 1-.836.583l-.008.001-5.5.94c-.565.095-.99.56-.99 1.117 0 .303.126.579.33.783l3.859 3.823a1.07 1.07 0 0 1 .32.974v-.007l-.75 5.226a1 1 0 0 0-.012.157c0 .625.533 1.132 1.19 1.132h.004l.035.001c.191 0 .372-.045.53-.125l-.007.002 4.904-2.247a1.5 1.5 0 0 1 1.273.003l-.008-.003 4.83 2.247c.15.077.328.122.516.122h.008l.038.001c.658 0 1.191-.507 1.191-1.132q0-.084-.012-.163v.005l-.75-5.226a1.07 1.07 0 0 1 .321-.94l3.858-3.824A1.1 1.1 0 0 0 23 9.936c0-.555-.42-1.017-.976-1.114l-.007-.001-5.5-.94a1.21 1.21 0 0 1-.848-.604l-.004-.006-2.612-4.67A1.2 1.2 0 0 0 12 2"></path>
                                        </svg>
                                        <span class="vip-modal-more-level-title"><?php echo $translations['modal_vip_level_gold']; ?></span>
                                    </div>
                                    <div class="vip-modal-more-benefits">
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_gold_1']; ?></span>
                                        </div>
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_gold_2']; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="vip-modal-more-divider"></div>
                                <div class="vip-modal-more-level">
                                    <div class="vip-modal-more-level-header">
                                        <svg class="vip-modal-more-icon" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <path fill="red" d="m12 4.727 1.944 3.431a3.12 3.12 0 0 0 2.217 1.54l.019.002 4.042.697-2.841 2.814a2.94 2.94 0 0 0-.86 2.516l-.002-.016.559 3.867-3.584-1.646A3.6 3.6 0 0 0 12 17.61c-.543 0-1.057.119-1.514.33l.02-.008-3.583 1.646.559-3.867a2.94 2.94 0 0 0-.863-2.5l-2.868-2.814L7.793 9.7c.988-.154 1.808-.732 2.256-1.526l.008-.016zM12 2h-.002a1.2 1.2 0 0 0-1.049.595l-.003.006L8.334 7.27a1.21 1.21 0 0 1-.836.583l-.008.001-5.5.94c-.565.095-.99.56-.99 1.117 0 .303.126.579.33.783l3.859 3.823a1.07 1.07 0 0 1 .32.974v-.007l-.75 5.226a1 1 0 0 0-.012.157c0 .625.533 1.132 1.19 1.132h.004l.035.001c.191 0 .372-.045.53-.125l-.007.002 4.904-2.247a1.5 1.5 0 0 1 1.273.003l-.008-.003 4.83 2.247c.15.077.328.122.516.122h.008l.038.001c.658 0 1.191-.507 1.191-1.132q0-.084-.012-.163v.005l-.75-5.226a1.07 1.07 0 0 1 .321-.94l3.858-3.824A1.1 1.1 0 0 0 23 9.936c0-.555-.42-1.017-.976-1.114l-.007-.001-5.5-.94a1.21 1.21 0 0 1-.848-.604l-.004-.006-2.612-4.67A1.2 1.2 0 0 0 12 2"></path>
                                        </svg>
                                        <span class="vip-modal-more-level-title"><?php echo $translations['modal_vip_level_ruby']; ?></span>
                                    </div>
                                    <div class="vip-modal-more-benefits">
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_ruby_1']; ?></span>
                                        </div>
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_ruby_2']; ?></span>
                                        </div>
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_ruby_3']; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="vip-modal-more-divider"></div>
                                <div class="vip-modal-more-level">
                                    <div class="vip-modal-more-level-header">
                                        <svg class="vip-modal-more-icon" width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <path fill="purple" d="m12 4.727 1.944 3.431a3.12 3.12 0 0 0 2.217 1.54l.019.002 4.042.697-2.841 2.814a2.94 2.94 0 0 0-.86 2.516l-.002-.016.559 3.867-3.584-1.646A3.6 3.6 0 0 0 12 17.61c-.543 0-1.057.119-1.514.33l.20-.008-3.583 1.646.559-3.867a2.94 2.94 0 0 0-.863-2.5l-2.868-2.814L7.793 9.7c.988-.154 1.808-.732 2.256-1.526l.008-.016zM12 2h-.002a1.2 1.2 0 0 0-1.049.595l-.003.006L8.334 7.27a1.21 1.21 0 0 1-.836.583l-.008.001-5.5.94c-.565.095-.99.56-.99 1.117 0 .303.126.579.33.783l3.859 3.823a1.07 1.07 0 0 1 .32.974v-.007l-.75 5.226a1 1 0 0 0-.012.157c0 .625.533 1.132 1.19 1.132h.004l.035.001c.191 0 .372-.045.53-.125l-.007.002 4.904-2.247a1.5 1.5 0 0 1 1.273.003l-.008-.003 4.83 2.247c.15.077.328.122.516.122h.008l.038.001c.658 0 1.191-.507 1.191-1.132q0-.084-.012-.163v.005l-.75-5.226a1.07 1.07 0 0 1 .321-.94l3.858-3.824A1.1 1.1 0 0 0 23 9.936c0-.555-.42-1.017-.976-1.114l-.007-.001-5.5-.94a1.21 1.21 0 0 1-.848-.604l-.004-.006-2.612-4.67A1.2 1.2 0 0 0 12 2"></path>
                                        </svg>
                                        <span class="vip-modal-more-level-title"><?php echo $translations['modal_vip_level_legend']; ?></span>
                                    </div>
                                    <div class="vip-modal-more-benefits">
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_legend_1']; ?></span>
                                        </div>
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_legend_2']; ?></span>
                                        </div>
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_legend_3']; ?></span>
                                        </div>
                                        <div class="vip-modal-more-benefit">
                                            <span class="vip-modal-more-benefit-dot"></span>
                                            <span class="vip-modal-more-benefit-text"><?php echo $translations['modal_vip_benefit_legend_4']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vip-footer">
                        <a class="vault-learn-more-link" href="/ru/blog/how-to-use-our-vault"><?php echo $translations['modal_vip_learn_more']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.vip-modal-more').on('click', function() {

        $('.vip-modal-more-container ').toggleClass('closed')
    })
</script>
</div>

</div>
<div class="auth-modal-container hide-modal" data-testid="modal-register" id="authorization">
    <div class="modal-overlay"></div>
    <div class="register-modal-card">
        <div class="register-modal-header">
            <div>
                <div class="register-modal-wrap">
                    <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 200" class="svelte-nu4xlf">
                        <g id="Layer_5">
                            <path fill="currentColor" d="M31.47,58.5c-.1-25.81,16.42-40.13,46.75-40.23,21.82-.08,25.72,14.2,25.72,19.39,0,9.94-14.06,20.48-14.06,20.48,0,0,.78,6.19,12.85,6.14,12.07-.05,23.83-8.02,23.76-27.96-.06-22.91-24.06-33.38-47.78-33.29C58.87,3.09,6.24,5.88,6.42,58.13c.18,46.41,87.76,50.5,87.83,80.21.12,32.27-36.08,40.96-48.33,40.96s-17.23-8.67-17.25-13.43c-.09-26.13,25.92-33.41,25.92-33.41,0-1.95-1.52-10.64-11.59-10.6-25.95.05-36.28,22.36-36.21,44.14.07,18.53,13.16,30.09,32.94,30.01,37.82-.14,80.46-18.59,80.3-59.56-.14-38.32-88.46-48.33-88.57-77.96Z"></path>
                            <path fill="currentColor" d="M391.96,161.17c-.3-.73-1.15-.56-2.27.37-4.29,3.54-14.1,13.56-37.06,13.65-41.85.16-49.12-68.83-49.12-68.83,0,0,31.9-23.81,36.88-33.42,4.98-9.61-10.87-11.7-10.87-11.7,0,0-22.31,27.15-38.13,35.1,1.72-11.81,13.42-38.72,14.09-54.2.67-15.48-18.63-11.7-21.72-10.22,0,6.76-17.06,68.1-23.27,101.82-3.66,5.85-8.88,12.54-13.56,12.55-2.71,0-3.71-5.02-3.73-12.22,0-9.99,5.5-25.99,5.46-35.71,0-6.73-3.09-7.13-5.75-7.12-.58,0-3.77.09-4.36.09-6.83,0-4.58-5.85-10.73-5.79-18.8.07-42.75,20.59-43.79,51.57-6.35,4.2-15.23,9.5-19.77,9.52-4.76,0-5.94-4.4-5.95-8.2,0-6.68,10.8-46.37,10.8-46.37,0,0,13.76-3.53,19.77-4.69,4.54-.89,5.85-1.22,7.62-3.41s5.22-6.73,8.01-10.8c2.79-4.08.05-7.23-5.11-7.21-6.77,0-24.88,4.29-24.88,4.29,0,0,8.7-37.5,8.69-38.26s-.98-1.16-2.45-1.15c-3.3,0-9.18,1.77-12.94,3.12-5.76,2.06-10.45,9.12-11.4,12.4s-7.46,29.02-7.46,29.02c0,0-34.88,12.04-39.65,13.85-.29.1-.49.37-.49.68s3.99,15.6,12.17,15.54c5.85,0,23.04-7.04,23.04-7.04,0,0-8.83,35.1-8.78,46.81,0,7.51,3.54,16.3,18.21,16.26,13.65,0,25.6-7.05,32.29-11.96,3.66,9.25,12.3,11.79,18.2,11.77,13.22,0,23.4-10.55,24.71-11.96,1.72,4.06,5.76,11.85,15.01,11.82,5.23,0,10.64-5.85,14.63-11.53-.08,1.18-.06,2.36.05,3.54,1.6,14.55,23.2,6,24.38,3.97.73-10.52.27-32.03,4.48-45.31,5.58,45.3,26.74,75.78,64.78,75.64,21.27-.08,32.18-6.19,36.69-11.23,3.69-4.08,4.94-9.81,3.29-15.06ZM209.45,146.23c-18.26.07,5.59-47.27,21.17-47.33.02,6.1-.32,47.26-21.17,47.33Z"></path>
                            <path fill="currentColor" d="M357.73,160.74c16.49-.06,29.25-10.91,31.59-14.44,3.02-4.59-3.51-11.53-5.59-11.41-5.21,4.98-10.65,11.01-22.87,11.05-14.38.06-11.13-15.77-11.13-15.77,0,0,27.68,3.58,38.81-16.32,3.56-6.37,3.71-15.17,2.27-18.97s-9.49-10.81-22.3-9.75c-15.74,1.33-35.57,17.74-39.93,37.45-3.5,15.86,3.12,38.26,29.14,38.17ZM375.28,94.33c2.59-.09,2.36,4.18,1.67,8.65-.98,6.06-9.29,21.45-25.17,20.85,1.1-8.96,12.91-29.15,23.53-29.5h-.03Z"></path>
                        </g>
                    </svg>
                </div>
            </div>
            <button type="button" class="vault-close-button" aria-label="<?php echo $translations['modal_close_aria_label']; ?>" data-testid="modal-close">
                <svg class="vault-close-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                    <path fill="currentColor" d="M4.293 4.293a1 1 0 0 1 1.338-.069l.076.069L12 10.586l6.293-6.293.076-.069a1 1 0 0 1 1.407 1.407l-.069.076L13.414 12l6.293 6.293.069.076a1 1 0 0 1-1.407 1.406l-.076-.068L12 13.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L10.586 12 4.293 5.707l-.068-.076a1 1 0 0 1 .068-1.338"></path>
                </svg>
            </button>
        </div>
        <div class="register-modal-content scrollY">
            <div class="register-content-container">
                <div class="auth-content-container"> 
                <form data-test-form-valid="true" class="h-full overflow-y-auto svelte-1w3iz8f"><!----><!----><!---->
                  
                    <label type="body" tag="label" size="md" class="ds-body-md inline-flex relative flex-col-reverse items-start" data-ds-text="true"><!----><!----><!----><!----><!---->
                        <div class="input-wrap svelte-dka04o">
                            <div class="input-content svelte-dka04o">
                                <div class="before-icon svelte-dka04o"><!----><!----></div><!---->
                                <div class="after-icon svelte-dka04o"><!----><!----><!----></div><!----> <input autocomplete="on" class="input spacing-expanded svelte-dka04o" type="text" name="name" max="Infinity" data-testid="auth-name"> <!----><!----> <!---->
                            </div>
                            <div class="input-button-wrap svelte-dka04o"><!----><!----></div><!---->
                        </div> <!----><!----> <!----><span class="label-content svelte-1rbhysu full-width"><!---->
                            <div class="label-left-wrapper svelte-dka04o"><!----><!----><span type="body" tag="span" size="sm" strong="true" slot="label" class="ds-body-sm-strong" data-ds-text="true"><!---->Username</span><!----> <!----><span tag="span" type="body" size="sm" variant="critical" strong="true" class="text-critical ds-body-sm-strong asterisk-wrapper ml-[0.5ch]" data-ds-text="true"><!---->*</span><!----></div> <!----><!---->
                        </span><!---->
                    </label><!----> <!---->
                    <label type="body" tag="label" size="md" class="ds-body-md inline-flex relative flex-col-reverse items-start" data-ds-text="true"><!----><!----><!----><!----><!---->
                        <div class="input-wrap svelte-dka04o">
                            <div class="input-content svelte-dka04o">
                                <div class="before-icon svelte-dka04o"><!----><!----></div><!---->
                                <div class="after-icon svelte-dka04o"><!----><!----><!----></div><!----> <input autocomplete="on" class="input spacing-expanded svelte-dka04o" type="password" name="password" max="Infinity" data-testid="auth-password"> <!----><!---->
                                <div class="view-password svelte-dka04o"><button type="button" class="svelte-dka04o passToogle" aria-label="Reveal password"><svg data-ds-icon="ViewOn" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                                            <path fill="currentColor" d="M12 4C5.92 4 1 7.58 1 12s4.92 8 11 8 11-3.58 11-8-4.92-8-11-8m0 13c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5"></path>
                                            <path fill="currentColor" d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6"></path>
                                        </svg><!----></button></div><!---->
                            </div>
                            <div class="input-button-wrap svelte-dka04o"><!----><!----></div><!---->
                        </div> <!----><!----> <!----><span class="label-content svelte-1rbhysu full-width"><!---->
                            <div class="label-left-wrapper svelte-dka04o"><!----><!----><span type="body" tag="span" size="sm" strong="true" slot="label" class="ds-body-sm-strong" data-ds-text="true"><!---->Password</span><!----> <!----><span tag="span" type="body" size="sm" variant="critical" strong="true" class="text-critical ds-body-sm-strong asterisk-wrapper ml-[0.5ch]" data-ds-text="true"><!---->*</span><!----></div> <!----><!---->
                        </span><!---->
                    </label><!----> <!----><!----> <!----> <!----><!---->
                  <button type="button" tabindex="0" class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] inline-flex relative items-center gap-2 rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] bg-transparent text-white hover:bg-transparent hover:text-white focus-visible:outline-hidden var(--ds-font-size-sm) [&amp;_svg]:text-grey-200 [&amp;:hover&gt;svg]:text-white justify-start" data-button-root=""><!----><!----><!----><span type="body" tag="span" size="md" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->Forgot Password?</span></button>
                
                  


                 <div class="flex items-start"><!----><!----><button type="button" onclick="authlogpass()" tabindex="0" class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] inline-flex relative items-center gap-2 justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] bg-blue-500 text-white hover:bg-blue-600 hover:text-white focus-visible:outline-white var(--ds-font-size-md) shadow-md py-[0.875rem] px-[1.75rem] min-w-[12ch] w-full" data-testid="button-login" data-button-root=""><!----><!----><!----><!----> <div data-loader-content="true" class="contents"><!----><!----><span type="body" tag="span" size="md" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->Sign In</span><!----></div></button><!----></div>
               
                </form></div>
                 <div class="items-start"><div class="or svelte-3naeku" data-content="" style=""><!----><span tag="span" type="body" size="md" class="ds-body-md text-center" data-ds-text="true"><!---->OR</span><!----></div><!----> <br> <!----><!----><button type="button" tabindex="0" class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] inline-flex relative items-center gap-2 justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] bg-grey-400 text-white hover:bg-grey-300 hover:text-white focus-visible:outline-white var(--ds-font-size-md) shadow-md py-[0.75rem] px-5 w-full" data-button-root=""><!----><!----><!----><!----> <div data-loader-content="true" class="contents"><!----><svg data-ds-icon="Passkey" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!----><path fill="currentColor" fill-rule="evenodd" d="M22.176 9.928c0 1.997-1.221 3.696-2.921 4.316l1.028 1.715-1.522 1.884 1.522 1.842L17.829 23 16.1 21.142v-7.024c-1.537-.703-2.613-2.315-2.613-4.19 0-2.522 1.945-4.567 4.345-4.567s4.344 2.045 4.344 4.567m-4.345.698c.579 0 1.048-.492 1.048-1.101s-.47-1.103-1.048-1.103-1.048.493-1.048 1.103c-.002.608.47 1.101 1.048 1.101" clip-rule="evenodd"></path><path fill="currentColor" fill-rule="evenodd" d="M14.678 14.949c-1.404-1.16-2.347-2.943-2.476-4.968H4.68c-1.578 0-2.857 1.306-2.857 2.918v3.648c0 .806.64 1.46 1.428 1.46h9.998c.789 0 1.428-.654 1.428-1.46z" clip-rule="evenodd"></path><path fill="currentColor" d="M7.9 9.107c-.349-.066-.694-.129-1.024-.27-1.245-.525-1.97-1.495-2.206-2.865-.16-.938-.084-1.865.293-2.742.535-1.247 1.496-1.922 2.757-2.151.754-.136 1.506-.106 2.231.167 1.093.408 1.826 1.197 2.164 2.354.343 1.166.293 2.333-.224 3.438-.536 1.153-1.47 1.772-2.652 2.014l-.295.06A84 84 0 0 0 7.9 9.107"></path></svg><!----> <!----><span type="body" tag="span" size="md" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->Sign In with passkey</span><!----><!----></div></button><!----> <br> <br> <!----><div class="oauth svelte-q2lh6o" style="flex-direction: column;"><div data-content="" class="svelte-q2lh6o" style="width: 100%;"><!----><!----><button type="button" tabindex="0" class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] inline-flex relative items-center gap-2 justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] bg-grey-400 text-white hover:bg-grey-300 hover:text-white focus-visible:outline-white var(--ds-font-size-md) shadow-md py-[0.75rem] px-5 w-full" data-analytics="provider-login-google" data-button-root=""><!----><!----><!----><!----><svg id="layer-google-logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 16 16" class="svelte-1hh3m2i"><defs><style>.cls-google-logo-1 {
        clip-path: url(#clip-google-logo);
      }
      .cls-google-logo-2 {
        fill: none;
      }
      .cls-google-logo-2,
      .cls-google-logo-3,
      .cls-google-logo-4,
      .cls-google-logo-5,
      .cls-google-logo-6 {
        stroke-width: 0px;
      }
      .cls-google-logo-3 {
        fill: #34a853;
      }
      .cls-google-logo-4 {
        fill: #4285f4;
      }
      .cls-google-logo-5 {
        fill: #e94235;
      }
      .cls-google-logo-6 {
        fill: #fbbc04;
      }</style><clipPath id="clip-google-logo"><rect class="cls-google-logo-2" width="16" height="16"></rect></clipPath></defs><g id="layer-google-logo-2"><g class="cls-google-logo-1"><path class="cls-google-logo-4" d="M15.68,8.18c0-.57-.05-1.11-.15-1.64h-7.53v3.09h4.31c-.19,1-.75,1.85-1.6,2.41v2.01h2.59c1.51-1.39,2.39-3.44,2.39-5.88Z"></path><path class="cls-google-logo-3" d="M8,16c2.16,0,3.97-.72,5.29-1.94l-2.59-2.01c-.72.48-1.63.76-2.71.76-2.08,0-3.85-1.41-4.48-3.3H.85v2.07c1.32,2.61,4.02,4.41,7.15,4.41Z"></path><path class="cls-google-logo-6" d="M3.52,9.52c-.16-.48-.25-.99-.25-1.52s.09-1.04.25-1.52v-2.07H.85c-.54,1.08-.85,2.3-.85,3.59s.31,2.51.85,3.59l2.67-2.07Z"></path><path class="cls-google-logo-5" d="M8,3.18c1.17,0,2.23.4,3.06,1.2l2.29-2.29c-1.39-1.29-3.2-2.08-5.35-2.08C4.87,0,2.17,1.79.85,4.41l2.67,2.07c.63-1.89,2.39-3.3,4.48-3.3Z"></path></g></g></svg><!----> <!----><span type="body" tag="span" size="md" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->Sign In with Google</span><!----></button><!----></div></div><!----> <br> <!----><!----><button type="button" tabindex="0" class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] inline-flex relative items-center gap-2 justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] bg-grey-400 text-white hover:bg-grey-300 hover:text-white focus-visible:outline-white var(--ds-font-size-md) shadow-md py-[0.75rem] px-5 w-full" data-button-root=""><!----><!----><!----><span type="body" tag="span" size="md" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->Sign In another way</span></button><!----></div>
             
<div class="flex flex-col justify-end gap-3 h-full" data-content=""><!----><span tag="span" type="body" size="md" class="ds-body-md text-center" data-ds-text="true"><!---->Don’t have an account? <!----><!----><button type="button" tabindex="0" class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] inline-flex relative items-center gap-2 justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] bg-transparent text-white hover:bg-transparent hover:text-white focus-visible:outline-hidden var(--ds-font-size-sm) [&amp;_svg]:text-grey-200 [&amp;:hover&gt;svg]:text-white" data-button-root="" onclick="showReg()"><!----><!---->Register an Account</button><!----></span><!----></div>            </div>
</div>
        </div>
    
</div>
    <script>
        function showReg() {
            $('#registration').removeClass('hide-modal')
            $('#authorization').addClass('hide-modal');
        }

        function authlogpass() {

                  let valid = true;
                const loginInput = document.querySelector('input[data-testid="auth-name"]');
                const passInput = document.querySelector('input[data-testid="auth-password"]');       
                loginInput.style.border = '';
                passInput.style.border = '';
                 if (!loginInput.value.trim()) {
                    loginInput.style.border = '2px solid #8d1818';
                    toastr['error']('Write login');
                    valid = false;
                }
                if (!passInput.value.trim()) {
                    passInput.style.border = '2px solid #8d1818';
                    toastr['error']('Write pass');
                    valid = false;
                }
          
                if(valid){
            $.ajax({
                type: 'POST',
                   url: 'http://5.129.253.12:2202/auth/auth.php',
                data: {
                    type: 'login',
                    login: loginInput.value.trim(),
                    pass: passInput.value.trim()
                },
                success: function(data) {
                    //var obj = jQuery.parseJSON(data);
                    //console.log(data)
                    if (data.response == "success") {
                        toastr['success']('Success!');
                        window.location.reload();
                    } else {
                        return toastr['error'](data.message);
                    }
                }
            });
        }}
    </script>

<div class="vault-modal-container hide-modal" data-testid="modal-vault">
    <div class="modal-overlay"></div>
    <div class="vault-modal-card">
        <div class="vault-modal-header">
            <div class="vault-header-stack">
                <div class="vault-title-group">
                    <svg class="vault-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <path fill="currentColor" d="M20 2H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2v2h4v-2h8v2h4v-2c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2m-7 8.79V15c0 .55-.45 1-1 1s-1-.45-1-1v-4.21c-.88-.39-1.5-1.26-1.5-2.29a2.5 2.5 0 0 1 5 0c0 1.02-.62 1.9-1.5 2.29"></path>
                    </svg>
                    <h3 class="vault-heading"><?php echo $translations['modal_vault_title']; ?></h3>
                </div>
            </div>
            <button type="button" class="vault-close-button" aria-label="<?php echo $translations['modal_close_aria_label']; ?>" data-testid="modal-close">
                <svg class="vault-close-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                    <path fill="currentColor" d="M4.293 4.293a1 1 0 0 1 1.338-.069l.076.069L12 10.586l6.293-6.293.076-.069a1 1 0 0 1 1.407 1.407l-.069.076L13.414 12l6.293 6.293.069.076a1 1 0 0 1-1.407 1.406l-.076-.068L12 13.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L10.586 12 4.293 5.707l-.068-.076a1 1 0 0 1 .068-1.338"></path>
                </svg>
            </button>
        </div>
        <div class="vault-modal-content">
            <div class="vault-content-container">
                <div class="vault-content-inner">
                    <div class="vault-tabs">
                        <div class="vault-tabs-wrapper">
                            <div class="vault-tabs-slider">
                                <button type="button" class="vault-tab-button vault-tab-active" data-testid="vault-tab-deposit"><?php echo $translations['modal_vault_deposit_tab']; ?></button>
                                <button type="button" class="vault-tab-button" data-testid="vault-tab-withdraw"><?php echo $translations['modal_vault_withdraw_tab']; ?></button>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="vault-wallet-dropdown">
                        <span class="vault-systemwallet vault-systemwallet-active" data-payment-method="cloudpay">
                            <img src="../images/wallet/cloudpay.png" alt="<?php echo $translations['modal_vault_cloudpay_alt']; ?>" class="vault-system-icon">
                        </span>
                    </div> -->
                    <form class="vault-deposit-form" data-testid="vault-deposit">
                        <label class="vault-input-label">
                            <div class="vault-input-wrapper">
                                <div class="vault-input-content">
                                    <div class="vault-input-icon">
                                        <svg class="vault-currency-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <path fill="#F7931A" d="M22.974 12.026C22.974 18.086 18.06 23 12 23S1.026 18.087 1.026 12.026C1.026 5.966 5.94 1.052 12 1.052s10.974 4.914 10.974 10.974"></path>
                                            <path fill="#fff" d="M16.932 10.669c.213-1.437-.88-2.21-2.378-2.726l.484-1.948-1.182-.296-.481 1.897c-.313-.079-.633-.151-.949-.223l.481-1.9-1.185-.296-.485 1.945a31 31 0 0 1-.756-.179l-1.636-.409L8.532 7.8s.88.203.86.213a.633.633 0 0 1 .553.69V8.7l-.553 2.22q.071.018.13.04l-.007-.002-.123-.03-.777 3.093a.43.43 0 0 1-.546.28l.003.001-.863-.213-.588 1.351 1.544.381.845.22-.491 1.97 1.185.295.485-1.948q.483.129.945.244l-.485 1.941 1.186.296.488-1.966c2.024.382 3.544.227 4.183-1.601.515-1.471-.024-2.32-1.09-2.874.777-.165 1.358-.677 1.516-1.728m-2.712 3.797c-.364 1.475-2.842.688-3.646.478l.65-2.598c.804.189 3.381.588 2.996 2.12m.368-3.818c-.344 1.34-2.406.657-3.066.492l.591-2.365c.667.165 2.822.478 2.475 1.873"></path>
                                        </svg>
                                    </div>
                                    <input class="vault-input-field" type="number" data-testid="vault-deposit-amount" name="amount" step="1e-8" placeholder="<?php echo $translations['modal_vault_input_placeholder']; ?>" autocomplete="on" id="depositSize" onkeyup="mindepsum()" value="100">
                                </div>
                                <div class="vault-input-button-wrapper">
                                    <button type="button" class="vault-max-button"><?php echo $translations['modal_vault_max_button']; ?></button>
                                </div>
                            </div>
                            <span class="vault-label-content">
                                <div class="vault-label-left">
                                    <span class="vault-label-text"><?php echo $translations['amount']; ?></span>
                                </div>
                                <div class="vault-currency-conversion">
                                    <span class="vault-conversion-text" id="depositSizeAlert">0,00$</span>
                                </div>
                            </span>
                        </label>

                        <div class="vault-submit-wrapper">
                            <button class="vault-submit-button" type="button" data-testid="vault-deposit-submit" id="depBtn" onclick="deposit();">
                                <span class="vault-submit-text"><?php echo $translations['modal_vault_deposit_button']; ?></span>
                            </button>
                            <button class="vault-submit-button hide-modal" type="button" data-testid="vault-deposit-submit" id="withBtn">
                                <span class="vault-submit-text"><?php echo $translations['modal_vault_withdraw_button']; ?></span>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="vault-footer">
                    <a class="vault-learn-more-link" href="/ru/blog/how-to-use-our-vault"><?php echo $translations['modal_vault_learn_more']; ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="register-modal-container hide-modal" data-testid="modal-register" id="registration">
    <div class="modal-overlay"></div>
    <div class="register-modal-card">
        <div class="register-modal-header">
            <div>
                <div class="register-modal-wrap">
                    <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 200" class="svelte-nu4xlf">
                        <g id="Layer_5">
                            <path fill="currentColor" d="M31.47,58.5c-.1-25.81,16.42-40.13,46.75-40.23,21.82-.08,25.72,14.2,25.72,19.39,0,9.94-14.06,20.48-14.06,20.48,0,0,.78,6.19,12.85,6.14,12.07-.05,23.83-8.02,23.76-27.96-.06-22.91-24.06-33.38-47.78-33.29C58.87,3.09,6.24,5.88,6.42,58.13c.18,46.41,87.76,50.5,87.83,80.21.12,32.27-36.08,40.96-48.33,40.96s-17.23-8.67-17.25-13.43c-.09-26.13,25.92-33.41,25.92-33.41,0-1.95-1.52-10.64-11.59-10.6-25.95.05-36.28,22.36-36.21,44.14.07,18.53,13.16,30.09,32.94,30.01,37.82-.14,80.46-18.59,80.3-59.56-.14-38.32-88.46-48.33-88.57-77.96Z"></path>
                            <path fill="currentColor" d="M391.96,161.17c-.3-.73-1.15-.56-2.27.37-4.29,3.54-14.1,13.56-37.06,13.65-41.85.16-49.12-68.83-49.12-68.83,0,0,31.9-23.81,36.88-33.42,4.98-9.61-10.87-11.7-10.87-11.7,0,0-22.31,27.15-38.13,35.1,1.72-11.81,13.42-38.72,14.09-54.2.67-15.48-18.63-11.7-21.72-10.22,0,6.76-17.06,68.1-23.27,101.82-3.66,5.85-8.88,12.54-13.56,12.55-2.71,0-3.71-5.02-3.73-12.22,0-9.99,5.5-25.99,5.46-35.71,0-6.73-3.09-7.13-5.75-7.12-.58,0-3.77.09-4.36.09-6.83,0-4.58-5.85-10.73-5.79-18.8.07-42.75,20.59-43.79,51.57-6.35,4.2-15.23,9.5-19.77,9.52-4.76,0-5.94-4.4-5.95-8.2,0-6.68,10.8-46.37,10.8-46.37,0,0,13.76-3.53,19.77-4.69,4.54-.89,5.85-1.22,7.62-3.41s5.22-6.73,8.01-10.8c2.79-4.08.05-7.23-5.11-7.21-6.77,0-24.88,4.29-24.88,4.29,0,0,8.7-37.5,8.69-38.26s-.98-1.16-2.45-1.15c-3.3,0-9.18,1.77-12.94,3.12-5.76,2.06-10.45,9.12-11.4,12.4s-7.46,29.02-7.46,29.02c0,0-34.88,12.04-39.65,13.85-.29.1-.49.37-.49.68s3.99,15.6,12.17,15.54c5.85,0,23.04-7.04,23.04-7.04,0,0-8.83,35.1-8.78,46.81,0,7.51,3.54,16.3,18.21,16.26,13.65,0,25.6-7.05,32.29-11.96,3.66,9.25,12.3,11.79,18.2,11.77,13.22,0,23.4-10.55,24.71-11.96,1.72,4.06,5.76,11.85,15.01,11.82,5.23,0,10.64-5.85,14.63-11.53-.08,1.18-.06,2.36.05,3.54,1.6,14.55,23.2,6,24.38,3.97.73-10.52.27-32.03,4.48-45.31,5.58,45.3,26.74,75.78,64.78,75.64,21.27-.08,32.18-6.19,36.69-11.23,3.69-4.08,4.94-9.81,3.29-15.06ZM209.45,146.23c-18.26.07,5.59-47.27,21.17-47.33.02,6.1-.32,47.26-21.17,47.33Z"></path>
                            <path fill="currentColor" d="M357.73,160.74c16.49-.06,29.25-10.91,31.59-14.44,3.02-4.59-3.51-11.53-5.59-11.41-5.21,4.98-10.65,11.01-22.87,11.05-14.38.06-11.13-15.77-11.13-15.77,0,0,27.68,3.58,38.81-16.32,3.56-6.37,3.71-15.17,2.27-18.97s-9.49-10.81-22.3-9.75c-15.74,1.33-35.57,17.74-39.93,37.45-3.5,15.86,3.12,38.26,29.14,38.17ZM375.28,94.33c2.59-.09,2.36,4.18,1.67,8.65-.98,6.06-9.29,21.45-25.17,20.85,1.1-8.96,12.91-29.15,23.53-29.5h-.03Z"></path>
                        </g>
                    </svg>
                </div>
            </div>
            <button type="button" class="vault-close-button" aria-label="<?php echo $translations['modal_close_aria_label']; ?>" data-testid="modal-close">
                <svg class="vault-close-icon" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                    <path fill="currentColor" d="M4.293 4.293a1 1 0 0 1 1.338-.069l.076.069L12 10.586l6.293-6.293.076-.069a1 1 0 0 1 1.407 1.407l-.069.076L13.414 12l6.293 6.293.069.076a1 1 0 0 1-1.407 1.406l-.076-.068L12 13.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L10.586 12 4.293 5.707l-.068-.076a1 1 0 0 1 .068-1.338"></path>
                </svg>
            </button>
        </div>
        <div class="register-modal-content scrollY">
            <div class="register-content-container">
                <div class="register-modal-progress">
                    <div class="allSteps">
                        <div class="allSteps-step active"></div>
                        <div class="allSteps-step"></div>
                        <div class="allSteps-step"></div>
                    </div>
                    <div class="countSteps-container">
                        <button type="button" tabindex="0" id="stepBack" class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] inline-flex relative items-center gap-2 justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:text-white focus-visible:outline-hidden var(--ds-font-size-sm)" data-testid="steps-back" data-analytics="registration-register-back" data-button-root=""><!----><!----><!----><svg data-ds-icon="ChevronLeft" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                                <path fill="currentColor" d="M14.293 5.293a1 1 0 1 1 1.414 1.414L10.414 12l5.293 5.293.068.076a1 1 0 0 1-1.406 1.406l-.076-.068-6-6a1 1 0 0 1 0-1.414z"></path>
                            </svg><!----> Back</button>
                        <span>Step 1/3</span>
                    </div>
                </div>
                <h2 class="first-step">Select Your Preferred Language</h2>
                <span class="register-modal-description first-step">Stake is available is several languages. Feel free to personalise your language across our site from the options below.</span>
                <label type="body" tag="label" size="md" class="register-modal-label first-step" data-ds-text="true"><!----><!----><!----><!---->
                    <div class="select-wrap svelte-4onmmp">
                        <div class="select-content svelte-4onmmp"><select class="select spacing-expanded svelte-4onmmp" data-testid="select-language"><!---->
                                <option value="en">English</option>
                                <option value="es">Español</option>
                                <option value="ru">Русский</option>

                            </select>
                            <div class="dropdown-icon-wrap svelte-4onmmp"><svg data-ds-icon="ChevronDown" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                                    <path fill="currentColor" d="M17.293 8.293a1 1 0 1 1 1.414 1.414l-6 6a1 1 0 0 1-1.414 0l-6-6-.068-.076A1 1 0 0 1 6.63 8.225l.076.068L12 13.586z"></path>
                                </svg><!----></div>
                        </div>
                    </div> <!---->
                </label>
                <div class="buttons-modal-register first-step">
                    <button class="button-modal-register"><span>Confirm</span></button>
                </div>
                <div class="second-step  margin-header"><!---->
                    <h2 type="heading" variant="neutral-default" tag="h2" size="lg" class="text-neutral-default ds-heading-lg" data-ds-text="true"><!---->Create an Account</h2><!---->
                </div><div class="third-step  margin-header"><!---->
                    <h2 type="heading" variant="neutral-default" tag="h2" size="lg" class="text-neutral-default ds-heading-lg" data-ds-text="true"><!---->Create an Account</h2><!---->
                </div>
                <form data-test-form-valid="true" class="second-step h-full overflow-y-auto svelte-1w3iz8f"><!----><!----><!----><label type="body" tag="label" size="md" class="ds-body-md inline-flex relative flex-col-reverse items-start" data-ds-text="true"><!----><!----><!----><!----><!---->
                        <div class="input-wrap svelte-dka04o">
                            <div class="input-content svelte-dka04o">
                                <div class="before-icon svelte-dka04o"><!----><!----></div><!---->
                                <div class="after-icon svelte-dka04o"><!----><!----><!----></div><!----> <input autocomplete="on" class="input spacing-expanded svelte-dka04o" type="email" name="email" max="Infinity" data-testid="register-email"> <!----><!----> <!---->
                            </div>
                            <div class="input-button-wrap svelte-dka04o"><!----><!----></div><!---->
                        </div> <!----><!----> <!----><span class="label-content svelte-1rbhysu full-width"><!---->
                            <div class="label-left-wrapper svelte-dka04o"><!----><!----><span type="body" tag="span" size="sm" strong="true" slot="label" class="ds-body-sm-strong" data-ds-text="true"><!---->Email</span><!----> <!----><span tag="span" type="body" size="sm" variant="critical" strong="true" class="text-critical ds-body-sm-strong asterisk-wrapper ml-[0.5ch]" data-ds-text="true"><!---->*</span><!----></div> <!----><!---->
                        </span><!---->
                    </label><!----> <!----><!----> <!----><!----><label type="body" tag="label" size="md" class="ds-body-md inline-flex relative flex-col-reverse items-start" data-ds-text="true"><!----><!----><!----><!----><!---->
                        <div class="input-wrap svelte-dka04o">
                            <div class="input-content svelte-dka04o">
                                <div class="before-icon svelte-dka04o"><!----><!----></div><!---->
                                <div class="after-icon svelte-dka04o"><!----><!----><!----></div><!----> <input autocomplete="on" class="input spacing-expanded svelte-dka04o" type="text" name="name" max="Infinity" data-testid="register-name"> <!----><!----> <!---->
                            </div>
                            <div class="input-button-wrap svelte-dka04o"><!----><!----></div><!---->
                        </div> <!----><!----> <!----><span class="label-content svelte-1rbhysu full-width"><!---->
                            <div class="label-left-wrapper svelte-dka04o"><!----><!----><span type="body" tag="span" size="sm" strong="true" slot="label" class="ds-body-sm-strong" data-ds-text="true"><!---->Username</span><!----> <!----><span tag="span" type="body" size="sm" variant="critical" strong="true" class="text-critical ds-body-sm-strong asterisk-wrapper ml-[0.5ch]" data-ds-text="true"><!---->*</span><!----></div> <!----><!---->
                        </span><!---->
                    </label><!----> <!----><span type="body" tag="span" size="md" class="ds-body-md bg-[var(--color-grey-400)] rounded-[var(--ds-radius-md)] p-2" data-ds-text="true"><!----><!----><!----><span tag="span" type="body" size="md" class="ds-body-md" data-ds-text="true"><!---->Your username must be 3-14 characters long.</span></span><!----><!----> <!----><!----><label type="body" tag="label" size="md" class="ds-body-md inline-flex relative flex-col-reverse items-start" data-ds-text="true"><!----><!----><!----><!----><!---->
                        <div class="input-wrap svelte-dka04o">
                            <div class="input-content svelte-dka04o">
                                <div class="before-icon svelte-dka04o"><!----><!----></div><!---->
                                <div class="after-icon svelte-dka04o"><!----><!----><!----></div><!----> <input autocomplete="on" class="input spacing-expanded svelte-dka04o" type="password" name="password" max="Infinity" data-testid="register-password"> <!----><!---->
                                <div class="view-password svelte-dka04o"><button type="button" class="svelte-dka04o passToogle" aria-label="Reveal password"><svg data-ds-icon="ViewOn" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                                            <path fill="currentColor" d="M12 4C5.92 4 1 7.58 1 12s4.92 8 11 8 11-3.58 11-8-4.92-8-11-8m0 13c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5"></path>
                                            <path fill="currentColor" d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6"></path>
                                        </svg><!----></button></div><!---->
                            </div>
                            <div class="input-button-wrap svelte-dka04o"><!----><!----></div><!---->
                        </div> <!----><!----> <!----><span class="label-content svelte-1rbhysu full-width"><!---->
                            <div class="label-left-wrapper svelte-dka04o"><!----><!----><span type="body" tag="span" size="sm" strong="true" slot="label" class="ds-body-sm-strong" data-ds-text="true"><!---->Password</span><!----> <!----><span tag="span" type="body" size="sm" variant="critical" strong="true" class="text-critical ds-body-sm-strong asterisk-wrapper ml-[0.5ch]" data-ds-text="true"><!---->*</span><!----></div> <!----><!---->
                        </span><!---->
                    </label><!----> <!----><!----> <!----> <!----><!----><label type="body" tag="label" size="md" class="ds-body-md inline-flex relative flex-col-reverse items-start" data-ds-text="true"><!----><!----><!----><!----><!---->
                        <div class="input-wrap svelte-dka04o">
                            <div class="input-content svelte-dka04o">
                                <div class="before-icon svelte-dka04o"><!----><!----></div><!---->
                                <div class="after-icon svelte-dka04o"><!----><!----><!----></div><!----> <input autocomplete="on" class="input spacing-expanded svelte-dka04o" type="date" name="dob" max="Infinity" data-testid="register-dob" placeholder="yyyy-mm-dd" pattern="\d4-\d2-\d2"> <!----><!----> <!---->
                            </div>
                            <div class="input-button-wrap svelte-dka04o"><!----><!----></div><!---->
                        </div> <!----><!----> <!----><span class="label-content svelte-1rbhysu full-width"><!---->
                            <div class="label-left-wrapper svelte-dka04o"><!----><!----><span type="body" tag="span" size="sm" strong="true" slot="label" class="ds-body-sm-strong" data-ds-text="true"><!---->Date of Birth</span><!----> <!----><span tag="span" type="body" size="sm" variant="critical" strong="true" class="text-critical ds-body-sm-strong asterisk-wrapper ml-[0.5ch]" data-ds-text="true"><!---->*</span><!----></div> <!----><!---->
                        </span><!---->
                    </label><!----> <!----><!---->
                    <div class="tc-wrapper svelte-1d68iyc">
                        <fieldset class="flex flex-col gap-2">
                            <div>
                                <label type="body" tag="label" size="md" class="ds-body-md inline-flex relative items-center flex-row-reverse" data-ds-text="true" style="flex-direction: row !important; cursor: pointer; align-items: flex-start;">
                                    <input type="checkbox" class="svelte-2vtt3n" id="phoneCheckbox">
                                    <span class="indicator variant-default svelte-2vtt3n"></span>
                                    <span class="ml-2 flex svelte-1rbhysu full-width">
                                        <span type="body" tag="span" size="sm" strong="true" slot="label" class="ds-body-sm-strong pt-0.5" data-ds-text="true">Phone (Optional)</span>
                                    </span>
                                </label>
                            </div>
                            <div class="flex gap-2 [&amp;&gt;:first-child]:w-[calc((100%-var(--spacing-4))/3)] [&amp;&gt;:last-child]:flex-1 phone-input" style="display: none;">
                                <label type="body" tag="label" size="md" class="ds-body-md inline-flex relative flex-col-reverse items-start" data-ds-text="true">
                                    <div class="select-wrap svelte-4onmmp">
                                        <div class="select-content svelte-4onmmp">
                                            <select class="select spacing-expanded svelte-4onmmp placeholder-select" aria-label="Country code" data-testid="country-code" data-dd-privacy="mask">
                                                <option class="select-placeholder" disabled="" selected="" value="">Country code</option>
                                                <option value="+1">+1</option>
                                                <option value="+7">+7</option>
                                                <option value="+20">+20</option>
                                                <option value="+27">+27</option>
                                                <option value="+30">+30</option>
                                                <option value="+31">+31</option>
                                                <option value="+32">+32</option>
                                                <option value="+33">+33</option>
                                                <option value="+34">+34</option>
                                                <option value="+36">+36</option>
                                                <option value="+39">+39</option>
                                                <option value="+40">+40</option>
                                                <option value="+41">+41</option>
                                                <option value="+43">+43</option>
                                                <option value="+44">+44</option>
                                                <option value="+45">+45</option>
                                                <option value="+46">+46</option>
                                                <option value="+47">+47</option>
                                                <option value="+48">+48</option>
                                                <option value="+49">+49</option>
                                                <option value="+51">+51</option>
                                                <option value="+52">+52</option>
                                                <option value="+53">+53</option>
                                                <option value="+54">+54</option>
                                                <option value="+55">+55</option>
                                                <option value="+56">+56</option>
                                                <option value="+57">+57</option>
                                                <option value="+58">+58</option>
                                                <option value="+60">+60</option>
                                                <option value="+61">+61</option>
                                                <option value="+62">+62</option>
                                                <option value="+63">+63</option>
                                                <option value="+64">+64</option>
                                                <option value="+65">+65</option>
                                                <option value="+66">+66</option>
                                                <option value="+81">+81</option>
                                                <option value="+82">+82</option>
                                                <option value="+84">+84</option>
                                                <option value="+86">+86</option>
                                                <option value="+90">+90</option>
                                                <option value="+91">+91</option>
                                                <option value="+92">+92</option>
                                                <option value="+93">+93</option>
                                                <option value="+94">+94</option>
                                                <option value="+95">+95</option>
                                                <option value="+98">+98</option>
                                                <option value="+211">+211</option>
                                                <option value="+212">+212</option>
                                                <option value="+213">+213</option>
                                                <option value="+216">+216</option>
                                                <option value="+218">+218</option>
                                                <option value="+220">+220</option>
                                                <option value="+221">+221</option>
                                                <option value="+222">+222</option>
                                                <option value="+223">+223</option>
                                                <option value="+224">+224</option>
                                                <option value="+225">+225</option>
                                                <option value="+226">+226</option>
                                                <option value="+227">+227</option>
                                                <option value="+228">+228</option>
                                                <option value="+229">+229</option>
                                                <option value="+230">+230</option>
                                                <option value="+231">+231</option>
                                                <option value="+232">+232</option>
                                                <option value="+233">+233</option>
                                                <option value="+234">+234</option>
                                                <option value="+235">+235</option>
                                                <option value="+236">+236</option>
                                                <option value="+237">+237</option>
                                                <option value="+238">+238</option>
                                                <option value="+239">+239</option>
                                                <option value="+240">+240</option>
                                                <option value="+241">+241</option>
                                                <option value="+242">+242</option>
                                                <option value="+243">+243</option>
                                                <option value="+244">+244</option>
                                                <option value="+245">+245</option>
                                                <option value="+246">+246</option>
                                                <option value="+248">+248</option>
                                                <option value="+249">+249</option>
                                                <option value="+250">+250</option>
                                                <option value="+251">+251</option>
                                                <option value="+252">+252</option>
                                                <option value="+253">+253</option>
                                                <option value="+254">+254</option>
                                                <option value="+255">+255</option>
                                                <option value="+256">+256</option>
                                                <option value="+257">+257</option>
                                                <option value="+258">+258</option>
                                                <option value="+260">+260</option>
                                                <option value="+261">+261</option>
                                                <option value="+262">+262</option>
                                                <option value="+263">+263</option>
                                                <option value="+264">+264</option>
                                                <option value="+265">+265</option>
                                                <option value="+266">+266</option>
                                                <option value="+267">+267</option>
                                                <option value="+268">+268</option>
                                                <option value="+269">+269</option>
                                                <option value="+290">+290</option>
                                                <option value="+291">+291</option>
                                                <option value="+297">+297</option>
                                                <option value="+298">+298</option>
                                                <option value="+299">+299</option>
                                                <option value="+350">+350</option>
                                                <option value="+351">+351</option>
                                                <option value="+352">+352</option>
                                                <option value="+353">+353</option>
                                                <option value="+354">+354</option>
                                                <option value="+355">+355</option>
                                                <option value="+356">+356</option>
                                                <option value="+357">+357</option>
                                                <option value="+358">+358</option>
                                                <option value="+359">+359</option>
                                                <option value="+370">+370</option>
                                                <option value="+371">+371</option>
                                                <option value="+372">+372</option>
                                                <option value="+373">+373</option>
                                                <option value="+374">+374</option>
                                                <option value="+375">+375</option>
                                                <option value="+376">+376</option>
                                                <option value="+377">+377</option>
                                                <option value="+378">+378</option>
                                                <option value="+379">+379</option>
                                                <option value="+380">+380</option>
                                                <option value="+381">+381</option>
                                                <option value="+382">+382</option>
                                                <option value="+383">+383</option>
                                                <option value="+385">+385</option>
                                                <option value="+386">+386</option>
                                                <option value="+387">+387</option>
                                                <option value="+389">+389</option>
                                                <option value="+420">+420</option>
                                                <option value="+421">+421</option>
                                                <option value="+423">+423</option>
                                                <option value="+500">+500</option>
                                                <option value="+501">+501</option>
                                                <option value="+502">+502</option>
                                                <option value="+503">+503</option>
                                                <option value="+504">+504</option>
                                                <option value="+505">+505</option>
                                                <option value="+506">+506</option>
                                                <option value="+507">+507</option>
                                                <option value="+508">+508</option>
                                                <option value="+509">+509</option>
                                                <option value="+590">+590</option>
                                                <option value="+591">+591</option>
                                                <option value="+592">+592</option>
                                                <option value="+593">+593</option>
                                                <option value="+594">+594</option>
                                                <option value="+595">+595</option>
                                                <option value="+596">+596</option>
                                                <option value="+597">+597</option>
                                                <option value="+598">+598</option>
                                                <option value="+599">+599</option>
                                                <option value="+670">+670</option>
                                                <option value="+672">+672</option>
                                                <option value="+673">+673</option>
                                                <option value="+674">+674</option>
                                                <option value="+675">+675</option>
                                                <option value="+676">+676</option>
                                                <option value="+677">+677</option>
                                                <option value="+678">+678</option>
                                                <option value="+679">+679</option>
                                                <option value="+680">+680</option>
                                                <option value="+681">+681</option>
                                                <option value="+682">+682</option>
                                                <option value="+683">+683</option>
                                                <option value="+685">+685</option>
                                                <option value="+686">+686</option>
                                                <option value="+687">+687</option>
                                                <option value="+688">+688</option>
                                                <option value="+689">+689</option>
                                                <option value="+690">+690</option>
                                                <option value="+691">+691</option>
                                                <option value="+692">+692</option>
                                                <option value="+850">+850</option>
                                                <option value="+852">+852</option>
                                                <option value="+853">+853</option>
                                                <option value="+855">+855</option>
                                                <option value="+856">+856</option>
                                                <option value="+880">+880</option>
                                                <option value="+886">+886</option>
                                                <option value="+960">+960</option>
                                                <option value="+961">+961</option>
                                                <option value="+962">+962</option>
                                                <option value="+963">+963</option>
                                                <option value="+964">+964</option>
                                                <option value="+965">+965</option>
                                                <option value="+966">+966</option>
                                                <option value="+967">+967</option>
                                                <option value="+968">+968</option>
                                                <option value="+970">+970</option>
                                                <option value="+971">+971</option>
                                                <option value="+972">+972</option>
                                                <option value="+973">+973</option>
                                                <option value="+974">+974</option>
                                                <option value="+975">+975</option>
                                                <option value="+976">+976</option>
                                                <option value="+977">+977</option>
                                                <option value="+992">+992</option>
                                                <option value="+993">+993</option>
                                                <option value="+994">+994</option>
                                                <option value="+995">+995</option>
                                                <option value="+996">+996</option>
                                                <option value="+998">+998</option>
                                                <option value="+1242">+1242</option>
                                                <option value="+1246">+1246</option>
                                                <option value="+1264">+1264</option>
                                                <option value="+1268">+1268</option>
                                                <option value="+1284">+1284</option>
                                                <option value="+1345">+1345</option>
                                                <option value="+1441">+1441</option>
                                                <option value="+1473">+1473</option>
                                                <option value="+1649">+1649</option>
                                                <option value="+1664">+1664</option>
                                                <option value="+1670">+1670</option>
                                                <option value="+1671">+1671</option>
                                                <option value="+1684">+1684</option>
                                                <option value="+1721">+1721</option>
                                                <option value="+1758">+1758</option>
                                                <option value="+1767">+1767</option>
                                                <option value="+1784">+1784</option>
                                                <option value="+1787">+1787</option>
                                                <option value="+1809">+1809</option>
                                                <option value="+1868">+1868</option>
                                                <option value="+1869">+1869</option>
                                                <option value="+1876">+1876</option>
                                                <option value="+4779">+4779</option>
                                                <option value="+5997">+5997</option>
                                            </select>
                                            <div class="dropdown-icon-wrap svelte-4onmmp">
                                                <svg data-ds-icon="ChevronDown" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0">
                                                    <path fill="currentColor" d="M17.293 8.293a1 1 0 1 1 1.414 1.414l-6 6a1 1 0 0 1-1.414 0l-6-6-.068-.076A1 1 0 0 1 6.63 8.225l.076.068L12 13.586z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="label-content svelte-1rbhysu full-width"></span>
                                </label>
                                <label type="body" tag="label" size="md" class="ds-body-md inline-flex relative flex-col-reverse items-start" data-ds-text="true">
                                    <div class="input-wrap svelte-dka04o">
                                        <div class="input-content svelte-dka04o">
                                            <div class="before-icon svelte-dka04o"></div>
                                            <div class="after-icon svelte-dka04o"></div>
                                            <input autocomplete="on" class="input spacing-expanded svelte-dka04o" type="text" name="phoneNumber" max="Infinity" placeholder="Phone Number" aria-label="Phone Number" data-testid="phone-number" inputmode="numeric" data-dd-privacy="mask">
                                        </div>
                                        <div class="input-button-wrap svelte-dka04o"></div>
                                    </div>
                                    <span class="label-content svelte-1rbhysu full-width">
                                        <div class="label-left-wrapper svelte-dka04o"></div>
                                    </span>
                                </label>
                            </div>
                            <div class="flex phone-disclaimer" style="display: none;">
                                <span tag="span" type="body" size="xs" class="ds-body-xs" data-ds-text="true">By submitting your phone number, you are opting-in to receive marketing communications &amp; offers via SMS from Stake.</span>
                            </div>
                        </fieldset>
                    </div>
                    <div class="tc-wrapper svelte-1d68iyc"><!----><!----><label type="body" tag="label" size="md" class="ds-body-md inline-flex relative flex-col-reverse items-start" data-ds-text="true"><!----><!----><!----><!----><!---->
                            <div class="input-wrap svelte-dka04o hidden-input" style="display: none;">
                                <div class="input-content svelte-dka04o">
                                    <div class="before-icon svelte-dka04o"><!----><!----></div><!---->
                                    <div class="after-icon svelte-dka04o"><!----><!----><!----></div><!----> <input autocomplete="on" class="input spacing-expanded svelte-dka04o" type="text" name="signupCode" max="Infinity"> <!----><!----> <!---->
                                </div>
                                <div class="input-button-wrap svelte-dka04o"><!----><!----></div><!---->
                            </div> <!----><!----> <!----><span class="label-content svelte-1rbhysu full-width no-padding"><!---->
                                <div><!----><label type="body" tag="label" size="md" class="ds-body-md inline-flex relative items-center flex-row-reverse" data-ds-text="true" style="flex-direction: row !important; cursor: pointer; align-items: flex-start;"><!----><!----><input type="checkbox" class="svelte-2vtt3n" id="referralCheckbox"> <span class="indicator variant-default svelte-2vtt3n"></span> <span class="ml-2 flex svelte-1rbhysu full-width"><!----><!----><span type="body" tag="span" size="sm" strong="true" slot="label" class="ds-body-sm-strong" data-ds-text="true"><!----><!----><!----><!----><span type="body" tag="span" size="sm" strong="true" slot="label" class="ds-body-sm-strong flex pt-0.5" data-ds-text="true"><!---->Referral Code (Optional)</span></span><!----> <!----><!----></span><!----></label><!----> <!----></div><!---->
                            </span><!---->
                        </label><!----> <!----><!---->
                    </div>


                    <div class="flex flex-col items-end justify-end flex-1"><!----><!----><button type="button" tabindex="0" class="[font-family:var(--ds-font-family-default)] continue-button [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] inline-flex relative items-center gap-2 justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] bg-blue-500 text-white hover:bg-blue-600 hover:text-white focus-visible:outline-white var(--ds-font-size-md) shadow-md py-[0.875rem] px-[1.75rem] min-w-[12ch] w-full" data-testid="button-register" data-analytics="register-create-account-continue-button" id="register-create-account-continue-button" data-button-root=""><!----><!----><!----><!---->
                            <div data-loader-content="true" class="contents"><!----><!----><span type="body" tag="span" size="md" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->Continue</span><!----></div>
                        </button><!----></div>
                    <div class="flex flex-col justify-center items-center gap-4">
                        <div class="or svelte-3naeku" data-content="" style="max-width: 200px;"><!----><span tag="span" type="body" size="md" class="ds-body-md text-center" data-ds-text="true"><!---->OR</span><!----></div><!---->
                    </div> <!---->
                    <div class="oauth svelte-q2lh6o" style="">
                        <div data-content="" class="svelte-q2lh6o provider-wrapper" style=""><!----><!----><button type="button" tabindex="0" class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] inline-flex relative items-center gap-2 justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] bg-grey-400 text-white hover:bg-grey-300 hover:text-white focus-visible:outline-white var(--ds-font-size-sm) shadow-md py-[0.5rem] px-[1rem]" data-analytics="provider-login-facebook" data-button-root=""><!----><!----><!----><!----><!----><!----><!----><!----><!----><svg data-ds-icon="FacebookColor" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                                    <path fill="#0866FF" d="M22.986 11.993C22.986 5.92 18.066 1 11.993 1S1 5.92 1 11.993c0 5.153 3.545 9.482 8.341 10.677v-7.31H7.074v-3.367H9.34V10.55c0-3.737 1.69-5.483 5.373-5.483.7 0 1.896.138 2.39.275v3.05a14 14 0 0 0-1.263-.04c-1.8 0-2.501.687-2.501 2.46v1.181h3.586l-.618 3.367H13.34v7.558c5.441-.66 9.66-5.29 9.66-10.911z"></path>
                                    <path fill="#fff" d="m16.294 15.36.619-3.367h-3.587v-1.182c0-1.772.7-2.46 2.501-2.46.563 0 1.017 0 1.264.042v-3.05c-.495-.138-1.69-.276-2.39-.276-3.67 0-5.374 1.732-5.374 5.483v1.443H7.06v3.367h2.267v7.31c.852.206 1.745.33 2.652.33.454 0 .894-.027 1.333-.082V15.36z"></path>
                                </svg><!----> <!----></button><!----></div>
                        <div data-content="" class="svelte-q2lh6o provider-wrapper" style=""><!----><!----><button type="button" tabindex="0" class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] inline-flex relative items-center gap-2 justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] bg-grey-400 text-white hover:bg-grey-300 hover:text-white focus-visible:outline-white var(--ds-font-size-sm) shadow-md py-[0.5rem] px-[1rem]" data-analytics="provider-login-google" data-button-root=""><!----><!----><!----><!----><svg id="layer-google-logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 16 16" class="svelte-1hh3m2i">
                                    <defs>
                                        <style>
                                            .cls-google-logo-1 {
                                                clip-path: url(#clip-google-logo);
                                            }

                                            .cls-google-logo-2 {
                                                fill: none;
                                            }

                                            .cls-google-logo-2,
                                            .cls-google-logo-3,
                                            .cls-google-logo-4,
                                            .cls-google-logo-5,
                                            .cls-google-logo-6 {
                                                stroke-width: 0px;
                                            }

                                            .cls-google-logo-3 {
                                                fill: #34a853;
                                            }

                                            .cls-google-logo-4 {
                                                fill: #4285f4;
                                            }

                                            .cls-google-logo-5 {
                                                fill: #e94235;
                                            }

                                            .cls-google-logo-6 {
                                                fill: #fbbc04;
                                            }
                                        </style>
                                        <clipPath id="clip-google-logo">
                                            <rect class="cls-google-logo-2" width="16" height="16"></rect>
                                        </clipPath>
                                    </defs>
                                    <g id="layer-google-logo-2">
                                        <g class="cls-google-logo-1">
                                            <path class="cls-google-logo-4" d="M15.68,8.18c0-.57-.05-1.11-.15-1.64h-7.53v3.09h4.31c-.19,1-.75,1.85-1.6,2.41v2.01h2.59c1.51-1.39,2.39-3.44,2.39-5.88Z"></path>
                                            <path class="cls-google-logo-3" d="M8,16c2.16,0,3.97-.72,5.29-1.94l-2.59-2.01c-.72.48-1.63.76-2.71.76-2.08,0-3.85-1.41-4.48-3.3H.85v2.07c1.32,2.61,4.02,4.41,7.15,4.41Z"></path>
                                            <path class="cls-google-logo-6" d="M3.52,9.52c-.16-.48-.25-.99-.25-1.52s.09-1.04.25-1.52v-2.07H.85c-.54,1.08-.85,2.3-.85,3.59s.31,2.51.85,3.59l2.67-2.07Z"></path>
                                            <path class="cls-google-logo-5" d="M8,3.18c1.17,0,2.23.4,3.06,1.2l2.29-2.29c-1.39-1.29-3.2-2.08-5.35-2.08C4.87,0,2.17,1.79.85,4.41l2.67,2.07c.63-1.89,2.39-3.3,4.48-3.3Z"></path>
                                        </g>
                                    </g>
                                </svg><!----> <!----></button><!----></div>
                        <div data-content="" class="svelte-q2lh6o provider-wrapper" style=""><!----><!----><button type="button" tabindex="0" class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] inline-flex relative items-center gap-2 justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] bg-grey-400 text-white hover:bg-grey-300 hover:text-white focus-visible:outline-white var(--ds-font-size-sm) shadow-md py-[0.5rem] px-[1rem]" data-analytics="provider-login-line" data-button-root=""><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><svg data-ds-icon="LineColor" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                                    <path fill="#06C755" d="M12.03 23c6.075 0 11-4.925 11-11s-4.925-11-11-11-11 4.925-11 11 4.925 11 11 11"></path>
                                    <path fill="#fff" d="M19.373 11.365c0-3.285-3.299-5.962-7.343-5.962S4.688 8.08 4.688 11.365c0 2.954 2.608 5.41 6.142 5.88.234.055.565.151.648.358.07.18.055.484.028.663 0 0-.083.525-.11.635-.028.18-.152.731.634.4.787-.331 4.237-2.498 5.77-4.265 1.062-1.173 1.573-2.346 1.573-3.67"></path>
                                    <path fill="#06C755" d="M16.93 13.256a.14.14 0 0 0 .138-.138v-.524a.14.14 0 0 0-.138-.138h-1.408v-.539h1.408a.14.14 0 0 0 .138-.138v-.524a.14.14 0 0 0-.138-.138h-1.408v-.539h1.408a.14.14 0 0 0 .138-.138v-.524a.14.14 0 0 0-.138-.138h-2.07a.14.14 0 0 0-.138.138v3.202c0 .083.069.138.138.138zm-7.646 0a.14.14 0 0 0 .138-.138v-.524a.14.14 0 0 0-.138-.138H7.876v-2.54a.14.14 0 0 0-.138-.138h-.525a.14.14 0 0 0-.138.138v3.202c0 .083.07.138.138.138zm1.256-3.478h-.525a.14.14 0 0 0-.138.138v3.216c0 .076.062.138.138.138h.525a.14.14 0 0 0 .138-.138V9.916a.14.14 0 0 0-.138-.138m3.547 0h-.525a.14.14 0 0 0-.138.138v1.905l-1.463-1.988V9.82h-.524a.14.14 0 0 0-.138.138v3.202c0 .083.069.138.138.138h.524a.14.14 0 0 0 .138-.138v-1.904l1.463 1.987.042.042h.565a.14.14 0 0 0 .139-.139V9.945a.14.14 0 0 0-.139-.138z"></path>
                                </svg><!----> <!----></button><!----></div>
                        <div data-content="" class="svelte-q2lh6o provider-wrapper" style=""><!----><!----><button type="button" tabindex="0" class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] inline-flex relative items-center gap-2 justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] bg-grey-400 text-white hover:bg-grey-300 hover:text-white focus-visible:outline-white var(--ds-font-size-sm) shadow-md py-[0.5rem] px-[1rem]" data-analytics="provider-login-twitch" data-button-root=""><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><svg data-ds-icon="TwitchColor" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                                    <path fill="#fff" d="m19.246 11.22-2.995 3.136h-2.996l-2.63 2.754v-2.754H7.25V2.576h11.996z"></path>
                                    <path fill="#9146FF" d="M6.505 1 2.75 4.932v14.136h4.5V23l3.755-3.932H14L20.75 12V1zm12.741 10.22-2.995 3.136h-2.996l-2.63 2.754v-2.754H7.25V2.576h11.996z"></path>
                                    <path fill="#9146FF" d="M17.009 5.329h-1.505v4.712h1.505zm-4.134 0H11.37v4.712h1.505z"></path>
                                </svg><!----> <!----></button><!----></div>
                    </div><!----><!----><!---->
                </form>
                <form data-test-form-valid="true" class="h-full svelte-1w3iz8f third-step"><!----><!----><!---->
                    <div>
                        <div class="bg-grey-500 p-4 rounded-md text-left scrollY scroll-light visible-scrollbar svelte-1r8bw24 scrollbar-visible" data-testid="terms-content" style="max-height: 372px;">
                            <div class="content-block svelte-k165h5"><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h1 type="heading" tag="h1" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="Terms_and_Conditions">Terms and Conditions</span></h1><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="1._STAKE.COM">1. STAKE.COM</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->1.1 Stake.com is is owned and operated by Medium Rare, N.V. (hereinafter "Stake", "We" or "Us"), a company with head office at Seru Loraweg 17, B, Curaçao. Medium Rare N.V. is licensed by the Curaçao Gaming Authority under license number OGL/2024/1451/0918. Some payment processing may be handled by its wholly owned subsidiaries, Medium Rare Limited with address 7-9 Riga Feraiou, Lizantia Court, Office 310, Agioi Omologites, 1087 Nicosia, Cyprus and registration number: HE 410775 and/or MRS Tech Ltd with address Patrikiou Loumoumpa, 7, Block A, Pervolia, 7560, Larnaca and registration number: HE 477481.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="2._IMPORTANT_NOTICE">2. IMPORTANT NOTICE</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->2.1 By registering on www.stake.com (the “Website”), you enter into a contract with Medium Rare N.V., and agree to be bound by (i) these Terms and Conditions; (ii) our Privacy Policy; (iii) our Cookies Policy; (iv) the Affiliate Terms and (v) the rules applicable to our betting or gaming products as further referenced in these Terms and Conditions (“Terms and Conditions” or “Agreement”), and the betting and/or gaming specific rules, and are deemed to have accepted and understood all the terms.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->2.2 Please read this Agreement carefully to make sure you fully understand its content. If you have any doubts as to your rights and obligations resulting from the acceptance of this Agreement, please consult a legal advisor in your jurisdiction before further using the Website(s) and accessing its content. If you do not accept the terms, do not use, visit or access any part (including, but not limited to, sub-domains, source code and/or website APIs, whether visible or not) of the Website.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="3._GENERAL">3. GENERAL</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->3.1 When registering on </span><!----><!----><a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration-line:underline] [text-decoration-style:solid] [text-decoration-skip-ink:none] [text-decoration-thickness:8%] [text-underline-offset:25%] hover:[text-decoration-thickness:14%] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:outline-hidden var(--ds-font-size-sm) !bg-transparent !text-white [&amp;_svg]:!text-white focus-visible:text-white focus-visible!:[&amp;_svg]:text-white inline-flex items-center gap-1 whitespace-normal" href="/" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="off" external="false"><!----><span type="body" tag="span" size="md" class="ds-body-md" data-ds-text="true"><!---->stake.com</span><!----></a><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----> You (“You”, “Your”, Yourself” or the “Player” interchangeably) enter into an agreement with Stake.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->3.2 This Agreement should be read by You in its entirety prior to your use of Stake's service or products. Please note that the Agreement constitutes a legally binding agreement between you and Stake.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->3.3 These Terms and Conditions come into force as soon as you complete the registration process, which includes checking the box accepting these Terms and Conditions and successfully creating an account. By using any part of the Website following account creation, you agree to these Terms and Conditions applying to the use of the Website.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->3.4 We are entitled to make amendments to these Terms and Conditions at any time and without advanced notice. If we make such amendments, we may take appropriate steps to bring such changes to your attention (such as by email or placing a notice on a prominent position on the Website, together with the amended terms and conditions) but it shall be your sole responsibility to check for any amendments, updates and/or modifications. Your continued use of the website services after any such amendment to the Terms and Conditions will be deemed as your acceptance and agreement to be bound by such amendments, updates and/or modifications.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->3.5 The terms of this Terms and Conditions shall prevail in the event of any conflict between the terms of this Terms and Conditions and of any of the game rules or other documents referred to in this Terms and Conditions.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->3.6 These Terms and Conditions may be published in several languages for informational purposes and ease of access by players. The English version is the only legal basis of the relationship between you and us and in the case of any discrepancy with respect to a translation of any kind, the English version of these Terms and Conditions shall prevail.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="4._STAKE_ACCOUNT">4. STAKE ACCOUNT</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->Registration</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.1 In order for you to be able to place bets on stake.com, you must first personally register an account with us ("Stake Account").</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.2 For a person to be registered as a player with Stake and use the Website, that person must submit an application for registration and opening of a Stake account. The application for the opening of the Stake Account must be submitted personally, and will require You to provide a set of personal information, namely e-mail, full name, date of birth, address, etc.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.3 Where the information stipulated in 4.2. is not provided and/or is not deemed to be complete, accurate or up-to-date at any point in time, Stake reserves the right to suspend the Stake Account registration and treat any subsequent potentially accepted deposits to the Player’s Stake Account as invalid (and any winnings arising from such deposit as void). Where a Stake Account is suspended, You should contact customer support at </span><!----><!----><a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration:none] hover:[text-decoration:none] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:text-white focus-visible:outline-hidden var(--ds-font-size-sm) inline-flex gap-1 items-center" href="mailto:support@stake.com" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="" target="_blank" rel="external noreferrer noopener" external="true"><!----><!----><!----><span type="body" tag="span" size="md" class="ds-body-md" data-ds-text="true"><!---->support@stake.com</span><!----> <svg data-ds-icon="External" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                                            <path fill="currentColor" d="M20 13.4c-.55 0-1 .45-1 1v4c0 .33-.27.6-.6.6H5.6c-.33 0-.6-.27-.6-.6V5.6c0-.33.27-.6.6-.6h4.8c.55 0 1-.45 1-1s-.45-1-1-1H5.6C4.17 3 3 4.17 3 5.6v12.8C3 19.83 4.17 21 5.6 21h12.8c1.43 0 2.6-1.17 2.6-2.6v-4c0-.55-.45-1-1-1"></path>
                                            <path fill="currentColor" d="M14.4 3c-.55 0-1 .45-1 1s.45 1 1 1h3.19L8.1 14.49a.996.996 0 0 0 .71 1.7c.26 0 .51-.1.71-.29l9.49-9.49V9.6c0 .55.45 1 1 1s1-.45 1-1V4c0-.55-.45-1-1-1z"></path>
                                        </svg><!----><!----></a><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.4 All applicants must be 18 or such other legal age of majority as determined by any laws which are applicable to you, whichever age is greater or older. Stake reserves the right to ask for proof of age from any Player and suspend their Stake Account until satisfactory documentation is provided. Stake takes its responsibilities in respect of under age and responsible gambling very seriously.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.5 Stake will not accept registration from individuals:</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->a) Under 18 years old or under the legal age of majority or gambling in their jurisdiction, whichever is greater. It is the User's sole responsibility to ensure that their registration of the Service is lawful in their jurisdiction;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->b) Residing in jurisdictions from where it is illegal or gambling is not permitted. Stake is not able to verify the legality of the Service in each jurisdiction and it is the User's responsibility to ensure that their use of the Service is lawful;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->c) Provide misleading information or try to pass by third parties.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.6 Stake reserves the right to refuse any application for a Stake Account, at its sole discretion.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->Know Your Customer</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.7 You represent and warrant that any information provided by You on Your application form is true, updated and correct.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.8 Stake reserves the right, at any time, to ask for any KYC documentation it deems necessary to determine the identity and location of a Player. Stake reserves the right to restrict the Service, payment or withdrawal until identity is sufficiently determined, or for any other reason in Stake’s sole discretion. Stake also reserves the right to disclose a Player’s information as appropriate to comply with legal process or as otherwise permitted by the privacy policy of Stake (owner and operator of Stake), and by using the Service, you acknowledge and consent to the possibility of such disclosure.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->Multiple Accounts</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.9 Only one Stake Account per Player is allowed. Should You attempt or successfully open more than one Stake Account, under Your own name or under any other name, or should You attempt or succeed in using the Website by means of any other person's Stake Account, Stake will be entitled to immediately close all Your Stake Account(s), retain all monies in such Stake Accounts and ban You from future use of the Website.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.10 Should Stake have reason to believe that You have registered and/or used more than one Stake Account, or colluded with one or more other individuals using a number of different Stake Accounts, Stake shall be entitled to deem such accounts as constituting multiple Stake Accounts, and suspend or close all such Stake Accounts. Stake will also be entitled to retain the funds till the Player proves that he did not attempt to create multiple accounts.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.11 If you notice that you have more than one registered Stake Account you must notify us immediately. Failure to do so may lead to your Stake Account being blocked and the funds retained.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->User Responsibility</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.12 It is your sole and exclusive responsibility to ensure that your login details are kept securely. You must not disclose your login details to anyone.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.13 We are not liable or responsible for any abuse or misuse of your Stake Account by third parties due to your disclosure, whether intentional, accidental, active or passive, of your login details to any third party.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.14 You are prohibited from selling, transferring or acquiring Stake Accounts to or from other Players.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.15 You will inform us as soon as you become aware of any errors with respect to your account or any calculations with respect to any bet you have placed. We reserve the right to declare null and void any bets that are subject to such an error.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.16 You are responsible for all activities that occur under your account.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->Security Features</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.17 We recommend that you enable two-factor authentication to enhance the security of your account.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.18 We may provide other security measures from time to time, and we encourage you to use them.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->Suspension and Closure by Stake</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.19 Stake shall be entitled to close or suspend Your Stake Account if:</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->a) Stake considers that You are using or have used the Website in a fraudulent or collusive manner or for illegal and/or unlawful or improper purposes;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->b) Stake considers that You are using or have used the Website in an unfair manner, have deliberately cheated or taken unfair advantage of Stake or any of its customers or if Your Stake Account is being used for the benefit of a third party;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->c) Stake is requested to do so by the police, any regulatory authority or court or if Stake is unable to verify Your identity, profession or source of funds as is expressly required by the applicable regulations;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->d) You are in breach of these Terms and Conditions, the applicable regulations or the fair use of our services, or Stake has concerns that You are a compulsive problem gambler without being self-excluded;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->e) Stake considers that any of the events referred to in (a) to (e) above may have occurred or are likely to occur.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.20 If Stake closes or suspends Your Stake Account for any of the reasons referred to in 4.19, You shall, to the extent permitted by applicable laws, be liable for any and all claims, direct losses, liabilities, damages, costs and expenses incurred or suffered by Stake (together, the “Claims”) arising therefrom and shall, to the extent permitted by applicable laws, indemnify and hold Stake harmless on demand for such Claims.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.21 In the circumstances referred to in 4.19, Stake shall also be entitled to void any bets placed by You following such actions by You or to withhold and/or retain any and all amounts which would otherwise have been paid or payable to you (including any winnings) to the extent permitted by law.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.22 We reserve the right to suspend or terminate your account at any time, with or without notice, if we suspect that your account has been compromised or is being used in breach of our Terms of Service.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.23 If Stake closes Your Stake Account it will inform You of the available means to withdraw the remaining balance on Your Stake Account.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->Our Liability</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.24 We take no responsibility for any loss or damage that you may suffer as a result of unauthorised access to your account.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->4.25 We take no responsibility for any loss or damage that you may suffer as a result of your failure to keep your login secure and private.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="5._YOUR_WARRANTIES">5. YOUR WARRANTIES</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->5.1 Prior to your use of the Service and on an ongoing basis you represent, warrant, covenant and agree that:</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->Capacity</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->a) You are over 18 or such other legal age of majority as determined by any laws which are applicable to you, whichever age is greater;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->b) You have full capacity to enter into a legally binding agreement with us and you are not restricted by any form of limited legal capacity;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->c) You are not diagnosed or classified as a compulsive or problem gambler;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->d) You are not currently self-excluded from any gambling site or gambling premises. You will inform Stake immediately if you enter into a self-exclusion agreement with any gambling provider.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->Jurisdiction</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->e) You are accessing stake.com from a jurisdiction in which it is legal to do so;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->f) You will not use our services while located in any jurisdiction that prohibits the placing and/or accepting of bets online and/or playing casino and/or live games;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->g) You accept and acknowledge that we reserve the right to detect and prevent the use of prohibited techniques, including but not limited to fraudulent transaction detection, automated registration and signup, gameplay and screen capture techniques. These steps may include, but are not limited to, examination of Players device properties, detection of geo-location and IP masking, transactions and blockchain analysis;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->Funds &amp; Tax</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->h) You are solely responsible for reporting and accounting for any taxes applicable to you under relevant laws for any winnings that you receive from us;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->i) You are solely responsible for any applicable taxes which may be payable on cryptocurrency and FIAT awarded to you through your using the Service;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->j) There is a risk of losing cryptocurrency and FIAT when using the Service and that Stake has no responsibility to you for any such loss;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->k) You will not deposit funds which originate from criminal or other unauthorised activity;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->l) You will not deposit funds using payment methods that do not belong to You;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->m) All the funds deposited shall exclusively be used for Services available on the Website;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->n) You will not withdraw or try to withdraw to a payment methods that do not belong to You;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->o) You understand that by participating in the Services available on the Website, You take the risk of losing money deposited.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->p) You accept and acknowledge that the value of cryptocurrency can change dramatically depending on the market value;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->q) Stake shall not be treated as a financial institution;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->Others</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->r) Your use of the Service is at your sole option, discretion and risk;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->s) You will not conduct criminal activities through the Stake Account;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->t) All information that you provide to us during the term of validity of this agreement is true, complete, correct, and that you shall immediately notify us of any change of such information;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->u) You participate in the Games strictly in your personal and non-professional capacity and participate for recreational and entertainment purposes only;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->v) You participate in the Games on your own behalf and not on the behalf of any other person;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->w) You have only one account with us and agree to not to open any more accounts with us;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->x) The telecommunications networks and Internet access services required for you to access and use the Service are entirely beyond the control of Stake and Stake shall have no liability whatsoever for any outages, slowness, capacity constraints or other deficiencies affecting the same;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->y) You will not be involved in any fraudulent, collusive, fixing or other unlawful activity in relation to Your or any third parties’ participation in any of the games and/or services on the Website, and shall not use any software-assisted methods or techniques or hardware devices for Your participation in any of the games and/or services on the Website;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->z) If you have access to non-public information related to an event or that can impact the outcome of an event or bet type, You will not bet on any event overseen by the relevant sport/event governing body;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->aa) If You are an athlete, coach, manager, owner, referee, or anyone with sufficient authority to influence the outcome of an event You will not bet on any event overseen by the relevant sport or event of the governing body;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->bb) If You are an owner (a person who is a direct or indirect legal or beneficial owner of 10 percent or greater) of a sport governing body or member team You will not bet on any event overseen by the sport governing body or any event in which a member team of that sport or event governing body participates;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->cc) If You are involved in a sport or event You will not be involved in compiling betting odds for the competition in which You are involved.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->5.2 In case of a breach of any of the representations, warrants or covenants mentioned in 5.1, Stake reserves the right to close or suspend Your Stake account at its own discretion and void any bets to the extent applicable by law.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="6._STAKE_WARRANTIES">6. STAKE WARRANTIES</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->6.1 Stake warrants that they will:</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->a) manage funds belonging to the Player in a secure and appropriate manner; and</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->b) manage personal information pertaining to the Player in accordance with applicable law, and in accordance with its Privacy Policy.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->6.2 The software is provided </span><!----><!----><em><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->"as is"</span><!----></em><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----> without any warranties, conditions, undertakings or representations, express or implied, statutory or otherwise. Stake hereby excludes all implied terms, representations, conditions and warranties (including any of merchantability, merchantable quality, satisfactory quality and fitness for any particular purpose). Stake does not warrant that: (i) the Website and Services will meet Your requirements; (ii) the Website and Services will not infringe any third party’s intellectual property rights; (iii) the operation of the Website and Services will be error-free or uninterrupted; (iv) any defects in the Website and Services will be corrected; or (v) the Website or the servers are virus-free.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->6.3 Stake can be contacted by email on </span><!----><!----><a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration:none] hover:[text-decoration:none] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:text-white focus-visible:outline-hidden var(--ds-font-size-sm) inline-flex gap-1 items-center" href="mailto:support@stake.com" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="" target="_blank" rel="external noreferrer noopener" external="true"><!----><!----><!----><span type="body" tag="span" size="md" class="ds-body-md" data-ds-text="true"><!---->support@stake.com</span><!----> <svg data-ds-icon="External" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                                            <path fill="currentColor" d="M20 13.4c-.55 0-1 .45-1 1v4c0 .33-.27.6-.6.6H5.6c-.33 0-.6-.27-.6-.6V5.6c0-.33.27-.6.6-.6h4.8c.55 0 1-.45 1-1s-.45-1-1-1H5.6C4.17 3 3 4.17 3 5.6v12.8C3 19.83 4.17 21 5.6 21h12.8c1.43 0 2.6-1.17 2.6-2.6v-4c0-.55-.45-1-1-1"></path>
                                            <path fill="currentColor" d="M14.4 3c-.55 0-1 .45-1 1s.45 1 1 1h3.19L8.1 14.49a.996.996 0 0 0 .71 1.7c.26 0 .51-.1.71-.29l9.49-9.49V9.6c0 .55.45 1 1 1s1-.45 1-1V4c0-.55-.45-1-1-1z"></path>
                                        </svg><!----><!----></a><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----> or on its live chat 24/7. The live chat is available when logged into Your Stake Account. In the event that Stake, in its sole discretion, deems that Your behaviour, via live chat, email, or otherwise, has been abusive or derogatory towards any of Stake’s or its Affiliates or third-party service provider’s employees, Stake shall have the right to block or terminate Your Stake Account.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="7._DEPOSITS">7. DEPOSITS</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->7.1 You may participate in any Game only if you have sufficient funds on your Stake Account for such participation. For that purpose you shall use the payment methods available on the Website to deposit your funds. Stake will not give you any credit whatsoever for participation in any Game.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->7.2 You must deposit funds to Your Stake Account using the payment methods available at </span><!----><!----><a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration-line:underline] [text-decoration-style:solid] [text-decoration-skip-ink:none] [text-decoration-thickness:8%] [text-underline-offset:25%] hover:[text-decoration-thickness:14%] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:outline-hidden var(--ds-font-size-sm) !bg-transparent !text-white [&amp;_svg]:!text-white focus-visible:text-white focus-visible!:[&amp;_svg]:text-white inline-flex items-center gap-1 whitespace-normal" href="/" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="off" external="false"><!----><span type="body" tag="span" size="md" class="ds-body-md" data-ds-text="true"><!---->stake.com</span><!----></a><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->7.3 You shall ensure that funds that You deposit into your Stake Account are not tainted with any illegality and, in particular, do not originate from any illegal activity or source.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->7.4 To deposit funds into your Stake Account, you can transfer funds from crypto-wallets under your control or through any other payment methods available on stake.com. Deposits can only be made with your own funds.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->7.5 You should only deposit money into Your account for the purpose of You using such money to place bets/wager on the Website. Stake is entitled to suspend or close Your account if we reasonably believe that You are depositing funds without any intention to place sporting and/or gaming wagers. In such circumstances we may also report this activity to relevant authorities.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->7.6 You acknowledge and understand that funding Your Stake Account can only be funded by payment methods owned by You.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->7.7 You further understand, agree and acknowledge that if Stake discovers, detects and/or identifies that You:</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->a) Funded/are funding Your Stake Account using third party payment methods; and/or</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->b) Funded/are funding Your Stake Account with funds that are tainted with illegality, such activity will be deemed as constituting a violation of the Terms of Service amounting to fraud, and by extension:</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->i) Stake reserves the right, at its own discretion, to suspend or close Your Stake Account; and</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->ii) Stake reserves the right, at its own discretion, to cancel, reverse or adjust any transactions and to forfeit funds deposited and/or winnings generated from the deposited funds.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->7.8 Stake can set at its own discretion a minimum deposit amount. The minimum deposit amount can be changed at all time at Stake’s discretion and will be identified on the website. Please be aware that depending on the payment method used by You, additional fees might be charged by the payment providers.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->7.9 The payment methods made available to you and the minimum and maximum deposit limit can be found in the wallet section on the Site. Applicable service fees may be applied and changed. Some payment methods may not be available in all countries.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->7.10 Deposits are immediately processed and the updated balance is shown in the Stake Account instantly whenever a payment service provider is used. Stake does not take responsibility for any delays caused due to its payment system or due to delays caused by any third party. Note that:</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->a) some payment methods may include additional fees. In this case, the fee will be clearly visible for you in the cashier.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->b) your bank or payment service provider may charge you additional fees for deposits of currency conversion according to their terms and conditions and your user agreement.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->7.11 We reserve the right to use additional procedures and means to verify your identity when processing deposits into your Stake Account.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->7.12 Funds cannot be transferred from your Stake Account to the Stake Account of another Player.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->7.13 Stake can refuse any deposits at its own discretion. Users that have their accounts blocked, or suspended shall refrain from depositing at </span><!----><!----><a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration-line:underline] [text-decoration-style:solid] [text-decoration-skip-ink:none] [text-decoration-thickness:8%] [text-underline-offset:25%] hover:[text-decoration-thickness:14%] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:outline-hidden var(--ds-font-size-sm) !bg-transparent !text-white [&amp;_svg]:!text-white focus-visible:text-white focus-visible!:[&amp;_svg]:text-white inline-flex items-center gap-1 whitespace-normal" href="/" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="off" external="false"><!----><span type="body" tag="span" size="md" class="ds-body-md" data-ds-text="true"><!---->stake.com</span><!----></a><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->7.14 In the event that a player tries to deposit when his account is blocked or suspended, Stake will have the right to retain the funds.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="8._WITHDRAWALS">8. WITHDRAWALS</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->8.1 Stake reserves the right to refuse any withdrawal by a Player from their Stake Account until:</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->a) the Player’s identity has been verified and Stake has confirmed the withdrawal is being made by a holder of the Stake Account;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->b) the withdrawal is being transferred to an account of which the Player is a legal holder;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->c) any additional information requested by Stake has been provided; and</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->d) the Player has complied with the minimum wager requirement for each deposit.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->8.2 Stake reserves all rights to investigate Your account and gaming activity. If Stake reasonably suspects that Your account or gaming activity has violated these terms of service or applicable laws or regulations, it may, in its sole discretion, delay or decline further deposits, withdrawals and/or game play while it conducts its investigation. You acknowledge and accept that Stake may not be in a position to provide an explanation as to the nature of its investigation.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->8.3 All withdrawals must be done through the same payment method chosen by you when placing a deposit, unless we decide otherwise or are unable to do so. If you deposit using a number of payment methods, we reserve the right to split your withdrawal across such payment methods and process each part through the respective payment method at our discretion and in accordance with anti-money laundering policies and regulation.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->8.4 If we mistakenly credit your Stake Account with winnings that do not belong to you, whether due to a technical error in the pay-tables, or human error or otherwise, the amount will remain our property and will be deducted from your Stake Account. If you have withdrawn funds that do not belong to you prior to us becoming aware of the error, the mistakenly paid amount will (without prejudice to other remedies and actions that may be available at law) constitute a debt owed by you to us. In the event of an incorrect crediting, you are obliged to notify us immediately by email.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->FIAT Withdrawals</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->8.5 You need to wager 100% of the value of your deposit in order to request a FIAT withdrawal.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->8.6 Withdrawals from Stake Account are made through payments addressed to the Player or transferred to a bank account held in the name of the Player, as advised to Stake by the Player. Before processing any withdrawal, Stake reserves the right to perform enhanced due diligence where deemed necessary.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->8.7 The minimum withdrawal amount will be identified on the website when performing a withdrawal.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->8.8 If You have multiple withdrawals pending, Stake reserves the right to reject all withdrawals and request You to perform one withdrawal with the sum of all multiple withdrawals.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->8.9 Stake may charge You a fee on withdrawals at its discretion. Additionally, You are advised to check if the payment method You use imposes any additional charges. Stake will not be responsible for any commissions or processing fees charged to You by third parties such as Your bank as this is beyond our control.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->Crypto Withdrawals</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->8.10 You need to wager 100% of the value of your deposit in order to request a Crypto withdrawal.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->8.11 Crypto withdrawals will be made to your stated cryptocurrency wallet address when making a valid withdrawal request.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->8.12 Stake reserves the right to carry out additional KYC verification procedures for any withdrawal. Players who wish to recover funds held in a closed, locked or excluded account, are advised to contact </span><!----><!----><a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration:none] hover:[text-decoration:none] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:text-white focus-visible:outline-hidden var(--ds-font-size-sm) inline-flex gap-1 items-center" href="mailto:support@stake.com" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="" target="_blank" rel="external noreferrer noopener" external="true"><!----><!----><!----><span type="body" tag="span" size="md" class="ds-body-md" data-ds-text="true"><!---->support@stake.com</span><!----> <svg data-ds-icon="External" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                                            <path fill="currentColor" d="M20 13.4c-.55 0-1 .45-1 1v4c0 .33-.27.6-.6.6H5.6c-.33 0-.6-.27-.6-.6V5.6c0-.33.27-.6.6-.6h4.8c.55 0 1-.45 1-1s-.45-1-1-1H5.6C4.17 3 3 4.17 3 5.6v12.8C3 19.83 4.17 21 5.6 21h12.8c1.43 0 2.6-1.17 2.6-2.6v-4c0-.55-.45-1-1-1"></path>
                                            <path fill="currentColor" d="M14.4 3c-.55 0-1 .45-1 1s.45 1 1 1h3.19L8.1 14.49a.996.996 0 0 0 .71 1.7c.26 0 .51-.1.71-.29l9.49-9.49V9.6c0 .55.45 1 1 1s1-.45 1-1V4c0-.55-.45-1-1-1z"></path>
                                        </svg><!----><!----></a><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->8.13 All transactions shall be checked in order to prevent money laundering. If a player becomes aware of any suspicious activity relating to any of the Games of the Website, s/he must report this to Stake immediately. Stake may suspend, block or close a Stake Account and withhold funds if requested to do so in accordance with the Prevention of Money Laundering Act or on any other legal basis requested by any state authority. You acknowledge that the funds in your account are consumed instantly when playing and we do not provide return of goods, refunds or retrospective cancellation of your account.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="9._PLAYER_FUNDS_PROTECTION_&amp;_CHARGEBACKS">9. PLAYER FUNDS PROTECTION &amp; CHARGEBACKS</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->9.1 Any funds You deposit with us in Your Stake Account, along with any winnings, are held for You in separate customer bank accounts / crypto wallet for the sole and specific purpose for You to place sports and gaming wagers and to settle any fees or charges that You might incur in connection with the use of our Services. This means Your funds are protected from being used for any other purpose.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->9.2 If we incur any charge-backs, reversals or denial of payments or any loss suffered by Stake as a consequence thereof due to causes attributable to You in respect of Your Stake Account, we reserve the right to charge You for the relevant amounts incurred.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->9.3 We may, at any time, offset any positive balance on Your account against any amounts owed by You to Stake.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="10._PLACING_BETS/WAGERS">10. PLACING BETS/WAGERS</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->10.1 You are allowed to place Your bets/wagers on the markets/products offered in the Website. Stake is not obliged to accept any bet/wager from You and bets/wagers will only be deemed as valid and finalised, and therefore as accepted by Stake, when You receive the confirmation from Stake of the acceptance of Your bet/wager.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->10.2 Stake only accepts bets/wagers made online (including via mobile device). Bets/wagers are not accepted in any other form (post, email, fax, etc.) and where received will be invalid and void - win or lose.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->10.3 It is Your responsibility to ensure details of the bets/wagers are correct. Once bets/wagers have been placed they may not be cancelled by You. Bets can only be changed by You using our Edit Bet feature, where this is available. Stake can only cancel or amend a bet/wager if the relevant event has been suspended or cancelled, if there was an obvious error on the relevant bet or its odds, if the bet is placed in breach of the Terms or if required to do so for legal or regulatory reasons.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->10.4 Your funds will be allocated to bets/wagers in the order they are placed and will not be available for any other use. Stake reserves the right to void and/or reverse any transactions made after a bet/wager has been placed involving allocated funds, either at the time or retrospectively.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->10.5 We reserve the right to adjust the house edge of any slot game at our sole discretion and without prior notice, as may be necessary to maintain the integrity, fairness, and overall balance of the gaming environment. In the event of any discrepancy between Stake's House Edge and the Return to Player (RTP) percentage displayed in-game, please contact our Customer Support team for clarification. We accept no liability whatsoever should you choose to place a wager in reliance on any such discrepancy.
                                    </span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="11._BET/WAGER_CONFIRMATION">11. BET/WAGER CONFIRMATION</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->11.1 Bets/wagers will only be valid once You receive the confirmation of the acceptance of Your bet/wager. Bets/wagers placed with insufficient funds in Your account will be void.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->11.2 A bet/wager that You request will only be valid once accepted by Stake. Each valid bet/wager will receive a unique transaction code. We shall not be liable for the settlement of any bets/wagers which are not issued with a unique transaction code. If You are unsure about the validity of a bet/wager, please check Your account history, or contact our Customer Support Team (</span><!----><!----><a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration:none] hover:[text-decoration:none] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:text-white focus-visible:outline-hidden var(--ds-font-size-sm) inline-flex gap-1 items-center" href="mailto:support@stake.com" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="" target="_blank" rel="external noreferrer noopener" external="true"><!----><!----><!----><span type="body" tag="span" size="md" class="ds-body-md" data-ds-text="true"><!---->support@stake.com</span><!----> <svg data-ds-icon="External" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                                            <path fill="currentColor" d="M20 13.4c-.55 0-1 .45-1 1v4c0 .33-.27.6-.6.6H5.6c-.33 0-.6-.27-.6-.6V5.6c0-.33.27-.6.6-.6h4.8c.55 0 1-.45 1-1s-.45-1-1-1H5.6C4.17 3 3 4.17 3 5.6v12.8C3 19.83 4.17 21 5.6 21h12.8c1.43 0 2.6-1.17 2.6-2.6v-4c0-.55-.45-1-1-1"></path>
                                            <path fill="currentColor" d="M14.4 3c-.55 0-1 .45-1 1s.45 1 1 1h3.19L8.1 14.49a.996.996 0 0 0 .71 1.7c.26 0 .51-.1.71-.29l9.49-9.49V9.6c0 .55.45 1 1 1s1-.45 1-1V4c0-.55-.45-1-1-1z"></path>
                                        </svg><!----><!----></a><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->).</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->11.3 Should a dispute arise regarding the content of a bet, You and Stake agree that the Stake transaction log database of its internal control system will be the ultimate authority in such matters.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="12._BONUS">12. BONUS</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->12.1 Stake, at its sole discretion, might offer from time to time, a number of Bonuses and Promotions. For example, The Million Dollar Race, the 50 Billionth Bet Bonanza, Coupons, Reloads, and Rakeback.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->Eligibility</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->12.2 Upon successful registration for a Stake Account, You may be eligible to receive Stake Promotions and Bonuses. By accepting this agreement and registering for a Stake Account on the Website, You are also acknowledging and accepting to be bound by the rules and regulations associated with any Promotions and Bonuses offered to You by Stake.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->Bonus T&amp;C</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->12.3 All promotions, bonuses, or special offers are subject to the express terms of any bonus offered on the Website(s) and promotion-specific terms and conditions, if applicable, and any bonus credited to Your account must be used in adherence with such terms and conditions. By accepting a promotion, bonus, or special offer available on the Website(s), You consent to the terms and conditions of such promotion, bonus, or special offer and acknowledge that wagers must always be placed with cash balances before bonus balances can be used to wager. We reserve the right to withdraw any promotion, bonus, or special offer at any time.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->Activation &amp; Expiry</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->12.4 By activating a Bonus or Promotion, You confirm that You also agree to the applicable terms and conditions.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->12.5 No promotion, bonus, or special offer will be accepted or honoured by the Stake following the expiration date of the promotion, bonus, or special offer, unless Stake in its sole discretion chooses to do so for any particular customer, promotion, bonus, or special offer. Expiration dates will be set forth in the specific rules or terms and conditions of the particular promotion, bonus, or special offer. Furthermore, Stake reserves the right, in its sole discretion, to change or modify any policy with respect to the earning or expiration of bonuses.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->12.6 Once forfeited or de-activated, the Bonus will no longer be available to You (and cannot be re-activated at any time thereafter). The amount of any Bonus Funds that have already been credited to your Stake Account Balance will remain available to You.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->Bonus Abuse &amp; Fraud</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->12.7 In the event that Stake believes a Player of the Service is abusing or attempting to abuse a bonus or other promotion or is likely to benefit through abuse or lack of good faith from a policy adopted by Stake, then Stake may, at its sole discretion, deny, withhold, or withdraw from any Player any bonus or promotion, or terminate that Player’s access to the Services, the Software, and/or lock that Player’s account, either temporarily or permanently.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->12.8 You may only open one (1) account on the Website. The opening of multiple accounts on the Website for the purpose of accumulating bonuses, promotions, special offers, or otherwise, shall be considered abusive behaviour.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->Stake Rights</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->12.9 Stake reserves the right to remove bonuses from all inactive accounts or accounts that are identified as “bonus abusers”.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->12.10 Stake reserves the right to cancel all bonuses that have not been claimed within the claiming period or 60 days, the shorter of the two.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->12.11 Stake reserves the right to cancel any bonus at its sole discretion.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="13._AUTHORITY/TERMS_OF_SERVICE">13. AUTHORITY/TERMS OF SERVICE</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->13.1 You agree to the game rules described on the Stake.com website. Stake retains authority over the issuing, maintenance, and closing of the Service. The decision of Stake's management, concerning any use of the Service, or dispute resolution, is final and shall not be open to review or appeal.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="14._PROHIBITED_USES">14. PROHIBITED USES</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->PERSONAL USE</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->14.1 The Service is intended solely for the User's personal use. The User is only allowed to wager for his/her personal entertainment. Users may not create multiple accounts for the purpose of collusion, sports betting and/or abuse of service.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->AML &amp; SANCTIONS COMPLIANCE</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->14.2 Stake expressly prohibits and rejects the use of the Service for any form of illicit activity, including money laundering, terrorist financing or trade sanctions violations, consistent with various jurisdictions' laws, regulations and norms. To that end, the Service is not offered to individuals or entities subject to United States, European Union, or other global sanctions or watch lists. By using the Service, you represent and warrant that you are not so subject.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="true" class="ds-body-md-strong" data-ds-text="true"><!---->JURISDICTIONS</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->14.3 Persons located in or reside in Afghanistan, Argentina, Austria, Australia, Belgium, Brazil, Cayman Islands, Colombia, Côte d'Ivoire, Cuba, Curaçao, Czech Republic, Cyprus, Democratic Republic of the Congo, Denmark, France, Germany, Greece, Iran, Iraq, Israel, Italy, Liberia, Libya, Lithuania, Malta, Netherlands, North Korea, Ontario, Peru, Poland, Portugal, Serbia, Slovakia, South Africa, South Sudan, Spain, Sudan, Syria, Sweden, Switzerland, United Kingdom, United States, Zimbabwe (the "Prohibited Jurisdictions") are not permitted make use of the Service. For the avoidance of doubt, the foregoing restrictions on engaging in real-money play from Prohibited Jurisdictions applies equally to residents and citizens of other nations while located in a Prohibited Jurisdiction. Any attempt to circumvent the restrictions on play by any persons located in a Prohibited Jurisdiction or Restricted Jurisdiction, is a breach of this Agreement. An attempt at circumvention includes, but is not limited to, manipulating the information used by Stake to identify your location and providing Stake with false or misleading information regarding your location or place of residence.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->14.4 The attempt to manipulate your real location through the use of VPN, proxy, or similar services or through the provision of incorrect or misleading information about your place of residence, with the intent to circumvent geo-blocking or jurisdiction restrictions, constitutes a breach of Clause 5 of this Terms of Service.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="15._YOUR_EQUIPMENT">15. YOUR EQUIPMENT</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->15.1 Your computer equipment or mobile device and internet connection may affect the performance and/or operation of the Website. Stake does not guarantee that the Website will operate without faults or errors or that Stake services will be provided without interruption. Stake does not accept any liability for any failures or issues that arise due to Your equipment, internet connection or internet or telecommunication service provider (including, for example, if You are unable to place bets or wagers or to view or receive certain information in relation to particular events).</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->15.2 For customers using a mobile device for the placing of bets/wagers, please note that Stake will not be responsible for any damage to, or loss of data from the mobile device that the software is installed on, and will also not be responsible for any call, data or other charges incurred whilst using the software.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->15.3 Due to limited display sizes on mobile devices, the mobile experience might differ slightly from other platforms. Differences might include, but are not limited to, the location of certain information on the platform and game names not being visible on all game pages.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="16._FAIR_USE">16. FAIR USE</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->16.1 The Website and Services may only be used for recreational purposes by placing bets and wagers on events and/or gaming products.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->16.2 You must not use the Website for the benefit of a third party or for any purpose which is illegal, defamatory, abusive or obscene, or which Stake considers discriminatory, fraudulent, dishonest or inappropriate. Stake may report to the authorities any activity which it considers to be suspicious and/or in breach of this paragraph.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->16.3 If Stake has a reasonable suspicion that You are involved in fraudulent, dishonest or criminal acts, as set out under applicable laws, via or in connection with the Website or Services, Stake may seek criminal and contractual sanctions against You. Stake will withhold payment to any customer where any of these are suspected or where the payment is suspected to be for the benefit of a third party.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->16.4 You shall indemnify and shall be liable to pay Stake, on demand, all costs, charges or losses sustained or incurred by us and our affiliates (including any direct, indirect or consequential losses, loss of profit and loss of reputation) in respect of all Claims arising directly or indirectly from Your fraudulent, dishonest or criminal acts while using the Website or Services</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->16.5 Furthermore, we reserve the right not to accept, process and/or honour bets/wagers where it would be forbidden, unlawful or illegal under applicable law or regulation to do so.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="17._SOFTWARE_AND_TECHNOLOGY_ISSUES">17. SOFTWARE AND TECHNOLOGY ISSUES</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->17.1 In order for You to use the Website and Services, You may need to download some software (for example, casino games that are made available via a flash player). Also, certain third party product providers may require You to agree to additional terms and conditions governing the use of their products that are available on or through the Website. If You do not accept those third party terms and conditions, do not use the relevant third party software. Stake does not accept any liability in respect of any third party software.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->17.2 You are only permitted to use any and all software made available to You via the Website for the purpose of using the Website and Services and, save to the extent permitted by applicable law, for no other purposes whatsoever.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->17.3 We hereby grant to You a personal, non-exclusive, non-transferable right to use the Website for the sole purpose of accessing and using the Services on the Website, in accordance with these Terms and Conditions. This right to use our Website and will be immediately terminated once Your user registration is cancelled for any reason, and specially, but not limited to, if You make use of that right with the aim of generating a parallel enterprise based in our Website or our products, or with the aim of making use of an automated service or software analysing, capturing or somehow using the information shown in our Website.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->17.4 You are not permitted to:</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->a) install or load the software that forms part of the Website onto a server or other networked device or take other steps to make the software available via any form of "bulletin board", online service or remote dial-in or network to any other person;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->b) sub-license, assign, rent, lease, loan, transfer or copy (except as expressly provided elsewhere in these Terms and Conditions) Your right to use the Website, or the software that forms part of the Website, or make or distribute copies of same;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->c) enter, access or attempt to enter or access or otherwise bypass Stake’s security system or interfere in any way (including but not limited to, robots or similar devices) with the products or the Website or attempt to make any modifications to the software and/or any features or components thereof;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->d) copy or translate any user documentation provided 'online' or in electronic format.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->e) In addition, except to the minimum extent permitted by applicable law in relation to computer programs, You are not permitted to: (i) translate, reverse engineer, decompile, disassemble, modify, create derivative works based on, or otherwise modify the Website; or (ii) reverse engineer, decompile, disassemble, modify, adapt, translate, make any attempt to discover the source code of the software that forms part of the Website or to create derivative works based on the whole or on any part of the Website.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->17.5 You do not own the software that forms part of the Website. Such software is owned and is the exclusive property of Stake or a third party software provider company (any such third party provider, the "Software Provider"). Any software and accompanying documentation which have been licensed to Stake are proprietary products of the Software Provider and protected throughout the world by copyright law. Your use of the software does not give You ownership of any intellectual property rights in the software.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->17.6 The software is provided "as is" without any warranties, conditions, undertakings or representations, express or implied, statutory or otherwise. Stake hereby excludes all implied terms, conditions and warranties, including any of merchantability, merchantable quality, satisfactory quality and fitness for any particular purpose, completeness or accuracy of the services or the software or infringement of applicable laws and regulations. Stake does not warrant or condition that: (i) the software will meet Your requirements; (ii) the software will not infringe any third party’s intellectual property rights; (iii) the operation of the software will be error free or uninterrupted; (iv) any defects in the software will be corrected; or (v) the software or the servers are virus-free.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->17.7 In the event of communications or system errors occurring in connection with the settlement of accounts or other features or components of the software, neither Stake nor the Software Provider will have any liability to You or to any third party in respect of such errors. Stake reserves the right in the event of such errors to remove all relevant products from the Website and take any other action to correct such errors.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->17.8 You hereby acknowledge that how You use the software is outside of Stake’s control. Accordingly, You install and/or use the software at Your own risk. Stake will not have any liability to You or to any third party in respect of Your receipt of and/or use of the software.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->17.9 The software may include confidential information which is secret and valuable to the Software Provider and/or Stake. You are not entitled to use or disclose that confidential information other than strictly in accordance with these Terms and Conditions.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->17.10 Stake shall not be liable if for any reason the Website is unavailable at any time or for any period. We reserve the right to make changes or corrections to or to alter, suspend or discontinue any aspect of the Website and the content or services or products available through it, including Your access to it.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->17.11 You must not misuse the Website by introducing viruses, trojans, worms, logic bombs or other material which is malicious or technologically harmful. In particular, You must not access the Website without authority, interfere with, damage or disrupt the Website or any part of it, any equipment or network on which the Website is hosted, any software used in connection with the provision of the Website, or any equipment, software or website owned or used by a third party. You must not attack our Website via a denial-of-service attack. We will not be liable for any loss or damage caused by a distributed denial-of-service attack, viruses or other technologically harmful material that may infect Your computer equipment, computer programs, data or other proprietary material arising due to Your use of the Website, software or to Your downloading of any material posted on it, or on any website linked to it.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="18._THIRD_PARTY_CONTENT">18. THIRD PARTY CONTENT</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->18.1 Stake receives feeds, commentaries and content from a number of suppliers. Certain third party product providers may require You to agree to additional terms and conditions governing the use of their feeds, commentaries and content. If You do not accept the relevant third party terms and conditions, You agree to not use the relevant feeds, commentaries or content.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->18.2 Stake does not accept any liability in respect of any third party feeds, commentaries and content.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->18.3 Where the Website contains links to third party websites and resources, these links are provided for Your information only. Stake has no control over the content of these sites or resources, and accepts no liability for them or for any loss or damage that may arise from Your use of them. The inclusion of a link to a third party website does not constitute an endorsement of that third party’s website, product or services, if applicable.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="19._ERRORS">19. ERRORS</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->19.1 Stake will not be liable in the event You try to or obtain an advantage from any errors in respect of bets or wagers on the Website if You were deliberately acting in bad-faith, including where: (i) there is an obvious error in the relevant odds, spreads, handicap, totals, cash-out; (ii) Stake continues to accept bets or wagers on closed or suspended markets; (iii) Stake incorrectly calculates or pays a settlement amount, including where a bet is Cashed Out for the full settlement amount, or a bet is made void incorrectly, where ‘Void if player does not start’ was selected at bet placement; or (iv) any error occurs in a random number generator or pay tables included, incorporated or used in any game or product.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="20._BREACH">20. BREACH</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->20.1 Without prejudice to any other rights, if a User breaches in whole or in part any provision contained herein, Stake reserves the right to take such action as it sees fit, including terminating this Agreement or any other agreement in place with the User and/or taking legal action against such User.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->20.2 You agree to fully indemnify, defend and hold harmless Stake and its shareholders, directors, agents and employees from and against all claims, demands, liabilities, damages, losses, costs and expenses, including legal fees and any other charges whatsoever, howsoever caused, that may arise as a result of:</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->a) your breach of this Agreement, in whole or in part;</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->b) violation by you of any law or any third party rights; and</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->c) use by you of the Service.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="21._LIMITATIONS_AND_LIABILITY">21. LIMITATIONS AND LIABILITY</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->21.1 Under no circumstances, including negligence, shall Stake be liable for any special, incidental, direct, indirect or consequential damages whatsoever (including, without limitation, damages for loss of business profits, business interruption, loss of business information, or any other pecuniary loss) arising out of the use (or misuse) of the Service even if Stake had prior knowledge of the possibility of such damages.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->21.2 Nothing in this Agreement shall exclude or limit Stake's liability for death or personal injury resulting from its negligence.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="22._INTELLECTUAL_PROPERTY">22. INTELLECTUAL PROPERTY</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->22.1 Stake and its licensors are the sole holders of all rights in and to the Service and code, structure and organisation, including copyright, trade secrets, intellectual property and other rights. You may not, within the limits prescribed by applicable laws: (a) copy, distribute, publish, reverse engineer, decompile, disassemble, modify, or translate the website; or (b) use the Service in a manner prohibited by applicable laws or regulations (each of the above is an "Unauthorised Use"). Stake reserves any and all rights implied or otherwise, which are not expressly granted to the User hereunder and retain all rights, title and interest in and to the Service. You agree that you will be solely liable for any damage, costs or expenses arising out of or in connection with the commission by you of any Unauthorized Use. You shall notify Stake immediately upon becoming aware of the commission by any person of any Unauthorised Use and shall provide Stake with reasonable assistance with any investigations it conducts in light of the information provided by you in this respect.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->22.2 The term "Stake", its domain names and any other trade marks, or service marks used by Stake as part of the Service (the "Trade Marks"), are solely owned by Stake. In addition, all content on the website, including, but not limited to, the images, pictures, graphics, photographs, animations, videos, music, audio and text (the "Site Content") belongs to Stake and is protected by copyright and/or other intellectual property or other rights. You hereby acknowledge that by using the Service, you obtain no rights in the Site Content and/or the Trade Marks, or any part thereof. Under no circumstances may you use the Site Content and/or the Trade Marks without Stake's prior written consent. Additionally, you agree not to do anything that will harm or potentially harm the rights, including the intellectual property rights of Stake.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="23._DISPUTES">23. DISPUTES</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->23.1 If a User wishes to make a complaint, please contact Stake's customer service team at </span><!----><!----><a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration:none] hover:[text-decoration:none] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:text-white focus-visible:outline-hidden var(--ds-font-size-sm) inline-flex gap-1 items-center" href="mailto:support@stake.com" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="" target="_blank" rel="external noreferrer noopener" external="true"><!----><!----><!----><span type="body" tag="span" size="md" class="ds-body-md" data-ds-text="true"><!---->support@stake.com</span><!----> <svg data-ds-icon="External" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                                            <path fill="currentColor" d="M20 13.4c-.55 0-1 .45-1 1v4c0 .33-.27.6-.6.6H5.6c-.33 0-.6-.27-.6-.6V5.6c0-.33.27-.6.6-.6h4.8c.55 0 1-.45 1-1s-.45-1-1-1H5.6C4.17 3 3 4.17 3 5.6v12.8C3 19.83 4.17 21 5.6 21h12.8c1.43 0 2.6-1.17 2.6-2.6v-4c0-.55-.45-1-1-1"></path>
                                            <path fill="currentColor" d="M14.4 3c-.55 0-1 .45-1 1s.45 1 1 1h3.19L8.1 14.49a.996.996 0 0 0 .71 1.7c.26 0 .51-.1.71-.29l9.49-9.49V9.6c0 .55.45 1 1 1s1-.45 1-1V4c0-.55-.45-1-1-1z"></path>
                                        </svg><!----><!----></a><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->. Should any dispute not be resolved to your satisfaction you may pursue remedies in the governing law jurisdiction set forth below.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="24._AMENDMENT">24. AMENDMENT</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->24.1 Stake reserves the right to update or modify this Agreement or any part thereof at any time or otherwise change the Service without notice and you will be bound by such amended Agreement upon posting. Therefore, we encourage you check the terms and conditions contained in the version of the Agreement in force at such time. Your continued use of the Service shall be deemed to attest to your agreement to any amendments to the Agreement.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="25._GOVERNING_LAW">25. GOVERNING LAW</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->25.1 The Agreement and any matters relating hereto shall be governed by, and construed in accordance with, the laws of Curaçao. You irrevocably agree that, subject as provided below, the courts of Curaçao shall have exclusive jurisdiction in relation to any claim, dispute or difference concerning the Agreement and any matter arising therefrom and irrevocably waive any right that it may have to object to an action being brought in those courts, or to claim that the action has been brought in an inconvenient forum, or that those courts do not have jurisdiction. Nothing in this clause shall limit the right of Stake to take proceedings against you in any other court of competent jurisdiction, nor shall the taking of proceedings in any one or more jurisdictions preclude the taking of proceedings in any other jurisdictions, whether concurrently or not, to the extent permitted by the law of such other jurisdiction.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="26._SEVERABILITY">26. SEVERABILITY</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->26.1 If a provision of this Agreement is or becomes illegal, invalid or unenforceable in any jurisdiction, that shall not affect the validity or enforceability in that jurisdiction of any other provision hereof or the validity or enforceability in other jurisdictions of that or any other provision hereof.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="27._ASSIGNMENT">27. ASSIGNMENT</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->27.1 Stake reserves the right to assign this agreement, in whole or in part, at any time without notice. The User may not assign any of his/her rights or obligations under this Agreement.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="28._MISCELLANEOUS">28. MISCELLANEOUS</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->28.1 No waiver by Stake of any breach of any provision of this Agreement (including the failure of Stake to require strict and literal performance of or compliance with any provision of this Agreement) shall in any way be construed as a waiver of any subsequent breach of such provision or of any breach of any other provision of this Agreement.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->28.2 Nothing in this Agreement shall create or confer any rights or other benefits in favour of any third parties not party to this Agreement.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->28.3 Nothing in this Agreement shall create or be deemed to create a partnership, agency, trust arrangement, fiduciary relationship or joint venture between you and Stake.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->28.4 Stake may assign, transfer, charge, sub-license, or deal in any other manner with this Agreement, or sub-contract any of its rights and obligations under this Agreement, to any other party.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->28.5 This Agreement constitutes the entire understanding and agreement between you and Stake regarding the Service and supersedes any prior agreement, understanding, or arrangement between you and Stake.</span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!----></span></p><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <h3 type="heading" tag="h3" size="md" variant="neutral-default" class="text-neutral-default ds-heading-md" data-ds-text="true"><!----><!----><!----><span id="29._COMPLAINTS">29. COMPLAINTS</span></h3><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
                                <p type="body" tag="p" size="md" class="ds-body-md inline-text" data-ds-text="true"><!----><!----><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->29.1 If you have a complaint to make regarding our services, you may contact our customer support via Live Chat or by email (</span><!----><!----><a class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] relative justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] [text-decoration:none] hover:[text-decoration:none] bg-transparent text-grey-200 hover:bg-transparent hover:text-white focus-visible:text-white focus-visible:outline-hidden var(--ds-font-size-sm) inline-flex gap-1 items-center" href="mailto:support@stake.com" data-sveltekit-reload="off" data-sveltekit-preload-data="off" data-sveltekit-noscroll="" target="_blank" rel="external noreferrer noopener" external="true"><!----><!----><!----><span type="body" tag="span" size="md" class="ds-body-md" data-ds-text="true"><!---->support@stake.com</span><!----> <svg data-ds-icon="External" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" class="inline-block shrink-0"><!---->
                                            <path fill="currentColor" d="M20 13.4c-.55 0-1 .45-1 1v4c0 .33-.27.6-.6.6H5.6c-.33 0-.6-.27-.6-.6V5.6c0-.33.27-.6.6-.6h4.8c.55 0 1-.45 1-1s-.45-1-1-1H5.6C4.17 3 3 4.17 3 5.6v12.8C3 19.83 4.17 21 5.6 21h12.8c1.43 0 2.6-1.17 2.6-2.6v-4c0-.55-.45-1-1-1"></path>
                                            <path fill="currentColor" d="M14.4 3c-.55 0-1 .45-1 1s.45 1 1 1h3.19L8.1 14.49a.996.996 0 0 0 .71 1.7c.26 0 .51-.1.71-.29l9.49-9.49V9.6c0 .55.45 1 1 1s1-.45 1-1V4c0-.55-.45-1-1-1z"></path>
                                        </svg><!----><!----></a><!----><!----><!----><span type="body" size="md" tag="span" strong="false" class="ds-body-md" data-ds-text="true"><!---->). We will endeavour to resolve the matter promptly.</span></p>
                            </div><!---->
                        </div>
                    </div><!----> <!---->
                    <div class="text-left w-full">
                        <div><!----><label type="body" tag="label" size="md" data-testid="accept-terms" class="ds-body-md inline-flex relative items-center flex-row-reverse" data-ds-text="true" style="flex-direction: row !important; cursor: pointer; align-items: flex-start;"><!----><!----><input type="checkbox" id="accept-terms-checkbox"   data-testid="accept-terms" class="svelte-2vtt3n"> <span class="indicator variant-default svelte-2vtt3n"></span> <span class="ml-2 flex svelte-1rbhysu full-width"><!----><!----><span type="body" tag="span" size="sm" strong="true" slot="label" class="ds-body-sm-strong" data-ds-text="true"><!----><!----><!----><span tag="span" type="body" size="sm" strong="true" class="ds-body-sm-strong text-left flex pt-0.5" data-ds-text="true"><!---->I have read and agree to the terms and conditions</span></span><!----> <!----><!----></span><!----></label><!----> <!----></div><!---->
                    </div><!----><!---->
                    <div class="flex flex-col justify-end h-full"><!----><!----><button id="register-terms-submit-button" type="submit" tabindex="0" class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] inline-flex relative items-center gap-2 justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] bg-blue-500 text-white hover:bg-blue-600 hover:text-white focus-visible:outline-white var(--ds-font-size-md) shadow-md py-[0.875rem] px-[1.75rem] min-w-[12ch] w-full" disabled="" data-testid="submit-terms" data-analytics="register-terms-submit-button" id="register-terms-submit-button" data-button-root=""><!----><!----><!----><!---->
                            <div data-loader-content="true" class="contents"><!----><!----><span type="body" tag="span" size="md" strong="true" class="ds-body-md-strong" data-ds-text="true"><!----><!---->Create an Account</span><!----></div>
                        </button><!----></div><!---->
                </form>
               <div class="flex flex-col justify-end gap-3 " data-content=""><!----><span tag="span" type="body" size="md" class="ds-body-md text-center" data-ds-text="true"><!---->Already have an account? <!----><!----><button type="button" onClick="showLogin()" tabindex="0" class="[font-family:var(--ds-font-family-default)] [font-variant-numeric:var(--ds-font-variant-numeric,lining-nums_tabular-nums)] [font-feature-settings:var(--ds-font-feature-settings,&quot;salt&quot;_on)] inline-flex relative items-center gap-2 justify-center rounded-(--ds-radius-md) [font-weight:var(--ds-font-weight-thick)] whitespace-nowrap ring-offset-background transition disabled:pointer-events-none disabled:opacity-50 focus-visible:outline-2 focus-visible:outline-offset-2 active:scale-[0.98] bg-transparent text-white hover:bg-transparent hover:text-white focus-visible:outline-hidden var(--ds-font-size-sm) [&amp;_svg]:text-grey-200 [&amp;:hover&gt;svg]:text-white" data-button-root="" ><!----><!---->Sign in</button><!----></span><!----></div>
            </div>

        </div>
    </div>
</div>

<script>
    // Получаем элементы
    const checkbox = document.getElementById('accept-terms-checkbox');
    const submitButton = document.getElementById('register-terms-submit-button');

    // Функция для обновления состояния кнопки
    function updateButtonState() {
        if (checkbox.checked) {
            submitButton.removeAttribute('disabled');  // Включаем кнопку
            submitButton.classList.remove('disabled:opacity-50', 'disabled:pointer-events-none');  // Убираем стили disabled, если нужно
        } else {
            submitButton.setAttribute('disabled', '');  // Отключаем кнопку
            submitButton.classList.add('disabled:opacity-50', 'disabled:pointer-events-none');  // Добавляем стили
        }
    }

    // Инициализация при загрузке
    document.addEventListener('DOMContentLoaded', updateButtonState);

    // Обработчик изменения чекбокса
    checkbox.addEventListener('change', updateButtonState);

    // Если форма submit, добавьте валидацию перед отправкой (опционально)
    const form = submitButton.closest('form');  // Если есть форма
    if (form) {
        form.addEventListener('submit', function(event) {
            if (!checkbox.checked) {
                event.preventDefault();  // Блокируем отправку, если не отмечен
                alert('Please accept the terms and conditions.');
            }
        });
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Select elements
        const allSteps = document.querySelectorAll('.allSteps-step');
        const stepText = document.querySelector('.countSteps-container span');
        const stepBackButton = document.querySelector('#stepBack');
        const confirmButton = document.querySelector('.button-modal-register');
        const continueButton = document.querySelector('.continue-button');
        const firstStepElements = document.querySelectorAll('.first-step');
        const secondStepElements = document.querySelectorAll('.second-step');
        const thirdStepElements = document.querySelectorAll('.third-step');

        // Function to update UI based on current step
        function updateStepUI(currentStep) {
            // Update step text
            stepText.textContent = `Step ${currentStep}/3`;

            // Show/hide stepBack button (hidden on step 1)
            stepBackButton.style.visibility = currentStep === 1 ? 'hidden' : 'visible';

            // Toggle visibility of step elements
            firstStepElements.forEach(el => {
                el.style.display = currentStep === 1 ? 'flex' : 'none';
            });
            secondStepElements.forEach(el => {
                el.style.display = currentStep === 2 ? 'flex' : 'none';
            });
            thirdStepElements.forEach(el => {
                el.style.display = currentStep === 3 ? 'flex' : 'none';
            });

            // Update active class on allSteps
            allSteps.forEach((step, index) => {
                step.classList.toggle('active', index < currentStep);
            });
        }

        // Function to get current step
        function getCurrentStep() {
            return document.querySelectorAll('.allSteps-step.active').length;
        }

        // Initial setup
        let currentStep = getCurrentStep();
        updateStepUI(currentStep);

        // Handle Confirm button click (move to next step + set lang cookie)
        confirmButton.addEventListener('click', () => {
            if (currentStep === 1) {
                // Get selected language
                const langSelect = document.querySelector('select[data-testid="select-language"]');
              


                currentStep = 2;
                updateStepUI(currentStep);
            }
        });

        // Handle Continue button click (validate fields + move to next step)
        continueButton.addEventListener('click', () => {
            if (currentStep === 2) {
                // Get fields
                const emailInput = document.querySelector('input[data-testid="register-email"]');
                const loginInput = document.querySelector('input[data-testid="register-name"]');
                const passInput = document.querySelector('input[data-testid="register-password"]');

                let valid = true;

                // Reset borders
                emailInput.style.border = '';
                loginInput.style.border = '';
                passInput.style.border = '';

                if (!emailInput.value.trim()) {
                    emailInput.style.border = '2px solid #8d1818';
                    toastr['error']('Write email');
                    valid = false;
                }
                if (!loginInput.value.trim()) {
                    loginInput.style.border = '2px solid #8d1818';
                    toastr['error']('Write login');
                    valid = false;
                }
                if (!passInput.value.trim()) {
                    passInput.style.border = '2px solid #8d1818';
                    toastr['error']('Write pass');
                    valid = false;
                }

                if (valid) {
                    currentStep = 3;
                    updateStepUI(currentStep);
                }
            }
        });

        // Handle stepBack button click (move to previous step)
        stepBackButton.addEventListener('click', () => {
            if (currentStep === 2 || currentStep === 3) {
                currentStep = currentStep - 1;
                updateStepUI(currentStep);
            }
        });

        // Handle third step form submit (registration AJAX)
        const thirdForm = document.querySelector('form.third-step');
        thirdForm.addEventListener('submit', (e) => {
            e.preventDefault();

            // Get values
            const email = document.querySelector('input[data-testid="register-email"]').value.trim();
            const login = document.querySelector('input[data-testid="register-name"]').value.trim();
            const pass = document.querySelector('input[data-testid="register-password"]').value.trim();

            // Perform AJAX registration
            $.ajax({
                type: 'POST',
                url: 'http://5.129.253.12:2202/auth/auth.php',
                data: {
                    type: 'reg',
                    email: email,
                    login: login,
                    pass: pass,
                },
                success: function(data) {
                    if (data.response == "success") {
                        toastr['success']('Success!');
                        window.location.reload();
                    } else {
                        return toastr['error'](data.message);
                    }
                }
            });
        });

        // Existing checkbox logic for referral and phone inputs
        const referralCheckbox = document.getElementById('referralCheckbox');
        const referralInputDiv = document.querySelector('.hidden-input');
        referralCheckbox.addEventListener('change', () => {
            referralInputDiv.style.display = referralCheckbox.checked ? 'block' : 'none';
        });

        const phoneCheckbox = document.getElementById('phoneCheckbox');
        const phoneInput = document.querySelector('.phone-input');
        const phoneDisclaimer = document.querySelector('.phone-disclaimer');
        phoneCheckbox.addEventListener('change', () => {
            const isChecked = phoneCheckbox.checked;
            phoneInput.style.display = isChecked ? 'flex' : 'none';
            phoneDisclaimer.style.display = isChecked ? 'flex' : 'none';
        });
    });
</script>

<script>
    function showLogin() {
        $('#registration').addClass('hide-modal')
        $('#authorization').removeClass('hide-modal');
    }

    function reglogpass() {
        if ($('#signupemail').val() == '') {
            $('#signupemail').css('border', '2px solid #8d1818');
            return toastr['error']('Write email')
        }
        if ($('#signupLogin').val() == '') {
            $('#signupLogin').css('border', '2px solid #8d1818');
            return toastr['error']('Write login')
        }
        if ($('#signupPass').val() == '') {
            $('#signupPass').css('border', '2px solid #8d1818');
            return toastr['error']('Write pass')
        }

        $.ajax({
            type: 'POST',
            url:  'http://5.129.253.12:2202/auth/auth.php',
            data: {
                type: 'reg',
                email: $('#signupemail').val(),
                login: $('#signupLogin').val(),
                pass: $('#signupPass').val(),
            },
            success: function(data) {
                //var obj = jQuery.parseJSON(data);
                //console.log(data)
                if (data.response == "success") {
                    toastr['success']('Success!');
                    window.location.reload();
                } else {
                    return toastr['error'](data.message);
                }
            }
        });
    }
</script>



<div class="modal fade" id="recaptchaPromocode" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dice_sidebar-header">
                    <div class="icon-gradient"><i class="fa fa-tasks" aria-hidden="true"></i></div>
                    <p style="color: #fff;margin-bottom: 0px;margin-left: 10px;"><?= $translations['confirm_action'] ?></p>
                </div>
                <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>
            </div>
            <hr>
            <div class="modal-body">
                <div style="justify-content: center;display: flex;margin-top: -30px;" id="promo_captcha" data-callback="hidecp"></div>

                <script>
                    function hidecp() {
                        $('#recaptchaPromocode').modal('hide');
                    }
                </script>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="recaptchaPayout" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dice_sidebar-header">
                    <div class="icon-gradient"><i class="fa fa-tasks" aria-hidden="true"></i></div>
                    <p style="color: #fff;margin-bottom: 0px;margin-left: 10px;"><?= $translations['confirm_action'] ?></p>
                </div>
                <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>
            </div>
            <hr>
            <div class="modal-body">
                <div style="justify-content: center;display: flex;margin-top: -30px;" id="payout_captcha" data-callback="hidecp2"></div>

                <script>
                    function hidecp2() {
                        $('#recaptchaPayout').modal('hide');
                    }
                </script>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="checkFair" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

                <div class="dice_sidebar-header">
                    <div class="icon-gradient"><i class="fa fa-gamepad" aria-hidden="true"></i></div>
                    <p style="color: #fff;margin-bottom: 0px;margin-left: 10px;"><?= $translations['view_game'] ?> #<span id="fairGameId">...</span></p>
                </div>
                <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>
            </div>
            <div class="modal-body">

                <div id="loadFair" class="loader"></div>

                <div id="fairContent" style="display:none;">
                    <div class="fair-page">

                        <div class="mainInfo">
                            <div class="content">
                                <div class="fairness">
                                    <span><?= $translations['status'] ?></span>
                                    <div class="status"><i class="fa fa-check"></i> <?= $translations['round_over'] ?></div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="fairness">
                                    <span><?= $translations['bet_id'] ?></span>
                                    <h3 id="fairGameId2">...</3>
                                </div>
                            </div>
                            <div class="content">
                                <div class="fairness">
                                    <span><?= $translations['bet'] ?></span>
                                    <h3 id="fairBet">... </h3>
                                </div>
                            </div>
                            <div class="content">
                                <div class="fairness">
                                    <span><?= $translations['coefficient'] ?></span>
                                    <div id="fairCoefBox" class="status"><span id="fairCoef">...</span></div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="fairness">
                                    <span><?= $translations['result'] ?></span>
                                    <h3 style="font-weight:bold;" id="fairResult">...</3>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<style>
    .modalBonusInfo {
        display: grid;
        gap: 10px;
    }

    .modalBonusInfo span {
        color: var(--main-color-hight);
    }
</style>
<!-- Информация о активном бонусе -->
<div class="modal fade" id="infoBonus" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dice_sidebar-header">
                    <div class="icon-gradient"><i class="fa fa-info-circle" aria-hidden="true"></i></div>
                    <p style="color: #fff;margin-bottom: 0px;margin-left: 10px;"><?= $translations['bonus_information'] ?></p>
                </div>
                <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>
            </div>
            <div class="modal-body">

                <div class="modalBonusInfo">
                    <span>1. <?= $translations['bonus'] ?>: <b><?= $translations['promo_code'] ?></b></span>
                    <span>2. <?= $translations['wager'] ?>: <b>x<?= $coefpromo ?></b></span>
                    <span>3. <?= $translations['maximum_amount_after_wagering'] ?>: <b><?= $translations['unlimited'] ?></b></span>
                    <span>4. <?= $translations['time_to_play_back'] ?>: <b><?= $translations['unlimited'] ?></b></span>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="infoRakeback" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dice_sidebar-header">
                    <div class="icon-gradient"><i class="fa fa-info-circle" aria-hidden="true"></i></div>
                    <p style="color: #fff;margin-bottom: 0px;margin-left: 10px;"><?= $translations['information_about_rakeback'] ?></p>
                </div>
                <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>
            </div>
            <div class="modal-body">
                <div class="modalBonusInfo">
                    <span><?= $translations['return'] ?> <b><?= $rakeback_rank ?>%</b> <?= $translations['from_the_casinos_advantage_on_every_bet_you_make'] ?></span>
                    <span><?= $translations['rakeback_can_be_received_from_any_level'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="infoCashback" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dice_sidebar-header">
                    <div class="icon-gradient"><i class="fa fa-info-circle" aria-hidden="true"></i></div>
                    <p style="color: #fff;margin-bottom: 0px;margin-left: 10px;"><?= $translations['information_about_cashback'] ?></p>
                </div>
                <button class="closemodalBtn" type="button" data-dismiss="modal" aria-label="Close"><img src="../images/modal/close.svg"></button>
            </div>
            <div class="modal-body">
                <div class="modalBonusInfo">
                    <span><?= $translations['return'] ?> <b><?= $cashback_rankt ?>%</b> <?= $translations['from_the_funds_spent_per_month'] ?></span>
                    <span><?= $translations['cashback_can_be_received_from_the_silver_rank'] ?></span>
                    <span><?= $translations['cashback_is_available_for_a_month'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>








<!-- interesting js -->
<script>
    function hidenLoader() {
        $('#loadFair').hide();
        $('#fairContent').show();
    }

    function loadingFair() {
        setTimeout(hidenLoader, 500);
    }

    function showLoadedr() {
        $('#loadFair').show();
        $('#fairContent').hide();
    }
</script>

<script>
    var loginCaptcha;
    var promoCaptcha;
    var payoutCaptcha;

    function recaptchaCallback() {
        loginCaptcha = grecaptcha.render('login_captcha', {
            'sitekey': '<?= $grecaptcha ?>',
            'theme': 'dark'
        });
        promoCaptcha = grecaptcha.render('promo_captcha', {
            'sitekey': '<?= $grecaptcha ?>',
            'theme': 'dark'
        });
        payoutCaptcha = grecaptcha.render('payout_captcha', {
            'sitekey': '<?= $grecaptcha ?>',
            'theme': 'dark'
        });
    }
</script>

<script>
    function loginTg() {
        window.location.href = '/auth/tg/redirect';
    }
</script>