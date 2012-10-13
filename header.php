<?php
    
    require_once 'config.php';
    
    $request = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SFSuperBowl || 2016</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo ROOT; ?>js/lib/jquery.min.js">\x3C/script>')</script>
        
        <script src="<?php echo ROOT; ?>js/lib/class.js"></script>
        
        <script src="<?php echo ROOT; ?>js/lib/jquery.ba-bbq.min.js"></script>
        <script src="<?php echo ROOT; ?>js/lib/pageNavigation.js"></script>
        
        <script src="<?php echo ROOT; ?>js/socialTrackers/socialTracker.js"></script>
        <script src="<?php echo ROOT; ?>js/socialTrackers/googleTracker.js"></script>
        <script src="<?php echo ROOT; ?>js/socialTrackers/twitterTracker.js"></script>
        <script src="<?php echo ROOT; ?>js/socialTrackers/facebookTracker.js"></script>
        <script src="<?php echo ROOT; ?>js/socialTrackers/instagramTracker.js"></script>
        <script src="<?php echo ROOT; ?>js/socialTrackers/gfbTracker.js"></script>
        <script src="<?php echo ROOT; ?>js/socialTrackers/totalTracker.js"></script>
        <script>
            
            /*
             *  ATTENTION: One window load function initiates all scripts
             **/
            (function($) {
                $(window).load(function() {
                    
                    var gt = new GoogleTracker('#google_count');
                    var ft = new FacebookTracker('#facebook_count');
                    var tt = new TwitterTracker('#twitter_count');
                    var It = new InstagramTracker('#instagram_photo_count');
                    var gfb = new GfbTracker('#gfb_count');
                    var total = new TotalTracker('#total');
                    
//                    var nav = new PageNavigation('#wrap');
                    
                });
            })(jQuery);
        </script>
        
        <link href="<?php echo ROOT; ?>css/reset.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo ROOT; ?>css/font.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo ROOT; ?>css/style.css" type="text/css" rel="stylesheet" />

    </head>
    <body data-device="<?php echo DEVICE_TYPE; ?>">
    
    <script src='http://connect.facebook.net/en_US/all.js'></script>
       
        <div id="background"></div>
        <div id="wrap">
        
            <div id="header">
                <div id="boardcontainer">
                    
	                <div class="left">
	                    <h2 class="headlineLargeGray">BRING THE BOWL TO THE BAY</h2>
	                </div>
	                
	                <div class="right">
                            
	                	<div class="rightWrap">
                                    <div class="tabs">
		                        <a href="<?php echo ROOT; ?>buzz" class="ajaxify <?php echo (strpos($request, 'buzz')) ? 'active' : ''; ?>"><?php echo (strpos($request, 'buzz')) ? 'SEE THE BUZZ' : 'SCOREBOARD'; ?></a> / <a href="<?php echo ROOT; ?>movements" class="ajaxify <?php echo (strpos($request, 'movement')) ? 'active' : ''; ?>" >JOIN THE MOVEMENT</a>
		                    </div>
		                    
		                    <div class="sharebutton">
                                        <ul>
                                            <li><a class="facebook link" onclick='postToFeed(); return false;'></a><p id='msg'></p></li>
                                            <li><a class="twitter link" href="https://twitter.com/intent/tweet?button_hashtag=SFSUPERBOWL&text=Share%20SFSUPERBOWL%20This%20is%20going%20to%20be%20the%20story"></a></li>
                                            <li><a class="google link" href="https://plus.google.com/u/0/116535953378851378506/" target="_blank"></a></li>
                                        </ul>
		                    </div>
		                    
                                    <div class="hoverbutton"></div>

	                	</div><!-- /rightwrap -->
	                	
	                </div><!-- /class right -->
	                
	            </div><!-- /boardcontainer-->
                    
            </div><!-- /header -->
