@include('includes.header')
    
    <div class="Polaris-Page">

    <div class="Polaris-Page__Content">
      <div class="Polaris-Layout">

      <form id="settings" method="get" class="form-horizontal" action="/enableDisable" enctype="multipart/form-data">
      {{ csrf_field() }}

        <div class="Polaris-Layout__AnnotatedSection">
          <div class="Polaris-Layout__AnnotationWrapper">
            <div class="Polaris-Layout__Annotation">
              <div class="Polaris-TextContainer">
                <h2 class="Polaris-Heading">Enable/Disable</h2>
                <p>Select an option to enable or disable app</p>
              </div>
            </div>
            <div class="Polaris-Layout__AnnotationContent">
              <div class="Polaris-Card">
                <div class="Polaris-Card__Section">

                <div class="ui-card__section">
                  <div class="ui-type-container">
                    <div class="next-input-wrapper">
                      <input value="1" class="next-radio" @if ($app_enable_settings === 1) checked="checked" @endif name="enable_disable" type="radio">
                      <label class="next-label next-label--switch" for="shop_auto_publish_true">Enabled</label>
                      <p class="next-input__help-text">This will show the shipping product option on store</p>
                    </div>
                    <div class="next-input-wrapper">
                      <input value="0" class="next-radio" @if ($app_enable_settings === 0) checked="checked" @endif name="enable_disable" type="radio">
                      <label class="next-label next-label--switch" for="shop_auto_publish_false">Disabled</label>
                      <p class="next-input__help-text">This will remove the shipping product option from store</p>
                    </div>
                  </div>
                </div>

                </div>
              </div>
            </div>
          </div>
        </div>

        <div style="display: none;">
            <button class="ui-button ui-button--primary js-btn-primary js-btn-loadable" type="submit" name="commit" id="save_settings_btn">Save</button>
        </div>

        <!-- <div class="Polaris-Layout__AnnotatedSection">
          <div class="Polaris-Layout__AnnotationWrapper">
            <div class="Polaris-Layout__Annotation">
              <div class="Polaris-TextContainer">
                <h2 class="Polaris-Heading">Add % of shipping insurance product</h2>
                <p>This is the %age of shipping insurance product for which app users will be charged</p>
              </div>
            </div>
            <div class="Polaris-Layout__AnnotationContent">
              <div class="Polaris-Card">
                <div class="Polaris-Card__Section">
                  <div class="ui-card__section">
                    <div class="ui-type-container">
                      <div class="next-input-wrapper">
                        <input id="usage_charge_percent" name="usage_charge_percent" class="Polaris-TextField__Input" aria-labelledby="TextField4Label" value="3" min="1" max="100" aria-invalid="false" type="number" required="required">
                        <label class="next-label next-label--switch" for="shop_auto_publish_true">%age</label>
                        <p class="next-input__help-text">What % of shipping insurance product will be charged for each order</p>
                      </div>
                    </div>
                  </div>

                  <div style="display: none;">
                    <button class="ui-button ui-button--primary js-btn-primary js-btn-loadable" type="submit" name="commit" id="save_settings_btn">Save</button>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div> -->
        </form>
        
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
        primary: { label: 'Save', callback: function(){ $('#save_settings_btn').click() } },
        secondary: [
        { label: "Install Instructions", href: "/install_instructions", target: 'app' },
        { label: "Product", href: "/index", target: 'app' },
        { label: "Settings", href: "/settings", target: 'app' }
      ]}
      
    });
  });

</script>