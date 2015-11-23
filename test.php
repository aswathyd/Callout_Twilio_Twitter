<?php
    
require_once('twitter-api-php-master/TwitterAPIExchange.php'); 

/** Setting twitter access tokens here **/
$settings = array(
    'oauth_access_token' => "258896969-icTTQhd6zazoH1O35LjQtHIKZeInkRFNg9pjW30p",
    'oauth_access_token_secret' => "lsS8QY41HjCHdYn1r1WiOiTgaA3xDSY6qQJGqQf6gl3HZ",
    'consumer_key' => "mJafYkBgWmAauA3IMHmGIli7A",
    'consumer_secret' => "thgZxUUL7irXcGP7UKYlt3gcdHk8Dy1Zsk2uBa4uBpPeo8JPhm"
);

/**  Creating api string with the URL **/
$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";

/**  Getting information from server**/
$requestMethod = "GET";
if (isset($_GET['user']))  {$user = $_GET['user'];}  else {$user  = "cnnbrk";}
if (isset($_GET['count'])) {$count = $_GET['count'];} else {$count = 1;}
/** Connecting to twitter api and getting single latest headline from twitter (@cnnbrk) **/
$getfield = "?screen_name=$user&count=$count";

/** Converting headline tweet to an associative array using the json_decode function **/
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);
if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
foreach($string as $items)
    {
        $param=". ";
        $str= $items['text'];
        /** Removing urls from tweet and outputting just the headline **/
        $pos = strpos($str, $param);
        $endpoint = $pos + strlen($param);
        $newStr = substr($str,0,$endpoint );

    }

   // Now greet the caller and speak the latest headline
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
	<Say>Aswathy</Say>
    <Say>Hello latest headline of this hour is <?php echo $newStr ?>.</Say>
</Response>
