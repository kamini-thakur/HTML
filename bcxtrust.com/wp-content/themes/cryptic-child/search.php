<?php

require_once('includes/config.php');
require_once('includes/class/main.class.php');
require_once('includes/templates/header.php');

$main = New Main();

$data = json_decode($main->request('https://localbitcoins.com/buy-bitcoins-online/' . $_POST['country']. '/' . strtolower(str_replace(" ", "-", $countries[$_POST['country']])) . '/' . strtolower(str_replace("_", "-", $_POST['payment'])) . '/.json'), 2)['data']['ad_list'];

if($data == '' || empty($data)) {
  $data =  json_decode($main->request('https://localbitcoins.com/buy-bitcoins-online/' . $_POST['country']. '/' . strtolower(str_replace(" ", "-", $countries[$_POST['country']])) . '/.json'), 2)['data']['ad_list'];
  $results = false;
} else {
  $results = true;
}

?>

<section id="recent">
<div class="container content">
  <?php if($results == false) {
    echo '<h2>No results were found, here are some other listings by sellers in  ' . $countries[$_POST['country']] . '</h2>';
  } else {
    echo '<h2>Sellers accepting ' . $methods[$_POST['payment']] . ' in ' . $countries[$_POST['country']] . '</h2>';
  }
  ?>
    <table class="table">
        <thead>
            <tr>
                <th>Seller</th>
                <th>Payment Method</th>
                <th>Price / BTC</th>
                <th>Buy Now</th>
            </tr>
        </thead>
        <tbody>
<?php
if(isset($data)) {
  foreach($data as $item) {
  echo '<tr><th>' . $item['data']['profile']['name'] . '</th><td>' . $payments[$item['data']['online_provider']] . '</td><th class="text-success">' . $item['data']['temp_price_usd'] . '</th><td><a href="' . $site_config['website_url'] . '/listing/' . $item['data']['ad_id'] . '" class="btn btn-green btn-xs btn-block" target="_blank">Buy now</a></td></tr>';
}
}
 ?>
 </tbody>
 </table>
</div>
</section>
<section id="products">
</section>

<?php
require_once('includes/templates/footer.php');
?>
<div class="float-widget">
  <a href="#" class="btn btn-green btn-lg btn-round"><i class="fa fa-btc" aria-hidden="true"></i> Free Bitcoin</a>
</div>
