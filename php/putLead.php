<?php
include 'function.php';
//Post 1 item
$postData = [
    'leadid'=>'12322344',                           //conversionid - IMPORTANT - REQUIRED
    'create_time'=> '2021-10-21 12:45:00',      //Y-m-d H:i:s  - REQUIRED
    'publisher_click_id'=> 'A102942ja',         //Click iD     - IMPORTANT - REQUIRED
    'payout' => 1000,                           //Payout       - Optional
    'amount' => 200000,                         //Customer Register amount - Optional
    'campaign' => 'Campaign1',                  //Optional
];

//Post many Item
$postManyData = [
    [
        'leadid'=> time().rand(100,999),                         
        'create_time'=> '2021-10-21 12:45:00',      
        'publisher_click_id'=> 'A102942ja',         
        'payout' => rand(1000,4000),                           
        'amount' => rand(2000,5000),                         
        'campaign' => 'Campaign'.rand(1,8),                  
    ],
    [
        'leadid'=> time().rand(100,999),                         
        'create_time'=> '2021-10-21 12:45:00',      
        'publisher_click_id'=> 'A102942ja',         
        'payout' => rand(1000,4000),                           
        'amount' => rand(2000,5000),                         
        'campaign' => 'Campaign'.rand(1,8),                  
    ],
    [
        'leadid'=> time().rand(100,999),                         
        'create_time'=> '2021-10-21 12:45:00',      
        'publisher_click_id'=> 'A102942ja',         
        'payout' => rand(1000,4000),                           
        'amount' => rand(2000,5000),                         
        'campaign' => 'Campaign'.rand(1,8),                  
    ],
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