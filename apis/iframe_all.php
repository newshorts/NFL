<?php 
$page = 'home'; 
?>

<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />

	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width" />

	<title>#SFSuperbowl</title>
  
	<!-- Included CSS Files -->
	<link rel="stylesheet" href="styles/iframe.css">
	


	<!--[if lt IE 9]>
		<link rel="stylesheet" href="stylesheets/ie.css">
	<![endif]-->
	


	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	
	<!-- TWITTER SCRIPTS -->
<!-- 	<script src="javascripts/twitter.js"></script> -->
	
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	
	<script src="javascripts/socialtracker.js"></script>
	<!-- NUMBER SCRIPT -->
	<script>

	
            (function($) {
                $(window).load(function() {
                
                	var st = new SocialTracker();
                	st.trackTotal();
                
               
                });
            })(jQuery);
        </script>
	<!-- END NUMBER SCRIPT -->        
        
        
        
        
	<!-- FACEBOOK SCRIPT -->
	<script type="text/javascript">
	  $(function() {
	    
	  });
	</script>
	<!-- END FACEBOOK SCRIPT -->
	
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
	
	
	<!-- GOOGLE+ SCRIPT -->
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-24776145-1']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>
	<!-- END GOOGLE+ SCRIPT -->
	
	
	
</head>


<body>

<!-- FACEBOOK SCRIPT -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=369308779814605";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- END FACEBOOK SCRIPT -->



	<!-- container -->
	<div class="container">
		
			<!--
<div class="panel">
				<div id="fblikes">
					<h6>Facebook Likes (Sonic Drive-In)</h6>
					<div class="numberboard">
					<div class="facebookfeed">
				        <h6>Loading...</h6>
				    </div>
					</div>
				</div>
			</div>
			
			
			
			<div class="panel">
				<div id="gplus">
					<h6>Google +1's (TechCrunch.com)</h6>
					
					<div class="numberboard">
					

					<span id="googlePluses" data-google="">
					</span>
					<span id="output"></span>
					</div>
							
				</div>
			</div>
-->


				<div id="boardcontainer">
					
					<div class="headline">
						<img src="../images/buzz_sign.png"><span>SFSUPERBOWL BUZZ</span>
					</div>
					
					
					<div class="scoreboard">
						<span id="outputTotal"></span>
					</div>	
				</div>
			
			
			
		</div>

	</div>
	<!-- container -->




	<!-- Included JS Files -->
	<script src="javascripts/jquery.min.js"></script>
<!-- 	<script src="javascripts/foundation.js"></script> -->
<!-- 	<script src="javascripts/app.js"></script> -->

</body>
</html>
