<script src="/js/app.js"></script>
<script src="https://cdn.shopify.com/s/assets/external/app.js"></script>

<script type="text/javascript">
    ShopifyApp.init({
      apiKey: "{{Config::get('shopify.key')}}",
      shopOrigin:"https://{{ Session::get('shop') }}",

      debug: true
    });
</script>

<script>

$(function () {

    window.AJAXSubmit = function (formElement) {

          console.log("starting AJAXSubmit");
          var xhr = new XMLHttpRequest();
          var formData = new FormData();
          var file = $('input[type=file]')[0].files[0];
          var filename = file.name;
          var filesize = file.size;

          var maxFilesize = '1048576';
          if (filesize > maxFilesize)
          {
             var errorMsg = "Please upload images only";
             $('.message').removeClass('successMsg').addClass('errorMsg');
             $('.message').text(errorMsg);
          }
          else
          {
            var csrsToken = $('input[name=_token]').val();
            // alert(file);
            var progressBar = document.getElementById("showProgress");
            
            var display = document.getElementById("percentage-loader_1");
            
            formData.append('file', file);
            formData.append('_token', csrsToken);
            console.log(formData);
            xhr.open("post", "/uploadImage");

            xhr.upload.onprogress = function(e) {
              if (e.lengthComputable) {
                progressBar.max = e.total;
                progressBar.value = e.loaded;
                display.innerText = Math.floor((e.loaded / e.total) * 100) + '%';
              }
            }
            xhr.upload.onloadstart = function(e) {
              progressBar.value = 0;
              display.innerText = '0%';
            }
            xhr.upload.onloadend = function(e) {
              progressBar.value = e.loaded;
              $('#progress .progress-bar').css('width','0%');
            }

            xhr.send(formData);

            xhr.onreadystatechange = function() {
              if (xhr.readyState == 4)
              {         //statusDisplay.innerHTML = '';
                    if(xhr.status == 200) {
                        var successMsg = "Image uploaded successfully";
                        $('.message').removeClass('errorMsg').addClass('successMsg');
                        $('.message').text(successMsg);
                        
                        var response= xhr.responseText;
                        var imageName = response.split('/');

                        $('.close').trigger('click');
                        $('.message').text('');

                        $('.fileAdded').show();
                        $('.fileAdded').attr('src','https://shipping-insurance.ecommvantage.com/images/'+imageName[1]);
                        $('.imageFile').val('https://shipping-insurance.ecommvantage.com/images/'+imageName[1]);
                        
                        $('.showUpload').val('');
                        $('#showProgress').val('0');
                        document.getElementById("percentage-loader_1").innerHTML = '0%';
                        // $('#fileupload').val('');
                    }
              }
            }
          }
  }

  $(document).on('click','#save_settings_btn',function(e){ 
        e.preventDefault();
        var enable_disable = $("input[name='enable_disable']:checked").val();
        $.ajax({
            type: "get",
            url: "/enableDisable",
            data: {'Status': enable_disable }, 
        
            success:  function(response){
                ShopifyApp.flashNotice('Settings were successfully saved');
            },
            error: function(XMLHttpRequest) {
              var response = eval('(' + XMLHttpRequest.responseText + ')');
              response = response.description;
              console.log(response);
              ShopifyApp.flashError('An error occurred. Please try again');
            }
        });
  });

  // $(document).on('submit','#createProduct',function(e){ 
  //       var productPrice = $("#productPrice").val();
  //       var productPrice = productPrice.toFixed(2); $("#productPrice").val(productPrice);
  //       var productQua = $("#productQua").val();
  //       if(productQua >=  1000000000)
  //       {
  //         $("#productQua").css('border','1px solid red');
  //         return false;
  //       }
  //       else
  //       {
  //         return true;
  //       }
  // });


}); 

 </script>
