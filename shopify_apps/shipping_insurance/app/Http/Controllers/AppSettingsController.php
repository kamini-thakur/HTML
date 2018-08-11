<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shopify;
use DB;
use Session;
use Redirect;

class AppSettingsController extends Controller
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

        $enable_app = DB::table('app_data')->where('shop_domain', $shopUrl)->pluck('enable_app')->first();
        return view('settings', ['app_enable_settings' => $enable_app]);
    }
    public function changeSettings(Request $request)  
    {
        $enable_status = $_GET['Status'];
        $shopUrl = $request->session()->get('shop');
        $accessToken = DB::table('app_data')->where('shop_domain', $shopUrl)->pluck('accress_token')->first();

        DB::table('app_data')
                ->where('shop_domain', $shopUrl)
                ->update(['enable_app'=> $enable_status]); 

        return redirect()->action('ThemeController@index');           

        // return view('settings');
    }
    public function installInstruction(Request $request)  
    {
        return view('install_instructions');
    }
}
