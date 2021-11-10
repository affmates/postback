string publisherClickId = "";
publisherClickId = Request.Cookies["userName"].Value;  

string token = "_TOKEN_";
var client = new RestClient("https://postback.affmates.com/adv/conversion");
var request = new RestRequest(Method.PUT);
request.AddHeader("cache-control", "no-cache");
request.AddHeader("content-type", "application/json");
request.AddHeader("authorization", "Bear "+token);
request.AddParameter("application/json", "{\"conversion_id\": \"ORD002\",\"create_time\": \"2021-10-25 00:45:00\",\"publisher_click_id\": "+publisherClickId+",\"customer\": \"NEW\",\"campaign\":\"cps\",\"items\": [{\"item_id\":\"item002\",\"item_name\":\"Product 001\",\"category\":\"Cate01\",\"quantity\":1,\"amount\":10000,\"payout\":1000},{\"item_id\":\"item004\",\"item_name\":\"Product 002\",\"category\":\"Cate01\",\"quantity\":1,\"amount\":20000,\"payout\":2000}}", ParameterType.RequestBody);
IRestResponse response = client.Execute(request);

/** JSON data format 
  {
	"conversion_id": "ORD002",
	"create_time": "2021-10-25 00:45:00",
	"publisher_click_id": "admaster",
	"customer": "NEW",
	"campaign":"cps",
	"items": [
		{
			"item_id":"item002",
			"item_name":"Product 001",
			"category":"Cate01",
			"quantity":1,
			"amount":10000,
			"payout":1000
		},
		{
			"item_id":"item004",
			"item_name":"Product 002",
			"category":"Cate01",
			"quantity":1,
			"amount":20000,
			"payout":2000
		}
	]
}
**/
