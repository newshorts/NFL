<?php


require_once 'social.php';

$social = new Social('get');

$social->get_all();

$social->write_file();


////if(isset($_GET['type'])) {
//    
//    $output;
//    $type = 'output';
//    
//    sleep(0);
//    
//    switch($_GET['type']) {
//        case 'twitter':
//            $output = get_tweets('http://techcrunch.com/');
//            break;
//        case 'facebook':
//            $output = get_likes();
//            break;
//        case 'google':
//            $output = get_plusones('http://techcrunch.com/');
//            break;
//        case 'all':
//            $output[] = get_plusones('http://techcrunch.com/');
//            $output[] = get_tweets('http://techcrunch.com/');
//            $output[] = get_likes();
//            break;
//        default:
//            $output[] = Array('google' => get_plusones('http://techcrunch.com/'));
//            $output[] = Array('twitter' => get_tweets('http://techcrunch.com/'));
//            $output[] = Array('facebook' => get_likes());
//            $output[] = Array('phpfile' => 'get');
//            break;
//    }
//    
//    if(!empty($_GET['type'])) {
//        $type = $_GET['type'];
//    }
//    
//    $output = json_encode(Array($type => $output));
//    
//    file_put_contents('output.json', $output);
//    
//    sleep(5);
//    
//    $contents = file_get_contents('output.json');
//    
////    print_r(json_decode($contents));
//    
////    header('Cache-Control: no-cache, must-revalidate');
////    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
////    header('Content-type: application/json');
////    echo $output;
////}
//
//// pulling tech crunch
//function get_tweets($url) {
// 
//    $json_string = file_get_contents('http://urls.api.twitter.com/1/urls/count.json?url=' . $url);
//    $json = json_decode($json_string, true);
////    echo "<pre>";
////    print_r($json);
//    
//    return intval( $json['count'] );
//}
// 
//// currently pulling sonic
//function get_likes() {
// 
////    $json_string = file_get_contents('http://graph.facebook.com/?ids=' . $url);
//
//    $json_string = file_get_contents('https://graph.facebook.com/sonicdrivein');
//    $json = json_decode($json_string, true);
////    echo "<pre>";
////    print_r($json);
// 
//    return intval( $json['likes'] );
//
//}
//
//function get_plusones($url) {
//
//    $curl = curl_init();
//    curl_setopt($curl, CURLOPT_URL, "https://clients6.google.com/rpc");
//    curl_setopt($curl, CURLOPT_POST, 1);
//    curl_setopt($curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
//    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
//    $curl_results = curl_exec ($curl);
//    curl_close ($curl);
// 
//    $json = json_decode($curl_results, true);
////    echo "<pre>";
////    print_r($json);
//    
//    return intval( $json[0]['result']['metadata']['globalCounts']['count'] );
//
//}
//
////echo "<p>google: " . get_plusones('http://techcrunch.com/') . "</p>";
////echo "<p>facebook: " . get_likes() . "</p>";
////echo "<p>twitter: " . get_tweets('http://techcrunch.com/') . "</p>";

?>
