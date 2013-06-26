<?php
require_once 'Zend/Db.php';
require_once 'Zend/Service/Twitter/Search.php';

require_once ('codebird.php');

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   Zend_Feed
 * 
 * 
 */

/**
 * Twitter Tracking Base Class
 *
 * @copyright Copyright (c) 2012 Michael Newell (http://iwearshorts.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   TwitterTracker
 * 
 */
class TwitterTracker {
    
    /**
     * Database table name
     * @access private
     * @var string
     */
    private $table_name;
    
    /**
     * Database objection reference
     * @access private
     * @var object
     */
    private $db;
    
    /**
     * Twitter search
     * @access private
     * @var object
     */
    private $ts;
    
    /**
     * @deprecated - in favor of keeping things separate
     * 
     * Twitter zend extension
     * @access private
     * @var object
     */
    private $t;
    
    private $bearer_token;
    private $cb;
    
    /**
     * Construct
     * @access public
     */
    public function __construct() {
        
        // detect server environment
        $root = $_SERVER['DOCUMENT_ROOT'];
        
        $is_local = (strpos($root, 'XAMPP')) ? true : false;
        
        // db
        $options = array(
            Zend_Db::ALLOW_SERIALIZATION => false
        );
        
        $params = array(
            'host'           => 'localhost',
            'username'       => 'sfsb_admin',
            'password'       => 'superdata',
            'dbname'         => 'twitter_tracker',
            'options'        => $options
        );
        
        if($is_local) {
            $params = array(
                'host'           => 'localhost',
                'username'       => 'root',
                'password'       => '',
                'dbname'         => 'twitter_tracker',
                'options'        => $options
            );
        }

        try {
            $this->db = Zend_Db::factory('Pdo_Mysql', $params);
            $this->db->getConnection();
        } catch (Zend_Db_Adapter_Exception $e) {
            // perhaps a failed login credential, or perhaps the RDBMS is not running
            if($is_local) {
//                echo 'failed login credentials\n';
                print_r($e);
            }
        } catch (Zend_Exception $e) {
            // perhaps factory() failed to load the specified Adapter class
            if($is_local) {
//                echo 'failed to load specified adapter class\n';
                print_r($e);
            }
        }
        
        $this->table_name = 'tweets';
        
        // twitter
        // DEPRECATED
//        $this->ts   = new Zend_Service_Twitter_Search('json');
        
        // codebird - for search
        // NOTE: I will try with alex to make this work first, if it's not possible to upgrade php to 5.3 then I will write my own library referencing this:
        // https://github.com/thatericsmith/simple-php-twitter-getter/blob/master/TwitterGetter.php
        \Codebird\Codebird::setConsumerKey('Mr3tmdYJtDUBHFCIi0tPQw', 'yPFzdcuzEj0fc8jwuzrE4LdJhmNGnaiqlfv8aOVwGRU'); // static, see 'Using multiple Codebird instances'
        $cb = \Codebird\Codebird::getInstance();
        $cb->setToken('850078843-rKjQFWOzZzPSUCdEyQIJOHvQo6Yna1ohGP8El83K', 'wE6HRo7mPguFT7atpJGHURUccuW5kXYKvLa1WevS0Y');
        $this->cb = $cb;
        
        $file = "bearer.txt";
        if(file_exists($file)) {
//            echo "using " . $file;
//            echo '<br />';
            $bearer_token = file_get_contents($file);
//            echo "using b token: " . $bearer_token;
//            echo '<br />';
            \Codebird\Codebird::setBearerToken($bearer_token);
        } else {
//            echo "getting new bearer token";
//            echo '<br />';
            $reply = $this->cb->oauth2_token();
            $bearer_token = $reply->access_token;
//            echo "setting new bearer toekn to file: " . $bearer_token;
//            echo '<br />';
            file_put_contents($file, $bearer_token);
        }
        
        $this->bearer_token = $bearer_token;
            
    }
    
