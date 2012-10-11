<?php


require_once 'social.php';

$social = new Social('get');

$social->get_all();

$social->write_file();

?>
