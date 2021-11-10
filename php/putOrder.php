<?php
include 'function.php';
//Post Order
$publisherClickId = $_COOKIE['afm_net']??'';    //Get publisher click id from cookie
if(!$publisherClickId){
    return;
}

$postData = [
    'conversion_id' => 'ORD001',                //Order Code
    'create_time'=>  '2021-10-21 12:45:00',     //Y-m-d H:i:s
    'publisher_click_id' => '1223214',
    'customer'  =>  'NEW',                      //Customer name or customer type: NEW, EXSITING ...
    'items'=>[
        [ 
            'item_id' => 'sku01231',                //Product Code, Sku
            'item_name'=>'Product 01',              //Product name
            'category' => 'Cate01',  //Optional - Require in some special case
            'quantity' => 2,                        //Item quantity
            'amount'   => 100000,                   //Item price
            'payout'   => 1000,                     //Item payout - Optional
        ],
        [ 
            'item_id' => 'sku01221',                //Product Code, Sku
            'item_name'=>'Product 02',              //Product name
            'category' => 'Cate02',  //Optional - Require in some special case
            'quantity' => 1,                        //Item quantity
            'amount'   => 300000,                   //Item price
            'payout'   => 2000,                     //Item payout - Optional
        ],
    ]
];
//token receive by getToken.php
$token = "_TOKEN_";
$url = "https://postback.affmates.com/adv/conversion";
$type = "PUT";
$headers = [
    'Authorization: Bear '.$token,
    'Content-Type: application/json'
];
$postData = json_encode($postData);
// $postData = json_encode($postManyData);
$response = $this->callApi($url, $headers, $type, $postData);
_log($response);
