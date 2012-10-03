<?php
/**
 * Instagram PHP API example usage.
 * This script must be the one receiving the response from
 * instagram's servers after requesting an access token.
 * 
 * For example, if the redirect URI that you set up with instagram
 * is http://example.com/callback.php, this script must be named
 * callback.php and put at the root of your server so the access token
 * can be processed and all the actions executed.
 * 
 * http://example.com/callback.php must be replaced for REDIRECT-URI
 * in the following URI, along with your CLIENT-ID:
 * https://instagram.com/oauth/authorize/?client_id=CLIENT-ID&redirect_uri=REDIRECT-URI&response_type=token
 * https://api.instagram.com/oauth/authorize/?client_id=e8d6b06f7550461e897b45b02d84c23e&redirect_uri=http://mauriciocuenca.com/qnktwit/confirm.php&response_type=code
 */
session_start();
require_once 'Instagram.php';

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

// Instantiate the API handler object
$instagram = new Instagram($config);
$accessToken = $instagram->getAccessToken();

echo $accessToken;

$_SESSION['InstagramAccessToken'] = $accessToken;

$instagram->setAccessToken($_SESSION['InstagramAccessToken']);
$popular = $instagram->getPopularMedia();

// After getting the response, let's iterate the payload
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo $popular;
?>
<?php die(); ?>