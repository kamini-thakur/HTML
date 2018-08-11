<?php
/*
Template Name: Bit Coin faucets template
*/

get_header();
?>

<?php

require_once('includes/config.php');
require_once('includes/class/main.class.php');


$main = New Main();
$faucets = json_decode($main->jsonCache('30000', 'faucets'), 2);

?>
<div class="micro-hero">
   <div class="container">
      <h1>Earn free cryptocurrency</h1>
      <p>We list the top faucets for BTC, LTC, DOGE and more </p>
   </div>
</div>
<div class="container content faucets_tab">
  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-tabs">
      <li role="presentation" <?php echo (!isset($_GET['coin'])) ? 'class="active"' : ''; ?>><a href="<?php echo site_url(); ?>/buy-crypto/buy-bitcoin/faucets/">All Faucets <span class="badge"><?php echo number_format(count($faucets)); ?></span></a></li>
      <li role="presentation" <?php echo (isset($_GET['coin']) && $_GET['coin'] == 'BTC') ? 'class="active"' : ''; ?>><a href="<?php echo site_url(); ?>/buy-crypto/buy-bitcoin/faucets/?coin=BTC">BTC</a></li>
      <li role="presentation" <?php echo (isset($_GET['coin']) && $_GET['coin'] == 'LTC') ? 'class="active"' : ''; ?>><a href="<?php echo site_url(); ?>/buy-crypto/buy-bitcoin/faucets/?coin=LTC">LTC</a></li>
      <li role="presentation" <?php echo (isset($_GET['coin']) && $_GET['coin'] == 'DOGE') ? 'class="active"' : ''; ?>><a href="<?php echo site_url(); ?>/buy-crypto/buy-bitcoin/faucets/?coin=DOGE">DOGE</a></li>
      <li role="presentation" <?php echo (isset($_GET['coin']) && $_GET['coin'] == 'BLK') ? 'class="active"' : ''; ?>><a href="<?php echo site_url(); ?>/buy-crypto/buy-bitcoin/faucets/?coin=BLK">BLK</a></li>
      <li role="presentation" <?php echo (isset($_GET['coin']) && $_GET['coin'] == 'DASH') ? 'class="active"' : ''; ?>><a href="<?php echo site_url(); ?>/buy-crypto/buy-bitcoin/faucets/?coin=DASH">DASH</a></li>
      <li role="presentation" <?php echo (isset($_GET['coin']) && $_GET['coin'] == 'PPC') ? 'class="active"' : ''; ?>><a href="<?php echo site_url(); ?>/buy-crypto/buy-bitcoin/faucets/?coin=PPC">PPC</a></li>
      <li role="presentation" <?php echo (isset($_GET['coin']) && $_GET['coin'] == 'XPM') ? 'class="active"' : ''; ?>><a href="<?php echo site_url(); ?>/buy-crypto/buy-bitcoin/faucets/?coin=XPM">XPM</a></li>
      <li role="presentation" <?php echo (isset($_GET['coin']) && $_GET['coin'] == 'BCH') ? 'class="active"' : ''; ?>><a href="<?php echo site_url(); ?>/buy-crypto/buy-bitcoin/faucets/?coin=BCH">BCH</a></li>
    </ul>
<table class="table table-striped">
<thead> <tr> <th>Faucet Name</th> <th>Currency</th> <th>Reward</th> <th>Visit Faucet</th></tr> </thead>
<tbody>
<?php
if(isset($_GET['coin'])) {
  foreach($faucets as $faucet) {
    if($faucet['currency'] == $_GET['coin']) {
    echo '<tr class="srow"><td><strong><a href="https://faucetlist.me/go/' . $faucet['id'] . '/' . $ref[$faucet['currency']] . '" target="_blank">' . $faucet['name'] . '</a></strong></td><td>' . $faucet['currency'] . '</td><td>' . $faucet['reward'] . '</td><td><a href="https://faucetlist.me/go/' . $faucet['id'] . '/' . $ref[$faucet['currency']] . '" target="_blank" class="btn btn-xs btn-green btn-block">Visit</a></td>';
  }
}
} else {
  foreach($faucets as $faucet) {
    echo '<tr class="srow"><td><strong class="name"><a href="https://faucetlist.me/go/' . $faucet['id'] . '/' . $ref[$faucet['currency']] . '" target="_blank">' . $faucet['name'] . '</a></strong></td><td>' . $faucet['currency'] . '</td><td>' . $faucet['reward'] . '</td><td><a href="https://faucetlist.me/go/' . $faucet['id'] . '/' . $ref[$faucet['currency']] . '" target="_blank" class="btn btn-xs btn-green btn-block">Visit</a></td>';
  }
}
?>
</tbody>
</table>
</div>

</div>
</div>

<?php get_footer(); ?>

<div class="float-widget">
  <a href="<?php echo site_url(); ?>/buy-crypto/buy-bitcoin/faucets/" class="btn btn-green btn-lg btn-round"><i class="fa fa-btc" aria-hidden="true"></i> Free Bitcoin</a>
</div>
