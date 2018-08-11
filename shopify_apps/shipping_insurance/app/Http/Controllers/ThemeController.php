<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shopify;
use DB;
use Session;
use Redirect;

class ThemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
        // $this->middleware('AppInstalled');
    }
    public function index(Request $request)  
    {
    	$shopUrl = $request->session()->get('shop');
        $accessToken = DB::table('app_data')->where('shop_domain', $shopUrl)->pluck('accress_token')->first();
        $shopify = Shopify::setShopUrl($shopUrl)->setAccessToken($accessToken);
        $app_url = env("APP_URL");

        $addScript = array 
        (
            'event'=> "onload",
            'src'=> $app_url."/js/insurance.js"
        );   

        try
        {
            $enable_app = DB::table('app_data')->where('shop_domain', $shopUrl)->pluck('enable_app')->first();
            $script_exist = $shopify->get("/admin/script_tags.json", ["src"=>$app_url."/js/insurance.js"]);
            $script_exist_response = json_decode($script_exist,true);

            if ($enable_app === 1) {
                if (empty($script_exist_response)) {
                    $script_response = $shopify->post("/admin/script_tags.json", ["script_tag"=>$addScript]);
                }
            }
            elseif($enable_app === 0)
            {
                if (!empty($script_exist_response)) {
                    $script_id = $script_exist_response[0]['id'];
                    if(isset($script_id))
                    {
                        $script_delete_response = $shopify->delete("/admin/script_tags/".$script_id.".json");
                    }
                }    
            }
            return redirect()->action('ProductController@editProduct')->with('successMsg', 'Product created successfully');
        }
        catch (\Exception $e) {
            $script_response = $e->getMessage();
        }
    }
    public function getShippingProduct(Request $request)  
    {
        $shopUrl = $_GET['shopDomain'];
        $variantID = DB::table('product_details')->where('shopDomain', $shopUrl)->pluck('variantID')->first();
        return $variantID;
    }
}
