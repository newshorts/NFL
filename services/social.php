<?php
require_once 'twitterTracker.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Social {

    public $filename;
    protected $output = Array();
    
    protected $twitter;
    
    public function __construct($filename = 'get') {
        $this->filename = $filename;
        
        $this->twitter = new TwitterTracker();
        
    }
    
    public function get_all() {
        
        $pluses = $this->get_plusones('http://www.sfsuperbowl.com/');
        
        $google_statuses = $this->get_google_statuses();
        
        $tweets = $this->get_tweets();
        
        $latest_tweet = $this->get_tweet();
        
        $likes = $this->get_likes();
        
        $insta = $this->get_instagram_count('sfsuperbowl');
        $insta += $this->get_instagram_count('sfsuper');
        
        $photos[] = $this->get_instagram_photos('sfsuperbowl');
        $photos[] =  $this->get_instagram_photos('sfsuper');
        
        $fb_statuses = $this->get_facebook_statuses();
        
        $gfb = $pluses + $likes;
        
        $total = $pluses + $tweets + $likes + $insta;
        
        $this->output = Array(
                            'google' => $pluses,
                            'google_statuses' => $google_statuses,
                            'twitter' => $tweets,
                            'latest_tweet' => $latest_tweet,
                            'facebook' => $likes,
                            'facebook_statuses' => $fb_statuses,
                            'instagram' => $insta,
                            'photos' => $photos,
                            'gfb' => $gfb,
                            'total' => $total,
                            'filename' => $this->filename,
                            'usingClass' => 'true'
                        );
      
        $this->output = json_encode(Array('output' => $this->output));
    }
    
    public function write_file() {
        return file_put_contents('output.json', $this->output);
    }
    
    private function get_tweet() {
        $latest_tweet = $this->twitter->getLatestTweet();
        
//        echo '<pre>';
//        print_r($latest_tweet);
//        
        return $latest_tweet;
    }
    
    private function get_tweets() {
//        $json_string = file_get_contents('http://urls.api.twitter.com/1/urls/count.json?url=' . $url);
//        $json_string = file_get_contents('http://otter.topsy.com/searchcount.json?q=sfsuperbowl&apikey=EA7FB3A842894C08B31348305D339A8E');
//        $json = json_decode($json_string, true);
//        
//        return intval( $json['response']['a'] );

        $count = $this->twitter->getTagCount();
        return intval($count['tweet_count']);
    }
    
    private function get_likes() {
        $json_string = @file_get_contents('http://graph.facebook.com/sfsuperbowl');
        $json = json_decode($json_string, true);
        return intval( $json['likes'] );
    }
    
    private function get_plusones($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://clients6.google.com/rpc");
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        $curl_results = curl_exec ($curl);
        curl_close ($curl);

        $json = json_decode($curl_results, true);
        return intval( $json[0]['result']['metadata']['globalCounts']['count'] );
    }
    
    private function get_google_statuses() {
        // api key: AIzaSyBHW-NafE0H1igaSWyAktBw8ADlkDkC8Dc
        // url: https://www.googleapis.com/plus/v1/people/116535953378851378506/activities/public?key={YOUR_API_KEY}
        $json_string = file_get_contents('https://www.googleapis.com/plus/v1/people/116535953378851378506/activities/public?key=AIzaSyBHW-NafE0H1igaSWyAktBw8ADlkDkC8Dc');
        $json = json_decode($json_string, true);
        return $json;
    }
    
    private function get_instagram_count($tag) {
        //https://api.instagram.com/v1/tags/search?q=snow&access_token=231409256.05e13af.c3f64f166e634b1c967cc819f12061d9
//        $json_string = file_get_contents('https://api.instagram.com/v1/tags/search?q='.$tag.'&access_token=231409256.05e13af.c3f64f166e634b1c967cc819f12061d9');
        $json_string = file_get_contents('https://api.instagram.com/v1/tags/'.$tag.'?access_token=231409256.05e13af.c3f64f166e634b1c967cc819f12061d9');
        $json = json_decode($json_string, true);
        return intval( $json['data']['media_count'] );
    }
    
    private function get_instagram_photos($tag) {
        //snow/media/recent?access_token=231409256.05e13af.c3f64f166e634b1c967cc819f12061d9
        $json_string = file_get_contents('https://api.instagram.com/v1/tags/'.$tag.'/media/recent?access_token=231409256.05e13af.c3f64f166e634b1c967cc819f12061d9');
        $json = json_decode($json_string, true);
        return $json;
    }
    
    private function get_facebook_statuses() {
        $qry_str = "?format=json&id=234250320035133";
        $ch = curl_init();

        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        // Set query data here with the URL
        curl_setopt($ch, CURLOPT_URL, 'https://www.facebook.com/feeds/page.php' . $qry_str); 

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, '3');
        $content = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($content, true);
        return $json;
        
    }
}

?>