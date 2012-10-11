<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Social {

    public $filename;
    protected $output = Array();
    
    public function __construct($filename = 'get') {
        $this->filename = $filename;
    }
    
    public function get_all() {
        
        $this->output = Array(
                            'google' => $this->get_plusones('http://techcrunch.com/'),
                            'twitter' => $this->get_tweets('http://techcrunch.com/'),
                            'facebook' => $this->get_likes(),
                            'instagram' => $this->get_instagrams('snow'),
                            'filename' => $this->filename,
                            'usingClass' => 'true'
                        );
      
        $this->output = json_encode(Array('output' => $this->output));
    }
    
    public function write_file() {
        return file_put_contents('output.json', $this->output);
    }
    
    private function get_tweets($url) {
//        $json_string = file_get_contents('http://urls.api.twitter.com/1/urls/count.json?url=' . $url);
        $json_string = file_get_contents('http://otter.topsy.com/searchcount.json?q=sfsuperbowl&apikey=EA7FB3A842894C08B31348305D339A8E');
        $json = json_decode($json_string, true);
        
        return intval( $json['response']['a'] );
    }
    
    private function get_likes() {
        $json_string = file_get_contents('https://graph.facebook.com/sonicdrivein');
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
    
    private function get_instagrams($tag) {
        //https://api.instagram.com/v1/tags/search?q=snow&access_token=231409256.05e13af.c3f64f166e634b1c967cc819f12061d9
        $json_string = file_get_contents('https://api.instagram.com/v1/tags/search?q='.$tag.'&access_token=231409256.05e13af.c3f64f166e634b1c967cc819f12061d9');
        $json = json_decode($json_string, true);
        return intval( $json['data'][0]['media_count'] );
    }
}

?>