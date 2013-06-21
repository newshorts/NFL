<?php
require_once 'twitteroauth/twitteroauth.php';
/**
 *  For reference:
 * 
 *  $output = curl --get 'https://api.twitter.com/1.1/followers/ids.json' --data 'cursor=-1&screen_name=sfsuperbowl' --header 'Authorization: OAuth oauth_consumer_key="ztPcwPFJZ9RrFHK3Em4Nw", oauth_nonce="a40b40d6b366c51341165879a26c8274", oauth_signature="NKw9U53jM8sJhELeKwSxLxg%2FYp8%3D", oauth_signature_method="HMAC-SHA1", oauth_timestamp="'.$time.'", oauth_token="850078843-its7oIEsjmvlZZHb81feiSrHdA8dXy86RkQHXXoM", oauth_version="1.0"' --verbose;
 */

/**
 * @file
 * A single location to store configuration.
 */

define('CONSUMER_KEY', 'ztPcwPFJZ9RrFHK3Em4Nw');
define('CONSUMER_SECRET', '0f7pDbnRg1y8aFrCTj1gGHTKYg69TMlu7q65UR4TABM');
define('OAUTH_CALLBACK', 'http://example.com/twitteroauth/callback.php');

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, '850078843-its7oIEsjmvlZZHb81feiSrHdA8dXy86RkQHXXoM', 'OCIrXAJ8y6Q5hFpEiFSWy6SuF6EA00vPJ3nF12gv8');

$rate_limit = $connection->get('account/rate_limit_status');
$output = $connection->get('followers/ids');

//print_r($rate_limit);

echo "rate limit: ". $rate_limit->hourly_limit ." hits remaining: ".$rate_limit->remaining_hits." \r\n <pre> ";

print_r($output);


//function get_twitter_followers($user) {
//
//    // set vars
//    $time = time();
//    $consumer_key = 'ztPcwPFJZ9RrFHK3Em4Nw';
//    $oauth_token = '850078843-its7oIEsjmvlZZHb81feiSrHdA8dXy86RkQHXXoM';
//    $oauth_token_secret = 'OCIrXAJ8y6Q5hFpEiFSWy6SuF6EA00vPJ3nF12gv8';
//    $oauth_version = '1.0';
//    $oauth_signature_method = 'HMAC-SHA1';
//    
//    // nonce
//    $nonce = posix_getpid() . microtime() . mt_rand();
//    $oauth_nonce = base64_encode($nonce);
//    
//    // generate signature base string
//    $parameter_string = 'cursor='.  rawurlencode('-1').'&oauth_consumer_key='.rawurlencode($consumer_key).'&oauth_nonce='.rawurlencode($oauth_nonce).'&oauth_signature_method='.  rawurlencode($oauth_signature_method).'&oauth_timestamp='.rawurlencode($time).'&oauth_token='.rawurlencode($oauth_token).'&oauth_version='.  rawurlencode($oauth_version).'&screen_name=' . rawurlencode($user);
//    $signature_base_string = 'GET&'. rawurlencode('https://api.twitter.com/1.1/followers/ids.json') . '&' . rawurlencode($parameter_string);
//    
//    // generate signature
//    $e_consumer_key = rawurldecode($consumer_key);
//    $e_oauth_token_secret = rawurldecode($oauth_token_secret);
//    $signing_key = $e_consumer_key . '&' . $e_oauth_token_secret;
//    $oauth_signature = base64_encode(hash_hmac('sha1', $signature_base_string, $signing_key));
//    
//    echo '<pre>';
//    echo 'timestamp: ' . $time;
//    echo "\n\r";
//    echo 'signing key: ' . $signing_key;
//    echo "\n\r";
//    echo 'oauth signature: ' . $oauth_signature;
//    echo "\n\r";
//    echo 'nonce: ' . $nonce;
//    echo "\n\r";
//    echo 'oauth nonce: ' . $oauth_nonce;
//    echo "\n\r";
//    echo '$paremeter string: ' . $parameter_string;
//    echo "\n\r";
//    echo 'signature base string: ' . $signature_base_string;
//
//    // query
//    $qry_str = '?cursor=-1&screen_name=' . $user;
////
//    $ch = curl_init();
////
//    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
//    curl_setopt($ch,CURLOPT_HTTPHEADER,array('Authorization: OAuth oauth_consumer_key="'.$consumer_key.'", oauth_nonce="'.$oauth_nonce.'", oauth_signature="'.$oauth_signature.'", oauth_signature_method="HMAC-SHA1", oauth_timestamp="'.$time.'", oauth_token="'.$oauth_token.'", oauth_version="1.0"'));
////
//    curl_setopt($ch, CURLOPT_URL, 'https://api.twitter.com/1.1/followers/ids.json' . $qry_str);
////
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($ch, CURLOPT_TIMEOUT, '3');
//    $content = curl_exec($ch);
//    curl_close($ch);
////
////    if($this->debug) {
////        echo '<pre> Facebook statuses: ';
////        print_r($json);
////    }
////
////
//    $json = json_decode($content, true);
//    return $json;
//
//
//
//}

//print_r(get_twitter_followers('sfsuperbowl'));
?>
