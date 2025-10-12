<?
require(dirname(__DIR__, 1) . "/system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
require(dirname(__DIR__, 1) . "/panels/header.php");
require(dirname(__DIR__, 1) . "/panels/sidebar.php");


$getDepsForLevel = "SELECT SUM(amount) FROM deposits WHERE hash_user='$sid' AND status ='1'";
$getDepsForLevel2 = mysqli_query($connection, $getDepsForLevel);
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
	$nextImage = '  <svg fill="none" viewBox="0 0 96 96" class="svg-icon" style="width: 1.25rem; height: 1.25rem;">
                                                            <title></title>
                                                            <path fill="purple" d="m48 14.595 8.49 15.75a13.68 13.68 0 0 0 9.66 7.08L84 40.635l-12.39 12.9a13.9 13.9 0 0 0-3.9 9.63q-.069.96 0 1.92l2.46 17.76-15.66-7.56a15 15 0 0 0-6.51-1.53 15 15 0 0 0-6.6 1.5l-15.57 7.53 2.46-17.76q.051-.93 0-1.86a13.9 13.9 0 0 0-3.9-9.63L12 40.635l17.64-3.21a13.62 13.62 0 0 0 9.84-7.02zm0-12.54a5.22 5.22 0 0 0-4.59 2.73l-11.4 21.45a5.4 5.4 0 0 1-3.66 2.67l-24 4.32A5.25 5.25 0 0 0 0 38.385a5.13 5.13 0 0 0 1.44 3.6l16.83 17.55a5.16 5.16 0 0 1 1.47 3.6q.024.435 0 .87l-3.27 24a3 3 0 0 0 0 .72 5.19 5.19 0 0 0 5.19 5.22h.18a5.1 5.1 0 0 0 2.16-.6l21.39-10.32a6.4 6.4 0 0 1 2.76-.63 6.2 6.2 0 0 1 2.79.66l21 10.32c.69.377 1.464.573 2.25.57h.21a5.22 5.22 0 0 0 5.19-5.19q.024-.375 0-.75l-3.27-24q-.025-.375 0-.75a5 5 0 0 1 1.47-3.57l16.77-17.7a5.19 5.19 0 0 0-2.82-8.7l-24-4.32a5.22 5.22 0 0 1-3.69-2.76l-11.4-21.45a5.22 5.22 0 0 0-4.65-2.7"></path>
                                                        </svg>';
	$cashback_rankt = '10'; /* 10% */
	$currentRank = "Legend";
	$nextRank = "Max";
	$progressMax = 500000;
}

?>


<link href="/css/ranks.css" rel="stylesheet">

