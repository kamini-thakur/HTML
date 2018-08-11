<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Input;
use Shopify;
use DB;
use Response; 
use Session;
use Redirect;

class WebhookController extends Controller
{
	public function __construct()
    {
    	// $this->middleware('cors');
        $this->middleware('AppInstalled');
    }
    public function index(Request $request)  
    {
    	try
    	{
            $shopUrl = $request->session()->get('shop');
	        $accessToken = DB::table('app_data')->where('shop_domain', $shopUrl)->pluck('accress_token')->first();
	        $shopify = Shopify::setShopUrl($shopUrl)->setAccessToken($accessToken);

	    	$url ='/admin/webhooks.json';
	    	$baseURL = env("APP_URL");

	    	//////////// Create app uninstallation webhook ////////////
	    	$uninstall = $baseURL.'/webhooks/uninstall.php';
			$uninstallArray = $shopify->get('/admin/webhooks.json',["address"=>$uninstall]);
			$uninstallArray  = json_decode($uninstallArray,true);

		    $uninstallMeta = array
		    (
		            "topic"=> "app/uninstalled",
		            "address"=> $uninstall,
		            "format"=>"json"
		    );

		    if (empty($uninstallArray))
		    {     
		        $shopify->post($url, ["webhook"=>$uninstallMeta]);
		    }

		    // $shopify->delete("/admin/webhooks/286450942052.json");

		    //////////// Create product deletion webhook ////////////

		    $productDelete = $baseURL.'/productDelete';
			$productArray = $shopify->get('/admin/webhooks.json',["address"=>$productDelete]);
			$productArray  = json_decode($productArray,true);

		    $prodMeta = array 
		    (
		        "topic"=> "products/delete",
		        "address"=> $productDelete,
		        "format"=>"json"
		    );
	    
	        if (empty($productArray)) {
	            $shopify->post($url,["webhook"=>$prodMeta]); 
	        }

	        /////////////////////////////////////////////
	  //       $productDelete = $baseURL.'/webhooks/productDelete.php';
			// $productArray = $shopify->get('/admin/webhooks.json',["address"=>$productDelete]);
			// $productArray  = json_decode($productArray,true);

		 //    $prodMeta = array 
		 //    (
		 //        "topic"=> "products/delete",
		 //        "address"=> $productDelete,
		 //        "format"=>"json"
		 //    );
	    
	  //       if (empty($productArray)) {
	  //           $shopify->post($url,["webhook"=>$prodMeta]); 
	  //       }

	        //////////// Create order creation webhook ////////////

		    $orderCreated = $baseURL.'/orderPlaced';
			$orderArray = $shopify->get('/admin/webhooks.json',["address"=>$orderCreated]);
			$orderArray  = json_decode($orderArray,true);

		    $orderMeta = array 
		    (
		        "topic"=> "orders/create",
		        "address"=> $orderCreated,
		        "format"=>"json"
		    );
	    
	        if (empty($orderArray)) {
	            $shopify->post($url,["webhook"=>$orderMeta]); 
	        }
	    }
	    catch (\Exception $e) {
            $webhooks_response = $e->getMessage();
        }

        if ($request->session()->has('successMsg')) 
        {
        	return redirect()->action('ProductController@index')->with('successMsg', 'Thanks for installing APP'); 
        }
        else
        {
            return redirect()->action('ProductController@index');
        }
	}

}
