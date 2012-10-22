<?php
function get_likes_sfsuperbowl($url) {
    $json_string = @file_get_contents('http://graph.facebook.com/?ids=' . $url);
    $json = json_decode($json_string, true);
    echo '<pre>';
    print_r($json);
    return intval( $json[$url]['shares'] );
}

var_dump(get_likes_sfsuperbowl('http://www.sfsuperbowl.com/'));
?>
