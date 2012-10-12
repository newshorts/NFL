<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../js/jquery.min.js">\x3C/script>')</script>
        <script src="../js/socialTrackers/class.js"></script>
        <script src="../js/socialTrackers/socialTracker.js"></script>
        <script src="../js/socialTrackers/googleTracker.js"></script>
        <script src="../js/socialTrackers/twitterTracker.js"></script>
        <script src="../js/socialTrackers/facebookTracker.js"></script>
        <script src="../js/socialTrackers/instagramTracker.js"></script>
        
        <script>
            /*
             *
             *  ATTENTION: One window load function initiates all scripts
             *
             **/
            (function($) {
                $(window).load(function() {
//                    var gt = new GoogleTracker('#google');
//                    var ft = new FacebookTracker('#facebook');
                    var tt = new TwitterTracker('#twitter_count');
                    var It = new InstagramTracker('#instagram_photo_count');
                });
            })(jQuery);
        </script>
        
        <link href="../css/reset.css" type="text/css" rel="stylesheet" />
        <link href="../css/font.css" type="text/css" rel="stylesheet" />
        <link href="../css/style.css" type="text/css" rel="stylesheet" />

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
	                	
		                	<div class="tabs">
		                        <a href="../buzz">SEE THE BUZZ</a> / <a href="../movements">JOIN THE MOVEMENT</a>
		                    </div>
		                    
<!-- 		                    <img class="sharebutton" src="images/share.png"> -->
		                    <div class="sharebutton">
			                    <ul>
				                    <li><a class="facebook link" href="#"></a></li>
				                    <li><a class="twitter link" href="#"></a></li>
				                    <li><a class="google link" href="#"></a></li>
<!--
				                    <li><a class="linkedin link" href="#"></a></li>
				                    <li><a class="tumblr link" href="#"></a></li>
				                    <li><a class="email link" href="#"></a></li>
-->
			                    </ul>
		                    </div>
		                    
		                	<div class="hoverbutton"></div>

	                	</div><!-- /rightwrap -->
	                	
	                	
		                <!--
<div class="share">

			                
		                	
		                	<div class="dropdown">
			                	<ul>
			                		<li><img src="images/share_fb.png"></li>
			                		<li><img src="images/share_twitter.png"></li>
			                		<li><img src="images/share_google.png"></li>
			                	</ul>
		                	</div>
	 	              </div>
		                
-->
	                	
	                </div><!-- /class right -->
	                
	            </div><!-- /boardcontainer-->
            </div><!-- /header -->
