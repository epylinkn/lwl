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

$oauth_access_token = "894059593-qOf9gHWU2NcqZqVYAoGS9tXpyUYgPJsqUDd4HJyd";
$oauth_access_token_secret = "bAHKvyurOrXvc8bOxiLgvUK63upt8AO6D6xn3tDkfI";
$consumer_key = "pgxzuq0qOKLs0krpaiTdwQ";
$consumer_secret = "2hKqcNwieBviRFIxci0Jpkvo6saosKLzCbGuRrMnsg";

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

// var_dump($json);

$combo_feed = array();
// foreach($twitter_feed as $tweet) {
//   array_push($combo_feed,
//     array(
//       'type' => 'twitter',
//       'text' => $tweet->text,
//       'link' => "https://twitter.com/topple_it/status/".$tweet->id_str
//     )
//   );
// }

// 1. parse twitter date (of 5 lastest posts)
// 2. parse facebook date of 5 latest posts
// 3. merge arrays
// 4. sort! base on date field
// 5. chop 5

// fake it for testing
array_push($combo_feed,
  array(
    'type' => 'twitter',
    'text' => 'the brown fox jumped over the lazy dog. the brown fox jumped over the lazy dog. the brown fox jumped over the lazy dog. the brown fox jumped over the lazy dog. the brown fox jumped over the lazy dog. the brown fox jumped over the lazy dog. the brown fox jumped over the lazy dog. the brown fox jumped over the lazy dog.',
    'link' => "https://twitter.com/"
  )
);
array_push($combo_feed,
  array(
    'type' => 'twitter',
    'text' => 'Live Work Loft is dedicated to delivering top notch creative spaces in Los Angeles to the thought leaders of the world. We aim for the unique; anything that is comparable to the status quo is unacceptable.',
    'link' => "https://twitter.com/"
  )
);
array_push($combo_feed,
  array(
    'type' => 'twitter',
    'text' => 'Live Work Loft is holymoly guacamlioe kung fu longwoooooooord to delivering top notch creative spaces in Los Angeles to the thought leaders of the world. We aim for the unique; anything that is comparable to the status quo is unacceptable.',
    'link' => "https://twitter.com/"
  )
);


// var_dump($combo_feed);


// other testing stuff

// var_dump($twitter_data[0]->created_at);
// var_dump($twitter_data[0]->text);

// combine to get top 5 feeds
// $combo_feed = array_slice($twitter_feed, 0, 5);


?>