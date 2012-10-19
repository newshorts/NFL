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

function is_home($current) {
//    return ($request == 'http://sfsuperbowl.com' || strpos($request, 'localhost')) ? 'true' : 'false';
//    $isHome = ($_SERVER['REQUEST_URI']);
//    return $isHome;

//    $current = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    
    $remote1 = 'http://sfsuperbowl.com/';
    $remote2 = 'http://sfsuperbowl.com';
    $remote3 = 'http://sfsuperbowl.com/index.php';
    
    if($current === $remote1 || $current === $remote2 || $current === $remote3) {
        return true;
    }
    
    $local1 = 'http://localhost.com/GSP/clients/NFL/';
    $local2 = 'http://localhost/GSP/clients/NFL/';
    
    if($current === $local1 || $current === $local2) {
        return true;
    }
    
    return false;
}

function is_instagram($request) {
    return strpos($request, 'instagram');
}

function is_tweets($request) {
    return strpos($request, 'tweets');
}

function is_supporters($request) {
    return strpos($request, 'supporters');
}

function is_movement($request) {
    return strpos($request, 'movement');
}



/* setcookie("sfsuperbowlintro", true); */



//echo "<pre>";
//print_r($_SERVER);

?>
