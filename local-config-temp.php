<?php

/*
 * 
 *  DB here: http://sfsuperbowl.com/pma/
 *  U: sfsb_admin
 *  P: superdata
 *  
 *  UPDATE wp_options SET option_value = replace(option_value, 'http://old-domain.com', 'http://new-domain.com') WHERE option_name = 'home' OR option_name = 'siteurl';
 *  UPDATE wp_posts SET guid = replace(guid, 'http://old-domain.com','http://new-domain.com');
 *  UPDATE wp_posts SET post_content = replace(post_content, 'http://old-domain.com', 'http://new-domain.com');
 * 
 * 
 */

define('DB_NAME', 'sfsb_wordpress');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
?>
