@include('includes.header')
  
    <div class="Polaris-Page">

    <div class="Polaris-Page__Content">

      <div class="Polaris-Layout">
        <div class="Polaris-Layout__AnnotationContent">
        <div class="Polaris-Card">
          <div class="Polaris-Card__Header">
            <h2 class="Polaris-Heading">Add shipping product on cart</h2>
          </div>
          <div class="Polaris-Card__Section">
            <div class="Polaris-Card__SectionHeader">
              <h3 aria-label="Reports" class="Polaris-Subheading">Please add this code on cart template</h3>
            </div>
            <p>This code snippet displays an option to buy shipping insurance or not</p>
          </div>
          <div class="Polaris-Card__Section">
            <div class="Polaris-Card__SectionHeader">
              <h3 aria-label="Summary" class="Polaris-Subheading">Copy the following code snippet to your clipboard:</h3>
            </div>
            <pre class="add-code"><code>class="{% if item.product.tags contains 'shipping-insurance' %} insurance_cart_remove insurance-product {% endif %}"</code></pre>
            <pre class="add-code"><code>{% if item.product.tags contains 'shipping-insurance' %} href="#" {% endif %}</code></pre>

            <p>
                If your theme is sectioned theme, paste the snippet in your <a target="_blank" href="https://kamini-esfera.myshopify.com/admin/themes/152410822?key=sections/cart-template.liquid">sections/cart-template.liquid</a> otherwise paste the snippet in your <a target="_blank" href="https://kamini-esfera.myshopify.com/admin/themes/152410822?key=templates/cart.liquid">templates/cart.liquid</a> file where remove button is added to remove the product from store.Paste the snippets on remove button's &lt;a&gt; tag. Usually this is inside the cart items loop beside the quantity selector/product title. The code may look something like this:
            </p>
            <pre class="add-code"><code><strong>&lt;a {% if item.product.tags contains 'shipping-insurance' %} href="#" {% else %}href="/cart/change?line=&amp;quantity=0"{% endif %} class="{% if item.product.tags contains 'shipping-insurance' %} insurance_cart_remove insurance-product {% endif %}"&gt;Remove&lt;/a&gt;</strong></code></pre>

            <p>Once added, save your theme.</p>
            
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
        { label: "Install Instructions", href: "/install_instructions", target: 'app' },
        { label: "Product", href: "/index", target: 'app' },
        { label: "Settings", href: "/settings", target: 'app' }
      ]}
      
    });
  });

</script>