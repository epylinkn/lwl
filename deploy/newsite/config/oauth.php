<?php
// helpers
function buildBaseString($baseURI, $method, $params)
{
    $r = array(); 
    ksort($params);
    foreach($params as $key=>$value){
        $r[] = "$key=" . rawurlencode($value); 
    }
    return $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r)); 
}

function buildAuthorizationHeader($oauth)
{
    $r = 'Authorization: OAuth '; 
    $values = array(); 
    foreach($oauth as $key=>$value)
        $values[] = "$key=\"" . rawurlencode($value) . "\""; 
    $r .= implode(', ', $values); 
    return $r; 
}

// configs
$url = "https://api.twitter.com/1/statuses/user_timeline.json";

$oauth_access_token = "750348422-gR61JDz8dgoZ0HZiM9GcQQypCN9yWt4AkChXU2D9";
$oauth_access_token_secret = "lL6sNtsXcTDhYEkWmsSaUUIUdP4Y8IrcgJG7f9rvNk";
$consumer_key = "chTQ0VkdZubjl7WpHkyFOg";
$consumer_secret = "z97ZXHosKpWQJczAH7dEoj6QKyBYloq0N1DPWG7JRQ";

$oauth = array( 'oauth_consumer_key' => $consumer_key,
                'oauth_nonce' => time(),
                'oauth_signature_method' => 'HMAC-SHA1',
                'oauth_token' => $oauth_access_token,
                'oauth_timestamp' => time(),
                'oauth_version' => '1.0');
                
$base_info = buildBaseString($url, 'GET', $oauth);
$composite_key = rawurlencode($consumer_secret)
    .'&'.rawurlencode($oauth_access_token_secret);
$oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
$oauth['oauth_signature'] = $oauth_signature;


// request
$header = array(buildAuthorizationHeader($oauth), 'Expect:');
$options = array( CURLOPT_HTTPHEADER => $header,
                  CURLOPT_HEADER => false,
                  CURLOPT_URL => $url,
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_SSL_VERIFYPEER => false);

$feed = curl_init();
curl_setopt_array($feed, $options);
$json = curl_exec($feed);
curl_close($feed);

$twitter_feed = json_decode($json);
// var_dump($json); exit;
// var_dump($twitter_feed); exit;

$combo_feed = array();
$i = 0;
foreach($twitter_feed as $tweet) {
  if($i < 5) {
    array_push($combo_feed,
      array(
        'type' => 'twitter',
        'text' => $tweet->text,
        'link' => "https://twitter.com/liveworkloft/status/".$tweet->id_str,
        'date' => strtotime($tweet->created_at)
      )
    );    
  }
  $i++;
}

// facebook
$url = "http://www.facebook.com/feeds/page.php?format=atom10&id=209776365806467";
$header = array('User-Agent: Mozilla/5.0 (iPad; CPU OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A5355d Safari/8536.25');
$options = array( CURLOPT_URL => $url,
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_HTTPHEADER => $header);

$feed = curl_init();
curl_setopt_array($feed, $options);
$xml = curl_exec($feed);
curl_close($feed);

$fb_feed = simplexml_load_string($xml);

$i = 0;
foreach($fb_feed->entry as $status) {
  if($i < 5) {
    array_push($combo_feed,
      array(
        'type' => 'facebook',
        'text' => strip_tags((string)$status->content),
        'link' => (string)$status->link->attributes()->href,
        'date' => strtotime((string)$status->published)
      )
    );    
  }
  $i++;
}

$dates = array();
foreach ($combo_feed as $key => $row) {
  $dates[$key] = $row['date']; 
}

array_multisort($dates, SORT_DESC, $combo_feed);
$combo_feed = array_slice($combo_feed, 0, 5);


// var_dump($combo_feed);
?>