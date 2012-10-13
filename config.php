<?php

$abs = dirname(__FILE__);

$document_root = $_SERVER['DOCUMENT_ROOT'];

$url = 'http://' . $_SERVER['HTTP_HOST'] . str_replace($document_root, '', $abs);

define('ROOT', $url);

//echo "<pre>";
//print_r($_SERVER);

?>
