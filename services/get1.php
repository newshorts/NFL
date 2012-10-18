<?php

require_once 'social.php';

// changed to 30 seconds to go lighter on the api polling
sleep(15);

$social = new Social('get1');

$social->get_all();

$social->write_file();

?>
