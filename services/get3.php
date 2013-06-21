<?php

require_once 'social.php';

sleep(45);

$social = new Social('get3');

$social->get_all();

$social->write_file();

?>
