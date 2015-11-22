<?php
    
//echo "<h2>Simple Twitter API Test</h2>";
require_once('twitter-api-php-master/TwitterAPIExchange.php'); 
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "258896969-icTTQhd6zazoH1O35LjQtHIKZeInkRFNg9pjW30p",
    'oauth_access_token_secret' => "lsS8QY41HjCHdYn1r1WiOiTgaA3xDSY6qQJGqQf6gl3HZ",
    'consumer_key' => "mJafYkBgWmAauA3IMHmGIli7A",
    'consumer_secret' => "thgZxUUL7irXcGP7UKYlt3gcdHk8Dy1Zsk2uBa4uBpPeo8JPhm"
);
$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$requestMethod = "GET";
if (isset($_GET['user']))  {$user = $_GET['user'];}  else {$user  = "cnnbrk";}
if (isset($_GET['count'])) {$count = $_GET['count'];} else {$count = 1;}
$getfield = "?screen_name=$user&count=$count";

$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);
if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
foreach($string as $items)
    {
        //echo "Tweet: ". $items['text']."<br />";
        //echo  $items['text']."<br />";
        //echo chop($items['text'], "https://t.co/lTZJKDZ9EO");
            $news = chop($items['text'], "https://t.co/lTZJKDZ9EO");
           //echo $news;
        //

    }
   // now greet the caller
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
	<Say>Aswathy</Say>
    <Say>Hello <?php echo $news ?>.</Say>
   
</Response>
