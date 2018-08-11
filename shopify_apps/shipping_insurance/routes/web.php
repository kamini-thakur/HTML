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
//     return view('welcome');
// });

// use Oseintow\Shopify\Facades\Shopify;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');  

Route::get('/', 'InstallController@index');

Route::get('/install', 'InstallController@install');  

Route::get('/auth', 'InstallController@auth');

Route::get('/installWebhooks', 'WebhookController@index');

// Route::get('/uninstall', 'GetWebhooksController@uninstall');

// Route::post('/uninstall', 'GetWebhooksController@uninstall');

//Route::get('/productDelete', 'GetWebhooksController@productDelete');

Route::get('/productDelete', 'GetWebhooksController@index');

Route::post('/orderPlaced', 'GetWebhooksController@orderCreated');

Route::get('/index', 'ProductController@index');

Route::post('/uploadImage', 'ProductController@uploadProductImage');

Route::get('images/{filename}', 'ProductController@getStoredImagePath');

Route::get('/createProduct', 'ProductController@createProduct');

Route::get('/createRecurring', 'BillingController@index');

Route::get('/getchargestatus', 'BillingController@getChargeStatus');

Route::get('/activateCharge', 'BillingController@activateCharge');

Route::get('/createUsageCharges', 'BillingController@createUsageCharges');

Route::get('/EmbedScript', 'ThemeController@index'); 

Route::get('/getShippingInsurance', 'ThemeController@getShippingProduct');

Route::get('/editProduct', 'ProductController@editProduct');
 
Route::get('/updateProduct', 'ProductController@updateProduct');

Route::get('/settings', 'AppSettingsController@index');

Route::get('/install_instructions', 'AppSettingsController@installInstruction');

Route::get('/enableDisable', 'AppSettingsController@changeSettings');
