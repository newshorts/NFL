<?php



$abs = dirname(__FILE__);

$document_root = $_SERVER['DOCUMENT_ROOT'];

$url = 'http://' . $_SERVER['HTTP_HOST'] . str_replace($document_root, '', $abs);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', $url . DS);

require_once 'lib/Mobile_Detect.php';

$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');

define('DEVICE_TYPE', $deviceType);

//echo "<pre>";
//print_r($_SERVER);

?>
