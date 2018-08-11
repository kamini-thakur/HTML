@include('includes.header')

  <div class="Polaris-Page">

    @if (session('successMsg'))
      @include('includes.success_msg')
    @endif

    @if (session('errorMsg'))
      @include('includes.error_msg')
    @endif
    
    <form id="updateProduct" method="get" class="form-horizontal" action="/updateProduct" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="Polaris-FormLayout">

      <div class="Polaris-Layout__Annotation">
        <div class="Polaris-TextContainer">
          <h2 class="Polaris-Heading">Enter Shipping Insurance Product details below:</h2>
        </div>
      </div>

      <div role="group" class="">

      <div class="Polaris-FormLayout__Items">

      @foreach($productDetails as $key => $data)  

      <div class="Polaris-FormLayout__Item">
        <div class="">
          <div class="Polaris-Labelled__LabelWrapper">
            <div class="Polaris-Label"><label id="TextField3Label" for="TextField3" class="Polaris-Label__Text">Title</label></div>
          </div>
          <div class="Polaris-TextField"><input id="productTitle" value="{{ $data->productTitle }}" name="productTitle" class="Polaris-TextField__Input" aria-labelledby="TextField3Label" aria-invalid="false">
            <div class="Polaris-TextField__Backdrop"></div>
          </div>
        </div>
      </div> 

      <div class="Polaris-FormLayout__Item">
        <div class="">
          <div class="Polaris-Labelled__LabelWrapper">
            <div class="Polaris-Label"><label id="TextField4Label" for="TextField4" class="Polaris-Label__Text">Price</label></div>
          </div>
          <div class="Polaris-TextField"><input id="productPrice" value="{{ $data->productPrice }}" name="productPrice" class="Polaris-TextField__Input" aria-labelledby="TextField4Label" aria-invalid="false" pattern= "[0-9.]+{7}" type="text">
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
          <div class="Polaris-TextField"><input id="productQua" value="{{ $data->prodQuantity }}" name="productQua" class="Polaris-TextField__Input" aria-labelledby="TextField4Label" aria-invalid="false" min="1" max="1000000000" type="number">
            <div class="Polaris-TextField__Backdrop"></div>
          </div>
        </div>
      </div>
      <div class="Polaris-FormLayout__Item">
        <div class="">
          <div class="Polaris-Labelled__LabelWrapper">
            <div class="Polaris-Label"><label id="TextField4Label" for="TextField4" class="Polaris-Label__Text">SKU</label></div>
          </div>
          <div class="Polaris-TextField"><input id="productSku" value="{{ $data->productSKU }}" name="productSku" class="Polaris-TextField__Input" aria-labelledby="TextField4Label" aria-invalid="false" type="text">
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
          <div class="Polaris-productDesc">
            <textarea id="productDescription" name="productDescription" class="Polaris-TextField__Input" rows="4" cols="50" aria-labelledby="TextField4Label" aria-invalid="false" required="required">{{ $data->productDesc }}
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
                  <img class="Polaris-FileUpload__Image fileAdded" src="{{ $data->productImg }}" alt="">
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
          <span class="Polaris-VisuallyHidden"><input type="hidden" name="image" class="imageFile" value="{{ $data->productImg }}"></span>
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
                <input id="fileupload" onchange="AJAXSubmit(this); return false;" name="file" type="file" accept="image/*" >
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- popup ends here -->

      <div class="Polaris-FormLayout__Item">
        <div class="Polaris-Stack Polaris-Stack--spacingTight Polaris-Stack--distributionEqualSpacing">
          <div class="Polaris-Stack__Item"><button type="submit" class="Polaris-Button Polaris-Button--primary" name="UpdateProduct" id="UpdateProduct" value="Update"><span class="Polaris-Button__Content"><span>Update</span></span></button></div>
        </div>
      </div>
      @endforeach
      
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