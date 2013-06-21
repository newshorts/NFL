<?php
//require_once 'Zend/Service/Twitter.php';

//$token = '850078843-its7oIEsjmvlZZHb81feiSrHdA8dXy86RkQHXXoM';
//$t = new Zend_Service_Twitter(array(
//    'username' => 'sfsuperbowl',
//    'accessToken' => $token
//));
//
//$response = $t->user->followers();

//http://api.twitter.com/1/followers/ids.json?cursor=-1&screen_name=sfsuperbowl

function get_twitter_followers($url) {
    $json_string = @file_get_contents($url);
    $json = json_decode($json_string, true);

    if($this->debug) {
        echo '<pre> twitter followers: ';
        print_r($json);
    }

    return intval( count($json['ids']) );
}

//echo "<pre>";
//print_r($response);

echo get_twitter_followers('http://api.twitter.com/1/followers/ids.json?cursor=-1&screen_name=sfsuperbowl');

?>