    /**
     * Insert an object to the db
     * @access private
     * @param integer $tid a twitter id (required)
     * @return boolean 
     */	
    private function insert($tweet) {
        
//        $result = $this->checkTID($tweet['tid']); 
        
//        if(empty($result)) {
            $data = array(
                'tid' => $tweet['tid'],
                'tag_name' => $tweet['tag_name'],
                'profile_img' => $tweet['profile_img'],
                'name' => $tweet['name'],
                'username' => $tweet['username'],
                'text' => $tweet['text']
            );
            return $this->db->insert($this->table_name, $data);
//        }
        
//        return false;
    }
    
    /**
     * Check for a twitter id in the database
     * @access private
     * @param integer $tid a twitter id(required)
     * @return boolean 
     */	
    private function checkTID($tid) {
        $this->db->setFetchMode(Zend_Db::FETCH_OBJ);
        
        $result = $this->db->fetchAll('SELECT * FROM '.$this->table_name.' WHERE tid = ?', $tid);
        
        return $result;
        
    }
    
    /**
     * loop through each tweet in the array and check the db for a new tweet
     * @access protected
     * @return json 
     */
    protected function checkTweets() {
        foreach($this->tweets as $tweet) {
            $return = $this->checkTID($tweet['tid']);
            
            if(empty($return)) {
                $this->insert($tweet);
            }
        }   
    }
    
    /**
     * Get tweets for a specific hash tag or an array of tags
     * @access protected
     * @param string $tags a string to search for on twitter
     * @return json 
     */
    protected function searchForTag($tag) {
        
        
        return $this->cb->search_tweets('q=' . $tag, true);
        // DEPRECATED
//        return $this->ts->search($tag, array('lang' => 'en', 'rpp' => 100));
    }
    
    /**
     * Get count of all ids in the database - since they're unique this is the total tweets for that hash tag
     * @access public
     * @return object 
     */	
    public function getTagCount() {
        $this->db->setFetchMode(Zend_Db::FETCH_ASSOC);
        
        $result = $this->db->fetchAll('SELECT COUNT(*) as "tweet_count" FROM '.$this->table_name);
        
        return $result[0];
        
    }
    
    /**
     * Get latest tweet from database and output the json
     * @access public
     * @return object 
     */	
    public function getLatestTweet() {
        $this->db->setFetchMode(Zend_Db::FETCH_ASSOC);
        
        $result = $this->db->fetchAll('SELECT profile_img, name, username, text FROM '.$this->table_name.' ORDER BY id DESC LIMIT 1');
        
//        echo '<pre>';
//        print_r($result);
        
        return $result;
        
    }
    
}

/**
 * Abstraction class for Twitter tracker
 *
 * @copyright Copyright (c) 2012 Michael Newell (http://iwearshorts.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   Tag
 * @subpackage TwitterTracker
 * 
 */
class Tag extends TwitterTracker {
    
    /**
     * Tag name
     * @access private
     * @var string
     */
    private $tag_name;
    
    /**
     * Result of the tag search
     * @access private
     * @var string
     */
    private $results;
    
    /**
     * An array of tweet ids to be matched with the database
     * @access protected
     * @var array
     */
    protected $tweets;
    
    /**
     * Construct
     * @access public
     * @param string $tag a string to search twitter for
     * 
     * #sfsuperbowl+OR+#sfsuper
     * 
     */
    public function __construct($tag = '#sfsuperbowl+OR+#sfsuper') {
        parent::__construct();
        $this->tag_name = $tag;
    }
    
    /**
     * Begins the sequence for polling twitter, return results and storing results
     * @access public
     */
    public function search() {
//        echo "<pre>";
        $this->results = $this->searchForTag($this->tag_name);
        var_dump($this->results);
        $this->parseResults();
        $this->checkTweets();
    }
    
