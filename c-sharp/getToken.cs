string app_key = "_APP_KEY_";
string app_secret = "_APP_SECRET_";

var client = new RestClient("https://postback.affmates.com/adv/token");
var request = new RestRequest(Method.POST);
request.AddHeader("cache-control", "no-cache");
request.AddHeader("content-type", "application/json");
request.AddHeader("password", app_secret);
request.AddHeader("username", app_key);
IRestResponse response = client.Execute(request);