<div class="main-container">
	<div class="rank-container">
		<div class="rank-inner ">
			<div class="rank-content">
				<span class="separator separator_big separator_mb"><span><?= $translations['ranks'] ?></span></span>
				<div class="rank-page">
					<div class="rank" id="rankStarter">
						<img src="/images/ranks/starter.png" />
						<span class="name"><?= $translations['starter'] ?></span>
						<hr class="mt-3" />
						<span class="description"><?= $translations['cashback'] ?><span class="badges">0%</span></span>
						<hr />
						<span class="description"><?= $translations['rakeback'] ?><span class="badges">0.1%</span></span>
						<hr />
						<span class="description"><?= $translations['bonus_birthday'] ?><span class="badges">0$</span></span>
						<hr />
						<span class="needDeposit"><?= $translations['none_deposits'] ?></span>
						<hr />
						<div class="progressWag">
							<progress class="wagerProgress" value="<?= round($depositesSID, 2); ?>" max="500"></progress>
							<span class="progres" id="StarterProgress"><?= round($depositesSID, 2); ?>/500</span>
							<i id="StarterOk" class="fa fa-check symbolOk"></i>
						</div>
					</div>
					<div class="rank" id="rankSilver">
						<img src="/images/ranks/silver.png" />
						<span class="name"><?= $translations['silver'] ?></span>
						<hr class="mt-3" />
						<span class="description"><?= $translations['cashback'] ?><span class="badges">3%</span></span>
						<hr />
						<span class="description"><?= $translations['rakeback'] ?><span class="badges">0.2%</span></span>
						<hr />
						<span class="description"><?= $translations['bonus_birthday'] ?><span class="badges">0$</span></span>
						<hr />
						<span class="needDeposit"><?= $translations['deposit_500$_all_time'] ?></span>
						<hr />
						<div class="progressWag">
							<progress class="wagerProgress" value="<?= round($depositesSID, 2); ?>" max="2500"></progress>
							<span class="progres" id="SilverProgress"><?= round($depositesSID, 2); ?>/2500</span>
							<i id="SilverOk" class="fa fa-check symbolOk"></i>
						</div>
					</div>
					<div class="rank" id="rankGold">
						<img src="/images/ranks/gold.png" />
						<span class="name"><?= $translations['gold'] ?></span>
						<hr class="mt-3" />
						<span class="description"><?= $translations['cashback'] ?><span class="badges">5%</span></span>
						<hr />
						<span class="description"><?= $translations['rakeback'] ?><span class="badges">0.3%</span></span>
						<hr />
						<span class="description"><?= $translations['bonus_birthday'] ?><span class="badges">5$</span></span>
						<hr />
						<span class="needDeposit"><?= $translations['deposit_2500$_all_time'] ?></span>
						<hr />
						<div class="progressWag">
							<progress class="wagerProgress" value="<?= round($depositesSID, 2); ?>" max="5000"></progress>
							<span class="progres" id="GoldProgress"><?= round($depositesSID, 2); ?>/5000</span>
							<i id="GoldOk" class="fa fa-check symbolOk"></i>
						</div>
					</div>
					<div class="rank" id="rankRuby">
						<img src="/images/ranks/ruby.png" />
						<span class="name"><?= $translations['ruby'] ?></span>
						<hr class="mt-3" />
						<span class="description"><?= $translations['cashback'] ?><span class="badges">7%</span></span>
						<hr />
						<span class="description"><?= $translations['rakeback'] ?><span class="badges">0.4%</span></span>
						<hr />
						<span class="description"><?= $translations['bonus_birthday'] ?><span class="badges">10$</span></span>
						<hr />
						<span class="needDeposit"><?= $translations['deposit_5000$_all_time'] ?></span>
						<hr />
						<div class="progressWag">
							<progress class="wagerProgress" value="<?= round($depositesSID, 2); ?>" max="10000"></progress>
							<span class="progres" id="RubyProgress"><?= round($depositesSID, 2); ?>/10000</span>
							<i id="RubyOk" class="fa fa-check symbolOk"></i>
						</div>
					</div>
					<div class="rank" id="rankLegend">
						<img src="/images/ranks/Legend.png" />
						<span class="name"><?= $translations['legend'] ?></span>
						<hr class="mt-3" />
						<span class="description"><?= $translations['cashback'] ?><span class="badges">10%</span></span>
						<hr />
						<span class="description"><?= $translations['rakeback'] ?><span class="badges">0.5%</span></span>
						<hr />
						<span class="description"><?= $translations['bonus_birthday'] ?><span class="badges">50$</span></span>
						<hr />
						<span class="needDeposit"><?= $translations['deposit_10000$_all_time'] ?></span>
						<hr />
						<div class="progressWag" id="topRank" style="display:none;">
							<progress class="wagerProgress" value="<?= round($depositesSID, 2); ?>" max="<?= round($depositesSID, 2); ?>"></progress>
							<span class="progres" id="LegendProgress"><?= round($depositesSID, 2); ?>/500000</span>
							<i id="LegendOk" class="fa fa-check symbolOk"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<?
require(dirname(__DIR__, 1) . "/panels/footer.php");
render_footer($translations,)
?>
<script>
	function loadTableRanks() {
		var userDeps = $('#hashdeps').val();

		if (userDeps >= 0) {
			$('#rankStarter').addClass(' active');
		}
		if (userDeps >= 500) {
			$('#rankSilver').addClass(' active');
			$('#rankStarter').css('opacity', '0.5');
			$('#rankStarter').removeClass('active');

			$('#StarterProgress').hide();
			$('#StarterOk').show();
		}
		if (userDeps >= 2500) {
			$('#rankGold').addClass(' active');
			$('#rankSilver').css('opacity', '0.5');
			$('#rankSilver').removeClass('active');

			$('#SilverProgress').hide();
			$('#SilverOk').show();
		}
		if (userDeps >= 5000) {
			$('#rankRuby').addClass(' active');
			$('#rankGold').css('opacity', '0.5');
			$('#rankGold').removeClass('active');

			$('#GoldProgress').hide();
			$('#GoldOk').show();
		}
		if (userDeps >= 10000) {
			$('#rankLegend').addClass(' active');
			$('#rankRuby').css('opacity', '0.5');
			$('#rankRuby').removeClass('active');

			$('#RubyProgress').hide();
			$('#RubyOk').show();
			$('#topRank').show();
			$('#LegendProgress').hide();
			$('#LegendOk').show();
		}

	};
	document.addEventListener("DOMContentLoaded", loadTableRanks);
</script>