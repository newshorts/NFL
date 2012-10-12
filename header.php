<?php
    
    require_once 'config.php';
    
    $request = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../js/jquery.min.js">\x3C/script>')</script>
        <script src="<?php echo ROOT . DIRECTORY_SEPARATOR; ?>/js/socialTrackers/class.js"></script>
        <script src="<?php echo ROOT . DIRECTORY_SEPARATOR; ?>js/socialTrackers/socialTracker.js"></script>
        <script src="<?php echo ROOT . DIRECTORY_SEPARATOR; ?>js/socialTrackers/googleTracker.js"></script>
        <script src="<?php echo ROOT . DIRECTORY_SEPARATOR; ?>js/socialTrackers/twitterTracker.js"></script>
        <script src="<?php echo ROOT . DIRECTORY_SEPARATOR; ?>js/socialTrackers/facebookTracker.js"></script>
        <script src="<?php echo ROOT . DIRECTORY_SEPARATOR; ?>js/socialTrackers/instagramTracker.js"></script>
        <script>
            /*
             *
             *  ATTENTION: One window load function initiates all scripts
             *
             **/
            (function($) {
                $(window).load(function() {
                    var gt = new GoogleTracker('#google');
                    var ft = new FacebookTracker('#facebook');
                    var tt = new TwitterTracker('#twitter_count');
                    var It = new InstagramTracker('#instagram_photo_count');
                });
            })(jQuery);
        </script>
        
        <link href="<?php echo ROOT . DIRECTORY_SEPARATOR; ?>css/reset.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo ROOT . DIRECTORY_SEPARATOR; ?>css/font.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo ROOT . DIRECTORY_SEPARATOR; ?>css/style.css" type="text/css" rel="stylesheet" />

    </head>
    <body>
        <div id="background"></div>
        <div id="wrap">
        
            <div id="header">
                <div id="boardcontainer">
	                <div class="left">
	                    <h2 class="headlineLargeGray">BRING THE BOWL TO THE BAY</h2>
	                </div>
	                
	                <div class="right">
	                	<div class="rightWrap">
                                        <?php // echo $request; ?>
		                	<div class="tabs">
		                        <a href="../buzz" <?php echo (strpos($request, 'buzz')) ? 'class="active"' : ''; ?>>SEE THE BUZZ</a> / <a href="../movements" <?php echo (strpos($request, 'movement')) ? 'class="active"' : ''; ?>>JOIN THE MOVEMENT</a>
		                    </div>
		                    
		                    <div class="sharebutton">
			                    <ul>
				                    <li><a class="facebook link" href="#"></a></li>
				                    <li><a class="twitter link" href="#"></a></li>
				                    <li><a class="google link" href="#"></a></li>
			                    </ul>
		                    </div>
		                    
		                	<div class="hoverbutton"></div>

	                	</div><!-- /rightwrap -->
	                	
	                </div><!-- /class right -->
	                
	            </div><!-- /boardcontainer-->
            </div><!-- /header -->
