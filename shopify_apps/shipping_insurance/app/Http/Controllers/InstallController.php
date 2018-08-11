<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shopify;
use DB;
use Session;

class InstallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $shopUrl = $request->shop;
        $app_url = env("APP_URL");
        $request->session()->put('shop', $shopUrl);
        $checkInstall = DB::table('app_data')
                ->where('shop_domain','=',$shopUrl)
                ->count();

        if ($checkInstall > 0) {
            
            $scope = ["read_products","write_products","read_themes","write_themes","read_script_tags","write_script_tags","read_orders","write_orders"];
            $redirectUrl = $app_url."/auth";

            $shopify = Shopify::setShopUrl($shopUrl);
            return redirect()->to($shopify->getAuthorizeUrl($scope,$redirectUrl));
        }
        else
        {
            return view('welcome');
        }
    }

    public function install(Request $request)
    {
        $shopUrl = $request->shop;
        $app_url = env("APP_URL");
        $request->session()->put('shop', $shopUrl);
        $scope = ["read_products","write_products","read_themes","write_themes","read_script_tags","write_script_tags","read_orders","write_orders"];
        $redirectUrl = $app_url."/auth";

        $shopify = Shopify::setShopUrl($shopUrl);
        return redirect()->to($shopify->getAuthorizeUrl($scope,$redirectUrl));
    }
    
    public function auth(Request $request)
    {
        $shopUrl = $request->shop;
        $accessToken = Shopify::setShopUrl($shopUrl)->getAccessToken($request->code);

        $checkInstall = DB::table('app_data')
                ->where('shop_domain','=',$shopUrl)
                ->count();

        if ($checkInstall > 0) {
            DB::table('app_data')
                ->where('shop_domain', $shopUrl)
                ->update(['accress_token' => $accessToken, 'app_installed'=> 1]);

            $app_charge_status = DB::table('appcharges_details')->where('shopDomain', $shopUrl)->pluck('app_charge_status')->first();
            $confirmation_url = DB::table('appcharges_details')->where('shopDomain', $shopUrl)->pluck('confirmation_url')->first();

            if ($app_charge_status == 'active') {
                return redirect()->action('WebhookController@index')->with('successMsg', 'Thanks for installing APP');
            }
            else if ($app_charge_status == 'pending')
            {
                echo "<script>window.top.location = '".$confirmation_url."'</script>";
            }
            else if ($app_charge_status == 'declined')
            {
                echo "<script>window.top.location = '".$confirmation_url."'</script>";
            }
            else
            {
                return redirect()->action('BillingController@index'); 
            }
        }
        else
        { 
            $shopify = Shopify::setShopUrl($shopUrl)->setAccessToken($accessToken);
            $shop_data = $shopify->get("admin/shop.json");
            $shop_data_array = $shop_data->toArray();

            DB::table('app_data')->insert(
                    ['email_id' => $shop_data_array['email'] , 'store_id' =>$shop_data_array['id'] ,'shop_domain' =>$shop_data_array['myshopify_domain'] ,'accress_token'=>$accessToken , 'created_at'=> date('Y-m-d H:i:s'), 'app_installed'=> 1, 'enable_app'=>1]
                );
            return redirect()->action('BillingController@index');
        }
    }


    public function verifyRequest(Request $request)
    {
        $queryString = $request->getQueryString();

        if(Shopify::verifyRequest($queryString)){
            logger("verification passed");
        }else{
            logger("verification failed");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
