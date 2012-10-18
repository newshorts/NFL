<?php

//setcookie("PHPSESSID",$_COOKIE['PHPSESSID'],time()+1800);

$abs = dirname(__FILE__);

$document_root = $_SERVER['DOCUMENT_ROOT'];

$url = 'http://' . $_SERVER['HTTP_HOST'] . str_replace($document_root, '', $abs);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', $url . DS);

require_once 'lib/Mobile_Detect.php';

$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');

define('DEVICE_TYPE', $deviceType);

function is_home() {
    return ($request == 'http://sfsuperbowl.com' || strpos($request, 'localhost')) ? 'true' : 'false';
}

function is_instagram() {
    return strpos($request, 'instagram');
}

function is_tweets() {
    return strpos($request, 'tweets');
}

function is_supporters() {
    return strpos($request, 'supporters');
}

function is_movement() {
    return strpos($request, 'movement');
}



/* setcookie("sfsuperbowlintro", true); */



//echo "<pre>";
//print_r($_SERVER);

?>
