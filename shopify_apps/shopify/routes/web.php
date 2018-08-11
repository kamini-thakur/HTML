<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     // return view('auth/login');
// 	return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// use Oseintow\Shopify\Facades\Shopify;

Route::get('/', 'InstallController@index');
Route::get('/install', 'InstallController@install');

Route::get('/auth', 'InstallController@auth');

Route::get('/orders', 'OrderController@index');
Route::get('/createfulfillment', 'OrderController@create');

// Route::get("install",function()
// {
//     $shopUrl = "worldhook.myshopify.com";
//     $scope = ["write_orders","read_orders"];
//     $redirectUrl = "https://shipping.bigsmall.in/auth";

//     $shopify = Shopify::setShopUrl($shopUrl);
//     return redirect()->to($shopify->getAuthorizeUrl($scope,$redirectUrl));
// });

// Route::get("auth",function(\Illuminate\Http\Request $request)
// {
//     $shopUrl = "worldhook.myshopify.com";
//     $accessToken = Shopify::setShopUrl($shopUrl)->getAccessToken($request->code);

//     dd($accessToken);
// });


