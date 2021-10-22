<p align="center"><img src="https://user-images.githubusercontent.com/92972462/138407033-d1661864-0dab-4880-8546-7bbd436f4a06.png" width="200px" alt="Affmates - Linking our world"></p>

# Post data to affmates network
#### Version: 1.0

This package provides a
simple API to connect with affmates server. To learn all about it please check  document and demo files included

Here are a few short examples of what you can do:

Flow: get token ---> authorization --> put data

### 1. Authentication - Generate token
```
POST /adv/token HTTP/1.1
Host: postback.affmates.com
username: _APP_KEY_
password: _APP_SECRET_
Content-Type: multipart/form-data;
```
This function will get Refresh Token for Advertiser
- APP_KEY and APP_SECRET will provide for Advertiser by email
- Token will expried after 10 days
- Advertiser can request a lifetime token

##### PHP Example below
```php
$curl = curl_init();

$httpHeader = ["username:APP_KEY_","password:APP_SECRET_","Content-Type:application/json"];
....
curl_setopt($curl, CURLOPT_URL, "https://postback.affmates.com/adv/token");
curl_setopt($curl, CURLOPT_HTTPHEADER, $httpHeader);
.....
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
```
Response can be:
- Code: 400 -  Bad Request
- Code: 403 -  Forbidden
- Code: 401 -  Unathorized
- Code: 404 -  Server Not found
- Code: 408 -  Request Timeout
- Code: 200 -  Success
```javascript
{
    "code": 401,
    "message": "Unauthorized",
    "description": "Account has not been activated or has been locked",
    "data": []
}
//Or
{
    "code": 200,
    "message": "OK",
    "description": "Token Created",
    "data": {
        "token": "_TOKEN_",
        "expired": 1635699600,
        "scope": "partner,postback,conversion_get,conversion_update" //List of scopes available
    }
}
```
### 2. Put data

<strong>Header</strong>
+ Content-Type: application/json
+ Authorization: Bear _TOKEN_
+ TOKEN received from Authentiaction

<strong>Body Request:</strong>
#### For Lead data (CPA, CPI, CPL)
```
  "leadid": "Conversion ID/Lead ID",                                              (IMPORTANT - REQUIRED)        
  "create_time": "Time to make conversion - format: 2021-10-22 12:30:21",         (REQUIRED)
  "publisher_click_id": {Paramerter from affmates publisher},                     (IMPORTANT - REQUIRED)
  "payout": 16000,   //Commission pay to affmates, can be empty or not set        (Optional)
  "amount": 200000,  //The package/product price for campaign (can be empty or not set) (Optional)
  "campaign": "name"   //Campaign id/name or product id/name                      (Optional)
```
```
PUT /adv/conversion HTTP/1.1
Host: postback.affmates.com
Authorization: Bear _TOKEN_
Content-Type: application/json
{
  "leadid": "143r45",
  "create_time": "2021-10-21 12:45:00",
  "publisher_click_id": "12324142",
  "payout": 16000,
  "amount": 200000,
  "campaign": "Campaign ID / Name - Product ID / Name"
}
```
#### For Order data (CPS)
```
  "conversion_id": "Order Code / Conversion ID (Not item conversion id)",         (IMPORTANT - REQUIRED)        
  "create_time":    "Create time - format: 2021-10-22 12:30:21",                  (REQUIRED)
  "publisher_click_id": {Paramerter from affmates publisher},                     (IMPORTANT - REQUIRED)
  "customer": "New"   //Customer name or type: NEW / EXISTING                     (Optional)
  "campaign": "name"   //Campaign id/name or product id/name                      (Optional)
  "platform": "web/app"   //Conversion made in                                    (Optional)
  "items": [
    {
      "item_id":"Product Code / Sku"                                              (IMPORTANT - REQUIRED)
      "item_name": "Product name"                                                 (Optional)
      "category": "category id / category name"                                   (Optinal) - Need to set if advertiser has many campaigns for each category
      "quantity":  2     //The number of item for this product                    (REQUIRED - Default: 1)
      "amount":    100000  //Item price for this product                          (REQUIRED)
      "payout":    1000     //Commission for this product                         (Optional)
    },
    {
      "item_id":"Product Code / Sku"                                              (IMPORTANT - REQUIRED)
      "item_name": "Product name"                                                 (Optional)
      "category": "category id / category name"                                   (Optinal) - Need to set if advertiser has many campaigns for each category
      "quantity":  2     //The number of item for this product                    (REQUIRED - Default: 1)
      "amount":    100000  //Item price for this product                          (REQUIRED)
      "payout":    1000     //Commission for this product                         (Optional)
    }
    ....
  ]
```
### 3. Response Data
Response can be:
- Code: 400 -  Bad Request
- Code: 403 -  Forbidden
- Code: 401 -  Unathorized
- Code: 404 -  Server Not found
- Code: 408 -  Request Timeout
- Code: 200 -  Success
```javascript
{
    "code": 200,
    "message": "OK",    //Send ok
    "description": "dup_transaction Conversion: 143r45\n Create success conversion: 203423\n No_subscript Conversion: 2134421", 
    "data": [Request Data]
}
```

## Security

If you discover any security related issues, please email [partner@affmates.com](mailto:partner@affmates.com) instead of using the issue tracker.

## Credits

- [Technical Affmates](https://github.com/affmates)
- [Affmates support team](https://affmates.com)

## Alternatives



## License

Affmates Production - @2021

