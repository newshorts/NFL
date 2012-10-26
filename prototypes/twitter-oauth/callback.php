<?php
require_once '../../services/Zend/Service/Twitter.php';

// twitter includes a oauth tool to grab access tokens now...so I never finished this

$config = array(
    'callbackUrl' => 'http://www.sfsuperbowl.com/prototypes/twitter-oauth/callback.php',
    'siteUrl' => 'http://twitter.com/oauth',
    'consumerKey' => 'ztPcwPFJZ9RrFHK3Em4Nw',
    'consumerSecret' => '0f7pDbnRg1y8aFrCTj1gGHTKYg69TMlu7q65UR4TABM'
);
$consumer = new Zend_Oauth_Consumer($config);
 
if (!empty($_GET) && isset($_SESSION['TWITTER_REQUEST_TOKEN'])) {
    $token = $consumer->getAccessToken(
                 $_GET,
                 unserialize($_SESSION['TWITTER_REQUEST_TOKEN'])
             );
    
    print_r($token);
    
    $_SESSION['TWITTER_ACCESS_TOKEN'] = serialize($token);
 
    // Now that we have an Access Token, we can discard the Request Token
    $_SESSION['TWITTER_REQUEST_TOKEN'] = null;
} else {
    // Mistaken request? Some malfeasant trying something?
    exit('Invalid callback request. Oops. Sorry.');
}

?>