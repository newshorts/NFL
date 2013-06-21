<?php
/**
 * Simple Database class
 * @package Dbconnect
 * @subpackage classes
 */
class Dbconnect {
    
    /**
     * Database host
     * @access protected
     * @var string
     */
    protected $host;
    /**
     * Database username
     * @access protected
     * @var string
     */
    protected $user;
    /**
     * Database password
     * @access protected
     * @var string
     */
    protected $password;
    /**
     * Database name
     * @access protected
     * @var string
     */
    protected $database;	
    /**
     * Database connection
     * @access protected
     * @var object
     */
    protected $lnk;
    /**
     * Databse return result
     * @access public
     * @var string|array|object 
     */
    public $result;	
	
    /**
     * Construct
     * @access public
     * @param string $a host (defaults to localhost)
     * @param string $b username (defaults to root)
     * @param string $c password (defaults to "")
     * @param string $d database name (defaults to "")
     */	
    public function __construct($a = "localhost", $b = "root", $c = "", $d = "") {
        $this -> host = $a;
        $this -> user = $b;
        $this -> password = $c;
        $this -> database = $d;
    }

/*	--------------------------------------------------
        Public
        -------------------------------------------------- */
    
    /**
     * Get Object from a database
     * @access public
     * @param string $qstring a mysql query string
     * @return object 
     */	
    public function get_obj($qstring) {
        $this -> func_connect();
        //mysql_query("SET NAMES 'utf8'"); 
        $this -> result = mysql_query($qstring) or die("A MySQL error has occurred.<br />Your Query: " . $your_query . "<br /> Error: (" . mysql_errno() . ") " . mysql_error());
        //return $this -> result;
        $catchAll = array();
        while ($row = mysql_fetch_object($this -> result)) {
                $catchAll[] = $row;
        }
        mysql_close($this -> lnk);
        mysql_free_result($this -> result);
        return $catchAll;


    }

    /**
     * Query the database and get an associative array back
     * @access public
     * @param string $qstring a mysql query string
     * @return array 
     */	
    public function get_arr($qstring) {
        $this -> func_connect();
        //mysql_query("SET NAMES 'utf8'"); 
        $this -> result = mysql_query($qstring) or die("A MySQL error has occurred.<br />Your Query: " . $your_query . "<br /> Error: (" . mysql_errno() . ") " . mysql_error());
        //return $this -> result;
        $catchAll = array();
        while($row = mysql_fetch_assoc($this -> result)) {
                $catchAll[] = $row;
        }
        mysql_close($this -> lnk);
        mysql_free_result($this -> result);
        return $catchAll;
    }

    /**
     * Query the database and get a numerically indexed array back
     * @access public
     * @param string $qstring a mysql query string
     * @return array 
     */	
    public function get_arr_numeric($qstring) {
        $this -> func_connect();
        //mysql_query("SET NAMES 'utf8'"); 
        $this -> result = mysql_query($qstring) or die("A MySQL error has occurred.<br />Your Query: " . $your_query . "<br /> Error: (" . mysql_errno() . ") " . mysql_error());
        //return $this -> result;
        $catchAll = array();
        while($row = mysql_fetch_array($this -> result, MYSQL_NUM)) {
                $catchAll[] = $row;
        }
        mysql_close($this -> lnk);
        mysql_free_result($this -> result);
        return $catchAll;

    }

    /**
     * Query the database and return everything, good for inserts and updates
     * @access public
     * @param string $qstring a mysql query string
     * @return object 
     */	
    public function query($qstring) {
        $this -> func_connect();
        //mysql_query("SET NAMES 'utf8'"); 
        $this -> result = mysql_query($qstring) or die("A MySQL error has occurred.<br />Your Query: " . $your_query . "<br /> Error: (" . mysql_errno() . ") " . mysql_error());

        mysql_close($this -> lnk);
        return $this -> result;
        mysql_free_result($this -> result);
    }

