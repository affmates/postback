<?php
function callApi($url, $headers, $type, $postData){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    if(in_array($type, ['PUT','POST'])){
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $type);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
    }
    // EXECUTE:
    $result = curl_exec($curl);
    if(!$result) {
        die("Connection Failure");
    }
    curl_close($curl);
    return $result;
}
function _log($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die();
}