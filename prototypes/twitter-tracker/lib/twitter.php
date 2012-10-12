<?php
require_once 'db.php';
/**
 * Simple Twitter class
 * @package Twitter
 * @subpackage Dbconnect
 */
class Twitter {
    
    protected $db;
    
    /**
     * Constructor
     * @access public
     */
    public function __construct () {
        $this->db = new Dbconnect("localhost", "root", "", "twitter_tracker");
    }
    
    /**
     * Fetch all tweets with a certain hashtag
     * @access protected
     * @param array $query an array specifying hash tags to search for on twitter (don't include the "#" in your keywords)
     * TODO: specify whether this should store the return from twitter or return it to the controller
     * @return array 
     */
    protected function callTwitter ($query = "?q=%40newshorts+OR+%40jweav1+OR+%40boxsavant+OR+%40pedrosorren+OR+%40fouhy+OR+%40emzosmizo+OR+%40kadisco+OR+%40jennarconlin+OR+%40charliesheen&rpp=100&page=15&since=2011-03-18") {
        $response = file_get_contents("http://search.twitter.com/search.json".$query);
        if($response) {
            $this->twitterResponse = json_decode($response, true);
        } else {
            $this->twitterResponse = false;
        }
    }
    
    /**
     * Query the database and get an associative array back
     * @access public
     * @param string $qstring a mysql query string
     * @return array 
     */
    protected function getTweetById($id) {
       return $this->db->get_arr("SELECT * FROM tweets WHERE tid = ".$id." LIMIT 1");
    }
}


?>