<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shopify;
use DB;
use Exception;
use Redirect;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //orders listing
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $shopUrl = $request->shop;

        // if ($shopUrl == 'bigsmall-in.myshopify.com') {
        //   die('Maintanance Mode');
        // }
        $orderIds = implode(',', $request->ids);
        $accessToken = DB::table('app_data')->where('shop_domain', $shopUrl)->pluck('accress_token')[0];
        $shopify = Shopify::setShopUrl($shopUrl)->setAccessToken($accessToken);
        $ordersData = $shopify->get("/admin/orders.json", ["ids"=>$orderIds])->toArray();
        
        // echo "<pre>";
        // print_r($ordersData);

        // echo json_encode($ordersData);

        foreach ($ordersData as $orders) {
            // echo $orders->name;

            $awb = 'BGS'.$orders->order_number;
            $shipment_datedd_mm_yyyy = date('d-m-Y');
            $shippers_reference_number = $orders->order_number;
            $customer_code = 'BGS';

            if ($orders->gateway == "Cash on Delivery (COD)" || $orders->gateway == "Cash on Delivery" || $orders->gateway == 'cash_on_delivery' || $orders->financial_status == 'pending') {
                $cod_amount = $orders->total_price;
                $payment_mode = 'COD';
            }
            else
            {
                $cod_amount = 0;
                $payment_mode = 'Prepaid';
            }

            $quantity = 0;
            $product_desc = '';
            for ($i=0; $i < count($orders->line_items) ; $i++) { 
                $quantity = $quantity + $orders->line_items[$i]->quantity;
                if ($i == 0) {
                    $product_desc .= '('.$orders->line_items[$i]->title.' x '.$orders->line_items[$i]->quantity.')';
                }
                else
                {
                    $product_desc .= ', ('.$orders->line_items[$i]->title.' x '.$orders->line_items[$i]->quantity.')';
                }
                
            }
            
            $content_description = $product_desc;
            $consignee_name = $orders->shipping_address->name;
            $shipper_name = '';
            $consignee_address_line_1 = $orders->shipping_address->address1;
            $consignee_address_line_2 = $orders->shipping_address->address2;
            $consignee_address_line_3 = '';
            $consignee_address_line_4 = '';
            $consignee_city = $orders->shipping_address->city;
            $consignee_pincode = $orders->shipping_address->zip;
            $consignee_phone_number = $orders->shipping_address->phone;
            $consignee_mobile = $orders->shipping_address->phone;
            $piece = $quantity;
            $box_weightkgs = $orders->total_weight/1000;
            $declared_value = $orders->total_price;


            $data_json='{
              "fulfillment": {
                "tracking_number": "'.$awb.'",
                "tracking_company": "SECURA",
                "tracking_url": "http:\/\/securaex.com\/track?awb='.$awb.'",
                "notify_customer": true
              }
            }'; 


            



            try {

                $fulfillOrder = $shopify->post("/admin/orders/".$orders->id."/fulfillments.json", json_decode($data_json) );
                // echo "<pre>";
                $fulfill_response = $fulfillOrder->toJson();

                $fulfill_response_array = json_decode($fulfill_response,true);

                $curl = curl_init();

                curl_setopt_array($curl, array(
                  CURLOPT_URL => "http://hub.securaex.com/api/addconsignment",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => array(
                    "api_key"=>"c41c30a32ee11f6e514e",
                    "awb"=>$awb,
                    "shipment_datedd_mm_yyyy"=>$shipment_datedd_mm_yyyy,
                    "shippers_reference_number"=>$shippers_reference_number,
                    "customer_code"=>"BGS",
                    "cod_amount"=>$cod_amount,
                    "payment_mode"=>$payment_mode,
                    "content_description"=>$content_description,
                    "consignee_name"=>$consignee_name,
                    "shipper_name"=>'',
                    "consignee_address_line_1"=>$consignee_address_line_1,
                    "consignee_address_line_2"=>$consignee_address_line_2,
                    "consignee_address_line_3"=>"",
                    "consignee_address_line_4"=>"",
                    "consignee_city"=>$consignee_city,
                    "consignee_pincode"=>$consignee_pincode,
                    "consignee_phone_number"=>$consignee_phone_number,
                    "consignee_mobile"=>$consignee_mobile,
                    "piece"=>$piece,
                    "box_weightkgs"=>$box_weightkgs,
                    "declared_value"=>$declared_value

                  ),
                  CURLOPT_HTTPHEADER => array(
                    "cache-control: no-cache",
                    "content-type: multipart/form-data"
                  ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                  $secura_response = "cURL Error #:" . $err;
                } else {
                  $secura_response = $response;
                }

                $secura_response_array = json_decode($secura_response,true);

            } catch (\Exception $e) {
                // echo "<pre>";
                $fulfill_response = $e->getMessage();

            }

            echo $fulfill_response;
            echo "<br>";

            if ($fulfill_response == '{"order":["is already fulfilled"]}') {
                // echo $fulfill_response;
            }
            else
            {   
                // echo $fulfill_response_array['id'];
                // echo "<br>".$orders->id;
                // echo "<pre>";
                // print_r($fulfill_response_array);

                // DB::table('orders')->insert(
                //     ['order_id' => (string)$orders->id, 'tracking_number' =>$awb ,'data_feed_id'=>$secura_response_array['data']['id'] ,'data_feed_response'=> $secura_response ,'fulfillment_id'=> (string)$fulfill_response_array['id'] ,'fulfillment_response'=>$fulfill_response , 'created_at'=> date('Y-m-d H:i:s'),'created_at_secura'=>date('Y-m-d H:i:s')]
                // );

                
            }

            // sleep(1);
        }

        echo "<script>window.history.back();</script>";
        
    }

    public function verifyRequest($request)
    {
        $queryString = $request->getQueryString();

        if(Shopify::verifyRequest($queryString)){
            echo "verification passed";
        }else{
            echo "verification failed";
        }
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
