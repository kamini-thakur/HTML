<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Input;
use Shopify;
use DB;
use Storage;
use File;
use Response; 

class GetWebhooksController extends Controller
{
    public function __construct()
    {
        // $this->middleware('cors'); 
        echo "here"; 
        $path = storage_path() .'/app/webhook_files/produtDelete.txt';
        File::put($path,'product webhook fires');
    }
    public function index(Request $request)
    { 
        // $path = storage_path() .'/app/webhook_files/produtDelete.txt';
        // File::put($path,'product webhook fires');
    }
    public function uninstall(Request $request)  
    {
        $path = storage_path() .'/app/webhook_files/Uninstall.txt';
        File::put($path,'webhook fires');

       //  	try
       //  	{
       //  		$data = file_get_contents('php://input');
       //          $Array    =json_decode($data);
       //          // File::put($path,$data);

			// $fh=fopen('Uninstall.txt', 'w');

			// fwrite($fh,$data);
			// $Array    =json_decode($data);
			// mail("kamini_thakur@esferasoft.com","uninstall",'data='.$data);
			// $_DOMAIN  =$_SERVER['HTTP_X_SHOPIFY_SHOP_DOMAIN'];
			// // fwrite($fh, $_DOMAIN);

			// mail("kamini_thakur@esferasoft.com","uninstall",'domain='.$_DOMAIN);

			// DB::table('app_data')->where('shop_domain', $_DOMAIN)->delete();
    	// }
    	// catch (\Exception $e) 
    	// {
     //        $uninstall_response = $e->getMessage();
     //        // File::put($path,'error occured');
     //    }
    }  
    public function prodDelete(Request $request)  
    {
        // mail("kamini_thakur@esferasoft.com","deleted",'product deleted');

    	// $path = public_path() .'/webhooks/productDelete.txt';

      // return response('webhook handled', 200);

        $path = storage_path() .'/app/webhook_files/prodDelete.txt';
        File::put($path,'product webhook fires');

   //  	try
   //  	{
   //  		$data = file_get_contents('php://input');
   //          // $data = Request::json();
   //          $Array = json_decode($data);
   //          // File::put($path,$data);
			// $fh=fopen('prodDelete.txt', 'w');

			// fwrite($fh,$data);
			// // $Array    =json_decode($data);
			// // $_DOMAIN  =$_SERVER['HTTP_X_SHOPIFY_SHOP_DOMAIN'];

			// // $productId = $Array->id;

			// // DB::table('product_details')->where([['shop_domain', $_DOMAIN],['productID', $productId]])->delete();
   //  	}
   //  	catch (\Exception $e) 
   //  	{
   //          $product_response = $e->getMessage();
   //          // File::put($path,$product_response);
   //      }
    } 
    public function orderCreated(Request $request)  
    {
        try
        {
            // $data = file_get_contents('php://input');
            $path = storage_path() .'/app/webhook_files/orderCreate.txt';
            File::put($path,$data);
            // $fh=fopen('prodDelete.txt', 'w');
            // fwrite($fh,$data);

            // $Array    =json_decode($data);
            // $_DOMAIN  =$_SERVER['HTTP_X_SHOPIFY_SHOP_DOMAIN'];
            // $variantID = DB::table('product_details')->where('shopDomain', $_DOMAIN)->pluck('variantID')->first();
            // foreach ($Array->line_items as $key => $value) {
            //       $variant_id = $value->variant_id;
            //       if ($variant_id == $variantID) {
            //         $app_charge_id = DB::table('appcharges_details')->where('shopDomain', $_DOMAIN)->pluck('app_charge_id')->first();
            //         $productPrice = DB::table('appcharges_details')->where('shopDomain', $_DOMAIN)->pluck('productPrice')->first();
            //         $product_price_percent = ($productPrice)*(30/100);
                    
            //         return redirect()->action('BillingController@createUsageCharges',[['app_charge_id' => $app_charge_id],['product_price_percent', $product_price_percent]]);
            //       }
            // }
        }
        catch (\Exception $e) 
        {
            echo $uninstall_response = $e->getMessage();
        }
    } 
}
