<?php

$ch=curl_init();
$path = "http://www.facebook.com/feeds/page.php?format=atom10&id=209776365806467";
curl_setopt($ch, CURLOPT_URL,$path);
	curl_setopt($ch, CURLOPT_FAILONERROR,1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 15);
	 curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5);
$result = curl_exec($ch);
curl_close($ch);

$xml = new SimpleXMLElement($result);

var_dump($result);
var_export($xml); exit;

if (empty($result))
    {
    print "Sorry, request failed.";
    }
else
    {
    var_dump($result); exit;

   }