<?php

require './src/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '528131467203710',
  'secret' => '049695b0d8441e9c1e9e8d78bacb1e1a',
));

// Get User ID
$user = $facebook->getUser();

echo "<pre>\n";
print_r($user);

?>