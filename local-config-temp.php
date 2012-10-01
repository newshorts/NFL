<?php

/*
 *  
 *  UPDATE wp_options SET option_value = replace(option_value, 'http://sfsuperbowl.com', 'http://localhost.com/GSP/clients/NFL') WHERE option_name = 'home' OR option_name = 'siteurl';
 *  UPDATE wp_posts SET guid = replace(guid, 'http://sfsuperbowl.com','http://localhost.com/GSP/clients/NFL');
 *  UPDATE wp_posts SET post_content = replace(post_content, 'http://sfsuperbowl.com', 'http://localhost.com/GSP/clients/NFL');
 * 
 *  SSH:                    ssh bowl_admin@72.47.248.81
 *  P:                      amfootball
 * 
 *  REMOTE GIT EMAIL:       webdev@gspsf.com
 *  REMOTE GIT NAME:        hailmary
 * 
 * 
 *  MySQL:                  http://sfsuperbowl.com/pma/
 *  U:                      sfsb_admin
 *  P:                      superdata
 * 
 *  GIT PUSH/PULL FROM SERVER PASSWORD: hailmary
 * 
 * 
 */

define('DB_NAME', 'sfsb_wordpress');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
?>
