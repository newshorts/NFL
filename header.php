<?php
session_start();
if(!isset($_SESSION['sfsuperbowlintro'])) {
    $_SESSION['sfsuperbowlintro'] = true;
}
    
    require_once 'config.php';
    
    $request = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    
?>
<!DOCTYPE html>
<html itemtype="http://schema.org/">
    <head>
    	
        <title>SFSuperBowl || 2016</title>
        <!-- GOOGLE+ META TAGS FOR DEFAULT THUMBNAIL IMAGE -->
        <meta itemprop="SFSUPERBOWL" content="BRING THE BOWL TO THE BAY">
        <meta itemprop="description" content="Our bid for the Super Bowl starts with you. Help us show why the Bay Area will be a perfect host for Super Bowl L. Simply tweet, share or post with #SFSuperBowl to show your support.">
        <meta itemprop="image" content="http://www.sfsuperbowl.com/images/movement_poster.png">
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link rel="icon" type="image/png" href="<?php echo ROOT; ?>favicon.ico">
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo ROOT; ?>js/lib/jquery.min.js">\x3C/script>')</script>
        
<!--        <script src="<?php echo ROOT; ?>js/lib/modernizr.custom.nfl.js"></script>-->
        
        <script>
//            Modernizr.load([
//                
//                {
//                    load: '//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js',
//                    complete: function () {
//                        if ( !window.jQuery ) {
//                            console.log('unable to find jquery, loading modernizr local version')
//                            Modernizr.load('<?php echo ROOT; ?>js/lib/jquery.min.js');
//                        } else {
//                            Modernizr.load('<?php echo ROOT; ?>js/lib/class.js');
//                            Modernizr.load('<?php echo ROOT; ?>js/lib/jquery.ba-bbq.min.js');
//                            Modernizr.load('<?php echo ROOT; ?>js/lib/pageNavigation.js');
//                            Modernizr.load('<?php echo ROOT; ?>js/socialTrackers/socialTracker.js');
//                            Modernizr.load('<?php echo ROOT; ?>js/socialTrackers/googleTracker.js');
//                            Modernizr.load('<?php echo ROOT; ?>js/socialTrackers/twitterTracker.js');
//                            Modernizr.load('<?php echo ROOT; ?>js/socialTrackers/facebookTracker.js');
//                            Modernizr.load('<?php echo ROOT; ?>js/socialTrackers/facebookStatusTracker.js');
//                            Modernizr.load('<?php echo ROOT; ?>js/socialTrackers/instagramTracker.js');
//                            Modernizr.load('<?php echo ROOT; ?>js/socialTrackers/gfbTracker.js');
//                            Modernizr.load('<?php echo ROOT; ?>js/socialTrackers/totalTracker.js');
//                        }
//                    }
//                }
//                
////                {
////                    var fst = new FacebookStatusTracker('#facebook_statuses');
////                    
////                    var gt = new GoogleTracker('#google_count');
////                    var ft = new FacebookTracker('#facebook_count');
////                    var tt = new TwitterTracker('#twitter_count');
////                    var It = new InstagramTracker('#instagram_photo_count');
////                    var gfb = new GfbTracker('#gfb_count');
////                    var total = new TotalTracker('#total');
////                }
////                
////                {load: '<?php echo ROOT; ?>js/lib/class.js'},
//                {load: '<?php echo ROOT; ?>js/lib/jquery.ba-bbq.min.js'},
//                {load: '<?php echo ROOT; ?>js/lib/pageNavigation.js'},
//                {load: '<?php echo ROOT; ?>js/socialTrackers/socialTracker.js'},
//                {load: '<?php echo ROOT; ?>js/socialTrackers/googleTracker.js'},
//                {load: '<?php echo ROOT; ?>js/socialTrackers/twitterTracker.js'},
//                {load: '<?php echo ROOT; ?>js/socialTrackers/facebookTracker.js'},
//                {load: '<?php echo ROOT; ?>js/socialTrackers/facebookStatusTracker.js'},
//                {load: '<?php echo ROOT; ?>js/socialTrackers/instagramTracker.js'},
//                {load: '<?php echo ROOT; ?>js/socialTrackers/gfbTracker.js'},
//                {load: '<?php echo ROOT; ?>js/lib/jquery.cookie.js'},
//                {
//                    load: '<?php echo ROOT; ?>js/socialTrackers/totalTracker.js',
////                    complete: function() {
////                        var fst = new FacebookStatusTracker('#facebook_statuses');
////                    
////                        var gt = new GoogleTracker('#google_count');
////                        var ft = new FacebookTracker('#facebook_count');
////                        var tt = new TwitterTracker('#twitter_count');
////                        var It = new InstagramTracker('#instagram_photo_count');
////                        var gfb = new GfbTracker('#gfb_count');
////                        var total = new TotalTracker('#total');
////                        
////                    }
////                }
//                
//                // Presentational polyfills
////                {
////                    // Logical list of things we would normally need
////                    test : Modernizr.fontface && Modernizr.canvas && Modernizr.cssgradients,
////                    // Modernizr.load loads css and javascript by default
////                    nope : ['presentational-polyfill.js', 'presentational.css']
////                },
////                // Functional polyfills
////                {
////                    // This just has to be truthy
////                    test : Modernizr.websockets && window.JSON,
////                    // socket-io.js and json2.js
////                    nope : 'functional-polyfills.js',
////                    // You can also give arrays of resources to load.
////                    both : [ 'app.js', 'extra.js' ],
////                    complete : function () {
////                    // Run this after everything in this group has downloaded
////                    // and executed, as well everything in all previous groups
////                    myApp.init();
////                    }
////                },
////                
////                
////                
//                // Run your analytics after you've already kicked off all the rest
//                // of your app.
////                'post-analytics.js'
//            ]);
        </script>
        
        <script src="<?php echo ROOT; ?>js/lib/class.js"></script>
        <script src="<?php echo ROOT; ?>js/lib/jquery.ba-bbq.min.js"></script>
        <script src="<?php echo ROOT; ?>js/lib/pageNavigation.js"></script>
        <script src="<?php echo ROOT; ?>js/socialTrackers/socialTracker.js"></script>
        
        <?php if(strpos($request, 'buzz')): ?>
        
            <script src="<?php echo ROOT; ?>js/socialTrackers/instagramTracker.js"></script>
            <script src="<?php echo ROOT; ?>js/socialTrackers/twitterTracker.js"></script>
            <script src="<?php echo ROOT; ?>js/socialTrackers/totalTracker.js"></script>
            <script src="<?php echo ROOT; ?>js/socialTrackers/gfbTracker.js"></script>
        
        <?php elseif(strpos($request, 'instagram')): ?>
        
            <script src="<?php echo ROOT; ?>js/socialTrackers/instagramTracker.js"></script>
        
        <?php elseif(strpos($request, 'tweets')): ?>
        
            <script src="<?php echo ROOT; ?>js/socialTrackers/twitterTracker.js"></script>
        
        <?php elseif(strpos($request, 'movement')): ?>
        
        <?php elseif(strpos($request, 'supporters')): ?>
        
            <script src="<?php echo ROOT; ?>js/lib/jquery.shorten.js"></script>
            <script src="<?php echo ROOT; ?>js/socialTrackers/googleTracker.js"></script>
            <script src="<?php echo ROOT; ?>js/socialTrackers/facebookTracker.js"></script>
            <script src="<?php echo ROOT; ?>js/socialTrackers/gfbTracker.js"></script>
            <script src="<?php echo ROOT; ?>js/socialTrackers/facebookStatusTracker.js"></script>
            
        <?php endif; ?>
        
        <script>
            /*
             *  ATTENTION: One window load function initiates all scripts
             **/
            (function($) {
                $(window).load(function() {
                    
                $('.sharebutton').on('click touchstart', function() {
                    if($(this).hasClass('expanded')) {
                        $(this).removeClass('expanded');
                    } else {
                        $(this).addClass('expanded');
                    }
                });
                    
                    // mikes
//                    if(Modernizr.touch) {
//                        $('*').on('touchstart', function() {
//                            $(this).trigger('click');
//                        });
//                    }

                    <?php if(strpos($request, 'buzz')): ?>
                    
                        var total = new TotalTracker('#total');
                        var It = new InstagramTracker('#instagram_photo_count');
                        var tt = new TwitterTracker('#twitter_count');
                        var gfb = new GfbTracker('#gfb_count');
        
                    <?php elseif(strpos($request, 'instagram')): ?>
                        
                        var It = new InstagramTracker('#instagram_photo_count');

                    <?php elseif(strpos($request, 'tweets')): ?>
                        
                        var tt = new TwitterTracker('#twitter_count');

                    <?php elseif(strpos($request, 'movement')): ?>

                    <?php elseif(strpos($request, 'supporters')): ?>
                        
                        var fst = new FacebookStatusTracker('#facebook_statuses');
                        var gt = new GoogleTracker('#google_count');
                        var ft = new FacebookTracker('#facebook_count');
                        var gfb = new GfbTracker('#gfb_count');

                    <?php endif; ?>
                    
                    <?php if($_SESSION['sfsuperbowlintro']) : ?>
                        setTimeout(function() {
                            $('#intro').animate({
                                opacity: 0
                            }, 500, function() {
                                // complete
                                $(this).css({
                                    display: 'none'
                                });
                            });
                        }, 3800);
                        
                        	
                        
                        
                       
                    <?php endif; ?>
		            
//                    var nav = new PageNavigation('#wrap');
                    
                });
            })(jQuery);
        </script>
        
        <link href="<?php echo ROOT; ?>css/reset.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo ROOT; ?>css/font.css" type="text/css" rel="stylesheet" />
        
        <?php if(DEVICE_TYPE == 'computer'): ?>
            <link href="<?php echo ROOT; ?>css/style.css" type="text/css" rel="stylesheet" />
        <?php elseif(DEVICE_TYPE == 'tablet'): ?>
            <link href="<?php echo ROOT; ?>css/style_tablet.css" type="text/css" rel="stylesheet" />
        <?php elseif(DEVICE_TYPE == 'phone'): ?>
            <link href="<?php echo ROOT; ?>css/style_phone.css" type="text/css" rel="stylesheet" />
        <?php endif; ?>
        
        <!-- INTRO ANIMATION -->
    </head>
    <body data-device="<?php echo DEVICE_TYPE; ?>">
    
    <script src='http://connect.facebook.net/en_US/all.js'></script>
       
        <div id="background"></div>
        <div id="wrap">
        
		<div id="container">
		<div id="scaffold"></div>
            <div id="header">
                <div id="boardcontainer">
                    
	                <div class="left">
	                    <h2 class="headlineLargeGray"><a href="../buzz/">BRING THE BOWL TO THE BAY</a></h2>
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
            
            <?php if($_SESSION['sfsuperbowlintro']) : ?>
                <div id="intro">
                    <img src="../images/intro_logo.png" id="introAnimation">
                    <span>
                </div>
                
                <div id="introtext1">
                    <img src="../images/intro_text1.png" id="introAnimation">
                    <span>
                </div>
                
                <div id="introtext2">
                    <img src="../images/intro_text2.png" id="introAnimation">
                    <span>
                </div>
                
                <div id="introtext3">
                    <img src="../images/intro_text3.png" id="introAnimation">
                    <span>
                </div>
                
                <div id="introtext4">
                    <img src="../images/intro_text4.png" id="introAnimation">
                    <span>
                </div>
                
                <div id="introtext5">
                    <img src="../images/intro_text5.png" id="introAnimation">
                    <span>
                </div>
                
                <div id="introBG">
                    <img src="../images/intro_bg.png" id="introAnimation">
                </div>
                
                
                
                <?php $_SESSION['sfsuperbowlintro'] = false; ?>
            <?php endif; ?>
            
            
            
            
            
            
            
            
            