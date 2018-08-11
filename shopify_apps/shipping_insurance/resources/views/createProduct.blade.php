@include('includes.header')

  <div class="Polaris-Page">

    @if (session('successMsg'))
      @include('includes.success_msg')
    @endif

    @if (session('errorMsg'))
      @include('includes.error_msg')
    @endif

    <form id="createProduct" method="get" class="form-horizontal" action="/createProduct" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="Polaris-FormLayout">
  
      <div class="Polaris-Layout__Annotation">
        <div class="Polaris-TextContainer">
          <h2 class="Polaris-Heading">Enter Shipping Insurance Product details below:</h2>
        </div>
      </div>

      <div role="group" class="">

      <div class="Polaris-FormLayout__Items">
      <div class="Polaris-FormLayout__Item">
        <div class="">
          <div class="Polaris-Labelled__LabelWrapper">
            <div class="Polaris-Label"><label id="TextField3Label" for="TextField3" class="Polaris-Label__Text">Title</label></div>
          </div>
          <div class="Polaris-TextField"><input id="productTitle" name="productTitle" class="Polaris-TextField__Input" value="Shipping Insurance" aria-labelledby="TextField3Label" aria-invalid="false" required="required">
            <div class="Polaris-TextField__Backdrop"></div>
          </div>
        </div>
      </div> 

      <div class="Polaris-FormLayout__Item">
        <div class="">
          <div class="Polaris-Labelled__LabelWrapper">
            <div class="Polaris-Label"><label id="TextField4Label" for="TextField4" class="Polaris-Label__Text">Price</label></div>
          </div>
          <div class="Polaris-TextField"><input id="productPrice" name="productPrice" class="Polaris-TextField__Input" value="3.99" aria-labelledby="TextField4Label" aria-invalid="false" type="text" pattern= "[0-9.]+{7}" required="required">
            <div class="Polaris-TextField__Backdrop"></div>
          </div>
        </div>
      </div>
      </div>
      <div class="Polaris-FormLayout__Items">
      <div class="Polaris-FormLayout__Item">
        <div class="">
          <div class="Polaris-Labelled__LabelWrapper">
            <div class="Polaris-Label"><label id="TextField4Label" for="TextField4" class="Polaris-Label__Text">Quantity</label></div>
          </div>
          <div class="Polaris-TextField"><input id="productQua" name="productQua" class="Polaris-TextField__Input" aria-labelledby="TextField4Label" value="999999999" aria-invalid="false" type="number" min="1" max="1000000000" required="required">
            <div class="Polaris-TextField__Backdrop"></div>
          </div>
        </div>
      </div>
      <div class="Polaris-FormLayout__Item">
        <div class="">
          <div class="Polaris-Labelled__LabelWrapper">
            <div class="Polaris-Label"><label id="TextField4Label" for="TextField4" class="Polaris-Label__Text">SKU</label></div>
          </div>
          <div class="Polaris-TextField"><input id="productSku" name="productSku" class="Polaris-TextField__Input" aria-labelledby="TextField4Label" value="SIPX01" aria-invalid="false" type="text" required="required">
            <div class="Polaris-TextField__Backdrop"></div>
          </div>
        </div>
      </div>
      </div>
      <div class="Polaris-FormLayout__Items">
      <div class="Polaris-FormLayout__Item">
        <div class="">
          <div class="Polaris-Labelled__LabelWrapper">
            <div class="Polaris-Label"><label id="TextField4Label" for="TextField4" class="Polaris-Label__Text">Description</label></div>
          </div>
          <div class="Polaris-productDesc"><textarea id="productDescription" name="productDescription" class="Polaris-TextField__Input" rows="4" cols="50" aria-labelledby="TextField4Label" aria-invalid="false" required="required">
          <h2>Insurance Terms &amp; Conditions</h2>
          <p>Please Note that we are not responsible for lost, stolen or damaged packages caused by the carrier.</p>
          <p>Due to an increase in packages getting lost or stolen, we are offering an optional extra layer of Security for you.</p>
          <p>If you do not remove the extra Insurance from your cart, you hereby agree to our Insurance Terms and Conditions. Your package will be insured with</p>
          <h4>Voyager Indemnity Insurance Company for up the total value of your invoice.</h4>
          <p>&nbsp;</p>
          <p>Please note that BY deleting this insurance product out of your cart you are risking A total loss of your shipment. We are Liable ONLY for shipping the package out AND cannot guarantee or replace any LOST, STOLEN or damaged Packages. By deleting this product out of your cart, you hereby agree to take FULL responsibility for your package once it has been picked up FROM our warehouse.</p>
          &nbsp;
          <h2>COVERAGE</h2>
          <p>Coverage provided by this program covers the parcel or freight and its contents from all risks of physical loss or damage from an external cause while in transit. All parcel or freight that are covered by this program will be shipped in strict accordance with all regulations of the Carrier.</p>
          <p>Note that if a parcel gets lost we can only reimburse products after a claim was made and proofed by the carrier!</p>
          <p>You acknowledge that the insurance coverage is provided by Voyager Indemnity Insurance Company. Voyager is a&nbsp;non-admitted insurer.</p>
          &nbsp;&nbsp;
          <h2>Limitations</h2>
          <p>This insurance covers up to $999.99 for USPS First Class Mail shipments, $1,000.00 for FedEx SmartPost, UPS Mail Innovations, and DHL Global Mail shipments, and $10,000.00 per package for other USPS, FedEx, UPS, and DHL shipments. Maximum coverage per conveyance is $100,000.00. The coverage is also limited to $5,000.00 for USPS Priority Mail International shipments (non- Priority Mail Express International). Mobile phones (cell phones, smart phones, etc) are limited to $5,000.00 of coverage per package and $25,000.00 per conveyance.</p>
          </textarea>
            
          </div>
        </div>
      </div>
      </div>
      <div class="Polaris-FormLayout__Items">
      <div class="Polaris-FormLayout__Item">
        <div class="Polaris-DropZone Polaris-DropZone--hasOutline Polaris-DropZone--sizeLarge">
          <div class="Polaris-DropZone__Container">
            <div class="Polaris-FileUpload">
              <div class="Polaris-Stack Polaris-Stack--vertical">
                <div class="Polaris-Stack__Item">
                  <img class="Polaris-FileUpload__Image fileAdded" src="https://shipping-insurance.ecommvantage.com/images/shipping-insurance.jpg" alt="shipping-insurance">
                </div>

                <div class="Polaris-Stack__Item">
                  <button type="button" class="Polaris-Button" data-toggle="modal" data-target="#myModal">
                    <span class="Polaris-Button__Content"><span>Add file</span></span>
                  </button>
                </div>

                <div class="Polaris-Stack__Item"><span class="Polaris-TextStyle--variationSubdued">or drop files to upload</span></div>

              </div>

            </div>
          </div>
          <span class="Polaris-VisuallyHidden"><input type="hidden" name="image" class="imageFile" value="https://shipping-insurance.ecommvantage.com/images/shipping-insurance.jpg"></span>
        </div>
      </div>
      </div>
      <!--   popup goes here -->
      <div id="myModal" class="modal fade popup-header" role="dialog" >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <p class="messages"></p>
            </div>
            <div class="modal-body">
              <span class="message"></span>
              <div id="progress" class="progress1">
                <progress id="showProgress" value="0"></progress>
              </div>
              <p id="percentage-loader_1">0 %</p>
            </div>
            <div class="modal-footer">
              <span id="upload_image_button" class="btn btn-success fileinput-button">
                <i class="glyphicon glyphicon-plus"></i>
                <span>Select Image</span>
                <input id="fileupload" onchange="AJAXSubmit(this); return false;" name="file" type="file" 
                accept="image/*" >
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- popup ends here -->

      <div class="Polaris-FormLayout__Item">
        <div class="Polaris-Stack Polaris-Stack--spacingTight Polaris-Stack--distributionEqualSpacing">
          <div class="Polaris-Stack__Item"><button type="submit" class="Polaris-Button Polaris-Button--primary" name="CreateProduct" id="CreateProduct" value="Save"><span class="Polaris-Button__Content"><span>Save</span></span></button></div>
        </div>
      </div>
    </div></div>
    </form>
  </div>

</body>
</html>

<script type="text/javascript">
     CKEDITOR.replace( 'productDescription' );
</script>

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
