<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    //
}



// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => "http://hub.securaex.com/api/addconsignment",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "POST",
//   CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"api_key\"\r\n\r\nc41c30a32ee11f6e514e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"awb\"\r\n\r\nTEST_BLC004769\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"shipment_datedd_mm_yyyy\"\r\n\r\n8/8/2017\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"shippers_reference_number\"\r\n\r\n4081153-S86013\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"customer_code\"\r\n\r\nBGS\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"cod_amount\"\r\n\r\n861.5\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"payment_mode\"\r\n\r\nCOD\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"content_description\"\r\n\r\nHandle with care\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"consignee_name\"\r\n\r\nparveen\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"shipper_name\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"consignee_address_line_1\"\r\n\r\nesic panchdeep bhawan sector 16\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"consignee_address_line_2\"\r\n\r\nnear laxmi narayan mandir\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"consignee_address_line_3\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"consignee_address_line_4\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"consignee_city\"\r\n\r\nFARIDABAD\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"consignee_pincode\"\r\n\r\n121002\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"consignee_phone_number\"\r\n\r\n9899212185\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"consignee_mobile\"\r\n\r\n8700284400\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"piece\"\r\n\r\n3\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"box_weightkgs\"\r\n\r\n0.974\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"declared_value\"\r\n\r\n861.5\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
//   CURLOPT_HTTPHEADER => array(
//     "cache-control: no-cache",
//     "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
//     "postman-token: 648612de-362b-d6d2-902b-e063218462b7"
//   ),
// ));

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
//   echo "cURL Error #:" . $err;
// } else {
//   echo $response;
// }



// {
//     "data": {
//         "id": 54701,
//         "awb": "TEST_BLC004769",
//         "vendor_awbno": null,
//         "shipment_value": null,
//         "order_id": "4081153-S86013",
//         "product": null,
//         "content": null,
//         "instruction": null,
//         "origin_code": null,
//         "shipper_name": null,
//         "shipper_add1": null,
//         "shipper_add2": null,
//         "shipper_add3": null,
//         "shipper_add4": null,
//         "shipper_pin": null,
//         "shipper_tel_no": null,
//         "currency_code": null,
//         "vendor_awbno_2": null,
//         "shipper_code": null,
//         "customer_name": "BL",
//         "customer_code": null,
//         "collectable_value": "861.5",
//         "payment_mode": "COD",
//         "item_description": "Handle with care",
//         "consignee": "parveen",
//         "consignee_address": "esic panchdeep bhawan sector 16near laxmi narayan mandir  ",
//         "destination_city": "FARIDABAD",
//         "destination_code": null,
//         "pincode": "121002",
//         "state": "",
//         "mobile": "9899212185 / 8700284400",
//         "current_status": "Soft Data Upload",
//         "remarks": null,
//         "prev_status": "",
//         "prev_sub_status": "",
//         "no_of_attempts": null,
//         "last_updated_on": "2018-03-09",
//         "last_updated_by": "BL - API",
//         "bag_code": null,
//         "bag_id": null,
//         "drs_code": null,
//         "drs_id": null,
//         "pod_code": null,
//         "pod_id": null,
//         "date_ddmmyyyy": null,
//         "price": "861.5",
//         "branch": "Faridabad",
//         "rto_awb": null,
//         "rto_reason": null,
//         "undelivered_reason": null,
//         "re_attempt": null,
//         "delivered_date_time": null,
//         "received_by": null,
//         "message_ofd_response": null,
//         "message_d_response": null
//     }
// }
