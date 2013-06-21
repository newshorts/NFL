<?php
require_once 'twitterTracker.php';
require_once 'twitteroauth/twitteroauth.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

define('CONSUMER_KEY', 'ztPcwPFJZ9RrFHK3Em4Nw');
define('CONSUMER_SECRET', '0f7pDbnRg1y8aFrCTj1gGHTKYg69TMlu7q65UR4TABM');
define('OAUTH_CALLBACK', 'http://example.com/twitteroauth/callback.php');

class Social {

    public $filename;
    protected $output = Array();
    
    private $debug = false;
    
    protected $twitter;
    
    public function __construct($filename = 'get') {
        $this->filename = $filename;
        
        //$tag = '#iwearshortscas+OR+#iwearshortscasbah';
        // do not pass tags to twitter tracker
        $this->twitter = new TwitterTracker();
        
    }
    
    public function get_all() {
        
        $pluses = $this->get_plusones('http://www.sfsuperbowl.com/');
        
        $google_statuses = $this->get_google_statuses();
        
        $tweets = $this->get_tweets();
        
        $latest_tweet = $this->get_tweet();
        
        $twitter_followers = $this->get_twitter_followers('sfsuperbowl');
        
        $twitter_total = $tweets + $twitter_followers;
        
        $likes_facebook = $this->get_likes_facebook();
        
        $likes_sfsuperbowl = $this->get_likes_sfsuperbowl('http://www.sfsuperbowl.com/');
        
        $likes_combined = $likes_facebook + $likes_sfsuperbowl;
        
        $photos[] = $this->get_instagram_photos('sfsuperbowl');
        
        //  TODO: this shouldnt have to call instagram again
        $insta = $this->get_instagram_count('sfsuperbowl');
        
        $fb_statuses = $this->get_facebook_statuses();
        
        $gfb = $pluses + $likes_facebook + $likes_sfsuperbowl;
        
        $total = $gfb + $twitter_total + $insta;
        
        $this->output = Array(
                            'google' => $pluses,
                            'google_statuses' => $google_statuses,
                            'twitter' => $tweets,
                            'twitter_followers' => $twitter_followers,
                            'twitter_total' => $twitter_total,
                            'latest_tweet' => $latest_tweet,
                            'facebook_likes_facebook' => $likes_facebook,
                            'facebook_likes_sfsuperbowl' => $likes_sfsuperbowl,
                            'facebook_likes_combined' => $likes_combined,
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
    
    private function get_likes_facebook() {
        $json_string = @file_get_contents('http://graph.facebook.com/sfsuperbowl');
        $json = json_decode($json_string, true);
        
        if($this->debug) {
            echo '<pre> Facebook likes on facebook: ';
            print_r($json);
        }
        
        return intval( $json['likes'] );
    }
    
    //https://graph.facebook.com/?ids=http://sfsuperbowl.com/
    
    private function get_likes_sfsuperbowl($url) {
        $json_string = @file_get_contents('http://graph.facebook.com/?ids=' . $url);
        $json = json_decode($json_string, true);
        
        if($this->debug) {
            echo '<pre> Facebook likes on sfsuperbowl: ';
            print_r($json);
        }
        
        return intval( $json[$url]['shares'] );
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
        
        
        if($this->debug) {
            echo '<pre> Google Plus ones: ';
            print_r($json);
        }
        
        return intval( ($json[0]['result']['metadata']['globalCounts']['count']) + 28 );
    }
    
    private function get_google_statuses() {
        // api key: AIzaSyBHW-NafE0H1igaSWyAktBw8ADlkDkC8Dc
        // url: https://www.googleapis.com/plus/v1/people/116535953378851378506/activities/public?key={YOUR_API_KEY}
        $json_string = file_get_contents('https://www.googleapis.com/plus/v1/people/116535953378851378506/activities/public?key=AIzaSyBHW-NafE0H1igaSWyAktBw8ADlkDkC8Dc');
        $json = json_decode($json_string, true);
        
        if($this->debug) {
            echo '<pre> Google statuses: ';
            print_r($json);
        }
        
        return $json;
    }
    
    private function get_instagram_count($tag) {
        //https://api.instagram.com/v1/tags/search?q=snow&access_token=231409256.05e13af.c3f64f166e634b1c967cc819f12061d9
//        $json_string = file_get_contents('https://api.instagram.com/v1/tags/search?q='.$tag.'&access_token=231409256.05e13af.c3f64f166e634b1c967cc819f12061d9');
        $json_string = file_get_contents('https://api.instagram.com/v1/tags/'.$tag.'?access_token=231409256.05e13af.c3f64f166e634b1c967cc819f12061d9');
        $json = json_decode($json_string, true);
        
        if($this->debug) {
            echo '<pre> instagram photo count: ';
            print_r($json);
        }
        
        return intval( $json['data']['media_count'] );
    }
    
    private function get_instagram_photos($tag) {
        //snow/media/recent?access_token=231409256.05e13af.c3f64f166e634b1c967cc819f12061d9
        $json_string = file_get_contents('https://api.instagram.com/v1/tags/'.$tag.'/media/recent?access_token=231409256.05e13af.c3f64f166e634b1c967cc819f12061d9');
        $json = json_decode($json_string, true);
        
        if($this->debug) {
            echo '<pre> instagram photos: ';
            print_r($json);
        }
        
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
        
        if($this->debug) {
            echo '<pre> Facebook statuses: ';
            print_r($json);
        }
        
        return $json;
        
    }
    
    private function get_twitter_followers($user) {
        $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, '850078843-its7oIEsjmvlZZHb81feiSrHdA8dXy86RkQHXXoM', 'OCIrXAJ8y6Q5hFpEiFSWy6SuF6EA00vPJ3nF12gv8');

        $rate_limit = $connection->get('account/rate_limit_status');
        $output = $connection->get('followers/ids');

        //print_r($rate_limit);
        if($this->debug) {
            echo "rate limit: ". $rate_limit->hourly_limit ." hits remaining: ".$rate_limit->remaining_hits . " \r\n count: ".intval(count($output->ids))." \r\n <pre> ";
            print_r($output);
        }
        
        return intval(count($output->ids));
    }
}

?>