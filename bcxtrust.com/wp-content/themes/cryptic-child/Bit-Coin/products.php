<?php
require_once('includes/config.php');
require_once('includes/class/main.class.php');
require_once('includes/templates/header.php');

$main = New Main();
$data = json_decode($main->jsonCache('3000', 'products'), 2)['collection'];
?>
<div class="micro-hero">
   <div class="container">
      <h1>Build a cryptocurrency website</h1>
      <p>Carefully curated list of popular cryptocurrency website scripts</p>
   </div>
</div>
<div class="container content">
  <div class="row">
<?php
foreach($data as $product) {
echo '<!-- Product-->
               <div class="col-md-4">
                  <a href="' . $product['url'] . '?ref=' . $envato['username'] . '" class="itemlink" target="_blank"><div class="item">
                      <div class="header">
                        <img src="' . $product['thumbnail'] . '">
                     </div>
                     <div class="content">
                       <h4>' . mb_strimwidth($product['item'], 0, 28, '...') . ' <span class="pull-right price">$' . $product['cost'] . '</span></h4>
                       <p>' . $product['item'] . '</p>
                     </div>
                  </div></a>
               </div>';
}
?>
</div>
</div>
<?php
require_once('includes/templates/footer.php');
?>
