<?php

//define('ROOT', $_SERVER['REQUEST_URI']);

$abs = dirname(__FILE__);

$document_root = $_SERVER['DOCUMENT_ROOT'];

$url = 'http://' . $_SERVER['HTTP_HOST'] . str_replace($document_root, '', $abs);

define('ROOT', $url);

//echo ROOT;

//echo pathinfo($_SERVER['REQUEST_URI'], PATHINFO_DIRNAME);
//
//define('ROOT', 'http://' . $_SERVER['HTTP_HOST'] . pathinfo($_SERVER['REQUEST_URI'], PATHINFO_DIRNAME));
////
//echo "<pre>";
//print_r($_SERVER);
//echo __DIR__;

//
//echo 'http://' . $_SERVER['HTTP_HOST'] . pathinfo($_SERVER['REQUEST_URI'], PATHINFO_DIRNAME);

?>
