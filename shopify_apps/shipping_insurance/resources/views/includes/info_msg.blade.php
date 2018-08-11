<?php

$buy_shipping_html = '<div id="add-shipping-insurance" style="clear: left; margin: 30px 0" class="clearfix rte"><p><input type="hidden" name="attributes[shippingInsurance]" value="" /><input id="shippingInsurance" type="checkbox" name="attributes[shippingInsurance]" value="yes" {% if cart.attributes.shippingInsurance %} checked="checked"{% endif %} style="float: none" /><label for="shippingInsurance" style="display:inline; padding-left: 5px; float: none;">Buy shipping insurance.</label></p></div>';

?>
<div class="Polaris-Banner Polaris-Banner--statusInfo" tabindex="0" role="status" aria-live="polite" aria-labelledby="Banner2Heading" aria-describedby="Banner2Content">

  <div class="Polaris-Banner__Ribbon"><span class="Polaris-Icon Polaris-Icon--colorTealDark Polaris-Icon--hasBackdrop"><svg class="Polaris-Icon__Svg" viewBox="0 0 20 20"><g fill-rule="evenodd"><circle cx="10" cy="10" r="9" fill="currentColor"></circle><path d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.486 10-10S15.514 0 10 0m0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8m1-5v-3a1 1 0 0 0-1-1H9a1 1 0 1 0 0 2v3a1 1 0 0 0 1 1h1a1 1 0 1 0 0-2m-1-5.9a1.1 1.1 0 1 0 0-2.2 1.1 1.1 0 0 0 0 2.2"></path></g></svg></span></div>

  <div>

    <div class="Polaris-Banner__Heading" id="Banner2Heading">

      <p class="Polaris-Heading">Copy the following code snippet to your clipboard:</p>

    </div>

    <div class="Polaris-Banner__Content" id="Banner2Content">

      <p>{{ $buy_shipping_html }}</p>

    </div>

  </div>

</div>