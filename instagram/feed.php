<?php
/**
 * Instagram PHP API example usage.
 * This is the entry point of your application, it will detect whether
 * the user is already authenticated and will present her the login
 * window in case she is not.
 * 
 * If the authentication token is already stored (as a cookie in this case),
 * the user will be redirected to callback.php which is basically the same
 * URI callback that you must set up with Instagram as the return address
 * for your application on their developers section:
 * http://instagr.am/developer/
 * 
 * 
 * If you have any question, check http://mauriciocuenca.com/ for the
 * latest updates
 */
require_once 'api/Instagram.php';

/**
 * Configuration params, make sure to write exactly the ones
 * instagram provide you at http://instagr.am/developer/
 */
$config = array(
        'client_id' => '05e13afcd3d6439fb57afa11fc64ccb7',
        'client_secret' => '1666fc9a74d44502a062e7d2c863856d',
        'grant_type' => 'authorization_code',
        'redirect_uri' => 'http://sfsuperbowl.com/instagram/api/callback.php',
     );

/**
 * This is how a wrong response looks like
 * array(1) { ["InstagramOAuthToken"]=> string(89) "{"code": 400, "error_type": "OAuthException", "error_message": "No matching code found."}" }
 */
session_start();
if (isset($_SESSION['InstagramAccessToken']) && !empty($_SESSION['InstagramAccessToken'])) {
    header('Location: api/callback.php');
    die();
}

// Instantiate the API handler object
$instagram = new Instagram($config);
$instagram->openAuthorizationUrl();