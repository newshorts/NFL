<?php
//require_once 'db.php';
/**
 * Simple Twitter class
 * @package Twitter
 * @subpackage Dbconnect
 * @version 1
 */
class Twitter {
    
    /**
     * Store the local db class
     * @deprecated since version 1
     */
//    protected $db;
    
    /**
     * Constructor
     * @access public
     * @deprecated since version 1
     */
//    public function __construct () {
//        $this->db = new Dbconnect("localhost", "root", "", "twitter_tracker");
//    }
    
    /**
     * Constructor
     * @access public
     */
    public function __construct () {
        
    }
    
    /**
     * Fetch all tweets with a certain hashtag
     * @access protected
     * @param array $query an array specifying hash tags to search for on twitter (don't include the "#" in your keywords)
     * TODO: specify whether this should store the return from twitter or return it to the controller
     * @return array 
     */
    public function callTwitter ($query = "sfsuperbowl") {
        
        $q = '?q=%23'.$query.'&rpp=100&since=2011-03-18';
        
        $response = file_get_contents("http://search.twitter.com/search.json".$q);
        if($response) {
            return json_decode($response, true);
        }
    }
    
    /**
     * Query the database and get an associative array back
     * @access public
     * @param string $qstring a mysql query string
     * @return array 
     * @deprecated since version 1
     */
//    protected function getTweetById($id) {
//       return $this->db->get_arr("SELECT * FROM tweets WHERE tid = ".$id." LIMIT 1");
//    }
}


?>