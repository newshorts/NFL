<?php
    
    require_once 'config.php';
    
    $request = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    
?>
<!DOCTYPE html>
<html>
    <head>
    	
    	<!-- GOOGLE+ META TAGS FOR DEFAULT THUMBNAIL IMAGE -->
    	<html itemscope itemtype="http://schema.org/">

		<meta itemprop="SFSUPERBOWL" content="BRING THE BOWL TO THE BAY">
		<meta itemprop="description" content="Our bid for the Super Bowl starts with you. Help us show why the Bay Area will be a perfect host for Super Bowl L. Simply tweet, share or post with #SFSuperBowl to show your support.">
		<meta itemprop="image" content="http://www.sfsuperbowl.com/images/movement_poster.png">



    
        <title>SFSuperBowl || 2016</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo ROOT; ?>js/lib/jquery.min.js">\x3C/script>')</script>
        
        <script src="<?php echo ROOT; ?>js/lib/modernizr.custom.nfl.js"></script>
        
        <script>
            Modernizr.load([
                
                {
                    load: '//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js',
                    complete: function () {
                        if ( !window.jQuery ) {
                            Modernizr.load('<?php echo ROOT; ?>js/lib/jquery.min.js');
                        }
                    }
                },
                
                {load: '<?php echo ROOT; ?>js/lib/class.js'},
                {load: '<?php echo ROOT; ?>js/lib/jquery.ba-bbq.min.js'},
                {load: '<?php echo ROOT; ?>js/lib/pageNavigation.js'},
                {load: '<?php echo ROOT; ?>js/socialTrackers/socialTracker.js'},
                {load: '<?php echo ROOT; ?>js/socialTrackers/googleTracker.js'},
                {load: '<?php echo ROOT; ?>js/socialTrackers/twitterTracker.js'},
                {load: '<?php echo ROOT; ?>js/socialTrackers/facebookTracker.js'},
                {load: '<?php echo ROOT; ?>js/socialTrackers/facebookStatusTracker.js'},
                {load: '<?php echo ROOT; ?>js/socialTrackers/instagramTracker.js'},
                {load: '<?php echo ROOT; ?>js/socialTrackers/gfbTracker.js'},
                {
                    load: '<?php echo ROOT; ?>js/socialTrackers/totalTracker.js',
                    complete: function() {
                        var fst = new FacebookStatusTracker('#facebook_statuses');
                    
                        var gt = new GoogleTracker('#google_count');
                        var ft = new FacebookTracker('#facebook_count');
                        var tt = new TwitterTracker('#twitter_count');
                        var It = new InstagramTracker('#instagram_photo_count');
                        var gfb = new GfbTracker('#gfb_count');
                        var total = new TotalTracker('#total');
                    }
                },
                
                // Presentational polyfills
                {
                    // Logical list of things we would normally need
                    test : Modernizr.fontface && Modernizr.canvas && Modernizr.cssgradients,
                    // Modernizr.load loads css and javascript by default
                    nope : ['presentational-polyfill.js', 'presentational.css']
                },
//                // Functional polyfills
//                {
//                    // This just has to be truthy
//                    test : Modernizr.websockets && window.JSON,
//                    // socket-io.js and json2.js
//                    nope : 'functional-polyfills.js',
//                    // You can also give arrays of resources to load.
//                    both : [ 'app.js', 'extra.js' ],
//                    complete : function () {
//                    // Run this after everything in this group has downloaded
//                    // and executed, as well everything in all previous groups
//                    myApp.init();
//                    }
//                },
//                
//                
//                
                // Run your analytics after you've already kicked off all the rest
                // of your app.
//                'post-analytics.js'
            ]);
        </script>
        
        <!--<script src="<?php echo ROOT; ?>js/lib/class.js"></script>-->
        
        <!--<script src="<?php echo ROOT; ?>js/lib/jquery.ba-bbq.min.js"></script>-->
        <!--<script src="<?php echo ROOT; ?>js/lib/pageNavigation.js"></script>-->
        
        <!--<script src="<?php echo ROOT; ?>js/socialTrackers/socialTracker.js"></script>-->
        <!--<script src="<?php echo ROOT; ?>js/socialTrackers/googleTracker.js"></script>-->
        <!--<script src="<?php echo ROOT; ?>js/socialTrackers/twitterTracker.js"></script>-->
        <!--<script src="<?php echo ROOT; ?>js/socialTrackers/facebookTracker.js"></script>-->
        <!--<script src="<?php echo ROOT; ?>js/socialTrackers/facebookStatusTracker.js"></script>-->
        <!--<script src="<?php echo ROOT; ?>js/socialTrackers/instagramTracker.js"></script>-->
        <!--<script src="<?php echo ROOT; ?>js/socialTrackers/gfbTracker.js"></script>-->
        <!--<script src="<?php echo ROOT; ?>js/socialTrackers/totalTracker.js"></script>-->
        <script>
            
            /*
             *  ATTENTION: One window load function initiates all scripts
             **/
            (function($) {
                $(window).load(function() {
                    
                    if(Modernizr.touch) {
                        $('*').on('touchstart', function() {
                            $(this).trigger('click');
                        });
                    }
                    
//                    var fst = new FacebookStatusTracker('#facebook_statuses');
//                    
//                    var gt = new GoogleTracker('#google_count');
//                    var ft = new FacebookTracker('#facebook_count');
//                    var tt = new TwitterTracker('#twitter_count');
//                    var It = new InstagramTracker('#instagram_photo_count');
//                    var gfb = new GfbTracker('#gfb_count');
//                    var total = new TotalTracker('#total');
                    
//                    var nav = new PageNavigation('#wrap');
                    
                });
            })(jQuery);
        </script>
        
        <link href="<?php echo ROOT; ?>css/reset.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo ROOT; ?>css/font.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo ROOT; ?>css/style.css" type="text/css" rel="stylesheet" />
        
        
        
        <!-- INTRO ANIMATION -->
        <script type="text/javascript">
			jQuery(function(){
			   $("#introAnimation").delay(3500).fadeOut(1500);
			});
		</script>




        
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
		                        <a href="<?php echo ROOT; ?>buzz" class="ajaxify <?php echo (strpos($request, 'buzz')) ? 'active' : ''; ?>"><?php echo (strpos($request, 'buzz')) ? 'SCOREBOARD' : 'SCOREBOARD'; ?></a> / <a href="<?php echo ROOT; ?>movement" class="ajaxify <?php echo (strpos($request, 'movement')) ? 'active' : ''; ?>" >JOIN THE MOVEMENT</a>
		                    </div>
		                    
		                    <div class="sharebutton">

			                    <ul>
                                        <li><a class="facebook link" onclick='postToFeed(); return false;'></a><p id='msg'></p></li>
                                        <li><a class="twitter link" href="https://twitter.com/intent/tweet?button_hashtag=SFSUPERBOWL&text=Share%20SFSUPERBOWL%20This%20is%20going%20to%20be%20the%20story"></a></li>
                                        <li><a class="google link" href="https://plus.google.com/share?url=http://www.sfsuperbowl.com" target="_blank"></a></li>
                                        <!-- <li><link rel="image_src" href="http://www.labnol.org/screenshot.png" /></li> -->
                                    </ul>

		                    </div>
		                    
                                    <div class="hoverbutton"></div>

	                	</div><!-- /rightwrap -->
	                	
	                </div><!-- /class right -->
	                
	            </div><!-- /boardcontainer-->
                    
            </div><!-- /header -->
