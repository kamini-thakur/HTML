<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Shopify;
use DB;
use Session;
use Redirect;


class BillingController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
        $this->middleware('AppInstalled');
    }
    public function index(Request $request) 
    {
    	$shopUrl = $request->session()->get('shop');
        $accessToken = DB::table('app_data')->where('shop_domain', $shopUrl)->pluck('accress_token')->first();
        $shopify = Shopify::setShopUrl($shopUrl)->setAccessToken($accessToken);

        $app_url = env("APP_URL");

        $return_url = $app_url.'/getchargestatus';
	    $Array = array
	    (
	        'name'=> "Shipping insurance basic plan",
	        'price'=> 5.0,
	        "return_url"=> $return_url,
            "capped_amount" => 100,
            "terms" => "$1 for 1000 emails",
	        "trial_days"=> 25,
	        "test"=> true     
	    );    

        try{
            $recurring_create_response = $shopify->post("/admin/recurring_application_charges.json", ["recurring_application_charge"=>$Array]);
        }
        catch (\Exception $e) {
            $recurring_create_response = $e->getMessage();
        }

        if(isset($recurring_create_response['id']))
        {
            $Is_shopCharge_added = DB::table('appcharges_details')
                ->where('shopDomain','=',$shopUrl)
                ->count();

            if ($Is_shopCharge_added > 0) 
            {
                DB::table('appcharges_details')->where('shopDomain', $shopUrl)->update(
                        ['app_charge_id' => $recurring_create_response['id'] , 'app_charge_status' =>$recurring_create_response['status'] ,'decorated_return_url' =>$recurring_create_response['decorated_return_url'] ,'confirmation_url'=>$recurring_create_response['confirmation_url'] , 'created_at'=> date('Y-m-d H:i:s')]
                );            
            }
            else
            {
    	        DB::table('appcharges_details')->insert(
                        ['shopDomain' => $shopUrl, 'app_charge_id' => $recurring_create_response['id'] , 'app_charge_status' =>$recurring_create_response['status'] ,'decorated_return_url' =>$recurring_create_response['decorated_return_url'] ,'confirmation_url'=>$recurring_create_response['confirmation_url'] , 'created_at'=> date('Y-m-d H:i:s')]
                );
            }
            echo "<script>window.top.location = '".$recurring_create_response['confirmation_url']."'</script>";
        }
    }
    public function getChargeStatus(Request $request)
    {
        $shopUrl = $request->session()->get('shop');
        $accessToken = DB::table('app_data')->where('shop_domain', $shopUrl)->pluck('accress_token')->first();
        $shopify = Shopify::setShopUrl($shopUrl)->setAccessToken($accessToken);

        $app_charge_id = $request['charge_id'];
        if(isset($app_charge_id))
        {
        	try{
	            $recurring_response = $shopify->get("/admin/recurring_application_charges/".$app_charge_id.".json");
	        }
	        catch (\Exception $e) {
	            $recurring_response = $e->getMessage();
	        }

            if(isset($recurring_response['id']))
            {
    	        DB::table('appcharges_details')->where('shopDomain', $shopUrl)
                ->update(['app_charge_status' =>$recurring_response['status']]);

                if ($recurring_response['status'] == 'accepted') 
                {
                    $status = $this->activateCharge($recurring_response,$app_charge_id,$shopUrl);
                    if($status == 'success')
                    {
                        // return redirect()->action('BillingController@createUsageCharges',['app_charge_id' => $app_charge_id]);
                        return redirect()->action('WebhookController@index');
                    }
                    else
                    {
                        return Redirect::back();
                    }
                }
                else
                {
                    return view('app_info');
                }
            }
            else
            {
                return Redirect::back();  
            }
        }
    }
    public function activateCharge($recurring_response,$app_charge_id,$shopUrl)
    {
        $accessToken = DB::table('app_data')->where('shop_domain', $shopUrl)->pluck('accress_token')->first();
        $shopify = Shopify::setShopUrl($shopUrl)->setAccessToken($accessToken);

        try{
                $recurring_activate_response = $shopify->post("/admin/recurring_application_charges/".$app_charge_id."/activate.json", ["recurring_application_charge"=>$recurring_response]);
        }
        catch (\Exception $e) {
                $recurring_activate_response = $e->getMessage();
        }

        if ($recurring_activate_response['status'] == 'active') 
        {
            DB::table('appcharges_details')->where('shopDomain', $shopUrl)
                ->update(['app_charge_status' =>$recurring_activate_response['status']]);
            return 'success';
        }
        else
        {
            return 'error';
        }
    }
    public function createUsageCharges(Request $request)
    {
        $shopUrl = $request->session()->get('shop');

        $accessToken = DB::table('app_data')->where('shop_domain', $shopUrl)->pluck('accress_token')->first();
        $shopify = Shopify::setShopUrl($shopUrl)->setAccessToken($accessToken);

        $app_charge_id = $request->app_charge_id;
        $product_price_percent = $request->product_price_percent;

        if(isset($app_charge_id))
        {
            $createUsageCharge = array
            (
                'description'=> "Shipping insurance basic plan",
                'price'=> $product_price_percent
            );  

            try{ 
                $usagecharge_response = $shopify->post("/admin/recurring_application_charges/".$app_charge_id."/usage_charges.json", ["usage_charge"=>$createUsageCharge]);
            }
            catch (\Exception $e) {
                $usagecharge_response = $e->getMessage();
            }

            if ($usagecharge_response['balance_remaining'] < 1) {
                $update_cappedAmount = $shopify->put("/admin/recurring_application_charges/".$app_charge_id."/customize.json?recurring_application_charge[capped_amount]=200");

                echo "<script>window.top.location = '".$update_cappedAmount['update_capped_amount_url']."'</script>";
            }
        
            if(isset($usagecharge_response['id']))
            {
                return redirect()->action('WebhookController@index')->with('successMsg', 'Thanks for installing APP'); 
            }
            else
            {
                echo "Error Occured";  
            }
        }
    }
}
