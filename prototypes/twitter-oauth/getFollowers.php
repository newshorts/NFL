<?php
require_once '../../services/Zend/Service/Twitter.php';

$token = '850078843-its7oIEsjmvlZZHb81feiSrHdA8dXy86RkQHXXoM';
$t = new Zend_Service_Twitter(array(
    'username' => 'SFSuperbowl',
    'accessToken' => $token
));

$response = $t->user->followers();

echo "<pre>";
print_r($response);

?>