    /**
     * Validate an email address
     * @access public
     * @param string $email an email address to be validated
     * @return boolean 
     */	
    public function is_valid_email ($email) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
            return false;
        }
        return true;
    }

    /**
     * Sanitize an email address and return the sanitized version
     * @access public
     * @param string $email an email address to be sanitized
     * @return string
     */	
    public function sanitize_email($email) {
            return filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    /**
     * Validate a float point number
     * @access public
     * @param float $float float point number
     * @return boolean 
     */	
    public function is_valid_float ($float) {
        if(filter_var($float, FILTER_VALIDATE_FLOAT) === false) {
            return false;
        }
        return true;
    }

    /**
     * Sanitize a float point number and return the sanitized version
     * @access public
     * @param float $float float point number
     * @return float 
     */	
    public function sanitize_float ($float) {
            return filter_var($float, FILTER_SANITIZE_NUMBER_FLOAT);
    }

    /**
     * Validate an integer
     * @access public
     * @param float $float float point number
     * @return boolean 
     */	
    public function is_valid_int ($int) {
            return filter_var($int, FILTER_VALIDATE_INT);
    }

    /**
     * Sanitize a interger and return the sanitized version
     * @access public
     * @param integer $int integer number
     * @return integer
     */	
    public function sanitize_int ($int) {
            return filter_var($int, FILTER_VALIDATE_INT);
    }

    /**
     * Validate a url
     * @access public
     * @param string $url a url to be tested
     * @return boolean 
     */
    public function is_valid_url ($url) {
        if(filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
            return false;
        }
        return true;
    }

    /**
     * Sanitize a url and return the sanitized version
     * @access public
     * @param string $url integer number
     * @return string
     */	
    public function sanitize_url ($url) {
            return filter_var($url,  FILTER_SANITIZE_URL);
    }

    /**
     * Sanitize a string and return the sanitized version
     * @access public
     * @param string $str integer number
     * @return string
     */	
    public function sanitize_string ($str) {
            return filter_var($str, FILTER_SANITIZE_STRING);
    }

/*	--------------------------------------------------
        Protected
        -------------------------------------------------- */

    /**
     * Sanitize a facebook id and return the sanitized version
     * @access protected
     * @param integer $int integer number
     * @return integer
     */	
    protected function cleanFBID ($fbid) {
        if(is_string($fbid)) {
            $fbid = intval($fbid);
        }
        if($this->is_valid_int($fbid)) {
            $cleanFBID = $this->sanitize_int($fbid);
            return $cleanFBID;
        } else {
            return false;
        }
    }
    
    /**
     * ???
     * TODO: find out what the hell i was doing with this function
     * @access protected
     * @param ??? $amount ???
     * @return ???
     */	
    protected function cleanAmount ($amount) {
        //$replace = array("$");
        //$amount = str_replace($replace, "", $amount);
        if(is_float($amount)) {
            $amount = floatval($amount);
            if($this->is_valid_float($amount)) {
                    $clean = $this->sanitize_float($amount);
                    return $clean;
            } else {
                    //return false;
                    return "not a valid float amount";
            }
        } elseif (is_int($amount)) {
            $amount = intval($amount);
            if($this->is_valid_int($amount)) {
                    $clean = $this->sanitize_int($amount);
                    return $clean;
            } else {
                    //return false;
                    return "not a valid int amount";
            }
        } elseif(is_string($amount)) {
            if(strstr($amount, '$')) {
                    $amount = str_replace('$', '', $amount);
            }
            if(strstr($amount, ".")) {
                    $floatVal = floatval($amount);
                    return $this -> cleanAmount($floatVal);
            } else {
                    $intVal = intval($amount);
                    return $this -> cleanAmount($intVal);
            }
        } else {
            //return false;
            return "unable to find the amount type";
        }

    }
    
    /**
     * Sanitize a interger and return the sanitized version
     * @access protected
     * @param integer $int integer number
     * @return integer
     */	
    protected function showError() {
        die("Error Serverside ".mysql_errno()." : ".mysql_error());
    }


/*	--------------------------------------------------
        Private
        -------------------------------------------------- */		
    
    /**
     * Connect to the database
     * @access private
     */
    private function func_connect() {
        $this -> lnk = mysql_connect($this -> host, $this -> user, $this -> password, true) OR die('Could not connect to the database - Why: '.mysql_error());
        mysql_select_db($this -> database) OR die('Could not find database: '.mysql_error());	
    }	

    /**
     * Destroy the object
     * @access public
     */
    public function __destruct() {
        unset ($this -> user, $this -> password);
    }
}

?>