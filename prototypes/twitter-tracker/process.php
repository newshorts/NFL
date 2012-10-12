<?php
require_once "lib/twitter.php";
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$t = new Twitter();

if(!empty($t->zombies)) {
    foreach($t->zombies as $zombie) {
        // loop through each zombie and call twitter collecting any hash tags
        if($t->checkNewPage()) {
            // if we have more than one page, add the current page of data
            // 
            
            // then call the next page of data and add that as well
            
            $t->callTwitter($t->nextPage);
        } else {
            // there are no new pages of information
            
        }
    }
}
?>