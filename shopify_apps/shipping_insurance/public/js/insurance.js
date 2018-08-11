var loadScript = function(){

	function getCart(insuranceID)
	{ 	
		$.ajax({
		      url: '/cart.js',
		      dataType: 'json',
		      type: 'get',
		      success: cartResponse,
		      error: function(XMLHttpRequest) {
		        var response = eval('(' + XMLHttpRequest.responseText + ')');
		        response = response.description;
				console.log(response);
		      }
		});
	}
	function sendRequest(shopURL)
	{ 
	    $.ajax({
	        type: "GET",
	        url: "https://shipping-insurance.ecommvantage.com/getShippingInsurance",
	        data: { shopDomain: shopURL },
	        success: function(response) { 
	        	productData['variant_id'] = response;
	        	getCart(productData['variant_id']);
	        },
	        error: function(XMLHttpRequest) {
		        var response = eval('(' + XMLHttpRequest.responseText + ')');
			    response = response.description;
			    console.log(response);
			}
	    });	 
    }
    function cartResponse(cartData) 
    {
		productData['cartItemsLength'] = cartData.items.length;
		var insuranceID = productData['variant_id'];
		var line_items = cartData.items;
		productData['shipping_insurance_in_cart']=0;
		for (var i = 0; i < line_items.length; i++) {
		    var cartItemsID = line_items[i].variant_id;
		    if (cartItemsID == insuranceID)
		    { 
		    	productData['shipping_line_num'] = i+1;
		        productData['shipping_insurance_in_cart'] = line_items[i].quantity;
		        break;
		    }		 
		}  
   
		var cartItemsLength = productData['cartItemsLength']; 
		var shipping_insurance_in_cart = productData['shipping_insurance_in_cart'];

		var dialog_html = '<div id="dialog-confirm" title="Empty the recycle bin?" style="display:none;"><p>Please Note That By Deleting This Insurance Product Out Of Your Cart You Are Risking A Total Loss Of Your Shipment. We Are Liable Only For Shipping The Package Out And Can Not Guarantee Or Replace Any Lost, Stolen Or Damaged Packages. By Deleting This Product Out Of Your Cart, You Hereby Agree To Take Full Responsibility For Your Package Once It Has Been Picked Up From Our Warehouse .</p></div>';
		var html = '<link href="https://shipping-insurance.ecommvantage.com/css/custom.css" rel="stylesheet"><script src="//cdn.shopify.com/s/files/1/1250/9709/t/59/assets/jquery-ui.min.js?15427201625939967195" type="text/javascript"></script>';
		$('head').append(html);
		$('body').append(dialog_html);

		// alert('cartItemsLength='+cartItemsLength+" shipping_insurance_in_cart="+shipping_insurance_in_cart);
		
		// If we have nothing but shipping insurance item in the cart.
		if (cartItemsLength == 1 && shipping_insurance_in_cart > 0 ) {
			// alert('1st if');
			$(function() {
			  Shopify.Cart.ShippingInsurance.remove();
			});
		}
		// If we have items in cart, but not shipping insurance item in the cart.
	    else if ( ( cartItemsLength >= 1 ) && ( shipping_insurance_in_cart !== 1 ) ) {  	
	      	$(function() {
			  Shopify.Cart.ShippingInsurance.set();
			});
	    }
		// If we have more than one shipping insurance item in the cart.
		else if (shipping_insurance_in_cart > 1 ){
			// alert('3rd if');
			$(function() { 
			  Shopify.Cart.ShippingInsurance.set();
			});
		}
		
	    var insurance_variant = $("a[href$='?variant="+productData['variant_id']+"']");
	    $(insurance_variant).attr('href','');
	    if ($('[id^=updates_'+productData['variant_id']+']')) 
	    {  
	        var removeElHref = $('[id^=updates_'+productData['variant_id']+']').hide();
		}
	    else if ($('[id^=Updates_'+productData['variant_id']+']')) 
	    { 	
	        var removeElHref = $('[id^=Updates_'+productData['variant_id']+']').hide();
		}
	}

	var shopURL = document.domain;
	productData = []; 
	var shipping_insurance_in_cart = 0;
	Shopify.Cart = Shopify.Cart || {};
	Shopify.Cart.ShippingInsurance = {};

   	function getCookie(cname) {
	    var name = cname + "=";
	    var decodedCookie = decodeURIComponent(document.cookie);
	    var ca = decodedCookie.split(';');
	    for(var i = 0; i <ca.length; i++) {
	        var c = ca[i];
	        while (c.charAt(0) == ' ') {
	            c = c.substring(1);
	        }
	        if (c.indexOf(name) == 0) {
	            return c.substring(name.length, c.length);
	        }
	    }
	    return "";
	}

	function setCookie(key, value,loopindex) {  
	    $( "#dialog-confirm" ).dialog({
	      resizable: false,
	      height: "auto",
	      width: 400,
	      modal: true,
	      top: "-673.3px",
	      left: "0.5px",
	      positions: "relative",
	      buttons: {
	          "Don't Remove - I want to be SAVE": function() {
	          $( this ).dialog( "close" );
	          return false;
	        },
	        "Remove and take the RISK myself": function() {
	              
	           var expires = new Date();  
			   expires.setTime(expires.getTime() + 604800);  
			   document.cookie = key + '=' + value + ';expires=' + expires.toUTCString() + ';path=/';  
			   window.location.href = "/cart/change?line="+loopindex+"&quantity=0";
	        }
	      },
	      create:function () {
		        $(this).parent(".ui-dialog").addClass("shipping_insu");
		  }
	    });
	    return false;
	};

    var insurance_item_status = getCookie("product_insurance");
	if(insurance_item_status != 'hide')
    {
    	sendRequest(shopURL);
	}

	$(document).on('click','.insurance_cart_remove', function(e) { 
				e.preventDefault(); 
	        	var shipping_line_num = productData['shipping_line_num']; 
			  	setCookie('product_insurance', 'hide',shipping_line_num);
	});

	Shopify.Cart.ShippingInsurance.set = function() { 
	  	  	var data = "updates["+productData['variant_id']+"]=1&attributes[shippingInsurance]=true";
			
		    $.ajax({
			    type: 'POST',
			    url: '/cart/update.js',
			    data: data, 
			    dataType: 'json',
			    success: function() { 
			    	location.href = '/cart'; 
			    }
		    });
	}

	Shopify.Cart.ShippingInsurance.remove = function() { 
			var data = "updates["+productData['variant_id']+"]=0&attributes[shippingInsurance]="+'';
	  		      
		    $.ajax({
			    type: 'POST',
			    url: '/cart/update.js', 
			    data: data, 
			    dataType: 'json',
			    success: function() { 
			    	location.href = '/cart'; 
			    }
		    });
	} 
};

if((typeof jQuery === 'undefined') || (parseFloat(jQuery.fn.jquery) < 1.7)) 
{	
	var headTag = document.getElementsByTagName("head")[0];
	var jqTag = document.createElement('script');
	jqTag.type = 'text/javascript';
	jqTag.src = '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js';
	jqTag.onload = loadScript;
	headTag.appendChild(jqTag);
}
else
{ 
	loadScript();
}