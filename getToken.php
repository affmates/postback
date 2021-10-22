<?php
include 'function.php';
$appKey = "_APP_KEY_";
$appSecret = "_APP_SECRET_";
$headers = [
    'username:'.$appKey,
    'password:'.$appSecret,
    'Content-Type: application/json'
];
$url = "https://postback.affmates.com/adv/token";
$postData = [];
$type = 'POST';
$response = $this->callApi($url,$headers, $type,$postData);
if($response){
    $response = json_decode($response,true);
    if($response['code'] == '200' && $response['data']){
        $token = $response['data']['token'];
        $tokenExpired = $response['data']['expired'];
        $tokenScopes = $response['data']['scope'];

        //Valid time
        if($tokenExpired > time()){
            //Store token anywhere
        }
    }
}