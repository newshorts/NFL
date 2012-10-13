<?php

// poll the facebook id: http://graph.facebook.com/234250320035133/feed 

// could be this as well: http://graph.facebook.com/369308779814605/feed

function get($id) {
    $json_string = file_get_contents('http://graph.facebook.com/'.$id.'/feed');
    $json = json_decode($json_string, true);
    return $json;
//    return intval( $json['likes'] );
}

$id = array(369308779814605, 234250320035133);

echo "<pre>";
foreach($ids as $id) {
    echo '\n for ID: ' . $id . '\n';
    print_r(get($id));
}

?>
