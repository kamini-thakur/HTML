<?php
/*
Template Name: Bit Coin Listing
*/

?>

<?php

require_once('Bit-Coin/includes/config.php');
$link = 'https://localbitcoins.com/ad/' . $_GET['listing'] . '/?ch=' . $lbc['affiliate'];
header("Location: " . $link);

 ?>

