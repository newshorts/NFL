<?php
require_once 'Zend/Db.php';
require_once 'Zend/Service/Twitter/Search.php';

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
                echo 'failed login credentials\n';
                print_r($e);
            }
        } catch (Zend_Exception $e) {
            // perhaps factory() failed to load the specified Adapter class
            if($is_local) {
                echo 'failed to load specified adapter class\n';
                print_r($e);
            }
        }
        
        $this->table_name = 'tweets';
        
        // twitter
        $this->ts  = new Zend_Service_Twitter_Search('json');
        
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
        return $this->ts->search($tag, array('lang' => 'en', 'rpp' => 100));
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
    public function __construct($tag = '#iwearshortscasbahstuff+OR+#iwearshortscasstuff') {
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
//        print_r($this->results);
        $this->parseResults();
//        print_r($this->tweets);
        $this->checkTweets();
    }
    
    /**
     * Parse the results of a twitter search query and add them to the tweets array
     * @access private
     * @param array $tweets an array of twitter results returned from a search 
     */	
    private function parseResults() {
        
        $tweets = $this->results['results'];
        
        $tweets = array_reverse($tweets);
        
        foreach($tweets as $tweet) {
            echo "<pre>";
            print_r($tweet);
            $this->tweets[] =   array(  
                                        'tid' => $tweet['id_str'], 
                                        'tag_name' => $this->tag_name,
                                        'profile_img' => $tweet['profile_image_url'],
                                        'name' => $tweet['from_user_name'],
                                        'username' => $tweet['from_user'],
                                        'text' => $tweet['text']
                                    );
        }
    }
    
}

//$sfsuperbowl = new Tag('sfsuperbowl');
//echo "<pre>";
//print_r($sfsuperbowl->getTagCount());