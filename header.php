<?php
session_start();
if(!isset($_SESSION['sfsuperbowlintro'])) {
    $_SESSION['sfsuperbowlintro'] = true;
}
    
    require_once 'config.php';
    
    $request = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    
?>
<!DOCTYPE html>
<?php
    //print_r($_SERVER);
    
    //echo 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];


//    var_dump(is_home($request));
//    var_dump(is_instagram($request));
//    var_dump(is_tweets($request));
//    var_dump(is_supporters($request));
//    var_dump(is_movement($request));
?>


<html  itemscope itemtype="http://schema.org/Event" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="https://www.facebook.com/2008/fbml">
    
    <head>
    	
        <title>SFSuperBowl | San Francisco Super Bowl L | Official Bid Committee Site</title>
        <!-- GOOGLE+ META TAGS FOR DEFAULT THUMBNAIL IMAGE -->
        <meta itemprop="name" content="SFSUPERBOWL">
        <meta itemprop="description" content="Official site for the SF Super Bowl L Bid Committee. Our bid for the 2016 Super Bowl starts with you. Share why you think the Bay Area would be a perfect host for the Super Bowl. And help us bring the Bowl to the Bay.">
<!--         <meta name="title" content="San Francisco Super Bowl 2016 | SF Super Bowl"> -->
        <meta name="description" content="Official site for the SF Super Bowl L Bid Committee. Our bid for the 2016 Super Bowl starts with you. Share why you think the Bay Area would be a perfect host for the Super Bowl. And help us bring the Bowl to the Bay.">
        <meta name="keywords" content="Official San Francisco Super Bowl Bid Committee, SF Super Bowl, San Francisco Super Bowl 50, SFSuperBowl 50, San Franciso Super Bowl L, #sfsuperbowl, @sfsuperbowl, bring the bowl to the bay" />
        <meta name="google-site-verification" content="N__k_-zpjY7nczMv8lOYfz8OTg-IaJbHJWKRJ1Jz-sY" />
        <meta itemprop="image" content="http://www.sfsuperbowl.com/images/fb/sfsb_128x128.jpg">
        
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta property="og:url" content="http://SFSuperBowl.com" />
        <meta property="og:title" content="SFSuperBowl | San Francisco Super Bowl L | Official Bid Committee Site" />
        <meta property="og:image" content="http://www.sfsuperbowl.com/images/fb/sfsb_200x200.jpg" />
        <link rel="image_src" href="http://www.sfsuperbowl.com/images/fb/sfsb_128x128.jpg" />
        <link rel="icon" type="image/png" href="<?php echo ROOT; ?>favicon.ico">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo ROOT; ?>js/lib/jquery.min.js">\x3C/script>')</script>
        <script src="<?php echo ROOT; ?>js/lib/class.js"></script>
        <script src="<?php echo ROOT; ?>js/socialTrackers/subscription.js"></script>
        <script src="<?php echo ROOT; ?>js/socialTrackers/socialTracker.js"></script>
        <?php if(is_home($request)): ?>
            
            <?php if(DEVICE_TYPE != 'phone') : ?>
                <!-- home and not phone -->
                <script src="<?php echo ROOT; ?>js/lib/scroller.js"></script>
            <?php endif; ?>
            <!-- home -->
            <script src="<?php echo ROOT; ?>js/lib/intro.js"></script>
            <script src="<?php echo ROOT; ?>js/socialTrackers/instagramTracker.js"></script>
            <script src="<?php echo ROOT; ?>js/socialTrackers/twitterTracker.js"></script>
            <script src="<?php echo ROOT; ?>js/socialTrackers/totalTracker.js"></script>
            <script src="<?php echo ROOT; ?>js/socialTrackers/gfbTracker.js"></script>
        
        <?php elseif(is_instagram($request)): ?>
            <!-- instagram -->
            <script src="<?php echo ROOT; ?>js/socialTrackers/instagramTracker.js"></script>
            <!--<script src="<?php echo ROOT; ?>js/socialTrackers/twitterTracker.js"></script>-->
        
        <?php elseif(is_tweets($request)): ?>
            <!-- tweets -->
            <script src="<?php echo ROOT; ?>js/socialTrackers/twitterTracker.js"></script>
        
        <?php elseif(is_movement($request)): ?>
            <!-- movement -->
        <?php elseif(is_supporters($request)): ?>
            <!-- supporters -->
            <script src="<?php echo ROOT; ?>js/lib/pretty.js"></script>
            <script src="<?php echo ROOT; ?>js/lib/date.js"></script>
            <script src="<?php echo ROOT; ?>js/lib/jquery.shorten.js"></script>
            <script src="<?php echo ROOT; ?>js/socialTrackers/googlePostType.js"></script>
            <script src="<?php echo ROOT; ?>js/socialTrackers/googleTracker.js"></script>
            <!--<script src="<?php echo ROOT; ?>js/socialTrackers/facebookTracker.js"></script>-->
            <script src="<?php echo ROOT; ?>js/socialTrackers/facebookLikesCombinedTracker.js"></script>
            <script src="<?php echo ROOT; ?>js/socialTrackers/gfbTracker.js"></script>
            <script src="<?php echo ROOT; ?>js/socialTrackers/googleStatusTracker.js"></script>
            <!--<script src="<?php echo ROOT; ?>js/socialTrackers/facebookStatusTracker.js"></script>-->
            
        <?php endif; ?>
        <!-- setup -->
        <script>
            /*
             *  ATTENTION: One window load function initiates all scripts
             **/
            (function($) {
                $(window).load(function() {
                    
                $('.sharebutton').on('click touchstart touchend', function() {
                    if($(this).hasClass('expanded')) {
                        var self = this;
                        $(this).removeClass('expanded');
                    } else {
                        $(this).addClass('expanded');
                    }
                });
                
                        sub = new Subscription();
                        
                    <?php if(is_home($request)): ?>
                        
                        <?php if(DEVICE_TYPE == 'phone') : ?>
                            var total = new TotalTracker('#total');
                            var It = new InstagramTracker('#instagram_photo_count');
                            var tt = new TwitterTracker('#twitter_count');
                            var gfb = new GfbTracker('#gfb_count');
                        <?php else : ?>
                            
                            var total = new TotalTracker('#total');
                            var It = new InstagramTracker('#instagram_photo_count');
                            var tt = new TwitterTracker('#twitter_count');
                            var gfb = new GfbTracker('#gfb_count');

                            var It = new InstagramTracker('#instagram_photo_count1');
                            var tt = new TwitterTracker('#twitter_count1');
                            var gfb = new GfbTracker('#gfb_count1');

                            var It = new InstagramTracker('#instagram_photo_count2');
                            var tt = new TwitterTracker('#twitter_count2');
                            var gfb = new GfbTracker('#gfb_count2');

                            var It = new InstagramTracker('#instagram_photo_count3');
                            var tt = new TwitterTracker('#twitter_count3');
                            var gfb = new GfbTracker('#gfb_count3');
                            
                            
                            var scroller;
                            $(window).on('trigger_scroller', function(evt, data) {
                                scroller = new Scroller('.train', 1005, '<?php echo DEVICE_TYPE; ?>');
                            });
                            
                        <?php endif; ?>
                        
                    <?php elseif(is_instagram($request)): ?>
                        
                        var It = new InstagramTracker('#instagram_photo_count');
//                        var tt = new TwitterTracker('#t_count');

                    <?php elseif(is_tweets($request)): ?>
                        
                        var tt = new TwitterTracker('#twitter_count');

                    <?php elseif(is_movement($request)): ?>

                    <?php elseif(is_supporters($request)): ?>
                        
                        var gst = new GoogleStatusTracker('#google_statuses');
//                        var fst = new FacebookStatusTracker('#facebook_statuses');
                        var gt = new GoogleTracker('#google_count');
//                        var ft = new FacebookTracker('#facebook_count');
                        var fc = new FacebookLikesCombinedTracker('#facebook_count');
                        var gfb = new GfbTracker('#gfb_count');

                    <?php endif; ?>
                    
                    <?php if($_SESSION['sfsuperbowlintro'] && DEVICE_TYPE != 'phone') : ?>
                        
                        var intro = new Intro();
                        intro.init();
                                         
                    <?php else : ?>
                        $(window).trigger('trigger_scroller');
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
            <link href="<?php echo ROOT; ?>css/style_mobile.css" type="text/css" rel="stylesheet" />
        <?php endif; ?>
        
        <!-- INTRO ANIMATION -->
        
    
    
    <!-- GOOGLE ANALYTICS TRACKING -->
    <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-35558308-1']);
            _gaq.push(['_trackPageview']);
            _gaq.push(['_trackSocial']);
            _gaq.push(['_trackEvent']);
	
            (function() {
              var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
              ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
	
	</script>
  
    <!-- GOOGLE ANALYTICS TRACKING -->    
        
    </head>
    
    
    
    
    
    <body data-device="<?php echo DEVICE_TYPE; ?>">
    
    
    <!-- FACEBOOK JS -->
    
    <script src='http://connect.facebook.net/en_US/all.js'></script>
    
    <div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=369308779814605";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
    <!-- END FACEBOOK JS -->
    
    
    
    
       
        <div id="background"></div>
        <div id="wrap">
        
        <div id="container">
            <div id="scaffold"></div>
            <div id="header">
                <div id="boardcontainer">
                    
	                <div class="left">
	                    <h2 class="headlineLargeGray"><a onclick="_gaq.push(['_trackEvent', 'bay', 'click']);" href="<?php echo ROOT; ?>">BRING THE BOWL TO THE BAY</a></h2>
	                </div>
	                
	                <div class="right">
                            
	                	<div class="rightWrap">
                            <div class="tabs">
                        <a onclick="_gaq.push(['_trackEvent', 'scoreboard', 'click']);" href="<?php echo ROOT; ?>" class="ajaxify <?php echo (strpos($request, 'buzz')) ? 'active' : ''; ?>"><?php echo (strpos($request, 'buzz')) ? 'SCOREBOARD' : 'SCOREBOARD'; ?></a><span>l</span><a onclick="_gaq.push(['_trackPageview', '/home/movement/']);" href="<?php echo ROOT; ?>movement" class="ajaxify <?php echo (strpos($request, 'movement')) ? 'active' : ''; ?>" >JOIN THE MOVEMENT</a>
		                    </div>
		                    
		                    <div class="sharebutton">

			                    <ul>
                                                <li><a class="facebook link" onclick="_gaq.push(['_trackSocial', 'facebook', 'share', 'share_post']); postToFeed(); return false; "></a><p id='msg'></p></li>
                                                <li><a class="twittertweet link" onclick="_gaq.push(['_trackSocial', 'twitter', 'share', 'share_tweet']);" href="https://twitter.com/intent/tweet?button_hashtag=SFSUPERBOWL&text=Let&rsquo;s&nbsp;bring&nbsp;the&nbsp;Bowl&nbsp;to&nbsp;the&nbsp;Bay!&nbsp;Show&nbsp;your&nbsp;support.#sfsuperbowl"></a></li>
                                                <li><a class="google link" onclick="_gaq.push(['_trackSocial', 'google', 'share', 'share_plus1']);" href="https://plus.google.com/share?url=http://www.sfsuperbowl.com" target="_blank"></a></li>
                                                <!-- <li><link rel="image_src" href="http://www.labnol.org/screenshot.png" /></li> -->
                                            </ul>

		                    </div>
		                    
                                    <div class="hoverbutton"></div>

	                	</div><!-- /rightwrap -->
	                	
	                </div><!-- /class right -->
	                
	            </div><!-- /boardcontainer-->
                    
            </div><!-- /header -->
            
            <?php if(DEVICE_TYPE != 'phone') : ?>
                <?php if($_SESSION['sfsuperbowlintro']) : ?>

                    <div id="intro">

                        <div id="introWrap">
                            <img class="introItem hidden" src="<?php echo ROOT; ?>images/intro/intro_logo_big.png" id="introLogoBig" />
                            <img class="introItem hidden" src="<?php echo ROOT; ?>images/intro/frame1.png" id="introLogo" />
                            <img class="introItem hidden" src="<?php echo ROOT; ?>images/intro/frame2.png" id="introHeadline" />
                            <img class="introItem hidden" src="<?php echo ROOT; ?>images/intro/frame3.png" id="introCopy" />
                            <img class="introItem hidden" src="<?php echo ROOT; ?>images/intro/frame4.png" id="introCopy2" />
                        </div>
                    </div>

                    <?php $_SESSION['sfsuperbowlintro'] = false; ?>

                <?php endif; ?>
            
            
                
            <?php endif; ?>
            
                
            
        
            
            
            
            
            
            
            
