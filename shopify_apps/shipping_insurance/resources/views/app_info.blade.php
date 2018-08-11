@include('includes.header')

  <div class="Polaris-Page">
      
      <div class="Polaris-Banner Polaris-Banner--statusInfo" tabindex="0" role="status" aria-live="polite" aria-labelledby="Banner2Heading" aria-describedby="Banner2Content">

        <div class="Polaris-Banner__Ribbon"><span class="Polaris-Icon Polaris-Icon--colorTealDark Polaris-Icon--hasBackdrop"><svg class="Polaris-Icon__Svg" viewBox="0 0 20 20"><g fill-rule="evenodd"><circle cx="10" cy="10" r="9" fill="currentColor"></circle><path d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.486 10-10S15.514 0 10 0m0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8m1-5v-3a1 1 0 0 0-1-1H9a1 1 0 1 0 0 2v3a1 1 0 0 0 1 1h1a1 1 0 1 0 0-2m-1-5.9a1.1 1.1 0 1 0 0-2.2 1.1 1.1 0 0 0 0 2.2"></path></g></svg></span></div>

        <div>

          <div class="Polaris-Banner__Heading" id="Banner2Heading">

            <p class="Polaris-Heading">App Charges</p>

          </div>

          <div class="Polaris-Banner__Content" id="Banner2Content">

            <p>To proceed you need to approve charges first.</p>

            <div class="Polaris-Banner__Actions">

              <div class="Polaris-ButtonGroup">

                <div class="Polaris-ButtonGroup__Item"><a href="/createRecurring"><button type="button" class="Polaris-Button Polaris-Button--outline"><span class="Polaris-Button__Content"><span>Back</span></span></button></a></div>

              </div>

            </div>

          </div>

        </div>

      </div>

  </div>

</body>
</html>

@include('includes.footer')

<script type="text/javascript">

  ShopifyApp.ready(function(){

    ShopifyApp.Bar.initialize({
      icon: "https://productreviews.shopifycdn.com/assets/header-icon-efc8ebea08d2a56006a1b818e62c599279ac9d5d43533029474dcd32300f4c36.png",
      buttons: {
        secondary: [
        { label: "Product", href: "/index", target: 'app' },
        { label: "Settings", href: "/settings", target: 'app' }
      ]}
      
    });
  });

</script>