<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Input;
use Shopify;
use DB;
use Image;
use Storage;
use File;
use Response; 
use Session;
use Validator;
use Redirect;


class ProductController extends Controller
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

        $isProductCreated = DB::table('product_details')->where('shopDomain', $shopUrl)->count();

        $webhooks = $shopify->get('/admin/webhooks.json');
        // echo "webhooks";
        // echo "<pre>";
        // print_r($webhooks);
        // echo "</pre>";

        if ($isProductCreated > 0) 
        {
            return $this->editProduct($request);
        }
        else
        {
            if ($request->session()->has('successMsg')) 
            {
                return view('createProduct')->with('successMsg', 'Thanks for installing APP');
            }
            else
            {
                return view('createProduct');
            }
        }
    }
    public function uploadProductImage(Request $request)
    {
        if ($request->hasFile('file')) {        
            $path = $request->file('file')->store('images');
            return $path;
        }
    }
    public function getStoredImagePath(Request $request)
    {
        $filename = $request->filename;
        $path = storage_path() .'/app/images/'. $filename;

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
    public function createProduct(Request $request)
    {
        $shopUrl = $request->session()->get('shop'); 

        if ($shopUrl != '') 
        {
            $accessToken = DB::table('app_data')->where('shop_domain', $shopUrl)->pluck('accress_token')->first();
            $shopify = Shopify::setShopUrl($shopUrl)->setAccessToken($accessToken);

            $title = $request->productTitle;
            $price = $request->productPrice;
            $quantity = $request->productQua;
            $sku = $request->productSku;
            $description = $request->productDescription;
            $image = $request->image;
            // $encoded_image = base64_encode(file_get_contents($request->image));

            $Array = array
            (
                "title"=>$title,
                "body_html"=>$description,
                "product_type"=> "Shipping Insurance",
                "tags"=> "shipping-insurance",
                "images"=> array(
                  "0" => array(
                    "src" => $image
                 )
                ),
                "metafields"=> array(
                  "0" => array(
                    "key"=> "insurance",
                    "value"=> "true",
                    "value_type"=> "string",
                    "namespace"=> "shipping"
                  )
                ),
                "variants" =>array(
                 "0" => array(
                    "option1"=> "Default Title",
                    "inventory_policy" => "continue",
                    "inventory_management" => "shopify",
                    "inventory_quantity" => $quantity,
                    "price"=> $price,
                    "sku"=> $sku
                    )
                )
            );   

            try{
                $product_create_response = $shopify->post("/admin/products.json", ["product"=>$Array]);
            }
            catch (\Exception $e) {
                $product_create_response = $e->getMessage();
            }
            
            $response = json_decode($product_create_response,true);

            if (isset($response['id'])) 
            {
                $productCreated = DB::table('product_details')
                ->where('shopDomain','=',$shopUrl)
                ->count();

                if(isset($response['image']['src'])){
                    $productImg = $response['image']['src'];
                }else{
                    $productImg = null;
                }

                if ($productCreated > 0) 
                {
                    DB::table('product_details')
                        ->where('shopDomain', $shopUrl)
                        ->update(['productID'=>$response['id'],'variantID'=>$response['variants'][0]['id'], 'productTitle'=>$response['title'],'productPrice'=> $response['variants'][0]['price'], 'prodQuantity'=> $response['variants'][0]['inventory_quantity'],'productSKU'=>$response['variants'][0]['sku'],'productDesc'=> $response['body_html'], 'productImg'=> $productImg]);
                }
                else
                {
                    DB::table('product_details')->insert(['shopDomain' => $shopUrl, 'productID'=>$response['id'],'variantID'=>$response['variants'][0]['id'], 'productTitle'=>$response['title'],'productPrice'=> $response['variants'][0]['price'], 'prodQuantity'=> $response['variants'][0]['inventory_quantity'],'productSKU'=>$response['variants'][0]['sku'],'productDesc'=> $response['body_html'], 'productImg'=> $productImg]);
                }
                return redirect()->action('ThemeController@index');
            }
            else
            {
                return view('createProduct')->with('errorMsg', 'Product could not be created. Please try again');      
            }
        }
    }
    public function editProduct(Request $request)
    {
        $shopUrl = $request->session()->get('shop'); 
        $productDetails = DB::table('product_details')->where('shopDomain', $shopUrl)->get();
        // echo $successMsg = $request->session()->get('successMsg'); 
        if ($request->session()->has('successMsg')) 
        {
            return view('updateProduct', ['productDetails' => $productDetails])->with('successMsg', 'Product updated successfully');
        }
        elseif($request->session()->has('errorMsg'))
        {
            return view('updateProduct', ['productDetails' => $productDetails])->with('errorMsg', 'Product could not be updated. Please try again');
        }
        else
        {
            return view('updateProduct', ['productDetails' => $productDetails]);
        }
    }
    public function updateProduct(Request $request)
    {
        $shopUrl = $request->session()->get('shop'); 
        $title = $request->productTitle;
        $price = $request->productPrice;
        $quantity = $request->productQua;
        $image = $request->image;
        $sku = $request->productSku;
        $description = $request->productDescription;

        $updateProduct = array
        (
                'title'=>$title,
                'body_html'=>$description,
                "images"=> array(
                  '0' => array(
                    "src" => $image
                 )
                ),
                'variants' =>array(
                 '0' => array(
                    "inventory_quantity" => $quantity,
                    "price"=> $price,
                    "sku"=> $sku
                    )
                )
        );    

        if ($shopUrl != '') 
        {
            $accessToken = DB::table('app_data')->where('shop_domain', $shopUrl)->pluck('accress_token')->first();
            $shopify = Shopify::setShopUrl($shopUrl)->setAccessToken($accessToken);
            $productId = DB::table('product_details')->where('shopDomain', $shopUrl)->pluck('productID')->first();

            try
            {
                $product_update_response = $shopify->put("/admin/products/".$productId.".json", ["product"=>$updateProduct]);
            }
            catch (\Exception $e) 
            {
                $product_update_response = $e->getMessage();
            }

            $response = json_decode($product_update_response,true);

            if (isset($response['id'])) 
            {
                if(isset($response['image']['src']))
                {
                    $productImg = $response['image']['src'];
                }
                else
                {
                    $productImg = null;
                }
                DB::table('product_details')
                        ->where('shopDomain', $shopUrl)
                        ->update(['variantID'=>$response['variants'][0]['id'],'productTitle'=>$response['title'],'productPrice'=> $response['variants'][0]['price'], 'prodQuantity'=> $response['variants'][0]['inventory_quantity'],'productSKU'=>$response['variants'][0]['sku'],'productDesc'=> $response['body_html'], 'productImg'=> $productImg]);

                return redirect()->action('ProductController@editProduct')->with('successMsg', 'Product updated successfully');
            }
            else
            {
                return redirect()->action('ProductController@editProduct')->with('errorMsg', 'Product could not be updated. Please try again');
            }
        }
    }
}