    /**
     * Parse the results of a twitter search query and add them to the tweets array
     * @access private
     * @param array $tweets an array of twitter results returned from a search 
     */	
    private function parseResults() {
        echo '<pre>';
        echo '<br />';
        echo '###';
        echo 'adding tweets to the database in the following structure';
        echo '###';
        
        $tweets = array();
        
        foreach($this->results->statuses as $status) {
//            var_dump($status);
//            var_dump($status->user);
            
            $status = array(
                'tid' => $status->id_str, 
                'tag_name' => $this->tag_name,
                'profile_img' => $status->user->profile_image_url,
                'name' => $status->user->name,
                'username' => $status->user->screen_name,
                'text' => $status->text
            );
            
            $tweets[] = $status;
            
        }
        // DEPRECATED
//        $tweets = $this->results['results'];
        
        $this->tweets = array_reverse($tweets);
//        DEPRECATED
//        foreach($tweets as $tweet) {
//            echo "<pre>";
//            print_r($tweet);
//            $this->tweets[] =   array(  
//                                        'tid' => $tweet['id_str'], 
//                                        'tag_name' => $this->tag_name,
//                                        'profile_img' => $tweet['profile_image_url'],
//                                        'name' => $tweet['from_user_name'],
//                                        'username' => $tweet['from_user'],
//                                        'text' => $tweet['text']
//                                    );
//        }
    }
    
}

//class Twitauth {
//    var $key = '';
//    var $secret = '';
//
//    var $request_token = "https://twitter.com/oauth/request_token";
//
//    function Twitauth($config) {
//        $this->key = $config['key']; // consumer key from twitter
//        $this->secret = $config['secret']; // secret from twitter
//    }
//
//    function getRequestToken() {
//        // Default params
//        $params = array(
//            "oauth_version" => "1.0",
//            "oauth_nonce" => time(),
//            "oauth_timestamp" => time(),
//            "oauth_consumer_key" => $this->key,
//            "oauth_signature_method" => "HMAC-SHA1"
//         );
//
//         // BUILD SIGNATURE
//            // encode params keys, values, join and then sort.
//            $keys = $this->_urlencode_rfc3986(array_keys($params));
//            $values = $this->_urlencode_rfc3986(array_values($params));
//            $params = array_combine($keys, $values);
//            uksort($params, 'strcmp');
//
//            // convert params to string 
//            foreach ($params as $k => $v) {$pairs[] = $this->_urlencode_rfc3986($k).'='.$this->_urlencode_rfc3986($v);}
//            $concatenatedParams = implode('&', $pairs);
//
//            // form base string (first key)
//            $baseString= "GET&".$this->_urlencode_rfc3986($this->request_token)."&".$this->_urlencode_rfc3986($concatenatedParams);
//            // form secret (second key)
//            $secret = $this->_urlencode_rfc3986($this->secret)."&";
//            // make signature and append to params
//            $params['oauth_signature'] = $this->_urlencode_rfc3986(base64_encode(hash_hmac('sha1', $baseString, $secret, TRUE)));
//
//         // BUILD URL
//            // Resort
//            uksort($params, 'strcmp');
//            // convert params to string 
//            foreach ($params as $k => $v) {$urlPairs[] = $k."=".$v;}
//            $concatenatedUrlParams = implode('&', $urlPairs);
//            // form url
//            $url = $this->request_token."?".$concatenatedUrlParams;
//
//         // Send to cURL
//         print $this->_http($url);          
//    }
//
//    function _http($url, $post_data = null) {       
//        $ch = curl_init();
//
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
//        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
//
//        if(isset($post_data))
//        {
//            curl_setopt($ch, CURLOPT_POST, 1);
//            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
//        }
//
//        $response = curl_exec($ch);
//        $this->http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//        $this->last_api_call = $url;
//        curl_close($ch);
//
//        return $response;
//    }
//
//    function _urlencode_rfc3986($input) {
//        if (is_array($input)) {
//            return array_map(array('Twitauth', '_urlencode_rfc3986'), $input);
//        }
//        else if (is_scalar($input)) {
//            return str_replace('+',' ',str_replace('%7E', '~', rawurlencode($input)));
//        }
//        else{
//            return '';
//        }
//    }
//}

//$sfsuperbowl = new Tag('sfsuperbowl');
//echo "<pre>";
//print_r($sfsuperbowl->getTagCount());